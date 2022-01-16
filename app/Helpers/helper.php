<?php

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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

function implodeStrip($char)
{
  $string = str_replace(' ', '-', $char);
  return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

function upload($image, $folder)
{
  $imagename = implodeStrip(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
  $fileName = $imagename . '.' . $image->extension();
  $destinationPath = storage_path('app/public/' . $folder);
  if (!file_exists($destinationPath)) {
    mkdir($destinationPath, 0775, true);
  }
  $img = Image::make($image->path());
  $img->save($destinationPath . '/' . $fileName);

  return $fileName;
}
