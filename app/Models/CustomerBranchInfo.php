<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBranchInfo extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'date', 'note'];
}
