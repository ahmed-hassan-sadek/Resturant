<?php

namespace App\Http\Controllers;

use App\Http\Traits\ChefsTrait;
use App\Http\Traits\InfoTrait;
use App\Models\About_us;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Info;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ChefsTrait;
    use InfoTrait;

    private $chefModel;
    private $infoModel;


    public function __construct(Chef $chef, Info $info )
    {
        $this->chefModel = $chef;
        $this->infoModel = $info;

    }


    public function index()
    {
        $chefs = $this->getChefs();
        $about = About_us::first();
        $cats = Category::get();
        $items = Item::with('category')->where('category_id' , '=' , 5)->get();
        $informations = $this->infoModel::get()->groupBy('key');
        return view('web.index', compact('chefs' , 'about' , 'items' , 'cats' ,  'informations'),
    );
    }
}
