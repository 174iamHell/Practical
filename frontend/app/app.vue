<script setup>
const { device } = useDevice()
</script>

<template>
  <div>
    <NuxtLayout :name="device">
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>
