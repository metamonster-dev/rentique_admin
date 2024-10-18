<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();

            return view('product.categories.index', compact('categories'));
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, '카테고리를 찾을 수 없습니다.');
        } catch (QueryException $e) {
            return $this->handleException($e, '데이터베이스 오류가 발생했습니다.');
        } catch (Exception $e) {
            return $this->handleException($e, '카테고리 조회 중 오류가 발생했습니다.');
        }
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        try {
            $validated = $request->validate([
                'parent_id' => 'nullable|exists:categories,id',
                'level' => 'required|integer',
                'name' => 'required|string|max:255',
                'is_visible' => 'required|boolean',
            ]);

            Category::updateOrCreate(
                ['id' => $id],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => $id ? '카테고리가 성공적으로 수정되었습니다.' : '카테고리가 성공적으로 생성되었습니다.',
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => '해당 카테고리를 찾을 수 없습니다.',
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

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($category->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => '카테고리가 성공적으로 삭제되었습니다.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => '카테고리 삭제에 실패했습니다.',
            ], 500);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => '카테고리를 찾을 수 없습니다.',
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

    public function bulkStoreOrUpdate(Request $request)
    {
        try {
            $categories = $request->all();

            foreach ($categories as $categoryData) {
                $validator = Validator::make($categoryData, [
                    'name' => 'required|string|max:255',
                    'level' => 'required|integer',
                    'parent_id' => 'nullable|exists:categories,id',
                    'is_visible' => 'required|boolean',
                ]);

                $validated = $validator->validated();

                Category::updateOrCreate(
                    ['id' => $categoryData['id']],
                    $validated
                );
            }

            return response()->json([
                'success' => true,
                'message' => '카테고리가 성공적으로 수정되었습니다.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => '해당 카테고리를 찾을 수 없습니다.',
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
}
