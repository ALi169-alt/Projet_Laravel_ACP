<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('Etudiant.NavMenuEtudiant')
@section('content')


<div class="container" style="margin-left:266px;">


  @if(session()->has('success'))
  <div class="alert alert-success">
  {{session()->get('success')}}
  </div>
  @endif

</div>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
    
<h5 class="text-uppercase mb-0 mt-0 page-title">Demande de Permis de Travail :</h5>
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
<form class="custom-mt-form" action="{{url('/permis-travail/store')}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->

  {{csrf_field()}}


<div class="form-group has-error">
<label for="date_debut">Date de début du congé :</label>
    <input type="date" class="form-control" name="date_debut" id="date_debut" required>

</div>





<div class="form-group">
<label for="date_fin">Date de fin du congé :</label>
    <input type="date"  class="form-control"  name="date_fin" id="date_fin" required>


</div>




<div class="form-group">
      <label for="type_permis">Type de permis :</label>
      <select class="form-control" id="type_permis" name="type_permis" required>
        <option value="">-- Sélectionner un type de permis --</option>
        <option value="permis de travail temporaire">Permis de travail temporaire</option>
        <option value="permis de travail permanent">Permis de travail permanent</option>
        <option value="autre">Autre</option>
      </select>
    </div>

</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-12">


<div class="form-group">
<label for="description">Description:</label>
    <textarea name="description"  class="form-control"  id="description" required></textarea>

</div>






<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2" type="submit">Submit</button>
<button class="btn btn-secondary" type="reset">Cancel</button>
</div>


@endsection

</body>
</html>





