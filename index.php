
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport" />
</head>
<?php
  function getColor(){
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)].$rand[rand(10,15)];
      return $color;
    }
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:600);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,300);
body{
	font-family: 'Raleway', sans-serif;
	background: white;
	text-align: center;
	margin:0;

}
a{
	color: black;
	text-decoration: none;

}
#container{
	text-align: center;
    display: inline-block;
	background: white;
	padding-top: 30px;
	padding-bottom: 30px;
	margin-bottom: 10px;
  transition: all 0.5s ease;

	width: 100%;
}
#container:hover{
	opacity: 0.5;
  transition: all 0.5s ease;
}
#menu{
	position: fixed;
	z-index: 100;
	bottom: 0px;
	width: 100%;
	height: 50px;
}
#wrapper{
	width: 100%;
	padding-top:90px;
  margin-left:5%;
  text-align: center;
}

#wrapperWeb{
	text-align: center;
	padding-left: 25%;
	width: 50%;
	padding-top:160px;
}
#headline{
	font-size: 8vmin;
	word-wrap: break-word;
	padding-top: 20px;
	padding-bottom: 20px;
	width: 100%;
	background: white;
	opacity: 0.8;
	position: fixed;
	top: 0px;
  z-index: 9999;

}
#top{
  font-family: 'Open Sans', sans-serif;
  font-size: 20pt;
}


</style>

<?php
/*
Dynamic directory detector.
Change user to add directorys or leave null.
*/
require "functions.php";
function load(){

$user = explode("/",getcwd());
$user = $user[count($user)-1];
$showLastUpdate = true;
$showNumberOfFiles = true;
$dirs = findAllDirs();//array_filter(glob('*'), 'is_dir');
$dir = "";//$_SERVER['PATH_INFO'];


	echo "<div id=headline>".strtoupper(printDefault($user))."</div>";
	if(ismobile()){

	echo "<div id=wrapper>";
	}
	else{
		echo "<div id=wrapperWeb>";
	}
	echo "<div id=menu></div>";

	foreach($dirs as $d)
	{
		echo "<div id=container style='background:".getColor().";'>";
		echo "<a href=".$dir.$d."/".">";
		echo "<span id='top'>".strtoupper($d)."</span>";
		//////////////////////////////////////////////////////////////////////
		if($showNumberOfFiles){
			space();
			echo countFiles($d."/")." files in directory";
		}
		if($showLastUpdate){
			space();
			lastUpdate($d);
		}
		//////////////////////////////////////////////////////////////////////
		echo "</a></div>";
	}
	echo "</div>";
	}
load();
?>
