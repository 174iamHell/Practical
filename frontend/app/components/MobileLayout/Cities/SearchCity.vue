<script setup lang="ts">
import { async } from '@ankasru/utils-ts';
import {
    ComboboxContent,
    ComboboxEmpty,
    ComboboxInput,
    ComboboxItem,
    ComboboxRoot,
    ComboboxViewport,
} from 'reka-ui'

const searchActive = ref(false)
const searchQuery = ref('');

const emit = defineEmits<{
    (e: 'selectCity', city: { id: number; name: string }): void
}>()

const handleSelectCity = (cityName: string) => {
    const selected = cities.value?.find(city => city.name === cityName);
    if (selected) {
        emit('selectCity', selected);
    }
}


const { data: cities, execute } = useFetch('/api/cities/suggestions', {
    immediate: true,
    server: false,
    query: {
        search: searchQuery
    }
})

const search = async.debounce({
    callback: () => {
        execute()
    },
    timeout: 1000
});

watch(searchQuery, () => {
    search()
})


watch(searchActive, (isActive) => {
    if (isActive) {

        document.body.style.overflow = 'hidden'
    } else {

        document.body.style.overflow = ''
    }
})


</script>
<template>
    <div class="block-search-city ">
        <h2 class="title">Выберите ваш город</h2>
        <ComboboxRoot defaultOpen :ignore-filter="true">
            <ComboboxInput :display-value="(v) => ''" class="search-input" v-model="searchQuery" type="text" />
            <ComboboxContent class="list-city">
                <ComboboxViewport>
                    <ComboboxEmpty>Города не найдены</ComboboxEmpty>
                    <ComboboxItem v-for="city in cities" :key="city.id" :value="city.name"
                        @click="handleSelectCity(city.name)">
                        <span @click="" class="span-title cursor-pointer">{{ city.name }}</span>
                    </ComboboxItem>
                </ComboboxViewport>
            </ComboboxContent>
        </ComboboxRoot>
    </div>
</template>



<style>
.block-search-city {
    position: absolute;
    z-index: 99999;
    top: 100%;

    border-radius: 5px;
    background-color: white;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15);
}

.list-city {
    list-style: none;
    padding: 8px;
    margin: 0;
    overflow-y: scroll;
    max-height: 400px;
}

.title {
    font-size: 15px;
    margin: 8px;
}

.search-input {
    width: auto;
    border: #e30016 solid 2px;
    border-radius: 5px;
    outline: none;
    margin-left: 5px;
}

.span-title {
    font-size: 12px;
}
</style>