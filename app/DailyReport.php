<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DailyReport extends Model
{
    protected $table = 'tb_daily_report';
    protected $primaryKey = 'daily_report_id';
    public $incrementing = true;

    protected $fillable = ['id_user','confirmed','discarded',
        'under_investigation','interned_outside','cured','deaths','report_date'];
    //


    public function setReportDateAttribute($value)
    {
        $this->attributes['report_date'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function getFormattedReportDate()
    {
        return Carbon::parse($this->report_date)->format('d/m/Y');
    }
}
