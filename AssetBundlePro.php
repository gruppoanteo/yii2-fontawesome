<?php

namespace anteo\fontawesome;

/**
 * Class CdnFreeAssetBundle
 * @package anteo\fontawesome
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
