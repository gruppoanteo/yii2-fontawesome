<?php


namespace hal\fontawesome\components;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class IconDuo
 *
 * @package hal\fontawesome\components
 */
class IconDuo extends Icon
{
    /**
     * @param $options
     * @return $this
     * @throws \yii\base\InvalidConfigException
     */
    public function duo($options = [])
    {
        foreach (['primary-color', 'secondary-color', 'primary-opacity', 'secondary-opacity'] as $key) {
            if (($val = ArrayHelper::getValue($options, $key)) !== null) {
                Html::addCssStyle($this->options, ['--fa-'.$key => $val]);
            }
        }
        return $this;
    }
    
    /**
     * @return IconDuo
     * @throws \yii\base\InvalidConfigException
     */
    public function swapOpacity()
    {
        return $this->addCssClass('fa-swap-opacity');
    }
}