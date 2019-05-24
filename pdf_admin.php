<?php

 session_start();
 include('connector.php');
      require("fpdf/fpdf.php");


      $username = $_SESSION['username'];


      $query = "SELECT * FROM admin WHERE username='$username'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);

      $fname = $row['fname'];
      $lname = $row['lname'];
      $mobile = $row['mobile'];
      $email = $row['email'];
      $type = $row['type'];

      mysqli_close($conn);

      $pdf1=new FPDF();
      $pdf1->AddPage();
      $pdf1->SetFont("Arial","B",25);
      $pdf1->Cell(0,20,"ABC",0,1,'C');

      $pdf1->SetFont("Arial","B",18);
      $pdf1->Cell(10,10,"Admin Details",0,1);

      $pdf1->Cell(50,10,"",0,1);

      $pdf1->SetFont("Arial","",14);
      $pdf1->Cell(30,10,"user Name",0,0);
      $pdf1->Cell(100,10,":    $username",0,1);
      $pdf1->Cell(30,10,"First Name",0,0);
      $pdf1->Cell(100,10,":    $fname",0,1);
      $pdf1->Cell(30,10,"Last Name",0,0);
      $pdf1->Cell(100,10,":    $lname",0,1);
      $pdf1->Cell(30,10,"Email",0,0);
      $pdf1->Cell(100,10,":    $email",0,1);
      $pdf1->Cell(30,10,"Mobile",0,0);
      $pdf1->Cell(100,10,":    0$mobile",0,1);
      $pdf1->Cell(30,10,"Admin Type",0,0);
      $pdf1->Cell(100,10,":    $type",0,1);

      $pdf1->output();



?>
