<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assetts/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetts/css/ServicesPages.css">


</head>
<body>

@extends('Etudiant.NavMenuEtudiant')

@section('content')
<?php

// Récupérer le nom de l'employé depuis la session
$employee_Nom = session('Nom');
$employee_Prenom = session('Prenom');
$photo = session('photo');

$CodeEmploye = session('CodeEmploye');
$DateNaissance = session('DateNaissance');
$DateEmbauche = session('DateEmbauche');
$CIN = session('CIN');
$NbPhone = session('NbPhone');
$Departement = session('Departement');
$Ville = session('Ville');
$photo = session('photo');
$Salaire = session('Salaire');
$NbExperience = session('NbExperience');

?>

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
<h5 class="text-uppercase mb-0 mt-0 page-title">my Profile</h5>
</div>

</div>
</div>
<div class="card-box m-b-0">
<div class="row">
<div class="col-md-12">
<div class="profile-view">
<div class="profile-img-wrap">
<div class="profile-img">
<a href="">


<?php
// Si le champ "photo" contient une valeur, afficher l'image correspondante
if($photo) {
    $imagePath = public_path('imagesEmp/' . $photo);
    if(file_exists($imagePath)) {
        $imageUrl = asset('imagesEmp/' . $photo);
        echo '<img src="' . $imageUrl . '" alt="Photo de profil" width="40" height="40">';
    } 
} 
?>
</a>
</div>
</div>
<div class="profile-basic">
<div class="row">
<div class="col-md-5">
<div class="profile-info-left">
<h3 class="user-name m-t-0" style="color:#0071e5;">{{ $employee_Nom }} {{ $employee_Prenom }}</h3></br>


<div class="staff-id" style="font-weight: bold;">Employee ID : {{$CodeEmploye}}</div></br>
<div class="staff-id" style="font-weight: bold;">CIN : {{$CIN}}</div>
</div>
</div>
<div class="col-md-7">
<ul class="personal-info">
<li>
<span class="title">Date de Naissance:</span>
<span class="text"><a href="">{{$DateNaissance }}</a></span>
</li>
<li>
<span class="title">Date Embauche:</span>
<span class="text">{{$DateEmbauche}}</span>
</li>
<li>
<span class="title">Numéro :</span>
<span class="text">0{{$NbPhone}}</span>
</li>
<li>
<span class="title">Departement:</span>
<span class="text">{{$Departement}}</span>
</li>
<li>
<span class="title">Ville:</span>
<span class="text">{{$Ville}}</span>
</li>
<li>
<span class="title">Salaire:</span>
<span class="text">{{$Salaire}} DH/Mois </span>
</li>
<li>
<span class="title">Expérience :</span>
<span class="text">{{$NbExperience}} ans</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<style>
    .title{
        font-size: 16px;
        color :red;
        
    }

    .text{
        font-weight: bold;
        font-size: 16px;
       

    }
</style>








              <script src="assetts/js/bootstrap.min.js"></script>


              <script src="assetts/js/jquery-3.6.0.min.js"></script>
              @endsection
</body>
</html>