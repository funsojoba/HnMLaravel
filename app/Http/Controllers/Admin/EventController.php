<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('event_date')->paginate(25);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form', ['event' => new Event()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['event_flier'] = $this->storeFlier($request);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $this->validated($request);

        if ($request->boolean('remove_flier')) {
            if ($event->event_flier) {
                Storage::disk('public')->delete($event->event_flier);
            }
            $data['event_flier'] = null;
        } elseif ($newFlier = $this->storeFlier($request)) {
            if ($event->event_flier) {
                Storage::disk('public')->delete($event->event_flier);
            }
            $data['event_flier'] = $newFlier;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        if ($event->event_flier) {
            Storage::disk('public')->delete($event->event_flier);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }

    private function storeFlier(Request $request): ?string
    {
        if (! $request->hasFile('event_flier')) {
            return null;
        }

        return $request->file('event_flier')->store('event-fliers', 'public');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'register_url' => 'nullable|url:http,https|max:500',
            'event_flier' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        ]);

        unset($data['event_flier']);
        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}
