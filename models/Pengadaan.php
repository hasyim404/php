<?php

class Pengadaan
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataPengadaan()
    {
        $sql = "SELECT p.*, sp.nama AS supplier, pt.nama AS petugas
                FROM pengadaan p 
                INNER JOIN supplier sp ON sp.id = p.supplier_id
                INNER JOIN petugas pt ON pt.id = p.petugas_id
                ORDER BY p.id";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getPengadaan($id)
    {
        $sql = "SELECT p.*, sp.nama AS supplier, pt.nama AS petugas
                FROM pengadaan p 
                INNER JOIN supplier sp ON sp.id = p.supplier_id
                INNER JOIN petugas pt ON pt.id = p.petugas_id
                WHERE p.id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    // public function save($data)
    // {
    //     $sql = "INSERT INTO pengadaan
    //             (kode, nama, harga, satuan, jumlah, kategori_id, foto, keterangan) 
    //             VALUE (?,?,?,?,?,?,?,?)";
    //     $prep = $this->conn->prepare($sql);
    //     $prep->execute($data);
    // }

    // public function edit($data)
    // {
    //     $sql = "UPDATE pengadaan SET kode=?, nama=?, harga=?, satuan=?, jumlah=?, kategori_id=?, foto=?, keterangan=? WHERE id=?";
    //     $prep = $this->conn->prepare($sql);
    //     $prep->execute($data);
    // }

    // public function delete($id)
    // {
    //     $sql = "DELETE FROM pengadaan WHERE id=?";
    //     $prep = $this->conn->prepare($sql);
    //     $prep->execute([$id]);
    // }
}
