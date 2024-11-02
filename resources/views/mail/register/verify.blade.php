@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>We are happy to confirm that your registration for the "CPI Engineers Reunion 2024 - Session 2010-11" has been successfully completed. We have received your payment and verified your data. We will email you soon with the necessary information for attending the party. In the meantime, please stay connected with us, and feel free to refer your friends to complete their registration as well.
 
@component('mail::button', ['url' => $body['url_a']])
More Details
@endcomponent 
 
Thanks,<br>
Volantiar Team, {{ config('app.name') }}
@endcomponent