@extends('admin.layout')
@section('content')
            <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Quản lý khách hàng
                            </div>
                            <a class="btn btn-primary"  href="{{url('/themuser')}}">Thêm khách hàng</a>
                            <div class="card-body" style="width:100%">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã khách hàng</th>
                                                 <th>Email</th>
                                                <th>Tên khách hàng</th>
                                               
                                               
                                                <th colspan="2">Cập nhật</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã khách hàng</th>
                                                <th>Email</th>
                                                <th>Tên khách hàng</th>
                                               
                                                <th colspan="2">Cập nhật</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($data as $v)
                                            <tr>
                                                <td>{{$v->userID}}</td>
                                                <td>{{$v->userEmail}}</td>
                                                <td>{{$v->userTen}}</td>
                                                <td>
                                                    <a href="{{url('/suauser/'.$v->userID)}}">Sửa</a>
                                                </td>
                                                <td><a href="{{url('xoauser/'.$v->userID)}}">Xóa</a></td>
                                                

                                               
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