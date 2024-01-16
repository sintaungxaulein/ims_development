<template>
    <div class="flex flex-col gap-y-2 mx-40">
      <label for="name">Item Code</label>
      <Input
        id="item_code"
        :error="errors.item_code"
        :modelValue="item_code"
        class="focus:ring-0 focus:outline-none rounded-lg"
        name="item_code"
        placeholder="Item Code"
        required
        type="text"
        @update:modelValue="(v) => updateValue('item_code', v)"
      />
      <small v-if="errors.item_code" class="text-red-500">{{ errors.item_code }}</small>
    </div>
  
    <div class="flex flex-col gap-y-2 mx-40 mt-3">
        <label for="name">Item Name</label>
        <Input
            id="name"
            :error="errors.name"
            :modelValue="name"
            class="focus:ring-0 focus:outline-none rounded-lg"
            name="name"
            placeholder="Item Name"
            type="text"
            @update:modelValue="(v) => updateValue('name', v)"
        />
        <small v-if="errors.name" class="text-red-500">{{ errors.name }}</small>
    </div>

    <!-- <div class="flex flex-col gap-y-2">
        <label for="unit">Unit</label>
        <Selector
        id="unit"
        name="unit"
        label="unit"
        :options="units"
        class="!w-full"
        >
        <template v-slot:icon>
            <CaretIcon class="cursor-pointer" />
        </template>
        </Selector>
        <small v-if="errors.unit_id" class="text-red-500">{{
        errors.unit_id
        }}</small>
    </div> -->
  
  </template>
  <script setup>
  import { ref } from "@vue/reactivity";
  import Input from "@/Components/Input.vue";
  import Selector from "@/Components/Selector.vue";
  import CaretIcon from "@/Components/Icons/CaretIcon.vue";
  import { watch } from "@vue/runtime-core";
  
  const props = defineProps({
    errors: {
      type: Object,
    },
    item_code: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      default: "",
    },
    units: {
        type: Array,
        required: true,
    },
    unitId: {
        type: Number,
        default: "",
    },
  });
//   const selectedUnit = ref(props.units.find((r) => r.id == props.unitId));
  const emit = defineEmits([
    "update:item_code",
    "update:name",
    "update:unitId",
  ]);
  
  const updateValue = (name, value) => {
    emit(`update:${name}`, value.target ? value.target.value : value);
  };

//   watch(selectedUnit, (value) =>
//     emit("update:unitId", value ? value.id : null)
//   );
  </script>
  