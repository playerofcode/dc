<!-- Footer -->
<div class="footer w3ls">
	<div class="footer-2 w3ls">
		<div class="container">
			<div class="footer-main">
				<div class="footer-top">
					<div class="col-md-4 ftr-grid fg2">
						<h3>Our Address</h3>
						<div class="ftr-address">
							<div class="local">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="ftr-text">
								<p>Address-  H. No . 117/k73, Sarvoday Nagar, Kanpur - 208005, Near Devki Chauraha</p>
								<p>City Offices - Delhi, Kolkata</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="ftr-address">
							<div class="local">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="ftr-text">
								<p>+91 7380888777</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="ftr-address">
							<div class="local">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="ftr-text">
								<p><a href="mailto:prakhardixit9839@gmail.com">prakhardixit9839@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-4 ftr-grid">
						<div class="logo-fo">
							<h2><a href="index.php"><img src="<?php echo base_url('assets/images/logo.png');?>" class="img-fluid" width="100%"alt=""></a></h2>
						</div>
					</div>
					<div class="col-md-4 w3l_header_left-2">
						<div class="w3ls-social-icons-2">
							<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
							<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
							<a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a>
							<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
							<a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyrights">
		<p>&copy;2020 All Rights Reserved. dcorpconsultingtechnology.com | Developed by <a href="https://camssuccess.com/">CAMSSUCCESS</a></p>
	</div>	
</div>
<!-- //Footer -->
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery-2.1.4.min.js"></script>
<!-- Jquery Counter -->
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.counterup.min.js"></script>
<script>
	$(document).ready(function(){
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
</script>


<!-- Baneer-js -->
	<script src="<?php echo base_url('assets/');?>js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider").responsiveSlides({
				auto: true,
				pager:false,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>

<!-- //Baneer-js --> 
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/easing.js"></script>


<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- //js-scripts -->
<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 4,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
			$('#queryForm').submit(function(e){
				e.preventDefault();
				var name=$('#name').val();
				var mobno=$('#mobno').val();
				var email=$('#email').val();
				var message=$('#message').val();
				$.ajax({
				url: 'logic.php',
				method: 'POST',
				data:{name:name,mobno:mobno,email:email,message:message,action:'enquiry'},
				success:function(data)
				{
					$('#queryForm')[0].reset();
					$('#myModal1').modal('hide');
					alert(data);
				}
				})
			})
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal1').modal('show');
    });
</script>
<script src="<?php echo base_url('assets/');?>js/jzBox.js"></script>
</body>
</html>