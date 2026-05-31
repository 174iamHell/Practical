<script setup lang="ts">
    const {data:catalog} = await useFetch(()=>`/api/categories/${'3'}`);

    const products = catalog.value?.products;
    const title = catalog.value?.title;


</script>
<template>
    <ProductsList :title="title ?? ''" :products="products ?? []"/>
</template>

<style></style>