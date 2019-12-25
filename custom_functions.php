<?php

function show_sub_string($string, $length) {
    $exp_string = explode(" ", $string);
    $req_exp_string = array_slice($exp_string, 0, $length);
    $imp_string = implode(" ", $req_exp_string);
    return $imp_string;
}


?>