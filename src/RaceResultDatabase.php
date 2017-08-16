<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceResultDatabase extends Database
{
    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function create()
    {
        $driver = $this->getConfig()['driver'];
        $filePath = __DIR__ . '/' . $driver . '.results.sql';
        $this->connect()->statement(file_get_contents($filePath));
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions)
    {
        $response = $this->connect()->table('results');
        foreach ($conditions as $k => $v) {
            switch ($k) {
                case 'skip':
                    $response->skip($v);
                    break;
                case 'take':
                    $response->take($v);
                    break;
                case 'from_date':
                    $response->where('date', '>=', $v);
                    break;
                case 'to_date':
                    $response->where('date', '<=', $v);
                    break;
                default:
                    $response->where($k, $v);
            }
        }

        return $this->toArray($response->orderBy('date', 'desc')->get());
    }

    /**
     * @param  array $data
     * @return void
     */
    public function store(array $data)
    {
        $storeData = [];

        foreach ($data as $place => $places) {
            foreach ($places as $race => $races) {
                $frames = [
                    $races['arrivals'][0]['frame'] => ['racerId' => $races['arrivals'][0]['racerId'], 'racerName' => $races['arrivals'][0]['racerName']],
                    $races['arrivals'][1]['frame'] => ['racerId' => $races['arrivals'][1]['racerId'], 'racerName' => $races['arrivals'][1]['racerName']],
                    $races['arrivals'][2]['frame'] => ['racerId' => $races['arrivals'][2]['racerId'], 'racerName' => $races['arrivals'][2]['racerName']],
                    $races['arrivals'][3]['frame'] => ['racerId' => $races['arrivals'][3]['racerId'], 'racerName' => $races['arrivals'][3]['racerName']],
                    $races['arrivals'][4]['frame'] => ['racerId' => $races['arrivals'][4]['racerId'], 'racerName' => $races['arrivals'][4]['racerName']],
                    $races['arrivals'][5]['frame'] => ['racerId' => $races['arrivals'][5]['racerId'], 'racerName' => $races['arrivals'][5]['racerName']],
                ];

                if (! ksort($frames)) {
                    continue;
                }

                $course1Frame = $races['courses'][0]['frame'] ?? null;
                $course2Frame = $races['courses'][1]['frame'] ?? null;
                $course3Frame = $races['courses'][2]['frame'] ?? null;
                $course4Frame = $races['courses'][3]['frame'] ?? null;
                $course5Frame = $races['courses'][4]['frame'] ?? null;
                $course6Frame = $races['courses'][5]['frame'] ?? null;

                $storeData[] = [
                    'date'                  => $races['date']                      ?? null,
                    'place'                 => $place                              ?? null,
                    'race'                  => $race                               ?? null,
                    'technique'             => $races['technique']                 ?? null,
                    'weather'               => $races['weather']                   ?? null,
                    'wind'                  => $races['wind']                      ?? null,
                    'wave'                  => $races['wave']                      ?? null,
                    'temperature'           => $races['temperature']               ?? null,
                    'water_temperature'     => $races['waterTemperature']          ?? null,
                    'arrival_1_id'          => $races['arrivals'][0]['id']         ?? null,
                    'arrival_2_id'          => $races['arrivals'][1]['id']         ?? null,
                    'arrival_3_id'          => $races['arrivals'][2]['id']         ?? null,
                    'arrival_4_id'          => $races['arrivals'][3]['id']         ?? null,
                    'arrival_5_id'          => $races['arrivals'][4]['id']         ?? null,
                    'arrival_6_id'          => $races['arrivals'][5]['id']         ?? null,
                    'arrival_1_racer_id'    => $races['arrivals'][0]['racerId']    ?? null,
                    'arrival_2_racer_id'    => $races['arrivals'][1]['racerId']    ?? null,
                    'arrival_3_racer_id'    => $races['arrivals'][2]['racerId']    ?? null,
                    'arrival_4_racer_id'    => $races['arrivals'][3]['racerId']    ?? null,
                    'arrival_5_racer_id'    => $races['arrivals'][4]['racerId']    ?? null,
                    'arrival_6_racer_id'    => $races['arrivals'][5]['racerId']    ?? null,
                    'arrival_1_racer_name'  => $races['arrivals'][0]['racerName']  ?? null,
                    'arrival_2_racer_name'  => $races['arrivals'][1]['racerName']  ?? null,
                    'arrival_3_racer_name'  => $races['arrivals'][2]['racerName']  ?? null,
                    'arrival_4_racer_name'  => $races['arrivals'][3]['racerName']  ?? null,
                    'arrival_5_racer_name'  => $races['arrivals'][4]['racerName']  ?? null,
                    'arrival_6_racer_name'  => $races['arrivals'][5]['racerName']  ?? null,
                    'arrival_1_frame'       => $races['arrivals'][0]['frame']      ?? null,
                    'arrival_2_frame'       => $races['arrivals'][1]['frame']      ?? null,
                    'arrival_3_frame'       => $races['arrivals'][2]['frame']      ?? null,
                    'arrival_4_frame'       => $races['arrivals'][3]['frame']      ?? null,
                    'arrival_5_frame'       => $races['arrivals'][4]['frame']      ?? null,
                    'arrival_6_frame'       => $races['arrivals'][5]['frame']      ?? null,
                    'course_1_racer_id'     => $frames[$course1Frame]['racerId']   ?? null,
                    'course_2_racer_id'     => $frames[$course2Frame]['racerId']   ?? null,
                    'course_3_racer_id'     => $frames[$course3Frame]['racerId']   ?? null,
                    'course_4_racer_id'     => $frames[$course4Frame]['racerId']   ?? null,
                    'course_5_racer_id'     => $frames[$course5Frame]['racerId']   ?? null,
                    'course_6_racer_id'     => $frames[$course6Frame]['racerId']   ?? null,
                    'course_1_racer_name'   => $frames[$course1Frame]['racerName'] ?? null,
                    'course_2_racer_name'   => $frames[$course2Frame]['racerName'] ?? null,
                    'course_3_racer_name'   => $frames[$course3Frame]['racerName'] ?? null,
                    'course_4_racer_name'   => $frames[$course4Frame]['racerName'] ?? null,
                    'course_5_racer_name'   => $frames[$course5Frame]['racerName'] ?? null,
                    'course_6_racer_name'   => $frames[$course6Frame]['racerName'] ?? null,
                    'course_1_frame'        => $races['courses'][0]['frame']       ?? null,
                    'course_2_frame'        => $races['courses'][1]['frame']       ?? null,
                    'course_3_frame'        => $races['courses'][2]['frame']       ?? null,
                    'course_4_frame'        => $races['courses'][3]['frame']       ?? null,
                    'course_5_frame'        => $races['courses'][4]['frame']       ?? null,
                    'course_6_frame'        => $races['courses'][5]['frame']       ?? null,
                    'course_1_start_timing' => $races['courses'][0]['startTiming'] ?? null,
                    'course_2_start_timing' => $races['courses'][1]['startTiming'] ?? null,
                    'course_3_start_timing' => $races['courses'][2]['startTiming'] ?? null,
                    'course_4_start_timing' => $races['courses'][3]['startTiming'] ?? null,
                    'course_5_start_timing' => $races['courses'][4]['startTiming'] ?? null,
                    'course_6_start_timing' => $races['courses'][5]['startTiming'] ?? null,
                ];
            }
        }

        $this->connect()->table('results')->insert($storeData);
    }
}
