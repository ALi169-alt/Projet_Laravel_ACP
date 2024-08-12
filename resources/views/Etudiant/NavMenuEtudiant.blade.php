<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<!-- <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet"> -->

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}"> <!--icon -->

<link rel="stylesheet" href="{{asset('assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css')}}">

<!-- <link rel="stylesheet" href="assets/css/select2.min.css"> -->

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>


<?php

// Récupérer le nom de l'employé depuis la session
$employee_Nom = session('Nom');
$employee_Prenom = session('Prenom');
$photo = session('photo');
?>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<div class="header-left">
    <a href="index.html" class="logo" >

    <?php
// Si le champ "photo" contient une valeur, afficher l'image correspondante
if($photo) {
    $imagePath = public_path('imagesEmp/' . $photo);
    if(file_exists($imagePath)) {
        $imageUrl = asset('imagesEmp/' . $photo);
        echo '<img src="' . $imageUrl . '" alt="Photo de profil" width="50" height="50">';
    } 
} 
?>

      
    </a>
</div>


<!-- @@@@@@@@@ -->


<ul class="sidebar-ul">

<li class="menu-title" style="text-align:center;font-size:18px;">{{ $employee_Nom }} {{ $employee_Prenom }}</li>


<li >
<a href="{{url('services')}}"><img src="assets/img/sidebar/icon-5.png" alt="icon"><span>SERVICES</span></a>
</li>






<li>
<a href="{{url('/Mes_Demandes')}}"><img src="assets/img/sidebar/icon-17.png" alt="icon"> <span>Mes demandes</span></a>
</li>



<li>
<a href="{{url('/employe')}}"><img src="assets/img/sidebar/icon-10.png" alt="icon"> <span>Mon compte</span></a>
</li>




<li>

<div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <img src="{{asset('assets/img/sidebar/icon-2.png')}}" alt="icon">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
</li>








</ul>
</li>
</ul>
</div>
</div>
</div>


<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- <script src="assets/js/jquery.slimscroll.js"></script>
 
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>



<script src="assets/js/fullcalendar.min.js"></script>
<script src="assets/js/jquery.fullcalendar.js"></script>

<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/chart-data.js"></script> -->




<script src="{{asset('assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>

@yield('content')
    
</body>
</html>