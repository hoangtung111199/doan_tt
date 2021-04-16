<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="{{'public/css_admin/css/styles.css'}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <form action="{{url('/checkRegister')}}" method="get">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Tên của bạn</label>
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
                                                <input name="userPass" class="form-control py-4" id="inputPassword" type="password"  />
                                               <span  style="color:red"> {{$errors->first('userPass')}}</span>
                                            </div>
                                         
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"> 
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>
                                             <div>
                                                @if(Session::has('rg_sc')!=null)
                                                <span style="color:green">{{Session::get('rg_sc')}}</span>
                                                @endif
                                                <span>Quay lại <a href="{{url('login')}}">đăng nhập</a>!</span>
                                            </div>
                                        </form>
                                    </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
