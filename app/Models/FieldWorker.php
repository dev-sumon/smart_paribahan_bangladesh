<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class FieldWorker extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'field_worker';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'nid',
        'image',
        'father_name',
        'mother_name',
        'address',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Get the status background class.
     *
     * @return string
     */
    public function statusBg(){
        if($this->status == 1){
            return 'badge badge-success';
        }else{
            return 'badge badge-danger';
        }
    }
    public function statusTitle(){
        if($this->status == 1){
            return 'Active';
        }else{
            return 'Deactive';
        }
    }
    public function statusIcon(){
        if($this->status == 1){
            return 'btn-warning';
        }else{
            return 'btn-success';
        }
    }

    /**
     * Hash the password before saving.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($fieldWorker) {
            $fieldWorker->password = bcrypt($fieldWorker->password);
        });

        static::updating(function ($fieldWorker) {
            if ($fieldWorker->isDirty('password')) {
                $fieldWorker->password = bcrypt($fieldWorker->password);
            }
        });
    }
}