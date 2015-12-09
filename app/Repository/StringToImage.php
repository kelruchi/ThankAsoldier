<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 07/12/15
 * Time: 4:20 PM
 */

namespace App;


class StringToImage implements Convertable {



    public function stringToImage($string, $imageFile)
    {

        $filePointer = fopen($imageFile, 'wb');

        $imageData = explode(',', $string);

        fwrite($filePointer, base64_decode($imageData[1]));
        fclose($filePointer);
        dd($imageFile);
        return $imageFile;
    }

    public function ImageToString($image)
    {
        return base64_encode($image);
    }
}