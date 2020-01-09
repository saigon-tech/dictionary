<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table      = 'tbl_admin';
    protected $primaryKey = 'alphabet_id';

    protected $fillable
        = [
            'admin_id',
            'admin_email',
            'admin_password',
            'admin_name',
            'admin_phone',
            'created_at',
            'updated_at'
        ];

}
