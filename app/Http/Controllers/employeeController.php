<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::select('SELECT * FROM tbl_employees');
        $departments = DB::select('SELECT * FROM tbl_departments');
        return view('index', ['employee' => $employees, 'department' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:50',
            'Address' => 'required|max:50',
            'Department' => 'required',
            'Email' => 'required|email',
            'ContactNumber' => 'required|numeric',
            'DateEmployed' => 'required|date_format:m/d/Y',
            'Position' => 'required',
        ]);


        $Name = $request->input('Name');
        $Address = $request->input('Address');
        $Department = $request->input('Department');
        $Email = $request->input('Email');
        $ContactNumber = $request->input('ContactNumber');
        $DateEmployed = $request->input('DateEmployed');
        $Position = $request->input('Position');
        DB::insert('INSERT INTO tbl_employees (emp_name, emp_address, emp_department, emp_email, emp_contactNum, emp_dateEmployed, emp_position) VALUES (?,?,?,?,?,?,?)', [$Name, $Address, $Department, $Email, $ContactNumber, $DateEmployed, $Position]);

        return redirect()->route('employee.index')->with('success', 'Employee Added Successfully');
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
        $employees = DB::select('SELECT * FROM tbl_employees WHERE emp_id=?', [$id]);
        $departments = DB::select('SELECT * FROM tbl_departments');
        return view('edit', ['employee' => $employees, 'department' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Name' => 'required|max:50',
            'Address' => 'required|max:50',
            'Department' => 'required',
            'Email' => 'required|email',
            'ContactNumber' => 'required|numeric',
            'DateEmployed' => 'required|date_format:m/d/Y',
            'Position' => 'required',
        ]);

        $Name = $request->input('Name');
        $Address = $request->input('Address');
        $Department = $request->input('Department');
        $Email = $request->input('Email');
        $ContactNumber = $request->input('ContactNumber');
        $DateEmployed = $request->input('DateEmployed');
        $Position = $request->input('Position');


        DB::update('UPDATE tbl_employees SET emp_name = ?, emp_address = ?, emp_department = ?, emp_email = ?, emp_contactNum = ?, emp_dateEmployed = ?, emp_position = ? WHERE emp_id = ?', [$Name, $Address, $Department, $Email, $ContactNumber, $DateEmployed, $Position, $id]);
        return redirect()->route('employee.index')->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('DELETE FROM tbl_employees WHERE emp_id = ?', [$id]);
        return redirect()->route('employee.index')->with('success', 'Employee Deleted Successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $data = $request->input();
        $request->session()->put('username', $data['username']);

        if ($username == 'admin' && $password == '1234') {
            return redirect()->route('employee.index');
        } else {
            return redirect()->back()->withErrors(['error' => 'Incorrect Username and/or password. Try username = admin & password = 1234']);
        }
    }
}
