<!DOCTYPE html>
<html>
<head>
    <title>Résultats de l'ACP</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
@extends('layouts.NavMenu')

@section('content')

<div class="page-wrapper">

<div class="row align-items-center">
<div class=" mt-sm-0 mt-2">
<div class="dropdown-menu dropdown-menu-right">
</div>
</div>
</div>


<?php

$salaires = DB::table('students')->pluck('salaire')->toArray();
sort($salaires);
$n = count($salaires);
if ($n % 2 == 0) {
   $mediane = ($salaires[$n/2-1] + $salaires[$n/2]) / 2;
} else {
   $mediane = $salaires[($n-1)/2];
}



?>


<?php

// Récupérer les salaires des employés depuis la base de données
$salaires = DB::table('students')->pluck('salaire');
$experiences= DB::table('students')->pluck('NbExperience');


// Calculer la moyenne des salaires
$moyenne = $salaires->avg();
$moyenneExp=$experiences->avg();
$moyenneAges=$ages->avg();
$moyenneDureeTravail=$anneesExperiences->avg();



// Calculer la somme des carrés des écarts à la moyenne
$somme_carres_ecarts = 0;
foreach ($salaires as $salaire) {
    $ecart = $salaire - $moyenne;
    $somme_carres_ecarts += $ecart * $ecart;
}

$somme_carres_ecarts2 = 0;
foreach ($experiences as $experience) {
    $ecartExp = $experience - $moyenneExp;
    $somme_carres_ecarts2 += $ecartExp * $ecartExp;
}

$somme_carres_ecarts3 = 0;
foreach ($ages as $age) {
    $ecartAges= $age- $moyenneAges;
    $somme_carres_ecarts3 += $ecartAges * $ecartAges;
}


$somme_carres_ecarts4 = 0;
foreach ($anneesExperiences as $anneesExperience) {
    $ecartDurees= $anneesExperience- $moyenneDureeTravail;
    $somme_carres_ecarts4 += $ecartDurees * $ecartDurees;
}


// Calculer la moyenne de ces carrés
$moyenne_carres_ecarts = $somme_carres_ecarts / count($salaires);
$moyenne_carres_ecarts2 = $somme_carres_ecarts2 / count($experiences);
$moyenne_carres_ecarts3 = $somme_carres_ecarts3 / count($ages);
$moyenne_carres_ecarts4 = $somme_carres_ecarts4 / count($anneesExperiences);


// Prendre la racine carrée de cette moyenne pour obtenir l'écart-type
$ecart_type = sqrt($moyenne_carres_ecarts);
$ecart_typeExp = sqrt($moyenne_carres_ecarts2);
$ecart_typeAges = sqrt($moyenne_carres_ecarts3);
$ecart_typeDureesTravail= sqrt($moyenne_carres_ecarts4);



?>






<div class="row">
<div class="col-lg-5 col-md-12 col-12 d-flex" >
<div class="card flex-fill" style="margin-left:15px;">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Centrer et réduire les données
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
<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Variables </th>
<th> Moyenne </th>
<th>Ecartype</th>

</tr>
</thead>
<tbody>


   
    <tr>
        <td>Experiences</td>
        
        <td>{{$moyenneExp}}</td>

        <td>{{$ecart_typeExp}}</td>
    </tr>

    <tr>
        <td>Salaires</td>
        <td> {{$moyenne}}</td>
        <td> {{$ecart_type}}</td>
    </tr>

    <tr>
        <td>Ages</td>
        <td> {{$moyenneAges}}</td>
        <td>{{$ecart_typeAges}}</td>
    </tr>

    <tr>
        <td>Durrées Travail</td>
        <td> {{$moyenneDureeTravail}}</td>
        <td> {{$ecart_typeDureesTravail}}</td>
    </tr>

</tbody>
</table>


</div>
</div>






<!-- ---------- -->

<div class="col-lg-7 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
    
<div class="col-auto">
<div class="page-title">
le tableau de données des employes :
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
<tr>
<th>Code Employer </th>
<th> Experiences </th>
<th>Salaires</th>
<th>Ages</th>
<th>Durrées Travail</th>
</tr>
</thead>
<tbody>

