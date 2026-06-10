<script setup>
const isCity = ref(false);

const toggleCity = () => { isCity.value = !isCity.value }
</script>

<template>
    <div class="block-city">
        <button @click="toggleCity" class="button-city">
            Москва
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4s-4 1.794-4 4s1.794 4 4 4m0-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2">
                </path>
                <path fill="currentColor"
                    d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819M12 4c3.309 0 6 2.691 6 6.005c.021 4.438-4.388 8.423-6 9.73c-1.611-1.308-6.021-5.294-6-9.735c0-3.309 2.691-6 6-6">
                </path>
            </svg>
        </button>
        <MobileLayoutCitiesSearchCity v-if="isCity" />
        <div class="block-call">
            <span class="call-back">Обратный звонок</span>
            <a href="" class="phone">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</template>
<style>
.block-city {
    display: flex;
    justify-content: space-between;
    padding-bottom: 10px;
    position: relative;
}

.block-call {
    display: flex;
    align-items: center;
    gap: 8px;
}

.call-back {
    text-decoration-style: dashed;
    cursor: pointer;
    color: #e30016;
    font-size: 12px;
    text-decoration-line: underline;
    text-underline-offset: 4px;
}

.button-city {
    color: #e30016;
    border: none;
    background-color: white;
    padding: 0;
    cursor: pointer;
}

.phone {
    display: flex;
    color: black;
    background-color: #e2e8f0;
    border-radius: 7px;
    padding: 4px 8px;
}
</style>