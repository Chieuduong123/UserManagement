<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    function index(Request $request)
    {
        $users = User::orderByDesc('id')->paginate(5);
        if ($request->input('search')) {
            $search = $request->input('search');
            $users = $users->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }
        return view('manager', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('edit', compact('user'));
    }

  

    

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }
}
