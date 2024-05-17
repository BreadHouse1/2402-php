<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <HeaderComponent :navList="lists"/>
  <!-- 상품 리스트 -->
  <div>
    <ListComponent
      :products="products"
      @myOpenModal="myOpenModal"
      >
    
      <!-- slot : 자식쪽에서 <slot></slot> 부분에 전달하여 자식 컴포넌트에서 렌더링 -->
      <h3>부모 쪽에서 정의한 슬롯</h3>
    </ListComponent>
    <!-- <div v-for="item in products" :key="item.productName">
      <div>
        <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
        <p>{{ item.price }}원</p>
        <button @click="products[0].price += 10000">가격증가</button>
      </div>
    </div> -->
    <!-- <div> -->
      <!-- <h4 @click="myOpenModal(products[1])">{{ products[1].productName }}</h4> -->
      <!-- <p>{{ products[1].price }}원</p> -->
      <!-- <button @click="products[1].price += 5000">가격증가</button> -->
    <!-- </div> -->
    <!-- <div> -->
      <!-- <h4 @click="myOpenModal(products[2])">{{ products[2].productName }}</h4> -->
      <!-- <p>{{ products[2].price }}원</p> -->
      <!-- <button @click="products[2].price += 1000">가격증가</button> -->
    <!-- </div> -->
  </div>

  <!-- 모달 -->
  <ModalDetail 
  :modalList="product"
  :flgModal="flgModal"
  @closeModal="closeModal"
  />
</template>

<script setup>
import HeaderComponent from './components/HeaderComponent.vue';
import ListComponent from './components/ListComponent.vue';
import ModalDetail from './components/ModalDetail.vue';
import { ref, reactive, provide } from 'vue';
//-------------
// 데이터 바인딩
//-------------
// import { ref } from 'vue';

// const pants = ref('청바지');
// const price = ref(10000);

const products = reactive([
  {productName: '바지', price: 10000, productContent: '매우 아름다운 고양이입니다.', img: require('@/assets/img/cat1.png')},
  {productName: '티셔츠', price: 5000, productContent: '매우 아름다운 고양이입니다.', img: require('@/assets/img/cat2.png')},
  {productName: '양말', price: 1000, productContent: '매우 아름다운 고양이입니다.', img: require('@/assets/img/cat3.png')}
]);

const lists = reactive([
  {listName: '홈', listHref: '#'},
  {listName: '상품', listHref: '#'},
  {listName: '기타', listHref: '#'},
])
//-------
// 모달용
//-------
let product = reactive({});
const flgModal = ref(false);

function myOpenModal(item) {
  product = item;
  flgModal.value = true;
}

function closeModal() {
  flgModal.value = false;
}

// ---------------------
// Provide / Inject 연습
// ---------------------
const count = ref(0);

function addCount() {
  count.value++;
}

// Provide 설정
// Provide( '전달해줄이름' , {넘겨줄 요소1, 넘겨줄 요소2...})
provide('test', {
  count,
  addCount
});

</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
