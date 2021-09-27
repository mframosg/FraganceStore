<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;
use App\Models\Review;
class HomeController extends Controller
{
  public function index()
  {
    $fragances = Fragance::all();
    return view("home.index")->with("fragances", $fragances);
  }

  public function info($id)
  {
    $fragance = Fragance::findOrFail($id);
    $reviews = Review::where('fragance_id', $id)->get();


    return view("home.info")->with("fragance", $fragance)->with("reviews", $reviews);
  }

  public function home()
  {
    return redirect()->route("home.index");
  }
}
