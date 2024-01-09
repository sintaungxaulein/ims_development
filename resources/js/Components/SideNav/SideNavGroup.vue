<template>
    <div class="p-2 select-none" :class="{ 'bg-gray-100': !collapsed }">
        <div class="flex items-center">
            <slot name="icon" :class="{ 'ml-2': sideNavExpanded }">
                <span class="p-2 bg-red-500"></span>
            </slot>
            <div class="flex items-center justify-between cursor-pointer" @click="toggleCollapsed">
                <span
                  class="ml-2 inline-block uppercase font-bold text-sm overflow-hidden transition-all duration-1000 whitespace-nowrap"
                  :class="{'w-44': sideNavExpanded,'w-0 ml-0': !sideNavExpanded}">
                <slot name="name"></slot>
                </span>
                <ChevronDown
                    class="ml-auto cursor-pointer transition-all duration-500"
                    :class="{'-scale-y-100': collapsed, hidden: !sideNavExpanded}"
                />
            </div>
        </div>

        <div
            class="ml-6 flex flex-col gap-y-2 transition-all duration-500 overflow-hidden whitespace-nowrap"
            :class="{
        'w-0': !sideNavExpanded,
        'h-0': collapsed || !sideNavExpanded,
        'h-20 mt-4': !collapsed && sideNavExpanded,
      }"
        >
            <slot name="navLinks"></slot>
        </div>
    </div>
</template>
<script setup>
import ChevronDown from "@/Components/Icons/ChevronDown.vue";
import {ref, watch} from "vue";

const props = defineProps({
    sideNavExpanded: {
        type: Boolean,
        default: false,
    },
    active: {
        type: Boolean,
        default: false,
    },
});

const collapsed = ref(!props.active);

const toggleCollapsed = () => {
    collapsed.value = !collapsed.value;
};

watch(
    () => props.active,
    (active) => {
        collapsed.value = !active;
    }
);
</script>
