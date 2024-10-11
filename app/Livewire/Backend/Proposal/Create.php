<?php

namespace App\Livewire\Backend\Proposal;

use App\Models\Countrie;
use App\Models\Currencie;
use App\Models\ProposalItem;
use App\Models\SalesProposal;
use Livewire\Component;
use Illuminate\Http\Request;

class Create extends Component
{
    public $subject, $releted, $subreleted, $status, $assigned, $to, $address, $estimateDate, $opentill, $city, $state, $zipcode,
        $email, $phone, $itemid, $total, $default_currency;
    public function render()
    {
        $data['countries'] = Countrie::all();
        $data['currencies'] = Currencie::all();
        $data['proposalItems'] = ProposalItem::all();
        return view('livewire.backend.proposal.create', $data);
    }

    public function store()
    {
        SalesProposal::create([
            'subject' => $this->subject,
            'releted' => $this->releted,
            'subreleted' => $this->subreleted,
            'status' => $this->status,
            'assigned' => $this->assigned,
            'to' => $this->to,
            'address' => $this->address,
            'estimateDate' => $this->estimateDate,
            'opentill' => $this->opentill,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'email' => $this->email,
            'phone' => $this->phone,
            'itemid' => $this->itemid,
            'total' => $this->total,
            'default_currency' => $this->default_currency,
        ]);
        return back();
    }
}
