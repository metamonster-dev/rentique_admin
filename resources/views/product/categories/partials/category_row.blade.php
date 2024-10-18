<tr class="depth{{ $depth }}" data-level="{{ $depth }}">
    @if($depth == 1)
        <td colspan="3">대분류</td>
    @elseif($depth == 2)
        <td class="space"></td>
        <td colspan="2">중분류</td>
    @else
        <td colspan="2"></td>
        <td>소분류</td>
    @endif

    <td><input type="text" name="level{{ $depth }}[]" value="{{ $category->name }}" data-level="{{ $depth }}" data-id="{{ $category->id }}" readonly></td>
    <td>
        <select name="isVisible" disabled>
            <option value="1" {{ $category->is_visible ? 'selected' : '' }}>노출</option>
            <option value="0" {{ !$category->is_visible ? 'selected' : '' }}>숨김</option>
        </select>
    </td>
    <td>{{ $category->created_at->format('Y-m-d') }}</td>
    <td class="in_btn_area">
        @if($depth < 3)
            <button class="in_btn" onclick="addCategory('depth{{ $depth+1 }}', this)">하위 분류 추가</button>
        @endif

        @if($category->children->isEmpty())
            <button class="in_btn" onclick="deleteRow(this, {{ $category->id }})">삭제</button>
        @endif
        <button class="in_btn save" onclick="editRow(this, {{ $category->id }})">수정</button>
    </td>
</tr>

@if($category->children->isNotEmpty()) <!-- 자식 카테고리가 있는 경우 -->
    @foreach($category->children as $child)
        @include('product.categories.partials.category_row', ['category' => $child, 'depth' => $depth + 1])
    @endforeach
@endif
