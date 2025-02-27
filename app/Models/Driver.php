<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class Driver extends Model
class Driver extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $gaurd = 'driver';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'name',
        'description',
        'designation',
        'email',
        'phone',
        'vehicles_license',
        'blood_group',
        'image',
        'password',
        'status',
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

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id');
    }
    public function blood_group(){
        return $this->belongsTo(BloodGroup::class, 'blood_group_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
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

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
    public function union()
    {
        return $this->belongsTo(Union::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'owner_id');
    }
    public function vehicleTypes()
    {
        return $this->hasManyThrough(Vehicle::class, VehicleType::class, 'vehicle_type_id', 'id', 'id', 'vehicle_id');
    }
}
