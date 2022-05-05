@extends('layouts.app')

@section('content')
<div class="container">
    <div class = "align-items-center"><h2>{{$str ?? 'Tất cả dự án'}}</h2></div>
    <div class="row">
        
        <form method="post" action = "/project/find/keyword">
        @csrf
            <div class="input-group-prepend">
                <input type="search" style = "" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search"/>
                <button style = "margin-left:10px;" class="btn btn-primary">Tìm</button>
            </div>
        </form>
        <div class="row" style = "height:800px">
            <div class="table-responsive table-light">
                <table class="table">
                    <thead class = "thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên dự án</th>
                            <th>Loại dịch vụ</th>
                            <th>Kỹ năng cần có</th>                     
                            <th>Mức lương tối thiểu</th>
                            <th>Mức lương tối đa</th>
                            <th>Thời hạn tuyển dụng</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($projects as $project)
                        <tr>
                            <th>{{ $project->id}}</th>
                            <th>{{$project->name}}</th>
                            <th>{{$project->service}}</th>
                            
                            <th>{{$project->required_skill}}</th>
                            <th>{{$project->minsalary}}</th>
                            <th>{{$project->maxsalary}}</th>
                            <th>{{$project->end}}</th>
                            <th class="d-flex"><a href="/project/detail/{{$project->id}}" class = "btn btn-primary">Chi tiết công việc</a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