<?php $processedCodes = []; ?>
@foreach ($transformedData as $index => $row)
    <?php
        $code = $students[$index]->CodeEmploye;
        $Nb = $students[$index]->NbExperience;
        $Salaires = $students[$index]->Salaire;
       $Ages=$ages[$index];
       $r=$anneesExperiences[$index];
        if (in_array($code, $processedCodes)) {
            continue;
        }
        $processedCodes[] = $code;
    ?>
    <tr>
        <td>{{ $code }}</td>
        <td>{{ $Nb }} Ans</td>
        <td>{{$Salaires}} DH/Mois</td>
            <td>{{$Ages}}</td>
       
        <td>{{ $r }} Ans</td>
        
    </tr>
@endforeach


</tbody>
</table>


</div>
</div>

</div>
</div>
</div>

</div>


<!-- ----------------- -->

<?php

function correlationMatrix($data) {
    $numRows = count($data);
    $numCols = count($data[0]);

    // Calcul de la moyenne des colonnes
    $means = array();
    for ($j = 0; $j < $numCols; $j++) {
        $sum = 0;
        for ($i = 0; $i < $numRows; $i++) {
            $sum += $data[$i][$j];
        }
        $means[$j] = $sum / $numRows;
    }

    // Calcul des écarts types des colonnes
    $stdDeviations = array();
    for ($j = 0; $j < $numCols; $j++) {
        $sumSquares = 0;
        for ($i = 0; $i < $numRows; $i++) {
            $sumSquares += pow($data[$i][$j] - $means[$j], 2);
        }
        $stdDeviations[$j] = sqrt($sumSquares / ($numRows - 1));
    }

    // Calcul de la matrice de corrélation
    $correlationMatrix = array();
    for ($j1 = 0; $j1 < $numCols; $j1++) {
        $correlationMatrix[$j1] = array();
        for ($j2 = 0; $j2 < $numCols; $j2++) {
            $sum = 0;
            for ($i = 0; $i < $numRows; $i++) {
                $sum += (($data[$i][$j1] - $means[$j1]) / $stdDeviations[$j1]) * (($data[$i][$j2] - $means[$j2]) / $stdDeviations[$j2]);
            }
            $correlationMatrix[$j1][$j2] = $sum / ($numRows - 1); // Utilisation de n-1 pour calculer la corrélation non biaisée
        }
    }

    return $correlationMatrix;
}

// Données d'entrée
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "etudiant";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT Salaire, NbExperience, TIMESTAMPDIFF(YEAR, DateNaissance, CURDATE()) AS Age, (YEAR(DateDepart) - YEAR(DateEmbauche)) AS AnneesDansEntreprise FROM students";

$result = $conn->query($sql);


?>


<div class="row">
<div class="col-lg-5 col-md-12 col-12 d-flex" >
<div class="card flex-fill" style="margin-left:25px;">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">

matrice de corrélation des variables :
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
<div class="card-body" >


<?php
if ($result->num_rows > 0) {
    $data = array();
    // Récupération des données dans un tableau
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            $row['Salaire'],
            $row['NbExperience'],
            $row['Age'],
            $row['AnneesDansEntreprise']
        );
    }

    // Appel de la fonction correlationMatrix avec les données récupérées
    $correlationMatrix = correlationMatrix($data);

    // Affichage de la matrice de corrélation
    if (!empty($correlationMatrix)) {
        echo '<table>';
        
        foreach ($correlationMatrix as $row) {
            echo '<tr>';
           
            foreach ($row as $value) {
                echo '<td> ' .' <br> ' . number_format($value, 4) .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
               
            }
            echo '</tr>';
        }
        echo '</table>';
        
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }}

// Fermeture de la connexion à la base de données
$conn->close();



?>


</div>
</div>
</div>










<?php
    

use MathPHP\LinearAlgebra\Eigenvalue;
use MathPHP\LinearAlgebra\MatrixFactory;

