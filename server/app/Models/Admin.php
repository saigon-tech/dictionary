<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table        = 'tbl_admin';
    protected $primaryKey   = 'admin_email';

    protected $fillable
        = [
            'admin_email',
            'password',
            'admin_name',
            'admin_phone',
            'created_at',
            'updated_at'
        ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $hidden = ['password', 'remember_token'];

}
