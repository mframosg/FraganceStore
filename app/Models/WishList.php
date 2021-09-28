<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WishList extends Model
{
    use HasFactory;

      //attributes id, fragance_id, user_id, created_at, updated_at
  protected $fillable = ["fragance_id", "user_id"];

  public function getId()
  {
    return $this->attributes["id"];
  }

  public function setId($id)
  {
    $this->attributes["id"] = $id;
  }

  public function getFragance_id()
  {
    return $this->attributes["fragance_id"];
  }

  public function setFragance_id($fragance_id)
  {
    $this->attributes["fragance_id"] = $fragance_id;
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

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function fragances(){
    return $this->belongsToMany(Fragance::class);
  }
}
