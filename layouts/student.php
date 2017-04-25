<!-- Student's' Information -->
<h2> Wasin Saengow</h2>
<!--
<p>เลขที่บัตรประชาชน :</p>
<p>เพศ</p>
<p>วันเกิด</p>
<p>ชื่ิผู้ปกครอง 1</p>
<p>ชื่ิผู้ปกครอง 2</p>
-->

<!-- Grade Result -->
<div id="student_grade">
    <h3 class="ui dividing header"> Grade Result </h3>
    <?php 
        for($i=2014; $i<2018; $i++){
            echo '<div class="ui two column relaxed grid">';
            //echo '<h3> Year : '. $i .'</h3>';
            //echo '<h3> First Semester</h3>';
            include("grade_result.php"); 
            //echo '<h3> 2nd Semester</h3>';
            include("grade_result.php"); 
            echo '</div>';
        }
    ?>
</div>
<!-- END Grade Result -->

<!-- Award -->
<h3 class="ui dividing header"> Awards </h3>
<?php
    for($i=2014; $i<2018; $i++){
        echo '
            <div id="student_profile" class="ui two column relaxed stackable grid">
                <div class="column">
                    <div class="ui list">
                        <div class="item">

                            <div class="content">
                            <div class="header">2017</div>
                    
                            <div class="list">
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content">
                                        <p class="header">Sub Header</p>
                                        <div class="description">Sub Description</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content">
                                    <p class="header">Sub Header</p>
                                    <div class="description">Sub Description</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

    }
?>
<!-- END Award -->

<!-- Activities -->
<h3 class="ui dividing header"> Activities </h3>



<!-- END Activities -->