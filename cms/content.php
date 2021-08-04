<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MEDI & TOURS | CMS  name</title>
  <link rel="stylesheet" href="../css/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({
      icons: icons
    });
    $( "#toggle" ).button().on( "click", function() {
      if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        $( "#accordion" ).accordion( "option", "icons", null );
      } else {
        $( "#accordion" ).accordion( "option", "icons", icons );
      }
    });
  } );
  </script>

<!-- editor begin -->
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>-->
<script src="https://cdn.tiny.cloud/1/222w1a17qoj1bnj64jhoqx1mzpxmktql31u1zj07qsnbxb87/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: 'textarea'
      });
</script>
<style>


element.style {
}
h1 {
    font-size: 48px;
    font-family: aileron;
    font-weight: 200;
    line-height: 58px;
    color: #fff;
    margin-bottom: 10px;
}


</style>

<!-- editor end -->
</head>
<body>

<script> 
    function logout(){
      window.location = "index.php";
      alert('Successfully logged out!');
    }
</script>

<div 
    style="
    position: relative;
    width: 93%;
    background: #6CC417;
    padding: 20px 45px 40px;">
<h1>Welcome, Admin</h1>
<button onclick="logout();" style=" cursor: pointer; float: right; background: red;
    border: 1px solid red;
    color: #fff;
    border-radius: 3px;
    padding: 10px 30px;
    text-transform: uppercase;
    -webkit-transition: all 1s;
    -moz-transition: all 1s;
    -o-transition: all 1s;
    transition: all 1s;"><b>Logout</b></button>
</div>
 <br/>
 <div id="error" style="display: none;"><b>Content updated successfully!</b></div>
<div id="accordion">

  <h3>About Us Section</h3>
  <div style="height: auto; position: relative;">
      <form method="POST" action="index.php?update=&content=about_us">
          <textarea id="about_us" name="about_us"> <?php echo $med->_fetch_content('about_us'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  <h3>Our Founder Section</h3>
  <div>
     <form method="POST" action="index.php?update=&content=our_founder">
          <textarea id="our_founder" name="our_founder"> <?php echo $med->_fetch_content('our_founder'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  <h3>Our Services Section</h3>
  <div>
      <form method="POST" action="index.php?update=&content=our_services">
          <textarea id="our_services" name="our_services"> <?php echo $med->_fetch_content('our_services'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  
  
  <h3>How is works Section I</h3>
  <div>
      <form method="POST" action="index.php?update=&content=how_it_works_1">
          <textarea id="how_it_works_1" name="how_it_works_1"> <?php echo $med->_fetch_content('how_it_works_1'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  <h3>How is works Section II</h3>
  <div>
        <form method="POST" action="index.php?update=&content=how_it_works_2">
          <textarea id="how_it_works_2" name="how_it_works_2"> <?php echo $med->_fetch_content('how_it_works_2'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  <h3>How is works Section III</h3>
  <div>
      <form method="POST" action="index.php?update=&content=how_it_works_3">
          <textarea id="how_it_works_3" name="how_it_works_3"> <?php echo $med->_fetch_content('how_it_works_3'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>


  <h3>How is works Section IV</h3>
  <div>
      <form method="POST" action="index.php?update=&content=how_it_works_4">
          <textarea id="how_it_works_4" name="how_it_works_4"> <?php echo $med->_fetch_content('how_it_works_4'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>


  <h3>How is works Section V</h3>
  <div>
      <form method="POST" action="index.php?update=&content=how_it_works_5">
          <textarea id="how_it_works_5" name="how_it_works_5"> <?php echo $med->_fetch_content('how_it_works_5'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>

  <h3>Trips & Tours Section</h3>
  <div>
      <form method="POST" action="index.php?update=&content=why_sa">
          <textarea id="why_sa" name="why_sa"> <?php echo $med->_fetch_content('why_sa'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>
  </div>


  <h3>Contact Us Section</h3>
  <div>
    
      <form method="POST" action="index.php?update=&content=contact_us">
          <textarea id="contact_us" name="contact_us"> <?php echo $med->_fetch_content('contact_us'); ?>
          </textarea>
          <br/>
          <input type="submit" value="Update content"/>
          <br/>
      </form>

  </div>
</div>
 
<!--<button id="toggle">Toggle icons</button>-->
 
 
</body>
</html>