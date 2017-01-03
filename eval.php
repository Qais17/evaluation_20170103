<?php
    $monfichier = fopen('test/questions.qs', 'r+');


while(!feof($monfichier)) {



 $content .= fgets($monfichier);
 $caca = str_replace("##","",$content);

  $cacaToutjoil = strstr($caca, '#');
}

echo $cacaToutjoil;


?>
