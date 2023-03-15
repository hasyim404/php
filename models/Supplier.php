<?php

class Supplier
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataSupplier()
    {
        $sql = "SELECT * FROM supplier
                ORDER BY id DESC";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getSupplier($id)
    {
        $sql = "SELECT * FROM supplier
                WHERE id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO supplier
                (kode, nama, no_telp, alamat) 
                VALUE (?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function edit($data)
    {
        $sql = "UPDATE supplier SET kode=?, nama=?, no_telp=?, alamat=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM supplier WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }
}
