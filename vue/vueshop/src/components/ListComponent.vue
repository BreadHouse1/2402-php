<template>
    <div v-for="item in data.products" :key="item.productName">
      <div>
        <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
        <p>{{ item.price }}원</p>
        <!-- <button @click="item.price += item.price">가격증가</button> -->
      </div>
    </div>
    <!-- 부모쪽에서 전달한 정보 표시 -->
    <slot></slot>
    <ProvideTest />

</template>
<script setup>
import { defineProps } from 'vue'
import ProvideTest from './ProvideTest.vue';
const data = defineProps({
  'products': Array
});

</script>
<style>
    
</style>