@extends('master')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Video Tracker with Video.js</h1>
                <p class="fs-4">Track video progress and resume where you left off.</p>
                <p class="fs-5"><a href="{{ route('videos') }}">Locally Stored</a></p>
                <p class="fs-5"><a href="{{ route('scorm') }}">SCORM</a></p>
            </div>
        </div>
    </div>
</header>

<section class="pt-4">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">

            @for ($i = 1; $i <= 3; $i++)
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <h2 class="fs-4 fw-bold">Video {{ $i }}</h2>
                            <video id="video{{ $i }}" class="video-js" controls width="100%">
                                <source src="{{ asset('videos/v'.$i.'.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
</section>

<script>
    function trackVideo(videoId, videoKey) {
        const video = videojs(videoId);
        const savedTime = localStorage.getItem(videoKey);

        if (savedTime) {
            video.currentTime(parseFloat(savedTime));
        }

        video.on('timeupdate', function() {
            const currentTime = video.currentTime();
            localStorage.setItem(videoKey, currentTime);
        });

        video.on('pause', function() {
            const currentTime = video.currentTime();
            let pausedCount = localStorage.getItem(videoKey + '-paused-count') || 0;
            pausedCount = parseInt(pausedCount) + 1;

            localStorage.setItem(videoKey + '-paused-count', pausedCount);
            localStorage.setItem(videoKey + '-paused-time-' + pausedCount, currentTime);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        for (let i = 1; i <= 3; i++) {
            trackVideo('video' + i, 'video' + i + '-time');
        }
    });
</script>

@endsection
