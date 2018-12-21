<html>
	<head>
		<title>Get data Produksi</title>
		<a href = "halamanUtama.php">Kembali ke halaman utama</a><br />
</head>
      
</html>

<?php

// Get a connection for the database

require_once('../mysqli_connect.php');

// Create a query for the database

$query = "SELECT no_item, nama_barang, bahan, stock_bahan, keperluan_per_item FROM databaseitem";

// Get a response from the database by sending the connection

// and the query

$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed

if($response){

echo '<table align="left"

cellspacing="5" cellpadding="8">

<tr><td align="left"><b>No Item</b></td>

<td align="left"><b>Nama Barang</b></td>

<td align="left"><b>Bahan</b></td>

<td align="left"><b>Stock Bahan</b></td>

<td align="left"><b>Keperluan Per Item</b></td></tr>';

 

// mysqli_fetch_array will return a row of data from the query

// until no further data is available

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .

$row['no_item'] . '</td><td align="left">' .

$row['nama_barang'] . '</td><td align="left">' .

$row['bahan'] . '</td><td align="left">' .

$row['stock_bahan'] . '</td><td align="left">' .

$row['keperluan_per_item'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);
?>
