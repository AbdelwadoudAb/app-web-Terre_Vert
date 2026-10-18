<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'is_processed',
        'status',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_processed' => 'boolean',
    ];
}