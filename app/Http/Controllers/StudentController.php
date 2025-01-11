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
        $students = Student::with('class')->get();
        return view('Student.index', get_defined_vars());
    }

    public function add()
    {
        $class = Studentclass::all();

        return view('Student.add_student', get_defined_vars());
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "address" => 'required|string|max:255',
            "class" => 'required',
            "image" => 'required|mimes:jpg,png',  // Validate image type and size
        ]);

        // Handle the validated data (e.g., store it in the database)
        if ($request->hasFile('image')) {
            // Process the uploaded image
            $image = $request->file('image');

            // Generate a unique file name for the image (optional)
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

            // Store the image in the public folder (in a sub-folder 'images')
            $imagePath = $image->move(public_path('uploads'), $imageName); 

            // Example: Save the data to the database
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->class_id = $request->class;
            $student->image = 'uploads/'.$imageName; // Save relative path to the image
            $student->save();
        }

        // Redirect with a success message
        return redirect()->route('student.index')->with('success', 'Student created successfully!');
    }

    public function edit($id)
    {
        $student = Student::with('class')->find($id);
        $class = Studentclass::all();


        return view('Student.edit_student', get_defined_vars());
    }

    public function edit_store(Request $request)
    {
        //  Validate the incoming request
         $validated = $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "address" => 'required|string|max:255',
            "class_id" => 'required',
        ]);
        // dd($request->all());

       // Find the student by ID
    $student = Student::find($request->id);

    if ($student) {
        // If an image is uploaded, handle the image upload
        if ($request->hasFile('image')) {
            // Get the image file
            $image = $request->file('image');

            // Generate a unique image name using random string + extension
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

            // Move the image to the "uploads" folder
            $image->move(public_path('uploads'), $imageName);

            // Save the relative path of the image
            $student->image = 'uploads/' . $imageName;
        }

        // Update student data (if no image uploaded, image field remains unchanged)
        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->class_id = $request->class_id;

        // Save the updated student record
        $student->save();

        // Optionally, you can redirect or return a success message
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    } else {
        // Handle case where student is not found (optional)
        return redirect()->back()->with('error', 'Student not found');
    }
    }

    public function view_store($id)
    {
        $student = Student::with('class')->find($id);

        return view('Student.view_student', get_defined_vars());
    }

    public function delete($id)
    {
        $delete = Student::findOrFail($id);
        $delete->delete();

        return redirect()->route('student.index')->with('success', 'Class Deleted successfully');

    }
}
