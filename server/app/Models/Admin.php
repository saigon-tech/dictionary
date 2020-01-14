<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticate
{
    use Notifiable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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

    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
