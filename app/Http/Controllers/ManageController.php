<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    function index(Request $request)
    {
        $users = User::select('*');
        if ($request->input('search')) {
            $search = $request->input('search');
            $users = $users->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }
        $users = $users->paginate(2);
        return view('manager', compact('users'));
    }

    // public function edit($id){
    //     $user = User::find($id);
    //     return view('edit', compact('user'));
    // }

    // public function update(Request $request, $id){
    //      $user = User::find($id);
    //     $this->validate(request(), [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'new_password' => 'required|min:6|confirmed|different:password',
    //         'new_password_confirmation' => 'required'
    //     ]);
    //     $user->name = request('name');
    //     $user->email = request('email');
    //     if (Hash::check($request->password, $user->password)) { 
    //         $user->fill([
    //          'password' => Hash::make($request->new_password)
    //          ])->save();
    //         $request->session()->flash('success', 'Password changed');
    //         return back();
         
    //      } else {
    //          $request->session()->flash('error', 'Password does not match');
    //          return back();
    //      }

        // $user->name = request('name');
        // $user->email = request('email');
        // $user->password = bcrypt(request('password'));
        // $user->save();
        // return back();
    // }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }
}
