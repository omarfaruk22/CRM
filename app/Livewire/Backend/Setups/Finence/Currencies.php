<?php

namespace App\Livewire\Backend\Setups\Finence;

use App\Models\Currency;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Currencies extends Component
{

    use WithPagination;

    #[Rule([
        'name' => ['required'],
        'symbol' => 'required',
        'placement' => 'required',
    ])]

    public $id, $name, $symbol, $decimal_separator = ',', $thousand_separator = '.', $placement, $search, $size = 10;

    public function render()
    {
        $data['currencies'] = Currency::where('name', 'like', "%{$this->search}%")->paginate($this->size);

        return view('livewire.backend.setups.finence.currencies', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'symbol' => 'required',
            'placement' => 'required',
        ]);

        if (Currency::count() == 0) {
            $isdefault = 1;
        } else {
            $isdefault = 0;
        }

        Currency::create([
            'name' => $this->name,
            'symbol' => $this->symbol,
            'decimal_separator' => $this->decimal_separator,
            'thousand_separator' => $this->thousand_separator,
            'placement' => $this->placement,
            'isdefault' => $isdefault,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Currency Added Successfully!');
    }

    public function edit($id)
    {
        $currency = Currency::find($id);

        $this->id = $currency->id;
        $this->name = $currency->name;
        $this->symbol = $currency->symbol;
        $this->decimal_separator = $currency->decimal_separator;
        $this->thousand_separator = $currency->thousand_separator;
        $this->placement = $currency->placement;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'symbol' => 'required',
            'placement' => 'required',
        ]);

        Currency::find($this->id)->update([
            'name' => $this->name,
            'symbol' => $this->symbol,
            'decimal_separator' => $this->decimal_separator,
            'thousand_separator' => $this->thousand_separator,
            'placement' => $this->placement,
        ]);

        $this->dispatch('close-modal');

        $this->resetInput();

        session()->flash('success', 'Currency Update Successfully!');
    }

    public function base_currency($id)
    {
        $this->id = $id;
    }

    public function default()
    {
        Currency::query()->update(['isdefault' => 0]);

        Currency::find($this->id)->update([
            'isdefault' => 1,
        ]);

        session()->flash('success', 'Default Currency Update Successfully!');
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $tax = Currency::find($this->id);

        $tax->delete();

        return back()->with('success', 'Currency Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset('id', 'name', 'symbol', 'decimal_separator', 'thousand_separator', 'placement');
    }
}
