<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <title>DevCon 2026 Check-in</title>
</head>
<body style="margin:0; padding:0; background-color:#F7F7FA; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; color:#0F0F1E;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">You've been checked in at the Developers Conference 2026.</div>

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
                        <td align="center" style="padding:36px 40px 8px 40px;">
                            <div style="width:64px; height:64px; line-height:64px; border-radius:999px; background:rgba(16,185,129,0.12); color:#10B981; font-size:30px; margin:0 auto;">&#10003;</div>
                            <h1 style="margin:20px 0 0 0; font-size:26px; line-height:1.2; color:#0F0F1E;">You're checked in!</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:16px 40px 8px 40px;">
                            <p style="margin:0; font-size:16px; line-height:1.6; color:#4B4B5C;">Dear {{ $registration->first_name }},</p>
                            <p style="margin:12px 0 0 0; font-size:16px; line-height:1.6; color:#4B4B5C;">
                                You have successfully been checked in at the <strong style="color:#0F0F1E;">Developers Conference 2026</strong>@if ($registration->checked_in_at) on <strong style="color:#0F0F1E;">{{ $registration->checked_in_at->format('d M Y \a\t H:i') }}</strong>@endif. Enjoy the sessions, the conversations, and the community.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 40px 36px 40px;">
                            <div style="height:1px; background:#E5E5EC; margin-bottom:24px;"></div>
                            <p style="margin:0; font-size:13px; color:#8B8B9C; line-height:1.6;">Have a great conference — the MSCC team.</p>
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
