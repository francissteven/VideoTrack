@extends('master')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Video Tracker</h1>
                <p class="fs-4">Track video progress and resume where you left off.</p>
                <p class="fs-5"><a href="{{ route('scorm') }}">SCORM</a></p>
            </div>
        </div>
    </div>
</header>

<section class="pt-4">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">

            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                        <h2 class="fs-4 fw-bold">Video 1</h2>
                        <video id="video1" controls width="100%">
                            <source src="{{ asset('videos/v1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                        <h2 class="fs-4 fw-bold">Video 2</h2>
                        <video id="video2" controls width="100%">
                            <source src="{{ asset('videos/v2.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                        <h2 class="fs-4 fw-bold">Video 3</h2>
                        <video id="video3" controls width="100%">
                            <source src="{{ asset('videos/v3.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function trackVideo(videoId, videoKey) {
        const video = document.getElementById(videoId);
        const savedTime = localStorage.getItem(videoKey);
        
        if (savedTime) {
            video.currentTime = parseFloat(savedTime);
        }

        video.ontimeupdate = function() {
            const currentTime = video.currentTime.toFixed(2);
            localStorage.setItem(videoKey, currentTime);
        };

        video.onpause = function() {
            const currentTime = video.currentTime.toFixed(2);
            let pausedCount = localStorage.getItem(videoKey + '-paused-count') || 0;
            pausedCount = parseInt(pausedCount) + 1;
            
            localStorage.setItem(videoKey + '-paused-count', pausedCount);
            localStorage.setItem(videoKey + '-paused-time-' + pausedCount, currentTime);
            
        };
    }

    document.addEventListener('DOMContentLoaded', function () {
        trackVideo('video1', 'video1-time');
        trackVideo('video2', 'video2-time');
        trackVideo('video3', 'video3-time');
    });
</script>

@endsection
