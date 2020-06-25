<?php

spl_autoload_register(function($class){
  $pathModels="./models/".$class.".php";
  $pathControllers="./controllers/".$class.".php";
  $pathLibs="./libs/".$class.".php";
  if(file_exists($pathModels)){
      require_once( $pathModels);
  }elseif(file_exists( $pathControllers)){
      require_once( $pathControllers); 
  }elseif(file_exists( $pathLibs)){
   require_once( $pathLibs);
  }
});
include "./views/layouts/DefaultChambre.php";

//if (isset($_GET['page']) && $_GET['page'=='CHAMBRE']){
  if (isset($_POST['creerChambre'])) {
  $manager = new managerChambre();
  $data=['numero'=>$_POST['numero'],'numeroBatiment'=>$_POST['numeroBatiment'],'type'=>$_POST['type']];
  $chambre = new Chambre($data);
  $manager->add($chambre);
}
//}
?>