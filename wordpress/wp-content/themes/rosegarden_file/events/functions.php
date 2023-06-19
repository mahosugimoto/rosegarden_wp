<?php
register_post_type(
    'event',
    array(
        'label' => 'Events',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar',
        'menu_position' => 5,
        'supports' => array(
            'title',
            'revisions',
        ),
    )
);

/**
 * Get event by month
 */
function getEvents()
{
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'event',
        'posts_per_page' => -1
    );

    $events = [];
    $posts = get_posts($args);
    foreach ($posts as $post) {
        setup_postdata($post);
        $eventDate = SCF::get('event_date', $post->ID);
        if (!empty($eventDate)) {
            $eventDate = str_replace(['.', '-', '/'], ['-', '-', '-'], $eventDate);
            $eventDate = date('Y-m-d', strtotime($eventDate));
        }
        $events[] = [
            'title' => $post->post_title,
            'event_date' => $eventDate,
            'background_color' => SCF::get('background_color', $post->ID),
        ];
    }

    return $events;
}

function getCalendars()
{
    // Get current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Get next month and year
    $nextMonth = $currentMonth + 1;
    $nextYear = $currentYear;
    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear++;
    }

    $events = getEvents();

    $eventCurrentMonth = getEventsByMonth($events, $currentMonth);
    $eventNextMonth = getEventsByMonth($events, $nextMonth);

    // Generate calendar
    $currentCalendar = generateCalendar($currentYear, $currentMonth, $eventCurrentMonth);
    $nextCalendar = generateCalendar($nextYear, $nextMonth, $eventNextMonth);

    return [
        'current_calendar' => $currentCalendar,
        'next_calendar' => $nextCalendar
    ];
}

function generateCalendar($year, $month, $events) {
    $firstDay = mktime(0, 0, 0, $month, 1, $year);
    $daysInMonth = date('t', $firstDay);
    $dayOfWeek = date('N', $firstDay);

    // Determine the number of days to shift to start with Sunday
    $shiftDays = $dayOfWeek;

    // Start the table
    $content = '<div class="event_calendar"><table>';

    // Month and year header
    $content .= '<caption>' . date('Y.m', $firstDay) . '</caption>';

    // Weekday header
    $content .= '<tr>';
    $content .= '<th class="sun">日</th>';
    $content .= '<th>月</th>';
    $content .= '<th>火</th>';
    $content .= '<th>水</th>';
    $content .= '<th>木</th>';
    $content .= '<th>金</th>';
    $content .= '<th class="sat">土</th>';
    $content .= '</tr>';

    // Calculate number of rows needed for the month
    $numRows = ceil(($daysInMonth + $shiftDays) / 7);

    // Day counter
    $currentDay = 1;

    // Generate the calendar cells
    for ($row = 1; $row <= $numRows; $row++) {
        $content .= '<tr>';

        for ($col = 1; $col <= 7; $col++) {
            if ($shiftDays > 0) {
                // Empty cell before the first day of the month
                $content .= '<td></td>';
                $shiftDays--;
            } elseif ($currentDay <= $daysInMonth) {
                // Calendar day cell
                $isSaturday = isSaturday($month, $currentDay, $year);
                $isSunday = isSunday($month, $currentDay, $year);
                $cellClass = '';
                if ($isSaturday) {
                    $cellClass = 'sat';
                }
                if ($isSunday) {
                    $cellClass = 'sun';
                }

                // check past date
                if (isPastDate($month, $currentDay, $year)) {
                    $cellClass .= ' past';
                }

                // check event date
                $style = '';
                $event = selectedEvent($events, $month, $currentDay, $year);
                if (!empty($event)) {
                    $style = 'style="background-color: '. $event['background_color'] .'; color: #fff"';
                }

                $content .= '<td class="' . $cellClass . '" '. $style .'>' . $currentDay . '</td>';
                $currentDay++;
            } else {
                // Empty cell after the last day of the month
                $content .= '<td></td>';
            }
        }

        $content .= '</tr>';
    }

    // Close the table
    $content .= '</table></div>';

    return $content;
}

function isSaturday($month, $day, $year) {
    $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
    $timestamp = strtotime($dateString);
    $dayOfWeek = date('N', $timestamp);
    return ($dayOfWeek == 6);
}

function isSunday($month, $day, $year) {
    $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
    $timestamp = strtotime($dateString);
    $dayOfWeek = date('N', $timestamp);
    return ($dayOfWeek == 7);
}

function isPastDate($month, $day, $year) {
    $currentDate = date('Y-m-d');
    $selectedDate = sprintf('%04d-%02d-%02d', $year, $month, $day);

    return ($selectedDate < $currentDate);
}

function selectedEvent($events, $month, $day, $year)
{
    if (empty($events)) {
        return false;
    }
    
    $searchDate = sprintf('%04d-%02d-%02d', $year, $month, $day);

    foreach ($events as $event) {
        if ($event['event_date'] === $searchDate) {
            return $event;
        }
    }

    return false;
}

function getEventsByMonth($events, $month)
{
    $month = sprintf('%02d', $month);
    $filteredEvents = array_filter($events, function ($event) use ($month) {
        if (!empty($event['event_date'])) {
            $eventMonth = date('m', strtotime($event['event_date']));
            return $eventMonth === $month;
        }
    });

    return $filteredEvents;
}

function custom_event_shortcode() {
    $events = getCalendars();
    $content = $events['current_calendar'] . $events['next_calendar'];
    return $content;
}
add_shortcode('event_calendar', 'custom_event_shortcode');