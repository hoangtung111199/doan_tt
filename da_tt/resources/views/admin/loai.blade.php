@extends('admin.layout')
@section('content')
            <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Quản lý loại
                            </div>
                            <a class="btn btn-primary"  href="{{url('/themloai')}}">Thêm loại mới</a>
                            <div class="card-body" style="width:100%">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã loại</th>
                                                <th>Tên loại</th>
                                               
                                                <th colspan="2">Cập nhật</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã loại</th>
                                                <th>Tên loại</th>
                                              
                                                <th colspan="2">Cập nhật</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($data as $v)
                                            <tr>
                                                <td>{{$v->loaiID}}</td>
                                                <td>{{$v->loaiTen}}</td>
                                               
                                               
                                                <td>
                                                    <a href="{{url('/sualoai/'.$v->loaiID)}}">Sửa</a>
                                                </td>
                                                <td><a href="{{url('xoaloai/'.$v->loaiID)}}">Xóa</a></td>
                                                

                                               
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