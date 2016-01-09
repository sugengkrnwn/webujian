	<?php
	if(isset($_SESSION['id_user'])){
		$id_user=$_SESSION['id_user'];?>
		<div class="header">
			<h1 class="page-title">Nilai <?php echo $_SESSION['username'];?></h1>
		</div>
		
		<div class="container-fluid">
		<div class="row-fluid">
		<p>
			<table class="table table-striped" border="1">
				<tr>
					<th width="15px"><center>No</center></th>
					<th><center>Benar</center></th>
					<th><center>Salah</center></th>
					<th><center>Kosong</center></th>
					<th><center>Skor</center></th>
					<th><center>Tanggal</center></th>
				</tr>
				<?php
				$no=0; 
				$query=mysql_query("select * from tabel_nilai where id_user='$id_user'");
				
				while($row=mysql_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $no=$no+1; ?></td>
						<td><?php echo $row['benar'];?></td>
						<td><?php echo $row['salah'];?></td>
						<td><?php echo $row['kosong'];?></td>
						<td><?php echo $row['point'];?></td>
						<td><?php echo $row['tanggal'];?></td>
					</tr>
				<?php	
				}
				?>
			</table>
		</p></div></div>
	<?php } ?>