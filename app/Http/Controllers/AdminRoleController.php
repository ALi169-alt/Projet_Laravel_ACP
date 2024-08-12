<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminRoleController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin_roles.index', compact('admins'));
    }

    public function assignRole(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $admin->role_id = $validatedData['role_id'];
        $admin->save();

        // Redirection ou autre logique de votre choix
        // ...
    }
}
