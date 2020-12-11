<?php

namespace Modules\Common\Helpers;


class FilterMaliciousContent {

    public static function clear($value){
        if(!is_null($value)) {
            foreach (['trim', 'strip_tags', 'htmlspecialchars'] as $function) {
                $value = $function($value);
            }
        }

        return $value;
    }

}
