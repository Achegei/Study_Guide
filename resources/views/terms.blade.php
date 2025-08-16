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
                <h2>✅ Terms of Use</h2>
                <p>By purchasing or accessing our platform, you agree to the following terms:</p>
                <ul>
                    <li><strong>License and Access:</strong> Your access is a personal, non-transferable license valid for one year from the date of purchase. It is a one-time payment for this period.</li>
                    <li><strong>Content Usage:</strong> All study materials are for your personal learning purposes only.</li>
                    <li><strong>Prohibited Actions:</strong> Sharing, reselling, or distributing our content to others is strictly prohibited.</li>
                    <li><strong>Disclaimer:</strong> We are an independent study resource and are not affiliated with the Government of Canada, any provincial driving authorities, or Immigration, Refugees and Citizenship Canada (IRCC). Our materials are designed as study aids and are not official exam copies.</li>
                    <li><strong>Refunds:</strong> All sales are final. Refunds are not available once access to the study materials has been delivered to you.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection