<div class = "row">
        <div class = "col-1"></div>
        <div class = "col-10 pt-3 pb-3 rounded d-flex" style = "background-color: #939694; flex-wrap: wrap">
            <div class = "col-4" style = "padding-left: 55px; padding-right: 20px">
                <img src = "/storage/{{ $user->profile->profilepic ?? 'default_avt.jpg' }}" style = "width:150px; height:150px; border: 2px solid black;" class = "rounded-circle">   
                <a class = "btn btn-primary" href="/profile/{{ $user->id }}/edit">Chỉnh sửa hồ sơ</a>
            </div>

            <div class = "col-8 " style = "background-color: #939694;">
                <div class = "d-flex justify-content-between align-items-baseline">
                    <div><h3>{{ $user->name }}</h3></div>
                
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
                @can('update', $user->profile)
                    <div class = "row justify-content-center pb-3 pl-5">
                        <a class = "btn btn-primary" href="/profile/{{ $user->id }}/edit">Chỉnh sửa hồ sơ</a>
                    </div>
                @endcan
            <div  class = "h-auto" style = "width:100%; ">
                <h4>Thông tin cá nhân</h4>
                <ul style = "background-color: white; list-style-type: none;">
                    <li>🏠 {{ $user->profile->address ?? 'N/A' }}</li>
                    <li>✉ {{ $user->profile->email ?? 'N/A' }}</li>
                    <li>📱 {{ $user->profile->phonenumber ?? 'N/A' }}</li>
                    <li>🌐 <a href={{ $user->profile->socialnetwork ?? 'N/A' }}>{{ $user->profile->socialnetwork ?? 'N/A' }}</a></li>
                </ul>
            </div>
            <div  class = "h-auto" style = "width:100%; ">
                <h4>Các kỹ năng khác:</h4>
                <ul style = "background-color: white; list-style-type: none;">
                    <li style = "padding-left:10px; white-space: pre-wrap;">{{ $user->profile->education ?? 'N/A' }}</li>
                </ul>
            </div>
        </div>
        
        <div class="col-6">
            @can('update', $user->profile)
                <div class = "row justify-content-center pb-3 pl-5"><a class = "btn btn-primary" href="/i/create">Thêm tiểu sử</a></div>
            @endcan
            
            @foreach($user->intro as $intro)
                <div class="card mb-3" style="width: 700px; background-color:azure">
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