<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Repositories\Eloquents\SkillRepository;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private $skillRepo;

    public function __construct(SkillRepository $skillRepo)
    {
        $this->skillRepo = $skillRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $skills = $this->skillRepo->all();
            return view('skills.index',compact('skills'));
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skill = new Skill();
        return view('skills.create',compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $data = $request->validated();

        try{
            $this->skillRepo->store($data);
            return redirect()->route('skills.index')->with('success', 'The skill has been created successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $data = $request->validated();

        try{
            $this->skillRepo->update($skill,$data);
            return redirect()->route('skills.index')->with('success', 'The skill has been updated successfully');
        }catch(Exception $e){
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try{
            $this->skillRepo->delete($skill);
            return redirect()->route('skills.index')->with('success', 'The skill has been deleted successfully');
        }catch(Exception $e){
            throw $e;
        }
    }
}
