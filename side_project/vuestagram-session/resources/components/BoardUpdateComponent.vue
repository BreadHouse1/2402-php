<template>
  <form class="form-box" id="boardUpdateForm">
    <h3 class="form-title">글 수정</h3>
    <img v-if="preview == ''" :src="boardData.img">
    <img v-else :src="preview">
    <textarea name="content" placeholder="내용을 적어주세요." max="200">{{ boardData.content }}</textarea>
    <input @change="setFile" type="file" name="img" accept="image/*">
    <button @click="$store.dispatch('UpdateBoard')" type="button" class="btn btn-submit btn-bg-black">수정</button>
    <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
    <input type="hidden" :value="boardData.id">
  </form>
</template>

<script setup>
  import { ref } from 'vue';
  import { useStore } from 'vuex';
  

  const preview = ref('');
  const store = useStore();

  const boardData = store.state.boardUpdateData;
 
  console.log(store.state.boardUpdateData)

  function setFile(e) {
    const file = e.target.files[0];
    console.log(file);
    preview.value = URL.createObjectURL(file);
}
</script>

<style>  
</style>
