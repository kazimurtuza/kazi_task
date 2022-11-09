<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorbook extends Model
{
    use HasFactory;

    protected $fillable=[
        'doctor_id',
        'patient_name',
        'patient_phone',
        'patient_address',
        'book_date',
        'book_time',
        'book_date_time',
        'status',
    ];
}
