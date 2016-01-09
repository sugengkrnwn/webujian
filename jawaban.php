<div>
<?php
if(isset($_SESSION['id_user'])){
?>
        <h1>Hasil Jawaban <?php echo ucwords($_SESSION['username']);?></h1>
        
	   <?php 
       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				$nomor=$id_soal[$i];
				
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					$jawaban=$pilihan[$nomor];
					$query=mysql_query("select * from tabel_soal where id_soal='$nomor' and jawaban='$jawaban'");
					$cek=mysql_num_rows($query);
					
					if($cek){
						$benar++;
					}else{
						$salah++;
					}
				} 
				$score = $benar*(100/$jumlah);
			}
			
			$id_user=$_SESSION['id_user'];
			$tanggal=date("Y-m-d");
			
			$query=mysql_query("insert into tabel_nilai values('','$id_user','$benar','$salah','$kosong','$score','$tanggal')");
		
			if($query){
				?><script language="javascript">document.location.href='?page=nilai&act=ceknilai'</script><?php
			}else{
				echo mysql_error();
			}
		}
		?>
        <form action="?page=simpan" method="post">
		<table width="100%" border="0">
		<tr>
			<td width="12%">Benar</td><td width="88%">= <?php echo $benar;?> soal</td>
		</tr>
		<tr>
			<td>Salah</td><td>= <?php echo $salah;?> soal </td>
		</tr>
		<tr>
			<td>Kosong</td><td>= <?php echo $kosong;?> soal </td>
		</tr>
		<tr>
			<td><b>Score</b></td><td>= <b><?php echo $score;?></b> Point</td>
		</tr>
		</table> 
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <p></p>
        <input type="submit" name="submit" value="Simpan Nilai" onclick="return confirm('Apakah Anda yakin akan menyimpan nilai ujian?')"/>
        
        </form> 
		
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>
