@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
           
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h2>✅ Contact Us</h2>
                <p>If you have any questions about payments, access, or technical support, please contact us:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:support@iqracanadatestprep.ca">support@iqracanadatestprep.ca</a></li>
                      <li><strong>Live Chat:</strong> <a href="">💬 Live Chat: Available 24/7 on our website</a></li>
                </ul>
                
                <div class="mt-8 space-y-6 text-gray-600">
                    <div>
                        <h3 class="flex items-center text-lg font-bold text-gray-800 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.5M12 21v-4.5m3.75 4.5V12M18 12.75V9M12 21a9 9 0 01-9-9c0-2.31 1.6-4.5 4.75-4.5a.75.75 0 01.75.75V9a.75.75 0 00-.75.75c-3.15 0-4.75-2.25-4.75-4.5A9 9 0 0112 3a9 9 0 019 9c0 2.31-1.6 4.5-4.75 4.5a.75.75 0 01-.75-.75V15a.75.75 0 00.75-.75c3.15 0 4.75 2.25 4.75 4.5a9 9 0 01-9 9z" />
                            </svg>
                            Head Office
                        </h3>
                        <p class="pl-7">
                            5520 – 144A Avenue NW<br>
                            Edmonton, AB T5A 3P4<br>
                            Canada
                        </p>
                    </div>

                    <div>
                        <h3 class="flex items-center text-lg font-bold text-gray-800 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-19.5 0A2.25 2.25 0 005 18.75h14.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H5A2.25 2.25 0 002.75 6.75v12a2.25 2.25 0 002.25 2.25H2.75m19.5 0V6.75a2.25 2.25 0 00-2.25-2.25H5A2.25 2.25 0 002.75 6.75v12a2.25 2.25 0 002.25 2.25H2.75m19.5 0V6.75a2.25 2.25 0 00-2.25-2.25H5A2.25 2.25 0 002.75 6.75v12a2.25 2.25 0 002.25 2.25H2.75M12 12a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg>
                            Mailing Address
                        </h3>
                        <p class="pl-7">
                            P.O. Box 661, Station Main<br>
                            Edmonton, AB T5J 2K8<br>
                            Canada
                        </p>
                    </div>
                </div>

                <p class="mt-4 text-gray-600">We respond to all inquiries within one hour.</p>
            </div>
        </div>
    </div>
@endsection