$(".JsVerify").live("focus", function(){ $(this).toggleClass("ErrorInput", false); }); $(".JsVerify2").live("focus", function(){ $(this).toggleClass("ErrorInput", false); });  function JsVerify() { var error=0; $("#dlink").val(trim($("#dlink").val(), "/")); $(".JsVerify2").each(function (i) { $(this).toggleClass("ErrorInput", false); var val=$(this).val(); if (val=="" || val=="NULL") { error=1; $(this).toggleClass("ErrorInput", true); }}); $(".JsVerify").each(function (i) { $(this).toggleClass("ErrorInput", false); var val=$(this).val(); for(var i=0; i<NotAvaliable.length; i++) { if (NotAvaliable[i]==val) { error=1; $(this).toggleClass("ErrorInput", true); }} if (val!="<autolink>") { if ((/^[a-z0-9]+$/g).test(val)==false) { error=1; $(this).toggleClass("ErrorInput", true); }} }); if (error!=0) { return false; } else { return true; }} 