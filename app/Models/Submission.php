<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * One flexible table for every public form on the site:
 * support requests, volunteer applications, chapter applications,
 * sponsorship inquiries and contact messages.
 */
class Submission extends Model
{
    public const TYPES = [
        'support'     => 'Support Request',
        'volunteer'   => 'Volunteer Application',
        'chapter'     => 'Chapter / POD Application',
        'sponsorship' => 'Sponsorship Inquiry',
        'contact'     => 'Contact Message',
    ];

    protected $fillable = ['type', 'name', 'email', 'phone', 'data', 'is_read'];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
    ];

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? ucfirst($this->type);
    }
}
