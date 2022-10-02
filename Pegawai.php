<?php
class Pegawai
{
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;

    static $jml = 0;
    const PEGAWAI = 'Data Pegawai PT ABCD';

    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }

    public function setGajiPokok()
    {
        switch ($this->jabatan) {
            case 'Manager':
                $gajiPokok = 15000000;
                break;
            case 'Asisten Manager':
                $gajiPokok = 10000000;
                break;
            case 'Kepala Bagian':
                $gajiPokok = 7000000;
                break;
            case 'Staff':
                $gajiPokok = 4000000;
                break;
            default:
                $gajiPokok = 0;
        }
        return $gajiPokok;
    }

    public function setTunJab()
    {
        $tunJab = 0.2 * $this->setGajiPokok();
        return $tunJab;
    }

    public function setTunKel()
    {
        $tunKel = $this->status == 'Menikah' ? 'Rp. ' . number_format(0.1 * $this->setGajiPokok(), 0, ',', '.') : "Nikah Dulu";
        return $tunKel;
    }

    public function setGajiKotor()
    {
        $gajiKotor = $this->setGajiPokok() + $this->setTunJab() + is_numeric($this->setTunKel());
        return $gajiKotor;
    }

    public function setZakatProfesi()
    {
        $zakatProfesi = $this->agama == 'Islam' && $this->setGajiKotor() >= 6000000 ? 0.025 * $this->setGajiKotor() : 0;
        return $zakatProfesi;
    }

    public function mencetak()
    {
        // echo '<b><u>' . self::PEGAWAI . '</u></b>';

        echo
        '   
            <td>' . $this->nip . '</td>
            <td>' . $this->nama . '</td>
            <td>' . $this->jabatan . '</td>
            <td>' . $this->agama . '</td>
            <td>' . $this->status . '</td>
            <td>Rp. ' . number_format($this->setGajiPokok(), 0, ',', '.') . '</td>
            <td>Rp. ' . number_format($this->setTunJab(), 0, ',', '.') . '</td>
            <td>' . $this->setTunKel() . '</td>
            <td>Rp. ' . number_format($this->setZakatProfesi(), 0, ',', '.') . '</td>
            <td>Rp. ' . number_format($this->setGajiKotor(), 0, ',', '.') . '</td>
        </tr>';
    }
}
