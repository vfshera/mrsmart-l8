<x-layout>
    <div class="home-page">



        <section class="hero" id="hero">

            <div class=" mrsmart-container hero-content">
                <div class="welcome-container animate__animated animate__fadeInUp">
                    <span class="welcome">Welcome to</span>
                </div>

                <h1 class="animate__animated animate__fadeInUp">MrSmart Cleaning <br> Services</h1>

                <p class="slogan animate__animated animate__fadeIn animate__delay-1s">Transforming your locality to a
                    clean, healthy
                    living<br>
                    and working environment.</p>



            </div>

            <img src="storage/images/home.webp" alt="Home hero Image">


        </section>

        <section class="mrsmart-container info-container">

            <div class="info">
                <div class="info-item">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 30 30" fill="#9EDD79">
                        <path
                            d="M15 3C8.3844276 3 3 8.3844276 3 15C3 21.615572 8.3844276 27 15 27C21.615572 27 27 21.615572 27 15C27 8.3844276 21.615572 3 15 3 z M 15.998047 5.0488281C20.73255 5.5157016 24.484298 9.2674502 24.951172 14.001953 A 1 1 0 0 0 24 15 A 1 1 0 0 0 24.951172 15.998047C24.484298 20.73255 20.73255 24.484298 15.998047 24.951172 A 1 1 0 0 0 15 24 A 1 1 0 0 0 14.001953 24.951172C9.2674502 24.484298 5.5157016 20.73255 5.0488281 15.998047 A 1 1 0 0 0 6 15 A 1 1 0 0 0 5.0488281 14.001953C5.3813779 10.62961 7.3814425 7.7576039 10.214844 6.2148438L15 11L15 6 A 1 1 0 0 0 15.998047 5.0488281 z M 9.9902344 8.9902344 A 1.0001 1.0001 0 0 0 9.2929688 10.707031L14.292969 15.707031 A 1.0001 1.0001 0 0 0 15.195312 15.980469L20.195312 14.980469 A 1.0001 1.0001 0 1 0 19.804688 13.019531L15.328125 13.914062L10.707031 9.2929688 A 1.0001 1.0001 0 0 0 9.9902344 8.9902344 z"
                            fill="#9EDD79" />
                    </svg>


                    <div class="item-description">
                        <div class="info-title">
                            Operating Hours
                        </div>
                        <div class="info-value">
                            {{ $siteInfo->operationHours() }}
                        </div>
                    </div>
                </div>


                <div class="info-item sm:justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 32 32" fill="#9EDD79">
                        <path
                            d="M15 3C10.042969 3 6 7.042969 6 12C6 13.40625 6.558594 15.003906 7.335938 16.765625C8.109375 18.527344 9.125 20.414063 10.136719 22.15625C12.15625 25.644531 14.175781 28.566406 14.175781 28.566406L15 29.761719L15.824219 28.566406C15.824219 28.566406 17.84375 25.644531 19.863281 22.15625C20.875 20.414063 21.890625 18.527344 22.667969 16.765625C23.441406 15.003906 24 13.40625 24 12C24 7.042969 19.957031 3 15 3 Z M 15 5C18.878906 5 22 8.121094 22 12C22 12.800781 21.558594 14.308594 20.832031 15.960938C20.109375 17.613281 19.125 19.449219 18.136719 21.15625C16.570313 23.855469 15.585938 25.261719 15 26.125C14.414063 25.261719 13.429688 23.855469 11.863281 21.15625C10.875 19.449219 9.890625 17.613281 9.164063 15.960938C8.441406 14.308594 8 12.800781 8 12C8 8.121094 11.121094 5 15 5 Z M 15 7L11 10L11 15L14 15L14 12L16 12L16 15L19 15L19 10Z"
                            fill="#9EDD79" />
                    </svg>


                    <div class="item-description">
                        <div class="info-title">
                            Our Location
                        </div>
                        <div class="info-value">
                            {{ $siteInfo->location }}
                        </div>
                    </div>
                </div>




                <div class="info-item sm:justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 30 30" fill="#9EDD79">
                        <path
                            d="M26.997,13.747c0,4.538-2.205,7.347-5.795,7.347c-1.859,0-3.186-0.807-3.575-2.175h-0.274 c-0.591,1.455-1.715,2.19-3.373,2.19c-2.998,0-4.987-2.42-4.987-6.079c0-3.501,1.917-5.863,4.771-5.863 c1.557,0,2.782,0.749,3.359,2.046h0.274v-1.7h3.315v7.318c0,1.023,0.461,1.628,1.24,1.628c1.268,0,2.076-1.685,2.076-4.365 c0-5.215-3.416-8.557-8.735-8.557c-5.55,0-9.326,3.89-9.326,9.551c0,5.733,3.805,9.321,9.917,9.321 c1.326,0,2.695-0.173,3.445-0.403v2.564C18.291,26.842,16.936,27,15.566,27C8.028,27,2.997,22.203,2.997,15.014 C2.997,7.912,8.042,3,15.336,3C22.284,3,26.997,7.351,26.997,13.747z M12.784,15.13c0,1.873,0.778,2.996,2.09,2.996 c1.326,0,2.133-1.138,2.133-2.996s-0.822-2.996-2.133-2.996S12.784,13.257,12.784,15.13z"
                            fill="#9EDD79" />
                    </svg>
                    <div class="item-description">
                        <div class="info-title">
                            Our Email
                        </div>
                        <div class="info-value">
                            {{ $siteInfo->email }}
                        </div>
                    </div>
                </div>




            </div>


        </section>

        <section class="mrsmart-container services" id="services">


            <div class="service-description">
                <h1>Services</h1>
                <p>The services we provide to our customers.</p>

                <div class="image-container">
                    <img src="storage/images/cleaning_phone.webp" alt="Cleaning at Home">
                </div>
            </div>

            <div class="service-list">


                @foreach ($services as $key => $service)
                    <div data-aos="{{ ($key + 1) % 2 == 1 ? 'flip-left' : 'flip-right' }}" class="service ">
                        <img src="storage/icons/{{ $service->icon }}" alt="{{ $service->name }} Icon">

                        <div class="service-info">
                            <p>{{ $service->name }}</p>
                            <span> <img src="storage/icons/external_link.svg"
                                    alt="Link Book {{ $service->name }}">Book Service</span>
                        </div>
                    </div>
                @endforeach



            </div>

        </section>

        <section class="contact" id="contact">
            <div class="contact-info">
                <div class="info-header">
                    <h1>Contact Us</h1>
                    <p>Reach us
                        <img src="storage/icons/hand_right.svg" alt="Reach Us Icon">
                    </p>

                </div>

                <div class="info-photo" style="background-image: url('storage/images/cleaning_sofa.webp');background-repeat: no-repeat;background-position: center
                    ">

                </div>
            </div>
            <form action="{{ route('contact') }}" method="POST">
                @csrf()
                <x-form.input-field label="Name" />
                <x-form.input-field label="Email" inputType="email" />
                <x-form.text-area label="Message" />

                <button>send</button>
            </form>
        </section>
    </div>
</x-layout>
