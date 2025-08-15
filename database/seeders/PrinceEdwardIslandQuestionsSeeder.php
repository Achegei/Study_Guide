<?php

namespace Database\Seeders;

use App\Models\CourseSection;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log; // Ensure this is imported for logging

class PrinceEdwardIslandQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find or create the 'Prince Edward Island' CourseSection
        $peiSection = CourseSection::firstOrCreate(
            ['title' => 'Prince Edward Island'],
            [
                'type' => 'province',
                'capital' => 'Charlottetown',
                'flag' => '/images/flags/prince-edward-island.png', // Flag image URL for PEI
                'description' => 'Questions specific to Prince Edward Island.',
                'summary_audio_url' => '/audio/prince_edward_island_summary.mp3' // Audio URL for PEI
            ]
        );

        // The raw text containing all Prince Edward Island citizenship questions and answers
        // IMPORTANT: The 'EOT;' delimiter MUST be on a line by itself, with NO leading or trailing whitespace.
        $questionsText = <<<EOT
1. 
Multiple Choice
What year did Prince Edward Island join Confederation?
A. 1867
B. 1871
C. 1873
D. 1898
Answer: C. 1873

2. 
True or False
Charlottetown is the capital of Prince Edward Island.
Answer: True
3. 
Multiple Choice
Which of the following best describes PEI’s role in Confederation?
A. It was the first province to join Confederation
B. It hosted the 1864 Charlottetown Conference
C. It joined Confederation in 1905
D. It was a territory before joining Confederation
Answer: B. It hosted the 1864 Charlottetown Conference
4. 
True or False
PEI is the largest Canadian province by land area.
Answer: False
(Explanation: PEI is the smallest province in Canada by land area.)
5. 
Multiple Choice
What is a notable industry in Prince Edward Island?
A. Oil and Gas
B. Forestry
C. Agriculture and Fisheries
D. Aerospace
Answer: C. Agriculture and Fisheries
6. 
True or False
The Confederation Bridge connects PEI to mainland New Brunswick.
Answer: True
7. 
Multiple Choice
Which body of water surrounds Prince Edward Island?
A. Lake Ontario
B. Bay of Fundy
C. Gulf of St. Lawrence
D. Hudson Bay
Answer: C. Gulf of St. Lawrence
8. 
True or False
Prince Edward Island is known for its red soil and potato farming.
Answer: True
9. 
Multiple Choice
Which famous novel is set in Prince Edward Island?
A. Anne of Green Gables
B. The Stone Angel
C. Life of Pi
D. Fifth Business
Answer: A. Anne of Green Gables
10. 
True or False
Lucy Maud Montgomery, author of Anne of Green Gables, was born in Ontario.
Answer: False
(Explanation: She was born in Prince Edward Island.)
11. 
Multiple Choice
What is the legislative assembly of PEI called?
A. House of Commons
B. Legislative Council
C. Legislative Assembly of Prince Edward Island
D. General Assembly of PEI
Answer: C. Legislative Assembly of Prince Edward Island
12. 
True or False
PEI is Canada’s most populous province.
Answer: False
(Explanation: PEI has the smallest population among the provinces.)
13. 
Multiple Choice
The current Premier of Prince Edward Island (as of 2025) is:
A. Tim Houston
B. Dennis King
C. Blaine Higgs
D. Doug Ford
Answer: B. Dennis King
14. 
True or False
PEI has more senators than Ontario in the Canadian Senate.
Answer: False
(Explanation: PEI has 4 senators, Ontario has 24.)
15. 
Multiple Choice
What is PEI’s main cultural and heritage festival?
A. Celtic Colours
B. Gold Rush Days
C. Island Fringe Festival
D. Old Home Week
Answer: D. Old Home Week
16. 
True or False
The Lieutenant Governor represents the King in Prince Edward Island.
Answer: True
17. 
Multiple Choice
Which industry is a major part of PEI’s economy besides farming?
A. Mining
B. Tourism
C. Shipbuilding
D. Automobile
Answer: B. Tourism
18. 
True or False
The Confederation Centre of the Arts is located in Charlottetown.
Answer: True
19. 
Multiple Choice
What was the historical name of Prince Edward Island before 1799?
A. Acadia
B. Isle Royale
C. St. John’s Island
D. New Edinburgh
Answer: C. St. John’s Island
20. 
True or False
Prince Edward Island is a bilingual province like New Brunswick.
Answer: False
(Explanation: PEI is officially English-speaking; only New Brunswick is officially bilingual.)
21. 
Multiple Choice
Which group of people were the first known inhabitants of Prince Edward Island?
A. Inuit
B. Iroquois
C. Mi’kmaq
D. Métis
Answer: C. Mi’kmaq
22. 
True or False
Mi’kmaq communities in PEI have no modern presence today.
Answer: False
(Explanation: Mi’kmaq First Nations are still present and active in PEI today.)
23. 
Multiple Choice
Prince Edward Island’s provincial flag features:
A. A canoe and maple leaf
B. Three oak saplings under a large oak tree
C. A ship and blue waves
D. Two red foxes and a lighthouse
Answer: B. Three oak saplings under a large oak tree
24. 
True or False
Prince Edward Island has no provincial flag.
Answer: False
(Explanation: PEI has its own provincial flag adopted in 1964.)
25. 
Multiple Choice
What major infrastructure connects Prince Edward Island to the mainland?
A. Confederation Tunnel
B. Mariner’s Ferry
C. Confederation Bridge
D. Atlantic Span
Answer: C. Confederation Bridge
26. 
True or False
The Confederation Bridge is the longest bridge in the world.
Answer: False
(Explanation: It is the longest bridge over ice-covered water, not the longest overall.)
27. 
Multiple Choice
How long is the Confederation Bridge in metres
A. 4000m
B. 8000m
C. 12900m
D. 20000m
Answer: C. 12900m
28. 
True or False
Fishing is an important part of PEI’s economy.
Answer: True
29. 
Multiple Choice
Which of the following is a famous tourist site in PEI?
A. Banff National Park
B. Green Gables Heritage Place
C. CN Tower
D. Hopewell Rocks
Answer: B. Green Gables Heritage Place
30. 
True or False
Tourism plays no role in PEI’s economy.
Answer: False
(Explanation: Tourism is a significant contributor to the economy.)
31. 
Multiple Choice
Which body governs local matters in Prince Edward Island?
A. House of Commons
B. Municipal Government
C. Provincial Court
D. Senate
Answer: B. Municipal Government
32. 
True or False
PEI’s legislature passes laws on education, health, and infrastructure within the province.
Answer: True
33. 
Multiple Choice
The Lieutenant Governor of PEI is appointed by:
A. The Premier
B. The House of Commons
C. The Prime Minister of Canada
D. The Senate
Answer: C. The Prime Minister of Canada
34. 
True or False
The Premier is the monarch’s representative in PEI.
Answer: False
(Explanation: The Lieutenant Governor is the monarch’s representative, not the Premier.)
35. 
Multiple Choice
Which political party is currently governing PEI as of 2025?
A. PEI Liberal Party
B. PEI New Democratic Party
C. Progressive Conservative Party
D. Green Party of PEI
Answer: C. Progressive Conservative Party
36. 
True or False
The Green Party of PEI has never held any seats in the provincial legislature.
Answer: False
(Explanation: The Green Party has held official opposition status in recent years.)
37. 
Multiple Choice
What is PEI’s provincial flower?
A. Purple Violet
B. Lady’s Slipper
C. Mayflower
D. Red Lily
Answer: B. Lady’s Slipper

38. 
True or False
PEI’s provincial bird is the Blue Jay.
Answer: True
(Explanation: The Blue Jay is indeed the provincial bird of Prince Edward Island.)

39.
Multiple Choice
Which of the following describes PEI’s climate?
A. Harsh and arid
B. Arctic tundra
C. Mild with snowy winters and warm summers
D. Tropical year-round
Answer: C. Mild with snowy winters and warm summers

40.
True or False
PEI’s winters are extremely dry and desert-like.
Answer: False
(Explanation: PEI’s winters are snowy, not dry.)

