@extends('admin.layout')
@section('content')
            <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Quản lý tin tức
                            </div>
                            <a class="btn btn-primary"  href="{{url('/themtintuc')}}">Thêm tin mới</a>
                            <div class="card-body" style="width:100%">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã tin tức</th>
                                                <th>Tiêu đề</th>
                                                <th>Nội dung</th>
                                                <th>Ngày đăng</th>
                                                <th>Loại</th>
                                                 <th>Hình</th>
                                                <th colspan="2">Cập nhật</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã tin tức</th>
                                                <th>Tiêu đề</th>
                                                <th>Nội dung</th>
                                                <th>Ngày đăng</th>
                                                <th>Loại tin</th>
                                                 <th>hình</th>
                                                <th colspan="2">Cập nhật</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($data as $v)
                                            <tr>
                                                <td>{{$v->ttID}}</td>
                                                <td>{{$v->ttTieude}}</td>
                                                <td>{{$v->ttNoidung}}</td>
                                                <td>{{$v->ttNgayviet}}</td>
                                                <td>
                                                 @php 
                                                    $l = DB::table('tbl_loai')->where('loaiID',$v->loaiID)->first();
                                                    echo $l->loaiTen
                                                @endphp
                                                </td>
                                                <td><img src="{{{'public/imgs/'.$v->ttHinh}}}" width="150" height="150" /></td>
                                                <td>
                                                    <a href="{{url('/suatintuc/'.$v->ttID)}}">Sửa</a>
                                                </td>
                                                <td><a href="{{url('xoatintuc/'.$v->ttID)}}">Xóa</a></td>
                                                

                                               
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </main>
@endsection