// Exemple d'utilisation
$correlationMatrix = MatrixFactory::create($correlationMatrix);


$eigenvalues = Eigenvalue::closedFormPolynomialRootMethod($correlationMatrix);


$inertiaPercentages = [];
$totalInertia = array_sum($eigenvalues);

$cumulativeInertia = 0;
foreach ($eigenvalues as $eigenvalue) {
    $inertiaPercentage = ($eigenvalue / $totalInertia) * 100;
    $cumulativeInertia += $inertiaPercentage;
    $inertiaPercentages[] = $cumulativeInertia;
    
}

?>
<div class="col-lg-7 d-flex">
<div class="card flex-fill" style="margin-left:35px;">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
appliquant la fonction Eigenvalue :
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
<div class="row">
<div class="col-md-12">
<div class="table-responsive">

<table class="table custom-table">
<thead class="thead-light">
<tr>
<th></th>
<th> v1 </th>
<th> v2 </th>
<th> v3 </th>
<th> v4 </th>
</tr>
</thead>

<tbody>
           
<tr>
    <td>λi :</td>
                            <?php
                            foreach ($eigenvalues as $eigenvalue) {
                                echo "<td>" . number_format($eigenvalue, 4) . "</td>";
                            }
                            ?>
       
    </tr>

    <tr>
    <td>d’inertie %</td>
                            <?php
                           foreach ($eigenvalues as $eigenvalue) {
                            echo "<td>" . number_format(($eigenvalue/4)*100, 4) . "</td>";
                        }
                            ?>
                        </tr>
       
    </tr>

   
    <td> d'inertie cumulé %:</td>
                            <?php
                            foreach ($inertiaPercentages as $inertiaPercentage) {
                                echo "<td>" . number_format($inertiaPercentage, 4) . "</td>";
                            }
                            ?>
                        </tr>
       
    </tr>

        </tbody>
    </table>


</div>
</div>
</div>
</div>
</div>
</div>
</div>







<!--  ---------------------------------->

<div class="row">
<div class="col-lg-5 col-md-12 col-12 d-flex" >
<div class="card flex-fill" style="margin-left:25px;">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Représentation graphique des individus:
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

<canvas id="acpChart"   height="300"></canvas>
</div>
</div>
</div>




<div class="col-lg-7 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Les données transformmées :
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
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
@if (!empty($transformedData))

<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Code Employe:</th>
<th>Axes 1</th>
<th>Axes 2</th>
<th>Axes 3</th>
<th>Axes 4</th>
</tr>
</thead>

<tbody>
            <?php $processedCodes = []; ?>
            @foreach ($transformedData as $index => $row)
                <?php
                    $code = $students[$index]->CodeEmploye;
                    if (in_array($code, $processedCodes)) {
                        continue;
                    }
                    $processedCodes[] = $code;
                ?>
                <tr>
                    <td>{{ $code }}</td>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[1] }}</td>
                    <td>{{ $row[2] }}</td>
                    <td>{{ $row[3] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucune donnée disponible.</p>
@endif


</div>
</div>
</div>
</div>
</div>
</div>
</div>




<!-- --------------------------------- -->







<!-- ----------------------- -->
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








<script>
        // Récupérer les données transformées depuis la vue
   // Récupérer les données transformées depuis la vue
   var transformedData = @json($transformedData);


// Créer des tableaux pour stocker les valeurs des composantes principales
var axis2Values = [];
var axis3Values = [];

// Parcourir les données transformées et extraire les valeurs des axes 2 et 3
    axis2Values.push(transformedData[0]);
    axis3Values.push(transformedData[2]);


// Créer le graphique en utilisant Chart.js
var ctx = document.getElementById('acpChart').getContext('2d');
new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'Dans le plan principal (axe1,axe2):',
            data: transformedData,
            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Couleur de remplissage des points
            borderColor: 'rgba(54, 162, 235, 1)', // Couleur des bordures des points
            pointRadius: 5 // Taille des points
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Axe 1'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Axe 2'
                }
            }
        }
    }
});

    </script>



@endsection



</body>
</html>







    