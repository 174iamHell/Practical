<script setup lang="ts">
const isModalOpen = ref(false);

const open = () => { isModalOpen.value = true }
const close = () => { isModalOpen.value = false }
defineExpose({ open, close })
</script>

<template>
    <Teleport to="body">
        <slot v-if="isModalOpen" />
    </Teleport>
</template>
