<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire et création du rôle
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // Validation des données du formulaire et mise à jour du rôle
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }

    public function destroy(Role $role)
    {
        // Suppression du rôle
        // ...

        // Redirection ou autre logique de votre choix
        // ...
    }
}

