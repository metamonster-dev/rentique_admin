// 검색할 때 달력 조건
document.addEventListener('DOMContentLoaded', function () {
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', function () {
            const startDate = startDateInput.value;
            if (startDate) {
                endDateInput.min = startDate;
            } else {
                endDateInput.min = '';
            }
        });

        endDateInput.addEventListener('change', function () {
            const endDate = endDateInput.value;
            if (endDate) {
                startDateInput.max = endDate;
            } else {
                startDateInput.max = '';
            }
        });
    }
});

// 목록 전체 체크 박스
if (document.querySelector('#selectAll')) {
    document.querySelector('#selectAll').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
}

// 엔터 눌렀을 때 검색
document.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        validateForm();
    }
});

// 검색 버튼 클릭 시 검증
function validateForm() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    if (!startDate && endDate) {
        alert('시작일을 입력해주세요.');
        return false;
    }

    if (startDate && !endDate) {
        alert('종료일을 입력해주세요.');
        return false;
    }

    if (startDate > endDate) {
        alert('시작일이 종료일보다 늦을 수 없습니다.');
        return false;
    }

    return true;
}

// api 전송
function fetchRequest(url, method = 'GET', data = null, redirectUrl = null) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // CSRF 토큰을 메타 태그에서 가져옴

    const headers = {
        'X-CSRF-TOKEN': csrfToken,
        'Content-Type': 'application/json',
    };

    let options = {
        method: method,
        headers: headers,
    };

    if (data) {
        options.body = JSON.stringify(data);
    }

    return fetch(url, options)
        .then(response => {
            if (response.status === 422) {
                return response.json().then(data => {
                    let errorMessage = data.errors.memo ? data.errors.memo[0] : '입력 오류가 발생했습니다.';
                    alert(errorMessage);
                    throw new Error(errorMessage);
                });
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            if (data.success) {
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                } else {
                    window.location.reload();
                }
            } else {
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('네트워크 오류가 발생했습니다.');
        });
}
