<script setup lang="ts">
const modalActive = ref(false);
const input = ref('');
const searchActive = ref(false);


function searchActiveOff() {
    modalActive.value = false
    input.value = ''
}

function searchActiveOn() {
    modalActive.value = true
}

watch(modalActive, (isActive) => {
    if (isActive) {

        document.body.style.overflow = 'hidden'
    } else {

        document.body.style.overflow = ''
    }
})

</script>

<template>
    <div class="block">
        <div @click="searchActiveOff" v-if="modalActive" class="overlay"></div>
        <div v-if="modalActive" class="modal">
            <button @click="searchActiveOff" class="button-exit">
                Отмена
            </button>
            <ProductsSearchMobilePromt :term="input" />
            <ProductsSearchMobileProducts :term="input" />
        </div>
        <div class="search-wrapper" :class="{ 'is-active': modalActive }">

            <search class="input-block">
                <input v-model="input" @click="searchActiveOn" class="input" type="text">

                    <button class="search-button" alt="поиск">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>

            </search>
        </div>
    </div>
</template>

<style scoped>
.button-exit {
    position: fixed;
    top: 10px;
    left: 80%;
}

.search-wrapper {
    position: relative;
    width: 100%;
    z-index: 100;
    transition: all 0.3s;
}

.search-wrapper.is-active {
    position: fixed;
    left: 20px;
    transform: translateY(-60px);
    width: 70%;
}

.block {
    z-index: 9999;
    position: relative;
}

.input-block {

    display: flex;
    border: #e30016 solid 2px;
    border-radius: 5px;
    overflow: hidden;
    z-index: 2;
    width: 100%;
}


.input {
    width: 100%;
    border: none;
}

.search-button {
    color: white;
    background-color: #e30016;
    border: none;

}

.modal {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 5%;
    max-height: 100vh;
    min-height: 200px;

    width: 100%;
    margin-top: 10px;
    padding: 0;

    background: #ffffff;
    border-radius: 8px;
    overflow: auto;

    display: grid;
    grid-template-rows: repeat(2);
    gap: 10px;
    z-index: 2;
}

.overlay {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: white;
    z-index: 1;
}
</style>