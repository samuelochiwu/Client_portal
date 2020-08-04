<script type="text/javascript">
function checkForm(form) {




    if (this.dd_title.value == "") {
        alert("Please input your Title");
        this.dd_title.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> Please title is Required</span>");
        return;
    }
    if (this.address1.value == "") {
        alert("Please input Address");
        this.address1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input Address</span>");
        return false;
    }
    if (this.dd_occupa.value == "") {
        alert("Please input Occupation");
        this.dd_occupa.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input Occupation</span>");
        return false;
    }
    if (this.empname.value == "") {
        alert("Please Input Employer Name");
        this.empname.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Employer Name</span>");

        return false;
    }
    if (this.empphone.value == "") {
        alert("Please Input Employer Phone");
        this.empphone.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Employer Phone</span>");

        return false;
    }
    if (this.empaddr1.value == "") {
        alert("Please Input Employer Address");
        this.empaddr1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Employer Address</span>");

        return false;
    }
    if (this.hmeasure.value == "") {
        alert("Please Input Height");
        this.hmeasure.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Height </span>");

        return false;
    }
    if (this.wmeasure.value == "") {
        alert("Please Input Weight");
        this.wmeasure.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Weight</span>");

        return false;
    }
    if (this.benef_name1.value == "") {
        alert("Please input the Beneficiary name");
        this.benef_name1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input the Beneficiary name</span>");
        return false;
    }




    if (this.benef_dbirth1.value == "") {
        alert("Please Input Beneficiaries Date of Birth");
        this.benef_dbirth1.focus();
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Date of Birth</span>");

        return false;
    }
    if (this.benef_addr1.value == "") {
        alert("Please Input Beneficiaries Address");
        this.benef_addr1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Address</span>");

        return false;
    }
    if (this.benef_rel1.value == "") {
        alert("Please Input Beneficiaries Relationship");
        this.benef_rel1.focus();
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Relationship</span>");

        return false;
    }
    if (this.benef_prop1.value == "") {
        alert("Please Input Beneficiaries Percent");
        this.benef_prop1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Percent</span>");

        return false;
    }
    if (this.benef_name.value == "") {
        alert("Please Input Beneficiaries Name");
        this.benef_name.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Name</span>");

        return false;
    }
    if (this.benef_dbirth.value == "") {
        alert("Please Input Beneficiaries Date of Birth");
        this.benef_dbirth.focus();
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Date of Birth</span>")
        return false;
    }
    if (this.benef_addr.value == "") {
        alert("Please Input Beneficiaries Address");
        this.benef_addr.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Address</span>");

        return false;
    }
    if (this.benef_rel.value == "") {
        alert("Please Input Beneficiaries Relationship");
        this.benef_rel.focus();
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Relationship</span>");

        return false;
    }
    if (this.guardian_email == "") {
        alert("Please Input Employer Name");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Employer Name</span>");

        return false;
    }
    if (this.benef_prop.value == "") {
        alert("Please Input Beneficiaries Percent");
        this.benef_prop.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Beneficiaries Percent</span>");

        return false;
    }
    if (this.guardian.value == "") {
        alert("Please Input Guardian Name");
        this.guardian.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Guardian Name</span>");

        return false;
    }
    if (this.guardian_addr.value == "") {
        alert("Please Input Guardian's Address");
        this.guardian_addr.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Guardian's Address</span>");

        return false;
    }
    if (this.guardian_phone.value == "") {
        alert("Please Input Guardian's Phone");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Guardian's Phone</span>");

        return false;
    }



    $('#product_msg').html('');
}
</script>
<div class="row getstarted-container">

    <!-- Grid column -->
    <div class="col-md-3">

        <!-- Stepper -->
        <div class="steps-form-3">
            <div class="steps-row-3 setup-panel-3 d-flex justify-content-between">
                <div class="steps-step-3" style="margin-top: 20px;">
                    <a href="#step-4" type="button" class="btn btn-info btn-circle-3 waves-effect ml-0"
                        data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-user"
                            aria-hidden="true"></i></a>
                </div>
                <div class="steps-step-3">
                    <a href="#step-5" type="button" class="btn btn-info btn-circle-3 waves-effect ml-0"
                        data-toggle="tooltip" data-placement="top" title="Basic Information"><i
                            class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                </div>
                <div class="steps-step-3">
                    <a href="#step-6" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3"
                        data-toggle="tooltip" data-placement="top" title="Basic Information"><i
                            class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                </div>
                <div class="steps-step-3">
                    <a href="#step-7" type="button" class="btn btn-pink btn-circle-3 waves-effect" data-toggle="tooltip"
                        data-placement="top" title="Basic Information"><i class="fa fa-heart-o"
                            aria-hidden="true"></i></a>
                </div>
                <div class="steps-step-3">
                    <a href="#step-8" type="button" class="btn btn-pink btn-circle-3 waves-effect" data-toggle="tooltip"
                        data-placement="top" title="Basic Information"><i class="fa fa-heart-o"
                            aria-hidden="true"></i></a>
                </div>
                <div class="steps-step-3 no-height">
                    <a href="#step-9" style="margin-top:-40px;" type="button"
                        class="btn btn-pink btn-circle-3 waves-effect p-3" data-toggle="tooltip" data-placement="top"
                        title="Basic Information"><i class="fa fa-check" aria-hidden="true"></i></a>
                </div>

            </div>
        </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">

        <!--form role="form" action="submit_proposal" method="post">
         <!-- First Step -->
        <div class="row setup-content-3 getstarted" id="step-4">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Personal Data</strong></h3>
                <div class="form-group md-form">
                    <label for="yourEmail-3" data-error="wrong" data-success="right">Title</label>
                    <input type="dd_title" name="dd_title" id="dd_title" class="form-control" value="" required>
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Surname</label>
                    <input type="text" required="required" name="lname" value="<?php echo $fname; ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">Other Names</label>
                    <input required="required" name="fname" value="<?php echo $othnames." ". $lname; ?>"
                        class="form-control validate" readonly="readonly">
                </div>

                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Mobile</label>
                    <input type="text" required="required" name="gsm" value="<?php echo $gsm; ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">Email</label>
                    <input type="text" required="required" name="email" value="<?php echo $email; ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">Current Residential
                        Address:</label>
                    <input type="text" name="address1" id="address1" class="form-control">
                </div>

                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Date of Birth:</label>
                    <input type="text" required="required" name="dd_dbirth" value="<?php echo $dob; ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Occupation</label>
                    <input type="text" name="dd_occupa" id="dd_occupa" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">Gender</label>
                    <select name="dd_gender" id="dd_gender" class="form-control">
                        <option value=""> Select Gender </option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Marital Status</label>
                    <select name="dd_mstatus1" id="dd_mstatus1" class="form-control">
                        <option value=""> Select Marital Status </option>
                        <option value="S">Single</option>
                        <option value="M">Married</option>
                        <option value="D">Divorced</option>
                        <option value="P">Separated</option>
                        <option value="C">Widowed</option>
                    </select>
                </div>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>
            </div>
        </div>

        <div class="row setup-content-3 getstarted" id="step-5">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Employer & Income Details:</strong></h3>
                <div class="form-group md-form">
                    <label for="yourEmail-3" data-error="wrong" data-success="right">Name of Employer / Company:</label>
                    <input type="text" name="empname" id="empname" class="form-control " value="">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Telephone Numbers:</label>
                    <input type="text" name="empphone" id="empphone" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Address</label>
                    <input type="text" name="empaddr1" id="empaddr1" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">What is your income per
                        annum</label>
                    <select name="ann_income" id="ann_income" class="form-control">
                        <option value=""> Select income per annum </option>
                        <option value="1000000">Less of Equal to 1000000</option>
                        <option value="2000000">Less of Equal to 2000000</option>
                        <option value="5000000">Less of Equal to 5000000</option>
                        <option value="10000000">Less of Equal to 10000000</option>
                        <option value="10000001">Greater than 10000001</option>
                    </select>
                </div>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Sum Assured:</label>
                    <input type="text" name="insureval" value="<?php echo $insureval  ?>" class="form-control"
                        readonly="readonly">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Tenure(Years)</label>
                    <input type="text" name="qterm_b" value="<?php echo $covdur  ?>" class="form-control "
                        readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right"> Premium:</label>
                    <input type="text" required="required" name="desiredprem" value="<?php echo $desiredprem  ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Payment Frequency:</label>
                    <input type="text" required="required" name="dd_premfrq_a" value="<?php echo $premfrq  ?>"
                        class="form-control validate" readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Annual Contribution:</label>
                    <input type="text" required="required" name="annual_prem" value="<?php echo $init_contrib  ?>"
                        name="dd_premfrq_a" class="form-control validate" readonly="readonly">
                </div>
                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>
            </div>
        </div>


        <!-- Second Step -->
        <div class="row setup-content-3 getstarted" id="step-6">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Medical Details:</strong></h3>
                <div class="form-group md-form">
                    <label for="yourName-3" data-error="wrong" data-success="right">Height</label>
                    <input type="text" name="hmeasure" id="hmeasure" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="secondName-3" data-error="wrong" data-success="right">Weight</label>
                    <input type="text" name="wmeasure" id="wmeasure" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourAddress-3" data-error="wrong" data-success="right">Are you in good health?</label>
                    <select name="health" id="health" class="form-control">
                        <option value=""> Select health </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>

                <div class="form-group md-form">
                    <label for="yourName-3" data-error="wrong" data-success="right">Any bodily infirmity?</label>
                    <select name="dd_binfirmity" id="dd_binfirmity" class="form-control">
                        <option value=""> Select bodily infirmity </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
                <div class="form-group md-form mt-3">
                    <label for="secondName-3" data-error="wrong"
                        data-success="right">Kidney,Liver,Paralysis,Cancer,Diabetes failure,HIV/AIDS</label>
                    <select name="aids" id="aids" class="form-control">
                        <option value=""> Select Disease </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourAddress-3" data-error="wrong" data-success="right">Are you currently recieving
                        treatment?</label>
                    <select name="symp" id="symp" class="form-control">
                        <option value=""> Select Treatment </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>

                <div class="form-group md-form mt-3">
                    <label for="yourAddress-3" data-error="wrong" data-success="right">Are you currently
                        pregnant?</label>
                    <select name="fem_preg" id="fem_preg" class="form-control">
                        <option value=""> Select pregnancy </option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>


            </div>
        </div>


        <!-- Third Step -->
        <div class="row setup-content-3 getstarted" id="step-7">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Benefficiary Details</strong></h3>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Name</label>
                    <input type="text" name="benef_name1" id="benef_name1" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Date of Birth)</label>
                    <input type="text" name="benef_dbirth1" id="benef_dbirth1" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right"> Address:</label>
                    <input type="text" name="benef_addr1" id="benef_addr1" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Relationship</label>
                    <input type="text" name="benef_rel1" id="benef_rel1" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Proportion(%)</label>
                    <input type="text" name="benef_prop1" id="benef_prop1" class="form-control ">
                </div>
                <br />
                <h6 class="font-weight-bold pl-0 my-4">Benefficiary Details (Optional)</h6>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Name</label>
                    <input type="text" name="benef_name" id="benef_name" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Date of Birth)</label>
                    <input type="text" name="benef_dbirth" id="benef_dbirth" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right"> Address:</label>
                    <input type="text" name="benef_addr" id="benef_addr" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Relationship</label>
                    <input type="text" name="benef_rel" id="benef_rel" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Proportion(%)</label>
                    <input type="text" name="benef_prop" id="benef_prop" class="form-control ">
                </div>

                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>
            </div>
        </div>

        <div class="row setup-content-3 getstarted" id="step-8">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Guardian Details</strong></h3>

                <div class="form-group md-form mt-3">
                    <label for="secondName-3" data-error="wrong" data-success="right">Guardian Name</label>
                    <input type="text" name="guardian" id="guardian" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="yourAddress-3" data-error="wrong" data-success="right">Address</label>
                    <input type="text" name="guardian_addr" id="guardian_addr" class="form-control ">

                </div>

                <div class="form-group md-form">
                    <label for="yourName-3" data-error="wrong" data-success="right">Telephone No:</label>
                    <input type="text" name="guardian_phone" id="guardian_phone" class="form-control ">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="secondName-3" data-error="wrong" data-success="right">E-mail:</label>

                    <input type="text" name="guardian_email" id="guardian_email" class="form-control ">
                </div>

                <h3 class="font-weight-bold pl-0 my-4"><strong>Terms and conditions</strong></h3>
                <div class="form-check">
                    <input type="checkbox" id="checkbox115" class="form-check-input">
                    <label for="checkbox115" class="form-check-label">I agree to the terms and conditions</label>
                </div>
                <br />
                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>
            </div>
        </div>


        <!-- Fourth Step -->
        <div class="row setup-content-3 getstarted" id="step-9">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Finish</strong></h3>
                <!--h2 class="text-center font-weight-bold my-4">Registration completed!</h2-->

            </div>
            <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
            <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
        </div>

        </form>

    </div>
    <!-- Grid column -->

</div>
