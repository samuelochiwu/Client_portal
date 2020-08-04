<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client | Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/style.css?=1">

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <!-- Theme style -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!---Datepicker--->



    <!--Datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
    $(document).ready(function() {
        $("#curdate, #dbirth, #datef1, #benef_dbirth1, #benef_dbirth, #dd_dbirth, #dateto, #dob, #coverprdend, #coverprdstart")
            .datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: "-80:+2"

            });
    });
    </script>
    <style>
    .register {

        /*margin-top: 3%;*/
        padding: 0px;
        opacity: 1;
        background-size: cover;
        overflow: scroll;
        height: 100%;
        /* padding-left: 5%; */


    }

    .register-left {

        width: 40%;
        float: left;
        height: 100%;

        min-width: 300px;
        z-index: -1;
    }

    .register-right {
        padding-top: 25px;
        /* float: left;
        width: 50%;
        min-width: 400px; */
    }

    .register-right2 {
        margin-left: 10%;
    }

    .getstarted-container {
        flex-wrap: nowrap;
    }



    .process-cal-btn {
        padding-left: 10%;
    }

    @media screen and (max-width: 992px) {
        .auth-image {
            display: none;
        }
    }

    @media screen and (max-width: 600px) {
        .form-width2 {
            justify-content: center;
        }

        .steps-form-3 {
            margin-right: 50px;
        }

        .life-cal-form {
            width: 94%;
        }
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;

    }

    title {
        position: fixed;
    }

    .email-exist-error {
        color: red;
        font-size: 15px;
        text-align: center;
        margin-bottom: 0px;
    }


    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-form {
        max-width: 578px;
        margin-top: -20px;
    }

    .register .register-form {
        padding-top: 0px;
        padding-bottom: 40px;
        /*margin-top: 10%;*/

        opacity: 1;
        color: #495057;
        display: flex;
        justify-content: center;
        align-content: center;
        /* margin-top: 20px; */
        margin-bottom: 20px;


    }

    .form-width {

        /* width: 25%; */
        align-self: center;
        color: #495057;
        min-width: 300px;
        margin: 0px, auto;


    }

    .form-width2 {
        background-image: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(0, 0, 0, 0.4)),
            url("./plugins/jquery-ui/images/form3.jpg");

        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        display: flex;

        min-width: 300px;
        ;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

    div.transbox {
        border: 0px;
        background-color: #0c2521;

        color: #ffff;
    }

    .form-trans {
        opacity: 0.7;
    }

    .name-tag {
        color: white;
        padding-top: 20px;
        font-size: 17px;

        padding-bottom: -20px;
        text-align: center;
    }

    .getstarted {
        width: 240px;
    }

    #dbirthError span {
        color: red;
    }

    @media screen and (min-width: 700px) {
        .life-cal-left {
            margin-right: 20px;
        }
    }

    @media screen and (min-width: 992px) {
        .register-right {
            padding-left: 5%;
        }

        .process-cal-btn {
            padding-left: 6%;
            margin-top: -20px;
        }

        .life-cal-form {
            max-width: 225px;
        }
    }

    @media screen and (max-width: 768px) {
        .register-right {
            width: 100%;
        }
    }
    </style>
</head>
