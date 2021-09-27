<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;
class HomeController extends Controller
{
  public function index()
  {
    $fragances = Fragance::all();
    return view("home.index")->with("fragances", $fragances);
  }

  public function info($id)
  {
    $fragance = Fragance::findOrFail($id);

    return view("home.info")->with("fragance", $fragance);
  }

  public function home()
  {
    return redirect()->route("home.index");
  }
}
