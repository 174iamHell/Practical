<script setup>

const products = ref([
    {
        title: 'Дизельная горелка RUF RTL 20',
        price: '69 500 ₽',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/453/item/gorelki/ruf-rtl-20-126-512169.jpg'
    }, {
        title: 'Житкотопливный электромагнитный клапан RUF',
        price: '3 500',
        image: 'https://ruf-burners.ru/files/b/000/364/item/ruf.webp'
    },
    {
        title: 'Кабель розжига RUF BTGY-G5x550-A',
        price: '2 250',
        image: 'https://ruf-burners.ru/files/b/000/364/item/ruf.webp'
    }, {
        title: 'Дизельная горелка RUF 40 G20',
        price: '66 000',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/116/281/item/gorelki/ruf-40-g20-113-508180.jpg'
    }, {
        title: 'Газовая горелка RUF RTG 12 L250',
        price: '113 000',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/124/828/item/gorelki/ruf-rtg-12-l250-1388-508095.jpg'
    },
    {
        title: 'Кабель электрода ионизации RUF BTGY-L5x580-4B',
        price: '2 200',
        image: 'https://ruf-burners.ru/files/b/000/364/item/ruf.webp'
    }, {
        title: 'Дизельная горелка RUF RTL 10',
        price: '59 500',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/116/280/item/gorelki/ruf-40-g10-114-508168.jpg'
    }, {
        title: 'Дизельня грелка RUF 40 G10',
        price: '60 500',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/116/280/item/gorelki/ruf-40-g10-114-508168.jpg'
    }, {
        title: 'Дизельная горелка RUF RTL 14',
        price: '67 500',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/449/item/gorelki/ruf-rtl-3-130-512274.jpg'
    }, {
        title: 'Дизельная горелка RUF RTL 3',
        price: '55 000',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/449/item/gorelki/ruf-rtl-3-130-512274.jpg'
    }, {
        title: 'Жидкотопливный фильтр RUF RP 3/8',
        price: '1 300',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/494/item/filtry-dlya-gorelok/ruf-ru0005070237-1373-508011.jpg'
    }, {
        title: 'Газовая горелка RUF RTG 6',
        price: '96 000',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/476/item/gorelki/ruf-rtg-6-97-508653.jpg'
    }
]);
</script>

<template>
    <ul>
        <ContentProductsItem v-for="product in products" :key="product.id" :product="product" />
    </ul>
    <li v-for="product in products" :key="product.title" class="card-list">
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