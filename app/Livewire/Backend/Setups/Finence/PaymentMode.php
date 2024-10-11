<?php

namespace App\Livewire\Backend\Setups\Finence;

use App\Models\PaymentMode as ModelsPaymentMode;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentMode extends Component
{
    use WithPagination;

    #[Rule([
        'name' => 'required',
    ])]

    public $id, $name, $description, $active = 0, $show_on_pdf = 0, $selected_by_default = 0, $invoices_only = 0, $expenses_only = 0, $search, $size = 10;


    public function render()
    {
        $data['payment_modes'] = ModelsPaymentMode::where('name', 'like', "%{$this->search}%")->paginate($this->size);

        return view('livewire.backend.setups.finence.payment-mode', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        ModelsPaymentMode::create([
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
            'show_on_pdf' => $this->show_on_pdf,
            'selected_by_default' => $this->selected_by_default,
            'invoices_only' => $this->invoices_only,
            'expenses_only' => $this->expenses_only,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Payment Mode Added Successfully!');
    }

    public function edit($id)
    {
        $paymentMode = ModelsPaymentMode::find($id);

        $this->id = $paymentMode->id;
        $this->name = $paymentMode->name;
        $this->description = $paymentMode->description;
        $this->active = $paymentMode->active;
        $this->show_on_pdf = $paymentMode->show_on_pdf;
        $this->invoices_only = $paymentMode->invoices_only;
        $this->expenses_only = $paymentMode->expenses_only;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        ModelsPaymentMode::find($this->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
            'show_on_pdf' => $this->show_on_pdf,
            'selected_by_default' => $this->selected_by_default,
            'invoices_only' => $this->invoices_only,
            'expenses_only' => $this->expenses_only,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Payment Mode Update Successfully!');
    }

    public function active_status($id)
    {
        ModelsPaymentMode::find($id)->update([
            'active' => 1,
        ]);

        session()->flash('success', 'Active Successfully!');
    }

    public function deactive($id)
    {
        ModelsPaymentMode::find($id)->update([
            'active' => 0,
        ]);

        session()->flash('success', 'Deactive Successfully!');
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $tax = ModelsPaymentMode::find($this->id);

        $tax->delete();

        return back()->with('success', 'ModelsPaymentMode Delete Successfully');
    }

    public function resetInput()
    {
        $this->reset('id', 'name', 'description', 'active', 'show_on_pdf', 'selected_by_default', 'invoices_only', 'expenses_only');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
