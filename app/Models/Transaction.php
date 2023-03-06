<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'application_transactions';
    protected $guarded = ['application_transaction_id'];
    protected $primaryKey = 'application_transaction_id';
    protected $fillable = ['student_id', 'school_name', 'year_level', 'application_status', 'applicationPeriod_id' , 'scholarship_id', 'enrollment_form', 'grades_copy','junior_record', 'senior_record', 'validID', 'form_137', 'cert_honors', 'voterscert_parent','votercert_applicant', 'birthcert'];


    public function students() 
    {
        return $this->belongsTo(StudentInfo::class,'student_id');
    }

    public function scholarship() 
    {
        return $this->belongsTo(Scholarshipinfo::class,'scholarship_id');
    }


    public function application_period() 
    {
        return $this->belongsTo(ApplicationPeriod::class,'applicationPeriod_id');
    }


}
