<!-- Student's' Information -->
<?php
    include("includes/security.php");
    /* To ensure student id exist*/
    if(!isset($_GET['id'])){
        header('location: home.php');
    }
    $studentID = playSafe($db, $_GET['id']);
    $studentProfile_query = "SELECT Stu_ID, Stu_Fname, Stu_Lname, Stu_Phone, Stu_Address, Generation_ID, Faculty_Name from student_student WHERE Stu_ID=$studentID";
 
    $result = mysqli_query($db,$studentProfile_query);

    while($row = mysqli_fetch_assoc($result)) {
        $Fname = $row['Stu_Fname'];
        $Lname = $row['Stu_Lname'];
        $faculty = $row['Faculty_Name'];
        $address = $row['Stu_Address'];
    }

    /* Student Profile*/
    echo "
        <p><b>เลขประจำตัวนิสิต : </b> $studentID </p>
        <p><b>ชื่อ-นามสกุล : </b> $Fname $Lname </p>
        <p><b>คณะ : </b> $faculty </p>
        <p><b>ที่อยู่ : </b> $address </p>
    ";
?>

<!-- Grade Result -->
<div id="student_grade" style="margin-top:40px;">
    <h2 class="ui dividing header"> ผลการศึกษา </h2>
    <?php 
        include("grade_result.php");
    ?>
</div>
<!-- END Grade Result -->

<!-- Award -->
<h2 class="ui dividing header"> รางวัลที่ได้รับ </h2>
<?php
    $award_query = "
    SELECT distinct contest.Stu_ID,Award_Name ,Award_Rank , Award_year , Award_NO
    FROM student_student , award ,contest
    WHERE contest.Award_ID = award.Award_ID and contest.Stu_ID = $studentID
    order by award.Award_year";

    $result = mysqli_query($db, $award_query);
    
    for($i=2014; $i<2015; $i++){
        echo "
            <div id=\"student_profile\" class=\"ui two column relaxed stackable grid\">
                <div class=\"column\">
                    <div class=\"ui list\">
                        <div class=\"item\">
                            <div class=\"content\">
                                <div class=\"header\">2017</div>";
                                while ($row = mysqli_fetch_assoc($GLOBALS['result'])) {
                                    echo "<div class=\"list\">
                                        <div class=\"item\">
                                            <i class=\"right triangle icon\"></i>
                                            <div class=\"content\">
                                                <p class=\"header\">". $row['Award_Name'] ."</p>
                                                <div class=\"description\">Rank : ".$row['Award_Rank']." </div>
                                            </div>
                                        </div>                                    
                                    </div>";
                                }
                                echo "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
?>
<!-- END Award -->

<!-- Activities -->
<h2 class="ui dividing header"> กิจกรรมที่เคยเข้าร่วม </h2>
<?php
    for($i=2014; $i<2015; $i++){
        echo "
            <div id=\"student_profile\" class=\"ui two column relaxed stackable grid\">
                <div class=\"column\">
                    <div class=\"ui list\">
                        <div class=\"item\">
                            <div class=\"content\">
                            <div class=\"header\">2017</div>
                            <div class=\"list\">
                                <div class=\"item\">
                                    <i class=\"right triangle icon\"></i>
                                    <div class=\"content\">
                                        <p class=\"header\">Sub Header</p>
                                        <div class=\"description\">Sub Description</div>
                                    </div>
                                </div>
                                <div class=\"item\">
                                    <i class=\"right triangle icon\"></i>
                                    <div class=\"content\">
                                        <p class=\"header\">Sub Header</p>
                                        <div class=\"description\">Sub Description</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";

    }
?>

<!-- END Activities -->