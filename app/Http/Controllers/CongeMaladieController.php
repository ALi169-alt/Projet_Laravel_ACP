<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CongeMaladie;
use Illuminate\Support\Facades\Auth;
use App\Models\student;


class CongeMaladieController extends Controller
{
    public function create()
    {
        return view ('Services.DemandeConge');
    }



    public function store(Request $request)
    {
        $employe_id = session('id');

            $congeMaladie = new CongeMaladie;
            $congeMaladie->employe_id = $employe_id;
            $congeMaladie->date_debut = $request->input('date_debut');
            $congeMaladie->date_fin = $request->input('date_fin');
            $congeMaladie->description = $request->input('description');
            $congeMaladie->save();

         
       $congeMaladie->save();

       session()->flash('success','La demande  à été envoyer avec succés');

       return redirect ('/demande-conge-maladie');//après je clique sur ajouter un NV Etudiant je doit passer directement a la pages des listes des etudaint /student
    }
    

}
