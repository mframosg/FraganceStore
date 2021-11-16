<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Fragance;

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

  public function pdf()
  {
    $order_id = Order::count();
    $fragances = Fragance::all();
    $items = Item::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("order_id", ">", $order_id)
      ->get();
    $orders = Order::all();
    $total = Item::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("order_id", ">", $order_id)
      ->sum("subTotal");

    return PDF::loadView('home.pdf', compact('items', 'fragances', 'total'))
      ->download('archivo.pdf');
  }
}
