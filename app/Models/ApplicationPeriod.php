<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationPeriod extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'application_periods';
    protected $guarded = ['applicationPeriod_id'];
    protected $primaryKey = 'applicationPeriod_id';
    protected $fillable = ['acadyears_id', 'semester', 'start_application', 'end_application', 'scholarship_expiration' ];

    public function acadyear()
    {
        return $this->belongsTo(AcademicYear::class,'acadyears_id');
    }

}
