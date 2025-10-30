<?php
namespace hal\fontawesome;

use hal\fontawesome\component;

/**
 * Class FA
 * @package hal\fontawesome
 */
class FontAwesome
{
    /**
     * CSS class prefix
     * @var string
     */
    public static $cssPrefix = null;

    /**
     * CSS class prefix
     * @var string
     */
    public static $basePrefix = 'fa';
    
    public static $convertionMatrix = [
        //FA sono le definizioni legacy, non si aggiornano
        'fa' => ['area-chart','arrow-circle-o-down','arrow-circle-o-left','arrow-circle-o-right','arrow-circle-o-up','arrows','arrows-h','arrows-v','asl-interpreting','automobile','bank','bar-chart','bar-chart-o','bathtub','battery','battery-0','battery-1','battery-2','battery-3','battery-4','bitbucket-square','cab','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','cc','chain','chain-broken','circle-o-notch','circle-thin','close','cloud-download','cloud-upload','cny','code-fork','commenting','commenting-o','credit-card-alt','cutlery','dashboard','deafness','dedent','diamond','dollar','drivers-license','drivers-license-o','eercast','eur','euro','exchange','external-link','external-link-square','eyedropper','fa','facebook-official','feed','file-movie-o','file-photo-o','file-picture-o','file-sound-o','file-text','file-text-o','file-zip-o','files-o','flash','floppy-o','gbp','ge','gear','gears','gittip','glass','google-plus-circle','google-plus-official','group','hand-grab-o','hand-o-down','hand-o-left','hand-o-right','hand-o-up','hand-stop-o','hard-of-hearing','header','hourglass-1','hourglass-2','hourglass-3','ils','inr','institution','intersex','jpy','krw','legal','level-down','level-up','life-bouy','life-buoy','life-saver','line-chart','linkedin-square','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','mail-forward','mail-reply','mail-reply-all','meanpath','mobile-phone','money','mortar-board','navicon','pencil','pencil-square','pencil-square-o','photo','picture-o','pie-chart','ra','refresh','remove','reorder','repeat','resistance','rmb','rotate-left','rotate-right','rouble','rub','ruble','rupee','s15','scissors','send','send-o','shekel','sheqel','shield','sign-in','sign-out','signing','sliders','soccer-ball-o','sort-alpha-asc','sort-alpha-desc','sort-amount-asc','sort-amount-desc','sort-asc','sort-desc','sort-numeric-asc','sort-numeric-desc','spoon','star-half-empty','star-half-full','support','tachometer','television','thermometer-0','thermometer-1','thermometer-2','thermometer-3','thermometer-4','thumb-tack','thumbs-o-down','thumbs-o-up','ticket','times-rectangle','times-rectangle-o','toggle-down','toggle-left','toggle-right','toggle-up','trash-o','try','turkish-lira','unsorted','usd','vcard','vcard-o','video-camera','volume-control-phone','warning','wechat','wheelchair-alt','won','yc','yc-square','yen','youtube-play'],
        /*
            var list = "'far' => [";
            jQuery.each(jQuery('#regular div article.icon'), function (i, item) {
                    var icon = item.id;
                    list += "'" + icon + "_O', " 
            });
            list += '],\n';
            list += "'fab' => [";
            jQuery.each(jQuery('#brands div article.icon'), function (i, item) {
                    var icon = item.id;
                    list += "'" + icon + "', " 
            });
            list += '],\n';
            console.log(list);
         */
        'far' => ['address-book_O', 'address-card_O', 'angry_O', 'arrow-alt-circle-down_O', 'arrow-alt-circle-left_O', 'arrow-alt-circle-right_O', 'arrow-alt-circle-up_O', 'bell_O', 'bell-slash_O', 'bookmark_O', 'building_O', 'calendar_O', 'calendar-alt_O', 'calendar-check_O', 'calendar-minus_O', 'calendar-plus_O', 'calendar-times_O', 'caret-square-down_O', 'caret-square-left_O', 'caret-square-right_O', 'caret-square-up_O', 'chart-bar_O', 'check-circle_O', 'check-square_O', 'circle_O', 'clipboard_O', 'clock_O', 'clone_O', 'closed-captioning_O', 'comment_O', 'comment-alt_O', 'comment-dots_O', 'comments_O', 'compass_O', 'copy_O', 'copyright_O', 'credit-card_O', 'dizzy_O', 'dot-circle_O', 'edit_O', 'envelope_O', 'envelope-open_O', 'eye_O', 'eye-slash_O', 'file_O', 'file-alt_O', 'file-archive_O', 'file-audio_O', 'file-code_O', 'file-excel_O', 'file-image_O', 'file-pdf_O', 'file-powerpoint_O', 'file-video_O', 'file-word_O', 'flag_O', 'flushed_O', 'folder_O', 'folder-open_O', 'frown_O', 'frown-open_O', 'futbol_O', 'gem_O', 'grimace_O', 'grin_O', 'grin-alt_O', 'grin-beam_O', 'grin-beam-sweat_O', 'grin-hearts_O', 'grin-squint_O', 'grin-squint-tears_O', 'grin-stars_O', 'grin-tears_O', 'grin-tongue_O', 'grin-tongue-squint_O', 'grin-tongue-wink_O', 'grin-wink_O', 'hand-lizard_O', 'hand-paper_O', 'hand-peace_O', 'hand-point-down_O', 'hand-point-left_O', 'hand-point-right_O', 'hand-point-up_O', 'hand-pointer_O', 'hand-rock_O', 'hand-scissors_O', 'hand-spock_O', 'handshake_O', 'hdd_O', 'heart_O', 'hospital_O', 'hourglass_O', 'id-badge_O', 'id-card_O', 'image_O', 'images_O', 'keyboard_O', 'kiss_O', 'kiss-beam_O', 'kiss-wink-heart_O', 'laugh_O', 'laugh-beam_O', 'laugh-squint_O', 'laugh-wink_O', 'lemon_O', 'life-ring_O', 'lightbulb_O', 'list-alt_O', 'map_O', 'meh_O', 'meh-blank_O', 'meh-rolling-eyes_O', 'minus-square_O', 'money-bill-alt_O', 'moon_O', 'newspaper_O', 'object-group_O', 'object-ungroup_O', 'paper-plane_O', 'pause-circle_O', 'play-circle_O', 'plus-square_O', 'question-circle_O', 'registered_O', 'sad-cry_O', 'sad-tear_O', 'save_O', 'share-square_O', 'smile_O', 'smile-beam_O', 'smile-wink_O', 'snowflake_O', 'square_O', 'star_O', 'star-half_O', 'sticky-note_O', 'stop-circle_O', 'sun_O', 'surprise_O', 'thumbs-down_O', 'thumbs-up_O', 'times-circle_O', 'tired_O', 'trash-alt_O', 'user_O', 'user-circle_O', 'window-close_O', 'window-maximize_O', 'window-minimize_O', 'window-restore_O'],
        'fab' => ['500px', 'accessible-icon', 'accusoft', 'acquisitions-incorporated', 'adn', 'adobe', 'adversal', 'affiliatetheme', 'airbnb', 'algolia', 'alipay', 'amazon', 'amazon-pay', 'amilia', 'android', 'angellist', 'angrycreative', 'angular', 'app-store', 'app-store-ios', 'apper', 'apple', 'apple-pay', 'artstation', 'asymmetrik', 'atlassian', 'audible', 'autoprefixer', 'avianex', 'aviato', 'aws', 'bandcamp', 'battle-net', 'behance', 'behance-square', 'bimobject', 'bitbucket', 'bitcoin', 'bity', 'black-tie', 'blackberry', 'blogger', 'blogger-b', 'bluetooth', 'bluetooth-b', 'bootstrap', 'btc', 'buffer', 'buromobelexperte', 'buy-n-large', 'buysellads', 'canadian-maple-leaf', 'cc-amazon-pay', 'cc-amex', 'cc-apple-pay', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'centercode', 'centos', 'chrome', 'chromecast', 'cloudscale', 'cloudsmith', 'cloudversify', 'codepen', 'codiepie', 'confluence', 'connectdevelop', 'contao', 'cotton-bureau', 'cpanel', 'creative-commons', 'creative-commons-by', 'creative-commons-nc', 'creative-commons-nc-eu', 'creative-commons-nc-jp', 'creative-commons-nd', 'creative-commons-pd', 'creative-commons-pd-alt', 'creative-commons-remix', 'creative-commons-sa', 'creative-commons-sampling', 'creative-commons-sampling-plus', 'creative-commons-share', 'creative-commons-zero', 'critical-role', 'css3', 'css3-alt', 'cuttlefish', 'd-and-d', 'd-and-d-beyond', 'dailymotion', 'dashcube', 'delicious', 'deploydog', 'deskpro', 'dev', 'deviantart', 'dhl', 'diaspora', 'digg', 'digital-ocean', 'discord', 'discourse', 'dochub', 'docker', 'draft2digital', 'dribbble', 'dribbble-square', 'dropbox', 'drupal', 'dyalog', 'earlybirds', 'ebay', 'edge', 'elementor', 'ello', 'ember', 'empire', 'envira', 'erlang', 'ethereum', 'etsy', 'evernote', 'expeditedssl', 'facebook', 'facebook-f', 'facebook-messenger', 'facebook-square', 'fantasy-flight-games', 'fedex', 'fedora', 'figma', 'firefox', 'firefox-browser', 'first-order', 'first-order-alt', 'firstdraft', 'flickr', 'flipboard', 'fly', 'font-awesome', 'font-awesome-alt', 'font-awesome-flag', 'fonticons', 'fonticons-fi', 'fort-awesome', 'fort-awesome-alt', 'forumbee', 'foursquare', 'free-code-camp', 'freebsd', 'fulcrum', 'galactic-republic', 'galactic-senate', 'get-pocket', 'gg', 'gg-circle', 'git', 'git-alt', 'git-square', 'github', 'github-alt', 'github-square', 'gitkraken', 'gitlab', 'gitter', 'glide', 'glide-g', 'gofore', 'goodreads', 'goodreads-g', 'google', 'google-drive', 'google-play', 'google-plus', 'google-plus-g', 'google-plus-square', 'google-wallet', 'gratipay', 'grav', 'gripfire', 'grunt', 'gulp', 'hacker-news', 'hacker-news-square', 'hackerrank', 'hips', 'hire-a-helper', 'hooli', 'hornbill', 'hotjar', 'houzz', 'html5', 'hubspot', 'ideal', 'imdb', 'instagram', 'instagram-square', 'intercom', 'internet-explorer', 'invision', 'ioxhost', 'itch-io', 'itunes', 'itunes-note', 'java', 'jedi-order', 'jenkins', 'jira', 'joget', 'joomla', 'js', 'js-square', 'jsfiddle', 'kaggle', 'keybase', 'keycdn', 'kickstarter', 'kickstarter-k', 'korvue', 'laravel', 'lastfm', 'lastfm-square', 'leanpub', 'less', 'line', 'linkedin', 'linkedin-in', 'linode', 'linux', 'lyft', 'magento', 'mailchimp', 'mandalorian', 'markdown', 'mastodon', 'maxcdn', 'mdb', 'medapps', 'medium', 'medium-m', 'medrt', 'meetup', 'megaport', 'mendeley', 'microblog', 'microsoft', 'mix', 'mixcloud', 'mixer', 'mizuni', 'modx', 'monero', 'napster', 'neos', 'nimblr', 'node', 'node-js', 'npm', 'ns8', 'nutritionix', 'odnoklassniki', 'odnoklassniki-square', 'old-republic', 'opencart', 'openid', 'opera', 'optin-monster', 'orcid', 'osi', 'page4', 'pagelines', 'palfed', 'patreon', 'paypal', 'penny-arcade', 'periscope', 'phabricator', 'phoenix-framework', 'phoenix-squadron', 'php', 'pied-piper', 'pied-piper-alt', 'pied-piper-hat', 'pied-piper-pp', 'pied-piper-square', 'pinterest', 'pinterest-p', 'pinterest-square', 'playstation', 'product-hunt', 'pushed', 'python', 'qq', 'quinscape', 'quora', 'r-project', 'raspberry-pi', 'ravelry', 'react', 'reacteurope', 'readme', 'rebel', 'red-river', 'reddit', 'reddit-alien', 'reddit-square', 'redhat', 'renren', 'replyd', 'researchgate', 'resolving', 'rev', 'rocketchat', 'rockrms', 'safari', 'salesforce', 'sass', 'schlix', 'scribd', 'searchengin', 'sellcast', 'sellsy', 'servicestack', 'shirtsinbulk', 'shopify', 'shopware', 'simplybuilt', 'sistrix', 'sith', 'sketch', 'skyatlas', 'skype', 'slack', 'slack-hash', 'slideshare', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'soundcloud', 'sourcetree', 'speakap', 'speaker-deck', 'spotify', 'squarespace', 'stack-exchange', 'stack-overflow', 'stackpath', 'staylinked', 'steam', 'steam-square', 'steam-symbol', 'sticker-mule', 'strava', 'stripe', 'stripe-s', 'studiovinari', 'stumbleupon', 'stumbleupon-circle', 'superpowers', 'supple', 'suse', 'swift', 'symfony', 'teamspeak', 'telegram', 'telegram-plane', 'tencent-weibo', 'the-red-yeti', 'themeco', 'themeisle', 'think-peaks', 'trade-federation', 'trello', 'tripadvisor', 'tumblr', 'tumblr-square', 'twitch', 'twitter', 'twitter-square', 'typo3', 'uber', 'ubuntu', 'uikit', 'umbraco', 'uniregistry', 'unity', 'untappd', 'ups', 'usb', 'usps', 'ussunnah', 'vaadin', 'viacoin', 'viadeo', 'viadeo-square', 'viber', 'vimeo', 'vimeo-square', 'vimeo-v', 'vine', 'vk', 'vnv', 'vuejs', 'waze', 'weebly', 'weibo', 'weixin', 'whatsapp', 'whatsapp-square', 'whmcs', 'wikipedia-w', 'windows', 'wix', 'wizards-of-the-coast', 'wolf-pack-battalion', 'wordpress', 'wordpress-simple', 'wpbeginner', 'wpexplorer', 'wpforms', 'wpressr', 'xbox', 'xing', 'xing-square', 'y-combinator', 'yahoo', 'yammer', 'yandex', 'yandex-international', 'yarn', 'yelp', 'yoast', 'youtube', 'youtube-square', 'zhihu'],
    ];

