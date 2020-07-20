<?php

namespace App\Services;

class Sku{

    public static function sku($name)
        {
            $word = str_word_count($name,1);
            $count = count($word);
            $name=$word[$count-1];
           
                return substr($name, 0, 4) . '-' . rand(1, 100);

        }    
}