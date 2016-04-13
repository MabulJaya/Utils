
	
<html>
<body>

<form action="index.php" method="post">
Prefix(so/ku) <input type="text" name="prefixname" size="5px">
Jur <input type="text" name="jurusan" size="5px">
Paket <input type="text" name="paket" size="5px">
Mapel <input type="text" name="prefixmapel" size="5px">
Jumlah <input size="5px" type="text" name="jumlah" size="5px">
<input type="submit">
</form>

</body>
</html>

<?php
	
	function Terbilang($x)
	{
	  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	  if ($x < 12)
		return "" . $abil[$x];
	  elseif ($x < 20)
		return Terbilang($x - 10) . "belas";
	  elseif ($x < 100)
		return Terbilang($x / 10) . "puluh" . Terbilang($x % 10);
	  elseif ($x < 200)
		return "seratus" . Terbilang($x - 100);
	  elseif ($x < 1000)
		return Terbilang($x / 100) . "ratus" . Terbilang($x % 100);
	  elseif ($x < 2000)
		return "seribu" . Terbilang($x - 1000);
	  elseif ($x < 1000000)
		return Terbilang($x / 1000) . "ribu" . Terbilang($x % 1000);
	  elseif ($x < 1000000000)
		return Terbilang($x / 1000000) . "juta" . Terbilang($x % 1000000);
	}

	if (isset($_POST["prefixname"]) && isset($_POST["jurusan"]) && isset($_POST["paket"]) && 
		isset($_POST["prefixmapel"]) && isset($_POST["jumlah"])) { 
		
		$prefixname = $_POST["prefixname"];
		$jurusan = $_POST["jurusan"];
		$paket = $_POST["paket"];
		$prefixmapel = $_POST["prefixmapel"];
		
		$jumlah = (integer)$_POST["jumlah"];
		
		for ($i = 1; $i <= $jumlah; $i++){
	    	rename("folderku/".$i.".png", "output/".$prefixname.$jurusan.$paket.$prefixmapel.Terbilang($i).".png");		
	    }

	} 

?>
