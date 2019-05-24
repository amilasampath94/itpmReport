<?php

        include("profile_view_server.php");

        require("fpdf/fpdf.php");

        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial","B",25);
        $pdf->Cell(0,20,"ABC",0,1,'C');

        $pdf->SetFont("Arial","B",18);
        $pdf->Cell(10,10,"Customer Details",0,1);

        $pdf->Cell(50,10,"",0,1);

        $pdf->SetFont("Arial","",14);
        $pdf->Cell(30,10,"First Name",0,0);
        $pdf->Cell(100,10,":    $fname",0,1);
        $pdf->Cell(30,10,"Last Name",0,0);
        $pdf->Cell(100,10,":    $lname",0,1);
        $pdf->Cell(30,10,"Email",0,0);
        $pdf->Cell(100,10,":    $email",0,1);
        $pdf->Cell(30,10,"Mobile",0,0);
        $pdf->Cell(100,10,":    0$mobile",0,1);

        $pdf->output();



?>
