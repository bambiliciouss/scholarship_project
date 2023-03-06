<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarshipinfo extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'scholarshipinfo';
    protected $guarded = ['scholarship_id'];
    protected $primaryKey = 'scholarship_id';
    protected $fillable = ['sname','description'];


    public function transaction() 
    {
        return $this->hasMany(Transaction::class,'scholarship_id');
    }



}
