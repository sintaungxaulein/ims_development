<template>
  <vSelect
    class="w-48"
    :placeholder="placeholder"
    :label="label"
    :options="options"
    :clearable="clearable"
    :modelValue="modelValue"
    @update:modelValue="updateSelected"
  >
    <template #open-indicator="{ attributes }">
      <span v-bind="attributes">
        <slot name="icon"><ChevronDown /></slot>
      </span>
    </template>
    <template v-if="required" #search="{ attributes, events }">
      <input
        maxlength="1"
        class="vs__search"
        v-bind="attributes"
        v-on="events"
        :required="!modelValue"
      />
    </template>
  </vSelect>
</template>
<script setup>
import vSelect from "vue-select";
import ChevronDown from "@/Components/Icons/ChevronDown.vue";
defineProps({
  options: {
    type: Array,
    default: () => [],
  },
  placeholder: {
    type: String,
    default: "Select an option",
  },
  label: {
    type: String,
    default: null,
  },
  clearable: {
    type: Boolean,
    default: true,
  },
  modelValue: {
    default: null,
  },
  required: {
    type: Boolean,
    default: false,
  },
});
const emit = defineEmits(["update:modelValue"]);

const updateSelected = (value) => {
  emit("update:modelValue", value);
};
</script>
