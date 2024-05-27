<template>
  <div class="form-box">
    <h3 class="form-title">회원가입</h3>
    <input v-model="registUserInfo.account" type="text" name="account" placeholder="아이디">
    <input v-model="registUserInfo.password" type="password" name="password" placeholder="비밀번호" autoComplete="off">
    <input v-model="registUserInfo.chkpassword" type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
    <input v-model="registUserInfo.name" type="text" name="name" placeholder="이름" autoComplete="off">
    <div class="radio-box">
      <div>
        <label for="male">남자</label>
        <input v-model="registUserInfo.gender" type="radio" name="name" id="male" value="0">
      </div>
      <div>
        <label for="female">여자</label>
        <input v-model="registUserInfo.gender" type="radio" name="name" id="female" value="1">
      </div>
    </div>
    <input @change="setFile" type="file" name="profile" accept="image/*">
    <hr>
    <button @click="$store.dispatch('storeregist', registUserInfo)" class="btn btn-submit btn-bg-black">회원가입</button>
    <button @click="$router.back()" class="btn btn-submit">취소</button>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
const registUserInfo = reactive({
    account: '',
    password: '',
    chkpassword: '',
    name: '',
    gender: '',
    profile: null,
});

function setFile(e) {
  registUserInfo.profile = e.target.files[0];
    preview.value = URL.createObjectURL(registUserInfo.profile);
}

</script>

<style>
</style>
