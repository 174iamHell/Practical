<script setup lang="ts">
const {
    term
} = defineProps<{
    term: string;
}>();

const query = computed(() => ({
    search: term
}));

const { data: items, execute } = await useFetch("/api/products/suggestions", {
    server: false,
    immediate: false,
    query,
})

const executeSearch = () => {
    execute();
    console.log("Пришли товары:", items.value?.items?.products);
};
defineExpose({ executeSearch })
</script>

<template>
    <ul class="list-categories">
        <li v-for="product in items?.items.products" :key="product.id">
            <a href="">
                <img :src=product.image alt="">
                <span>{{ product.name }}</span>
            </a>
        </li>
    </ul>
</template>

<style scoped>
.list-categories {
    display: grid;
    grid-template: repeat(auto-fit, minmax(185, 1fr));

    background-color: #f6f6f6;
    margin: 0;
    padding: 0;
    list-style: none;
}
</style>