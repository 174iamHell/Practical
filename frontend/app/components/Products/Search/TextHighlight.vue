<script setup>
import { computed, h } from 'vue';

const props = defineProps({
  text: { type: String, required: true },
  query: { type: String, default: '' }
});

const TextToken = (tokenProps) => h('span', { class: 'list-span' }, tokenProps.content);
const HighlightToken = (tokenProps) => h('span', { class: 'highlight' }, tokenProps.content);

const tokens = computed(() => {
  if (!props.query) {
    return [{ type: 'text', content: props.text }];
  }

  const escapedQuery = props.query.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
  const regex = new RegExp(`(${escapedQuery})`, 'gi');
  const parts = props.text.split(regex);

  return parts
    .filter(part => part !== '')
    .map(part => {
      const isMatch = part.toLowerCase() === props.query.toLowerCase();
      return {
        type: isMatch ? 'highlight' : 'text',
        content: part
      };
    });
});
</script>

<template>
  <span>
    <component :is="token.type === 'highlight' ? HighlightToken : TextToken" v-for="(token) in tokens"
      :content="token.content" />
  </span>
</template>

<style scoped>
.highlight {
  color: #e30016;
  font-size: 14px;
  font-weight: 400;
}

.list-span {
  color: black;
  font-size: 14px;
  font-weight: 400;
}
</style>
