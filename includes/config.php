<?php
/**
 * Define the shortcode parameters
 */


// Post titles

$post_title = array();
$args=array('order'=>'ASC','posts_per_page'	=>	1000,);
$posts = get_posts( $args );
if ( $posts ) {
foreach ( $posts as $post ) {
   $post_title[$post->post_title] = $post->post_title;
}
}


// Icons

$curiosity_shortcode_icons = array(
				'' => '',
				'glass' => 'glass',
				'music' => 'music',
				'search' => 'search',
				'envelope-o' => 'envelope-o',
				'heart' => 'heart',
				'star' => 'star',
				'star-o' => 'star-o',
				'user' => 'user',
				'film' => 'film',
				'th-large' => 'th-large',
				'th' => 'th',
				'th-list' => 'th-list',
				'check' => 'check',
				'times' => 'times',
				'search-plus' => 'search-plus',
				'search-minus' => 'search-minus',
				'power-off' => 'power-off',
				'signal' => 'signal',
				'cog' => 'cog',
				'trash-o' => 'trash-o',
				'home' => 'home',
				'file-o' => 'file-o',
				'clock-o' => 'clock-o',
				'road' => 'road',
				'download' => 'download',
				'arrow-circle-o-down' => 'arrow-circle-o-down',
				'arrow-circle-o-up' => 'arrow-circle-o-up',
				'inbox' => 'inbox',
				'play-circle-o' => 'play-circle-o',
				'repeat' => 'repeat',
				'refresh' => 'refresh',
				'list-alt' => 'list-alt',
				'lock' => 'lock',
				'flag' => 'flag',
				'headphones' => 'headphones',
				'volume-off' => 'volume-off',
				'volume-down' => 'volume-down',
				'volume-up' => 'volume-up',
				'qrcode' => 'qrcode',
				'barcode' => 'barcode',
				'tag' => 'tag',
				'tags' => 'tags',
				'book' => 'book',
				'bookmark' => 'bookmark',
				'print' => 'print',
				'camera' => 'camera',
				'font' => 'font',
				'bold' => 'bold',
				'italic' => 'italic',
				'text-height' => 'text-height',
				'text-width' => 'text-width',
				'align-left' => 'align-left',
				'align-center' => 'align-center',
				'align-right' => 'align-right',
				'align-justify' => 'align-justify',
				'list' => 'list',
				'outdent' => 'outdent',
				'indent' => 'indent',
				'video-camera' => 'video-camera',
				'picture-o' => 'picture-o',
				'pencil' => 'pencil',
				'map-marker' => 'map-marker',
				'adjust' => 'adjust',
				'tint' => 'tint',
				'pencil-square-o' => 'pencil-square-o',
				'share-square-o' => 'share-square-o',
				'check-square-o' => 'check-square-o',
				'arrows' => 'arrows',
				'step-backward' => 'step-backward',
				'fast-backward' => 'fast-backward',
				'backward' => 'backward',
				'play' => 'play',
				'pause' => 'pause',
				'stop' => 'stop',
				'forward' => 'forward',
				'fast-forward' => 'fast-forward',
				'step-forward' => 'step-forward',
				'eject' => 'eject',
				'chevron-left' => 'chevron-left',
				'chevron-right' => 'chevron-right',
				'plus-circle' => 'plus-circle',
				'minus-circle' => 'minus-circle',
				'times-circle' => 'times-circle',
				'check-circle' => 'check-circle',
				'question-circle' => 'question-circle',
				'info-circle' => 'info-circle',
				'crosshairs' => 'crosshairs',
				'times-circle-o' => 'times-circle-o',
				'check-circle-o' => 'check-circle-o',
				'ban' => 'ban',
				'arrow-left' => 'arrow-left',
				'arrow-right' => 'arrow-right',
				'arrow-up' => 'arrow-up',
				'arrow-down' => 'arrow-down',
				'share' => 'share',
				'expand' => 'expand',
				'compress' => 'compress',
				'plus' => 'plus',
				'minus' => 'minus',
				'asterisk' => 'asterisk',
				'exclamation-circle' => 'exclamation-circle',
				'gift' => 'gift',
				'leaf' => 'leaf',
				'fire' => 'fire',
				'eye' => 'eye',
				'eye-slash' => 'eye-slash',
				'exclamation-triangle' => 'exclamation-triangle',
				'plane' => 'plane',
				'calendar' => 'calendar',
				'random' => 'random',
				'comment' => 'comment',
				'magnet' => 'magnet',
				'chevron-up' => 'chevron-up',
				'chevron-down' => 'chevron-down',
				'retweet' => 'retweet',
				'shopping-cart' => 'shopping-cart',
				'folder' => 'folder',
				'folder-open' => 'folder-open',
				'arrows-v' => 'arrows-v',
				'arrows-h' => 'arrows-h',
				'bar-chart' => 'bar-chart',
				'twitter-square' => 'twitter-square',
				'facebook-square' => 'facebook-square',
				'camera-retro' => 'camera-retro',
				'key' => 'key',
				'cogs' => 'cogs',
				'comments' => 'comments',
				'thumbs-o-up' => 'thumbs-o-up',
				'thumbs-o-down' => 'thumbs-o-down',
				'star-half' => 'star-half',
				'heart-o' => 'heart-o',
				'sign-out' => 'sign-out',
				'linkedin-square' => 'linkedin-square',
				'thumb-tack' => 'thumb-tack',
				'external-link' => 'external-link',
				'sign-in' => 'sign-in',
				'trophy' => 'trophy',
				'github-square' => 'github-square',
				'upload' => 'upload',
				'lemon-o' => 'lemon-o',
				'phone' => 'phone',
				'square-o' => 'square-o',
				'bookmark-o' => 'bookmark-o',
				'phone-square' => 'phone-square',
				'twitter' => 'twitter',
				'facebook' => 'facebook',
				'github' => 'github',
				'unlock' => 'unlock',
				'credit-card' => 'credit-card',
				'rss' => 'rss',
				'hdd-o' => 'hdd-o',
				'bullhorn' => 'bullhorn',
				'bell' => 'bell',
				'certificate' => 'certificate',
				'hand-o-right' => 'hand-o-right',
				'hand-o-left' => 'hand-o-left',
				'hand-o-up' => 'hand-o-up',
				'hand-o-down' => 'hand-o-down',
				'arrow-circle-left' => 'arrow-circle-left',
				'arrow-circle-right' => 'arrow-circle-right',
				'arrow-circle-up' => 'arrow-circle-up',
				'arrow-circle-down' => 'arrow-circle-down',
				'globe' => 'globe',
				'wrench' => 'wrench',
				'tasks' => 'tasks',
				'filter' => 'filter',
				'briefcase' => 'briefcase',
				'arrows-alt' => 'arrows-alt',
				'users' => 'users',
				'link' => 'link',
				'cloud' => 'cloud',
				'flask' => 'flask',
				'scissors' => 'scissors',
				'files-o' => 'files-o',
				'paperclip' => 'paperclip',
				'floppy-o' => 'floppy-o',
				'square' => 'square',
				'bars' => 'bars',
				'list-ul' => 'list-ul',
				'list-ol' => 'list-ol',
				'strikethrough' => 'strikethrough',
				'underline' => 'underline',
				'table' => 'table',
				'magic' => 'magic',
				'truck' => 'truck',
				'pinterest' => 'pinterest',
				'pinterest-square' => 'pinterest-square',
				'google-plus-square' => 'google-plus-square',
				'google-plus' => 'google-plus',
				'money' => 'money',
				'caret-down' => 'caret-down',
				'caret-up' => 'caret-up',
				'caret-left' => 'caret-left',
				'caret-right' => 'caret-right',
				'columns' => 'columns',
				'sort' => 'sort',
				'sort-desc' => 'sort-desc',
				'sort-asc' => 'sort-asc',
				'envelope' => 'envelope',
				'linkedin' => 'linkedin',
				'undo' => 'undo',
				'gavel' => 'gavel',
				'tachometer' => 'tachometer',
				'comment-o' => 'comment-o',
				'comments-o' => 'comments-o',
				'bolt' => 'bolt',
				'sitemap' => 'sitemap',
				'umbrella' => 'umbrella',
				'clipboard' => 'clipboard',
				'lightbulb-o' => 'lightbulb-o',
				'exchange' => 'exchange',
				'cloud-download' => 'cloud-download',
				'cloud-upload' => 'cloud-upload',
				'user-md' => 'user-md',
				'stethoscope' => 'stethoscope',
				'suitcase' => 'suitcase',
				'bell-o' => 'bell-o',
				'coffee' => 'coffee',
				'cutlery' => 'cutlery',
				'file-text-o' => 'file-text-o',
				'building-o' => 'building-o',
				'hospital-o' => 'hospital-o',
				'ambulance' => 'ambulance',
				'medkit' => 'medkit',
				'fighter-jet' => 'fighter-jet',
				'beer' => 'beer',
				'h-square' => 'h-square',
				'plus-square' => 'plus-square',
				'angle-double-left' => 'angle-double-left',
				'angle-double-right' => 'angle-double-right',
				'angle-double-up' => 'angle-double-up',
				'angle-double-down' => 'angle-double-down',
				'angle-left' => 'angle-left',
				'angle-right' => 'angle-right',
				'angle-up' => 'angle-up',
				'angle-down' => 'angle-down',
				'desktop' => 'desktop',
				'laptop' => 'laptop',
				'tablet' => 'tablet',
				'mobile' => 'mobile',
				'circle-o' => 'circle-o',
				'quote-left' => 'quote-left',
				'quote-right' => 'quote-right',
				'spinner' => 'spinner',
				'circle' => 'circle',
				'reply' => 'reply',
				'github-alt' => 'github-alt',
				'folder-o' => 'folder-o',
				'folder-open-o' => 'folder-open-o',
				'smile-o' => 'smile-o',
				'frown-o' => 'frown-o',
				'meh-o' => 'meh-o',
				'gamepad' => 'gamepad',
				'keyboard-o' => 'keyboard-o',
				'flag-o' => 'flag-o',
				'flag-checkered' => 'flag-checkered',
				'terminal' => 'terminal',
				'code' => 'code',
				'reply-all' => 'reply-all',
				'star-half-o' => 'star-half-o',
				'location-arrow' => 'location-arrow',
				'crop' => 'crop',
				'code-fork' => 'code-fork',
				'chain-broken' => 'chain-broken',
				'question' => 'question',
				'info' => 'info',
				'exclamation' => 'exclamation',
				'superscript' => 'superscript',
				'subscript' => 'subscript',
				'eraser' => 'eraser',
				'puzzle-piece' => 'puzzle-piece',
				'microphone' => 'microphone',
				'microphone-slash' => 'microphone-slash',
				'shield' => 'shield',
				'calendar-o' => 'calendar-o',
				'fire-extinguisher' => 'fire-extinguisher',
				'rocket' => 'rocket',
				'maxcdn' => 'maxcdn',
				'chevron-circle-left' => 'chevron-circle-left',
				'chevron-circle-right' => 'chevron-circle-right',
				'chevron-circle-up' => 'chevron-circle-up',
				'chevron-circle-down' => 'chevron-circle-down',
				'html5' => 'html5',
				'css3' => 'css3',
				'anchor' => 'anchor',
				'unlock-alt' => 'unlock-alt',
				'bullseye' => 'bullseye',
				'ellipsis-h' => 'ellipsis-h',
				'ellipsis-v' => 'ellipsis-v',
				'rss-square' => 'rss-square',
				'play-circle' => 'play-circle',
				'ticket' => 'ticket',
				'minus-square' => 'minus-square',
				'minus-square-o' => 'minus-square-o',
				'level-up' => 'level-up',
				'level-down' => 'level-down',
				'check-square' => 'check-square',
				'pencil-square' => 'pencil-square',
				'external-link-square' => 'external-link-square',
				'share-square' => 'share-square',
				'compass' => 'compass',
				'caret-square-o-down' => 'caret-square-o-down',
				'caret-square-o-up' => 'caret-square-o-up',
				'caret-square-o-right' => 'caret-square-o-right',
				'eur' => 'eur',
				'gbp' => 'gbp',
				'usd' => 'usd',
				'inr' => 'inr',
				'jpy' => 'jpy',
				'rub' => 'rub',
				'krw' => 'krw',
				'btc' => 'btc',
				'file' => 'file',
				'file-text' => 'file-text',
				'sort-alpha-asc' => 'sort-alpha-asc',
				'sort-alpha-desc' => 'sort-alpha-desc',
				'sort-amount-asc' => 'sort-amount-asc',
				'sort-amount-desc' => 'sort-amount-desc',
				'sort-numeric-asc' => 'sort-numeric-asc',
				'sort-numeric-desc' => 'sort-numeric-desc',
				'thumbs-up' => 'thumbs-up',
				'thumbs-down' => 'thumbs-down',
				'youtube-square' => 'youtube-square',
				'youtube' => 'youtube',
				'xing' => 'xing',
				'xing-square' => 'xing-square',
				'youtube-play' => 'youtube-play',
				'dropbox' => 'dropbox',
				'stack-overflow' => 'stack-overflow',
				'instagram' => 'instagram',
				'flickr' => 'flickr',
				'adn' => 'adn',
				'bitbucket' => 'bitbucket',
				'bitbucket-square' => 'bitbucket-square',
				'tumblr' => 'tumblr',
				'tumblr-square' => 'tumblr-square',
				'long-arrow-down' => 'long-arrow-down',
				'long-arrow-up' => 'long-arrow-up',
				'long-arrow-left' => 'long-arrow-left',
				'long-arrow-right' => 'long-arrow-right',
				'apple' => 'apple',
				'windows' => 'windows',
				'android' => 'android',
				'linux' => 'linux',
				'dribbble' => 'dribbble',
				'skype' => 'skype',
				'foursquare' => 'foursquare',
				'trello' => 'trello',
				'female' => 'female',
				'male' => 'male',
				'gratipay' => 'gratipay',
				'sun-o' => 'sun-o',
				'moon-o' => 'moon-o',
				'archive' => 'archive',
				'bug' => 'bug',
				'vk' => 'vk',
				'weibo' => 'weibo',
				'renren' => 'renren',
				'pagelines' => 'pagelines',
				'stack-exchange' => 'stack-exchange',
				'arrow-circle-o-right' => 'arrow-circle-o-right',
				'arrow-circle-o-left' => 'arrow-circle-o-left',
				'caret-square-o-left' => 'caret-square-o-left',
				'dot-circle-o' => 'dot-circle-o',
				'wheelchair' => 'wheelchair',
				'vimeo-square' => 'vimeo-square',
				'try' => 'try',
				'plus-square-o' => 'plus-square-o',
				'space-shuttle' => 'space-shuttle',
				'slack' => 'slack',
				'envelope-square' => 'envelope-square',
				'wordpress' => 'wordpress',
				'openid' => 'openid',
				'university' => 'university',
				'graduation-cap' => 'graduation-cap',
				'yahoo' => 'yahoo',
				'google' => 'google',
				'reddit' => 'reddit',
				'reddit-square' => 'reddit-square',
				'stumbleupon-circle' => 'stumbleupon-circle',
				'stumbleupon' => 'stumbleupon',
				'delicious' => 'delicious',
				'digg' => 'digg',
				'pied-piper' => 'pied-piper',
				'pied-piper-alt' => 'pied-piper-alt',
				'drupal' => 'drupal',
				'joomla' => 'joomla',
				'language' => 'language',
				'fax' => 'fax',
				'building' => 'building',
				'child' => 'child',
				'paw' => 'paw',
				'spoon' => 'spoon',
				'cube' => 'cube',
				'cubes' => 'cubes',
				'behance' => 'behance',
				'behance-square' => 'behance-square',
				'steam' => 'steam',
				'steam-square' => 'steam-square',
				'recycle' => 'recycle',
				'car' => 'car',
				'taxi' => 'taxi',
				'tree' => 'tree',
				'spotify' => 'spotify',
				'deviantart' => 'deviantart',
				'soundcloud' => 'soundcloud',
				'database' => 'database',
				'file-pdf-o' => 'file-pdf-o',
				'file-word-o' => 'file-word-o',
				'file-excel-o' => 'file-excel-o',
				'file-powerpoint-o' => 'file-powerpoint-o',
				'file-image-o' => 'file-image-o',
				'file-archive-o' => 'file-archive-o',
				'file-audio-o' => 'file-audio-o',
				'file-video-o' => 'file-video-o',
				'file-code-o' => 'file-code-o',
				'vine' => 'vine',
				'codepen' => 'codepen',
				'jsfiddle' => 'jsfiddle',
				'life-ring' => 'life-ring',
				'circle-o-notch' => 'circle-o-notch',
				'rebel' => 'rebel',
				'empire' => 'empire',
				'git-square' => 'git-square',
				'git' => 'git',
				'hacker-news' => 'hacker-news',
				'tencent-weibo' => 'tencent-weibo',
				'qq' => 'qq',
				'weixin' => 'weixin',
				'paper-plane' => 'paper-plane',
				'paper-plane-o' => 'paper-plane-o',
				'history' => 'history',
				'circle-thin' => 'circle-thin',
				'header' => 'header',
				'paragraph' => 'paragraph',
				'sliders' => 'sliders',
				'share-alt' => 'share-alt',
				'share-alt-square' => 'share-alt-square',
				'bomb' => 'bomb',
				'futbol-o' => 'futbol-o',
				'tty' => 'tty',
				'binoculars' => 'binoculars',
				'plug' => 'plug',
				'slideshare' => 'slideshare',
				'twitch' => 'twitch',
				'yelp' => 'yelp',
				'newspaper-o' => 'newspaper-o',
				'wifi' => 'wifi',
				'calculator' => 'calculator',
				'paypal' => 'paypal',
				'google-wallet' => 'google-wallet',
				'cc-visa' => 'cc-visa',
				'cc-mastercard' => 'cc-mastercard',
				'cc-discover' => 'cc-discover',
				'cc-amex' => 'cc-amex',
				'cc-paypal' => 'cc-paypal',
				'cc-stripe' => 'cc-stripe',
				'bell-slash' => 'bell-slash',
				'bell-slash-o' => 'bell-slash-o',
				'trash' => 'trash',
				'copyright' => 'copyright',
				'at' => 'at',
				'eyedropper' => 'eyedropper',
				'paint-brush' => 'paint-brush',
				'birthday-cake' => 'birthday-cake',
				'area-chart' => 'area-chart',
				'pie-chart' => 'pie-chart',
				'line-chart' => 'line-chart',
				'lastfm' => 'lastfm',
				'lastfm-square' => 'lastfm-square',
				'toggle-off' => 'toggle-off',
				'toggle-on' => 'toggle-on',
				'bicycle' => 'bicycle',
				'bus' => 'bus',
				'ioxhost' => 'ioxhost',
				'angellist' => 'angellist',
				'cc' => 'cc',
				'ils' => 'ils',
				'meanpath' => 'meanpath',
				'buysellads' => 'buysellads',
				'connectdevelop' => 'connectdevelop',
				'dashcube' => 'dashcube',
				'forumbee' => 'forumbee',
				'leanpub' => 'leanpub',
				'sellsy' => 'sellsy',
				'shirtsinbulk' => 'shirtsinbulk',
				'simplybuilt' => 'simplybuilt',
				'skyatlas' => 'skyatlas',
				'cart-plus' => 'cart-plus',
				'cart-arrow-down' => 'cart-arrow-down',
				'diamond' => 'diamond',
				'ship' => 'ship',
				'user-secret' => 'user-secret',
				'motorcycle' => 'motorcycle',
				'street-view' => 'street-view',
				'heartbeat' => 'heartbeat',
				'venus' => 'venus',
				'mars' => 'mars',
				'mercury' => 'mercury',
				'transgender' => 'transgender',
				'transgender-alt' => 'transgender-alt',
				'venus-double' => 'venus-double',
				'mars-double' => 'mars-double',
				'venus-mars' => 'venus-mars',
				'mars-stroke' => 'mars-stroke',
				'mars-stroke-v' => 'mars-stroke-v',
				'mars-stroke-h' => 'mars-stroke-h',
				'neuter' => 'neuter',
				'facebook-official' => 'facebook-official',
				'pinterest-p' => 'pinterest-p',
				'whatsapp' => 'whatsapp',
				'server' => 'server',
				'user-plus' => 'user-plus',
				'user-times' => 'user-times',
				'bed' => 'bed',
				'viacoin' => 'viacoin',
				'train' => 'train',
				'subway' => 'subway'
			);


