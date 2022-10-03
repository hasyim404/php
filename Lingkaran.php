<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D
{
    public $jari2;
    const BENTUK = 'Lingkaran';

    public function __construct($jari2)
    {
        $this->jari2 = $jari2;
    }

    public function luasBidang()
    {
        $luas = pi() * pow($this->jari2, 2);
        return $luas;
    }

    public function kelilingBidang()
    {
        $keliling = 2 * (pi() * $this->jari2);
        return $keliling;
    }

    public function cetak()
    {
        echo
        '   
            <td>' . self::BENTUK . '</td>
            <td>
                Jari-jari: ' . round($this->jari2) . ' cm
            </td>
            <td>' . round($this->luasBidang()) . ' cm</td>
            <td>' . round($this->kelilingBidang()) . ' cm</td>
        </tr>';
    }
}
