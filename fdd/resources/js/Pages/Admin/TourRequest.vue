<script setup>
import { useForm } from '@inertiajs/vue3';
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Tourism"  />

    <RequestsView :ticket="false" :visa="false" :tour="true" :url="'tour-request-responded'" :heading="'Tourism Requests'"/>
</template>