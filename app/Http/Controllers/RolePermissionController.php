<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionController extends Controller
{
    public function index(Role $role)
    {
        $permissions = $role->permissions;
        return view('role_permissions.index', compact('role', 'permissions'));
    }

    public function assignPermission(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'permission_id' => 'required|exists:permissions,id',
        ]);

        $role->permissions()->attach($validatedData['permission_id']);

        // Redirection ou autre logique de votre choix
        // ...
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        $role->permissions()->detach($permission);

        // Redirection ou autre logique de votre choix
        // ...
    }
}

