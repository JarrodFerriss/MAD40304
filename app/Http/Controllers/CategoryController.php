<?php
/* Assignment 4 */
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /* Assignment 6 */
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Assignment 5
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /* Assignment 5 */
    public function store(CategoryRequest $request)
    {
        $formData = $request->all();

        Category::create($formData);

        return redirect('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        $category = Category::find($category);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /* Assignment 6 */
    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    /* Assignment 6 */
    public function update(CategoryRequest $request, $category)
    {
        $formData = $request->all();
        $category = Category::findOrFail($category);
        $category->update($formData);
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        $category->articles()->delete();
        Category::destroy($category);
        return redirect('categories');
    }

    /**
     * Display a list of all soft-deleted categories.
     */
    public function manage()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.manage', compact('categories'));
    }

    /**
     * Restore a single soft-deleted category.
     */
    public function restore($id)
    {
        $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();

        $category->restore();

        Category::findOrFail($category)
            ->articles()
            ->restore();

        return redirect('categories');
    }

    /**
     * Permanently delete (force delete) a soft-deleted category.
     */
    public function forcedelete($id)
    {
        $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();

        $category->forceDelete();

        return redirect('categories');
    }
}
