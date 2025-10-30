Anteo Yii2 fontawesome
======================

Font Awesome implementation for Yii2 - Provided by Marco Curatitoli at HalService
-------------

Latest Update
-------------
Fontawesome Version `5.13.0` (nulled) 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist anteo/yii2-fontawesome "*"
```

or add

```
"anteo/yii2-fontawesome": "*"
```

to the require section of your `composer.json` file.


Usage with fa free version
-------------------------

Add `AssetBundle` as depends of your app asset bundle:
```php
class AppAsset extends AssetBundle
{
	// ...

	public $depends = [
		// ...
		'anteo\fontawesome\AssetBundle'
	];
}

```

Or inject `AssetBundle` in your view:

```php
anteo\fontawesome\AssetBundle::register($this);
```

Class reference
---------------

Namespace: `anteo\fontawesome`;

### Class  `FAB`, `FAL`, `FAR`, `FAD`, `FAS` or `FA`

* `static FAR::icon($name, $options=[])` - Creates an [`components\Icon`](#class-componenticon) that can be used to FontAwesome html icon
  * `$name` - name of icon in font awesome set.
  * `$options` - additional attributes for `i.fa` html tag.
* `static FAR::stack($name, $options=[])` - Creates an [`components\Stack`](#class-componentstack) that can be used to FontAwesome html icon
  * `$options` - additional attributes for `span.fa-stack` html tag.

### Class `components\Icon`

* `(string)$Icon` - render icon
* `$Icon->addCssClass($value)` - add to html tag css class in `$value`
  * `$value` - name of css class
* `$Icon->inverse()` - add to html tag css class `fa-inverse`
* `$Icon->spin()` - add to html tag css class `fa-spin`
* `$Icon->fixedWidth()` - add to html tag css class `fa-fw`
* `$Icon->ul()` - add to html tag css class `fa-ul`
* `$Icon->li()` - add to html tag css class `fa-li`
* `$Icon->border()` - add to html tag css class `fa-border`
* `$Icon->pullLeft()` - add to html tag css class `pull-left`
* `$Icon->pullRight()` - add to html tag css class `pull-right`
* `$Icon->size($value)` - add to html tag css class with size
  * `$value` - size value (variants: `FA::SIZE_LARGE`, `FA::SIZE_2X`, `FA::SIZE_3X`, `FA::SIZE_4X`, `FA::SIZE_5X`)
* `$Icon->rotate($value)` - add to html tag css class with rotate
  * `$value` - rotate value (variants: `FA::ROTATE_90`, `FA::ROTATE_180`, `FA::ROTATE_270`)
* `$Icon->flip($value)` - add to html tag css class with rotate
  * `$value` - flip value (variants: `FA::FLIP_HORIZONTAL`, `FA::FLIP_VERTICAL`)

### Class `components\IconDuo`
Extends `components\Icon` adding a couple of methods for duoColors icons
* `$IconDuo->duo($options = [])` - add to html tag styles in `$options` according to keys: 
  * `primary-color` - icon primary color
  * `secondary-color` - icon secondary color
  * `primary-opacity` - icon primary color opacity
  * `secondary-opacity` - icon secondary color opacity
* `$Icon->swapOpacity()` - add to html tag css class `fad-swap-opacity`


### Class `components\Stack`

* `(string)$Stack` - render icon stack
* `$Stack->icon($icon, $options=[])` - set icon for stack
  * `$icon` - name of icon or `component\Icon` object
  * `$options` - additional attributes for icon html tag.
* `$Stack->icon($icon, $options=[])` - set background icon for stack
  * `$icon` - name of icon or `component\Icon` object
  * `$options` - additional attributes for icon html tag.

Helper examples
---------------

```php
use anteo\fontawesome\FA;use anteo\fontawesome\FAD;

// normal use
echo FA::icon('FA::_HOME'); // <i class="fas fa-home"></i>

// shortcut
echo FA::i('FA::_HOME'); // <i class="fas fa-home"></i>

