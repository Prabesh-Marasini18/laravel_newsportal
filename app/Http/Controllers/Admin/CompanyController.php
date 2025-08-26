<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::first();
        return view("admin.company.index", compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.company.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:50",
            "email" => "required|email",
            "phone" => "required|digits_between:10,14",
            "logo" => "required|image|mimes:jpeg,png,jpg,,avif|max:2048",
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $file = $request->logo;
        if($file){
           $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move('images', $file_name);
              $company->logo = "images/$file_name";
        }
        $company->save();
        toast('Company created successfully!', 'success');



        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view("admin.company.edit", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|max:50",
            "email" => "required|email",
            "phone" => "required|digits_between:10,14",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,,avif|max:2048",
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $file = $request->logo;
        if($file){
            if($company->logo){
                unlink($company->logo);
            }
           $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move('images', $file_name);
              $company->logo = "images/$file_name";
        }
        toast('Company updated successfully!', 'success');
        $company->save();
         return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        if($company->logo){
            unlink($company->logo);
        }
        $company->delete();
        toast('Company deleted successfully!', 'success');
        return redirect()->route('admin.company.index');
    }
}
