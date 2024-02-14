<?php

namespace App\Models\Minecraft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $connection = 'minecraft';

    /**
     * The primary key associated with the table
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * Indicates if the model's primary key is auto-incrementing
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Data type of the model's primary key
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'mc_uuid',
        'username',
        'verifier',
        'verified_at'
    ];
}