/* Columns --- */

$curiosity_shortcodes['column'] = array(
	'title' => __('Columns', 'curiosity'),
	'id' => 'curiosity-column-shortcode',
	'template' => '[column {{attributes}}]{{content}}[/column]',
	'params' => array(
		'size' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Size', 'curiosity'),
			'desc' => __('Set the size of the column (1 is the smallest, 12 is fullwidth).', 'curiosity'),
			'options' => array(
				'1' => __('1', 'curiosity'),
				'2' => __('2', 'curiosity'),
				'3' => __('3', 'curiosity'),
				'4' => __('4', 'curiosity'),
				'5' => __('5', 'curiosity'),
				'6' => __('6', 'curiosity'),
				'7' => __('7', 'curiosity'),
				'8' => __('8', 'curiosity'),
				'9' => __('9', 'curiosity'),
				'10' => __('10', 'curiosity'),
				'11' => __('11', 'curiosity'),
				'12' => __('12', 'curiosity'),
			)
		),
		'last' => array(
			'type' => 'checkbox',
			'label' => __('Last column', 'curiosity'),
			'desc' => __('Set whether this is the last column.', 'curiosity'),
			'default' => false
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		),
	)
);

/* Align --- */

$curiosity_shortcodes['align'] = array(
	'title' => __('Align', 'curiosity'),
	'id' => 'curiosity-align-shortcode',
	'template' => '[align {{attributes}}]{{content}}[/align]',
	'params' => array(
		'align' => array(
			'std' => 'left',
			'type' => 'select',
			'label' => __('Align', 'curiosity'),
			'desc' => __('Set the align.', 'curiosity'),
			'options' => array(
				'left' => __('left', 'curiosity'),
				'right' => __('right', 'curiosity'),
				'center' => __('center', 'curiosity'),
				'justify' => __('justify', 'curiosity'),
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		),
	)
);

/* Highlight --- */

$curiosity_shortcodes['highlight'] = array(
	'title' => __('Highlight', 'curiosity'),
	'id' => 'curiosity-highlight-shortcode',
	'template' => '[highlight {{attributes}}]{{content}}[/highlight]',
	'params' => array(
		'style' => array(
			'std' => 'left',
			'type' => 'select',
			'label' => __('Style', 'curiosity'),
			'desc' => __('Select one from the styles.', 'curiosity'),
			'options' => array(
				'1' => __('1', 'curiosity'),
				'2' => __('2', 'curiosity'),
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		),
	)
);

/* Br --- */

$curiosity_shortcodes['br'] = array(
	'title' => __('Break', 'curiosity'),
	'id' => 'curiosity-br-shortcode',
	'template' => '[br]',
	'params' => array(

	)
);

/* Clear --- */

$curiosity_shortcodes['clear'] = array(
	'title' => __('Clear', 'curiosity'),
	'id' => 'curiosity-clear-shortcode',
	'template' => '[clear]',
	'params' => array(
	)
);

/* Spacer --- */

$curiosity_shortcodes['spacer'] = array(
	'title' => __('Spacer', 'curiosity'),
	'id' => 'curiosity-spacer-shortcode',
	'template' => '[spacer {{attributes}}]',
	'params' => array(
		'height' => array(
			'std' => '30',
			'type' => 'text',
			'label' => __('Height', 'curiosity'),
			'desc' => __('Spacer`s height (px).', 'curiosity'),
		),
	)
);

/* Separator --- */

$curiosity_shortcodes['separator'] = array(
	'title' => __('Separator', 'curiosity'),
	'id' => 'curiosity-separator-shortcode',
	'template' => '[separator]',
	'params' => array(
	)
);

/* Heading --- */

$curiosity_shortcodes['heading'] = array(
	'title' => __('Heading', 'curiosity'),
	'id' => 'curiosity-heading-shortcode',
	'template' => '[heading {{attributes}}]{{content}}[/heading]',
	'params' => array(
		'h' => array(
			'std' => 'h2',
			'type' => 'select',
			'label' => __('Size', 'curiosity'),
			'desc' => __('Select the font size.', 'curiosity'),
			'options' => array(
				'h1' => __('h1', 'curiosity'),
				'h2' => __('h2', 'curiosity'),
				'h3' => __('h3', 'curiosity'),
				'h4' => __('h4', 'curiosity'),
				'h5' => __('h5', 'curiosity'),
				'h6' => __('h6', 'curiosity')
			)
		),
		'content' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Title', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		)
	)
);

/* Dropcap --- */

$curiosity_shortcodes['dropcap'] = array(
	'title' => __('Dropcap', 'curiosity'),
	'id' => 'curiosity-dropcap-shortcode',
	'template' => '[dropcap]{{content}}[/dropcap]',
	'params' => array(
		'content' => array(
			'std' => 'Content',
			'type' => 'text',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		)
	)
);

/* Map --- */

$curiosity_shortcodes['map'] = array(
	'title' => __('Map', 'curiosity'),
	'id' => 'curiosity-map-shortcode',
	'template' => '[map]{{content}}[/map]',
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Code', 'curiosity'),
			'desc' => __('Add the iframe code from Google Map.', 'curiosity'),
		)
	)
);

