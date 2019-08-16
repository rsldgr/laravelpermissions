<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }
    
    public function index(){

        return view('admin.home');
    }
}
