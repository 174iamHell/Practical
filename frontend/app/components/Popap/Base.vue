<script setup>
const isModalOpen = ref(false);

const open = () => { isModalOpen.value = true }
const close = () => { isModalOpen.value = false }
console.log("isModal", isModalOpen)
defineExpose({ open, close })
</script>

<template>
    <Teleport to="body">
        <slot v-if="isModalOpen" />
    </Teleport>
</template>
