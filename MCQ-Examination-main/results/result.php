<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Results</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
            <li class="nav-item"><a class="nav-link" href="../index.php" style="color:aliceblue">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../login.php" style="color:aliceblue">Admin Login</a></li>
            <li class="nav-item"><a class="nav-link" href="../student/squizregister.php" style="color:aliceblue">Enter Quiz</a></li>
            <li class="nav-item"><a class="nav-link active" href="result.php" style="color:aliceblue">Results</a></li>
        </ul>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <img src="../assets/img/my_logo.jpeg" alt="" width="70" height="70">			
            </ul>		  
        </div>
    </div>
    </div>
</nav>
<br>
<?php
    require ('../config.php');
?>
<div class="container jumbotron">
    <h1>Results</h1>
</div>
<?php
    $conn=mysqli_connect($server_name,$username,$password,$database_name,$port);

    $sql_query = "SELECT * from studentresult";
    $records=mysqli_query($conn,$sql_query);

    $flag=0;
    while($data = mysqli_fetch_array($records)){
        $flag=1;
        $qz=$data['quizname'];
        $setting=$data['setting'];
    }
    
    if ($flag==0){
        echo '<div class="container jumbotron"><h2>No Data Available!</h2></div>';
    }
    else{
        echo '<div class="container jumbotron">
        <form action="" method="get">';
        echo '<input type="text" class="form-control" id="roll" name="roll" placeholder="Enter Roll Number">';
        echo '<br><center><input type="submit" name="result" class="btn btn-outline-success" value="Show" style="font-size:20px"></center>';
        echo '</form></div>';
    }
    mysqli_close($conn);

?>

