
(function ($) {

    "use strict";


    $('#tooltip-hover').tooltipster();

    $('#tooltip-events').tooltipster({
        trigger: 'click'
    });

    $('#tooltip-html').tooltipster({
        content: $('<p style="text-align:left;"><strong></strong> Applicake lollipop oat cake gingerbread.</p>'),
		 //content: $('<img src=".../assets/images/users/avatar-2.jpg" width="50" height="50" /><p style="text-align:left;"><strong></strong> Applicake lollipop oat cake gingerbread.</p>'), 
        // setting a same value to minWidth and maxWidth will result in a fixed width
        minWidth: 300,
        maxWidth: 300,
        position: 'right'
    });

    $('#tooltip-touch').tooltipster({
        touchDevices: false
    });

    $('#tooltip-animation1').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation2').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation3').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation4').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation5').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation6').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation6').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation7').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation8').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation9').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation10').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation11').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation12').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation13').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation14').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation15').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation16').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation17').tooltipster({
        animation: 'grow'
    });
	 $('#tooltip-animation18').tooltipster({
        animation: 'grow'
    });

    $('#tooltip-interaction').tooltipster({
        contentAsHTML: true,
        interactive: true
    });

    // Multiple tooltips
    $('#tooltip-multiple').tooltipster({
        animation: 'swing',
        content: 'North',
        multiple: true,
        position: 'top'
      });

      $('#tooltip-multiple').tooltipster({
        content: 'East',
        multiple: true,
        position: 'right'
      });

      $('#tooltip-multiple').tooltipster({
        animation: 'grow',
        content: 'South',
        delay: 200,
        multiple: true,
        position: 'bottom'
      });

      $('#tooltip-multiple').tooltipster({
        animation: 'fall',
        content: 'West',
        multiple: true,
        position: 'left'
      });

})(jQuery);