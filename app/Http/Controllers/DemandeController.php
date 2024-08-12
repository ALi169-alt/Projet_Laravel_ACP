<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SupportRequest;

use App\Models\CongeMaladie;
use App\Models\DemandePermisTravail;

use App\Models\FichePaie;

class DemandeController extends Controller
{
    public function mesDemandes()
{
    $employe_id = session('id');

    $congesMaladie = CongeMaladie::where('employe_id',  $employe_id)->get();
    $demandesSupport = SupportRequest::where('employe_id',  $employe_id)->get();
    $demandesPermisTravail = DemandePermisTravail::where('employe_id', $employe_id)->get();
    $demandesFichePaies = FichePaie::where('employe_id', $employe_id)->get();

    return view('Services.MesDemandes', compact('congesMaladie', 'demandesSupport', 'demandesPermisTravail','demandesFichePaies'));
}

}
