<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Fragance;

class WishListController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function add($id)
  {

    WishList::create([
      "user_id" => auth()->user()->getId(),
      "fragance_id" => $id,
    ]);

    return redirect()->route("fragance.info", [$id]);
  }

  public function delete($id)
  {
    $wishlist = WishList::where('user_id', auth()->user()->getId())->where('fragance_id', $id)->first();
    
    $wishlist->delete();

    return redirect()->route("fragance.info", [$id]);
  }
}
