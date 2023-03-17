<h1>Boleto</h1>
<p><a href="{{ $attrs["transaction_details"]->external_resource_url }}" target="_blank">{{ __("Print ticket") }}</a></p>
<p><a href="{{ route('checkout.show') }}">{{ __("Back") }}</a></p>
<?php
