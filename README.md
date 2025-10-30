## yii2-fontawesome

Font Awesome 5 integration for Yii2. Provides helpers to render icons, stacked icons, and list icons with a fluent PHP API, plus ready-to-use asset bundles (CDN or locally bundled assets). Provided by Marco Curatitoli at HalService. Mantained by Pietro Bardone (p3pp01) at Anteo Impresa Sociale.

### Requirements

- PHP >= 5.4
- Yii2 ~2.0.15

### Installation

Install via Composer:

```bash
composer require anteo/yii2-fontawesome
```

### Assets

You can load Font Awesome either from the official CDN or from the locally bundled assets included in this package.

- CDN (default): `anteo\fontawesome\AssetBundle`
  - Loads `//use.fontawesome.com/releases/v5.13.0/css/all.css` and `v4-shims.css`.

- Local assets: `anteo\fontawesome\AssetBundlePro`
  - Publishes CSS/JS/webfonts from the package `assets/` folder.

Register assets in a view:

```php
\anteo\fontawesome\AssetBundle::register($this);          // CDN
// or
\anteo\fontawesome\AssetBundlePro::register($this);       // Local assets
```

Or add as a dependency in your main `AppAsset`:

```php
public $depends = [
    // ...
    anteo\fontawesome\AssetBundle::class,      // or AssetBundlePro::class
];
```

### Quick start

The main static facade is `anteo\fontawesome\FA` (extends `FontAwesome`). It auto-detects the proper style prefix (solid/regular/brands) based on icon name, with a compatibility matrix for v4/v5 names. You can also use style-specific facades: `FAS` (solid), `FAR` (regular), `FAB` (brands), `FAL` (light, Pro), `FAD` (duotone, Pro).

```php
use anteo\fontawesome\FA;

echo FA::icon('user');                   // auto prefix → <i class="fas fa-user"></i>
echo FA::i('github');                    // brands → <i class="fab fa-github"></i>

// Force a specific family
echo anteo\fontawesome\FAS::icon('cog');
echo anteo\fontawesome\FAR::icon('address-book');
echo anteo\fontawesome\FAB::icon('twitter');
```

Regular icons accept a legacy suffix `_O` (mapped to `far`):

```php
echo FA::icon('address-book_O');         // → <i class="far fa-address-book"></i>
```

### Icon helpers

Returned icon objects are stringable and support a fluent API:

```php
use anteo\fontawesome\FA;

echo FA::icon('cog')
    ->spin()
    ->fixedWidth()
    ->size(FA::SIZE_2X);                 // lg, sm, xs, 2x..10x

echo FA::icon('sync')->pulse();
echo FA::icon('reply')->flip(FA::FLIP_HORIZONTAL);
echo FA::icon('redo')->rotate(FA::ROTATE_90);
```

Supported size constants:

`SIZE_LG, SIZE_SM, SIZE_XS, SIZE_2X, SIZE_3X, SIZE_4X, SIZE_5X, SIZE_6X, SIZE_7X, SIZE_8X, SIZE_9X, SIZE_10X`

Supported transforms:

- rotate: `ROTATE_90, ROTATE_180, ROTATE_270`
- flip: `FLIP_HORIZONTAL, FLIP_VERTICAL`

Additional helpers: `inverse(), border(), pullLeft(), pullRight(), li()`

### Stacked icons

Create stacked icons using `Stack`:

```php
use anteo\fontawesome\FA;

echo FA::stack(null)
    ->on('square')        // background (2x)
    ->icon('flag');       // foreground (1x)
```

You can also place text on top:

```php
echo FA::stack(null)
    ->on('circle')
    ->text('99+', ['class' => 'badge']);
```

### Unordered lists with icons

Render an `<ul>` with list icons using `UnorderedList`:

```php
use anteo\fontawesome\FA;

echo FA::ul(null)
    ->item('First item',  ['icon' => 'check'])
    ->item('Second item', ['icon' => 'times']);
```

### Duotone (Pro)

Duotone requires Font Awesome Pro. Use the `FAD` facade which returns `IconDuo` instances:

```php
use anteo\fontawesome\FAD;

echo FAD::icon('camera')
    ->duo([
        'primary-color' => '#4a90e2',
        'secondary-color' => '#333',
        'primary-opacity' => '0.85',
        'secondary-opacity' => '0.6',
    ])
    ->swapOpacity();
```

Light style (Pro) is available via `FAL`.

### Forcing a style globally

You can force a style globally by setting the static prefix:

```php
anteo\fontawesome\FontAwesome::$cssPrefix = 'fas'; // or 'far', 'fab', 'fal', 'fad'
```

### Version

Bundled assets target Font Awesome 5.13.0.

### License

- This Yii2 extension: BSD-3-Clause (see `composer.json`).
- Font Awesome fonts, CSS/JS, and assets are licensed by their respective owners (see `assets/LICENSE.txt`). Ensure you comply with Font Awesome Free/Pro licensing for your use case.


