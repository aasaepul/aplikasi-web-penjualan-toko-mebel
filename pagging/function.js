function waktu(){
		hariA=Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		bulanA=Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		date=new Date();
		jam=date.getHours();
		menit=date.getMinutes();
		detik=date.getSeconds();
		hari=date.getDay();
		tgl=date.getDate();
		bulan=date.getMonth();
		tahun=date.getYear()+1900;
		isi="<div>"+hariA[hari]+" "+tgl+" "+bulanA[bulan]+" "+tahun+"&nbsp;&nbsp;&nbsp;Jam "+jam+":"+menit+":"+detik+"</div>";
		document.getElementById("waktu").innerHTML=isi;
		setTimeout("waktu()",500);
}

function show_a(id){
	document.getElementById("hide_a_"+id).style.visibility='visible';
}function hide_a(id){
	document.getElementById("hide_a_"+id).style.visibility='hidden';
}function tutup(){
	document.getElementById("pesan").innerHTML="<a href='javascript:void(0)' onClick='pesan()' class='button'>Kirim Pesan</a><br><br>";
}
function show_b(id){
	document.getElementById("hide_b_"+id).style.visibility='visible';
}function hide_b(id){
	document.getElementById("hide_b_"+id).style.visibility='hidden';
}function a(id){
	val=document.getElementById("komen").value;
    xml=ajax();
    url="../main/misc/proses.php?komen="+val+"&id="+id+"&mode=komen";
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("komentar").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function pesan(id){
    xml=ajax();
    url="../main/misc/proses.php?mode=pesan&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("pesan").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function det_trans(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=det_trans&id="+id;
	document.getElementById("det_trans").innerHTML="<div style='background:#fff;border:1px solid #ff6;margin-left:200px;position:absolute;width:200px;padding:5px;'>Tunggu Sebentar...</b></div>";
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("det_trans").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function det_transp(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=det_transp&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("det_trans").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function det_bar(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=det_bar&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("det_bar").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function det_user(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=det_user&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("det_user").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function det_rek(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=det_rek&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("det_rek").innerHTML=data;
			
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function t_det_user(){
	document.getElementById('det_user').innerHTML='';
}function t_det_trans(){
	document.getElementById('det_trans').innerHTML='';
}function t_det_bar(){
	document.getElementById('det_bar').innerHTML='';
}function t_det_rek(){
	document.getElementById('det_rek').innerHTML='';
}function pPesan(id){
	judul=document.getElementById("judul").value;
	p=document.getElementById("p").value;
    xml=ajax();
    url="../main/misc/proses.php?mode=pPesan&judul="+judul+"&p="+p+"&id="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("pesan").innerHTML=data;
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}function get(id){
    xml=ajax();
    url="../admin/misc/proses.php?mode=get&tabel="+id;
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            data=xml.responseText;
            document.getElementById("field").innerHTML=data;
        }
    }
    xml.open("GET",url,true);
    xml.send(null);
}

var idrow = 1; 
function tambah(){ 
    var x=document.getElementById('datatable').insertRow(idrow);
	var katI=document.getElementById('kategori').innerHTML;
	var katV=document.getElementById('kategori').value; 
    var td1=x.insertCell(0); 
	var idrows=idrow+1;
    td1.innerHTML="<br> No."+idrows+"<br>Kategori&nbsp;&nbsp;&nbsp; : <select name='kategori[]' id='kategori'><option value='"+katV+"'>"+katI+"</option></select><br>ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='isbn[]' > <br>Nama Buku : <input type ='text' name='nama[]'><br>Penulis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='penulis[]'> <br>Penerbit&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='penerbit[]'> <br>Harga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='text' name='harga[]' > <br>Stok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='stok[]' > <br>Kondisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type ='text' name='kondisi[]'> <br>Gambar&nbsp;&nbsp;&nbsp;&nbsp; : <input type ='file' name='gambar[]'> <br>Deskripsi&nbsp;&nbsp; : <textarea name='deskripsi[]'></textarea>"; 
    idrow++; 
} 
 
function hapus(){ 
    if(idrow>1){ 
        var x=document.getElementById('datatable').deleteRow(idrow-1); 
        idrow--; 
    } 
}