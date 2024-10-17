$(document).ready(function () {

    ////////////////////////////////////////////////
    //어드민 필터클릭
    $('.filter_select').each(function() {
        const $filterGroup = $(this);

        $filterGroup.find('li').click(function() {
            // 해당 필터 그룹 내 모든 li에서 'on' 클래스를 제거
            $filterGroup.find('li').removeClass('on');
            // 클릭한 li에 'on' 클래스 추가
            $(this).addClass('on');
        });
    });
    $('.filter_select2').each(function() {
        const $filterGroup = $(this);

        $filterGroup.find('li').click(function() {
            // 해당 필터 그룹 내 모든 li에서 'on' 클래스를 제거
            $filterGroup.find('li').removeClass('on');
            // 클릭한 li에 'on' 클래스 추가
            $(this).addClass('on');
        });
    });
    $('.filter_select3').each(function() {
        const $filterGroup = $(this);

        $filterGroup.find('li').click(function() {
            // 해당 필터 그룹 내 모든 li에서 'on' 클래스를 제거
            $filterGroup.find('li').removeClass('on');
            // 클릭한 li에 'on' 클래스 추가
            $(this).addClass('on');
        });
    });
    ////////////////////////////////////////////////


    ////////////////////////////////////////////////
    // 이미지추가 제거 관련 스크립트
    $('.remove_img').hide();
    $('input[name="imgfile"]').on('change', function(event) {
        const input = event.target;
        const label = $(input).parent();
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = $('<img>').attr('src', e.target.result);
                // 기존의 이미지가 있으면 제거
                label.find('img').remove();
                // 새 이미지를 추가
                label.append(img);
                // 아이콘지우기
                label.find('.fa-plus').hide();
                label.find('.remove_img').show();
            };
            reader.readAsDataURL(file);
        }
    });
    // remove_img 아이콘 클릭 시 이미지 및 아이콘 제거
    $(document).on('click', '.remove_img', function(event) {
        event.preventDefault();
        const label = $(this).parent();
        // 이미지 제거
        label.find('img').remove();
        // 파일 입력 초기화
        label.find('input[name="imgfile"]').val('');
        // plus 아이콘 보이기
        label.find('.fa-plus').show();
        // remove_img 아이콘 숨기기
        $(this).hide();
    });



});

//외부

////////////////////////////////////////////////
//팝업열기 (/admin/popup 디렉토리에 있는것만 적용)
function openPopup(url) {
    // 화면의 너비와 높이를 가져옵니다.
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    // 팝업 창의 크기
    const width = 860;
    const height = 800;

    // 팝업 창의 위치를 중앙에 맞추기
    const left = (screenWidth - width) / 2;
    const top = (screenHeight - height) / 2;

    // 팝업 창 열기
    window.open(
        'popup/' + url,
        'popupWindow',
        `width=${width},height=${height},left=${left},top=${top},scrollbars=yes`
    );
}

function openPopup2(url) {
    // 화면의 너비와 높이를 가져옵니다.
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    // 팝업 창의 크기
    const width = 300;
    const height = 300;

    // 팝업 창의 위치를 중앙에 맞추기
    const left = (screenWidth - width) / 2;
    const top = (screenHeight - height) / 2;

    // 팝업 창 열기
    window.open(
        'popup/' + url,
        'popupWindow',
        `width=${width},height=${height},left=${left},top=${top},scrollbars=yes`
    );
}

//팝업열기 (/admin/popup 디렉토리에 있는것만 적용)
function openPopup3(url) {
    // 화면의 너비와 높이를 가져옵니다.
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    // 팝업 창의 크기
    const width = 860;
    const height = 450;

    // 팝업 창의 위치를 중앙에 맞추기
    const left = (screenWidth - width) / 2;
    const top = (screenHeight - height) / 2;

    // 팝업 창 열기
    window.open(
        'popup/' + url,
        'popupWindow',
        `width=${width},height=${height},left=${left},top=${top},scrollbars=yes`
    );
}
