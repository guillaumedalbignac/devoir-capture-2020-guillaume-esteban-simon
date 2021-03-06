<?php 
    require "./accesseur/DAO.php";
    $listeHumidite = DAO::listerHumiditesJour();
    $listeHumiditeMoyennes = DAO::listerHumiditesMoyennes();

    header ("Content-Type:text/xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    
    foreach ($listeHumiditeMoyennes as $moyenne) 
    {
        
    ?>    
        <humidite>
            <bureau>
                <jour>
                    <min><?=$moyenne->minimum?></min>
                    <moyenne><?=round($moyenne->moyenne)?></moyenne>  
                    <max><?=$moyenne->maximum?></max> 
<?php
    }
    
    foreach ($listeHumidite as $humidite) 
    {
?>             
                <heure>
                    <valeur><?=$humidite->heures?></valeur>
                    <min><?=$humidite->minimum?></min>
                    <moyenne><?=round($humidite->moyenne)?></moyenne>  
                    <max><?=$humidite->maximum?></max>  
                </heure>                  
<?php
    }
?>
        </jour>
    </bureau>     
</humidite>