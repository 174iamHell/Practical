<script setup>

const isModalOpen = ref(false);

const open = () => { isModalOpen.value = true }
const close = () => { isModalOpen.value = false }

defineExpose({ open, close })

</script>
<template>
    <Teleport to="body">
        <div v-if="isModalOpen" class="overlay" @click.self="isModalOpen = false">
            <div class="modal">
                <slot />
            </div>
        </div>
    </Teleport>
</template>
<style>
.modal {
    position: fixed;
    z-index: 999;
    top: 20%;
    left: 40%;
    display: flex;
    flex-direction: column;


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