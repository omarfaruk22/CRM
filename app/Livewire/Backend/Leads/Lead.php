<?php

namespace App\Livewire\Backend\Leads;

use App\Models\Tag;
use App\Models\Staff;
use App\Models\Contact;
use Livewire\Component;
use App\Models\Countrie;
use App\Models\Customer;
use App\Models\Language;
use App\Models\Tagtable;
use App\Models\MainLead;
use App\Imports\LeadImport;
use App\Models\LeadsSource;
use App\Models\LeadsStatus;
use Livewire\WithPagination;


use Illuminate\Support\Facades\Auth;
use App\Models\LeadsEmailIntegrations;
use GuzzleHttp\Psr7\Query;
use PDF;
use PhpParser\Node\Stmt\Return_;

class Lead extends Component
{
    public $id;
    public $hash;
    public $statuid;
    public $statuids;
    public $name;
    public $title;
    public $tag;
    public $company;
    public $description;
    public $country;
    public $zip;
    public $city;
    public $state;
    public $address;
    public $assigned;
    public $dateadded;
    public $from_form_id;
    public $status, $selectedStatus;
    public $source;
    public $lastcontact;
    public $dateassigned;
    public $last_status_change;
    public $addedfrom;
    public $email;
    public $website;
    public $leadorder;
    public $phonenumber;
    public $date_converted;
    public $lost;
    public $junk;
    public $customer_id;
    public $is_imported_from_email_integration;
    public $email_integration_uid;
    public $is_public;
    public $default_language;
    public $client_id;
    public $lead_value;
    public $delete;
    public $date;
    public $position;
    public $language;
    public $search;
    public $statusorder;
    public $color;
    public $created_by, $firstname, $lastname, $lead_id, $password, $request;
    public $send_set_password_email;
    public $do_not_send_welcome_email;

    public $size = 10;
    use WithPagination;

    public $tags = [];
    public $tagesAdd = [];
    public $tagesIDs = [];

    // protected $listeners = [
    //     'tagsUp' => 'updateTags'
    // ];

    // public function updateTags($tags)
    // {
    //     $this->tags = $tags;
    // }


    protected $rules = [
        'status' => 'required',
        'source' => 'required',
        // 'assigned' => 'required',
        // 'tags' => 'required',
        'name' => 'required|string|max:255',
        // 'address' => 'required|string|max:255',
        // 'position' => 'required|string|max:255',
        // 'city' => 'required|string|max:255',
        // 'email' => 'required|email|max:255',
        // 'state' => 'required|string|max:255',
        // 'website' => 'required|url|max:255',
        // 'country' => 'required|string|max:255',
        // 'phonenumber' => 'required|string|max:255',
        // 'zip' => 'required|string|max:255',
        // 'lead_value' => 'required|numeric',
        // 'language' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        // // 'description' => 'required|string',
        // 'dateadded' => 'required|date',
    ];


