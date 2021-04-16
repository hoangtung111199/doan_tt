@extends('users.layout')
@section('content')
        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="tm-welcome">
             
                <div><h3>Thể thao</h3></div>
                <div class="row tm-welcome-row">
                    
                  
                    @foreach($data as $v)
                    <article class="col-lg-6 tm-media">
                        <img src="{{{'public/imgs/'.$v->ttHinh}}}" width="150" height="150" alt="Welcome image" class="img-fluid tm-media-img" />
                        <div class="tm-media-body">
                         <span class="tm-article-title text-uppercase">{{$v->ttTieude}}</span><br/>
                            <span>Thể loại:
                                @php 
                                    $l = DB::table('tbl_loai')->where('loaiID',$v->loaiID)->first();
                                    echo $l->loaiTen
                                @endphp
                            </span><br/>
                            <span>Ngày đăng: {{$v->ttNgayviet}}</span>
                            <p>{{$v->ttNoidung}}</p>
                            <a href="#">Xem thêm</a>
                        </div>
                    </article>
                     @endforeach
                   
                </div>
                <hr/>
                 <div><h3>Chính trị</h3></div>
                <div class="row tm-welcome-row">
                    
                    
                    @foreach($data2 as $v)
                    <article class="col-lg-6 tm-media">
                        <img src="{{{'public/imgs/'.$v->ttHinh}}}" width="150" height="150" alt="Welcome image" class="img-fluid tm-media-img" />
                        <div class="tm-media-body">
                         <span class="tm-article-title text-uppercase">{{$v->ttTieude}}</span><br/>
                            <span>Thể loại:
                                @php 
                                    $l = DB::table('tbl_loai')->where('loaiID',$v->loaiID)->first();
                                    echo $l->loaiTen
                                @endphp
                            </span><br/>
                            <span>Ngày đăng: {{$v->ttNgayviet}}</span>
                            <p>{{$v->ttNoidung}}</p>
                            <a href="#">Xem thêm</a>
                        </div>
                    </article>
                     @endforeach
                </div>
              
                   
            </section>
            
            <!-- Featured -->
          
                
@endsection
          