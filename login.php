<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>회원가입 및 로그인 사이트</title>
    <link rel="stylesheet" type="text/css" href="common.css" />

    <style>
    h1 { text-align : center;}
    </style>
  </head>
  
  <body>
    <h1>배성민 서점</h1><br></br>  <!-- -->
    <p style="text-align:center;"><img src = "Lib.jpeg"></p><br></br>
    
    <div id="login_box">						
			<form method="post" action="/member/member.php"> <!-- 로그인 박스 누르면 login_ok.php로 이동 -->
				<table align="center" border="0" cellspacing="0" width="300"> <!-- 로그인 박스 주변 테두리 -->
        			<tr>
            			<td width="130" colspan="0"> 
                		<input type="text" name="userid" class="inph"> <!-- 로그인 입력 -->
                  		</td>

                		<td rowspan="2" align="center" width="100" > 
                		<button type="submit" id="btn" >로그인</button>
                		</td>
        	    	</tr>

        		    <tr>
            	    	<td width="130" colspan="1"> 
               		    <input type="password" name="userpw" class="inph">  <!-- 비밀번호 입력 -->
            	        </td>
        	        </tr>
                 	<tr>
           		        <td colspan="3" align="center" class="mem"> 
              	        <a href="member.php">회원가입 하시겠습니까?</a>
                        </td>
                    </tr>
                </table>
            </form>
    </div>
    
  </body>
</html>