<?php

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

if (!function_exists('timeago')) {
  function timeago($date)
  {
    $since = Carbon::parse($date)->diffForHumans();

    return $since;
  }
}

if (!function_exists('uploadImageFilepond')) {
  function uploadImageFilepond($data, $filename = null, $disk, $withThumbnail = true, $exts = null)
  {
    $file = json_decode($data);
    if($exts == null) {
      $ext = '.' . explode('/', $file->type)[1];
    }else{
      $ext = '.' . $exts;
    }

    if (!$filename) {
      $__filename = base64_encode(((string) Str::uuid()));
    } else {
      $__filename = $filename;
    }

    $_filename = $__filename . $ext;
    // store
    Storage::disk($disk)->put($_filename, base64_decode($file->data));

    $url = Storage::disk($disk)->url($_filename);
    $url = parse_url($url, PHP_URL_PATH);

    // create thumbnails
    if ($withThumbnail) {
      $img = (new ImageManager)->make($file->data)
        ->resize(IMAGE_THUMB_WITDH, null, function ($constraint) {
          $constraint->aspectRatio();
        });
      $_filename2 = $__filename . '_thumb' . $ext;
      Storage::disk($disk)->put($_filename2, $img->stream());

      $url2 = Storage::disk($disk)->url($_filename2);
      $url2 = parse_url($url2, PHP_URL_PATH);

      return [$url, $url2];
    }

    return $url;
  }
}

if (!function_exists('slugify')) {
  function slugify($str)
  {
    return Str::slug($str, '-');
  }
}

if (!function_exists('formatDate')) {
  function formatDate($date, $format)
  {
    return date($format, strtotime($date));
  }
}

if (!function_exists('getStatusText')) {
  function getStatusText($status)
  {
    $data = [
      BLOG_STATUS_EDITING => BLOG_STATUS_EDITING_TEXT,
      BLOG_STATUS_REVIEW => BLOG_STATUS_REVIEW_TEXT,
      BLOG_STATUS_APPROVED => BLOG_STATUS_APPROVED_TEXT,
      BLOG_STATUS_REJECTED => BLOG_STATUS_REJECTED_TEXT,
      BLOG_STATUS_PUBLISHED => BLOG_STATUS_PUBLISHED_TEXT,
      BLOG_STATUS_DRAFT => BLOG_STATUS_DRAFT_TEXT,
    ];

    return $data[$status];
  }
}

if (!function_exists('setAlert')) {
  function setAlert($message, $status)
  {
    session()->flash(SESSION_ALERT, [
      'message' => $message,
      'status' => $status
    ]);
  }
}

if (!function_exists('getBlogInfo')) {
  function getBlogInfo()
  {
    $user = Auth::user();

    if($user->role == USER_ROLE_SUPER) {
      $blogList = Blog::get();
      $result['inReview'] = count(
        $blogList->where('status', BLOG_STATUS_REVIEW)
      );
    }else{
      $result['inReview'] = 0;
      $result['rejected'] = count(
        Blog::where('created_by', $user->id)
          ->where('status', BLOG_STATUS_REJECTED)
          ->get()
      );
    }


    return $result;
  }
}

if (!function_exists('numberAbbr')) {
  /**
   * from
   * https://stackoverflow.com/a/35329932
   */
  function numberAbbr($number, $precision = 3, $divisors = null)
  {
    // Setup default $divisors if not provided
    if (!isset($divisors)) {
      $divisors = array(
        pow(1000, 0) => '', // 1000^0 == 1
        pow(1000, 1) => 'K', // Thousand
        pow(1000, 2) => 'M', // Million
        pow(1000, 3) => 'B', // Billion
        pow(1000, 4) => 'T', // Trillion
        pow(1000, 5) => 'Qa', // Quadrillion
        pow(1000, 6) => 'Qi', // Quintillion
      );
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
      if (abs($number) < ($divisor * 1000)) {
        // We found a match!
        break;
      }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    if($number < 1000) {
      return $number;
    }
    return number_format($number / $divisor, $precision) . $shorthand;
  }
}
