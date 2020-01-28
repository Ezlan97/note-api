<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function showAllNotes()
    {
        return response()->json(Note::all());
    }

    public function showOneNote($id)
    {
        return response()->json(Note::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $note = Note::create($request->all());

        return response()->json($note, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function delete($id)
    {
        Note::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}