
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
        $this->stock_bahan = $stock_bahan;
        $this->keperluan_per_item = $keperluan_per_item;
    }
}
?>
