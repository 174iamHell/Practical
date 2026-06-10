<script setup>
import { async } from '@ankasru/utils-ts';
const searchQuery = ref('');
const { data: cities, execute } = useFetch('/api/cities/suggestions', {
    immediate: true,
    server: false,
    query: {
        search: searchQuery
    }
})

const search = async.debounce({
    callback: () => {
        execute()
    },
    timeout: 1000
});

watch(searchQuery, () => {
    search()
})
</script>

<template>
    <div class="block-search-city">
        <h2 class="title">Выберите ваш город</h2>
        <input class="search-input" v-model="searchQuery" type="text">
        <ul class="list-city">
            <li v-for="city in cities">
                <span class="span-title">{{ city.name }}</span>
            </li>
        </ul>
    </div>
</template>

<style>
.block-search-city {
    position: absolute;
    z-index: 999;
    top: 100%;

    border-radius: 5px;
    background-color: white;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15);
}

.list-city {
    list-style: none;
    padding: 8px;
    margin: 0;
    overflow-y: scroll;
    max-height: 400px;
}

.title {
    font-size: 15px;
    margin: 8px;
}

.search-input {
    width: auto;
    border: #e30016 solid 2px;
    border-radius: 5px;
    outline: none;
    margin-left: 5px;
}

.span-title {
    font-size: 12px;
}
</style>