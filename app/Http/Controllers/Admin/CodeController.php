<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;

use App\Models\Code;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.code.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Display list in json
    public function json(Request $request)
    {
        if ($request->ajax()) {
            $data = Code::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    // '<a href="'.route('jabatan.show.edit', ['show' => $row->id]).'" class="btn-sm btn-success mx-1"><i class="fas fa-pen"></i></a>
                    //         <a href="" data-url="'.route('jabatan.delete', ['id' => $row->id]).'" data-text="Jabatan" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)"><i class="fas fa-trash"></i></a>';
                    return '-';
                })
                ->addColumn('image', function($row){
                    $image = $row->image_url ?? '';
                    return $image;
                })
                ->addColumn('work', function($row){
                    $work = $row->worked;
                    if ($work) {
                        $label = 'success';
                        $text = 'Worked';
                    } else {
                        $label = 'warning';
                        $text = 'Not Worked';
                    }
                    return '<span class="badge badge-sm badge-'.$label.'">'.$text.'</span>';
                })
                ->addColumn('type', function($row){
                    $type = $row->type->name ?? '-';
                    return $type;
                })
                ->rawColumns(['action', 'work', 'image'])
                ->make(true);
        }
    }

    // Delete data
    public function delete($id)
    {
        $code = Code::findOrFail($id);
        if ($code->delete()) {
            return back()->with('success', 'Deleted');
        } else {
            return back()->with('errors', 'Something went wrong!');
        }
    }
}
