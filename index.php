
<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');
$titre = "Liste des fermes";



    include('parties/menu.php');
    include('parties/carousel.php');

    $champsTriables=['id','nom','surface','id_adresse','id_dirigeant'];
    $listeDesChamps = [
        "id" => "ID",
        "nom" => "Nom",
        "surface" =>"Surface",
        "id_adresse" =>"Adresse",
        "id_dirigeant" =>"Dirigeant",
    ];


    $ordreDeTri = testOrderby($champsTriables,'nom','ASC');
    $ordreChamp = $ordreDeTri[0];
    $ordreDirection = $ordreDeTri[1];



    $sql = "SELECT * FROM fermes ORDER BY $ordreChamp $ordreDirection";

    $resultats = mysqli_query($connection, $sql);
    ?>


    <table class="table table-condensed table-striped table-over table-responsive">
      <thead>
        <tr>
          <?= tableHeaders ($listeDesChamps); ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if(mysqli_num_rows($resultats) === 0):
          echo "Il n'y a pas d'enregistrements";
        else:
          $nb=0;
          // Affichage des lignes de résultat
          while($ligne = mysqli_fetch_assoc($resultats)):
            //var_dump($ligne);
         ?>
          <tr class="<?php echo $nb<3 ?'success': 'warning' ?>" >
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['surface'] ?></td>
            <td><?= $ligne['id_adresse'] ?></td>
            <td><?= $ligne['id_dirigeant'] ?></td>
          </tr>
          <?php
          $nb++;
          endwhile;
        endif;
        ?>
      </tbody>
    </table>

</div>
<?php
include('parties/footer.php');
?>
</div>

  </body>
</html>
