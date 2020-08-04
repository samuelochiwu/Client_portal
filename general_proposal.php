<script type="text/javascript">
function checkForm(form) {




    if (this.address1.value == "") {
        alert("Please input Address");
        this.benef_name1.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input Address</span>");
        return false;
    }
    if (this.dd_dbirth.value == "") {
        alert("Please input Date of Birth");
        this.dd_dbirth.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input Date of Birth</span>");
        return false;
    }
    if (this.dd_occupa.value == "") {
        alert("Please input Occupation");
        this.dd_occupa.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please input Occupation</span>");
        return false;
    }
    if (this.maketype.value == "") {
        alert("Please Input Make of Car");
        this.maketype.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Make of Car</span>");

        return false;
    }
    if (this.model.value == "") {
        alert("Please Input Model of Car");
        this.model.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Model of Car</span>");

        return false;
    }
    if (this.regnumb.value == "") {
        alert("Please Input your Registration Number");
        this.regnumb.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Registration Number</span>");

        return false;
    }
    if (this.enginenumb.value == "") {
        alert("Please Input Engine Number");
        this.enginenumb.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Engine Number </span>");

        return false;
    }
    if (this.chassisnumb.value == "") {
        alert("Please Input Chassis Number");
        this.chassisnumb.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Chassis Number</span>");

        return false;
    }
    if (this.dd_covertype.value == "") {
        alert("Please Input Cover Type");
        this.dd_covertype.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Cover Type</span>");

        return false;
    }
    if (this.dd_drivercount.value == "") {
        alert("Please Input Driver Count");
        this.dd_drivercount.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Driver Count</span>");

        return false;
    }
    if (this.yearofmake.value == "") {
        alert("Please Input Year of Make");
        this.yearofmake.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input Year of Make</span>");

        return false;
    }
    if (this.state.value == "") {
        alert("Please Input State");
        this.state.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Please Input State</span>");

        return false;
    }
    if (this.vecaddr.value == "") {
        alert("Please Input Vehicle Inspection Address");
        this.vecaddr.focus();
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b>Please Input Vehicle Inspection Address</span>");

        return false;
    }



    $('#product_msg').html('');
}
</script>
<div class="row  getstarted-container 123">

    <!-- Grid column -->
    <div class="col-md-3">


        <!-- Stepper -->
        <div class="steps-forms-3">
            <div class="steps-row-3 setup-panel-3 d-flex justify-content-between">
                <div class="steps-step-3">
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
                <div class="steps-step-3 no-height">
                    <a href="#step-7" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3"
                        data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-check"
                            aria-hidden="true"></i></a>
                </div>

            </div>
        </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">
        <!-- First Step -->
        <div class="row setup-content-3" id="step-4">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Personal Data</strong></h3>

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
                    <input type="text" name="address1" id="address1" class="form-control ">
                </div>

                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Date of Birth:</label>
                    <input type="text" name="dd_dbirth" id="dd_dbirth" value="<?php echo $dob; ?>" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Occupation</label>
                    <input type="text" id="dd_occupa" name="dd_occupa" class="form-control ">
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

        <div class="row setup-content-3" id="step-5">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Car Information:</strong></h3>
                <div class="form-group md-form">
                    <label for="yourEmail-3" data-error="wrong" data-success="right">Car Maker:</label>
                    <input type="text" type="text" name="maketype" id="maketype" class="form-control" value="">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Car Model:</label>
                    <input type="text" name="model" id="model" value="" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Registration Number:</label>
                    <input type="text" " name=" regnumb" id="regnumb" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Engine No:</label>
                    <input type="text" name="enginenumb" id="enginenumb" class="form-control">
                </div>
                <div class="form-group md-form">
                    <label for="yourUsername-3" data-error="wrong" data-success="right">Chasis No:</label>
                    <input type="text" name="chassisnumb" id="chassisnumb" class="form-control">
                </div>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Sum Assured:</label>
                    <input type="text" name="insureval" value="<?php echo $insureval  ?>" class="form-control "
                        readonly="readonly">
                </div>

                <div class="form-group md-form mt-3">
                    <label for="yourPassword-3" data-error="wrong" data-success="right">Coverage Type:</label>
                    <input type="text" name="dd_covertype" id="dd_covertype" value="" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Driver Count:</label>
                    <input type="text" name="dd_drivercount" id="dd_drivercount" value="" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Insurance start date:</label>
                    <input type="text" required="required" name="dd_coverprdstart" id="dd_coverprdstart"
                        value="<?php echo $effdate  ?>" name="dd_premfrq_a" class="form-control validate"
                        readonly="readonly">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Insurance End date:</label>
                    <input type="text" name="dd_coverprdend" id="dd_coverprdend" value="<?php echo $enddate  ?>"
                        class="form-control " readonly="readonly" required>
                </div>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Year of Car Make:</label>
                    <input type="text" name="yearofmake" id="yearofmake" value="" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right">Term:</label>
                    <input type="text" required="required" name="term" id="term" value="<?php echo $term  ?>"
                        name="dd_premfrq_a" class="form-control validate" readonly="readonly">
                </div>

                <div class="form-group md-form mt-3">
                    <label for="repeatPassword-3" data-error="wrong" data-success="right"> No Of Seats:</label>

                    <input type="text" name="seats" id="seats" class="form-control">
                </div>

                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>
            </div>
        </div>


        <!-- Second Step -->
        <div class="row setup-content-3" id="step-6">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Vehicle Inspection:</strong></h3>
                <div class="form-group md-form">
                    <label for="yourName-3" data-error="wrong" data-success="right">Select State:</label>
                    <input type="text" name="state" id="state" class="form-control">
                </div>
                <div class="form-group md-form mt-3">
                    <label for="secondName-3" data-error="wrong" data-success="right">Enter Address:</label>
                    <input type="text" name="vecaddr" id="vecaddr" class="form-control">
                </div>

                <h3 class="font-weight-bold pl-0 my-4"><strong>Terms and conditions</strong></h3>
                <div class="form-check">
                    <input type="checkbox" id="checkbox115" class="form-check-input">
                    <label for="checkbox115" class="form-check-label">I agree to the terms and conditions</label>
                </div>

                <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
                <button class="btn btn-secondary nextBtn-3 float-right" type="button">Next</button>


            </div>
        </div>


        <!-- Third Step -->

        <!-- Fourth Step -->
        <div class="row setup-content-3" id="step-7">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-0 my-4"><strong>Finish</strong></h3>
                <!--h2 class="text-center font-weight-bold my-4">Registration completed!</h2-->

            </div>
            <button class="btn btn-secondary prevBtn-3 float-left" type="button">Previous</button>
            <button class="btn btn-success btn-rounded float-right" name="submit" type="submit">Submit</button>
        </div>
        </form>

    </div>
    <!-- Grid column -->

</div>
