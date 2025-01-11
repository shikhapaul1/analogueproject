<?php

namespace App\Http\Controllers;
use App\Models\Studentclass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Studentclass::all();

        return view('Class.index', get_defined_vars());
    }

    public function add()
    {
        return view('Class.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => 'required',
        ]);

        $addclass = new Studentclass;
        $addclass->name = $request->name;
        $addclass->save();

        return redirect()->route('class.index')->with('success', 'Class Added successfully');
    }

    public function edit($id)
    {
        $data = Studentclass::find($id);

        return view('Class.edit', get_defined_vars());
    }

    public function edit_post(Request $request)
    {
        $validated = $request->validate([
            "name" => 'required',
        ]);

        $addclass = Studentclass::find($request->id);
        $addclass->name = $request->name;
        $addclass->save();

        return redirect()->route('class.index')->with('success', 'Class Edited successfully');
    }

    public function delete($id)
    {
        $addclass = Studentclass::findOrFail($id);
        $addclass->delete();

        return redirect()->route('class.index')->with('success', 'Class Deleted successfully');

    }
}
