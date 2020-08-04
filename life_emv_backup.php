<div class="form">
            
                <div class="notelife">
                    <h2 class="text-center"><br/>Estimated maturity Benefits</h2>
                </div>
    <div class="container">
	<br />
    
        <div class="row">
		
            
            
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

    				<thead>
						<tr>
                        <th></th>                       
							<!--th>Term</th>
							<th>AgeNext</th-->
							<th>Contribution</th>
							<th>Term Premium</th>
							<th>Investment Act</small></th>
							<!--th>Allocation)</th-->
                            <th>Interest</th>
                            <th>Month End</th>
                            <!--th>Benefit</th>
                            <th>Premium</th-->
						</tr>
					</thead>
<?php if($response != ""){

        $emvarr   = isset($response['result']['emvarr']) ? $response['result']['emvarr'] : "";
        $termprem = isset($response['result']['termprem']) ? $response['result']['termprem']:0;
        $premrate = isset($response['result']['tabrate']) ? $response['result']['tabrate']:0;
        if($_REQUEST['premfrq'] == "Y")$annual ="Y";
        
    $payfreq = $_REQUEST['premfrq'];
        
        switch ($payfreq){
            case "M":
            $payfreqdesc = 'Monthly';
            $payfac = 12;
            break;
            case "Q":
            $payfreqdesc = 'Quaterly';
            $payfac = 4;
            break;   
            case "H":
            $payfreqdesc = 'Half Yearly';
            $payfac = 2;
            break; 
            case "Y":
            case "A":
            $payfreqdesc = 'Yearly';
            $payfac = 1;
            break; 	
            case "S":	
            $payfreqdesc = 'Single Premium';
            $payfac = (1/$termyrs);
            default:
            $payfreqdesc = 'Daily';
            $payfac = 1;				 
        }
        $annual_termprem = $termprem * $payfac;  
        $prem                 =  isset($response['result']['yearprem'])? $response['result']['yearprem'] : 0 ;         
       //echo "annual_termprem==$annual_termprem, prem==$prem<br />";
        $breakarr 		  = isset($response['result']['break_arr']) ? $response['result']['break_arr'] : "";
        $plan             = isset($response['result']['plan']) ? $response['result']['plan'] : "";
        
        //dbgarr("template $emvarr",$emvarr); 	
        $res_cnt		  = count($emvarr);
        
        //
        $c_prem_idx		  = "curmonprem_full";		// "curmonprem";
        $c_totprem_idx	  = "curyrendtotprem_full";	// "curyrendtotprem"; 
        $c_cummprem_idx	  = "cumm_prem_full";	    // "cumm_prem";  
        
        // 
        $prem_tot		  = isset($response['result'][$c_cummprem_idx]) ? $response['result'][$c_cummprem_idx] : 0.00;
        $alloc_tot		  = isset($response['result']['alloc_tot']) ? $response['result']['alloc_tot'] : 0.00;
        $depacbal		  = isset($response['result']['depacbal']) ? $response['result']['depacbal'] : 0.00;
        $deathben		  = isset($response['result']['deathben']) ? $response['result']['deathben'] : 0.00; 
        $is_invlnk		  = isset($response['result']['is_invlnk']) ? $response['result']['is_invlnk'] : $is_invlnk;
        $annual_prem_tot  = 0.00;
        $annual_alloc_tot = 0.00;
        $annual_termprem_tot =0;
        $cumm_int_tot	  = isset($response['result']['cumm_int_tot']) ? $response['result']['cumm_int_tot'] : 0.00;
        $annual_bal_tot	  = 0.00;
        $yrenddeathben	  = 0.00;
        $curmon_enddate	  = "";
        $totdraw		  = isset($response['result']['totdraw']) ? $response['result']['totdraw'] : 0; 
        
        //
        $breakcnt_old = 1;
        $breakcnt     = 1;
        $break_note   = "";
        
        //calculate the total contribution first if wopindi
        if ($wopindi == 'Y') {
            $tot_contribution = 0;
            foreach ($emvarr as $mon => $val) { 
                    
                //
                $agnxt	  		        = isset($emvarr[$mon]['curagenxb']) ? $emvarr[$mon]['curagenxb'] : '';  
                if  ($agnxt != "E") {
                    $yrend	  		    = isset($emvarr[$mon]['yrend']) ? $emvarr[$mon]['yrend'] : 0;
                    $curyrendtotalloc	= isset($emvarr[$mon]['curyrendtotalloc']) ? $emvarr[$mon]['curyrendtotalloc'] : 0.00;
                    
                    //
                    if ($annual && !$yrend) continue;
                    $tot_contribution	+= $curyrendtotalloc;
                }
            }
        }
        
        foreach ($emvarr as $mon => $val) {
            //
            $agnxt = isset($emvarr[$mon]['curagenxb']) ? $emvarr[$mon]['curagenxb'] : '';  
            if  ($agnxt != "E") 
            {
                   
                $yrend	  		  = isset($emvarr[$mon]['yrend']) ? $emvarr[$mon]['yrend'] : 0;
                 
                
                $maturity 		  = isset($emvarr[$mon]['maturity']) ? $emvarr[$mon]['maturity'] : 0;
                $rowclr 	      = ($yrend) 	?	"#fff" : "#EEF3F9";
                $rowclr 	  	  = ($maturity)?	"#e9e4e4" : $rowclr;	//marturity color #FE2E2E
                $curmondate		  = isset($emvarr[$mon]['curmondate']) ? $emvarr[$mon]['curmondate'] : "nodate";
                $curmon_enddate	  = isset($emvarr[$mon]['curmon_enddate']) ? $emvarr[$mon]['curmon_enddate'] : "nodate";
                $curmonprem		  = isset($emvarr[$mon][$c_prem_idx]) ? $emvarr[$mon][$c_prem_idx] : 0.00;
                $curmonalloc	  = isset($emvarr[$mon]['curmonalloc']) ? $emvarr[$mon]['curmonalloc'] : 0.00;
                $curmonalloc_int  = isset($emvarr[$mon]['curmonalloc_int']) ? $emvarr[$mon]['curmonalloc_int'] : 0.00;
                $curmon_tot_int   = isset($emvarr[$mon]['curmon_tot_int']) ? $emvarr[$mon]['curmon_tot_int'] : 0.00;
                $curmonendbal	  = isset($emvarr[$mon]['monendbal']) ? $emvarr[$mon]['monendbal'] : 0.00;    
                $curmonnarr		  = isset($emvarr[$mon]['curmonnarr']) ? $emvarr[$mon]['curmonnarr'] : "???";
                $curmondraw		  = isset($emvarr[$mon]['curmondraw']) ? $emvarr[$mon]['curmondraw'] : 0;
                
                //add the term part termprem 
                $curyrendtotprem  = isset($emvarr[$mon][$c_totprem_idx]) ? ($emvarr[$mon][$c_totprem_idx] + $annual_termprem) : 0.00;
                $curyrendtotalloc = isset($emvarr[$mon]['curyrendtotalloc']) ? $emvarr[$mon]['curyrendtotalloc'] : 0.00;
                $curyrendtotint2  = isset($emvarr[$mon]['curyrendtotint2']) ? $emvarr[$mon]['curyrendtotint2'] : 0.00;
                $curyrendbal	  = isset($emvarr[$mon]['curyrendacbal']) ? $emvarr[$mon]['curyrendacbal'] : 0.00;
                $curyrendacbal_i  = isset($emvarr[$mon]['curyrendacbal_i']) ? $emvarr[$mon]['curyrendacbal_i'] : 0.00;      
                $curyrenddraw	  = isset($emvarr[$mon]['curyrenddraw']) ? $emvarr[$mon]['curyrenddraw'] : 0; 
                
                
                $mondesc	      = (!$annual) ? "($mon)  " : "";
                $yrenddesc        = ($yrend) ? "[" . $mon/12 . "]" : "";
                $yrenddesc        = (!$annual && $yrend) ? "--> Year ".$yrenddesc : $yrenddesc;
                //echo "yrend23 ==$yrend, mon23== $mon, yrenddesc==$yrenddesc, mondesc==$mondesc";
                $yrbreak	      = isset($emvarr[$mon]['break']) ? $emvarr[$mon]['break'] : 0;
                $yrenddeathben    = ($yrend) ? (isset($emvarr[$mon]['deathben']) ? $emvarr[$mon]['deathben'] : 0.00 ) : $yrenddeathben;
                //echo "dbg... yrenddeathben = $yrenddeathben<br>";
                
                // Break points
                $breakcnt	  		= isset($emvarr[$mon]['breakcnt']) ? $emvarr[$mon]['breakcnt'] : 1;
                if ($breakcnt != $breakcnt_old)
                {
                    if (($plan == "IEDEAS") && ($breakarr != ""))
                    {
                        $pmdate      = $breakarr[$breakcnt_old]['duedate'];
                        $break_note  = " <br> Partial Marturity $breakcnt_old For  [($pmdate) ]:... Premium = " . $breakarr[$breakcnt_old]['brkprempd'];
                        $break_note .= " , Allocation = " . number_format($breakarr[$breakcnt_old]['brkalloc'],2);
                        $break_note .= " , Interest   = " . number_format($breakarr[$breakcnt_old]['brkcummint'],2);
                        $break_note .= " , Balance    = " . number_format($breakarr[$breakcnt_old]['brkacbal'],2);
                        $break_note .= " <br><br> ";
                        
                        $breakcnt_old = $breakcnt;
                    }
                }
                
                //
                if ($annual && !$yrend) continue;
                
                $annual_prem_tot      = $annual_prem_tot + $curyrendtotprem;
                $annual_alloc_tot     = $annual_alloc_tot + $curyrendtotalloc;
                $annual_bal_tot	      = $curyrendbal;
                $annual_termprem_tot += $annual_termprem;
                
                if ($wopindi == 'Y') $wop = $tot_contribution - $annual_alloc_tot;
               //echo "agnxt ==$agnxt";
               //curmonnarr
    
            ?>
					<tbody>
						<tr>
                        <td></td>
                        	<!--td><? echo $curmonnarr;?></td>
							<td><? echo $agnxt; ?></td--> 
							<td><?= (!$annual) ? number_format($curmonprem,2) : number_format($curyrendtotprem,2); ?></td>
							<td><?= number_format($annual_termprem,2); ?></td>
							<td><?= (!$annual) ? number_format($curmonalloc,2) : number_format($curyrendtotalloc,2); ?></td>
							<!--td><? echo number_format($curmonalloc_int,2); ?></td-->
                            <td><?= (!$annual) ? number_format($curmon_tot_int,2) : number_format($curyrendtotint2,2); ?> </td>
							<td><?= (!$annual) ? number_format($curmonendbal,2) : number_format($curyrendbal,2); ?> </td>
                            <!--td><? echo number_format($emvarr[$mon]['deathben'],2); ?></td>
							<td><? echo number_format($wop,2); ?></td-->
                            </tr>
                        </tbody>
                        <?php 
                        }
                        }
                        ?>
                                       
                       <tfoot>
						<tr>
                            <th>Ground Total</th>
							<th><?= (!$annual) ? number_format($prem_tot,2) : number_format($annual_prem_tot,2); ?></th>
                            <th><?= number_format($annual_termprem_tot,2);?></th>
							<th> <?= (!$annual) ? number_format($alloc_tot,2) : number_format($annual_alloc_tot,2); ?></th>
							<!--th><?= number_format($cumm_int_tot,2); ?></th-->
							<th><?= (!$annual) ? number_format($depacbal,2) : number_format($annual_bal_tot,2); ?></th>
							<th><?= (!$annual) ? number_format($deathben,2) : number_format($yrenddeathben,2); ?></th>
							<!--th></th>
                            <th></th-->
                            <!--th></th>
                            <th></th-->
                            
						</tr>
                    	</tfoot>
                         <?php 
                          }
                         ?>
                                               
				</table>
                <div class="col-md-12">
                 <div class="float-sm-right" style="float: right;"><a href="getstarted"><button type="button" class="btn btn-primary">Get Started </button></a></div>
				<div class="float-sm-left" style="float: left;"><a href="process_calc"><button type="button" class="btn btn-warning">Go Back</button></a></div>

	
	</div>
	</div>
   </div>
                    </div>