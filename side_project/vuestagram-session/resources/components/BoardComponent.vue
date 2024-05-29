<template>
  <!-- 상세 -->
  <div v-if="modalFlg" class="board-detail-box">
        <div class="item">
            <img :src="boardData.img">
            <hr>
            <p>{{ boardData.content }}</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : {{ boardData.name }}</span>
                <button @click="$store.dispatch('deleteBtn', boardData.id), closeDetail()" class="btn btn-close btn-bg-black">삭제</button>
                <button @click="closeDetail()" class="btn btn-close btn-bg-black">닫기</button>
            </div>
        </div>
    </div>

  <!-- 리스트 -->
  <div class="board-list-box">
    <div v-for="(item, key) in $store.state.boardData" :key="key" class="item">
        <img @click="openDetail(item)" :src="item.img">
    </div>
  </div>
  <button v-if="$store.state.moreBoardFlg" @click="$store.dispatch('getMoreBoardData')" class="btn btn-bg-black btn-more" type="button">더보기</button>

</template>
<script setup>
import { onBeforeMount, ref, reactive } from 'vue';
import { useStore } from 'vuex';


const store = useStore();


onBeforeMount(() => {
  if(store.state.boardData.length < 1) {
    store.dispatch('getBoardData')
  }
})

// 상세 모달
const modalFlg = ref(false);
let boardData = reactive({});

function openDetail(data) {
    boardData = data;
    modalFlg.value = true;
}

function closeDetail() {
    boardData = {};
    modalFlg.value = false;
}

</script>
<style>
@import url('../css/boardList.css');
</style>
