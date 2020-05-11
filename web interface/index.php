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
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        function searchq(){
            var searchTxt = $("input[name = 'search']").val();
            var ddm = document.getElementById("fields").value;
            $.post("search.php", {searchVal: searchTxt, ddmVal: ddm}, function(output){
                $("#output").html(output);
            });
        }
      </script>
      <!-- Latest compiled JavaScript -->
      <script src="js/caroufredsel.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
  </head>






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
  <section class="hospital text-center">
      <h1 class="srch"><span>Search</span> Hospital</h1>
   <div class="container">
    <form class="search" action="index.php" method="post">
        <select class="drop" name="hospital" id="fields">
           <option value="--- Select Field ---">Choose a Field</option>
            <option value="doctor">Doctor</option>
			<option value="department">Department</option>
            <option value="room">Room</option>
            <option value="nurse">Nurse</option>
			<option value="medicine">Medicine</option>
            <option value="patient">Patient</option>
            <option value="clinicalassistant">Clinical Assistant</option>           
        </select>
        <input class="search-text" type="text" name="search" placeholder="Search in Hospital..." onkeyup="searchq();">
    </form>
    <div id="output">
     <p><br><br><br><br><br><br><br></p>       
    </div>

    <div class="brdr"></div>
    <div><h1 class="r">Hospital Statistics:</h1>
    <div class="brdr"></div>
	
	
	
	<h2 class="list1"><br><br>Different Diseases and number of patients for each disease:</h2>
	
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
                      	<th width="350">Disease</th>
                      	<th width="350">Number of Patients</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT Status, count(*) FROM patient GROUP BY Status;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['Status']."</td>"."<td>".$row['count(*)']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>NO RESULTS.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
                <p><br><br></p>
              </div>
      	</div>
  	</section>
	
	
  	
  	
  	<h2 class="list1"><br><br>Here is a Summary of all Departmetns, Doctors, Nurses, Clinical Assistants, and Patients that are in the Hospital:</h2>
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
                      	<th width="650">Doctor</th>
                      	<th width="650">Department</th>						

                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT * FROM Summary;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['doctors']."</td>"."<td>".$row['departments']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>
					  
				<table class="table1">
                  	<tr>
                      	<th width="650">Nurse</th>
                      	<th width="650">Department</th>						

                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT * FROM Summary2;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['nurses']."</td>"."<td>".$row['departments']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			    </table>
				<br>
				<h2>Doctors and their corresponding nurses:</h2>
				<table class="table1">
                  	<tr>
                      	<th width="650">Nurse</th>
                      	<th width="650">Doctor</th>						

                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT n.nname as nurses, d.dname as doctors from `lead` l, doctor d, nurse n where n.idnurse = l.nurse_id and d.iddoctor = l.doc_id";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['nurses']."</td>"."<td>".$row['doctors']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			    </table>
					  

  		      <?php if($b1 == false){
  			      	echo '<h4>NO RESULT!</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
              </div>
      	</div>
  	</section>
  	
  	

  	
  	
	
	<h2 class="list1"><br><br>You can also check patients and their corresponding relatives:</h2>
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
                      	<th width="650">Patient ID</th>
                        <th width="650">Patient fName</th>
						<th width="650">Patient lName</th>
						<th width="650">Realtive Name</th>
						<th width="650">Phone</th>
						<th width="650">Relation</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT * FROM relatives;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['idpatient']."</td>"."<td>".$row['fName']."</td>"."<td>".$row['lName']."</td>"."<td>".$row['name']."</td>"."<td>".$row['phone']."</td>"."<td>".$row['relation']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>There are no patients available right now.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
              </div>
      	</div>
  	</section>
  	
	
	
	
	  	<h2 class="list1"><br><br>You can also view the total bill for each patient:</h2>
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
                      	<th width="650">Patient ID</th>
						<th width="650">Patient fName</th>
						<th width="650">Patient lName</th>
                        <th width="650">Total Bill</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT b.patient_id, b.amount, p.fName, p.lName FROM bill b, patient p WHERE patient_id = p.idpatient;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['patient_id']."</td>"."<td>".$row['fName']."</td>"."<td>".$row['lName']."</td>"."<td>".$row['amount']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>There are no patients available right now.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
              </div>
      	</div>
  	</section>
  	
  	
  	<h2 class="list1"><br><br>Below, you can check all the departments in the Hospital:</h2>
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
                          $sql = "SELECT * FROM department;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['name']."</td>"."<td>".$row['head']."</td>";
                              echo "<td>".$row['location']."</td>"."<td>".$row['extension']."</td>";                             
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>There are no deaprtments available right now.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
                <p><br><br></p>
              </div>
      	</div>
  	</section>
  	
  	
  	
  	
	

	
	
	<h2 class="list1"><br><br>Different Rooms and Names of patients in each Room:</h2>
	
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
					    <th width="350">First Name</th>
						<th width="350">Last Name</th>
                      	<th width="350">Room</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT p.fName as name1,p.lName as name2, a.room_number as nbr FROM allocated a, patient p WHERE a.patient_id = p.idpatient;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['name1']."</td>"."<td>".$row['name2']."</td>"."<td>".$row['nbr']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>NO RESULTS.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
                <p><br><br></p>
              </div>
      	</div>
  	</section>
  	
  	
	
	<h2 class="list1"><br><br>Different Nurses and Names of patients assigned for them:</h2>
	
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
					    <th width="350">Nurse Name</th>
                      	<th width="350">Patient Name</th>
						<th width="350">Patient ID</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT n.nname as name1, p.fName as name2, g.patient_id as id FROM given g, nurse n, patient p WHERE g.patient_id = p.idpatient and g.nurse_id = n.idnurse;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['name1']."</td>"."<td>".$row['name2']."</td>"."<td>".$row['id']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>NO RESULTS.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
                <p><br><br></p>
              </div>
      	</div>
  	</section>
	
	
	<h2 class="list1"><br><br>Different Clinical Assistants in the Hospital:</h2>
	
  	<section class="subscribers">
  	    <div class="container" style="text-align:center;">
          	<div style="text-align:center;" class="row">

                  <table class="table1">
                  	<tr>
					    <th width="350">ID</th>
					    <th width="350">Assistant Name</th>
						<th width="350">Manager</th>
						<th width="350">Salary</th>
                    </tr>

                      <?php
                          echo "<br>";
                          $sql = "SELECT * FROM clinicalassistant;";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          $b1 = false;
                          if($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                              $b1 = true;
                              echo "<tr>";
                              echo "<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['manager']."</td>"."<td>".$row['salary']."</td>";
                              echo "</tr>";
                            }
                          }
                      ?>
  			          </table>

  		      <?php if($b1 == false){
  			      	echo '<h4>NO RESULTS.</h4>';
  		      }


  		   ?>

                <div class="brdr"></div>
                <p><br><br></p>
              </div>
      	</div>
  	</section>
	
	
    </div>
    </div>
    </section>
    
<div></div>
    
</body>

</html>
