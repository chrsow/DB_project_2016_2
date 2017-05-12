<?php
    $grade_query = "
    select distinct enroll.Course_ID , course.Course_Name, Grade
        from student_student ,course ,enroll
        where course.Course_ID = enroll.Course_ID and enroll.Stu_ID = $studentID";

    $result = mysqli_query($db, $grade_query);
    
    function renderSubject(){
         /* Render Each Subject*/
        for($i=0;$i<2;$i++){
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td class=\"left aligned\">".$row['Course_ID']."</td>
                    <td> ".$row['Course_Name']."</td>
                    <td>3</td>
                    <td>".$row['Grade']."</td>
                </tr>";      
                
            }   
        }
    }

    function renderSemesterGrade(){
        echo "
        <div class=\"column\">
            <table class=\"ui right aligned table\">
            <thead>
                <th class=\"left aligned\">Course No.</th>
                <th>Course Title</th>   
                <th>Credit</th>
                <th>Grade</th>
            </thead>
            <tbody>";
            while ($row = mysqli_fetch_assoc($GLOBALS['result'])) {
                echo "
                <tr>
                    <td class=\"left aligned\">".$row['Course_ID']."</td>
                    <td> ".$row['Course_Name']."</td>
                    <td>3</td>
                    <td>".$row['Grade']."</td>
                </tr>";      
                
            }  
            echo        "
            </tbody>
            </table>
        </div>";
    }

    for($i=2014; $i<2015; $i++){
        //echo '<div class="ui two column relaxed grid">';
        echo '<div class="ui table" style="max-width:700px;">';
        //echo '<h3> Year : '. $i .'</h3>';
        //echo '<h3> First Semester</h3>';
        //renderSemesterGrade(); 
        //echo '<h3> 2nd Semester</h3>';
        renderSemesterGrade(); 
        //renderSubject(); 
        echo '</div>';
    }

?>
    