41. 
Multiple Choice
What is the role of Dennis King in PEI?
A. Mayor of Charlottetown
B. Premier of PEI
C. Lieutenant Governor
D. Member of Parliament
Answer: B. Premier of PEI
42. 
True or False
The federal MP for PEI becomes the Premier of PEI.
Answer: False
(Explanation: The Premier is elected through provincial politics, not federal.)
43. 
Multiple Choice
What was the significance of the Charlottetown Conference in 1864?
A. Birthplace of Confederation
B. Site of the War of 1812
C. First city in Canada
D. Where the Queen visited Canada
Answer: A. Birthplace of Confederation
44. 
True or False
PEI hosted the Charlottetown Conference but initially refused to join Confederation.
Answer: True
45. 
Multiple Choice
Which ferry also connects PEI to Nova Scotia?
A. Marine Atlantic
B. Northumberland Ferries
C. Victoria Ferry
D. Fundy Ferry
Answer: B. Northumberland Ferries
46. 
True or False
PEI is landlocked and has no ferry access.
Answer: False
47. 
Multiple Choice
What is the provincial tree of PEI?
A. Oak
B. Red Maple
C. Eastern Hemlock
D. Red Oak
Answer: D. Red Oak
48. 
True or False
PEI has no official provincial symbols.
Answer: False
49. 
Multiple Choice
PEI sends how many senators to the Canadian Senate?
A. 2
B. 4
C. 6
D. 10
Answer: B. 4
50. 
True or False
All provinces have the same number of senators in Canada.
Answer: False
(Explanation: Senate representation varies by province.)
51. 
Multiple Choice
What is the capital city of Prince Edward Island?
A. Summerside
B. Charlottetown
C. Montague
D. Kensington
Answer: B. Charlottetown

