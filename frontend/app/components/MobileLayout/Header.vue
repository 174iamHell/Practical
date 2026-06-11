<script setup lang="ts">
import ContactHeader from './ContactHeader.vue';

</script>

<template>
    <div class="block-header">
        <MobileLayoutCities />
        <MobileLayoutInputHeader />
        <ContactHeader />
    </div>

</template>

<style>
.block-header {
    padding: 8px 16px;
}
</style>