<script setup>
import ViewItems from './ViewItems.vue';

</script>
<template>
    <Head title="Tours" />
    <ViewItems :ticket="false" :visa="false" :tour="true" :editUrl="'edit-tour'" :deleteUrl="'delete-tour'" />
</template>