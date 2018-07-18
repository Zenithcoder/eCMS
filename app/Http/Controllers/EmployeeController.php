<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $companys =  Company::all();
       return view('employee.create', compact('companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //','','','','
       $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email' =>'required',
            'phone'=>'required'
        ]);

        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['company_id'] = $request->input('company_id');


        Employee::create($data);
        return back()->with('msg','Employee added successfully');
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
        $employee = Employee::findOrfail($id);
         $companys =  Company::all();

        return view('employee.edit',compact('companys','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        $input = $request->all();
        $company = Company::findOrFail($id);
        $company->update($input);
        return back()->with('msg','Employee updated successfully');
    }
*/
    public function details(Request $request, $id)
    {
       // dd(1);
        $input = $request->all();
        $employee = Employee::findOrFail($id);
        $employee->update($input);
        return back()->with('msg','Employee updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function destroy($id)
    {

         $company = Company::findOrFail($id);
        $company->delete();
        return back()->with('msg','Employee deleted successfully');
    }*/

    public function delete($id)
    {

         $company = Employee::findOrFail($id);
        $company->delete();
        return back()->with('msg','Employee deleted successfully');
    }
}
