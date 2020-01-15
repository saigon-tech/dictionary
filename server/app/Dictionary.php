<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table      = 'tbl_dictionary';
    protected $primaryKey = 'dictionary_id';

    protected $fillable
        = [
            'dictionary_name_eng',
            'dictionary_name_vn',
            'dictionary_desc',
            'dictionary_image',
            'dictionary_status',
            'alphabet_id',
            'wordtype_id'
        ];

    public function wordtype()
    {
        return $this->belongsTo(Wordtype::class, 'wordtype_id', 'wordtype_id');
    }

    public function alphabet()
    {
        return $this->belongsTo(Alphabet::class, 'alphabet_id', 'alphabet_id');
    }
}
