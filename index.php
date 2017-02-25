<?php
// Description : petite application pour jouer au pendu
// Premier jet avec GitHub
// Tout en vrac dans le même script, pas de fin de jeu
// Auteur : Pascal Comminot

require_once 'model/modele.php';

if (filter_has_var(INPUT_GET,'restart')) {
    reinitialiser();
}

if (getStatut()!='EnCours') {
    demarrerPartie();
}

$proposition = filter_input(INPUT_POST, 'proposition', FILTER_SANITIZE_STRING);
if (!empty($proposition)){
  verifierLettre($proposition);
}

include_once 'views/partieEnCours.php';