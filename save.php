<?php

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

        
    $code = $_POST['save'];
    $uploaddir = 'save';
    

    if ( ! is_dir($uploaddir)) {
      mkdir($uploaddir);
    }
   
    $nome = generateRandomString(6);
    
    $code = str_replace(array("\r\n", "\n", "\r"), '\n', $code);

    $var_str = var_export($code, true);
    
    file_put_contents($uploaddir . '/' . $nome, $code);
    
    
    // echo "<h2>Para carregar o código salvo, coloque no fim da url este código:</h2><br>";
    
    
    
    $actual_link = "http://maverick.td.utfpr.edu.br/code";
    
    header("LOCATION: " . $actual_link . "?" .  $nome);

?>
