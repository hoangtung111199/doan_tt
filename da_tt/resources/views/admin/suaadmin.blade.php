@extends('admin.layout')
@section('content')
  <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Cập nhật nhân viên
                            </div>
                            @foreach($db as $db)
	 							 <form action="{{url('/editad/'.$db->adID)}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">tên nhân viên</label>
                                                <input value="{{$db->adTen}}" name="adTen" class="form-control py-4" id="inputEmailAddress" type="text"  />
                                                <span style="color:red">{{$errors->first('adTen')}}</span>
                                            </div>
                                              <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input value="{{$db->adAcc}}" name="adAcc" class="form-control py-4" id="inputEmailAddress" type="text"  />
                                                <span style="color:red">{{$errors->first('adAcc')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input value="{{$db->adPass}}" name="adPass" class="form-control py-4" id="inputPassword" type="text"  />
                                               <span  style="color:red"> {{$errors->first('adPass')}}</span>
                                            </div>
                                         
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"> 
                                                <button type="submit" class="btn btn-primary">Thực hiện</button>
                                            </div>
                                            
                                        </form>
                                        @endforeach
                                         </div>
                    </div>
               
                </main>
@endsection