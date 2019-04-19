<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use Excel;
use App\Task;
use App\User;

class FileController extends Controller
{
    public function index(){
        return view('File.app');
    }

    public function store(Request $request)
    {
      //dd($request);
       $request->validate([
        'title' => 'required:max:255',
        'overview' => 'required',
        'price' => 'required|numeric'
      ]);

      auth()->user()->files()->create([
        'title' => $request->get('title'),
        'overview' => $request->get('overview'),
        'price' => $request->get('price')
      ]);

      return back()->with('message', 'Your file is submitted Successfully');
    }
    
    public function upload(Request $request){

     
        $file = $request->file('file');
        Excel::load($file, function($reader){
      
            $results = $reader->toObject();

            foreach($results as $result){
              // dd($result->get('name'));
              auth()->user()->tasks()->create([
                'name' => $result->get('name'),
                'progress' => $result->get('progress'),
              ]);    
            }
    });
      // $file = $request->file('file');
      // $filename = 'profile' . '.'.$file->getClientOriginalExtension();
      // $path = $request->file('file')->storeAs('file', $filename);
      // dd($path);
      
      // $file = $request->file('file');
      // $filename = $file->getClientOriginalName();

      // $upload = new Upload;
      // $upload->filename = $filename;

      // $upload->user()->associate(auth()->user());
      // $upload->save();
      
      return redirect('/');
    }
}
