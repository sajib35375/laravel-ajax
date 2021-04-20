<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        return view('student.index');
    }
    public function store(Request $request){

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $unique_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            $file -> move(public_path('assets/media/img'),$unique_name);
        }



        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'cell' => $request->cell,
            'username' => $request->username,
            'gender' => $request->gender,
            'photo' => $unique_name,
        ]);
        return redirect()->back()->with('success','data insert successfully');

    }

    public function all(){
        $all_show = Student::latest()->get();

        $content = '';
         $i=1;

                        foreach($all_show as $stu){

                     $content .='<tr>';
							$content.='<td>'.$i;$i++.'</td>';
                            $content.='<td>'.$stu->name.'</td>';
                            $content.='<td>'.$stu->email.'</td>';
                            $content.='<td>'.$stu->cell.'</td>';
                            $content.='<td>'.$stu->username.'</td>';
                            $content.='<td>'.$stu->gender.'</td>';
                            $content.='<td><img src="assets/media/img/'.$stu->photo.'" ></td>';
                            $content.='<td style="display: inline"><a id="student_view" view_id="'.$stu->id.'" class="btn btn-sm btn-info" href="#">view</a></td>';
                            $content.='<td style="display: inline"><a id="student_edit" edit_id="'.$stu->id.'"  class="btn btn-sm btn-warning" href="#">edit</a></td>';
                            $content.='<td style="display: inline"><a id="student_delete" del_id="'.$stu->id.'" class="btn btn-sm btn-danger" href="#">delete</a></td>';



                            $content.='</tr>';
                        }
                        echo $content;

    }

    public function show($id){
       return $data = Student::find($id);

    }
    public function delete($id){
         $del_data = Student::find($id);
         $del_data->delete();

    }
    public function edit($id){
       return $edit_data = Student::find($id);
    }

    public function update(Request $request,$id){
       $update_data = Student::find($id);
       $update_data ->name = $request-> name;
       $update_data ->email = $request-> email;
       $update_data ->cell = $request-> cell;
       $update_data ->username = $request-> username;
       $update_data->update();

        return redirect()->back()->with('session','data update successfuly');

    }





}
