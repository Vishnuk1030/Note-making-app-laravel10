<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoteController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'content' => "required|min:4|max:500",
            "file" => "required|mimes:jpeg,bmp,png,gif,svg,pdf,webp|max:5000"
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/note/';
            $file->move($path, $filename);
        }

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'file' => $path . $filename
        ]);

        return redirect()->route('home')->with('success', 'Note created Successfully');
    }

    public function edit($id)
    {
        $note = Note::findOrFail(decrypt($id));
        return view('edit', compact('note'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'content' => "required|min:4|max:500",
            "file" => "required|mimes:jpeg,bmp,png,gif,svg,pdf,webp|max:5000"
        ]);

        $Note = Note::findOrFail($id);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/note/';
            $file->move($path, $filename);

            //check whether the file exist or not
            if (File::exists($Note->image)) {
                File::delete($Note->image);
            }
        }

        $Note->update([
            'title' => $request->title,
            'content' => $request->content,
            'file' => $path . $filename
        ]);
        return redirect()->route('home')->with('success', 'Note updated Successfully');
    }

    public function delete($id)
    {
        $note = Note::findOrFail($id);
        //deleting the image from the folder
        if (File::exists($note->image)) {
            File::delete($note->image);
        }

        $note->delete();
        return redirect()->route('home')->with('success', 'Note delete Successfully');
    }

    public function view($id)
    {
        $view = Note::findOrFail(decrypt($id));
        return view('showfile',compact('view'));
    }
}
