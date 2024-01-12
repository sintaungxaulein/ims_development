<template>
  <div class="p-4 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center">
      <div class="inline-flex items-center gap-x-1">
        <span>Show</span>
        <input
          type="number"
          min="1"
          max="20"
          class="w-12 p-1 border-gray-300 focus:outline-none focus:border-gray-300"
          v-model="proxyPerPage"
        />
        <span>entries</span>
      </div>

      <slot name="entry-count"></slot>

      <Link
        v-if="createLink"
        :href="createLink.link"
        :class="createLink.color ? 'bg-green-500 text-white rounded-full px-6 py-2' : 'bg-theme-blue-dark text-white rounded-full px-6 py-2'"
        @click="createLink.event ? $emit('downloadExcel'): ''"
      >
        {{ createLink.title }}
      </Link>
    </div>
    <div class="pt-2 pb-4 overflow-x-auto">
      <slot></slot>
    </div>
    <hr class="mb-4" />
    <div class="flex justify-between items-center">
      <span>Show {{ showCount }} of entries </span>
      <Pagination :links="links" :current-page="currentPage" />
    </div>
  </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
  links: {
    type: Array,
  },
  apiMode: {
    type: String,
    default: "Inertia",
  },
  currentPage: {
    type: Number,
  },
  createLink: {
    type: Object,
    default: null,
  },
  perPage: {
    type: [Number, String],
    default: 15,
  },
  showCount: {
    type: [Number, String],
    required: true,
  },
});

const emit = defineEmits(["update:perPage", "downloadExcel"]);

const proxyPerPage = computed({
  get() {
    return props.perPage;
  },

  set(val) {
    emit("update:perPage", val);
  },
});
</script>
