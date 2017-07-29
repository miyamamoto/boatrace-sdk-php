<?php

namespace Boatrace;

use Illuminate\Database\Capsule\Manager;

/**
 * @author shimomo
 */
class Database
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $capsule;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->capsule = new Manager();
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return \Illuminate\Database\PostgresConnection
     */
    public function connect()
    {
        $this->capsule->addConnection($this->config);
        $this->capsule->setAsGlobal();

        return $this->capsule->connection();
    }

    /**
     * @param  strign $tableName
     * @return void
     */
    public function createTable(string $tableName)
    {
        switch ($tableName) {
            case 'programs':
            $this->connect()->statement('
                create table if not exists programs (
                    id                              bigserial primary key,
                    date                            integer   not null,
                    place_id                        integer   not null,
                    place_name                      text      not null,
                    race_id                         integer   not null,
                    race_name                       text      not null,
                    race_type                       text      not null,
                    race_distance                   text      not null,
                    racer_id_frame_1                integer   not null,
                    racer_id_frame_2                integer   not null,
                    racer_id_frame_3                integer   not null,
                    racer_id_frame_4                integer   not null,
                    racer_id_frame_5                integer   not null,
                    racer_id_frame_6                integer   not null,
                    racer_name_frame_1              text      not null,
                    racer_name_frame_2              text      not null,
                    racer_name_frame_3              text      not null,
                    racer_name_frame_4              text      not null,
                    racer_name_frame_5              text      not null,
                    racer_name_frame_6              text      not null,
                    racer_rank_frame_1              text      not null,
                    racer_rank_frame_2              text      not null,
                    racer_rank_frame_3              text      not null,
                    racer_rank_frame_4              text      not null,
                    racer_rank_frame_5              text      not null,
                    racer_rank_frame_6              text      not null,
                    racer_branch_frame_1            text      not null,
                    racer_branch_frame_2            text      not null,
                    racer_branch_frame_3            text      not null,
                    racer_branch_frame_4            text      not null,
                    racer_branch_frame_5            text      not null,
                    racer_branch_frame_6            text      not null,
                    racer_graduate_frame_1          text      not null,
                    racer_graduate_frame_2          text      not null,
                    racer_graduate_frame_3          text      not null,
                    racer_graduate_frame_4          text      not null,
                    racer_graduate_frame_5          text      not null,
                    racer_graduate_frame_6          text      not null,
                    racer_age_frame_1               text      not null,
                    racer_age_frame_2               text      not null,
                    racer_age_frame_3               text      not null,
                    racer_age_frame_4               text      not null,
                    racer_age_frame_5               text      not null,
                    racer_age_frame_6               text      not null,
                    racer_weight_frame_1            text      not null,
                    racer_weight_frame_2            text      not null,
                    racer_weight_frame_3            text      not null,
                    racer_weight_frame_4            text      not null,
                    racer_weight_frame_5            text      not null,
                    racer_weight_frame_6            text      not null,
                    racer_flying_frame_1            text      not null,
                    racer_flying_frame_2            text      not null,
                    racer_flying_frame_3            text      not null,
                    racer_flying_frame_4            text      not null,
                    racer_flying_frame_5            text      not null,
                    racer_flying_frame_6            text      not null,
                    racer_late_frame_1              text      not null,
                    racer_late_frame_2              text      not null,
                    racer_late_frame_3              text      not null,
                    racer_late_frame_4              text      not null,
                    racer_late_frame_5              text      not null,
                    racer_late_frame_6              text      not null,
                    racer_nationwide_rate_1_frame_1 numeric   not null,
                    racer_nationwide_rate_1_frame_2 numeric   not null,
                    racer_nationwide_rate_1_frame_3 numeric   not null,
                    racer_nationwide_rate_1_frame_4 numeric   not null,
                    racer_nationwide_rate_1_frame_5 numeric   not null,
                    racer_nationwide_rate_1_frame_6 numeric   not null,
                    racer_nationwide_rate_2_frame_1 numeric   not null,
                    racer_nationwide_rate_2_frame_2 numeric   not null,
                    racer_nationwide_rate_2_frame_3 numeric   not null,
                    racer_nationwide_rate_2_frame_4 numeric   not null,
                    racer_nationwide_rate_2_frame_5 numeric   not null,
                    racer_nationwide_rate_2_frame_6 numeric   not null,
                    racer_nationwide_rate_3_frame_1 numeric   not null,
                    racer_nationwide_rate_3_frame_2 numeric   not null,
                    racer_nationwide_rate_3_frame_3 numeric   not null,
                    racer_nationwide_rate_3_frame_4 numeric   not null,
                    racer_nationwide_rate_3_frame_5 numeric   not null,
                    racer_nationwide_rate_3_frame_6 numeric   not null,
                    racer_local_rate_1_frame_1      numeric   not null,
                    racer_local_rate_1_frame_2      numeric   not null,
                    racer_local_rate_1_frame_3      numeric   not null,
                    racer_local_rate_1_frame_4      numeric   not null,
                    racer_local_rate_1_frame_5      numeric   not null,
                    racer_local_rate_1_frame_6      numeric   not null,
                    racer_local_rate_2_frame_1      numeric   not null,
                    racer_local_rate_2_frame_2      numeric   not null,
                    racer_local_rate_2_frame_3      numeric   not null,
                    racer_local_rate_2_frame_4      numeric   not null,
                    racer_local_rate_2_frame_5      numeric   not null,
                    racer_local_rate_2_frame_6      numeric   not null,
                    racer_local_rate_3_frame_1      numeric   not null,
                    racer_local_rate_3_frame_2      numeric   not null,
                    racer_local_rate_3_frame_3      numeric   not null,
                    racer_local_rate_3_frame_4      numeric   not null,
                    racer_local_rate_3_frame_5      numeric   not null,
                    racer_local_rate_3_frame_6      numeric   not null,
                    motor_number_frame_1            integer   not null,
                    motor_number_frame_2            integer   not null,
                    motor_number_frame_3            integer   not null,
                    motor_number_frame_4            integer   not null,
                    motor_number_frame_5            integer   not null,
                    motor_number_frame_6            integer   not null,
                    motor_rate_2_frame_1            numeric   not null,
                    motor_rate_2_frame_2            numeric   not null,
                    motor_rate_2_frame_3            numeric   not null,
                    motor_rate_2_frame_4            numeric   not null,
                    motor_rate_2_frame_5            numeric   not null,
                    motor_rate_2_frame_6            numeric   not null,
                    motor_rate_3_frame_1            numeric   not null,
                    motor_rate_3_frame_2            numeric   not null,
                    motor_rate_3_frame_3            numeric   not null,
                    motor_rate_3_frame_4            numeric   not null,
                    motor_rate_3_frame_5            numeric   not null,
                    motor_rate_3_frame_6            numeric   not null,
                    boat_number_frame_1             integer   not null,
                    boat_number_frame_2             integer   not null,
                    boat_number_frame_3             integer   not null,
                    boat_number_frame_4             integer   not null,
                    boat_number_frame_5             integer   not null,
                    boat_number_frame_6             integer   not null,
                    boat_rate_2_frame_1             numeric   not null,
                    boat_rate_2_frame_2             numeric   not null,
                    boat_rate_2_frame_3             numeric   not null,
                    boat_rate_2_frame_4             numeric   not null,
                    boat_rate_2_frame_5             numeric   not null,
                    boat_rate_2_frame_6             numeric   not null,
                    boat_rate_3_frame_1             numeric   not null,
                    boat_rate_3_frame_2             numeric   not null,
                    boat_rate_3_frame_3             numeric   not null,
                    boat_rate_3_frame_4             numeric   not null,
                    boat_rate_3_frame_5             numeric   not null,
                    boat_rate_3_frame_6             numeric   not null
                );
            ');
            break;

            case 'results':
            $this->connect()->statement('
                create table if not exists results (
                    id                    bigserial primary key,
                    date                  integer   not null,
                    place_id              integer   not null,
                    race_id               integer   not null,
                    technique             text      not null,
                    arrival_1_frame       integer   not null,
                    arrival_2_frame       integer   not null,
                    arrival_3_frame       integer   not null,
                    arrival_4_frame       integer   not null,
                    arrival_5_frame       integer   not null,
                    arrival_6_frame       integer   not null,
                    course_1_frame        integer   not null,
                    course_2_frame        integer   not null,
                    course_3_frame        integer   not null,
                    course_4_frame        integer   not null,
                    course_5_frame        integer   not null,
                    course_6_frame        integer   not null,
                    course_1_start_timing text      not null,
                    course_2_start_timing text      not null,
                    course_3_start_timing text      not null,
                    course_4_start_timing text      not null,
                    course_5_start_timing text      not null,
                    course_6_start_timing text      not null,
                    weather               text      not null,
                    wind                  text      not null,
                    wave                  text      not null,
                    temperature           text      not null,
                    water_temperature     text      not null
                );
            ');
            break;
        }
    }

    /**
     * @return array
     */
    public function getRaceProgram()
    {
        return $this->toArray($this->connect()->table('programs')->get());
    }

    /**
     * @return array
     */
    public function getRaceResult()
    {
        return $this->toArray($this->connect()->table('results')->get());
    }

    /**
     * @param  array $raceProgram
     * @return void
     */
    public function storeRaceProgram(array $raceProgram)
    {
        $storeRaceProgram = [];

        foreach ($raceProgram as $placeId => $places) {
            foreach ($places as $raceId => $races) {
                $storeRaceProgram[] = [
                    'date'                            => $races['basic']['date'],
                    'place_id'                        => $placeId,
                    'place_name'                      => $races['basic']['place'],
                    'race_id'                         => $raceId,
                    'race_name'                       => $races['basic']['name'],
                    'race_type'                       => $races['basic']['type'],
                    'race_distance'                   => $races['basic']['distance'],
                    'racer_id_frame_1'                => $races['racer'][0]['id'],
                    'racer_id_frame_2'                => $races['racer'][1]['id'],
                    'racer_id_frame_3'                => $races['racer'][2]['id'],
                    'racer_id_frame_4'                => $races['racer'][3]['id'],
                    'racer_id_frame_5'                => $races['racer'][4]['id'],
                    'racer_id_frame_6'                => $races['racer'][5]['id'],
                    'racer_name_frame_1'              => $races['racer'][0]['name'],
                    'racer_name_frame_2'              => $races['racer'][1]['name'],
                    'racer_name_frame_3'              => $races['racer'][2]['name'],
                    'racer_name_frame_4'              => $races['racer'][3]['name'],
                    'racer_name_frame_5'              => $races['racer'][4]['name'],
                    'racer_name_frame_6'              => $races['racer'][5]['name'],
                    'racer_rank_frame_1'              => $races['racer'][0]['rank'],
                    'racer_rank_frame_2'              => $races['racer'][1]['rank'],
                    'racer_rank_frame_3'              => $races['racer'][2]['rank'],
                    'racer_rank_frame_4'              => $races['racer'][3]['rank'],
                    'racer_rank_frame_5'              => $races['racer'][4]['rank'],
                    'racer_rank_frame_6'              => $races['racer'][5]['rank'],
                    'racer_branch_frame_1'            => $races['racer'][0]['branch'],
                    'racer_branch_frame_2'            => $races['racer'][1]['branch'],
                    'racer_branch_frame_3'            => $races['racer'][2]['branch'],
                    'racer_branch_frame_4'            => $races['racer'][3]['branch'],
                    'racer_branch_frame_5'            => $races['racer'][4]['branch'],
                    'racer_branch_frame_6'            => $races['racer'][5]['branch'],
                    'racer_graduate_frame_1'          => $races['racer'][0]['graduate'],
                    'racer_graduate_frame_2'          => $races['racer'][1]['graduate'],
                    'racer_graduate_frame_3'          => $races['racer'][2]['graduate'],
                    'racer_graduate_frame_4'          => $races['racer'][3]['graduate'],
                    'racer_graduate_frame_5'          => $races['racer'][4]['graduate'],
                    'racer_graduate_frame_6'          => $races['racer'][5]['graduate'],
                    'racer_age_frame_1'               => $races['racer'][0]['age'],
                    'racer_age_frame_2'               => $races['racer'][1]['age'],
                    'racer_age_frame_3'               => $races['racer'][2]['age'],
                    'racer_age_frame_4'               => $races['racer'][3]['age'],
                    'racer_age_frame_5'               => $races['racer'][4]['age'],
                    'racer_age_frame_6'               => $races['racer'][5]['age'],
                    'racer_weight_frame_1'            => $races['racer'][0]['weight'],
                    'racer_weight_frame_2'            => $races['racer'][1]['weight'],
                    'racer_weight_frame_3'            => $races['racer'][2]['weight'],
                    'racer_weight_frame_4'            => $races['racer'][3]['weight'],
                    'racer_weight_frame_5'            => $races['racer'][4]['weight'],
                    'racer_weight_frame_6'            => $races['racer'][5]['weight'],
                    'racer_flying_frame_1'            => $races['racer'][0]['flying'],
                    'racer_flying_frame_2'            => $races['racer'][1]['flying'],
                    'racer_flying_frame_3'            => $races['racer'][2]['flying'],
                    'racer_flying_frame_4'            => $races['racer'][3]['flying'],
                    'racer_flying_frame_5'            => $races['racer'][4]['flying'],
                    'racer_flying_frame_6'            => $races['racer'][5]['flying'],
                    'racer_late_frame_1'              => $races['racer'][0]['late'],
                    'racer_late_frame_2'              => $races['racer'][1]['late'],
                    'racer_late_frame_3'              => $races['racer'][2]['late'],
                    'racer_late_frame_4'              => $races['racer'][3]['late'],
                    'racer_late_frame_5'              => $races['racer'][4]['late'],
                    'racer_late_frame_6'              => $races['racer'][5]['late'],
                    'racer_nationwide_rate_1_frame_1' => $races['racer'][0]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_2' => $races['racer'][1]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_3' => $races['racer'][2]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_4' => $races['racer'][3]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_5' => $races['racer'][4]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_6' => $races['racer'][5]['nationwideRate1'],
                    'racer_nationwide_rate_2_frame_1' => $races['racer'][0]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_2' => $races['racer'][1]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_3' => $races['racer'][2]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_4' => $races['racer'][3]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_5' => $races['racer'][4]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_6' => $races['racer'][5]['nationwideRate2'],
                    'racer_nationwide_rate_3_frame_1' => $races['racer'][0]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_2' => $races['racer'][1]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_3' => $races['racer'][2]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_4' => $races['racer'][3]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_5' => $races['racer'][4]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_6' => $races['racer'][5]['nationwideRate3'],
                    'racer_local_rate_1_frame_1'      => $races['racer'][0]['localRate1'],
                    'racer_local_rate_1_frame_2'      => $races['racer'][1]['localRate1'],
                    'racer_local_rate_1_frame_3'      => $races['racer'][2]['localRate1'],
                    'racer_local_rate_1_frame_4'      => $races['racer'][3]['localRate1'],
                    'racer_local_rate_1_frame_5'      => $races['racer'][4]['localRate1'],
                    'racer_local_rate_1_frame_6'      => $races['racer'][5]['localRate1'],
                    'racer_local_rate_2_frame_1'      => $races['racer'][0]['localRate2'],
                    'racer_local_rate_2_frame_2'      => $races['racer'][1]['localRate2'],
                    'racer_local_rate_2_frame_3'      => $races['racer'][2]['localRate2'],
                    'racer_local_rate_2_frame_4'      => $races['racer'][3]['localRate2'],
                    'racer_local_rate_2_frame_5'      => $races['racer'][4]['localRate2'],
                    'racer_local_rate_2_frame_6'      => $races['racer'][5]['localRate2'],
                    'racer_local_rate_3_frame_1'      => $races['racer'][0]['localRate3'],
                    'racer_local_rate_3_frame_2'      => $races['racer'][1]['localRate3'],
                    'racer_local_rate_3_frame_3'      => $races['racer'][2]['localRate3'],
                    'racer_local_rate_3_frame_4'      => $races['racer'][3]['localRate3'],
                    'racer_local_rate_3_frame_5'      => $races['racer'][4]['localRate3'],
                    'racer_local_rate_3_frame_6'      => $races['racer'][5]['localRate3'],
                    'motor_number_frame_1'            => $races['racer'][0]['motorNumber'],
                    'motor_number_frame_2'            => $races['racer'][1]['motorNumber'],
                    'motor_number_frame_3'            => $races['racer'][2]['motorNumber'],
                    'motor_number_frame_4'            => $races['racer'][3]['motorNumber'],
                    'motor_number_frame_5'            => $races['racer'][4]['motorNumber'],
                    'motor_number_frame_6'            => $races['racer'][5]['motorNumber'],
                    'motor_rate_2_frame_1'            => $races['racer'][0]['motorRate2'],
                    'motor_rate_2_frame_2'            => $races['racer'][1]['motorRate2'],
                    'motor_rate_2_frame_3'            => $races['racer'][2]['motorRate2'],
                    'motor_rate_2_frame_4'            => $races['racer'][3]['motorRate2'],
                    'motor_rate_2_frame_5'            => $races['racer'][4]['motorRate2'],
                    'motor_rate_2_frame_6'            => $races['racer'][5]['motorRate2'],
                    'motor_rate_3_frame_1'            => $races['racer'][0]['motorRate3'],
                    'motor_rate_3_frame_2'            => $races['racer'][1]['motorRate3'],
                    'motor_rate_3_frame_3'            => $races['racer'][2]['motorRate3'],
                    'motor_rate_3_frame_4'            => $races['racer'][3]['motorRate3'],
                    'motor_rate_3_frame_5'            => $races['racer'][4]['motorRate3'],
                    'motor_rate_3_frame_6'            => $races['racer'][5]['motorRate3'],
                    'boat_number_frame_1'             => $races['racer'][0]['boatNumber'],
                    'boat_number_frame_2'             => $races['racer'][1]['boatNumber'],
                    'boat_number_frame_3'             => $races['racer'][2]['boatNumber'],
                    'boat_number_frame_4'             => $races['racer'][3]['boatNumber'],
                    'boat_number_frame_5'             => $races['racer'][4]['boatNumber'],
                    'boat_number_frame_6'             => $races['racer'][5]['boatNumber'],
                    'boat_rate_2_frame_1'             => $races['racer'][0]['boatRate2'],
                    'boat_rate_2_frame_2'             => $races['racer'][1]['boatRate2'],
                    'boat_rate_2_frame_3'             => $races['racer'][2]['boatRate2'],
                    'boat_rate_2_frame_4'             => $races['racer'][3]['boatRate2'],
                    'boat_rate_2_frame_5'             => $races['racer'][4]['boatRate2'],
                    'boat_rate_2_frame_6'             => $races['racer'][5]['boatRate2'],
                    'boat_rate_3_frame_1'             => $races['racer'][0]['boatRate3'],
                    'boat_rate_3_frame_2'             => $races['racer'][1]['boatRate3'],
                    'boat_rate_3_frame_3'             => $races['racer'][2]['boatRate3'],
                    'boat_rate_3_frame_4'             => $races['racer'][3]['boatRate3'],
                    'boat_rate_3_frame_5'             => $races['racer'][4]['boatRate3'],
                    'boat_rate_3_frame_6'             => $races['racer'][5]['boatRate3'],
                ];
            }
        }

        $this->connect()->table('programs')->insert($storeRaceProgram);
    }

    /**
     * @param  array $raceResult
     * @return void
     */
    public function storeRaceResult(array $raceResult)
    {
        $storeRaceResult = [];

        foreach ($raceResult as $placeId => $places) {
            foreach ($places as $raceId => $races) {
                $storeRaceResult[] = [
                    'date'                  => $races['basic']['date'],
                    'place_id'              => $placeId,
                    'race_id'               => $raceId,
                    'arrival_1_frame'       => $races['arrival'][0]['frame'],
                    'arrival_2_frame'       => $races['arrival'][1]['frame'],
                    'arrival_3_frame'       => $races['arrival'][2]['frame'],
                    'arrival_4_frame'       => $races['arrival'][3]['frame'],
                    'arrival_5_frame'       => $races['arrival'][4]['frame'],
                    'arrival_6_frame'       => $races['arrival'][5]['frame'],
                    'course_1_frame'        => $races['course'][0]['frame'],
                    'course_2_frame'        => $races['course'][1]['frame'],
                    'course_3_frame'        => $races['course'][2]['frame'],
                    'course_4_frame'        => $races['course'][3]['frame'],
                    'course_5_frame'        => $races['course'][4]['frame'],
                    'course_6_frame'        => $races['course'][5]['frame'],
                    'course_1_start_timing' => $races['course'][0]['startTiming'],
                    'course_2_start_timing' => $races['course'][1]['startTiming'],
                    'course_3_start_timing' => $races['course'][2]['startTiming'],
                    'course_4_start_timing' => $races['course'][3]['startTiming'],
                    'course_5_start_timing' => $races['course'][4]['startTiming'],
                    'course_6_start_timing' => $races['course'][5]['startTiming'],
                    'weather'               => $races['weather']['weather'],
                    'wind'                  => $races['weather']['wind'],
                    'wave'                  => $races['weather']['wave'],
                    'temperature'           => $races['weather']['temperature'],
                    'water_temperature'     => $races['weather']['waterTemperature'],
                    'technique'             => $races['basic']['technique'],
                ];
            }
        }

        $this->connect()->table('results')->insert($storeRaceResult);
    }

    /**
     * @param  array $array
     * @return array
     */
    protected function toArray($array)
    {
        return json_decode(json_encode($array), true);
    }
}
