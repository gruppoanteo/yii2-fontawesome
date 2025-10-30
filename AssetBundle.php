<?php

namespace anteo\fontawesome;

/**
 * Class CdnFreeAssetBundle
 * @package anteo\fontawesome
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