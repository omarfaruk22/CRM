<?php

namespace App\Http\Controllers\Backend\Setups\Settings;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tags'] = Tag::with('tagtable')->get();
        return view('backend.setups.settings.tag', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tags' => 'required|array',
            'tags.*' => 'string|max:255',
        ]);

        


        foreach ($request->input('tags') as $id => $tagValue) {
            $tag = Tag::findOrFail($id);
            $tag->tags = $tagValue;
            $tag->save();
        }


        return redirect()->back()->with('success', 'Tags updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }
}
