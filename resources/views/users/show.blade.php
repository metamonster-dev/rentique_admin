@extends('layouts.app')

@section('title', '일반회원 상세')

@section('content')
    <section id="admin_contents_wrap">
        <p class="title">회원관리 / 일반회원</p>
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
                    <th>가입일</th>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
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
            <p class="board_name mt_40">메모</p>
            <label>
                <input type="text" name="memo" id="memo" placeholder="메모를 입력해주세요." class="w-100" value="{{ $user->memo }}" maxlength="100">
                <p class="comment">
                    <span class="count_leng">{{ strlen($user->memo) }}</span> / 100
                </p>
            </label>
        </article>
        <div class="btm btn_area">
            <button onclick="location.href='{{ route('users.index') }}'">목록</button>
            <button id="delete-btn">탈퇴</button>
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

        // 탈퇴 버튼 클릭 처리
        document.getElementById('delete-btn').addEventListener('click', function() {
            if (confirm('{{ $user->name }}님을 정말로 탈퇴 처리하시겠습니까?')) {
                fetch('{{ route('users.destroy', $user->id) }}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            let errorMessage = data.errors.memo ? data.errors.memo[0] : '입력 오류가 발생했습니다.';
                            alert(errorMessage);
                            throw new Error(errorMessage);
                        });
                    }
                    return response.json();
                }).then(data => {
                    alert(data.message);
                    if (data.success) {
                        window.location.href = '{{ route('users.index') }}';
                    } else {
                        window.location.reload();
                    }
                })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('네트워크 오류가 발생했습니다.');
                    });
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
                fetch('{{ route('users.update', $user->id) }}', {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        memo: memo
                    })
                }).then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            let errorMessage = data.errors.memo ? data.errors.memo[0] : '입력 오류가 발생했습니다.';
                            alert(errorMessage);
                            throw new Error(errorMessage);
                        });
                    }
                    return response.json();
                }).then(data => {
                    alert(data.message);
                    if (data.success) {
                        window.location.href = '{{ route('users.index') }}';
                    } else {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('네트워크 오류가 발생했습니다.');
                });
            }
        });
    </script>
@endsection
