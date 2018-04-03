<?php
$servername = "localhost";
      $username = "root";
      $password = "mysql";
      $database = "yelp_db";
      $conn = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "";
      switch($_GET['action']){
        case 'monthly_review_count': $sql = "SELECT month(date) as n, count(*)/1128518 as t from review WHERE year(date)=2017 group by n";
        break;
        
        case 'annual_review_count': $sql = "SELECT year(date) as n, count(*)/5261669 as t FROM review group by n;";
        break; 
        
        case '2017_business_monthly_review'; $sql = "CALL `2017_business_monthly_review`('IKEA');";
        break;

        default:  $sql = "SELECT month(date) as n, COUNT(*)/1128518 as t FROM review WHERE year(date)=2017 GROUP BY n;";
      }

      $result = $conn->query($sql);
      $output = "letter\tfrequency\n";
      if ($result){
        while($row = $result->fetch_assoc())
        {
            $output .= $row['n']."\t".$row['t']."\n"; 
        }
      }else {
        echo $conn->error;
      }
      // $result->free();
      echo $output;
      // Close connection
      mysqli_close($conn);
?>
