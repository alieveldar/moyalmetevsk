<?
$Text=""; $Script="";
### ДАННЫЕ ТЕСТА ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  --- 
$ok="Правильно";
$no="Неправильно";

### Текст итога теста, отметка "От и больше * баллов"
$ends=array(
0=>"<div style=\"height:400px; font-size:15px;\">
Вы неплохо справились с нашим тестом. Вероятно, Вас волнует вопрос безопасности на дороге. 
А безопасность на дорогах связана не только с соблюдением правил дорожного движения, но и с исправным техническим состоянием автомобиля. Для этого необходимо прохождение технического осмотра. 

<b>ОАО «Таттехконтроль»</b> предлагает провести технический осмотр Вашего автомобиля. 

<b>Почему нас выбирают тысячи казанцев?</b>
1. Стоимость техосмотра легкового автомобиля всего 400 рублей
2. Без очередей: за 15 минут
3. Многолетний опыт работы
4. Современное оборудование и высококлассные специалисты
5. Повторный заезд бесплатный
6. Работаем без выходных.

<b>Адреса и график работы пунктов в Казани:</b>
ул. Тэцевская, д. 5 с 8.00 – 20.00, без обеда и без выходных
ул. Оренбургский тракт, д. 5 и ул.Модельная, д.10 с 9.00 до 18.00, без выходных
</div>",

6=>"<div style=\"height:400px; font-size:15px;\">
Вы легко справились с нашим тестом. Вероятно, вы ответственно подходите к вопросу безопасности на дороге.  <b>ОАО «Таттехконтроль»</b> предлагает провести технический осмотр Вашего автомобиля, чтобы Вы были уверены, что Ваше транспортное средство отвечает всем требованиям безопасности. 

<b>Почему нас выбирают тысячи казанцев?</b>
1. Стоимость техосмотра легкового автомобиля всего 400 рублей
2. Без очередей: за 15 минут
3. Многолетний опыт работы
4. Современное оборудование и высококлассные специалисты
5. Повторный заезд бесплатный
6. Работаем без выходных.

<b>Адреса и график работы пунктов в Казани:</b>
ул. Тэцевская, д. 5 с 8.00 – 20.00, без обеда и без выходных
ул. Оренбургский тракт, д. 5 и ул.Модельная, д.10 с 9.00 до 18.00, без выходных
</div>",

		
);

