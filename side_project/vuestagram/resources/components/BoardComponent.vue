<template>
    <!-- 리스트 -->
    <div class="board-list-box">
        <div v-for="(item, key) in $store.state.boardList" :key="key" class="item">
            <img @click="openModal(item)" :src="item.img">
        </div>
    </div>
    <a href="#" class="btn btn-bg-black btn-fixed">TOP</a>

    <!-- 상세 모달 -->
    <div v-if="modalFlg" class="board-detail-box">
        <div class="item">
            <img :src="boardData.img">
            <hr>
            <p>{{ boardData.content }}</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : {{ boardData.name }}</span>
                <button @click="modalFlg = false" class="btn btn-close btn-bg-black">닫기</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onBeforeMount, ref, reactive } from 'vue';
import store from '../js/store';

// 상세 모달 처리
const modalFlg = ref(false);
let boardData = reactive({});

function openModal(data) {
    boardData = data;
    modalFlg.value = true;
}


onBeforeMount(() => {
    // console.log('보드 비포 마운트');
    // 게시글 리스트 없을때만 실행
    store.dispatch('getBoardList');
    if(store.state.boardList.length < 1) {
        // console.log('서버요청보냄');
        store.dispatch('getBoardList')
    }
});

// 스크롤 이벤트 (추가 게시글 획득)
window.addEventListener('scroll', boardScrollEvent);

// 쓰로틀링 : 이벤트가 발생하고 일정시간동안 발생하지 않게 함 
// 디바운싱 : 여러 이벤트가 동시에 발생할때 첫이벤트나 마지막이벤트만 db에 전하고 싶을때 사용

// 디바운싱 처리를 위한 플래그
let flg = true;

function boardScrollEvent() {
    if(flg && !store.state.noMoreBoardListFlg) {
        flg = false;
        const docHeight = document.documentElement.scrollHeight // 문서 기중 총 y축길이
        const winHeight = window.innerHeight// 브라우저 창의 y축 길이
        const nowHeight = window.scrollY; // 현재 스크롤 유지 
        const viewHeight = docHeight - winHeight // 끝까지 스크롤을 했을 때의 y축 위치
        // console.log('문서 y축' + docHeight) 
        // console.log('윈도우 y축' + winHeight) 
        // console.log('현재 y축' + nowHeight) 
        // console.log('뷰 y축' + viewHeight) 
        // console.log('----------------------------------------------') 
        
        // 스크롤이 최하단일 경우 처리
        if(viewHeight <= nowHeight) {
            store.dispatch('getAddBoardList');
        }

        flg=true;
    }
    // 이벤트 제거 처리
    if(store.state.noMoreBoardListFlg) {
        window.removeEventListener('scroll', boardScrollEvent)
    }
}

</script>

<style>
@import url('../css/boardList.css');
</style>