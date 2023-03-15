<?php

class Barang
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataBarang()
    {
        $sql = "SELECT b.*, k.nama AS kategori
                FROM barang b 
                INNER JOIN kategori k ON k.id = b.kategori_id
                ORDER BY b.id";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getBarang($id)
    {
        $sql = "SELECT b.*, k.nama AS kategori
                FROM barang b 
                INNER JOIN kategori k ON k.id = b.kategori_id
                WHERE b.id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO barang
                (kode, nama, harga, satuan, jumlah, kategori_id, foto, keterangan) 
                VALUE (?,?,?,?,?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function edit($data)
    {
        $sql = "UPDATE barang SET kode=?, nama=?, harga=?, satuan=?, jumlah=?, kategori_id=?, foto=?, keterangan=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM barang WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }
}
