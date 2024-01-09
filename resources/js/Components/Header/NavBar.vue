<template>
  <nav class="py-4 bg-white">
    <Hamburger class="cursor-pointer mx-4 w-6" @click="$emit('toggleSideNav')" />
    <div class="hidden sm:flex sm:items-center sm:ms-6 justify-end">
        <!-- Settings Dropdown -->
        <div class="ms-3 relative">
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button
                            type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                            {{ $page.props.auth.user.name }}

                            <svg
                                class="ms-2 -me-0.5 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </span>
                </template>

                <template #content>
                    <DropdownLink :href="route('logout')" method="post" as="button">
                        Log Out
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
    </div>
  </nav>
</template>
<script setup>
import Hamburger from "./Hamburger.vue";
import { onMounted } from 'vue';
import { ref } from "@vue/reactivity";
import axios from 'axios';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
defineEmits(["toggleSideNav"]);

// const currentUserRole = ref('');
// const currentUserName = ref('');

// onMounted(() => {

//   axios.get('/user-role')
//     .then(response => {
//       currentUserRole.value = response.data;
//     })
//     .catch(error => {
//       console.error(error);
//     });

//     axios.get('/user-name')
//     .then(response => {
//       currentUserName.value = response.data;
//     })
//     .catch(error => {
//       console.error(error);
//     });
// });
</script>
