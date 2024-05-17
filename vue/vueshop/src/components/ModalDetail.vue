<template>

    <transition name="container">
        <!-- 모달 -->
        <div class="bg_black" v-if="data.flgModal">
            <div class="bg_white">
            <img :src=" data.modalList.img ">
            <h4>{{ data.modalList.productName }}</h4>
            <p>{{ data.modalList.productContent }}</p>
            <p>{{ data.modalList.price }}원</p>
            <input type="number" min="1" v-model="count">
            <br>
            <br>
            <p>총액 : {{ data.modalList.price * count }}원</p>
            <button @click="close()">닫기</button>
        </div>
      </div>
    </transition>


</template>
<script setup>
    import { defineProps, ref, defineEmits } from 'vue';
    const data = defineProps({
        'modalList': Object
        ,'flgModal': Boolean
    });

// 총액 처리 부분
const count = ref( 1 )
const emit = defineEmits(['closemodal'])

function close() {
    count.value = 1 ;
    emit('closeModal');
}
</script>
<style>
/* transition : transition으로 감싼 요소에 애니메이션 추가*/
/* enter ~~ leave ~~ 다 고정된거임 */
/* enter는 등장 이벤트 leave는 퇴장 이벤트
   from은 어떻게 시작할지
   active는 어떻게 변할지
   to는 어떻게 끝날지 */
.container-enter-from {
    opacity: 0;
}
.container-enter-active {
    transition: 1s ease;
}
.container-enter-to {
    opacity: 1;
}


.container-leave-from {
    transform: translateX(0px);
}
.container-leave-active {
    transition: all 200s;
}
.container-leave-to {
    transform: translateX(10000px);
}
</style>