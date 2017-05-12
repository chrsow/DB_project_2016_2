<?php
    include("includes/security.php");

    if(isset($_GET["search"])){
        $keyword = playSafe($db, $_GET['search']); 
    }else{
        $keyword = '';
    }
    $search_query = "select Stu_ID,Stu_Fname,Stu_Lname from student_student as students
        where students.Stu_ID like '%". $keyword."%' or Stu_Fname like '%". $keyword."%' or Stu_Lname like '%". $keyword."%'";

    $result = mysqli_query($db,$search_query);

    echo '
    <h2 style="max-width: 500px;" class="ui dividing header"> นิสิตที่อยู่ภายใต้การดูแล </h2>
    <table id="student_search_result" class="ui table selectable">
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Surname</th>
            </tr>
        </thead>
    ';
    while($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr onclick=javascript:window.location=\"home.php?page=student&id=".$row['Stu_ID']."\">
                <td>". $row['Stu_ID'] ."</td>
                <td>". $row['Stu_Fname'] ."</td>
                <td>".$row['Stu_Lname']."</td>
            </tr>
        ";
    }
    echo '</table>';

?>
