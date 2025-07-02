<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearlyNotice extends Model
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
    // public function division()
    // {
    //     return $this->belongsTo(Division::class);
    // }
    public function noticeCategory()
    {
        return $this->belongsTo(NoticeCategory::class, 'notice_category_id');
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
            case 'stand_manager':
                return StandManager::find($this->created_by_id);
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
            case 'stand_manager':
                return StandManager::find($this->updated_by_id);
            default:
                return null;
        }
    }
}
