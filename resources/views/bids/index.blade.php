@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($bids->count()!=0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class = "thead-light">
                        <tr>
                            <th>ID ứng tuyển</th>
                            <th>Mức lương mong muốn</th>
                            <th>Số ngày cần</th>                     
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($bids as $bid)
                    <?php 
                        $classname = "";
                        if ($bid->status=="Đã hủy")
                        {
                            $classname = "table-danger";
                        }
                        if ($bid->status=="Đang chờ...")
                        {
                            $classname = "table-warning";
                        }
                    ?>
                        <tr class={{$classname}}>
                            <th>{{$bid->id}}</th>
                            <th>{{$bid->desired_amount}}</th>
                            <th>{{$bid->days}}</th>
                            <th>{{$bid->status}}</th>
                            <th><a href="/project/detail/{{$bid->projects_id}}" class = "btn btn-primary">Chi tiết</a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="col-md-6 offset-md-4 d-flex">
                <h1 style = "color: #d3d3d3 "><strong>Chưa ứng tuyển dự án nào</strong></h1>
            </div>
        @endif
    </div>
</div>
@endsection
