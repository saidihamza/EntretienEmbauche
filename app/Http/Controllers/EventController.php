<?php


namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Afficher le calendrier
    public function index()
    {
        return view('calendar.index');
    }

    // Récupérer les événements pour FullCalendar
    public function getEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    // Enregistrer un nouvel événement
    public function store(Request $request)
    {
        $request->validate([
            'eventType' => 'required|string',
            'candidate' => 'required|string',
            'interviewType' => 'required|string',
            'evaluator' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
        ]);

        $event = Event::create([
            'title' => $request->input('candidate'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'event_type' => $request->input('eventType'),
            'candidate' => $request->input('candidate'),
            'interview_type' => $request->input('interviewType'),
            'evaluator' => $request->input('evaluator'),
        ]);

        return response()->json($event);
    }

    // Mettre à jour un événement existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'eventType' => 'required|string',
            'candidate' => 'required|string',
            'interviewType' => 'required|string',
            'evaluator' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->input('candidate'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'event_type' => $request->input('eventType'),
            'candidate' => $request->input('candidate'),
            'interview_type' => $request->input('interviewType'),
            'evaluator' => $request->input('evaluator'),
        ]);

        return response()->json($event);
    }

    // Supprimer un événement
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Événement supprimé avec succès.']);
    }
}