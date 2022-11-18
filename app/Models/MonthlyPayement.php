<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayement extends Model
{
    use HasFactory;

    protected $fillable = ['paymentGiven'];
}
