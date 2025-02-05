<!DOCTYPE html>
<html>
<head>
    <title>Sing-Off voting platform</title>
    <link rel= "stylesheet" href='../header/header.css'>
    <link rel="stylesheet" href="../header/footer.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <header>
        <table style="width: 100%;">
         <div class="div2" >
            <tr style="height: 150px;">
            <td id="logo_img"><img src="../header/My project-1 (1).png" id = "logo_img"></td>
            <td id="header_text">
            <h1 style="font-size: 50px;">SING-OFF!!</h1>
            <h2 style="font-size: xx-large;"> Online voting platform</h2>
            </td>
            </tr>
        </div>
        </table>
    </header>
    <body>            
        <div id="navbar" style="font-family: Arial, Helvetica, sans-serif;">
            <table width="100%">
                <tr>
                <td class="td1"><a href="../homepage/homepage.html"> <b>HOME</b></a></td>
                <td class="td1"> <a href="../contactus,faq,vote/finalcontactus.html"><b>CONTACT US</b></a></td>
                <td class="td1">
                    <div class="dropdown">
                        <button class="dropbtn"><b>ACCOUNTS</b></button>
                    <div class="dropdown-content">
                    <ul>
                       <li><a href="../login,contestant profile/contestant profile .html">Contestant</a></li>
                       <li><a href="../user account,rules & regulations/user account.php">My Profile</a></li>
                       <li><a href="../Admin acc/admin.php">Admin</a></li>
                    </ul>
                    </div>
                    </div> 
                </td>
                <td class="td1">
                    <div class="dropdown">
                        <button class="dropbtn"><b>MORE</b></button>
                        <div class="dropdown-content">
                            <ul>
                                <li><a href="../contactus,faq,vote/finalvote.html">Vote now!</a></li>
                                <li><a href="../Results page/results.php">View Results</a></li>
                                <li><a href="../contactus,faq,vote/finalfaq.html">FAQ's</a></li>
                                <li><a href="../user account,rules & regulations/rules.html">Rules and Regulations</a></li>
                                <li><a href="../registration,time schedule/Time shedule.html">What's next?</a></li>
                            </ul>
                        </div>
                    </div> 
                </td>
                <td style="empty-cells:hide; width: 600px;"></td>
                <td><i class='fas fa-user-cog' style="color: white; font-size: 50px;"><h1 style="font-size: large;">Admin</h1></i></td>
                </tr>
            </table>
        </div>

        <script>
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            function myFunction(){
                if(window.pageYOffset >= sticky){
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        </script>
        <script src='https://cdn.jsdelivr.net/countupjs/1.8.5/countUp.min.js'></script>
        <script src='https://cdn.rawgit.com/toddmotto/foreach/e82a4fed997593820ae65a09a35068b696bf10a0/dist/foreach.min.js'></script>
        <script src='https://cdn.rawgit.com/imakewebthings/waypoints/d21e1690bb5f407de4bf0bd9f08d967cf2027424/lib/noframework.waypoints.js'></script>
        <script src='https://cdn.rawgit.com/cferdinandi/smooth-scroll/aad0d74d4d97d9ca8e1323356abded9d5770a714/dist/js/smooth-scroll.min.js'></script>
        <script src="admin.js"></script>
        <div class="allContent">
            <center class="Topic">Dashboard</center><br><br>
            <div class="container">
                <div class="wrap">
                  <p class="countup">CountUp Social Media Influences </p>
                  <div class="">
                     <h2><i class="fa fa-thumbs-o-up fa-2x"></i></h2>
                  </div>
                  <h1 class="red"><span id="number">100</span> likes</h1>
                  <div class="">
                     <h2><i class="fa fa-heart fa-2x"></i></h2>
                  </div>
                  <h1 class="red"><span id="number1">100</span> shares</h1>
                  
              </div>
              </div>
                <br><br><br>
                <center class="t_topic">Voting Results of the last round</center>
              <br><br><br>
<?php
$conn = new mysqli('localhost', 'root', '', 'votingsystem');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database for vote counts
$sql = "SELECT v.CanidateId, f.Name, COUNT(*) AS VoteCount
FROM vote v
INNER JOIN finalist_master f ON v.CanidateId = f.Id
GROUP BY v.CanidateId, f.Name";
$result = $conn->query($sql);  

if ($result->num_rows > 0) {
    $voteCounts = array(); // Array to store the vote counts

    // Fetch the vote counts into an associative array
    while ($row = $result->fetch_assoc()) {
        $candidateId = $row['CanidateId'];
        $name = $row['Name'];
        $voteCount = $row['VoteCount'];
        $voteCounts[$candidateId] = array('name' => $name, 'voteCount' => $voteCount); // Store both name and vote count
    }

    $conn->close();
} else {
    echo "No results found.";
    $conn->close();
    exit;
}
?>

<div class="winner">
    <table width="100%" border="1" class="w_table">
        <tr>
            <th>Place</th>
            <th width="50%">Contestant</th>
            <th>Number of Votes</th>
        </tr>
        <tr class="t_row">
            <td>1</td>
            <td><?php echo htmlspecialchars($voteCounts[1]['name']); ?></td>
            <td><?php echo isset($voteCounts[1]) ? $voteCounts[1]['voteCount'] : 0; ?></td>
        </tr>
        <tr class="t_row">
            <td>2</td>
            <td><?php echo htmlspecialchars($voteCounts[2]['name']); ?></td>
            <td><?php echo isset($voteCounts[2]) ? $voteCounts[2]['voteCount'] : 0; ?></td>
        </tr>
        <tr class="t_row">
            <td>3</td>
            <td><?php echo htmlspecialchars($voteCounts[3]['name']); ?></td>
            <td><?php echo isset($voteCounts[3]) ? $voteCounts[3]['voteCount'] : 0; ?></td>
        </tr>
        <tr class="t_row">
            <td>4</td>
            <td><?php echo htmlspecialchars($voteCounts[4]['name']); ?></td>
            <td><?php echo isset($voteCounts[4]) ? $voteCounts[4]['voteCount'] : 0; ?></td>
        </tr>
        <tr class="t_row">
            <td>5</td>
            <td><?php echo htmlspecialchars($voteCounts[5]['name']); ?></td>
            <td><?php echo isset($voteCounts[5]) ? $voteCounts[5]['voteCount'] : 0; ?></td>
        </tr>
        <tr class="t_row">
            <td>6</td>
            <td><?php echo htmlspecialchars($voteCounts[6]['name']); ?></td>
            <td><?php echo isset($voteCounts[6]) ? $voteCounts[6]['voteCount'] : 0; ?></td>
        </tr>
    </table>
</div><br><br>
<table>
    <tr> <td style="empty-cells:hide; width: 400px;"></td>
        <td>
        <button  style="color:white; background-color: rgb(73, 71, 185); border-radius:10px; padding:10px">
  <a href="../history page/history.php" style="text-decoration:none; color:white;">  view contact us responses</a> 
</button>
         </td>
         <td>
        <button  style="color:white; background-color: rgb(73, 71, 185); border-radius:10px; padding:10px">
  <a href="../history page/history.php" style="text-decoration:none; color:white;"> view register history</a> 
</button>
         </td>
    </tr>
</table>
<br><br>
        <footer>
            <div class="footer_container">
                <div class = "footer_row">
                <img class="footer_logo" src="../header/My project-1 (1).png">
                <table class="footer_table">
                <tr><td rowspan="3"><b>Contacts</b><br><br>
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;+94 112312459<br><br>
                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;theSingOff@mail.com</td>
                    <td colspan="4"><center><b style="font-size: larger;">Follow us on</b></center></td>
                </tr>
                <tr height="30px">
                    <td colspan="4"><center>
                        <div class="social_icons">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                        </div></center>
                        </td>
                </tr>
                <tr>
                    <div>
                <td><a href="#" class="footer-links">Copyright</a></td>
                <td><a href="../user account,rules & regulations/rules.html"class="footer-links">Privacy policy</a></td>
                <td><a href="../user account,rules & regulations/rules.html" class="footer-links">Terms and Conditions</a></td>
                <td><a href="../contactus,faq,vote/finalfaq.html" class="footer-links">FAQs</a></td>
                    </div>
                </tr>
               </table>
            </div>
            </div>
        </footer>
    </body>
</html>