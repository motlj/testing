<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"> <!--Unicode Tranformation Format 8-bit-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--tells new versions of IE to fall back into compatibilty mode to mimic older versions-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tacos Tacos Tacos</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
 </head>
 <body>


<!--this is the php for the navbar-->
<?php require_once('nav.php');?>


  <!--This is the start of a nav bar in html
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="fiesta" class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="taco.html" class="fiesta" class="black">Tacos Tacos Tacos <small>&reg;</small></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="fiesta"><a href="index.html">Home</a></li>
          <li class="fiesta"><a href="products.html">Types of Tacos</a></li> 
          <li class="fiesta"><a href="about.html">About Tacos</a></li>
          <li class="fiesta"><a href="contact.html">Contact Our Tacos</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  this is the end of the navbar-->
  <br>
  <br>
  <br>
  <form name="contactform" method="post" action="email_form.php">
    <table width="450px">
      <tr>
        <td valign="top">
          <label for="first_name">First Name *</label>
        </td>
        <td valign="top">
          <input  type="text" name="first_name" maxlength="50" size="30">
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="last_name">Last Name *</label>
        </td>
        <td valign="top">
          <input  type="text" name="last_name" maxlength="50" size="30">
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="email">Email Address *</label>
        </td>
        <td valign="top">
          <input  type="text" name="email" maxlength="80" size="30">
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="telephone">Telephone Number</label>
        </td>
        <td valign="top">
          <input  type="text" name="telephone" maxlength="30" size="30">
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="comments">Comments *</label>
        </td>
        <td valign="top">
          <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center">
          <input type="submit" value="Submit">   <a href="http://www.freecontactform.com/email_form.php">Email Form</a>
        </td>
      </tr>
    </table>
  </form>





    <!--this is a comment while working on the form
    <h2 class="mayan">If you have any questions, comments or suggestions, please send them all to Cornelious:</h2>
    <h3 class="mayan">cornelious.oswald.taco.king@gmail.com</h3>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">   
        <form id="form" action="MAILTO:someone@example.com" method="post" enctype="text/plain">
          Name:
        <br>
          <input type="text" name="name" value="your name"><br>
            E-mail:
          <br>
          <input type="text" name="mail" value="your email"><br>
            Comment:
          <br>
          <input type="text" name="comment" value="your comment" size="100"><br><br>
          <input type="submit" value="Send">
          <input type="reset" value="Reset">
        </form>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">   
        <img title="mail" alt="mail" src="assets/img/mail.jpg">
      </div>
    </div>
    -->


  <!--this is the link to the footer using php-->
  <?php require_once('footer.php');?>



      <!--this is the start of the footer in html
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="row">
      <div class="container">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <center class="emphasis">&reg;2016</center>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <a href="sitemap.html"><center>Site Map</center></a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <center class="emphasis">&copy;Josh Motl 2016</center>
        </div>
      </div>
    </div>
  </nav>
  this is the end of the footer. should also be the same on every page sans Site Map.-->



  <link rel="shortcut icon" type="image/png" href="assets/img/taco.ico">
    <!--this link should put a taco in as the tab icon-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>  
    <!-- the about scripts are javascript-->
 </body>
</html>
