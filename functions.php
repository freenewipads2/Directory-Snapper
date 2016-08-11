<?php

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

function space(){
	echo "<br>";
}



function findAllDirs(){
	return array_filter(glob('*'), 'is_dir');
}

  function ismobile() {
    $is_mobile = '0';

    if(preg_match('/(android|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $is_mobile=1;
    }

    if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $is_mobile=1;
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');

    if(in_array($mobile_ua,$mobile_agents)) {
        $is_mobile=1;
    }

    if (isset($_SERVER['ALL_HTTP'])) {
        if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
            $is_mobile=1;
        }
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
        $is_mobile=0;
    }

    return $is_mobile;
}

?>