<?php
    // Run result display for any configured setting when user requests
    if (isset($_GET['result'])) {
        echo '<div class="container jumbotron">';
        $roll = isset($_GET['roll']) ? trim($_GET['roll']) : '';

        $conn = mysqli_connect($server_name,$username,$password,$database_name,$port);
        if (!$conn) {
            echo '<div class="alert alert-danger">Database connection error.</div>';
            exit;
        }

        $roll_esc = mysqli_real_escape_string($conn, $roll);
        $qz_esc = mysqli_real_escape_string($conn, isset($qz) ? $qz : '');

        // Determine malicious status (if any)
        $mal_status = null;
        if ($qz_esc !== '') {
            $mal_q = "SELECT status FROM malicious WHERE quizname='$qz_esc' AND roll='$roll_esc' ORDER BY Id DESC LIMIT 1";
            $mal_res = mysqli_query($conn, $mal_q);
            if ($mal_res) {
                $mal_row = mysqli_fetch_assoc($mal_res);
                $mal_status = isset($mal_row['status']) ? $mal_row['status'] : null;
            }
        }

        // If pending malicious activity -> withhold
        if ($mal_status === 'pending') {
            echo '<div class="alert alert-warning"><h4>Result withheld</h4><p>Your result for this quiz is currently withheld due to detected malicious activity. Results will be displayed only after admin review.</p></div>';
            mysqli_close($conn);
            echo '</div>';
            // end processing
        } else {
            // Compute total questions (used for marks display)
            $total = 0;
            if ($qz_esc !== '') {
                $sql_query = "SELECT * from questions where quizname=\"".mysqli_real_escape_string($conn,$qz)."\"";
                $records = mysqli_query($conn,$sql_query);
                if ($records) {
                    $total = mysqli_num_rows($records);
                }
            }

            // Fetch student row for this quiz and roll
            $sql_query = "SELECT * from student where quizname=\"".mysqli_real_escape_string($conn,$qz)."\" and roll=\"".mysqli_real_escape_string($conn,$roll)."\"";
            $records = mysqli_query($conn,$sql_query);
            $found = false;
            if ($records) {
                while($data = mysqli_fetch_array($records)){
                    $found = true;
                    $email = isset($data['email']) ? $data['email'] : '';
                    $name  = isset($data['ename']) ? $data['ename'] : '';
                    $roll_db = isset($data['roll']) ? $data['roll'] : $roll;
                    $mobile = isset($data['mobile']) ? $data['mobile'] : '';
                    $marks  = isset($data['marks']) ? $data['marks'] : 0;
                    $percentage = isset($data['per']) ? $data['per'] : 0;

                    // If malicious record exists and is 'rejected', show cancelled marks
                    if ($mal_status === 'rejected') {
                        // reflect cancelled marks
                        $marks = 0;
                        $percentage = 0;
                        $rejected_note = true;
                    } else {
                        $rejected_note = false;
                    }

                    // Branch based on setting
                    if (isset($setting) && $setting === "Show only Marks!") {
                        // compact view: show only essential info and marks
                        echo "<h5>Name: ".htmlspecialchars($name)."</h5>";
                        echo "<h5>Roll No.: ".htmlspecialchars($roll_db)."</h5>";
                        if ($rejected_note) {
                            echo '<div class="alert alert-danger"><strong>Note:</strong> Marks for this student have been cancelled by the admin due to malicious activity. Displaying 0 marks.</div>';
                        }
                        echo "<h5>Marks: ".htmlspecialchars($marks)."/".intval($total)."</h5>";
                        echo "<h5>Percentage: ".htmlspecialchars($percentage)."%</h5>";
                    } else {
                        // Default / detailed evaluation (Complete Result with Question Evaluation)
                        echo "<h5>Name: ".htmlspecialchars($name)."</h5><br>";
                        if ($rejected_note) {
                            echo '<div class="alert alert-danger"><strong>Note:</strong> Marks for this student have been cancelled by the admin due to malicious activity. Displaying 0 marks.</div>';
                        }
                        echo "<h5>Roll No.: ".htmlspecialchars($roll_db)."</h5><br>";
                        echo "<h5>Email: ".htmlspecialchars($email)."</h5><br>";
                        echo "<h5>Mobile: ".htmlspecialchars($mobile)."</h5><br>";
                        echo "<h5>Marks: ".htmlspecialchars($marks)."/".intval($total)."</h5><br>";
                        echo "<h5>Percentage: ".htmlspecialchars($percentage)."%</h5><br>";

                        // --- QUESTION-BY-QUESTION EVALUATION (restored) ---
                        echo "<hr><br>";

                        $n = 1;
                        echo '<div class="table-responsive">';
                        echo '<table class="table">';
                            echo '<thead class="thead-dark">';
                                echo '<tr>';
                                echo '<th scope="col">#</th>';
                                echo '<th scope="col">Question</th>';
                                echo '<th scope="col">Option 1</th>';
                                echo '<th scope="col">Option 2</th>';
                                echo '<th scope="col">Option 3</th>';
                                echo '<th scope="col">Option 4</th>';
                                echo '<th scope="col">Given Answer</th>';
                                echo '<th scope="col">Correct Answer</th>';
                                echo '<th scope="col">Evaluation</th>';
                                echo '</tr>';
                            echo '</thead>';
                        
                        $sql_query_sub = "SELECT * from submission where quizname=\"".mysqli_real_escape_string($conn,$qz)."\" and rollno=\"".mysqli_real_escape_string($conn,$roll_db)."\"";
                        $records_sub = mysqli_query($conn,$sql_query_sub);
                        if ($records_sub) {
                            while($sdata = mysqli_fetch_array($records_sub)){
                                $q1 = isset($sdata['ques']) ? $sdata['ques'] : '';
                                $opt1 = isset($sdata['opt1']) ? $sdata['opt1'] : '';
                                $opt2 = isset($sdata['opt2']) ? $sdata['opt2'] : '';
                                $opt3 = isset($sdata['opt3']) ? $sdata['opt3'] : '';
                                $opt4 = isset($sdata['opt4']) ? $sdata['opt4'] : '';
                                $gans = isset($sdata['gans']) ? $sdata['gans'] : '';
                                $cans = isset($sdata['cans']) ? $sdata['cans'] : '';
                                $cw = isset($sdata['cw']) ? $sdata['cw'] : '';

                                // sanitize outputs for display
                                $q1_disp = nl2br(htmlspecialchars($q1));
                                $opt1_disp = htmlspecialchars($opt1);
                                $opt2_disp = htmlspecialchars($opt2);
                                $opt3_disp = htmlspecialchars($opt3);
                                $opt4_disp = htmlspecialchars($opt4);
                                $gans_disp = htmlspecialchars($gans);
                                $cans_disp = htmlspecialchars($cans);
                                $eval_disp = htmlspecialchars($cw);

                                echo '<tbody>';
                                echo '<tr>';
                                echo '<th scope="row">'.intval($n).'</th>';
                                echo '<td>'.$q1_disp.'</td>';
                                echo '<td>'.$opt1_disp.'</td>';
                                echo '<td>'.$opt2_disp.'</td>';
                                echo '<td>'.$opt3_disp.'</td>';
                                echo '<td>'.$opt4_disp.'</td>';
                                echo '<td>'.$gans_disp.'</td>';
                                echo '<td>'.$cans_disp.'</td>';
                                echo '<td>'.$eval_disp.'</td>';
                                echo '</tr>';
                                echo '</tbody>';

                                $n += 1;
                            }
                        }
                        echo '</table>';
                        echo '</div>';
                        // --- end question evaluation ---
                    }
                } // end while
            }

            if (!$found) {
                echo '<div class="container jumbotron"><h2>No student found with that Roll Number for this quiz.</h2></div>';
            }

            mysqli_close($conn);
            echo '</div>';
        }
    }
?>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>