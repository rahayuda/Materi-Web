<h1>Selamat Datang di Halaman Beranda</h1>
<p>Ini adalah halaman beranda.</p>

<br>

<table border="1">
  <tr>
    <th>No</th>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>

<?php 
for ($x = 1; $x <= 100; $x++) 
{
?>
  <tr>
    <td><?php echo $x ?></td>
    <td>Data [Company]</td>
    <td>Data [Contact]</td>
    <td>Data [Country]</td>
  </tr>
<?php } ?>

</table>