### Вопросы и ответы по порядку
$quets=array(

0=>array(
	"qst"=>"Можно ли пройти техосмотр с трещиной на ветровом стекле?",
	"right"=>"В соответствии с требованиями ГОСТ наличие трещин на ветровых стеклах автотранспортного средства в зоне очистки стеклоочистителем половины стекла, расположенной со стороны водителя, не допускается. Следовательно, с трещиной стекла НЕ в зоне очистки стеклоочистителем техосмотр пройти можно.",
	"img"=>"https://pp.vk.me/c624831/v624831715/486f4/X573NDMg0nI.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
1=>array(
	"qst"=>"Если светопропускание ветрового стекла, передних боковых стекол и стекол передних дверей (при наличии) составляет не менее 70 процентов, пройдет ли такой автомобиль техосмотр",
	"right"=>"П.39 Постановления №1008 от 05.12.2011г. «О проведении технического осмотра транспортных средств» это разрешает",
	"img"=>"https://pp.vk.me/c624831/v624831715/484f9/Ru6eZ5iRSIw.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
2=>array(
	"qst"=>"Пройдет ли автомобиль техосмотр, если одна из дверей или капот после замены другого цвета?",
	"right"=>"Требованиями ГОСТа это допускается",
	"img"=>"https://pp.vk.me/c624831/v624831715/48500/4WFf7xqwEy4.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
3=>array(
	"qst"=>"На автомобиль установлено газовое оборудование. Получится ли пройти техосмотр без замечаний?",
	"right"=>"Если утечки газа течеискателем не обнаружена, то техосмотр пройти можно",
	"img"=>"https://pp.vk.me/c624831/v624831715/48507/KtigKn_4ORY.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
4=>array(
	"qst"=>"Если автомобиль оформлен на другого человека, можно ли пройти техосмотр без владельца автомобиля?",
	"right"=>"Да, если он включен в страховой полис",
	"img"=>"https://pp.vk.me/c624831/v624831715/4850e/ubfc18wgINQ.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
5=>array(
	"qst"=>"На задних стеклах и капоте автомобиля имеются наклейки автоклуба. Пройдет ли такой автомобиль техосмотр?",
	"right"=>"Требованиями ГОСТа это допускается",
	"img"=>"https://pp.vk.me/c628431/v628431715/14e66/gFcRGP-fU9Q.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),
6=>array(
	"qst"=>"Может ли автомобиль пройти техосмотр если тормозной шланг имеет множественные вздутия, следы перетирания и трещины?",
	"right"=>"Согласно Постановления № 1008 от 05.12. 2011г. набухание тормозных шлангов под давлением, наличие трещин на них и видимых мест перетирания не допускаются",
	"img"=>"https://pp.vk.me/c624831/v624831715/48515/7MIGTFPYXhc.jpg",
	"ans"=>array(
		"0"=>array(0, "Да"),
		"1"=>array(1, "Нет"),
)),
7=>array(
	"qst"=>"Сможет ли автомобиль с самопроизвольным поворотом рулевого колеса с усилителем рулевого управления от нейтрального положения при работающем двигателе пройти техосмотр?",
	"right"=>"П.13 Постановления не допускает самопроизвольного поворота руля при указанных условиях",
	"img"=>"https://pp.vk.me/c624831/v624831715/4851c/-cLSqGqozlk.jpg",
	"ans"=>array(
		"0"=>array(0, "Да"),
		"1"=>array(1, "Нет"),
)),
8=>array(
	"qst"=>"В случае, если у автомобиля повреждены и отсутствуют детали крепления рулевой колонки и картера рулевого механизма, пройдет ли такой автомобиль техосмотр?",
	"right"=>"В п.15 Постановления закреплено недопущение данного повреждения",
	"img"=>"https://pp.vk.me/c628431/v628431715/14e58/22_YKAyPHqQ.jpg",
	"ans"=>array(
		"0"=>array(0, "Да"),
		"1"=>array(1, "Нет"),
)),
9=>array(
	"qst"=>"Если транспортное средство  оснащено хотя бы одним стеклоочистителем и хотя бы одной форсункой стеклоомывателя ветрового стекла, пройдет ли такой автомобиль техосмотр?",
	"right"=>"П.23 Постановления №1008 от 05.12.2011г. это допускает",
	"img"=>"https://pp.vk.me/c628431/v628431715/14e5f/DU_pgtMAnMc.jpg",
	"ans"=>array(
		"0"=>array(1, "Да"),
		"1"=>array(0, "Нет"),
)),


);

### НИЧЕГО НЕ ТРОГАТЬ!!! ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  --- 
foreach ($ends as $k=>$v) { $ends[$k]=str_replace(array("\r","\n","\t"), "", nl2br($v));  }
$Page["Content"].="<style>.righttext { display:none; margin-bottom:15px; padding:10px; border:1px solid #CCC; border-radius:7px; }</style>";
$i=0; foreach ($quets as $ar) { $Text.="<div><div class='PicItem'><img src='".$ar["img"]."' /></div>".$C5."<h2>".$ar["qst"]."</h2>".$C;
$Text.="<div id='ans-".$i."' class='answertext'></div><div class='righttext' id='right-".$i."'>".$ar["right"]."</div>";
foreach($ar["ans"] as $ans) { $Text.="<div class='testanswer testanswering answer-".$i." anstype".$ans[0]."' id='div-".$i."-".$ans[0]."' onclick='clickanswer(this);'>".$ans[1]."</div>"; } $Text.="</div>".$C30; $i++; }
$end=""; foreach($ends as $point=>$text) { $end.=" end[".$point."]='".$text."'; "; } $Script="<script>var total=".sizeof($quets)."; var textok='".$ok."'; var textno='".$no."'; var end=Array(); ".$end."</script>";

### ДОБАВЛЕНИЕ В ПОСТ ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  ---  --- 
$Page["Content"]=str_replace("<!--TEST-->", $Text.$Script, $Page["Content"]);
$Page["Content"].="<script src='/modules/test/test-type-ans.js' type='text/javascript'></script>";
?>