/* Blockquote --- */

$curiosity_shortcodes['blockquote'] = array(
	'title' => __('Blockquote', 'curiosity'),
	'id' => 'curiosity-blockquote-shortcode',
	'template' => '[blockquote {{attributes}}]{{content}}[/blockquote]',
	'params' => array(
		'author' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Author', 'curiosity'),
			'desc' => __('Add the author.', 'curiosity'),
		),
		'style' => array(
			'std' => '1',
			'type' => 'select',
			'label' => __('Style', 'curiosity'),
			'desc' => __('Select one from the styles.', 'curiosity'),
			'options' => array(
				'1' => __('1', 'curiosity'),
				'2' => __('2', 'curiosity'),
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		)
	)
);

/* FlexSlider --- */

$curiosity_shortcodes['flexslider'] = array(
	'title' => __('FlexSlider', 'curiosity'),
	'id' => 'curiosity-flexslider-shortcode',
	'template' => '[flexslider]{{child_shortcode}}[/flexslider]',
	'notes' => __('Click \'Add Slide\' to add a new slide.', 'curiosity'),
	'params' => array(),
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Image', 'curiosity'),
				'desc' => __('Add the link of the image.', 'curiosity'),
			),
		),
		'template' => '[slide]{{content}}[/slide] ',
		'clone_button' => __('Add Slide', 'curiosity')
	)
);

