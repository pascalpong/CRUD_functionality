<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies',[
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/',$filename);
        }
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->logo = $filename ?? null;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        if($company)
            return redirect("companies/$company->id")->with('message','Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        if($company)
            return redirect()->back()->with('message', $company ? 'Updated' : 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        if($company)
            return back()->with('message', $company ? 'Deleted' : 'Error');
    }
}
