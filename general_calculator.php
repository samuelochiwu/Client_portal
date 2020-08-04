<script type="text/javascript">
function checkForm(form) {

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;


    if (this.insureval.value == "") {
        // alert("Please select your product plan");
        //this.insureval.focus();
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> Please Sum Assurd is Required</span>");
        return false;
    }
    if (this.covertype.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b>Select your cover types</span>");
        //this.opt.focus();
        return false;
    }
    if (this.coverprdstart.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> input you date of Period Start Date</span>");
        //this.opt.focus();
        return false;
    }

    if (this.coverprdend.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> input you date of Period End Date</span>");
        //this.opt.focus();
        return false;
    }



    $('#product_msg').html('');
}
</script>

<div class="form-group">
    <label for="insurevalInputEmail1">Sum Assurd</label>
    <input type="text" class="form-control" name="insureval" id="insureval">
</div>

<div class="input-group mb-3">
    <select name="covertype" id="covertype" class="form-control">
        <option value="">Select Cover type</option>
        <option value="11000">Comprehensive - 11000</option>
        <option value="13000">Third Party - 13000</option>
        <option value="00235">Third Party Fire &amp; Theft - 00235</option>

    </select>
</div>

<div class="form-group">
    <label>Period Start Date</label>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="coverprdstart" id="coverprdstart" data-inputmask-alias="datetime"
            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
    </div>
    <!-- /.input group -->
</div>
<div class="form-group">
    <label>Period End Date</label>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="coverprdend" id="coverprdend" data-inputmask-alias="datetime"
            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
    </div>
    <!-- /.input group -->
</div>