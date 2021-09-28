<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;
use App\Models\Item;
use App\Models\Review;
use App\Models\WishList;
class HomeController extends Controller
{
  public function index()
  {
    $fragances = Fragance::all();

    return view("home.index")->with("fragances", $fragances);
  }

  public function solds()
  {
    $fragances = Fragance::all();
    $items = Item::all();

    return view("home.sold")->with("fragances", $fragances)->with("items", $items);
  }

  public function info($id)
  {
    $fragance = Fragance::findOrFail($id);
    $reviews = Review::where('fragance_id', $id)->get();
    $wishlist = WishList::where('user_id', auth()->user()->getId())->where('fragance_id', $id)->first();
    $item = Item::where('user_id', auth()->user()->getId())->where('fragance_id', $id)->first();

    return view("home.info")->with("fragance", $fragance)->with("reviews", $reviews)->with("wishlist", $wishlist)->with("item", $item);
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
