<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentclass;

class ClassController extends Controller
{
    public function index()
    {
        $class = Studentclass::all();

        return view('Class.index', get_defined_vars());
    }

    public function add()
    {
        return view('Class.add');
    }

    public function add_class(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
       
        // Create a new student instance
        $add = new Studentclass;
        $add->name = $request->name;
        $add->save();
        
        return redirect()->route('class.index')->with('success', 'Successfully Added');
    }

    public function edit_class($id)
    {
        $data = Studentclass::find($id);

        return view('Class.edit', get_defined_vars());
    }

    public function edit_class_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
       
        // Create a new student instance
        $add = Studentclass::where('class_id', $request->id)->first();
        $add->name = $request->name;
        $add->save();

        return redirect()->route('class.index')->with('success', 'Class Edited successfully');

    }

    public function destroy($id)
    {
        $student = Studentclass::findOrFail($id);
        $student->delete();
    
        return redirect()->route('class.index')->with('success', 'Class deleted successfully');
    }
}
