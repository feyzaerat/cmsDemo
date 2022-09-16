
<style>
    /****background-source****/
    /*https://www.freepik.com/free-vector/white-gold-hexagon-pattern-background_16330847.htm#page=7&query=background&position=0&from_view=keyword"*/
    @import url('https://fonts.googleapis.com/css?family=Tangerine');
    *

    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Calibri;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url("<?php echo base_url("assets/images/login-bg.jpg")?>");
        background-position: center;
        background-size: cover;
    }


    @media only screen and (min-width: 960px) {
        .form {
            position: relative;
            width: 350px;
            padding: 40px 40px 60px;
            background: #fefefe;
            border-radius: 10px;
            text-align: center;
            box-shadow: 1px 1px 10px rgba(7, 214, 229,0.7),
            -2px -2px 10px rgba(0, 0, 0, 0.01);
        }}
    @media only screen and (max-width: 959px) {
        body {
            min-height: 100vh;
            background-position: left;
        }

        .form {
            position: relative;
            width: 350px;
            padding: 40px 40px 60px;
            background: #fefefe;
            border-radius: 10px;
            text-align: center;
            box-shadow: -5px -5px 15px rgba(7, 214, 229, 0.5),
            5px 5px 15px rgba(0, 0, 0, 0.05);
        }}

    .form h2 {
        color: #868686;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 4px;
    }

    .form .input {
        text-align: left;
        margin-top: 40px;

    }

    .form .input .inputBox {
        margin-top: 20px;
    }

    .form .input .inputBox label {
        display: block;
        color: #868686;
        margin-bottom: 5px;
        font-size: 18px;
    }

    .form .input .inputBox input {
        width: 100%;
        height: 50px;
        background: #fefefe;
        border: none;
        outline: none;
        border-radius: 10px;
        padding: 5px 15px;
        font-size: 18px;
        color: #4b4b4a;
        text-align: center;
        box-shadow: inset -2px -2px 6px rgba(255, 255, 255, 0.01),
        inset 2px 2px 5px rgba(0, 0, 0, 0.8);

    }

    .form .input .inputBox input[type="submit"] {
        margin-top: 20px;
        color: #4b4b4a;
        box-shadow: -2px -2px 6px rgba(255, 255, 255, 0.01),
        2px 2px 5px rgba(0, 0, 0, 0.8);
    }

    .form .input .inputBox input[type="submit"]:active {
        margin-top: 20px;
        color: #4b4b4a;
        box-shadow: inset -2px -2px 6px rgba(255, 255, 255, 0.01),
        inset 2px 2px 5px rgba(249,200,81,0.05);
    }

    .form .input .inputBox input::placeholder {
        color: #4b4b4a;
        font-size: 14px;
        font-family: "Lucida Fax";
        text-align: center;

    }

    .forget {
        margin-top: 30px;
        color: #555;

    }

    .forget a {
        color: #f9c851;
    }

    .pull-right{
        text-align: right;



    }
    .input-form-error{
        color: white;
    }
    .icon{
        width: 25%;
        margin-top: -25px;
        margin-bottom: 20px;


    }

</style>