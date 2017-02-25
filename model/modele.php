<?php

// Modele de l'application pendu
// Contient l'ensemeble des fonctions de traitement du jeu

session_start();

function reinitialiser() {
    $_SESSION = array();
}

function demarrerPartie() {
    $_SESSION['MotSecret'] = 'bonjour';
    $_SESSION['Indice'] = '-------';
    $_SESSION['LettresFausses'] = array();
    $_SESSION['LettresJouees'] = array();
    $_SESSION['Statut'] = 'EnCours';
}

function getStatut() {
    return (isset($_SESSION['Statut']) ? $_SESSION['Statut'] : '');
}

function getMotSecret() {
    return (isset($_SESSION['MotSecret']) ? $_SESSION['MotSecret'] : '');
}

function setMotSecret($motSecret) {
    $_SESSION['MotSecret'] = $motSecret;
}

function getIndice() {
    return (isset($_SESSION['Indice']) ? $_SESSION['Indice'] : '');
}

function setIndice($indice) {
    $_SESSION['Indice'] = $indice;
}

function getLettreFausses() {
    return (isset($_SESSION['LettresFausses']) ? $_SESSION['LettresFausses'] : array());
}

function setLettreFausses($lettreFausses) {
    $_SESSION['LettresFausses'] = $lettreFausses;
}

function ajouterLettreFausse($lettre) {
    $_SESSION['LettresFausses'][] = $lettre;
}

function nbErreurs(){
    $lettresFausses = getLettreFausses();
    return count($lettresFausses);
}

function getLettresJouees() {
    return (isset($_SESSION['LettresJouees']) ? $_SESSION['LettresJouees'] : array());
}

function setLettresJouees($lettreFausses) {
    $_SESSION['LettresJouees'] = $lettreFausses;
}

function ajouterLettreJouee($lettre) {
    $_SESSION['LettresJouees'][] = $lettre;
}


function verifierLettre($lettre) {
    $motSecret = getMotSecret();
    ajouterLettreJouee($lettre);
    // si la lettre n'est pas dans le mot secret
    // on la met dans les lettres fausses
    if (strpos($motSecret, $lettre) === false) {
        ajouterLettreFausse($lettre);
    } else {
        // sinon on remplace toutes les lettres équivalentes
        // dans l'indice
        $indice = $_SESSION['Indice'];
        for ($i = 0; $i < strlen($motSecret); $i++) {
            if ($motSecret[$i] == $lettre) {
                $indice[$i] = $lettre;
            }
            $_SESSION['Indice'] = $indice;
        }
    }
}
