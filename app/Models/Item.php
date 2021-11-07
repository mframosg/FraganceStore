<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
  use HasFactory;
  //attributes id, quantity, subTotal, fragance_id, order_id, user_id, created_at, updated_at
  protected $fillable = ["quantity", "subTotal", "fragance_id", "order_id", "user_id"];

  public static function validate(Request $request)
  {
    $request->validate([
      "quantity" => "required|numeric|gt:0",
    ]);
  }

  public function getId()
  {
    return $this->attributes["id"];
  }

  public function setId($id)
  {
    $this->attributes["id"] = $id;
  }

  public function getQuantity()
  {
    return $this->attributes["quantity"];
  }

  public function setQuantity($quantity)
  {
    $this->attributes["quantity"] = $quantity;
  }

  public function getSubTotal()
  {
    return $this->attributes["subTotal"];
  }

  public function setSubTotal($subTotal)
  {
    $this->attributes["subTotal"] = $subTotal;
  }

  public function getFragance_id()
  {
    return $this->attributes["fragance_id"];
  }

  public function setFragance_id($fragance_id)
  {
    $this->attributes["fragance_id"] = $fragance_id;
  }

  public function getOrder_id()
  {
    return $this->attributes["order_id"];
  }

  public function setOrder_id($order_id)
  {
    $this->attributes["order_id"] = $order_id;
  }

  public function getUser_id()
  {
    return $this->attributes["user_id"];
  }

  public function setUser_id($user_id)
  {
    $this->attributes["user_id"] = $user_id;
  }

  //Relations

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function fragance()
  {
    return $this->belongs(Fragance::class);
  }

  public function orde()
  {
    return $this->belongs(Order::class);
  }
}
