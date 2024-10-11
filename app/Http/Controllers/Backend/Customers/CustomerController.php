<?php

namespace App\Http\Controllers\Backend\Customers;

use App\Exports\ContactExport;
use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use App\Models\Contact;
use App\Models\Countrie;
use App\Models\Currencie;
use App\Models\Customer;
use App\Models\Customer_group;
use App\Models\Customers_group;
use App\Models\Contact_permission;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;



class CustomerController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        $customers = Customer::select('customers.*', 'contacts.firstname', 'contacts.lastname', 'contacts.email', 'customer_groups.groupid')
            ->leftJoin('contacts', 'contacts.customer_id', '=', 'customers.id')
            ->leftJoin('customer_groups', 'customer_groups.customer_id', '=', 'customers.id')
            ->paginate(10);

        $totalCustomers = Customer::count();
        $activeCustomers = Customer::where('active', 1)->count();
        $inactiveCustomers = Customer::where('active', 0)->count();
        $totalContacts = Contact::count();
        $contacts = Contact::all();
        $activeContacts = Contact::where('active', 1)->count();
        $inactiveContacts = Contact::where('active', 0)->count();
        // $loggedInContacts = Contact::where('logged_in', 1)->count();

        if (!$customers) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        return view('backend.customer.index', [
            'customers' => $customers,
            'contacts' => $contacts,
            'totalCustomers' => $totalCustomers,
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
            'totalContacts' => $totalContacts,
            'activeContacts' => $activeContacts,
            'inactiveContacts' => $inactiveContacts,
            'loggedInContacts' => 0,
        ]);
    }


    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $isActive = $request->input('isActive');

        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        $customer->active = $isActive;
        $customer->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function group_create(Request $request)
    {
        $create_by = Auth::user()->id;

        //customers_group table
        $customers_group = new Customers_group();
        $customers_group->gname = $request->gname;
        $customers_group->created_by = $create_by;
        $customers_group->save();

        return redirect()->route('customers.create')->with('group', 'Group created successfully');
    }

    public function create()
    {
        $currencies = Currencie::all();
        $customers_groups = Customers_group::all();
        $languages = Language::all();
        $countries = Countrie::all();
        $customers = Customer::all();
        return view('backend.customer.create', [
            'currencies' => $currencies,
            'customers_groups' => $customers_groups,
            'languages' => $languages,
            'countries' => $countries,
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'company' => 'required',
        ]);

        $create_by = Auth::user()->id;

        // customer table
        $customer = new Customer();
        $customer->company = $request->company;
        $customer->vat = $request->vat;
        $customer->phonenumber = $request->phonenumber;
        $customer->website = $request->website;
        $customer->default_currency = $request->default_currency;
        $customer->default_language = $request->default_language;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->zip = $request->zip;
        $customer->country = $request->country;
        $customer->billing_street = $request->billing_street;
        $customer->billing_city = $request->billing_city;
        $customer->billing_state = $request->billing_state;
        $customer->billing_zip = $request->billing_zip;
        $customer->billing_country = $request->billing_country;
        $customer->shipping_street = $request->shipping_street;
        $customer->shipping_city = $request->shipping_city;
        $customer->shipping_state = $request->shipping_state;
        $customer->shipping_zip = $request->shipping_zip;
        $customer->shipping_country = $request->shipping_country;
        $customer->created_by = $create_by;
        $customer->save();

        //customers_group table
        $customer_id = $customer->id;
        $Customer_group = new Customer_group();

        $groupIds = $request->input('groupid');

        if (is_array($groupIds) && count($groupIds) > 0) {
            $Customer_group->groupid = implode(',', $groupIds);
        } else {
            $Customer_group->groupid = null;
        }

        $Customer_group->customer_id = $customer_id;
        $Customer_group->created_by = $create_by;
        $Customer_group->save();


        return redirect()->route('customers.profile', $customer_id)->with('success', 'Customer created successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'company' => 'required',
        ]);

        //Find the customer by ID
        $customer = Customer::find($id);

        // customer table
        if ($customer) {

            $updated_by = Auth::user()->id;

            $customer->company = $request->company;
            $customer->vat = $request->vat;
            $customer->phonenumber = $request->phonenumber;
            $customer->website = $request->website;
            $customer->default_currency = $request->default_currency;
            $customer->default_language = $request->default_language;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->country = $request->country;
            $customer->billing_street = $request->billing_street;
            $customer->billing_city = $request->billing_city;
            $customer->billing_state = $request->billing_state;
            $customer->billing_zip = $request->billing_zip;
            $customer->billing_country = $request->billing_country;
            $customer->shipping_street = $request->shipping_street;
            $customer->shipping_city = $request->shipping_city;
            $customer->shipping_state = $request->shipping_state;
            $customer->shipping_zip = $request->shipping_zip;
            $customer->shipping_country = $request->shipping_country;
            $customer->updated_by = $updated_by;
            $customer->save();

            //Find the Customer_group by ID
            $Customer_group = Customer_group::find($customer->id);

            //For send customer id in Customer_groups table
            $customer_id = $customer->id;

            //customers_group table
            $groupIds = $request->input('groupid');

            if (is_array($groupIds) && count($groupIds) > 0) {
                $Customer_group->groupid = implode(',', $groupIds);
            } else {
                $Customer_group->groupid = null;
            }

            $Customer_group->customer_id = $customer_id;
            $Customer_group->updated_by = $updated_by;
            $Customer_group->save();

            return redirect()->route('customers.profile', $customer_id)->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('customers.profile')->with('error', 'Customer not found');
        }
    }


    public function show($id)
    {
        return view('backend.customer.profile');
    }


    public function import_customer()
    {
        return view('backend.customer.import-customer');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $readerType = $this->getReaderType($extension);



        // Create an instance of CustomerImport
        $import = new CustomerImport();

        // Use the Excel facade to import data
        Excel::import($import, $file, null, $readerType);

        return back()->with('success', 'Customers imported successfully.');
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


    public function pdf()
    {
        $customers = Customer::all();

        $fileName = 'customers.pdf';
        $html = view('backend.customer.pdf', compact('customers'))->render();
        $mpdf = new \Mpdf\Mpdf();

        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }


    public function excel()
    {
        return Excel::download(new CustomerExport, 'customers.xlsx');
    }


    public function excel_file()
    {
        return view('backend.customer.excel');
    }

    public function search(Request $request)
    {
        if (request('keyword')) {
            $customers = Customer::latest()->where('company', 'LIKE', '%' . request('keyword') . '%')
                ->orWhere('phonenumber', 'LIKE', '%' . request('keyword') . '%')
                ->paginate(10);
        } else {
            $customers = Customer::latest()->paginate(10);
        }
        return view('backend.customer.index', ['customers' => $customers]);
    }


    public function contact()
    {
        $contacts = Contact::select('contacts.*', 'customers.company')
            ->latest('contacts.id')
            ->leftJoin('customers', 'customers.id', 'contacts.customer_id')
            ->paginate(10);

        return view('backend.customer.contact')->with([
            'contacts' => $contacts
        ]);
    }


    public function delete_contact(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->first();

        if (empty($contact)) {
            return redirect()->route('customers.contact')->with('error', 'Contact not found');
        }

        $contact->delete();
        return redirect()->route('customers.contact')->with('success', 'Contact removed successfully');
    }


    public function contact_search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            $contacts = Customer::latest()->paginate(10);
        } else {
            $contacts = Contact::latest()
                ->where('firstname', 'LIKE', '%' . $keyword . '%')
                ->orWhere('lastname', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('phonenumber', 'LIKE', '%' . $keyword . '%')
                ->paginate(10);
        }

        return view('backend.customer.contact', ['contacts' => $contacts]);
    }


    public function contact_pdf()
    {
        $contacts = Contact::select('contacts.*', 'customers.company')
            ->latest('contacts.id')
            ->leftJoin('customers', 'customers.id', 'contacts.customer_id')
            ->get();

        $fileName = 'contacts.pdf';
        $html = view('backend.customer.contact-pdf', compact('contacts'))->render();
        $mpdf = new \Mpdf\Mpdf();

        $footer = '<div style="text-align: right; font-size: 10px;">Page {PAGENO}</div>';
        $mpdf->SetFooter($footer);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');
    }


    public function contact_excel()
    {
        return Excel::download(new ContactExport, 'contact_excel.xlsx');
    }

    public function contact_excel_file()
    {
        return view('backend.customer.contact-excel');
    }


    public function delete($id)
    {
        $customer = Customer::where('id', $id)->first();

        if (empty($customer)) {
            return redirect()->route('customers.index')->with('error', 'Record not found');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }


    public function p_update_status(Request $request)
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


    public function pcontactedit($id)
    {
        $peditcontact = Contact::find($id);
        $peditcontact_permission = Contact_permission::where('contact_userid', $peditcontact->id)->get();
        return response()->json([
            'contact' => $peditcontact,
            'permissions' => $peditcontact_permission
        ]);
    }


    public function pcontactupdate(Request $request, $id)
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
        $updateContact->profile_image = 1;
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
}
