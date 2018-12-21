
<?php
// Tell whomever is receiving this data the content type
// Needs to be set on the first line
// header('Content-Type: application/json');
// Insert to the DataDB class

require_once('DataDB.php');

// Get a connection to the database

require_once('../mysqli_connect.php');

// Check the connection

if (mysqli_connect_errno()) {

    printf("Connect failed: %s\n", mysqli_connect_error());

    exit();

}


$query = "SELECT * FROM databaseitem WHERE no_item IN (1,2)";


$student_array = array();

if($result = $dbc->query($query)){

    while ($obj = $result->fetch_object()){


        printf("%s %s %s %s %s  <br />",

        $obj->no_item, $obj->nama_barang, $obj->bahan,

        $obj->stock_bahan, $obj->keperluan_per_item);

        $temp_student = new DataDB($obj->no_item, $obj->nama_barang, $obj->bahan,

        $obj->stock_bahan, $obj->keperluan_per_item);

        $student_array[] = $temp_student;

    }

    echo "<br /><br />";

    // Surround the data
    echo '{"data":[';
    // Take data array created and convert into JSON
    $dale_data = json_encode($student_array[0]);
    echo $dale_data;
    // Seperate the results
    echo ',<br />';
    $dale_data = json_encode($student_array[1]);
    echo $dale_data . "<br />";

    // Close the JSON data

    echo ']}';

    // Close the database connection
    $result->close();
    $dbc->close();

}

?>
