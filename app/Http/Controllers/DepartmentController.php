<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Repositories\Eloquents\DepartmentRepository;
use Exception;

class DepartmentController extends Controller
{
    private DepartmentRepository $departmentRepo;

    public function __construct(DepartmentRepository $departmentRepo){
        $this->departmentRepo = $departmentRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $departments = $this->departmentRepo->all();
        }catch(Exception $e){
            throw $e;
        }

        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = new Department();
        return view('departments.create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();

        try{
            $this->departmentRepo->store($data);
            return redirect()->route('departments.index')->with('success', 'The department has been created successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        try{
            $this->departmentRepo->update($department,$data);
            return redirect()->route('departments.index')->with('success', 'The department has been updated successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try{
            $this->departmentRepo->delete($department);
            return redirect()->route('departments.index')->with('success', 'The department has been deleted successfully');
        }catch(Exception $e){
            throw $e;
        }
    }
}
