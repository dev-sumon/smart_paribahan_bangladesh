<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\FieldWorker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Owner extends Model
class Owner extends Authenticatable
{


    use HasFactory, Notifiable;


    protected $gaurd = 'owner';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'email',
        'phone',
        'license_number',
        'blood_group',
        'image',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function blood_group()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id');
    }


    public function statusBg()
    {
        if ($this->status == 1) {
            return 'badge bg-success';
        } else {
            return 'badge bg-danger';
        }
    }
    public function statusTitle()
    {
        if ($this->status == 1) {
            return 'Active';
        } else {
            return 'Deactive';
        }
    }
    public function statusIcon()
    {
        if ($this->status == 1) {
            return 'btn-warning';
        } else {
            return 'btn-success';
        }
    }



    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class, 'thana_id', 'id');
    }
    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function vehiclesLicense()
    {
        return $this->hasOne(Owner::class, 'owner_id');
    }

    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'owner_id');
    }
    public function vehicleTypes()
    {
        return $this->hasManyThrough(Vehicle::class, VehicleType::class, 'vehicle_type_id', 'id', 'id', 'vehicle_id');
    }


    public function creator()
    {
        if (!$this->created_by_guard || !$this->created_by_id) {
            return null;
        }

        switch ($this->created_by_guard) {
            case 'admin':
                return Admin::find($this->created_by_id);
            case 'field_worker':
                return FieldWorker::find($this->created_by_id);
            default:
                return null;
        }
    }

    public function updater()
    {
        if (!$this->updated_by_guard || !$this->updated_by_id) {
            return null;
        }

        switch ($this->updated_by_guard) {
            case 'admin':
                return Admin::find($this->updated_by_id);
            case 'field_worker':
                return FieldWorker::find($this->updated_by_id);
            default:
                return null;
        }
    }
}
