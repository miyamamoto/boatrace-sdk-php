<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class ClientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\Client
     */
    protected $boatrace;

    /**
     * @var array
     */
    protected $config = [
        'driver'    => 'pgsql',
        'host'      => 'localhost',
        'database'  => 'boatrace',
        'username'  => 'postgres',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    /**
     * @return void
     */
    public function setUp()
    {
        $this->boatrace = new \Boatrace\Client();
        $this->boatrace->setConfig($this->config);
    }

    /**
     * @return void
     */
    public function testStoreRaceProgramInDatabase()
    {
        $this->boatrace->storeRaceProgramInDatabase(20170707, 24, 1);
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStoreRaceResultInDatabase()
    {
        $this->boatrace->storeRaceResultInDatabase(20170707, 24, 1);
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramViaDatabase()
    {
        $response = $this->boatrace->getRaceProgramViaDatabase();
        $this->assertSame(20170707, $response[0]['date']);
        $this->assertSame(24, $response[0]['place_id']);
        $this->assertSame('大村', $response[0]['place_name']);
        $this->assertSame('富士通フロンテック杯', $response[0]['race_name']);
        $this->assertSame('めざまし戦一般', $response[0]['race_type']);
        $this->assertSame(1800, $response[0]['race_distance']);
        $this->assertSame(4260, $response[0]['frame_1_racer_id']);
        $this->assertSame(4251, $response[0]['frame_2_racer_id']);
        $this->assertSame(3309, $response[0]['frame_3_racer_id']);
        $this->assertSame(3781, $response[0]['frame_4_racer_id']);
        $this->assertSame(3105, $response[0]['frame_5_racer_id']);
        $this->assertSame(4955, $response[0]['frame_6_racer_id']);
        $this->assertSame('中越 博紀', $response[0]['frame_1_racer_name']);
        $this->assertSame('川崎 誠志', $response[0]['frame_2_racer_name']);
        $this->assertSame('大塚 信行', $response[0]['frame_3_racer_name']);
        $this->assertSame('秋元 誠', $response[0]['frame_4_racer_name']);
        $this->assertSame('内山 文典', $response[0]['frame_5_racer_name']);
        $this->assertSame('福田 慶尚', $response[0]['frame_6_racer_name']);
        $this->assertSame('A1', $response[0]['frame_1_racer_rank']);
        $this->assertSame('B1', $response[0]['frame_2_racer_rank']);
        $this->assertSame('B1', $response[0]['frame_3_racer_rank']);
        $this->assertSame('B1', $response[0]['frame_4_racer_rank']);
        $this->assertSame('B1', $response[0]['frame_5_racer_rank']);
        $this->assertSame('B2', $response[0]['frame_6_racer_rank']);
        $this->assertSame('香川', $response[0]['frame_1_racer_branch']);
        $this->assertSame('山口', $response[0]['frame_2_racer_branch']);
        $this->assertSame('東京', $response[0]['frame_3_racer_branch']);
        $this->assertSame('福井', $response[0]['frame_4_racer_branch']);
        $this->assertSame('東京', $response[0]['frame_5_racer_branch']);
        $this->assertSame('広島', $response[0]['frame_6_racer_branch']);
        $this->assertSame('愛媛', $response[0]['frame_1_racer_graduate']);
        $this->assertSame('山口', $response[0]['frame_2_racer_graduate']);
        $this->assertSame('福島', $response[0]['frame_3_racer_graduate']);
        $this->assertSame('富山', $response[0]['frame_4_racer_graduate']);
        $this->assertSame('東京', $response[0]['frame_5_racer_graduate']);
        $this->assertSame('広島', $response[0]['frame_6_racer_graduate']);
        $this->assertSame(33, $response[0]['frame_1_racer_age']);
        $this->assertSame(34, $response[0]['frame_2_racer_age']);
        $this->assertSame(53, $response[0]['frame_3_racer_age']);
        $this->assertSame(41, $response[0]['frame_4_racer_age']);
        $this->assertSame(53, $response[0]['frame_5_racer_age']);
        $this->assertSame(22, $response[0]['frame_6_racer_age']);
        $this->assertSame(51.4, (float)$response[0]['frame_1_racer_weight']);
        $this->assertSame(51.0, (float)$response[0]['frame_2_racer_weight']);
        $this->assertSame(53.8, (float)$response[0]['frame_3_racer_weight']);
        $this->assertSame(53.5, (float)$response[0]['frame_4_racer_weight']);
        $this->assertSame(52.9, (float)$response[0]['frame_5_racer_weight']);
        $this->assertSame(52.1, (float)$response[0]['frame_6_racer_weight']);
        $this->assertSame(0, $response[0]['frame_1_racer_flying']);
        $this->assertSame(0, $response[0]['frame_2_racer_flying']);
        $this->assertSame(0, $response[0]['frame_3_racer_flying']);
        $this->assertSame(0, $response[0]['frame_4_racer_flying']);
        $this->assertSame(1, $response[0]['frame_5_racer_flying']);
        $this->assertSame(0, $response[0]['frame_6_racer_flying']);
        $this->assertSame(0, $response[0]['frame_1_racer_late']);
        $this->assertSame(0, $response[0]['frame_2_racer_late']);
        $this->assertSame(0, $response[0]['frame_3_racer_late']);
        $this->assertSame(0, $response[0]['frame_4_racer_late']);
        $this->assertSame(0, $response[0]['frame_5_racer_late']);
        $this->assertSame(0, $response[0]['frame_6_racer_late']);
        $this->assertSame(6.15, (float)$response[0]['frame_1_racer_nationwide_rate_1']);
        $this->assertSame(3.77, (float)$response[0]['frame_2_racer_nationwide_rate_1']);
        $this->assertSame(3.93, (float)$response[0]['frame_3_racer_nationwide_rate_1']);
        $this->assertSame(4.31, (float)$response[0]['frame_4_racer_nationwide_rate_1']);
        $this->assertSame(5.56, (float)$response[0]['frame_5_racer_nationwide_rate_1']);
        $this->assertSame(1.30, (float)$response[0]['frame_6_racer_nationwide_rate_1']);
        $this->assertSame(43.52, (float)$response[0]['frame_1_racer_nationwide_rate_2']);
        $this->assertSame(14.75, (float)$response[0]['frame_2_racer_nationwide_rate_2']);
        $this->assertSame(21.92, (float)$response[0]['frame_3_racer_nationwide_rate_2']);
        $this->assertSame(24.74, (float)$response[0]['frame_4_racer_nationwide_rate_2']);
        $this->assertSame(38.26, (float)$response[0]['frame_5_racer_nationwide_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_racer_nationwide_rate_2']);
        $this->assertSame(62.96, (float)$response[0]['frame_1_racer_nationwide_rate_3']);
        $this->assertSame(27.87, (float)$response[0]['frame_2_racer_nationwide_rate_3']);
        $this->assertSame(28.77, (float)$response[0]['frame_3_racer_nationwide_rate_3']);
        $this->assertSame(40.21, (float)$response[0]['frame_4_racer_nationwide_rate_3']);
        $this->assertSame(55.65, (float)$response[0]['frame_5_racer_nationwide_rate_3']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_racer_nationwide_rate_3']);
        $this->assertSame(5.91, (float)$response[0]['frame_1_racer_local_rate_1']);
        $this->assertSame(4.56, (float)$response[0]['frame_2_racer_local_rate_1']);
        $this->assertSame(3.35, (float)$response[0]['frame_3_racer_local_rate_1']);
        $this->assertSame(4.63, (float)$response[0]['frame_4_racer_local_rate_1']);
        $this->assertSame(4.86, (float)$response[0]['frame_5_racer_local_rate_1']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_racer_local_rate_1']);
        $this->assertSame(33.33, (float)$response[0]['frame_1_racer_local_rate_2']);
        $this->assertSame(22.22, (float)$response[0]['frame_2_racer_local_rate_2']);
        $this->assertSame(20.00, (float)$response[0]['frame_3_racer_local_rate_2']);
        $this->assertSame(37.50, (float)$response[0]['frame_4_racer_local_rate_2']);
        $this->assertSame(14.29, (float)$response[0]['frame_5_racer_local_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_racer_local_rate_2']);
        $this->assertSame(63.64, (float)$response[0]['frame_1_racer_local_rate_3']);
        $this->assertSame(55.56, (float)$response[0]['frame_2_racer_local_rate_3']);
        $this->assertSame(25.00, (float)$response[0]['frame_3_racer_local_rate_3']);
        $this->assertSame(50.00, (float)$response[0]['frame_4_racer_local_rate_3']);
        $this->assertSame(42.86, (float)$response[0]['frame_5_racer_local_rate_3']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_racer_local_rate_3']);
        $this->assertSame(25, $response[0]['frame_1_motor_number']);
        $this->assertSame(24, $response[0]['frame_2_motor_number']);
        $this->assertSame(54, $response[0]['frame_3_motor_number']);
        $this->assertSame(19, $response[0]['frame_4_motor_number']);
        $this->assertSame(67, $response[0]['frame_5_motor_number']);
        $this->assertSame(27, $response[0]['frame_6_motor_number']);
        $this->assertSame(29.33, (float)$response[0]['frame_1_motor_rate_2']);
        $this->assertSame(38.55, (float)$response[0]['frame_2_motor_rate_2']);
        $this->assertSame(39.51, (float)$response[0]['frame_3_motor_rate_2']);
        $this->assertSame(34.48, (float)$response[0]['frame_4_motor_rate_2']);
        $this->assertSame(30.49, (float)$response[0]['frame_5_motor_rate_2']);
        $this->assertSame(38.20, (float)$response[0]['frame_6_motor_rate_2']);
        $this->assertSame(42.67, (float)$response[0]['frame_1_motor_rate_3']);
        $this->assertSame(50.60, (float)$response[0]['frame_2_motor_rate_3']);
        $this->assertSame(58.02, (float)$response[0]['frame_3_motor_rate_3']);
        $this->assertSame(52.87, (float)$response[0]['frame_4_motor_rate_3']);
        $this->assertSame(48.78, (float)$response[0]['frame_5_motor_rate_3']);
        $this->assertSame(55.06, (float)$response[0]['frame_6_motor_rate_3']);
        $this->assertSame(59, $response[0]['frame_1_boat_number']);
        $this->assertSame(40, $response[0]['frame_2_boat_number']);
        $this->assertSame(37, $response[0]['frame_3_boat_number']);
        $this->assertSame(71, $response[0]['frame_4_boat_number']);
        $this->assertSame(66, $response[0]['frame_5_boat_number']);
        $this->assertSame(73, $response[0]['frame_6_boat_number']);
        $this->assertSame(0.00, (float)$response[0]['frame_1_boat_rate_2']);
        $this->assertSame(22.22, (float)$response[0]['frame_2_boat_rate_2']);
        $this->assertSame(44.44, (float)$response[0]['frame_3_boat_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_4_boat_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_5_boat_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_boat_rate_2']);
        $this->assertSame(0.00, (float)$response[0]['frame_1_boat_rate_3']);
        $this->assertSame(44.44, (float)$response[0]['frame_2_boat_rate_3']);
        $this->assertSame(66.67, (float)$response[0]['frame_3_boat_rate_3']);
        $this->assertSame(0.00, (float)$response[0]['frame_4_boat_rate_3']);
        $this->assertSame(0.00, (float)$response[0]['frame_5_boat_rate_3']);
        $this->assertSame(0.00, (float)$response[0]['frame_6_boat_rate_3']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultViaDatabase()
    {
        $response = $this->boatrace->getRaceResultViaDatabase();
        $this->assertSame(20170707, $response[0]['date']);
        $this->assertSame(24, $response[0]['place_id']);
        $this->assertSame(1, $response[0]['race_id']);
        $this->assertSame(2, $response[0]['technique']);
        $this->assertSame(2, $response[0]['arrival_1_frame']);
        $this->assertSame(1, $response[0]['arrival_2_frame']);
        $this->assertSame(4, $response[0]['arrival_3_frame']);
        $this->assertSame(5, $response[0]['arrival_4_frame']);
        $this->assertSame(3, $response[0]['arrival_5_frame']);
        $this->assertSame(6, $response[0]['arrival_6_frame']);
        $this->assertSame(1, $response[0]['course_1_frame']);
        $this->assertSame(2, $response[0]['course_2_frame']);
        $this->assertSame(3, $response[0]['course_3_frame']);
        $this->assertSame(4, $response[0]['course_4_frame']);
        $this->assertSame(5, $response[0]['course_5_frame']);
        $this->assertSame(6, $response[0]['course_6_frame']);
        $this->assertSame(0.18, (float)$response[0]['course_1_start_timing']);
        $this->assertSame(0.18, (float)$response[0]['course_2_start_timing']);
        $this->assertSame(0.21, (float)$response[0]['course_3_start_timing']);
        $this->assertSame(0.17, (float)$response[0]['course_4_start_timing']);
        $this->assertSame(0.25, (float)$response[0]['course_5_start_timing']);
        $this->assertSame(0.19, (float)$response[0]['course_6_start_timing']);
        $this->assertSame(2, $response[0]['weather']);
        $this->assertSame(3, $response[0]['wind']);
        $this->assertSame(2, $response[0]['wave']);
        $this->assertSame(30.0, (float)$response[0]['temperature']);
        $this->assertSame(28.0, (float)$response[0]['water_temperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramOne()
    {
        $response = $this->boatrace->getRaceProgram(20170331);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('おおむら桜祭り競走', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame(1800, $response[24][1]['basic']['distance']);
        $this->assertSame(1, $response[24][1]['racer'][0]['frame']);
        $this->assertSame('/racerphoto/3833.jpg', $response[24][1]['racer'][0]['photo']);
        $this->assertSame(3833, $response[24][1]['racer'][0]['id']);
        $this->assertSame('A1', $response[24][1]['racer'][0]['rank']);
        $this->assertSame('中辻 博訓', $response[24][1]['racer'][0]['name']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['branch']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['graduate']);
        $this->assertSame(42, $response[24][1]['racer'][0]['age']);
        $this->assertSame(54.0, $response[24][1]['racer'][0]['weight']);
        $this->assertSame(1, $response[24][1]['racer'][0]['flying']);
        $this->assertSame(0, $response[24][1]['racer'][0]['late']);
        $this->assertSame(0.13, $response[24][1]['racer'][0]['startTiming']);
        $this->assertSame(6.45, $response[24][1]['racer'][0]['nationwideRate1']);
        $this->assertSame(45.36, $response[24][1]['racer'][0]['nationwideRate2']);
        $this->assertSame(65.98, $response[24][1]['racer'][0]['nationwideRate3']);
        $this->assertSame(7.78, $response[24][1]['racer'][0]['localRate1']);
        $this->assertSame(55.56, $response[24][1]['racer'][0]['localRate2']);
        $this->assertSame(77.78, $response[24][1]['racer'][0]['localRate3']);
        $this->assertSame(66, $response[24][1]['racer'][0]['motorNumber']);
        $this->assertSame(88.89, $response[24][1]['racer'][0]['motorRate2']);
        $this->assertSame(100.00, $response[24][1]['racer'][0]['motorRate3']);
        $this->assertSame(71, $response[24][1]['racer'][0]['boatNumber']);
        $this->assertSame(37.14, $response[24][1]['racer'][0]['boatRate2']);
        $this->assertSame(55.00, $response[24][1]['racer'][0]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramTwo()
    {
        $response = $this->boatrace->getRaceProgram(20170331, 24);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('おおむら桜祭り競走', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame(1800, $response[24][1]['basic']['distance']);
        $this->assertSame(1, $response[24][1]['racer'][0]['frame']);
        $this->assertSame('/racerphoto/3833.jpg', $response[24][1]['racer'][0]['photo']);
        $this->assertSame(3833, $response[24][1]['racer'][0]['id']);
        $this->assertSame('A1', $response[24][1]['racer'][0]['rank']);
        $this->assertSame('中辻 博訓', $response[24][1]['racer'][0]['name']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['branch']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['graduate']);
        $this->assertSame(42, $response[24][1]['racer'][0]['age']);
        $this->assertSame(54.0, $response[24][1]['racer'][0]['weight']);
        $this->assertSame(1, $response[24][1]['racer'][0]['flying']);
        $this->assertSame(0, $response[24][1]['racer'][0]['late']);
        $this->assertSame(0.13, $response[24][1]['racer'][0]['startTiming']);
        $this->assertSame(6.45, $response[24][1]['racer'][0]['nationwideRate1']);
        $this->assertSame(45.36, $response[24][1]['racer'][0]['nationwideRate2']);
        $this->assertSame(65.98, $response[24][1]['racer'][0]['nationwideRate3']);
        $this->assertSame(7.78, $response[24][1]['racer'][0]['localRate1']);
        $this->assertSame(55.56, $response[24][1]['racer'][0]['localRate2']);
        $this->assertSame(77.78, $response[24][1]['racer'][0]['localRate3']);
        $this->assertSame(66, $response[24][1]['racer'][0]['motorNumber']);
        $this->assertSame(88.89, $response[24][1]['racer'][0]['motorRate2']);
        $this->assertSame(100.00, $response[24][1]['racer'][0]['motorRate3']);
        $this->assertSame(71, $response[24][1]['racer'][0]['boatNumber']);
        $this->assertSame(37.14, $response[24][1]['racer'][0]['boatRate2']);
        $this->assertSame(55.00, $response[24][1]['racer'][0]['boatRate3']);

        $response = $this->boatrace->getRaceProgram(20170331, null, 1);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('おおむら桜祭り競走', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame(1800, $response[24][1]['basic']['distance']);
        $this->assertSame(1, $response[24][1]['racer'][0]['frame']);
        $this->assertSame('/racerphoto/3833.jpg', $response[24][1]['racer'][0]['photo']);
        $this->assertSame(3833, $response[24][1]['racer'][0]['id']);
        $this->assertSame('A1', $response[24][1]['racer'][0]['rank']);
        $this->assertSame('中辻 博訓', $response[24][1]['racer'][0]['name']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['branch']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['graduate']);
        $this->assertSame(42, $response[24][1]['racer'][0]['age']);
        $this->assertSame(54.0, $response[24][1]['racer'][0]['weight']);
        $this->assertSame(1, $response[24][1]['racer'][0]['flying']);
        $this->assertSame(0, $response[24][1]['racer'][0]['late']);
        $this->assertSame(0.13, $response[24][1]['racer'][0]['startTiming']);
        $this->assertSame(6.45, $response[24][1]['racer'][0]['nationwideRate1']);
        $this->assertSame(45.36, $response[24][1]['racer'][0]['nationwideRate2']);
        $this->assertSame(65.98, $response[24][1]['racer'][0]['nationwideRate3']);
        $this->assertSame(7.78, $response[24][1]['racer'][0]['localRate1']);
        $this->assertSame(55.56, $response[24][1]['racer'][0]['localRate2']);
        $this->assertSame(77.78, $response[24][1]['racer'][0]['localRate3']);
        $this->assertSame(66, $response[24][1]['racer'][0]['motorNumber']);
        $this->assertSame(88.89, $response[24][1]['racer'][0]['motorRate2']);
        $this->assertSame(100.00, $response[24][1]['racer'][0]['motorRate3']);
        $this->assertSame(71, $response[24][1]['racer'][0]['boatNumber']);
        $this->assertSame(37.14, $response[24][1]['racer'][0]['boatRate2']);
        $this->assertSame(55.00, $response[24][1]['racer'][0]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramThree()
    {
        $response = $this->boatrace->getRaceProgram(20170331, 24, 1);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('おおむら桜祭り競走', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame(1800, $response[24][1]['basic']['distance']);
        $this->assertSame(1, $response[24][1]['racer'][0]['frame']);
        $this->assertSame('/racerphoto/3833.jpg', $response[24][1]['racer'][0]['photo']);
        $this->assertSame(3833, $response[24][1]['racer'][0]['id']);
        $this->assertSame('A1', $response[24][1]['racer'][0]['rank']);
        $this->assertSame('中辻 博訓', $response[24][1]['racer'][0]['name']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['branch']);
        $this->assertSame('福井', $response[24][1]['racer'][0]['graduate']);
        $this->assertSame(42, $response[24][1]['racer'][0]['age']);
        $this->assertSame(54.0, $response[24][1]['racer'][0]['weight']);
        $this->assertSame(1, $response[24][1]['racer'][0]['flying']);
        $this->assertSame(0, $response[24][1]['racer'][0]['late']);
        $this->assertSame(0.13, $response[24][1]['racer'][0]['startTiming']);
        $this->assertSame(6.45, $response[24][1]['racer'][0]['nationwideRate1']);
        $this->assertSame(45.36, $response[24][1]['racer'][0]['nationwideRate2']);
        $this->assertSame(65.98, $response[24][1]['racer'][0]['nationwideRate3']);
        $this->assertSame(7.78, $response[24][1]['racer'][0]['localRate1']);
        $this->assertSame(55.56, $response[24][1]['racer'][0]['localRate2']);
        $this->assertSame(77.78, $response[24][1]['racer'][0]['localRate3']);
        $this->assertSame(66, $response[24][1]['racer'][0]['motorNumber']);
        $this->assertSame(88.89, $response[24][1]['racer'][0]['motorRate2']);
        $this->assertSame(100.00, $response[24][1]['racer'][0]['motorRate3']);
        $this->assertSame(71, $response[24][1]['racer'][0]['boatNumber']);
        $this->assertSame(37.14, $response[24][1]['racer'][0]['boatRate2']);
        $this->assertSame(55.00, $response[24][1]['racer'][0]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultOne()
    {
        $response = $this->boatrace->getRaceResult(20170331);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame(1, $response[24][1]['basic']['technique']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['frame']);
        $this->assertSame(3833, $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('中辻 博訓', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame(1, $response[24][1]['course'][0]['frame']);
        $this->assertSame(0.25, $response[24][1]['course'][0]['startTiming']);
        $this->assertSame(1, $response[24][1]['course'][0]['technique']);
        $this->assertSame(3, $response[24][1]['weather']['weather']);
        $this->assertSame(5, $response[24][1]['weather']['wind']);
        $this->assertSame(4, $response[24][1]['weather']['wave']);
        $this->assertSame(13.0, $response[24][1]['weather']['temperature']);
        $this->assertSame(14.0, $response[24][1]['weather']['waterTemperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultTwo()
    {
        $response = $this->boatrace->getRaceResult(20170331, 24);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame(1, $response[24][1]['basic']['technique']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['frame']);
        $this->assertSame(3833, $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('中辻 博訓', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame(1, $response[24][1]['course'][0]['frame']);
        $this->assertSame(0.25, $response[24][1]['course'][0]['startTiming']);
        $this->assertSame(1, $response[24][1]['course'][0]['technique']);
        $this->assertSame(3, $response[24][1]['weather']['weather']);
        $this->assertSame(5, $response[24][1]['weather']['wind']);
        $this->assertSame(4, $response[24][1]['weather']['wave']);
        $this->assertSame(13.0, $response[24][1]['weather']['temperature']);
        $this->assertSame(14.0, $response[24][1]['weather']['waterTemperature']);

        $response = $this->boatrace->getRaceResult(20170331, null, 1);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame(1, $response[24][1]['basic']['technique']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['frame']);
        $this->assertSame(3833, $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('中辻 博訓', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame(1, $response[24][1]['course'][0]['frame']);
        $this->assertSame(0.25, $response[24][1]['course'][0]['startTiming']);
        $this->assertSame(1, $response[24][1]['course'][0]['technique']);
        $this->assertSame(3, $response[24][1]['weather']['weather']);
        $this->assertSame(5, $response[24][1]['weather']['wind']);
        $this->assertSame(4, $response[24][1]['weather']['wave']);
        $this->assertSame(13.0, $response[24][1]['weather']['temperature']);
        $this->assertSame(14.0, $response[24][1]['weather']['waterTemperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultThree()
    {
        $response = $this->boatrace->getRaceResult(20170331, 24, 1);
        $this->assertSame(20170331, $response[24][1]['basic']['date']);
        $this->assertSame(1, $response[24][1]['basic']['technique']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame(1, $response[24][1]['arrival'][0]['frame']);
        $this->assertSame(3833, $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('中辻 博訓', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame(1, $response[24][1]['course'][0]['frame']);
        $this->assertSame(0.25, $response[24][1]['course'][0]['startTiming']);
        $this->assertSame(1, $response[24][1]['course'][0]['technique']);
        $this->assertSame(3, $response[24][1]['weather']['weather']);
        $this->assertSame(5, $response[24][1]['weather']['wind']);
        $this->assertSame(4, $response[24][1]['weather']['wave']);
        $this->assertSame(13.0, $response[24][1]['weather']['temperature']);
        $this->assertSame(14.0, $response[24][1]['weather']['waterTemperature']);
    }
}
