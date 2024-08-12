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
<h5 class="text-uppercase mb-0 mt-0 page-title">Ajouter un Admin</h5>
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


<form class="custom-mt-form" action="{{url('users')}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->

  {{csrf_field()}}


<div class="form-group has-error">
<label>Prenom</label>
<input name="PrenomAdmin" type="text" class="form-control" value="{{old('PrenomAdmin')}}">
@if($errors->get('PrenomEtudiant'))
     @foreach($errors->get('PrenomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>


<div class="form-group">
<label >Role Admin:</label>
<select class="form-control"  name="role" >
     <option value="Super Admin">Super Admin</option>
     <option value="create-only">create-only</option>
     <option value="update-only">update-only</option>
     <option value="create and update">create and update</option>
     <option value="update and delete">update and delete</option>

</select>

</div>


<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control"  value="{{old('Password')}}">
@if($errors->get('Password'))
     @foreach($errors->get('Password') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>






</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-12">


<div class="form-group">
<label>Nom</label>
<input type="text" name="NomAdmin" class="form-control" value="{{old('NomAdmin')}}">
@if($errors->get('NomEtudiant'))
     @foreach($errors->get('NomEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>





<div class="form-group">
<label>Username :</label>
<input type="text" name="UsernameAdmin" class="form-control"  value="{{old('UsernameAdmin')}}">
@if($errors->get('CINEtudiant'))
     @foreach($errors->get('CINEtudiant') as $message)
     <li style="color:red;font-weight:bold;">{{$message}}</li>
     @endforeach
@endif
</div>



<div class="form-group">
<label>Email :</label>
<input type="email" name="EmailAdmin" class="form-control"  value="{{old('EmailAdmin')}}">
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