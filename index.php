<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */

// configuration
require_once("Config/config.script.php");

// connexion db
require_once("Classes/pdo.connexion.class.php");
$PDO = new Pdo_Connexion ($CONFIG['DB_INI_FILE']);

// model class
require_once("Classes/model.class.php");
$MODEL = new Model ($PDO->CNX);

// view class
require_once("Classes/view.class.php");

// html output increment
$OUTPUT = NULL;

if(isset($_GET["T"]) && !isset($_GET["detail"]))
{
    $OUTPUT .= View::gestion();
}

else if(isset($_GET["T"]) && ($_GET["detail"] == 'afficher'))
{
    $OUTPUT .=View::affichage($MODEL->req("SELECT * FROM ".$_GET["T"]));
}

else if(isset($_GET["T"]) && ($_GET["detail"] == 'supprimer'))
{
    $OUTPUT .=View::supprimer($MODEL->req("DROP TABLE ".$_GET["T"]));
	$OUTPUT .= View::MenuTable($MODEL->Name_DB(), $MODEL->req("SHOW TABLES"));
}

/*elseif(isset($_GET["T"]) && ($_GET["detail"] == 'modifier'))
{
    $OUTPUT .=View::affichage($MODEL->request("INSERT INTO ."$_GET["T"]."VALUES ('valeur 1', 'valeur 2', ...)"));
}*/

else if(isset($_GET["T"]) && ($_GET["detail"] == 'supligne'))
{
    $OUTPUT .=View::supligne($MODEL->req("DELETE FROM ".$_GET["T"]." WHERE ".$_GET["header"]." = ".$_GET["value"]));
	$OUTPUT .=View::affichage($MODEL->req("SELECT * FROM ".$_GET["T"]));
}



else
{
    // set the menu based on tables
    $OUTPUT .= View::MenuTable($MODEL->Name_DB(), $MODEL->req("SHOW TABLES"));
}




// output echo screen rendering 
View::HTML($CONFIG['MODULE_NAME'], $OUTPUT);

?>
