<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model

{

    protected $fillable = ['stand', 'id', 'union_id'];
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



    public function division(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function thana(){
        return $this->belongsTo(Thana::class, 'thana_id', 'id');
    }
    public function union()
    {
        return $this->belongsTo(Union::class);
    }
    // public function vehicles()
    // {
    //     return $this->hasMany(Vehicle::class);
    // }
    // public function vehicleTypes()
    // {
    //     return $this->hasMany(VehicleType::class);
    // }
    // public function vehicleTypes()
    // {
    //     return $this->hasMany(VehicleType::class, 'stand_id');
    // }
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



}
