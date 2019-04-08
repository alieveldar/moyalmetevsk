<?
$table = "_tags";
if ($start == "") {
    $start = 0;
    $dir[1] = 0;
}
$file = $table . "-" . $start . "." . $page . "." . $id;

#############################################################################################################################################
### Вывод списка новостей в категории
if ($start === 0) {
    $file = "_tags-cloud";
    if (RetCache($file) == "true") {
        list($tags, $cap) = GetCache($file, 0);
    } else {
        list($tags, $cap) = TagsCloud();
        SetCache($file, $tags, "");
    }
    $cap = "Теги публикаций";
    $Page["Content"] = $tags;
    $Page["Caption"] = $cap;
} ### Вывод списка новостей общий
else {
    $data = DB("SELECT `name` FROM `" . $table . "` WHERE (`id`='" . (int)$dir[1] . "') LIMIT 1");
    if ($data["total"] == 1) {
        @mysql_data_seek($data["result"], 0);
        $tag = @mysql_fetch_array($data["result"]);
        if (RetCache($file) == " true") {
            list($text, $cap) = GetCache($file);
        } else {
            list($text, $cap) = GetLentaList();
            SetCache($file, $text, $cap);
        }
        $Page["Content"] = $text;
        $Page["Caption"] = $cap;
    } else {
        $cap = "Тег не найден";
        $text = @file_get_contents($ROOT . "/template/404.html");
        $Page["Content"] = $text;
        $Page["Caption"] = $cap;
    }
}

#############################################################################################################################################

function GetLentaList()
{
    global $ORDERS, $VARS, $ROOT, $GLOBAL, $dir, $RealHost, $Page, $node, $UserSetsSite, $table, $tag, $C, $C20, $C10, $C25, $C15;
    $query = '';
    $orderby = $ORDERS[$node["orderby"]];
    $tables = array();
    $onpage = 30;
    $pg = $dir[2] ? $dir[2] : 1;
    $from = ($pg - 1) * $onpage;
    $onblock = 4;

    $q = "SELECT `[table]`.`id`, `[table]`.`lid`, `[table]`.`name`, `[table]`.`data`, `[table]`.`comcount`, `[table]`.`pic`, '[link]' as `link`
	FROM `[table]` LEFT JOIN `_users` ON `_users`.`id`=`[table]`.`uid` WHERE (`[table]`.`stat`='1' && `[table]`.`tags` LIKE '%," . (int)$dir[1] . ",%')";
    $endq = "ORDER BY `data` DESC LIMIT " . $from . ", " . $onpage;
    $data = getNewsFromLentas($q, $endq);
    $text = '';

    for ($i = 0; $i < $data["total"]; $i++) {
        @mysql_data_seek($data["result"], $i);
        $ar = @mysql_fetch_array($data["result"]);
        if (strpos($ar["link"], "ls") !== false || strpos($ar["link"], "bubr") !== false) {
            $rel = "target='_blank' rel='nofollow'";
        } else {
            $rel = "";
        }
        $safeTitle = str_replace('"', '&quot;', $ar['name']);
        if ($ar["pic"] != "") {
            $pic = '<img class="news-mid__picture" src="/userfiles/pictavto/' . $ar['pic'] . '" alt="' . $safeTitle . '">';
            $picHolderClass = '';
            $newsAttr = '';
        } else {
            $pic = "";
            $picHolderClass = ' hidden-desktop hidden-mobile';
            $newsAttr = ' style="margin-left:0; width:100%;"';
        }
        list($time, $date) = explode(', ', ToRusData($ar['data'])[10]);
        If(isset($ar['comcount'])) {
            $comments = "<p class=\"news-mid__comments\">{$ar['comcount']}</p>";
        } else {
            $comments = '';
        }
        $ar['link'] = '/' . $ar['link'] . '/view/' . $ar['id'] . '/';
        $text .= <<<HTML
			<div class="news-mid">
				<div class="news-mid__media-wrapper{$picHolderClass}">
					<a class="news-mid__header" href="{$ar['link']}" {$rel} title="{$safeTitle}">{$pic}</a>
				</div>
				<div class="news-mid__content"{$newsAttr}>
					<a class="news-mid__header" href="{$ar['link']}" {$rel} title="{$safeTitle}">{$ar['name']}</a>
					<p class="news-mid__text">{$ar['lid']}</p>
					<div class="news-mid__info">
						<div class="news-mid__date">
							<p class="news-mid__day">{$date}</p>
							<p class="news-mid__time">{$time}</p>
						</div>
						{$comments}
					</div>
				</div>
			</div>
HTML;
        if ($data["total"] > ($i + 1)) {
            if (($i + 1) % $onblock == 0) {
                $text .= "<div class='banner2' id='Banner-6-" . (floor($i / $onblock) + 1) . "'></div>";
            }
        }
    }


    $q = "SELECT `[table]`.`id` FROM `[table]` WHERE (`[table]`.`stat`='1' && `[table]`.`tags` LIKE '%," . (int)$dir[1] . ",%')";
    $endq = "";
    $data = getNewsFromLentas($q, $endq);
    $total = $data["total"];
    $text .= Pager2($pg, $onpage, ceil($total / $onpage), $dir[0] . "/" . $dir[1] . "/[page]");
    return (array($text, $tag['name']));
}

#############################################################################################################################################
