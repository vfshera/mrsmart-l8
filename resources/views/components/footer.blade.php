<div class="mrsmart-container footer ">
    <div class="brand">
        <div class="brand-logo">
            <img src="storage/icons/mrsmart.svg" alt="Mr Smart Logo">

            <div class="brand-name">
                <p class="big">Mr Smart</p>
                <p class="small">Cleaning Service</p>
            </div>
        </div>
        <p class="brand-slogan">
            Transforming your locality to a clean, healthy living<br>
            and working environment.
        </p>

        <p class="copyright"> <span>&copy; {{ date('Y', time()) }}</span> {{ config('app.name') }}</p>
    </div>

    <div class="quick-links">
        <p>Quick Links</p>

        <a href="{{ request()->routeIs('welcome') ? '/#hero' : '/' }}"
            class="quick-link">{{ request()->routeIs('welcome') ? 'Back To Top' : 'Home' }}</a>
        <a href="/#contact" class="quick-link">Contact</a>
        <a href="/#services" class="quick-link">Services</a>

    </div>

    <div class="contact">
        <p>Contacts</p>
        <a href="#" class="contact-link">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30"
                fill="#9EDD79">
                <path
                    d="M2.5371094 6L13.810547 16.521484C14.477547 17.145484 15.523453 17.145484 16.189453 16.521484L27.462891 6L2.5371094 6 z M 1 7.3007812L1 22.585938L8.90625 14.679688L1 7.3007812 z M 29 7.3007812L21.09375 14.679688L29 22.585938L29 7.3007812 z M 10.367188 16.044922L2.4140625 24L27.585938 24L19.630859 16.044922L17.554688 17.982422C16.837688 18.651422 15.917047 18.986328 14.998047 18.986328C14.079047 18.986328 13.160359 18.651422 12.443359 17.982422L10.367188 16.044922 z"
                    fill="#9EDD79" />
            </svg>

            {{ $siteInfo->email }}

        </a>
        <a href="tel:+254113350588" class="contact-link">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26"
                fill="#9EDD79">
                <path
                    d="M22.386719 18.027344C20.839844 16.703125 19.265625 15.898438 17.738281 17.222656L16.824219 18.019531C16.15625 18.601563 14.914063 21.3125 10.113281 15.785156C5.3125 10.269531 8.167969 9.410156 8.839844 8.835938L9.757813 8.035156C11.277344 6.710938 10.703125 5.042969 9.605469 3.324219L8.945313 2.285156C7.84375 0.574219 6.640625 -0.550781 5.117188 0.769531L4.292969 1.492188C3.617188 1.980469 1.734375 3.578125 1.277344 6.609375C0.726563 10.246094 2.464844 14.414063 6.4375 18.984375C10.40625 23.558594 14.296875 25.855469 17.976563 25.816406C21.035156 25.78125 22.886719 24.140625 23.464844 23.542969L24.289063 22.820313C25.8125 21.5 24.867188 20.152344 23.316406 18.828125Z"
                    fill="#9EDD79" />
            </svg>

            {{ $siteInfo->phone }}

        </a>
    </div>
</div>
