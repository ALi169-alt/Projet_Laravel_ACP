import numpy as np

# Données des élèves
data = np.array([
    [45, 1.5, 13, 14],
    [50, 1.6, 13, 16],
    [50, 1.65, 13, 15],
    [60, 1.75, 15, 9],
    [60, 1.7, 14, 10],
    [60, 1.7, 14, 7],
    [70, 1.6, 14, 8],
    [65, 1.6, 13, 13],
    [60, 1.55, 15, 17],
    [65, 1.7, 14, 11]
])

# Calculer la matrice de covariance
cov_matrix = np.cov(data.T)

# Calculer les valeurs propres et les vecteurs propres
eigenvalues, eigenvectors = np.linalg.eig(cov_matrix)

# Trier les valeurs propres dans l'ordre décroissant
sorted_indices = np.argsort(eigenvalues)[::-1]
eigenvalues = eigenvalues[sorted_indices]

# Afficher les résultats
print("Valeurs propres:")
print(eigenvalues)
