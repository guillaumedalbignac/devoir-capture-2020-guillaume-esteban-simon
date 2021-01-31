<?php
require "BaseDeDonnees.php";

class DAO{
    
    public static function listerHumiditesJour(){
        $MESSAGE_SQL_LISTER_HUMIDITES = "SELECT date_part('hour',moment) as heures, MAX(tauxhumidite) as maximum, 
        MIN(tauxhumidite) as minimum, AVG(tauxhumidite) as moyenne FROM humidite WHERE date_part('day', moment) =
        date_part('day', moment) GROUP BY date_part('hour',moment)";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerHumidites = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_HUMIDITES);
        $requetteListerHumidites->execute();
        $listeHumidites = $requetteListerHumidites->fetchAll(PDO::FETCH_OBJ);

        return $listeHumidites;
    }

    public static function listerHumiditesMoyennes(){
        $MESSAGE_SQL_LISTER_HUMIDITES_MOYENNES = "SELECT MAX(tauxhumidite) as maximum, MIN(tauxhumidite) as minimum, 
        AVG(tauxhumidite) as moyenne FROM humidite LIMIT 24";
        $baseDeDonnees = BaseDeDonnees::getConnexion();
        $requetteListerHumiditesMoyennes = $baseDeDonnees->prepare($MESSAGE_SQL_LISTER_HUMIDITES_MOYENNES);
        $requetteListerHumiditesMoyennes->execute();
    
        $listeHumiditesMoyennes = $requetteListerHumiditesMoyennes->fetchAll(PDO::FETCH_OBJ);
        return $listeHumiditesMoyennes;
    }
}
?>