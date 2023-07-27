<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');

        Photo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file_path' => $path
        ]);

        // Autres opérations ou redirection
    }
}
