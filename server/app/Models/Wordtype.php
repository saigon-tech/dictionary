<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wordtype extends Model
{
    protected $table      = 'tbl_wordtype';
    protected $primaryKey = 'wordtype_id';

    protected $fillable
        = [
            'wordtype_name',
            'wordtype_desc',
            'wordtype_status'
        ];

    public function dictionary()
    {
        return $this->hasMany(Dictionary::class, 'wordtype_id', 'wordtype_id');
    }

}
