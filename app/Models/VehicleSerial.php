<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleSerial extends Model
{
    protected $fillable = [
        'check_in',
        'check_out',
        'serial',
        'status',
        'division_id',
        'district_id',
        'thana_id',
        'union_id',
        'stand_id',
        'driver_id',
    ];



    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class, 'thana_id');
    }
    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id');
    }
    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }


    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
