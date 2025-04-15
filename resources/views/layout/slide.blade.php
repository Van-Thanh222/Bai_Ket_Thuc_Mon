@if(isset($slides) && $slides->count() > 0)
    <div class="swiper-container hero-slider" style="margin-bottom: 30px;">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <a  target="_blank" rel="noopener noreferrer">
                        <div class="slide-item-content" style="position: relative; min-height: 400px; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden;">
                            <img src="{{ $slide->image ? asset('image/' . $slide->image) : '/api/placeholder/1400/400' }}"
                                 alt="{{ $slide->name ?? 'Slide' }}"
                                 style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 1; filter: brightness(0.7);">

                            <div style="position: relative; z-index: 2; color: #fff; max-width: 600px;">
                                @if($slide->title)
                                    <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $slide->title }}</h3>
                                @endif
                                @if($slide->description)
                                    <div style="font-size: 2.5rem; font-weight: bold;">{!! nl2br(e($slide->description)) !!}</div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="swiper-button-prev" style="color: #fff;"></div>
        <div class="swiper-button-next" style="color: #fff;"></div>
        <div class="swiper-pagination" style="bottom: 15px !important;"></div>
    </div>

    <!-- Swiper Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.hero-slider', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'cube',
                grabCursor: true,
                cubeEffect: {
                    shadow: true,
                    slideShadows: true,
                    shadowOffset: 20,
                    shadowScale: 0.94,
                }
            });
        });
    </script>
@endif
