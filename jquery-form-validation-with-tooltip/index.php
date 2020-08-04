<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
body{width:610px;}
#frmContact {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
#frmContact div{margin-bottom: 15px}
#frmContact div label{margin-left: 5px}
.demoInputBox{padding:10px; border:#F0F0F0 1px solid; border-radius:4px;}
.btnAction{background-color:#2FC332;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.invalid{border:#FF0000 1px solid;}
</style>
<style>
  .ui-tooltip {padding: 10px;color: #333;font-size: 12px;background: #FFACAC ;}
</style>  
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
function sendContact() {
	var valid;	
	valid = validateContact();
	if(valid) {
		jQuery.ajax({
		url: "contact_mail.php",
		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
		type: "POST",
		success:function(data){
		$("#mail-status").html(data);
		},
		error:function (){}
		});
	}
}

function validateContact() {
	var valid = true;
	$("#frmContact input[required=true], #frmContact textarea[required=true]").each(function(){
		$(this).removeClass('invalid');
		$(this).attr('title','');
		if(!$(this).val()){ 
			$(this).addClass('invalid');
			$(this).attr('title','This field is required');
			valid = false;
		}
		if($(this).attr("type")=="email" && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
			$(this).addClass('invalid');
			$(this).attr('title','Enter valid email');
			valid = false;
		}  
	}); 
	return valid;
}

  $(function() {
    $( document ).tooltip({
		position: {my: "left top", at: "right top"},
	  items: "input[required=true], textarea[required=true]",
      content: function() { return $(this).attr( "title" ); }
    });
  });

</script>
<div id="frmContact">
<div id="mail-status"></div>
<label style="padding-top:20px;">Name</label>
<div>
<input type="text" name="userName" id="userName" class="demoInputBox" required="true">
</div>
<label>Email</label>
<div>
<input type="email" name="userEmail" id="userEmail" class="demoInputBox" required="true">
</div>
<label>Subject</label> 
<div>
<input type="text" name="subject" id="subject" class="demoInputBox" required="true">
</div>
<label>Content</label> 
<div>
<textarea name="content" id="content" class="demoInputBox" cols="60" rows="6" required="true"></textarea>
</div>
<div>
<button name="submit" class="btnAction" onClick="sendContact();">Send</button>
</div>
</div>