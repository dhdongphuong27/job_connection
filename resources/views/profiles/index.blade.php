@extends('layouts.app')

@section('content')
<div class="hi">
<div class="container">
    <div class = "card pt-5 pb-4" style = "background-color: #black; ">
        <div class = "col-12 pb-3 rounded d-flex" style = "flex-wrap: wrap">
            <div class = "col-3 align-items-center" style = "">
                <img class = "card-img mx-auto d-md-block align-items-center" src = "/storage/{{ $user->profile->profilepic ?? 'default_avt.jpg' }}" style = "width:150px; height:150px; border: 2px solid black;">       
            </div>

            <div class = "col-9 " style = "background-color: #white;">
                <div class = "d-flex justify-content-between align-items-baseline">
                    <div><h3>{{ $user->name }}</h3></div>
                    @can('update', $user->profile)
                    <div class = "row justify-content-center pb-3 pl-5">
                        <a class = "btn btn-primary" href="/profile/{{ $user->id }}/edit">Chỉnh sửa hồ sơ</a>
                    </div>
                @endcan
                </div>
                <div><strong>{{ $user->profile->title ?? 'N/A' }}</strong></div>
                <div><strong>{{ $user->profile->description ?? 'N/A' }}</strong></div>
                <div style ="padding-top:10px; white-space: pre-wrap;">{{ $user->profile->summary ?? 'N/A' }}</p></div>
            </div>
        </div>
    </div>
    <br>
    <div class="row d-flex">
        <div class="col-4">
            <div class = "card pt-3 pl-3 pr-3" style = "margin-top: 20px; width:100%; ">
                <h4>Thông tin cá nhân</h4>
                <ul style = "background-color: white; list-style-type: none;">
                    <li>🏠 {{ $user->profile->address ?? 'N/A' }}</li>
                    <li>✉ {{ $user->profile->email ?? 'N/A' }}</li>
                    <li>📱 {{ $user->profile->phonenumber ?? 'N/A' }}</li>
                    <li>🌐 <a href={{ $user->profile->socialnetwork ?? 'N/A' }}>{{ $user->profile->socialnetwork ?? 'N/A' }}</a></li>
                </ul>
            </div>
            <div  class = "card pt-3 pl-3" style = "margin-top:20px; width:100%; ">
                <h4>Các kỹ năng khác:</h4>
                <ul style = "background-color: white; list-style-type: none;">
                    <li style = "padding-left:10px; white-space: pre-wrap;">{{ $user->profile->education ?? 'N/A' }}</li>
                </ul>
            </div>
        </div>
        
        <div class="col-8">
            @can('update', $user->profile)
                <div class = "float-right pb-3 pl-5"><a style = "" class = "btn btn-success" href="/i/create">Thêm tiểu sử</a></div>
            @endcan
            
            @foreach($user->intro as $intro)
                <div class="card mb-3" style="width: 100%; background-color:azure">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <img class="card-img mx-auto d-md-block align-items-center"
                            src = "/storage/{{ $intro->image }}" style = "width: 100px; height: 100px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $intro->type }}</h5>
                                <p class="card-text quick_review">{{ $intro->quick_review }}</p>
                                <p class="card-text description" style="display:none">{{ $intro->description }}</p>
                                <detail-button></detail-button>
                                <p class="card-text"><small class="text-muted">Cập nhật lúc: {{ $intro->updated_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
</div>
</div>
@endsection
