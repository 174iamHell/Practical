<script setup lang="ts">

const isVisible = ref(false);
const selectCity = useCookie('selectCity', { default: () => 'Челябинск' })
const querySearch = ref('');
const popupRef = useTemplateRef('myPopap');
const searchActive = ref(false);
const inputSearch = ref('');

const searchActiveInput = () => {
    return (inputSearch.value !== '' && searchActive.value);
}


const { data: dataCities, execute } = await useFetch('/api/cities/suggestions', {
    server: false,
    immediate: false,
    query: {
        search: querySearch
    }
});

function onOpen() {
    if (!Array.isArray(dataCities.value)) {
        execute();
    }
    isVisible.value = true;
}

function onClose() {
    isVisible.value = false;
}

function toggleBlock() {
    if (isVisible.value) {
        return onClose();
    }
    onOpen();
}

function onSelectCity(city: any) {

    selectCity.value = city.name;

    onClose();
}

function searchAсtiveOn() {
    searchActive.value = true;
}
function searchActiveOff() {
    searchActive.value = false;
}

</script>

<template>
    <div class="menu">
        <PopapModal :top="20" :left="40" ref="myPopap">
            <div class="flex title">
                <h2 class="h2-title">Обратный звонок</h2>
                <button @click="popupRef?.close" class="close-button flex">
                    <svg viewBox="0 0 24 24" width="25" height="25">
                        <path fill="currentColor"
                            d="m11.575 13.4-4.9 4.9a.948.948 0 0 1-.7.275.948.948 0 0 1-.7-.275.948.948 0 0 1-.275-.7.95.95 0 0 1 .275-.7l4.9-4.9-4.9-4.9A.948.948 0 0 1 5 6.4a.95.95 0 0 1 .275-.7.948.948 0 0 1 .7-.275.95.95 0 0 1 .7.275l4.9 4.9 4.9-4.9a.948.948 0 0 1 .7-.275.95.95 0 0 1 .7.275.948.948 0 0 1 .275.7.948.948 0 0 1-.275.7l-4.9 4.9 4.9 4.9a.949.949 0 0 1 .275.7.948.948 0 0 1-.275.7.948.948 0 0 1-.7.275.948.948 0 0 1-.7-.275l-4.9-4.9Z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="box-number">
                <div class="form-number">
                    <p class="p-box-number">Телефон</p>
                    <input type="text" alt="0000-000-0-000-">
                </div>
                <div class="form-name">
                    <p class="p-box-number">Фамилия Имя Отчество</p>
                    <input type="text" alt="Фамилия Имя Отчество">
                </div>
            </div>
            <button class="send-button flex">
                Отправить
            </button>
        </PopapModal>
        <div class="main-menu">
            <a class="box-logo" href="/">
                <img class="logo" src="/img/logo.jpeg" alt="LOGO">
            </a>
            <div class="catalog">
                <button class="button-catalog">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor"
                        class="bi bi-justify" viewBox="0 0 15 15">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                    Каталог
                </button>
            </div>
            <div class="search-block">
                <div @click="searchActiveOff" v-if="searchActive" class="overlay"></div>
                <div v-if="searchActiveInput()" class="modal">
                    <ProductsSearchPromt :term="inputSearch" />
                    <ProductsSearchProducts :term="inputSearch" />
                </div>
                <search class="search">
                    <div class="scan">
                        <input @click="searchAсtiveOn" v-model="inputSearch" class="input-search" type="text">
                        <button class="search-button" alt="поиск">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </search>
            </div>
            <nav class="panel">
                <ul class="navigation-panel">
                    <li class="list-navigation color-main-link hover-red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="32px" viewBox="0 0 24 24"
                            class="h-8 w-10">
                            <path fill="currentColor"
                                d="M9 14.25q-.525 0-.888-.363T7.75 13t.363-.888T9 11.75t.888.363t.362.887t-.363.888T9 14.25m6 0q-.525 0-.888-.363T13.75 13t.363-.888t.887-.362t.888.363t.362.887t-.363.888t-.887.362M12 20q3.35 0 5.675-2.325T20 12q0-.6-.075-1.162T19.65 9.75q-.525.125-1.05.188T17.5 10q-2.275 0-4.3-.975T9.75 6.3q-.8 1.95-2.287 3.388T4 11.85V12q0 3.35 2.325 5.675T12 20m0 2q-2.075 0-3.9-.787t-3.175-2.138T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22M10.65 4.125q1.05 1.75 2.85 2.813T17.5 8q.35 0 .675-.038t.675-.087Q17.8 6.125 16 5.063T12 4q-.35 0-.675.038t-.675.087m-6.225 5.35Q5.7 8.75 6.65 7.6t1.425-2.575Q6.8 5.75 5.85 6.9T4.425 9.475m3.65-4.45">
                            </path>
                        </svg>
                        <span class="span-navigation ">Войти</span>
                    </li>
                    <li class="list-navigation color-secont-link hover-red">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" title="Избранное" width="30px" height="30px">
                            <path fill="currentColor"
                                d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3">
                            </path>
                        </svg>
                        <span class="span-navigation ">Избраное</span>
                    </li>
                    <li class="list-navigation color-secont-link hover-red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                            title="Заказы">
                            <path fill="currentColor"
                                d="M5 8v11h14V8h-3v8l-4-2l-4 2V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zM10 8v4.75l2-1l2 1V8zM5 8h14z">
                            </path>
                        </svg>
                        <span class="span-navigation">Заказы</span>
                    </li>
                    <li class="list-navigation color-secont-link hover-red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                            title="Корзина">
                            <path fill="currentColor"
                                d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z">
                            </path>
                        </svg>
                        <span class="span-navigation">Корзина</span>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="second-menu">
            <div class="navigation-number">
                <div class="block-number">
                    <a class="number display-block" href="+73517501886">+7 (351) 750-18-86</a>
                    <span @click="popupRef?.open" class="tell-number display-block" role="button" tabindex="0">
                        Обратный звонок
                    </span>
                </div>
                <nav>
                    <ul class="navigation-pay flex">
                        <li>
                            <a class="link-pay hover-black" href="">возврат и обмен товара</a>
                        </li>
                        <li>
                            <a class="link-pay hover-black" href="">Способ оплаты</a>
                        </li>
                        <li>
                            <a class="link-pay hover-black" href="">Контакты</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="block-citys">
                <button @click="toggleBlock" class="city">
                    {{ selectCity }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4m0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2">
                        </path>
                        <path fill="currentColor"
                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819M12 4c3.309 0 6 2.691 6 6.005c.021 4.438-4.388 8.423-6 9.73c-1.611-1.308-6.021-5.294-6-9.735c0-3.309 2.691-6 6-6">
                        </path>
                    </svg>
                </button>
                <div v-if="isVisible" class="select-city">
                    <p class="title-search-citys">Выберите город</p>
                    <div class="search">
                        <form action="">
                            <input v-model="querySearch" @input="() => execute" class="city-input" type="text">
                            <ul ref="slider" class="list-citys">
                                <li v-for="city in dataCities" :key="city.id" @click="onSelectCity(city)"
                                    class="city-item hover-red" role="button" tabindex="0">{{
                                        city.name }}</li>
                            </ul>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.menu {
    max-width: 1536px;
    width: 100%;
    margin: 0 auto;
    padding: 4px 16px;
}

.main-menu {
    display: flex;
    gap: 20px;

    padding-top: 12px;
    padding-bottom: 12px;
}

.box-logo {
    display: block;
    height: 48px;
}

.logo {
    height: 48px;
    border-radius: 15px;
}

.catalog {
    display: flex;

    border: #e30016 solid 5px;
    border-radius: 10px;
}

.button-catalog {
    display: flex;
    align-items: center;
    gap: 5px;

    background-color: #e30016;
    font-size: 16px;
    color: white;
    font-weight: 500;

    border: none;

    height: 100%;
}

.navigation-panel {
    display: flex;
    margin: 0;
    padding: 0;
    list-style-type: none;
    gap: 40px;
}

.modal {
    position: absolute;
    z-index: 1;
    left: 0;
    top: 100%;


    width: 100%;
    margin-top: 10px;
    padding: 0;

    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;

    display: grid;
    grid-template-columns: 1fr 1fr;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1;
}



.list-products {
    margin: 0;
    padding: 0;
    list-style: none;
}

.search-block {
    z-index: 10000;
    position: relative;
    flex-grow: 1;
    display: flex;
}

.search {
    position: relative;

    margin: 0;
    padding: 0;
    display: flex;
    flex-grow: 1;
}

.input-search {
    margin: 0;
    flex-grow: 1;
    height: auto;
    padding: 0;
    border: none;
    outline: none;
    background-color: inherit;

}

.search-button {
    height: 100%;
    padding: 0;

    border: none;
    background-color: #e30016;
    color: white;

    margin: 0;
    height: auto;
    width: 35px;

    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
}

.scan {
    display: flex;
    flex-grow: 1;
    z-index: 1;

    background-color: #e9e9e9;
    padding: 4px 0 4px 16px;
    border: #e30016 solid 2px;
    border-radius: 7px;

    position: relative;
}

.scan:focus-within {
    background-color: white;
}

.panel {
    display: flex;

}

.color-main-link {
    color: black;
}

.color-secont-link {
    color: gray;
}

.list-navigation {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;

}

.span-navigation {
    font-size: 10px;
    font-weight: 600;
    line-height: 16px;
}

.second-menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.display-block {
    display: block;
}

.number {
    line-height: 28px;
    display: block;
    text-decoration: none;
    color: inherit;
    font-weight: 550;
}

.tell-number {
    line-height: 28px;
    font-size: 15px;

    color: #e30016;
    text-decoration-style: dashed;
    text-underline-offset: 4px;
    text-decoration-line: underline;

    cursor: pointer;
}

.block-number {
    display: flex;
    align-items: center;
    gap: 10px;
}

.navigation-number {
    display: flex;
    gap: 10px;
}

.link-pay {
    text-decoration: none;
    color: gray;
    font-size: 15px;
}

.flex {
    display: flex;
}

.navigation-pay {
    margin: 0;
    padding: 0;
    list-style-type: none;
    gap: 10px
}

.city {
    border: none;
    color: #e30016;
    background-color: white;
    font-weight: 550;
}

.block-citys {
    position: relative;
}

.select-city {
    position: absolute;
    z-index: 10;
    top: 20px;
    right: 10px;

    border-radius: 5px;
    background-color: white;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15);

    padding: 10px;
}

.title-search-citys {
    margin: 0;
    margin-bottom: 10px;
}

.list-citys {
    max-height: 300px;
    overflow-y: scroll;

    list-style: none;
    margin: 0;
    padding: 0;

}

.city-input {
    padding: 5px;
    border: #e30016 2px solid;
    border-radius: 5px;
    outline: none;
}

.city-item {
    cursor: pointer;
}




.h2-title {
    margin: 0;
}

.title {
    margin: 10px;
    justify-content: space-between;
}

.close-button {
    border-radius: 20px;
}

.send-button {
    margin-top: 10px;
    width: max-content;
}

.space-berween {
    justify-content: space-between;
}

.flex {
    display: flex;
}

.p-box-number {
    margin: 0;
}
</style>