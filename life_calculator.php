<script type="text/javascript">
function checkForms(form) {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;


    var DOB = new Date(this.dbirth.value);
    var today = new Date();
    var age = today.getTime() - DOB.getTime();
    age = Math.floor(age / 31536000000);
    agenext = age + 1; //age next

    var minage = 18;
    if (this.insureval.value == "") {
        // alert("Please select your product plan");
        this.insureval.focus();
        $('#insurevalError').html("<span class='text-danger'>Please Sum Assurd is Required</span>");
        return false;
    }
    if (this.desiredprem.value == "") {
        //alert("Please select your product plan");
        $('#desiredpremError').html("<span class='text-danger'>Please Premium is Required</span>");
        this.desiredprem.focus();
        return false;
    }

    if (this.covdur.value == "") {
        //alert("Please select your product plan");
        $('#covdurError').html("<span class='text-danger'>Please select cover duration</span>");
        this.covdur.focus();
        return false;
    }

    if (this.premfrq.value == "") {
        //alert("Please select your product plan");
        $('#premfrqError').html(
            "<span class='text-danger'>Please payment Frequency is Required</span>");
        this.premfrq.focus();
        return false;
    }

    if (this.curdate.value == "") {
        //alert("Please enter your SurName in the form");
        $('#curdateError').html("<span class='text-danger'><current date required</span>");
        this.curdate.focus();
        return false;
    }
    if (this.curdate.value < today) {
        //alert("Please enter your SurName in the form");
        $('#curdateError').html(
            "<span class='text-danger'>Please this input expect today's date...</span>");
        this.curdate.focus();
        return false;
    }
    if (agenext < minage) {
        //alert("Please select your product plan");
        $('#dbirthError').html(
            "<span class='text-danger'>Date of birth must be greater than 18yrs</span>");
        this.dbirth.focus();
        return false;
    }
    if (this.dbirth.value == "") {
        //alert("Please select your product plan");
        $('#dbirthError').html("<span class='text-danger'>input you date of birth</span>");
        this.dbirth.focus();
        return false;
    }

    if (this.covertypes.value == "") {
        //alert("Please select your product plan");
        $('#covertypesError').html("<span class='text-danger'>Select your cover types</span>");
        this.covertypes.focus();
        return false;
    }

    if (this.periodstartdate.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='text-danger'>input you date of Period Start Date</span>");
        //this.opt.focus();
        return false;
    }

    if (this.periodenddate.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='text-danger'>input you date of Period End Date</span>");
        //this.opt.focus();
        return false;
    }



    $('#product_msg').html('');
}
</script>
<div class="card-body form-row">
    <div class="life-cal-left life-cal-form">
        <div class="form-group">
            <label for="insureval">Sum Assurd</label>
            <input type="text" class="form-control" name="insureval" id="insureval" required>
            <div id="insurevalError"></div>
        </div>
        <div class="form-group">
            <label for="desiredprem">Premium</label>
            <input type="text" class="form-control" name="desiredprem" id="desiredprem" required>
            <div id="desiredpremError"></div>
        </div>

        <div class="form-group">
            <label for="covdur">Cover Duration</label>
            <select class="form-control" name="covdur" id="covdur" required>
                <option value="">Select Cover Duration</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
            </select>
            <div id="covdurError"></div>
        </div>
    </div>


    <div class="life-cal-form">
        <div class="form-group">
            <label for="premfrq">Payment Frequency</label>
            <select class="form-control" name="premfrq" id="premfrq" required>
                <option value="">Select Payment Frequency</option>
                <option value="M">Monthly ... M - M</option>
                <option value="Q">Quarterly ... Q - Q</option>
                <option value="H">Half-Yearly ... H - H</option>
                <option value="Y">Yearly ... Y - Y</option>
            </select>
            <div id="premfrqError"></div>
        </div>

        <div class="form-group">
            <label>Current Date</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="curdate" id="curdate" value="<?= date("Y-m-d") ?>"
                    data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>Date Of Birth</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="dbirth" id="dbirth" data-inputmask-alias="datetime"
                    data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                <div id="dbirthError"></div>
            </div>
            <!-- /.input group -->
        </div>
    </div>
</div>
