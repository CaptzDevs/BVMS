<script>
    // sample calendar events data 123
'use strict'
var curYear = moment().format('YYYY');
var curMonth = moment().format('MM');
// Calendar Event Source
var appointment_success = {
	id: 1,
	events: [{
		id: '1',
		start: curYear + '-' + curMonth + '-02T09:00:00',
		end: curYear + '-' + curMonth + '-02T13:00:00',
		title: '1321Spruko Meetup',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}, {
		id: '2',
		start: curYear + '-' + curMonth + '-12T09:00:00',
		end: curYear + '-' + curMonth + '-12T17:00:00',
		title: 'Design Review',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}, {
		id: '3',
		start: curYear + '-' + curMonth + '-13T12:00:00',
		end: curYear + '-' + curMonth + '-13T18:00:00',
		title: 'Lifestyle Conference',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}, {
		id: '4',
		start: curYear + '-' + curMonth + '-21T07:30:00',
		end: curYear + '-' + curMonth + '-21T15:30:00',
		title: 'Team Weekly Brownbag',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}, {
		id: '5',
		start: curYear + '-' + curMonth + '-04T10:00:00',
		end: curYear + '-' + curMonth + '-06T15:00:00',
		title: 'Music Festival',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}, {
		id: '6',
		start: curYear + '-' + curMonth + '-23T13:00:00',
		end: curYear + '-' + curMonth + '-23T18:30:00',
		title: 'Attend Lea\'s Wedding',
		backgroundColor: 'rgba(59, 176, 1, 0.15)',
		borderColor: 'rgb(59, 176, 1)',
		description: 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'
	}]
};
var appointment_cancel  = {
	id: 2,
	backgroundColor: 'rgba(220, 53, 69, 0.15)',
	borderColor: 'rgb(220, 53, 69)',
	events: [{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},
	{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},{
		id: '10',
		start: curYear + '-' + curMonth + '-05',
		end: curYear + '-' + curMonth + '-05',
		title: 'Festival Day'
	},

]
};
var appointment_wait = {
	id: 3,
	backgroundColor: 'rgba(255, 193, 7, 0.15)',
	borderColor: 'rgb(255, 193, 7)',
	events: [{
		id: '13',
		start: curYear + '-' + curMonth + '-07',
		end: curYear + '-' + curMonth + '-09',
		title: 'My Rest Day'
	}, {
		id: '13',
		start: curYear + '-' + curMonth + '-29',
		end: curYear + '-' + curMonth + '-31',
		title: 'My Rest Day'
	}]
};

</script>

<script>

