<script setup lang="ts">
const modal = useTemplateRef('modal');

const { top, left } = defineProps<{
    top?: number,
    left?: number,
}>();

defineExpose({
    open: () => modal.value?.open(),
    close: () => modal.value?.close(),
}); 
</script>

<template>
    <PopapBase ref="modal">
        <div class="overlay">
            <div :style="{ top: (top || 0) + '%', left: (left || 0) + '%' }" class="modal">
                <slot />
            </div>
        </div>
    </PopapBase>
</template>

<style>
.modal {
    position: fixed;
    z-index: 999;
    display: flex;
    flex-direction: column;
    top: 20%;
    left: 50%;

    background: #ffffff;
    padding: 24px;
    border-radius: 8px;

}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 99999;
}
</style>