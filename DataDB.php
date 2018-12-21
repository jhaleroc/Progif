
<?php

class DataDB {
 
    public $no_item = "";
    public $nama_barang = "";
    public $bahan = "";
    public $stock_bahan = "";
    public $keperluan_per_item = "";
 

    function __construct($no_item, $nama_barang, $bahan, $stock_bahan, $keperluan_per_item){

        $this->no_item = $no_item;
        $this->nama_barang = $nama_barang;
        $this->email = $bahan;
        $this->street = $stock_bahan;
        $this->city = $keperluan_per_item;
    }
}
?>
