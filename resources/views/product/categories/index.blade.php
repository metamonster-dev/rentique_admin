@extends('layouts.app')

@section('title', '카테고리 관리')

@section('content')
    <section id="admin_contents_wrap">
        <p class="title">상품관리 / 카테고리 관리 </p>
        <div class="btn_area">
            <button onclick="addCategory('depth1')">+ 대분류 추가</button>
            <button onclick="saveAll()">전체 완료</button>
        </div>

        <table class="table_default table2">
            <thead>
                <tr>
                    <th colspan="3" width="120px">depth</th>
                    <th width="500px">카테고리명</th>
                    <th width="80px">노출여부</th>
                    <th width="80px">등록일</th>
                    <th width="220px">관리</th>
                </tr>
            </thead>

            <tbody id="categoryTable">
                @foreach($categories as $category)
                    @include('product.categories.partials.category_row', ['category' => $category, 'depth' => 1])
                @endforeach
            </tbody>
        </table>
    </section>

    <script>
        $(document).ready(function() {
            let categoryTable = $('#categoryTable');
                let date = new Date().toISOString().split('T')[0];

                window.addCategory = function(type, el) {
                    let newRow;
                    let parentRow = $(el).closest('tr');
                    let lastSibling;
                    if (type === 'depth1') {
                        newRow = `
                            <tr class="depth1" data-level="1">
                                <td colspan="3">대분류</td>
                                <td><input type="text" name="level1[]" data-level="1" placeholder="카테고리명 입력"></td>
                                <td>
                                    <select name="isVisible">
                                        <option value="1">노출</option>
                                        <option value="0">숨김</option>
                                    </select>
                                </td>
                                <td>${date}</td>
                                <td class="in_btn_area">
                                    <button class="in_btn" onclick="addCategory('depth2', this)">하위 분류 추가</button>
                                    <button class="in_btn" onclick="deleteRow(this)">삭제</button>
                                    <button class="in_btn save" onclick="saveRow(this)">완료</button>
                                </td>
                            </tr>`;
                        categoryTable.append(newRow);
                    } else if (type === 'depth2') {
                        lastSibling = parentRow;
                        while (lastSibling.next().hasClass('depth2') || lastSibling.next().hasClass('depth3')) {
                            lastSibling = lastSibling.next();
                        }
                        newRow = `
                            <tr class="depth2" data-level="2">
                                <td class="space"></td>
                                <td colspan="2">중분류</td>
                                <td><input type="text" name="level2[]" data-level="2"  placeholder="카테고리명 입력"></td>
                                <td>
                                    <select name="isVisible">
                                        <option value="1">노출</option>
                                        <option value="0">숨김</option>
                                    </select>
                                </td>
                                <td>${date}</td>
                                <td class="in_btn_area">
                                    <button class="in_btn" onclick="addCategory('depth3', this)">하위 분류 추가</button>
                                    <button class="in_btn" onclick="deleteRow(this)">삭제</button>
                                    <button class="in_btn save" onclick="saveRow(this)">완료</button>
                                </td>
                            </tr>`;
                        lastSibling.after(newRow);
                    } else if (type === 'depth3') {
                        lastSibling = parentRow;
                        while (lastSibling.next().hasClass('depth3')) {
                            lastSibling = lastSibling.next();
                        }
                        newRow = `
                            <tr class="depth3" data-level="3">
                                <td colspan="2"></td>
                                <td>소분류</td>
                                <td><input type="text" name="level3[]" data-level="3" placeholder="카테고리명 입력"></td>
                                <td>
                                    <select name="isVisible">
                                        <option value="1">노출</option>
                                        <option value="0">숨김</option>
                                    </select>
                                </td>
                                <td>${date}</td>
                                <td class="in_btn_area">
                                    <button class="in_btn" onclick="deleteRow(this)">삭제</button>
                                    <button class="in_btn save" onclick="saveRow(this)">완료</button>
                                </td>
                            </tr>`;
                        lastSibling.after(newRow);
                    }
                }

                window.deleteRow = function(el, categoryId) {
                    let row = $(el).closest('tr');
                    let rowDepth = row.attr('class');
                    let nextRow = row.next();

                    let canDelete = true;

                    nextRow.each(function() {
                        let nextRowDepth = $(this).attr('class');
                        if (rowDepth === 'depth1' && nextRowDepth === 'depth2') {
                            canDelete = false;
                            return false;
                        }
                        if (rowDepth === 'depth2' && nextRowDepth === 'depth3') {
                            canDelete = false;
                            return false;
                        }
                        if (rowDepth === 'depth2' && nextRowDepth === 'depth1') {
                            return false;
                        }
                        if (rowDepth === 'depth3' && (nextRowDepth === 'depth1' || nextRowDepth === 'depth2')) {
                            return false;
                        }
                    });

                    if (canDelete) {
                        if (confirm('삭제하시겠습니까?')) {
                            if (categoryId) {
                                const storeOrUpdateUrl = "{{ route('categories.delete', ':categoryId') }}".replace(':categoryId', categoryId);

                                fetchRequest(storeOrUpdateUrl, 'DELETE', {}, '{{ route('categories.index') }}');
                            } else {
                                row.remove();
                            }
                        }
                    } else {
                        alert('하위 분류가 있는 카테고리는 삭제할 수 없습니다.');
                    }
                }

                window.editRow = function(el, categoryId = null) {
                    let row = $(el).closest('tr');
                    row.find('input').prop('readonly', false);
                    row.find('select').prop('disabled', false);
                    $(el).text('완료').attr('onclick', `saveRow(this, ${categoryId})`);
                }

                window.saveRow = function(el, categoryId = null) {
                    // let row = $(el).closest('tr');
                    // row.find('input').prop('readonly', true);
                    // row.find('select').prop('disabled', true);
                    // $(el).text('수정').attr('onclick', `editRow(this, ${categoryId})`);

                    let storeOrUpdateUrl;
                    if (categoryId) {
                        storeOrUpdateUrl = "{{ route('categories.storeOrUpdate', ':categoryId') }}".replace(':categoryId', categoryId);
                    } else {
                        storeOrUpdateUrl = "{{ route('categories.storeOrUpdate') }}";
                    }

                    const dataRow = el.parentElement.parentElement;

                    let parentId;
                    // 대분류면 바로 추가하고
                    if (parseInt(dataRow.dataset['level']) === 1) {
                        parentId = null;
                    } else {
                    // 중분류나 소분류면 상위 분류를 찾아서 추가
                        let previousRow = dataRow.previousElementSibling;
                        while (parseInt(previousRow.dataset['level']) >= parseInt(dataRow.dataset['level'])) {
                            previousRow = previousRow.previousElementSibling;
                        }
                        parentId = previousRow.querySelector('input').dataset['id'];
                    }

                    const bodyData = {
                        parent_id: parentId,
                        level: dataRow.querySelector('input').dataset['level'],
                        name: dataRow.querySelector('input').value,
                        is_visible: dataRow.querySelector('select').value
                    };

                    if (confirm('저장하시겠습니까?')) {
                        fetchRequest(storeOrUpdateUrl, 'POST', bodyData, '{{ route('categories.index') }}');
                    }
                }

                window.saveAll = function(){
                    // categoryTable.find('input').prop('readonly', true);
                    // categoryTable.find('select').prop('disabled', true);
                    // categoryTable.find('button.save').text('수정').attr('onclick', 'editRow(this)');
                    // alert('변경사항이 저장되었습니다.');

                    let categoryData = [];
                    let rows = $('#categoryTable').find('tr');  // 모든 행(tr)을 가져옴

                    rows.each(function() {
                        let dataRow = $(this);
                        let level = parseInt(dataRow.data('level'));
                        let categoryId = dataRow.find('input').data('id') || null;
                        let name = dataRow.find('input').val();
                        let isVisible = dataRow.find('select').val();

                        let parentId;
                        if (level === 1) {
                            parentId = null;
                        } else {
                            let previousRow = dataRow.prev();
                            while (parseInt(previousRow.data('level')) >= level) {
                                previousRow = previousRow.prev();
                            }
                            parentId = previousRow.find('input').data('id');
                        }

                        categoryData.push({
                            id: categoryId,
                            name: name,
                            level: level,
                            parent_id: parentId,
                            is_visible: isVisible
                        });
                    });

                    if (categoryData.length > 0) {
                        if (confirm('모든 카테고리를 저장하시겠습니까?')) {
                            fetchRequest('{{ route('categories.bulkStoreOrUpdate') }}', 'POST', categoryData, '{{ route('categories.index') }}');
                        }
                    }
                }
            });
    </script>
@endsection
