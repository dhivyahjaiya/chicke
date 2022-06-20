<?php

include "../include/header.php";
include "../include/extracss.php";
include "../include/sidebar.php";

?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <a href="config.php?adduser=true"><button class="btn btn-primary mb-2">Add User</button></a>
                    </nav>
    
                </div>

                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>User ID</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Usertype</th>
                                        <th class="no-content">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $count = "0";
                                $query = "SELECT * FROM user";
                                $query_run = mysqli_query($db,$query);

                                while($row = mysqli_fetch_array($query_run))
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $count++;
                                                echo $count;

                                            ?>
                                        </td>
                                        <td><?php echo $row["userid"];?></td>
                                        <td><?php echo $row["password"];?></td>
                                        <td><?php echo $row["name"];?></td>
                                        <td><?php echo $row["phone"];?></td>
                                        <td><?php echo $row["email"];?></td>
                                        <td>
                                            <?php
                                            $check = $row["usertype"];
                                            if ($check == 0) {
                                                echo "Admin"; 
                                            } else {
                                                echo "Staff";
                                            }       
                                        ?>
                                        </td>
                                        <td>
                                            <a href="../private/delete.php?userid=<?php echo $row["userid"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
                                            <a href="config.php?userid=<?php echo $row["userid"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                        <th>No.</th>
                                        <th>User ID</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Usertype</th>
                                        <th class="no-content">Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

                </div>
   
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
 <?php 

 include "../include/footer.php";

 ?>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50, 100, 500, 1000, 5000, 10000, 50000, 100000],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>