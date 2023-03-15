<?php

class Karyawan
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataKaryawan()
    {
        $sql = "SELECT * FROM karyawan";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getKaryawan($id)
    {
        $sql = "SELECT * FROM karyawan WHERE id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO karyawan
                (nip, nama, gender, no_telp, alamat, foto) 
                VALUE (?,?,?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function edit($data)
    {
        $sql = "UPDATE karyawan SET nip=?, nama=?, gender=?, no_telp=?, alamat=?, foto=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM karyawan WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }
}
