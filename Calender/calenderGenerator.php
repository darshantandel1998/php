<?php
function generateCalender($monthYear)
{
    $maxdate = date('t', strtotime($monthYear));
    $offset = getDate(strtotime($monthYear))['wday'] - 1;
    if ($offset < 0)
        $offset += 7;
    echo "<table>";
    echo "<caption>" . date('F - Y', strtotime($monthYear)) . "</caption>";
    echo "<thead>";
    echo "<tr>";
    for ($i = 0; $i < 7; $i++)
        echo "<th>" . date('D', strtotime("Mon this week +" . $i . "days")) . "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    for ($i = 0; $i < $offset; $i++)
        echo "<td></td>";
    for ($i = 1; $i <= $maxdate; $i++) {
        $offset++;
        echo "<td>" . $i . "</td>";
        if ($offset % 7 == 0 && $i != $maxdate)
            echo "</tr><tr>";
    }
    while ($offset % 7 != 0) {
        $offset++;
        echo "<td></td>";
    }
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}

function calender()
{
    if (validate()) {
        echo !empty(getImagePath()) ? '<img src="' . getImagePath() . '" alt="images">' : "";
        echo '<div class="calender">';
        if (empty(getValue('endingMonthYear'))) {
            generateCalender(getValue('startingMonthYear'));
        } else {
            $startingMonthYear = getValue('startingMonthYear');
            $endingMonthYear = getValue('endingMonthYear');
            $printYear = true;
            while (strtotime($startingMonthYear) <= strtotime($endingMonthYear)) {
                if ($printYear) {
                    echo "<h1>" . date('Y', strtotime($startingMonthYear)) . "</h1>";
                    $printYear = false;
                }
                if (date('m', strtotime($startingMonthYear)) == 12)
                    $printYear = true;
                generateCalender($startingMonthYear);
                $startingMonthYear = date('Y-m', strtotime($startingMonthYear . " +1 month"));
            }
        }
        echo '</div>';
    }
}

function sendMail()
{
    if (isset($_POST['sendMail'])) {
        $to = 'Darshan Tandel <darshantandel1998@gmail.com>';
        $from = 'Darshan Tandel <darshantandel1998@gmail.com>';
        $subject = 'Calender';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "From: " . $from . "\r\n";

        ob_start();
        calender();
        $generatedHtml = ob_get_clean();

        $message = '<!DOCTYPE html><html lang="en"><head><title>Calender</title><style>';
        $message .= file_get_contents("calenderStyle.css");
        $message .= '</style></head><body>';
        $message .= $generatedHtml;
        $message .= '</body></html>';

        if (mail($to, $subject, $message, $headers)) {
            echo 'Your mail has been sent successfully.';
        } else {
            echo 'Unable to send email. Please try again.';
        }
    }
}