    /**
     * Creates an `Icon` component that can be used to FontAwesome html icon
     *
     * @param string $name
     * @param array $options
     * @return components\Icon
     */
    public static function icon($name, $options = [])
    {
        $prefix = (static::$cssPrefix !== null) ? static::$cssPrefix : static::getPrefix($name);
        if ($prefix === 'far') {
            $name = preg_replace('/_O$/', "", $name);
        }
        return new components\Icon($prefix, $name, $options);
    }
    
    /**
     * Shortcut for `icon()` method
     * @see icon()
     *
     * @param string $name
     * @param array $options
     * @return components\Icon
     */
    public static function i($name, $options = [])
    {
        return static::icon($name, $options);
    }
    
    /**
     * Creates an `Stack` component that can be used to FontAwesome html icon
     *
     * @param       $name
     * @param array $options
     * @return components\Stack
     */
    public static function stack($name, $options = [])
    {
        $prefix = (static::$cssPrefix !== null) ? static::$cssPrefix : static::getPrefix($name);
        if ($prefix === 'far') {
            $name = preg_replace('/_O$/', "", $name);
        }        
        return new components\Stack($prefix, $options);
    }
    
    /**
     * Shortcut for `stack()` method
     *
     * @param       $name
     * @param array $options
     * @return components\Stack
     * @see stack()
     */
    public static function s($name, $options = [])
    {
        return static::stack($name, $options);
    }
    
