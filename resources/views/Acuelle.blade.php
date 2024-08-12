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

<div class="page-header">
<div class="row">
<div class="col-md-6">
<h3 class="page-title mb-0">Statistiques :</h3>
</div>


</div>
</div>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget dash-widget5">
<span class="float-left"><img src="assets/img/employes.jpg" alt="" width="80"></span>
<div class="dash-widget-info text-right">
<span>Employés</span>
<h3>{{ \App\Models\student::count() }},000 </h3>
</div>
</div>
</div>













<div class="col-md-8 col-sm-6 col-lg-6 col-xl-8">
    <div class="dash-widget dash-widget5 widget-departments">
        <h5 class="widget-title">Nombres des employés pour chaque Départements</h5>
        <div class="dash-widget-info text-left" style="display: inline-block;">
    <span>Info</span>
    <h3>{{ isset($nombreEmployes->where('Departement', 'Informatique')->first()->total) ? $nombreEmployes->where('Departement', 'Informatique')->first()->total : 0 }}</h3>
</div>

    
        <div class="dash-widget-info text-left" style="display: inline-block;">
    <span>Commercial</span>
    <h3>{{ isset($nombreEmployes->where('Departement', 'Commercial')->first()->total) ? $nombreEmployes->where('Departement', 'Commercial')->first()->total : 0 }}</h3>
</div>

        <div class="dash-widget-info text-left" style="display: inline-block;">
    <span>Juridique</span>
    <h3>{{ isset($nombreEmployes->where('Departement', 'Juridique')->first()->total) ? $nombreEmployes->where('Departement', 'Juridique')->first()->total : 0 }}</h3>
</div>


<div class="dash-widget-info text-left" style="display: inline-block;">
    <span>RH</span>
    <h3>{{ isset($nombreEmployes->where('Departement', 'RH')->first()->total) ? $nombreEmployes->where('Departement', 'RH')->first()->total : 0 }}</h3>
</div>

</div>





</div>
</div>


<!-- @@@@@@@@@@@@@@ -->

<!-- @@@@@@@@@@@@@@ -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="row">
<div class="col-lg-6 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
L'expérience des employés par porcentage : 
</div>

</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">

</div>
</div>
</div>
</div>
<div class="card-body">
<canvas id="pourcentage-employes" width="600" height="400"></canvas>

</div>
</div>
</div>


<div class="col-lg-6 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Proportion d'hommes et de femmes dans l'entreprise :
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<div class="dropdown-menu dropdown-menu-right">

</div>
</div>
</div>
</div>
</div>
<div class="card-body">

<div style="max-width: 300px;margin-left:50px;" >
    <canvas id="pourcentage-sexe" width="300" height="300"></canvas>
  </div>

</div>






</div>
</div>
</div>

<!-- @@@@@@@@@@@ -->
<div class="row">
<div class="col-lg-6 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
le nombre des employes par tranche d'ages :
</div>

</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">

</div>
</div>
</div>
</div>
<div class="card-body">
<canvas id="nb-employes-par-tranche-age" width="600" height="500"></canvas>

</div>
</div>
</div>


<div class="col-lg-6 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Les taux de rotation du personnel :
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<div class="dropdown-menu dropdown-menu-right">

</div>
</div>
</div>
</div>
</div>
<div class="card-body">

<div style="max-width: 500px;" >
    <canvas id="taux-rotation-personnel" width="350" height="300"></canvas>
  </div>

</div>






</div>
</div>
</div>

















<?php
// Modifier les variables pour ajuster les tranches d'expérience
$tranches = [
    ['label' => '0-1 ans', 'min' => 0, 'max' => 1],
    ['label' => '1-2 ans', 'min' => 1, 'max' => 2],
    ['label' => '3-4 ans', 'min' => 3, 'max' => 4],
    ['label' => '5-6 ans', 'min' => 5, 'max' => 6],
    ['label' => '7+ ans', 'min' => 7, 'max' => null], // null signifie "pas de limite supérieure"
];

$nb_total_employes = DB::table('students')->count();

$data = [];
$labels = [];

foreach ($tranches as $tranche) {
    $nb_employes_experience = DB::table('students')
                            ->where('NbExperience', '>=', $tranche['min'])
                            ->where(function ($query) use ($tranche) {
                                if (isset($tranche['max'])) {
                                    $query->where('NbExperience', '<=', $tranche['max']);
                                }
                            })
                            ->count();

    $pourcentage_employes_experience = $nb_employes_experience / $nb_total_employes * 100;
    
    $data[] = $pourcentage_employes_experience;
    $labels[] = $tranche['label'];
}
?>


<!--  -->
<?php
$nb_hommes = DB::table('students')->where('Sexe', 'Homme')->count();
$nb_femmes = DB::table('students')->where('Sexe', 'Femme')->count();
$nb_total_employes = $nb_hommes + $nb_femmes;
$pourcentage_hommes = $nb_hommes / $nb_total_employes * 100;
$pourcentage_femmes = $nb_femmes / $nb_total_employes * 100;
?>




