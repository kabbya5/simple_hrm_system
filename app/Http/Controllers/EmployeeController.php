<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Eloquents\DepartmentRepository;
use App\Repositories\Eloquents\EmployeeRepository;
use App\Repositories\Eloquents\SkillRepository;
use App\Traits\FileUploadTrait;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use FileUploadTrait;

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
    public function index()
    {
        try{
            $employees = $this->employeeRepo->all();
            return view('employees.index',compact('employees',));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DepartmentRepository $departmentRepo)
    {
        try{
            $employee = new employee();
            $skills = $this->skillRepo->all();
            $departments = $departmentRepo->all();
            return view('employees.create',compact('employee', 'skills' ,  'departments'));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
     
        if($request->hasFile('image')){
            $data['image_path'] = $this->uploadFile($request->file('image'), 'employee');
        }

        try{
            $employee = $this->employeeRepo->store($data);
            $employee->skills()->attach($data['skills']);
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
        $employee->load('skills', 'department');

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee, DepartmentRepository $departmentRepo)
    {
        try{
            $employee->load('skills');
            $skills = $this->skillRepo->all();
            $departments = $departmentRepo->all();
            return view('employees.edit',compact('employee', 'skills' ,  'departments'));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        try{
            if($request->hasFile('image')){
                $this->deleteFile($employee->image_url);
                $data['image_path'] = $this->uploadFile($request->file('image'), 'employee');
            }
            $this->employeeRepo->update($employee,$data);
            $employee->skills()->sync($request->skills);
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
            $this->deleteFile($employee->image_path);
            $this->employeeRepo->delete($employee);
            return redirect()->route('employees.index')->with('success', 'The employee has been deleted successfully');
        }catch(Exception $e){
            throw $e;
        }
    }
}