/* Contact --- */

$curiosity_shortcodes['contact'] = array(
	'title' => __('Contact', 'curiosity'),
	'id' => 'curiosity-contact-shortcode',
	'template' => '[contact {{attributes}}]{{content}}[/contact]',
	'params' => array(
		'adress' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Adress', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		'adress2' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Adress 2', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		'phone' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Phone', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		'phone2' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Phone 2', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		'email' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Email', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		'email2' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Email 2', 'curiosity'),
			'desc' => __('', 'curiosity'),
		),
		
	)
);

/* Button --- */

$curiosity_shortcodes['button'] = array(
	'title' => __('Button', 'curiosity'),
	'id' => 'curiosity-button-shortcode',
	'template' => '[button {{attributes}}]{{content}}[/button]',
	'params' => array(
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'curiosity'),
			'desc' => __('Add the link.', 'curiosity'),
		),
		'color' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Color', 'curiosity'),
			'desc' => __('Add a color code.', 'curiosity'),
		),
		'target' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Target', 'curiosity'),
			'desc' => __('Select a target.', 'curiosity'),
			'options' => array(
				'_self' => __('self', 'curiosity'),
				'_blank' => __('blank', 'curiosity'),
			)
		),
		'icon' => array(
			'type' => 'select',
			'label' => __('Icon', 'curiosity'),
			'desc' => __('Select the icon.', 'curiosity'),
			'options' => $curiosity_shortcode_icons
		),
		'icon_position' => array(
			'std' => 'right',
			'type' => 'select',
			'label' => __('Icon position', 'curiosity'),
			'desc' => __('Left or right.', 'curiosity'),
			'options' => array(
				'right' => __('right', 'curiosity'),
				'left' => __('left', 'curiosity'),
			)
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Text on button', 'curiosity'),
		)
	)
);

