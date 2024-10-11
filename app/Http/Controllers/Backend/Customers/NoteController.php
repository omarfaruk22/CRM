<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Customer;
use App\Models\Note;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerNoteExport;

class NoteController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        $notes = Note::all();
        return view('backend.customer.note.index', compact('notes', 'customer'));
    }

    public function create()
    {
        return view('backend.customer.note.create');
    }


    public function store(Request $request)
    {
        Note::create([
            'description' => $request->ticket_description,
        ]);
        return back();
    }


    public function export()
    {
        // $this->expo = Note::all();
        // return $this->expo;
        return Excel::download(new CustomerNoteExport, 'customer_note.xlsx');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::find($id);
        // return view('Component.Category.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);

        $notes = Note::all();
        // $notes = Note::get(['id', 'description']);
        $note = Note::find($id);
        return view('backend.customer.note.edit', compact('note', 'notes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteUpdateRequest $request, string $id)
    {
        $note = Note::find($id);
        $note->update([
            'description' => $request->ticket_description,
        ]);
        return redirect()->route('customers.profile.notes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::find($id)->delete();
        return back()->with('success', 'Notes: Delete Successfully');
    }
}
