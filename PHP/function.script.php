<?php
function isEmpty($uName, $uEmail, $uPassword, $uConfirmPassword)
{
    $result = '';

    if (empty($uName) || empty($uEmail) || empty($uPassword) || empty($uConfirmPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function isPasswordMatched($uPassword, $uConfirmPassword)
{
    $result = '';

    if ($uPassword === $uConfirmPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function makeUserNameShort($name_string)
{

    $splitted_string = explode(" ", $name_string);
    $short_string = '';

    if (count($splitted_string) < 2) {
        $short_string =  $splitted_string[0][0];
    } else {
        $short_string =  $splitted_string[0][0] . $splitted_string[1][0];
    }

    return $short_string;
}

function extractMonthAndYearFromDate($date)
{
    $extract_posted_date = date("M d", strtotime($date));
    return $extract_posted_date;
}

function extractMonthAndTimeDurationFromDate($date)
{

    date_default_timezone_set("Asia/Dhaka");
    $current_time = date('H:i:s');
    $current_date = date("M d");
    $extract_posted_date = extractMonthAndYearFromDate($date);
    $extract_posted_time_from_date = date("H:i:s", strtotime($date));

    $duration_sec_from_posted_time =  (int)(strtotime($current_time) - strtotime($extract_posted_time_from_date));
    $duration_min_from_posted_time = (int)($duration_sec_from_posted_time / 60);
    $duration_hour_from_posted_time = (int)($duration_min_from_posted_time / 60);

    $hours_string = $extract_posted_date . " (" . $duration_hour_from_posted_time . ' hours ago)';
    $minute_string = $extract_posted_date . " (" . $duration_min_from_posted_time . ' minutes ago)';
    $second_string = $extract_posted_date . " (" . $duration_sec_from_posted_time . ' sec ago)';
    $just_now_string = $extract_posted_date . "(Just Now)";


    if ($extract_posted_date === $current_date) {
        if ($duration_hour_from_posted_time !== 0) {
            return $hours_string;
        }

        if ($duration_min_from_posted_time !== 0) {
            return $minute_string;
        }

        if ($duration_sec_from_posted_time > 10) {
            return $second_string;
        }

        return $just_now_string;
    };

    return "";
}

function calculateArticleReadTime($word_quantity)
{

    $read_speed_in_minute = 900;
    $read_time_per_word = (1 / $read_speed_in_minute);
    $article_read_duration = $read_time_per_word * $word_quantity;

    return (int)$article_read_duration;
}

function prepareTags($tags)
{
    $prepared_tags = "";
    $tags_separated_by_comma = explode(', ', $tags);

    foreach ($tags_separated_by_comma as $tag) {
        $prepared_tags .= ' #' . $tag;
    }

    return trim($prepared_tags);
}
