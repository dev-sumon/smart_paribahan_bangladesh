<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
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
    // public function thana(){
    //     return $this->belongsTo(Thana::class, 'thana_id', 'id');
    // }
    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id', 'id');
    }


    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }

    // Relationship: A union has many stands
    public function stands()
    {
        return $this->hasMany(Stand::class);
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
