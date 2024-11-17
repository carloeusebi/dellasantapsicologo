<div style="display:flex; justify-content: space-between; font-size: 10px; width: 100%; margin: 0 24px">
    <span>{{ now()->translatedFormat('d F Y H:i') }}</span>
    <span>{{ $survey->title }} di {{ $survey->patient->full_name }}</span>
</div>
