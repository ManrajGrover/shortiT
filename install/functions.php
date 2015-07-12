<?php
    // For encryption of password
    function encrypt_password($string) {
        $output = false;
        $key = 'shortiT';
        $iv = md5(md5($key));
        $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
        $output = base64_encode($output);
        return $output;
    }
    
    // For decryption of password
    function decrypt($string){
        $output = false;
        $key = 'shortiT';
        $iv = md5(md5($key));
        $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
        $output = rtrim($output, "");
        return $output;
    }
?>