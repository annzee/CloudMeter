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

header('Content-type:text/html;charset=utf-8');
$dbhost = 'localhost'; 
$dbuser = 'root';        
$dbpass = 'jd123456';  
$dbname = 'cloudinfo';      
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！';

create table aliprices (
    region varchar(30),
    instanceId varchar(50),
    vCpu int,
    memory int,
    hourlyPrice float,
    weeklyPrice float,
    standard float,
    monthlyPrice float,
    yearlyPrice float,
    2yearPrice float,
    3yearPrice float,
    4yearPrice float,
    5yearPrice float
)

mysqli_query($conn, "set names utf8");
$filename = "instancePrice.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into aliprices values ('$data[0]','$data[1]',$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12])";
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn));
}
fclose($handle);

$sql = "SELECT instanceId, region, monthlyPrice FROM aliprices where instanceId like 'ecs.g6.large'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["instanceId"]. " - region: " . $row["region"]. " - price:  " . $row["monthlyPrice"]. "<br>";
    }
} else {
    echo "0 结果";
}
$conn->close();

create table tenprices (
    instance varchar(50),
    region varchar(20),
    CPU int,
    memory int,
    hourT1 float,
    hourT2 float,
    hourT3 float,
    standard float,
    monthly float,
    yearly float,
    3year float,
    5year float
)

mysqli_query($conn, "set names utf8");
$filename = "tencent_cloud_price.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into tenprices values ('$data[0]','$data[1]',$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11])";
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn));
}
fclose($handle);

create table huaprices (
    instance varchar(50),
    region varchar(20),
    CPU int,
    memory int,
    hourly float,
    monthly float,
    yearly float,
    2year float,
    3year float,
    4year float,
    5year float
)

mysqli_query($conn, "set names utf8");
$filename = "huaweiprices.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into huaprices values ('$data[0]','$data[1]',$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10])";
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn));
}
fclose($handle);

create table uclprices (
    instance varchar(20),
    region varchar(20),
    CPU int,
    memory int,
    hourly float,
    monthly float,
    yearly float,
    2year float,
    3year float
)

mysqli_query($conn, "set names utf8");
$filename = "ucloudprices.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into uclprices values ('$data[0]','$data[1]',$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8])";
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn));
}
fclose($handle);

create table scores (
    vendor varchar(20),
    instance varchar(30),
    CPU int,
    memory int,
    totalcpu float,
    totalio float,
    totalmem float,
    totalnet float,
    total float,
    price float
)

mysqli_query($conn, "set names utf8");
$filename = "datas/bench_results.csv";
$handle = fopen($filename, "r");
$data = fgetcsv($handle, 1000);
while (!feof($handle)) {
    $data = fgetcsv($handle, 1000);
    $q="insert into scores values ('$data[0]','$data[1]',$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9])";
    echo $q;
    mysqli_query($conn, $q) or die (mysqli_error($conn));
}
fclose($handle);