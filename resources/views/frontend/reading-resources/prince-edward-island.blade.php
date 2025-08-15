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
                    Comprehensive Provincial Summary: Prince Edward Island 🇨🇦
                </h1>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    <h2>1. Geography and Physical Landscape</h2>
                    <p>Prince Edward Island is Canada’s smallest province, both in size and population. It is located in the Gulf of St. Lawrence and is connected to the mainland (New Brunswick) by the Confederation Bridge, which spans nearly 13 kilometres.</p>
                    <p>PEI is known for:</p>
                    <ul>
                        <li>Rolling green hills and red-soil farmland</li>
                        <li>Rugged coastal cliffs and beaches</li>
                        <li>Gentle rivers and bays</li>
                        <li>Picturesque fishing villages</li>
                    </ul>
                    <p>Its red soil, rich in iron oxide, supports productive agriculture and forms a distinct part of the province’s character. The surrounding waters offer some of the best fishing grounds in Canada.</p>
                    <br>

                    <h2>2. Indigenous Roots and Early Peoples</h2>
                    <p>Before European settlement, PEI was inhabited by the Mi’kmaq people, who called the island Epekwitk, meaning “lying in the water.” They lived in harmony with the land and sea, harvesting fish and shellfish, navigating by canoe, and maintaining seasonal camps.</p>
                    <p>The Mi’kmaq continue to live on PEI and contribute actively to the cultural and political life of the province.</p>
                    <br>

                    <h2>3. French and British Settlement</h2>
                    <p>In the 1700s, French settlers established communities and called the island Île Saint-Jean. As part of Acadia, it was home to many Acadian families.</p>
                    <p>After the British gained control of the region in the mid-1700s, Acadians were deported in a tragic episode known as Le Grand Dérangement. Some Acadians returned later, and their descendants remain in parts of the province today.</p>
                    <p>The British later renamed the island Prince Edward Island, in honour of Prince Edward, Duke of Kent, the father of Queen Victoria.</p>
                    <br>

                    <h2>4. Confederation and Nation-Building</h2>
                    <p>Although PEI hosted the Charlottetown Conference in 1864, which helped spark the idea of a united Canada, the province initially refused to join Confederation in 1867.</p>
                    <p>PEI finally joined Canada on July 1, 1873, after the federal government agreed to:</p>
                    <ul>
                        <li>Assume the colony’s railway debts</li>
                        <li>Provide ferry services to the mainland</li>
                        <li>Secure land ownership reforms (many settlers were renting from absentee landlords)</li>
                    </ul>
                    <p>Today, PEI proudly claims the title “Birthplace of Confederation”, with Charlottetown recognized as the city where Canada’s foundation was planned.</p>
                    <br>

                    <h2>5. Population and Communities</h2>
                    <p>PEI has a population of just under 175,000 people, making it Canada’s smallest by number. It has a rural character, with many people living in small towns or countryside settings.</p>
                    <p>Key cities include:</p>
                    <ul>
                        <li>Charlottetown – The capital and largest city, site of historic events and home to government and commerce.</li>
                        <li>Summerside – The second-largest city, with a strong focus on business, culture, and the military (home to CFB Summerside).</li>
                        <li>Smaller communities like Souris, Alberton, and Montague play important local roles.</li>
                    </ul>
                    <br>

                    <h2>6. Language and Culture</h2>
                    <p>English is the primary language spoken, though there are Acadian French communities in places like Évangéline and Abram-Village.</p>
                    <p>PEI’s culture is deeply shaped by:</p>
                    <ul>
                        <li>Scottish and Irish roots</li>
                        <li>Acadian heritage</li>
                        <li>Mi’kmaq traditions</li>
                        <li>Maritime music and storytelling</li>
                    </ul>
                    <p>Traditional music, step-dancing, Celtic festivals, and storytelling nights are widely enjoyed across the island.</p>
                    <br>

                    <h2>7. Economy and Industries</h2>
                    <p>PEI’s economy is built on primary industries and seasonal tourism. The main sectors include:</p>
                    <ul>
                        <li>Agriculture: Especially known for its potato farming — PEI produces about 25% of Canada’s potatoes.</li>
                        <li>Fishing: Lobster, mussels, oysters, and herring are vital to coastal communities.</li>
                        <li>Tourism: Attractions include beaches, golf courses, lighthouses, and historic towns.</li>
                        <li>Food Processing: Companies turn local produce into packaged goods.</li>
                        <li>Biosciences and information technology are growing sectors in Charlottetown.</li>
                    </ul>
                    <p>The province is also known for promoting sustainable farming and ocean conservation.</p>
                    <br>

                    <h2>8. Education and Institutions</h2>
                    <p>PEI’s education system includes English and French public schools, as well as Indigenous cultural programs.</p>
                    <p>Post-secondary institutions:</p>
                    <ul>
                        <li>University of Prince Edward Island (UPEI) – Offers programs in veterinary science, liberal arts, business, and health sciences.</li>
                        <li>Holland College – A polytechnic college focused on trades, culinary arts, policing, and tourism.</li>
                    </ul>
                    <p>The province invests in rural education, youth employment, and skills development programs.</p>
                    <br>

                    <h2>9. Government and Politics</h2>
                    <p>PEI has a parliamentary government, similar to the rest of Canada. It includes:</p>
                    <ul>
                        <li>Premier – The head of government</li>
                        <li>Lieutenant Governor – The King’s representative</li>
                        <li>Legislative Assembly – Sits in Charlottetown</li>
                    </ul>
                    <p>PEI elects four Members of Parliament (MPs) to the federal House of Commons and four provincial Senators.</p>
                    <p>Political life on PEI is often local and personal — given the small population, residents tend to know their elected officials and participate actively in civic life.</p>
                    <br>

                    <h2>10. Contributions to Canada</h2>
                    <p>Despite its small size, PEI has made important national contributions:</p>
                    <ul>
                        <li>Hosted the 1864 Charlottetown Conference – the first step toward forming Canada.</li>
                        <li>Played a role in advancing education, rural health, and fisheries management.</li>
                        <li>Promotes Canada’s bilingual and multicultural identity through French and Mi’kmaq initiatives.</li>
                    </ul>
                    <p>The province is also the setting of Canada’s most famous novel: “Anne of Green Gables” by L.M. Montgomery. The book has become an international symbol of Canada and draws tens of thousands of visitors to PEI each year.</p>
                    <br>

                    <h2>11. Indigenous Communities and Reconciliation</h2>
                    <p>The Mi’kmaq of PEI continue to build governance capacity through:</p>
                    <ul>
                        <li>Lennox Island First Nation</li>
                        <li>Abegweit First Nation</li>
                    </ul>
                    <p>Indigenous-led organizations promote:</p>
                    <ul>
                        <li>Language revitalization</li>
                        <li>Cultural preservation</li>
                        <li>Economic development</li>
                        <li>Land and water stewardship</li>
                    </ul>
                    <p>Collaborative efforts between the provincial government and Mi’kmaq communities focus on reconciliation, truth-telling, and Indigenous rights.</p>
                    <br>

                    <h2>12. Religion and Traditions</h2>
                    <p>Historically, most Islanders were either:</p>
                    <ul>
                        <li>Roman Catholic (especially Acadian and Irish communities)</li>
                        <li>Protestant (especially Scottish and English heritage)</li>
                    </ul>
                    <p>Religious practice remains strong in many rural areas, though secularism is growing.</p>
                    <p>Traditional holidays include:</p>
                    <ul>
                        <li>Canada Day (July 1)</li>
                        <li>Fête nationale des Acadiens (August 15)</li>
                        <li>Natal Day (celebrating the founding of Charlottetown)</li>
                        <li>Islander Day (third Monday in February)</li>
                    </ul>
                    <br>

                    <h2>13. Symbols and Emblems</h2>
                    <ul>
                        <li>Flag: A lion above three oak saplings on a white and red background, symbolizing PEI’s connection to Great Britain and its three counties.</li>
                        <li>Floral emblem: Lady’s Slipper</li>
                        <li>Tree: Red Oak</li>
                        <li>Motto: Parva sub ingenti – “The small under the protection of the great”</li>
                    </ul>
                    <p>These symbols reflect the province’s loyalty to Canada and pride in its size and influence.</p>
                    <br>

                    <h2>✅ PEI Citizenship Test Highlights</h2>
                    <ul>
                        <li>Confederation Date: July 1, 1873</li>
                        <li>Capital City: Charlottetown</li>
                        <li>Largest Industry: Agriculture (especially potatoes)</li>
                        <li>Famous Site: Green Gables (Cavendish)</li>
                        <li>Hosted the Charlottetown Conference: 1864</li>
                        <li>Main Indigenous Group: Mi’kmaq</li>
                        <li>Official Language: English (French spoken in Acadian communities)</li>
                        <li>Bridge Connection: Confederation Bridge to New Brunswick</li>
                        <li>Provincial Flower: Lady’s Slipper</li>
                        <li>Nickname: “Birthplace of Confederation”</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection