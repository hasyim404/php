<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D
{
    public $alas;
    public $tinggi;
    const BENTUK = 'Segitiga Siku-Siku';

    public function __construct($alas, $tinggi)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function luasBidang()
    {
        $luas = 0.5 * ($this->alas * $this->tinggi);
        return $luas;
    }

    public function sisiMiring()
    {
        $s_miring = sqrt(pow($this->tinggi, 2) + pow($this->alas, 2));
        return $s_miring;
    }

    public function kelilingBidang()
    {
        $keliling = $this->tinggi + $this->alas + $this->sisiMiring();
        return $keliling;
    }


    public function cetak()
    {
        echo
        '   
            <td>' . self::BENTUK . '</td>
            <td>
                Alas: ' . $this->alas . ' cm<br>
                Tinggi: ' . $this->tinggi . ' cm<br>
                Sisi Miring: ' . round($this->sisiMiring()) . ' cm
            </td>
            <td>' . round($this->luasBidang()) . ' cm</td>
            <td>' . round($this->kelilingBidang()) . ' cm</td>
        </tr>';
    }
}
