<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\Eloquents\DepartmentRepository;
use App\Repositories\Eloquents\EmployeeRepository;
use App\Repositories\Eloquents\SkillRepository;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private $employeeRepo;
    private $skillRepo;

    public function __construct(EmployeeRepository $employeeRepo,SkillRepository $skillRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->skillRepo = $skillRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentRepository $departmentRepo)
    {
        try{
            $employees = $this->employeeRepo->all();
            $departments = $departmentRepo->all();
            return view('employees.index',compact('employees', 'departments'));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            $employee = new employee();
            $skills = $this->skillRepo->all();
            return view('employees.create',compact('employee', 'skills'));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();

        try{
            $this->employeeRepo->store($data);
            return redirect()->route('employees.index')->with('success', 'The employee has been created successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validated();

        try{
            $this->employeeRepo->update($employee,$data);
            return redirect()->route('employees.index')->with('success', 'The employee has been updated successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try{
            $this->employeeRepo->delete($employee);
            return redirect()->route('employees.index')->with('success', 'The employee has been deleted successfully');
        }catch(Exception $e){
            throw $e;
        }
    }
}
