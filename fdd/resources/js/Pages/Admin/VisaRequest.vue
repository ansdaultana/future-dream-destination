<script setup>
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Visa"  />

    <RequestsView :ticket="false" :visa="true" :tour="false" :admin="false" :url="'visa-request-responded'" :heading="'Visa Requests'"/>
</template>