<?php
include "./inc/pro-con.php";

if (isset($_POST['submit'])) {

    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
            mysqli_begin_transaction($con);
            try {
                $query = "INSERT INTO `emp_master`(`emp_no`, `name`, `mgr_no`, `desg`, `password`
                    ) VALUES ('" . $getData[0] . "', '" . $getData[1] . "', '" . $getData[2] . "', '" . $getData[3] . "', '" . $getData[4] . "') ";
                $result = mysqli_query($con, $query);

                $queryEmpRating = "INSERT INTO `mgr_rating`(`emp_no`) VALUES ('" . $getData[0] . "')";

                $resultEMPRatin = mysqli_query($con, $queryEmpRating);

                $queryMrgRating = "INSERT INTO `self_rating`(`emp_no`) VALUES ('" . $getData[0] . "')";

                $resulMrgRating = mysqli_query($con, $queryMrgRating);
            } catch (mysqli_sql_exception $exception) {
                mysqli_rollback($con);
                throw $exception;
            }
        }
        // Close opened CSV file
        fclose($csvFile);
        header("Location: hrlogin.php");
    } else {
        echo "Please select valid file";
    }
}
