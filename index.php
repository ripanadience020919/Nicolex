<?php include("header.php"); ?>
 <section class="slider-section" id="home">
        <div class="swiper-container main_slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="main_slide ">
                       <div class="slider-banner">
					    <img src="images/INFRASTRUCTURAL DEVELOPMENT.jpg" alt="" height="560px">
					   </div>
					    <div class="container">
					   <div class="slider-banner-txt">
					   
					    <div class="slider-txt">
						 <h1>INFRASTRUCTURAL DEVELOPMENT <span></span></h1>
						</div>
					   </div>
					   
                </div>
				</div>
				</div>
				                <div class="swiper-slide">
                    <div class="main_slide ">
                       <div class="slider-banner">
					    <img src="images/FOR URBAN DEVELOPMENT.jpg" alt=""  height="560px">
					   </div>
					    <div class="container">
					   <div class="slider-banner-txt">
					    <div class="slider-txt">
						 <h1>FOR URBAN  DEVELOPMENT<span></span></h1>
						</div>
					   </div>
                </div>
				</div>
				</div>

 <div class="swiper-slide">
                    <div class="main_slide ">
                       <div class="slider-banner">
					    <img src="images/IMPROVED CHILD AND MATERNAL HEALTH  CARE.jpg" alt=""  height="560px">
					   </div>
					    <div class="container">
					   <div class="slider-banner-txt">
					    <div class="slider-txt">
						 <h1>IMPROVED CHILD  AND MATERNAL HEALTH  CARE<span></span></h1>
						</div>
					   </div>
                </div>
				</div>
				</div>
				 <div class="swiper-slide">
                    <div class="main_slide ">
                       <div class="slider-banner">
					    <img src="images/IMPROVED STANDARD OF EDUCATION.jpg" alt=""  height="560px">
					   </div>
					    <div class="container">
					   <div class="slider-banner-txt">
					    <div class="slider-txt">
						 <h1>IMPROVED STANDARD OF EDUCATION <span></span></h1>
						</div>
					   </div>
                </div>
				</div>
				</div>
				 <div class="swiper-slide">
                    <div class="main_slide ">
                       <div class="slider-banner">
					    <img src="images/IMPROVED AND ACCESSIBLE MEDICARE  FOR ALL.jpg" alt=""  height="560px">
					   </div>
					    <div class="container">
					   <div class="slider-banner-txt">
					    <div class="slider-txt">
						 <h1>IMPROVED AND ACCESSIBLE MEDICARE  FOR ALL<span></span></h1>
						</div>
					   </div>
                </div>
				</div>
				</div>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination main_nav"></div>
        </div>
		 </div>
        </section>

<section class="advertsiement-home">
  <div class="container">
<div class="row">
	        <div class="col-md-12">
	          <div class="business-advertisement-slider">
			     <div class="swiper-container busads_slider_inner">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="business-ads-slide">
					 <img src="images/ads-1.jpg" alt="">
					 </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="business-ads-slide">
					 <img src="images/ads-2.jpg" alt="">
					 </div>
                  </div>
                <div class="swiper-slide">
                     <div class="business-ads-slide">
					 <img src="images/ads-3.jpg" alt="">
					 </div>
                  </div>
               </div>
			    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
            </div>
      
			  </div>
	  </div>
	 
	        </div>
              
           </div>   
              
  </div>
</section>
<?php include("footer.php");?>
<!--<section class="number-counter">
  <div class="container">
<div class="row">
	        <div class="col-sm-4 col-md-6">
	      <div class="counter-user text-right">
      <i class="fa fa-user fa-2x"></i>
	  </div>
	  </div>
	  <div class="col-sm-8 col-md-6">
	    <div class="counter text-left">
      <h2 class="timer count-title count-number" data-to="100" data-speed="1500">100</h2>
       <p class="count-text ">Number of Registered User</p>
	   </div>
    </div>
	        </div>
 
 
 </div>   
</section>-->

<!--<section class="number-user">
  
</section>-->

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