<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(){
        $cities = City::all();
        return view('Customers.create', compact('cities'));
    }


    public function store(Request $request){
        $customer = new Customer();
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.list');
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        $cities = City::all();

        return view('Customers.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->city_id  = $request->input('city_id');
        $customer->save();

        //dung session de dua ra thong bao
//        Session::flash('success', 'Cập nhật khách hàng thành công');

        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.list');
    }

    public function index(){
        $customers = Customer::all();
        $cities = City::all();
        return view('Customers.list', compact('customers', 'cities'));
    }


    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('Customers.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }



    public  function  destroy($id){
        $customers= Customer::find($id);
//        $customers->customers()->delete();
        $customers->delete();
        return redirect()->route('customers.list');

    }



}
