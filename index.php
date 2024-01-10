<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"
/> 
    <title>Search Doctor</title>

    <style>
    /* Service Page Styles */
    .container.my-5 {
        padding: 20px;
        text-align: center;
    }

    .container.my-5 h2 {
        font-size: 2.5em;
        margin-bottom: 30px;
        color: lightseagreen;
    }

    .container.my-5 form input[type="text"],
    .container.my-5 form input[type="submit"] {
        width: 100%;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1.2em;
    }

    .container.my-5 form input[type="submit"] {
        background-color: lightseagreen;
        color: white;
        cursor: pointer;
    }

    .container.my-5 table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    .container.my-5 table th,
    .container.my-5 table td {
        padding: 12px;
        border: 1px solid #ccc;
    }

    .container.my-5 table th {
        background-color: lightseagreen;
        color: white;
    }

    .container.my-5 table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

</head>
<body>
    
   <div class="main">
        <div class="nav">
            <h2>HEALTH APP</h2>
            <div class="nav-part2">
                <h4 id="homeLink">Home</h4>
                <h4 id="serviceLink">Service</h4>
                <h4 id="aboutLink">About</h4>
                <button id="signInButton">Sign In</button>
                <i class="ri-menu-3-fill"></i>
            </div>
        </div>

        <div class="content">
            <div class="left">
                <h1>The <span>Best Therapy </span> And <span>Injuries</span> in the Treatment</h1>
                <p>The doctors and nurses and aides were super duper helpful! really really appreciate 
                    all your kindness and good care you have provide me with.
                     Thank you so much</p>
                    <button class="btn" id="scrollToDoctors">Get Started</button>
                </div>
            <div class="right">
                <img src="./public/doctor.jpg" alt="">
            </div>
        </div>
    </div>


    <h6></h6>




    <div class="container my-5" id="searchDoctors">
        <h2>Find And Search Your Suitable Doctors</h2><br>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter Doctor's Name"><br><br>
            <input type="text" name="area" placeholder="Enter Area"><br><br>
            <input type="submit" value="SEARCH" name="submit" class="btn btn-dark"/>
        </form>
    </div>
    <div class="container my-5" >

        <?php
        if(isset($_POST['submit'])){
            $search = $_POST["name"];
            $area = $_POST["area"];
            
            $sql = "SELECT * FROM doctors WHERE doctorname='$search' OR doctorarea='$area'";
            $result = mysqli_query($con, $sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                   
                    echo '<table class="table">
                            <thead>
                                <tr>
                                    <th>ID NO</th>
                                    <th>Doctor Name</th>
                                    <th>Doctor Information</th>
                                    <th>Doctor Area</th>
                                </tr>
                            </thead>
                            <tbody>';

                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['doctorname'].'</td>
                                <td>'.$row['doctorinformation'].'</td>
                                <td>'.$row['doctorarea'].'</td>
                            </tr>';
                    }

                    echo '</tbody></table>';
                } else {
                    echo 'No doctors found.';
                }
            } else {
                echo 'Error executing the query: ' . mysqli_error($con);
            }
        } else {
            echo 'Please enter search criteria and click "Search".';
        }
        ?>
    </div>
    <div class="container my-5" id="serviceSection">
    <h2>Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="service-item">
                <h3>General Check-ups</h3>
                <p>Regular health assessments and consultations.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <h3>Specialized Care</h3>
                <p>Expertise in various medical fields.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <h3>Emergency Services</h3>
                <p>Immediate medical attention for urgent cases.</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="aboutSection">
        <div class="about-section">
        <h2 style="color:lightseagreen;text-align:center;font-size:2.5em">About Us</h2><br>
            <h3>Our Story</h3>
            <p>Welcome to HealthCare Inc., where our mission is to provide top-quality healthcare services accessible to everyone. Founded in 2005, our journey began with a small clinic in the heart of the city. Over the years, we've grown into a network of medical facilities committed to delivering exceptional care.</p>

            <h3>Our Approach</h3>
            <p>At HealthCare Inc., we prioritize patient well-being above all. Our team of experienced professionals, including doctors, nurses, and support staff, works tirelessly to ensure every individual receives personalized attention and the best possible treatment.</p>
            <p>We embrace innovation and continuously integrate the latest advancements in healthcare technology to improve diagnosis, treatment, and overall patient experience.</p>

            <h3>Our Commitment</h3>
            <p>With a focus on empathy, compassion, and excellence, we strive to create a warm and welcoming environment for our patients. Whether it's routine check-ups or complex procedures, we're dedicated to delivering the highest standard of care, making a positive impact on the health and lives of those we serve.</p>
        </div>
    </div>

    <footer>
        <h5>Author: Prashant Poojary<h5>
        <b>poojaryprashant35@gmail.com<b></p>
    </footer>
    <script>

    document.getElementById('homeLink').addEventListener('click', function() {
        window.location.href = '/DoctorProject'; 
    });

    document.getElementById('serviceLink').addEventListener('click', function() {
        document.getElementById('serviceSection').scrollIntoView({ 
            behavior: 'smooth' 
        });
    })

    document.getElementById('aboutLink').addEventListener('click', function() {
        document.getElementById('aboutSection').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });
    document.getElementById('scrollToDoctors').addEventListener('click', function() {
        document.getElementById('searchDoctors').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });
</script>
</body>
</html>
