<?php

namespace hal\fontawesome;

/**
 * Class CdnFreeAssetBundle
 * @package hal\fontawesome
 */
class AssetBundlePro extends \yii\web\AssetBundle
{
    /**
     * @inherit
     */
    public $css = [
        'css/all.css',
        'css/v4-shims.css',
    ];
    
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }
    
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
            'webfonts/*',
            'sprites/*',
            'svgs/*',
        ],
    ];
}
