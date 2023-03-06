<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $table = 'documents';
    protected $guarded = ['docs_id'];
    protected $primaryKey = 'docs_id';
    protected $fillable = ['cor_file','grades'];

}
