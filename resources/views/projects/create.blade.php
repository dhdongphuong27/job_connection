@extends('layouts.app')

@section('content')
<div class="container">
    <form action = "/project" enctype="multipart/form-data" method = "post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Đăng dự án mới</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Tên dự án</label>
                    <input id="name" type="text" 
                    class="form-control @error('name') is-invalid @enderror"
                    name="name" autofocus>
                    @error('name')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Dịch vụ</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" id = "service" name = "service">
                        <optgroup label="Lập trình web">
                            <option value="Dựng website bán hàng">Dựng website bán hàng</option>
                            <option value="SEO website">SEO website</option>
                            <option value="Viết nội dung cho website">Viết nội dung cho website</option>
                            <option value="Xây dựng web app MVP">Xây dựng web app MVP</option>
                            <option value="Đăng bài/sản phẩm lên website">Đăng bài/sản phẩm lên website</option>
                        <optgroup label="Ứng dụng di động">
                            <option value="Cài đặt / Cấu hình server">Cài đặt / Cấu hình server</option>
                            <option value="Làm Mobile App theo yêu cầu">Làm Mobile App theo yêu cầu</option>
                            <option value="Test và kiểm tra lỗi">Test và kiểm tra lỗi</option>
                            <option value="Viết Mobile App cho web có sẵn">Viết Mobile App cho web có sẵn</option>
                            <option value="Viết game di động">Viết game di động</option>
                        <optgroup label="Tối ưu cho công cụ tìm kiếm - SEO">
                            <option value="SEO website">SEO website</option>
                            <option value="Viết nội dung cho blog">Viết nội dung cho blog</option>
                            <option value="Xây dựng liên kết tới trang web - backlink">Xây dựng liên kết tới trang web - backlink</option>
                        <optgroup label="Tư vấn, thiết kế hệ thống mạng">
                            <option value="Cài đặt / cấu hình server">Cài đặt / cấu hình server</option>
                            <option value="Khắc phục sự cố mạng">Khắc phục sự cố mạng</option>
                            <option value="Phân tích mã độc">Phân tích mã độc</option>
                            <option value="Tư vấn / Thiết kế hệ thống mạng">Tư vấn / Thiết kế hệ thống mạng</option>
                        <optgroup label="Lập trình nhúng">
                            <option value="Thiết kế mạch điện tử, PCB">Thiết kế mạch điện tử, PCB</option>
                        <optgroup label="Dịch vụ khác">
                            <option selected value="Dịch vụ khác">Dịch vụ khác</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="descrdetailiption" class="col-md-4 col-form-label">Thông tin chi tiết</label>   
                    <textarea rows="5" name = "detail"  class = "form-control" id = "detail"></textarea>
                    <div class="substitle" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Nội dung chi tiết về các công việc cần Freelancer thực hiện (càng chi tiết, freelancer càng có đầy đủ thông tin để gửi báo giá chính xác hơn).</div>
                    @error('detail')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="required_skill" class="col-md-4 col-form-label">Kỹ năng cần có</label>   
                    <textarea rows="5" name = "required_skill"  class = "form-control" id = "required_skill"></textarea>
                    <div class="substitle" style = "font-weight: 400;
                        font-size: 13px;color: #bbb;white-space: initial;padding-top: 
                        5px;line-height: initial;">Các kỹ năng cần có của freelancer, có thể để trống.</div>
                    @error('required_skill')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="end" class="col-md-4 col-form-label">Hạn cuối đăng tin:</label>   
                    <input type="date" name = "end"  class = "form-control" id = "end"></input>
                    @error('end')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 ">
                <div class="input-group-prepend">
                    <label class="col-md-4 col-form-label">Mức lương có thể chi trả:</label>   
                    <input name = "minsalary"  class = "" id = "minsalary">
                    <input name = "maxsalary"  class = "" id = "minsalary">
                    @error('description')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="companyinfo" class="col-md-4 col-form-label">Thông tin thêm về công ty (nếu có):</label>   
                    <input type="text" name = "companyinfo"  class = "form-control" id = "companyinfo"></input>
                    @error('companyinfo')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="contactemail" class="col-md-4 col-form-label">Email liên lạc:</label>   
                    <input type="text" name = "contactemail"  class = "form-control" id = "contactemail">
                    @error('contactemail')
                        <strong style = "color:red">{{ $message }}</strong>
                    @enderror  
                </div> 
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-8 offset-2">
                <button class = "btn btn-primary">Đăng dự án</button>
            </div>
        </div>
    </form>

</div>
@endsection
