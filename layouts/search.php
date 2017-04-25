<?php
    //include("includes/security.php");
    

    if(isset($_GET["search"])){
        
        //Vulnerable to SQLi
        $query = $_GET['search']; 

        //$raw_results = mysql_query("SELECT * FROM articles
        //        WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
        if($query != "no"){//(mysql_num_rows($raw_results) > 0){
        //while($results = mysql_fetch_array($raw_results)){
            if(true){
                echo '
                <table id="student_search_result" class="ui table selectable">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr onclick=javascript:window.location="home.php?page=student&id=5730539021">
                            <td>5730539021</td>
                            <td>Wasin Chrsow</td>
                            <td>Normal</td>
                        </tr>
                        <tr onclick=javascript:window.location="home.php?page=student&id=5555555555">
                            <td>5730539021</td>
                            <td>Wasin Chrsow</td>
                            <td>Warning</td>
                        </tr>
                    </tbody>
                </table>
                ';
            }
        }else{
            echo '<p style="size:100px;">Not Found<p/>';
        };
    }else{
        // Should be Render all of student in advise
        echo '
        <table id="student_search_result" class="ui table selectable">
             <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
        ';
        for($i=0;$i<10;$i++){
            echo '
                <tr onclick=javascript:window.location="home.php?page=student&id=5730539021">
                    <td>5730539021</td>
                    <td>Wasin Chrsow</td>
                    <td>Normal</td>
                </tr>
            ';
        }
        echo '</table>';
    };
?>
