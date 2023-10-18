
if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {

		$('.bi14-audio-player').each(function(){
			var music 		= $(this).find("#music");
			var playButton 	= $(this).find("#play");
			var pauseButton = $(this).find("#pause");
			var playhead 	= $(this).find("#elapsed");
			var timeline 	= $(this).find("#slider");
			var timer 		= $(this).find("#timer");
			var forward		= $(this).find("#forward");
			var backward	= $(this).find("#backward");
			var theme_style	= $(this).attr("data-theme-style");
			var control_button_color	= $(this).attr("data-control-button-color");
		
			pauseButton.css('visibility', 'hidden');
			var timelineWidth = timeline.width() - playhead.width();
			
			var updateTime = function timeUpdate() {
		
				var playPercent = timelineWidth * (this.currentTime / this.duration);
				playhead.css('width',  playPercent+"px");

				var secs = this.currentTime;
				var tcMins = parseInt(secs/60);
				var tcSecs = parseInt(secs - (tcMins * 60));

				if (tcSecs < 10) { tcSecs = '0' + tcSecs; }
				timer.html(tcMins + ':' + tcSecs);
				
			}
		
			music.bind('timeupdate', updateTime);

	
			playButton.on('click' , function() {
				music.get(0).play();
				playButton.css('visibility' , "hidden") ;
				pauseButton.css('visibility' , "visible");
			});
	
			pauseButton.on('click' , function() {
				music.get(0).pause();
				playButton.css('visibility' , "visible");
				pauseButton.css('visibility' ,"hidden" );
			});
	
			$(music).on("canplaythrough", function () {
				duration = music.duration;
			}, false);

			forward.on('click', forwardAudio);
			backward.on('click', backAudio);

			function startAudio(){
				music.trigger('play');
			}
	 
			function pauseAudio(){
				music.trigger('pause');
			}
			function forwardAudio(){
				pauseAudio();
				music.prop("currentTime",music.prop("currentTime")+5);
	
				if(pauseButton.css('visibility') === 'visible'){
					startAudio();
				}
			}
	 
			function backAudio(){
				pauseAudio();
				music.prop("currentTime",music.prop("currentTime")-5);
				if(pauseButton.css('visibility') === 'visible'){
					startAudio();
				}
			}
	
			if(theme_style === 'audio-player-theme-three'){
				$(this).find('#play, #pause').css('border' , '5px solid '+control_button_color+'');
			}
		
		});
	
		
    }(jQuery));

}
