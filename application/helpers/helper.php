<?php
function userlogin(){
    $db = \config\database::connect();
    return $db->table('user')->where('id', session('id'))->get()->getrow();
}