<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\student;

class EtuloginController extends Controller
{
  
    public function login(Request $request)
    {
        $credentials = $request->only('CodeEmploye', 'password');
    
    $table = Student::where('CodeEmploye', $credentials['CodeEmploye'])->first();

    if ($table) {
            session(['Nom' => $table->Nom]);
            session(['Prenom' => $table->Prenom]);
            session(['photo' => $table->photo]);
            session(['id' => $table->id]);

            session(['DateNaissance' => $table->DateNaissance]);
            session(['CodeEmploye' => $table->CodeEmploye]);
            session(['DateEmbauche' => $table->DateEmbauche]);
            session(['CIN' => $table->CIN]);
            session(['NbPhone' => $table->NbPhone]);
            session(['Departement' => $table->Departement]);
            session(['Ville' => $table->Ville]);
            session(['Salaire' => $table->Salaire]);
            session(['NbExperience' => $table->NbExperience]);

    
            // L'authentification de l'utilisateur est réussie.
            return redirect('/services');
        }
    
        // Si l'authentification échoue, redirigez l'utilisateur vers la page de connexion avec un message d'erreur.
        return redirect('/loginEtu')->with('error', 'Les informations de connexion sont invalides.');
    }
    

    
    
public function showLoginForm()
{
    return view('Etudiant.loginEtu');
}




}
