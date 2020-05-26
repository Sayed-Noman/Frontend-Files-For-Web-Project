<?php
    require_once '../php/dbConnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="police_css/police_dashboard_home_css.css">
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
            <div class="item widget-menu">
                <div>
            <div class="row">
  <div class="column">
    <div class="card">
      <p><i class="fa fa-user"></i></p>
      <h3>11+</h3>
      <p>Total User</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <p><i class="fa fa-check"></i></p>
      <h3>55+</h3>
      <p>Driver</p>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <p><i class="fa fa-check"></i></p>
      <h3>55+</h3>
      <p>Police</p>
    </div>
  </div>

  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-coffee"></i></p>
      <h3>100+</h3>
      <p>Admin</p>
    </div>
  </div>
</div> 
    </div>
</div> <!--item widget menu ends-->


<!------------- Driver Table Contents------------->
<div class="item account-table-box">
                <h4>All Accounts of Driver</h4>
                <div class="table-container">
                    <table id="driverTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Driver Id</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>License Type</th>
                                <th>Point</th>
                                <th>Action</th>
                                    
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!---------PHP CODE TO SHOW DATA INTO TABLE FROM DATABASE------------->
                            
                            <?php
                                $query="SELECT * FROM `account` INNER JOIN `driver` ON `Email`=`Driver_Email_Fk`";
                                $resultQuery=mysqli_query($dbConnect,$query);
                                while($rowValues=mysqli_fetch_assoc($resultQuery)){
                                    ?>
                                        <tr>
                                            <td><?=ucwords( $rowValues['First_Name'] . ' '. $rowValues['Last_Name'])?></td>
                                            <td><?= $rowValues['Driver_Id']?></td>
                                            <td><?= ucwords($rowValues['Email'])?></td>
                                            <td><?= $rowValues['Gender']?></td>
                                            <td><?= ucwords($rowValues['License_Type'])?></td>
                                            <td><?=$rowValues['Point']?>/15</td>
                                            <td  class="action-link">
                                                <a href="police_driver_quick_view.php?driverQuickView=<?= base64_encode($rowValues['Email'])?>" target="_blank">View</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                }

                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Driver Id</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>License Type</th>
                                <th>Point</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>
            <!--------Police Table--------------------->

        <div class="item police-table-box">
                <h4>All Accounts of Police</h4>
                <div class="table-container">
                    <table id="policeTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Police Id</th>
                                <th>Badge Id</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Region of Work</th>
                                <th>Action</th>
                                    
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!---------PHP CODE TO SHOW DATA INTO TABLE FROM DATABASE------------->
                            
                            <?php
                                $query="SELECT * FROM `account` INNER JOIN `police` ON `Email`=`Police_Email_Fk`";
                                $resultQuery=mysqli_query($dbConnect,$query);
                                while($rowValues=mysqli_fetch_assoc($resultQuery)){
                                    ?>
                                        <tr>
                                            <td><?=ucwords( $rowValues['First_Name'] . ' '. $rowValues['Last_Name'])?></td>
                                            <td><?= ucwords($rowValues['Police_Id'])?></td>
                                            <td><?= ucwords($rowValues['Badge_Id'])?></td>
                                            <td><?= ucwords($rowValues['Email'])?></td>
                                            <td><?= ucwords($rowValues['Police_Department'])?></td>
                                            <td><?= ucwords($rowValues['Region_Of_Work'])?></td>
                                            <td  class="action-link">
                                                <a href="police_police_quick_view.php?policeQuickView=<?= base64_encode($rowValues['Email'])?>" target="_blank">View</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                }

                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Police Id</th>
                                <th>Badge Id</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Region of Work</th>
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
        $('#driverTable').DataTable();
    } );
    </script>
    <script>
         $(document).ready(function() {
        $('#policeTable').DataTable();
    } );
    </script>
</body>
</html>