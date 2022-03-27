<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>sign up page</title>
<script type="text/javascript">
     var pw_passed = true;  // 추후 벨리데이션 처리시에 해당 인자값 확인을 위해

    function fn_pw_check() {
        var pw = document.getElementById("sdf").value; //비밀번호
        var pw2 = document.getElementById("sdfsdf").value; // 확인 비밀번호
        var id = document.getElementById("id").value; // 아이디

        pw_passed = true;

        var pattern1 = /[0-9]/;
        var pattern2 = /[a-zA-Z]/;
        var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거
        var pw_msg = "";

        if(id.length == 0) {
               alert("아이디를 입력해주세요");
               return false;
         }

        if(pw.length == 0) {
               alert("비밀번호를 입력해주세요");
               return false;
         } else {
                if( pw  !=  pw2) {
                      alert("비밀번호가 일치하지 않습니다.");
                      return false;
                 }
         }
       if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50){
            alert("영문+숫자+특수기호 8자리 이상으로 구성하여야 합니다.");
            return false;
        }          
        if(pw.indexOf(id) > -1) {
            alert("비밀번호는 ID를 포함할 수 없습니다.");
            return false;
        }
        var SamePass_0 = 0; //동일문자 카운트
        var SamePass_1 = 0; //연속성(+) 카운드
        var SamePass_2 = 0; //연속성(-) 카운드
        for(var i=0; i < pw.length; i++) {
             var chr_pass_0;
             var chr_pass_1;
             var chr_pass_2;     
             if(i >= 2) {
                 chr_pass_0 = pw.charCodeAt(i-2);
                 chr_pass_1 = pw.charCodeAt(i-1);
                 chr_pass_2 = pw.charCodeAt(i);
                  //동일문자 카운트
                 if((chr_pass_0 == chr_pass_1) && (chr_pass_1 == chr_pass_2)) {
                    SamePass_0++;
                  } 
                  else {
                   SamePass_0 = 0;
                   }
                  //연속성(+) 카운드
                 if(chr_pass_0 - chr_pass_1 == 1 && chr_pass_1 - chr_pass_2 == 1) {
                     SamePass_1++;
                  }
                  else {
                   SamePass_1 = 0;
                  }
                  //연속성(-) 카운드
                 if(chr_pass_0 - chr_pass_1 == -1 && chr_pass_1 - chr_pass_2 == -1) {
                     SamePass_2++;
                  } 
                  else {
                   SamePass_2 = 0;
                  }  
             }     

            if(SamePass_0 > 0) {
               alert("동일문자를 3자 이상 연속 입력할 수 없습니다.");
               pw_passed=false;
             }

            if(SamePass_1 > 0 || SamePass_2 > 0 ) {
               alert("영문, 숫자는 3자 이상 연속 입력할 수 없습니다.");
               pw_passed=false;
             } 

             if(!pw_passed) {             
                  return false;
                  break;
            }
        }
        alert("성공하였습니다.")
        return true;
    }

// 이메일이 잘못되었는지 확인하는 함수 
function CheckEmail(str)
{                                                 
     var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
     if(!reg_email.test(str)) {                            
          return false;         
     }                            
     else {
          return true;         
     }                          
}                                
                                
function GoToEnroll()                
{                                          
    var obEmail       = document.getElementById("email");
    if (!obEmail.value) {             
        alert("이메일을 입력하세요!");
        obEmail.focus();    
        return;
    } else {          
        if(!CheckEmail(obEmail.value))  {
            alert("이메일 형식이 잘못되었습니다");
            obEmail.focus();
            return;
        }                
    }                      
}
</script>
</head>
<body>
<form method="post" action="rgst.pst.php">
 <h1>회원가입 페이지</h1>
 <table border="1">
  <tr>
   <td>아이디</td>
   <td><input type="text" size="30" name="id" required minlength="5" maxlength="15" id="id"></td>
  </tr>
  <tr>
   <td>비밀번호</td>
   <td><input type="password" size="30" name="pwd" required minlength="10" id="sdf"></td>
  </tr>
  <tr>
   <td>비밀번호 확인</td>
   <td><input type="password" size="30" name="pwd2" required id="sdfsdf"></td><td><input type="button" value="비밀번호 확인하기" onclick="fn_pw_check()" </td>
  </tr>
  <tr>
   <td>이름</td>
   <td><input type="text" size="12" maxlength="4" name="name" required></td>
  </tr>
  <tr>
   <td>e-mail</td>
   <td><input type="email" size="30" name="email" id="email"required></td><td><input type="button" value="이메일 확인하기" onclick="GoToEnroll()"</td>
  </tr>
 </table>
 <input type=submit value="submit"><input type=reset value="rewrite"><br/>
</form>
<a href="login.php">로그인 하러가기</a>
</body>
</html>