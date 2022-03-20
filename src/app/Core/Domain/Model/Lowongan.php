<?php

namespace App\Core\Domain\Model;

use DateTime;

class Lowongan {
    private int $id;
    private int $dosen_id;
    private int $mata_kuliah_id;
    private string $kode_kelas;
    private int $gaji;
    private DateTime $tanggal_mulai;
    private DateTime $tanggal_selesai;
    private string $deskripsi;
    private bool $terbuka;
    private DateTime $created_at;

    public function __construct(
        int $id,
        int $dosen_id,
        int $mata_kuliah_id,
        string $kode_kelas,
        int $gaji,
        DateTime $tanggal_mulai,
        DateTime $tanggal_selesai,
        string $deskripsi,
        bool $terbuka,
        ?DateTime $created_at
    ) {
        if ($id < 1) throw new \InvalidArgumentException("Invalid id format.");
        if ($dosen_id < 1) throw new \InvalidArgumentException("Invalid dosen_id format.");
        if ($kode_kelas == '\0') throw new \InvalidArgumentException("kode_kelas can not be null string.");
        if ($gaji < 0) throw new \InvalidArgumentException("Invalid gaji format.");
        if ($tanggal_selesai < $tanggal_mulai) throw new \InvalidArgumentException("Invalid tanggal_mulai and tanggal_selesai format.");
        if ($deskripsi == '\0') throw new \InvalidArgumentException("deskripsi can not be null string.");
        if ($created_at == NULL) $created_at = new DateTime;
        $this->id = $id;
        $this->dosen_id = $dosen_id;
        $this->mata_kuliah_id = $mata_kuliah_id;
        $this->kode_kelas = $kode_kelas;
        $this->gaji = $gaji;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->deskripsi = $deskripsi;
        $this->terbuka = $terbuka;
        $this->created_at = $created_at;
    }

    public function getDeskripsi() : string {
        return $this->deskripsi;
    }
}