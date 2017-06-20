// The PerformanceTiming interface
perfData = window.performance.timing;

// Calculated Estimated Time of Page Load which returns negative value
est_time_ms = -(perfData.loadEventEnd - perfData.navigationStart);

//Converting est_time_ms from miliseconds to seconds
est_time_s = parseInt((est_time_ms/1000)%60)*100;

//console.log('Estimated ms: ' + est_time_ms);
//console.log('Estimated s: ' + est_time_s);

start = 0,
end = 100,
duration = est_time_s;
startProgressBar( start, end, duration );

function startProgressBar( start, end, duration ) {

	var range = end - start,
	current = start,
	//increment = end > start? 1 : -1,
	increment = end > start? 20 : -20,
	stepTime = Math.abs(Math.floor(duration / range));

	progressJs("#start").start();

	var timer = setInterval(function() {
		current += increment;
		progressJs("#start").set(current);
		
		if (current == end) {
			progressJs("#start").end();
			clearInterval(timer);
		}
	}, stepTime);
}