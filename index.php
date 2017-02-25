<?php
// Description : petite application pour jouer au pendu
// Premier jet avec GitHub
// Tout en vrac dans le même script, pas de fin de jeu
// Auteur : Pascal Comminot


session_start();

if (!isset($_SESSION['MotSecret'])) {
    $_SESSION['MotSecret'] = 'bonjour';
    $_SESSION['Indice'] = '-------';
    $_SESSION['LettresFausses'] = array();
}

$proposition = filter_input(INPUT_POST, 'proposition', FILTER_SANITIZE_STRING);
// l'utilisateur a joué une lettre
if (!empty($proposition)) {
    // si la lettre n'est pas dans le mot secret
    // on la met dans les lettres fausses
    if (strpos($_SESSION['MotSecret'], $proposition) === false) {
        $_SESSION['LettresFausses'][] = $proposition;
    } else {
        // sinon on remplace toutes les lettres équivalentes
        $indice = $_SESSION['Indice'];
        for ($i = 0; $i < strlen($_SESSION['MotSecret']); $i++) {
            if ($_SESSION['MotSecret'][$i] == $proposition) {
                $indice[$i] = $proposition;
            }
        $_SESSION['Indice'] = $indice;    
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Jeu du pendu</title>
        <style>
            td  {
                width: 50%;
            }
        </style>
    </head>
    <body>
        <h1>Jeu du pendu</h1>
        <table>
            <tr>
                <td>
                    <h3>Choisissez une lettre</h3>

                    <form method="post">
                        <p>
                            <?php foreach (range('a', 'z') as $l) : ?>
                                <input type="submit" name="proposition" value="<?php echo $l ?>" />
                            <?php endforeach; ?>
                        </p>
                    </form>

                    <h3>Indice</h3>
                    <h4><?= $_SESSION['Indice'] ?></h4>

                    <h3>lettres erronées</h3>
                    <h4><?php var_dump($_SESSION['LettresFausses']) ?></h4>
                </td>
                <td>
                    <img src="images/pendu9.JPG" alt="potence et pendu" />
                </td>

            </tr>
        </table>
        <pre>
            <?php var_dump($_SESSION); ?>
        </pre>
        <hr>
        <p><a href="reset.php">Recommencer une partie</a></p>
    </body>
</html>