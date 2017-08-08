<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class Converter
{
    /**
     * @param  string $original
     * @return int
     */
    public function convertString(string $original)
    {
        $original = mb_convert_kana($original, 'as', 'utf-8');
        $original = trim($original);

        return $original;
    }

    /**
     * @param  string $original
     * @return int
     */
    public function convertInt(string $original)
    {
        return (int)$this->convertString($original);
    }

    /**
     * @param  string $original
     * @return float
     */
    public function convertFloat(string $original)
    {
        return (float)$this->convertString($original);
    }

    /**
     * @param  string $flying
     * @return int
     */
    public function convertFlying(string $flying)
    {
        return (int)ltrim($this->convertString($flying), 'F');
    }

    /**
     * @param  string $late
     * @return int
     */
    public function convertLate(string $late)
    {
        return (int)ltrim($this->convertString($late), 'L');
    }

    /**
     * @param  string $arrival
     * @return int
     */
    public function convertArrival(string $arrival)
    {
        $arrival = $this->convertString($arrival);

        if (is_numeric($arrival)) {
            return (int)$arrival;
        }

        switch ($arrival) {
            case '妨':
                return 7;
            case 'エ':
                return 8;
            case '転':
                return 9;
            case '落':
                return 10;
            case '沈':
                return 11;
            case '不':
                return 12;
            case '失':
                return 13;
            case 'Ｆ':
                return 14;
            case 'L':
                return 15;
            case '欠':
                return 16;
            default:
                return 0;
        }
    }

    /**
     * @param  string $startTiming
     * @return float
     */
    public function convertStartTiming(string $startTiming)
    {
        $startTiming = $this->convertString($startTiming);
        $startTiming = sprintf('%d%s', 0, preg_replace('/[^0-9.]/', '', $startTiming));
        return (float)$startTiming;
    }

    /**
     * @param  string $temperature
     * @return float
     */
    public function convertTemperature(string $temperature)
    {
        $temperature = $this->convertString($temperature);
        $temperature = rtrim($temperature, '℃');
        return (float)$temperature;
    }

    /**
     * @param  string $weather
     * @return int
     */
    public function convertWeather(string $weather)
    {
        switch ($this->convertString($weather)) {
            case '晴':
                return 1;
            case '曇り':
                return 2;
            case '雨':
                return 3;
            case '雪':
                return 4;
            case '霧':
                return 5;
            default:
                return 0;
        }
    }

    /**
     * @param  string $wind
     * @return int
     */
    public function convertWind(string $wind)
    {
        $wind = $this->convertString($wind);
        $wind = rtrim($wind, 'm');
        return (int)$wind;
    }

    /**
     * @param  string $wave
     * @return int
     */
    public function convertWave(string $wave)
    {
        $wave = $this->convertString($wave);
        $wave = rtrim($wave, 'cm');
        return (int)$wave;
    }

    /**
     * @param  string $technique
     * @return int
     */
    public function convertTechnique(string $technique)
    {
        switch ($this->convertString($technique)) {
            case '逃げ':
                return 1;
            case '差し':
                return 2;
            case 'まくり':
                return 3;
            case 'まくり差し':
                return 4;
            case '抜き':
                return 5;
            case '恵まれ':
                return 6;
            default:
                return 0;
        }
    }
}
