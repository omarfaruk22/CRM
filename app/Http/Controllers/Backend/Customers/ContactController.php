<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Exports\ContactsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use App\Models\Contact_permission;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnSelf;

class ContactController extends Controller
{
    public function index(string $id)
    {
        $customer = Customer::find($id);
        $contact = Contact::where('customer_id', $customer->id)->get();
        return view('backend.customer.contact.index', compact('contact', 'customer'));
    }

    public function pdf()
    {
        // $contacts = Contact::all();

        //Assign static data for testing purpose
        $contacts = [
            ['title' => 'John Doe', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Jane Smith', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
            // Add more sample contacts as needed
        ];

        $fileName = 'contacts.pdf';
        $html = view('backend.customer.contact.pdf', compact('contacts'))->render();
        $mpdf = new \Mpdf\Mpdf();

        // Define footer content with page number
        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);


        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }

    public function excel()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    public function excel_file()
    {
        return view('backend.customer.contact.excel');
    }

    //this is insert
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts',
            'password' => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $directory = 'upload/category-images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }


        $contacts = Contact::create([

            'created_by' => Auth::user()->id,

            'customer_id' => $request->input('customer_id'),
            'profile_image' => 1,
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'profile_image' => $imageUrl,
            'phonenumber' => $request->input('phonenumber'),
            'direction' => $request->input('direction'),
            'invoice_emails' => $request->input('invoice_emails') ? 1 : 0,
            'credit_note_emails' => $request->input('credit_note_emails') ? 1 : 0,
            'ticket_emails' => $request->input('ticket_emails') ? 1 : 0,
            'task_emails' => $request->input('task_emails') ? 1 : 0,
            'estimate_emails' => $request->input('estimate_emails') ? 1 : 0,
            'project_emails' => $request->input('project_emails') ? 1 : 0,
            'contract_emails' => $request->input('contract_emails') ? 1 : 0,
            // 'password' => bcrypt($request->input('password')),
        ]);
        $isPrimary = $request->input('is_primary');
        if ($isPrimary) {
            Contact::where('customer_id', $request->input('customer_id'))
                ->where('id', '<>', $contacts->id)
                ->update(['is_primary' => 0]);
            $contacts->is_primary = 1;
        } else {
            $contacts->is_primary = 0;
        }


        // this is contact permission
        $permissionIds = [];
        $permissionFields = ['invoices', 'estimates', 'contacts', 'proposals', 'support', 'projects'];

        foreach ($permissionFields as $field) {
            if ($request->has($field)) {
                $permissionIds[] = $request->input($field);
            }
        }

        foreach ($permissionIds as $permissionId) {
            Contact_permission::create([
                'permission_id' => $permissionId,
                'contact_userid' => $contacts->id,
            ]);
        }
        return redirect()->back()->with('success', 'Customer Contact user registered successfully!');
    }


    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $isActive = $request->input('isActive');
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }
        $contact->active = $isActive;
        $contact->save();
        return response()->json(['message' => 'Status updated successfully']);
    }



    public function edit($id, $contactId)
    {
        $editcontact = Contact::find($contactId);
        $editcontact_permission = Contact_permission::where('contact_userid', $editcontact->id)->get();
        return response()->json([
            'contact' => $editcontact,
            'permissions' => $editcontact_permission
        ]);
    }

    public function update(Request $request, $contactid)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string',
            ]
        );
        // Log::info($request->all());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update the contact information
        $updateContact = Contact::find($request->contact_id);
        if (!$updateContact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        // Update contact fields
        $updateContact->firstname = $request->input('firstname');
        $updateContact->lastname = $request->input('lastname');
        $updateContact->updated_by = Auth::user()->name;
        $updateContact->profile_image = $updateContact->profile_image;
        $updateContact->email = $request->input('email');
        $updateContact->title = $request->input('title');
        $updateContact->phonenumber = $request->input('phonenumber');
        $updateContact->direction = $request->input('direction');
        $updateContact->is_primary = $request->input('is_primary') ? 1 : 0;
        $updateContact->invoice_emails = $request->input('invoice_emails') ? 1 : 0;
        $updateContact->credit_note_emails = $request->input('credit_note_emails') ? 1 : 0;
        $updateContact->ticket_emails = $request->input('ticket_emails') ? 1 : 0;
        $updateContact->task_emails = $request->input('task_emails') ? 1 : 0;
        $updateContact->estimate_emails = $request->input('estimate_emails') ? 1 : 0;
        $updateContact->project_emails = $request->input('project_emails') ? 1 : 0;
        $updateContact->contract_emails = $request->input('contract_emails') ? 1 : 0;
        // $updateContact->password = $request->input('password');
        $updateContact->update();
        if ($request->input('is_primary')) {
            // Find other primary contacts associated with the same customer
            $otherPrimaryContacts = Contact::where('customer_id', $updateContact->customer_id)
                ->where('id', '<>', $updateContact->id)
                ->where('is_primary', 1)
                ->get();

            // Unmark other primary contacts
            foreach ($otherPrimaryContacts as $otherPrimaryContact) {
                $otherPrimaryContact->is_primary = 0;
                $otherPrimaryContact->save();
            }
        }
        $permissionIds = [];
        $permissionFields = ['pinvoice', 'pestimate', 'pcontract', 'pproposal', 'psupport', 'pproject'];

        foreach ($permissionFields as $field) {
            if ($request->has($field)) {
                $permissionIds[] = $request->input($field);
            }
        }
        Contact_permission::where('contact_userid', $updateContact->id)->delete();
        foreach ($permissionIds as $permissionId) {
            Contact_permission::create([
                'permission_id' => $permissionId,
                'contact_userid' => $updateContact->id,
            ]);
        }

        return response()->json(['data' => $updateContact, 'permission' => $permissionIds, 'success' => true, 'message' => 'Contact Updated Successfully']);
    }
    public function delete($contactId)
    {
        $contactdelete = Contact::find($contactId);
        $contactdelete->delete();
        return redirect()->back()->with('success', 'Customer Contact delete successfully!');
    }
}
