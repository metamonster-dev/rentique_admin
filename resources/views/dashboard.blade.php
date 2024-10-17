@extends('layouts.app')

@section('title', '대시보드')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>

<section id="admin_contents_wrap">
    <article>
        <p class="title">대시보드</p>
        <div class="board01_wrap">
            <div class="board board01">
                <p class="board_name">렌트현황</p>
                <ul>
                    <li>
                        <p class="bh">신규주문</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">반납완료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                </ul>
            </div>

            <div class="board board01">
                <p class="board_name">배송현황</p>
                <ul>
                    <li>
                        <p class="bh">배송준비</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">배송중</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">배송완료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">수거완료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                </ul>
            </div>

            <div class="board board01">
                <p class="board_name">취소/반품 현황</p>
                <ul>
                    <li>
                        <p class="bh">취소신청</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">취소완료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">반품신청</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">반품완료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                </ul>
            </div>

            <div class="board board01">
                <p class="board_name">위탁현황</p>
                <ul>
                    <li>
                        <p class="bh">위탁신청</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">위탁진단</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">위탁승인</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">위탁진행중</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                    <li>
                        <p class="bh">위탁종료</p>
                        <p class="bb"><span class="accent">0</span>건</p>
                    </li>
                </ul>
            </div>

            <div class="board board01">
                <p class="board_name">회원현황</p>
                <ul>
                    <li>
                        <p class="bh">오늘 방문자</p>
                        <p class="bb"><span class="accent">0</span>명</p>
                    </li>
                    <li>
                        <p class="bh">오늘 가입자</p>
                        <p class="bb"><span class="accent">0</span>명</p>
                    </li>
                    <li>
                        <p class="bh">전체 회원</p>
                        <p class="bb"><span class="accent">0</span>명</p>
                    </li>
                </ul>
            </div>

        </div>
    </article>

    <article class="half">
        <div>
            <p class="title">매출 현황(건수)</p>
            <div class="board board_chart" id="product_chart">
            <script type="text/javascript">
        let product_chart = echarts.init(document.getElementById('product_chart'))
                let product_option = {
        xAxis: {
            type: 'category',
                        data: ['1월','2월','3월','4월']
                    },
        yAxis: {
            type: 'value'
                    },
        series: [
                        {
                            data: [60, 30, 90, 10, 20, 0, 20],
                        type: 'line',
                        color:'#7F23F3'
                        }
                    ]
                }
                product_chart.setOption(product_option)
                </script>
            </div>
        </div>
        <div>
            <p class="title">매출 현황(금액)</p>
            <div class="board board_chart" id="program_chart">
            <script type="text/javascript">
        let program_chart = echarts.init(document.getElementById('program_chart'))
                let program_option = {
        xAxis: {
            type: 'category',
                        data: ['1월','2월','3월','4월']
                    },
        yAxis: {
            type: 'value'
                    },
        series: [
                        {
                            data: [4000000,4500000,1500000,500000,9000000,2000000],
                        type: 'line',
                        color:'#7F23F3'
                        }
                    ]
                }
                program_chart.setOption(program_option)
                </script>
            </div>
        </div>

    </article>

    <article class="half">
        <div id="product_inquiry_latest" class="board02_wrap">
            <p class="title">상품 문의</p>
            <div class="board board02">
                <a href="./inquiry01.html" class="more_btn">+</a>
                <ul class="board02_tap">
                    <li><a class="on">답변대기 ( <span>2</span>건 )</a></li>
                    <li><a>답변완료 ( <span>2</span>건 )</a></li>
                </ul>

                <div class="board02_tap_area board_tap01_area on">
                    <ul>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                    </ul>
                </div>

                <div class="board02_tap_area board_tap02_area">
                    <ul>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>상품문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="inquiry_latest" class="board02_wrap">
            <p class="title">1:1 문의</p>
            <div class="board board02">
                <a href="./inquiry02.html" class="more_btn">+</a>
                <ul class="board02_tap">
                    <li><a>답변대기 ( <span>2</span>건 )</a></li>
                    <li><a class="on">답변완료 ( <span>2</span>건 )</a></li>
                </ul>

                <div class="board02_tap_area board_tap01_area">
                    <ul>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent_b">답변대기</span><span class="date">2024-06-17</span></p>
                        </li>
                    </ul>
                </div>

                <div class="board02_tap_area board_tap02_area on">
                    <ul>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                        <li>
                            <p class="bh"><a>1:1문의</a></p>
                            <p class="bb"><span class="accent">답변완료</span><span class="date">2024-06-17</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
    $('.board02').each(function() {
        var $board = $(this);

        $board.find('.board02_tap li').click(function() {
            // 모든 링크에서 'on' 클래스를 제거
            $board.find('.board02_tap li a').removeClass('on');
            // 클릭된 링크에 'on' 클래스 추가
            $(this).find('a').addClass('on');
            // 모든 탭 영역 숨기기
            $board.find('.board02_tap_area').hide();
            // 클릭된 li 요소의 인덱스에 따라 해당 탭 영역 표시
            if ($(this).index() === 0) {
                $board.find('.board_tap01_area').show();
            } else if ($(this).index() === 1) {
                $board.find('.board_tap02_area').show();
            }
        });
    });
        </script>
    </article>
</section>
@endsection
