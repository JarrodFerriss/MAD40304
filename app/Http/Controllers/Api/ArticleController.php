<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
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

        $query = Article::query();

        if ($request->filled('filter')) {
            [$key, $value] = explode(':', $request->filter);
            $query->where($key, $value);
        }

        $articles = $query->with('tags')->orderBy($sort, $direction)->paginate(10);

        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = Article::create($request->all());
            return response()->json(new ArticleResource($article), 201);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Unable to create article',
                    'detail' => $e->getMessage(),
                    'code' => 400
                ]
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $article = Article::with('tags')->findOrFail($id);
            return new ArticleResource($article);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Article not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->update($request->all());
            return new ArticleResource($article);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Article not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Unable to update article',
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
            $article = Article::findOrFail($id);
            $article->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    'title' => 'Article not found',
                    'detail' => $e->getMessage(),
                    'code' => 404
                ]
            ], 404);
        }
    }
}
