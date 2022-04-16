<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset==utf-8">
</head>

<body style="word-wrap: break-word; -webkit-nbsp-mode: s=pace; line-break: after-white-space;" class="3D">
    <div align="center">
        <table border="1" cellspacing="0" cellpadding="0" width="80%" style="width:443.297px;border:1pt solid windowtext">
            <tbody>
                <tr>
                    <td colspan="2" style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif;text-align:center">
                            <span id="m_3500189978075623348cid:1791f8d6999f6b934d71">
                                <img src="https://eastfuelconf.com/sub/upload/images/logo/email_logo.png" alt="Logo" alt="Logo" width="250px">
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif;text-align:center"><b>The following registration was processed<u></u><u></u></b></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Name:&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->firstName . ' ' . $user->lastName; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Badge :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->badgeName; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Email :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><a href="<?php echo 'mailto:' . $user->email; ?>" target="_blank"><?php echo $user->email; ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Secondary Email :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><a href="<?php echo 'mailto:' . $user->secondaryEmail; ?>" target="_blank"><?php echo $user->secondaryEmail; ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Organization :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->organization; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Job title :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->jobTitle; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Address :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->addressLine1 . '<br>' . $user->addressLine2; ?></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>City :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->city; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>State :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->state; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Zip :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->zip; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Country :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->country; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Mobile :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->phone; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Wednesday Activity :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->confEvent; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Golf Handicap: :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->handicap; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Rental clubs :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->rentalClubs; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Time :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->messagePreferredTime; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Wednesday Welcome Reception :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->wedWelReception; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Thursday Breakfast :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->thursdayBreakfast; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Thursday Luncheon :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->thursdayLuncheon; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Thursday Dinner :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->thursdayDinner; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Guest dinner tickets :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->spouseDinnerTicket; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Guest's name :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->spouseFirstName . ' ' . $user->spouseLastName; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Friday Breakfast:&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->fridayBreakfast; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Dietary Restrictions or Special Needs:&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $user->dietaryRestrictions; ?><u></u><u></u></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif">Do not forget to make your hotel room reservations as soon as possible to ensure availability. Rooms are limited so book early. Click here to reserve your room online:&nbsp;<a href="https://book.passkey.com/event/49937289/owner/70576/home" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://book.passkey.com/event/49937289/owner/70576/home&amp;source=gmail&amp;ust=1620325309608000&amp;usg=AFQjCNHE3g3sxcvJ2BuO97LEKlE0dIbTjw">https://book.passkey.com/event/49937289/owner/70576/home</a>&nbsp;<br><br>Disney Yacht &amp; Beach Club Resort&nbsp;<br>Phone Reservations: +1-407 939-4686&nbsp;<br><span class="il">Email</span>:&nbsp;<a href="mailto:WDW.Group.Reservations@DisneyWorld.com" style="color:purple" target="_blank">WDW.Group.Reservations@<wbr>DisneyWorld.com</a>&nbsp;<br>Reservations will be accepted Monday to Friday from 8:30 AM to 6:00 PM, Saturday to Sunday 8:30 AM to 5:00 PM (EST, closed on holidays)&nbsp;<br><br>Attention Golfers: Please submit pairing requests to&nbsp;<a href="mailto:info@eastfuelconf.com" target="_blank">info@eastfuelconf.com</a>&nbsp;<br>Thank you!&nbsp;<u></u><u></u></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>