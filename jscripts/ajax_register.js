$(document).ready(function () {
  const errorElement = document.querySelector(".email-exist-error");
  let result;
  // process the form
  $("#registerForm").submit(function (event) {
    event.preventDefault();

    // get the form data
    var formData = {
      life_gen_opt: $("#life_gen_opt").val(),
      opt: $("#opt").val(),
      csurname: $("#csurname").val(),
      cothname: $("#cothname").val(),
      cemail: $("#cemail").val(),
      cgsm: $("#cgsm").val(),
    };

    const token = "Bearer 39109f7df56e1051c399e685066bb852";
    // process the form
    $.ajax({
      type: "GET", // define the type of HTTP verb we want to use (POST for our form)
      url: "process_register.php", // the url where we want to POST
      headers: {
        Authorization: token,
        "Content-Type": "application/json",
      },
      data: formData, // our data object
      encode: true,
      success: function (data, status) {
          //console.log("data", data);
        const result = JSON.parse(data);
        if (result["cltemail"]) {
          errorElement.textContent =
            "Email exists already, Please login to continue";
        } else {
          window.location.href = "process_calc.php";
        }
      },
      error: function (xhr, status, error) {
        // var err = eval("(" + xhr.responseText + ")");

        //console.log(333333, status);
        // var err = JSON.parse(xhr.responseText);
        //console.log("err", error.responseText);
        //console.log("error", xhr.responseText);
      },
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
  });
});
