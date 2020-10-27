<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rancangan extends Model
{
    //
    protected $table='rancangan';

    protected $fillable = [
        'id_mahasiswa',
        'status',
        'judul',
      ];
    
    const STATUS_PENGAJUAN = 0;
    const STATUS_DITOLAK = 1;
    const STATUS_REVISI = 2;
    const STATUS_ACC = 3;
    const STATUS_ACCADMIN = 4;
    const STATUSES = [
        self::STATUS_PENGAJUAN => 'Pengajuan Ide',
        self::STATUS_DITOLAK => 'Ditolak',
        self::STATUS_REVISI => 'Revisi',
        self::STATUS_ACC => 'Acc',
        self::STATUS_ACCADMIN => 'Acc Admin',

    ];

    public function getStatusTextAttribute($value){
        switch ($this->status){
            case self::STATUS_PENGAJUAN:
                return "<span class=\"badge badge-primary\">Pengajuan</span>";
                break;
            case self::STATUS_DITOLAK:
                return "<span class=\"badge badge-danger\">Ditolak</span>";
                break;
            case self::STATUS_REVISI:
                return "<span class=\"badge badge-warning\">Revisi</span>";
                break;
            case self::STATUS_ACC:
                return "<span class=\"badge badge-success\">Diterima</span>";
                break;
            case self::STATUS_ACCADMIN:
                return "<span class=\"badge badge-success\">Disetujui</span>";
                break;    
        }
    }

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa', 'id');
    }
    public function detail()
    {
        return $this->hasMany(Detail_dosbing::class, 'id_rancangan', 'id');
    }
}
