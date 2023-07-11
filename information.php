<?php
// Les informations de disponibilité des salles (données statiques pour l'exemple)
$reserver = [
    [
        'salle' => 'Salle A',
        'disponible' => true,
        'heure' => '14:00 - 16:00'
    ],
    [
        'salle' => 'Salle B',
        'disponible' => false,
        'heure' => '14:00 - 16:00'
    ],
    [
        'salle' => 'Salle C',
        'disponible' => true,
        'heure' => '8:00 - 10:00'
    ],
    [
        'salle' => 'Salle D',
        'disponible' => true,
        'heure' => '8:00 - 10:00'
    ],

    // Ajoutez d'autres données de disponibilité des salles selon vos besoins
];

// Convertit les données en format JSON pour les envoyer à la page HTML
$reserver = json_encode($reserver);

// Renvoie les données JSON à la page HTML
header('Content-Type: application/json');
echo $reserver;
?>