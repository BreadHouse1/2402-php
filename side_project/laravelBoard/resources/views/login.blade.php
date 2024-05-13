@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '로그인')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
{{-- <body class="vh-100"> --}}

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 300px" action="{{route('post.login')}}" method="post">
        @csrf
        {{-- 에러 메세지 표시 --}}
        {{-- laravel 객체 $errors->any() --}}
        @if($errors->any())
        <div class="form-text text-danger">
            {{-- 에러 메세지 루프처리 --}}
            @foreach($errors->all() as $error)
            <span>{{$error}}</span>
            <br>
            @endforeach()
        </div>
        @endif

        <label for="email" class="form-label">아이디</label>
        <input type="text" class="form-control mb-3" name="email" id="email">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control mb-3" name="password" id="password">
        <button type="submit" class="btn btn-dark">로그인</button>
    </form>
</main>
@endsection