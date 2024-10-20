@extends('layouts.app')

@section('title', '탈퇴회원')

@section('content')
    <section id="admin_contents_wrap">
        <p class="title">회원관리 / 탈퇴회원 </p>
        <article class="board">
            <div class="filter_wrap">
                <form class="filter_wrap" method="GET" action="{{ route('withdrawnUsers.index') }}" onsubmit="return validateForm()">
                    <div>
                        <p class="name">탈퇴일</p>
                        <input type="date" id="start-date" name="start_date" value="{{ old('start_date', request('start_date')) }}"> -
                        <input type="date" id="end-date" name="end_date" value="{{ old('end_date', request('end_date')) }}">
                    </div>
                    <div>
                        <p>검색어</p>
                        <select id="search-type" name="search_type">
                            <option value="전체" {{ old('search_type', request('search_type')) === '전체' ? 'selected' : '' }}>전체</option>
                            <option value="아이디" {{ old('search_type', request('search_type')) === '아이디' ? 'selected' : '' }}>아이디</option>
                            <option value="이름" {{ old('search_type', request('search_type')) === '이름' ? 'selected' : '' }}>이름</option>
                            <option value="휴대폰번호" {{ old('search_type', request('search_type')) === '휴대폰번호' ? 'selected' : '' }}>휴대폰번호</option>
                        </select>

                        <input type="text" id="search-content" name="keyword" value="{{ old('keyword', request('keyword')) }}" style="width:260px" maxlength="255" placeholder="검색어를 입력해주세요.">
                        <button type="submit" id="fa-search"><i class="fa fa-search" aria-hidden="true"></i>검색</button>
                        <a href="{{ route('withdrawnUsers.index') }}">
                            <button type="button"><i class="fa fa-repeat" aria-hidden="true"></i>초기화</button>
                        </a>
                    </div>
                </form>
            </div>
        </article>

        <article id="search_result">
            <div class="btn_area">
                <button type="button" onclick="confirmRestore()">복구</button>
                {{--                <form method="POST" action="{{ route('withdrawnUsers.export.excel') }}">--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="green"><i class="fa fa-download" aria-hidden="true"></i>엑셀 다운로드</button>--}}
{{--                </form>--}}
            </div>

            <form id="restore-form" method="POST" action="{{ route('withdrawnUsers.bulkRestore') }}">
                @csrf
                @method('PATCH')
                <table class="table_default">
                    <thead>
                        <tr>
                            <th width="30px"><input id="selectAll" type="checkbox"></th>
                            <th width="50px">번호</th>
                            <th width="80px">관리</th>
                            <th width="300px">아이디</th>
                            <th width="80px">이름</th>
                            <th width="220px">휴대폰번호</th>
                            <th width="120px">생년월일</th>
                            <th width="80px">성별</th>
                            <th width="120px">탈퇴일</th>
                            <th>메모</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="selected_ids[]" value="{{ $user->id }}"></td>
                            <td>{{ ($users->total() - ($users->currentPage() - 1) * $users->perPage()) - $loop->index }}</td>
                            <td><button class="in_btn" type="button" onclick="location.href='{{ route('withdrawnUsers.show', $user->id) }}'">상세</button></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>{{ $user->gender === 1 ? '남자' : '여자' }}</td>
                            <td>{{ $user->deleted_at->format('Y-m-d') }}</td>
                            <td>{{ $user->memo ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">조회 결과가 없습니다</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </form>

            @include('components.pagination', ['paginator' => $users])
        </article>
    </section>

    <script>
        function confirmRestore() {
            const selectedUserIds = document.querySelectorAll('input[name="selected_ids[]"]:checked');

            if (selectedUserIds.length === 0) {
                alert('복구할 회원을 선택해 주세요.');
                return;
            }

            if (confirm(`${selectedUserIds.length}명의 회원을 복구 하시겠습니까?`)) {
                document.getElementById('restore-form').submit();
            }
        }
    </script>
@endsection
