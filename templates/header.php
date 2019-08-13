<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["type"])){
    $user_id = $_SESSION["id"];
    $user_type = $_SESSION["type"];
}

$server_root = "/willie_online_supermarket";

//echo $server_root;
?>

<header>
    <!-- Fixed navbar -->
        <?php 
            if(isset($user_id) && isset($user_type) ){
                if($user_type == 1){
                    echo "
                    <nav class='navbar navbar-expand-md navbar-light fixed-top bg-light'>
                    <a class='navbar-brand' href=../index.php'>
                        <img src='../public/img/LOGO.png' width='50px' height='75px' alt='Homepage'>
                    </a>
            
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse'
                    aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarCollapse'>
                    <ul class='navbar-nav ml-auto'>
                    
                    <li class='nav-item active mr-4'>
                    <div class='dropdown menu-drop' id='../dashboard/customer/purchases'>
                        <div class='dropdown-toggle' data-toggle='dropdown'>
                        purchases
                        </div>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' href='../dashboard/supplier/index.php'>purchases</a>
                        </div>
                    </div>
                    </li>

                    <li class='nav-item active mr-4'>
                    <div class='dropdown menu-drop' id='sales'>
                        <div class='dropdown-toggle' data-toggle='dropdown'>
                        Sales
                        </div>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' href='../dashboard/sales/index.php.php'>Sales</a>
                        </div>
                    </div>
                    </li>


                    <li class='nav-item active mr-4'>
                        <a class='nav-link' href='{$server_root}/orders.php'>Orders</a>
                    </li>
    
                    <li class='nav-item active mr-4'>
                        <a class='nav-link' href='../auth/logout.php'>Logout</a>
                    </li>
    
                    <li class='nav-item mr-auto'>
                    <div id='dropdiv' class='m-auto'>
            
                        <div class='dropdown'>
                                <input class='dropdown-toggle' data-toggle='dropdown' id='servicesbtn' type='image' src='{$server_root}/public/img/services.png' aria-disabled='false' width='25px' height='25px' alt='services' padding='1rem' style='margin:0.5rem'>
            
                                <div class='dropdown-menu dropdown-menu-left' style= ' right: 0; left: auto'>
                                    <h5 class='text-center'> Our Services</h5>
                                    <hr>
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='{$server_root}/index.php'><img src='{$server_root}/public/img/LOGO.png' width='50' height='75'></a>
                                    <a class='dropdown-item service' href='https://housingsmart.co.ke/homepage'><img src='{$server_root}/public/img/housing.jpg' width='50' height='75'></a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Health</a>
                                        <a class='dropdown-item service' href='#'>Food</a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Clothing</a>
                                        <a class='dropdown-item service' href='#'>Security</a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Education</a>
                                        <a class='dropdown-item service' href='#'>Transport</a>
                                    </div>
                                    
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Innovation</a>
                                        <a class='dropdown-item service' href='#'>Health</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    </ul>
    
                </div>";
                }elseif($user_type == 2){
                    echo "
                    <nav class='navbar navbar-expand-md navbar-light fixed-top bg-light'>
                    <a class='navbar-brand' href='{$server_root}/index.php'>
                        <img src='{$server_root}/public/img/LOGO.png' width='50px' height='75px' alt='Homepage'>
                    </a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse'
                    aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarCollapse'>
                    <ul class='navbar-nav ml-auto'>

                        <li class='nav-item active mr-4'>
                        <div class='dropdown menu-drop' id='purchases'>
                            <div class='dropdown-toggle' data-toggle='dropdown'>
                            purchases
                            </div>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='{$server_root}/dashboard/purchases/purchases.php'>View purchases</a>
                                <a class='dropdown-item' href='{$server_root}/dashboard/purchases/addPurchases.php'>Add Purchase</a>
                            </div>
                        </div>
                        </li>
    
                        <li class='nav-item active mr-4'>
                        <div class='dropdown menu-drop' id='sales'>
                            <div class='dropdown-toggle' data-toggle='dropdown'>
                            Sales
                            </div>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='{$server_root}/dashboard/sales/index.php'>View Sales</a>
                                <a class='dropdown-item' href='{$server_root}/dashboard/sales/addSales.php'>Add Sale</a>
                            </div>
                        </div>
                        </li>

                        <li class='nav-item active mr-4'>
                            <a class='nav-link' href='{$server_root}/dashboard/customer/orders.php'>Orders</a>
                        </li>


                        <li class='nav-item active mr-4'>
                            <a class='nav-link' href='{$server_root}/dashboard/inventory'>Inventory</a>
                        </li>

                        <li class='nav-item active mr-4'>
                            <a class='nav-link' href='{$server_root}/auth/logout.php'>Logout</a>
                        </li>
    
                        <li class='nav-item mr-auto'>
                        <div id='dropdiv' class='m-auto'>

                            <div class='dropdown'>
                                    <input class='dropdown-toggle' data-toggle='dropdown' id='servicesbtn' type='image' src='{$server_root}/public/img/services.png' aria-disabled='false' width='25px' height='25px' alt='services' padding='1rem' style='margin:0.5rem'>

                                    <div class='dropdown-menu dropdown-menu-left' style= ' right: 0; left: auto'>
                                        <h5 class='text-center'> Our Services</h5>
                                        <hr>
                                        <div class='d-flex'>
                                        <a class='dropdown-item service' href='{$server_root}/index.php'><img src='{$server_root}/public/img/LOGO.png' width='50' height='75'></a>
                                    <a class='dropdown-item service' href='https://housingsmart.co.ke/homepage'><img src='{$server_root}/public/img/housing.jpg' width='50' height='75'></a>
                                    </div>
                                        <div class='d-flex'>
                                            <a class='dropdown-item service' href='#'>Health</a>
                                            <a class='dropdown-item service' href='#'>Food</a>
                                        </div>

                                        <div class='d-flex'>
                                            <a class='dropdown-item service' href='#'>Clothing</a>
                                            <a class='dropdown-item service' href='#'>Security</a>
                                        </div>

                                        <div class='d-flex'>
                                            <a class='dropdown-item service' href='#'>Education</a>
                                            <a class='dropdown-item service' href='#'>Transport</a>
                                        </div>
                                        
                                        <div class='d-flex'>
                                            <a class='dropdown-item service' href='#'>Innovation</a>
                                            <a class='dropdown-item service' href='#'>Health</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>";                    
                }
            }else{
                echo "
                <nav class='navbar navbar-expand-md navbar-light fixed-top bg-light'>
                <a class='navbar-brand' href='{$server_root}/index.php'>
                    <img src='{$server_root}/public/img/LOGO.png' width='50px' height='75px' alt='Homepage'>
                </a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse'
                aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarCollapse'>
                <ul class='navbar-nav ml-auto'>
                    <li class='nav-item active mr-4'>
                        <a class='nav-link' href='{$server_root}/auth/login.php'>Login</a>
                    </li>

                    <li class='nav-item active mr-4'>
                        <a class='nav-link' href='{$server_root}/auth/register.php'>Register</a>
                    </li>

                    <li class='nav-item mr-auto'>
                    <div id='dropdiv' class='m-auto'>
            
                        <div class='dropdown'>
                                <input class='dropdown-toggle' data-toggle='dropdown' id='servicesbtn' type='image' src='{$server_root}/public/img/services.png' aria-disabled='false' width='25px' height='25px' alt='services' padding='1rem' style='margin:0.5rem'>
            
                                <div class='dropdown-menu dropdown-menu-left' style= ' right: 0; left: auto'>
                                    <h5 class='text-center'> Our Services</h5>
                                    <hr>
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='{$server_root}/index.php'><img src='{$server_root}/public/img/LOGO.png' width='50' height='75'></a>
                                    <a class='dropdown-item service' href='https://housingsmart.co.ke/homepage'><img src='{$server_root}/public/img/housing.jpg' width='50' height='75'></a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Health</a>
                                        <a class='dropdown-item service' href='#'>Food</a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Clothing</a>
                                        <a class='dropdown-item service' href='#'>Security</a>
                                    </div>
            
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Education</a>
                                        <a class='dropdown-item service' href='#'>Transport</a>
                                    </div>
                                    
                                    <div class='d-flex'>
                                        <a class='dropdown-item service' href='#'>Innovation</a>
                                        <a class='dropdown-item service' href='#'>Health</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

            </div>";                     
            }
            ?>
    </nav>
</header>