    /**
     * @param       $name
     * @param array $options
     * @return components\UnorderedList
     */
    public static function ul($name, $options = [])
    {
        $prefix = (static::$cssPrefix !== null) ? static::$cssPrefix : static::getPrefix($name);
        if ($prefix === 'far') {
            $name = preg_replace('/_O$/', "", $name);
        }         
        return new components\UnorderedList($prefix, $options);
    }
    
    /**
     * @param $name
     * @return int|string
     */
    protected static function getPrefix($name)
    {
        foreach (static::$convertionMatrix as $prefix => $list) {
            if (in_array($name, $list)) {
                return $prefix;
            }
        }
        return 'fas';
    }

    /**
     * Size values
     * @see components\Icon::size
     */
    const SIZE_LARGE = 'lg';
    const SIZE_LG = 'lg';
    const SIZE_SMALL = 'sm';
    const SIZE_SM = 'sm';
    const SIZE_EXTRA_SMALL = 'xs';
    const SIZE_XS = 'xs';
    const SIZE_2X = '2x';
    const SIZE_3X = '3x';
    const SIZE_4X = '4x';
    const SIZE_5X = '5x';
    const SIZE_6X = '6x';
    const SIZE_7X = '7x';
    const SIZE_8X = '8x';
    const SIZE_9X = '9x';
    const SIZE_10X = '10x';

    /**
     * Rotate values
     * @see components\Icon::rotate
     */
    const ROTATE_90 = '90';
    const ROTATE_180 = '180';
    const ROTATE_270 = '270';

    /**
     * Flip values
     * @see components\Icon::flip
     */
    const FLIP_HORIZONTAL = 'horizontal';
    const FLIP_VERTICAL = 'vertical';

}


