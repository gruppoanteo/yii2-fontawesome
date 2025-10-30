<?php

namespace hal\fontawesome;

/**
 * Class CdnFreeAssetBundle
 * @package hal\fontawesome
 */
class AssetBundle extends \yii\web\AssetBundle
{
    /**
     * @inherit
     */
    public $css = [
        '//use.fontawesome.com/releases/v5.13.0/css/all.css',
        '//use.fontawesome.com/releases/v5.13.0/css/v4-shims.css',
    ];
}