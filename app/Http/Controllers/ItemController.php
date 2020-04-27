<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Http\Requests\ItemRequest;
use Illuminate\Contracts\View\Factory;

class ItemController extends Controller
{
    private $item;

    private $category;

    /**
     * @param Item $item
     * @param Category $category
     */
    public function __construct(Item $item, Category $category)
    {
        $this->item = $item;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $items = $this->item->with('category')->paginate(5);

        return view('item.items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = $this->category->get();

        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemRequest $request
     * @return Response
     */
    public function store(ItemRequest $request)
    {
        $this->item->create($request->validated());

        return redirect('/items')->withSuccess('Item has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $item = $this->item->with('category')->findOrFail($id);

        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $item = $this->item->with('category')->findOrFail($id);
        $categories = $this->category->get();

        return view('item.edit', compact('categories', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItemRequest $request
     * @param int $id
     * @return void
     */
    public function update(ItemRequest $request, $id)
    {
        $item = $this->item->findOrFail($id);
        $item->update($request->validated());

        return redirect('/items')->withSuccess('Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->item->findOrFail($id);
        $item->delete();

        return redirect('/items')->withSuccess('Item has been deleted');
    }

    /**
     * Return the specified resource data json.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function api($id)
    {
        $item = $this->item->with('category')->findOrFail($id);

        return response()->json($item);
    }

    /**
     * Display a listing of the resource with selected category.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function categoryIndex(Request $request)
    {
        $items = $this->item->categoryItems($request->category_id);

        return view('item.category-items', compact('items'));
    }
}
