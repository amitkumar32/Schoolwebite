<?php
if (isset($_SERVER['PHP_SELF']) && $_SERVER['PHP_SELF'] != '') {
    $path = explode('/', $_SERVER['PHP_SELF'], 5);
    $count = count($path);
    $file_name = $path[$count - 1];
}
?>
<div class="sidebar" id="sidebar">
            <div class="slimScrollDiv" style="overflow: hidden; width: 100%; height: 544px;">
               <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 544px;">
                  <div id="sidebar-menu" class="sidebar-menu">
                     <ul>
                        <li <?php
                            if (isset($file_name) && ($file_name == 'index.php' )) {
                                echo "class='active'";
                            }
                            ?> >
							<a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li <?php
                            if (isset($file_name) && ($file_name == 'subject-list.php' )) {
                                echo "class='active'";
                            }
                            ?> ><a href="subject-list.php"><i class="fa fa-file"></i> <span>Subjects</span></a>
                        </li>
                        
                        
						<li <?php
                            if (isset($file_name) && ($file_name == 'student-list.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="student-list.php"><i class="fa fa-users"></i> <span>List of Student</span></a>
                        </li> 
						<li <?php
                            if (isset($file_name) && ($file_name == 'contact.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="contact.php"><i class="fa fa-users"></i> <span>List of Contact</span></a>
                        </li> 						
						<li <?php
                            if (isset($file_name) && ($file_name == 'course.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="course.php"><i class="fa fa-users"></i> <span>List of Course</span></a>
                        </li> 								
						<li <?php
                            if (isset($file_name) && ($file_name == 'department.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="department.php"><i class="fa fa-users"></i> <span>List of Department</span></a>
                        </li>          
						<li <?php
                            if (isset($file_name) && ($file_name == 'events.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="events.php"><i class="fa fa-users"></i> <span>List of Event</span></a>
                        </li> 
						<li <?php
                            if (isset($file_name) && ($file_name == 'register.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="teacher.php"><i class="fa fa-users"></i> <span>List of Teachers</span></a>
                        </li> 
						<li <?php
                            if (isset($file_name) && ($file_name == 'blog-post.php' )) {
                                echo "class='active'";
                            }
                            ?> >
                           <a href="blog-post.php"><i class="fa fa-users"></i> <span>List of Blog</span></a>
                        </li>
						







		 
                     </ul>
                  </div>
               </div>
            </div>
         </div>