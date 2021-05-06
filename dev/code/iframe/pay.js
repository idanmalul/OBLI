function focuson(id) {
    var myobj = document.getElementById(id);
    myobj.focus();    
}

function valof(id) {
    if(typeof document.getElementById(id) == undefined  || typeof document.getElementById(id) == null) {
        alert(id + ' is not good');
        return 0;
    }

    var myobj = document.getElementById(id);
    if(myobj) {
        return myobj.value;
    } else {
	    return 'bad'+id;
    }
}

function ppsubmit() {
    var pform = document.getElementById('tranpayform');
    pform.action = pform.action + '?pp=pp';
    pform.submit();
}

function setval(id,val) {
    document.getElementById(id).value = val;
}

function paymentscalc() {
    if(valof('o_cred_type')=='6') {
	    return 1;
    }

    var tsum = valof('sum');                                                                                                                                                                                                                 
    var npay1 = valof('xnpay');

    if(npay1>1)  {
        var npay2 = npay1 - 1;                                                                                                                                                                                                               
        var modv = eval( tsum % npay1);                                                                                                                                                                                                      
        var sp = eval((tsum-modv)/npay1);                                                                                                                                                                                                    
        var fp = eval(sp + modv);                                                                                                                                                                                                            
        fp = Math.round(fp * 100) / 100;                                                                                                                                                                                                     
        setval('fpay',fp);                                                                                                                                                                                                                   
        setval('npay',npay2);                                                                                                                                                                                                                
        setval('spay',sp);                     
        var xoct = valof('o_cred_type');
        if(xoct != '8' && xoct != '6') {
    	    xoct = '8';
        }
        setval('cred_type',xoct);
    } else {
        setval('cred_type','1');                                                                                                                                                                                                             
        //setval('tranmode','A');                                                                                                                                                                                                              
        setval('fpay',0);                                                                                                                                                                                                                    
        setval('npay',0);                                                                                                                                                                                                                    
        setval('spay',0);
    }
}

