<template>
  <div class="flex justify-center items-center">
    <div
      v-for="link in links"
      :key="link.label"
      class="text-sm bg-white border-solid border-gray-300 border-t border-b border-l last-of-type:border-r first-of-type:rounded-l-lg last-of-type:rounded-r-lg"
      :class="{
        'bg-theme-blue text-white border-t-theme-blue border-b-theme-blue border-l-theme-blue':
          currentPage == link.label,
        'text-gray-300': !link.url,
      }"
    >
      <div v-if="link.url">
        <Link class="px-4 py-2 block" :href="link.url" v-html="link.label"></Link>
      </div>
      <div v-else class="px-4 py-2 block" v-html="link.label"></div>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  links: {
    type: Array,
  },
  currentPage: {
    type: Number,
  },
});
</script>
