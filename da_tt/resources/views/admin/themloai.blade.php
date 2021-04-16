@extends('admin.layout')
@section('content')
  <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Thêm loại
                            </div>
	 								<form action="{{url('/checkThemloai')}}" method="GET"  >
	 									{{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Tên loại</label>
                                                <input name="loaiTen" class="form-control py-4" type="text"  />
                                                <span style="color:red">{{$errors->first('loaiTen')}}</span>
                                            </div>
                                           
                                            <br/>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"> 
                                                <button type="submit" class="btn btn-primary">Thực hiện</button>
                                              
                                            </div>
                                        </form>
                                         </div>
                    </div>
               
                </main>
@endsection