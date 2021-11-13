<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fragance;

class ProductApi extends Controller
{
    public function listProducts()
    {
        $fragances = Fragance::select('title', 'category', 'description', 'price')->get();
        return response()->json($fragances);
    }
}
