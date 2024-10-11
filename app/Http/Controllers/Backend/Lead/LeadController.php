<?php

namespace App\Http\Controllers\Backend\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\LeadImport;
use App\Livewire\Backend\Support\Reminders;
use App\Models\Contact;
use App\Models\Countrie;
use App\Models\Customer;
use App\Models\Language;
use App\Models\LeadsEmailIntegrations;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;
use App\Models\MainLead;
use App\Models\Reminder;
use App\Models\Staff;
use App\Models\Tag;

use App\Models\Tagtable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LeadController extends Controller
{
    public function index()
    {
        return view('backend.leads.index');
    }
    public function import()
    {
        return view('backend.leads.import');
    }


    public function importup(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $readerType = $this->getReaderType($extension);

        // Create an instance of CustomerImport
        $import = new LeadImport();

        Excel::import($import, $file, null, $readerType);

        return back()->with('success', 'Lead imported successfully.');
    }

    protected function getReaderType($extension)
    {
        $types = [
            'xlsx' => \Maatwebsite\Excel\Excel::XLSX,
            'csv' => \Maatwebsite\Excel\Excel::CSV,
            'tsv' => \Maatwebsite\Excel\Excel::TSV,
            'ods' => \Maatwebsite\Excel\Excel::ODS,
            'xls' => \Maatwebsite\Excel\Excel::XLS,
            'slk' => \Maatwebsite\Excel\Excel::SLK,
            'xml' => \Maatwebsite\Excel\Excel::XML,
            'gnumeric' => \Maatwebsite\Excel\Excel::GNUMERIC,
            'html' => \Maatwebsite\Excel\Excel::HTML,
        ];

        return $types[$extension] ?? \Maatwebsite\Excel\Excel::XLSX;
    }


    public function leadpdf($id)
    {
        $lead = MainLead::findOrFail($id);

        $pdf = PDF::loadView('backend.leads.leadpdf', [
            'lead' => $lead,
        ]);

        return $pdf->stream('statement-invoice-of-' . $id . '.pdf');
    }



    public function swapkanban()
    {
        return view('backend.leads.swaplead');
    }

    public function edit($id)
    {
        $lead = MainLead::find($id);

        if (!$lead) {
            return abort(404);
        }
        $tagtables = Tagtable::where('rel_id', $id)->first();
        $data = [
            'lead' => $lead,
            'customer' => Customer::where('lead_id', $id)->first(),
            'countries' => Countrie::all(),
            'languages' => Language::all(),
            'tagses' => Tag::all(),
            'statuses' => LeadsStatus::all(),
            'sources' => LeadsSource::all(),
            'emails' => LeadsEmailIntegrations::all(),
            'staffs' => Staff::all(),
            'reminders' => Reminder::where('rel_id', $id)->get(),

            'taggs' => explode(',', $tagtables->tag_id),
        ];

        return view('backend.leads.edit', $data);
    }


    public function updateLead(Request $request, $id)
    {

        // dd($request);
        // Validate the incoming request
        $request->validate([
            'status' => 'required',
            'source' => 'required',
            'assigned' => 'required',
            'position' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'website' => 'nullable|url',
            'country' => 'required',
            'phonenumber' => 'required',

            'is_public' => 'required|boolean',
            'tagesIDs' => 'nullable|array', // Assuming tagesIDs is an array of tag IDs
        ]);

        // Find the MainLead record by ID
        $mainLead = MainLead::find($id);

        if (!$mainLead) {
            return response()->json(['message' => 'Lead not found.'], 404);
        }

        // Update the MainLead
        $mainLead->update([
            'status' => $request->status,
            'source' => $request->source,
            'assigned' => $request->assigned,
            'title' => $request->position,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'email' => $request->email,
            'state' => $request->state,
            'website' => $request->website,
            'country' => $request->country,
            'phonenumber' => $request->phonenumber,
            'zip' => $request->zip,
            'lead_value' => $request->lead_value,
            'language' => $request->language,
            'company' => $request->company,
            'description' => $request->description,
            'dateadded' => $request->dateadded,
            'is_public' => $request->is_public,
            'updated_by' => Auth::user()->id,
            'created_by' => Auth::user()->id,

        ]);

        // Handle tags update
        if (!empty($request->tagesIDs)) {
            // Convert tags array to a comma-separated string
            $tagsString = implode(',', $request->tagesIDs);

            // dd($tagsString);

            // Update or create the tagtable
            $tagtable = Tagtable::updateOrCreate(
                ['rel_id' => $mainLead->id],
                [
                    'rel_type' => 'Lead',
                    'tag_id' => $tagsString,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );
        }

        return redirect()->route('mainlead.edit', ['id' => $mainLead->id])->with('success', ' Lead Updated successfully (ID:  ' . $mainLead->id . ' - Customer: ' . $mainLead->company . '.');
    }

    public function leadtocustomer(Request $request)
    {
        $mainLead = MainLead::find($request->lead_id);

        // Create  the Customer
        $customer = Customer::create([
            'lead_id' => $mainLead->id,
            'address' => $request->address,
            'website' => $request->website,
            'phonenumber' => $request->phonenumber,
            'company' => $request->company,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip' => $request->zip,
            'billing_street' => $request->state,
            'billing_city' => $request->city,
            'billing_state' => $request->state,
            'billing_zip' => $request->zip,
            'billing_country' => $request->country,
            'default_language' => $request->language,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        // Update MainLead with the new customer ID
        if ($mainLead->id == $customer->lead_id) {
            $mainLead->client_id = $customer->id;
            $mainLead->save();
        }

        // Determine the password to use based on checkbox state
        $password = $request->send_set_password_email
            ? bcrypt($request->email) // Use email for password if checked
            : bcrypt($request->password); // Use provided password if unchecked

        // Create the Contact
        Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'title' => $request->position,
            'customer_id' => $customer->id,
            'created_by' => Auth::user()->id,
            'password' => $password,
            'new_pass_key' => $password, // Assuming new_pass_key should be same as password for simplicity
        ]);

        // Redirect to customer profile page with success message
        return redirect()->route('customers.profile', ['id' => $customer->id])
            ->with('success', 'Lead No: ' . $mainLead->id . ' - ' . $mainLead->company . ' Customer Created Successfully');
    }

    public function leadreminderset(Request $request)
    {
        // Validate the request
        $request->validate([
            'lead_id' => 'required|integer',
            'email' => 'required|email',
            'dateToBeNotified' => 'required|date_format:Y-m-d\TH:i',
            'staff' => 'required|integer',
            'description' => 'required|string',
        ]);

        // Determine if email should be sent
        $notifyByEmail = $request->has('sendEmail') ? 1 : 0;

        // Create the reminder
        $reminder = Reminder::create([
            'lead_id' => $request->lead_id,
            'notify_by_email' => $notifyByEmail,
            'date' => $request->dateToBeNotified,
            'staff' => $request->staff,
            'rel_id' => $request->lead_id,
            'description' => $request->description,
            'created_by' => Auth::user()->id,
        ]);

        // Check if the "Send also an email for this reminder" checkbox is checked
        // if ($notifyByEmail) {
        //     // Send an email notification
        //     Mail::to($request->email)->send(new ReminderNotification($reminder));
        // }

        // Return a response
        return redirect()->back()->with('success', "Lead reminder set successfully.");
    }

    public function reminderupdate(Request $request)
    {

        $reminder = Reminder::findOrFail($request->reminder_id);
        $reminder->date = $request->dateToBeNotified;
        $reminder->staff = $request->staff;
        $reminder->description = $request->description;
        $reminder->save();
        // Return a response
        return redirect()->route('mainlead.edit', ['id' => $request->lead_id])->with('success', 'Lead Reminder Updated successfully.');
    }



    public function fetchReminderData(Request $request)
    {
        $reminder = Reminder::findOrFail($request->id); // Adjust model and method as per your application
        return response()->json($reminder);
    }


    public function destroyReminder($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();
        return redirect()->back()->with('success', 'Reminder deleted successfully.');
    }






    // public function fetchLeadData(Request $request)
    // {
    //     $leadId = $request->input('leadId');
    //     $lead = MainLead::find($leadId);
    //     return response()->json($lead);
    // }
}
