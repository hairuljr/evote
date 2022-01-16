<?php

use Carbon\Carbon;

function tanggal($date, $date_format)
{
  return Carbon::parse($date)->isoFormat($date_format);
}

function localDate($date, $date_format)
{
  return Carbon::parse($date)->translatedFormat($date_format);
}

function customDate($date, $date_format)
{
  return Carbon::parse($date)->format($date_format);
}

function dateHuman($date)
{
  return Carbon::parse($date)->diffForHumans();
}

function tanggalSekarang($date_format)
{
  return Carbon::now()->format($date_format);
}
