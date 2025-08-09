@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .content-container p, .content-container li {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #4b5563;
        }
    </style>

    <!--
        This page renders the full study guide content as provided by the user.
        - The content is organized with H2 and H3 tags for readability.
        - Tailwind CSS is used for all styling to maintain a modern, clean look.
        - A dedicated Call to Action (CTA) section is included at the very end to guide the user toward the free test.
    -->

    <section class="py-12 sm:py-20">
        <div class="max-w-6xl mx-auto px-4">
            <header class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    Study for Your Citizenship Test
                </h1>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    This is a summary of the official "Discover Canada" study guide.
                    Read through it, and when you're ready, take a free practice test.
                </p>
            </header>

            <div class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-200 content-container">

                <!-- Applying for Citizenship – Summary -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-6">Applying for Citizenship – Summary</h2>
                <p>When you apply for Canadian citizenship, officials verify your eligibility and requirements, which may take several months. Keep your contact information up to date with the Call Centre.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Preparing for the Citizenship Test</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Study the official guide.</li>
                    <li>Practise answering questions with others.</li>
                    <li>Seek information on citizenship classes from local schools or organizations.</li>
                    <li>Take free English or French classes offered by the government.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">About the Citizenship Test</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Usually written but sometimes an interview.</li>
                    <li>Tests knowledge of Canada, citizenship rights/responsibilities, and English/French proficiency.</li>
                    <li>Applicants aged 55+ are exempt from the test.</li>
                    <li>All questions come from the official study guide.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">After the Test</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>If you pass and meet all requirements, you’ll get a Notice to Appear for the Oath of Citizenship.</li>
                    <li>At the ceremony: take the oath, sign the form, receive your citizenship certificate.</li>
                    <li>If you fail, you’ll be notified of the next steps.</li>
                    <li>Family and friends are welcome at the ceremony.</li>
                </ul>

                <!-- Rights and Responsibilities of Citizenship -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Rights and Responsibilities of Citizenship</h2>
                <p>Canadian rights and responsibilities come from history, law, and shared values, shaped by English common law, the French civil code, parliamentary laws, and the British constitutional tradition dating back to Magna Carta (1215).</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Fundamental Freedoms</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Freedom of conscience, religion, thought, belief, opinion, expression, peaceful assembly, and association.</li>
                    <li>Habeas corpus — the right to challenge unlawful detention.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Canadian Charter of Rights and Freedoms (1982)</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Mobility Rights — live/work anywhere in Canada, travel freely, apply for a passport.</li>
                    <li>Aboriginal Peoples’ Rights — Charter does not diminish treaty rights.</li>
                    <li>Official Language Rights — English and French have equal status.</li>
                    <li>Multiculturalism — respect for cultural diversity.</li>
                    <li>Equality of Women and Men — equal under the law; strong protection against gender-based violence.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Citizenship Responsibilities</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Vote in all elections.</li>
                    <li>Help others through volunteering.</li>
                    <li>Protect Canada’s heritage and environment.</li>
                    <li>Obey the law — no one is above it.</li>
                    <li>Take responsibility for yourself and your family.</li>
                    <li>Serve on a jury when called.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Defending Canada</h3>
                <p>No mandatory military service, but voluntary service in the armed forces, reserves, coast guard, police, or emergency services is encouraged.</p>
                <p>Youth can join cadet programs to learn discipline, responsibility, and skills.</p>

                <!-- Who We Are -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Who We Are</h2>
                <p>Canada is a strong, free nation with the world’s oldest continuous constitutional tradition and the only constitutional monarchy in North America. Founded on Peace, Order, and Good Government, Canadians value ordered liberty, enterprise, hard work, and fairness.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Three Founding Peoples</h3>
                <p>Aboriginal Peoples — First Nations, Inuit, and Métis. Aboriginal rights are protected by the Constitution. Their history includes rich cultural traditions, treaty-making, and the tragedy of residential schools, for which the government formally apologized in 2008. Today, Aboriginal communities thrive in areas like agriculture, the environment, business, and the arts.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>First Nations — About half live on reserves, half in urban areas.</li>
                    <li>Inuit — Live in Arctic regions, adapted to harsh climates.</li>
                    <li>Métis — Mixed Aboriginal and European ancestry, mainly in the Prairies, with their own language (Michif).</li>
                </ul>
                <p>French Canadians — Includes Quebecers, Acadians, and Franco-Canadians in other provinces. French is one of Canada’s two official languages. Quebecers have a unique culture and identity; Acadians survived the “Great Upheaval” of deportation and remain culturally vibrant.</p>
                <p>English Canadians — Descendants of settlers from England, Scotland, Wales, and Ireland. English is the other official language.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Official Languages and Bilingualism</h3>
                <p>English and French are official languages nationwide; New Brunswick is fully bilingual.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Diversity and Immigration</h3>
                <p>Canada has long been a land of immigrants, with contributions from English, French, Scottish, Irish, German, Italian, Chinese, Ukrainian, South Asian, and other communities. Since the 1970s, most newcomers have come from Asia. Many non-official languages are spoken at home, with Chinese languages being the most common after English.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Religion and Inclusion</h3>
                <p>Most Canadians identify as Christian, but there is growing diversity with Muslims, Jews, Hindus, Sikhs, and non-religious communities. Canada values religious freedom, social harmony, and has partnered with faith groups in social services. LGBTQ+ Canadians enjoy full equality, including marriage rights.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Multiculturalism</h3>
                <p>Canada’s multicultural society is built on mutual respect, with diverse groups contributing to a shared Canadian identity.</p>

                <!-- Canada's History -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Canada’s History</h2>
                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Aboriginal Peoples Before European Arrival</h3>
                <p>When Europeans arrived, all regions of Canada were occupied by native peoples, whom the explorers mistakenly called "Indians." These groups lived in various ways, relying on the land for survival:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Hunters and Gatherers: The Cree and Dene in the Northwest were hunter-gatherers.</li>
                    <li>Farmers and Hunters: The Huron-Wendat and Iroquois of the Great Lakes region were both farmers and hunters.</li>
                    <li>Nomadic Peoples: The Sioux followed bison herds as nomads.</li>
                    <li>Arctic Dwellers: The Inuit lived off Arctic wildlife.</li>
                    <li>West Coast Natives: Groups on the West Coast preserved fish through drying and smoking.</li>
                </ul>
                <p>Warfare was common among Aboriginal groups as they competed for land, resources, and prestige.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">The Impact of European Contact</h3>
                <p>The arrival of Europeans brought significant changes to the native way of life.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Disease: Many Aboriginal people died from European diseases to which they had no immunity.</li>
                    <li>New Alliances: Despite the conflict, Aboriginal people and Europeans formed strong economic, religious, and military alliances in the first 200 years of coexistence. These relationships were crucial in laying the foundation for Canada.</li>
                    <li>Fur Trade: Aboriginal peoples were key collaborators in the fur trade, which was driven by the European demand for beaver pelts. This trade led to strong alliances between groups like the voyageurs and coureurs des bois and the First Nations.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Aboriginals in Canadian History</h3>
                <p>The text also highlights the role of Aboriginal peoples in later historical events:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>War of 1812: First Nations, including the Shawnee led by Chief Tecumseh, supported British soldiers and Canadian volunteers in defending Canada against American invasion.</li>
                    <li>The Loyalists: Joseph Brant, a Mohawk leader, led thousands of Loyalist Mohawk people into Canada after the American Revolution.</li>
                    <li>Métis Uprisings: When Canada took over the Northwest from the Hudson's Bay Company, the Métis of the Red River were not consulted. This led to an armed uprising led by Louis Riel, who is now seen by many as a hero and the father of Manitoba. After the second rebellion in 1885, Riel was executed for high treason.</li>
                </ul>

                <!-- Modern Canada -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Modern Canada</h2>
                <p>After the Second World War, Canada experienced a period of significant economic growth and social change</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Economic Growth and Social Programs</h3>
                <p>From 1945 to 1970, Canada's economy thrived, becoming one of the strongest among industrialized nations. This prosperity was fueled by new international trade agreements and the discovery of oil in Alberta in 1947. This economic success allowed the country to develop a social safety net, which included:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Unemployment insurance (now called "employment insurance") in 1940.</li>
                    <li>Old Age Security in 1927.</li>
                    <li>The Canada and Quebec Pension Plans in 1965.</li>
                    <li>The Canada Health Act, which established a basic standard of healthcare coverage.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">International Role</h3>
                <p>During the Cold War, Canada strengthened its international presence by joining military alliances like the North Atlantic Treaty Organization (NATO) and North American Aerospace Defence Command (NORAD). Canada also became a member of the United Nations (UN) and contributed to various peacekeeping and security operations, including the Korean War, where 500 Canadians were killed and 1,000 were wounded.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">A Changing Society and Culture</h3>
                <p>Canada's postwar society became more diverse and open.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Multiculturalism: By the 1960s, one-third of Canadians had non-British or non-French origins. This diversity was officially recognized, and the idea of multiculturalism gained new momentum.</li>
                    <li>Voting Rights: The right to vote was extended to more groups, with Japanese-Canadians gaining the right in 1948 and all Aboriginal people in 1960. Today, every citizen over 18 can vote.</li>
                    <li>Refugees: Canada welcomed thousands of refugees, including about 37,000 Hungarians in 1956 and over 50,000 Vietnamese in 1975, who were fleeing communist regimes.</li>
                    <li>Quebec's Quiet Revolution: Quebec underwent a period of rapid social change in the 1960s. This led to the Official Languages Act of 1969, which made French and English official languages in the federal government. The movement for Quebec sovereignty led to referendums in 1980 and 1995, both of which were defeated.</li>
                    <li>Cultural Achievements: Canadians made significant contributions in the arts, with groups like the Group of Seven in painting and pioneering Inuit artists like Kenojuak Ashevak. The performing arts and sports also flourished. James Naismith, a Canadian, invented basketball in 1891.</li>
                    <li>Science and Innovation: Canadians have invented numerous things, from the snowmobile (Joseph-Armand Bombardier) to the Canadarm used in space exploration. Canadian scientists have also won Nobel Prizes.</li>
                </ul>

                <!-- How Canadians Govern Themselves -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">How Canadians Govern Themselves</h2>
                <p>Canada's government is defined by three main principles: a federal state, a parliamentary democracy, and a constitutional monarchy.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Federal State</h3>
                <p>Canada operates as a federal state, meaning that governing power is divided between different levels. The federal government handles national and international matters like defense, foreign policy, and citizenship. Provincial governments manage local issues such as education, healthcare, and highways. Some responsibilities, like agriculture and immigration, are shared. This system allows provinces to create policies that are tailored to their specific populations.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Parliamentary Democracy</h3>
                <p>In Canada's parliamentary democracy, citizens elect representatives to the House of Commons and provincial legislatures. These elected officials are responsible for passing laws, approving spending, and holding the government accountable. The Prime Minister, who leads the federal government, and the Cabinet must have the confidence of the elected House of Commons to stay in power.</p>
                <p>The process for making a law involves a bill being reviewed and passed by both the House of Commons and the Senate before it receives royal assent from the Governor General.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Constitutional Monarchy</h3>
                <p>Canada is also a constitutional monarchy, with a hereditary Sovereign (King or Queen) as the Head of State. The Sovereign's role is largely non-partisan and ceremonial. The Sovereign is represented in Canada by the Governor General and in each province by a Lieutenant Governor. The day-to-day governing of the country is handled by the Prime Minister and their cabinet. This system clearly distinguishes the head of state from the head of government.</p>

                <!-- Federal Elections -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Federal Elections</h2>
                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Federal Elections and Voting</h3>
                <p>In Canada, citizens vote in federal elections to choose a Member of Parliament (MP) to represent their specific geographic area, known as a riding or electoral district. There are currently 308 electoral districts.</p>
                <p>To vote in a federal election, you must be a Canadian citizen, at least 18 years old, and on the voters' list. You can register to vote through Elections Canada, and your vote is cast by secret ballot, ensuring privacy. Federal elections are held every four years on the third Monday in October, though the Prime Minister can ask for an earlier election.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Government Formation</h3>
                <p>After an election, the leader of the political party that wins the most seats in the House of Commons is typically asked by the Governor General to become the Prime Minister and form the new government.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>A majority government is formed if the governing party holds at least half of the seats.</li>
                    <li>A minority government is formed if they hold less than half.</li>
                </ul>
                <p>The Prime Minister appoints Cabinet ministers, who are responsible for running government departments. The party or parties not in power are known as opposition parties, with the largest one being the Official Opposition. Their job is to hold the government accountable and propose alternative ideas.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Other Levels of Government</h3>
                <p>In addition to the federal government, Canada has provincial/territorial and municipal governments.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Provincial and Territorial Governments are led by a Premier and have their own elected legislative assemblies. They are responsible for areas like education, healthcare, and highways.</li>
                    <li>Municipal Governments handle local matters through a mayor and council. They manage services such as sanitation, public transit, and emergency services.</li>
                    <li>First Nations have their own system of chiefs and councillors who manage services on their reserves.</li>
                </ul>

                <!-- The Justice System -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">The Justice System</h2>
                <p>The Canadian justice system is founded on the principles of due process and the rule of law, guaranteeing that everyone is presumed innocent until proven guilty. This legal system is based on an organized set of laws created by elected officials that apply to everyone, including politicians and police.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Key Components of the Justice System</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Courts: The highest court in Canada is the Supreme Court of Canada. The Federal Court handles matters related to the federal government, while provincial courts deal with a range of cases, from appeals and trials to smaller offenses and civil disputes.</li>
                    <li>Police: The police's role is to keep people safe and enforce the law. They can be asked for help in a variety of situations, from accidents to criminal activity. Police forces in Canada include provincial, municipal, and the Royal Canadian Mounted Police (RCMP), which enforces federal laws and also acts as the provincial police in many regions.</li>
                    <li>Legal Help: Lawyers can assist with legal issues. For those who can't afford a lawyer, most communities offer legal aid services that are either free or low-cost.</li>
                </ul>

                <!-- Canada Symbols -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Canada Symbols</h2>
                <p>Canada has a variety of symbols that represent its history, identity, and values.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">National Symbols</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>The Canadian Crown has been a symbol of the state for over 400 years and represents the government, including Parliament, the courts, and the Canadian Forces.</li>
                    <li>The Canadian flag, with its iconic red and white maple leaf, was first raised in 1965. The maple leaf itself has been a symbol for French Canadians since the 1700s and appears on military uniforms and headstones of soldiers.</li>
                    <li>The fleur-de-lys is a symbol of French royalty that has been a part of Canada's history for over 1,000 years. It is featured on Quebec's provincial flag.</li>
                    <li>The coat of arms and national motto, A mari usque ad mare ("from sea to sea"), were adopted after the First World War.</li>
                    <li>The beaver became a symbol of Canada centuries ago due to its importance in the fur trade. It is featured on the five-cent coin and several provincial and city coats of arms.</li>
                    <li>"O Canada" became the national anthem in 1980, with distinct French and English lyrics.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Culture and History</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Parliament Buildings: The architecture of the Parliament Buildings in Ottawa reflects French, English, and Aboriginal traditions. The Peace Tower was built to commemorate Canadian soldiers who died in the First World War.</li>
                    <li>Official Languages: English and French are Canada's two official languages and are considered important symbols of national identity. The Official Languages Act of 1969 ensures their equality in the government and promotes their use in Canadian society.</li>
                    <li>Sports: Hockey is considered the national winter sport, and lacrosse, an ancient sport first played by Aboriginal peoples, is the official summer sport.</li>
                    <li>Honours: The Victoria Cross (V.C.) is the highest honor for Canadians, awarded for conspicuous bravery in the presence of the enemy. Ninety-six Canadians have received it since 1854.</li>
                    <li>National Holidays: Key public holidays include Canada Day on July 1 and Remembrance Day on November 11.</li>
                </ul>

                <!-- Canada’s Economy -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Canada’s Economy</h2>
                <p>Canada has a diverse and robust economy that is highly dependent on international trade.</p>

                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Key Economic Facts</h3>
                <p>Trading Nation: Canada is one of the world's top trading nations, with commerce driving its economic growth. A crucial part of this is the North American Free Trade Agreement (NAFTA), which Canada joined in 1994, linking it with the United States and Mexico. The United States is Canada's largest trading partner, receiving over three-quarters of its exports.</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Global Standing: Canada has one of the ten largest economies in the world and is a member of the G8 group of leading industrialized countries.</li>
                    <li>Economic Sectors: Canada's economy is made up of three main types of industries:</li>
                </ul>
                <ul class="list-disc list-inside ml-6 space-y-2">
                    <li>Service industries: Employ more than 75% of the workforce in areas such as healthcare, education, retail, and transportation.</li>
                    <li>Manufacturing industries: Produce a wide range of goods, including cars, high-tech equipment, and food products, for both domestic and international sale.</li>
                    <li>Natural resources industries: These include forestry, fishing, agriculture, mining, and energy. They have been vital to Canada's history and development, and natural resource commodities still make up a large portion of the country's exports.</li>
                </ul>
                <p>The close economic relationship between Canada and the United States, symbolized by "the world's longest undefended border," is crucial to both countries' prosperity.</p>

                <!-- Canada’s Regions -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-12 mb-6">Canada’s Regions</h2>
                <p>Canada is a vast country with a diverse geography, which is divided into five main regions: the Atlantic Provinces, Central Canada, the Prairie Provinces, the West Coast, and the Northern Territories. The nation's capital is Ottawa, chosen by Queen Victoria in 1857.</p>
                <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Regional Summaries</h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>The Atlantic Provinces (Newfoundland and Labrador, Prince Edward Island, Nova Scotia, and New Brunswick) are known for their coastal economies based on fishing, forestry, and mining. This region is home to the oldest British colony, the birthplace of Confederation, and Canada's largest naval base in Halifax. New Brunswick stands out as Canada's only officially bilingual province.</li>
                    <li>Central Canada (Quebec and Ontario) is the country's industrial and manufacturing heartland, where over half of all Canadians reside. These provinces produce more than 75% of Canada's manufactured goods. Quebec, a predominantly French-speaking province, is a leader in hydro-electricity and industries like aerospace. Ontario, the most populous province, is home to Canada's largest city and financial hub, Toronto.</li>
                    <li>The Prairie Provinces (Manitoba, Saskatchewan, and Alberta) are rich in fertile farmland and energy resources. This region, known for its cold winters and hot summers, includes major agricultural producers and a significant oil and gas industry. Alberta is home to national parks like Banff and is a major producer of oil and beef.</li>
                    <li>The West Coast consists of British Columbia, known for its majestic mountains and as Canada's Pacific gateway. The province has a temperate climate and an economy driven by forestry, mining, and fishing. Vancouver's port is the largest in Canada and a major hub for trade with Asia.</li>
                    <li>The Northern Territories (Yukon, Northwest Territories, and Nunavut) make up one-third of Canada's landmass but have a small population. The economy is based on mining (gold, diamonds) and developing oil and gas deposits. The North is also known for its unique climate, with extended periods of daylight and darkness. Nunavut, established in 1999, has a population that is 85% Inuit. The Canadian Rangers play a crucial role in maintaining security and sovereignty in this isolated and challenging region.</li>
                </ul>

            </div>

            <!-- CTA to take the free test -->
            <div class="mt-16 text-center bg-blue-700 p-8 rounded-3xl shadow-xl border border-blue-800">
                <h2 class="text-3xl font-extrabold text-white mb-4">Ready to test your knowledge?</h2>
                <p class="text-lg text-blue-200 mb-8 max-w-2xl mx-auto">
                    Take our free, up-to-date practice test to see how prepared you are for the real exam.
                </p>
                <a href="{{route('free-quiz.show')}}" class="inline-block bg-white hover:bg-gray-200 text-blue-700 px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    Start Free Test Now
                </a>
            </div>
        </div>
    </section>
@endsection
