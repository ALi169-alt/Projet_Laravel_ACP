<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function indexAdmin()
    {
        // Récupérer tous les administrateurs
        $admins = User::all();
        return view('Admin.indexAdmin', ['users' => $admins]);
    }









    public function create()
    {
         $currentUser = Auth::user();
        if ($currentUser->isAdmin() or $currentUser->isCreateOnlyAdmin() or  $currentUser->isCreateAndUpdateAdmin()) {
            return view('Admin.createAdmin');
        }
        else {
            session()->flash('modification', 'vous avez pas le droit pour aoujter un nouveau  Admin');
            return redirect('users');
        }
        

      
    }

    public function store(Request $request)
    {
        // Vérifier le rôle de l'utilisateur actuel
        $currentUser = Auth::user();

        if ($currentUser->isAdmin() or $currentUser->isCreateOnlyAdmin() or  $currentUser->isCreateAndUpdateAdmin()) {
            // Administrateur avec tous les droits
            $user = new User();
            $user->Nom = $request->input('NomAdmin');
            $user->Prenom = $request->input('PrenomAdmin');

            $user->name = $request->input('UsernameAdmin');
            $user->email = $request->input('EmailAdmin');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role');
            $user->save();

            // Autres opérations pour l'administrateur avec tous les droits

            session()->flash('success', 'Admin a été enregistré avec succès.');
            return redirect('users');
        }  
        else {
            session()->flash('modification', 'vous avez pas le droit pour aoujter un nouveau  Admin');
            return redirect('users');
        }
    }



    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


    public function edit($id)
    {
        $user = User::find($id);
    
        // Vérifier si l'utilisateur actuel a les privilèges pour modifier un administrateur
        if ($user->isAdmin() or  $user->isCreateAndUpdateAdmin() or $user->isUpdateOnlyAdmin() or $user->isUpdateAndDeleteAdmin()) {
            return view('Admin.edit', ['user' => $user]);
        } else {
            session()->flash('modification', 'Vous n\'avez pas le droit de modifier un admin.');
            return redirect('users');
        }
    }
    


    public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        // Vérifier si l'utilisateur actuel est autorisé à mettre à jour cet administrateur
        if ($user && $user->isAdmin() or  $user->isCreateAndUpdateAdmin() or $user->isUpdateOnlyAdmin() or $user->isUpdateAndDeleteAdmin()) {
            $user->Nom = $request->input('NomAdmin');
            $user->Prenom = $request->input('PrenomAdmin');
            $user->name = $request->input('UsernameAdmin');
            $user->email = $request->input('EmailAdmin');
            $user->password = bcrypt($request->input('password'));        
            $user->save();
    
            session()->flash('modification', 'Admin a été modifié avec succès');
            return redirect('users');
        } else {
            session()->flash('modification', 'Vous n\'avez pas le droit de modifier cet admin.');
            return redirect('users');
        }
    }
    

    // private function isAdmin()
    // {
    //     // Vérifier si l'utilisateur actuel est un administrateur
    //     return auth()->user()->role === 'admin';
    // }



  
    
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->isAdmin()  or $user->isUpdateAndDeleteAdmin()) {

            $user->delete();
            session()->flash('modification', 'Admin a été supprimé avec succès');
            return redirect('users');
        }

      
else
{
        session()->flash('suppression', 'Vous a vez pas la droit');
        return redirect('users');
    }}

}
