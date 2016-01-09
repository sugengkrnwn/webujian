<div class="header">
	<h1 class="page-title">Input Soal</h1>
</div>

<ul class="breadcrumb">
	<li><a href="?page=welcome">Home</a> <span class="divider">/</span></li>
	<li class="active">Soal <span class="divider">/</span></li><li class="active">Input Soal</li>
</ul>
<div class="container-fluid">
<div class="row-fluid">
<?php
if(isset($_SESSION['id_admin'])){
	include ("koneksi.php");
	
	if (isset($_POST['submit'])){
		
		$pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
		$pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
		$pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));
		$pilihan_c=ucwords(htmlentities((trim($_POST['pilihan_c']))));
		$pilihan_d=ucwords(htmlentities((trim($_POST['pilihan_d']))));
		$pilihan_e=ucwords(htmlentities((trim($_POST['pilihan_e']))));
		
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		$type=htmlentities((trim($_POST['type'])));
		
		$query=mysql_query("INSERT INTO tabel_soal SET id_jurusan = '".ucwords(htmlentities((trim($_POST['jurusan']))))."',
								   id_mapel = '".$type."',
								   pertanyaan = '".$pertanyaan."',
								   pilihan_a  = '".$pilihan_a."',
								   pilihan_b  = '".$pilihan_b."',
								   pilihan_c  = '".$pilihan_c."',
								   pilihan_d  = '".$pilihan_d."',
								   pilihan_e  = '".$pilihan_e."',
								   jawaban = '".$jawaban."',
								   publish = '".$publish."'"
								   );
		
		
		
		if($query){
			?><script language="javascript">document.location.href="?page=view&notif=Soal telah ditambahkan";</script><?php
		}else{
			echo mysql_error();
		}
		
	}else{
		unset($_POST['submit']);
	}
	?>
    
    <form action="?page=soal" method="post">
    <table class="datatable">
		<tr>
			<td width="29%" height="37" valign="top"><p>Pertanyaan:</p></td>
			<td><textarea cols="33" rows="5" name="pertanyaan"></textarea></td>
		</tr>
		
		<tr>
			<td width="29%" height="37" valign="middle"><p>Pilihan A:</p></td>
			<td><input type="text" name="pilihan_a" size="30"/></td>
		</tr>
		
		<tr>
			<td width="29%" height="37" valign="middle"><p>Pilihan B:</p></td>
			<td><input type="text" name="pilihan_b" size="30"/></td>
		</tr>
		
		 <tr>
			<td width="29%" height="37" valign="middle"><p>Pilihan C:</p></td>
			<td><input type="text" name="pilihan_c" size="30"/></td>
		</tr>
		
		 <tr>
			<td width="29%" height="37" valign="middle"><p>Pilihan D:</p></td>
			<td><input type="text" name="pilihan_d" size="30"/></td>
		</tr>
		
		 <tr>
		   <td height="37" valign="middle">
			 <p>Pilihan E:</p>
		   </td>
		   <td><input type="text" name="pilihan_e" size="30"/></td>
		 </tr>
		 <tr>
			<td width="29%" height="37" valign="middle"><p><b>Jawaban:</b></p></td>
			<td>
			<select name="jawaban">
				<option value="a">A</option>
				<option value="b">B</option>
				<option value="c">C</option>
				<option value="d">D</option>
				<option value="e">E</option>
			</select>
			</td>
		</tr>
		
		
		<tr>
			<td width="29%" height="37" valign="middle"><p><b>Published:</b></p></td>
			<td>
			<select name="publish">
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			</td>
		</tr>
		
		<!-- <tr>
			<td width="29%" height="37" valign="middle"><p><b>Jurusan:</b></p></td>
			<td>
			<select name="jurusan">
				<option value="1">Pilih Jurusan</option>
			//	<?php
			//		$query = mysql_query("select * from tabel_jurusan")or die(mysql_error());
			//		while($data = mysql_fetch_array($query)){
			//			echo "<option value=$data[0]>$data[1]</option>";
			//		}
			//	?>
				
			</select>
			</td>
		</tr>
		
		<tr>
			<td width="29%" height="37" valign="middle"><p><b>Mata Pelajaran:</b></p></td>
			<td>
			<select name="type">
				<option value="1">Pilih Mapel</option>
			//	<?php
			//		$query = mysql_query("select * from tbl_mapel")or die(mysql_error());
			//		while($data = mysql_fetch_array($query)){
			//			echo "<option value=$data[0]>$data[1]</option>";
			//		}
			//	?>
				
			</select>
			</td>
		</tr-->
		
		<tr>
			<td>&nbsp;</td>
			<td><input class="btn btn-primary" name="submit" type="submit" value="Buat Soal" />&nbsp;</td>
		</tr> 
    </table>
    </form>
</div></div>
    
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
