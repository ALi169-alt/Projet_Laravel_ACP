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



<div class="AllServices"> <!--Grand DIV1--------------------------------------->
              <h1>Services RH</h1>
              
                  <div class="AllServices2"> <!--Grand DIV2----------------------------------->


                <!--Debu de DIV de chaque classe -->
                  
                <div class="service">
                    <a  href="{{url('/demande-conge-maladie')}}" style="text-decoration: none; color: black;">
                    <i> <img src="assetts/Images/Bac.png" style="height: 29.75px;width: 35px;"></i>                  

                    <h2>Demande congé de maladie</h2>
                    <p >Dans ce services tu peux demander une demande de congé</p>
                    </a>
                  </div>


                  <div class="service">
                    <a href="{{url('/demande-support-informatique')}}" style="text-decoration: none; color: black;">
                    <i> <img src="assetts/Images/Attest.png" style="height: 29.75px;width: 35px;"></i>                  
                    <h2>Demande de soutien Informatique</h2>
                    <p>Dans ce services tu peux demander un soutien Informatique</p>
                  </div>

                  <div class="service">
                    <a href="{{url('/demande-fiche-paie')}}" style="text-decoration: none; color: black;">
                    <i> <img src="assetts/Images/Reelev.png" style="height: 29.75px;width: 35px;"></i>                  
                    <h2>Demande des fiches de paie</h2>
                    <p>Ce Service permet de demander d'un relevé de fiche de paie</p>
                  </div>

                  <div class="service">
                    <a href="{{url('/demande-permis-travail')}}"  style="text-decoration: none; color: black;">
                    <i> <img  src="assetts/Images/ReclaExa.png" style="height: 29.75px;width: 35px;"></i>                  

              
                    <h2>Demande un permis de travail</h2>
                    <p>Ce servives permet de demaner un permis de travail</p>
                  </div>

                      
                 

                       

                  </div><!--FIN DIV2-->


          </div> <!-- FIN DIV1-->

              <script src="assetts/js/bootstrap.min.js"></script>


              <script src="assetts/js/jquery-3.6.0.min.js"></script>
@endsection
</body>
</html>