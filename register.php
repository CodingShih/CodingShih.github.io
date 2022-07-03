<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>書審Spotlight-註冊頁面</title>
	</head> 
	
	<body bgcolor="#ECECFF">
	  <div style="font-family: UDDig;">
		
		<header class="main-header">
			<div class="containerleft">
				<h3><a href="homepage.php" style="color:#ECF5FF; text-decoration:none;">書審Spotlight</a></h3>
			</div>
		</header>
		
	
		<!--    置中表格  -->
		<form method="post" action="login.php">
			<table class="box" style="width:800px; height:860px; border:8px #46A3FF groove;" border="3" cell padding="10">	
				<caption>
					<h2>
						<span style="font-size:28px">
							註冊
						</span>
					</h2>
				</caption>
				
				<tr>
					<th>
						<span style="font-size:20px">
							名稱:  
						</span>
						<input type="text" name="_username" style="width:400px; height:60px; font-size:18px;" placeholder="幫自己取個名吧" /> 
						<br/><br/><br/>
						
						<span style="font-size:20px">
							帳號:  
						</span>
						<input type="text" name="account_" style="width:400px; height:60px; font-size:18px;"    placeholder="最多20字" maxlength="20" /> 
						<br/><br/><br/>
								
						<span style="font-size:20px">
							密碼: 
						</span>
						<input type="password"  id="pwd" name="password_" style="width:400px; height:60px; font-size:18px;" placeholder="(建議英文+數字，最多16字)" maxlength="16" />							
						<br/><br/><br/>
						
						<label for="" > <!-- 眼睛查看密碼./photos/eye_close.png	-->
							<img src="eye_close.png" id="eye" style="position:absolute; right:400px; top:500px;" />
						</label>
					
					
					
					<div align="left">
						
						<!--  &ensp;  半形空格 ，  &emsp; 全形空格，  &thinsp; 窄空格 ，&nbsp; 不換行空格  -->
						
						&emsp;&emsp;&emsp;
						<span style="font-size:20px">
							再一次輸入密碼: 
						</span>
						<input type="password" id="pwd2" name="_password2" style="width:400px; height:60px; font-size:18px;" placeholder="請和上方的密碼一樣" maxlength="16"  /> 
						<br/><br/><br/>
					
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
						<span style="font-size:20px">
							電子信箱:  
						</span>
						<input type="text" name="_email" style="width:400px; height:60px; font-size:18px;"   /> 
						<br/><br/><br/>
						
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
						<span style="font-size:20px">
							聯絡電話:  
						</span>
						<input type="text" name="_phonenumber" style="width:400px; height:60px; font-size:18px;"	 /> 
						<br/><br/><br/>
						
						
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;
						
						
						<label for="_identity" style="font-size:20px">身分:</label>
						
						<select name="_identity" id="identity" style="width:200px; height:60px " >
							<optgroup label="請填寫你的身分">
								<option value="teacher_">老師</option>
								<option value="student_" selected>學生</option>
							</optgroup>
						</select>
						
			
						
						<br/><br/><br/>
					</div>
						  
						
						<a href="login.php"><span style="font-size:20px">有帳號了嗎? 快來登入</span></a>
						<br/><br/><br/>
						<input type="submit" style="width:200px; height:50px; font-size:18px" name="button" value="確定" />
								&nbsp; <!--不換行空格--> 	 	
					
							<input type="reset" style="width:200px; height:50px; font-size:18px; color:red; border-radius:10px;" value="清除"/>	
						
					</th>
				</tr>

			</table>
		</form>
  
	  






















		<style>
			@import url(loginpage.css);@import url ( loginpage . css );
			@font-face
			{
				font-family: UDDig;
				src: url(./org-unpack-20211227/UDDigiKyokashoN-R-01.ttf);
			}
			
		</style>
		
		<script>
			//1.獲取元素，圖片和密碼
			var eye = document.getElementById('eye');
			var pwd = document.getElementById('pwd');
			var pwd2 = document.getElementById('pwd2');
			//2.註冊事件
			var flag = 0;
			eye.onclick = function () 
						  {
							if (flag == 0) 
							{
								pwd.type = 'text';
								pwd2.type = 'text';
								eye.src = 'eye_open.png';
								flag = 1;

							} 
							else 
							{
								pwd.type = 'password';
								pwd2.type = 'password';
								eye.src = 'eye_close.png';
								flag = 0;
							}

						  }
						  
		</script>

	  
	  </div>
	</body>
</html>
