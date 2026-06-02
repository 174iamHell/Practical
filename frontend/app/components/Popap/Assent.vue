<script setup>
const isVisible = ref(true);


const isCookieAccept = useCookie('openCookie', { default: () => false })

/*onMounted(() => {
    if (!isCookieAccept.value) {
        setTimeout(() => {
            isVisible.value = true
        }, 7000);
    }
})
    */

function onAccepted() {
    isCookieAccept.value = true
    isVisible.value = false;
}
</script>

<template>
    <Teleport to="body">
        <div class="overlay" v-if="isVisible">
            <div class="modal">
                <h2 class="title">Согласие на обработку Cookies и других данных</h2>
                <p class="text">Используя сайт, вы даете согласие на обработку Cookies и других данных, в соответствии с
                    Политикой конфиденциально сти и с пользовательским соглашением.</p>
                <button @click="onAccepted()" class="ok">OK</button>
            </div>
        </div>
    </Teleport>
</template>


<style scoped>
.modal {
    position: fixed;
    z-index: 999;
    bottom: 10000px;
    right: 40px;
    display: flex;
    flex-direction: column;
    width: 400px;
    height: fit-content;


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
    z-index: 9999;
}
</style>