<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    use HasFactory;

    /**
     * @var Model
     */
    private Model $userProfile;

    /**
     * @var string[]
     */
    public $fillable = [
        'user_id',
        'token'
    ];

    /**
     * Set the profile of the current user
     * The profile can be any model and should be the primary
     * model used to identify users within a certain
     * Labs Experiment
     *
     * @param Model $profile
     * @return void
     */
    public function setProfile(Model $profile): void
    {
        $this->userProfile = $profile;
    }

    /**
     * Get the profile linked to current the user for the
     * current running experiment
     *
     * @return Model
     */
    public function profile(): Model
    {
        return $this->userProfile;
    }
}
