<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HiFolks\Statistics\Stat;

class RegressionController extends Controller
{
    public function showResults()
    {
        // Chemin vers le script Python
        $experience = [2, 4, 6, 8, 10];
        $salaires = [30, 40, 50, 60, 70];
    
        // Créer et ajuster le modèle de régression linéaire
        list($slope, $intercept) = Stat::linearRegression($experience, $salaires);
        
        // Prévoir le salaire pour une expérience de 5 ans
        $experience_nouveau = 5;
        $salaire_predi = $slope * $experience_nouveau + $intercept;
    
        // Afficher les résultats dans la vue
        return view('regression', ['salaire_predi' => $salaire_predi]);
    }
}


