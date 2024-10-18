<meta name="csrf-token" content="{{ csrf_token() }}">

<section id="admin_header_wrap">
    <div id="admin_top_area">
        <div class="user_area">
            <p class="welcome"><b>관리자</b>님 안녕하세요.</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button onclick="handleLogout();" type="button">로그아웃</button>
            <button onclick="location.href=''" style="background:#7F23F3;" type="button">RENTIQUE</button>
        </div>
    </div>
    <div id="admin_side_area">
        <div class="logo_area">
            <a href="{{ route('dashboard') }}">
                <img class="logo" src="{{ asset('/images/logo_b.png') }}" alt="logo.png">
                <p>ADMIN</p>
            </a>
        </div>
        <div class="side_btm_area">
            <!--메뉴-->
            <ul id="adm_nav">
                <!--DEPTH 1-->
                <li class="adm_nav_depth1"><a href="{{ route('dashboard') }}"><span><i class="fa fa-home before" aria-hidden="true"></i>대시보드</span></a></li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-user before" aria-hidden="true"></i>회원관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="{{ route('users.index') }}">일반 회원</a></li>
                        <li><a href="{{ route('withdrawnUsers.index') }}">탈퇴 회원</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-gift before" aria-hidden="true"></i>상품관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./product01.html">상품 관리</a></li>
                        <li><a href="{{ route('categories.index') }}">카테고리 관리</a></li>
                        <li><a href="./product03.html">브랜드 관리</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-shopping-basket before" aria-hidden="true"></i>주문관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./order01.html">렌트관리</a></li>
                        <li><a href="./order02.html">취소관리</a></li>
                        <li><a href="./order03.html">반품관리</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-shopping-bag before" aria-hidden="true"></i>위탁관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./consignment01.html">위탁관리</a></li>
                        <li><a href="./consignment02.html">정산관리</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-clipboard before" aria-hidden="true"></i>콘텐츠관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./contents01.html">서비스소개</a></li>
                        <li><a href="./contents02.html">기획전</a></li>
                        <li><a href="./contents03.html">이벤트</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa  fa-list-alt before" aria-hidden="true"></i>게시판관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./board01.html">공지사항</a></li>
                        <li><a href="./board02.html">자주하는질문</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-heart before" aria-hidden="true"></i>프로모션관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./promotions01.html">쿠폰관리</a></li>
                        <li><a href="./promotions02.html">핫딜관리</a></li>
                        <li><a href="./promotions03.html">적립금관리</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth1"><a href="./reveiw.html"><span><i class="fa fa-pencil before" aria-hidden="true"></i>리뷰관리</span></a></li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-lightbulb-o before" aria-hidden="true"></i>문의관리</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./inquiry01.html">상품문의</a></li>
                        <li><a href="./inquiry02.html">1:1문의</a></li>
                    </ul>
                </li>
                <!--DEPTH 1-->
                <li class="adm_nav_depth2_group">
                    <p class="adm_nav_depth1"><span><i class="fa fa-cog before" aria-hidden="true"></i>설정</span> <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
                    <!--DEPTH 2-->
                    <ul class="adm_nav_depth2_ul">
                        <li><a href="./setting01.html">추천상품관리</a></li>
                        <li><a href="./setting02.html">배너관리</a></li>
                        <li><a href="./setting03.html">팝업관리</a></li>
                        <li><a href="./setting04.html">계정관리</a></li>
                        <li><a href="./setting05.html">기본설정</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <script>
        $('.adm_nav_depth1').click(function() {
            $(this).siblings('.adm_nav_depth2_ul').slideToggle();
            $(this).parent().siblings().find('.adm_nav_depth2_ul').slideUp();
            $('.adm_nav_depth1').removeClass('on');
            $(this).toggleClass('on');
        });

        function handleLogout() {
            if (confirm("정말 로그아웃하시겠습니까?")) {
                document.getElementById('logout-form').submit();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            let currentUrl = window.location.pathname === '/' ? '/' : window.location.pathname;

            const pathSegments = currentUrl.split('/').filter(segment => segment);

            const menuLinks = document.querySelectorAll('#adm_nav a[href]');

            menuLinks.forEach(function (link) {
                const linkUrl = new URL(link.getAttribute('href'), window.location.origin).pathname;
                const linkSegments = linkUrl.split('/').filter(segment => segment);

                if (pathSegments.some(segment => linkSegments.includes(segment))) {

                    const parentGroup = link.closest('.adm_nav_depth2_group');
                    if (parentGroup) {
                        parentGroup.querySelector('p').classList.add('on');
                        parentGroup.querySelector('.adm_nav_depth2_ul').style.display = 'block'; // 서브메뉴 펼치기
                    } else {
                        const parentGroup = link.closest('.adm_nav_depth1');

                        parentGroup.classList.add('on');
                    }
                }
            });
        });
    </script>
</section>
