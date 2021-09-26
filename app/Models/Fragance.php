<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Fragance extends Model
{
  use HasFactory;

  //attributes id, image, title, category, description, price, created_at, updated_at
  protected $fillable = ["title", "image", "category", "description", "price"];

  public static function validate(Request $request)
  {
    $request->validate([
      "title" => "required",
      "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
      "category" => "required",
      "description" => "required",
      "price" => "required|numeric|gt:0",
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

  public function getTitle()
  {
    return $this->attributes["title"];
  }

  public function setTitle($title)
  {
    $this->attributes["title"] = $title;
  }

  public function getCategory()
  {
    return $this->attributes["category"];
  }

  public function setCategory($category)
  {
    $this->attributes["category"] = $category;
  }

  public function getDescription()
  {
    return $this->attributes["description"];
  }

  public function setDescription($description)
  {
    $this->attributes["description"] = $description;
  }

  public function getPrice()
  {
    return $this->attributes["price"];
  }

  public function setPrice($price)
  {
    $this->attributes["price"] = $price;
  }
}
