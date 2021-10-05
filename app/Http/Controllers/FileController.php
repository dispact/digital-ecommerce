<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    function download(Request $request, $filename) {
        $path = 'files/' . $filename;
        $product = Product::where('file', $path)->first();
        if ($request->user()->hasOrderedProduct($product->id))
            return Storage::download($path);
        else
            abort(404);
    }
}
