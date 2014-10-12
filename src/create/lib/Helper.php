<?php
/**
 * Helper class
 * @author tatsunori_nishikori
 *
 */
namespace create\lib;
class Helper {

    public static function json_encode($val){
        return json_encode($val, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_FORCE_OBJECT);
    }
}
