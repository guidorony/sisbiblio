<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        <title>home page</title>
    </head>
    <body>
        <div class="container">
            <div class="row clear_fix">
                <div class="col-md-12 ">
                    <blockquote>
                        <h3><strong>Welcome to codeigniter home page</strong></h3>

					<style>
                        #response{display: none}
                        div #fb, div #gp, div #tw{display: inline-block;}
                        #fb{width: 180px;}
                        #gp{width:  100px;}
                        #tw{width: 180px;}
                    </style>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
                    <div>
                        <div id="tw">
                            <a href="https://twitter.com/trycatchclasses" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @trycatchclasses</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                        <div id="gp">
                            <!-- Place this tag in your head or just before your close body tag. -->
                           <script src="https://apis.google.com/js/platform.js" async defer></script>
                           <!-- Place this tag where you want the +1 button to render. -->
                           <div class="g-plusone" data-href="https://plus.google.com/+TryCatchClassesMumbai"></div>
                       </div>
					    <div id="fb">
							<div class="fb-like" data-href="https://www.facebook.com/TryCatchClasses/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
						</div>
                    </div>                        
                    </blockquote>
                    
                    <a href="<?php echo base_url();?>index.php/auth/logout" class="btn btn-info btn-lg pull-right">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>
