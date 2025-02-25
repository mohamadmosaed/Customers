<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'activity_id',
        'representative',
        'address',
        'install_date',
        'support_end',
        'notes',
        'support_status',
    ];
    public function customerActivitys(){
        return $this->belongsTo(Activity::class,'activity_id','id');
    }
}
