<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    use WithPagination;

    protected $listeners=[
        'deleteRow'=>'deleteCoupon'
    ];

    public function deleteCoupon($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        $this->emit('coupon-deleted', 'Cupon eliminado');
        session('message', 'Cupon elminado correctamente');
    }

    public function render()
    {
        $coupons = Coupon::all();
        $coupons = Coupon::paginate(5);
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.base_admin');
    }
}
