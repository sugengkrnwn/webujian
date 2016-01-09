<html>
<head>
</head>
<body >

<?php

include ('sambung.php');


$nama  = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];

$input = mysql_query ("INSERT INTO koment (nama , email, komentar)
VALUES ('$nama','$email','$komentar')");


?>

<form action="input.php" name="formsiswa" method="post">
<table>
<tr><td>Nama</td><td><input name="nama" type="text" value="" size="25" maxlength="25" /></td></tr>
<tr><td>Email</td><td><input name="email" type="text" value="" size="25" maxlength="25" /></td></tr>
<tr><td>Komentar</td><td><textarea name="komentar" cols="25" rows="5"></textarea></td></tr>
<tr><td></td><td><input name="save" type="submit" value="save" /></td></tr>
</table>
</form>

<?php

include('sambung.php');

$tampil = mysql_query("SELECT * FROM koment WHERE 1");

echo "<table border=1 align=center width=100% bgcolor=white>";

while ($tampil2 = mysql_fetch_array($tampil)){

echo '<tr><td><p align=right>'.$tampil2['Nama'].'</p></td></tr>';
echo '<tr><td><p align=right>'.$tampil2['Email'].'</p></td></tr>';
echo '<tr><td>Komentar<br><p align=right>'.$tampil2['komentar'].'</p></td></tr>';
echo '<tr><td bgcolor=green></td></tr>';
}

echo "</table>";

?>
</body>
</html>