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
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif;text-align:center"><b>The following payment was processed<u></u><u></u></b></div>
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
                    <td style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Email :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><a href="<?php echo 'mailto:' . $user->email; ?>" target="_blank"><?php echo $user->email; ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Amount :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $payment->amount; ?></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Transection ID :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $payment->transactionId; ?></div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><b>Approval Code :&nbsp;<u></u><u></u></b></div>
                    </td>
                    <td style="border:none;background-color:lightgrey;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif"><?php echo $payment->approvalCode; ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding:5pt">
                        <div style="margin:0in 0in 0.0001pt;font-size:12pt;font-family:Times New Roman,serif">Any further question? Feel free to contact us to&nbsp;<a href="mailto:info@eastfuelconf.com" target="_blank">info@eastfuelconf.com</a>&nbsp;<br>Thank you!&nbsp;<u></u><u></u></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>