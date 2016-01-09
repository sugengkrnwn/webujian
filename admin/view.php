<div class="header">
	<h1 class="page-title">Daftar Soal</h1>
</div>

<ul class="breadcrumb">
	<li><a href="?page=welcome">Home</a> <span class="divider">/</span></li>
	<li class="active">Soal <span class="divider">/</span></li><li class="active">Daftar Soal</li>
</ul>

<div class="container-fluid">
<div class="row-fluid">
<?php
if(isset($_SESSION['id_admin'])){

	if(isset($_GET['notif'])){
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Berhasil! </strong>';
		echo $_GET['notif'];
		echo '</div>';
	}
?>


		
        <p>
        <?php
		
		$q = "select ts.*, 
					 tm.nama_mpl, 
					 tj.nama_jurusan 
						from 
							tabel_soal ts LEFT JOIN tbl_mapel tm 
								ON ts.id_mapel = tm.id_mapel 
										  LEFT JOIN tabel_jurusan tj 
								ON ts.id_jurusan = tj.id_jurusan";
								
		if(isset($_GET['submit']))
		{
			if(isset($_GET['soal']) != ""){
				$sql_p[] = "ts.pertanyaan LIKE '%".$_GET['soal']."%'";
			}
			
			if($_GET['type'] != 0){
				$sql_p[] = "ts.id_mapel = '".$_GET['type']."'";
			}
			
			if(count($sql_p) > 0) $q .= " WHERE ";
			$sql_p = @implode(' AND ',$sql_p);
			$q = $q.$sql_p;
		}
		//print_r($q);
				$query=mysql_query($q);
				$q .= "ORDER BY ts.id_soal DESC";
				?><table border="0"><?php
				$no=0;
				while($row=mysql_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $no=$no+1;?>.</td><td><?php echo $row['pertanyaan'];?></td>
					</tr>
					<tr>
						<td></td><td>A) <?php echo $row['pilihan_a'];?></td>
					</tr>
					<tr>
						<td></td><td>B) <?php echo $row['pilihan_b'];?></td>
					</tr>
					<tr>
						<td></td><td>C) <?php echo $row['pilihan_c'];?></td>
					</tr>
					<tr>
						<td></td><td>D) <?php echo $row['pilihan_d'];?></td>
					</tr>
					<tr>
					  <td></td>
					  <td>E) <?php echo $row['pilihan_e'];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Jawaban: <b><?php echo $row['jawaban'];?></b>
						<a href="?page=edit&id=<?php echo $row['id_soal']?>" title="Edit soal">Edit</a> / 
						<a href="?page=delete&id=<?php echo $row['id_soal']?>" title="Hapus soal" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')">Hapus </a>]
						</td>
					</tr>
					<tr>
						<td colspan="2"><br /></td>
					</tr>
				<?php
				
			}
		?>
        </table>
        </p>
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div></div></div>
