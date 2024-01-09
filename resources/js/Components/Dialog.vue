<template>
  <div
    class="overflow-y-auto overflow-x-hidden z-50 fixed flex justify-center items-center inset-0 h-full bg-[rgba(0,0,0,0.5)]"
  >
    <div class="relative flex flex-col p-4 w-auto h-auto bg-white drop-shadow-xl">
      <slot name="close">
        <CloseIcon
          class="absolute top-2 right-2 cursor-pointer"
          @click="$emit('close')"
        />
      </slot>
      <slot name="content"></slot>
    </div>
  </div>
</template>
<script setup>
import CloseIcon from "@/Components/Icons/CloseIcon.vue";
const emit = defineEmits(['close'])
document.addEventListener("keydown", event => {
    if(event.keyCode === 27){
        emit('close')
    }
})
</script>
