<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\FieldWorker;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = [
        'division_id',
        'district_id',
        'thana_id',
        'union_id',
        'title',
        'slug',
        'description',
        'status',
        'location',
        'image',
    ];

    // protected $fillable = ['stand', 'id', 'union_id'];
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
        return $this->belongsTo(Union::class);
    }
    public function vehicleTypes()
    {
        return $this->hasMany(VehicleType::class);
    }
    public function commitees()
    {
        return $this->hasMany(StandCommittee::class);
    }
    // App\Models\Stand.php
    public function vehicles()
    {
        return $this->hasManyThrough(Vehicle::class, VehicleType::class, 'stand_id', 'vehicle_type_id', 'id', 'id');
    }
    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
    public function yearlyNotics()
    {
        return $this->hasMany(YearlyNotice::class);
    }



    public function vehicleSerials()
    {
        return $this->hasMany(VehicleSerial::class);
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
