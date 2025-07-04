<center>
<font size=7>
Tampil Data Pengunjung<br>
<hr>

<table border="10">
    <tr bgcolor="silver">
        <td width="50"><center>Id</center></td>
        <td width="150"><center>Nama Pengunjung</center></td>
        <td width="100"><center>Jenis Kelamin</center></td>
        <td width="150"><center>Tanggal Berkunjung</center></td>
        <td width="100"><center>Hobi</center></td>
        <td width="100"><center>Disukai</center></td>
    </tr>
<?php
require ("Koneksi.php");
$sql="SELECT * FROM pengunjung";
$hasil = mysqli_query($conn, $sql);
$n=1;
while ($row = mysqli_fetch_row($hasil))
{
list ($id, $nama_pengunjung, $jenis_kelamin, $tanggal_berkunjung, $hobi, $disukai) = $row;
echo "<tr><td>$n</td><td>$nama_pengunjung</td><td>$jenis_kelamin</td><td align=right>$tanggal_berkunjung</td><td align=right>$hobi</td><td>$disukai</td></tr>";
$n++;
}
?>
</table>
</center>