<script setup lang="ts">
const{t} = useI18n({
    useScope:'local'
})
</script>
<template>
    <div class="block-contact">
        <a href="">{{ t('refound') }}</a>
        <a href="">{{ t('payment') }}</a>
        <a href="">{{ t('contact') }}</a>
    </div>
</template>
<style scoped>
.block-contact {
    display: flex;
    gap: 10px;
}

a {
    text-decoration: none;
    color: #6a7282;
    font-size: 12px;
    line-height: 20px;
}
</style>


<i18n lang="yaml">
en:
    refound: 'Product return'
    payment: 'Payment methods'
    contact: 'Contact us'
ru:
    refound: 'Возврат товара'
    payment: 'Способ оплаты'
    contact: 'Контакты'
</i18n>
