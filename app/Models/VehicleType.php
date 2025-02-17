<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = [
        'name',
        'image',
        'status',
    ];

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
    // public function stand()
    // {
    //     return $this->belongsTo(Stand::class);
    // }
    public function stand()
    {
        return $this->belongsTo(Stand::class, 'stand_id');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_type_id');
    }

}
