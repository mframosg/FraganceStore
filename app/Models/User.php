<?php

namespace App\Models;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  //attributes id, admin, name, email, password, created_at, updated_at
  protected $fillable = ["admin", "name", "email", "password"];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ["password", "remember_token"];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    "email_verified_at" => "datetime",
  ];

  public function getId()
  {
    return $this->attributes["id"];
  }

  public function setId($id)
  {
    $this->attributes["id"] = $id;
  }

  public function getAdmin()
  {
    return $this->attributes["admin"];
  }

  public function setAdmin($admin)
  {
    $this->attributes["admin"] = $admin;
  }

  public function getName()
  {
    return $this->attributes["name"];
  }

  public function setName($name)
  {
    $this->attributes["name"] = $name;
  }

  public function getEmail()
  {
    return $this->attributes["email"];
  }

  public function setEmail($email)
  {
    $this->attributes["email"] = $email;
  }

  //Relations

  public function fragances(){
    return $this->hasMany(Fragance::class);
  }

  public function comments(){
    return $this->hasMany(Comment::class);
  }

  public function whishlist(){
    return $this->belongsTo(WishList::class);
  }

  public function items(){
    return $this->hasMany(Item::class);
  }

  public function orders(){
    return $this->hasMany(Order::class);
  }
}
