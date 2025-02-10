<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
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
    public function drivers()
    {
        return $this->hasMany(Driver::class, 'district_id');
    }

}
