<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\FileUploaded;



class UploadController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Backend validation
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'file' => 'required|mimes:jpg,png,pdf|max:2048'
        ]);

        // ✅ File upload
        $path = $request->file('file')->store('uploads');

        // ✅ Fire event
        event(new FileUploaded($request->name));

        return "Submitted Successfully!";
    }
}