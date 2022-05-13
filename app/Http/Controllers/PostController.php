<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use Illuminate\Http\Request;
use App\Models\Website;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'website_id' => ['exists:websites,id', 'reuired_without:website_url'],
            'website_url' => ['required_without:website_id', 'exists:websites,url'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        $website = Website::firstWhere(function ($query) use ($data) {
            $query->where('id', $data['website_id'])->orWhere('url', $data['website_url']);
        });
        $post = $website->posts()->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
        NewPost::dispatch($post);
    }
}
