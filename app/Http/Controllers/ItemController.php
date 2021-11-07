<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Fragance;
use App\Models\Order;

class ItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function add($id, Request $request)
  {
    Item::validate($request);

    $fragance = Fragance::findOrFail($id);
    $subTotal = $fragance->getPrice() * $request->input("quantity");

    $order_id = Order::count() + 1;

    Item::create([
      "quantity" => $request->input("quantity"),
      "subTotal" => $subTotal,
      "user_id" => auth()
        ->user()
        ->getId(),
      "order_id" => $order_id,
      "fragance_id" => $id,
    ]);

    return redirect()->route("fragance.info", [$id]);
  }

  public function delete($id)
  {
    $Item = Item::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("fragance_id", $id)
      ->first();

    $Item->delete();

    return back();
  }

  public function list()
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

    return view("home.shopping-car")
      ->with("items", $items)
      ->with("fragances", $fragances)
      ->with("total", $total)
      ->with("orders", $orders);
  }

  public function edit($item_id, $fragance_id, Request $request)
  {
    $request->validate([
      "quantity" => "required|numeric|gt:0",
    ]);

    $fragance = Fragance::findOrFail($fragance_id);
    $subTotal = $fragance->getPrice() * $request->input("quantity");

    $item = Item::findOrFail($item_id);

    $item->fill([
      "quantity" => $request->input("quantity"),
      "subTotal" => $subTotal,
    ]);

    $item->save();

    return back();
  }
}
