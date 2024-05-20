<template>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <router-link to="/board"><h1>Vuestagram</h1></router-link>
                </div>
                <img class="img-logo" src="/logo.jpg">
                <div class="btn-group">
                    <div v-if="true">
                        <!-- router-link에 있는 to를 사용해서 해당 경로로 보냄 to말고도 다른 속성들도 있음 -->
                        <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                        <router-link to="/login"><button class="btn btn-header btn-bg-white">가입하기</button></router-link>
                    </div>
                    <div v-else>
                        <button class="btn btn-header btn-bg-black">로그아웃</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>

    <!-- main -->
    <main>
        <div class="container">
            <!-- 설정한 router로 이동할때의 component를 불러와서 출력 처리함 -->
            <router-view></router-view>
        </div>
    </main>

    <!-- footer -->
    <footer>
        <p>footer</p>
    </footer>
</template>

<script setup>
</script>

<style>
@import url('../css/common.css');
</style>