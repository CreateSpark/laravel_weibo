<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function formPractice(Request $request)
    {
        //获取数据
        $practice = Practice::paginate(10);

        return view('practice.index', [
            'practice' => $practice,
        ]);
    }

    //添加页面
    public function Create()
    {
        return view('practice.student.create');
    }

    //保存添加
    public function Save(Request $request)
    {

        if($request->isMethod('POST')){
            $this->validate($request,[
                'Student.name'=>'required|min:2|max:6',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ]);
        }

        $data = $request->input('Student');

        $student = new Practice();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if ($student->save()) {
            return redirect('practice')->with('success', '添加成功');
        } else {
            return redirect()->back();
        }
    }

   public function PracticeJs(){
       return view('practice.aboutJs.form_practice');
   }
}
