<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
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


    public function districts()
    {
        return $this->hasMany(District::class);
    }
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
    public function owners()
    {
        return $this->hasMany(Owner::class, 'division_id');
    }
    public function notice()
    {
        return $this->hasMany(Notice::class);
    }
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }


    public function vehicleSerials()
    {
        return $this->hasMany(VehicleSerial::class);
    }

}
