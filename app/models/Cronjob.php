<?php

class Cronjob extends Eloquent {


    const MAX_CRON_HISTORY = 10;

    protected $table = 'cronjobs';
    protected $guarded = array('id');
    protected $fillable = array('task', 'mode', 'next', 'extra');
    public $timestamps = false;
    private static $modes = array(
        'daily' => 'day',
        'weekly' => 'week',
        'monthly' => 'month',
        'yearly' => 'year',
        'fortnightly' => 'fortnights',
        'deactivated' => 'deactivated',
        'custom' => 'custom',
    );

    static function get($task) {

        $cron = self::where('task', $task)->first();

        if (isset($cron->id)) {
            return $cron;
        }

        return false;
    }

    static function add($task, $mode, $next = null, $extra = null) {

        if (!isset(self::$modes[$mode])) {
            return false;
        }

        if (is_null($next)) {
            $next = date('Y-m-d H:i:s');
        }

        if (is_array($extra)) {
            $extra = serialize($extra);
        }

        $data = array(
            'task' => $task,
            'mode' => $mode,
            'next' => $next,
            'extra' => $extra,
        );

        $cron = self::get($task);

        if (isset($cron->id)) {
            $cron->update($data);
            return $cron->id;
        }

        $cron = self::create($data);
        return $cron->id;
    }

    /**
     * 
     * Identify the mode of the task and set the next time to execute
     * @param type $cron_id
     */
    static function setnext_crontime($cron_id) {
        $cron = self::find($cron_id);

        if ($cron->mode == 'custom' && !empty($cron->extra)) {

//            Sample $extra array
//            $sample_extra = array(
//                'goup_id' => 253,
//                'custom_next_type'=> 'weekday',
//                'custom_next' => array('Sun', 'Tue', 'Fri'),
//            );

            $extra = $cron->extra;

            if (Option::is_serialized($extra)) {
                $extra = unserialize($extra);
            }

            if (isset($extra['custom_next_type']) && $extra['custom_next_type'] == 'weekday') {
                $weekday = date('D');

                $key = array_search('Tue', $extra['custom_next']);
                $key = ($key) ? $key++ : 0;

                $next_weekday = $extra['custom_next'][$key];
                $next = date('Y-m-d H:i:s', strtotime($cron->next . ' next ' . $next_weekday));
            }
        }

        if (!isset($next)) {
            $next = date('Y-m-d H:i:s', strtotime('next ' . self::$modes[$cron->mode]));
        }


        $data = array(
            'next' => $next,
        );

        $cron->update($data);
    }

    static function get_next_task() {
        $today = date('Y-m-d H:i:s');
        $cron = self::where('next', '<', $today)->where('mode', '<>', 'deactivated')->first();
        return (isset($cron->task)) ? $cron : false;
    }

    static function deactivate_tasks($tasks) {
        if (is_array($tasks)) {
            foreach ($tasks as $task) {
                Cronjob::add($task, 'deactivated', '0000-00-00 00:00:00');
            }
        } else {
            Cronjob::add($tasks, 'deactivated', '0000-00-00 00:00:00');
        }
    }

    static function sample_fire() {

        $cron = self::get_next_task();

        if (!isset($cron->task)) {
            return false;
        }

        switch ($cron->task) {
            case 'looktoday':
                TestController::looktoday();
                break;
            case 'lookmonth':
                TestController::lookmonth();
                break;
            case 'lookweekday':
                TestController::lookweekday();
                break;
        }

        self::setnext_crontime($cron->id);
        self::set_cron_history($cron);
    }

    private static function set_cron_history($cron) {

        $cron_history = Option::get('cron_history');

        if (!$cron_history) {
            $cron_history = array();
        }

        if (count($cron_history) >= self::MAX_CRON_HISTORY) {
            Option::add('cron_history', array());
            $cron_history = array();
        }


        $data = array(
            'cron_id' => $cron->id,
            'task_name' => $cron->task,
            'time_exec' => date('Y-m-d H:i:s'),
            'time_next' => $cron->next,
        );

        $cron_history[] = $data;
        Option::add('cron_history', $cron_history);
    }

    public static function print_cron_history() {
        $cron_history = Option::get('cron_history');
        echo '<pre>', print_r($cron_history), '</pre>';
        exit();
    }

}
