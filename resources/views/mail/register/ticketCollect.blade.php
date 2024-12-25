@component('mail::message')
<h2>Hello, {{$body['name']}},</h2>
<p>We are happy to inform you that our programm "CPI Engineers Reunion 2024 - Session 2010-11" is going to held at today(25th December 2025) 8.00 AM to 4.30 PM. Please collect your ticket from our entry gate. Here are the details of you to collect the ticket.....</p>

<table style="text-align:left !important">
    <tbody>
        <tr>
            <th>Name:</th>
            <td>{{ $body['name'] }}</td>
        </tr>
        <tr>
            <th>Department:</th>
            <td>{{ $body['department'] }} ({{ $body['shift'] }})</td>
        </tr>
        <tr>
            <th>Token No:</th>
            <td>{{ $body['id'] }}</td>
        </tr>
    </tbody>
</table>
<p>You can find the program schedule <a href="https://cpireunion.com/public/prospectus.jpg">here</a></p>

<p>For more info please join our <a href="https://chat.whatsapp.com/DQtyZrlSFRUE65AsStZAE0">whatsapp community</a></p>
Thanks,<br>
Volunteer Team, {{ config('app.name') }}
@endcomponent