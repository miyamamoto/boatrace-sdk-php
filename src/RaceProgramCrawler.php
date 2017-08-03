<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceProgramCrawler extends Crawler
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
    public function crawl(array $response, int $date, int $place, int $race)
    {
        $basicData = [];
        $racerData = [];

        if (is_null($date)) {
            $date = $this->instances['datetime']->format('Ymd');
        }

        $url = sprintf('%s/owpc/pc/race/racelist?hd=%s&jcd=%02d&rno=%d', $this->baseUrl, $date, $place, $race);
        $crawler = $this->instances['goutte']->request('GET', $url);

        if (
            count($crawler->filter('div.heading2_head div.heading2_area img')) &&
            count($crawler->filter('div.heading2_head div.heading2_title h2.heading2_titleName')) &&
            count($crawler->filter('div.heading2_head div.heading2_title span.heading2_titleDetail.is-type1'))
        ) {
            $placeName = $crawler->filter('div.heading2_head div.heading2_area img')->attr('alt');
            $name      = $crawler->filter('div.heading2_head div.heading2_title h2.heading2_titleName')->text();
            $detail    = $crawler->filter('div.heading2_head div.heading2_title span.heading2_titleDetail.is-type1')->text();

            list($type, $empty, $distance) = explode("\n", trim($detail));
            $placeName = trim(mb_convert_kana($placeName, 's', 'utf-8'));
            $name      = trim(mb_convert_kana($name, 's', 'utf-8'));
            $type      = trim(mb_convert_kana($type, 's', 'utf-8'));
            $distance  = trim(mb_convert_kana($distance, 's', 'utf-8'));

            $basicData = [
                'date'     => $date,
                'place'    => $placeName,
                'name'     => $name,
                'type'     => $type,
                'distance' => $distance,
            ];
        }

        $crawler->filter('table tbody.is-fs12')->each(function ($element) use (&$racerData) {
            if (
                count($element->filter('tr')->eq(0)->filter('td')->eq(0)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(1)->filter('a img')) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(0)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(1)->filter('a')) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(2)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(3)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(4)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(5)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(6)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(7))
            ) {
                $frame                 = $element->filter('tr')->eq(0)->filter('td')->eq(0)->text();
                $photo                 = $element->filter('tr')->eq(0)->filter('td')->eq(1)->filter('a img')->attr('src');
                $idRank                = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(0)->text();
                $name                  = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(1)->filter('a')->text();
                $PrefecturePhysical    = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(2)->text();
                $flyingLateStartTiming = $element->filter('tr')->eq(0)->filter('td')->eq(3)->text();
                $nationwideRate        = $element->filter('tr')->eq(0)->filter('td')->eq(4)->text();
                $localRate             = $element->filter('tr')->eq(0)->filter('td')->eq(5)->text();
                $motorRate             = $element->filter('tr')->eq(0)->filter('td')->eq(6)->text();
                $boatRate              = $element->filter('tr')->eq(0)->filter('td')->eq(7)->text();

                list($id, $rank)                                           = explode('/', trim($idRank));
                list($prefecture, $physical)                               = explode("\n", trim($PrefecturePhysical));
                list($branch, $graduate)                                   = explode('/', trim($prefecture));
                list($age, $weight)                                        = explode('/', trim($physical));
                list($flying, $late, $startTiming)                         = explode("\n", trim($flyingLateStartTiming));
                list($nationwideRate1, $nationwideRate2, $nationwideRate3) = explode("\n", trim($nationwideRate));
                list($localRate1, $localRate2, $localRate3)                = explode("\n", trim($localRate));
                list($motorNumber, $motorRate2, $motorRate3)               = explode("\n", trim($motorRate));
                list($boatNumber, $boatRate2, $boatRate3)                  = explode("\n", trim($boatRate));

                list($lastName, $firstName) = $this->splitName($name);
                $name = sprintf('%s %s', $lastName, $firstName);

                $frame           = trim(mb_convert_kana($frame, 'n', 'utf-8'));
                $id              = trim(mb_convert_kana($id, 'n', 'utf-8'));
                $rank            = trim(mb_convert_kana($rank, 'n', 'utf-8'));
                $branch          = trim(mb_convert_kana($branch, 'n', 'utf-8'));
                $graduate        = trim(mb_convert_kana($graduate, 'n', 'utf-8'));
                $age             = trim(mb_convert_kana($age, 'n', 'utf-8'));
                $weight          = trim(mb_convert_kana($weight, 'n', 'utf-8'));
                $flying          = trim(mb_convert_kana($flying, 'n', 'utf-8'));
                $late            = trim(mb_convert_kana($late, 'n', 'utf-8'));
                $startTiming     = trim(mb_convert_kana($startTiming, 'n', 'utf-8'));
                $nationwideRate1 = trim(mb_convert_kana($nationwideRate1, 'n', 'utf-8'));
                $nationwideRate2 = trim(mb_convert_kana($nationwideRate2, 'n', 'utf-8'));
                $nationwideRate3 = trim(mb_convert_kana($nationwideRate3, 'n', 'utf-8'));
                $localRate1      = trim(mb_convert_kana($localRate1, 'n', 'utf-8'));
                $localRate2      = trim(mb_convert_kana($localRate2, 'n', 'utf-8'));
                $localRate3      = trim(mb_convert_kana($localRate3, 'n', 'utf-8'));
                $motorNumber     = trim(mb_convert_kana($motorNumber, 'n', 'utf-8'));
                $motorRate2      = trim(mb_convert_kana($motorRate2, 'n', 'utf-8'));
                $motorRate3      = trim(mb_convert_kana($motorRate3, 'n', 'utf-8'));
                $boatNumber      = trim(mb_convert_kana($boatNumber, 'n', 'utf-8'));
                $boatRate2       = trim(mb_convert_kana($boatRate2, 'n', 'utf-8'));
                $boatRate3       = trim(mb_convert_kana($boatRate3, 'n', 'utf-8'));

                $racerData[] = [
                    'frame'           => $frame,
                    'photo'           => $photo,
                    'id'              => $id,
                    'rank'            => $rank,
                    'name'            => $name,
                    'branch'          => $branch,
                    'graduate'        => $graduate,
                    'age'             => $age,
                    'weight'          => $weight,
                    'flying'          => $flying,
                    'late'            => $late,
                    'startTiming'     => $startTiming,
                    'nationwideRate1' => $nationwideRate1,
                    'nationwideRate2' => $nationwideRate2,
                    'nationwideRate3' => $nationwideRate3,
                    'localRate1'      => $localRate1,
                    'localRate2'      => $localRate2,
                    'localRate3'      => $localRate3,
                    'motorNumber'     => $motorNumber,
                    'motorRate2'      => $motorRate2,
                    'motorRate3'      => $motorRate3,
                    'boatNumber'      => $boatNumber,
                    'boatRate2'       => $boatRate2,
                    'boatRate3'       => $boatRate3,
                ];
            }
        });

        if ($basicData && $racerData) {
            $response[$place][$race]['basic'] = $basicData;
            $response[$place][$race]['racer'] = $racerData;
        }

        return $response;
    }
}
