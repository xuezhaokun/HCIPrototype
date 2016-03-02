<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];


$ses_sql=mysqli_query($db,"select username from users where username='$user_check'; ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tufts SIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- jQuery Mobile -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
    
    <script type="text/javascript">


    var logout = function() {
        $.ajax({ 
            type: "POST", 
            url: "logout.php",
            success:function(data){
                if(data == "success"){
                    window.location.replace("index.php");
                }
            }
        });
    }

    var login = function() {
        var login_username = $('input#username').val();
        var login_password = $('input#password').val();
        $.ajax({
            type: "POST", 
            url: "checklogin.php",
            data:{ 
                username: login_username, 
                password: login_password

            },
            success: function(data) {
                //alert("data");
                //console.log(data);
                if (data == "success") {
                    //alert("in");
                    window.location.replace("index.php");
                }
                else if (data == 'error_wrong') {
                    $("#error-message").text("invalid username or password");
                    $('input#password').val("");
                    //return false;
                }
            }
        });
        
    }

    var searchClasses = function(){
       $("div#course-selection").hide();
       $("#search-results").show();
    }
    var backToSearch = function(){
        $("#search-results").hide();
        $("div#course-selection").show();
    }
    $(window).load(function() {
        $("#schedule-tab").click();
        $("#search-results").hide();
    });

    </script>
</head>
<body>

<div data-role="page" id="index-page" style="height:100%">
    <div data-role="header" id="index-header" data-position="fixed">
    <?php 
        //echo "<p>sign in as ".$login_session."</p>";
        if(!isset($login_session)) {
            echo '<h1 class="ui-title" role="heading">Tufts SIS</h1><a href="#popupLogin" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a" data-transition="pop">Log in</a>';
        }
        else {
            echo '<h1>Tufts SIS</h1><a href="#" onclick="logout()" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a">Sign out</a>';    
        }

    ?>
        <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                <div style="padding:10px 20px;">
                    <h3>Please sign in</h3>
                    <span id="error-message" style="color:red"></span>
                    <label for="username" class="ui-hidden-accessible">Username:</label>
                    <input type="text" name="username" id="username" value="" placeholder="username" data-theme="a">
                    <label for="password" class="ui-hidden-accessible">Password:</label>
                    <input type="password" name="password" id="password" value="" placeholder="password" data-theme="a">
                    <button type="submit" onclick="login()" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Sign in</button>
                </div>
            
        </div>
        <?php
            if(isset($login_session)){
                echo "<a href='#'>Hi: ".$login_session."</a>";
            }
        ?>
        
    </div>
    <div role="main" class="ui-content" id="list-canvas" style="height:100%">
        <div data-role="tabs" id="tab" style="width:100%">
            <div data-role="navbar">
                <ul>
                    <li><a id="schedule-tab" href="#schedule" data-ajax="false">Schedule</a></li>
                    <li><a id="classes-tab" href="#classes" data-ajax="false">Classes</a></li>
                    <li><a id="bills-tab" href="#bills" data-ajax="false">Bills &amp; Balances</a></li>
                    <li><a id="finances-tab" href="#finances" data-ajax="false">Finances</a></li>
                    <li><a id="profile-tab" href="#bills" data-ajax="false">Profile</a></li>
                </ul>
            </div>
            <div id="schedule" class="ui-body-d ui-content" style="width:100%">
            
            <?php
            if(isset($login_session)){
                echo "<h1>Today Schedule</h1>
                <table data-role='table' id='schedule-table' class='ui-responsive'>
                    <thead>
                        <tr>
                            <th>Wednesday 03/02</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <br />
                                COMP171 <br />
                                1:30 pm - 2:45 pm
                            </td>
                        </tr>
                    </tbody>
                </table>";
            }else{
                echo "<p>Please login first...</p>";
            }?>

            </div>
            <div id="classes">
                <div id="course-selection" data-role="content">
                <!--<form action="" method="post">-->
                    
                    <div data-role="fieldcontain">
                        <label for="school">School: </label>
                        <select id="school" name="school">
                            <option value="NULL">Select One</option>
                            <option>Arts, Sciences, and Engineering</option>
                            <option>Flecture School</option>
                            <option>Friedman School</option>
                            <option>Sackler School</option>
                            <option>School of Dental Medicine</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="term">Term: </label>
                        <select id="term" name="term">
                            <option value="NULL">Select One</option>
                            <option>Spring 2016</option>
                            <option>Fall 2015</option>
                            <option>Summer 2015</option>
                            <option>Spring 2015</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="subject">Subject: </label>
                        <select id="subject" name="subject">
                            <option value="NULL">Select One</option>
                            <option>ARB</option>
                            <option>APP</option>
                            <option>BIO</option>
                            <option>BMS</option>
                            <option>COMP</option>
                            <option>CH</option>
                            <option>DNC</option>
                            <option>ECE</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="coursenum">Course Number: </label>
                        <select id="coursenum" name="coursenum">
                            <option value="NULL">Select One</option>
                            <option>COMP-15</option>
                            <option>COMP-150</option>
                            <option>COMP-160</option>
                            <option>COMP-170</option>
                            <option>COMP-171</option>
                            <option>COMP-150IDS</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="keywords">Key Words:</label>
                        <input type="text" name="keywords" id="keywords">
                    </div>
                    <div data-role="fieldcontain">
                        <label for="instructor">Instructor:</label>
                        <input type="text" name="instructor" id="instructor">
                    </div>
                    <input type="submit" onclick="searchClasses()" data-theme="b" value="Search">
                </div>

                <div id="search-results" data-role="content">
                    <ul data-role='listview' data-split-icon='plus' data-split-theme='a' data-inset='true'>
                        <li><a href='#'>
                        <h2>COMP-15</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>

                        <li><a href='#'>
                        <h2>COMP-150</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>

                        <li><a href='#'>
                        <h2>COMP-160</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>
                        
                        <li><a href='#'>
                        <h2>COMP-170</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>

                        <li><a href='#'>
                        <h2>COMP-171</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>

                        <li><a href='#'>
                        <h2>COMP-150IDS</h2></a>
                            <a href='#addcourse' data-rel='popup' data-position-to='window' data-transition='pop'>Add Class</a>
                        </li>
                    </ul>


                    <div data-role='popup' id='addcourse' data-theme='a' data-overlay-theme='b' class='ui-content' style='max-width:340px; padding-bottom:2em;'>
                        <h3>Add Course?</h3>
                        <p>Do you want to add this course to your enrollment cart?</p>
                        <a href='index.php' data-rel='back' class='ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-btn-inline ui-mini'>Yes</a>
                        <a href='index.php' data-rel='back' class='ui-shadow ui-btn ui-corner-all ui-btn-inline ui-mini'>No</a>
                    </div>
                    <input type="submit" onclick="backToSearch()" data-theme="b" value="Back">
                </div>


            </div>
            
            <div id="bills">
                <?php
                if(isset($login_session)){
                    echo "<ul data-role='listview' data-inset='true'>
                            <li>Actual Amount Balance: $0</li>
                            <li>Pending Credits: $0</li>
                            <li>Student Account Balance: $0</li>
                            <li>Past Due: $0</li>
                        </ul>";
                }else{
                    echo "<p>Please login first...</p>";
                }?>
            </div>
            <div id="finances">
                <?php
                if(isset($login_session)){
                    echo "<p>You didn't apply for financial aid.</p>";
                }else{
                    echo "<p>Please login first...</p>";
                }?>
            </div>
        </div>
    </div>
    <div data-role="footer" id="page-footer">
        <div data-role="navbar" data-iconpos="left">
            <ul>
                <li><a href="http://www.tufts.edu/" target="_blank" data-icon="home">Tufts Privacy Policy</a></li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>