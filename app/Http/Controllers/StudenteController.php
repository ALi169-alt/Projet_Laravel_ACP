<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\UploadFile;

use App\Models\student;//le model student très important pour la connexion avec une table dans la BD.(ce lui qui la fait la connexion pour la table)
use App\Models\User;



use App\studente;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;


use App\Http\Requests\studentrequest;

class StudenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct(){
        $this->middleware('auth');
     }

     


    public function index()
    {
        
        $list = student::all();
        return view('index',['students'=>$list]);


    }

    public function maMethode()
    {
        $employe = student::find(Auth::id());
        $nomEmploye = ($employe != null) ? $employe->Nom : '';

        
        return view('AcuelleEtudaint', ['nomEmploye' => $nomEmploye]);
    }
  



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUser = Auth::user();
        if ($currentUser->isAdmin() or $currentUser->isCreateOnlyAdmin() or  $currentUser->isCreateAndUpdateAdmin()) {
        return view ('create');
    }
    else {
        session()->flash('modification', 'vous avez pas le droit pour aoujter un nouveau  employé');
        return redirect('student');
    }

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentrequest $request)
    {
        $student = new student();
        if ($student->isAdmin() or $student->isCreateOnlyAdmin() or  $student->isCreateAndUpdateAdmin()) {

        $student->CodeEmploye = $request->input('CodeEtudiant');
        $student->Nom = $request->input('NomEtudiant');

        $student->Prenom = $request->input('PrenomEtudiant');
        $student->CIN = $request->input('CINEtudiant');
        $student->NbPhone = $request->input('NbPhone');
        $student->DateEmbauche = $request->input('Date');
        $student->Password =md5($request->input('password'));//$user->password = bcrypt($request->input('password'));        

        $student->Departement = $request->input('Feliere');
        $student->Ville= $request->input('Ville');
        $student->Salaire = $request->input('AnneBac');

        $student->Sexe = $request->input('sexe');
        $student->NbExperience = $request->input('AnneExp');
        $student->DateNaissance = $request->input('DateN');
        $student->DateDepart= $request->input('DateDepart');


       
   
        if($request->hasfile('photo')){
          $file=$request->file('photo');//enctype='mutipost/form-data' obligatoire dans la balise <Form></form>
            $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('imagesEmp/',$filename);
            $student->photo=$filename;
        }

         
       $student->save();

       session()->flash('success','LEtudiant à été enregister avec succé');

       return redirect ('student');}//après je clique sur ajouter un NV Etudiant je doit passer directement a la pages des listes des etudaint /student
    
       else {
        session()->flash('modification', 'vous avez pas le droit pour aoujter un nouveau  employé');
        return redirect('student');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function search(Request $request){
        $search = $request->get('search');
        
        $posts = DB::table('students')
                    ->where('Nom', 'like', '%'.$search.'%')
                    ->orWhere('Ville', 'like', '%'.$search.'%')
                    ->orWhere('Departement', 'like', '%'.$search.'%')
                    ->paginate(5);
    
        return view("index", ['students' => $posts]);
    }
    

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    //  -------------------
  
    // ---------------------
    public function edit($id)  //fonction permet de recuperer le Id de l'Etudiant  qui ne veut modifier
    {
        
        $student = student::find($id);
           
        if ($student->isAdmin() or  $student->isCreateAndUpdateAdmin() or $student->isUpdateOnlyAdmin() or $student->isUpdateAndDeleteAdmin()) {
            return view('edit',['students'=>$student]);
        } else {
            session()->flash('modification', 'Vous n\'avez pas le droit de modifier un les information d\'un employe.');
            return redirect('student');
        }

      


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

    $student = student::find($id);

    if ($student && $student->isAdmin() or  $student->isCreateAndUpdateAdmin() or $student->isUpdateOnlyAdmin() or $student->isUpdateAndDeleteAdmin()) {

    $student->CodeEmploye=$request->input('CodeEtudiant');
    $student->Prenom=$request->input('PrenomEtudiant');
    $student->Nom=$request->input('NomEtudiant');
    $student->CIN=$request->input('CINEtudiant');
    $student->NbPhone=$request->input('NbPhone');
    $student->DateEmbauche=$request->input('Date');
    $student->Password=md5($request->input('password'));
    $student->Departement=$request->input('Feliere');//departement
    $student->Ville=$request->input('Ville');
    $student->Salaire=$request->input('AnneBac');


    $student->Sexe = $request->input('sexe');
    $student->NbExperience = $request->input('AnneExp');
    $student->DateNaissance = $request->input('DateN');

     $student->DateDepart= $request->input('DateDepart');
    
    if($request->hasfile('photo')){
        $file=$request->file('photo');//enctype='mutipost/form-data' obligatoire dans la balise <Form></form>
          $extension=$file->getClientOriginalExtension();
         $filename=time().'.'.$extension;
         $file->move('imagesEmp/',$filename);
          $student->photo=$filename;
      }
    $student->save();
    session()->flash('modification','L\'employé à été modifier avec succés');
    return redirect ('student');}
    else {
        session()->flash('modification', 'Vous n\'avez pas le droit de modifier cet employé.');
        return redirect('student');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $employe = student::find($id);
        if ($employe->isAdmin()  or $employe->isUpdateAndDeleteAdmin()) {
      
       $employe->delete();
       session()->flash('suppression','LEtudiant à été supprimer avec succé');
       return redirect('student');
        }

        else
{
        session()->flash('suppression', 'Vous a vez pas la droit');
        return redirect('student');
    }

    
    }

  
     
}
