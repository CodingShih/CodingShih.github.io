<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>書審Spotlight-登入頁面</title>
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

				<table class="box" style="width:650px; height:400px; border:8px #46A3FF groove ;" border="3" cell padding="10">	
					<caption>
						<h2>
							<span style="font-size:28px">
								登入
							</span>
						</h2>
					</caption>
				
					<tr>
						<th>
							<span style="font-size:20px">
								帳號:  
							</span>
								<input type="text"  style="width:400px; height:60px; font-size:18px; border-radius:8px;" name="account_" placeholder="輸入帳號" maxlength="20" /> 
							
							
								<br/><br/>
								
							<span style="font-size:20px">
								密碼: 
							</span>
								<input type="password" style="width:400px; height:60px; font-size:18px; border-radius:8px;" id="pwd" name="password_" placeholder="(建議英文+數字，最多16字)" maxlength="16" />							
								<label for=""> <!-- 眼睛查看密碼./photos/eye_close.png	-->
									<img src="eye_close.png" id="eye" />
								</label>
							
								
							<br/><br/><br/>
								<input type="submit" style="width:200px; height:50px; font-size:18px; border-radius:8px;" name="button" value="確定登入" />
								&nbsp; 	 	
								<a href="register.php"><span style="font-size:18px">還沒註冊嗎?</span></a>	
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
			//2.註冊事件
			var flag = 0;
			eye.onclick = function () 
						  {
							if (flag == 0) 
							{
								pwd.type = 'text';
								eye.src = 'eye_open.png';
								flag = 1;

							} 
							else 
							{
								pwd.type = 'password';
								eye.src = 'eye_close.png';
								flag = 0;
							}

						  }
						  
		</script>	
	  </div>
	</body>
</html>



<?php
			session_start();  // 啟用交談期
			$account = "";  $password = "";
			// 取得表單欄位值
			if ( isset($_POST["account_"]) )
				$account = $_POST["account_"];
			if ( isset($_POST["password_"]) )
				$password = $_POST["password_"];
			
			
			// 檢查是否輸入使用者名稱和密碼
			if ($account != "" && $password != "") 
			{
				// 建立MySQL的資料庫連接 
				$link=mysqli_connect("localhost","root","nuuadmin","fims")
				or die ("無法開啟MySQL資料庫連接!<br/>");
				//送出UTF8編碼的MySQL指令
				mysqli_query($link, 'SET NAMES utf8'); 
				// 建立SQL指令字串
				$SELECT = "SELECT * FROM member_table WHERE password='";
				$SELECT.= $password."' AND account='".$account."'";
				
				
				
				// 執行SQL查詢
				
				$RESULT=mysqli_query($link,$SELECT);//執行

				$total_records = mysqli_num_rows($RESULT);
				// 是否有查詢到使用者記錄
				if ( $total_records > 0 ) 
				{
					// 成功登入, 指定Session變數
					$_SESSION["login_session"] = true;
					header("Location: homepage.php");
				} 
				else 
				{  // 登入失敗
					echo "<center><font color='red'>";
					echo "使用者名稱或密碼錯誤!<br/>";
					echo "</font>";
					$_SESSION["login_session"] = false;
				}
				mysqli_close($link);  // 關閉資料庫連接  
			}
		?>