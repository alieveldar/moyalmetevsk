function AddNewMenu(pid, table) { var cap="Добавить родительский раздел"; var text=""; var button='<div class="CenterText" id="JSLoader"><input type="submit" class="SaveButton" value="Добавить раздел" onclick="AddNewMenuAct(\''+pid+'\',\''+table+'\');"></div>'; if (pid==0) { text=text+'<tr class="TRLine0"><td>Название раздела<star>*</star></td><td class="NormalInput"><input id="Rn0" type="text" /></td></tr><!--<tr class="TRLine0"><td>Стоимость размещения<star>*</star></td><td class="NormalInput"><input id="Rn1" type="text" value="0" /></td></tr>-->'; } else { text=text+'<tr class="TRLine0"><td>Название подраздела<star>*</star></td><td class="NormalInput"><input id="Rn0" type="text" /></td></tr><tr class="TRLine0"><td>Стоимость размещения<star>*</star></td><td class="NormalInput"><input id="Rn1" type="text" /></td></tr>'; } text="<div class='RoundText' id='Tgg' style='width:500px;'><table>"+text+"</table><div class='C10'></div>"+button+"</div>"; ViewBlank(cap, text); }


function AddNewMenuAct(pid, table) { name=$('#Rn0').val(); price=$('#Rn1').val(); link=$('#Rl0').val(); error=0; if (name=="" || name=="NULL"){ error=1; $("#Rn0").toggleClass("ErrorInput", true);} if (error==0) { $("#JSLoader").html(loader2); JsHttpRequest.query('modules/strochki/razdel-add-JSReq.php',{'pid':pid,'table':table,'price':price,'name':name },function(result,errors){if(result){ /*s*/ ActionAndUpdate(table); /*e*/ }}, true); }}


function ItemEdit(id, pid, name, price, table) { var cap="Редактировать раздел"; text=""; var button='<div class="CenterText" id="JSLoader"><input type="submit" class="SaveButton" value="Сохранить" onclick="SaveRazdelItem(\''+id+'\', \''+pid+'\', \''+table+'\');"></div>'; if (pid==0) { text=text+'<tr class="TRLine0"><td>Название раздела<star>*</star></td><td class="NormalInput"><input id="Rn0" type="text" value="'+name+'" /></td></tr><!--<tr class="TRLine0"><td>Стоимость размещения<star>*</star></td><td class="NormalInput"><input id="Rn1" type="text" value="'+price+'" /></td></tr>-->'; } else { text=text+'<tr class="TRLine0"><td>Название подраздела<star>*</star></td><td class="NormalInput"><input id="Rn0" type="text" value="'+name+'" /></td></tr><tr class="TRLine0"><td>Стоимость размещения<star>*</star></td><td class="NormalInput"><input id="Rn1" type="text" value="'+price+'" /></td></tr>'; } text="<div class='RoundText' id='Tgg' style='width:500px;'><table>"+text+"</table><div class='C10'></div>"+button+"</div>"; ViewBlank(cap, text); }


function SaveRazdelItem(id, pid, table) { name=$('#Rn0').val(); price=$('#Rn1').val(); error=0; if (name=="" || name=="NULL"){ error=1; $("#Rn0").toggleClass("ErrorInput", true);} $("#JSLoader").html(loader2); JsHttpRequest.query('modules/strochki/razdel-edit-JSReq.php',{'id':id, 'pid':pid, 'price':price, 'name':name, 'table':table},function(result,errors){ if(result){ /*s*/ ActionAndUpdate(table); /*e*/ }},true); } 


function ActionAndUpdate(table) { CloseBlank(); $("#Msg2").html("Идет сохранение данных..."); $("#Msg2").removeClass(); $("#Msg2").addClass("SaveDiv"); JsHttpRequest.query('modules/strochki/razdel-update-JSReq.php',{'table':table},function(result,errors){ if(result){  /*s*/ $("#Tgg").html(result["content"]); $("#Msg2").html("Данные успешно сохранены"); $("#Msg2").removeClass(); $("#Msg2").addClass("SuccessDiv"); $('#Tgg input').tzCheckbox({labels:['да ','нет']}); /*e*/ }},true); }


function ItemDelete(id,pid,table){ caption="Подтвердите удаление"; text='Удалить пункт меню и все его дочерние элементы?<br>Данное действие будет невозможно отменить.'+"<div class='C25'></div><div class='LinkG' style='float:left; margin-right:5px;'><a href='javascript:void(0);' onclick='ActionRazdelItem("+id+","+pid+",\""+table+"\",\"DEL\");'>Удалить</a></div><div class='LinkR'><a href='javascript:void(0);' onclick='CloseBlank();'>Отмена</a></div><div class='C10'></div>"; ViewBlank(caption,text);}


function ActionRazdelItem(id, pid, table, act) { $("#JSLoader").html(loader2); JsHttpRequest.query('modules/strochki/razdel-act-JSReq.php',{'id':id, 'pid':pid, 'table':table, 'act':act},function(result,errors){ if(result){ /*s*/ ActionAndUpdate(table); /*e*/ }},true); } function ItemUp(id, table, pid) { ActionRazdelItem(id, pid, table, 'UP'); } function ItemDown(id, table, pid) { ActionRazdelItem(id, pid, table, 'DOWN'); }