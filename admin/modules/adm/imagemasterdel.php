<? if ($GLOBAL["sitekey"]==1 && $GLOBAL["database"]==1) { $data=DB("DELETE FROM `_imagemaster` WHERE `id`='".$_GET["id"]."' LIMIT 1"); @header("location: ?cat=adm_imagemaster"); exit(); } ?>