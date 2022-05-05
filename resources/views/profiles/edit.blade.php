@extends('layouts.app')

@section('content')
<div class = "container">
    <form action = "/profile/{{ $user->id }}" enctype="multipart/form-data" method = "post">
        @csrf
        @method('PATCH');


        <div class="row">
            <div class="col-8 offset-2">
                <h1>Chỉnh sửa hồ sơ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Chức danh:</label>

                    <input id="title" type="text" 
                    class="col-sm-4 form-control @error('title') is-invalid @enderror"
                    name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
                    @error('title')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror
                    

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="profilepic" class="col-md-4 col-form-label">Ảnh đại diện</label>
                    <input type="file" name="profilepic" class = "col-sm-4 form-control-file @error('title') is-invalid @enderror" id = "profilepic" >
                    <div class="offset-4" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Định dạng được hỗ trợ: jpg, jpeg, png, bmp, gif, svg, webp</div>
                    @error('profilepic')
                        <strong class="offset-4" style = "color:red">{{ $message }}</strong>
                    @enderror 
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="idnumber" class="col-md-4 col-form-label">Số CMND/CCCD:</label>

                    <input id="idnumber" type="text" 
                    class="col-sm-3 form-control @error('idnumber') is-invalid @enderror"
                    name="idnumber" value="{{ old('idnumber') ?? $user->profile->idnumber }}" autocomplete="idnumber" autofocus>
                    @error('idnumber')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="birthyear" class="col-md-4 col-form-label">Năm sinh:</label>

                    <input id="birthyear" type="text" 
                    class="col-sm-1 form-control @error('birthyear') is-invalid @enderror"
                    name="birthyear" value="{{ old('birthyear') ?? $user->profile->birthyear }}" autocomplete="idnumber" autofocus>
                    @error('birthyear')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label">Thành phố:</label>

                    <input id="city" type="text" 
                    class="col-sm-3 form-control @error('city') is-invalid @enderror"
                    name="city" value="{{ old('city') ?? $user->profile->city }}" autocomplete="city" autofocus>
                    
                    @error('city')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Lĩnh vực chuyên môn:</label>

                    <input id="description" type="text" 
                    class="col-sm-6 form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
                    <div class="substitle offset-4" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">VD: Lập trình web, Ứng dụng di động, Tối ưu công cụ tìm kiếm, AI, Machine Learning,...</div>
                    
                    @error('description')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="phonenumber" class="col-md-4 col-form-label">Số điện thoại liên lạc:</label>

                    <input id="phonenumber" type="text" 
                    class="col-sm-2 form-control @error('phonenumber') is-invalid @enderror"
                    name="phonenumber" value="{{ old('phonenumber') ?? $user->profile->phonenumber }}" autocomplete="phonenumber" autofocus>
                    
                    @error('phonenumber')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="socialnetwork" class="col-md-4 col-form-label">Mạng xã hội:</label>

                    <input id="socialnetwork" type="text" 
                    class="col-sm-5 form-control @error('socialnetwork') is-invalid @enderror"
                    name="socialnetwork" value="{{ old('socialnetwork') ?? $user->profile->socialnetwork }}" autocomplete="socialnetwork" autofocus>
                    @error('socialnetwork')
                        <strong class="offset-4" style = "color:red">{{ $message }}</strong>
                    @enderror 
                    <div class ="offset-4" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;">Đường dẫn đến trang cá nhân</div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label">Địa chỉ:</label>

                    <input id="address" type="text" 
                    class="col-sm-6 form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') ?? $user->profile->address }}" autocomplete="address" autofocus>
                    
                    @error('address')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email:</label>

                    <input id="email" type="text" 
                    class="col-sm-3 form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') ?? $user->profile->email }}" autocomplete="email" autofocus>
                    
                    @error('email')
                        <strong class="offset-4" style = "color:red">{{ $message }}</strong>
                    @enderror 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="education" class="col-md-4 col-form-label">Các kỹ năng khác:</label>

                    <textarea rows='5' id="education" type="text" 
                    class="col-sm-6 form-control @error('education') is-invalid @enderror"
                    name="education" autocomplete="education" autofocus>{{ $user->profile->education }}</textarea>
                    
                    @error('education')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="summary" class="col-md-4 col-form-label">Kinh nghiệm làm việc:</label>

                    <textarea rows='5' id="summary" type="text" 
                    class="col-sm-6 form-control @error('summary') is-invalid @enderror"
                    name="summary" autocomplete="summary" autofocus>{{ $user->profile->summary }}</textarea>
                    
                    @error('summary')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror
                    <div class ="offset-4" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;">Tóm tắt cô đọng những kĩ năng và kinh nghiệm nổi bật nhất mà bạn đã có, giúp cho nhà tuyển dụng sàng lọc CV nhanh chóng bằng cách nắm bắt được tổng quan CV của bạn</div>
                </div>
            </div>
        </div>
        <div class="row pt-4 justify-content-center">
            <button class = "btn btn-primary">Lưu thông tin hồ sơ</button>
        </div>
    </form>
</div>
@endsection
