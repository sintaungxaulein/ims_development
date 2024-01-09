<template>
  <Dialog @close="$emit('close')">
    <template v-slot:close>
      <span></span>
    </template>
    <template v-slot:content>
      <div class="w-64">
        <h3 class="mt-4 text-center">Are you suer to logout?</h3>
        <div class="mt-4 flex gap-x-4 justify-end items-center">
          <span
            class="p-2 rounded-sm bg-gray-50 cursor-pointer text-gray-500 hover:text-gray-700"
            @click="$emit('close')"
          >
            Cancel
          </span>
          <NavLink
            :href="route('logout')"
            method="post"
            class="p-2 rounded-sm bg-red-500 text-white hover:!text-white"
            >Logout</NavLink
          >
        </div>
      </div>
    </template>
  </Dialog>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import Dialog from "@/Components/Dialog.vue";
</script>
