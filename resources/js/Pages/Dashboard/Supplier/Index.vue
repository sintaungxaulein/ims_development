<template>
    <Head title="Supplier List" />
    <div class="flex suppliers-center gap-x-4">
      <Breadcrumb title="Supplier Management" />
    </div>
    <List
      class="mt-4"
      :create-link="createLink"
      v-model:perPage="perPage"
      :links="suppliers.meta.links"
      :current-page="suppliers.meta.current_page"
      :show-count="suppliers.data.length"
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
        v-for="Supplier in suppliers.data"
        :key="Supplier.name"
        :href="route('suppliers.edit', Supplier.id)"
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
          :key="`${Supplier.name}-title-${index}`"
          :class="title.className"
        >
          {{ Supplier[title.key] }}
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
  import useSupplier from "../../../composables/useSupplier";

  const props = defineProps({
    suppliers: {
      type: Object,
      required: true,
    },
    params: {
      type: Object,
    },
  });

  // const createLink = {
  //   title: "Add New Supplier",
  //   link: route("suppliers.create"),
  // };

  const perPage = ref(props.suppliers.meta.per_page);

  const { getsuppliers } = useSupplier(perPage);

  watch(perPage, (value) => typeof value == "number" && value > 0 && getsuppliers());

  const titles = [
    { className: "w-80", key: "id", title: "Supplier Id" },
    { className: "w-80", key: "name", title: "Supplier Name" },
    { className: "w-80", key: "description", title: "Description" },
  ];
  </script>
