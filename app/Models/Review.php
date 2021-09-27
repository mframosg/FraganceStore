<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    use HasFactory;

    //attributes id, comment, starts, user_id, fragance_id, created_at, updated_at
  protected $fillable = ["comment", "starts", "user_id", "fragance_id"];

  public static function validate(Request $request)
  {
    $request->validate([
      "comment" => "required",
      "starts" => "required|numeric|gt:0",
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

  public function getComment()
  {
    return $this->attributes["comment"];
  }

  public function setComment($comment)
  {
    $this->attributes["comment"] = $comment;
  }

  public function getStarts()
  {
    return $this->attributes["starts"];
  }

  public function setStarts($starts)
  {
    $this->attributes["starts"] = $starts;
  }

  public function getUser_id()
  {
    return $this->attributes["user_id"];
  }

  public function setUser_id($user_id)
  {
    $this->attributes["user_id"] = $user_id;
  }

  public function getFragance_id()
  {
    return $this->attributes["fragance_id"];
  }

  public function setFragance_id($fragance_id)
  {
    $this->attributes["fragance_id"] = $fragance_id;
  }

  //Relations

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function fragance(){
    return $this->belongsTo(Fragance::class);
  }
}
