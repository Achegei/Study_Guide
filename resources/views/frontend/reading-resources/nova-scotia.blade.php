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
        .prose p {
            margin-bottom: 1rem;
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
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-10 border border-gray-200">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
                    Comprehensive Provincial Summary: Nova Scotia 🍁
                </h1>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    <h2>Chapter 1: Rights and Responsibilities of Citizenship</h2>
                    <p>Citizenship in Canada means much more than just holding a passport. Every citizen is guaranteed rights such as freedom of expression, belief, equality, and legal protection. At the same time, citizens must fulfill key responsibilities: obeying laws, serving on a jury if summoned, voting in elections, helping others, and protecting Canada’s natural environment.</p>
                    <p>In Nova Scotia, being an active citizen also involves participating in community events, respecting the province’s unique culture and heritage, and welcoming newcomers to the Maritime way of life.</p>
                    <br>
                    <hr>

                    <h2>Chapter 2: Who We Are – Canada’s Identity</h2>
                    <p>Canada’s identity is rooted in a mix of Indigenous, French, and British heritage, along with generations of immigrants. Nova Scotia reflects this beautifully. The name itself means “New Scotland” in Latin, a nod to its Scottish roots. The province also has strong ties to Acadian (French), African Nova Scotian, and Mi’kmaq Indigenous cultures.</p>
                    <p>This mix of backgrounds has created a vibrant cultural landscape — from Celtic music and Acadian festivals to Mi’kmaq traditions that have been passed down for centuries.</p>
                    <br>
                    <hr>

                    <h2>Chapter 3: Canada’s History</h2>
                    <p>Long before Europeans arrived, the <strong>Mi’kmaq</strong> people lived in what is now Nova Scotia, fishing, hunting, and trading across the land. In the 1600s, French settlers known as <strong>Acadians</strong> established farms and communities in the region. Over time, the British gained control, leading to the <strong>Expulsion of the Acadians in 1755</strong> — a major turning point in local history.</p>
                    <p>Nova Scotia became one of the <strong>original four provinces</strong> that joined Confederation in <strong>1867</strong>. It played an important role in shaping early Canada through its trade, shipbuilding, and political leadership.</p>
                    <br>
                    <hr>

                    <h2>Chapter 4: Modern Canada</h2>
                    <p>Canada is now a global leader in democracy, human rights, and multiculturalism. In Nova Scotia, these values are seen in the diversity of its population, its inclusive public services, and its efforts to reconcile with Indigenous communities.</p>
                    <p>Today, Nova Scotia balances its deep history with innovation. It’s home to thriving universities, growing tech industries, and ongoing efforts to preserve the province’s coastal and rural heritage.</p>
                    <br>
                    <hr>

                    <h2>Chapter 5: How Canadians Govern Themselves</h2>
                    <p>Canada is a constitutional monarchy with a parliamentary democracy. Laws are made by elected representatives and approved by the King’s representative, the Governor General. In Nova Scotia, provincial laws are passed by the <strong>Nova Scotia House of Assembly</strong>, located in Halifax. The province is led by a <strong>Premier</strong> and a <strong>Lieutenant Governor</strong>, who acts on behalf of the monarch.</p>
                    <p>Municipalities like Cape Breton, Lunenburg, and Truro each have local councils managing local services such as water, public transit, and waste collection.</p>
                    <br>
                    <hr>

                    <h2>Chapter 6: Federal Elections</h2>
                    <p>Every Canadian citizen aged 18 and up can vote in federal elections. Nova Scotia has multiple federal electoral districts, each electing one <strong>Member of Parliament (MP)</strong> to represent the area in Ottawa.</p>
                    <p>Participating in elections — learning about the candidates, asking questions, and voting — is both a right and a duty for all Canadian citizens. It ensures everyone has a voice in shaping Canada’s future.</p>
                    <br>
                    <hr>

                    <h2>Chapter 7: The Justice System</h2>
                    <p>Canada’s legal system is based on fairness and equality. Courts operate under common law, and all citizens are equal before the law. Everyone accused of a crime is presumed innocent until proven guilty and has the right to a fair trial.</p>
                    <p>Nova Scotia has its own provincial court system, including family, youth, and criminal courts. Police services include the Royal Canadian Mounted Police (RCMP) and local police departments such as the Halifax Regional Police.</p>
                    <br>
                    <hr>

                    <h2>Chapter 8: Canadian Symbols</h2>
                    <p>Canada’s symbols — including the maple leaf, national anthem, and the red-and-white flag — represent unity and pride. Nova Scotia has its own provincial symbols, too. The provincial flag features a <strong>Scottish cross with a royal lion</strong> in the center. The <strong>mayflower</strong>, a small pink flower, is the provincial floral emblem.</p>
                    <p>Nova Scotia’s coastal lighthouses, fiddle music, and strong sailing tradition are also part of its unique identity.</p>
                    <br>
                    <hr>

                    <h2>Chapter 9: Canada’s Economy</h2>
                    <p>Canada has a modern, mixed economy driven by natural resources, trade, and technology. Nova Scotia contributes through sectors like fishing, forestry, agriculture, and shipbuilding. The <strong>Port of Halifax</strong> is one of the busiest in Canada, connecting the province to global trade.</p>
                    <p>Tourism is also major — people come from around the world to see Nova Scotia’s historic towns, rugged coastline, and vibrant festivals. Education, healthcare, and public service jobs form a large part of the workforce.</p>
                    <br>
                    <hr>

                    <h2>Chapter 10: Canada’s Regions</h2>
                    <p>Canada is divided into six regions. Nova Scotia is part of <strong>Atlantic Canada</strong>, along with New Brunswick, Prince Edward Island, and Newfoundland and Labrador.</p>
                    <p>As a peninsula with over 7,000 km of coastline, Nova Scotia is known for its maritime lifestyle. The province includes both mainland areas and Cape Breton Island. <strong>Halifax is the capital and largest city.</strong> Its cultural blend, history, and strong sense of community make Nova Scotia distinct within the Canadian mosaic.</p>
                    <br>
                    <hr>

                    <h3>✅ Key Citizenship Test Points for Nova Scotia</h3>
                    <ul>
                        <li>Nova Scotia joined Confederation in <strong>1867</strong> (original four provinces)</li>
                        <li><strong>Halifax</strong> is the capital and major Atlantic seaport</li>
                        <li>Home to the Mi’kmaq Nation and Acadian settlers</li>
                        <li>Provincial flag features a Scottish cross and royal lion</li>
                        <li>Provincial flower is the <strong>mayflower</strong></li>
                        <li>Major historical event: the <strong>Expulsion of the Acadians (1755)</strong></li>
                        <li>Located in the <strong>Atlantic Region</strong> of Canada</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection