<script setup lang="ts">

</script>


<template>

    <div class="box-main">
        <ul class="products-list">
            <ProductsCategories />
        </ul>
    </div>
</template>

<style scoped>
.products-list {

    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

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

@media (max-width: 768px) {
    .products-list {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 8px;
    }
}

@media (max-width: 480px) {
    .products-list {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 6px;
    }
}
</style>