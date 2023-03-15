<?php

class Peminjaman
{
    private \PDO $conn;

    public function __construct()
    {
        global $adb;
        $this->conn = $adb;
    }

    public function dataPeminjaman()
    {
        $sql = "SELECT pj.*, k.nip, k.nama AS karyawan, b.kode AS kode_barang, b.nama AS barang, p.nama AS petugas
                FROM peminjaman pj 
                INNER JOIN karyawan k ON k.id = pj.karyawan_id
                INNER JOIN barang b ON b.id = pj.barang_id
                INNER JOIN petugas p ON p.id = pj.petugas_id
                ORDER BY pj.id DESC";
        $prep = $this->conn->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll();

        return $result;
    }

    public function getPeminjaman($id)
    {
        $sql = "SELECT pj.*, k.nip, k.nama AS karyawan, b.kode AS kode_barang, b.nama AS barang, p.nama AS petugas
                FROM peminjaman pj 
                INNER JOIN karyawan k ON k.id = pj.karyawan_id
                INNER JOIN barang b ON b.id = pj.barang_id
                INNER JOIN petugas p ON p.id = pj.petugas_id
                WHERE pj.id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
        $result = $prep->fetch();

        return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO peminjaman
                (karyawan_id, barang_id, kode, tgl_peminjaman, tgl_pengembalian, petugas_id, keterangan) 
                VALUE (?,?,?,?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function edit($data)
    {
        $sql = "UPDATE peminjaman SET karyawan_id=?, barang_id=?, kode=?, tgl_peminjaman=?, tgl_pengembalian=?, petugas_id=?, keterangan=? WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM peminjaman WHERE id=?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$id]);
    }
}
