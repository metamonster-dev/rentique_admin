@extends('layouts.app')

@section('title', '로그인')

@section('no_header', true)

@section('content')
    @env('local')
        <div style="background-color: antiquewhite; padding: 10px; text-align: center; font-weight: bold; color: brown; position: fixed; width: 100%;">
        개발 서버용 로그인 정보 (개발 서버일 때만 뜹니다)<br><br>
        아이디: admin<br>
        비밀번호: 1
    </div>
    @endenv

    <div id="login" class="admin_common">
        <article id="login_area" class="board">
            <div class="logo_area">
                <img class="logo" src="{{ asset('images/logo_b.png') }}" alt="logo.png">
                <p>ADMIN</p>
            </div>
            <form id="login_form" class="admin_form" method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                @csrf

                <label for="admin_id">
                    <input type="text" id="admin_id" name="admin_id" placeholder="아이디를 입력해 주세요" value="{{ old('admin_id') }}">
                    <p class="warnning-txt" id="admin_id_error" style="display:none; color: red;">아이디를 입력해주세요</p>
                </label>

                <label for="admin_password">
                    <input type="password" id="admin_password" name="admin_password" placeholder="비밀번호 입력해 주세요">
                    <p class="warnning-txt" id="admin_password_error" style="display:none; color: red;">비밀번호를 입력해주세요</p>
                </label>

                <button type="submit" style="width: 100%">로그인</button>
            </form>
        </article>
    </div>

    <script>
        function validateForm() {
            const adminId = document.getElementById('admin_id').value;
            const adminPassword = document.getElementById('admin_password').value;

            const adminIdError = document.getElementById('admin_id_error');
            const adminPasswordError = document.getElementById('admin_password_error');

            let valid = true;

            if (adminId === '') {
                adminIdError.style.display = 'block';
                valid = false;
            } else {
                adminIdError.style.display = 'none';
            }

            if (adminPassword === '') {
                adminPasswordError.style.display = 'block';
                valid = false;
            } else {
                adminPasswordError.style.display = 'none';
            }

            return valid;
        }
    </script>
@endsection
