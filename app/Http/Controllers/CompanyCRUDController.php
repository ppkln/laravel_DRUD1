<?php

namespace App\Http\Controllers;

use App\Models\company; //เพิ่มเอง เป็นการเรียกใช้งานตารางข้อมูลที่ชื่อว่า company ได้สร้างไว้ที่ phpMyAdmin
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    //Create Index เพิ่มเอง
    public function index(){
       $data['companies'] = company::orderBy('id','desc')->paginate(5);
       return view('companies.index', $data);
    }

    // create page เพิ่มเอง
    public function create(){
        return view('companies.create');
    }
    // store resource
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $company = New company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success','Company has been created.');

    }
    //Edit 
    public function edit(company $company){
        return view('companies.edit', compact('company'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'address'=> 'required'
        ]);
        $company = company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success','Company has been update.');
    }

    //Delete 
    public function destroy(company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been delete.');
    }

}
