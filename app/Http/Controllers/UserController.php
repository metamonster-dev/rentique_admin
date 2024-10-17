<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'search_type' => 'nullable|string|in:아이디,이름,휴대폰번호,전체',
            'keyword' => 'nullable|string|max:255',
        ], [
            'start_date.before_or_equal' => '시작일은 종료일보다 늦을 수 없습니다.',
            'end_date.after_or_equal' => '종료일은 시작일보다 빠를 수 없습니다.',
            'search_type.in' => '검색어 타입은 아이디, 이름, 휴대폰번호 중 하나여야 합니다.',
        ]);

        try {
            $query = User::query();

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $startDateTime = $request->input('start_date') . ' 00:00:00';
                $endDateTime = $request->input('end_date') . ' 23:59:59';

                $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            }

            if ($request->filled('keyword')) {
                if ($request->input('search_type') === '전체') {
                    $query->where(function ($query) use ($request) {
                        $query->where('email', 'like', '%' . $request->input('keyword') . '%')
                            ->orWhere('name', 'like', '%' . $request->input('keyword') . '%')
                            ->orWhere('phone_number', 'like', '%' . $request->input('keyword') . '%');
                    });
                } else {
                    switch ($request->input('search_type')) {
                        case '아이디':
                            $query->where('email', 'like', '%' . $request->input('keyword') . '%');
                            break;
                        case '이름':
                            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
                            break;
                        case '휴대폰번호':
                            $query->where('phone_number', 'like', '%' . $request->input('keyword') . '%');
                            break;
                        default:
                            break;
                    }
                }
            }

            $users = $query->latest()->paginate(10);

            return view('users.index', compact('users'));
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, '해당 유저를 찾을 수 없습니다.');
        } catch (QueryException $e) {
            return $this->handleException($e, '데이터베이스 오류가 발생했습니다.');
        } catch (Exception $e) {
            return $this->handleException($e, '유저 조회 중 오류가 발생했습니다.');
        }
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            $totalPoints = $user->total_points;

            $defaultShippingAddress = $user->default_shipping_address;

            return view('users.show', compact('user', 'totalPoints', 'defaultShippingAddress'));
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, '해당 유저를 찾을 수 없습니다.');
        } catch (QueryException $e) {
            return $this->handleException($e, '데이터베이스 오류가 발생했습니다.');
        } catch (Exception $e) {
            return $this->handleException($e, '유저 조회 중 오류가 발생했습니다.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'memo' => 'required|string|max:100',
            ]);

            $user = User::findOrFail($id);
            $user->memo = $request->input('memo');

            if ($user->update()) {
                return response()->json([
                    'success' => true,
                    'message' => '메모가 성공적으로 업데이트되었습니다.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => '메모 업데이트에 실패했습니다.',
            ], 500);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => '사용자를 찾을 수 없습니다.',
            ], 404);
        } catch (QueryException) {
            return response()->json([
                'success' => false,
                'message' => '데이터베이스 오류가 발생했습니다.',
            ], 500);
        } catch (Exception) {
            return response()->json([
                'success' => false,
                'message' => '처리 중 오류가 발생했습니다.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => '사용자가 성공적으로 삭제되었습니다.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => '사용자 삭제에 실패했습니다.',
            ], 500);

        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => '사용자를 찾을 수 없습니다.',
            ], 404);
        } catch (QueryException) {
            return response()->json([
                'success' => false,
                'message' => '데이터베이스 오류가 발생했습니다.',
            ], 500);
        } catch (Exception) {
            return response()->json([
                'success' => false,
                'message' => '처리 중 오류가 발생했습니다.',
            ], 500);
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            $request->validate([
                'selected_ids' => 'required|array'
            ]);

            $selectedIds = $request->input('selected_ids');

            User::whereIn('id', $selectedIds)->delete();

            return redirect()->route('users.index')->with('success', '선택한 회원이 삭제되었습니다.');
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, '해당 유저를 찾을 수 없습니다.');
        } catch (QueryException $e) {
            return $this->handleException($e, '데이터베이스 오류가 발생했습니다.');
        } catch (Exception $e) {
            return $this->handleException($e, '유저 조회 중 오류가 발생했습니다.');
        }
    }
}