<script >
var ctx = document.getElementById('pourcentage-employes').getContext('2d');
var pourcentageData = {
    labels: <?=json_encode($labels)?>,
    datasets: [{
        label: 'Pourcentage d\'expérience d\'employées',
        data: <?=json_encode($data)?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
    }]
};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: pourcentageData,
    
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 100,
                   
                }
            }]
        }
    }
});
</script>







<script>
var ctx = document.getElementById('pourcentage-sexe').getContext('2d');
var pourcentageData = {
    labels: ['Hommes', 'Femmes'],
    datasets: [{
        label: 'Pourcentage d\'employés',
        data: [<?php echo $pourcentage_hommes; ?>, <?php echo $pourcentage_femmes; ?>],
        backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
    }]
};
var myChart = new Chart(ctx, {
    type: 'pie',
    data: pourcentageData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 100
                }
            }]
        }
    }
});
</script>




<!-- @@@@@@@@@@ -->

<?php
$tranches_age = [
    '18-24 ans' => 0,
    '25-34 ans' => 0,
    '35-44 ans' => 0,
    '45-54 ans' => 0,
    '55-64 ans' => 0,
    '65 ans et plus' => 0,
];

$employes = DB::table('students')->get();

foreach ($employes as $employe) {
    $date_naissance = $employe->DateNaissance;
    $age = date_diff(date_create($date_naissance), date_create('now'))->y;
    
    if ($age >= 18 && $age <= 24) {
        $tranches_age['18-24 ans']++;
    } elseif ($age >= 25 && $age <= 34) {
        $tranches_age['25-34 ans']++;
    } elseif ($age >= 35 && $age <= 44) {
        $tranches_age['35-44 ans']++;
    } elseif ($age >= 45 && $age <= 54) {
        $tranches_age['45-54 ans']++;
    } elseif ($age >= 55 && $age <= 64) {
        $tranches_age['55-64 ans']++;
    } else {
        $tranches_age['65 ans et plus']++;
    }
}
?>
<!-- @@@@@@@@@ -->


<script>
var ctx = document.getElementById('nb-employes-par-tranche-age').getContext('2d');
var nbEmployesData = {
    labels: [
        <?php foreach ($tranches_age as $label => $nb_employes) { ?>
            '<?php echo $label; ?>',
        <?php } ?>
    ],
    datasets: [{
        label: 'Nombre d\'employés',
        data: [
            <?php foreach ($tranches_age as $label => $nb_employes) { ?>
                <?php echo $nb_employes; ?>,
            <?php } ?>
        ],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: nbEmployesData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>



<!-- @@@@@@@@@@@ -->
<!-- @@@@@@@@@@@ -->

<?php
// Requête pour récupérer les dates d'embauche et de départ des employés
$employes = DB::table('students')->select('DateEmbauche', 'DateDepart')->get();

// Initialisation des compteurs
$nb_embauches = 0;
$nb_departs = 0;

// Boucle sur les employés pour compter le nombre d'embauches et de départs
foreach ($employes as $employe) {
    if ($employe->DateEmbauche) {
        $nb_embauches++;
    }
    if ($employe->DateDepart) {
        $nb_departs++;
    }
}

// Calcul des taux de rotation
$taux_embauches = $nb_embauches / count($employes) * 100;
$taux_departs = $nb_departs / count($employes) * 100;
$taux_rotation = $taux_departs + $taux_embauches;

// Création du tableau de données pour le graphique
$donnees = [
    ['label' => 'Taux d\'embauche', 'taux' => $taux_embauches],
    ['label' => 'Taux de départ', 'taux' => $taux_departs],
    ['label' => 'Taux de rotation', 'taux' => $taux_rotation],
];

?>
<!-- @@@@@@ -->
<!-- @@@@@@ -->

<script>
var ctx = document.getElementById('taux-rotation-personnel').getContext('2d');
var tauxRotationData = {
    labels: <?php echo json_encode(array_column($donnees, 'label')); ?>,

    datasets: [{
        label: 'Taux de rotation',
        data: <?php echo json_encode(array_column($donnees, 'taux')); ?>,

        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1
    }]
};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: tauxRotationData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                        return value + '%';
                    }
                }
            }]
        }
    }
});
</script>


<!-- @@@@@@@@@ -->


<!-- <div class="col-lg-6 col-md-12 col-12 d-flex">
<div class="card flex-fill">
<div class="row align-items-center">

<div class=" mt-sm-0 mt-2">
<div class="dropdown-menu dropdown-menu-right">



</div>
</div>
</div>

</div>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Income Monthwise
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<div class="dropdown-menu dropdown-menu-right">

</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div id="chart4"></div>
</div>
</div>
</div>


<div class="col-lg-6 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Exam List
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table custom-table">
<thead class="thead-light">





</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div> -->


</div>
</div>
</div>
</div>
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