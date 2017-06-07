<?php
function gen_id($length) {
    global $code_gen ;
    $kata='abcdefghijklmnopqrstuvwxyz0123456789';
     $code_gen = ''; 
     for ($i = 0; $i < $length; $i++) { 
         $pos = rand(0, strlen($kata)-1); 
         $code_gen .= $kata{$pos}; 
         
         } 
     return $code_gen; 
}
function gen_id_char($length) {
    global $code_gen ;
    $kata='abcdefghijklmnopqrstuvwxyz';
     $code_gen = ''; 
     for ($i = 0; $i < $length; $i++) { 
         $pos = rand(0, strlen($kata)-1); 
         $code_gen .= $kata{$pos}; 
         
         } 
     return $code_gen; 
}
?>