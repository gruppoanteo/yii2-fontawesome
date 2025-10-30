<?php
namespace hal\fontawesome\components;

use hal\fontawesome\FontAwesome;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Icon
 * @package hal\fontawesome\components
 */
class Icon
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param string $cssPrefix
     * @param string $name
     * @param array $options
     */
    public function __construct($cssPrefix, $name, $options = [])
    {
        Html::addCssClass($options, $cssPrefix);

        if (!empty($name)) {
            Html::addCssClass($options, FontAwesome::$basePrefix . '-' . $name);
        }

        $this->options = $options;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'i');

        return Html::tag($tag, null, $options);
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function inverse()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-inverse');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function spin()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-spin');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function pulse()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pulse');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function fixedWidth()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-fw');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function li()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-li');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException,
     */
    public function border()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-border');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function pullLeft()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pull-left');
    }
    
    /**
     * @return $this
     * @throws InvalidConfigException
     */
    public function pullRight()
    {
        return $this->addCssClass(FontAwesome::$basePrefix . '-pull-right');
    }
    
    /**
     * @param $value
     * @return $this
     * @throws InvalidConfigException
     */
    public function size($value)
    {
        return $this->addCssClass(
            FontAwesome::$basePrefix . '-' . $value,
            in_array((string)$value, [
                FontAwesome::SIZE_LG,
                FontAwesome::SIZE_SM,
                FontAwesome::SIZE_XS,
                FontAwesome::SIZE_2X,
                FontAwesome::SIZE_3X,
                FontAwesome::SIZE_4X,
                FontAwesome::SIZE_5X,
                FontAwesome::SIZE_6X,
                FontAwesome::SIZE_7X,
                FontAwesome::SIZE_8X,
                FontAwesome::SIZE_9X,
                FontAwesome::SIZE_10X,
            ], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::size()',
                'FontAwesome::SIZE_LARGE, FontAwesome::SIZE_2X, FontAwesome::SIZE_3X, FontAwesome::SIZE_4X, FontAwesome::SIZE_5X'
            )
        );
    }
    
    /**
     * @param $value
     * @return $this
     * @throws InvalidConfigException
     */
    public function rotate($value)
    {
        return $this->addCssClass(
            FontAwesome::$basePrefix . '-rotate-' . $value,
            in_array((string)$value, [FontAwesome::ROTATE_90, FontAwesome::ROTATE_180, FontAwesome::ROTATE_270], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::rotate()',
                'FontAwesome::ROTATE_90, FontAwesome::ROTATE_180, FontAwesome::ROTATE_270'
            )
        );
    }
    
    /**
     * @param $value
     * @return $this
     * @throws InvalidConfigException
     */
    public function flip($value)
    {
        return $this->addCssClass(
            FontAwesome::$basePrefix . '-flip-' . $value,
            in_array((string)$value, [FontAwesome::FLIP_HORIZONTAL, FontAwesome::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FontAwesome::flip()',
                'FontAwesome::FLIP_HORIZONTAL, FontAwesome::FLIP_VERTICAL'
            )
        );
    }
    
    /**
     * @param      $class
     * @param bool $condition
     * @param bool $throw
     * @return $this
     * @throws InvalidConfigException
     */
    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;

                throw new InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }

        return $this;
    }
    
    /**
     * @deprecated
     * Change html tag.
     * @param string $tag
     * @return static
     * @throws \yii\base\InvalidParamException
     */
    public function tag($tag)
    {
        $this->options['tag'] = $tag;

        return $this;
    }
}
