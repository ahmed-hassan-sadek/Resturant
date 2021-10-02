<?php

namespace App\Http\Controllers;

use App\Http\Traits\ItemTrait;
use App\Models\Category;
use App\Models\Info;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 1- call file ItemTrait
     */
    use ItemTrait;

    /**
     * 1- private variable
     * 2- constructor to get data from model Item
     */
    private $itemModel;
    public function __construct(Item $item)
    {
        $this->itemModel = $item;
    }

    /**
     * 1- get data from constructor
     * 2- return view with data
     */

    public function index()
    {
        $items = $this->getItem();
        return view('admin.items.index', compact('items'));
    }

    public function show()
    {
        $items = $this->getItem();
        $cats = Category::get();
        $informations = Info::get()->groupBy('key');
        return view('web.menu', compact('items' , 'informations' , 'cats'));
    }

    /**
     * 1- get data from model Category
     * 2- return page create with data
     */

    public function create()
    {
        $cats = Category::get();
        return view('admin.items.create' , compact('cats'));
    }

    /**
     * @param Request $request
     * 1- validation
     * 2- store database
     * 3- return to user with message
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:254',
            'description' => 'required|min:3',
            'price' => 'required',
            'catId' => 'required|exists:categories,id'
        ]);

        $this->itemModel::create([
            'name' => $request->name,
            'desc' => $request->description,
            'price' => $request->price,
            'category_id' => $request->catId
        ]);

        session()->flash('done', 'Item Was Added');
        return redirect(route('item.index'));

    }

    /**
     * 1- validation
     * 2- get item id
     * 3- destory data
     * 4- return view with message
     */

    public function delete(Request $request)
    {
        $request->validate([
           'itemId' => 'required|exists:items,id'
        ]);

        $item = $this->getitemById($request->itemId);
        $item->delete();


        session()->flash('done', 'Item Was Deleted');
        return redirect(route('item.index'));
    }

    /**
     * 1- get element by id
     * 2- check if found or not
     *  * return view with data
     */

    public function edit($itemId)
    {
        $item = $this->getitemById($itemId);
        if($item)
        {
            $cats = Category::get();
            return view('admin.items.edit', compact('item' , 'cats'));
        }

    }

    /**
     * @param Request $request
     * 1- validate request.
     * 2- update database
     * 3- return to user with message
     */
    public function update(Request $request)
    {
        $request->validate([
            'catId' => 'required|exists:categories,id',
            'title' => 'required|min:3|max:254',
            'description' => 'required|min:3',
            'price' => 'required',
            'itemId' => 'required|exists:items,id',
        ]);

        $item = $this->getitemById($request->itemId);

        $item->update([
            'name' => $request->title,
            'desc' => $request->description,
            'price' => $request->price,
            'category_id' => $request->catId
        ]);

       session()->flash('done', 'Item Was Updated');
       return redirect(route('item.index'));

    }


}