52. 
True or False
Charlottetown is known as the “Birthplace of Confederation.”
Answer: True
53. 
Multiple Choice
Which crop is most famously grown in PEI?
A. Wheat
B. Potatoes
C. Corn
D. Rice
Answer: B. Potatoes
54. 
True or False
PEI is Canada’s leading producer of potatoes.
Answer: True
55. 
Multiple Choice
Which national park is located in PEI?
A. Banff National Park
B. Prince Edward Island National Park
C. Jasper National Park
D. Cape Breton National Park
Answer: B. Prince Edward Island National Park
56. 
True or False
PEI National Park is on the island’s south shore.
Answer: False
(Explanation: It is mainly on the island’s north shore.)
57. 
Multiple Choice
Which industry is a major part of PEI’s economy?
A. Aerospace
B. Fishing and aquaculture
C. Automotive manufacturing
D. Oil refining
Answer: B. Fishing and aquaculture
58. 
True or False
Lobster fishing is a major industry in PEI.
Answer: True
59. 
Multiple Choice
What is the population of PEI (approx. 2025)?
A. 80,000
B. 170,000
C. 500,000
D. 1 million
Answer: B. 170,000
60. 
True or False
PEI is Canada’s most populated province.
Answer: False
(Explanation: PEI is the smallest province by population.)
61. 
Multiple Choice
Which sport is particularly popular in PEI?
A. Baseball
B. Curling
C. Rugby
D. Polo
Answer: B. Curling
62. 
True or False
Ice hockey is also widely played in PEI.
Answer: True
63. 
Multiple Choice
Who represents King Charles III in PEI?
A. The Prime Minister
B. The Lieutenant Governor
C. The Premier
D. The Speaker of the House
Answer: B. The Lieutenant Governor
64. 
True or False
The Premier acts as the King’s representative in PEI.
Answer: False
65. 
Multiple Choice
Which event led PEI to join Confederation in 1873?
A. Economic struggles due to railway debt
B. Discovery of gold
C. Political conflict with Nova Scotia
D. Completion of Confederation Bridge
Answer: A. Economic struggles due to railway debt
66. 
True or False
PEI joined Confederation in 1867.
Answer: False
(Explanation: PEI joined in 1873, not 1867.)
67. 
Multiple Choice
Which well-known author is associated with PEI?
A. Lucy Maud Montgomery
B. Margaret Atwood
C. Alice Munro
D. Farley Mowat
Answer: A. Lucy Maud Montgomery
68. 
True or False
Lucy Maud Montgomery wrote “Anne of Green Gables.”
Answer: True
69. 
Multiple Choice
What is the main legislative body in PEI?
A. House of Commons
B. PEI Legislative Assembly
C. Senate of PEI
D. Confederation Council
Answer: B. PEI Legislative Assembly
70. 
True or False
PEI’s legislature is bicameral (two houses).
Answer: False
(Explanation: It is unicameral with one legislative chamber.)
71. 
Multiple Choice
What is PEI’s official bird?
A. Blue Jay
B. Great Horned Owl
C. Red-winged Blackbird
D. Canada Goose
Answer: A. Blue Jay
72. 
True or False
The loon is PEI’s official bird.
Answer: False
73. 
Multiple Choice
Which color is prominent in PEI’s soil?
A. Grey
B. Black
C. Red
D. White
Answer: C. Red
74. 
True or False
PEI’s red soil is rich in iron oxide.
Answer: True
75. 
Multiple Choice
Which major festival is celebrated in PEI?
A. Cavendish Beach Music Festival
B. Calgary Stampede
C. Winterlude
D. Caribana
Answer: A. Cavendish Beach Music Festival
76. 
True or False
The Cavendish Beach Music Festival is an annual event.
Answer: True
77. 
Multiple Choice
What is the primary language spoken in PEI?
A. English
B. French
C. Mi’kmaq
D. Gaelic
Answer: A. English
78. 
True or False
French is the only official language of PEI.
Answer: False
(Explanation: English is the primary language, but French is also spoken by a minority.)
79. 
Multiple Choice
What is the largest city in PEI?
A. Summerside
B. Montague
C. Charlottetown
D. Souris
Answer: C. Charlottetown
80. 
True or False
Summerside is larger than Charlottetown.
Answer: False
81. 
Multiple Choice
Which PEI town is known for its lighthouse and coastal scenery?
A. Kensington
B. Souris
C. Stratford
D. Borden-Carleton
Answer: B. Souris
82. 
True or False
Souris is located inland, far from the coast.
Answer: False
83. 
Multiple Choice
Which iconic food is PEI known for?
A. Poutine
B. Lobster and mussels
C. Sushi
D. Roti
Answer: B. Lobster and mussels
84.
True or False
PEI mussels are exported worldwide.
Answer: True
85. 
Multiple Choice
Which body of water surrounds PEI?
A. Atlantic Ocean
B. Gulf of St. Lawrence
C. Pacific Ocean
D. Bay of Fundy
Answer: B. Gulf of St. Lawrence
86. 
True or False
The Bay of Fundy is on PEI’s north shore.
Answer: False
87. 
Multiple Choice
Which historic site in PEI is linked to the Fathers of Confederation?
A. Province House
B. Fort Anne
C. Government House
D. Signal Hill
Answer: A. Province House
88. 
True or False
Province House in Charlottetown is where the 1864 conference occurred.
Answer: True
89. 
Multiple Choice
What is PEI’s official provincial motto?
A. Glory to the East
B. Parva sub ingenti (The small under the protection of the great)
C. Unity in Diversity
D. Ocean’s Bounty
Answer: B. Parva sub ingenti
90. 
True or False
“Parva sub ingenti” means “Great under the small.”
Answer: False
(Explanation: It means “The small under the protection of the great.”)
91. 
Multiple Choice
Which ferry route connects PEI and Nova Scotia?
A. Souris Ferry
B. Wood Islands Ferry
C. Kensington Ferry
D. Point Prim Ferry
Answer: B. Wood Islands Ferry
92. 
True or False
The Wood Islands Ferry operates only in winter.
Answer: False
(Explanation: It mostly operates in summer months.)
93. 
Multiple Choice
What type of government does PEI have?
A. Federal
B. Unicameral parliamentary democracy
C. Bicameral monarchy
D. Direct republic
Answer: B. Unicameral parliamentary democracy
94. 
True or False
The PEI legislature has both a Senate and a House of Commons.
Answer: False
95. 
Multiple Choice
Which historic lighthouse is a popular PEI attraction?
A. Point Prim Lighthouse
B. Peggy’s Cove Lighthouse
C. Cape Spear Lighthouse
D. Covehead Lighthouse
Answer: A. Point Prim Lighthouse
96. 
True or False
Point Prim Lighthouse is the oldest lighthouse in PEI.
Answer: True
97. 
Multiple Choice
What is PEI’s provincial anthem?
A. Song of the Island
B. The Island Hymn
C. O Canada
D. Atlantic Pride
Answer: B. The Island Hymn
98. 
True or False
“The Island Hymn” was written by Lucy Maud Montgomery.
Answer: True
99. 
Multiple Choice
How many Members of the Legislative Assembly (MLAs) does PEI have?
A. 20
B. 27
C. 35
D. 40
Answer: B. 27
100. 
True or False
PEI has fewer MLAs compared to other provinces due to its small size.
Answer: True
101. 
Multiple Choice
Who is the current Premier of Prince Edward Island (as of 2025)?
A. Dennis King
B. Tim Houston
C. Blaine Higgs
D. Andrew Furey
Answer: A. Dennis King
102. 
True or False
The Premier of PEI leads the federal government.
Answer: False
(Explanation: The Premier leads the provincial government, not the federal one.)
103. 
Multiple Choice
What is the role of the Lieutenant Governor of PEI?
A. Head of the legislature
B. Head of the military
C. The King’s representative in the province
D. Mayor of Charlottetown
Answer: C. The King’s representative in the province
104. 
True or False
The Lieutenant Governor is elected by the people of PEI.
Answer: False
(Explanation: The Lieutenant Governor is appointed by the Governor General on the Prime Minister’s advice.)
105. 
Multiple Choice
What are the official colours of the PEI flag?
A. Red, Blue, White
B. Red, Green, White
C. Green, Yellow, Blue
D. Red, Yellow, Black
Answer: B. Red, Green, White
106. 
True or False
The PEI flag features a lion and oak trees.
Answer: True
107. 
Multiple Choice
Which ethnic group was among the first European settlers in PEI?
A. Scottish
B. French (Acadian)
C. Ukrainian
D. German
Answer: B. French (Acadian)
108. 
True or False
Acadian culture is no longer present in PEI.
Answer: False
(Explanation: Acadian communities and culture remain vibrant in parts of PEI.)
109. 
Multiple Choice
What is the name of the legislative building in Charlottetown?
A. Confederation Hall
B. Province House
C. Green Gables Parliament
D. Island Hall
Answer: B. Province House
110. 
True or False
Province House hosted the 1864 Charlottetown Conference.
Answer: True
111. 
Multiple Choice
What is the legal voting age in PEI provincial elections?
A. 21
B. 18
C. 16
D. 25
Answer: B. 18
112. 
True or False
Citizens under 18 can vote in municipal elections.
Answer: False
113. 
Multiple Choice
What is the name of PEI’s legislature?
A. Parliament of PEI
B. Legislative Council
C. Legislative Assembly of Prince Edward Island
D. Island House of Commons
Answer: C. Legislative Assembly of Prince Edward Island
114. 
True or False
PEI has both a House and a Senate.
Answer: False
115. 
Multiple Choice
Which PEI industry is most tied to its geography?
A. Aerospace
B. Oil and gas
C. Agriculture and fisheries
D. IT services
Answer: C. Agriculture and Fisheries
116. 
True or False
Forestry is PEI’s main economic sector.
Answer: False
117. 
Multiple Choice
How many Members of Parliament (MPs) does PEI send to the federal House of Commons?
A. 1
B. 2
C. 4
D. 10
Answer: C. 4
118. 
True or False
All Canadian provinces have the same number of MPs in the House of Commons.
Answer: False
119. 
Multiple Choice
Which of the following is a protected area in PEI?
A. Fundy National Park
B. Greenwich Dunes
C. Riding Mountain
D. Gros Morne
Answer: B. Greenwich Dunes
120. 
True or False
Greenwich Dunes is part of PEI National Park.
Answer: True
121. 
Multiple Choice
Which body governs education in PEI?
A. The PEI Ministry of Education
B. PEI Department of Education and Lifelong Learning
C. PEI School Council
D. Island Academic Board
Answer: B. PEI Department of Education and Lifelong Learning
122. 
True or False
Education is a provincial responsibility in Canada.
Answer: True
123. 
Multiple Choice
Which of the following is a well-known heritage site in PEI?
A. Rideau Canal
B. Province House
C. CN Tower
D. Canadian Museum of History
Answer: B. Province House
124. 
True or False
Province House is a UNESCO World Heritage Site.
Answer: False
(Explanation: It is a National Historic Site, not a UNESCO site.)
125. 
Multiple Choice
What level of court handles serious criminal cases in PEI?
A. Small Claims Court
B. Traffic Court
C. Supreme Court of PEI
D. Family Court
Answer: C. Supreme Court of PEI
126. 
True or False
The Supreme Court of PEI is the highest court in Canada.
Answer: False
(Explanation: The Supreme Court of Canada is the highest.)
127. 
Multiple Choice
What is a major energy source in PEI?
A. Wind power
B. Coal
B. Coal
C. Oil
D. Nuclear
Answer: A. Wind power
128. 
True or False
PEI has large coal reserves.
Answer: False
129.
Multiple Choice
Which natural resource does PEI lack?
A. Freshwater
B. Minerals
C. Fish
D. Farmland
Answer: B. Minerals
130. 
True or False
PEI is rich in metal mining.
Answer: False
131. 
Multiple Choice
Which provincial holiday is celebrated in PEI in August?
A. Islander Day
B. Gold Cup Parade Day
C. Discovery Day
D. Acadian Day
Answer: B. Gold Cup Parade Day
132. 
True or False
Gold Cup Parade Day is part of Old Home Week.
Answer: True
133. 
Multiple Choice
Which age group is eligible for jury duty in PEI?
A. 21 and older
B. 16 and older
C. 18 and older
D. 25 and older
Answer: C. 18 and older
134. 
True or False
Canadian citizens may be called for jury duty.
Answer: True
135. 
Multiple Choice
Which of the following is a right of Canadian citizens?
A. The right to own land
B. The right to drive
C. The right to vote
D. The right to a passport
Answer: C. The right to vote
136. 
True or False
Only permanent residents can vote in elections.
Answer: False
137. 
Multiple Choice
What is a civic responsibility of Canadians?
A. Practising religion
B. Owning a business
C. Obeying the law
D. Travelling abroad
Answer: C. Obeying the law
138. 
True or False
Serving on a jury is a civic duty.
Answer: True
139. 
Multiple Choice
How many senators represent PEI in the federal Senate?
A. 2
B. 4
C. 6
D. 10
Answer: B. 4
140. 
True or False
PEI has the same number of senators as Ontario.
Answer: False
141. 
Multiple Choice
Which federal political party currently governs Canada (as of 2025)?
A. Conservative Party
B. Liberal Party
C. New Democratic Party
D. Bloc Québécois
Answer: B. Liberal Party
142. 
True or False
Canada has a one-party political system.
Answer: False
143. 
Multiple Choice
Which of the following is an example of volunteering?
A. Donating blood
B. Helping in an election campaign
C. Assisting at a food bank
D. All of the above
Answer: D. All of the above
144. 
True or False
Volunteering is required by law in Canada.
Answer: False
145. 
Multiple Choice
Which province is connected to PEI by the Confederation Bridge?
A. New Brunswick
B. Nova Scotia
C. Newfoundland
D. Quebec
Answer: A. New Brunswick
146. 
True or False
The Confederation Bridge is over 10 km long.
Answer: True
147. 
Multiple Choice
Which PEI island is known for birdwatching and nature?
A. Panmure Island
B. Boughton Island
C. Lennox Island
D. Prince Island
Answer: B. Boughton Island
148. 
True or False
Lennox Island is home to a Mi’kmaq First Nation community.
Answer: True
149. 
Multiple Choice
What type of settlement is Lennox Island?
A. Tourist town
B. Agricultural village
C. Mi’kmaq First Nation reserve
D. Historic European colony
Answer: C. Mi’kmaq First Nation reserve
150. 
True or False
Lennox Island is uninhabited.
Answer: False
151. 
Multiple Choice
Which famous fictional character is associated with PEI?
A. Harry Potter
B. Anne of Green Gables
C. Nancy Drew
D. Emily of New Moon
Answer: B. Anne of Green Gables
152. 
True or False
Anne of Green Gables was written by Lucy Maud Montgomery.
Answer: True
153. 
Multiple Choice
What is the minimum residency requirement to apply for Canadian citizenship?
A. 5 years
B. 1 year
C. 3 years out of the last 5
D. 10 years
Answer: C. 3 years out of the last 5
154. 
True or False
You must be born in Canada to become a Canadian citizen.
Answer: False
155. 
Multiple Choice
Which of the following is a symbol of Canada found on the PEI coat of arms?
A. Moose
B. Lion
C. Beaver
D. Eagle
Answer: B. Lion
156. 
True or False
The lion on the PEI coat of arms represents England.
Answer: True
157. 
Multiple Choice
Which federal riding includes Charlottetown?
A. Egmont
B. Malpeque
C. Cardigan
D. Charlottetown
Answer: D. Charlottetown
158. 
True or False
Federal ridings in PEI elect Members of the Legislative Assembly.
Answer: False
(Explanation: Federal ridings elect MPs to the House of Commons; MLAs are elected in provincial districts.)
159. 
Multiple Choice
What is the term for a person elected to the PEI Legislative Assembly?
A. Senator
B. Councillor
C. MLA
D. MP
Answer: C. MLA
160. 
True or False
MLA stands for Member of the Legislative Assembly.
Answer: True

