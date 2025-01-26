@component('mail::message')
# مرحباً بك!

حالة المهمة : {{ $taskName }}

تم {{$status}} {{ $taskName }}

شكراً لاستخدامك منصتنا!
مع التحية،
{{ config('app.name') }}
@endcomponent
