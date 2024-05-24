{{-- <!DOCTYPE html>
<html>
<head>
    <title>Dog Walk Report</title>
</head>
<body>
    <h2>Dog Walk Report</h2>
    <p><strong>Duration of the Walk:</strong> {{ $emailContent['duration'] }}</p>
    <p><strong>Route Taken:</strong> {{ $emailContent['route'] }}</p>
    <!-- Include other email content here -->

    @if($mediaPath)
        <p><strong>Attached Media:</strong></p>
        @if(str_contains($mediaPath, '.jpg') || str_contains($mediaPath, '.png'))
            <img src="{{ $message->embed(storage_path('app/media/' . $mediaPath)) }}" alt="Attached Image">
        @elseif(str_contains($mediaPath, '.mp4'))
            <video width="320" height="240" controls>
                <source src="{{ $message->embed(storage_path('app/media/' . $mediaPath)) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
    @endif
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Dog Walk Report</title>
</head>
<body>
    <h2>Dog Walk Report</h2>
    <p><strong>Dog Name:</strong> {{ $emailContent['dog_name'] }}</p>
    <p><strong>Duration of the Walk:</strong> {{ $emailContent['duration'] }}</p>
    <p><strong>Route Taken:</strong> {{ $emailContent['route'] }}</p>
    <p><strong>Behavior:</strong> {{ $emailContent['behavior'] }}</p>
    <p><strong>Interaction:</strong> {{ $emailContent['interaction'] }}</p>
    <p><strong>Toilet Breaks:</strong> {{ $emailContent['toilet_breaks'] }}</p>
    <p><strong>Environmental Conditions:</strong> {{ $emailContent['environmental_conditions'] }}</p>
    <p><strong>Health Observations:</strong> {{ $emailContent['health_observations'] }}</p>
    <p><strong>Hydration:</strong> {{ $emailContent['hydration'] }}</p>
    <p><strong>General Observations:</strong> {{ $emailContent['general_observations'] }}</p>

    @if($emailContent['mediaPath'])
        <p><strong>Attached Media:</strong></p>
        @if(str_contains($emailContent['mediaPath'], '.jpg') || str_contains($emailContent['mediaPath'], '.png'))
            <img src="{{ $message->embed($emailContent['fullFilePath']) }}" alt="Attached Image">
        @endif
        @else 
        <p>no image</p>
    @endif
</body>
</html>

