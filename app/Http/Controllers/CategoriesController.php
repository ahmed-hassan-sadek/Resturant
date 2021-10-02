<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use CategoryTrait;

    private $catModel;
    public function __construct(Category $cat)
    {
        $this->catModel = $cat;
    }

    public function index()
    {
        $cats = $this->getCategory();
        return view('admin.categories.index' , compact('cats'));
    }

    public function create()
    {
        return view('admin.categories.create');
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
        ]);

        $this->catModel::create([
            'name' => $request->name,
        ]);

        session()->flash('done', 'Category Was Added');
        return redirect(route('category.index'));

    }

    /**
     * 1- validation
     * 2- get category id
     * 3- destory data
     * 4- return view with message
     */

    public function delete(Request $request)
    {
        $request->validate([
           'catId' => 'required|exists:categories,id'
        ]);

        $cat = $this->getcategoryById($request->catId);
        $cat->delete();

        session()->flash('done', 'Category Was Deleted');
        return redirect(route('category.index'));
    }


    /**
     * 1- get element by id
     * 2- check if found or not
     *  * return view with data
     */

    public function edit($catId)
    {
        $cat = $this->getcategoryById($catId);
        if($cat)
        {
            return view('admin.categories.edit', compact('cat'));
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
            'name' => 'required|min:3|max:254',
        ]);

        $cat = $this->getcategoryById($request->catId);

        $cat->update([
            'name' => $request->name,
        ]);

       session()->flash('done', 'Category Was Updated');
       return redirect(route('category.index'));

    }

}
