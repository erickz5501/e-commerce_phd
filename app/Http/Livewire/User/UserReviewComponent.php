<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\OrderItem;

class UserReviewComponent extends Component
{
    public $order_item_id;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component',['orderItem'=>$orderItem])->layout('layouts.base');;
    }
}
