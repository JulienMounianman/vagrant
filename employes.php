
<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');
$titre = "Liste des fermes";

    include('parties/menu.php');
    include('parties/carousel.php');
    $champsTriables=['id','nom','prenom','id_adresse','id_ferme'];
    $ordreDeTri = testOrderby($champsTriables,'nom','ASC');
    $ordreChamp = $ordreDeTri[0];
    $ordreDirection = $ordreDeTri[1];



    $sql = "SELECT * FROM employes ORDER BY $ordreChamp $ordreDirection";

    $resultats = mysqli_query($connection, $sql);
    ?>


    <table class="table table-condensed table-striped table-over table-responsive">
      <thead>
        <tr>
          <th>
                        id
                        <a href="employes.php?order=id&amp;direction=ASC">+</a>
                        <a href="employes.php?order=id&amp;direction=DESC">-</a>
                  </th>
          <th>
                        nom
                        <a href="employes.php?order=nom&amp;direction=ASC">+</a>
                        <a href="employes.php?order=nom&amp;direction=DESC">-</a>
                    </th>
          <th>
                        prenom
                        <a href="employes.php?order=prenom&amp;direction=ASC">+</a>
                        <a href="employes.php?order=prenom&amp;direction=DESC">-</a>
                    </th>
          <th>
                        id_adresse
                        <a href="employes.php?order=id_adresse&amp;direction=ASC">+</a>
                        <a href="employes.php?order=id_adresse&amp;direction=DESC">-</a>
                    </th>
          <th>
                        id_ferme
                        <a href="employes.php?order=id_ferme&amp;direction=ASC">+</a>
                        <a href="employes.php?order=id_ferme&amp;direction=DESC">-</a>
                    </th>
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
            <td><?= $ligne['prenom'] ?></td>
            <td><?= $ligne['id_adresse'] ?></td>
            <td><?= $ligne['id_ferme'] ?></td>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
