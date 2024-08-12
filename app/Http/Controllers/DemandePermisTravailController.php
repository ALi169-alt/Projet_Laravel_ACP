<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandePermisTravail;

class DemandePermisTravailController extends Controller
{
    public function create()
    {
        return view ('Services.DemandePermisTravail');
    }



    public function store(Request $request)
    {
        $employe_id = session('id');

            $permisTravail = new DemandePermisTravail;
            $permisTravail->employe_id = $employe_id;
            $permisTravail->Date_debut = $request->input('date_debut');
            $permisTravail->Date_fin = $request->input('date_fin');

            $permisTravail->description = $request->input('description');
            $permisTravail->type_permis = $request->input('type_permis');
            $permisTravail->save();

         
       $permisTravail->save();

       session()->flash('success','La demande  à été envoyer avec succés');

       return redirect ('/demande-permis-travail');//après je clique sur ajouter un NV Etudiant je doit passer directement a la pages des listes des etudaint /student
    }
    
}
