<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nombreEmployesParDepartement()
    {
        $nombreEmployes = DB::table('students')
                            ->select('Departement', DB::raw('count(*) as total'))
                            ->groupBy('Departement')
                            ->get();
    
        // Vérifier si $nombreEmployes est défini et non nul
        if (isset($nombreEmployes)) {
            return view('Acuelle', ['nombreEmployes' => $nombreEmployes]);
        } else {
            // faire quelque chose si $nombreEmployes est nul
            return view('Acuelle', ['nombreEmployes' => []]);
        }
    }
    

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('acuelle'); // Login Admin return a la route /acuelle de l'admin
    }

}
