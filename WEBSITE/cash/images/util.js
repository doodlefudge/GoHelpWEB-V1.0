function NumField(evt)
{
    var event = evt == undefined ? window.event : evt;
    if ((event.keyCode < 48) || (event.keyCode > 57)) {
        event.returnValue = false;
    }
}

function PhoneField(evt)
{
    var event = evt == undefined ? window.event : evt;
    if (((event.keyCode >= 48) && (event.keyCode <= 57)) || (event.keyCode == 40) || (event.keyCode == 41) || (event.keyCode == 45))
	    event.returnValue = true;
	else
        event.returnValue = false;
}

function AlphaField(evt)
{
    var event = evt == undefined ? window.event : evt;
    if (((event.keyCode >= 65) && (event.keyCode <= 90)) || ((event.keyCode >= 97) && (event.keyCode <= 122)) || (event.keyCode == 32) || (event.keyCode == 46))
	    event.returnValue = true;
	else
        event.returnValue = false;

}

function AlphaField2(evt)
{
    var event = evt == undefined ? window.event : evt;
    if (((event.keyCode >= 65) && (event.keyCode <= 90)) || ((event.keyCode >= 97) && (event.keyCode <= 122)) || (event.keyCode == 32))
	    event.returnValue = true;
	else
        event.returnValue = false;

}

function FocusMove(srcObj, maxLen, moveObj)
{
    if (srcObj.value.length >= maxLen)
	{
		if(typeof(moveObj) == "object")
		{
			moveObj.focus();
		}
		else
		{
			document.getElementsByName(moveObj)[0].focus();
		}
	}
}

function truncateComa(str)
{
    var tmpstr = "";
    var i = 0;
    for(i = 0; i < str.length; i++)
    {
        if (str.substring(i, i+1) != ",")
            tmpstr = tmpstr + str.substring(i, i+1);
    }
    return tmpstr
}

function num_check(str)
{
    var is_num = true;
    for (var i=0; i < str.length; i++) {
        if (str.substring(i, i+1) != "0" &&
            str.substring(i, i+1) != "1" &&
            str.substring(i, i+1) != "2" &&
            str.substring(i, i+1) != "3" &&
            str.substring(i, i+1) != "4" &&
            str.substring(i, i+1) != "5" &&
            str.substring(i, i+1) != "6" &&
            str.substring(i, i+1) != "7" &&
            str.substring(i, i+1) != "8" &&
            str.substring(i, i+1) != "9")
            { is_num = false }
    }
    return is_num;
}

function MoneyFormat(str)
{
    var newStr = "";
    var strLen   = str.length;
    var commCnt  = parseInt((strLen - 1) / 3);
    var fCnt = strLen % 3;
    if (fCnt == 0 )    fCnt = 3;
    
    for(var i = 0, lidx = 0; i <= commCnt; i++ )
    {
        fidx = lidx;
        lidx = fCnt + (i * 3);
        
        if (newStr.length > 0)    newStr = newStr + ",";
        newStr = newStr + str.substring(fidx, lidx);
    }

    return newStr;
}

function SetMoneyValue(FieldName)
{
    var strReplaceOption = /,/gi;
    var strMoney = FieldName.value.replace(strReplaceOption,"");

    FieldName.value = MoneyFormat(strMoney);
}

function ChkEmail(str)
{
    var supported = 0;

    if (window.RegExp)
	{
		var tempStr = "a";
		var tempReg = new RegExp(tempStr);
	    if (tempReg.test(tempStr)) 
			supported = 1;
	}

	if (!supported) 
		return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);

	var r1 = new RegExp("(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");
	var r2 = new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");
	
	return (!r1.test(str) && r2.test(str));
}

function ConfirmMsg(msg, width,height)
{
	var WinAttr = "toolbar=NO;center=yes;scrollbars=NO;status=NO;dialogwidth="+width+"px;dialogheight="+height+"px";

	retval=window.showModalDialog("/Lib/ConfirmMsg.asp?msg="+msg,"confirmmsg", WinAttr);

	return retval;
}

function AlertMsgModal(msg, width,height)
{
	var WinAttr = "toolbar=NO;center=yes;scrollbars=NO;status=NO;dialogwidth="+width+"px;dialogheight="+height+"px";

	retval=window.showModalDialog("/Lib/AlertMsg.asp?msg="+msg,"confirmmsg", WinAttr);

	return retval;
}

function OpenWindow(url, boxname, width, height)
{
	var winLeft = (screen.width - width) / 2;
    var winTop = (screen.height - height) / 2;
    var winProps = "width="+width+",height="+height+",top="+winTop+",left="+winLeft+",scrollbars=no";

    window.open(url,boxname,winProps);
}

// scrollbar enabled
function OpenWindow2(url, boxname, width, height)
{
	var winLeft = (screen.width - width) / 2;
    var winTop = (screen.height - height) / 2;
    var winProps = "width="+width+",height="+height+",top="+winTop+",left="+winLeft+",scrollbars=yes";

    window.open(url,boxname,winProps);
}

function CreateIFrame(objTargetDocument, objTargetNode, strFrameName)
{
	var ifrm = objTargetDocument.getElementById(strFrameName);
	if(ifrm == undefined)
	{
		ifrm = objTargetDocument.createElement("IFRAME");
		ifrm.setAttribute("name",strFrameName);
		ifrm.setAttribute("id",strFrameName);
		ifrm.style.display = "none";
		if(objTargetDocument.frames)//for ie
		{
			ifrm.src = "/blank.html";//for ssl issue
		}
		objTargetNode.appendChild(ifrm);
		if(objTargetDocument.frames && objTargetDocument.frames[strFrameName] != undefined)//for ie
		{
			objTargetDocument.frames[strFrameName].name = strFrameName;
		}
	}
}

function click(evt) 
{
    var event = evt == undefined ? window.event : evt;
	if ((event.button==2) || (event.button==3))  
	{
		return false;
	}
}

function keypressed(evt) 
{    
    var event = evt == undefined ? window.event : evt;
	if ((event.keyCode >= 113 && event.keyCode <= 123) || (event.ctrlKey == true))
	{                                        
		try{event.keyCode=0;}catch(E){}
		event.cancelBubble = true;
        event.returnValue = false;

        return false;
    }                                                          
}

function nocontextmenu(evt)
{
    var event = evt == undefined ? window.event : evt;
    event.cancelBubble = true;
    event.returnValue = false;

    return false;
}

function returnfalse(evt)
{
    var event = evt == undefined ? window.event : evt;
    event.cancelBubble = true;
    event.returnValue = false;

    return false;
}


if(document.attachEvent) //ie
{
    document.attachEvent("onkeydown", keypressed);
    document.attachEvent("onmousedown", returnfalse);
    document.attachEvent("oncontextmenu", nocontextmenu);
    document.attachEvent("ondragstart", returnfalse);
    document.attachEvent("onselectstart", returnfalse);
}
else //ff
{
    window.addEventListener('keydown', keypressed, false);
    window.addEventListener('mousedown', returnfalse, false);
    window.addEventListener('contextmenu', nocontextmenu, false);
    window.addEventListener('dragstart', returnfalse, false);
    window.addEventListener('selectstart', returnfalse, false);
}
