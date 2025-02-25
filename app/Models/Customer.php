<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
use SoftDeletes;
    protected $fillable=['customer_name','activity','mobile','address','program','agent_id','install_date','support_end','notes'];
protected $dates=['deleted_at'];
public function customerNotes(){
    return $this->hasMany(CustomerNote::class,'customer_id','id');
}
public function customerBranches(){
    return $this->hasMany(CustomerBranch::class,'customer_id','id');
}
public function customerActivity(){
    return $this->belongsTo(Activity::class,'activity','id');
}
public function customerAgent(){
    return $this->belongsTo(Agent::class,'agent_id','id');
}
}
