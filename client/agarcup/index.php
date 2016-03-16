<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Agar.io 한국서버에 오신것을 환영합니다!">
    <meta name="keywords"
          content="agario, agar, io, cell, cells, virus, bacteria, blob, game, games, web game, html5, fun, flash">
    <meta name="robots" content="index, follow">
    <meta name="viewport"
          content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Agar.io 아갈컵</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../login/modal/css/font-awesome.min.css" rel="stylesheet">
    <link href="../login/modal/css/style.css" rel="stylesheet">
    <link href="../login/modal/css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="../login/modal/js/ie.js"></script>
		<script language="javascript" type="text/javascript"> 
            
            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "이메일이나 닉네임을 입력하세요!" );
					return false;
				}
				else if(form.password.value == ""){
					alert( "비밀번호를 입력하세요!" );
					return false;
				}	 
			}
		</script>
		<script language="javascript" type="text/javascript"> 
		    function submitreg() {
                var form = document.reg;
				if(form.name.value == ""){
                    alert( "자신의 네이버 아이디를 입력하세요!" );
                    return false;
                }
                else if(form.uname.value == ""){
                    alert( "자신의 닉네임을 입력하세요!" );
                    return false;
                }
                else if(form.upass.value == ""){
                    alert( "페스워드를 입력하세요!" );
                    return false;
                }
                else if(form.uemail.value == ""){
                    alert( "이메일을 입력하세요!" );
                    return false;
                }
            } 
	    </script>
  </head>
  <body>
		<div class="modal-dialog">
	    	<div class="modal-content login-modal">
	      		<div class="modal-header login-modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title text-center" id="loginModalLabel">아갈컵 로그인/회원가입</h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="text-center">
		      			<div role="tabpanel" class="login-tab">
						  	<ul class="nav nav-tabs" role="tablist">
						    	<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">로그인</a></li>
						    	<li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">회원가입</a></li>
						  	</ul>
						 	<div class="tab-content">
						    	<div role="tabpanel" class="tab-pane active text-center" id="home">
								<form action="../login/modal/loginphp.php" method="post" name="login">
						    		&nbsp;&nbsp;
						    		<span id="login_fail" class="response_error" style="display: none;">로그인 오류 발생!</span>
						    		<div class="clearfix"></div>
						    		<form>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></i></div>
									      		<input type="text" class="form-control" id="login_username" placeholder="네이버 아이디" name="emailusername" required>
									    	</div>
									    	<span class="help-block has-error" id="email-error"></span>
									  	</div>
									  	<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></div>
									      		<input type="password" class="form-control" id="password" placeholder="비밀번호" name="password" required>
									    	</div>
									    	<span class="help-block has-error" id="password-error"></span>
									  	</div>
							  			<button type="submit" id="login_btn" class="btn btn-block bt-login" data-loading-text="Signing In...." name="submit" value="Login" onclick="return(submitlogin());">로그인</button>
									<br>
									</form>
						    	</div>
						    	<div role="tabpanel" class="tab-pane" id="profile">
								<form action="../login/modal/registrationphp.php" method="post" name="reg">
						    	    &nbsp;&nbsp;
						    	    <span id="registration_fail" class="response_error" style="display: none;">회원가입 오류 발생!</span>
						    		<div class="clearfix"></div>
						    		<form>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></div>
									      		<input type="text" class="form-control" id="username" placeholder="아가리오 닉네임" name="fullname" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></div>
									      		<input type="text" class="form-control" id="remail" placeholder="네이버 아이디" name="uname" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></div>
									      		<input type="email" class="form-control" id="remail" placeholder="네이버 이메일" name="uemail" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="remail-error"></span>
									  	</div>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"></div>
									      		<input type="password" class="form-control" id="username" placeholder="생성할 비밀번호" name="upass" required>
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="username-error"></span>
									  	</div>
							  			<button type="submit" id="register_btn" class="btn btn-block bt-login" data-loading-text="Registering...." name="submit" value="Register" onclick="return(submitreg());">회원가입</button>
									<br>
									</form>
						    	</div>
						  	</div>
						</div>
	      				
	      			</div>
	      		</div>
	      		
	    	</div>
	   </div>
	   <center>
	   <br><br>
	   <a href="../agarcupsee.html" class="btn-primary btn btn-info" role="button" style="width:18%;" target="_blank">비로그인 관전</a>  <a href="http://cafe.naver.com/agario" class="btn-primary btn btn-success" style="width:18%;" role="button" target="_blank">주의사항</a> <a href="http://cafe.naver.com/agario" class="btn-primary btn btn-danger" role="button" style="width:18%;" target="_blank">공지사항</a>
	   </center>
    <script src="../login/modal/js/jquery.min.js"></script>
    <script src="../login/modal/js/bootstrap.min.js"></script>
    <script>
	    $(document).ready(function(){
	    	$(document).on('click','.signup-tab',function(e){
	    		 e.preventDefault();
	    		 $('#signup-taba').tab('show');
	    	});	
	
	    	$(document).on('click','.signin-tab',function(e){
	    		 e.preventDefault();
	    		 $('#signin-taba').tab('show');
	    	});
	    	
	    	$(document).on('click','.forgetpass-tab',function(e){
	    		 e.preventDefault();
	    		 $('#forgetpass-taba').tab('show');
	    	});
	    });	
    </script>
  </body>
</html>