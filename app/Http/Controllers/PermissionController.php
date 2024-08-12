<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire et création de la permission
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // Validation des données du formulaire et mise à jour de la permission
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }

    public function destroy(Permission $permission)
    {
        // Suppression de la permission
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }
}

