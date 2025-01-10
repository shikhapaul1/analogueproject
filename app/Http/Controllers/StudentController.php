<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Studentclass;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('Class')->get();
        
        return view('Student.index', get_defined_vars());
    }

    public function add_student()
    {
        $classes = Studentclass::get();

        return view('Student.add_student', get_defined_vars());
    }

    public function student_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email|max:255', // Ensure unique email in the students table
            'Address' => 'required|string|max:255',
            'class' => 'required|string|max:255', // Ensure 'class' is a string and has a max length
            'image' => 'nullable|image|mimes:jpg,png|max:2048', // Allow optional image upload with size and type validation
        ]);
       
        // Create a new student instance
        $add = new Student;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->address = $request->Address;
        $add->class_id = $request->class;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('uploads'), $imageName);
            $add->image = 'uploads/' . $imageName;
        }

        $add->save();
        
        return redirect()->route('index')->with('success', 'Successfully Added');
    }

    public function edit_student($id)
    {
        $data = Student::find($id);
        $classes = Studentclass::get();

        return view('Student.edit_student', get_defined_vars());
    }

    public function edit_student_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|', // Ensure unique email in the students table
            'Address' => 'required|string|max:255',
            'class' => 'required|string|max:255', // Ensure 'class' is a string and has a max length
            'image' => 'nullable|image|mimes:jpg,png|max:2048', // Allow optional image upload with size and type validation
        ]);
        
        // Create a new student instance
        $add = Student::find($request->id);
        $add->name = $request->name;
        $add->email = $request->email;
        $add->address = $request->Address;
        $add->class_id = $request->class;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('uploads'), $imageName);
            $add->image = 'uploads/' . $imageName;
        }

        $add->save();
        
        return redirect()->route('index')->with('success', 'Successfully Edited');
    }

    public function show($id)
    {
        $data = Student::with('Class')->find($id);

        return view('Student.view', get_defined_vars());
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        return redirect()->route('index')->with('success', 'Student deleted successfully');
    }
}