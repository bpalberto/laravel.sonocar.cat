<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sonocar\Utils\QRCodeTools;

/*
 * PHP QR Code encoder
 *
 * Config file, feel free to modify
 */

class QRconfig
{
    // use cache - more disk reads but less CPU power, masks and format templates are stored there
    const CACHEABLE = true;

    // used when CACHEABLE === true
    const CACHE_DIR = __DIR__ . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR;

    // default error logs dir
    const LOG_DIR = __DIR__ . DIRECTORY_SEPARATOR;

    // if true, estimates best mask (spec. default, but extremally slow; set to false to significant performance boost but (propably) worst quality code
    const FIND_BEST_MASK = true;

    // if false, checks all masks available, otherwise value tells count of masks need to be checked, mask id are got randomly
    const FIND_FROM_RANDOM = false;

    // when QRconfig::QRconfig::D_BEST_MASK === false
    const DEFAULT_MASK = 2;

    // maximum allowed png image width (in pixels), tune to make sure GD and PHP can handle such big images
    const PNG_MAXIMUM_SIZE = 1024;

    // Encoding modes
    const MODE_NUL = -1;
    const MODE_NUM = 0;
    const MODE_AN = 1;
    const MODE_8 = 2;
    const MODE_KANJI = 3;
    const MODE_STRUCTURE = 4;

    // Levels of error correction.
    const ECLEVEL_L = 0;
    const ECLEVEL_M = 1;
    const ECLEVEL_Q = 2;
    const ECLEVEL_H = 3;

    // Supported output formats
    const FORMAT_TEXT = 0;
    const FORMAT_PNG = 1;
    
    const IMAGE = true;
    const STRUCTURE_HEADER_BITS = 20;
    const MAX_STRUCTURED_SYMBOLS = 16;
    
    const N1 = 3;
    const N2 = 3;
    const N3 = 40;
    const N4 = 10;

    const QRSPEC_VERSION_MAX = 40;
    const QRSPEC_WIDTH_MAX = 177;
    
    const QRCAP_WIDTH = 0;
    const QRCAP_WORDS = 1;
    const QRCAP_REMINDER = 2;
    const QRCAP_EC = 3;
    
    
    const BG_COLOR = '#FFFFFF';
    const FG_COLOR = '#000000';
    
}