/* Iconbox --- */

$curiosity_shortcodes['iconbox'] = array(
	'title' => __('Iconbox', 'curiosity'),
	'id' => 'curiosity-iconbox-shortcode',
	'template' => '[iconbox {{attributes}}] {{content}} [/iconbox]',
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'curiosity'),
			'desc' => __('Add the title.', 'curiosity')
		),
		'icon' => array(
			'type' => 'select',
			'label' => __('Icon', 'curiosity'),
			'desc' => __('Select the icon.', 'curiosity'),
			'options' => $curiosity_shortcode_icons
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'namaste'),
			'desc' => __('Add a link or leave it blank.', 'namaste')
		),
		'padding' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Padding', 'curiosity'),
			'desc' => __('Add padding (left and right in px).', 'curiosity')
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'curiosity'),
			'desc' => __('Add the content.', 'curiosity'),
		)
	)
);

/* Icon --- */

$curiosity_shortcodes['icon'] = array(
	'title' => __('Icon', 'curiosity'),
	'id' => 'curiosity-icon-shortcode',
	'template' => '[icon {{attributes}}]',
	'params' => array(
		'icon' => array(
			'type' => 'select',
			'label' => __('Icon', 'curiosity'),
			'desc' => __('Select the icon.', 'curiosity'),
			'options' => $curiosity_shortcode_icons
		),
	)
);

/* Post --- */

$curiosity_shortcodes['post'] = array(
	'title' => __('Post', 'curiosity'),
	'id' => 'curiosity-post-shortcode',
	'template' => '[post {{attributes}}]',
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Title', 'curiosity'),
			'desc' => __('Select from the posts.', 'curiosity'),
			'options' => $post_title
		),
	)
);
