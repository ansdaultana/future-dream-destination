<script setup>
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Tourism"  />

    <RequestsView :ticket="false" :visa="false" :tour="true" :admin="false" :url="'tour-request-responded'" :heading="'Tourism Requests'"/>
</template>