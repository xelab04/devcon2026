<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <title>DevCon 2026 Registration</title>
</head>
<body style="margin:0; padding:0; background-color:#F7F7FA; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; color:#0F0F1E;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">You're registered for the Developers Conference 2026 — your check-in QR code is inside.</div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F7F7FA; padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px; max-width:600px; background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(15,15,30,0.08);">
                    <tr>
                        <td align="center" style="background-color:#0F0F1E; padding:32px 24px;">
                            <img src="{{ $message->embed(public_path('logo.png')) }}" alt="MSCC Developers Conference" width="96" style="display:block; width:96px; height:auto; margin:0 auto;">
                            <div style="color:#D4A017; font-size:12px; letter-spacing:2px; text-transform:uppercase; margin-top:16px; font-weight:600;">Developers Conference 2026</div>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:36px 40px 8px 40px;">
                            <h1 style="margin:0; font-size:26px; line-height:1.2; color:#0F0F1E;">You're registered!</h1>
                            <p style="margin:18px 0 0 0; font-size:16px; line-height:1.6; color:#4B4B5C;">Dear {{ $registration->first_name }},</p>
                            <p style="margin:12px 0 0 0; font-size:16px; line-height:1.6; color:#4B4B5C;">
                                Thank you for registering for the <strong style="color:#0F0F1E;">Developers Conference 2026</strong>. Your registration has been completed successfully — we can't wait to see you there.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:24px 40px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F7F7FA; border:1px solid #E5E5EC; border-radius:12px;">
                                <tr>
                                    <td align="center" style="padding:28px 24px;">
                                        <div style="font-size:13px; font-weight:600; letter-spacing:1px; text-transform:uppercase; color:#8B8B9C;">Your check-in pass</div>
                                        @if ($qr && $qr['png'])
                                            <div style="margin:18px auto 0 auto; background:#ffffff; padding:12px; border-radius:12px; display:inline-block; border:1px solid #E5E5EC; line-height:0;">
                                                <img src="{{ $message->embedData($qr['png'], 'qrcode.png', 'image/png') }}" alt="Check-in QR code" width="200" height="200" style="display:block; width:200px; height:200px;">
                                            </div>
                                            <div style="margin-top:18px; font-size:13px; color:#8B8B9C; line-height:1.5;">Show this QR code at the entrance to check in.</div>
                                        @elseif ($qr && $qr['svg'])
                                            <div style="margin:18px auto 0 auto; background:#ffffff; padding:12px; border-radius:12px; display:inline-block; border:1px solid #E5E5EC; line-height:0;">
                                                {!! $qr['svg'] !!}
                                            </div>
                                            <div style="margin-top:18px; font-size:13px; color:#8B8B9C; line-height:1.5;">Show this QR code at the entrance to check in.</div>
                                        @else
                                            <div style="margin-top:18px; font-size:13px; color:#8B8B9C; line-height:1.5;">
                                                Your check-in link:<br>
                                                <a href="{{ $registration->checkInUrl() }}" style="color:#7C3AED; word-break:break-all;">{{ $registration->checkInUrl() }}</a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:8px 40px 8px 40px;">
                            <div style="font-size:13px; font-weight:600; letter-spacing:1px; text-transform:uppercase; color:#8B8B9C; margin-bottom:8px;">Registration details</div>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px; color:#0F0F1E;">
                                <tr>
                                    <td style="padding:8px 0; color:#8B8B9C; width:140px;">Name</td>
                                    <td style="padding:8px 0;">{{ $registration->fullName() }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0; color:#8B8B9C;">Email</td>
                                    <td style="padding:8px 0;">{{ $registration->email }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0; color:#8B8B9C;">Organisation</td>
                                    <td style="padding:8px 0;">{{ $registration->organisation }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0; color:#8B8B9C;">Affiliation</td>
                                    <td style="padding:8px 0;">{{ $registration->affiliation_type->label() }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 40px 36px 40px;">
                            <div style="height:1px; background:#E5E5EC; margin-bottom:24px;"></div>
                            <p style="margin:0; font-size:13px; color:#8B8B9C; line-height:1.6;">Questions? Just reply to this email. See you at DevCon 2026.</p>
                        </td>
                    </tr>
                </table>

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px; max-width:600px;">
                    <tr><td style="height:16px; line-height:16px; font-size:16px;">&nbsp;</td></tr>
                    <tr>
                        <td align="center" style="padding:18px 24px; background:linear-gradient(135deg,#7C3AED 0%,#06B6D4 100%); border-radius:12px;">
                            <div style="color:#ffffff; font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Mauritius Software Craftsmanship Community</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
