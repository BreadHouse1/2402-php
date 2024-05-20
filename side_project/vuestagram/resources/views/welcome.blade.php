<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- asset은 기본 값이 resources로 돼있음 --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Vuestagram</title>
</head>
<body>
    <div id="app">
        {{-- blade 템플릿에서 컴포넌트를 불러올때는 AppComponent를 App-Component로 써야 불러올 수 있다. --}}
        <App-Component></App-Component>
    </div>
</body>
</html>