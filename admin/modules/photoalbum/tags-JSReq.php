<?
session_start();
if ($_SESSION['userrole']>2) {
	$GLOBAL["sitekey"]=1;
	@require "../../../modules/standart/DataBase.php";
	@require "../../../modules/standart/Settings.php";
	@require "../../../modules/standart/JsRequest.php";
	$JsHttpRequest=new JsHttpRequest("utf-8");
	// полученные данные ================================================

	$id	= (int)$_REQUEST['id'];
	$table= $_REQUEST['tab'];

	// операции ================================================

	DB("DELETE FROM `".$table."` WHERE (`id`='$id')");

	// отправляемые данные ================================================

	$result["test"]=1;
	$GLOBALS['_RESULT']	= $result;
}
?>