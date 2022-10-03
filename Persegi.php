<?php
require_once 'Bentuk2D.php';
class Persegi extends Bentuk2D
{
    public $panjang;
    public $lebar;
    const BENTUK = 'Persegi Panjang';

    public function __construct($panjang, $lebar)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luasBidang()
    {
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }

    public function kelilingBidang()
    {
        $keliling = 2 * ($this->panjang * $this->lebar);
        return $keliling;
    }

    public function cetak()
    {
        echo
        '   
            <td>' . self::BENTUK . '</td>
            <td>
                Panjang: ' . $this->panjang . ' cm<br>
                Lebar: ' . $this->lebar . ' cm
            </td>
            <td>' . round($this->luasBidang()) . ' cm</td>
            <td>' . round($this->kelilingBidang()) . ' cm</td>
        </tr>';
    }
}
