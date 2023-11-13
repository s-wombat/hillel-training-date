<?php

namespace App;

final readonly class Date
{
    public function __construct(
        private string $date
    )
    {
        if (!$this->validateDate()) {
            throw new \InvalidArgumentException("Invalid argument date. Date must be STRING and format date: YYYY-MM-DD");
        }
    }
    private function validateDate(): bool {
        if (is_string($this->date)) {
            $format = 'Y-m-d';
            $d = \DateTime::createFromFormat($format, $this->date);
            return $d && $d->format($format) == $this->date;
        }
        return false;
    }
    private function getItem(string $format): string {
        $timestamp = strtotime($this->date);
        return date($format, $timestamp);
    }
    public function getYear(): string {
        return $this->getItem('Y');
    }
    public function getMonth(): string {
        return $this->getItem('M');
    }
    public function getDay(): string {
        return $this->getItem('D');
    }
    public function dateComparison(): string {
        $now = \date('Y-m-d');
        if(strtotime($now) < strtotime($this->date)) {
            $result = 'Это будущее!';
        } elseif (strtotime($now) > strtotime($this->date)) {
            $result = 'Это прошлое!';
        } else {
            $result = 'Это настоящее!';
        }
        return $result;
    }
    public function dateDifference(): string {
        $format = 'Y-m-d';
        $now = new \DateTime();
        $date = \DateTime::createFromFormat($format, $this->date);
        $diff = $now->diff($date);
        return $diff->y . ' years ' . $diff->m . ' months ' . $diff->d . ' days';
    }
    public function dateFormat($format): string {
        return date($format, strtotime($this->date));
    }
}