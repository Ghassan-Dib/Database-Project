<?php     
include_once 'dbh.inc.php';
$output = '';
    
    if(isset($_POST['searchVal'])){
        
        $searchq = $_POST['searchVal'];
        $d = $_POST['ddmVal'];
        
        if($d != "--- Select Field ---"){
			
            if($d == "doctor"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE dname LIKE '$searchq%' OR iddoctor LIKE '$searchq%' OR dgender LIKE '$searchq%' OR drank LIKE '$searchq%' OR demail LIKE '$searchq%' OR dsalary LIKE '$searchq%' OR dspeciality LIKE '$searchq%' OR dep LIKE '$searchq%' OR dextension LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available doctors based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">ID</th>
                        <th width="350">Name</th>
                        <th width="350">Email</th>
                        <th width="350">Phone</th>
                        <th width="350">Gender</th>
                        <th width="350">Rank</th>
                      	<th width="350">Salary</th>
						<th width="350">Specialization</th>
						<th width="350">Department</th>
					</tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['iddoctor']."</td>"."<td>".$row['dname']."</td>"."<td>".$row['demail']."</td>"."<td>".$row['dextension']."</td>"."<td>".$row['dgender']."</td>"."<td>".$row['drank']."</td>"."<td>".$row['dsalary']."</td>"."<td>".$row['dspeciality']."</td>"."<td>".$row['dep']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            
            if($d == "medicine"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE idmedicine LIKE '$searchq%' OR name LIKE '$searchq%' OR cost LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available medicine based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">Code</th>
                        <th width="350">Quantity</th>
                        <th width="350">Price</th>
                    </tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['idmedicine']."</td>"."<td>".$row['name']."</td>"."<td>$ ".$row['cost']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            
            if($d == "nurse"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE nname LIKE '$searchq%' OR nemail LIKE '$searchq%' OR idnurse LIKE '$searchq%' OR nsalary LIKE '$searchq%' OR nbirthdate LIKE '$searchq%' OR ngender LIKE '$searchq%' OR nrank LIKE '$searchq%' OR dep LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available nurses based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">ID</th>
                        <th width="350">Name</th>
                        <th width="350">Email</th>
                        <th width="350">Birth</th>
                        <th width="350">Gender</th>
                        <th width="350">Rank</th>
                      	<th width="350">Salary</th>
						<th width="350">Department</th>
                    </tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['idnurse']."</td>"."<td>".$row['nname']."</td>"."<td>".$row['nemail']."</td>"."<td>".$row['nbirthdate']."</td>"."<td>".$row['ngender']."</td>"."<td>".$row['nrank']."</td>"."<td>".$row['nsalary']."</td>"."<td>".$row['dep']."</td>";                           
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            if($d == "patient"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE idpatient LIKE '$searchq%' OR fName LIKE '$searchq%' OR lName LIKE '$searchq%' OR Gender LIKE '$searchq%' OR Insurance LIKE '$searchq%' OR Status LIKE '$searchq%' OR BloodType LIKE '$searchq%' OR BirthDate LIKE '$searchq%' OR Address LIKE '$searchq%' OR ArrivalDate LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available patients based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">ID</th>
                        <th width="350">FName</th>
                        <th width="350">LName</th>
                        <th width="350">Insurance</th>
                        <th width="350">BType</th>
                        <th width="350">Gender</th>
                      	<th width="350">BDate</th>
  	                    <th width="350">Address</th>
						<th width="350">ArrivalDate</th>
						<th width="350">Status</th>
					</tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['idpatient']."</td>"."<td>".$row['fName']."</td>"."<td>".$row['lName']."</td>"."<td>".$row['Insurance']."</td>"."<td>".$row['BloodType']."</td>"."<td>".$row['Gender']."</td>"."<td>".$row['BirthDate']."</td>"."<td>".$row['Address']."</td>"."<td>".$row['ArrivalDate']."</td>"."<td>".$row['Status']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
			
			
			if($d == "department"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE name LIKE '$searchq%' OR extension LIKE '$searchq%' OR head LIKE '$searchq%' OR location LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available records based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">Name</th>
                        <th width="350">Head</th>
                        <th width="350">Location</th>
                        <th width="350">Extension</th>
                    </tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['name']."</td>"."<td>".$row['head']."</td>"."<td>".$row['location']."</td>"."<td>".$row['extension']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            
            if($d == "clinicalassistant"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE id LIKE '$searchq%' OR name LIKE '$searchq%' OR manager LIKE '$searchq%' OR salary LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available receptionists based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">ID</th>
                        <th width="350">Name</th>
                        <th width="350">Manager</th>
                        <th width="350">Salary</th>
                    </tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['manager']."</td>"."<td>$ ".$row['salary']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            
            
            if($d == "room"){
                
                $query = mysqli_query($conn, "SELECT * FROM ".$d." WHERE number LIKE '$searchq%' OR cost LIKE '$searchq%' OR type LIKE '$searchq%'");
                
                $count = mysqli_num_rows($query);
                if($count == 0){
                    $output = '<h3>There was no search results!</h3>';
                } else {
                    $output = '  
  	                             <h2 class="list1"><br><br><br>Here is a list of available rooms based on your search:</h2>
  	                                 <section class="subscribers">
                                        <div class="container" style="text-align:center;">
                                            <div style="text-align:center;" class="row"><table class="table1"><tr>
                      	<th width="350">Number</th>
                        <th width="350">Cost</th>
                        <th width="350">Type</th>
                    </tr>';
                    While($row = mysqli_fetch_array($query)){
                              $output .= "<tr>";
                              $output .= "<td>".$row['number']."</td>"."<td>".$row['cost']."</td>"."<td>".$row['type']."</td>";
                              $output .= "</tr>";
                    }
                    $output .= '</table></div></div></section><br><br><br>';
                }   
            }
            
            
            
            
            
            
            echo ($output);
        } else {
            $output = "<h3>Choose a Field First!</h3>";
            echo ($output);    
        }
}

?>




