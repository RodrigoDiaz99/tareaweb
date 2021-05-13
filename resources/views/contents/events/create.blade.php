<x-app-layout title="Prolifearmy | Agregar evento ">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 text-gray-700 dark:text-gray-400">
            <form action="{{ route('contentevent_store') }}" method="POST">
                @csrf

                <h1 class="text-center text-3xl">Agregar parrafos</h1>
                <hr>
                <br>

                <div class="grid md:space-x-4 grid-cols-1 md:grid-cols-2">
                    <div class="flex-1">
                        <label class="block text-sm">
                            <label for="datepicker" class="text-gray-700 dark:text-gray-400">Nombre del evento</label>
                            <input type="text" id="name_event"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="name_event" autofocus required>

                        </label>
                    </div>

                    <div class="flex-1">
                        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                            <div class="mb-5 w-full">
                                <label for="datepicker" class="text-gray-700 dark:text-gray-400">Fecha</label>
                                <div class="relative">
                                    <input type="hidden" name="date" x-ref="date">
                                    <input type="text" readonly x-model="datepickerValue"
                                        @click="showDatepicker = !showDatepicker"
                                        @keydown.escape="showDatepicker = false"
                                        class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        placeholder="Select date">

                                    <div class="absolute top-0 right-0 px-3 py-2">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>


                                    <!-- <div x-text="no_of_days.length"></div>
                                        <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                        <div x-text="new Date(year, month).getDay()"></div> -->

                                    <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                        style="width: 17rem" x-show.transition="showDatepicker"
                                        @click.away="showDatepicker = false">

                                        <div class="flex justify-between items-center mb-2">
                                            <div>
                                                <span x-text="MONTH_NAMES[month]"
                                                    class="text-lg font-bold text-gray-800"></span>
                                                <span x-text="year"
                                                    class="ml-1 text-lg text-gray-600 font-normal"></span>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                    :disabled="month == 0 ? true : false"
                                                    @click="month--; getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-500 inline-flex" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                    :disabled="month == 11 ? true : false"
                                                    @click="month++; getNoOfDays()">
                                                    <svg class="h-6 w-6 text-gray-500 inline-flex" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap mb-3 -mx-1">
                                            <template x-for="(day, index) in DAYS" :key="index">
                                                <div style="width: 14.26%" class="px-1">
                                                    <div x-text="day"
                                                        class="text-gray-800 font-medium text-center text-xs"></div>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex flex-wrap -mx-1">
                                            <template x-for="blankday in blankdays">
                                                <div style="width: 14.28%"
                                                    class="text-center border p-1 border-transparent text-sm"></div>
                                            </template>
                                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                    <div @click="getDateValue(date)" x-text="date"
                                                        class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                        :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid md:space-x-4 grid-cols-1 md:grid-cols-2">
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Hora</span>
                                <input type="text" id="timepicker"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="hour" required>

                            </label>
                        </label>
                    </div>

                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Lugar</span>
                                <input type="text" id="place"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="place" required>

                            </label>
                        </label>
                    </div>
                </div>

                <div class="flex-1">
                    <label class="block mt-4 text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Descripcion</span>
                            <textarea type="text" id="description"
                                class="block resize-none w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="description" required></textarea>

                        </label>
                    </label>
                </div>

                <div class="py-12 flex justify-center">
                    <button type="submit"
                        class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        <i class="fas fa-save mr-2"></i>
                        <span>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script> --}}
    <!-- component -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $('#timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '7',
        maxTime: '10:00pm',
        defaultTime: '7',
        startTime: '7:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>
    <script>
        const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ];
        const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: '',

                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                getDateValue(date) {
                    let selectedDate = new Date(this.year, this.month, date);
                    this.datepickerValue = selectedDate.toDateString();

                    this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-
                        2) + "-" + ('0' + selectedDate.getDate()).slice(-2);

                    console.log(this.$refs.date.value);

                    this.showDatepicker = false;
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                }
            }
        }

    </script>
</x-app-layout>
