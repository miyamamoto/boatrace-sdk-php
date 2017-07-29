<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceResultCrawler extends Crawler
{
    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param  array $response
     * @param  int   $date
     * @param  int   $place
     * @param  int   $race
     * @return array
     */
    public function crawl(array $response, int $date = null, int $place = null, int $race = null)
    {
        $basicData   = [];
        $arrivalData = [];
        $courseData  = [];
        $weatherData = [];

        $url = sprintf('%s/owpc/pc/race/raceresult?hd=%s&jcd=%02d&rno=%d', $this->baseUrl, $date, $place, $race);
        $crawler = $this->instances['goutte']->request('GET', $url);

        $crawler->filter('table.is-w495 tbody')->each(function ($element) use (&$arrivalData) {
            if (
                count($element->filter('td.is-fs14')) &&
                count($element->filter('td.is-fs14.is-fBold')) &&
                count($element->filter('td.is-p20-0 span.is-fs12')) &&
                count($element->filter('td.is-p20-0 span.is-fs18.is-fBold'))
            ) {
                $arrival   = $element->filter('td.is-fs14')->text();
                $frame     = $element->filter('td.is-fs14.is-fBold')->text();
                $racerId   = $element->filter('td.is-p20-0 span.is-fs12')->text();
                $racerName = $element->filter('td.is-p20-0 span.is-fs18.is-fBold')->text();

                list($lastName, $firstName) = $this->splitName($racerName);
                $racerName = sprintf('%s %s', $lastName, $firstName);

                $arrival = mb_convert_kana($arrival, 'n', 'utf-8');
                $frame   = mb_convert_kana($frame, 'n', 'utf-8');
                $racerId = mb_convert_kana($racerId, 'n', 'utf-8');

                $arrivalData[] = [
                    'arrival'   => $arrival,
                    'frame'     => $frame,
                    'racerId'   => $racerId,
                    'racerName' => $racerName,
                ];
            }
        });

        $crawler->filter('table.is-w495.is-h414 tbody.is-p10-0 tr')->each(function ($element) use (&$courseData) {
            if (
                count($element->filter('div.table1_boatImage1 span.table1_boatImage1Number')) &&
                count($element->filter('div.table1_boatImage1 span.table1_boatImage1TimeInner'))
            ) {
                $frame = $element->filter('div.table1_boatImage1 span.table1_boatImage1Number')->text();
                $start = $element->filter('div.table1_boatImage1 span.table1_boatImage1TimeInner')->text();

                list($startTiming, $technique) = $this->splitName($start);

                $courseData[] = [
                    'frame'       => $frame,
                    'startTiming' => $startTiming,
                    'technique'   => $technique,
                ];
            }
        });

        if (
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-direction span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-weather span.weather1_bodyUnitLabelTitle')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wind span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-waterTemperature span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wave span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('table.is-w243.is-h168 td.is-fs16'))
        ) {
            $temperature      = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-direction span.weather1_bodyUnitLabelData')->text();
            $weather          = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-weather span.weather1_bodyUnitLabelTitle')->text();
            $wind             = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wind span.weather1_bodyUnitLabelData')->text();
            $waterTemperature = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-waterTemperature span.weather1_bodyUnitLabelData')->text();
            $wave             = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wave span.weather1_bodyUnitLabelData')->text();
            $technique        = $crawler->filter('table.is-w243.is-h168 td.is-fs16')->text();

            $temperature      = trim($temperature);
            $weather          = trim($weather);
            $wind             = trim($wind);
            $waterTemperature = trim($waterTemperature);
            $wave             = trim($wave);
            $technique        = trim($technique);

            $basicData = [
                'date'      => $date,
                'technique' => $technique,
            ];

            $weatherData = [
                'weather'          => $weather,
                'wind'             => $wind,
                'wave'             => $wave,
                'temperature'      => $temperature,
                'waterTemperature' => $waterTemperature,
            ];
        }

        if ($basicData && $arrivalData && $courseData && $weatherData) {
            $response[$place][$race]['basic']   = $basicData;
            $response[$place][$race]['arrival'] = $arrivalData;
            $response[$place][$race]['course']  = $courseData;
            $response[$place][$race]['weather'] = $weatherData;
        }

        return $response;
    }
}
