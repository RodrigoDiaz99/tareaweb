<x-app-layout title="Prolifearmy | video">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center">

                    <div class="text-center my-3">

                        <h1 class="text-4xl">¡Disfruta el video {{ Auth::user()->name }}! </h1>

                        <h3 class="text-2xl">VIDEO {{ $videos->name }} </h3>


                    </div>

                </div>
            </div>

            <div _ngcontent-sli-c177="" class="content">
                <div>
                    <app-root _nghost-xee-c12="" ng-version="10.1.6">
                        <router-outlet _ngcontent-xee-c12=""></router-outlet>
                        <app-landing _nghost-xee-c178="" class="ng-star-inserted">
                            <!---->
                            <div _ngcontent-xee-c178="" class="landing-container">
                                <div _ngcontent-xee-c178="" class="general-container">
                                    <div _ngcontent-xee-c178="" class="container-left resonsive-width">
                                        <!---->

                                        <!---->
                                    </div>
                                    <div _ngcontent-xee-c178="" class="container-right">
                                        <div _ngcontent-xee-c178="" class="container-profile">

                                            <!---->



                                            <!---->
                                        </div>
                                        <div _ngcontent-xee-c178="" class="content">
                                            <router-outlet _ngcontent-xee-c178=""></router-outlet>
                                            <app-events _nghost-xee-c159="" class="ng-star-inserted">
                                                <router-outlet _ngcontent-xee-c159=""></router-outlet>
                                                <app-player _nghost-xee-c173="" class="ng-star-inserted">
                                                    <div _ngcontent-xee-c173="" class="player-container">
                                                        <!---->
                                                        <div _ngcontent-xee-c173=""
                                                            class="media-container ng-star-inserted">
                                                            <div _ngcontent-xee-c173="" class="container-video w-100">
                                                                <iframe _ngcontent-xee-c173="" width="100%" height="550"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; picture-in-picture; encrypted-media"
                                                                    allowfullscreen="" src="{{ $videoUrl }}"
                                                                    class="ng-star-inserted" frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                                <!---->
                                                                <div _ngcontent-xee-c173="" class="video-description">
                                                                    <app-description _ngcontent-xee-c173=""
                                                                        _nghost-xee-c151="">
                                                                        <div _ngcontent-xee-c151=""
                                                                            class="content-description">
                                                                            <div _ngcontent-xee-c151=""
                                                                                class="hash-tags">
                                                                                <!---->
                                                                                <!---->
                                                                                <!---->
                                                                            </div>

                                                                            <hr _ngcontent-xee-c151="">
                                                                            <div _ngcontent-xee-c151=""
                                                                                class="description-text"> </div>
                                                                        </div>
                                                                    </app-description>
                                                                </div>
                                                                <!---->
                                                                <!---->
                                                            </div>
                                                            <!---->
                                                        </div>

                                                        <!---->
                                                        <!---->
                                                        <!---->
                                                    </div>

                                                    <!---->
                                                    <!---->
                                                </app-player>
                                                <!---->
                                            </app-events>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </app-landing>
                        <!---->
                    </app-root>

                    <script src="https://connect.facebook.net/signals/config/148612923383134?v=2.9.33&amp;r=stable"
                        async=""></script>
                    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
                    <script async="" src="https://www.googletagmanager.com/gtag/js?id=AW-462768844"></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];

                        function gtag() {
                            dataLayer.push(arguments);
                        }
                        gtag('js', new Date());
                        gtag('config', 'AW-462768844');

                    </script>

                    <!-- Global site tag (gtag.js) - Google Analytics -->
                    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-9RPW7W4CL0"></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];

                        function gtag() {
                            dataLayer.push(arguments);
                        }
                        gtag('js', new Date());

                        gtag('config', 'G-9RPW7W4CL0');

                    </script>

                    <!-- Facebook Pixel Code -->
                    <script>
                        ! function(f, b, e, v, n, t, s) {
                            if (f.fbq) return;
                            n = f.fbq = function() {
                                n.callMethod ?
                                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                            };
                            if (!f._fbq) f._fbq = n;
                            n.push = n;
                            n.loaded = !0;
                            n.version = '2.0';
                            n.queue = [];
                            t = b.createElement(e);
                            t.async = !0;
                            t.src = v;
                            s = b.getElementsByTagName(e)[0];
                            s.parentNode.insertBefore(t, s)
                        }(window, document, 'script',
                            'https://connect.facebook.net/en_US/fbevents.js');
                        fbq('init', '148612923383134');

                        fbq('track', 'PageView');

                    </script>

                    <!-- End Facebook Pixel Code -->
                    <script src="runtime.3b98ba9e8b7c700aa2f7.js" defer=""></script>
                    <script src="polyfills.0c69331fc51e5170b3f3.js" defer=""></script>
                    <script src="main.24f6c6a499751a4bbf9d.js" defer=""></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
