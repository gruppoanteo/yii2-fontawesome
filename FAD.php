<?php
namespace anteo\fontawesome;

use anteo\fontawesome\dictionaries\FabDefinitions;
use anteo\fontawesome\dictionaries\FarDefinitions;
use anteo\fontawesome\dictionaries\FasDefinitions;
use anteo\fontawesome\dictionaries\LegacyDefinitions;

/**
 * Class FAB
 * @package anteo\fontawesome
 */
class FAD extends FontAwesome implements FarDefinitions, FasDefinitions
{
    public static $cssPrefix = 'fad';
    
    public static function icon($name, $options = [])
    {
        return new components\IconDuo(static::$cssPrefix, $name, $options);
    }
}
