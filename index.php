<?php
    
   // print_r($_POST);
  //  $valid_email = false;
    $valid_subject = false; 
    $valid_question = false; 
    $valid_header = false;
    

    $errors = "";
    $success = "";

    if (isset($_POST['submit'])) {
    //    $email = $_POST["email"];
        $subject = $_POST["subject"]; 
        $question = $_POST["question"];
        $header = $_POST["header"];

        
          if ( !filter_var($header, FILTER_VALIDATE_EMAIL) )   {
         //   echo "<br><br>";
            //echo $email . " is invalid.";
             unset($_POST["header"]);
            //echo "<br><br>";
           // print_r($_POST);
            $valid_email = false;
            $errors .= "The email is invalid<br>"; 
            
         
        }   else    {
            $valid_header = true; 
        } 
        
        if ( $subject == "" )   {
            $valid_subject = false;
           // print_r($_POST); 
            unset($_POST["subject"]);
          //  echo "<br><br>";
        //    print_r($_POST);
           $errors .= "The subject is empty<br>";
           
        }   else    {
            $valid_subject = true;
        }

        if ( $question == "" )  {
            $valid_question = false; 
          //  unset($_POST["question"]);
           // echo "<br><br>";
            //print_r($_POST);
            $errors .= "The question is empty<br>";
        }   else    {
            $valid_question = true;
        }

        

        if ( $valid_question && $valid_subject && $valid_header )    {

            $to = "positivevibes4399@gmail.com";
            $subject = $_POST["subject"];
            $message = $_POST["question"];
            $header = $_POST["header"];

           if ( mail($to, $subject, $message, $header) ) {
            $success = '<div class="alert alert-success" role="alert"> Your email is sent! Will get back to your ASAP! </div>';
                
           }    else    {
                $errors =  '<div class = "container"> 
                <h4 class = "alert-heading"> The following errors are: </h4>
                <div class="alert alert-danger" role="alert" id = "failure" name = "failure">
                    Failure to send email. 
                    </div> </div>';
           } 


        }   else    {
            
            $errors =  '<div class = "container"> 
            <h4 class = "alert-heading"> The following errors: </h4> 
            <div class="alert alert-danger" role="alert">'
               . $errors . '</div> </div>';
        }
    
    } 
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type = "text/css">
   
   
    <title>INOS</title>
  </head>
  <body>

    <div class ="container"> 
        <h1 id = "contact">Contact me, I will reply back.</h1>
    </div>

    <!-- Alerts after submitting BEINGS here -->
    
    
    <div class = "container"> 
        <div id = "error">
            <? echo $errors.$success; ?>   
        </div>
    </div>
    <!-- Alerts after submitting here ENDS here -->

    <div class ="container">
    <form method = "post" id = "forms" >

    <!-- */   <div class="form-group">
            <label for="email">Email address</label>
            <input disabled type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder = "anthonychen33@gmail.com">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div> -->
        
        <div class="form-group">
            <label for="exampleInputPassword1">Subject</label>
            <input type="text" class="form-control" id = "subject" name = "subject">
        </div>

        <div class="form-group">
            <label for="text_summary" id = "text_summary"> Write what's on your mind here. </label>
            <textarea class = "non-resizable" name = "question" id = "question" rows = "4" cols = "70" ></textarea>
        </div>

        <div class = "form-group"> 
            <label for = "header">Your email</label>
            <input type = "text" class = "form-control" id = "header" name = "header"> 
        <small id="emailHelp" class="form-text text-muted">I will never share your email with anyone else. Your email is needed so I know where to send my reply to.</small>
        </div>

        <input type = "submit" class = "btn btn-primary" name = "submit" id = "submit"/>
    </form>
</div>

    <br> </br>
    <div class = "container"> 
        <div id = "aboutme"> About me: I created this simple site for anyone that needs to talk to someone and 
        cannot talk to anyone. If you send me something, I will read it and reply back. I am just trying to spread 
        positivity to the world. Your messages will only be seen by me and nobody else, you have my word. 
        Remember that you are not alone and you can do whatever the fuck you put your mind to. Never give up. 
        Also remember that I am not a therapist or anything. I'm just a random person online.
        </div> 
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      <!-- Optional JavaScript -->
      <script type = "text/javascript">
            // NOTE: When using PHP, the POST will not be taken if you stop the page from reloading 
            // after clicking the button, so you have to do your validation first and then return either
            // true or false depending on the validation. 

            // When you make it not return false, then you have not gotten the information yet. 
            
            // Look here, this is what I want it to do. 
            // So what we want to do is, on the click of the button, we will validate the email 
            // , then validate the subject. If validation fails then we will post the error alert, 
            // else submit the page and then PHP will do another validation. 
          //  var valid_email = false;
            var valid_subject = false;
            var valid_question = false; 
            var valid_header = false; 

           // var check_email = false; 
            var check_subject = false; 
            var check_question = false; 
            var check_header = false;

            var empty = false;
            

           // Javascript validation 
           // Need to do PHP validation 

           $("#forms").submit( function (e) {
                var errors = "";
                

                var email = document.getElementById("header").value;
                empty = validateSubject(email);
                //alert(isEmpty);

                if ( empty == false )  {
                  //  alert("This is empty");
                    check_header = false;
                }   else    {
                    check_header = validateEmail(email);
                } 

                 
                
                var subject = document.getElementById("subject").value; 
                check_subject = validateSubject(subject);

                var question = document.getElementById("question").value; 
                check_question = validateSubject(question); 
                
                // Validate email 
                 if ( check_header )    {

                    valid_header = true;  

                }   else if ( empty == false && check_header == false )  {
                    
                    errors += "<p> Your email is required </p>";

                }   else    {
                    
                    errors += "<p> Your email is invalid. </p>";

                } 

                // Validating email ends here 

                // Validating subject field if its empty 
                if ( check_subject )    {

                    valid_subject = true;  

                }   else    {

                    valid_subject = false;
                    errors += "<p> The subject is required. </p>";
                   
                }
                // Validating subject field ends here 

                // Validating question field is empty 
                if ( check_question )   {

                    valid_question = true; 
                  
                }   else    {

                    valid_question = false; 
                    errors += "<p> The question is required. </p>"; 
                 
                }
                
                // Validating question field ends here

                // If all of them are valid 

              //  alert("valid_email: " + valid_email + " valid_subject: " + valid_subject + " valid_question: " + valid_question);

                if ( valid_subject && valid_question && valid_header )   {
                   
                    return true;

                }   else    {
                
                    document.getElementById("error").innerHTML = 
                    '<div class = "alert alert-danger" role = "alert"> <h4 class = "alert-heading"> The following errors are: </h4>' 
                    + errors + '</div>';
                 /*   $("#error").html(
                '<div class = "alert alert-danger" role = "alert"> <h4 class = "alert-heading"> The following errors are: </h4>' + 
                      + errors + '</div>' 
                    ); */

                    return false;

                }
                    // Was not displaying it before because the id was the problem, had a name too. I think. 

           });
         
           


           function validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            };

            function validateSubject(subject)   {
                if ( subject == "" )    {
                    return false;
                } 

                return true; 
            }
 
           
   
       </script>



  

  
    </body>

</html>



