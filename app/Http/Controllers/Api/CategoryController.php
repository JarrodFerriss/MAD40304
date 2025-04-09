<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $direction = Str::startsWith($sort, '-') ? 'desc' : 'asc';
        $sort = ltrim($sort, '-');

        $query = Category::query();

        if ($request->get('include') === 'articles') {
            $query->with('articles');
        }

        if ($request->filled('filter')) {
            [$key, $value] = explode(':', $request->filter);
            $query->where($key, $value);
        }

        return CategoryResource::collection($query->orderBy($sort, $direction)->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());
            return response()->json(new CategoryResource($category), 201);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Unable to create category',
                    'detail' => $e->getMessage(),
                    'code' => 400
                ]
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        try {
            $query = Category::query();

            if ($request->get('include') === 'articles') {
                $query->with('articles');
            }

            $category = $query->findOrFail($id);
            return new CategoryResource($category);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Category not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->validated());
            return new CategoryResource($category);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Category not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Unable to update category',
                    'detail' => $e->getMessage(),
                    'code' => 400
                ]
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Category not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        }
    }
}
