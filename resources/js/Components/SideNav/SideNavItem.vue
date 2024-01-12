<template>
  <NavLink :href="href" class="flex items-center ml-2">
    <slot name="icon"></slot>

    <span
      class="ml-2 inline-block uppercase font-bold text-sm overflow-hidden transition-all duration-1000 whitespace-nowrap"
      :class="{
        'w-44': sideNavExpanded,
        'w-0 ml-0': !sideNavExpanded,
      }"
    >
      <slot name="name"></slot>
    </span>
  </NavLink>
</template>
<script setup>
import NavLink from "@/Components/NavLink.vue";
defineProps({
  sideNavExpanded: {
    type: Boolean,
    default: false,
  },
  href: {
    type: String,
    default: "#",
  },
});
</script>
