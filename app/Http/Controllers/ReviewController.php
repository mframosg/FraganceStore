<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Fragance;

class ReviewController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function add($id, Request $request)
  {
    Review::validate($request);

    Review::create([
      "comment" => $request->input("comment"),
      "starts" => $request->input("starts"),
      "user_id" => auth()
        ->user()
        ->getId(),
      "fragance_id" => $id,
    ]);

    return redirect()->route("review.index", [$id]);
  }

  public function reviewAddIndex($id)
  {
    $fragance = Fragance::findOrFail($id);

    return view("home.review-add")->with("fragance", $fragance);
  }

  public function list($id)
  {
    $fragance = Fragance::findOrFail($id);

    $reviews = Review::where(
      "user_id",
      auth()
        ->user()
        ->getId()
    )
      ->where("fragance_id", $id)
      ->get();

    return view("home.review")
      ->with("reviews", $reviews)
      ->with("fragance", $fragance);
  }

  public function show($fragance_id, $review_id)
  {
    $review = Review::findOrFail($review_id);

    return view("home.review-show")
      ->with("review", $review)
      ->with("fragance_id", $fragance_id);
  }

  public function delete($fragance_id, $review_id)
  {
    Review::destroy($review_id);

    return redirect()->route("review.index", [$fragance_id]);
  }

  public function edit($fragance_id, $review_id, Request $request)
  {
    $request->validate([
      "comment" => "required",
      "starts" => "required|numeric|gt:0",
    ]);

    $review = Review::findOrFail($review_id);

    $review->fill([
      "comment" => $request->input("comment"),
      "starts" => $request->input("starts"),
    ]);

    $review->save();

    return redirect()->route("review.index", [$fragance_id]);
  }
}
