@extends('layouts.app')

@section('content')
<div class="container">
    <div class = "align-items-center"><h2>{{$str ?? 'Tất cả dự án'}}</h2></div>
    <div class="row">
        
        <div class="row" style = "height:800px; width:100%">
            <div class="table-responsive table-light">
                <table class="table">
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="45%" />
                    <thead class = "thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh đại diện</th>
                            <th>Chức danh</th>
                            <th>Nơi ở</th>                     
                            <th>Kỹ năng</th>
                        </tr>
                    </thead>
                    @foreach($profiles as $profile)
                        <tr>
                            <th>{{$profile->id}}</th>
                            <th>{{$profile->user->name}}</th>
                            <th><a href="/profile/{{ $profile->user->id }}">
                                <img style = "width:50px; height:50px" src="/storage/{{$profile->profilepic ?? 'default_avt.jpg'}}">
                            </a></th>
                            <th>{{$profile->title}}</th>                  
                            <th>{{$profile->city}}</th>
                            <th>{{$profile->summary}}</th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
