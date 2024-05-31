<template>
  <!-- 상세 -->
  <div v-if="modalFlg" class="board-detail-box">
        <div class="item">
            <img :src="boardData.img">
            <div class="etc-box">
              <span>좋아요 : {{ boardData.like }}</span>
              <button @click="$store.dispatch('upLike', boardData.id), likeToggle(boardData)">좋아요</button>
            </div>
            <hr>
            <p>{{ boardData.content }}</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : {{ boardData.name }}</span>
                <router-link to="/board/update">
                  <button v-if="$store.state.userInfo.id === boardData.user_id" @click="$store.dispatch('getBoardList', boardData.id), $store.state.boardUpdateData = boardData " class="btn btn-close btn-bg-black">수정</button>
                </router-link>
                <button v-if="$store.state.userInfo.id === boardData.user_id" @click="$store.dispatch('deleteBtn', boardData.id), closeDetail()" class="btn btn-close btn-bg-black">삭제</button>
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
import { useRoute } from 'vue-router';

const store = useStore();
const router = useRoute();


onBeforeMount(() => {
  if(store.state.boardData.length < 1 && router.path == '/board') {
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

function likeToggle(boardData) {
  if(boardData.like_chk == 1) {
    boardData.like_chk = 0;
    boardData.like--;
  } else {
    boardData.like_chk = 1;
    boardData.like++;
  }
}

</script>
<style>
@import url('../css/boardList.css');
</style>
