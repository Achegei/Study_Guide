@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .accordion-content.open {
            max-height: 500px; /* A value large enough to hold the content */
            transition: max-height 0.5s ease-in;
        }
    </style>

    <!--
        This welcome page has been completely redesigned to focus exclusively on the Canadian Citizenship Test.
        - The hero section now includes a placeholder for a large, professional banner image with a semi-transparent blue overlay and a "Watch Video" call-to-action.
        - The "Popular Exams" section has been replaced with a features list specific to this service.
        - The detailed study guide information has been organized into a collapsible accordion for a clean, professional look.
        - The payment section has been merged into a single, comprehensive Call to Action (CTA) block after the accordion to drive one-time payments for full access.
        - The layout is fully responsive, adapting to mobile, tablet, and desktop screens using Tailwind CSS.
    -->

    <!-- 🇨🇦 Hero Section: Main Call to Action with Image and Video CTA -->
    <section class="relative text-white py-20 md:py-32 rounded-b-3xl shadow-xl overflow-hidden">
        <!-- Image Placeholder with Darkened Overlay -->
        <div class="absolute inset-0 z-0">
            <!-- Full-opacity image placeholder -->
            <img 
                src="{{ asset('images/toronto-skyline.png') }}" 
                alt="Toronto Skyline" 
                class="w-full h-full object-cover"
            >
            <!-- Blue Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-70"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 animate-fade-in">
                Your Path to Canadian Citizenship Starts Here
            </h1>
            <p class="text-xl sm:text-2xl font-light mb-8 max-w-3xl mx-auto opacity-90 animate-fade-in-delay">
                Prepare with our up-to-date, comprehensive online training program.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('register.payment') }}" class="inline-block bg-white text-blue-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                    Get Started for $10
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:bg-blue-500 transform hover:scale-105 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                    </svg>
                    Watch a Site Tour Video
                </a>
            </div>
        </div>
    </section>

    <!-- 💡 Key Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Why Choose Our Service?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl text-blue-600 mb-4">📚</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Accurate & Updated</h3>
                    <p class="text-sm text-gray-600">
                        Content is an accurate reflection of the official Discover Canada guide.
                    </p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl text-green-600 mb-4">🏆</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Proven Success</h3>
                    <p class="text-sm text-gray-600">
                        Trusted by over 350,000 successful users across Canada.
                    </p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl text-yellow-600 mb-4">✍️</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Realistic Practice</h3>
                    <p class="text-sm text-gray-600">
                        Get practice questions that mirror the format of the official test.
                    </p>
                </div>
                <!-- Feature 4 -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl text-red-600 mb-4">🧐</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Expert Explanations</h3>
                    <p class="text-sm text-gray-600">
                        Includes helpful tips and detailed explanations for every question.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 📖 Study Guide Content Section - Accordion -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Essential Study Guide Chapters</h2>
            <div class="space-y-4">

                <!-- Accordion Item 1: Applying for Citizenship -->
                <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden">
                    <button class="accordion-header w-full flex justify-between items-center p-6 text-xl font-semibold text-left text-gray-800 focus:outline-none">
                        <span>Applying for Citizenship – A Summary</span>
                        <span class="accordion-icon transform transition-transform duration-300">+</span>
                    </button>
                    <div class="accordion-content px-6 pb-6 text-gray-600">
                        <ul class="list-disc list-inside space-y-2 text-sm">
                            <li>When you apply for Canadian citizenship, officials verify your eligibility and requirements, which may take several months.</li>
                            <li>You must study the official guide to prepare for the test.</li>
                            <li>The test is usually written but can sometimes be an interview.</li>
                            <li>It tests your knowledge of Canada, citizenship rights/responsibilities, and English/French proficiency.</li>
                            <li>Applicants aged 55+ are exempt from the test. All questions come from the official study guide.</li>
                            <li>If you pass and meet all requirements, you will be invited to the Oath of Citizenship ceremony.</li>
                        </ul>
                    </div>
                </div>

                <!-- Accordion Item 2: Rights and Responsibilities -->
                <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden">
                    <button class="accordion-header w-full flex justify-between items-center p-6 text-xl font-semibold text-left text-gray-800 focus:outline-none">
                        <span>Rights and Responsibilities of Citizenship</span>
                        <span class="accordion-icon transform transition-transform duration-300">+</span>
                    </button>
                    <div class="accordion-content px-6 pb-6 text-gray-600">
                        <p class="mb-4 text-sm">
                            Canadian rights and responsibilities are rooted in history and law, shaped by English common law, the French civil code, parliamentary laws, and the British constitutional tradition.
                        </p>
                        <h4 class="font-bold text-gray-700 mb-2">Key Rights:</h4>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            <li>Fundamental Freedoms (conscience, religion, expression, etc.)</li>
                            <li>Mobility Rights (live/work anywhere in Canada)</li>
                            <li>Aboriginal Peoples’ Rights</li>
                            <li>Official Language Rights</li>
                            <li>Multiculturalism and Equality</li>
                        </ul>
                        <h4 class="font-bold text-gray-700 mt-4 mb-2">Key Responsibilities:</h4>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            <li>Vote in all elections</li>
                            <li>Help others through volunteering</li>
                            <li>Protect Canada’s heritage and environment</li>
                            <li>Obey the law and take responsibility for your family</li>
                            <li>Serve on a jury when called</li>
                            <li>Defending Canada (voluntary service)</li>
                        </ul>
                    </div>
                </div>

                <!-- Accordion Item 3: Who We Are -->
                <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden">
                    <button class="accordion-header w-full flex justify-between items-center p-6 text-xl font-semibold text-left text-gray-800 focus:outline-none">
                        <span>Who We Are: Founding Peoples and Diversity</span>
                        <span class="accordion-icon transform transition-transform duration-300">+</span>
                    </button>
                    <div class="accordion-content px-6 pb-6 text-gray-600">
                        <p class="mb-4 text-sm">
                            Canada is a strong, free nation founded on "Peace, Order, and Good Government." It is a land of three founding peoples: Aboriginal, French, and English.
                        </p>
                        <h4 class="font-bold text-gray-700 mb-2">Three Founding Peoples:</h4>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            <li>Aboriginal Peoples: First Nations, Inuit, and Métis, whose rights are protected by the Constitution.</li>
                            <li>French Canadians: Including Quebecers and Acadians, with French as an official language.</li>
                            <li>English Canadians: Descendants of settlers from the British Isles, with English as the other official language.</li>
                        </ul>
                        <p class="mt-4 text-sm">
                            Canada is also a land of immigrants from around the world, celebrating multiculturalism and diversity, including religious freedom and LGBTQ+ equality.
                        </p>
                    </div>
                </div>

                <!-- Accordion Item 4: Canada's History -->
                <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden">
                    <button class="accordion-header w-full flex justify-between items-center p-6 text-xl font-semibold text-left text-gray-800 focus:outline-none">
                        <span>Canada’s History: From Contact to Modernity</span>
                        <span class="accordion-icon transform transition-transform duration-300">+</span>
                    </button>
                    <div class="accordion-content px-6 pb-6 text-gray-600">
                        <p class="mb-4 text-sm">
                            Canada's history is a story of Aboriginal peoples, European contact, and the formation of a modern nation. Key events include the fur trade, the War of 1812, the Métis uprisings led by Louis Riel, and the post-WWII economic boom and social changes.
                        </p>
                        <p class="text-sm">
                            Post-war Canada saw the creation of a social safety net, a strong international role in NATO and the UN, and major cultural shifts towards multiculturalism and expanded voting rights.
                        </p>
                    </div>
                </div>

                <!-- Accordion Item 5: How Canadians Govern Themselves -->
                <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden">
                    <button class="accordion-header w-full flex justify-between items-center p-6 text-xl font-semibold text-left text-gray-800 focus:outline-none">
                        <span>How Canadians Govern Themselves</span>
                        <span class="accordion-icon transform transition-transform duration-300">+</span>
                    </button>
                    <div class="accordion-content px-6 pb-6 text-gray-600">
                        <p class="mb-4 text-sm">
                            Canada's government is based on three principles: a federal state (power divided between federal and provincial governments), a parliamentary democracy (elected representatives pass laws), and a constitutional monarchy (with the Sovereign as Head of State).
                        </p>
                        <p class="text-sm">
                            Federal elections are held every four years for citizens over 18. The leader of the party with the most seats becomes the Prime Minister. Canada also has provincial and municipal governments.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- 🚀 New, Merged Call to Action for Full Access -->
            <div class="bg-blue-800 text-white rounded-xl shadow-lg p-8 text-center mt-12">
                <!-- Interac Image -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/interac-logo.png') }}" onerror="this.onerror=null;this.src='https://placehold.co/200x50/FFFFFF/000000?text=Interac+e-Transfer';" alt="Interac e-Transfer" class="h-10 w-auto">
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-2">
                    Access All Materials & 400+ Prep Tests
                </h3>
                <p class="text-lg mb-4 opacity-90">
                    Get unlimited access with a single **one-time payment of $10**.
                </p>
                <p class="text-sm md:text-base mb-6 max-w-lg mx-auto">
                    Pay securely by **Interac e-Transfer**. Send payment to **pay@citizenshipsupport.ca** and include your email in the message. Access details will be sent immediately.
                </p>
                <a href="{{ route('register.payment') }}" class="inline-block bg-white text-blue-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                    Pay Now for Access
                </a>
            </div>
        </div>
    </section>

    <!-- Inline JS for Accordion -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('.accordion-icon');

                    // Close all other open accordion items
                    document.querySelectorAll('.accordion-content.open').forEach(item => {
                        if (item !== content) {
                            item.classList.remove('open');
                            item.previousElementSibling.querySelector('.accordion-icon').textContent = '+';
                        }
                    });

                    // Toggle the clicked item
                    content.classList.toggle('open');
                    if (content.classList.contains('open')) {
                        icon.textContent = '-';
                    } else {
                        icon.textContent = '+';
                    }
                });
            });
        });
    </script>
    
    <!-- External script from public/js/script.js -->
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
