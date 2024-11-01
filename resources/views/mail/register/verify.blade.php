@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>We are happy to see that you complete your registration with CPI Reunion 2024-Session 2010-11. We ensure you that we successfully received your payment and verified your data. We hope, soon we will email again you with your necessary things to attend the party. Till than please stay with us and must refer your friends to complete the registration.
 
@component('mail::button', ['url' => $body['url_a']])
More Details
@endcomponent 
 
Thanks,<br>
Volantiar Team, {{ config('app.name') }}
@endcomponent