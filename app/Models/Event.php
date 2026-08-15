<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'event_date', 'event_time',
        'location', 'register_url', 'event_flier', 'is_published',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];

    protected $appends = ['flier_url', 'flier_is_image', 'formatted_time'];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('event_date', '>=', now()->toDateString())
            ->orderBy('event_date');
    }

    public function scopePast($query)
    {
        return $query->whereDate('event_date', '<', now()->toDateString());
    }

    public function getFlierUrlAttribute(): ?string
    {
        return $this->event_flier ? Storage::disk('public')->url($this->event_flier) : null;
    }

    public function getFlierIsImageAttribute(): bool
    {
        if (! $this->event_flier) {
            return false;
        }

        return in_array(strtolower(pathinfo($this->event_flier, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
    }

    /**
     * event_time is stored as a 24-hour "H:i" string (from the admin's native
     * time picker). This renders it for display, e.g. "10:00 AM".
     */
    public function getFormattedTimeAttribute(): ?string
    {
        if (! $this->event_time) {
            return null;
        }

        try {
            return Carbon::createFromFormat('H:i', $this->event_time)->format('g:i A');
        } catch (\Exception) {
            // Legacy free-text values entered before this field became a time picker.
            return $this->event_time;
        }
    }
}
