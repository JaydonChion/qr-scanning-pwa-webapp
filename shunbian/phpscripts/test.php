							<?php 
								include 'init.php';


 

								$query = "SELECT * FROM workInstance";
									$result = mysqli_query($con,$query);

 
						if ($result) {
							while ($row = $result->fetch_assoc()) {
								     $field1name = $row["Title"];
								    $field2name = $row["Location"];
								        $field3name = $row["Wage"];
								        $field4name = $row["StartTime"];

								        echo($field1name);

								    }
								}

										mysqli_close($con);


								        ?>