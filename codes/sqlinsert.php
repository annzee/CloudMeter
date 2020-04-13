<?php
header('Content-type:text/html;charset=utf-8');
$dbhost = 'localhost'; 
$dbuser = 'root';        
$dbpass = 'cloud-meter-2020';  
$dbname = 'CloudMeter';      
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！';

/* 创建数据库
$sql = "CREATE DATABASE CloudMeter";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn->error;
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE Aliinstances (
    idfamily VARCHAR(50), 
    id VARCHAR(50) PRIMARY KEY,
    vcpu VARCHAR(30),
    memory VARCHAR(30),
    hz VARCHAR(30),
    bandwidth VARCHAR(30),
    sfb VARCHAR(30),
    ipv6 VARCHAR(5),
    price FLOAT,
    cpu VARCHAR(200),
    localm VARCHAR(30),
    basecpu VARCHAR(10)
    )DEFAULT CHARSET = utf8";
     
if (mysqli_query($conn, $sql)) {
    echo "数据表 Aliinstances 创建成功";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

mysqli_query($conn, "set names utf8");
$filename = "aliinstances.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into Aliinstances values ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]',$data[8],'$data[9]','$data[10]','$data[11]')"; 
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn)); 
}
fclose($handle);

// 使用 sql 创建数据表
$sql = "CREATE TABLE Scenario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    scenario VARCHAR(200),
    families VARCHAR(200)
    )DEFAULT CHARSET = utf8";
     
if (mysqli_query($conn, $sql)) {
    echo "数据表 Aliinstances 创建成功";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}*/

mysqli_query($conn, "set names utf8");
$filename = "category2.txt";
$handle = fopen($filename, "r");
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into Scenario (scenario, families) values ('$data[0]','$data[1]')"; 
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn)); 
}

mysqli_close($conn);
?>