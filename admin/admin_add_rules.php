<?php
    require_once '../php/dbConnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_css/admin_add_rules.css">
    <!------------------Jquery Latest Cdn Script--------------------------------->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!------------------Font Awesome Cdn Script--------------------------------->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!--Datatable script-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function(){
            $(".hamburger").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>
    <title>DashBoard</title>
</head>
<body>
    <div class="wrapper">
        <!------------------NavigationBar--------------------------------->
        <div class="top_navbar">
            <div class="hamburger">
                <div class="side-menu-div"></div>
                <div class="side-menu-div"></div>
                <div class="side-menu-div"></div>
                
            </div>
            <div class="top_menu">
                <div class="logo">Driver-Police Control System</div>
                <ul>
                    
                </ul>
                <div class="buttons">
                    <a href="#">First_Name</a>
                    <button type="submit">Signout</button>  
                </div> 
            </div>
        </div>
        <!------------------Side Admin Menu Bar--------------------------------->
        <div class="sidebar">
            <ul>
                <li><a href="#" class="active">
                    <span class="icon"><i class="fas fa-house-user" aria-hidden="true"></i></span>
                    <span class="title">Home</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-user-circle" aria-hidden="true"></i></span>
                    <span class="title">Profile</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-user-edit" aria-hidden="true"></i></span>
                    <span class="title">Edit Profile</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-clipboard-list" aria-hidden="true"></i></span>
                    <span class="title">Case Log</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-envelope-open-text" aria-hidden="true"></i></span>
                    <span class="title">Notice Board</span>
                </a></li>
            </ul>
        </div>
        <!------------------Main Page Container Section--------------------------------->
        <div class="main_container">
         

             <!------------------Driver Tabele------------------------>
    <div class="item driver-table-box">
                <h4>List of Traffic Rule</h4>
                <div class="table-container">
                    <table id="trafficRuleTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Rule Id</th>
                                <th>Rule Name</th>
                                <th>Description</th>
                                <th>Deductable Point</th>
                                <th>Added By</th>
                                <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <!---------PHP CODE TO SHOW DATA INTO TABLE FROM DATABASE------------->
                            
                            <?php
                                //Joining two table Based on Email to retrieve data
                                $query="SELECT * FROM `trafficrule`";
                                $resultQuery=mysqli_query($dbConnect,$query);
                                while($rowValues=mysqli_fetch_assoc($resultQuery)){
                                    ?>
                                        <tr>
                                            <td><?=ucwords( $rowValues['Rule_Id'])?></td>
                                            <td><?= ucwords($rowValues['Rule_Name'])?></td>
                                            <td><?= ucwords($rowValues['Rule_Description'])?></td>
                                            <td><?= $rowValues['Deductable_Point']?></td>
                                            <td><?= ucwords($rowValues['Admin_Email_Fk'])?></td>
                                            <td  class="action-link">
                                                <a href="driver_driver_quick_view.php?driverQuickView=<?= base64_encode($rowValues['Email'])?>" target="_blank">View</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                }

                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rule Id</th>
                                <th>Rule Name</th>
                                <th>Description</th>
                                <th>Deductable Point</th>
                                <th>Added By</th>
                                <th>Action</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>

            
        </div> <!--main page container ends--->
    </div> <!---page wrapper ends--->
   
    <script>
         $(document).ready(function() {
        $('#trafficRuleTable').DataTable();
    } );
    </script>
    
</body>
</html>