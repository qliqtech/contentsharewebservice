<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{

    protected $fillable = ['activityname','created_by','actionurl'];

}
