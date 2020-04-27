<?php

namespace App\Http\Controllers;

use Exception;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private $category;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $categories = $this->category->paginate(5);

        return view('category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $this->category->create($request->validated());

        return redirect('/categories')->withSuccess('Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $category->update($request->validated());

        return redirect('/categories')->withSuccess('Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $category = $this->category->with('items')->findOrFail($id);
        if (!$category->items()->exists()) {
            $category->delete();

            return redirect('/categories')->withSuccess('Category has been deleted');
        }

        return redirect('/categories')->withError('Delete assigned items first!');
    }
}
