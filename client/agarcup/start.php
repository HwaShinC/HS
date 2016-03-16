<?php
    session_start();
    include_once '../login/modal/include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:http://agark.kr/agarcup");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:http://agark.kr/agarcup");
    }
?>
<!DOCTYPE html>
<html>
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
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71859660-1', 'auto');
  ga('send', 'pageview');

</script>
	<script>
  //on return request event
  window.onbeforeunload = function (e) {
  e = e || window.event;
 
  // For IE<8 and Firefox prior to version 4
  if (e) {
    e.returnValue =
    e.returnValue =
  }
 
  // For Chrome, Safari, IE8+ and Opera 12+
  return
};
</script>
        <script src="../Vector2.js"></script>
        <script src="../main_out_cup.js"></script>
        <style>body {
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
		
		#rightsidebox{
			width: 320px;
			background-color: #FFFFFF;
			margin: 10px auto;
			border-radius: 5px;
			padding: 10px 5px 10px 5px;
			position: absolute;
			right: -97%;
			top: 38%;
			webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
		    transform: translate(-50%, -50%);
		}
		
		#leftsidebox{
			width: 320px;
			background-color: #FFFFFF;
			margin: 10px auto;
			border-radius: 5px;
			padding: 10px 5px 25px 5px;
			position: absolute;
			right: 69%;
			top: 13.5%;
			webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
		    transform: translate(-50%, -50%);
	    }
		
		#levelBar{
		    background: #f0ad4e;
		    transition:width .6s ease;
		    line-height: 20px;
		    height: 100%;
		}

		#liquid{
		    background: url('') right center;
		    opacity: 0.3;
		    width:auto;
		    height: 20px;
		    z-index: -1;
		    display: block;
		}

		#level{
    	    position: fixed;
    	    bottom: 245px;
    	    right: 10px;
    	    z-index: 2;
    	    width: 205px;
    	    color: #fff;
    	    display: block;
		}
		
		#level .twirl{
		    width: 30px;
		    height: 0px;
		    z-index: 5;
		}
		
		#lvl{
    	    color: #fff;
    	    border-radius:50%;
    	    width: 30px;
    	    display: block;
    	    text-align: center;
    	    line-height: 30px;
    	    position: absolute;
    	    left: -10px;
    	    height: 30px;
    	    border:solid 3px #41608f;
    	    background: #5877a5;
    	    margin-top: -5px;
    	    z-index: 5;
		}

		#level label{
    	    color: #41608f;
    	    padding-left: 20px;
		}

		.progress{
    	    box-shadow: none !important;
    	    border-radius:4px;
    	    border:solid 3px #41608f;
		}
		
		#face{
		    height: 30px;
			width: 30px;
			border-radius:3px;
			right: 8;
			top: 30;
			z-index: 1000;
			position: absolute;
			padding : 0px 0px;
		}
		
        #canvas {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        .checkbox label {
            margin-right: 10px;
        }

        form {
            margin-bottom: 0px;
        }

        .btn-play, .btn-settings, .btn-spectate {
            display: block;
            height: 35px;
        }

        .btn-play {
            width: 86%;
            float: left;
        }

        .btn-settings {
            width: 12%;
            float: right;
        }

        .btn-spectate {
		    width: 33%;
            display: block;
            float: right;
        }

        #adsBottom {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
        }

        #adsBottomInner {
            margin: 0px auto;
            width: 728px;
            height: 90px;
            border: 5px solid white;
            border-radius: 5px 5px 0px 0px;
            background-color: #FFFFFF;
            box-sizing: content-box;
        }

        .region-message {
            display: none;
            margin-bottom: 12px;
            margin-left: 6px;
            margin-right: 6px;
            text-align: center;
        }

        #nick, #locationKnown #region {
            width: 67%;
            float: left;
        }

        #locationUnknown #region {
            margin-bottom: 15px;
        }

        #gamemode, #spectateBtn {
            width: 33%;
            float: right;
        }

        #helloDialog {
            width: 500px;
            background-color: #FFFFFF;
            margin: 10px auto;
            border-radius: 5px;
            padding: 5px 15px 5px 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #chat_textbox {
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            position: absolute;
			border-radius: 8px;
            z-index: 1;
            bottom: 10px;
            background: rgba(0, 0, 0, .2);
            border: 0px;
            outline: none;
            color: #FFF;
            height: 30px;
            text-indent: 12px;
            left: 10px;
            width: 300px;
        }
		
        #imgpos {
			position: fixed;
		    bottom: 10px;
		    right: 10px;
		    width: 215.5px;
		    height: 246.5px;
		}
		
        #chat_textbox:focus {
            background: rgba(0, 0, 0, .5);
        }
		
		#duyuru_info {
            position: absolute;
            z-index: 1;
            bottom: 10px;
            border: 1px;
		    background: 
            height: 50px;
            text-indent: 12px;
            left: 0px;
            width: 485px;
		    font-size: 12px;
        }

        #a300x250 {
            width: 300px;
            height: 250px;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center center;
        }</style>
