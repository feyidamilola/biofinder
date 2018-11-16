<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendor;
use App\Bioproduct;
use App\SubCategories;

class VendorsController extends Controller
{
    //
    public function addVendor(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            if(!empty($data['enable'])) {
                $enable = 1;
            } else {
                $enable = 0;
            }

            $vendor = new Vendor;
            $vendor->vendor_name = $data['vendor_name'];
            $vendor->address = $data['address'];
            $vendor->phone_number = $data['phone_number'];
            $vendor->url = str_slug($data['vendor_name']);
            $vendor->enable = $enable;
            $vendor->save();
            return redirect('/admin/add-vendor')->with('flash_message_success', 'Vendor successfully created.');
        }
        return view('admin.vendors.add_vendor');
    }

    public function viewVendors(){ 
        $vendors = Vendor::get();
        return view('admin.vendors.view_vendors')->with(compact('vendors'));
    }

    public function newVendors(){ 
        $vendors = Vendor::where('enable', 0)->get();
        return view('admin.vendors.view_vendors')->with(compact('vendors'));
    }

    public function editVendor(Request $request, $id = null){
        if($request->isMethod('post')) {
            $data = $request->all();

            if(!empty($data['enable'])) {
                $enable = 1;
            } else {
                $enable = 0;
            }

            // echo "pre>"; print_r($data); die;
            Vendor::where(['id'=> $id])->update([
                        'vendor_name'=>$data['vendor_name'],
                        'address'=>$data['address'],
                        'phone_number'=>$data['phone_number'],
                        'enable'=>$enable
                        ]);
            return redirect('/admin/all-vendors')->with('flash_message_success', 'Vendor has been successfully updated.');;
        }
        $vendordetails = Vendor::where(['id'=>$id])->first();
        return view('admin.vendors.edit_vendor')->with(compact('vendordetails'));
    }

    public function deleteVendor($id = null){
        Vendor::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Vendor has been deleted successfully');
    }

    public function fetchVendorProducts($url){
        $allvendors = Vendor::where('url' , $url)->get()->first();
        $vendor_name = $allvendors->vendor_name;
        $bioproducts = Bioproduct::where('vendor_name' , $vendor_name)->paginate(12);

        $subcategories = SubCategories::get();
        $vendors = Vendor::get();
        
        if(count($bioproducts) <= 0) {
            return back()->with('flash_message_error','No result found');
        }
        
        return view('products.allvendorproducts')->with(compact('bioproducts', 'subcategories', 'vendors'));
    }

    public function ViewFrontendVendors(){ 
        $vendors = Vendor::where('enable', 1)->get();
        return view('vendors')->with(compact('vendors'));
    }

    public function VendorSignup(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            if(!empty($data['enable'])) {
                $enable = 1;
            } else {
                $enable = 0;
            }

            $vendor = new Vendor;
            $vendor->vendor_name = $data['vendor_name'];
            $vendor->address = $data['address'];
            $vendor->phone_number = $data['phone_number'];
            $vendor->url = str_slug($data['vendor_name']);
            $vendor->enable = $enable;
            $vendor->save();
            return redirect('/vendors')->with('flash_message_success', 'You will be contacted soon, thank you for your interest.');
        }
        return view('admin.vendors.createvendor');
    }
}
