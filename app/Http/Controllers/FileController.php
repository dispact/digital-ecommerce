<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    function download(Request $request, $slug) {
        $product = Product::where('slug', $slug)->first();
        if ($request->user()->hasOrderedProduct($product->id))
            return Storage::disk('s3')->download($product->file);
        else
            abort(404);
    }
}
