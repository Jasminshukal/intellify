<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\EditSection;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section=Section::with('module')->get();
        return view('Section.index',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Section.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditSection $request)
    {
        if(Section::create($request->all('name','status')))
        {
            return redirect()->route('Sections.index')->withSuccess('New section successfully added.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        dd("view resource");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section=Section::findOrFail($id);
        return view('Section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSection $request, $id)
    {
        if(Section::where("id", $id)->update($request->all('name','status')))
        {
            return redirect()->route('Sections.index')->withSuccess('Section Update successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Section::where("id", $id)->delete())
        {
            return redirect()->route('Sections.index')->withSuccess('Section Deleted successfully');
        }
    }
}
