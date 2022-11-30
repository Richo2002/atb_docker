<x-mail::message>
# Introduction
<h2>{{ $contact['object'] }}</h2>
<p>{{ $contact['message'] }}</p>

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Cordialement ,<br>
{{ $contact['fullName'] }}
</x-mail::message>
