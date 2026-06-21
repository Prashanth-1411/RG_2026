<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif;line-height:1.6;color:#333;max-width:600px;margin:0 auto;padding:20px}h2{color:#0A1628;border-bottom:2px solid #D4AF37;padding-bottom:10px}table{width:100%;border-collapse:collapse}td{padding:8px 12px;border-bottom:1px solid #eee}td:first-child{font-weight:700;width:120px;color:#555}</style></head>
<body>
<h2>New Contact Inquiry</h2>
<table>
<tr><td>Name</td><td>{{ $inquiry->name }}</td></tr>
<tr><td>Email</td><td>{{ $inquiry->email }}</td></tr>
<tr><td>Phone</td><td>{{ $inquiry->phone ?? 'N/A' }}</td></tr>
<tr><td>Subject</td><td>{{ $inquiry->subject }}</td></tr>
<tr><td>Address</td><td>{{ $inquiry->address ?? 'N/A' }}</td></tr>
<tr><td>Message</td><td>{{ nl2br(e($inquiry->message)) }}</td></tr>
<tr><td>IP</td><td>{{ $inquiry->ip_address ?? 'N/A' }}</td></tr>
<tr><td>Date</td><td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td></tr>
</table>
</body>
</html>
