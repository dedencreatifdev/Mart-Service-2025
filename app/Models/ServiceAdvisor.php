<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceAdvisor extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceAdvisorFactory> */
    use HasFactory, Notifiable, HasUuids;
    protected $guarded = [];
}
