<script setup lang="ts">

import { async } from '@ankasru/utils-ts';

const {
    term
} = defineProps<{
    term: string;
}>();

const query = computed(() => ({
    search: term
}));

// const search = async.debounce({
//     callback: () => {
//         execute()
//     },
//     timeout: 1000
// });

function debounce(callback: (...args: any[]) => void, timeout: number) {
    let timeId: ReturnType<typeof setTimeout>;

    return function (...args: any[]) {
        clearTimeout(timeId);

        timeId = setTimeout(() => {
            callback(...args);
        }, timeout);
    };
}


const search = debounce(() => {
    execute()
    console.log('execute')
}, 1000)

const { data: items, execute } = await useFetch("/api/products/suggestionsProducts", {
    server: false,
    immediate: false,
    watch: false,
    query,
})



watch(query, () => { search() })
</script>

<template>
    <div class="list-block">
        <div>
            <ul class="list-categories">
                <li v-for="product in items?.items.products" :key="product.id" class="item-list">
                    <a :href="product.url" class="list-link">
                        <img src="https://profpribor.ru/wp-content/uploads/2017/08/%D0%9C%D0%B5%D1%80%D0%BD%D0%B8%D0%BA-%D0%9C2%D1%80-10-01%D0%9F-%D1%81-%D0%BF%D0%B5%D0%BD%D0%BE%D0%B3%D0%B0%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B5%D0%BC-2.jpg"
                            alt="" class="list-img">
                        <span class="list-span">{{ product.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <button v-if="items?.items.show_get_more" class="list-button">Показать все</button>
    </div>


</template>

<style scoped>
.list-block {
    display: flex;
    flex-direction: column;
    max-height: 700px;
    min-height: 500px;
    overflow-y: scroll;
}

.list-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(125px, 1fr));
    grid-auto-rows: max-content;


    background-color: white;
    border-radius: 5px;
    margin: 0;
    padding: 5px;
    list-style: none;

}

.item-list {
    border-radius: 10px;

}

.list-link {
    display: flex;
    flex-direction: column;
    text-decoration: none;

    margin-top: 10px;
    padding: 5px;
}

.list-span {
    position: relative;
    overflow: hidden;
    width: 114px;
    color: black;
    text-align: left;
    margin: 1px auto auto auto;
    font-size: 14px;
    font-weight: 400;
}

.list-img {
    width: 114px;
    height: 114px;
    margin-left: auto;
    margin-right: auto;
}

:hover.item-list {
    background-color: #f6f6f6;
}

.item-list:hover .list-span {
    color: blue;
}

.list-button {
    justify-self: center;
    margin: 10px auto 20px auto;
    background: #e30016;
    border-radius: 5px;
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    width: 180px;
}
</style>