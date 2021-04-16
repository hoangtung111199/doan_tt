@extends('admin.layout')
@section('content')
  <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Thêm khách hàng
                            </div>
	 							 <form action="{{url('/checkThemkh')}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">tên khách hàng</label>
                                                <input name="userTen" class="form-control py-4" id="inputEmailAddress" type="text"  />
                                                <span style="color:red">{{$errors->first('userTen')}}</span>
                                            </div>
                                              <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="userEmail" class="form-control py-4" id="inputEmailAddress" type="email"  />
                                                <span style="color:red">{{$errors->first('userEmail')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="userPass" class="form-control py-4" id="inputPassword" type="text"  />
                                               <span  style="color:red"> {{$errors->first('userPass')}}</span>
                                            </div>
                                         
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"> 
                                                <button type="submit" class="btn btn-primary">Thực hiện</button>
                                            </div>
                                            
                                        </form>
                                         </div>
                    </div>
               
                </main>
@endsection