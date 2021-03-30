<?php

namespace App;

class Calendar
{
    /**
     * Year and month
     *
     * @var int
     */
    public $ym = null;
    /**
     * Calendar format
     *
     * @var int
     */
    private $timestamp = null;
    /**
     * Today
     *
     * @var string
     */
    public $today = null;
    /**
     * Title date
     *
     * @var null
     */
    public $title = null;
    /**
     * Previous month
     *
     * @var null
     */
    public $prev = null;
    /**
     * Next month
     *
     * @var null
     */
    public $next = null;
    /**
     * Number of days in the month
     *
     * @var string
     */
    private $day_count = null;
    /**
     * Days in a week
     *
     * @var string
     */
    private $str = null;
    /**
     * Weeks of the calendar
     *
     * @var array
     */
    public $weeks = [];
    /**
     * A week
     *
     * @var array
     */
    private $week = [];

    /**
     * construct the cart.
     */
    public function __construct($ym)
    {
        date_default_timezone_set('Europe/Amsterdam');

        // This month
        if($ym != null) {
            $this->ym = $ym;
        } else {
            $this->ym = date('Y-m');
        }
        
        // Check format
        $this->timestamp = strtotime($this->ym . '-01');
        if ($this->timestamp === false) {
            $this->ym = date('Y-m');
            $this->timestamp = strtotime($this->ym . '-01');
        }

        // Today
        $this->today = date('Y-m-j', time());

        // For H3 title
        $this->title = date('Y / m', $this->timestamp);

        // Create previous month
        $this->prev = date(
            'Y-m',
            mktime(
                0,
                0,
                0,
                date('m', $this->timestamp) - 1,
                1,
                date('Y', $this->timestamp)
            )
        );

        // Create next month
        $this->next = date(
            'Y-m',
            mktime(
                0,
                0,
                0,
                date('m', $this->timestamp) + 1,
                1,
                date('Y', $this->timestamp)
            )
        );

        // Number of the days in the month
        $this->day_count = date('t', $this->timestamp);

        // Days in a week
        $this->str = date(
            'w',
            mktime(0, 0, 0, date('m', $this->timestamp), 1, date('Y', $this->timestamp))
        );

        // Add remaining part of the other weeks
        for ($weekDay = 1; $weekDay <= $this->str; $weekDay++) {
            array_push($this->week, '');
        }

        for ($day = 1; $day <= $this->day_count; $day++, $this->str++) {
            $calendarDay = $day;
            $calendarDay = [
                'day' => $calendarDay,
                'date' => date('Y-m-d', mktime(0,0,0, date('m', strtotime($this->ym)), $calendarDay, date('Y', strtotime($this->ym))))
            ];
            array_push($this->week, $calendarDay);

            // End of the week OR End of the month
            if ($this->str % 7 == 6 || $day == $this->day_count) {
                if ($day == $this->day_count) {
                    // Add empty cell
                    for ($weekDay = 1; $weekDay <= (6 - ($this->str % 7)); $weekDay++) {
                        array_push($this->week, '');
                    }
                }

                $this->weeks[] = $this->week;

                // Prepare for new week
                $this->week = [];
            }
        }
    }
}