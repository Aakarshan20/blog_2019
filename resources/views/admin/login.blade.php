<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gentelella Alela! | </title>

        <!-- Bootstrap -->
        <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ URL::asset('/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ URL::asset('/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ URL::asset('/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ URL::asset('/build/css/custom.min.css') }}" rel="stylesheet">
        <script>
            function postForm() {
 
                var form = document.createElement('form');
                var request1 = document.createElement('input');
                request1.type='text';
                request1.name='user_name';
                request1.value= $idValud('user_name');
                
                var request2 = document.createElement('input');
                request2.type='text';
                request2.name='user_pass';
                request2.value= $idValud('user_pass');
                
                var request3 = document.createElement('input');
                request3.type='text';
                request3.name='code';
                request3.value= $idValud('code');
                
                var request4 = document.createElement('input');
                request4.type = 'hidden';
                request4.name = '_token';
                request4.value = '{{csrf_token()}}';
                                
                form.method = 'POST';
                form.action = '{{URL::asset("/admin/login")}}';

                form.appendChild(request1);
                form.appendChild(request2);
                form.appendChild(request3);
                form.appendChild(request4);
                
                document.body.appendChild(form);
                form.submit();

            }
            function $id(id){
                return document.getElementById(id);
            }
            
            function $idValud(id){
                return $id(id).value;
            }
        </script>
    </head>


    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action = "/admin/login" methon="POST">
                            <h1>Login Form</h1>
                            
                            @if(session('msg'))
                            <div style='color:red'>    
                                <p>{{session('msg')}}</p>
                            </div>
                            @endif
                            
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" 
                                       name = "user_name"  id='user_name'/>
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" 
                                       name = "user_pass" id='user_pass'/>
                            </div>
                            <div class = 'row'>
                                <div class = 'col-md-6 col-sm-6 col-xs-12'>
                                    <input type="text" class="form-control" placeholder="ValidCode" required="" 
                                           id = 'code'/>
                                </div>
                                <div class = 'col-md-6 col-sm-6 col-xs-12'>
                                    <img src="{{URL::asset('/admin/code')}}" 
                                         onclick="this.src ='{{URL::asset('/admin/code')}}?'+Math.random()" id='validCode'>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-default submit" onClick='postForm()'>Log in</a>
                                <a class="reset_pass" href="#">Lost your password?</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">New to site?
                                    <a href="#signup" class="to_register"> Create Account </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form>
                            <h1>Create Account</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <a class="btn btn-default submit" href="index.html">Submit</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Already a member ?
                                    <a href="#signin" class="to_register"> Log in </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
