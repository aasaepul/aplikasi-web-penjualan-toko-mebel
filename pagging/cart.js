function add(id){
	document.getElementById("infoCart").innerHTML='<font color="red"><b>Tunggu Sebentar...</b></font>';
	val=document.getElementById("val_"+id).value;
    xml=ajax();
    url="misc/add.php?id="+id+"&qty="+val;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("infoCart").innerHTML=data;
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}
function up(id){
    xml=ajax();
    qty=document.getElementById("val"+id).value;
    url="misc/update.php?id="+id+"&qty="+qty;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("cart").innerHTML=data;
            document.getElementById("u_"+id).style.fontWeight="bold";
            document.getElementById("u2_"+id).style.fontWeight="bold";
            document.getElementById("u_"+id).style.color="#FF0000";
            document.getElementById("u2_"+id).style.color="#FF0000";
            setTimeout("warna("+id+")", 1000);
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}
function warna(id){
    document.getElementById("u_"+id).style.fontWeight="normal";
    document.getElementById("u2_"+id).style.fontWeight="normal";
    document.getElementById("u_"+id).style.color="black";
    document.getElementById("u2_"+id).style.color="black";
}