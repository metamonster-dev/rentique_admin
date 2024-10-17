@extends('layouts.app')

@section('title', '탈퇴회원')

@section('content')
    <section id="admin_contents_wrap">
        <p class="title">회원관리 / 탈퇴회원</p>
        <article class="board">
            <p class="board_name"><span class="accent">{{ $user->name }}</span>님의 회원정보</p>
            <table id="member_detail_table" class="table_default">
                <tr>
                    <th>아이디</th>
                    <td>{{ $user->email }}</td>
                    <th>이름</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>휴대폰번호</th>
                    <td>{{ $user->phone_number }}</td>
                    <th>생년월일</th>
                    <td>{{ $user->birthday }}</td>
                </tr>
                <tr>
                    <th>성별</th>
                    <td>{{ $user->gender === 1 ? '남자' : '여자' }}</td>
                    <th>탈퇴일</th>
                    <td>{{ $user->deleted_at->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>주소</th>
                    <td>{{ $defaultShippingAddress->address1 }} {{ $defaultShippingAddress->address2 }}</td>
                    <th>적립금</th>
                    <td>{{ number_format($totalPoints) }}</td>
                </tr>
                <tr>
                    <th>선택정보수집 및 마케팅 수신 동의</th>
                    <td colspan="3">{{ $user->marketing_agreement === 1 ? '동의 함' : '동의 안함' }}</td>
                </tr>
            </table>

            <p class="board_name mt_40">탈퇴사유</p>
            <label>
                <input type="text" class="w-100" value="{{ $user->withdrawal_reason ?? '-' }}" readonly >
            </label>

            <p class="board_name mt_40">메모</p>
            <label>
                <input type="text" name="memo" id="memo" placeholder="메모를 입력해주세요." class="w-100" value="{{ $user->memo }}" maxlength="100">
                <p class="comment">
                    <span class="count_leng">{{ strlen($user->memo) }}</span> / 100
                </p>
            </label>
        </article>
        <div class="btm btn_area">
            <button onclick="location.href='{{ route('withdrawnUsers.index') }}'">목록</button>
            <button id="restore-btn">복구</button>
            <button id="save-btn">저장</button>
        </div>
    </section>

    <script>
        // 메모 글자 수 표시 및 제한
        document.getElementById('memo').addEventListener('input', function() {
            const memoInput = this;
            const maxLength = 100;
            const currentLength = memoInput.value.length;
            const countLeng = document.querySelector('.count_leng');

            countLeng.textContent = currentLength; // 현재 글자 수 업데이트

            if (currentLength > maxLength) {
                alert('100자를 초과할 수 없습니다.');
                memoInput.value = memoInput.value.substring(0, maxLength);
            }
        });

        // 복구 버튼 클릭 처리
        document.getElementById('restore-btn').addEventListener('click', function() {
            if (confirm('{{ $user->name }}님을 복구 처리하시겠습니까?')) {
                fetchRequest('{{ route('withdrawnUsers.restore', $user->id) }}', 'PATCH', null, '{{ route('withdrawnUsers.index') }}');
            }
        });

        // 메모 저장 버튼 클릭 처리
        document.getElementById('save-btn').addEventListener('click', function() {
            const memo = document.querySelector('input[name="memo"]').value;

            if (!memo) {
                alert('메모를 입력해주세요.');
                return;
            }

        if (confirm('메모를 저장하시겠습니까?')) {
            fetchRequest('{{ route('withdrawnUsers.update', $user->id) }}', 'PATCH', {memo: memo}, '{{ route('withdrawnUsers.index') }}');
        }
        });
    </script>
@endsection
