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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive">
        <table class="table table table-striped table-hover" id="mytable">
            <thead>
                <tr>
                    <th scope="col">Emp No</th>
                    <th scope="col">Emp Name</th>
                    <th scope="col">Designation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($developer_records as $records):?>
                    <?php 
                        
                        if($records['Status'] == '0'){
                            $records['Status'] = 'Pending';
                        }else{
                            $records['Status'] = 'Completed';
                        }
                        if($records['mgr_status'] == '0'){
                            $records['mgr_status'] = 'Pending';
                        }else{
                            $records['mgr_status'] = 'Completed';
                        }
                        ?>

                <tr class="">
                    <td scope="row"><?php echo $records['Status'] ?></td>
                    <td><?php echo $records['mgr_status'] ?></td>
                    <td>R1C3</td>
                </tr>
                <?php endforeach ?>
                
        </table>
       
    </div>
    
</body>
</html>