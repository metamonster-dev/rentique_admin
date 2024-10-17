<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="@yield('og:title', '렌티크 관리자')">
    <meta property="og:description" content="@yield('og:description', '렌티크 관리자 페이지')">
    <meta property="og:image" content="@yield('og:image', asset('OG.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <title>@yield('title', 'RENTIQUE')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" /> <!--AOS 애니메이션-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" /> <!--스와이퍼-->
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.css" />
{{--    <link rel="stylesheet" href="./css/custom.css" />--}}
{{--    <link rel="stylesheet" href="./css/admin.css" />--}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" >
    <script src="{{ asset('js/common.js') }}" defer></script>
</head>

@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif

@if ($errors->any())
    <script>
        let errorMessage = '';
        @foreach ($errors->all() as $error)
            errorMessage += '{{ $error }}\n';
        @endforeach
        alert(errorMessage);
    </script>
@endif

<body>
    <div class="admin_common">
{{--        @if (Route::currentRouteName() !== 'login')--}}
{{--            @include('partials.header')--}}
{{--        @endif--}}
        @hasSection('no_header')
        @else
            @include('partials.header')
        @endif
        @yield('content')
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
