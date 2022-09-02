<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{

    public $ship_different;

    public $firstname;
    public $lastname;
    public $mobile1;
    public $mobile2;
    public $email;
    public $departament;
    public $province;
    public $district;
    public $address;
    public $reference;
    public $zip;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile1;
    public $s_mobile2;
    public $s_email;
    public $s_departament;
    public $s_province;
    public $s_district;
    public $s_address;
    public $s_reference;
    public $s_zip;

    public $paymentmode;
    public $thankyou;

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout("layouts.base");
    }

    public function placeOrder(){

        $this->validate([
             'firstname'=>'required',
             'lastname'=>'required',
             'mobile1'=>'required|numeric',
             'mobile2'=>'required|numeric',
             'email'=>'required|email',
             'departament'=>'required',
             'province'=>'required',
             'district'=>'required',
             'address'=>'required',
             'reference'=>'required',
             'zip'=>'required',
             'paymentmode'=>'required'
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile1 = $this->mobile1;
        $order->mobile2 = $this->mobile2;
        $order->email = $this->email;
        $order->departament = $this->departament;
        $order->province = $this->province;
        $order->district = $this->district;
        $order->address = $this->address;
        $order->reference = $this->reference;
        $order->zipcode = $this->zip;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_different ? 1:0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->ship_different) {
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_mobile1'=>'required|numeric',
                's_mobile2'=>'required|numeric',
                's_email'=>'required|email',
                's_departament'=>'required',
                's_province'=>'required',
                's_district'=>'required',
                's_address'=>'required',
                's_reference'=>'required',
                's_zip'=>'required',
           ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile1 = $this->s_mobile1;
            $shipping->mobile2 = $this->s_mobile2;
            $shipping->email = $this->s_email;
            $shipping->departament = $this->s_departament;
            $shipping->province = $this->s_province;
            $shipping->district = $this->s_district;
            $shipping->address = $this->s_address;
            $shipping->reference = $this->s_reference;
            $shipping->zipcode = $this->s_zip;
            $shipping->save();
        }

        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }elseif($this->paymentmode == 'visa'){
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'visa';
            $transaction->status = 'approved';
            $transaction->save();
        }elseif($this->paymentmode == 'banca'){
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'banca';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

    }

    public function verifyForCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }else if($this->thankyou){
            return redirect()->route('thankyou');
        }else if(!session()->get('checkout')){
            return redirect()->route('producto.cart');
        }
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'firstname'=>'required',
             'lastname'=>'required',
             'mobile1'=>'required|numeric',
             'mobile2'=>'required|numeric',
             'email'=>'required|email',
             'departament'=>'required',
             'province'=>'required',
             'district'=>'required',
             'address'=>'required',
             'reference'=>'required',
             'zip'=>'required',
             'paymentmode'=>'required',
        ]);

        if ($this->ship_different) {
            $this->validateOnly($fields,[
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_mobile1'=>'required|numeric',
                's_mobile2'=>'required|numeric',
                's_email'=>'required|email',
                's_departament'=>'required',
                's_province'=>'required',
                's_district'=>'required',
                's_address'=>'required',
                's_reference'=>'required',
                's_zip'=>'required',
           ]);
        }

    }

}
