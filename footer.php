
<section class="footer-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="footer_logo">
                     <img src="images/footer-logo.png" alt="">
					
                     <p style="color:white;">Nicolex is an Online Payment Solution designed for States and Local governments in Nigeria as a Revenue Collection System .</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="footer_link">
                     <h3><span>Useful </span> Link</h3>
                     <ul>
                         <li><a href="faq.php">FAQ</a></li>
                        <li><a href="privacypolicy.php">Privacy Policy</a></li>
                        <li><a href="terms.php">Terms &amp; Conditions</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Latest News</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="footer_contact">
                     <h3><span>Contact </span> Us</h3>
					 <?PHP
                    $con=new Users;
                    $conect=$con->getcontact_us();      
                    foreach ($conect as $value) {
		?>
                     <div class="row footer_con_icon d-flex">
                        <div class="d-flex footer_icon">
                           <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-phone-alt"></i></span></div>
                           <a href="contactus.php"  class="text  d-flex"><?php echo $value['mobile'];?></a>
                        </div>
                        <div class="d-flex footer_icon">
                           <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-envelope"></i></span></div>
                           <a href="contactus.php"  class="text  d-flex"><?php echo $value['email'];?></a>
                        </div>
                        <div class="d-flex footer_icon">
                           <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-map-marker-alt"></i></span></div>
                           <a href="contactus.php" class="text address d-flex"><?php echo $value['address1'];?></a>
                        </div>
                     </div>
                  </div>
               </div>
                    <?php } ?>
            </div>
         </div>
         <div class="footer_copyright">
            <div class="container">
                     <p>Copyright ©2019 All rights reserved </p>
              
            </div>
         </div>
      </section>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/swiper.min.js"></script>
  
   <script>
   function openNav() {
  document.getElementById("myNav").style.display = "block";
}

function closeNav() {
  document.getElementById("myNav").style.display = "none";
}
	
   $(".navbar-nav a, .scroll-icon a, .appai-preview .button-group a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        }
    });
	 $('body').scrollspy({ target: '#navbarNav' })
   $(document).on("click", ".navbar-nav a", function() {
        $(".navbar-nav").find("li").removeClass("active");
        $(this).closest("li").addClass("active");
    });
	
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 0) {
            $('.header-section').addClass("navbar-fixed-top");
        } else {
            $('.header-section').removeClass("navbar-fixed-top");
        }
    });
	 var swiper = new Swiper('.swiper-container.main_slider', {
			  loop: true,
                autoplay: true,
                pagination: {
                    el: '.swiper-pagination.main_nav',
                    clickable: true,
                },
            });
			
	  var swiper = new Swiper('.swiper-container.busads_slider_inner', {
          loop:true,
         autoplay:true,
             slidesPerView: 3,
             spaceBetween: 10,
             slidesPerColumn: 1,
             // init: false,
             navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
             breakpoints: {
                 320: {
                     slidesPerView: 1,
                     spaceBetween: 20,
                 },
                 540: {
                     slidesPerView: 1,
                     spaceBetween: 20,
                 },
                 768: {
                     slidesPerView: 2,
                     spaceBetween: 40,
                 },
                 1024: {
                     slidesPerView: 2,
                     spaceBetween: 50,
                 },
             }
         });
</script> 


<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>

</body>
</html>