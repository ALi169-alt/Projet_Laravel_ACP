<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
@extends('layouts.NavMenu')
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">
<div class="card">
<div class="card-header">
<h4 class="page-title">Congés Maladie</h4>
</div>
<div class="card-body">


<div class="row">

<table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
            <th>Prenom :</th>
                <th>Nom :</th>
                
            <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Description</th>
         
            </tr>
</head>

        <body>
         
               @foreach($congesMaladie as $conge)
                    <tr>
                    <td>{{ $conge->employe->Prenom }}</td>
                    <td>{{ $conge->employe->Nom }}</td>
                        <td>{{ $conge->date_debut }}</td>
                        <td>{{ $conge->date_fin }}</td>
                        <td>{{ $conge->description }}</td>
                    </tr>
                @endforeach
          
        </body>
        </table>
</div>
</div>
</div>
</div>
</div>

                               <!-- @@@@@@@@@@@@@@@@@ -->


<div class="page-wrapper">
<div class="content container-fluid">
<div class="card">
<div class="card-header">
<h4 class="page-title">Demandes de support</h4>
</div>
<div class="card-body">


<div class="row">

<table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
            <th>Prenom :</th>
                <th>Nom :</th>
            <th>Titre</th>
            <th>Description</th>
         
            </tr>
</head>

        <body>
        @foreach($demandesSupport as $demande)
                    <tr>
                    <td>{{ $demande->employe->Prenom }}</td>
                    <td>{{ $demande->employe->Nom }}</td>
                    
                        <td>{{ $demande->title }}</td>
                        <td>{{ $demande->description }}</td>
                    </tr>
                @endforeach
          
        </body>
        </table>
</div>
</div>
</div>
</div>
</div>

                                <!-- @@@@@@@@@@@@@@@ -->

<div class="page-wrapper">
<div class="content container-fluid">
<div class="card">
<div class="card-header">
<h4 class="page-title">Demandes de permis de travail</h4>
</div>
<div class="card-body">


<div class="row">

<table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
            <th>Prenom :</th>
                <th>Nom :</th>
            <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Type de permis</th>
         
            </tr>
</head>

        <body>
        @foreach($demandesPermisTravail as $demande)
                    <tr>
                    <td>{{ $demande->employe->Prenom }}</td>
                    <td>{{ $demande->employe->Nom }}</td>
                    
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->type_permis }}</td>
                    </tr>
                @endforeach
          
        </body>
        </table>
</div>
</div>
</div>
</div>
</div>
                    <!-- @@@@@@@@@@@@@@@@@@ -->


                    <div class="page-wrapper">
<div class="content container-fluid">
<div class="card">
<div class="card-header">
<h4 class="page-title">Demandes de fiche de paies :</h4>
</div>
<div class="card-body">


<div class="row">

<table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
            <th>Prenom :</th>
                <th>Nom :</th>
            <th>Période de Paie :</th>
                    <th>Description</th>

         
            </tr>
</head>

        <body>
        @foreach($demandesFichePaies as $demande)
                    <tr>
                    <td>{{ $demande->employe->Prenom }}</td>
                    <td>{{ $demande->employe->Nom }}</td>
                        <td>{{ $demande->PeriodeDePaie }}</td>
                        <td>{{ $demande->description }}</td>
                       
                    </tr>
                @endforeach
          
        </body>
        </table>
</div>
</div>
</div>
</div>
</div>
                    
@endsection
</body>
</html>