<script setup lang="ts">

import { async } from '@ankasru/utils-ts';
import TextHighlight from '../TextHighlight.vue';

const {
    term
} = defineProps<{
    term: string;
}>();

const query = computed(() => ({
    search: term
}));

const { data: items, execute } = await useFetch("/api/products/suggestionsPromt", {
    server: false,
    immediate: false,
    watch: false,
    query,
})

const isEmpty = computed(() => {
    const categoriesLength = items.value?.items?.categories?.length ?? 0;
    const brandsLength = items.value?.items?.brands?.length ?? 0;

    return categoriesLength > 0 || brandsLength > 0;
})

const search = async.debounce({
    callback: execute,
    timeout: 1000
});

watch(query, () => { search(), console.log(isEmpty.value) })
</script>

<template>
    <ul v-if="isEmpty" class="list-categories">
        <li v-for="product in items?.items.categories" :key="product.id" class="item-list">
            <a class="list-link">
                <img src="https://profpribor.ru/wp-content/uploads/2017/08/%D0%9C%D0%B5%D1%80%D0%BD%D0%B8%D0%BA-%D0%9C2%D1%80-10-01%D0%9F-%D1%81-%D0%BF%D0%B5%D0%BD%D0%BE%D0%B3%D0%B0%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B5%D0%BC-2.jpg"
                    alt="" class="list-img">
                <div class="block-span">
                    <TextHighlight :query="query.search" :text="product.name" />
                    <span class="list-span-parent">{{ product.parent_category }}</span>
                </div>
            </a>
        </li>
        <li v-for="brand in items?.items.brands" :key="brand.id" class="items-brands">
            <a href="" class="link-brand">
                <img src="https://profpribor.ru/wp-content/uploads/2017/08/%D0%9C%D0%B5%D1%80%D0%BD%D0%B8%D0%BA-%D0%9C2%D1%80-10-01%D0%9F-%D1%81-%D0%BF%D0%B5%D0%BD%D0%BE%D0%B3%D0%B0%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B5%D0%BC-2.jpg"
                    alt="" class="img-brand">
                <span class="span-brand">{{ brand.name }}</span>
            </a>
        </li>
    </ul>
</template>

<style scoped>
.list-categories {
    display: flex;
    flex-direction: column;

    background-color: #f6f6f6;
    border-radius: 10px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.item-list {
    margin-left: 5px;
}

.list-link {
    display: flex;
    text-decoration: none;

    margin-top: 10px;
    padding: 5px 10px;
}

.block-span {
    display: flex;
    flex-direction: column;
}

.list-span-parent {
    font-size: 12px;
    color: #929292;
}

.list-img {
    max-width: 35;
    max-height: 25px;
    margin-right: 10px;
}

:hover.item-list {
    background-color: white;
}

.items-brands {
    display: flex;
    padding: 5px 10px;
    margin-left: 5px;
}

.link-brand {
    text-decoration: none;
    display: flex;
    align-items: center;

}

.img-brand {
    width: 35px;
    height: 25px;
    margin-right: 10px;
}

.span-brand {

    color: black;
    font-size: 14px;
}

:hover.items-brands {
    background-color: white;
}
</style>