<script setup lang="ts">
const refPopap = useTemplateRef('myPopap')

const isCookieAccept = useCookie('openCookie', { default: () => false })

onMounted(() => {
    if (!isCookieAccept.value) {
        setTimeout(() => {
            refPopap.value?.open()
        }, 7000);
    }
})

function onAccepted() {
    isCookieAccept.value = true
    refPopap.value?.close();
}
</script>

<template>
    <PopapModal :top="75" :left="75" ref="myPopap">
        <div class="baner">
            <h2 class="title">Согласие на обработку Cookies и других данных</h2>
            <p class="text">Используя сайт, вы даете согласие на обработку Cookies и других данных, в соответствии с
                Политикой конфиденциально сти и с пользовательским соглашением.</p>
            <button @click="onAccepted()" class="ok">OK</button>
        </div>
    </PopapModal>
</template>


<style scoped>
.baner {
    width: 400px;
}
</style>