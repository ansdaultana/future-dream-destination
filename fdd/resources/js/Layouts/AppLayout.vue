
<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/NavbarAdmin.vue'
</script>

<template>
    <div class="flex">
        <Sidebar />
        <div class="w-screen">
            <Navbar />
            <slot />

        </div>
    </div>
</template>