function chkpayform() {
	var reqfields = new Array("contact","ccno","expmonth","expyear","sum","phone","email");
	var fl = reqfields.length;

	fnameregx = /^[A-Za-zא-ת ]{1,64}$/;
	ccnoregx = /^[0-9]{5,16}$/;
	ccexpyregx = /^[0-9]{2}$/;
	ccexpmregx = /^[0-9]{2}$/;

	var csc=0;
    for (i=0;i<fl;i++) {
        switch(reqfields[i]) {
            case "contact":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                } else {
                    if(valof(reqfields[i]).match(fnameregx)) {
                        csc++;
                    } else {
                        alert(" שדה השם לא תקין ");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
            case "ccno":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                } else {
                    if(valof(reqfields[i]).match(ccnoregx)) {
                        csc++;
                    } else {
                        alert(" מספר כרטיס אשראי לא תקין ");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
            case "expyear":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                } else {
                    if(valof(reqfields[i]).match(ccexpyregx)) {
                        csc++;
                    } else {
                        alert(" תוקף לא תקין ");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
            case "expmonth":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                }  else {
                    if(valof(reqfields[i]).match(ccexpmregx)) {
                        csc++;
                    } else {
                        alert(" תוקף  הכרטיס לא תקין ");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
            case "sum":
                csc++;
                break;
            case "phone":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                } else {
                    if(valof(reqfields[i]).length >7) {
                        csc++;
                    } else {
                        alert(" מספר טלפון לא תקין ");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
            case "email":
                if(valof(reqfields[i])=='dont') {
                    csc++;
                } else {
                    var emailregx = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                    if(valof(reqfields[i]).match(emailregx)) {
                        csc++;
                    } else {
                        alert(" כתובת דואר אלקטרוני לא תקינה");
                        focuson(reqfields[i]);
                        return false;
                    }
                }
                break;
        }
    }

    if(csc) {
        var pform = document.getElementById('tranpayform');
        pform.action = pform.action + '?cc';
        document.getElementById('send').disabled = true;
        pform.submit();
    } else {
        alert('נא למלא את כל הפרטים על מנת לבצע תשלום');
        return false;
    }
}

function checknrun(required,target) {
	var pform = document.getElementById('tranpayform');
	pform.action = pform.action + '?' + target;
	var emailregx = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var emailalert = 'כתובת דוא"ל אינה תקינה ';
	var contactregx = /^[ا-يA-Za-zא-תÀ-ÿа-яА-Я0-9\-\/\.\'\, ]{1,64}$/;
	var cityregx = /^[ا-يA-Za-zא-תÀ-ÿа-яА-Я\-\'\" ]{1,32}$/;
	var contactalert = 'שם לא תקין';
	var companyregx = contactregx;
	var companyalert = 'שם חברה לא תקין';
	var addressregx = companyregx;
	var addressalert = 'כתובת לא תקינה';
	var cityalert = 'עיר לא תקינה';
	var countryregx = /^[A-Z]{2}$/;
	var mycvvregx = /^[0-9]{3,4}$/;
	var mycvvalert = 'חובה להזין את הספרות בגב הכרטיס';
	var myidregx = /^[0-9A-Za-z]{5,9}$/;
	var myidalert = 'ת.ז. חייבת להיות 9 ספרות';
    var stateregx = /^[0-9A-Za-z]$/;
    var statealert = 'שדה לא תקין';
	var remarksregx = /^[ا-ي0-9A-Za-zא-ת\-\/ ]{1,255}$/;
	var remarksalert = 'נא להזין הערות';
	var expmonthregx = /^[0-9]{2}$/;
	var expyearregx = expmonthregx;
	var expyearalert = 'תוקף לא תקין';
	var expmonthalert = expyearalert;
	var ccnoregx = /^[0-9\- ]{5,20}$/;
	var ccnoalert = 'מספר כרטיס אשראי לא תקין';
	var phoneregx = /^[0-9\- ]{5,16}$/;
	var phonealert = 'מספר טלפון לא תקין';
	var faxregx = /^[0-9\- ]{5,16}$/;
	var faxalert ='מספר פקס לא תקין';
    var zipregx = /^[0-9\- ]{4,12}$/;
    var zipalert ='מיקוד לא תקין';

	for(i in required) {
	    var tkn = required[i];
	    if(valof(tkn).match(eval(tkn+'regx'))) {
		    ok = true;
	    } else {
            alert(eval(tkn+'alert'));
            focuson(tkn);
            return false;
	    }
	}

    // Fix for responsive version, we add the code to the actual phone before sending
    var phonearea = document.getElementById('phonearea');
    if (phonearea !== null) {
        var phone = document.getElementById('phone');
        phone.value = phonearea.value + '-' + phone.value;
    }
    var faxarea = document.getElementById('faxarea');
    if (faxarea !== null) {
        var fax = document.getElementById('fax');
        fax.value = faxarea.value + '-' + fax.value;
    }

	if(document.getElementById('xnpay') && document.getElementById('o_cred_type') != '6') {
	    paymentscalc();
	}

	document.getElementById('send').disabled = true;
	pform.submit();
}

function ichecknrun(required,target) {
	var pform = document.getElementById('itranpayform');
	pform.action = pform.action + '?' + target;
	var emailregx = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var emailalert = 'כתובת דוא"ל אינה תקינה ';
	var companyregx = /^[ا-يA-Za-zא-תÀ-ÿа-яА-Я0-9\-\/\.\' ]{1,32}$/;
    var companyalert = 'שם חברה לא תקין';
    var addressregx = companyregx;
    var addressalert = 'כתובת לא תקינה';
    var contactregx = /^[ا-يA-Za-zא-תÀ-ÿа-яА-Я0-9\-\/\.\' ]{1,32}$/;
    var contactalert = 'שם לא תקין';
    var cityregx = /^[ا-يA-Za-zא-תÀ-ÿа-яА-Я\-\'\" ]{1,32}$/;
	var cityalert = 'עיר לא תקינה';
	var countryregx = /^[A-Z]{2}$/;
	var mycvvregx = /^[0-9]{3,4}$/;
	var mycvvalert = 'חובה להזין את הספרות בגב הכרטיס';
	var myidregx = /^[0-9A-Za-z]{5,9}$/;
	var myidalert = 'ת.ז. חייבת להיות 9 ספרות';
	var remarksregx = /^[ا-ي0-9A-Za-zא-ת\/\- ]{1,255}$/;
	var remarksalert = 'נא להזין הערות';
	var expmonthregx = /^[0-9]{2}$/;
	var expyearalert = 'תוקף לא תקין';
	var expyearregx = expmonthregx;
	var ccnoregx = /^[0-9\- ]{5,20}$/;
	var ccnoalert = 'מספר כרטיס אשראי לא תקין';
	var phoneregx = /^[0-9]{5,16}$/;
	var phonealert = 'מספר טלפון לא תקין';
	var faxregx = /^[0-9]{5,16}$/;
	var faxalert ='מספר פקס לא תקין';
    var zipregx = /^[0-9\- ]{4,12}$/;
    var zipalert ='מיקוד לא תקין';
	
	for(i in required) {
	    var tkn = required[i];
	    if(valof(tkn).match(eval(tkn+'regx'))) {
		    ok = true;
	    } else {
            alert(eval(tkn+'alert'));
            focuson(tkn);
            return false;
	    }
	}

	document.getElementById('send').disabled = true;
	document.getElementById('submitbtn').disabled=true;
	pform.submit();
}  

function changeLanguageSelector(lang, merchant_id) {
    //window.location = "/merchant/lang_switch.php?lang="+lang+"&id="+merchant_id;

    $('#selectedLanguageValue').val(lang);
    $('#merchantIdValue').val(merchant_id);

    var tranpayformSerializeArray = $('#tranpayform').serializeArray();
    $.each(tranpayformSerializeArray, function (i, field)
    {
        $('#selectedLanguagePassParameters').append('<input type="hidden" name="' + field.name + '" value="' + field.value + '" />');
    });
    $('#selectedLanguagePassParameters').submit();
}