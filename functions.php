<?php

function createStringImg(int $fontSize, string $string, string $font): void
{
    $padding = 20;
    $lineHeight = $fontSize * 0.2;
    $lines = explode("\n", $string);
   
    foreach ($lines as $line) {
        $arBbox[] = imagettfbbox($fontSize, 0, $font, $line);
    }

    $maxWith = 0;
    foreach ($arBbox as $bbox) {
        $lineWith = $bbox[2];
        if ($lineWith > $maxWith) {
            $maxWith = $lineWith;
        }
    }

    $imageInnerWith = ($maxWith + $lineHeight * 4) + $padding;
    $imageInnerHeight = (($fontSize + $lineHeight) * count($lines) + $lineHeight * 2) + $padding;

    $im = imagecreatetruecolor($imageInnerWith, $imageInnerHeight);
    imagesavealpha($im, true);
    imagefill($im, 0, 0, imagecolorallocatealpha($im, 255, 255, 255, 0));
    $color = imageColorAllocate($im, 0, 0, 0);

    $lineShift = 1;
    foreach ($lines as $key => $line) {
        $x = $arBbox[$key][0] + (imagesx($im) / 2) - ($arBbox[$key][4] / 2);
        $arBbox[] = imagettfbbox($fontSize, 0, $font, $line);
        if ($key == 0) {
            imagettftext($im, $fontSize, 0, $x, $fontSize + $lineHeight + $padding / 2, $color, $font, $line);
        } else {
            $shift = ($fontSize + $lineHeight) * $lineShift + $padding / 2;
            imagettftext($im, $fontSize, 0, $x, $shift, $color, $font, $line);
        }
        ++$lineShift;
    }

    $paddingOut = 20;
    $imageOutWith = $imageInnerWith + $paddingOut * 2;
    $imageOutHeight = $imageInnerHeight + $paddingOut * 2;

    $imOut = imageCreateTrueColor($imageOutWith, $imageOutHeight);
    $back = imageColorAllocate($imOut, 0, 0, 255);
    imageFilledRectangle($imOut, 0, 0, $imageOutWith, $imageOutHeight, $back);

    imagecopy($imOut, $im, $paddingOut, $paddingOut, 0, 0, $imageInnerWith, $imageInnerHeight);

    imagepng($imOut);
    imagedestroy($imOut);
    imagedestroy($im);
}
