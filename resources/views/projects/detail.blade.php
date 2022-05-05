@extends('layouts.app')

@section('content')
<div class="container">
    <?php use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
    ?>
    <div class="row">
        <h1 class = "pl-3"> {{ $project->name }} </h1>
    </div>
    <div class="row-fluid" style = "margin-bottom: 20px; padding-left:10px; padding-right:10px; display: inline-block; background: #f5f5f5;">
        <h5>Dịch vụ cần thuê: {{ $project->service }}</h5>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row-fluid">
                <div class="card pt-3 pl-4">
                    <h5><strong>Chi tiết về dự án: </strong></h5>
                    <p style = "white-space: pre-wrap;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;">{{$project->detail}}</p>
                </div>
            </div>
            <div class="d-flex" style = "margin-top: 20px; display:inline;">
                <div class="card pt-3 pl-4 pr-4">
                    <h5><strong>Kỹ năng cần có: </strong></h5>
                    <p style = "display: inline; margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;">{{$project->required_skill ?? 'Không yêu cầu'}}</p>
                </div>
                @if ($project->user->id == $user->id)
                    <div class="col-5 offset-2 pt-5">
                        <a class = "btn btn-primary align" href = "/project/edit/{{$project->id}}">Chỉnh sửa</a>
                        <a class = "btn btn-danger" href = "/project/delete/{{$project->id}}">Hủy dự án</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Thông tin dự án</h5>
                    <div class = "job-description">
                        <dl style = "display: grid; grid-template-columns: max-content auto;" class = "dl-horizontal">
                            <dt style = "grid-column-start: 1;">ID dự án: </dt>
                            <dd style = "grid-column-start: 3;">{{ $project->id }}</dd>
                            <dt style = "grid-column-start: 1;">Ngày đăng: </dt>
                            <dd style = "grid-column-start: 3;">{{ $project->created_at->format('d-m-y H:i') }}</dd>
                            <dt style = "grid-column-start: 1;">Thời hạn: </dt>
                            <?php
                                $today = new DateTime('now');
                                $end = new DateTime($project->end);
                                $interval = $today->diff($end);
                            ?>
                            <dd style = "grid-column-start: 3;">{{ $interval->format('%d ngày') }}</dd>
                            <dt style = "grid-column-start: 1;">Ngân sách: </dt>
                            <dd style = "grid-column-start: 3;">{{ $project->minsalary}}đ - {{ $project->maxsalary }}đ</dd>
                            <dt>Tên công ty:</dt><dd style = "grid-column-start: 3;">{{ $project->companyinfo }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top:30px; width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Thông tin khách hàng</h5>
                    <div class="row">
                        <div class="col-4">
                            <a href="/profile/{{ $project->user->id }}">
                                <img style = "width:100px; height:100px" src="/storage/{{$project->user->profile->profilepic}}">
                            </a>
                        </div>
                        <div class="col-8 pt-2">
                            <h5>
                                <a style="text-decoration: none;" href="/profile/{{ $project->user->id }}">
                                    {{$project->user->name}}
                                </a>
                            </h5>
                            <h6>Thành phố {{ $project->user->profile->city }}</h6>
                            <h6>SĐT: {{ $project->user->profile->phonenumber }}</h6>
                            <h6>Email: {{ $project->user->profile->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if ($project->user->id != $user->id)
    <div class="row pt-3">
        <div class="col-12">
            <div class="row-fluid">
                <div class="card pt-4 pl-4 pr-4 pb-4">
                    <h4><strong>Thông tin chào giá</strong></h4>
                    <hr>
                    <form action = "/project/bid/{{ $project->id }}" enctype="multipart/form-data" method = "post">
                    @csrf    
                        <input type = "hidden" name = "user_id" value = "{{ $user->id}}">
                        <input type = "hidden" name = "projects_id" value = "{{ $project->id}}">
                        <div class = "row">
                            <div class = "col-5">
                                <div>
                                    <label for="desired_amount" class="col-md-6 col-form-label">Đề xuất chi phí:</label>
                                    <input id="desired_amount" style = "display:inline" type="text" 
                                        class="col-sm-4 form-control @error('desired_amount') is-invalid @enderror"
                                        name="desired_amount" autofocus>
                                        <h6 style = "display:inline">VND</h6>
                                        @error('desired_amount')
                                            <strong style = "color:red">{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div class = "pt-3">
                                    <label for="days" class="col-md-6 col-form-label">Dự kiến hoàn thành trong:</label>
                                    <input id="days" style = "display:inline" type="text" 
                                        class="col-sm-2 form-control @error('days') is-invalid @enderror"
                                        name="days" autofocus> <h6 style = "display:inline"> ngày</h6>
                                        @error('days')
                                            <strong style = "color:red">{{ $message }}</strong>
                                        @enderror
                                </div>
                            </div>
                            <div class = "col-7">
                                <div>
                                    <h6 style = "font-weight: bold;">Đề xuất thuyết phục khách hàng:</h6>
                                    <label for="experience" class="col-form-label">1. Bạn có những kinh nghiệm và kỹ năng nào phù hợp với dự án này?</label>
                                    <textarea data-placement="right" placeholder="- Tôi đã có xx năm kinh nghiệm trong lĩnh vực...
- Tôi sử dụng thành thạo các công cụ như...
- Tôi đã từng thực hiện những dự án tương tự..." rows="5" name = "experience"  class = "form-control" id = "experience"></textarea>
                                    </textarea>
                                        @error('experience')
                                            <strong style = "color:red">{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div>
                                    <label for="std" class="col-form-label">2. Bạn dự định thực hiện dự án này như thế nào?</label>
                                    <textarea data-placement="right" placeholder="- Đầu tiên tôi sẽ...
- Sau đó tôi sẽ...
- Tôi tin tưởng có thể hoàn thành đúng theo kế hoạch...
- Hãy liên hệ với tôi qua email hoặc số điện thoại để trao đổi thêm..." rows="5" name = "std"  class = "form-control" id = "std"></textarea>
                                    </textarea>
                                        @error('std')
                                            <strong style = "color:red">{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div class = "pt-4"><h6 style = "font-weight: bold;">Thông tin liên hệ:</h6></div>
                                <div class = "form-group row">
                                    
                                    <div class = "col-6">
                                        <input placeholder="Số điện thoại" id="contactphone" style = "width:100%; display:inline" type="text" 
                                            class="form-control @error('contactphone') is-invalid @enderror"
                                            name="contactphone" value="{{$user->profile->phonenumber}}" autofocus>
                                    </div>
                                    <div class = "col-6">
                                        <input placeholder="Email" id="contactemail" style = "display:inline" type="text" 
                                            class="form-control @error('contactemail') is-invalid @enderror"
                                            name="contactemail" value="{{$user->profile->email}}" autofocus>
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center">
                                <button class = "btn btn-primary">Ứng tuyển</button>
                            </div>    
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>    
        </div>
    </div>
    @else
        <div class="row-fluid pt-3 pl-3 pr-3 pb-3" style = "margin-top:30px">
        @foreach($project->bids as $bid)
            <div style = "margin-top:10px" class="card pt-4 pb-3 pl-4">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <a href="/profile/{{ $project->user->id }}">
                            <img class = "card-img mx-auto d-md-block" style = "width:100px; height:100px" src="/storage/{{$bid->user->profile->profilepic ?? 'default_avt.jpg'}}">
                        </a>
                    </div>
                    <div class = "col-5">
                        <h3><a style="color: #08c; text-decoration: none;" href="/profile/{{ $bid->user->id }}">{{$bid->user->name}}</a></h3>
                        <div>{{$bid->user->profile->title}}</div>
                        <div>Mức lương mong muốn: {{$bid->desired_amount}} đồng</div>
                        <div>Có thể hoàn thành trong: {{$bid->days}} ngày</div>
                        <div><p class = "dt" style = "display:none">Kinh nghiệm và kỹ năng:<br/> {{$bid->experience}}</p></div>
                        <div><p class = "dt" style = "display:none">Tầm nhìn dự án:<br/> {{$bid->std}}</p></div>
                    </div>
                    <div class = "col-2">
                        <bid-detail-button></bid-detail-button>
                    </div>
                    <div class = "col-3">
                        <h5>Thông tin liên lạc</h5>
                        <div>Email: {{$bid->contactemail}}</div>
                        <div>SĐT: {{$bid->contactphone}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

        
    </div>
</div>
@endsection
