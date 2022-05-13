<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'url' => ['required', 'url']
        ]);
        return Website::create($data);
    }
}
