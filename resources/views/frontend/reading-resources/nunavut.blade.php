@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styles for the reading material content */
        .prose h2 {
            font-size: 2.25rem; /* text-4xl */
            font-weight: 700;   /* font-bold */
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .prose h3 {
            font-size: 1.5rem; /* text-2xl */
            font-weight: 600;   /* font-semibold */
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .prose ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            list-style-position: outside;
            margin-bottom: 1rem;
        }
        .prose li {
            margin-bottom: 0.5rem;
        }
    </style>

    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-10 border border-gray-200">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
                    Comprehensive Territorial Summary: Nunavut 🇨🇦
                </h1>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    <h2>Chapter 1: Rights & Responsibilities of Citizenship</h2>
                    <p>Canadian citizens enjoy fundamental rights—including freedom of speech, mobility, religion, and equality. Equally important are civic duties: obeying the law, voting, serving on a jury, and caring for the environment. In Nunavut, these responsibilities also reflect traditional values like respect for elders, community cooperation, and stewardship of the land.</p>
                    <br>

                    <h2>Chapter 2: Who We Are – Canada’s Identity</h2>
                    <p>Canada is a multicultural nation built on relationships among Indigenous peoples, descendants of French and British settlers, and newcomers worldwide. Nunavut is unique: over 85% of its population is Inuit, and Inuktitut is widely spoken alongside English and French. Inuit culture—particularly storytelling, community values, seasonal knowledge, and respect for the land—is central to the territory’s identity.</p>
                    <br>

                    <h2>Chapter 3: Canada’s History</h2>
                    <p>Indigenous peoples have lived across Canada for millennia. In Nunavut, the Inuit developed sophisticated ways to navigate sea ice, whales’ migratory patterns, and the Arctic’s climate. European contact came later—fur traders in the 18th century, followed by northern exploration. Nunavut was officially established on <strong>April 1, 1999</strong>, following the Nunavut Land Claims Agreement, making it Canada’s newest territory and affirming Inuit rights and self-governance.</p>
                    <br>

                    <h2>Chapter 4: Modern Canada</h2>
                    <p>Canada today is known for peace, diversity, robust democracy, and respect for human rights. Nunavut operates under a blended governance system integrating <strong>Inuit Qaujimajatuqangit</strong> (traditional knowledge) and parliamentary practices. Public services are largely government-led, focusing on social welfare, education, housing, and infrastructure—key priorities in remote and northern communities.</p>
                    <br>

                    <h2>Chapter 5: How Canadians Govern Themselves</h2>
                    <p>Canada is a constitutional monarchy and parliamentary democracy. The monarch is Canada’s head of state, represented nationally by the Governor General, and in Nunavut by the Commissioner (appointed federally). Nunavut uses a <strong>consensus-style legislature</strong>, where elected Members of the Legislative Assembly (MLAs) select the Premier and cabinet. This system ensures inclusive decision-making and reflects Inuit values of cooperation and respect.</p>
                    <br>

                    <h2>Chapter 6: Federal Elections</h2>
                    <p>Citizens aged 18 or older may vote in federal elections. Nunavut forms a single electoral district, which elects one Member of Parliament to represent the territory in Ottawa. Campaigns often address issues relevant to the North: transportation, communications, high cost of living, housing, and Indigenous education.</p>
                    <br>

                    <h2>Chapter 7: The Justice System</h2>
                    <p>Canada’s justice system is based on English common law, with influences from French civil law. Everyone is equal before the law and has rights to fair treatment, legal representation, and a jury trial. In Nunavut, community justice approaches—including sentencing circles and restorative practices—complement formal courts to reflect Inuit cultural values.</p>
                    <br>

                    <h2>Chapter 8: Canadian Symbols</h2>
                    <p>Canada is symbolized by its flag (maple leaf), national anthem, and motto. Nunavut adds its own symbols: the territory’s flag, featuring a red <strong>inuksuk</strong> and <strong>North Star</strong>, and the territorial coat of arms with an inuksuk atop a qulliq (traditional Inuit oil lamp). These icons celebrate identity, history, and the Arctic landscape.</p>
                    <br>

                    <h2>Chapter 9: Canada’s Economy</h2>
                    <p>Canada’s diverse economy includes natural resources, manufacturing, technology, and services. Nunavut’s economy relies on public sector jobs, local businesses, mining (gold, diamonds), arts and crafts, fishing, and traditional harvesting. There’s growing investment in local training, tourism, and renewable energy to build self-reliance.</p>
                    <br>

                    <h2>Chapter 10: Canada’s Regions</h2>
                    <p>Canada is divided into six regions. Nunavut forms part of the Northern Region, which includes the Arctic. It is Canada’s largest territory by area but has many remote, fly-in-only communities. Important geographic facts: tundra terrain, numerous islands, permafrost, and wildlife like Arctic char, caribou, polar bears, and seals. <strong>Iqaluit</strong> is the capital and center of government and administration.</p>
                    <br>

                    <h2>📌 Citizenship Test Tips for Nunavut</h2>
                    <ul>
                        <li>Focus on consistent Inuit cultural integration in government, justice, and community life.</li>
                        <li>Know the Nunavut Land Claims Agreement (1993) and territory creation date (April 1, 1999).</li>
                        <li>Understand the consensus-style government, single MP representation, and the territory’s rights to self-determination.</li>
                        <li>Recognize territorial symbols: flag, inuksuk, and qulliq.</li>
                        <li>Review Indigenous rights and community justice models alongside federal law.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection