<template>
  <div>
    <div class="min-h-screen bg-theme-blue-light flex">
      <SideNavList @toggleSideNav="toggleSideNav" :side-nav-expanded="sideNavExpanded" />
      <div class="flex-1">
        <HeaderNav @toggleSideNav="toggleSideNav" />
        <main
          class="p-4 transition-all duration-700 bg-red-50 h-5/6"
          :class="{
            'max-w-[calc(100vw-16rem)]': sideNavExpanded,
            'max-w-[calc(100vw-3rem)]': !sideNavExpanded,
          }"
        >
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>
<script setup>
import HeaderNav from "@/Components/Header/NavBar.vue";
import SideNavList from "@/Components/SideNav/NavList.vue";
import { ref } from "@vue/reactivity";
const sideNavExpanded = ref(true);

const toggleSideNav = () => {
  sideNavExpanded.value = !sideNavExpanded.value;
};
</script>
