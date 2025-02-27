<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documents';

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
        'type',
        'file_path',
        'original_name',
        'status',
        'rejection_reason',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
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
     * Get the user that owns the document.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the document is pending approval.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the document is approved.
     *
     * @return bool
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if the document is rejected.
     *
     * @return bool
     */
    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    /**
     * Approve the document.
     *
     * @return bool
     */
    public function approve()
    {
        $this->status = 'approved';
        $this->rejection_reason = null;
        return $this->save();
    }

    /**
     * Reject the document with a reason.
     *
     * @param string $reason
     * @return bool
     */
    public function reject($reason)
    {
        $this->status = 'rejected';
        $this->rejection_reason = $reason;
        return $this->save();
    }

    /**
     * Get the file extension.
     *
     * @return string
     */
    public function getExtensionAttribute()
    {
        return pathinfo($this->original_name, PATHINFO_EXTENSION);
    }

    /**
     * Check if the document is an image.
     *
     * @return bool
     */
    public function isImage()
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
        return in_array(strtolower($this->extension), $imageExtensions);
    }

    /**
     * Check if the document is a PDF.
     *
     * @return bool
     */
    public function isPdf()
    {
        return strtolower($this->extension) === 'pdf';
    }
}
