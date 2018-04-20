<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Courfile;
use App\Http\Model\Course;
use App\Http\Model\Courvideo;
use App\Http\Model\Homework;
use App\Http\Model\Talk;
use App\Http\Model\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    //首页
    public function index()
    {
        $courses = Course::limit(6)->where('cour_isdelete',0)->get();
        //dd($courses);
        return view('home.index',compact('courses'));
    }

    //播放视频
    public function videoplay($cv_id)
    {
        $courvideo = Courvideo::find($cv_id);
        $url = $courvideo->cv_url;
        return view('home.videoplay',compact('url'));
    }

    //课程页
    public function lesson()
    {
        $course = Course::where('cour_isdelete',0)->get();
        return view('home.lesson',compact('course'));
    }
    //查成绩
    public function lessonlist()
    {
        $course = Course::whereIn('cour_name', $this->AllCournameInStuHW(session('stu_id')))->get();
        return view('home.lessonlist',compact('course'));
    }
    //查找$stu_id学生交过作业的课程
    public function AllCournameInStuHW($stu_id)
    {
        $homeworks = Homework::where('stu_id',$stu_id)->get();
        $cournames = array();
        foreach ($homeworks as $v) {
            $cournames[] = $v->cour_name;
        }
        return $cournames;
    }

    //课程的交作业历史
    public function workhistory($cour_id)
    {
        $homework = Homework::whereIn('task_id',$this->AllTaskidInCour($cour_id))->where('stu_id',session('stu_id'))->get();
        $lsname = Course::select('cour_name')->where('cour_id',$cour_id)->first();
        //dd($this->AllTaskidInCour($cour_id));
        return view('home.workhistory',compact('homework','lsname'));
    }

    //作业反馈
    public function workfeedback($hw_id)
    {
        $homework = Homework::find($hw_id);

        return view('home.workfeedback',compact('homework'));
    }
    //课程中所有任务task_id
    public function AllTaskidInCour($cour_id)
    {
        $tasks = Task::where('cour_id',$cour_id)->get();
        $taskids = array();
        foreach ($tasks as $v) {
            $taskids[] = $v->task_id;
        }
        return $taskids;
    }
    //云校园
    public function yuncampus()
    {
        return view('home.yuncampus');
    }

    //picture
    public function picture()
    {
        return view('home.picture');
    }


    //云课堂
    public function cloudclass()
    {
        $scriptcode = '';
        if($input = Input::except('_token')){
            $word = $input['search'];
            $sql = "select * from tu_course where cour_name like '%" . $word . "%'";
            $courses = DB::select($sql);
            $scriptcode = "<script>document.getElementById('anchor_scroll').click();</script>";
        }else{
            $courses = Course::where('cour_isdelete',0)->get();
        }

        return view('home.cloudclass',compact('courses','scriptcode'));
    }
    //课程视频
    public function courvideo($cour_id)
    {
        $courvideos = Courvideo::where('cour_id',$cour_id)->get();
        $courtasks = Task::where('cour_id',$cour_id)->where('task_state',1)->get();
        $lsname = Course::select('cour_name')->where('cour_id',$cour_id)->first();
        return view('home.courvideo',compact('courvideos','lsname','courtasks'));
    }
    //课程文件
    public function courfile($cour_id)
    {
        $courfiles = Courfile::where('cour_id',$cour_id)->get();
        $lsname = Course::select('cour_name')->where('cour_id',$cour_id)->first();
        return view('home.courfile',compact('courfiles','lsname'));
    }

    //在线交流
    public function tkol($cour_id)
    {

        $talks = Talk::where('cour_id',$cour_id)->get();
        $lsname = Course::select('cour_name')->where('cour_id',$cour_id)->first();
        $courid = $cour_id;
        return view('home.tkol',compact('talks','lsname','courid'));

    }

    public function tkolpost()
    {
        $input = Input::except('_token');
        $data = $input;
        $data['talk_addtime'] = time();

        Talk::insert($data);

    }
    //提交作业
    public function putwork()
    {
        $courses = Course::where('cour_isdelete',0)->get();
        $tasks = Task::where('task_state',1)->get();
        return view('home.putwork',compact('courses','tasks'));
    }

    public function putworkpost()
    {
        $input = Input::except('_token');
        $data['hw_name'] = $input['task_name'];
        $data['task_id'] = $input['task_id'];
        $data['cour_name'] = $input['cour_name'];
        $data['hw_file'] = $input['hw_file'];
        $data['stu_id'] = session('stu_id');

        $data['hw_addtime'] = time();
        //dd($data);
        Homework::insert($data);
        return redirect('lessonlist')->with('success','作业提交成功！可在“查成绩”查看作业状态。');
    }

    //提交任务
    public function puttask($task_id)
    {
        $task = Task::where('task_id',$task_id)->first();

        $course = Course::where('cour_isdelete',0)->where('cour_id',$task->cour_id)->first();
        //dd($course);
        return view('home.puttask',compact('course','task'));
    }



}
