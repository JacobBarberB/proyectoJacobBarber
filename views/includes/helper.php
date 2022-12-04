<?php

// function file_get(){
//     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
//          $url = "https://";   
//     else  
//          $url = "http://";   
//     // Append the host(domain name, ip) to the URL.   
//     $url.= $_SERVER['HTTP_HOST'];   
    
//     // Append the requested resource location to the URL   
//     $url.= $_SERVER['REQUEST_URI'];    
      
//     return $url;   
// }
function getPagename(){
    $pageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
    return $pageName;
}

function getFile_nav(){
    $path_parts = pathinfo(getPagename());    

    return $path_parts['filename'];
}
