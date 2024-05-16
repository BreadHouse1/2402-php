<template>
    <div class="nav" >
      <a v-for="item in data.navList" :key="item.listName" :href="item.listHref">{{ item.listName }}</a>
  </div>
</template>
<script setup>
  import { defineProps } from 'vue'

  const data = defineProps({
    'navList': Array
  });
</script>
<style>
    
</style>