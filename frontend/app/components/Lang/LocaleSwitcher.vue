<script setup lang="ts">
const { locale, setLocale } = useI18n();

const languages = [
  { code: 'en', name: 'English' },
  { code: 'ru', name: 'Русский' }
];

const switchLanguage = (langCode: string) => {
  setLocale(langCode as 'en' | 'ru');
};
</script>

<template>
  <div class="locale-switcher">
    <button
      v-for="lang in languages"
      :key="lang.code"
      @click="switchLanguage(lang.code)"
      :class="{ active: locale === lang.code }"
    >
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