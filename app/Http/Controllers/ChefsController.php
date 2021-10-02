<?php

namespace App\Http\Controllers;

use App\Http\Traits\ChefsTrait;
use App\Http\Traits\ImagesTrait;
use App\Models\Chef;
use App\Models\Info;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    use ChefsTrait;
    use ImagesTrait;

    private $chefModel;
    public function __construct(Chef $chef)
    {
        $this->chefModel = $chef;
    }

    public function index()
    {
        $chefs = $this->getChefs();
        return view('admin.chefs.index', compact('chefs'));
    }

    public function show()
    {
        $chefs = $this->getChefs();
        $informations = Info::get()->groupBy('key');
        return view('web.chefs', compact('chefs' , 'informations'));
    }

    public function create()
    {
        return view('admin.chefs.create');
    }

    /**
     * @param Request $request
     * 1- validation
     * 2- store image
     * 3- store database
     * 4- return to user with message
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:254',
            'body' => 'required|min:3',
            'image' => 'required|mimes:jpg,png'
        ]);

        $imageName = time()  . '_chef.' . $request->image->extension();
        $this->uploadImage($request->image, $imageName, 'chefs');

        $this->chefModel::create([
            'name' => $request->name,
            'body' => $request->body,
            'image' =>$imageName
        ]);

        session()->flash('done', 'Chef Was Added');
        return redirect(route('chefs.index'));

    }

    public function delete(Request $request)
    {
        $request->validate([
           'chefId' => 'required|exists:chefs,id'
        ]);

        $chef = $this->getChefById($request->chefId);
        $imageUrl = "images/chefs/". $chef->image;
        $chef->delete();

        unlink(public_path($imageUrl));

        session()->flash('done', 'Chef Was Deleted');
        return redirect(route('chefs.index'));
    }

    public function edit($chefId)
    {
        $chef = $this->getChefById($chefId);
        if($chef)
        {
            return view('admin.chefs.edit', compact('chef'));
        }

    }

    /**
     * @param Request $request
     * 1- validate request.
     * 2- check if has image.
     *  * move new image
     * 3- update database
     * 4- return to user with message
     */
    public function update(Request $request)
    {
        $request->validate([
            'chefId' => 'required|exists:chefs,id',
            'name' => 'required|min:3|max:254',
            'body' => 'required|min:3',
            'image' => 'mimes:jpg,png'
        ]);

        $chef = $this->getChefById($request->chefId);

        if($request->has('image'))
        {
            $imageName = time()  . '_chef.' . $request->image->extension();
            $oldImagePath = 'images/chefs/'. $chef->image;

            $this->uploadImage($request->image, $imageName, 'chefs', $oldImagePath);
        }

        $chef->update([
            'name' => $request->name,
            'body' => $request->body,
            'image'=> (!empty($imageName))? $imageName : $chef->image
        ]);

       session()->flash('done', 'Chef Was Updated');
       return redirect(route('chefs.index'));

    }
}
