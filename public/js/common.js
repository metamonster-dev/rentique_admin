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

if (document.querySelector('#selectAll')) {
    document.querySelector('#selectAll').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        validateForm();
    }
});

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
