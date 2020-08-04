<div class="container register-form">
            <div class="form">
            
                <div class="note">
                    <h2 class="text-center"><br/>LIFE BUSINESS CALCULATOR</h2><br />
   <?php
   
    
              
                
                echo '<p><h2>Your Annual Premium is: <b style="color: red;">&#8358;'. number_format($prem, 2).'</b> </h2> </p><br/>';    
            
                echo '<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">';
            
                echo '<thead>
						<tr>                     
							<th>Your Annual Premium is</th>
							<th>Sum Assured Value is</th>
							
						</tr>
					</thead>' ;
                    
                    echo '<tbody>';
					echo 	'<tr>';
				    echo 	'<td> &#8358;'.number_format($annualprem, 2).'</td>';
				    echo    '<td> &#8358;'.number_format($insureval, 2).'</td>';
						
                    echo   '</tbody>';
                    
                    echo '</table>'; 
       
       ?>
                </div>
            <div class="container">
        	<br />
            
        <div class="row">
		  <div class="col-md-12">
                 <div class="float-sm-right" style="float: right;"><a href="getstarted"><button type="button" class="btn btn-primary">Get Started </button></a></div>
				<div class="float-sm-left" style="float: left;"><a href="process_calc"><button type="button" class="btn btn-warning">Go Back</button></a></div>
                
                	
                	</div>
                	</div>
                   </div>
                    </div>
            </div>
        </div>