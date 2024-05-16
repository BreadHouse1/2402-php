<template>
<!-- 모달 -->
    <div class="bg_black" v-if="data.flgModal">
        <div class="bg_white">
        <img :src=" data.modalList.img ">
        <h4>{{ data.modalList.productName }}</h4>
        <p>{{ data.modalList.productContent }}</p>
        <p>{{ data.modalList.price }}원</p>
        <button @click= "data.flgModal = !data.flgModal">닫기</button>
    </div>
  </div>
</template>
<script setup>
    import { defineProps } from 'vue';
    const data = defineProps({
        'modalList': Object
        ,'flgModal': Boolean
    });
</script>
<style>
    
</style>