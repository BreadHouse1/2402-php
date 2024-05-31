<template>
  <!-- header -->
  <header>
    <div class="header-container">
      <div class="header-content">
        <div class="title">
          <router-link  to="/"><h1>Vuestagram</h1></router-link>
        </div>
        <img class="img-logo" alt="logo" src="/logo.png">
        <div class="btn-group">
          <div v-if="!$store.state.authFlg">
            <router-link v-if="router.path === '/registration'" to="/login">
              <button class="btn btn-header btn-bg-black">로그인</button>
            </router-link>
            <router-link v-else-if="router.path === '/login'" to="/registration">
              <button class="btn btn-header btn-bg-black">가입하기</button>
            </router-link>
          </div>
          <div v-else>
            <button @click="$store.dispatch('logout')" class="btn btn-header btn-bg-black">로그아웃</button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <hr>

  <!-- Main -->
  <main>
    <UserInfoComponent v-if="$store.state.authFlg"/>
    <div class="container"> 
      <router-view></router-view>
    </div>
  </main>

  <!-- footer -->
  <footer>
    <p>ⓒ 2024. Meerkat All rights reserved.</p>
  </footer>
</template>

<script setup>
import { useRoute } from 'vue-router';
import UserInfoComponent from './UserInfoComponent.vue';

const router = useRoute()

</script>

<style>
@import url('../css/common.css');
</style>
