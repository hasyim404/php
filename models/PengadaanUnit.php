<?php

class PengadaanUnit
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataPengadaanUnit()
    {
        $sql = "SELECT pu.*, b.kode AS kode_brg, b.nama AS barang, p.supplier_id, sup.kode as kode_supp, sup.nama as nama_supp, p.tgl_pengadaan
                FROM pengadaan_unit pu 
                INNER JOIN barang b ON b.id = pu.barang_id
                INNER JOIN pengadaan p ON p.id = pu.pengadaan_id
                INNER JOIN supplier sup ON sup.id = p.supplier_id";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getPengadaanUnit($id)
    {
        $sql = "SELECT pu.*, b.kode AS kode_brg, b.nama AS barang, sup.nama AS supplier, sup.kode as kode_supp, sup.nama as nama_supp, p.tgl_pengadaan
                FROM pengadaan_unit pu 
                INNER JOIN barang b ON b.id = pu.barang_id
                INNER JOIN pengadaan p ON p.id = pu.pengadaan_id
                INNER JOIN supplier sup ON sup.id = p.supplier_id
                WHERE pu.id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO pengadaan_unit
                (no_pengadaan, pengadaan_id, jenis, keterangan, barang_id, deskripsi_barang, harga, jumlah) 
                VALUE (?,?,?,?,?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function edit($data)
    {
        $sql = "UPDATE pengadaan_unit SET no_pengadaan=?, pengadaan_id=?, jenis=?, keterangan=?, barang_id=?, deskripsi_barang=?, harga=?, jumlah=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pengadaan_unit WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }
}
