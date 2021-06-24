<?php
$tns = "
(DESCRIPTION=
(ADDRESS_LIST= (ADDRESS=(PROTOCOL=TCP)(HOST=cnusdlab.synology.me)(PORT=1521)))
(CONNECT_DATA= (SERVICE_NAME=XE))
)
";
$dsn = "oci:dbname=".$tns.";charset=utf8";
$username = 'c##madang';
$password = 'madang';
$dbh = new PDO($dsn, $username, $password);

switch($_GET['mode']){
    case 'insert':
    $stmt = $dbh->prepare("INSERT INTO BOOK (BOOK_ID, BOOK_NAME, PUBLISHER, PRICE) VALUES ((SELECT 
    NVL(MAX(BOOK_ID), 0) + 1 FROM BOOK), :bookName, :publisher, :price)");
    $stmt->bindParam(':bookName',$bookName);
    $stmt->bindParam(':publisher',$publisher);
    $stmt->bindParam(':price',$price);
    $bookName = $_POST['bookName'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $stmt->execute();
    header("Location: booklist.php");
    break;
    case 'delete':
    $stmt = $dbh->prepare('DELETE FROM BOOK WHERE BOOK_ID = :bookId');
    $stmt->bindParam(':bookId', $bookId);
    $bookId = $_POST['bookId'];
    $stmt->execute();
    header("Location: booklist.php");
    break;
    case 'modify':
    $stmt = $dbh->prepare('UPDATE BOOK SET BOOK_NAME = :bookName, PUBLISHER = :publisher, PRICE = :price WHERE 
    BOOK_ID = :bookId');
    $stmt->bindParam(':bookName', $bookName);
    $stmt->bindParam(':publisher', $publisher);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':bookId', $bookId);
    $bookName = $_POST['bookName'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $bookId = $_POST['bookId'];
    $stmt->execute();
    header("Location: bookview.php?bookId=$bookId");
    break;
    }
    ?>