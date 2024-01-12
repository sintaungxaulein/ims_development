<template>
  <div
    class="
      flex flex-col
      p-2
      bg-white
      overflow-hidden
      transition-all
      duration-700
      drop-shadow-lg
    "
    :class="{
      'w-12': !sideNavExpanded,
      'w-64': sideNavExpanded,
    }"
  >
    <div class="flex flex-col gap-y-4 justify-start items-center h-40">
      <img
        src="/img/logo/erimgt.jpg"
        class="transition-all duration-1000"
        :class="{
          'w-full': !sideNavExpanded,
          'w-1/2': sideNavExpanded,
        }"
        alt="Logo"
      />
      <!-- <img
        src="/img/TELEMEDIC.svg"
        class="transition-all duration-400"
        :class="{
          'w-0': !sideNavExpanded,
          'w-1/2': sideNavExpanded,
        }"
        alt="Logo Name"
      /> -->
      <div class="text-sm font-extrabold text-orange-800">
         IMS
      </div>
    </div>
    <div class="flex-1 mt-4 flex flex-col gap-y-4">
      <SideNavItem
      :href="route('dashboard')"
      :active="$page.component === 'Dashboard'"
      :side-nav-expanded="sideNavExpanded">
        <template v-slot:icon>
          <DashboardIcon
            class="shrink-0"
            @click="clickOnIcon"
            @dblclick="toggleSideNav"
          />
        </template>
        <template v-slot:name> Dashboard</template>
      </SideNavItem>
      
      <SideNavGroup
        :side-nav-expanded="sideNavExpanded"
        :active="
          [
            'Dashboard/Item/Index',
          ].includes($page.component)
        "
      >
        <template v-slot:icon>
          <ReportIcon
            class="shrink-0"
            @click="clickOnIcon"
            @dblclick="toggleSideNav"
          />
        </template>
        <template v-slot:name> Item Management </template>
        <template v-slot:navLinks>
          <NavLink
            :href="route('items.index')"
            :active="$page.component === 'Dashboard/Agent/Index'"
          >
            Item List</NavLink
          >
          <NavLink
            :href="route('items.create')"
            :active="$page.url == '/items/create'"
          >
            Create New Item
          </NavLink>
        </template>
      </SideNavGroup>

    </div>
  </div>
  <LogoutDialog v-if="showLogoutDialog" @close="toggleLogoutDialog" />
</template>
<script setup>
import SideNavItem from "./SideNavItem.vue";
import SideNavGroup from "./SideNavGroup.vue";
import DashboardIcon from "@/Components/Icons/DashboardIcon.vue";
import UserIcon from "@/Components/Icons/UserIcon.vue";
import ReportIcon from "@/Components/Icons/ReportIcon.vue";
import SettingIcon from "@/Components/Icons/SettingIcon.vue";
import LogoutIcon from "@/Components/Icons/LogoutIcon.vue";
import NavLink from "@/Components/NavLink.vue";
import LogoutDialog from "./LogoutDialog.vue";
import { ref } from "@vue/reactivity";
import { onMounted } from 'vue';
import axios from 'axios';
const props = defineProps({
  sideNavExpanded: {
    type: Boolean,
    default: false,
  },
  // userRole: {
  //   type: String,
  //   required: true
  // }
});

// const uatTitle = (window.location.hostname === "uat.thtelemedic.com" || window.location.hostname === "localhost") ? "UAT" : "";

// const currentUserRole = ref('');

const emit = defineEmits(["toggleSideNav"]);

const showLogoutDialog = ref(false);

const toggleLogoutDialog = () => {
  showLogoutDialog.value = !showLogoutDialog.value;
};

const clickOnIcon = () => {
  if (!props.sideNavExpanded) {
    toggleSideNav();
  }
};
const toggleSideNav = () => {
  emit("toggleSideNav");
};

// onMounted(() => {
//   axios.get('/user-role')
//     .then(response => {
//       currentUserRole.value = response.data;
//     })
//     .catch(error => {
//       console.error(error);
//     });
// });

</script>
