<?php
$tns = "
(DESCRIPTION=
(ADDRESS_LIST= (ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521)))
(CONNECT_DATA= (SERVICE_NAME=XE))
)
";
$dsn = "oci:dbname=".$tns.";charset=utf8";
$username = 'c##madang';
$password = 'madang';
//$searchWord = $_GET['searchWord'] ?? '';
try {
$conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
echo("에러 내용: ".$e -> getMessage());
}
?>

<meta charset="utf-8" />
<?php	
	
	if($_POST["userid"] == "" || $_POST["userpw"] == "") { 	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{ //아이디와 비밀번호는 입력은 받았음 
	
  				
		$id = $_POST["userid"];
		$password = $_POST["userpw"];
		$stmt = $conn -> prepare("SELECT CUST_ID,NAME FROM CUSTOMER");
		$stmt -> execute();
	
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			$count=$count+1;
			if(($row['NAME']==$password) && ($row['CUST_ID']==$id)) {
				$boo=TRUE;
			}
		}
		if($boo==TRUE){
			echo "<script>alert('로그인되었습니다.'); location.href='/booklist.php';</script>";
		} else {
			echo "<script>alert('로그인되었습니다.'); location.href='/booklist.php';</script>";
			
		}
	
	           
    }  
?>