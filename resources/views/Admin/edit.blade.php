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
<form class="custom-mt-form" action="{{url('users/'.$user->id)}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->
<input type="hidden" name="_method" value="PUT">
  {{csrf_field()}}


  <div class="form-group has-error">
<label>Prenom</label>
<input name="PrenomAdmin" type="text" class="form-control" value="{{$user->Prenom}}">
@if($errors->get('PrenomEtudiant'))
     @foreach($errors->get('PrenomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>






<div class="form-group">
<label>Email :</label>
<input type="email" name="EmailAdmin" class="form-control"  value="{{$user->email}}">
@if($errors->get('CINEtudiant'))
     @foreach($errors->get('CINEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>







</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-12">


<div class="form-group">
<label>Nom</label>
<input type="text" name="NomAdmin" class="form-control" value="{{$user->Nom}}">
@if($errors->get('NomEtudiant'))
     @foreach($errors->get('NomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>





<div class="form-group">
<label>Username :</label>
<input type="text" name="UsernameAdmin" class="form-control"  value="{{$user->name}}">
@if($errors->get('CINEtudiant'))
     @foreach($errors->get('CINEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>












<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2" type="submit">Submit</button>
<button class="btn btn-secondary" type="reset">Cancel</button>
</div>





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