<script setup lang="ts">

const props = defineProps({
  text: { type: String, required: true },
  query: { type: String, default: '' }
});

const TextToken = (tokenProps: { content: string }) => h('span', { class: 'list-span' }, tokenProps.content);
const HighlightToken = (tokenProps: { content: string }) => h('span', { class: 'highlight' }, tokenProps.content);

const tokens = computed(() => {
  if (!props.query) {
    return [{ type: 'text', content: props.text }];
  }

  const escapedQuery = props.query.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
  const regex = new RegExp(`(${escapedQuery})`, 'gi');
  const parts = props.text.split(regex);

   return parts.reduce<{type:string; content:string}[]>((accum, part) => {
    if (part === "") {
      return accum;
    }
    const isMatch = part.toLowerCase() === props.query.toLowerCase();
    accum.push({
      type: isMatch ? 'highlight' : 'text',
      content: part
    });
    return accum;
  }, []);
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
