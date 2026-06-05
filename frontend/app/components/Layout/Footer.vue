<script setup lang="ts">
const links = ref([
    {
        text: '',
        link: ''
    }
]);
</script>

<template>
    <div class="box-footer">
        <nav class="navigation-footer">
            <div class="box-nav-footer">
                <p class="title-colum">Связь с нами</p>
                <ul class="list-nav">
                    <li>
                        <a class="hover-black" href="">+7 (351) 750-18-86 - </a>
                        <span>Запчасти горелок</span>
                    </li>
                    <li>
                        <span>ПН-ПТ 09:00 - 19:00</span>
                    </li>
                    <li><a class="hover-black" href="">snab@ruf-burners.ru</a></li>
                </ul>
            </div>
            <div class="box-nav-footer ">
                <p class="title-colum">Получене и оплата</p>
                <ul class="list-nav">
                    <li>
                        <a class="hover-black">Доставка</a>
                    </li>
                    <li>
                        <a class="hover-black" href="">Способы оплаты</a>
                    </li>
                </ul>
            </div>
            <div class="box-nav-footer ">
                <p class="title-colum">Сервис и поддержка</p>
                <ul class="list-nav">
                    <li>
                        <a class="hover-black" href="">Возврат и обмен товара</a>
                    </li>
                    <li>
                        <a class="hover-black" href="">Гарантия и ремонт</a>
                    </li>
                </ul>
            </div>
            <div class="box-nav-footer">
                <p class="title-colum">Информация</p>
                <ul class="list-nav">
                    <li>
                        <a class="hover-black" href="">О компании</a>
                    </li>
                    <li>
                        <a class="hover-black" href="">Контакты</a>
                    </li>
                    <li>
                        <a class="hover-black" href="">Пользовательское соглашение</a>
                    </li>
                    <li>
                        <a class="hover-black">Точность информации о товарах</a>
                    </li>
                    <li>
                        <a class="hover-black" href="">Политика конфиденциальности</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="running-title">
            © Компания ООО АНКАС 2014 - 2026. Все права защищены.
        </div>
    </div>
</template>

<style scoped>
.title-colum {
    font-weight: bold;
    font-size: 18px;
}

.box-footer {
    max-width: 1536px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.navigation-footer {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 30px;
    width: 100%;
}

.list-nav {
    display: flex;
    flex-direction: column;

    padding: 0;
    list-style-type: none;
    color: gray;
    font-size: 15px;

    gap: 10px;
}

a {
    text-decoration: none;
    color: gray;
}
</style>