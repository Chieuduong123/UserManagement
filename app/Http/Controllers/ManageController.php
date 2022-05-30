<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    function index()
    {
        $users = User::orderByDesc('id')->paginate(9);
        return view('manager', compact('users'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();
        return view('search', compact('users'));
    }
}
