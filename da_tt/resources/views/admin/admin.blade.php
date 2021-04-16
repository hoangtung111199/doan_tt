@extends('admin.layout')
@section('content')
            <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Quản lý Nhân viên
                            </div>
                            <a class="btn btn-primary"  href="{{url('/themad')}}">Thêm Nhân viên</a>
                            <div class="card-body" style="width:100%">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã Nhân viên</th>
                                                 <th>Tài khoản nhân viên</th>
                                                <th>Tên Nhân viên</th>
                                               
                                               
                                                <th colspan="2">Cập nhật</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã Nhân viên</th>
                                                 <th>Tài khoản nhân viên</th>
                                                <th>Tên Nhân viên</th>
                                               
                                                <th colspan="2">Cập nhật</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($data as $v)
                                            <tr>
                                                <td>{{$v->adID}}</td>
                                                <td>{{$v->adAcc}}</td>
                                                <td>{{$v->adTen}}</td>
                                                <td>
                                                    <a href="{{url('/suaad/'.$v->adID)}}">Sửa</a>
                                                </td>
                                                <td><a href="{{url('xoaad/'.$v->adID)}}">Xóa</a></td>
                                                

                                               
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