$(function() {
	'use strict'
	// Datepicker found in left sidebar of the page
	var highlightedDays = ['2018-5-10', '2018-5-11', '2018-5-12', '2018-5-13', '2018-5-14', '2018-5-15', '2018-5-16'];
	var date = new Date();
	$('.fc-datepicker').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: 'yy-mm-dd',
		beforeShowDay: function(date) {
			var m = date.getMonth(),
				d = date.getDate(),
				y = date.getFullYear();
			for (var i = 0; i < highlightedDays.length; i++) {
				if ($.inArray(y + '-' + (m + 1) + '-' + d, highlightedDays) != -1) {
					return [true, 'ui-date-highlighted', ''];
				}
			}
			return [true];
		}
	});
	var generateTime = function(element) {
		var n = 0,
			min = 30,
			periods = [' AM', ' PM'],
			times = [],
			hours = [12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
		for (var i = 0; i < hours.length; i++) {
			times.push(hours[i] + ':' + n + n + periods[0]);
			while (n < 60 - min) {
				times.push(hours[i] + ':' + ((n += min) < 10 ? 'O' + n : n) + periods[0])
			}
			n = 0;
		}
		times = times.concat(times.slice(0).map(function(time) {
			return time.replace(periods[0], periods[1])
		}));
		//console.log(times);
		$.each(times, function(index, val) {
			$(element).append('<option value="' + val + '">' + val + '</option>');
		});
	}
	generateTime('.main-event-time');
	// Initialize fullCalendar
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listWeek'
		},
		navLinks: true,
		selectable: true,
		selectLongPressDelay: 100,
		editable: true,
		nowIndicator: true,
		defaultView: 'listMonth',
		views: {
			agenda: {
				columnHeaderHtml: function(mom) {
					return '<span>' + mom.format('ddd') + '</span>' + '<span>' + mom.format('DD') + '</span>';
				}
			},
			day: {
				columnHeader: false
			},
			listMonth: {
				listDayFormat: 'ddd DD',
				listDayAltFormat: false
			},
			listWeek: {
				listDayFormat: 'ddd DD',
				listDayAltFormat: false
			},
			agendaThreeDay: {
				type: 'agenda',
				duration: {
					days: 3
				},
				titleFormat: 'MMMM YYYY'
			}
		},
		eventSources: [appointment_success, appointment_cancel, appointment_wait],
		eventAfterAllRender: function(view) {
			if (view.name === 'listMonth' || view.name === 'listWeek') {
				var dates = view.el.find('.fc-list-heading-main');
				dates.each(function() {
					var text = $(this).text().split(' ');
					var now = moment().format('DD');
					$(this).html(text[0] + '<span>' + text[1] + '</span>');
					if (now === text[1]) {
						$(this).addClass('now');
					}
				});
			}
			console.log(view.el);
		},
		eventRender: function(event, element) {
			if (event.description) {
				element.find('.fc-list-item-title').append('<span class="fc-desc">' + event.description + '</span>');
				element.find('.fc-content').append('<span class="fc-desc">' + event.description + '</span>');
			}
			var eBorderColor = (event.source.borderColor) ? event.source.borderColor : event.borderColor;
			element.find('.fc-list-item-time').css({
				color: eBorderColor,
				borderColor: eBorderColor
			});
			element.find('.fc-list-item-title').css({
				borderColor: eBorderColor
			});
			element.css('borderLeftColor', eBorderColor);
		},
	});
	var azCalendar = $('#calendar').fullCalendar('getCalendar');
	// change view to week when in tablet
	if (window.matchMedia('(min-width: 576px)').matches) {
		azCalendar.changeView('agendaWeek');
	}
	// change view to month when in desktop
	if (window.matchMedia('(min-width: 992px)').matches) {
		azCalendar.changeView('month');
	}
	// change view based in viewport width when resize is detected
	azCalendar.option('windowResize', function(view) {
		if (view.name === 'listWeek') {
			if (window.matchMedia('(min-width: 992px)').matches) {
				azCalendar.changeView('month');
			} else {
				azCalendar.changeView('listWeek');
			}
		}
	});
	// display current date
	var azDateNow = azCalendar.getDate();
	azCalendar.option('select', function(startDate, endDate) {
		$('#modalSetSchedule').modal('show');
		$('#mainEventStartDate').val(startDate.format('LL'));
		$('#EventEndDate').val(endDate.format('LL'));
		$('#mainEventStartTime').val(startDate.format('LT')).trigger('change');
		$('#EventEndTime').val(endDate.format('LT')).trigger('change');
	});
	// Display calendar event modal
	azCalendar.on('eventClick', function(calEvent, jsEvent, view) {
		var modal = $('#modalCalendarEvent');
		modal.modal('show');
		modal.find('.event-title').text(calEvent.title);
		if (calEvent.description) {
			modal.find('.event-desc').text(calEvent.description);
			modal.find('.event-desc').prev().removeClass('d-none');
		} else {
			modal.find('.event-desc').text('');
			modal.find('.event-desc').prev().addClass('d-none');
		}
		modal.find('.event-start-date').text(moment(calEvent.start).format('LLL'));
		modal.find('.event-end-date').text(moment(calEvent.end).format('LLL'));
		//styling
		modal.find('.modal-header').css('backgroundColor', (calEvent.source.borderColor) ? calEvent.source.borderColor : calEvent.borderColor);
	});
	// Enable/disable calendar events from displaying in calendar
	$('.main-nav-calendar-event a').on('click', function(e) {
		e.preventDefault();
		if ($(this).hasClass('exclude')) {
			$(this).removeClass('exclude');
			$(this).is(':first-child') ? azCalendar.addEventSource(appointment_success) : '';
			$(this).is(':nth-child(2)') ? azCalendar.addEventSource(appointment_cancel) : '';
			$(this).is(':nth-child(3)') ? azCalendar.addEventSource(appointment_wait) : '';
			/* $(this).is(':nth-child(4)') ? azCalendar.addEventSource(sptOtherEvents) : ''; */
		} else {
			$(this).addClass('exclude');
			$(this).is(':first-child') ? azCalendar.removeEventSource(1) : '';
			$(this).is(':nth-child(2)') ? azCalendar.removeEventSource(2) : '';
			$(this).is(':nth-child(3)') ? azCalendar.removeEventSource(3) : '';
			/* $(this).is(':nth-child(4)') ? azCalendar.removeEventSource(4) : ''; */
		}
		azCalendar.render();
		if (window.matchMedia('(max-width: 575px)').matches) {
			$('body').removeClass('main-content-left-show');
		}
	});

})
</script>