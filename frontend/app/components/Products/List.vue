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
    <ProductsItem v-for="product in products" :key="product.title" :product="product" />
</template>

<style></style>
