<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_profiles';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'birthdate',
        'phone',
        'address',
        'progress',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birthdate' => 'date',
        'progress' => 'integer',
    ];

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the profile is complete.
     *
     * @return bool
     */
    public function isComplete()
    {
        return $this->progress === 100;
    }

    /**
     * Update progress based on filled attributes.
     *
     * @return void
     */
    public function updateProgress()
    {
        $requiredFields = ['birthdate', 'phone', 'address'];
        $filledFields = 0;

        foreach ($requiredFields as $field) {
            if (!empty($this->$field)) {
                $filledFields++;
            }
        }

        $this->progress = ($filledFields / count($requiredFields)) * 100;
        $this->save();
    }
}
