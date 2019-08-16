<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
    
    }
    
    public function index(){
        $users = User::paginate(20);
        return view('admin.users.home',compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function edit(User $user){
        return view('admin.users.edit',compact('user'));
    }
    public function update(User $user,UpdateUser $request){
        
        $request->validated();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password):
            $user->password = Hash::make($request->password);
            
        endif;

        $user->save();
        return redirect(route('admin.users.edit', $user))->with('status', 'Profile updated!');

    }
}
