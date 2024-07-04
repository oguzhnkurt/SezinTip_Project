<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos', compact('videos'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000'
        ]);

        $video = new Video();
        $video->title = $request->title;

        if ($request->hasFile('video')) {
            $filename = $request->video->getClientOriginalName();
            $request->video->storeAs('videos', $filename, 'public');
            $video->filename = $filename;
        }

        $video->save();

        return redirect()->route('videos.index');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000'
        ]);

        $video->title = $request->title;

        if ($request->hasFile('video')) {
            $filename = $request->video->getClientOriginalName();
            $request->video->storeAs('videos', $filename, 'public');
            $video->filename = $filename;
        }

        $video->save();

        return redirect()->route('videos.index');
    }

    public function delete($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index');
    }
}
