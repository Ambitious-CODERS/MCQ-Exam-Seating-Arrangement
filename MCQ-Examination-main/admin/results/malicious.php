<?php
    session_start();

    if(isset($_SESSION['uname'])){
        $a=0;
    }
    else{
        ob_start();
        header('Location: '.'../../login.php');
        ob_end_flush();
        die();
    }

    require ('../../config.php');

    // Handle admin actions: approve or cancel marks
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn=mysqli_connect($server_name,$username,$password,$database_name,$port);
        if (isset($_POST['approve']) && isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $sql = "UPDATE malicious SET status='approved' WHERE Id=$id";
            mysqli_query($conn, $sql);
        } elseif (isset($_POST['cancelmarks']) && isset($_POST['id'])) {
            $id = intval($_POST['id']);
            // Get malicious row to find roll and quiz
            $res = mysqli_query($conn, "SELECT roll, quizname FROM malicious WHERE Id=$id LIMIT 1");
            if ($row = mysqli_fetch_assoc($res)) {
                $roll = mysqli_real_escape_string($conn, $row['roll']);
                $quizname = mysqli_real_escape_string($conn, $row['quizname']);
                // Set student's marks and percentage to 0 for that quiz and roll
                $upd = "UPDATE student SET marks=0, per=0 WHERE roll='$roll' AND quizname='$quizname'";
                mysqli_query($conn, $upd);
                // Mark malicious record as rejected
                mysqli_query($conn, "UPDATE malicious SET status='rejected' WHERE Id=$id");
            }
        }
        mysqli_close($conn);
        // reload page to reflect changes
        ob_start();
        header('Location: '.$_SERVER['REQUEST_URI']);
        ob_end_flush();
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Malicious Activity</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <style>
        th, td { padding: 15px; }
    </style>
    <style>
        .bodycolor{
            background: #9053c7;
            background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0);
            background: -o-linear-gradient(-135deg, #c850c0, #4158d0);
            background: -moz-linear-gradient(-135deg, #c850c0, #4158d0);
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="bodycolor">
<nav class="navbar navbar-light navbar-expand-md" style="color: var(--indigo);background: #242226;">
    <div class="container-fluid"><a class="navbar-brand" href="" style="color:aliceblue">MCQ Software</a>
    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="../dashboard.php" style="color:aliceblue">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="allresult.php" style="color:aliceblue">Complete Result</a></li>
            <li class="nav-item"><a class="nav-link" href="studresult.php" style="color:aliceblue">Student Result</a></li>
            <li class="nav-item"><a class="nav-link" href="graph.php" style="color:aliceblue">Graphical View</a></li>
            <li class="nav-item"><a class="nav-link" href="studnots.php" style="color:aliceblue">Not Submitted</a></li>
            <li class="nav-item"><a class="nav-link" href="malicious.php" style="color:aliceblue">Malicious Activity</a></li>
        </ul>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <img src="../../assets/img/my_logo.jpeg" alt="" width="70" height="70">			
            </ul>		  
        </div>
    </div>
    </div>
</nav>
<br>
<?php
    require ('../../config.php');
?>
<div class="container jumbotron">
    <?php
    $conn=mysqli_connect($server_name,$username,$password,$database_name,$port);
    $sql_query = "SELECT quizname from tempresult";
    $records = mysqli_query($conn,$sql_query);
    while($data = mysqli_fetch_array($records)){
        $qz=$data['quizname'];
    }
    echo "<center><h1>Malicious Activities in ".htmlspecialchars($qz)." quiz</h1></center>";
    mysqli_close($conn);
    ?>
</div>

<div class="container jumbotron">
<?php
    $n=1;
    $conn=mysqli_connect($server_name,$username,$password,$database_name,$port);
    $sql_query = "SELECT * from malicious where quizname='".mysqli_real_escape_string($conn,$qz)."'";
    $records = mysqli_query($conn, $sql_query);

    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Roll Number</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Activity</th>';
    echo '<th scope="col">Status</th>';
    echo '<th scope="col">Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($data = mysqli_fetch_array($records)){
        $id = intval($data['Id']);
        $roll=htmlspecialchars($data['roll']);
        $email=htmlspecialchars($data['email']);
        $name=htmlspecialchars($data['ename']);
        $activity=htmlspecialchars($data['emessage']);
        $status = isset($data['status']) ? htmlspecialchars($data['status']) : 'pending';

        echo '<tr>';
        echo '<th scope="row">'.$n.'</th>';
        echo '<td>'.$name.'</td>';
        echo '<td>'.$roll.'</td>';
        echo '<td>'.$email.'</td>';
        echo '<td>'.$activity.'</td>';
        echo '<td>'.$status.'</td>';
        // Actions: Approve / Cancel Marks
        echo '<td>
                <form method="post" style="display:inline">
                    <input type="hidden" name="id" value="'.$id.'">
                    <button type="submit" name="approve" class="btn btn-sm btn-success" onclick="return confirm(\'Approve result display for this student?\')">Approve</button>
                </form>
                <form method="post" style="display:inline;margin-left:6px">
                    <input type="hidden" name="id" value="'.$id.'">
                    <button type="submit" name="cancelmarks" class="btn btn-sm btn-danger" onclick="return confirm(\'This will set student marks to 0. Continue?\')">Cancel Marks</button>
                </form>
              </td>';
        echo '</tr>';
        $n+=1;
    }

    echo '</tbody>';
    echo '</table>';
    mysqli_close($conn);
?>
</div>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>