    public function render()
    {
        $user = Auth::user();
        $leadsQuery = $user->id == 1 ? MainLead::query() : MainLead::where('created_by', $user->id);

        $searchTerm = "%{$this->search}%";
        $leadsQuery->where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                ->orWhere('company', 'like', $searchTerm)
                ->orWhere('email', 'like', $searchTerm)
                ->orWhere('phonenumber', 'like', $searchTerm)
                ->orWhere('source', 'like', $searchTerm)
                ->orWhere('created_at', 'like', $searchTerm);
        });

        $leads = $leadsQuery->latest()->paginate($this->size);

        $data = [
            'leads' => $leads,
            'countries' => Countrie::all(),
            'languages' => Language::all(),
            'totalLeadCount' => MainLead::count(),
            'totalContactMade' => Customer::whereNotNull('lead_id')->count(),
            'totalPendingCustomer' => MainLead::count() - Customer::whereNotNull('lead_id')->count(),
            'tagsesr' => Tag::all(),
            'statuses' => LeadsStatus::all(),
            'sources' => LeadsSource::all(),
            'emails' => LeadsEmailIntegrations::all(),
            'staffs' => Staff::all(),
        ];

        return view('livewire.backend.leads.lead', $data);
    }


    public function store()
    {

        $timezone = 'Asia/Dhaka';

        $this->validate();

        // Split name into firstname and lastname
        $names = explode(' ', $this->name, 2);
        $firstname = $names[0];
        $lastname = isset($names[1]) ? $names[1] : '';

        $mainLead = MainLead::create([
            'status' => $this->status,
            'source' => $this->source,
            'assigned' => $this->assigned,
            'title' => $this->position,
            'name' => $this->name,
            'address' => $this->address,

            'city' => $this->city,
            'email' => $this->email,
            'state' => $this->state,
            'website' => $this->website,
            'country' => $this->country,
            'phonenumber' => $this->phonenumber,
            'zip' => $this->zip,
            'lead_value' => $this->lead_value,
            'language' => $this->language,
            'company' => $this->company,
            'description' => $this->description,
            'dateadded' => $this->dateadded,
            'is_public' => $this->is_public,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,


        ]);

        if (is_array($this->tagesAdd)) {
            $tagsString = implode(',', $this->tagesAdd);
        } else {
            $tagsString = $this->tagesAdd;
        }


        $tagtable = Tagtable::create([
            'rel_id'     => $mainLead->id,
            'rel_type'   => 'Lead',
            'tag_id'     => $tagsString,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,

        ]);


        $this->resetInput(); // Reset the component's state

        session()->flash('success', 'Lead created (ID: ' . $mainLead->id . ', Company: ' . $mainLead->company . ') successfully.');

        return redirect()->route('leads.inedx');
    }

    // If you want livewire uncomment

    // public function editLead($id)
    // {

    //     $lead = MainLead::find($id);

    //     // dd($lead);

    //     return view('backend.leads.edit', [
    //         'lead' => $lead,
    //     ]);


    //     $this->id               = $lead->id;
    //     $this->status           = $lead->status;
    //     $this->source           = $lead->source;
    //     $this->assigned         = $lead->assigned;
    //     $this->position         = $lead->title;
    //     $this->name             = $lead->name;
    //     $this->address          = $lead->address;
    //     $this->city             = $lead->city;
    //     $this->email            = $lead->email;
    //     $this->state            = $lead->state;
    //     $this->website          = $lead->website;
    //     // $this->tagesIDs          = $lead->website;

    //     $this->country          = $lead->country;
    //     $this->phonenumber      = $lead->phonenumber;
    //     $this->zip              = $lead->zip;
    //     $this->lead_value       = $lead->lead_value;
    //     $this->language         = $lead->language;
    //     $this->company          = $lead->company;
    //     $this->description      = $lead->description;
    //     $this->dateadded        = $lead->dateadded;
    //     $this->is_public        = $lead->is_public;

    //     $customer = Customer::where('lead_id', $this->id)->first();
    //     if ($customer) {
    //         $this->customer_id = $customer->id;
    //     }



    //     $tagids = Tagtable::where('rel_id', $this->id)->first();



    //     if ($tagids) {
    //         $this->tagesIDs = $tagids->rel_id;
    //     }
    // }




    // public function updateLead()
    // {
    //     $this->validate();
    //     // Update the MainLead
    //     $mainLead = MainLead::find($this->id);
    //     $mainLead->update([
    //         'status' => $this->status,
    //         'source' => $this->source,
    //         'assigned' => $this->assigned,
    //         'title' => $this->position,
    //         'name' => $this->name,
    //         'address' => $this->address,
    //         'city' => $this->city,
    //         'email' => $this->email,
    //         'state' => $this->state,
    //         'website' => $this->website,
    //         'country' => $this->country,
    //         'phonenumber' => $this->phonenumber,
    //         'zip' => $this->zip,
    //         'lead_value' => $this->lead_value,
    //         'language' => $this->language,
    //         'company' => $this->company,
    //         'description' => $this->description,
    //         'dateadded' => $this->dateadded,
    //         'is_public' => $this->is_public,
    //     ]);



    //     if (!empty($this->tagesIDs)) {
    //         // Convert tags array to a comma-separated string
    //         if (is_array($this->tagesIDs)) {
    //             $tagsString = implode(',', $this->tagesIDs);
    //         } else {
    //             $tagsString = $this->tagesIDs;
    //         }

    //         $tagtable = Tagtable::where('rel_id', $this->id)->first();
    //         // Update or create the tagtable
    //         $tagtable = Tagtable::updateOrCreate(
    //             ['rel_id' => $mainLead->id],
    //             [
    //                 'rel_type' => 'lead',
    //                 'tag_id' => $tagsString,
    //                 'created_by' => Auth::user()->id,
    //                 'updated_by' => Auth::user()->id,
    //             ]
    //         );
    //     }

    //     session()->flash('success', 'Lead updated successfully.');
    // }


    // public function editCustomer($id)
    // {
    //     $lead = MainLead::findOrFail($id);

    //     $names = explode(' ', $lead->name, 2);
    //     $this->firstname = $names[0];
    //     $this->lastname = isset($names[1]) ? $names[1] : '';

    //     $this->lead_id = $lead->id;
    //     $this->status = $lead->status;
    //     $this->source = $lead->source;
    //     $this->assigned = $lead->assigned;
    //     $this->position = $lead->title;
    //     $this->address = $lead->address;
    //     $this->city = $lead->city;
    //     $this->email = $lead->email;
    //     $this->state = $lead->state;
    //     $this->website = $lead->website;
    //     $this->country = $lead->country;
    //     $this->phonenumber = $lead->phonenumber;
    //     $this->zip = $lead->zip;
    //     $this->lead_value = $lead->lead_value;
    //     $this->language = $lead->language;
    //     $this->company = $lead->company;
    //     $this->description = $lead->description;
    //     $this->dateadded = $lead->dateadded;
    //     $this->send_set_password_email = $lead->send_set_password_email;
    //     $this->do_not_send_welcome_email = $lead->do_not_send_welcome_email;
    // }



    // public function updateLeadTOCustomer()
    // {

    //     $mainLead = MainLead::find($this->id);

    //     // Create the Customer
    //     $customer = Customer::create([
    //         'lead_id' => $mainLead->id,
    //         'address' => $this->address,
    //         'website' => $this->website,
    //         'phonenumber' => $this->phonenumber,
    //         'company' => $this->company,
    //         'city' => $this->city,
    //         'state' => $this->state,
    //         'country' => $this->country,
    //         'zip' => $this->zip,
    //         'billing_street' => $this->state,
    //         'billing_city' => $this->city,
    //         'billing_state' => $this->state,
    //         'billing_zip' => $this->zip,
    //         'billing_country' => $this->country,
    //         'description' => $this->description,
    //         'default_language' => $this->language,
    //         'created_by' => Auth::user()->id,

    //     ]);

    //     // Update MainLead with the new customer ID
    //     if ($mainLead->id == $customer->lead_id) {
    //         $mainLead->client_id = $customer->id;
    //         $mainLead->save();
    //     }


    //     // Create the Contact
    //     if ($this->send_set_password_email) {
    //         Contact::create([
    //             'firstname' => $this->firstname,
    //             'lastname' => $this->lastname,
    //             'email' => $this->email,
    //             'phonenumber' => $this->phonenumber,
    //             'title' => $this->position,
    //             'customer_id' => $customer->id,
    //             'created_by' => Auth::user()->id,
    //             'password' => bcrypt($this->email),
    //             'new_pass_key' => bcrypt($this->email),
    //         ]);
    //     } else {
    //         Contact::create([
    //             'firstname' => $this->firstname,
    //             'lastname' => $this->lastname,
    //             'email' => $this->email,
    //             'phonenumber' => $this->phonenumber,
    //             'title' => $this->position,
    //             'customer_id' => $customer->id,
    //             'created_by' => Auth::user()->id,
    //             'password' => bcrypt($this->password),
    //             'new_pass_key' => bcrypt($this->password),
    //         ]);
    //     }


    //     // Update the tagtable
    //     $tagtable = Tagtable::where('rel_id', $this->id)->first();

    //     $tagtable->update([
    //         'rel_id'     => $mainLead->id,
    //         'rel_type'   => 'lead',
    //         'tag_id'     =>  $tagtable->tag_id,
    //         'created_by' => Auth::user()->id,
    //         'updated_by' => Auth::user()->id,
    //     ]);
    //     $this->dispatch('close-modal');
    //     $this->resetInput();

    //     return redirect()->route('customers.profile', ['id' => $customer->id])->with('success', 'Lead Customer Updated Successfully');
    // }




    public function deleteLE($id)
    {
        $lead = MainLead::findOrFail($id);
        $this->id               = $lead->id;
    }

    public function deleteLead()
    {

        MainLead::find($this->id)->delete();
        $this->resetInput(); // Reset the component's state

        return redirect()->route('leads.inedx')->with('success', ' Lead Deleted Successfully');
    }

    private function resetInput()
    {
        $this->source = null;
        $this->assigned = null;
        $this->name = null;
        $this->address = null;
        $this->position = null;
        $this->city = null;
        $this->email = null;
        $this->state = null;
        $this->website = null;
        $this->country = null;
        $this->phonenumber = null;
        $this->zip = null;
        $this->lead_value = null;
        $this->language = null;
        $this->company = null;
        $this->description = null;
        $this->dateadded = null;
        $this->statusorder = null;
        $this->color = null;
        $this->created_by = null;
        $this->customer_id = null;
        $this->tagesIDs = [];
        $this->tagesAdd = [];
    }



    public function leadstatusstore()
    {
        LeadsStatus::create([
            'name' => $this->name,
            'statusorder' => $this->statusorder ?: 1,
            'color' => $this->color ?: '#ffffff',
            'created_by' => Auth::user()->id,
        ]);

        $this->dispatch('close-modal');
        // $this->resetInput();
        session()->flash('success', ' Status created Successfully');
    }



    public function closeModal()
    {
        $this->resetInput();
    }



    public function leadsourcestore()
    {
        LeadsSource::create([
            'name' => $this->name,
            'created_by' => Auth::user()->id,
        ]);
        $this->dispatch('close-modal');
        // $this->resetInput();
        session()->flash('success', 'Source created  Successfully');
    }

    public function tagstore()
    {
        Tag::create([
            'tags' => $this->tags,
        ]);

        $this->resetInput();

        session()->flash('success', ' Tag  created Successfully');
    }








    public function pdfpopdownload()
    {
        return redirect()->route('lead.pdf.index', ['id' => $this->id]);
    }

    public function editLeadstatus($id)
    {

        $lead = MainLead::findOrFail($id);
        $this->id               = $lead->id;
        $this->status           = $lead->status;
        $this->selectedStatus   = $lead->selectedStatus;
    }


    public function updateLeadStatus()
    {

        // dd($this);

        $mainLead = MainLead::find($this->id);
        $status =  $this->selectedStatus;
        if ($mainLead) {
            $mainLead->update([
                'status' => $status,
            ]);
            return redirect()->route('leads.inedx')->with('success', 'Lead Status Updated [ (ID: ' . $mainLead->id . ', Company: ' . $mainLead->company . ') ] successfully.');
        }
    }
}
