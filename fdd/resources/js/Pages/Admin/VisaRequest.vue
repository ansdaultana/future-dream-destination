<script setup>
import { useForm } from '@inertiajs/vue3';
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Visa"  />

    <RequestsView :ticket="false" :visa="true" :tour="false" :url="'visa-request-responded'"/>
</template>