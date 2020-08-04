$(document).ready(function () {
  let result;
  // process the form
  $("#buynewPlanForm").submit(function (event) {
    event.preventDefault();

    const calculatedPrem = document.getElementById("calculatedPrem");
    const calculatedInsuredVal = document.getElementById(
      "calculatedInsuredVal"
    );

    const form = document.getElementById("buynewPlanForm");

    // console.log(8888, calculator);

    // get the form data
    var formData = {
      life_gen_opt: $("#life_gen_opt").val(),
      opt: $("#opt").val(),
      csurname: $("#csurname").val(),
      cothname: $("#cothname").val(),
      cemail: $("#cemail").val(),
      cgsm: $("#cgsm").val(),
      dbirth: $("#dbirth").val(),
      coverprdstart: $("#coverprdstart").val(),
      premfrq: $("#premfrq").val(),
      coverprdend: form["coverprdend"].value,
      insureval: $("#insureval").val(),
      insureva2l: form["insureval"].value,
      covertype: $("#covertype").val(),
    };

    console.log(9, formData);

    // const token = "Bearer 39109f7df56e1051c399e685066bb852";
    // process the form
    $.ajax({
      type: "GET", // define the type of HTTP verb we want to use (POST for our form)
      url: "reuseablefiles/calculator_desc.php?action=calculate", // the url where we want to POST
      headers: {
        // Authorization: token,
        "Content-Type": "application/json",
      },
      data: formData, // our data object
      // encode: true,

      success: function (data, status) {
        // console.log("data", data);
        const { result } = JSON.parse(data);
        var calculator = document.querySelector(".buy-new-plan-cal");
        // calculator.classList.remove("buy-new-plan-cal");

        calculator.style.display = "block";
        console.log(result);
        console.log(2, result.prem);
        console.log(9, calculatedPrem);
        console.log(10, calculatedInsuredVal);
        // console.log(10, formData);

        calculatedPrem.innerHTML = result.prem;

        calculatedInsuredVal.innerHTML = formData.insureval;
      },
      error: function (xhr, status, error) {
        // var err = eval("(" + xhr.responseText + ")");
        //console.log(333333, status);
        // var err = JSON.parse(xhr.responseText);
        console.log("err", error.responseText);
        //console.log("error", xhr.responseText);
      },
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
  });
});
