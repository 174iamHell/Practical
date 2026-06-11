<script setup lang="ts">
const { device } = useDevice()
</script>

<template>
  <div>
    <NuxtLayout :name="device">
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>
