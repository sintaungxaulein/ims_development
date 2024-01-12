<template>
  <div class="w-max flex items-center gap-x-4">
    <h1 class="font-bold text-xl inline">{{ title }}</h1>
    <div class="border-l border-gray-500 h-6"></div>
    <NavLink
      :href="route('dashboard')"
      class="text-theme-blue-dark hover:text-blue-700 !px-0"
    >
      <HomeIcon />
    </NavLink>

    <template v-for="(item, index) in items" :key="`breadcrumb-link-${index})`">
      <ChevronsRightIcon />
      <NavLink :href="item.link" class="text-theme-blue-dark hover:text-blue-700 !px-0">
        {{ item.title }}
      </NavLink>
    </template>
    <ChevronsRightIcon />
    <span>{{ title }}</span>
  </div>
</template>
<script setup>
import HomeIcon from "@/Components/Icons/HomeIcon.vue";
import ChevronsRightIcon from "@/Components/Icons/ChevronsRightIcon.vue";
import NavLink from "@/Components/NavLink.vue";
defineProps({
  title: {
    type: String,
    default: "",
  },
  items: {
    type: Array,
    default: () => [],
  },
});
</script>
