<?php 
include "pro-con.php";
$row = getTotalReport($con);

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./view/css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="table-container">
    <?php
if (isset($_POST['export'])) {
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=employee_data.csv");
    $output = fopen("php://output", "w");
    fputcsv($output, array('Employee No', 'Name', 'Designation', 'Manager No'));
    foreach ($row as $rows) {
        fputcsv($output, array($rows["emp_no"], $rows["name"], $rows["designation"], $rows["mgr_no"]));
    }
    fclose($output);
    exit;
}
?>

<table>
    <thead>
        <tr>
            <th>Employee No</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Manager No</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($row as $rows) {
            ?>   
                <tr>
                    <td><?php echo $rows["emp_no"]; ?></td>
                    <td><?php echo $rows["name"]; ?></td>
                    <td><?php echo $rows["designation"]; ?></td>
                    <td><?php echo $rows["mgr_no"]; ?></td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<div class="btn">
    <form action="" method="post">
        <button type="submit" id="btnExport" name='export' value="Export to CSV" class="btn btn-info">Export to CSV</button>
    </form>
</div>
</body>
</html>