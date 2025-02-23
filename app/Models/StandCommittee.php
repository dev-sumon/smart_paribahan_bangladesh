<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandCommittee extends Model
{
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
        return $this->belongsTo(Thana::class, 'Thana_id');
    }
    public function union()
    {
        return $this->belongsTo(Union::class, 'Union_id');
    }
    public function stand()
    {
        return $this->belongsTo(Stand::class, 'Stand_id');
    }
}
