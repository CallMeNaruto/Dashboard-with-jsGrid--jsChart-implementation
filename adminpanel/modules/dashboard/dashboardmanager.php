<?php 
    @session_start();
    require_once '../../../config/config.php';
    if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){
    }else{
        error_reporting(0);
        header("Location: ../login/loginmanager.php");
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    



    <title>Assignment Dashboard</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >Assignment</a
        >
        <!--
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        
          <span class="navbar-toggler-icon"></span>
        </button>-->
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
          <!--
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
          </ul>-->
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="../login/Api.php/logout" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Logout</span>
              </a>
            </li>
            <!--
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Layouts</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Dashboard</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Charts</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Tables</span>
              </a>
            </li>
          </ul>-->
        </nav>
      </div>
    </div>
    
    <main>
        <header>
          <div class="topbar">
            <div class="search">
              <input type="text" placeholder="Search...">
              <button>Go</button>
            </div>
          </div>
        </header>
        <br><br>
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- Cards -->
          <div class="row">
              <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="card">
                          <img class="card-img" src="../image/13.jpg" alt="Card image" >
                          <div class="card-body card-img-overlay">
                            <h3 class="card-title font-weight-bold totalenteries text-dark">...</h3>
                            <p class="card-text text-dark">Total Enteries</p>
                          </div> 
                        </div>
                      </div>

                      <div class="col-md-6">
                         <div class="card">
                            <img class="card-img" src="../image/14.jpg" alt="Card image" >
                            <div class="card-body card-img-overlay">
                              <h3 class="card-title font-weight-bold lastyears text-dark">...</h3>
                              <p class="card-text  text-dark">Enteries in Last Three Years</p>
                            </div>
                         </div>
                      </div>
                  </div>
                    <br>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                           <img class="card-img" src="../image/16.jpg" alt="Card image">
                           <div class="card-body card-img-overlay">
                            <h3 class="card-title font-weight-bold total_countries text-dark">...</h3>
                            <p class="card-text text-dark">Total Countries</p>
                           </div>
                          </div>
                      </div>
                   <div class="col-md-6">
                        <div class="card ">
                         <img class="card-img" src="../image/17.jpg" alt="Card image">
                         <div class="card-body card-img-overlay">
                           <h3 class="card-title font-weight-bold asiancountries text-dark">...</h3>
                           <p class="card-text text-dark">Asian Countries</p>
                         </div>
                        </div>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="card">
              <div class="card-header"> Automotive vs Healthcare</div>
               <div class="card-body">
                <canvas class="text-center " id="myPieChart1"></canvas>
               </div>
              </div>
              </div>
              <div class="col-md-3 ">
               <div class="card">
              <div class="card-header">Retail vs Construction</div>
               <div class="card-body">
                <canvas class="text-center " id="myPieChart2"></canvas>
               </div>
              </div>
              </div>
          </div>
      <div class="row">
               <div class="col-md-6 col-sm-1 text-center  mt-3">
                <div class="card">  
                <div class="card-header">Region Data</div>
                  <div class="card-body">
                   <canvas class="text-center mb-0" id="myChart"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-1 text-center mt-3">
              <div class="card">
                <div class="card-header">Sectors Data</div>
                  <div class="card-body">
                    <canvas class="text-center" id="myChart2"></canvas>
                  </div>
              </div>
              </div>
          </div>

          <div class="col-md-12 col-sm-1 text-center mt-3">
            
                 <div class=" card text-center  h-20"style="background:grey">Grid</div>
                  <div class="card" id='jsGrid'>

                  </div>
                  <button id="prevButton">Prev</button>
                  <button id="nextButton">Next</button>
                  
              </div>
          </div>


      </div>
    

    </main>


    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <link type="text/css" rel="stylesheet" href="css/jsgrid.js" />
    <link type="text/css" rel="stylesheet" href="css/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="css/jsgrid-theme.min.css" />
    <script type="text/javascript" src="css/jsgrid.min.js"></script>
    <script src="dashboardmanager.js"></script>
    <script src="myChart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
</body>
</html>     