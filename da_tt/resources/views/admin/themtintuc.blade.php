@extends('admin.layout')
@section('content')
  <div id="layoutSidenav_content">
                <main style="width:100%">
                 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Thêm tin tức
                            </div>
	 								<form action="{{url('/checkThemtt')}}" method="POST"  enctype="multipart/form-data">
	 									{{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Tiêu đề</label>
                                                <input name="ttTieude" class="form-control py-4" type="text"  />
                                                <span style="color:red">{{$errors->first('ttTieude')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Nội dung</label>
                                                <textarea  name="ttNoidung" class="form-control py-4"  type="text">
                                                </textarea>
                                               <span  style="color:red"> {{$errors->first('ttNoidung')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Ngày viết</label>
                                                <input name="ttNgayviet" class="form-control py-4"  type="date"  />
                                               <span  style="color:red"> {{$errors->first('ttNgayviet')}}</span>
                                            </div>
                                              <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Loại tin</label>
                                             	<select name="loaiMa">
                                             		@foreach($loai as $l)
                                             		<option value="{{$l->loaiID}}">{{$l->loaiTen}}</option>
                                             		@endforeach
                                             		
                                             	</select>
                                              
                                            </div>
                                         <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Hình ảnh</label>
                                                <input name="ttHinh" class="form-control py-4"  type="file"  />
                                               	<span style="color:red">{{Session::get('img_err')}}</span>
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