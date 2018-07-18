<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::paginate(10);
       // dd($companys);
        return view('company.index', compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'website'=>'required',
            'email' =>'required',
            'logo'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $data['name'] = $request->input('name');
        $data['website'] = $request->input('website');
        $data['email'] = $request->input('email');

         if($request->hasFile('logo')) {
            $destination = 'img/';
            $file = $request->file('logo');
            $file->move($destination, time().$file->getClientOriginalName());
           $data['logo'] = time().$file->getClientOriginalName();

        } else {
            $data['logo'] = "logo.jpg";
        }

        Company::create($data);
        return back()->with('msg','Company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrfail($id);

        return view('company.edit',compact('company'));
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
        $input = $request->all();
        $company = Company::findOrFail($id);
        $company->update($input);
        return back()->with('msg','Company updated successfully');
    }

    public function details(Request $request, $id)
    {
      //  dd(1);
        $input = $request->all();
        $company = Company::findOrFail($id);
        $company->update($input);
        return back()->with('msg','Company updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $company = Company::findOrFail($id);
        $company->delete();
        return back()->with('msg','Company deleted successfully');
    }

    public function delete($id)
    {

         $company = Company::findOrFail($id);
        $company->delete();
        return back()->with('msg','Company deleted successfully');
    }
}
