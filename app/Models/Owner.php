<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class Owner extends Model
class Owner extends Authenticatable
{
   
   
    use HasFactory, Notifiable;


    protected $gaurd = 'owner';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'license_number',
        'blood_group',
        'image',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function blood_group(){
        return $this->belongsTo(BloodGroup::class, 'blood_group_id');
    }


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
    public function union(){
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
    // public function vehicle(){
    //     return $this->hasMany(Vehicle::class, 'owner_id', 'id');
    // }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id'); // 'vehicle_id' পরিবর্তন হতে পারে, আপনার ডাটাবেস অনুযায়ী
    }
    public function vehiclesLicense()
    {
        return $this->hasOne(Owner::class, 'owner_id'); // 'owner_id' পরিবর্তন হতে পারে, আপনার ডাটাবেস অনুযায়ী
    }
    public function stand(){
        return $this->belongsTo(Stand::class, 'stand_id', 'id');
    }


}
