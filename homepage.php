<DOCTYPE html>
<?php
	include("connect_mysql.php");//連結資料庫
	 //$SEL_item="SELECT * FROM invest_item_table";  // 查項目表全部
	$SEL_item_stock="SELECT * FROM invest_item_table WHERE `typename`=\"股票\" ORDER BY `investtime`";  // 查項目表裡 類型是股票的
	$SEL_item_save="SELECT * FROM invest_item_table WHERE `typename`=\"定存\" ORDER BY `investtime`";  // 查項目表裡 類型是定存的
	$SEL_item_coins="SELECT * FROM invest_item_table WHERE `typename`=\"紀念幣\" ORDER BY `investtime`";  // 查項目表裡 類型是紀念幣的
	$SEL_item_fund="SELECT * FROM invest_item_table WHERE `typename`=\"基金\" ORDER BY `investtime`";  // 查項目表裡 類型是基金的
	
	//$SEL_type="SELECT * FROM invest_itemtype_table"; // 查類型表全部
	$SEL_type_stock="SELECT * FROM invest_itemtype_table WHERE `typename`=\"股票\"";
	$SEL_type_save="SELECT * FROM invest_itemtype_table WHERE `typename`=\"定存\"";
	$SEL_type_coins="SELECT * FROM invest_itemtype_table WHERE `typename`=\"紀念幣\"";
	$SEL_type_fund="SELECT * FROM invest_itemtype_table WHERE `typename`=\"基金\"";
	
	
	
    $SEL_stock_RESULT = mysqli_query($link,$SEL_item_stock); // 股票結果
	$SEL_save_RESULT = mysqli_query($link,$SEL_item_save);	// 定存結果
	$SEL_coins_RESULT = mysqli_query($link,$SEL_item_coins);	// 紀念幣結果
	$SEL_fund_RESULT = mysqli_query($link,$SEL_item_fund);	// 基金結果
	
	
	
	$SEL_type_stock_RESULT = mysqli_query($link,$SEL_type_stock);	// 股票類型結果
	$SEL_type_save_RESULT = mysqli_query($link,$SEL_type_save);	// 定存類型結果
	$SEL_type_coins_RESULT = mysqli_query($link,$SEL_type_coins);	// 紀念幣類型結果
	$SEL_type_fund_RESULT = mysqli_query($link,$SEL_type_fund);	// 基金類型結果
	
	
	$_ITEM_ITEMNAME = $_POST['_item_itemname'];//post獲取表單裡的 itemname
	$_ITEM_ITEMTYPE = $_POST['_item_itemtype'];
	$_ITEM_INVESTTIME = $_POST['_item_investtime'];
	$_ITEM_TOTALMONEY = $_POST['_item_totalmoney'];
	$_ITEM_RETURNRATE =$_POST['_item_returnrate'];
	$_ITEM_INVESTOR = $_POST['_item_investor'];
		
		
	$_TYPE_TYPENAME = $_POST['_type_typename'];
	$_TYPE_TOTALMONEY = $_POST['_type_totalmoney'];
	$_TYPE_RETURNRATE = $_POST['_type_returnrate'];
	
	
			

