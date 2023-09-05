<script setup>
import ViewItems from './ViewItems.vue';

</script>
<template>
    <Head title="Tickets"  />

    <ViewItems :ticket="true" :visa="false" :tour="false" :editUrl="'edit-ticket'" :deleteUrl="'delete-ticket'"/>
</template>