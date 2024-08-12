<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="assetts/css/bootstrap.min.css">

</head>
<body>
@extends('layouts.NavMenu')
@section('content')






<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<h5 class="text-uppercase mb-0 mt-0 page-title">modifier un Etudiant</h5>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-12">

</div>
</div>
</div>
<div class="page-content">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<div class="card-body">
<div class="row">


<div class="col-lg-6 col-md-6 col-sm-6 col-12">    
<form class="custom-mt-form" action="{{url('student/'.$students->id)}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->
<input type="hidden" name="_method" value="PUT">
  {{csrf_field()}}


<div class="form-group">
<label>Prenom</label>
<input name="PrenomEtudiant" type="text" class="form-control" value="{{$students->Prenom}}">

</div>
    


<div class="form-group">
<label>Code Etudiant</label>
 <input  type="text" name="CodeEtudiant" class="form-control" value="{{$students->CodeEmploye}}"> 


</div>


<div class="form-group">
<label>Mobile number</label>
<input type="number" name="NbPhone" class="form-control" value="{{$students->NbPhone}}">

</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="Password" class="form-control" value="{{$students->Password}}">

</div>

<div class="form-group">
<label>Ville</label>
<input type="text"  name="Ville" class="form-control" value="{{$students->Ville}}">


</div>


<div class="form-group">
<label>Date de naissance :</label>
<input type="date"  name="DateN" class="form-control" value="{{$students->DateNaissance}}">


</div>

<div class="form-group">
<label>Date de Depart :</label>
<input type="date"  name="DateDepart" class="form-control" value="{{$students->DateDepart}}">

</div>

</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-12">


<div class="form-group">
<label>Nom</label>
<input type="text" name="NomEtudiant" class="form-control" value="{{$students->Nom}}">

</div>





<div class="form-group">
<label>CIN</label>
<input type="text" name="CINEtudiant" class="form-control" value="{{$students->CIN}}">

</div>




<div class="form-group">
<label>Date d'Embauche:</label>
<input class="form-control datetimepicker-input datetimepicker" type="Date" name="Date" value="{{$students->DateEmbauche}}">

</div>


<div class="form-group">
<label for="">Departement :</label>

<select name="Feliere" class="form-control">
    <option value="Informatique" {{ $students->Departement == 'Informatique' ? 'selected' : '' }}>Informatique</option>
    <option value="RH" {{ $students->Departement == 'RH' ? 'selected' : '' }}>RH</option>
    <option value="Juridique" {{ $students->Departement == 'Juridique' ? 'selected' : '' }}>Juridique</option>
    <option value="Commercial" {{ $students->Departement == 'Commercial' ? 'selected' : '' }}>Commercial</option>
</select>
@if($errors->get('Feliere'))
     @foreach($errors->get('Feliere') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>



<div class="form-group">
<label>Salires (DH):</label>
<input type="number" name="AnneBac" class="form-control" value="{{$students->Salaire}}">
</div>

<div class="form-group">
<label>Sexe :</label>
<select name="sexe" class="form-control">
    <option value="Homme" {{ $students->Sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
    <option value="Femme" {{ $students->Sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
    
</select>
</div>

<div class="form-group">
<label>Annes d'NbExperience :</label>
<input type="number" name="AnneExp" class="form-control" value="{{$students->NbExperience}}">
</div>



</div>

</div>


</div>







<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="form-group">
<label>Image</label>
<input type="file" name="photo"  class="form-control" >
</div>


<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2" type="submit">modifier</button>
<button class="btn btn-secondary" type="reset">Cancel</button>
</div>





</div>
</form> <!-- @@@@@@@@@  END Form1 @@@@@@@-->







</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection
</body>
</html>