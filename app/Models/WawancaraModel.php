<?php

namespace App\Models;

use CodeIgniter\Model;

class WawancaraModel extends Model
{
    protected $table            = 'wawancara';
    protected $primaryKey       = 'id_pelamar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pelamar', 'slug', 'email_pelamar', 'no_hp', 'posisi', 'tanggal', 'waktu', 'cv_pelamar', 'portofolio_pelamar', 'foto_pelamar', 'dokumen_pendukung'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function  getWawancara($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return  $this->where(['slug' => $slug])->first();
    }
}
