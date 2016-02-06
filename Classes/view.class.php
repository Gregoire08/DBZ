<?php 

/* DBZ VIEW */

class View {
  
    public function __construct () { }
    
    // menu list of table link
    public static function MenuTable ($db_name, $array_table) {
      $menu = "<div>DB : ".$db_name;
      
      foreach ($array_table as $K => $TABLE) 
	  {
			foreach($TABLE as $value)
			{
				$menu .= " <a href='?T=".$value."'>[ ".strtoupper($value)." ]</a>";
			}
	  }
      $menu .= "</div>";
      
      return $menu;
    }    
   
    public static function gestion () // Affiche les possibilitées 
	{ 
		$choix = " Vous avez choisi la table ".$_GET['T'].". Que souhaitez vous faire : ";
        $choix .= " <a href='?T=".$_GET['T']."&amp;detail=afficher'>Afficher</a></li> ";
		$choix .= " <a href='?T=".$_GET['T']."&amp;detail=supprimer'>Supprimer</a></li> ";
        return $choix;
    }
    
    public static function affichage($res) //Affichage
	{
        $aff = "<table border='1'>";
		$i=0;
		$j=0;
		$titre= NULL;
        foreach($res as $Key0 => $ligne){
            $aff .= "<tr>";
            foreach($ligne as $Key => $column)
			{
				if($i==0)
				{
					$titre[$j]=$Key;
					$j++;
				}
                $aff.= "<td>$column</td>";				
            }
            $aff.= "<td><a href='?T=".$_GET['T']."&amp;header=".$titre[0]."&amp;value=".$ligne[$titre[0]]."&amp;detail=supligne'><img id='croix' src='./Fichiers/images/letter_x.png'></a></td>";
			$aff.= "<td><a href='#'> <img src='./Fichiers/images/edit18.png'></a></td></tr>";
			$i++;
        }
		$aff.= "<thead><tr>";
		foreach($titre as $Key2 => $title)
		{
			$aff .= "<th>".$title."</th>";
		}
        $aff.="</tr></thead></table>";
        return $aff;
    }
	
	public static function supprimer() //Supprimer table
	{
       echo "La table ".$_GET['T']." a bien été supprimée ";
    }
	
	public static function supligne() //Supprimer ligne
	{
       echo "La ligne a bien été supprimée ";
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
