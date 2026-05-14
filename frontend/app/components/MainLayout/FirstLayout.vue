<script setup lang="ts">

</script>


<template>
    <div class="box-main">
        <ul class="products-list">
            <ProductsCategories />
        </ul>
    </div>
</template>

<style>
.products-list {

    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(246px, 1fr));

    list-style-type: none;
    padding: 0;
    margin: 0;
    gap: 10px;
}

.box-main {
    max-width: 1536px;
    width: 100%;
    margin: 0 auto;
}
</style>