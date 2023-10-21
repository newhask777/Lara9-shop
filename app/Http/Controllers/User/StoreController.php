<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        User::firstOrCreate([
            "email"=> $data["email"],
        ]);

        return redirect()->route('user.index');
    }
}