</head>
<body>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
<div id="fb-root"></div>
<script>
    setSmooth(false);
	setRegion("US-Fremont");
</script>
<div id="overlays"
     style="display:none; position: absolute; left: 0; right: 0; top: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 200;">
     <div id="helloDialog">
	 	    <div id="face" class="fb-like" data-share="true" data-width="450" data-show-faces="true">
		</div>
<div id="leftsidebox">
<center>
<b><h3>아갈컵 관계자</h3></b><br>
<font color="#5F00FF"><?php $user->get_fullname($uid); ?></font>님, 환영합니다.<br>
<a href="start.php?q=logout">로그아웃</a>
</center>
</div>
<div id="duyuru_info"></div>
			<div id="rightsidebox">
            <center>
                <div id="sideboxcontent" style="margin-top: 2px; margin-bottom: 2px;">
<!-- 구글 광고 위치 -->
				<center>
				<iframe width="300" height="250" allowtransparency="true" src="http://tab2.clickmon.co.kr/pop/wp_ad_300.php?PopAd=CM_M_1003067%7C%5E%7CCM_A_1017117%7C%5E%7CAdver_M_1003115" frameborder="0" scrolling='no'></iframe>
				<br>
				<br>
				<font color="red"><b>AKS 툴 사용방법 (V.1.0.1)</b>
				<br>
				<font color="Black">W 매크로: <b>W</b>를 길게 누르세요!
				<br>
				<font color="Black">세포 멈춤: <b>S</b>키를 누르세요!
				<br>
				<font color="Black">스페이스 매크로: <b>R</b>키를 누르세요!
				<br>
				<br>
			</center>
		</div>
        </div>
        <form role="form">
            <div class="form-group">
                <div style="float: left; margin-left: 20px;"><h2><img src="../logo.png"></h2></div>
                <br clear="both"/>
            </div>
            <div class="form-group">
                <input disabled id="nick" class="form-control" placeholder="닉네임을 입력하세요" value="<?php $user->get_fullname($uid); ?>" maxlength="15"/>
				    <select id="gamemode" class="form-control" onchange="setGameMode($(this).val());" required>
                    <option selected value="">내전 서버</option>
                </select>
                <br clear="both"/>
            </div>
            <!-- location Unknown -->
            <div>
                <div class="text-muted region-message CN-China">

                </div>
            </div>
            <div class="form-group">
                <div>
                <button type="submit" id="playBtn"
                        onclick="setNick(document.getElementById('nick').value); return false;"
                        class="btn btn-play btn-primary btn-needs-server">Play
                </button>
				<button onclick="$('#settings, #instructions').toggle();return false;"
                        class="btn btn-info btn-settings"><i class="glyphicon glyphicon-cog"></i></button>
				<br clear="both"/>
				</div>
                <div id="settings" class="checkbox" style="display:none;">
                <div class="form-group" id="mainform">

				</div>
                <div style="margin: 6px;">
                    <label><input type="checkbox" onchange="setSkins(!$(this).is(':checked'));"> 스킨 숨기기</label>
                    <label><input type="checkbox" onchange="setNames(!$(this).is(':checked'));"> 이름 숨기기</label>
                    <label><input type="checkbox" onchange="setColors($(this).is(':checked'));"> 색깔 숨기기</label>
                    <label><input type="checkbox" onchange="setShowMass($(this).is(':checked'));" checked> 스코어 보이기</label>
                    <label><input type="checkbox" onchange="setHideChat($(this).is(':checked'));"> 채팅 숨기기</label>
                    <label><input type="checkbox" onchange="setDarkTheme($(this).is(':checked'));" checked> 어두운 테마</label>
                    <label><input type="checkbox" onchange="setSmooth($(this).is(':checked'));"> 부드러운 렌더링</label>
                    <label><input type="checkbox" onchange="setHideCandy($(this).is(':checked'));"> 별사탕 숨기기</label>
                    <label><input type="checkbox" onchange="setAlphaCell($(this).is(':checked'));"> 세포투명화 끄기</label>
                </div>
            </div>
        </form>
				    <p></p>
               <a href="http://agark.kr/solo" class="btn-primary btn btn-info" role="button" style="width:21.5%;" target="_blank">솔로게임</a>
			   <a href="/rules.html" class="btn-primary btn btn-danger" role="button" style="width:21.5%;" target="_blank">게임규정</a>
			   <a href="http://cafe.naver.com/agario/19238" class="btn-primary btn btn-success" style="width:21.5%;" role="button" target="_blank">스킨등록</a>
               <button id="spectateBtn" onclick="spectate(); return false;" class="btn btn-warning btn-spectate btn-needs-server">관전하기
               <p></p>
               </div>
        <div id="instructions">
            <hr/>
            <center><span class="text-muted">
