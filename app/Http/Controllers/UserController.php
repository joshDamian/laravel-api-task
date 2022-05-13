<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Website;

class UserController extends Controller
{
    private function saveUser($email)
    {
        return User::create([
            'email' => $email
        ]);
    }

    public function subscribeToWebsite(Request $request)
    {
        $data = $request->validate([
            'email' => ['email', 'required'],
            'website_id' => ['exists:websites,id', 'reuired_without:website_url'],
            'website_url' => ['required_without:website_id', 'exists:websites,url'],
        ]);
        $user = User::firstWhere('email', $data['email']) ?? $this->saveUser($data['email']);
        $website = Website::firstWhere(function ($query) use ($data) {
            $query->where('id', $data['website_id'])->orWhere('url', $data['website_url']);
        });
        $user->subsriptions()->save($website);
    }
}
