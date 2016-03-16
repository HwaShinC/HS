<?php

    include_once 'include/class.user.php';
    $user = new User();

    // Checking for user logged in or not
    /*if (!$user->get_session())
    {
       header("location:index.php");
    }*/
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) {
            // Registration Success
            echo "<script> alert('회원가입이 완료되셨습니다! 지금바로 로그인해보세요^^'); history.back();</script>";
        } else {
            // Registration Failed
            echo "<script> alert('회원가입이 실패되었습니다. 페스워드나 닉네임, 이메일주소가 중복된것 같으니 확인해주시기 바랍니다^^'); history.back();</script>";
        }
    }
?>