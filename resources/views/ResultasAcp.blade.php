<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


use Phpml\Math\Matrix;
use Phpml\Math\LinearAlgebra\EigenvalueDecomposition;



// Données d'origine
$data = [
    [1, 2],
    [3, 4],
];

// Créer une matrice à partir des données
$matrix = Matrix::fromArray($data);

// Calculer la décomposition des valeurs propres
$eigenDecomposition = $matrix->eigenDecomposition();

// Obtenir les valeurs propres
$eigenvalues = $eigenDecomposition->getRealEigenvalues();

// Afficher les valeurs propres
foreach ($eigenvalues as $eigenvalue) {
    echo $eigenvalue . "\n";
}





?>

</body>
</html>