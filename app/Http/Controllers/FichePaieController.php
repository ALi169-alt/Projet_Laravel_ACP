<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichePaie; 

class FichePaieController extends Controller
{
    public function create()
    {
        return view ('Services.DemandeFichePaie');
    }



    public function store(Request $request)
    {
        $employe_id = session('id');

            $fichePaie = new FichePaie;
            $fichePaie->employe_id = $employe_id;
            $fichePaie->PeriodeDePaie = $request->input('periode_paie');
            $fichePaie->description = $request->input('description');
            $fichePaie->save();

         
       $fichePaie->save();

       session()->flash('success','La demande  à été envoyer avec succés');

       return redirect ('/demande-fiche-paie');//après je clique sur ajouter un NV Etudiant je doit passer directement a la pages des listes des etudaint /student
    }
    

}
