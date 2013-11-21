<?php
    $nombre = $_GET['nombre'];
    if($nombre != ''){
     //   header("Content-type: image/jpeg");
        $imagick = new Imagick();
        header("Content-disposition: attachment; filename=foto-perfil.jpeg");
        header("Content-type: image/jpeg");
        $x = 190;
        $y = 190;
        $src = 'images/logo.jpg';
        $img = imagecreatefromjpeg($src);
        $color = imagecolorallocate($img, 0, 0, 0); // black
        $font = 'fonts/LastNote-Regular 3.ttf'; // path to font
        imagettftext($img, 70, 0, $x, $y, $color, $font, $nombre );
        imagejpeg($img);
    }

?> 
