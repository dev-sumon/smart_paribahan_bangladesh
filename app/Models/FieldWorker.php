<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

// class FieldWorker extends Model
class FieldWorker extends Authenticatable
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
}
