<?php
    require_once '../php/dbConnect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_css/admin_request_accept.css">
    <!------------------Jquery Latest Cdn Script--------------------------------->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    
    <!---Checking-->
    
    <!----
START TRANSACTION;

INSERT INTO 
    account 
SELECT 
    *
FROM
    request
WHERE
    `Email`= 'MrX@gmail.com';

DELETE FROM request WHERE `Email`= 'MrX@gmail.com';

COMMIT;




-->
   
    <!------------------Jquery Latest Cdn Script--------------------------------->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!------------------Font Awesome Cdn Script--------------------------------->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!--Datatable script-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".hamburger").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>
    <title>Requests</title>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Driver</a></li>
                    <li><a href="#">Police</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">FAQ</a></li>
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
                <li><a href="#" >
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
                <li><a href="#"class="active">
                    <span class="icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span>
                    <span class="title">Add Driver</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span>
                    <span class="title">Add Police</span>
                </a></li>
                
                <li><a href="#">
                    <span class="icon"><i class="far fa-edit" aria-hidden="true"></i></span>
                    <span class="title">Edit Driver</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-edit" aria-hidden="true"></i></span>
                    <span class="title">Edit Police</span>
                </a></li>
                <li><a href="#"class="active">
                    <span class="icon"><i class="fas fa-user-check" aria-hidden="true"></i></span>
                    <span class="title">Requests</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-envelope-open-text" aria-hidden="true"></i></span>
                    <span class="title">Notice Board</span>
                </a></li>
            </ul>
        </div>
        <!------------------Main Page Container Section--------------------------------->
        <div class="main_container">
            <div class="item request-table-box">
                <h4>User Requests</h4>
                <div class="table-container">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Nid</th>
                                <th>User Type</th>
                                <th>Action</th>
                                    
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!---------PHP CODE TO SHOW DATA INTO TABLE FROM DATABASE------------->
                            
                            <?php
                                $query="SELECT * FROM `request`";
                                $resultQuery=mysqli_query($dbConnect,$query);
                                while($rowValues=mysqli_fetch_assoc($resultQuery)){
                                    ?>
                                        <tr>
                                            <td><?=ucwords( $rowValues['First_Name'] . ' '. $rowValues['Last_Name'])?></td>
                                            <td><?= ucwords($rowValues['Email'])?></td>
                                            <td><?= $rowValues['Gender']?></td>
                                            <td><?= date('d-M-Y',strtotime($rowValues['Birth_Date']))?></td>
                                            <td><?= $rowValues['Nid']?></td>
                                            <td><?= $rowValues['User_Type']?></td>
                                            <td  class="action-link">
                                                <a href="admin_request_quick_view.php?requestQuickView=<?= base64_encode($rowValues['Email'])?>" target="_blank">View</a>
                                                <a href="admin_php/request_accept_php.php?requestAccept=<?= base64_encode($rowValues['Email'])?>" onclick="return confirm('Are You Sure You Want to Accept This Request?')" >Accept</a>
                                                <a href="admin_php/request_delete_php.php?requestDelete=<?= base64_encode($rowValues['Email'])?>" onclick="return confirm('Are You Sure You Want to Reject This Request?')" >Reject</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                }

                            ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Nid</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <script>
         $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>

     

</body>
</html>