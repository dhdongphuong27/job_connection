<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $projects = \App\Models\Projects::all()->sortBy('created_at');
        
        return view('projects.index', compact('projects'));
    }
    
    public function create(\App\Models\User $user)
    {
        return view('projects.create', compact('user'));
    }
    
    public function detail(\App\Models\Projects $project)
    {
        return view('projects.detail', compact('project'));
    }
    
    public function edit(\App\Models\Projects $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function search()
    {
        $data = request()->validate([
            'keyword' => ''
        ]);
        $projects = \App\Models\Projects::query()   ->where('service', 'LIKE', "%{$data['keyword']}%") 
                                                    ->orWhere('name', 'LIKE', "%{$data['keyword']}%") 
                                                    ->orWhere('detail', 'LIKE', "%{$data['keyword']}%") 
                                                    ->orWhere('required_skill', 'LIKE', "%{$data['keyword']}%") 
                                                    ->get();
        return view('projects.index', compact('projects'));
    }

    public function update(\App\Models\Projects $project)
    {
        $data = request()->validate([
            'service' => 'required',
            'name' => 'required',
            'detail' => 'required',
            'required_skill' => '',
            'end' => 'required',
            'minsalary' => '',
            'maxsalary' => '',
            'companyinfo' => '',
            'contactemail' => ''
        ]);
        $project->update($data);
        return redirect("/project/detail/{$project->id}");
    }

    public function delete($id)
    {
        \App\Models\Projects::find($id)->delete();
        \App\Models\Bids::where('projects_id',$id)->update(['status'=>'Đã hủy']);
        return view('home');
    }
    
    public function my()
    {
        $user = Auth::user();
        $projects = \App\Models\Projects::where('user_id', $user->id)->get();
        $str = "Các project bạn đã đăng";
        return view('projects.index', compact('projects','str'));
    }
    
    public function store()
    {
        $data = request()->validate([
            'service' => 'required',
            'name' => 'required',
            'detail' => 'required',
            'required_skill' => '',
            'end' => 'required',
            'minsalary' => '',
            'maxsalary' => '',
            'companyinfo' => '',
            'contactemail' => ''
        ]);
        
        auth()->user()->projects()->create([
            'service' => $data['service'],
            'name' => $data['name'],
            'detail' => $data['detail'],
            'required_skill' => $data['required_skill'],
            'end' => $data['end'],
            'minsalary' => $data['minsalary'],
            'maxsalary' => $data['maxsalary'],
            'companyinfo' => $data['companyinfo'],
            'contactemail' => $data['contactemail'],
        ]);
        return redirect("home");
    }
}
