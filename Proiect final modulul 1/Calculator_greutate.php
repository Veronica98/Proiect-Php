<?php



function calculeaza_greutate_ideala(){
	
	$gen = isset($_GET['gen']) ? $_GET['gen'] : false;
	$greutate_actuala = isset($_GET['greutateact']) ? $_GET['greutateact'] : false;
	$inaltime = isset($_GET['inaltime']) ? $_GET['inaltime'] : false;
	$varsta = isset($_GET['varsta']) ? $_GET['varsta'] : false;
	$greutate_ideala = 0;
	
	$validare = validare_date($gen,$greutate_actuala,$inaltime,$varsta);
	
	if($validare == 1){
		
		$db_obj = \Helpers\Database::connect();
		$db_obj->query("INSERT INTO useri(gen,greutate_actuala,inaltime,varsta) VALUES ($gen,$greutate_actuala,$inaltime,$varsta)");
		
		
		if($gen == 1){ //femeie
			
			$greutate_ideala = ($inaltime) - 100 - ( (($inaltime)-150)/2.5 + ($varsta - 20)/6 );

		}else if($gen == 2){ //barbat
			
			$greutate_ideala = ($inaltime) - 100 - ( (($inaltime)-150)/4 + ($varsta - 20)/4 );
			
		}
		
		echo "Greutatea ideala dupa formula Lorentz-Modificata este: ".$greutate_ideala." kg<br>";
		
		if($greutate_actuala/(($inaltime/100)*($inaltime/100)) < 19.9){
			
			echo "Esti subponderal!<br>";
			echo "Ai nevoie de o dieta echilibrata! Incearca sa mananci mai multe mese pe zi si sa faci mai mult sport.";
			
		}else if($greutate_actuala/(($inaltime/100)*($inaltime/100)) < 29.9 && $greutate_actuala/(($inaltime/100)*($inaltime/100)) > 20.0){
			
			echo "Ai o greutate normala!<br>";
			echo "Felicitari, mentii un echilibru intre sport si alimentatie!";
			
		}else if($greutate_actuala/(($inaltime/100)*($inaltime/100)) < 39.9 && $greutate_actuala/(($inaltime/100)*($inaltime/100))> 30.0){

			echo "Esti supraponderal!<br>";
			echo "Incearca sa faci mai mult sport si sa mananci mai sanatos!";

		}else if($greutate_actuala/(($inaltime/100)*($inaltime/100)) < 49.9 && $greutate_actuala/(($inaltime/100)*($inaltime/100)) > 40.0){

			echo "Obezitate gradul 1!<br>";
			echo "Incearca sa consulti un doctor , sa tii un regim sanatos si sa faci mai mult sport!";

		}else if($greutate_actuala/(($inaltime/100)*($inaltime/100)) < 59.9 && $greutate_actuala/(($inaltime/100)*($inaltime/100)) > 50.0){

			echo "Obezitate gradul 2!<br>";
			echo "Incearca sa consulti un doctor cat de curand posibil, sa tii un regim sanatos si sa faci mai mult sport!";

		}else if($greutate_actuala/(($inaltime/100)*($inaltime/100)) > 60.0){

			echo "Obezitate gradul 3!<br>";
			echo "Incearca sa consulti un doctor urgent, sa tii un regim sanatos si sa faci mai mult sport!";

		}			
		
		
	} else {
		
		echo "A aparut o eroare in calcularea greutatii! Verifica corectitudinea datelor introduse!";
	}
	
	
	
	
	
}

function validare_date($gen,$greutate_actuala,$inaltime,$varsta){
	
	$validat = 1;

	if((int)$gen != 1 && (int)$gen != 2){
		
		$validat = 0;
		
	}else if(empty($greutate_actuala) || is_numeric($greutate_actuala) == 0){
		
		$validat = 0;
		echo "Greutatea actuala nu poate sa fie necompletata sau sa fie un sir de caractere!";
		
	}else if(empty($inaltime) || is_numeric($inaltime) == 0){
		
		$validat = 0;
		echo "Inaltimea nu poate sa fie necompletata sau sa fie un sir de caractere!";
		
	}else if((float)$inaltime < 140 || (float)$inaltime > 250 || strlen($inaltime) != 3){
		
		$validat = 0;
		echo "Inaltimea trebuie sa fie in cm,sa aiba 3 cifre si sa fie cuprinsa intre 140 si 250!";
		
	}else if((int)$varsta < 18 && (int)$varsta > 110){
		
		$validat = 0;
		echo "Varsta trebuie sa fie peste 18 ani!";
		
	}

	return $validat;
	
}