<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;
use App\Models\Review;
use App\Models\WishList;
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
    $wishlist = WishList::where('user_id', auth()->user()->getId())->where('fragance_id', $id)->first();

    return view("home.info")->with("fragance", $fragance)->with("reviews", $reviews)->with("wishlist", $wishlist);
  }

  public function buy()
  {
    return view("home.shopping-car");
  }

  public function wishList()
  {
    return view("home.wish-list");
  }

  public function home()
  {
    return redirect()->route("home.index");
  }
}
