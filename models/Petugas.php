<?php

class Petugas
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataPetugas()
    {
        $sql = "SELECT * FROM petugas";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getPetugas($id)
    {
        $sql = "SELECT * FROM petugas
                WHERE id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data_register)
    {
        $sql = "INSERT INTO petugas (nip, nama, gender,no_telp, alamat, username, email, password, role, foto) 
                VALUE (?,?,?,?,?,?,?,SHA1(MD5(SHA1(?))),?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data_register);
    }

    public function edit($data_register)
    {
        $sql = "UPDATE petugas SET nip=?, nama=?, gender=?, no_telp=?, alamat=?, username=?, email=?, password=SHA1(MD5(SHA1(?))), role=?, foto=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data_register);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM petugas WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }

    public function loginCheck($data)
    {
        $sql = "SELECT * FROM petugas WHERE 
                username = ? AND password = SHA1(MD5(SHA1(?)))";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
        $result = $prep->fetch();

        return $result;
    }
}
