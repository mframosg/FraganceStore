<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function add($total, Request $request)
  {
    Order::validate($request);

    Order::create([
      "total" => $total,
      "paymentType" => $request->input("paymentType"),
      "user_id" => auth()
        ->user()
        ->getId(),
    ]);

    return redirect()->route("home.index");
  }
}
