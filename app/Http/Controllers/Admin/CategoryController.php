<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\ImageService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index')->withCategories(Category::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, ImageService $imageService)
    {
        $category = Category::create(['title' => $request->title]);

        $imageService->uploadCategoryIcon($category);

        alert()->success('Успешно!', 'Категория успешно добавлена!');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category, ImageService $imageService)
    {
        $category->update(['title' => $request->title]);

        $imageService->uploadCategoryIcon($category);

        alert()->success('Успешно!', 'Категория успешно изменена!');

        return redirect()->route('categories.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        alert()->success('Успешно!', 'Категория успешно удалена!');

        return back();
    }

    public function restore($category)
    {
        Category::onlyTrashed()->findOrFail($category)->restore();

        alert()->success('Успешно!', 'Категория успешно восстановлена!');

        return back();
    }
}
