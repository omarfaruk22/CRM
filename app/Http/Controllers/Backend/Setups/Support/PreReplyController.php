<?php

namespace App\Http\Controllers\Backend\Setups\Support;

use App\Http\Controllers\Controller;
use App\Models\Tickets_predefined_replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setups.support.predefinedreply.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setups.support.predefinedreply.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Tickets_predefined_replies::create([
            'name' => $request->name,
            'message' => $request->message,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('support.pre_reply.index')->with('success', 'Predefined reply created successfully.');
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
        if (!ctype_digit($id)) {
            return redirect()->back()->with('error', 'Invalid ID');
        }

        $predefinedreply = Tickets_predefined_replies::find($id);

        if (!$predefinedreply) {
            return redirect()->back()->with('error', 'Predefined reply not found');
        }

        return view('backend.setups.support.predefinedreply.edit', compact('predefinedreply'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        $predefinedReply = Tickets_predefined_replies::find($id);

        if (!$predefinedReply) {
            return redirect()->back()->with('error', 'Predefined reply not found');
        }

        $updatedBy = Auth::user()->name;

        $predefinedReply->name = $request->name;
        $predefinedReply->message = $request->message;
        $predefinedReply->updated_by = $updatedBy;
        $predefinedReply->save();

        return redirect()->route('support.pre_reply.index')->with('success', 'Predefined reply updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $predefinedReply = Tickets_predefined_replies::find($id);

        if (!$predefinedReply) {
            return redirect()->route('support.pre_reply.index')->with('error', 'Predefined reply not found');
        }

        try {
            $predefinedReply->delete();
        } catch (\Exception $e) {
            return redirect()->route('support.pre_reply.index')->with('error', 'Failed to delete predefined reply');
        }

        return redirect()->route('support.pre_reply.index')->with('success', 'Predefined reply deleted successfully');
    }
}
