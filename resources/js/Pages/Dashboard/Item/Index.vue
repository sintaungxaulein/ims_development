<template>
    <Head title="Item List" />
    <div class="flex items-center gap-x-4">
      <Breadcrumb title="Item Management" />
    </div>
    <List
      class="mt-4"
      :create-link="createLink"
      v-model:perPage="perPage"
      :links="items.meta.links"
      :current-page="items.meta.current_page"
      :show-count="items.data.length"
    >
      <div class="py-2 border-y border-gray-400 w-max flex gap-x-4">
        <span
          v-for="(title, index) in titles"
          :key="`title-${index}`"
          :class="title.className"
        >
          {{ title.title }}
        </span>
      </div>
      <Link
        v-for="Item in items.data"
        :key="Item.item_code"
        :href="route('items.edit', Item.id)"
        class="
          py-2
          w-max
          flex
          gap-x-4
          odd:bg-gray-100
          hover:bg-gray-100
          cursor-pointer
        "
      >
        <span
          v-for="(title, index) in titles"
          :key="`${Item.item_code}-title-${index}`"
          :class="title.className"
        >
          {{ Item[title.key] }}
        </span>
      </Link>
    </List>
  </template>
  <script setup>
  import { Head, Link } from "@inertiajs/inertia-vue3";
  import Breadcrumb from "@/Components/BreadcrumbComponent.vue";
  import List from "@/Layouts/List.vue";
  import { ref } from "@vue/reactivity";
  import { watch } from "@vue/runtime-core";
  import useItem from "../../../composables/useItem";
  
  const props = defineProps({
    items: {
      type: Object,
      required: true,
    },
    params: {
      type: Object,
    },
  });
  
  // const createLink = {
  //   title: "Add New Item",
  //   link: route("items.create"),
  // };
  
  const perPage = ref(props.items.meta.per_page);
  
  const { getitems } = useItem(perPage);
  
  watch(perPage, (value) => typeof value == "number" && value > 0 && getitems());
  
  const titles = [
    { className: "w-48", key: "id", title: "Item Id" },
    { className: "w-60", key: "item_code", title: "Code" },
    { className: "w-60", key: "name", title: "Item Name" },
    { className: "w-60", key: "unit", title: "Unit" },
  ];
  </script>
   