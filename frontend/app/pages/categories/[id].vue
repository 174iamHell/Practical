<script setup lang="ts">
const route = useRoute();

const id = computed(() => route.params.id ?? '3');

const { data: catalog } = await useFetch(() => `/api/categories/${id.value}`);

const title = computed(() => {
    return catalog.value?.title;
})

const products = computed(() => {
    return catalog.value?.products;
})
</script>

<template>
    <main>
        <ProductsList :title="title ?? ''" :products="products ?? []" />
    </main>
</template>