161. 
Multiple Choice
In which city is the University of Prince Edward Island (UPEI) located?
A. Summerside
B. Stratford
C. Charlottetown
D. Montague
Answer: C. Charlottetown
162. 
True or False
UPEI is a federal government institution.
Answer: False
163. 
Multiple Choice
What is the main source of revenue for PEI’s tourism sector?
A. Ski resorts
B. Museums and concerts
C. Beaches, culture, and heritage sites
D. Casinos
Answer: C. Beaches, culture, and heritage sites
164. 
True or False
PEI is Canada’s largest province by land area.
Answer: False
(Explanation: PEI is the smallest province in Canada by land area.)
165. 
Multiple Choice
Which level of government is responsible for issuing driver’s licences in PEI?
A. Municipal
B. Federal
C. Provincial
D. County
Answer: C. Provincial
166. 
True or False
Canadian passports are issued by the provincial government.
Answer: False
167. 
Multiple Choice
How many counties does Prince Edward Island have?
A. 5
B. 4
C. 3
D. 2
Answer: C. 3
(Explanation: PEI has Kings, Queens, and Prince counties.)
168. 
True or False
Prince County is located in eastern PEI.
Answer: False
(Explanation: Prince County is located in the western part of the island.)
169. 
Multiple Choice
Which of the following is a First Nation located in PEI?
A. Millbrook
B. Lennox Island
C. Membertou
D. Eel Ground
Answer: B. Lennox Island
170. 
True or False
Lennox Island First Nation is part of the Mi’kmaq Nation.
Answer: True
171. 
Multiple Choice
Which document outlines the rights and freedoms of Canadian citizens?
A. The PEI Act
B. The Bill of Rights
C. The Canadian Charter of Rights and Freedoms
D. The Citizenship Oath
Answer: C. The Canadian Charter of Rights and Freedoms
172. 
True or False
Freedom of speech is protected by the Charter of Rights and Freedoms.
Answer: True
173. 
Multiple Choice
Which national body ensures laws follow the Canadian Constitution?
A. The RCMP
B. The Prime Minister’s Office
C. The Supreme Court of Canada
D. The Senate
Answer: C. The Supreme Court of Canada
174. 
True or False
The Supreme Court is the highest court in each province.
Answer: False
(Explanation: Each province has its own superior court; the Supreme Court of Canada is national.)
175. 
Multiple Choice
Which form of government does Canada follow?
A. Absolute monarchy
B. Dictatorship
C. Parliamentary democracy and constitutional monarchy
D. Federal dictatorship
Answer: C. Parliamentary democracy and constitutional monarchy
176. 
True or False
Canada’s head of state is elected by citizens.
Answer: False
(Explanation: The King is Canada’s head of state.)
177. 
Multiple Choice
Who represents the King at the national level in Canada?
A. The Prime Minister
B. The Lieutenant Governor
C. The Speaker of the House
D. The Governor General
Answer: D. The Governor General
178. 
True or False
The Governor General is a ceremonial role.
Answer: True
179. 
Multiple Choice
Which of the following values are highlighted in Canadian society?
A. Respect for law
B. Individual freedom
C. Equality
D. All of the above
Answer: D. All of the above
180. 
True or False
Religious freedom is not protected in Canada.
Answer: False
181. 
Multiple Choice
What does the red and white of the Canadian flag symbolize?
A. Blood and snow
B. French and English unity
C. Courage and peace
D. Heritage and agriculture
Answer: C. Courage and peace
182. 
True or False
The maple leaf has been a Canadian symbol since the 1960s.
Answer: True
183. 
Multiple Choice
Which level of government handles garbage collection in PEI cities?
A. Federal
B. Municipal
C. Provincial
D. Regional
Answer: B. Municipal
184. 
True or False
The PEI government controls military defence.
Answer: False
185. 
Multiple Choice
How often are provincial elections held in PEI?
A. Every 3 years
B. Every 5 years
C. Every 4 years
D. Every 6 years
Answer: C. Every 4 years
186. 
True or False
Only Canadian-born citizens can run for office.
Answer: False
187. 
Multiple Choice
Who is eligible for Canadian citizenship?
A. Tourists
B. Temporary workers
C. Permanent residents who meet the criteria
D. All of the above
Answer: C. Permanent residents who meet the criteria
188. 
True or False
Citizenship applicants must pass a test on Canada’s history and values.
Answer: True
189. 
Multiple Choice
Which of the following is a fundamental freedom in Canada?
A. Freedom of the press
B. Freedom to vote twice
C. Freedom to break the law
D. Freedom to ignore taxes
Answer: A. Freedom of the press
190. 
True or False
Freedom of expression is guaranteed in Canada.
Answer: True
191. 
Multiple Choice
Which major event in 1864 contributed to Confederation?
A. Battle of Vimy Ridge
B. War of 1812
C. Charlottetown Conference
D. Quebec Referendum
Answer: C. Charlottetown Conference
192. 
True or False
PEI joined Confederation in 1864.
Answer: False
(Explanation: PEI joined Confederation in 1873.)
193. 
Multiple Choice
What type of landform is Prince Edward Island?
A. Peninsula
B. Island
C. Archipelago
D. Isthmus
Answer: B. Island
194. 
True or False
PEI is a landlocked province.
Answer: False
195. 
Multiple Choice
Which industry is PEI most famous for?
A. Diamond mining
B. Oil refining
C. Potato farming
D. Automobile manufacturing
Answer: C. Potato farming
196. 
True or False
PEI is known for its extensive desert landscape.
Answer: False
197. 
Multiple Choice
Which Canadian province is located closest to PEI?
A. Ontario
B. New Brunswick
C. Quebec
D. Manitoba
Answer: B. New Brunswick
198. 
True or False
Newfoundland is west of Prince Edward Island.
Answer: False
199. 
Multiple Choice
Which provincial service ensures the safety of roads in PEI during winter?
A. Island Safety Commission
B. Department of Transportation and Infrastructure
C. RCMP
D. Snow Board Council
Answer: B. Department of Transportation and Infrastructure
200. 
True or False
The Department of Health is responsible for plowing roads in PEI.
Answer: False
201. 
True or False
The Island Regulatory and Appeals Commission (IRAC) is responsible for land use and utility regulation in PEI.
Answer: True
202. 
Multiple Choice
Which European nation was the first to colonize PEI?
A. Britain
B. Portugal
C. France
D. Spain
Answer: C. France
203. 
True or False
The French called Prince Edward Island “Île Saint-Jean.”
Answer: True
204. 
Multiple Choice
Which famous Canadian novel is associated with PEI?
A. Anne of Avonlea
B. Anne of Green Gables
C. The Stone Angel
D. The Handmaid’s Tale
Answer: B. Anne of Green Gables
205. 
True or False
Lucy Maud Montgomery, author of Anne of Green Gables, was born in Alberta.
Answer: False
(Explanation: She was born in PEI.)
206. 
Multiple Choice
Which town is known for its connection to Anne of Green Gables?
A. Summerside
B. Charlottetown
C. Cavendish
D. Georgetown
Answer: C. Cavendish
207. 
True or False
The tourism industry in PEI is largely based on its natural beauty and literary heritage.
Answer: True
208. 
Multiple Choice
Which of the following is NOT a major industry in PEI?
A. Aerospace
B. Agriculture
C. Oil production
D. Fisheries
Answer: C. Oil production
209. 
True or False
PEI is home to a significant aerospace industry.
Answer: True
210. 
Multiple Choice
Which of these bodies of water surrounds Prince Edward Island?
A. Atlantic Ocean
B. Hudson Bay
C. Beaufort Sea
D. Lake Ontario
Answer: A. Atlantic Ocean
211. 
True or False
PEI is located in the Pacific Ocean.
Answer: False
212. 
Multiple Choice
What is the primary reason for the reddish soil in PEI?
A. High volcanic activity
B. High iron content
C. Saltwater erosion
D. Fossil remains
Answer: B. High iron content
213. 
True or False
PEI has more cattle than people.
Answer: False
214. 
Multiple Choice
Which religious denomination is historically the largest in PEI?
A. Anglican
B. Baptist
C. Roman Catholic
D. United Church of Canada
Answer: C. Roman Catholic
215. 
True or False
Christianity is the predominant religion in PEI.
Answer: True

