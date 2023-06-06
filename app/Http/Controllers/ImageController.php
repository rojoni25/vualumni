<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function upload(Request $request)
    {
        $image = $request->file('upload');
        $path = $image->store('images', 'public');

        // Return the path of the uploaded image
        return response()->json([
            'url' => Storage::url($path),
        ]);
    }
}
