<?php
$file="_rightblock-rightdefault"; if (RetCache($file, "cacheblock")=="true") { list($Page["RightContent"], $cap)=GetCache($file, 0); } else { list($Page["RightContent"], $cap)=CreateRightBlock(); SetCache($file, $Page["RightContent"], "", "cacheblock"); }

// $yandex1='<!-- Яндекс.Директ --><div id="yandex1ad"></div><script type="text/javascript">(function(w, d, n, s, t) { w[n] = w[n] || []; w[n].push(function() { Ya.Direct.insertInto(125901, "yandex1ad", { ad_format: "direct", font_size: 0.8, type: "vertical", border_type: "block", limit: 3, title_font_size: 1, site_bg_color: "FFFFFF", header_bg_color: "CCCCCC", border_color: "CCCCCC", title_color: "0066CC", url_color: "006600", text_color: "000000", hover_color: "0066FF", no_sitelinks: true}); }); t = d.getElementsByTagName("script")[0]; s = d.createElement("script"); s.src = "//an.yandex.ru/system/context.js"; s.type = "text/javascript"; s.async = true; t.parentNode.insertBefore(s, t);})(window, document, "yandex_context_callbacks");</script>'.$C25;
// $yandex2='<!-- Яндекс.Директ --><div id="yandex2ad"></div><script type="text/javascript">(function(w, d, n, s, t) { w[n] = w[n] || []; w[n].push(function() { Ya.Direct.insertInto(125901, "yandex2ad", { ad_format: "direct", font_size: 0.8, type: "vertical", border_type: "block", limit: 3, title_font_size: 1, site_bg_color: "FFFFFF", header_bg_color: "CCCCCC", border_color: "CCCCCC", title_color: "0066CC", url_color: "006600", text_color: "000000", hover_color: "0066FF", no_sitelinks: true}); }); t = d.getElementsByTagName("script")[0]; s = d.createElement("script"); s.src = "//an.yandex.ru/system/context.js"; s.type = "text/javascript"; s.async = true; t.parentNode.insertBefore(s, t);})(window, document, "yandex_context_callbacks");</script>'.$C25;
// $google='<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:inline-block;width:240px;height:400px" data-ad-client="ca-pub-2073806235209608" data-ad-slot="7095611817"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';

if ($link!="adverting") { $Page["RightContent"]=str_replace(array("<!--yandex1-->","<!--yandex2-->","<!--google-->"), array($yandex1, $yandex2, $google), $Page["RightContent"]); }

function CreateRightBlock() {
    global $VARS;
    $ban10=2;
    $text = '<style>.news-mid:nth-child(2) .news-mid__content, .news-mid:nth-child(3) .news-mid__content {max-width: 215px;font-size: 13.44px;}.news-mid:nth-child(2) .news-mid__content .news-mid__header, .news-mid:nth-child(3) .news-mid__content .news-mid__header{line-height: 1;}</style>
             <div class="banner banner-right" id="Banner-1-1"></div>';

    $social = '<div class="divider divider_margin-top-0 divider_bottom-space">';
    $social_icons = ['social-vk' => 'vk', 'social-instagram' => 'insta'];
    foreach($social_icons as $social_var => $icon) {
        if( ! empty( $VARS[ $social_var ] )) {
            $social .= '
            <a href="' . $VARS[ $social_var ] . '" target="_blank" rel="nofollow"
            class="divider__icon divider__icon_' . $icon . '"></a>';
        }
    }
    $social .= '<span class="divider__text">подписывайся!</span></div>';
    $text .= $social;

    $longBannerData = [
        'show' => false,
        'items' => [
            [
                'url' => 'http://avangard-motors.ru/aktcii/avtokredit-i-nichego-lishnego.html ',
                'text' => 'Автокредит без дополнительных платежей',
                'image' => '/template/advert/1.jpg',
            ],
            [
                'url' => 'http://servis-avangard.ru/uslugi/postgarantiynoe-obsluzhivanie-avtomobilya/',
                'text' => 'Замена масла комфортно и в срок (пост-гарантийное ТО)',
                'image' => '/template/advert/2.jpg',
            ],
            [
                'url' => 'http://avangard-motors.ru/catalog/hyundai/creta/ ',
                'text' => ' Хит продаж! Хендай Крета от 18 700 руб/мес.',
                'image' => '/template/advert/3.jpg',
            ],
        ],
        'afterText' => 'Реклама. Имеются противопоказания. Необходима консультация специалиста.',
        'bannerId' => '895',
    ];

    $text .= "<noindex>";

    if($longBannerData['show']) {
        $text .= '<div class="banner-toggleable">';
        foreach ($longBannerData['items'] as $item) {
            if (empty($item['url']) && empty($item['text'])) {
                continue;
            }
            $url = '/advert/clickBanner.php?id=' . $longBannerData['bannerId'] . '%26away=' . urlencode($item['url']);
            $text .= '<div class="banner-toggleable__picture-wrapper">
					<a href="' . $url . '" rel="nofollow" target="_blank">
						<img class="banner-toggleable__picture" src="' . $item['image'] . '">
					</a>
				</div>
				<h3 class="banner-toggleable__header">
					<a href="' . $url . '" rel="nofollow" target="_blank">
						' . $item['text'] . '
					</a>
				</h3>';
        }
        $text .= '<span class="banner-toggleable__text-small">' . $longBannerData['afterText'] . '</a></span>
				<div class="banner-toggleable__button-wrapper">
					<button class="banner-toggleable__button"></button>
				</div>
			</div>
			<img src="/advert/showBanner.php?ids=' . $longBannerData['bannerId'] . '" style="width:0px;height:0px;">';
    }

    $text.="</noindex>";

    $sections = getRightSectionsNews();

    foreach($sections as $section) {
        $block = getRightBlockNewsSection( $section['title'], $section['link'], $section['news'], $section['view'] );

        if( ! empty($block) ) {
            $text .= $block;
            if ($ban10 <= 8) {
                $text .= "<div class='banner3' id='Banner-10-" . $ban10 . "'></div>";
                $ban10 = $ban10 + 2;
            }
        }
    }

    return array($text, "");
}
