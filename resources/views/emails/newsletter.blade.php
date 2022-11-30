<x-mail::message>
# Introduction
<h2>Actualité sur {{ $newsletter->title }}</h2>
<p>{{ Str::substr($newsletter->description, 0, 50)." ..." }}</p>

<x-mail::button :url="'/actualites/'.$newsletter->id">
Voir plus
</x-mail::button>

Cordialement,<br>
{{  config('app.name')  }}
</x-mail::message>
