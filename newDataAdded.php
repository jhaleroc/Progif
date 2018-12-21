<html>
<head>
<title>Add Student</title>
<a href = "halamanUtama.php">Kembali ke halaman utama</a><br />
</head>
<body>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['no_item'])){
        // Adds no item to array
        $data_missing[] = 'No Item';
    } else {
        // Trim white space from the no item and store the no item
        $n_item = trim($_POST['no_item']);
    }
    if(empty($_POST['nama_barang'])){
 
        // Adds nama to array
        $data_missing[] = 'Nama Barang';
    } else{
        // Trim white space from the nama and store the nama
        $n_barang = trim($_POST['nama_barang']);
    }
    if(empty($_POST['bahan'])){
        // Adds bahan to array
        $data_missing[] = 'Bahan';
    } else {
        // Trim white space from the bahan and store the bahan
        $bahan = trim($_POST['bahan']);
    }
    if(empty($_POST['stock_bahan'])){
        // Adds stock bahan to array
        $data_missing[] = 'Stock Bahan';
    } else {
        // Trim white space from the stock bahan and store the stock bahan
        $s_bahan = trim($_POST['stock_bahan']);
    }
    if(empty($_POST['keperluan_per_item'])){
        // Adds keperluan per item to array
        $data_missing[] = 'Keperluan Per Item';
    } else {
        // Trim white space from the keperluan per item and store the keperluan per iutem
        $k_item = trim($_POST['keperluan_per_item']);
    }

    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO databaseitem (no_item, nama_barang, bahan,
        stock_bahan, keperluan_per_item) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "issii", $n_item,
                               $n_barang, $bahan, $s_bahan, $k_item);

        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Data Bahan dimasukkan';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);

        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }

    } else {

        echo 'Masukkan data berikut<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }
}
?>

<form action="http://localhost/progif/newDataAdded.php" method="post">

<b>Add a New Data</b>

<p>No Item:
<input type="text" name="no_item" size="30" value="" />
</p>
 
<p>Nama Barang:
<input type="text" name="nama_barang" size="30" value="" />
</p>
 
<p>Bahan:
<input type="text" name="bahan" size="30" value="" />
</p>
 
<p>Stock Bahan:
<input type="text" name="stock_bahan" size="30" value="" />
</p>
 
<p>Keperluan Per Item:
<input type="text" name="keperluan_per_item" size="30" value="" />
</p>
 
<p>
<input type="submit" name="submit" value="Send" />
</p>
 
</form>
</body>
</html>

