@props(['url'])
<tr>
<td class="header">
{{-- <a href="{{ $url }}" style="display: inline-block;"> --}}
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="https://nsansawellness.com/uploads/sites/304/2022/06/logos.svg" class="logo" alt="Nsansawellness Online Therapy">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
{{-- </a> --}}
</td>
</tr>
