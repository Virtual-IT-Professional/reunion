@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>We are happy to inform you that our programm "CPI Engineers Reunion 2024 - Session 2010-11" is going to held at tomorrow 8.00 AM to 4.30 PM. Please collect your ticket from our entry gate. Here are the details of you to collect the ticket.....</p>

<table>
    <tbody>
        <tr>
            <th>Name:</th>
            <th>{{ $body['name'] }}</th>
        </tr>
        <tr>
            <th>Department:</th>
            <th>{{ $body['department'] }} ({{ $body['shift'] }})</th>
        </tr>
        <tr>
            <th>Token No:</th>
            <th>{{ $body['id'] }}</th>
        </tr>
    </tbody>
</table>
<p>You can find the program schedule <a href="https://cpireunion.com/public/prospectus.jpg">here</a></p>

<p>For more info please join our <a href="https://chat.whatsapp.com/DQtyZrlSFRUE65AsStZAE0">whatsapp community</a></p>
Thanks,<br>
Volunteer Team, {{ config('app.name') }}
@endcomponent