if(!isset($_POST['submit_additem']))//判斷是否有submit操作
{
}
else
{	
	if($_ITEM_ITEMNAME != null && $_ITEM_ITEMTYPE != null && $_ITEM_INVESTTIME != null && $_ITEM_TOTALMONEY != null &&
			$_ITEM_RETURNRATE != null  && $_ITEM_INVESTOR != null ) 	
	{
		
		//插入項目
		$insertinto_item="INSERT INTO invest_item_table(`itemname`, `typename`, `investtime`, `totalitemmoney`, `totalitemreturnrate`, `investor`) 
		VALUES (\"$_ITEM_ITEMNAME\",\"$_ITEM_ITEMTYPE\",\"$_ITEM_INVESTTIME\",\"$_ITEM_TOTALMONEY\",\"$_ITEM_RETURNRATE\",\"$_ITEM_INVESTOR\")";//向資料庫插入表單傳來的值的sql
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		$INSERT_RESULT=mysqli_query($link,$insertinto_item);//執行sql
		mysqli_query($link,$insertinto_item);
		
		if (!$INSERT_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				
				echo "<script language=javascript>";
				echo	"alert('成功!~ 已加入此項目!')"; 	
				echo "</script>";
			}
		
	}
	else 
	{	
		echo "<h2>新增投資項目失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
		//echo "<script language=javascript>";
		//echo	"alert('插入失敗，請重來!')"; 
		//echo "</script>";
		//echo "<h1 align=center><span style=color:red;>表單填寫不完全，插入失敗，請重填!</span></h1>";	
	}
}		
	

if(!isset($_POST['submit_addtype']))//判斷是否有submit操作
{	
}
else
{	
	if($_TYPE_TYPENAME != null && $_TYPE_TOTALMONEY != null && $_TYPE_RETURNRATE != null )
	{
		
		//插入類型
		$insertinto_type="INSERT INTO invest_itemtype_table(`typename`, `totaltypemoney`, `totaltypereturnrate`) 
		VALUES (\"$_TYPE_TYPENAME\",\"$_TYPE_TOTALMONEY\",\"$_TYPE_RETURNRATE\")";//向資料庫插入表單傳來的值的sql
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		$INSERT_TYPE_RESULT=mysqli_query($link,$insertinto_type);//執行sql
		mysqli_query($link,$insertinto_item);
		
		if (!$INSERT_TYPE_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('成功!~ 已加入此類型!')"; 	
				echo "</script>";

			}
	}
	else
	{
		echo "<h2>新增投資類型失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
	}
}	

	// 接住修改項目
	$ORI_ITEM_ITEMNAME = $_POST['original_item_itemname'];  
	$NEW_ITEM_ITEMNAME = $_POST['new_item_itemname'];
	$NEW_ITEM_ITEMTYPE = $_POST['new_item_itemtype'];
	$NEW_INVESTTIME = $_POST['new_investtime'];
	$NEW_ITEM_TOTALMONEY = $_POST['new_item_totalmoney'];
	$NEW_ITEM_RETURNRATE = $_POST['new_item_returnrate'];
	$NEW_ITEM_INVESTOR = $_POST['new_item_investor'];
	
	// 接住修改類型
	$ORI_TYPE_TYPENAME = $_POST['original_type_typename'];
	$NEW_TYPE_TYPENAME = $_POST['new_type_typename'];
	$NEW_TYPE_TOTALMONEY = $_POST['new_type_totalmoney'];
	$NEW_TYPE_RETURNRATE = $_POST['new_type_returnrate'];
	
if(!isset($_POST['submit_modifyitem']))//判斷是否有submit操作
{	
	
}
else
{	
	if($ORI_ITEM_ITEMNAME != null && $NEW_ITEM_ITEMNAME != null && $NEW_ITEM_ITEMTYPE != null && $NEW_ITEM_RETURNRATE != null && 
		$NEW_INVESTTIME != null && $NEW_ITEM_TOTALMONEY != null && $NEW_ITEM_INVESTOR != null)
		{	//判斷是否有這個項目名稱可以修改
			mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
			//更新資料庫資料語法
			$UPD_ITEM = "UPDATE invest_item_table SET `itemname`=\"$NEW_ITEM_ITEMNAME\",
			`typename`=\"$NEW_ITEM_ITEMTYPE\",`investtime`=\"$NEW_INVESTTIME\",
			`totalitemmoney`=\"$NEW_ITEM_TOTALMONEY\",`totalitemreturnrate`=\"$NEW_ITEM_RETURNRATE\", 
			`investor`=\"$NEW_ITEM_INVESTOR\"  WHERE `itemname`=\"$ORI_ITEM_ITEMNAME\"";
			
			$UPDATE_ITEM_RESULT=mysqli_query($link,$UPD_ITEM);//執行sql   
			mysqli_query($link,$UPD_ITEM);
		 
			if(!$UPDATE_ITEM_RESULT)
			{	
				die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
			}	
			else
			{
				echo "<script language=javascript>";
				echo	"alert('修改項目成功!')"; 	
				echo "</script>";
			}
		}	
		else
		{
			echo "<h2>修改投資項目失敗...! 請重來!</h2>"; 
			echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
		}
}



if(!isset($_POST['submit_modifytype']))//判斷是否有submit操作
{		
}
else
{	
	if($ORI_TYPE_TYPENAME != null && $NEW_TYPE_TYPENAME != null && $NEW_TYPE_TOTALMONEY != null && $NEW_TYPE_RETURNRATE != null )
	{	//判斷是否有這個類型名稱可以修改
		mysqli_query($link, 'SET NAMES utf8'); //這樣中文才不會變亂碼
		//更新資料庫資料語法   
		$UPD_TYPE = "UPDATE invest_itemtype_table SET `typename`=\"$NEW_TYPE_TYPENAME\", 
		`totaltypemoney`=\"$NEW_TYPE_TOTALMONEY\",`totaltypereturnrate`=\"$NEW_TYPE_RETURNRATE\" 
		WHERE `typename`=\"$ORI_TYPE_TYPENAME\"";
			
		$UPDATE_TYPE_RESULT=mysqli_query($link,$UPD_TYPE);//執行sql   
		mysqli_query($link,$UPD_TYPE);
		 
		if(!$UPDATE_TYPE_RESULT)
		{	
			die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
		}	
		else
		{
			echo "<script language=javascript>";
			echo	"alert('修改類型成功!')"; 	
			echo "</script>";
		}
	}	
	else
	{
		echo "<h2>修改投資類型失敗...! 請重來!</h2>"; 
		echo '<meta http-equiv=REFRESH CONTENT=1;url=catalogue.php>';
	}
}		

			
?>

<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	  <title>書審Spotlight輔助分析資訊系統</title>
	</head> 
	
	
	<body bgcolor="#ECECFF">
	
	
	<header class="main-header">
		<div style="font-family: UDDig;">
			<div class="containerleft">
				<h3><a href="homepage.php" style="color:#ECF5FF;">書審Spotlight</a></h3>
				<h5><a href="login.php">登入</a> </h5>
				<h5><a href="register.php">註冊帳號 </a> </h5>
				<span style="font-size:10px;"><a href="member.php">成員中心</a></span>
				
				
				<nav>    

					<ul class="main-menu" >
					
						<li><a href="#"> <b>開始分析</b> </a></li>
						<li><a href="#"> <b>首頁</b> </a></li>
						<li><a href="#"> <b>評估報告</b> </a></li>
						<li><a href="#"> <b>FAQ 常見問題</b> </a></li>					
					
						<a href="https://zh-tw.facebook.com/"><img src="./photos/fblogo.png" alt="" width="50" height="50" ></a>
						<a href="/"><img src="./photos/linelogo.png" alt="" width="50" height="50" ></a>
					
		<!--		list-style: none;   /* 移除項目符號 */         -->
					</ul>
				
						
				</nav>    
			</div>
		</div>
	</header>
	
	<div class="robotp">
		<img src="./photos/robot.png" alt="" style="position:absolute; right:80px; top:220px; width=280px; height=300px;" />
	</div>
	<!--CSS not working
.robotp
{
  position: absolute;
  top: 100px;
  right: 200px;
}
	-->
	
	
	
	
	<div class="pazzlep">
		<img src="./photos/pazzle.png" alt="" width="550" height="320" />
	</div>
	
	<div style="font-family: UDDig;">
	
		
		<h2>
		
			<div class="text1p">
				您. . . 是否還在迷茫面試時要問甚麼問題?
			</div>
		
			<div class="text2p">
				還在對著辦公桌上一大疊的備審資料苦苦發愁?
			</div>
		
			<div class="text3p">
				是否覺得招進來的學生卻對這個科系沒有那麼大的興趣?
			</div>
		
		</h2>
	
		<h1>
			<div class="textcenterp">
				<br/>
				別擔心，在此系統，
				<br/>
				AI可以成為您的超級助手，並且給出最客觀的分析!
			</div>
		</h1>
	</div>
	
	
	

	<!--
			<table border="1" style="border:1px  groove;" width="1518" height="550" >
				<tr style="background-color:#ECECFF	">
						

				&nbsp;&nbsp;
					<img src="./photos/pazzle.png" alt="" width="300" height="175" />
					
					
					
				</tr>
			</table>	
	-->
		
		<style>
			@import url(header.css);@import url ( header . css );
			@font-face
			{
				font-family: UDDig;
				src: url(./org-unpack-20211227/UDDigiKyokashoN-R-01.ttf);
			}
			
		</style>

	
	
	
	
	
	
	 
	</body>
</html>
