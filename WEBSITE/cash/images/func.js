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


// IMAGES FILES

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
