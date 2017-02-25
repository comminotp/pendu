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

                    <form method="post" action=".">
                        <p>
                            <?php 
                                foreach (range('a', 'z') as $l) : 
                                    if (!in_array($l, getLettresJouees())) :
                            ?>
                                <input type="submit" name="proposition" value="<?php echo $l ?>" />
                            <?php
                                    endif;
                                endforeach; 
                            ?>
                        </p>
                    </form>

                    <h3>Indice</h3>
                    <h4><?= getIndice() ?></h4>

                    <h3>lettres erronées</h3>
                    <h4><?= implode(' ', getLettreFausses()) ?></h4>
                </td>
                <td>
                    <img src="images/pendu<?= nbErreurs() ?>.JPG" alt="potence et pendu" />
                </td>

            </tr>
        </table>
        <pre>
            <?php var_dump($_SESSION); ?>
        </pre>
        <hr>
        <p><a href="index.php?restart=true">Recommencer une partie</a></p>
    </body>
</html>