<?php
    $monfichier = fopen('test/questions.qs', 'r+');
    $stack = array();
    $content = "" ;
    $tabtheme = array();
    $tabquestion = array();
    $tabqcm = array();
    $a = 0;
     $questionType = array();
    

while(!feof($monfichier)) 
{
$content = fgets($monfichier);

array_push($stack, $content);
$i = 0;

$replace = str_replace("##", " ", $content);


        if(strstr($content, '##'))
        {
        array_push($tabtheme, $content);
        array_push($tabqcm, " ");
        array_push($tabquestion, " ");
        }


        if(strpos($content, "-") === 0)
        {
        array_push($tabqcm, $content);
        array_push($tabtheme, " ");
        array_push($tabquestion, " ");
        }

        elseif(strstr($replace, '#'))
        {
        array_push($tabquestion, $content);
        array_push($tabtheme, " ");
        array_push($tabqcm, " ");
        }


    
    while($a < count($stack)-1)
    {
    #print_r($tabtheme[$a]);
    #print_r($tabquestion[$a]);
    #print_r($tabqcm[$a]);
    $a++;
    }

             
} 
$save = "";
$reponse = array();

for ($i=0; $i < count($tabquestion)-1 ; $i++) {  // Je boucle dans mon tabquestion

	if($tabtheme[$i] != ""){
		# on affiche le contenu de l'index theme
		print_r($tabtheme[$i]);
	}

	if ($tabquestion[$i] != " "){ // Si dans mon tabquestion il y a pas du vide 
	    array_push($questionType,  $tabquestion[$i]); //alors je met cette qestion dans questionType

		if($tabquestion[$i+1] != " "){
			//pas qcm
			print_r($questionType); 
			$save = readline("Entrez le réponse: ");
			array_push($reponse,  $save);
			$questionType = array();
		}
	
	}
	if ($tabqcm[$i+1] != " "){ // Si dans mon tabQcm il n y a pas du vide
	    array_push($questionType, $tabqcm[$i+1]);  //alors je met cette qestion dans questionType
	}
	if($tabqcm[$i+1] == " "){// si tabqcm a lindex +1 est vide
		if(count($questionType) > 0) //si la longueur du tableau est superieur a 0 on print le
		{
			print_r($questionType);  
			$save = readline("Entrez le réponse: ");
			array_push($reponse,  $save);
			
		}

		$questionType = array(); //reinitialise le tableeau questionType


	}




}
print_r($reponse);



?>
