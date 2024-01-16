<template>
    <Head title="Unit List" />
    <div class="flex items-center gap-x-4">
      <Breadcrumb title="Unit List" />
    </div>
    <List
      class="mt-4"
      :create-link="createLink"
      v-model:perPage="perPage"
      :links="units.meta.links"
      :current-page="units.meta.current_page"
      :show-count="units.data.length"
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
        v-for="Unit in units.data"
        :key="Unit.name"
        :href="route('units.edit', Unit.id)"
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
          :key="`${Unit.name}-title-${index}`"
          :class="title.className"
        >
          {{ Unit[title.key] }}
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
  import useUnit from "../../../composables/useUnit";

  const props = defineProps({
    units: {
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

  const perPage = ref(props.units.meta.per_page);

  const { getunits } = useUnit(perPage);

  watch(perPage, (value) => typeof value == "number" && value > 0 && getunits());

  const titles = [
    { className: "w-96", key: "id", title: "Unit Id" },
    { className: "w-96", key: "name", title: "Unit Name" },
    { className: "w-96", key: "description", title: "Description" },
  ];
  </script>
