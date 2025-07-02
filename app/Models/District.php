<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function statusBg()
    {
        if ($this->status == 1) {
            return 'badge badge-success';
        } else {
            return 'badge badge-danger';
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



    // public function division(){
    //     return $this->belongsTo(Division::class, 'division_id', 'id');
    // }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // Relationship: A district has many thanas
    public function thanas()
    {
        return $this->hasMany(Thana::class);
    }
    public function unions()
    {
        return $this->hasMany(Union::class);
    }
    public function stands()
    {
        return $this->hasMany(Stand::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'district_id');
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
            default:
                return null;
        }
    }

}
