<?php

function testOrderby($listedeChamps, $champParDefaut, $directionParDefaut){

  if(isset($_GET['order']) ){
    if (in_array($_GET['order'], $listedeChamps)){
      $champParDefaut = $_GET['order'];
    }else {
      echo " <div class='alert alert-danger'>je ne connais pas ce champ , désolé </div> ";
    }
  }
  if(isset($_GET['direction'])) {
    if (in_array($_GET['direction'], ['ASC','DESC'])){
      $directionParDefaut = $_GET['direction'];
    }else {
      echo " <div class='alert alert-danger'> je ne connais pas cet ordre , désolé </div>";
    }
  }
  return [$champParDefaut, $directionParDefaut];
}


function tableHeaders($liste){
  $out='';

  foreach ($liste as $cle => $valeur) {

      $out .= "<th>";
      $out.=$valeur;
      $out.="<a href=\"?order=$cle&amp;direction=ASC\">+ </a>";
      $out.="<a href=\"?order=$cle&amp;direction=DESC\">- </a>";
      $out .= "</th>";

  }

return $out;

}


function verifierFormulaire ($champs) {
  if(count($_POST)>0){
    for($i = 0; $i < count($champs);$i++){
      if(!isset($_POST[$champs[$i]])){
        return false;
      }
    }

    return true;
  }
  return null;
}
