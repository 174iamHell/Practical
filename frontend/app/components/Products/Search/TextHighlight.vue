<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

const props = defineProps({
  text: { type: String, required: true },
  query: { type: String, default: '' }
});

const tokens = computed(() => {
  if (!props.query) {
    return [{ tag: 'span', attrs: { class: 'list-span' }, content: props.text }];
  }

  const escapedQuery = props.query.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
  const regex = new RegExp(`(${escapedQuery})`, 'gi');
  const parts = props.text.split(regex);

  return parts.reduce<{ tag: string; attrs: HTMLAttributes; content: string }[]>((accum, part) => {
    if (part === "") {
      return accum;
    }
    const isMatch = part.toLowerCase() === props.query.toLowerCase();
    accum.push({
      content: part,
      tag: 'span',
      attrs: {
        class: isMatch ? 'highlight' : 'list-span'
      }
    });
    return accum;
  }, []);
});
</script>

<template>
  <span>
    <component :is="token.tag" v-bind="token.attrs" v-for="(token) in tokens">
      {{ token.content }}
    </component>
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
