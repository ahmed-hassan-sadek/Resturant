<?php

namespace App\Http\Controllers;

use App\Http\Traits\AboutTrait;
use App\Http\Traits\ImagesTrait;
use App\Models\About_us;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * 1- call file abouttrait 
     * 2- call file imagetrait
     */
    use AboutTrait;
    use ImagesTrait;

    /**
     * 1- private variable
     * 2- constructor to get data from model about
     */
    private $aboutModel;
    public function __construct(About_us $about)
    {
        $this->aboutModel = $about;
    }

    /**
     * 1- get data from constructor
     * 2- return view with data
     */

    public function index()
    {
         $about = $this->getAbout();
        return view('admin.about-us.index' , compact('about'));
    }

    /**
     * 1- return page create
     */

    public function create()
    {
        return view('admin.about-us.create');
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
            'body' => 'required|min:3',
            'image' => 'required|mimes:jpg,png'
        ]);

        $imageName = time()  . '_about.' . $request->image->extension();
        $this->uploadImage($request->image, $imageName, 'about');

        $this->aboutModel::create([
            'body' => $request->body,
            'image' =>$imageName
        ]);

        session()->flash('done', 'About Was Added');
        return redirect(route('about.index'));

    }

    /**
     * 1- validation
     * 2- get gallery id
     * 3- destory data
     * 4- return view with message
     */

    public function delete(Request $request)
    {
        $request->validate([
           'aboutId' => 'required|exists:about_uses,id'
        ]);

        $about = $this->getaboutById($request->aboutId);
        $imageUrl = "images/about/". $about->image;
        $about->delete();

        unlink(public_path($imageUrl));

        session()->flash('done', 'About Was Deleted');
        return redirect(route('about.index'));
    }

    /**
     * 1- get element by id
     * 2- check if data found
     * * return value with data
     */
    public function edit($aboutId)
    {
        $about = $this->getaboutById($aboutId);
        if($about)
        {
            return view('admin.about-us.edit', compact('about'));
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
            'aboutId' => 'required|exists:about_uses,id',
            'body' => 'required|min:3',
            'image' => 'mimes:jpg,png'
        ]);

        $about = $this->getaboutById($request->aboutId);

        if($request->has('image'))
        {
            $imageName = time()  . '_about.' . $request->image->extension();
            $oldImagePath = 'images/about/'. $about->image;

            $this->uploadImage($request->image, $imageName, 'about', $oldImagePath);
        }

        $about->update([
            'body' => $request->body,
            'image'=> (!empty($imageName))? $imageName : $about->image
        ]);

       session()->flash('done', 'About Was Updated');
       return redirect(route('about.index'));

    }




}
