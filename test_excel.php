<?php
include("inc/db.php");
$sql = "SELECT s.emp_no, s.name,s.desg AS designation,s.mgr_no, sr.kra1,sr.kra2,sr.kra3,sr.kra4,sr.kra5,
sr.a1 AS achvmnt1,sr.a2 AS achvmnt2,sr.a3 AS achvmnt3,sr.a4 AS achvmnt4,sr.a5 AS achvmnt5,
sr.self_rating1,sr.self_rating2,sr.self_rating3,sr.self_rating4,sr.self_rating5,
m.mgr_evltn1,m.mgr_evltn2,m.mgr_evltn3,m.mgr_evltn4,m.mgr_evltn5,
m.rating1,m.rating2,m.rating3,m.rating4,m.rating5,
sr.v1,sr.v2,sr.v3,sr.v4,sr.v5,
sr.a6 AS self_assesment1,sr.a7 AS self_assesment2,sr.a8 AS self_assesment3,sr.a9 AS self_assesment4,sr.a10 AS self_assesment5,
sr.self_rating6,sr.self_rating7,sr.self_rating8,sr.self_rating9,sr.self_rating10,
m.mgr_evltn6,m.mgr_evltn7,m.mgr_evltn8,m.mgr_evltn9,m.mgr_evltn10,
m.rating6,m.rating7,m.rating8,m.rating9,m.rating10,
sr.Status,
m.mgr_status
from emp_master s INNER JOIN self_rating sr on s.emp_no=sr.emp_no INNER JOIN mgr_rating m on sr.emp_no=m.emp_no";
$resultset = $conn->query($sql);
$developer_records = array();

while ($rows = mysqli_fetch_assoc($resultset)) {
  $developer_records[] = $rows;
}
if (isset($_POST["export_data"])) {
  $filename = "pms_export_" . date('Ymd') . ".xls";
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  $show_coloumn = false;
  if (!empty($developer_records)) {
    foreach ($developer_records as $record) {
      if (!$show_coloumn) {
        // display field/column names in first row
        echo implode("\t", array_keys($record)) . "\n";
        $show_coloumn = true;
      }
      echo implode("\t", array_values($record)) . "\n";
    }
  }
  exit;
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee Rating Form</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <div class="container">
    <h2>Export Data</h2>
    <div class="well-sm col-sm-2">
      <div class="btn-group pull-right">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
          <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
        </form>
      </div>
    </div>


    </style>


    </script>
    <!-- <table id="export" class="table table-striped table-bordered">
      <tr>
        <th>Employee no</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Manager no</th>
        <th>KRA1</th>
        <th>KRA2</th>
        <th>KRA3</th>
        <th>KRA4</th>
        <th>KRA5</th>
        <th>Achievement1</th>
        <th>Achievement2</th>
        <th>Achievement3</th>
        <th>Achievement4</th>
        <th>Achievement5</th>
        <th>Self Rating1</th>
        <th>Self Rating2</th>
        <th>Self Rating3</th>
        <th>Self Rating4</th>
        <th>Self Rating5</th>
        <th>Manager Evaluation1</th>
        <th>Manager Evaluation2</th>
        <th>Manager Evaluation3</th>
        <th>Manager Evaluation4</th>
        <th>Manager Evaluation5</th>
        <th>Final Rating1</th>
        <th>Final Rating2</th>
        <th>Final Rating3</th>
        <th>Final Rating4</th>
        <th>Final Rating5</th>
        <th>value1</th>
        <th>value2</th>
        <th>value3</th>
        <th>value4</th>
        <th>value5</th>
        <th>Self Assesment1</th>
        <th>Self Assesment2</th>
        <th>Self Assesment3</th>
        <th>Self Assesment4</th>
        <th>Self Assesment5</th>
        <th>Self Rating6</th>
        <th>Self Rating7</th>
        <th>Self Rating8</th>
        <th>Self Rating9</th>
        <th>Self Rating10</th>
        <th>Manager Evaluation6</th>
        <th>Manager Evaluation7</th>
        <th>Manager Evaluation8</th>
        <th>Manager Evaluation9</th>
        <th>Manager Evaluation10</th>
        <th>Final Rating6</th>
        <th>Final Rating7</th>
        <th>Final Rating8</th>
        <th>Final Rating9</th>
        <th>Final Rating10</th>
        <th>Status</th>
        <th>Manager Status</th>

      </tr>
      <tbody>
        <?php foreach ($developer_records as $developer) { ?>
          <tr>
            <td><?php echo $developer['emp_no']; ?></td>
            <td><?php echo $developer['name']; ?></td>
            <td><?php echo $developer['designation']; ?></td>

            <td><?php echo $developer['mgr_no']; ?></td>
            <td><?php echo $developer['kra1']; ?></td>
            <td><?php echo $developer['kra2']; ?></td>
            <td><?php echo $developer['kra3']; ?></td>
            <td><?php echo $developer['kra4']; ?></td>
            <td><?php echo $developer['kra5']; ?></td>
            <td><?php echo $developer['achvmnt1']; ?></td>
            <td><?php echo $developer['achvmnt2']; ?></td>
            <td><?php echo $developer['achvmnt3']; ?></td>
            <td><?php echo $developer['achvmnt4']; ?></td>
            <td><?php echo $developer['achvmnt5']; ?></td>
            <td><?php echo $developer['self_rating1']; ?></td>
            <td><?php echo $developer['self_rating2']; ?></td>
            <td><?php echo $developer['self_rating3']; ?></td>
            <td><?php echo $developer['self_rating4']; ?></td>
            <td><?php echo $developer['self_rating5']; ?></td>
            <td><?php echo $developer['mgr_evltn1']; ?></td>
            <td><?php echo $developer['mgr_evltn2']; ?></td>
            <td><?php echo $developer['mgr_evltn3']; ?></td>
            <td><?php echo $developer['mgr_evltn4']; ?></td>
            <td><?php echo $developer['mgr_evltn5']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table> -->
    <script>

    </script>
  </div>

</html>