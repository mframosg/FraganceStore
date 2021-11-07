<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
  use HasFactory;

  //attributes id, total, paymentType, user_id, created_at, updated_at
  protected $fillable = ["total", "paymentType", "user_id"];

  public static function validate(Request $request)
  {
    $request->validate([
      "paymentType" => "required",
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

  public function getTotal()
  {
    return $this->attributes["total"];
  }

  public function setTotal($total)
  {
    $this->attributes["total"] = $total;
  }

  public function getPaymnetType()
  {
    return $this->attributes["paymnetType"];
  }

  public function setPaymnetType($paymnetType)
  {
    $this->attributes["paymnetType"] = $paymnetType;
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

  public function item()
  {
    return $this->hasMany(Item::class);
  }
}
