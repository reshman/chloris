
<!DOCTYPE html>
<html>
<head>
<title>Chloris Designs | Contact </title>
<link href='https://fonts.googleapis.com/css?family=Fanwood+Text' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<link rel="stylesheet" href="css/new.css">
<!-- /start menu -->
</head>
<body> 
<div class="full">
<!--header-->	
<?php include_once 'header.php';?>
<!---->
<?php
if(isset($_POST['submit'])){
    $userName  = trim($_POST['userName']);
    $userEmail = trim($_POST['userEmail']);
    $userPhone = trim($_POST['userPhone']);
    $userMsg   = trim($_POST['userMsg']);
    
    //send mail to chloris admin
    $email_template_contact = file_get_contents("email_template_contact.html");
    $email_template_contact = str_replace("{{userName}}", $userName, $email_template_contact);
    $email_template_contact = str_replace("{{userEmail}}", $userEmail, $email_template_contact);
    $email_template_contact = str_replace("{{userPhone}}", $userPhone, $email_template_contact);
    $email_template_contact = str_replace("{{userMsg}}", $userMsg, $email_template_contact);
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $userEmail" . "\r\n";
    $to= 'jaya@imrokraft.com';
    $subject = "Enquiry";
//    echo $email_template_contact;die;
    $resultEmail = mail($to,$subject,$email_template_contact,$headers);
    
    if($resultEmail){
        $_SESSION['success'] = 1;
    }else{
        $_SESSION['success'] = 2;
    }
}
?>
<div class="contact">
	  <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Contact</li>
		 </ol>
      
			<!---start-contact---->
			<h3>Contact Us</h3>
		  <div class="section group">				
				<div class="col-md-6 span_1_of_3">
					<div class="contact_info">
			    	 	<h4>Find Us Here</h4>
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:0.85em">View Larger Map</a></small>
					   		</div>
      				</div>
      			            <div class="company_address">
				     	<h4>Company Information :</h4>
						<p>500 Lorem Ipsum Dolor Sit,</p>
						<p>22-56-2-9 Sit Amet, Lorem,</p>
						<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <a href="mailto:info@example.com">info@mycompany.com</a></p>
				   		<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
				   </div>
				</div>				
				<div class="col-md-6 span_2_of_3">
				  <div class="contact-form">
                                      <?php
                                      if(!empty($_SESSION['success'])) {
                                          if($_SESSION['success']==1){?>
                                         
                                      <div class="alert alert-success alert-dismissable" id="status-message">

                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

                                          Enquiry Sent Successfully <a href="#" class="alert-link"></a>

                                     </div>
                                      <?php
                                          }else{ ?>
                                      <div class="alert alert-danger alert-dismissable" id="status-message">

                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

                                          Failed to send enquiry <a href="#" class="alert-link"></a>

                                     </div>
                                          <?php    
                                          }
                                           unset($_SESSION['success']);
                                      }
                                      ?><script>
                                            $('#status-message').fadeOut(5000);
                                        </script>
                                      
                                      <form method="POST" role="form" id="contact-form">
					    	    <div>
						    	<span><label>NAME</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   	<span><input type="submit" class="mybutton" name="submit" value="Submit"></span>
						  </div>
					    </form>

				    </div>
  				</div>				
		  </div>
	  </div>
 </div>
<!---->
<?php include_once 'footer.php';?>
</div>
<!---->	
</div>	
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #contact-form element
    $("#contact-form").validate({
    
        // Specify the validation rules
        rules: {
            userName: "required",
            userEmail: {
                required: true,
                email: true
            },
            username: "required",
            userPhone: {
                required: true,
                minlength: 10, //or look at the additional-methods.js to see available phone validations
                maxlength: 15,
                number: true
            },
            userMsg: {
                required: true,
                minlength: 5
            }
        },
        
        // Specify the validation error messages
        messages: {
            userName: "Please enter your name",
            userPhone: {
                        required: "Please enter your phone number.",
                        minlength: "Enter valid phone number",
                        maxlength: "Enter valid phone number",
                        number: "Enter valid phone number"
                        },
            userEmail: {required: "Please enter email address", email: "Please enter a valid email address"},
            userMsg: {required: "Please enter Message", minlength: "Your message must be at least 5 characters long"}
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
<script pagespeed_no_defer="">//<![CDATA[
(function(){var c=encodeURIComponent,f=window,h="performance",k="unload:",l="on",m="load:",n="load",p="ets=",q="beforeunload",r="EventStart",s="?",t="=",u="&url=",v="&ttfb=",w="&req_start=",x="&ref=",y="&r",z="&nt=",A="&nrp=",B="&nav=",C="&ifr=1",D="&ifr=0",E="&htmlAt=",F="&fp=",G="&dwld=",H="&dom_c=",I="&dns=",J="&connect=",K="&ccul=",L="&ccrl=",M="&ccos=",N="&ccis=",O="&cces=",P="&b_csi=",Q="&",R="";f.pagespeed=f.pagespeed||{};var S=f.pagespeed,T=function(a,d,b,e){this.d=a;this.a=d;this.b=b;this.e=e};S.beaconUrl=R;
T.prototype.c=function(){var a=this.d,d=f.mod_pagespeed_start,b=Number(new Date)-d,a=a+(-1==a.indexOf(s)?s:Q),a=a+p+(this.a==n?m:k),a=a+b;if(this.a!=q||!f.mod_pagespeed_loaded){a+=y+this.a+t;if(f[h]){var b=f[h].timing,e=b.navigationStart,g=b.requestStart,a=a+(b[this.a+r]-e),a=a+(B+(b.fetchStart-e)),a=a+(I+(b.domainLookupEnd-b.domainLookupStart)),a=a+(J+(b.connectEnd-b.connectStart)),a=a+(w+(g-e)),a=a+(v+(b.responseStart-g)),a=a+(G+(b.responseEnd-b.responseStart)),a=a+(H+(b.domContentLoadedEventStart-
e));f[h].navigation&&(a+=z+f[h].navigation.type);e=-1;b.msFirstPaint?e=b.msFirstPaint:f.chrome&&f.chrome.loadTimes&&(e=Math.floor(1E3*f.chrome.loadTimes().firstPaintTime));e-=g;0<=e&&(a+=F+e)}else a+=b;S.getResourceTimingData&&f.parent==f&&(a+=S.getResourceTimingData());a+=f.parent!=f?C:D;this.a==n&&(f.mod_pagespeed_loaded=!0,(b=f.mod_pagespeed_num_resources_prefetched)&&(a+=A+b),(b=f.mod_pagespeed_prefetch_start)&&(a+=E+(d-b)));S.panelLoader&&(d=S.panelLoader.getCsiTimingsString(),d!=R&&(a+=P+d));
S.criticalCss&&(d=S.criticalCss,a+=N+d.total_critical_inlined_size+O+d.total_original_external_size+M+d.total_overhead_size+L+d.num_replaced_links+K+d.num_unreplaced_links);this.b!=R&&(a+=this.b);document.referrer&&(a+=x+c(document.referrer));a+=u+c(this.e);S.beaconUrl=a;(new Image).src=a}};S.f=function(a,d,b,e){var g=new T(a,d,b,e);f.addEventListener?f.addEventListener(d,function(){g.c()},!1):f.attachEvent(l+d,function(){g.c()})};S.addInstrumentationInit=S.f;})();

pagespeed.addInstrumentationInit('/mod_pagespeed_beacon', 'load', '', 'contact.html');
//]]></script></body>

<!-- Mirrored from www.rxar.in/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2016 10:26:50 GMT -->
</html>