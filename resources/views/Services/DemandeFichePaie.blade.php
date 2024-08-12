

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
    
<h5 class="text-uppercase mb-0 mt-0 page-title">Demande de Fiche de Paie :</h5>
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
<form class="custom-mt-form" action="{{url('/fiche-paie/store')}}" method="post" enctype='multipart/form-data'> <!-- @@@@@@@@@ Form1 @@@@@@@-->

  {{csrf_field()}}


<div class="form-group has-error">
<label for="date_debut">Période de Paie :</label>
    <input type="date" class="form-control" name="periode_paie" id="date_debut" required>

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