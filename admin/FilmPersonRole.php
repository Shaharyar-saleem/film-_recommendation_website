
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <!-- third party css -->
    <link href="../assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="../assets/css/DataStyle.css" rel="stylesheet" type="text/css">
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->

<!-- ========== Left Sidebar Start ========== -->
<div class="wrapper">
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="AdminDashboard.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="../assets/images/logo.png" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="../assets/images/logo_sm.png" alt="" height="16">
                    </span>
        </a>


        <div class="h-100" id="leftside-menu-container" data-simplebar="">

            <!--- Sidemenu -->
            <ul class="side-nav">


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="AdminDashboard.html" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span class="badge bg-success float-end">-</span>
                        <span> Dashboard </span>
                    </a>

                </li>

                <li class="side-nav-title side-nav-item">Apps</li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> FILM </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="Film.php">View Film</a>
                            </li>
                            ]
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Related Person </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="FilmPerson.php">View Person</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                        <i class="uil-briefcase"></i>
                        <span> Film Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="FilmCategory.php">View Film Category</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                        <i class="uil-streering"></i>
                        <span> Person Role </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="FilmPersonRole.html">View Role</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                        <i class="uil-document-layout-center"></i>
                        <span> Film Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="FilmUser.php">View User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-title side-nav-item"><a href="index.html">logout</a></li>
            </ul>
        </div>
        </li>
        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <button class="button-menu-mobile open-left">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">

                            </div>
                            <h4 class="header-title mb-3">Film Related Person Roles</h4>
                            <div>
                                <div class="table-responsive">
                                    <div class="table-wrapper">
                                        <div class="table-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>Manage <b>Film</b> Person Roles</h2>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="#addFilmModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Person Role</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
                                            $query = "select get_all_person_roles()";
                                            $result = pg_query($connection, $query);
                                            while ($row = pg_fetch_object($result)){
                                                $string = trim(html_entity_decode($row->get_all_person_roles), '(")');
                                                $role_result = explode(',', $string);
                                                echo '<tr>';
                                                echo '<td>';
                                                echo  $role_result[0];
                                                echo '</td>';
                                                echo '<td>';
                                                echo  $role_result[1];
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<div class="d-flex">';
                                                echo '<a href="editPersonRole.php/?id='.$role_result[0].'" class="btn btn-success btn-sm mr-2 color-white">Edit</a>';
                                                echo  '<form action="adminDashboard.php" method="POST">
                                                                   <input type="hidden" name="adminAction" value="deletePersonRole">
                                                                   <input type="hidden" name="role_id" value='.$role_result[0].'>
                                                                   <input type="submit" class="btn btn-danger btn-sm" value="Delete" name="submit">
                                                                   </form>';
                                                echo '</td>';
                                                echo '</tr>';
                                                echo '</div>';
//
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- add film category modal starts here -->
                            <div id="addFilmModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="adminDashboard.php" method="POST">
                                            <input type="hidden" name="adminAction" value="addPersonRole">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Film Person Role</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Role Name</label>
                                                    <input type="text" name="role_name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-success" value="submit" name="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- add film category modal ends here -->


                            <!--edit film modal starts here-->
                            <div id="editFilmModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Film</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Serial</label>
                                                    <input type="number" name="film_id" class="form-control" >
                                                    <label>Title</label>
                                                    <input type="text" name="film_title" class="form-control" >

                                                    <label>Release Year</label>
                                                    <input type="number" name="release_year" class="form-control" >

                                                    <label>Country</label>
                                                    <input type="text" name="production_country" class="form-control" >


                                                    <label>Language</label>
                                                    <input type="text" name="film_language" class="form-control" >


                                                    <label>Category</label>
                                                    <input type="number" name="category_id" class="form-control" >

                                                    <label>Parent Id</label>
                                                    <input type="number" name="parent_id" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--edit film ends here-->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->



        </div>
        <!-- container -->

    </div>
    <!-- content -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- /End-bar -->

<!-- bundle -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/js/app.min.js"></script>


</body>
</html>