<script setup>
const value = ref();

function onSearch() {
    execute();
}
</script>

<template>
    <div>
        <search>
            <input v-model="value" @change="onSearch" />
        </search>
    </div>
</template>