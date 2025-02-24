<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandCommittee extends Model
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
}
