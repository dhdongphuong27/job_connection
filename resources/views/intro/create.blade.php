@extends('layouts.app')

@section('content')
<div class="container">
    <form action = "/i" enctype="multipart/form-data" method = "post">
        @csrf


        <div class="row">
            <div class="col-8 offset-2">
                <h1>Thêm tiểu sử</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label">Tiêu đề</label>

                    <input id="type" type="text" 
                    class="form-control @error('type') is-invalid @enderror"
                    name="type" value="{{ old('type') }}" autocomplete="type" autofocus>
                    <div style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Tên dự án hoặc tên sản phẩm bạn đã thực hiện</div>
                    @error('type')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Hình ảnh đính kèm</label>
                    <input type="file" name="image" class = "form-control-file" id = "image">
                    <div class="substitle" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Định dạng được hỗ trợ: jpg, jpeg, png, bmp, gif, svg, webp</div>
                    @error('image')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror 
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="quick_review" class="col-md-4 col-form-label">Lĩnh vực</label>   
                    <input name = "quick_review"  class = "form-control" id = "quick_review">
                    <div class="substitle" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Viết về những kỹ năng mà bạn đã sử dụng trong dự án này</div>
                    @error('quick_review')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Mô tả chi tiết</label>   
                    <textarea rows="5" name = "description"  class = "form-control" id = "description"></textarea>
                    <div class="substitle" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Hãy viết thật chi tiết về sản phẩm hoặc dự án này để người xem có thể hiểu được những công việc bạn đã làm.</div>
                    @error('description')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-8 offset-2">
                <button class = "btn btn-primary">Add New Project</button>
            </div>
        </div>
    </form>
</div>
@endsection
