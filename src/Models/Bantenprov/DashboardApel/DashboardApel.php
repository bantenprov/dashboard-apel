<?php

namespace Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DashboardApel extends Model
{

    protected $table = 'dashboard_apels';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel\Regency','id','regency_id');
    }

}

