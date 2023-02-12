<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentInfo extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'studentinfo';
    protected $guarded = ['student_id'];
    protected $primaryKey = 'student_id';
    protected $fillable = ['lname','fname','midname','addressline','barangay','age', 'gender','phone','religion','date_of_birth','place_of_birth','father_name','mother_name','img_path','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}
