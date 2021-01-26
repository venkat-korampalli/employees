<nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <li>
                         <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-briefcase"></i>&nbsp Emp Management</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?>
                        <a class="waves-effect waves-dark" href="addempprofile.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">&nbsp Add Employee</span></a>
                        <?php }else{
                    } ?> 
                        
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                         <a class="waves-effect waves-dark" href="viewempprofile.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">&nbsp View Employee</span></a>
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?>
                         <a class="waves-effect waves-dark" href="empprojects.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">&nbsp Employee Projects</span></a>
                        <?php }else{
                    } ?> 
                        <?php if($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4"){ ?>
                        <a class="waves-effect waves-dark" href="venuempprojects.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">&nbsp Employee Projects</span></a>
                        <?php }else{
                    } ?>
                       <?php if($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4"){ ?>
                        <<a class="waves-effect waves-dark" href="sandyempprojects.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">&nbsp Employee Projects</span></a>
                        <?php }else{
                    } ?> 
                        
                        <?php if($_SESSION['role'] == "superadmin"){ ?>
                        <a class="waves-effect waves-dark" href="empsalary.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-currency-inr"></i><span class="hide-menu">&nbsp Employee Salary</span></a>
                        
                         <?php }else{

                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <a class="waves-effect waves-dark lift" href="empleave.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-walk"></i><span class="hide-menu">&nbsp Employee leave &nbsp<span class="badge badge-warning px-2 py-1 count"></span></span></a>
                        
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?>
                        <a class="waves-effect waves-dark" href="empassignproject.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-attachment"></i><span class="hide-menu">&nbsp Assign Project</span></a>
                        
                        <?php }else{
                    } ?> 
                        <?php if($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4"){ ?>
                        <a class="waves-effect waves-dark" href="venuempassignproject.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-attachment"></i><span class="hide-menu">&nbsp Assign Project</span></a>
                        
                        <?php }else{
                    } ?> 
                     <?php if($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4"){ ?>
                        <a class="waves-effect waves-dark" href="sandyempassignproject.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-attachment"></i><span class="hide-menu">&nbsp Assign Project</span></a>
                        
                        <?php }else{
                    } ?>
                        
                        </div>
                        </div>
                        </li> 
                        <?php }else{
                    } ?>
                        
                        <li>
                         <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS Team Data</span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4")){ ?>    
                        <a class="waves-effect waves-dark" href="ops0data1.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">&nbsp OPS0 Data</span></a>    
                         <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?> 
                        <a class="waves-effect waves-dark" href="ops1data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">&nbsp OPS1 Data</span></a>
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4")){ ?> 
                        <a class="waves-effect waves-dark" href="ops2form1data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">&nbsp OPS2 Data</span></a>
                         <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp OPS3 Data</span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="OPS3data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus" tabindex="-1"></i><span class="hide-menu">&nbsp OPS3-HYD Data</span></a>
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="ops3wgldata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus" tabindex="-1"></i><span class="hide-menu">&nbsp OPS3-WGL Data</span></a>
                        <?php }else{
                    } ?>
                        </ul>
                        </li>
                        <?php }else{
                    } ?>
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <a class="waves-effect waves-dark" href="OPS4data.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">&nbsp OPS4 Data</span></a>
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4")){ ?>    
                        <a class="waves-effect waves-dark" href="utube.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">&nbsp OPS5 Data</span></a>    
                        <?php }else{
                    } ?>
                        </ul>
                        </div>
                        </li>
                        <!--
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <li>
                         <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-database-plus"></i>&nbsp Extra Activities</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>    
                        <a class="waves-effect waves-dark" href="ops4bdmdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-database-plus"></i><span class="hide-menu">OPS4 BDM Managers</span></a>    
                         <?php }else{
                    } ?> 
                        </div>
                        </div>
                        </li>
                        <?php }else{
                    } ?> -->
                        <li>
                         <div class="dropdown">
                        <a class=" dropdown-toggle waves-effect waves-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-login-variant"></i>&nbsp Emp Login Timings</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?>
                        <a class="waves-effect waves-dark dropdown-item" href="employee-logintimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-login-variant"></i><span class="hide-menu">&nbsp EMP ops1-2 Logtimings</span></a>
                        <?php }else{
                    } ?> 
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] == "admin-OPS0,2,3-WL&HYD,OPS4") || ($_SESSION['role'] == "admin-OPS2,3-WL&HYD,OPS4") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <a class="waves-effect waves-dark dropdown-item" href="employee-ops4logintimings.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-login-variant"></i><span class="hide-menu">&nbsp EMP ops3-4 Logtimings</span></a>
                        <?php }else{
                    } ?> 
                        </div>
                        </div>
                        </li>
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin")){ ?>
                        <li> <a class="waves-effect waves-dark" href="manageusers.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Manage Users</span></a>
                        </li>
                    <?php }else{

                    } ?>
                        <?php if(($_SESSION['role'] == "superadmin") || ($_SESSION['role'] == "admin") || ($_SESSION['role'] =="admin-OPS3-WL&HYD,OPS4")){ ?>
                        <li> <a class="waves-effect waves-dark" href="filesdata.php?id=<?php echo $id?>" aria-expanded="false"><i class="mdi mdi-download"></i><span class="hide-menu">Quick Files</span></a>
                        </li>
                    <?php }else{

                    } ?> 
                      <!--   <li> <a class="waves-effect waves-dark" href="../../livechat/index.php?id=<?php echo $id?>" target="_blank" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu">chat with team</span></a>
                        </li> -->

                    </ul>
                    <div class="text-center m-t-30">
                        <button class="btn waves-effect waves-light btn-warning hidden-md-down" id="myBtn"> Email Now!</button> </ul>
                    
                    </div>
</nav>