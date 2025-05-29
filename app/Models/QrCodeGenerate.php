<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGenerate extends Model
{
    protected $fillable = [
        'url',
        'token'
    ];

     public function getQrImageAttribute()
    {
        return QrCode::size(100)->generate(route('secured.url', $this->token));
    }
}
