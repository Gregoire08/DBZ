<?php 

/* DBZ MODELE KAMEHAMEHA */

class Model {
  
  private $PDO = NULL;
  
  public function __construct ($pdo) {
    $this->PDO = $pdo;
  }
  
  // db name
  public function Name_DB () {
    return $this->PDO->Query('select database()')->fetchColumn();
  }
  
 // list table
  public function List_Table () {
    $SQL = "show tables";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }
  
  public function req($SQL) 
  {
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll(PDO::FETCH_ASSOC);
  }
  
}

?>