216. 
Multiple Choice
What is the name of PEI’s Legislative Assembly building?
A. Parliament House
B. Province House
C. Legislative Palace
D. Island Assembly Hall
Answer: B. Province House
217. 
True or False
Province House is located in Summerside.
Answer: False
(Explanation: It’s located in Charlottetown.)
218. 
Multiple Choice
What is PEI’s population size approximately (2025)?
A. 50,000
B. 100,000
C. 170,000
D. 300,000
Answer: C. 170,000
219. 
True or False
PEI is Canada’s most densely populated province.
Answer: True
220. 
Multiple Choice
Which of the following best describes PEI’s climate?
A. Dry and desert-like
B. Arctic tundra
C. Humid continental
D. Tropical rainforest
Answer: C. Humid continental
221. 
True or False
Winters in PEI are very mild with little snow.
Answer: False
222. 
Multiple Choice
What is the minimum voting age in PEI provincial elections?
A. 18
B. 21
C. 16
D. 19
Answer: A. 18
223. 
True or False
Citizens can run for office in PEI at age 16.
Answer: False
224. 
Multiple Choice
What is the major highway running across PEI?
A. Trans-Canada Highway
B. Confederation Trail
C. Victoria Line
D. Maritime Route 1
Answer: A. Trans-Canada Highway
225. 
True or False
The Confederation Trail is a former railway line converted into a trail system.
Answer: True
226. 
Multiple Choice
What electoral system is used in PEI provincial elections?
A. Mixed-member proportional
B. First-past-the-post
C. Ranked ballot
D. Runoff voting
Answer: B. First-past-the-post
227. 
True or False
Prince Edward Island has no representation in the federal Senate.
Answer: False
228. 
Multiple Choice
What is the main agricultural crop grown in PEI?
A. Corn
B. Barley
C. Potatoes
D. Peas
Answer: C. Potatoes
229. 
True or False
PEI exports most of its potatoes to the U.S. and other provinces.
Answer: True
230. 
Multiple Choice
Who appoints the Lieutenant Governor of PEI?
A. Prime Minister of Canada
B. Premier of PEI
C. The Monarch directly
D. Governor General of Canada
Answer: D. Governor General of Canada

231. 
True or False
The Lieutenant Governor acts on behalf of the federal government.
Answer: False
(Explanation: They represent the Monarch in the province.)
232. 
Multiple Choice
Which festival is held annually to celebrate PEI’s arts and culture?
A. Island Fusion Festival
B. PEI Jazz Festival
C. Charlottetown Festival
D. Red Sand Celebration
Answer: C. Charlottetown Festival
233. 
True or False
The Charlottetown Festival showcases the Anne of Green Gables musical.
Answer: True
234. 
Multiple Choice
Which government is responsible for issuing driver’s licenses in PEI?
A. Federal Government
B. PEI Provincial Government
C. Charlottetown City Hall
D. Canadian Security Agency
Answer: B. PEI Provincial Government
235. 
True or False
Citizenship tests are administered by provincial governments.
Answer: False
(Explanation: Citizenship is a federal responsibility.)
236. 
Multiple Choice
How many MLAs are elected to the PEI Legislative Assembly?
A. 15
B. 22
C. 27
D. 30
Answer: C. 27
237. 
True or False
The term “MLA” in PEI stands for “Member of Legislative Administration.”
Answer: False
(Explanation: It stands for “Member of the Legislative Assembly.”)
238. 
Multiple Choice
Which province is west of PEI?
A. Nova Scotia
B. Quebec
C. New Brunswick
D. Newfoundland and Labrador
Answer: C. New Brunswick
239. 
True or False
PEI borders the province of Quebec.
Answer: False
240. 
Multiple Choice
What is PEI’s provincial motto?
A. From Sea to Sea
B. Parva sub ingenti (The small under the protection of the great)
C. Peace, Order, and Good Government
D. Strong and Free
Answer: B. Parva sub ingenti
241. 
True or False
Prince Edward Island was the last province to join Confederation.
Answer: False
(Explanation: Newfoundland and Labrador joined last, in 1949. PEI joined in 1873.)
242. 
Multiple Choice
In what year did PEI join the Canadian Confederation?
A. 1867
B. 1871
C. 1873
D. 1880
Answer: C. 1873
243. 
True or False
The Mi’kmaq are the Indigenous people of Prince Edward Island.
Answer: True
244. 
Multiple Choice
Which of the following is a Mi’kmaq community in PEI?
A. Lennox Island
B. Eskasoni
C. Shubenacadie
D. Tobique
Answer: A. Lennox Island
245. 
True or False
There are no Indigenous reserves in Prince Edward Island.
Answer: False
246. 
Multiple Choice
Which treaty affects the Mi’kmaq rights in PEI?
A. Robinson-Huron Treaty
B. Numbered Treaties
C. Peace and Friendship Treaties
D. Nisga’a Treaty
Answer: C. Peace and Friendship Treaties
247. 
True or False
The PEI government funds French-language services for its Acadian population.
Answer: True
248. 
Multiple Choice
Which region of PEI has a strong Acadian presence?
A. Kings County
B. Queens County
C. Evangeline Region
D. Malpeque Bay
Answer: C. Evangeline Region
249. 
True or False
PEI is officially a bilingual province.
Answer: False
(Explanation: Only New Brunswick is officially bilingual.)
250. 
Multiple Choice
Which body represents Acadian interests in PEI?
A. Conseil scolaire acadien provincial
B. Société Saint-Jean-Baptiste
C. Société Saint-Thomas-d’Aquin
D. Alliance française
Answer: C. Société Saint-Thomas-d’Aquin
251. 
True or False
PEI’s education system includes French-first-language schools.
Answer: True
252. 
Multiple Choice
What is the capital of Kings County in PEI?
A. Georgetown
B. Summerside
C. Charlottetown
D. Souris
Answer: A. Georgetown
253. 
True or False
Summerside is located in Kings County.
Answer: False
(Explanation: Summerside is in Prince County.)