// icon with additional attributes
echo FA::icon(
    'arrow-left', 
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big fas fa-arrow-left" data-role="arrow"></i>

// icon in button
echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => FAS::icon('check')])
); // <button type="submit"><i class="fas fa-check"></i> Save</button>

// icon with additional methods
echo FAS::icon('cog')->inverse();    // <i class="fas fa-cog fa-inverse"></i>
echo FAS::icon('cog')->spin();       // <i class="fas fa-cog fa-spin"></i>
echo FAS::icon('cog')->fixedWidth(); // <i class="fas fa-cog fa-fw"></i>
echo FAS::icon('cog')->li();         // <i class="fas fa-cog fa-li"></i>
echo FAS::icon('cog')->border();     // <i class="fas fa-cog fa-border"></i>
echo FAS::icon('cog')->pullLeft();   // <i class="fas fa-cog pull-left"></i>
echo FAS::icon('cog')->pullRight();  // <i class="fas fa-cog pull-right"></i>

// icon size
echo FAS::icon('cog')->size(FAS::SIZE_3X);
// values: FAS::SIZE_LARGE, FAS::SIZE_2X, FAS::SIZE_3X, FAS::SIZE_4X, FAS::SIZE_5X

// icon rotate
echo FAS::icon('cog')->rotate(FAS::ROTATE_90); 
// values: FAS::ROTATE_90, FAS::ROTATE_180, FAS::ROTATE_180

// icon flip
echo FAS::icon('cog')->flip(FAS::FLIP_VERTICAL); 
// values: FAS::FLIP_HORIZONTAL, FAS::FLIP_VERTICAL

// icon with multiple methods
echo FAS::icon('cog')
        ->spin()
        ->fixedWidth()
        ->pullLeft()
        ->size(FAS::SIZE_LARGE);
// <i class="fas fa-cog fa-spin fa-fw pull-left fa-size-lg"></i>

// icons stack
echo FAS::stack()
        ->icon('twitter')
        ->on('square-o');
// <span class="fa-stack">
//   <i class="fas fa-square-o fa-stack-2x"></i>
//   <i class="fas fa-twitter fa-stack-1x"></i>
// </span>

// icons stack with additional attributes
echo FAS::stack(['data-role' => 'stacked-icon'])
     ->on(FAS::Icon('square')->inverse())
     ->icon(FAS::Icon('cog')->spin());
// <span class="fa-stack" data-role="stacked-icon">
//   <i class="fas fa-square-o fa-inverse fa-stack-2x"></i>
//   <i class="fas fa-cog fa-spin fa-stack-1x"></i>
// </span>

// Stacking text and icons
echo FAS::stack()
     ->on(FAS::Icon('square'))
     ->text('1');
// <span class="fa-stack">
//   <i class="fas fa-square fa-stack-2x"></i>
//   <span class="fa-stack-1x">1</span>
// </span>

// Stacking text and icons with options
echo FAS::stack()
     ->on(FAS::Icon('square'))
     ->text('1', ['tag'=>'strong', 'class'=>'stacked-text']);
// <span class="fa-stack">
//   <i class="fas fa-square fa-stack-2x"></i>
//   <strong class="stacked-text fa-stack-1x">1</strong>
// </span>
// Now you can add some css for vertical text positioning:
.stacked-text { margin-top: .3em; }

// unordered list icons 
echo FAS::ul(['data-role' => 'unordered-list'])
     ->item('Bullet item', ['icon' => 'circle'])
     ->item('Checked item', ['icon' => 'check']);
// <ul class="fa-ul" data-role="unordered-list">
//   <li><i class="fas fa-circle fa-li"></i>Bullet item</li>
//   <li><i class="fas fa-check fa-li"></i>Checked Item</li>
// </span>

// autocomplete icons name in IDE
echo FAS::icon(FAS::_COG);
echo FAS::icon(FAS::_DESKTOP);
echo FAS::stack()
     ->on(FAS::_CIRCLE_O)
     ->icon(FAS::_TWITTER);

//duocolor icons
echo FAD::icon(FAD::_ANGLE_DOUBLE_DOWN)->duo(['primary-color' => 'blue'])->swapOpacity();
```

