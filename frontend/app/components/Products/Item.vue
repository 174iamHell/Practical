<script setup lang="ts">
const { product } = defineProps<{
    product: {
        title: string;
        price: string;
        image: string;
    }
}>();
</script>

<template>
    <li class="card-list">
        <a class="product" href="">
            <img class="img-product" :src=product.image alt="" style="height: 157px; width:100%;">
        </a>
        <div class="box-price">
            <strong>
                <span class="price">{{ product.price }}</span>
            </strong>
        </div>
        <span>
            <a class="title hover-red" href="">{{ product.title }}</a>
        </span>
        <button class="button-add">Добавить в корзину</button>
        <button class="button-like">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" title="Избранное" width="28px" height="28px">
                <path fill="currentColor"
                    d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3">
                </path>
            </svg>
        </button>
    </li>
</template>

<style>
.card-list {
    display: flex;
    flex-direction: column;
    position: relative;

    gap: 10px;
    height: 305px;
}

.box-price {

    margin-bottom: 8px;
}

.price {
    font-weight: bold;
    font-size: 20px;


}

.title {
    text-decoration: none;
    color: black;
    font-size: 15px;
    font-weight: 550;
}

.button-add {
    color: white;
    background-color: #e30016;
    border-radius: 5px;
    border: #e30016 solid 1px;
    line-height: 24px;

    font-size: 15px;
    margin-top: auto;
}

.button-like {
    width: 28px;
    height: 28px;
    background-color: transparent;
    border: none;
    padding: 0;

    position: absolute;
    top: 2px;
    right: 2px;


}

.product {}

.img-product {
    height: 140px;
    width: 140px;
}
</style>