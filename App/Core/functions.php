<?php
// Few custom functions

function printr($param){
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

function test($text = ''){
    if ($text != ''){
        echo '<br><p style="background-color: black;color: white;font-size: 29px;display: inline-block";>' . $text . '</p>';
    } else {
        echo '<br><p style="background-color: black;color: white;font-size: 29px;display: inline-block";>Check</p>';
    }
}

function br(){
    echo '<br>-------------------------------------------------<br>';
}

function currentFile($name = ''){
    $len1 = '-----------------------------------------------------------------------';
    $namelen = strlen($name);
    $len2 = str_repeat('-', 70 - $namelen);
    if (!empty($name)) {
    echo '<br><div style="color:gray"><' . $len1 . $name . $len2 . '></div>';
    }
}

// Sanitize post data
function sanPostStr(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    foreach($_POST as $key => $value){
        $data[$key] = htmlspecialchars(strip_tags(trim($value)));
    }
    return $data;
}

function showGlobals($data = []){
    echo '<div style="background-color:#F2E4E4;padding: 15px; display: inline-block">';
    echo '______________________$_SESSION, $_POST, $data _____________________<br>';
    echo 'SESSION: ';
    printr($_SESSION);
    echo '$_POST:';
    printr($_POST);
    echo '$data:';
    printr($data);
    //echo '________________________________________________________________________';
    echo '</div>';
}

function addnbsp($count){
    // add &nbsp count amount
    for ($i=0; $i < $count; $i++) {
        echo '&nbsp';
    }
}
