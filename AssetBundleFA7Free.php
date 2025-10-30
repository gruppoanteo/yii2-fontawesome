<?php

namespace anteo\fontawesome;

class AssetBundleFA7Free extends \yii\web\AssetBundle
{
    public $css = [
        'css/all.css',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/FA7_free';
        parent::init();
    }

    public $publishOptions = [
        'only' => [
            'css/*',
            'webfonts/*',
            'sprites/*',
            'svgs/*',
        ],
    ];
}


