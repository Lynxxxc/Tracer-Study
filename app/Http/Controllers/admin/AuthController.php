<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    // Dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard'); // Sesuaikan dengan view dashboard admin
    }
}