254. 
Multiple Choice
Which of the following is a traditional PEI dish?
A. Jiggs dinner
B. Lobster rolls
C. Nanaimo bars
D. Saskatoon pie
Answer: B. Lobster rolls
255. 
True or False
PEI is Canada’s leading producer of lobster.
Answer: False
(Explanation: Nova Scotia typically leads, though PEI is a major contributor.)
256. 
Multiple Choice
How many Senators represent Prince Edward Island in the Senate of Canada?
A. 2
B. 4
C. 6
D. 8
Answer: B. 4
257. 
True or False
Each province has the same number of Senators.
Answer: False
258. 
Multiple Choice
Which bridge connects PEI to the mainland?
A. PEI Bridge
B. Atlantic Connector
C. Confederation Bridge
D. Freedom Bridge
Answer: C. Confederation Bridge
259. 
True or False
The Confederation Bridge is toll-free for all vehicles.
Answer: False
260. 
Multiple Choice
The Confederation Bridge connects PEI to which province?
A. Quebec
B. Nova Scotia
C. New Brunswick
D. Newfoundland and Labrador
Answer: C. New Brunswick
261. 
True or False
The Confederation Bridge is the longest bridge over ice-covered waters in the world.
Answer: True
262. 
Multiple Choice
PEI is home to how many provincial electoral districts as of 2025?
A. 15
B. 22
C. 27
D. 30
Answer: C. 27
263. 
True or False
The number of MLAs in PEI matches the number of federal MPs.
Answer: False
264. 
Multiple Choice
Who is the head of state in PEI?
A. Premier
B. Lieutenant Governor
C. Governor General
D. The King of Canada
Answer: D. The King of Canada
265. 
True or False
The Premier is the ceremonial head of PEI.
Answer: False
(Explanation: The Lieutenant Governor holds the ceremonial role.)
266. 
Multiple Choice
provincial elections is held in PEI after how long?
A. Every 3 years
B. Every 4 years
C. Every 5 years
D. At the discretion of the Premier
Answer: B. Every 4 years
267. 
True or False
Voting in Canadian elections is a right and a civic duty.
Answer: True
268. 
Multiple Choice
What is the name of the provincial body that oversees elections in PEI?
A. Elections Canada
B. Elections PEI
C. Island Voting Commission
D. Civic Affairs Office
Answer: B. Elections PEI
269. 
True or False
PEI has a unicameral legislature.
Answer: True
270. 
Multiple Choice
Who was the Premier of PEI as of 2025?
A. Peter Bevan-Baker
B. Dennis King
C. Wade MacLauchlan
D. Robert Ghiz
Answer: B. Dennis King
271. 
True or False
Dennis King leads the PEI Green Party.
Answer: False
(Explanation: He leads the Progressive Conservative Party.)
272. 
Multiple Choice
What is the primary responsibility of municipal governments in PEI?
A. International relations
B. Provincial policing
C. Local services such as water, waste, and roads
D. Immigration
Answer: C. Local services such as water, waste, and roads
273. 
True or False
Municipalities in PEI can pass federal laws.
Answer: False
274. 
Multiple Choice
Which party formed the Official Opposition in PEI in 2023?
A. Liberal Party
B. Green Party
C. Conservative Party
D. NDP
Answer: B. Green Party
275. 
True or False
The PEI legislature has three official parties.
Answer: True
276. 
Multiple Choice
Which form of government does PEI have?
A. Republic
B. Constitutional Monarchy
C. Direct Democracy
D. Theocracy
Answer: B. Constitutional Monarchy
277. 
True or False
Canada’s monarchy is symbolic and has no legal authority.
Answer: False
(Explanation: The monarch has legal powers exercised by representatives.)
278. 
Multiple Choice
Who represents the King in PEI?
A. Premier
B. Prime Minister
C. Governor General
D. Lieutenant Governor
Answer: D. Lieutenant Governor
279. 
True or False
The Prime Minister can remove the Lieutenant Governor of PEI.
Answer: False
(Explanation: Only the Governor General, on advice of the Prime Minister, appoints or removes them.)
280. 
Multiple Choice
Which body enforces provincial laws in PEI?
A. RCMP Provincial contract
B. Canadian Forces
C. CSIS
D. Municipal Enforcement Agency
Answer: A. RCMP Provincial contract
281. 
True or False
The RCMP provides policing services to all of PEI’s rural areas.
Answer: True
282. 
Multiple Choice
What is the highest court in Prince Edward Island?
A. Supreme Court of Canada
B. Court of Appeal of PEI
C. Federal Court
D. Provincial Court of PEI
Answer: B. Court of Appeal of PEI
283. 
True or False
The Court of Appeal of PEI is part of the federal judicial system.
Answer: False
(Explanation: It is a provincial court.)
284. 
Multiple Choice
Which of these is a key economic sector in PEI?
A. Oil extraction
B. Automobile manufacturing
C. Aerospace
D. Agriculture
Answer: D. Agriculture
285. 
True or False
Potatoes are PEI’s most famous agricultural product.
Answer: True
286. 
Multiple Choice
Which crop is PEI best known for producing?
A. Wheat
B. Barley
C. Potatoes
D. Corn
Answer: C. Potatoes
287. 
True or False
PEI exports more seafood than agricultural products.
Answer: False
(Explanation: Potatoes remain the leading export.)
288. 
Multiple Choice
What is a major industry in PEI’s coastal economy?
A. Mining
B. Lobster fishing
C. Forestry
D. Aviation
Answer: B. Lobster fishing
289. 
True or False
PEI is part of the Atlantic Canada Agreement on Tourism.
Answer: True
290. 
Multiple Choice
Which annual event is significant in PEI’s tourism sector?
A. Stratford Festival
B. Acadian World Congress
C. Cavendish Beach Music Festival
D. Calgary Stampede
Answer: C. Cavendish Beach Music Festival
291. 
True or False
The Charlottetown Festival features Anne of Green Gables.
Answer: True
292. 
Multiple Choice
Which author made PEI internationally known through literature?
A. Margaret Atwood
B. L.M. Montgomery
C. Alice Munro
D. Farley Mowat
Answer: B. L.M. Montgomery
293. 
True or False
Anne of Green Gables is based in Newfoundland.
Answer: False
(Explanation: It is based in PEI.)
294. 
Multiple Choice
Green Gables Heritage Place is located in which town?
A. Summerside
B. Cavendish
C. Charlottetown
D. Montague
Answer: B. Cavendish
295. 
True or False
Green Gables Heritage Place is a UNESCO World Heritage Site.
Answer: False
296. 
Multiple Choice
Which of the following describes PEI’s geography?
A. Desert and rocky
B. Coastal and agricultural
C. Mountainous
D. Prairie
Answer: B. Coastal and agricultural
297. 
True or False
PEI has many large mountain ranges.
Answer: False
298. 
Multiple Choice
Which water surrounds PEI?
A. Hudson Bay
B. Atlantic Ocean
C. Bay of Fundy
D. Pacific Ocean
Answer: B. Atlantic Ocean
299. 
True or False
The Gulf of St. Lawrence borders PEI.
Answer: True
300. 
Multiple Choice
Which environmental issue is most significant in PEI?
A. Earthquakes
B. Flooding
C. Coastal erosion
D. Tornadoes
Answer: C. Coastal erosion
301. 
True or False
PEI’s coastal erosion is partly due to its sandstone cliffs.
Answer: True
302. 
Multiple Choice
Which color is most associated with PEI’s soil?
A. Grey
B. Red
C. Yellow
D. Black
Answer: B. Red
303. 
True or False
PEI’s red soil comes from iron oxide content.
Answer: True
304. 
Multiple Choice
Which of the following is a major university in PEI?
A. University of Prince Edward Island
B. Acadia University
C. Mount Allison University
D. Dalhousie University
Answer: A. University of Prince Edward Island
305. 
True or False
The University of Prince Edward Island (UPEI) is located in Summerside.
Answer: False
(Explanation: It is located in Charlottetown.)
306. 
Multiple Choice
Which province is PEI’s closest geographic neighbour?
A. Newfoundland and Labrador
B. Quebec
C. New Brunswick
D. Nova Scotia
Answer: C. New Brunswick
307. 
True or False
PEI shares a land border with Nova Scotia.
Answer: False
308. 
Multiple Choice
Which sector employs the most people in PEI?
A. Healthcare
B. Education
C. Agriculture and fisheries
D. Tourism and service
Answer: D. Tourism and service
309. 
True or False
Tourism is a minor part of PEI’s economy.
Answer: False
310. 
Multiple Choice
Which Act created the province of PEI in the Canadian Constitution?
A. British North America Act
B. PEI Entry Act
C. Constitution Act, 1867
D. Manitoba Act
Answer: B. PEI Entry Act
311. 
True or False
PEI joined Canada before the Constitution Act, 1867.
Answer: False
312. 
Multiple Choice
Who negotiates federal-provincial agreements on behalf of PEI?
A. The Lieutenant Governor
B. The Federal Cabinet
C. The Premier
D. Members of the Opposition
Answer: C. The Premier
313. 
True or False
The Lieutenant Governor attends Cabinet meetings.
Answer: False
314. 
Multiple Choice
How many Members of Parliament (MPs) does PEI have in the House of Commons?
A. 1
B. 2
C. 4
D. 8
Answer: B. 4
315. 
True or False
Each province’s number of MPs is based on population.
Answer: True
316. 
Multiple Choice
PEI’s provincial flag includes which key feature?
A. Maple leaf
B. Blue and gold stripes
C. Red cross and lion
D. Oak tree and saplings
Answer: D. Oak tree and saplings
317. 
True or False
The PEI flag shows unity between the federal and provincial governments.
Answer: False
(Explanation: It symbolizes the island’s counties under British protection.)
318. 
Multiple Choice
What does the large oak tree on the PEI flag represent?
A. Indigenous strength
B. Canadian unity
C. England
D. Charlottetown
Answer: C. England
319. 
True or False
The three saplings on the PEI flag represent its counties.
Answer: True
320. 
Multiple Choice
Which of the following counties is NOT in PEI?
A. Kings
B. Queens
C. Prince
D. York
Answer: D. York
321. 
True or False
There are only three counties in PEI: Kings, Queens, and Prince.
Answer: True
322. 
Multiple Choice
What is the oldest city in PEI?
A. Summerside
B. Charlottetown
C. Georgetown
D. Montague
Answer: B. Charlottetown
323. 
True or False
PEI has a unicameral legislative system.
Answer: True
324. 
Multiple Choice
Which organization provides French-language education in PEI?
A. Conseil scolaire francophone
B. Académie de la langue française
C. French Language Board of PEI
D. Francophone Canada Trust
Answer: A. Conseil scolaire francophone
325. 
True or False
French is not officially taught in any public schools in PEI.
Answer: False
326. 
Multiple Choice
What is the name of the Indigenous peoples of PEI?
A. Cree
B. Mohawk
C. Mi’kmaq
D. Inuit
Answer: C. Mi’kmaq
327. 
True or False
The Mi’kmaq are part of the larger Wabanaki Confederacy.
Answer: True
328. 
Multiple Choice
Which of the following reserves is located in PEI?
A. Lennox Island First Nation
B. Millbrook First Nation
C. Eskasoni First Nation
D. Red Sucker Lake First Nation
Answer: A. Lennox Island First Nation
329. 
True or False
Mi’kmaq communities in PEI have self-government agreements.
Answer: True
330. 
Multiple Choice
Which of these PEI communities has a notable Acadian population?
A. Alberton
B. Miscouche
C. Souris
D. O’Leary
Answer: B. Miscouche
331. 
True or False
Miscouche is important to Acadian culture in PEI.
Answer: True
332. 
Multiple Choice
What is the primary religion historically practiced in PEI?
A. Islam
B. Buddhism
C. Roman Catholicism
D. Anglicanism
Answer: C. Roman Catholicism
333. 
True or False
Protestant denominations also have a significant presence in PEI.
Answer: True
334. 
Multiple Choice
What major contribution did the Acadians make to PEI?
A. Establishment of government
B. Development of potato farming
C. Preservation of French language and Catholic faith
D. Exploration routes
Answer: C. Preservation of French language and Catholic faith
335. 
True or False
Acadians arrived in PEI before the British.
Answer: True
336. 
Multiple Choice
Which year did PEI become part of Confederation?
A. 1864
B. 1870
C. 1873
D. 1882
Answer: C. 1873
337. 
True or False
PEI was one of the original four provinces in 1867.
Answer: False
338. 
Multiple Choice
Why did PEI join Confederation in 1873?
A. For military protection
B. To gain access to the Pacific
C. To resolve railway debt
D. To expand agriculture
Answer: C. To resolve railway debt
339. 
True or False
The federal government took over PEI’s railway debt upon joining Confederation.
Answer: True
340. 
Multiple Choice
Which sector is NOT a traditional economic base in PEI?
A. Fishing
B. Agriculture
C. Film industry
D. Tourism
Answer: C. Film industry
341. 
True or False
Forestry is a major industry in PEI.
Answer: False
342. 
Multiple Choice
What does PEI celebrate during National Acadian Day?
A. Indigenous culture
B. English Loyalist migration
C. French Acadian heritage
D. Confederation
Answer: C. French Acadian heritage
343. 
True or False
National Acadian Day is celebrated only in Quebec.
Answer: False
344. 
Multiple Choice
What is the Acadian flag’s background color?
A. Blue with a red maple leaf
B. Red with a white cross
C. Blue, white, and red stripes with a yellow star
D. Solid white with red star
Answer: C. Blue, white, and red stripes with a yellow star
345. 
True or False
The yellow star on the Acadian flag symbolizes the Virgin Mary.
Answer: True
346. 
Multiple Choice
In which century did the Acadians begin settling in PEI?
A. 15th
B. 16th
C. 17th
D. 18th
Answer: C. 17th
347. 
True or False
The Deportation of the Acadians occurred in the 1800s.
Answer: False
(Explanation: It occurred in the mid-1700s.)
348. 
Multiple Choice
What is the traditional Acadian music instrument?
A. Violin
B. Flute
C. Accordion
D. Guitar
Answer: C. Accordion
349. 
True or False
The fiddle is also popular in Acadian music.
Answer: True
350. 
Multiple Choice
Which of the following is a PEI heritage site?
A. Fort Beauséjour
B. Province House
C. Fortress Louisbourg
D. Citadel Hill
Answer: B. Province House

