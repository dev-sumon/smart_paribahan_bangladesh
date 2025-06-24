<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'address',
        'phone',
        'optional_number',
        'email',
        'status'
    ];
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
}
