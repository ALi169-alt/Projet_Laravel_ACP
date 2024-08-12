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


<!-- @if(count($errors))
<div class="alert alert-danger" role="alert">
  <ul>
 @foreach($errors->all() as $message)
 <li>{{$message}}</li>
 @endforeach
</ul>
</div>

@endif -->

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<h5 class="text-uppercase mb-0 mt-0 page-title">Ajouter un Employé</h5>
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
<form class="custom-mt-form" action="{{url('student')}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->

  {{csrf_field()}}


<div class="form-group has-error">
<label>Prenom</label>
<input name="PrenomEtudiant" type="text" class="form-control" value="{{old('PrenomEtudiant')}}">
@if($errors->get('PrenomEtudiant'))
     @foreach($errors->get('PrenomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Code Employé</label>
 <input  type="text" name="CodeEtudiant" class="form-control"  value="{{old('CodeEtudiant')}}">
 @if($errors->get('CodeEtudiant'))
     @foreach($errors->get('CodeEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>


<div class="form-group">
<label>Mobile number</label>
<input type="number" name="NbPhone" class="form-control"  value="{{old('NbPhone')}}">
@if($errors->get('NbPhone'))
     @foreach($errors->get('NbPhone') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="Password" class="form-control"  value="{{old('Password')}}">
@if($errors->get('Password'))
     @foreach($errors->get('Password') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Ville</label>
<input type="text"  name="Ville" class="form-control"  value="{{old('Ville')}}">
@if($errors->get('Ville'))
     @foreach($errors->get('Ville') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Date de naissance</label>
<input type="date" name="DateN" class="form-control"  value="{{old('DateN')}}">
@if($errors->get('AnneBac'))
     @foreach($errors->get('AnneBac') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>


<div class="form-group">
<label>Date de Depart :</label>
<input type="date" name="DateDepart" class="form-control"  value="{{old('DateDepart')}}">
<!-- @if($errors->get('AnneBac'))
     @foreach($errors->get('AnneBac') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif -->
</div>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-12">


<div class="form-group">
<label>Nom</label>
<input type="text" name="NomEtudiant" class="form-control" value="{{old('NomEtudiant')}}">
@if($errors->get('NomEtudiant'))
     @foreach($errors->get('NomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>





<div class="form-group">
<label>CIN</label>
<input type="text" name="CINEtudiant" class="form-control"  value="{{old('CINEtudiant')}}">
@if($errors->get('CINEtudiant'))
     @foreach($errors->get('CINEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>




<div class="form-group">
<label>Date d'Embauche</label>
<input class="form-control datetimepicker-input datetimepicker" type="date" name="Date"  value="{{old('date')}}" data-toggle="datetimepicker">
@if($errors->get('date'))
     @foreach($errors->get('date') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Département</label>

<select name="Feliere" class="form-control" value="{{old('Feliere')}}">
     <option value="Informatique">Informatique</option>
     <option value="RH">RH</option>
     <option value="Juridique">Juridique</option>
     <option value="Commercial">Commercial</option>
</select>
@if($errors->get('Feliere'))
     @foreach($errors->get('Feliere') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Salaire (DH)</label>
<input type="number" step="0.01" name="AnneBac" class="form-control"  value="{{old('AnneBac')}}" required>
@if($errors->get('AnneBac'))
     @foreach($errors->get('AnneBac') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>


<div class="form-group">
<label>SEXE :</label>

<select name="sexe" class="form-control" value="{{old('sex')}}">
     <option value="Homme">Homme</option>
     
     <option value="Femme">Femme</option>
</select>
@if($errors->get('Feliere'))
     @foreach($errors->get('Feliere') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>

<div class="form-group">
<label>Années d'éxperience :</label>
<input type="number" name="AnneExp" class="form-control"  value="{{old('AnneExp')}}">
@if($errors->get('AnneBac'))
     @foreach($errors->get('AnneBac') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="form-group">
<label> Image</label>
<input type="file"   class="form-control" name="photo"  value="{{old('file')}}">
@if($errors->get('photo'))
     @foreach($errors->get('PrenomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>


<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2" type="submit">Submit</button>
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
<link rel="stylesheet" href="assetts/js/bootstrap.min.js">
<link rel="stylesheet" href="assetts/js/jquery-3.6.0.min.js">

@endsection
</body>
</html>