351. 
True or False
The Province House is located in Charlottetown.
Answer: True

352. 
Multiple Choice
Who meets at Province House?
A. PEI Legislative Assembly
B. PEI Supreme Court
C. Federal Cabinet
D. Local mayors
Answer: A. PEI Legislative Assembly
353. 
True or False
Province House hosted the 1875 Charlottetown Conference.
Answer: False
(Explanation: It hosted the 1864 Charlottetown Conference, which led to Confederation.)
354. 
Multiple Choice
Which of the following statements is true?
A. PEI has a senate
B. PEI has a unicameral legislature
C. PEI does not have a legislature
D. PEI’s legislature is federal
Answer: B. PEI has a unicameral legislature
355. 
True or False
Unicameral means having one legislative chamber.
Answer: True
356. 
Multiple Choice
Which form of government does PEI use?
A. Republic
B. Constitutional monarchy
C. Direct democracy
D. Absolute monarchy
Answer: B. Constitutional monarchy
357. 
True or False
The King of Canada has no role in PEI governance.
Answer: False
358. 
Multiple Choice
Which of these is NOT a responsibility of PEI’s provincial government?
A. Education
B. Health care
C. Citizenship
D. Natural resources
Answer: C. Citizenship
359. 
True or False
Citizenship and immigration are federal responsibilities.
Answer: True
360. 
Multiple Choice
What symbol is on the PEI licence plate?
A. A tree and saplings
B. Confederation Bridge
C. Green Gables house
D. A red maple leaf
Answer: C. Green Gables house
361. 
True or False
Confederation Centre of the Arts is a national memorial to the Fathers of Confederation.
Answer: True
362. 
Multiple Choice
What major annual cultural event is hosted at the Confederation Centre of the Arts?
A. PEI Potato Festival
B. Charlottetown Acadian Week
C. Charlottetown Festival
D. Maritime Heritage Days
Answer: C. Charlottetown Festival
363. 
True or False
The Charlottetown Festival includes performances of Anne of Green Gables – The Musical.
Answer: True
364. 
Multiple Choice
Which iconic red-haired character made PEI famous worldwide?
A. Lucy Maud
B. Emily of New Moon
C. Megan Barry
D. Anne of Green Gables
Answer: D. Anne of Green Gables
365. 
True or False
Green Gables Heritage Place is located in Georgetown.
Answer: False
(Explanation: It is located in Cavendish.)
366. 
Multiple Choice
Who wrote Anne of Green Gables?
A. Lucy Maud Montgomery
B. Margaret Atwood
C. Alice Munro
D. Emily Carr
Answer: A. Lucy Maud Montgomery
367. 
True or False
Lucy Maud Montgomery was born in Charlottetown.
Answer: False
(Explanation: She was born in Clifton, PEI.)
368. 
Multiple Choice
Which PEI location inspired the setting for Anne of Green Gables?
A. Souris
B. Montague
C. Cavendish
D. Alberton
Answer: C. Cavendish
369. 
True or False
Tourists visit PEI for its red soil, sandy beaches, and literary heritage.
Answer: True
370. 
Multiple Choice
Which color is associated with PEI’s unique soil?
A. Grey
B. Red
C. Black
D. White
Answer: B. Red
371. 
True or False
The red color of PEI soil comes from iron oxide.
Answer: True
372. 
Multiple Choice
What is the main city of Prince Edward Island?
A. Summerside
B. Charlottetown
C. Georgetown
D. Montague
Answer: B. Charlottetown
373. 
True or False
Summerside is the largest city in PEI.
Answer: False
(Explanation: Charlottetown is the largest.)
374. 
Multiple Choice
Which bridge connects PEI to mainland Canada?
A. Macdonald-Cartier Bridge
B. Peace Bridge
C. Confederation Bridge
D. Island Link Bridge
Answer: C. Confederation Bridge
375. 
True or False
The Confederation Bridge connects PEI to Nova Scotia.
Answer: False
(Explanation: It connects PEI to New Brunswick.)
376. 
Multiple Choice
How long is the Confederation Bridge?
A. 3 km
B. 8 km
C. 12.9 km
D. 22 km
Answer: C. 12.9 km
377. 
True or False
The Confederation Bridge opened in 1997.
Answer: True
378. 
Multiple Choice
What is the main function of the Lieutenant Governor of PEI?
A. Appointing Senators
B. Representing the King
C. Running elections
D. Approving trade deals
Answer: B. Representing the King
379. 
True or False
The Lieutenant Governor signs bills into law at the provincial level.
Answer: True
380. 
Multiple Choice
How many electoral districts are there in PEI?
A. 12
B. 18
C. 27
D. 32
Answer: C. 27
381. 
True or False
Each PEI electoral district elects two MLAs.
Answer: False
382. 
Multiple Choice
Which of the following is the provincial legislature of PEI?
A. PEI Legislative Council
B. House of Commons
C. Legislative Assembly of Prince Edward Island
D. PEI Senate
Answer: C. Legislative Assembly of Prince Edward Island
383. 
True or False
Provincial bills must be passed by the PEI Legislative Assembly and approved by the Lieutenant Governor.
Answer: True
384. 
Multiple Choice
What age is allowed to vote in PEI provincial elections?
A. 18
B. 21
C. 19
D. 16
Answer: A. 18
385. 
True or False
Canadian citizens must be residents of PEI to vote in PEI elections.
Answer: True
386. 
Multiple Choice
What is the main governing political party in PEI as of 2025?
A. Green Party of PEI
B. PEI Liberal Party
C. Progressive Conservative Party
D. New Democratic Party of PEI
Answer: C. Progressive Conservative Party
387. 
True or False
The PEI Green Party formed government in 2023.
Answer: False
388. 
Multiple Choice
Who is the current Premier of PEI as of 2025?
A. Peter Bevan-Baker
B. Dennis King
C. Robert Ghiz
D. Wade MacLauchlan
Answer: B. Dennis King
389. 
True or False
Dennis King is a member of the Progressive Conservative Party of PEI.
Answer: True
390. 
Multiple Choice
Who is the Lieutenant Governor of PEI as of 2025?
A. Antoinette Perry
B. Sandra MacLauchlan
C. H. Frank Lewis
D. Hon. Antoinette Perry
Answer: D. Hon. Antoinette Perry
391. 
True or False
Antoinette Perry is the representative of the monarch in PEI.
Answer: True
392. 
Multiple Choice
How many seats does PEI hold in Canada’s House of Commons?
A. 1
B. 2
C. 4
D. 6
Answer: C. 4
393. 
True or False
PEI also has representation in Canada’s Senate.
Answer: True
394. 
Multiple Choice
Which sector is NOT a major employer in PEI?
A. Agriculture
B. Technology
C. Manufacturing
D. Oil and gas
Answer: D. Oil and gas
395. 
True or False
The oil and gas industry is a key sector in PEI.
Answer: False
396. 
Multiple Choice
What is the provincial flower of PEI?
A. Red Clover
B. Lady’s Slipper
C. Mayflower
D. Purple Violet
Answer: A. Red Clover
397. 
True or False
PEI’s provincial tree is the Eastern Hemlock.
Answer: False
(Explanation: It is the Red Oak.)
398. 
Multiple Choice
Which fishery product is most associated with PEI?
A. Cod
B. Salmon
C. Lobster
D. Herring
Answer: C. Lobster
399. 
True or False
PEI is sometimes referred to as Canada’s “Garden Province.”
Answer: True
400. 
Multiple Choice
Which historical document was created during the 1864 Charlottetown Conference?
A. Constitution Act
B. Treaty of Paris
C. Draft for Canadian Confederation
D. Royal Proclamation
Answer: C. Draft for Canadian Confederation
EOT;

        // Trim any leading/trailing whitespace or newlines from the entire text block
        $questionsText = trim($questionsText);

        $questions = [];
        // Define a comprehensive regex pattern to capture all parts of each question block.
        // `(?s)` enables dotall mode (s) so `.` matches newlines.
        // `(?m)` enables multiline mode (m) so `^` and `$` match start/end of lines.
        // `\s*` is used to match zero or more whitespace characters, including newlines.
        // The lookahead `(?=\s*\d+\.|\Z)` ensures it stops before the next question number or the absolute end of the string.
        $pattern = '/^(\d+)\.\s*[\r\n]+\s*(Multiple Choice|True or False):?\s*([\s\S]*?)\s*Answer:\s*(.+?)(?:\s*\([\s\S]*?\))?(?=\s*\d+\.|\Z)/sim';
        //$pattern = '/^(\d+)\.\s*(?:\r?\n)?\s*(Multiple Choice|True or False)?\s*:?[\r\n]+([\s\S]*?)\s*Answer\s*[:\-]?\s*(.+?)(?:\s*\([\s\S]*?\))?(?=\s*\d+\.|\Z)/im';
        //$pattern = '/^(\d+)\.\s*([\s\S]*?)\s*Answer:\s*(.+?)(?:\s*\([\s\S]*?\))?(?=\s*\d+\.|\Z)/sim';






        // Perform a global match to find all questions in the text
        if (preg_match_all($pattern, $questionsText, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $questionNumber = (int)$match[1];
                $questionType = trim($match[2], ': '); // Remove "Multiple Choice:" or "True or False:"
                $rawQuestionContent = trim($match[3]);
                $rawAnswer = trim($match[4]);



                $questionText = '';
                $choices = [];
                $correctAnswer = '';

                // Determine actual question text and parse choices based on type
                if ($questionType === 'Multiple Choice') {
                    $lines = preg_split('/[\r\n]+/', $rawQuestionContent, -1, PREG_SPLIT_NO_EMPTY);
                    $tempQuestionText = [];
                    $foundChoices = false;
                    foreach ($lines as $line) {
                        $line = trim($line);
                        // Check if line starts with A., B., C., or D. for choices
                        if (preg_match('/^[A-D]\.\s*(.+)/i', $line, $choiceMatches)) {
                            $choices[] = $choiceMatches[1]; // Store just the choice text, not "A. Choice Text"
                            $foundChoices = true;
                        } elseif (!$foundChoices) {
                            // Collect lines before choices as question text
                            $tempQuestionText[] = $line;
                        }
                    }
                    $questionText = implode(' ', $tempQuestionText);
                    // Clean the correct answer from its leading letter and period (e.g., "D. Edmonton" becomes "Edmonton")
                    if (preg_match('/^[A-D]\.\s*(.+)/i', $rawAnswer, $answerMatches)) {
                        $correctAnswer = trim($answerMatches[1]);
                    } else {
                        // If the answer is just the text without the letter prefix, use it directly
                        $correctAnswer = $rawAnswer;
                    }
                } elseif ($questionType === 'True or False') {
                    $questionText = $rawQuestionContent; // For T/F, all content before "Answer:" is the question
                    $choices = ['True', 'False']; // Explicitly set choices for T/F
                    $normalizedAnswer = strtolower($rawAnswer);

                    // Crucial fix: Remove any trailing digits and a dot from the answer for T/F questions
                    // This handles anomalies like "True397."
                    if (preg_match('/^(true|false)\s*\d+\.?$/i', $normalizedAnswer, $answerDigitsMatch)) {
                        $normalizedAnswer = $answerDigitsMatch[1]; // Keep only 'true' or 'false'
                    }

                    if ($normalizedAnswer === 'true') {
                        $correctAnswer = 'True';
                    } elseif ($normalizedAnswer === 'false') {
                        $correctAnswer = 'False';
                    } else {
                        $this->command->warn("Malformed T/F answer for Q{$questionNumber}. Expected 'True' or 'False', got '{$rawAnswer}'. Skipping.");
                        continue;
                    }
                }

                // Final validation before adding to list
                if (empty($questionText) || empty($correctAnswer) || empty($questionType)) {
                    $debugInfo = [
                        'Q#' => $questionNumber,
                        'question_empty' => empty($questionText) ? 'Y' : 'N',
                        'answer_empty' => empty($correctAnswer) ? 'Y' : 'N',
                        'type_empty' => empty($questionType) ? 'Y' : 'N',
                        'raw_question_content_start' => substr($rawQuestionContent, 0, 50) . '...',
                        'raw_answer' => $rawAnswer
                    ];
                    $this->command->warn("Skipping incomplete or malformed question (final check). Debug: " . json_encode($debugInfo));
                    continue;
                }

                if ($questionType === 'Multiple Choice' && empty($choices)) {
                     $this->command->warn("Skipping Q{$questionNumber}: Multiple Choice question with no choices found. Raw content start: " . substr($rawQuestionContent, 0, 100) . "...");
                     continue;
                   

                }

                $questions[] = [
                    'question_number' => $questionNumber,
                    'question' => $questionText,
                    'type' => $questionType,
                    'choices' => $choices, // Store as PHP array, Laravel's cast will handle JSON encoding
                    'correct_answer' => $correctAnswer,
                    'audio_url' => null, // Keeping this null as individual question audio is not needed
                ];
            }
        } else {
            $lastError = preg_last_error();
            $errorMessage = '';
            switch ($lastError) {
                case PREG_INTERNAL_ERROR: $errorMessage = 'Internal error'; break;
                case PREG_BACKTRACK_LIMIT_ERROR: $errorMessage = 'Backtrack limit exceeded'; break;
                case PREG_RECURSION_LIMIT_ERROR: $errorMessage = 'Recursion limit exceeded'; break;
                case PREG_BAD_UTF8_ERROR: $errorMessage = 'Bad UTF-8 (malformed characters)'; break;
                case PREG_BAD_UTF8_OFFSET_ERROR: $errorMessage = 'Bad UTF-8 offset'; break;
                case PREG_JIT_STACKLIMIT_ERROR: $errorMessage = 'JIT stack limit exceeded'; break;
                default: $errorMessage = 'Unknown error (code: ' . $lastError . ')'; break;
            }

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Prince Edward Island.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Edward Island.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $peiSection->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Prince Edward Island citizenship questions.");
    }
}
