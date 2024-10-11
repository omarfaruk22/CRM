<?php

namespace App\Livewire\Backend\Sales\Item;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TbItem;
use App\Models\Tax;
use App\Models\ItemGroup;

class Itemtable extends Component
{
    public $search;
    public $size = 10;
    public $id;
    public $tax, $tax1, $tax2;
    public $description, $long_description, $rate, $unit, $group_id, $currency;


    use WithPagination;

    protected $rules = [
        'description' => 'required|string|max:255',
        'long_description' => 'nullable|string',
        'unit' => 'nullable|integer',
    ];

    public function render()
    {
        $items = TbItem::query()
            ->where('description', 'like', "%{$this->search}%")
            ->orWhere('long_description', 'like', "%{$this->search}%")
            ->orWhere('rate', 'like', "%{$this->search}%")
            ->orWhere('tax', 'like', "%{$this->search}%")
            ->orWhere('tax2', 'like', "%{$this->search}%")
            ->orWhere('unit', 'like', "%{$this->search}%")
            ->orWhere('rate_currency_2', 'like', "%{$this->search}%")
            ->orWhere('currency', 'like', "%{$this->search}%")
            ->orWhere('created_at', 'like', "%{$this->search}%")
            ->orWhere('updated_at', 'like', "%{$this->search}%")
            ->orderByDesc('id')
            ->paginate($this->size);

        $groups = ItemGroup::all();
        $taxes = Tax::all();


        return view('livewire.backend.sales.item.itemtable', [
            'items' => $items,
            'groups' => $groups,
            'taxes' => $taxes,

        ]);
    }

    public function editItemview($id)
    {
        $item = TbItem::findOrFail($id);
        // dd($item);
        $this->id = $item->id;
        $this->description = $item->description;
        $this->long_description = $item->long_description;
        $this->rate = $item->rate;
        $this->unit = $item->unit;
        $this->group_id = $item->group_id;
        $this->currency = $item->currency;
    }

    public function deleteItemview($id)
    {

        $item = TbItem::findOrFail($id);
        dd($item);
    }

    private function resetInput()
    {
        $this->description = null;
        $this->long_description = null;
        $this->rate = null;
        $this->unit = null;
        $this->group_id = null;
        $this->currency = null;
        $this->tax = null;
        $this->tax1 = null;
        $this->tax2 = null;
    }
    public function closeModal()
    {
        $this->resetInput();
    }
}
