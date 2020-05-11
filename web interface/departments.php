<?php
  include_once 'dbh.inc.php';
?>

<html>
  <head>
      <title>Hospital</title>
      <link rel="icon" href="PinClipart.png">
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="js/caroufredsel.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
  </head>



<body>



<header>
    <div class="container">
        <div class="row">
            <a href="index.php" class="logo"><img width="109" src="logo2.png" alt=""></a>
            <nav>
                <ul>
                    <li><a href="doctors.php"> Doctors </a></li>
					<li><a href="Nurses.php"> Nurses </a></li>
                    <li><a href="Medicine.php"> Medicine </a></li>
                    <li><a href="Patients.php"> Patients </a></li>
                    <li><a href="Employees.php"> Clinical Asstistant </a></li>
                    <li><a href="departments.php"> Departments </a></li>
                    <li><a href="Rooms.php"> Rooms </a></li>
                </ul>

            </nav>
        </div>
    </div>
</header>

<body>

  <p></br></br></br><p>
  	<h2 class="list1"><br><br><br>Here is a list of available Departments:</h2>
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
                      	<th width="350">Name</th>
                        <th width="350">Head</th>
                        <th width="350">Location</th>
                        <th width="350">Extension</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT name, head, location, extension FROM department;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['name']."</td>"."<td>".$row['head']."</td>"."<td>".$row['location']."</td>"."<td>".$row['extension']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>There are no records available right now.</h4>';
  		      }


  		   ?>



              </div>
      	</div>
  	</section>

    <h2 class="list1"><br>To modify Departemnts:</h2>
    	<p></br><p>
    	<section class="subscriber">
    		<div class="container">
    			<div class="row">
    				<h2> Add Department </h2>
    				<div class="border"></div>
    				<div class="form">
    					<form class="form" action="add_department.php" method="POST">
    						<input class="contact-form-text" type="text" name="name" placeholder="Name">
    						<input class="contact-form-text" type="text" name="head" placeholder="Head">
    						<input class="contact-form-text" type="text" name="location" placeholder="Location">
                            <input class="contact-form-text" type="text" name="extension" placeholder="Extension">
    						<button class="contact-form-button" type="submit" name="submit">Add</button>
    					</form>
    				</div>

    			</div>
    		</div>
    	</section>


        <section class="subscriber">
    		<div class="container">
    			<div class="row">
    				<h2> Update Department </h2>
    				<div class="border"></div>
    				<div class="form">
    					<form class="form" action="update_department.php" method="POST">
    						<input class="contact-form-text" type="text" name="name" placeholder="Name">
    						<input class="contact-form-text" type="text" name="head" placeholder="Head">
    						<input class="contact-form-text" type="text" name="location" placeholder="Location">
                            <input class="contact-form-text" type="text" name="extension" placeholder="Extension">
    						<button class="contact-form-button" type="submit" name="submit">Update</button>
    					</form>
    				</div>

    			</div>
    		</div>
    	</section>

    	<section class="subscriber">
    		<div class="container">
    			<div class="row">
    				<h2> Remove Department </h2>
    				<div class="border"></div>
    				<div class="form">
    					<form class="form" action="remove_department.php" method="POST">
                            <input class="contact-form-text" type="text" name="name" placeholder="Name">
    						<button class="contact-form-button" type="submit" name="submit">Remove</button>
    					</form>
    				</div>

    			</div>
    		</div>
    	</section>

</body>

</html>
