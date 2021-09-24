<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;

class FraganceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request)
    {
        Fragance::validate($request);

        $image = $request->file('image');
        $destinationPath = 'img/fragance/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);

        Fragance::create([
            'title' => $request->input('title'), 
            'image' => $profileImage, 
            'category' => $request->input('category'), 
            'description' => $request->input('description'),  
            'price' => $request->input('price'),
        ]);
        
        return redirect()->route('admin.home');
    }

    public function addIndex()
    {
        return view('admin.admin-add');
    }

    public function list()
    {
        $fragances = Fragance::all();

        return view('admin.admin-index')->with("fragances", $fragances);
    }

    public function show($id)
    {
        $fragance = Fragance::findOrFail($id);

        return view('admin.admin-show')->with("fragance", $fragance);
    }

    public function delete($id)
    {
        Fragance::destroy($id);

        return redirect()->route('admin.home');
    }
}
