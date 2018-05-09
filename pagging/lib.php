<?PHP
    $connect=konek();
    function konek(){
    include("administrator/app/conn.php");
         error_reporting(0);
    }
    function fRow($sql){
        return mysql_fetch_row($sql);
    }
    function nRow($sql){
        return mysql_num_rows($sql);
    }
    function fObj($sql){
        return mysql_fetch_object($sql);
    }
    function sql($data){
        return mysql_query($data);
    }
    function fAr($sql){
        return mysql_fetch_array($sql);
    }
    function uang($n){
        return "Rp. ".number_format($n,0,",",".")." ,-";
    }
    function go($url,$time){
		echo "<meta http-equiv='refresh' content='$time,$url' />";
    }

	function paggingberita($sql,$limit,$page){
		empty($page)?$page=1:"";
		$awal=($page-1)*$limit;
		$query=sql($sql." limit $awal,$limit");
		$jumPage=ceil(nRow(sql($sql))/$limit);
		$ret=array("query"=>$query,"jum"=>$jumPage);
		return $ret;
	}function num_page($url,$page,$jum){
		empty($page)?$page=1:"";
		echo "<div class='pagination-area'>";
		echo "<ul class='pagination'>";
		if($page>1){
			echo "<li class='active'><a href='$url&hal=1'>Pertama</a></li> ";
		}else{
			echo "";
		}
		for($i=1;$i<=$jum;$i++){
			if($i==$page){
				echo " <li><a href='$url&hal=$i'>$i</a></li> ";
			}else{
				echo " <li><a href='$url&hal=$i'>$i</a></li> ";			
			}
		}
		if($page<$jum){
			echo " <li><a href='$url&hal=$jum'>Terakhir<i class='fa fa-long-arrow-right'></a></i>";
		}else{
			echo "";
		}
		echo "</ul>";
		echo "</div>";
	}

	function paggingproduct($sql,$limit,$page){
		empty($page)?$page=1:"";
		$awal=($page-1)*$limit;
		$query=sql($sql." limit $awal,$limit");
		$jumPage=ceil(nRow(sql($sql))/$limit);
		$ret=array("query"=>$query,"jum"=>$jumPage);
		return $ret;
	}function numb_page($url,$page,$jum){
		empty($page)?$page=1:"";
		echo "<div class='pagination-area'>";
		echo "<ul class='pagination'>";
		if($page>1){
			echo "<li class='active'><a href='$url&hal=1'>Pertama</a></li> ";
		}else{
			echo "";
		}
		for($i=1;$i<=$jum;$i++){
			if($i==$page){
				echo " <li><a href='$url&hal=$i'>$i</a></li> ";
			}else{
				echo " <li><a href='$url&hal=$i'>$i</a></li> ";			
			}
		}
		if($page<$jum){
			echo " <li><a href='$url&hal=$jum'>Terakhir <i class='fa fa-chevron-circle-right'></i></a></li>";
		}else{
			echo "";
		}
		echo "</ul>";
		echo "</div>";
	}

	function dlFile($namafile){
			
			$file_dir="../images/produk/";
			// $file_name=str_replace("/", "", $namafile);
			// $file_name=str_replace("\\", "", $file_name);
			$file_name=$namafile;
			// echo "<img src='".$file_dir."/".$file_name."'/>";die();
			
			if(file_exists($file_dir.$file_name)){
				$file_size=filesize($file_dir.$file_name);
				$fh=fopen($file_dir.$file_name, "r");
				$speed=5;
				$start=0;
				$end=$file_size-1;
				if(isset($_SERVER['HTTP_RANGE']) &&
					preg_match('/^bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $arr)){
					$start=$arr[1];
					if($arr[2]){
						$end=$arr[2];
					}
				}
				
			if($start>$end || $start>=$file_size){
				header("HTTP/1.1 416 Requested Range Not Satisfiable");
				header("Content-Length: 0");
			}else{
				if($start==0 && $end==$file_size){
					header("HTTP/1.1 200 OK");
				}else{
					header("HTTP/1.1 206 Partial Content");
					header("Content-Range: bytes ".$start."-".$end."/".$file_size);
				}
				$left=$end-$start+1;
				header("Content-Type: application/octet-stream");
				header("Accept-Ranges: bytes");
				header("Content-Length: ".$left);
				header("Content-Disposition: attachment; filename=".$file_name);
				fseek($fh, $start);
				while($left>0){
					$bytes=$speed*1024;
					echo fread($fh, $bytes);
					flush();
					$left-=$bytes;
					sleep(1);
				}
			}
			fclose($fh);
		exit();
		}
	}
	
	//$dataP=pagging($sql,5,$_GET[hal]);
	//while($d=fObj($dataP[query])){
	//num_page("index.php?go=berita",$_GET[hal],$dataP[jum]);
?>