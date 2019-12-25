<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alphabet extends Model
{
    protected $table = 'tbl_alphabet';
    protected $primaryKey = 'alphabet_id';
    protected $fillable=['alphabet_name','alphabet_desc','alphabet_status'];
    public function dictionary()
    {
        return $this->hasMany(Dictionary::class,'alphabet_id','alphabet_id');
    }
}
