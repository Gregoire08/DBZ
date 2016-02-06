<?php 

/* DBZ VIEW */

class View {
  
    public function __construct () { }
    
    // menu list of table link
    public static function MenuTable ($db_name, $array_table) {
      $menu = "<div>DB : ".$db_name;
      
      foreach ($array_table as $K => $TABLE) 
	  {
        $menu .= " <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a>";
      }
      $menu .= "</div>";
      
      return $menu;
    }    
   
    public static function gestion () // Affiche les possibilitées 
	{ 
		$choix = " Vous avez choisi la table ".$_GET['T'].". Que souhaitez vous faire : ";
        $choix .= " <a href='?T=".$_GET['T']."&amp;detail=afficher'>Afficher</a></li> ";
		$choix .= " <a href='?T=".$_GET['T']."&amp;detail=supprimer'>Supprimer</a></li> ";
		$choix .= " <a href='?T=".$_GET['T']."&amp;detail=modifier'>Modifier</a></li> ";
        return $choix;
    }
    
    public static function affichage($res) //Affichage
	{
        $aff = "<table border='1'>";
        foreach($res as $ligne){
            $aff .= "<tr>";
            foreach($ligne as $column)
			{
                $aff.= "<td>$column</td>";
            }
            $aff.= "</tr>";
        }
        $aff.="</table>";
        return $aff;
    }
	
	public function supprimer() //Supprimer
	{
       echo "La table ".$_GET['T']." a bien été supprimée ";
    }
	
    // html final rendering
    public static function HTML ($title, $contener) {
      echo "<html>
      <head>
        <title>".$title."</title>
        <link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
      </head>
      <body>
		<div>
        <img src='Fichiers/images/logo.png' /><br/><hr/>
        </hr> </br>".$contener."
		</div>
      </body>
      </html>";
    }
    
}

?>
