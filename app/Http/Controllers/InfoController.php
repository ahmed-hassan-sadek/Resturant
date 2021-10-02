<?php

namespace App\Http\Controllers;

use App\Http\Traits\InfoTrait;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    use InfoTrait;

    private $infoModel;

    public function __construct(Info $info)
    {
           $this->infoModel = $info;
    }

    public function index()
    {
        $information = $this->infoModel::get();
        return view('admin.information.index', compact('information'));
    }

    public function create()
    {
        return view('admin.information.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'key'=>'required',
            'value'=> 'required|min:3|max:255'
        ]);
        $this->infoModel::create($request->except(['_token']));
        return redirect()->route('information.index')->with('success', 'Information Has Been Created Successfully');
    }

    public function edit($infoId)
    {
        $info = $this->getInfoById($infoId);
        return view('admin.information.edit', compact('info'));
    }

    public function update(Request $request, $infoId)
    {
       // dd($request);
        if ($info = $this->getInfoById($infoId)) {
            $request->validate([
                'key'=>'required',
                'value'=> 'required|min:10|max:255'
            ]);
            $info->update($request->except(['_token']));
            return redirect()->route('information.index')->with('success', 'Information Has Been Updated Successfully');
        }

    }

    public function destroy($infoId)
    {
        if ($info = $this->getInfoById($infoId)) {
            $info->delete();
            return redirect()->route('information.index')->with('success', 'Information Has Been Deleted Successfully');
        }
        return abort('404');
    }

}
