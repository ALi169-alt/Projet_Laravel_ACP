<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudenteController;
use App\Http\Controllers\EtuloginController;
use App\Http\Controllers\HomeController; 

use App\Http\Controllers\CongeMaladieController; 

use App\Http\Controllers\SupportRequestController; 
use App\Http\Controllers\FichePaieController; 
use App\Http\Controllers\DemandePermisTravailController; 

use App\Http\Controllers\DemandeController; 

use App\Http\Controllers\UserController; //pour UserController
use App\Http\Controllers\ServicesDemanderAdminController;

use App\Http\Controllers\RegressionController; 



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); // Pages1 Admin ou Etudiant
});




// ------- Route Etudiant



    Route::get('/employe', function () {
        return view('Etudiant.InformationPersonele'); 
    });
    


Route::get('/services',function(){
    return view ('Etudiant.services')
    
    ;});
    
        Route::get('/loginEtu', [EtuloginController::class, 'showLoginForm']);

        Route::post('/loginEtu', [EtuloginController::class, 'login']);
        

//------- Route Admin
Route::get('/loginAdmin',function(){    //Login Pages pour les Admin
    return view ('loginAdmin')
    
    ;});

    Route::get('student', [StudenteController::class, 'index']);
    Route::get('student/create', [StudenteController::class, 'create']);
    Route::post('student', [StudenteController::class, 'store']);
    Route::get('student/{id}/edit', [StudenteController::class, 'edit']);
    Route::put('student/{id}', [StudenteController::class, 'update']);
    Route::delete('student/{id}', [StudenteController::class, 'destroy']);
    
    Route::get('/student/{id}', function($id) {
        $employee = DB::table('students')->where('id', $id)->first();
        return response()->json($employee);
    });  //show

    Route::get('/search', [StudenteController::class, 'search']);

    Route::get('/Les_Demandes', [ServicesDemanderAdminController::class, 'LesDemandes']);


        //  -----------------------

    Route::get('/users', [UserController::class, 'indexAdmin']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    Route::get('/create', [UserController::class, 'create']);
    Route::post('users', [UserController::class, 'store']);

    Route::get('users/{id}/edit', [UserController::class, 'edit']);
    Route::put('users/{id}', [UserController::class, 'update']);
// --------------------------


// --------------------Route des Services-------------------

Route::get('/demande-conge-maladie', [CongeMaladieController::class, 'create']);
Route::post('/conge-maladie/store', [CongeMaladieController::class, 'store']);

Route::get('/demande-support-informatique', [SupportRequestController::class, 'create']);
Route::post('/support-informatique/store', [SupportRequestController::class, 'store']);

Route::get('/demande-fiche-paie', [FichePaieController::class, 'create']);
Route::post('/fiche-paie/store', [FichePaieController::class, 'store']);

Route::get('/demande-permis-travail', [DemandePermisTravailController::class, 'create']);
Route::post('/permis-travail/store', [DemandePermisTravailController::class, 'store']);

Route::get('/Mes_Demandes', [DemandeController::class, 'mesDemandes']);

// ---------------------


    Route::get('/home', [HomeController::class, 'nombreEmployesParDepartement']);//pour recuperer les nombres des employes pour chaque departement




//---------

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//Dashboard Admin

use Phpml\DimensionReduction\PCA;
use App\Models\student;





Route::get('/acp', function () {


$employes = Student::select('Salaire', 'NbExperience', DB::raw('TIMESTAMPDIFF(YEAR, DateNaissance, CURDATE()) AS Age'), DB::raw('YEAR(DateDepart) - YEAR(DateEmbauche) AS AnneesDansEntreprise'))->get();

$list = student::all();//pour recuperer le code des  employes
    // Prétraitement des données (formatage)
    $data = $employes->map(function ($employe) {
        return [$employe->Age,$employe->AnneesDansEntreprise,$employe->Salaire, $employe->NbExperience];
    })->toArray();

    // Appliquer l'ACP avec 2 composantes principales
    $pca = new PCA(null, 4);
    $pca->fit($data);
    $transformedData = $pca->transform($data);

    // Récupérer les autres données pour l'analyse comparative (par exemple, les performances des employés)




    // Retourner les résultats de l'ACP à la vue
    return view('acp_results', ['transformedData' => $transformedData,'students'=>$list, 'anneesExperiences' => $employes->pluck('AnneesDansEntreprise'),'ages' => $employes->pluck('Age')]);



});


    




