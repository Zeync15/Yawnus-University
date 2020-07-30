<?php include "header.php" ?>

    <div id="contact">
        <div id="contactForm" class="mt-1 mx-1">
            <h1 class="title">Contact Us</h1>
            <h1>SEND US A MESSAGE</h1>
            <hr>
            <form action="contact.php" method="POST" class="mt-1">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name"><br>
                <br>
                <label for="email">Email Address</label><br>
                <input type="email" id="email" name="email"><br>
                <br>
                <label for="subject">Subject</label><br>
                <select id="subject" name="subject">
                    <option value="Enrollment Issues">Enrollment Issues</option>
                    <option value="Events">Events</option>
                    <option value="Collaboration with Yawnus University">Collaboration with Yawnus University</option>
                </select>
                <br>
                <br>
                <label for="message">Enquiry Message</label><br>
                <textarea id="message" name="message"></textarea><br>
                <input type="submit" name="submit">
            </form>
        </div>

        <div id="contactInfo" class="mx-1" style="margin-top: 6rem;">
            <h1>CONTACT INFORMATION</h1>
            <hr>
            <br>
            <p>Feel free to drop us your thoughts or suggestions for our improvement. We appreciate your comments.</p>
            <br>
            <p>Our Admissions Office is open:</p>
            <br>
            <p>Mondays to Fridays: 8.30am – 5.30pm</p>
            <p>Saturdays, Sundays & Public Holidays: 10.00am – 4.00pm</p>
            <br>
            <h6><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp; Yawnus University</h6>
            <p>No. 5, Jalan University,
                Bandar Yawnus,
                47500 Selangor Darul Ehsan
                Malaysia.</p>
            <br>
            <h6><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; Tel</h6>
            <p>+6 (03) 8765 4321</p>
            <br>
            <h6><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; Email</h6>
            <p>info@yawnus.edu.my</p>
        </div>

        <!--
            <div class="mapouter mx-1 mt-1" style="margin-bottom: 1em;">
            <div class="gmap_canvas">
                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
            <style>
                .mapouter{position:relative;text-align:right;height:500px;width:600px;}
                .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}
            </style>
        </div>
        -->
    </div>

    <?php 
        $db = mysqli_connect('localhost', 'root', '', 'yawnus');
        if(!$db) {
            echo "No Connection to Database";
        }

        if (isset($_POST['submit'])) {
            $name = $db-> real_escape_string($_POST['name']);
            $email = $db-> real_escape_string($_POST['email']);
            $subject = $db-> real_escape_string($_POST['subject']);
            $message = $db-> real_escape_string($_POST['message']);

            // ensure that form fields are filled properly
            if(empty($name) || (empty($email)) || (empty($message))) {
                echo  "&nbsp; &nbsp; &nbsp; &nbsp; Fill in all the blanks";
            } else {
                $sql = "INSERT INTO enquiry (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
                mysqli_query($db, $sql);
                header('location: contact.php'); // redirect to form     
                    
            }
        }
    ?>

<?php include "footer.php"; ?>