<?php
namespace hal\fontawesome;

use hal\fontawesome\dictionaries\FabDefinitions;
use hal\fontawesome\dictionaries\FarDefinitions;
use hal\fontawesome\dictionaries\FasDefinitions;
use hal\fontawesome\dictionaries\LegacyDefinitions;

/**
 * Class FAB
 * @package hal\fontawesome
 */
class FAD extends FontAwesome implements FarDefinitions, FasDefinitions
{
    public static $cssPrefix = 'fad';
    
    public static function icon($name, $options = [])
    {
        return new components\IconDuo(static::$cssPrefix, $name, $options);
    }
}
