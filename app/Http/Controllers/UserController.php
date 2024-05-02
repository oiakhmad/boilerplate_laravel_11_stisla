<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index(Request $request)
    {

        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
            // var_dump($users)
        return view('pages.users.index', [
            'type_menu' => 'users',
            // 'users'=> compact('users')
            'users'=>  $users,
        ]);
    }

     public function create(Request $request)
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
     $user = new User();
     $user->name = $request->name;
     $user->email = $request->email;
     $user->phone = $request->phone;
     $user->password = Hash::make($request->password);
     $user->role = $request->role;

     $user->save();

     return redirect()->route('users.index')->with('success', 'User successfully created');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
          $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'role'=>'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;

        if ($user->password){
        $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }
}
