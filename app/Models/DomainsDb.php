<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\DomainsDbFactory;

class DomainsDb extends Model
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'domains_db';

    protected $fillable = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    protected $appends = [
    ];

    protected static function newFactory()
    {
        return DomainsDbFactory::new();
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
