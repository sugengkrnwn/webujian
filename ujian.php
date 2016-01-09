<div>	
<?php

$que = mysql_query("SELECT * FROM tabel_user WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$dx = mysql_fetch_array($que);
if(isset($_SESSION['id_user']))
{
	
	?>
	<div class="header">
		<h1 class="page-title">Selamat mengerjakan, <?php echo $dx['nama_user'];?></h1>
	</div>
	
	<ul class="breadcrumb">
		<li>Sisa waktu: <span id="servertime"></span></li>
	</ul>
	
	<p>
			<?php
			$hasil= mysql_query("select * from tabel_soal where publish='yes'");
			//echo $hasil; exit();
			$jumlah=mysql_num_rows($hasil);
			$urut=0;
			while($row =mysql_fetch_array($hasil))
			{
				$id=$row["id_soal"];
				$pertanyaan=$row["pertanyaan"];
				$pilihan_a=$row["pilihan_a"];
				$pilihan_b=$row["pilihan_b"];
				$pilihan_c=$row["pilihan_c"];
				$pilihan_d=$row["pilihan_d"];
				$pilihan_e=$row["pilihan_e"]; 
				
				?>
  <form name="form1" method="post" action="?page=jawaban">
				<input type="hidden" name="id[]" value=<?php echo $id; ?>>
				<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
	<table width="616" border="0">
				<tr>
					<td width="23"><font color="#000"><?php echo $urut=$urut+1; ?>.</font></td>
					<td width="583"><font color="#000"><?php echo "$pertanyaan"; ?></font></td>
				</tr>
				<tr>
					<td height="21">&nbsp;</td>
					<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> <font color="#000"><?php echo "$pilihan_a";?></font> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> <font color="#000"><?php echo "$pilihan_b";?></font> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> <font color="#000"><?php echo "$pilihan_c";?></font> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> <font color="#000"><?php echo "$pilihan_d";?></font> </td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="E">
				  <font color="#000"><?php echo "$pilihan_e";?></font></td>
	  </tr>
	</table>
    <br>
			<?php
		} 
?>
        	<tr>
				<td>&nbsp;</td>
			  	<td>
                <br>
<br>

			  	  <table width="100%" border="0">
			  	    <tr>
			  	      <td width="2%">&nbsp;</td>
			  	      <td width="40%"><input class="btn btn-primary" type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
			  	      <td width="58%">&nbsp;</td>
		  	        </tr>
	  	        </table></td>
            </tr>
		</form>
        </p>

<?php

}else { 
	?>
<p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>

</div>


<?php
if(isset($_POST['save']))
{
	for($x = 0; $x<count($_POST['id_s']); $x++)
	{
		$nomor = $_POST['id_s'][$x];
		$save = mysql_query("INSERT INTO 
									jawaban_esai 
										SET 
											id_soal = '".$nomor."',
											id_p	= '".$_SESSION['id_user']."',
											jawaban = '".$_POST['jawab'][$x]."'")or die("gagal ".mysql_error());
		
		
	}
	?><script language="javascript"> alert('oke'); </script> <?php
	require_once('logout.php');
}
?>