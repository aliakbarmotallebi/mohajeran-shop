<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::whereNull('erp_code')->collate('utf8mb4_bin')->paginate(30);
        return view('dashboard.users.index', compact('users'));
    }
}
