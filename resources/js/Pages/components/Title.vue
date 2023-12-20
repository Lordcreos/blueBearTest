<script setup>
  import { Head } from '@inertiajs/inertia-vue3';
  import { defineProps } from "vue";
  const props = defineProps(['title']);
</script>
<template>
  <Head>
    <title>{{props.title}}</title>
  </Head>
</template>