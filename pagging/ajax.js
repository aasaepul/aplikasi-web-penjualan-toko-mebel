function ajax(){
    var xml;
    try{
        xml=new XMLHttpRequest();
    }catch(e){
        try{
            xml=new ActiveXObject("Msxml.XMLHTTP");
        }catch(e1){
            try{
                xml=new ActiveXObject("Microsoft.XMLHTTP");
            }catch(e2){
                alert("Browser tidak support ajax");
            }
        }
    }
    return xml;
}