<div class="header">
	<h1 class="page-title">Edit Soal</h1>
</div>

<ul class="breadcrumb">
	<li><a href="?page=welcome">Home</a> <span class="divider">/</span></li>
	<li class="active">Soal <span class="divider">/</span></li><li class="active">Edit Soal</li>
</ul>
<?php
if(isset($_SESSION['id_admin'])){
	include ("koneksi.php");
	
	if (isset($_POST['submit'])){
		//$id=htmlentities((trim($_GET['id'])));
		$id=$_POST['id'];
		$pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
		$jurusan=ucwords(htmlentities((trim($_POST['jurusan']))));
		$pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
		$pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));
		$pilihan_c=ucwords(htmlentities((trim($_POST['pilihan_c']))));
		$pilihan_d=ucwords(htmlentities((trim($_POST['pilihan_d']))));
		$pilihan_e=ucwords(htmlentities((trim($_POST['pilihan_e']))));
		
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		$type=htmlentities((trim($_POST['type'])));
		
		$query=mysql_query("update `tabel_soal` set `id_mapel`='".$type."',
								   `id_jurusan`='".$jurusan."',
								   `pertanyaan`='".$pertanyaan."',
								   `pilihan_a`='".$pilihan_a."',
								   `pilihan_b`='".$pilihan_b."',
								   `pilihan_c`='".$pilihan_c."',
								   `pilihan_d`='".$pilihan_d."',
								   `pilihan_e`='".$pilihan_e."',
								   `jawaban`='".$jawaban."',
								   `publish`='".$publish."' 
								   where `id_soal`=".$id."");
		
		
		if($query){
			?><script language="javascript">document.location.href="?page=view&notif=Soal telah diperbarui.";</script><?php
		}else{
			echo mysql_error();
		}
		
	}else{
		unset($_POST['submit']);
	}
	?>

    <?php
		$id=$_GET['id'];
		$query=mysql_query("select * from tabel_soal where id_soal='$id'");
		$row=mysql_fetch_array($query);
	?>
	
    <form action="?page=edit" method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>" />
		<table class="datatable" width="95%" align="center">
			<tr>
				<td width="29%" height="37" valign="top"><font size="2" face="verdana"><p>Pertanyaan:</p></font></td>
				<td><textarea cols="23" rows="5" name="pertanyaan"><?php echo $row['pertanyaan']?></textarea></td>
			</tr>
			
			<tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan A:</p></font></td>
				<td><input type="text" name="pilihan_a" size="30" value="<?php echo $row['pilihan_a'];?>"/></td>
			</tr>
			
			<tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan B:</p></font></td>
				<td><input type="text" name="pilihan_b" size="30" value="<?php echo $row['pilihan_b'];?>" /></td>
			</tr>
			
			 <tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan C:</p></font></td>
				<td><input type="text" name="pilihan_c" size="30" value="<?php echo $row['pilihan_c'];?>" /></td>
			</tr>
			
			 <tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan D:</p></font></td>
				<td><input type="text" name="pilihan_d" size="30" value="<?php echo $row['pilihan_d'];?>" /></td>
			</tr>
			
			 <tr>
			   <td height="37" valign="middle"><font size="2" face="verdana">
				 <p>Pilihan E:</p>
			   </font></td>
			   <td><input type="text" name="pilihan_e" value="<?php echo $row['pilihan_e'];?>" size="30"/></td>
			 </tr>
			 <tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>Jawaban:</b></p></font></td>
				<td>
				<select name="jawaban">
					<option value="a" <?php if($row['jawaban']=="A"){ echo "selected='selected'"; }?>>A</option>
					<option value="b" <?php if($row['jawaban']=="B"){ echo "selected='selected'"; }?>>B</option>
					<option value="c" <?php if($row['jawaban']=="C"){ echo "selected='selected'"; }?>>C</option>
					<option value="d" <?php if($row['jawaban']=="D"){ echo "selected='selected'"; }?>>D</option>
					<option value="e" <?php if($row['jawaban']=="E"){ echo "selected='selected'"; }?>>E</option>
				</select>
				</td>
			</tr>
			
			
			<tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>Published:</b></p></font></td>
				<td>
				<select name="publish">
					<option value="yes" <?php if($row['publish']=="yes"){ echo "selected='selected'"; }?>>Yes</option>
					<option value="no" <?php if($row['publish']=="no"){ echo "selected='selected'"; }?>>No</option>
				</select>
				</td>
			</tr>
			
			<tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>Jurusan:</b></p></font></td>
				<td>
				<select name="jurusan">
					<option value="1">Pilih Jurusan</option>
					<?php
						$query = mysql_query("select * from tabel_jurusan")or die(mysql_error());
						while($data = mysql_fetch_array($query)){
							echo "<option value=$data[0]>$data[1]</option>";
						}
					?>
					
				</select>
				</td>
			</tr>
			
			<tr>
				<td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>Mata Pelajaran:</b></p></font></td>
				<td>
				<select name="type">
					<option value="1">Pilih Mapel</option>
					<?php
						$query = mysql_query("select * from tbl_mapel")or die(mysql_error());
						while($data = mysql_fetch_array($query)){
							echo "<option value=$data[0]>$data[1]</option>";
						}
					?>
				</select>
				</td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td><input class="btn btn-primary" name="submit" type="submit" value="Edit Soal" />&nbsp;</td>
			</tr>
		</table>
    </form>

    
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>