<?php

namespace App\Http\Controllers;
use App\Http\Traits\GalleryTrait;
use App\Http\Traits\ImagesTrait;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Info;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use GalleryTrait;
    use ImagesTrait;

    private $galleryModel;
    public function __construct(Gallery $gallery)
    {
        $this->galleryModel = $gallery;
    }

    public function index()
    {
        $galleries = $this->getGallery();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function show()
    {
        $galleries = $this->getGallery();
        $cats = Category::get();
        $informations = Info::get()->groupBy('key');
        return view('web.gallery', compact('galleries' , 'informations' , 'cats'));
    }

    public function create()
    {
        $cats = Category::get();
        return view('admin.galleries.create' , compact('cats'));
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
            'image' => 'required|mimes:jpg,png',
            'catId' => 'required|exists:categories,id'
        ]);

        $imageName = time()  . '_gallery.' . $request->image->extension();
        $this->uploadImage($request->image, $imageName, 'gallery');

        $this->galleryModel::create([
            'name' => $request->name,
            'image' =>$imageName,
            'category_id' => $request->catId
        ]);

        session()->flash('done', 'Gallery Was Added');
        return redirect(route('gallery.index'));

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
           'galleryId' => 'required|exists:galleries,id'
        ]);

        $gallery = $this->getGalleryById($request->galleryId);
        $imageUrl = "images/gallery/". $gallery->image;
        $gallery->delete();

        unlink(public_path($imageUrl));

        session()->flash('done', 'Gallery Was Deleted');
        return redirect(route('gallery.index'));
    }

    public function edit($galleryId)
    {
        $gallery = $this->getGalleryById($galleryId);
        if($gallery)
        {
            $cats = Category::get();
            return view('admin.galleries.edit', compact('gallery' , 'cats'));
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
            'galleryId' => 'required|exists:galleries,id',
            'name' => 'required|min:3|max:254',
            'catId' => 'required|exists:categories,id',
            'image' => 'mimes:jpg,png'
        ]);

        $gallery = $this->getGalleryById($request->galleryId);

        if($request->has('image'))
        {
            $imageName = time()  . '_gallery.' . $request->image->extension();
            $oldImagePath = 'images/gallery/'. $gallery->image;

            $this->uploadImage($request->image, $imageName, 'gallery', $oldImagePath);
        }

        $gallery->update([
            'name' => $request->name,
            'image'=> (!empty($imageName))? $imageName : $gallery->image,
            'category_id' => $request->catId
        ]);

       session()->flash('done', 'Gallery Was Updated');
       return redirect(route('gallery.index'));

    }
}