<a href="http://cafe.naver.com/agario"><b>Agar.io Korea Server TOOL - 1.0.1</b><br/></a>
한국서버 게임을 위한 가장 최적화된 툴<br>
Developed by 갱그로이드(hjchokj@naver.com)<br>
1.0.1 합쳐지는데 남은 시간 표시<br>
<a href="http://cafe.naver.com/agario" target="_blank"><img src="../hello1.png"></a>
<hr/>
</span></center>
        </div>
        <center>
            <center>
    <span class="text-muted">
       </span>
            </center>
            <div>
            </div>
            <small class="text-muted text-center"></small>
        </center>
    </div>
</div>
			<div id="level">
			    <label>당신의 레벨! <b id="lvl"><div class="twirl"></div>0</b></label>
			    <div class="progress">
			      <div id="levelBar" class="progress-bar progress-bar-warning" style="width: 10%;">
			      	<div id="liquid"></div>
			      </div>
			    </div>
			</div>
<div id="connecting"
     style="display:none;position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 100; background-color: rgba(0,0,0,0.5);">
    <div style="width: 350px; background-color: #FFFFFF; margin: 100px auto; border-radius: 15px; padding: 5px 15px 5px 15px;">
        <h2>연결중입니다!</h2>

        <p> 현재 서버가 리붓중이거나 당신은 벤을 당하셨습니다. (새로고침을 하시거나 <a href="http://cafe.naver.com/agario">카페</a>를 확인해주세요.)
    </div>
</div>
<canvas id="canvas" width="800" height="600" placeholder="채팅을 치려면 Enter를 누르세요!"></canvas>
<input type="text" id="chat_textbox" maxlength="200"/>
<div style="font-family:'Ubuntu'">&nbsp;</div>

<script type="text/javascript">
    $('input').keypress(function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if (!isSpectating)
                setNick(document.getElementById('nick').value);
        }
    });
</script>
<img src="../mini-map.png" width="200" height="200" alt="Position" id="imgpos">
<script src="../minimap.js"></script>
</body>
</html>
