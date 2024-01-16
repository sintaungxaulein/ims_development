<template>
    <Head title="ITem List" />
    <Breadcrumb
      :title="isEditPage ? 'Edit Item' : 'Create Item'"
      :items="breadcrumbItems"
    />

    <div class="flex flex-col justify-center w-3/4 h-auto bg-gray-300 mt-5 mx-auto pb-3">
        <BasicInfoForm
                :errors="errors ?? form.errors"
                :units="units"
                v-model:item_code="form.item_code"
                v-model:name="form.name"
                v-model:unitId="form.unit_id"
                :item="item"
        />
        <button
          class="
            bg-theme-blue-dark
            text-white
            cursor-pointer
            rounded-full
            mx-auto
            px-6
            py-2
            mt-5
          "
          @click="saveItem"
          :disabled="form.processing"
        >
          {{
            route().current() == "items.edit" ? "Update item" : "Create item"
          }}
        </button>
    </div>
    
  </template>
  <script setup>
  import { Head, useForm, usePage } from "@inertiajs/inertia-vue3";
  import Breadcrumb from "@/Components/BreadcrumbComponent.vue";
  import { computed } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import BasicInfoForm from "./BasicInfoForm.vue";
  
  const props = defineProps({
    errors:{
        type: Object,
    },
    units: {
      type: Array,
      required: true,
    },
    item: {
      type: Object,
      default: {
        id: "",
        item_code: "",
        name : "",
        unit_id: "",
      },
    },
  });
  
  const isEditPage = route().current() == "items.edit";
//   const errors = computed(() => usePage().props.value.errors);
  
  const breadcrumbItems = computed(() => {
    let items = [
      {
        link: route("items.index"),
        title: "Item Management",
      },
    ];
    if (isEditPage) {
      items.push({
        link: route("items.show", props.item.id),
        title: props.item.name,
      });
    }
    return items;
  });
  
  const form = useForm({
    item_code: props.item?.item_code,
    name: props.item?.name,
    unit_id: props.item?.unit_id,
  });
  
  const saveItem = () => {
    if (isEditPage) updateitem();
    else storeItem();
  };
  
  const storeItem = () => {
    form.post(route("items.store"), {
      onFinish: () => {
        form.errors = {};
      },
    });
  };
  
  const updateitem = () => {
    Inertia.post(route("items.update", props.item.id), {
      _method: "put",
      data: form,
      onFinish: () => {
        form.errors = {};
      },
    });
  };
  </script>
  