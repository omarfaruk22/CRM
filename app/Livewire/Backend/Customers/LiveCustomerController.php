<?php

namespace App\Livewire\Backend\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class LiveCustomerController extends Component
{
    public $size = 10;
    use WithPagination;
    public $search;

    public function render()
    {
        $user = Auth::user();
        $customersQuery = $user->id == 1 ? Customer::query() : Customer::where('created_by', $user->id);

        $searchTerm = "%{$this->search}%";
        $customersQuery->where(function ($query) use ($searchTerm) {
            $query->where('company', 'like', $searchTerm)
                ->orWhere('phonenumber', 'like', $searchTerm)
                ->orWhere('active', 'like', $searchTerm) // Assuming 'active' is a boolean or integer field
                ->orWhere('zip', 'like', $searchTerm)
                ->orWhere('created_by', 'like', $searchTerm)
                ->orWhere('updated_by', 'like', $searchTerm)
                ->orWhere('created_at', 'like', $searchTerm)
                ->orWhere('updated_at', 'like', $searchTerm)
                ->orWhere('city', 'like', $searchTerm)
                ->orWhere('country', 'like', $searchTerm);
            // Add more search criteria as needed
        });

        $customers = $customersQuery->paginate($this->size);

        return view('livewire.backend.customers.live-customer-controller', [
            'customers' => $customers,
            'contacts' => Contact::select('id', 'firstname', 'lastname')->get(),
            'totalCustomers' => Customer::count(),
            'activeCustomers' => Customer::where('active', 1)->count(),
            'inactiveCustomers' => Customer::where('active', 0)->count(),
            'totalContacts' => Contact::count(),
            'activeContacts' => Contact::where('active', 1)->count(),
            'inactiveContacts' => Contact::where('active', 0)->count(),
        ]);
    }
}
