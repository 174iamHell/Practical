<script setup>

const products = ref([
    {
        title: 'Дутьевые горелки',
        image: 'https://ruf-burners.ru/files/sp/027/05/000/113/453/item/gorelki/ruf-rtl-20-126-512169.jpg',

    },
    {
        title: 'Автоматы горения',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/401/small/avtomaty-goreniya-508108.jpg'

    },
    {
        title: 'Электродвигатели',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/407/small/elektrodvigateli-507944.jpg'

    },
    {
        title: 'Электроды',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/408/small/elektrody-507983.jpg'

    },
    {
        title: 'Кабели розжига и ионизации',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/409/small/kabeli-rozzhiga-i-ionizatsii-508758.jpg'

    },
    {
        title: 'Рабочие колеса вентиляторов',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/013/114/small/rabochie-kolesa-ventilyatorov-507984.jpg'

    },
    {
        title: 'Насосы для горелок',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/402/small/nasosy-dlya-gorelok-509035.jpg'

    },
    {
        title: 'Газовые рампы',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/013/675/small/gazovye-rampy-507940.jpg   '

    },
    {
        title: 'Топливные фильтры',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/000/415/small/filtry-dlya-gorelok-509039.jpg'

    },
    {

        title: 'Сильфонные компенсаторы',
        image: 'https://ruf-burners.ru/files/sp/027/04/000/013/543/small/silfonnye-kompensatory-509034.jpg'

    },
    {
        title: 'Запчасти комплектующих',
        image: 'https://ruf-burners.ru/images/empty.svg'
    }


]);
</script>

<template>
    <li v-for="product in products" :key="product.title" class="card">
        <a class="product hover-red" href="">
            <article class="block">
                <div class="block-product">
                    <picture>
                        <img class="img-product" alt="Дутьевые горелки RUF" placeholder=""
                            style="width: 100%; height: 157px;" :src="product.image">
                    </picture>
                </div>
                <span class="title">{{ product.title }}</span>
            </article>
        </a>
    </li>
</template>

<style>
.product {
    display: block;
    text-decoration: none;
    color: black;
    padding-bottom: 8px;
}

.block {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.block-product {}

.title {}
</style>