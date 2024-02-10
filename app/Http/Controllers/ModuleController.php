<?php

namespace App\Http\Controllers;

use App\Http\Requests\Module\EditModule;
use App\Models\Module;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModuleController extends Controller
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
    public function index($id)
    {
        $module=Module::whereHas('section',function (Builder $query) use ($id) {
            $query->where('id', $id);
           })->get();
        return view('Section.Module.index',compact('module','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Section.Module.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditModule $request,$id)
    {
        $module=new Module();
        if($request->has('file'))
        {
            $fileName =  \Str::random(10).time().'.'.$request->file->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs($request->type, $fileName, 'public');
            $module->file_name=$fileName;
        }

        $module->name=$request->name;
        $module->type=$request->type;
        $module->section_id=$id;

        if($module->save())
        {
            return redirect()->route('Module.index',['id'=>$module->section_id])->withSuccess('New Module successfully added.');
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
    public function edit($id,$model)
    {
        $module=Module::findOrFail($model);
        return view('Section.Module.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditModule $request, $section,$id)
    {
        $module=Module::where("id", $id)->first();
        if($request->has('file'))
        {
            $fileName =  \Str::random(10).time().'.'.$request->file->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs($request->type, $fileName, 'public');
            $module->file_name =$fileName;
        }

        $module->name=$request->name;
        $module->type=$request->type;

        if($module->save())
        {
            return redirect()->route('Module.index',['id'=>$module->section_id])->withSuccess('Module Update successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$module)
    {
        $module=Module::where('id',$module)->first();

        if(is_file(storage_path('app/public/'.$module->type.'/'.$module->getAttributes()['file_name'])))
        {
            $file_path = storage_path('app/public/'.$module->type.'/'.$module->getAttributes()['file_name']);
            unlink($file_path);
        }


        if($module->delete())
        {
            return redirect()->route('Module.index',['id'=>$id])->withSuccess('Module Deleted successfully');
        }
    }
}
