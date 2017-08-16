<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceProgramDatabase extends Database
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
        $filePath = __DIR__ . '/' . $driver . '.programs.sql';
        $this->connect()->statement(file_get_contents($filePath));
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions)
    {
        $response = $this->connect()->table('programs');
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
                $storeData[] = [
                    'date'                            => $races['date']                         ?? null,
                    'place'                           => $place                                 ?? null,
                    'race'                            => $race                                  ?? null,
                    'title'                           => $races['title']                        ?? null,
                    'class'                           => $races['class']                        ?? null,
                    'distance'                        => $races['distance']                     ?? null,
                    'frame_1_racer_id'                => $races['racers'][0]['id']              ?? null,
                    'frame_2_racer_id'                => $races['racers'][1]['id']              ?? null,
                    'frame_3_racer_id'                => $races['racers'][2]['id']              ?? null,
                    'frame_4_racer_id'                => $races['racers'][3]['id']              ?? null,
                    'frame_5_racer_id'                => $races['racers'][4]['id']              ?? null,
                    'frame_6_racer_id'                => $races['racers'][5]['id']              ?? null,
                    'frame_1_racer_name'              => $races['racers'][0]['name']            ?? null,
                    'frame_2_racer_name'              => $races['racers'][1]['name']            ?? null,
                    'frame_3_racer_name'              => $races['racers'][2]['name']            ?? null,
                    'frame_4_racer_name'              => $races['racers'][3]['name']            ?? null,
                    'frame_5_racer_name'              => $races['racers'][4]['name']            ?? null,
                    'frame_6_racer_name'              => $races['racers'][5]['name']            ?? null,
                    'frame_1_racer_rank'              => $races['racers'][0]['rank']            ?? null,
                    'frame_2_racer_rank'              => $races['racers'][1]['rank']            ?? null,
                    'frame_3_racer_rank'              => $races['racers'][2]['rank']            ?? null,
                    'frame_4_racer_rank'              => $races['racers'][3]['rank']            ?? null,
                    'frame_5_racer_rank'              => $races['racers'][4]['rank']            ?? null,
                    'frame_6_racer_rank'              => $races['racers'][5]['rank']            ?? null,
                    'frame_1_racer_branch'            => $races['racers'][0]['branch']          ?? null,
                    'frame_2_racer_branch'            => $races['racers'][1]['branch']          ?? null,
                    'frame_3_racer_branch'            => $races['racers'][2]['branch']          ?? null,
                    'frame_4_racer_branch'            => $races['racers'][3]['branch']          ?? null,
                    'frame_5_racer_branch'            => $races['racers'][4]['branch']          ?? null,
                    'frame_6_racer_branch'            => $races['racers'][5]['branch']          ?? null,
                    'frame_1_racer_graduate'          => $races['racers'][0]['graduate']        ?? null,
                    'frame_2_racer_graduate'          => $races['racers'][1]['graduate']        ?? null,
                    'frame_3_racer_graduate'          => $races['racers'][2]['graduate']        ?? null,
                    'frame_4_racer_graduate'          => $races['racers'][3]['graduate']        ?? null,
                    'frame_5_racer_graduate'          => $races['racers'][4]['graduate']        ?? null,
                    'frame_6_racer_graduate'          => $races['racers'][5]['graduate']        ?? null,
                    'frame_1_racer_age'               => $races['racers'][0]['age']             ?? null,
                    'frame_2_racer_age'               => $races['racers'][1]['age']             ?? null,
                    'frame_3_racer_age'               => $races['racers'][2]['age']             ?? null,
                    'frame_4_racer_age'               => $races['racers'][3]['age']             ?? null,
                    'frame_5_racer_age'               => $races['racers'][4]['age']             ?? null,
                    'frame_6_racer_age'               => $races['racers'][5]['age']             ?? null,
                    'frame_1_racer_weight'            => $races['racers'][0]['weight']          ?? null,
                    'frame_2_racer_weight'            => $races['racers'][1]['weight']          ?? null,
                    'frame_3_racer_weight'            => $races['racers'][2]['weight']          ?? null,
                    'frame_4_racer_weight'            => $races['racers'][3]['weight']          ?? null,
                    'frame_5_racer_weight'            => $races['racers'][4]['weight']          ?? null,
                    'frame_6_racer_weight'            => $races['racers'][5]['weight']          ?? null,
                    'frame_1_racer_flying'            => $races['racers'][0]['flying']          ?? null,
                    'frame_2_racer_flying'            => $races['racers'][1]['flying']          ?? null,
                    'frame_3_racer_flying'            => $races['racers'][2]['flying']          ?? null,
                    'frame_4_racer_flying'            => $races['racers'][3]['flying']          ?? null,
                    'frame_5_racer_flying'            => $races['racers'][4]['flying']          ?? null,
                    'frame_6_racer_flying'            => $races['racers'][5]['flying']          ?? null,
                    'frame_1_racer_late'              => $races['racers'][0]['late']            ?? null,
                    'frame_2_racer_late'              => $races['racers'][1]['late']            ?? null,
                    'frame_3_racer_late'              => $races['racers'][2]['late']            ?? null,
                    'frame_4_racer_late'              => $races['racers'][3]['late']            ?? null,
                    'frame_5_racer_late'              => $races['racers'][4]['late']            ?? null,
                    'frame_6_racer_late'              => $races['racers'][5]['late']            ?? null,
                    'frame_1_racer_nationwide_rate_1' => $races['racers'][0]['nationwideRate1'] ?? null,
                    'frame_2_racer_nationwide_rate_1' => $races['racers'][1]['nationwideRate1'] ?? null,
                    'frame_3_racer_nationwide_rate_1' => $races['racers'][2]['nationwideRate1'] ?? null,
                    'frame_4_racer_nationwide_rate_1' => $races['racers'][3]['nationwideRate1'] ?? null,
                    'frame_5_racer_nationwide_rate_1' => $races['racers'][4]['nationwideRate1'] ?? null,
                    'frame_6_racer_nationwide_rate_1' => $races['racers'][5]['nationwideRate1'] ?? null,
                    'frame_1_racer_nationwide_rate_2' => $races['racers'][0]['nationwideRate2'] ?? null,
                    'frame_2_racer_nationwide_rate_2' => $races['racers'][1]['nationwideRate2'] ?? null,
                    'frame_3_racer_nationwide_rate_2' => $races['racers'][2]['nationwideRate2'] ?? null,
                    'frame_4_racer_nationwide_rate_2' => $races['racers'][3]['nationwideRate2'] ?? null,
                    'frame_5_racer_nationwide_rate_2' => $races['racers'][4]['nationwideRate2'] ?? null,
                    'frame_6_racer_nationwide_rate_2' => $races['racers'][5]['nationwideRate2'] ?? null,
                    'frame_1_racer_nationwide_rate_3' => $races['racers'][0]['nationwideRate3'] ?? null,
                    'frame_2_racer_nationwide_rate_3' => $races['racers'][1]['nationwideRate3'] ?? null,
                    'frame_3_racer_nationwide_rate_3' => $races['racers'][2]['nationwideRate3'] ?? null,
                    'frame_4_racer_nationwide_rate_3' => $races['racers'][3]['nationwideRate3'] ?? null,
                    'frame_5_racer_nationwide_rate_3' => $races['racers'][4]['nationwideRate3'] ?? null,
                    'frame_6_racer_nationwide_rate_3' => $races['racers'][5]['nationwideRate3'] ?? null,
                    'frame_1_racer_local_rate_1'      => $races['racers'][0]['localRate1']      ?? null,
                    'frame_2_racer_local_rate_1'      => $races['racers'][1]['localRate1']      ?? null,
                    'frame_3_racer_local_rate_1'      => $races['racers'][2]['localRate1']      ?? null,
                    'frame_4_racer_local_rate_1'      => $races['racers'][3]['localRate1']      ?? null,
                    'frame_5_racer_local_rate_1'      => $races['racers'][4]['localRate1']      ?? null,
                    'frame_6_racer_local_rate_1'      => $races['racers'][5]['localRate1']      ?? null,
                    'frame_1_racer_local_rate_2'      => $races['racers'][0]['localRate2']      ?? null,
                    'frame_2_racer_local_rate_2'      => $races['racers'][1]['localRate2']      ?? null,
                    'frame_3_racer_local_rate_2'      => $races['racers'][2]['localRate2']      ?? null,
                    'frame_4_racer_local_rate_2'      => $races['racers'][3]['localRate2']      ?? null,
                    'frame_5_racer_local_rate_2'      => $races['racers'][4]['localRate2']      ?? null,
                    'frame_6_racer_local_rate_2'      => $races['racers'][5]['localRate2']      ?? null,
                    'frame_1_racer_local_rate_3'      => $races['racers'][0]['localRate3']      ?? null,
                    'frame_2_racer_local_rate_3'      => $races['racers'][1]['localRate3']      ?? null,
                    'frame_3_racer_local_rate_3'      => $races['racers'][2]['localRate3']      ?? null,
                    'frame_4_racer_local_rate_3'      => $races['racers'][3]['localRate3']      ?? null,
                    'frame_5_racer_local_rate_3'      => $races['racers'][4]['localRate3']      ?? null,
                    'frame_6_racer_local_rate_3'      => $races['racers'][5]['localRate3']      ?? null,
                    'frame_1_motor_number'            => $races['racers'][0]['motorNumber']     ?? null,
                    'frame_2_motor_number'            => $races['racers'][1]['motorNumber']     ?? null,
                    'frame_3_motor_number'            => $races['racers'][2]['motorNumber']     ?? null,
                    'frame_4_motor_number'            => $races['racers'][3]['motorNumber']     ?? null,
                    'frame_5_motor_number'            => $races['racers'][4]['motorNumber']     ?? null,
                    'frame_6_motor_number'            => $races['racers'][5]['motorNumber']     ?? null,
                    'frame_1_motor_rate_2'            => $races['racers'][0]['motorRate2']      ?? null,
                    'frame_2_motor_rate_2'            => $races['racers'][1]['motorRate2']      ?? null,
                    'frame_3_motor_rate_2'            => $races['racers'][2]['motorRate2']      ?? null,
                    'frame_4_motor_rate_2'            => $races['racers'][3]['motorRate2']      ?? null,
                    'frame_5_motor_rate_2'            => $races['racers'][4]['motorRate2']      ?? null,
                    'frame_6_motor_rate_2'            => $races['racers'][5]['motorRate2']      ?? null,
                    'frame_1_motor_rate_3'            => $races['racers'][0]['motorRate3']      ?? null,
                    'frame_2_motor_rate_3'            => $races['racers'][1]['motorRate3']      ?? null,
                    'frame_3_motor_rate_3'            => $races['racers'][2]['motorRate3']      ?? null,
                    'frame_4_motor_rate_3'            => $races['racers'][3]['motorRate3']      ?? null,
                    'frame_5_motor_rate_3'            => $races['racers'][4]['motorRate3']      ?? null,
                    'frame_6_motor_rate_3'            => $races['racers'][5]['motorRate3']      ?? null,
                    'frame_1_boat_number'             => $races['racers'][0]['boatNumber']      ?? null,
                    'frame_2_boat_number'             => $races['racers'][1]['boatNumber']      ?? null,
                    'frame_3_boat_number'             => $races['racers'][2]['boatNumber']      ?? null,
                    'frame_4_boat_number'             => $races['racers'][3]['boatNumber']      ?? null,
                    'frame_5_boat_number'             => $races['racers'][4]['boatNumber']      ?? null,
                    'frame_6_boat_number'             => $races['racers'][5]['boatNumber']      ?? null,
                    'frame_1_boat_rate_2'             => $races['racers'][0]['boatRate2']       ?? null,
                    'frame_2_boat_rate_2'             => $races['racers'][1]['boatRate2']       ?? null,
                    'frame_3_boat_rate_2'             => $races['racers'][2]['boatRate2']       ?? null,
                    'frame_4_boat_rate_2'             => $races['racers'][3]['boatRate2']       ?? null,
                    'frame_5_boat_rate_2'             => $races['racers'][4]['boatRate2']       ?? null,
                    'frame_6_boat_rate_2'             => $races['racers'][5]['boatRate2']       ?? null,
                    'frame_1_boat_rate_3'             => $races['racers'][0]['boatRate3']       ?? null,
                    'frame_2_boat_rate_3'             => $races['racers'][1]['boatRate3']       ?? null,
                    'frame_3_boat_rate_3'             => $races['racers'][2]['boatRate3']       ?? null,
                    'frame_4_boat_rate_3'             => $races['racers'][3]['boatRate3']       ?? null,
                    'frame_5_boat_rate_3'             => $races['racers'][4]['boatRate3']       ?? null,
                    'frame_6_boat_rate_3'             => $races['racers'][5]['boatRate3']       ?? null,
                ];
            }
        }

        $this->connect()->table('programs')->insert($storeData);
    }
}
