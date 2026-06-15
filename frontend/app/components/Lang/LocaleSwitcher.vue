<script setup lang="ts">
const { locale, locales, availableLocales, setLocale } = useI18n();

const switchLanguage = (langCode: typeof availableLocales[0]) => {
  setLocale(langCode);
};
</script>

<template>
  <div class="locale-switcher">
    <button v-for="lang in locales" :key="lang.code" @click="switchLanguage(lang.code)"
      :class="{ active: locale === lang.code }">
      {{ lang.name }}
    </button>
  </div>
</template>

<style scoped>
.locale-switcher {
  display: flex;
  gap: 10px;
}

button {
  background: none;
  border: none;
  cursor: pointer;
  padding: 5px 10px;
  color: #6a7282;
  font-size: 12px;
  transition: color 0.2s;
}

button.active {
  color: #e30016;
  font-weight: bold;
}
</style>