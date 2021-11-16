<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;
use App\Models\Item;
use App\Models\Review;
use App\Models\WishList;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Http;
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

    return view("home.sold")
      ->with("fragances", $fragances)
      ->with("items", $items);
  }

  public function info($id)
  {
    $wishlist = null;
    $item = null;

    $fragance = Fragance::findOrFail($id);
    $reviews = Review::where("fragance_id", $id)->get();

    $handbagsArrayData = null;

    try{
      $handbags = Http::timeout(3)->get("http://35.225.51.133/public/api/handbags");
      $handbagsArray = $handbags->json();
      $handbagsArrayData = $handbagsArray["data"];
    }catch (\Exception $e){
      $handbagsArrayData = [];
    }

    $pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/");
    $pokemonArray = $pokemon->json();
    $pokemonArrayData = $pokemonArray["results"][rand(0, count($pokemonArray["results"]) - 1)]["name"];
    

    if(!auth()->guest()){
    $wishlist = WishList::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("fragance_id", $id)
      ->first();
    
    $item = Item::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("fragance_id", $id)
      ->first();
    }

    return view("home.info", compact("handbagsArrayData", "pokemonArrayData") )
    // return view("home.info", compact("pokemonArrayData") )
      ->with("fragance", $fragance)
      ->with("reviews", $reviews)
      ->with("wishlist", $wishlist)
      ->with("item", $item);
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
