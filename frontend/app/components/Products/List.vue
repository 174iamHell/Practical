<script setup lang='ts'>
    const {title,products} = defineProps<{
        title:string
        products:{
            title:string,
            price:string,
            image:string}[]
    }>();
</script>

<template>
    <div class="box-main">
        <p class ="bestsellers">{{ title }}</p>
        <div class ="cards-block">
            <ul class="catalog-cards">
                <ProductsItem v-for="product in products" :key="product.title" :product="product" />
            </ul>
        </div>
    </div>

</template>

<style>
.catalog-cards {
    display: grid;
    grid-template-columns: repeat(6, 1fr);

    gap: 10px;
    list-style-type: none;
    padding: 0;
}

.box-main {
    max-width: 1536px;
    width: 100%;
    margin: 0 auto;
}

.bestsellers {
    font-weight: bold;
    font-size: 20px;

    margin: 0;
    margin-bottom: 24px;

}
</style>
