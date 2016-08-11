<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport" />
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,300);
    * {
        padding: 0%;
        margin: 0%;
        transition: all 0.3s;
    }

    body {
        font-family: 'Raleway', sans-serif;
        background: white;
        text-align: center;
        margin: 0;
    }

    a {
        color: black;
        text-decoration: none;
    }

    #container {
        text-align: center;
        display: inline-block;
        background: white;
        padding: 5% 5% 5% 5%;
        width: 20%;
        word-wrap: break-word;
    }

    #container:hover {
        opacity: 0.8;
        width: 25%;
        cursor: pointer;
    }

    #wrapper {
        width: 100%;
        padding-top: 12%;
        text-align: center;
    }

    #menu {
        font-size: 8vw;
        word-wrap: break-word;
        padding-top: 1%;
        padding-bottom: 1%;
        width: 100%;
        background: white;
        opacity: 0.8;
        position: fixed;
        top: 0px;
        z-index: 9999;
    }

    #top {
        font-family: 'Open Sans', sans-serif;
        font-size: 20pt;
    }

    @media only screen and (max-device-width: 480px) {
        #container {
            width: 100%;
        }
        #container:hover {
            width: 100%;
            opacity: 0.5;
        }
    }
</style>

<?php
/*
Dynamic directory detector.
Change user to add directorys or leave null.
*/
require "functions.php";
function load(){

$showLastUpdate = true;
$showNumberOfFiles = true;
$user = generateUser(); //Generates username for the folder
$dirs = findAllDirs();


	echo "<div id=menu>".strtoupper(printDefault($user))."</div>";
	echo "<div id=wrapper>";

	foreach($dirs as $d)
	{
		echo "<div id=container style='background:".getColor().";'>";
		echo "<a href=".$d."/".">";
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


<script>
var lastPos = 0;
$(window).scroll(function() {
    currentPos = $(this).scrollTop();
    if (lastPos < currentPos) {
        lastPos = currentPos;
        menu.style.opacity = "0";
    } else {
        menu.style.opacity = "0.8";
        lastPos = currentPos;
    }
});
</script>
