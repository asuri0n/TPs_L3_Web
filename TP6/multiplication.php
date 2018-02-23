<?php
/**
 * Created by PhpStorm.
 * User: asuri
 * Date: 30/01/2018
 * Time: 11:33
 */

$borne = $_GET['borne'];
if($borne > 100)
    $borne = 100;
if($borne < 1)
    $borne = 1;

ob_start();
echo "<table border='1'>";
for($i = 1; $i <=$borne;$i++){
    echo "<tr>";
    for($j = $i; $j <=$borne*$i;$j+=$i){
        echo "<td style='background-color:".($j%2==0 ? 'orange' : 'salmon')."'>".$j."</td>";
    }
    echo "</tr>";
}
echo "</table>";
$page = ob_get_contents();
ob_end_clean();

echo $page;