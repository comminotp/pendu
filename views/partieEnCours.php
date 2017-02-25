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