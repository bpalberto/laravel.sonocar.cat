<?php

namespace Sonocar\Utils\QRCodeTools;

/*
 * PHP QR Code encoder
 *
 * Image output of code using GD2
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */


class QRimage {

    //----------------------------------------------------------------------
    public static function png($frame, $filename = false, $pixelPerPoint = 4, $outerFrame = 4,$saveandprint=FALSE, $bgcolor = QRconfig::BG_COLOR, $fgcolor = QRconfig::FG_COLOR)
    {
        $image = self::image($frame, $pixelPerPoint, $outerFrame, $bgcolor, $fgcolor);

        if ($filename === false) {
            Header("Content-type: image/png");
            ImagePng($image);
        } else {
            if($saveandprint===TRUE){
                ImagePng($image, $filename);
                header("Content-type: image/png");
                ImagePng($image);
            }else{
                ImagePng($image, $filename);
            }
        }

        ImageDestroy($image);
    }

    //----------------------------------------------------------------------
    public static function jpg($frame, $filename = false, $pixelPerPoint = 8, $outerFrame = 4, $q = 85, $bgcolor = QRconfig::BG_COLOR, $fgcolor = QRconfig::FG_COLOR)
    {
        $image = self::image($frame, $pixelPerPoint, $outerFrame, $bgcolor, $fgcolor);

        if ($filename === false) {
            Header("Content-type: image/jpeg");
            ImageJpeg($image, null, $q);
        } else {
            ImageJpeg($image, $filename, $q);
        }

        ImageDestroy($image);
    }

    //----------------------------------------------------------------------
    private static function image($frame, $pixelPerPoint = 4, $outerFrame = 4, $bgcolor = QRconfig::BG_COLOR, $fgcolor = QRconfig::FG_COLOR)
    {
        $h = count($frame);
        $w = strlen($frame[0]);

        $imgW = $w + 2*$outerFrame;
        $imgH = $h + 2*$outerFrame;

        $base_image =ImageCreate($imgW, $imgH);

        $RGBbgcolor = self::hex2rgb($bgcolor);
        $RGBfgcolor = self::hex2rgb($fgcolor);

        $col[0] = ImageColorAllocate($base_image,$RGBbgcolor['R'],$RGBbgcolor['G'],$RGBbgcolor['B']);
        $col[1] = ImageColorAllocate($base_image,$RGBfgcolor['R'],$RGBfgcolor['G'],$RGBfgcolor['B']);

        imagefill($base_image, 0, 0, $col[0]);

        for($y=0; $y<$h; $y++) {
            for($x=0; $x<$w; $x++) {
                if ($frame[$y][$x] == '1') {
                    ImageSetPixel($base_image,$x+$outerFrame,$y+$outerFrame,$col[1]);
                }
            }
        }

        $target_image =ImageCreate($imgW * $pixelPerPoint, $imgH * $pixelPerPoint);
        ImageCopyResized($target_image, $base_image, 0, 0, 0, 0, $imgW * $pixelPerPoint, $imgH * $pixelPerPoint, $imgW, $imgH);
        ImageDestroy($base_image);

        return $target_image;
    }

    private static function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array(
            'R' => $r,
            'G' => $g,
            'B' => $b
        );
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
}
