<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(\App\Models\User $user)
    {
        $bids = $user->bids;
        $id = $bids->pluck('project_id');
        $projects = \App\Models\Projects::whereIn('id', $id);
        return view('bids.index', compact('bids', 'projects'));
    }
    public function store()
    {
        $data = request()->validate([
            'user_id' => '',
            'projects_id' => '',
            'desired_amount' => '',
            'days' => '',
            'experience' => '',
            'std' => '',
            'contactphone' => '',
            'contactemail' => '',
            'status' => ''
        ]);
        $data['status'] = 'Đang chờ...';
        \App\Models\Bids::create($data);
        return redirect("/project/detail/{$data['projects_id']}");
    }
}
