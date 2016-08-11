<?php
function getColor(){
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = '#'.$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)];
		return $color;
	}
function countFiles($dir){
	    if ($handle = opendir($dir)) {
	    $i = 0;
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file))
                $i++;
        }
        return $i;
    }
}

function printDefault($v){
	if(is_null($v)){
		return "default";
	}else{
		return $v;
	}
}
function space(){
	echo "<br>";
}
function generateUser(){
	$user = explode("/",getcwd());
	$user = $user[count($user)-1];
	return $user;
}
function lastUpdate($d){
						if(file_exists($d."/"."index.html")){
						echo date ("F d Y H:i:s.", filemtime($d."/"."index.html"));
						}
						else if(file_exists($d."/"."index.php")){
						echo date ("F d Y H:i:s.", filemtime($d."/"."index.php"));
						}
						else
						{
							echo "No index in directory";
						}
}
function findAllDirs(){
	return array_filter(glob('*'), 'is_dir');
}

?>
