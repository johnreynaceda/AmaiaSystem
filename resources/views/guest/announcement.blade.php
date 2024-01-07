<x-guests-layout>
    <div>
        <header class="flex space-x-2 items-center font-bold text-xl fill-gray-800 text-gray-800">
            <span>ANNOUNCEMENTS</span>
        </header>

        <DIV>
            <swiper-container class="mySwiper" pagination="true" effect="coverflow" grab-cursor="true" centered-slides="true"
                slides-per-view="auto" coverflow-effect-rotate="50" coverflow-effect-stretch="0"
                coverflow-effect-depth="100" coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">
                <swiper-slide>
                    <img src="{{ asset('images/announcement/slide1.jpg') }}" />
                </swiper-slide>
                <swiper-slide>
                    <img src="{{ asset('images/announcement/slide2.png') }}" />
                </swiper-slide>
                <swiper-slide>
                    <img src="{{ asset('images/announcement/slide3.png') }}" />
                </swiper-slide>
                <swiper-slide>
                    <img src="{{ asset('images/announcement/slide4.png') }}" />
                </swiper-slide>

            </swiper-container>
        </DIV>

        <div class="mt-5 bg-green-800 bg-opacity-50 rounded-xl p-5">
            <h1 class="text-4xl text-center uppercase text-gray-800 font-bold">
                {{ \Carbon\Carbon::now()->format('F Y') }}
            </h1>
            <div class="grid 2xl:grid-cols-2 2xl:gap-10 gap-5 grid-cols-1 w-full mt-5">
                <div class="">
                    <img src="{{ asset('images/announcement/announcement1.png') }}" class="w-full" alt="">
                </div>
                <div class=" ">
                    <div class="flex space-x-2 items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="2xl:h-20 2xl:w-20 h-10 w-10 text-[#1C4C4E]"
                            viewBox="0 0 1792 1792" fill="currentColor">
                            <path
                                d="M809 1004l266-499H963L806 817s-24 48-44 92c-19-46-42-92-42-92L565 505H445l263 493v324h101v-318zm727-588v960c0 159-129 288-288 288H288c-159 0-288-129-288-288V416c0-159 129-288 288-288h960c159 0 288 129 288 288z">
                            </path>
                        </svg>
                        <div>
                            <h1 class="2xl:text-4xl font-bold text-white">NEWSLETTER</h1>
                            <p class=" 2xl:text-lg text-sm text-[#1C4C4E]">
                                Stay tuned with maintenance and events of Amaia Skies
                            </p>
                        </div>
                    </div>
                    <div class="flex mt-5 space-x-2 items-center">
                        <svg class="2xl:h-20 2xl:w-20 h-10 w-10 text-[#1C4C4E]" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M7.25 11.5C6.83579 11.5 6.5 11.8358 6.5 12.25C6.5 12.6642 6.83579 13 7.25 13C7.66421 13 8 12.6642 8 12.25C8 11.8358 7.66421 11.5 7.25 11.5Z"
                                fill="currentColor"></path>
                            <path
                                d="M6.25 3C4.45507 3 3 4.45507 3 6.25V15.25C3 17.0449 4.45507 18.5 6.25 18.5H15.25C17.0449 18.5 18.5 17.0449 18.5 15.25V6.25C18.5 4.45507 17.0449 3 15.25 3H6.25ZM5 12.25C5 11.0074 6.00736 10 7.25 10C8.49264 10 9.5 11.0074 9.5 12.25C9.5 13.4926 8.49264 14.5 7.25 14.5C6.00736 14.5 5 13.4926 5 12.25ZM10.5 12.25C10.5 11.8358 10.8358 11.5 11.25 11.5H15.75C16.1642 11.5 16.5 11.8358 16.5 12.25C16.5 12.6642 16.1642 13 15.75 13H11.25C10.8358 13 10.5 12.6642 10.5 12.25ZM5 7.75C5 7.33579 5.33579 7 5.75 7H15.75C16.1642 7 16.5 7.33579 16.5 7.75C16.5 8.16421 16.1642 8.5 15.75 8.5H5.75C5.33579 8.5 5 8.16421 5 7.75Z"
                                fill="currentColor"></path>
                            <path
                                d="M8.74995 21.0002C7.59927 21.0002 6.58826 20.4022 6.01074 19.5H8.72444L8.74995 19.5002H15.7499C17.821 19.5002 19.5 17.8212 19.5 15.7502V6.01108C20.402 6.58861 21 7.59956 21 8.75017V15.7502C21 18.6497 18.6494 21.0002 15.7499 21.0002H8.74995Z"
                                fill="currentColor"></path>
                        </svg>
                        <div>
                            <h1 class="2xl:text-4xl font-bold text-white">COMMUNITY FORMS</h1>
                            <p class=" 2xl:text-lg text-sm text-[#1C4C4E]">
                                Consent Forms that
                                are used inside the
                                complex.
                            </p>
                        </div>
                    </div>
                    <div class="flex mt-5 space-x-2 items-center">
                        <svg class="2xl:h-20 2xl:w-20 h-10 w-10 text-[#1C4C4E]" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z">
                            </path>
                        </svg>
                        <div>
                            <h1 class="2xl:text-4xl font-bold text-white">CONTACT HOTLINES</h1>
                            <p class=" 2xl:text-lg text-sm text-[#1C4C4E]">
                                Emergency hotlines
                                and upcoming
                                schedules.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="text-4xl text-center uppercase my-5  text-gray-800 font-bold">We are Hiring!
            </h1>
            <img src="{{ asset('images/announcement/announcement2.png') }}" class="w-full" alt="">
            <h1 class="text-4xl text-center uppercase my-5 text-gray-800 font-bold">NEWSLETTER
            </h1>
            <img src="{{ asset('images/announcement/announcement3.png') }}" class="w-full" alt="">
            <h1 class="text-4xl text-center uppercase my-5 text-gray-800 font-bold">COMMUNITY FORMS
            </h1>

            <div class="flex mt-5 space-x-2 items-center ">
                <svg class="2xl:h-20 2xl:w-20 h-10 w-10 text-red-600" viewBox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 21C10.8954 21 10 21.8954 10 23V25C10 26.1046 10.8954 27 12 27H14C15.1046 27 16 26.1046 16 25V23C16 21.8954 15.1046 21 14 21H12ZM12 23V25H14V23H12Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18 23C18 21.8954 18.8954 21 20 21H22C23.1046 21 24 21.8954 24 23V25C24 26.1046 23.1046 27 22 27H20C18.8954 27 18 26.1046 18 25V23ZM20 23H22V25H20V23Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M28 21C26.8954 21 26 21.8954 26 23V25C26 26.1046 26.8954 27 28 27H30C31.1046 27 32 26.1046 32 25V23C32 21.8954 31.1046 21 30 21H28ZM28 23V25H30V23H28Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10 31C10 29.8954 10.8954 29 12 29H14C15.1046 29 16 29.8954 16 31V33C16 34.1046 15.1046 35 14 35H12C10.8954 35 10 34.1046 10 33V31ZM14 31V33H12V31H14Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M20 29C18.8954 29 18 29.8954 18 31V33C18 34.1046 18.8954 35 20 35H22C23.1046 35 24 34.1046 24 33V31C24 29.8954 23.1046 29 22 29H20ZM22 31H20V33H22V31Z"
                        fill="currentColor"></path>
                    <path
                        d="M36 32.5C36 31.9477 35.5523 31.5 35 31.5C34.4477 31.5 34 31.9477 34 32.5V35.4142L35.2929 36.7071C35.6834 37.0976 36.3166 37.0976 36.7071 36.7071C37.0976 36.3166 37.0976 35.6834 36.7071 35.2929L36 34.5858V32.5Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 7C12 6.44772 12.4477 6 13 6C13.5523 6 14 6.44772 14 7V12C14 12.5523 14.4477 13 15 13C15.5523 13 16 12.5523 16 12V9H26V7C26 6.44772 26.4477 6 27 6C27.5523 6 28 6.44772 28 7V12C28 12.5523 28.4477 13 29 13C29.5523 13 30 12.5523 30 12V9H33C34.6569 9 36 10.3432 36 12V28.0709C39.3923 28.5561 42 31.4735 42 35C42 38.866 38.866 42 35 42C32.6213 42 30.5196 40.8135 29.2547 39H9C7.34315 39 6 37.6569 6 36V12C6 10.3431 7.34315 9 9 9H12V7ZM28 35C28 31.4735 30.6077 28.5561 34 28.0709V18H8V36C8 36.5523 8.44772 37 9 37H28.2899C28.1013 36.3663 28 35.695 28 35ZM40 35C40 37.7614 37.7614 40 35 40C32.2386 40 30 37.7614 30 35C30 32.2386 32.2386 30 35 30C37.7614 30 40 32.2386 40 35Z"
                        fill="currentColor"></path>
                </svg>
                <div>
                    <a href="https://forms.gle/89LqgTxjs2MUBq6G7" target="_blank">
                        <h1 class="2xl:text-4xl font-bold text-white">Move out pass</h1>

                    </a>
                </div>
            </div>
            <div class="flex mt-5 space-x-2 items-center ">
                <svg class="2xl:h-20 2xl:w-20 h-10 w-10 text-red-600" viewBox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 21C10.8954 21 10 21.8954 10 23V25C10 26.1046 10.8954 27 12 27H14C15.1046 27 16 26.1046 16 25V23C16 21.8954 15.1046 21 14 21H12ZM12 23V25H14V23H12Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18 23C18 21.8954 18.8954 21 20 21H22C23.1046 21 24 21.8954 24 23V25C24 26.1046 23.1046 27 22 27H20C18.8954 27 18 26.1046 18 25V23ZM20 23H22V25H20V23Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M28 21C26.8954 21 26 21.8954 26 23V25C26 26.1046 26.8954 27 28 27H30C31.1046 27 32 26.1046 32 25V23C32 21.8954 31.1046 21 30 21H28ZM28 23V25H30V23H28Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10 31C10 29.8954 10.8954 29 12 29H14C15.1046 29 16 29.8954 16 31V33C16 34.1046 15.1046 35 14 35H12C10.8954 35 10 34.1046 10 33V31ZM14 31V33H12V31H14Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M20 29C18.8954 29 18 29.8954 18 31V33C18 34.1046 18.8954 35 20 35H22C23.1046 35 24 34.1046 24 33V31C24 29.8954 23.1046 29 22 29H20ZM22 31H20V33H22V31Z"
                        fill="currentColor"></path>
                    <path
                        d="M36 32.5C36 31.9477 35.5523 31.5 35 31.5C34.4477 31.5 34 31.9477 34 32.5V35.4142L35.2929 36.7071C35.6834 37.0976 36.3166 37.0976 36.7071 36.7071C37.0976 36.3166 37.0976 35.6834 36.7071 35.2929L36 34.5858V32.5Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 7C12 6.44772 12.4477 6 13 6C13.5523 6 14 6.44772 14 7V12C14 12.5523 14.4477 13 15 13C15.5523 13 16 12.5523 16 12V9H26V7C26 6.44772 26.4477 6 27 6C27.5523 6 28 6.44772 28 7V12C28 12.5523 28.4477 13 29 13C29.5523 13 30 12.5523 30 12V9H33C34.6569 9 36 10.3432 36 12V28.0709C39.3923 28.5561 42 31.4735 42 35C42 38.866 38.866 42 35 42C32.6213 42 30.5196 40.8135 29.2547 39H9C7.34315 39 6 37.6569 6 36V12C6 10.3431 7.34315 9 9 9H12V7ZM28 35C28 31.4735 30.6077 28.5561 34 28.0709V18H8V36C8 36.5523 8.44772 37 9 37H28.2899C28.1013 36.3663 28 35.695 28 35ZM40 35C40 37.7614 37.7614 40 35 40C32.2386 40 30 37.7614 30 35C30 32.2386 32.2386 30 35 30C37.7614 30 40 32.2386 40 35Z"
                        fill="currentColor"></path>
                </svg>
                <div>
                    <a href="https://forms.gle/aHryVVqrrsmhLStQ6" target="_blank">
                        <h1 class="2xl:text-4xl font-bold text-white">Resident Satisfaction Survey Form</h1>

                    </a>
                </div>
            </div>
            <h1 class="text-4xl text-center uppercase my-5 text-gray-800 font-bold">CONTACT HOTLINES
            </h1>
            <img src="{{ asset('images/announcement/announcement4.png') }}" class="w-full" alt="">
            <h1 class="text-4xl text-center uppercase my-5 text-gray-800 font-bold">upcoming Schedules
            </h1>
            <div class="bg-white p-5 rounded-lg" id='calendar'></div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth'
                    });
                    calendar.render();
                });
            </script>
        </div>
    </div>
</x-guests-layout>
