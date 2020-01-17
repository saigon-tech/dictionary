<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alphabet extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $table      = 'tbl_alphabet';
    protected $primaryKey = 'alphabet_id';
    public    $incrementing = true;

    protected $fillable
        = [
            'alphabet_name',
            'alphabet_desc',
            'alphabet_status'
        ];

    public function dictionary()
    {
        return $this->hasMany(Dictionary::class, 'alphabet_id', 'alphabet_id');
    }
}
