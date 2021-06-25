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
	//	$sql = $conn ->prepare("select CUST_ID,NAME from CUSTOMER");
	//	$sql -> execute();
	//	$member=$sql->fetch_array();
	/*	
		if(!isset($members[$id])) {
			echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
			exit;
		}
		if($members[$id]['NAME'] != $user_pw) {
				echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
				exit;
		}
		/*
		if(password_verify($password,$hash_pw)){
			echo "<script>alert('로그인되었습니다.'); location.href='/page/main.php';</script>";
		} else {
			echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";

		}
	*/	
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
		
	/*
	$password = $_POST['userpw']; //password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$sql = mq("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 

	if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];

		echo "<script>alert('로그인되었습니다.'); location.href='/page/main.php';</script>";
	}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
	*/
	}
?>