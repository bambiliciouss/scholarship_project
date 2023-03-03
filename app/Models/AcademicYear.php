<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'academic_years';
    protected $guarded = ['acadyears_id'];
    protected $primaryKey = 'acadyears_id';
    protected $fillable = ['description'];

}
