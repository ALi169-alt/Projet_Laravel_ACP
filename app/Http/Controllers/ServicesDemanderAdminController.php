<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportRequest;

use App\Models\CongeMaladie;
use App\Models\DemandePermisTravail;

use App\Models\FichePaie;
class ServicesDemanderAdminController extends Controller
{
    



public function LesDemandes()
{
    $congesMaladie = CongeMaladie::with('employe')->get();//student est un Model
    $demandesSupport = SupportRequest::with('employe')->get();
    $demandesPermisTravail = DemandePermisTravail::with('employe')->get();
    $demandesFichePaies = FichePaie::with('employe')->get();


    // Faites ce que vous voulez avec les demandes récupérées
    // Par exemple, vous pouvez les afficher ou les manipuler d'une autre manière
    // Pour accéder au nom de l'employé, utilisez $demande->employe->nom

    return view('Admin.ServicesDemander', compact('congesMaladie', 'demandesSupport', 'demandesPermisTravail','demandesFichePaies'));
}

}
