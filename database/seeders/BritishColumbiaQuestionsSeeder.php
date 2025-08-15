<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BritishColumbiaQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $britishColumbia = CourseSection::firstOrCreate(
            ['title' => 'British Columbia'],
            [
                'type' => 'province',
                'capital' => 'Victoria',
                'flag' => '/images/flags/british-columbia.png',
                'description' => 'Questions specific to British Columbia.',
                'summary_audio_url' => '/audio/summary_british_columbia.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $britishColumbia->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
True or False:
British Columbia has hosted international trade fairs such as Expo 86.
Answer: True
(Vancouver hosted Expo 86, a world's fair that showcased transportation and technology.)

2.
Multiple Choice:
Which one is the capital city of British Columbia?
A. Vancouver
B. Surrey
C. Victoria
D. Kelowna
Answer: C. Victoria

3.
True or False:
British Columbia is located in central Canada.
Answer: False
(British Columbia is located on the west coast of Canada.)

4.
Multiple Choice:
Which industry is a major contributor to British Columbia’s economy?
A. Fishing
B. Oil drilling
C. Automotive
D. Technology
Answer: D. Technology

5.
True or False:
The Rocky Mountains run through British Columbia.
Answer: True

6.
Multiple Choice:
What is the name of the premier of British Columbia as of 2025?
A. David Eby
B. John Horgan
C. Bonnie Henry
D. Jagmeet Singh
Answer: A. David Eby

7.
Multiple Choice:
When did British Columbia join Confederation?
A. 1867
B. 1871
C. 1905
D. 1949
Answer: B. 1871

8.
True or False:
The capital of British Columbia is Vancouver.
Answer: False
(The capital is Victoria, not Vancouver.)

9.
Multiple Choice:
What is the largest city in British Columbia?
A. Burnaby
B. Richmond
C. Victoria
D. Vancouver
Answer: D. Vancouver

10.
True or False:
British Columbia has a large Indigenous population.
Answer: True

11.
Multiple Choice:
What is the name of Canada’s largest port located in BC?
A. Port of Montreal
B. Port of Toronto
C. Port of Halifax
D. Port of Vancouver
Answer: D. Port of Vancouver

12.
True or False:
BC is a landlocked province.
Answer: False
(BC borders the Pacific Ocean.)

13.
Multiple Choice:
What is the name of Canada’s largest port located in BC?
A. Port of Montreal
B. Port of Toronto
C. Port of Halifax
D. Port of Vancouver
Answer: D. Port of Vancouver

14.
True or False:
The climate in BC is the same across the province.
Answer: False
(BC has coastal, mountain, and interior climates.)

15.
Multiple Choice:
Which of the following is a key BC industry?
A. Aerospace
B. Agriculture
C. Film and Television
D. Car manufacturing
Answer: C. Film and Television

16.
True or False:
BC joined Canada in 1949.
Answer: False
(BC joined in 1871.)

17.
Multiple Choice:
What is the main duty of the Lieutenant Governor in BC?
A. Head of the provincial police
B. Premier’s deputy
C. Represents the King
D. Federal minister
Answer: C. Represents the King

18.
True or False:
BC was one of the four original provinces of Confederation.
Answer: False
(BC joined later, in 1871.)

19.
Multiple Choice:
Which island is the capital city of BC located on?
A. Salt Spring Island
B. Vancouver Island
C. Bowen Island
D. Haida Gwaii
Answer: B. Vancouver Island

20.
True or False:
Victoria is the capital.
Answer: True

21.
Multiple Choice:
What major railway helped bring BC into Confederation?
A. GO Transit
B. VIA Rail
C. Canadian Pacific Railway
D. Trans-Canada Express
Answer: C. Canadian Pacific Railway

22.
Multiple Choice:
Which city hosted the 2010 Winter Olympics in British Columbia?
A. Victoria
B. Whistler
C. Vancouver
D. Kelowna
Answer: C. Vancouver

23.
True or False:
BC borders Alberta and Manitoba.
Answer: False
(BC borders Alberta but not Manitoba.)

24.
Multiple Choice:
Which of these Indigenous groups are found in British Columbia?
A. Inuit
B. Mi’kmaq
C. Haida
D. Cree
Answer: C. Haida

25.
True or False:
BC is known for its mining industry.
Answer: True

26.
Multiple Choice:
What is the legislature of British Columbia called?
A. House of Commons
B. British Columbia Assembly
C. Legislative Assembly of British Columbia
D. Provincial Senate
Answer: C. Legislative Assembly of British Columbia

27.
True or False:
The Fraser River is the longest river in BC.
Answer: True

28.
Multiple Choice:
Which environmental concern is significant in BC?
A. Desertification
B. Sea level rise
C. Air pollution
D. Urban flooding
Answer: B. Sea level rise

29.
True or False:
BC's forests are all privately owned.
Answer: False
(Many forests are publicly managed.)

30.
Multiple Choice:
What is the name of BC’s main public health officer?
A. Bonnie Henry
B. Theresa Tam
C. Heather Stefanson
D. Rachel Notley
Answer: A. Bonnie Henry

31.
True or False:
BC has no coastal border.
Answer: False
(BC borders the Pacific Ocean.)

32.
Multiple Choice:
Which geographic feature protects Vancouver from harsh winter?
A. The Rocky Mountains
B. The Coastal Mountains
C. The Boreal Shield
D. The Arctic Circle
Answer: B. The Coastal Mountains

33.
True or False:
Forestry is a key industry in BC.
Answer: True

34.
Multiple Choice:
Which ferry system connects BC’s islands to the mainland?
A. Prairie Ferry
B. Marine Canada
C. BC Ferries
D. Pacific Link
Answer: C. BC Ferries

35.
True or False:
The Okanagan region is known for wine production.
Answer: True

36.
Multiple Choice:
What is the largest university in British Columbia?
A. Simon Fraser University
B. University of Victoria
C. University of British Columbia (UBC)
D. Capilano University
Answer: C. University of British Columbia (UBC)

37.
True or False:
Victoria is located on the mainland of BC.
Answer: False
(Victoria is located on Vancouver Island.)

38.
Multiple Choice:
Which city is home to BC's technology hub?
A. Prince George
B. Nanaimo
C. Vancouver
D. Kamloops
Answer: C. Vancouver

39.
True or False:
The climate in coastal BC is generally mild and rainy.
Answer: True

40.
Multiple Choice:
BC is part of which natural disaster zone?
A. Tornado Alley
B. Earthquake zone
C. Ice storm belt
D. Volcanic ring
Answer: B. Earthquake zone

41.
True or False:
British Columbia is the province in Canada with most population.
Answer: False
(Ontario is the most populous province.)

42.
Multiple Choice:
What natural region in BC is known for fruit orchards and wineries?
A. Cariboo
B. Okanagan Valley
C. Kootenays
D. Peace River
Answer: B. Okanagan Valley

43.
True or False:
Peace River is known for fruit orchards and wineries.
Answer: False

44.
Multiple Choice:
What is the traditional territory of the Coast Salish peoples?
A. Interior plateau
B. Northern boreal
C. Southern coastal BC
D. Rocky Mountains
Answer: C. Southern coastal BC

45.
True or False:
The Legislative Assembly of BC is located in Kelowna.
Answer: False
(It is located in Victoria.)

46.
Multiple Choice:
Which mountain range runs along the eastern edge of BC?
A. Appalachian Mountains
B. Laurentian Mountains
C. Rocky Mountains
D. Canadian Shield
Answer: C. Rocky Mountains

47.
True or False:
BC has the third-largest population in Canada.
Answer: True

48.
Multiple Choice:
Who is the Lieutenant Governor of British Columbia as of 2025?
A. Janet Austin
B. Mary Simon
C. Bonnie Henry
D. David Johnston
Answer: A. Janet Austin

49.
True or False:
BC’s government is unicameral, meaning it has only one legislative chamber.
Answer: True

50.
Multiple Choice:
Which BC city is closest to the US border?
A. Victoria
B. Vancouver
C. Prince George
D. Abbotsford
Answer: D. Abbotsford

51.
True or False:
Vancouver Island is part of the mainland.
Answer: False
(It is a separate island off the Pacific coast.)

52.
Multiple Choice:
Which major highway connects BC to Alberta?
A. Trans-Canada Highway (Highway 1)
B. Yellowhead Highway
C. Alaska Highway
D. Sea to Sky Highway
Answer: A. Trans-Canada Highway (Highway 1)

53.
True or False:
Tourism is a major economic contributor in BC.
Answer: True

54.
Multiple Choice:
Which BC port is one of the largest in North America?
A. Port Hardy
B. Port Alberni
C. Port of Vancouver
D. Kitimat Port
Answer: C. Port of Vancouver

55.
True or False:
BC is home to some of Canada’s oldest forests.
Answer: True

56.
Multiple Choice:
Which of these cities is located in the interior of British Columbia?
A. Burnaby
B. Kamloops
C. Richmond
D. Nanaimo
Answer: B. Kamloops

57.
True or False:
The population of BC is entirely urban.
Answer: False
(BC has both urban and rural populations.)

58.
Multiple Choice:
Which British Columbia city is a key hub for natural gas and oil pipelines?
A. Fort St. John
B. Victoria
C. Coquitlam
D. Whistler
Answer: A. Fort St. John

59.
True or False:
Forestry has historically been important to BC’s economy.
Answer: True

60.
Multiple Choice:
What is the name of the ferry route connecting Tsawwassen to Vancouver Island?
A. Southern Express
B. Island Connector
C. Tsawwassen–Swartz Bay
D. Coast Ferry
Answer: C. Tsawwassen–Swartz Bay

61.
True or False:
Most of BC’s energy comes from hydroelectric power.
Answer: True

62.
Multiple Choice:
What is the capital city of British Columbia?
A. Vancouver
B. Victoria
C. Burnaby
D. Kelowna
Answer: B. Victoria

63.
True or False:
The Legislative Assembly of BC has a Speaker, Premier, and Members of the Legislative Assembly (MLAs).
Answer: True

64.
Multiple Choice:
Which of the following best describes BC’s provincial flag?
A. Red maple leaf with blue stripes
B. Sun setting behind the Union Jack
C. Blue field with a polar bear
D. Fleur-de-lis with red cross
Answer: B. Sun setting behind the Union Jack

65.
True or False:
The majority of BC’s residents speak only French.
Answer: False
(English is the most commonly spoken language in BC.)

66.
Multiple Choice:
Which economic sector in BC includes logging and sawmills?
A. Service
B. Manufacturing
C. Primary industry
D. Tertiary sector
Answer: C. Primary industry

67.
True or False:
The Sea-to-Sky Highway connects Vancouver to Whistler.
Answer: True

68.
Multiple Choice:
Which Premier currently leads the BC government as of 2025?
A. David Eby
B. John Horgan
C. Doug Ford
D. Justin Trudeau
Answer: A. David Eby

69.
True or False:
The Pacific Ocean is east of British Columbia.
Answer: False
(The Pacific Ocean lies to the west of BC.)

70.
Multiple Choice:
What is a common natural disaster risk in British Columbia?
A. Hurricanes
B. Earthquakes
C. Sandstorms
D. Tornadoes
Answer: B. Earthquakes

71.
True or False:
British Columbia was the last province to join Confederation.
Answer: False
(Newfoundland and Labrador joined last in 1949; BC joined in 1871.)

72.
Multiple Choice:
Which group of islands is located northwest of British Columbia?
A. Vancouver Islands
B. Gulf Islands
C. Queen Charlotte Islands (Haida Gwaii)
D. Hudson Islands
Answer: C. Queen Charlotte Islands (Haida Gwaii)

73.
True or False:
BC shares a border with Alaska.
Answer: True

74.
Multiple Choice:
What is a major industry in Northern British Columbia?
A. Film production
B. Software development
C. Mining and energy
D. Tourism only
Answer: C. Mining and energy

75.
True or False:
The Columbia Icefield is found in BC.
Answer: True

76.
Multiple Choice:
Which national park is located in BC?
A. Banff
B. Kootenay
C. Jasper
D. Pacific Rim
Answer: D. Pacific Rim

77.
True or False:
The port of Vancouver handles international trade.
Answer: True

78.
Multiple Choice:
Which Indigenous language family is native to the west coast of BC?
A. Algonquian
B. Salishan
C. Inuktitut
D. Cree
Answer: B. Salishan

79.
True or False:
BC’s Pacific Rim is known for surfing and whale watching.
Answer: True

80.
Multiple Choice:
Which BC city is known for its multiculturalism and large Asian communities?
A. Prince George
B. Richmond
C. Victoria
D. Kamloops
Answer: B. Richmond

81.
True or False:
BC has no mountain ranges.
Answer: False
(BC is home to several mountain ranges, including the Coastal and Rocky Mountains.)

82.
Multiple Choice:
What BC mountain is a popular ski resort and hosted the 2010 Winter Olympics?
A. Grouse Mountain
B. Cypress Mountain
C. Whistler Mountain
D. Mount Seymour
Answer: C. Whistler Mountain

83.
True or False:
The Fraser River is the longest river entirely within British Columbia.
Answer: True

84.
Multiple Choice:
Which BC city is the second largest after Vancouver?
A. Victoria
B. Surrey
C. Kelowna
D. Nanaimo
Answer: B. Surrey

85.
True or False:
The BC government is responsible for education, health, and natural resources in the province.
Answer: True

86.
Multiple Choice:
Which sector is a major employer in BC’s economy?
A. Aerospace
B. Services
C. Banking
D. Automobiles
Answer: B. Services

87.
True or False:
The Legislative Assembly of BC is responsible for passing provincial laws.
Answer: True

88.
Multiple Choice:
Which Indigenous group is associated with northern British Columbia?
A. Haida
B. Dene
C. Inuit
D. Mi'kmaq
Answer: A. Haida

89.
True or False:
Vancouver was the capital of British Columbia before Victoria.
Answer: False
(New Westminster was the original capital before Victoria.)

90.
Multiple Choice:
Which BC region is known for its dry, desert-like climate?
A. Fraser Valley
B. Vancouver Island
C. Okanagan
D. Cariboo
Answer: C. Okanagan

91.
True or False:
David Eby is the current Premier of British Columbia as of 2025.
Answer: True

92.
Multiple Choice:
Which of the following is a post-secondary institution in BC?
A. University of Alberta
B. Simon Fraser University
C. McGill University
D. Dalhousie University
Answer: B. Simon Fraser University

93.
True or False:
The Peace Arch border crossing connects BC with the state of Washington, USA.
Answer: True

94.
Multiple Choice:
What geographic feature makes BC vulnerable to earthquakes?
A. Heavy snowfall
B. Proximity to the Ring of Fire
C. Coastal erosion
D. Large lakes
Answer: B. Proximity to the Ring of Fire

95.
True or False:
Mining is no longer an active industry in British Columbia.
Answer: False
(Mining remains a significant contributor to BC’s economy.)

96.
Multiple Choice:
Which of the following BC cities is located in the north?
A. Prince George
B. Richmond
C. Burnaby
D. Coquitlam
Answer: A. Prince George

97.
True or False:
BC has no publicly funded health care system.
Answer: False
(BC has publicly funded health care like other Canadian provinces.)

98.
Multiple Choice:
Which year did British Columbia join Confederation?
A. 1867
B. 1871
C. 1880
D. 1905
Answer: B. 1871

99.
True or False:
The Speaker of the BC Legislative Assembly oversees debates and enforces rules.
Answer: True

100.
Multiple Choice:
What is the name of BC’s official provincial flower?
A. Rose
B. Pacific Dogwood
C. Trillium
D. Wild Lily
Answer: B. Pacific Dogwood

101.
True or False:
BC has a multicultural society with many people of Asian heritage.
Answer: True

102.
Multiple Choice:
What is the name of the Indigenous people of Haida Gwaii?
A. Cree
B. Haida
C. Métis
D. Inuit
Answer: B. Haida

103.
True or False:
BC’s climate varies from coastal temperate to interior continental.
Answer: True

104.
Multiple Choice:
Which treaty process is ongoing in many parts of British Columbia?
A. Robinson Treaties
B. James Bay Agreement
C. BC Treaty Process
D. Numbered Treaties
Answer: C. BC Treaty Process

105.
True or False:
The Legislative Assembly of British Columbia has 87 elected MLAs.
Answer: True

106.
Multiple Choice:
What is the term for the leader of the provincial government in BC?
A. Mayor
B. Premier
C. Senator
D. Governor
Answer: B. Premier

107.
True or False:
The British Columbia Supreme Court is the highest court in the province.
Answer: True

108.
Multiple Choice:
Which city is home to BC’s main international airport?
A. Victoria
B. Nanaimo
C. Richmond
D. Kelowna
Answer: C. Richmond

109.
True or False:
The Strait of Georgia lies between Vancouver Island and the BC mainland.
Answer: True

110.
Multiple Choice:
Which of the following is a key feature of the BC economy?
A. Oil exports
B. Gold reserves
C. Forestry and tourism
D. Auto manufacturing
Answer: C. Forestry and tourism

111.
True or False:
There are no Indigenous languages spoken in BC today.
Answer: False
(Many Indigenous languages are still spoken in BC.)

112.
Multiple Choice:
Where is the British Columbia Parliament Buildings located?
A. Burnaby
B. Richmond
C. Vancouver
D. Victoria
Answer: D. Victoria

113.
True or False:
John A. Macdonald was BC’s first Premier.
Answer: False
(John A. Macdonald was Canada's first Prime Minister, not BC’s Premier.)

114.
Multiple Choice:
What is the role of the Lieutenant Governor in BC?
A. Leads the opposition
B. Signs bills into law
C. Serves as Premier
D. Oversees education
Answer: B. Signs bills into law

115.
True or False:
The economy of BC relies heavily on natural resources and innovation.
Answer: True

116.
Multiple Choice:
Which BC city is known as the “gateway to the north”?
A. Surrey
B. Kamloops
C. Prince George
D. Nanaimo
Answer: C. Prince George

117.
True or False:
Every citizen in BC is required to vote in provincial elections.
Answer: False
(Voting is a right, not a legal obligation.)

118.
Multiple Choice:
Which of the following bodies oversees education in BC?
A. Canadian Senate
B. Provincial Ministry of Education
C. Supreme Court
D. Federal Government
Answer: B. Provincial Ministry of Education

119.
True or False:
The Legislative Assembly of BC meets in Victoria.
Answer: True

120.
Multiple Choice:
What is the name of the elected representative in a BC provincial riding?
A. MP
B. MLA
C. Councillor
D. Senator
Answer: B. MLA

121.
True or False:
The Pacific Ocean lies to the east of BC.
Answer: False
(The Pacific Ocean is to the west of BC.)

122.
Multiple Choice:
Which natural disaster is British Columbia particularly prone to?
A. Hurricanes
B. Tornadoes
C. Earthquakes
D. Volcanic eruptions
Answer: C. Earthquakes

123.
True or False:
British Columbia has over 25 Indigenous languages.
Answer: True

124.
Multiple Choice:
Which region in BC is known for fruit farming and vineyards?
A. Cariboo
B. Vancouver Island
C. Okanagan
D. Kootenays
Answer: C. Okanagan

125.
True or False:
The NDP is the current governing party in British Columbia as of 2025.
Answer: True

126.
Multiple Choice:
Which BC city is located near the Canada–US border and is a major port?
A. Prince Rupert
B. Vancouver
C. Fort St. John
D. Vernon
Answer: B. Vancouver

127.
True or False:
Vancouver Island is connected to the mainland by a bridge.
Answer: False
(Vancouver Island is accessible by ferry or plane only.)

128.
Multiple Choice:
What is the name of BC’s provincial police service?
A. RCMP
B. Ontario Provincial Police
C. Vancouver Police
D. BC Highway Patrol
Answer: A. RCMP

129.
True or False:
Forestry remains a key part of British Columbia’s economy.
Answer: True

130.
Multiple Choice:
Which major highway runs across southern BC, linking Alberta to Vancouver?
A. Highway 1
B. Highway 16
C. Highway 97
D. Highway 401
Answer: A. Highway 1

131.
True or False:
The provincial elections in BC are held every 3 years.
Answer: False
(BC holds provincial elections every 4 years.)

132.
Multiple Choice:
Which BC city is the legislative capital of the province?
A. Vancouver
B. Burnaby
C. Victoria
D. Richmond
Answer: C. Victoria

133.
True or False:
BC is home to the tallest mountain in Canada.
Answer: False
(Mount Logan in Yukon is Canada’s tallest mountain.)

134.
Multiple Choice:
Which BC region is known for outdoor sports and adventure tourism?
A. Lower Mainland
B. Northern BC
C. Kootenays
D. Okanagan
Answer: C. Kootenays

135.
True or False:
The Georgia Strait is a waterway important to marine traffic in BC.
Answer: True

136.
Multiple Choice:
Which major BC city is closest to the Alberta border?
A. Cranbrook
B. Victoria
C. Prince George
D. Kamloops
Answer: A. Cranbrook

137.
True or False:
The Nisga’a Treaty was one of the first modern treaties signed in BC.
Answer: True

138.
Multiple Choice:
What is one of BC’s most visited national parks?
A. Jasper
B. Pacific Rim
C. Banff
D. Bruce Peninsula
Answer: B. Pacific Rim

139.
True or False:
English is the only official language used in the BC Legislature.
Answer: True

140.
Multiple Choice:
What is the provincial bird of British Columbia?
A. Raven
B. Steller's Jay
C. Bald Eagle
D. Loon
Answer: B. Steller's Jay

141.
True or False:
British Columbia is Canada’s easternmost province.
Answer: False
(British Columbia is Canada’s westernmost province.)

142.
Multiple Choice:
Which river is one of the most important to British Columbia’s salmon industry?
A. Mackenzie River
B. Columbia River
C. Fraser River
D. Yukon River
Answer: C. Fraser River

143.
True or False:
The economy of British Columbia includes film, forestry, and high tech.
Answer: True

144.
Multiple Choice:
Which Indigenous nation signed the first modern treaty in British Columbia?
A. Nisga’a Nation
B. Haida Nation
C. Tsilhqot’in Nation
D. Coast Salish
Answer: A. Nisga’a Nation

145.
True or False:
British Columbia is the only Canadian province that borders the Pacific Ocean.
Answer: True

146.
Multiple Choice:
What is the role of the BC Premier?
A. Head of the federal opposition
B. Leader of the provincial government
C. Commander-in-chief
D. Supreme Court judge
Answer: B. Leader of the provincial government

147.
True or False:
British Columbia is Canada’s most populous province.
Answer: False
(Ontario is Canada’s most populous province.)

148.
Multiple Choice:
Which of the following sectors is a major contributor to BC’s economy?
A. Aerospace
B. Farming only
C. Mining and natural gas
D. Banking
Answer: C. Mining and natural gas

149.
True or False:
Vancouver is the capital of British Columbia.
Answer: False
(Victoria is the capital of British Columbia.)

150.
Multiple Choice:
Which BC region is most associated with winemaking?
A. Northern Interior
B. Cariboo
C. Vancouver Island
D. Okanagan Valley
Answer: D. Okanagan Valley

151.
True or False:
British Columbia was the first province to join Confederation.
Answer: False
(BC joined Confederation in 1871.)

152.
Multiple Choice:
Which transportation link is essential for BC’s trade with Asia?
A. Highway 401
B. Vancouver International Airport
C. Port of Vancouver
D. Canadian Pacific Railway
Answer: C. Port of Vancouver

153.
True or False:
British Columbia has a unicameral (single chamber) legislature.
Answer: True

154.
Multiple Choice:
What is the governing body of British Columbia’s education system called?
A. Canadian Education Board
B. Ministry of Advanced Education
C. Ministry of Education and Child Care
D. Senate Committee on Education
Answer: C. Ministry of Education and Child Care

155.
True or False:
BC has the smallest number of municipalities in Canada.
Answer: False
(BC has many municipalities, including cities, towns, and villages.)

156.
Multiple Choice:
Which major industry helped develop BC’s interior in the 19th century?
A. Oil
B. Coal
C. Gold mining
D. Timber
Answer: C. Gold mining

157.
True or False:
BC's Legislative Assembly is located in downtown Vancouver.
Answer: False
(The BC Legislature is located in Victoria.)

158.
Multiple Choice:
Which of the following is a protected marine area in BC?
A. Banff
B. Haida Gwaii Marine Reserve
C. Pacific Rim Trail
D. Jasper Marine Park
Answer: B. Haida Gwaii Marine Reserve

159.
True or False:
BC was the third province to join Canada after Confederation.
Answer: True

160.
Multiple Choice:
What term describes the local level of government in British Columbia?
A. Provincial Legislature
B. House of Commons
C. Municipal Government
D. Territorial Assembly
Answer: C. Municipal Government

161.
True or False:
The majority of British Columbia’s population lives in the Lower Mainland.
Answer: True

162.
Multiple Choice:
Which major international event was hosted in Vancouver and Whistler in 2010?
A. Commonwealth Games
B. FIFA World Cup
C. Winter Olympics
D. Summer Olympics
Answer: C. Winter Olympics

163.
True or False:
BC joined Confederation in 1871 after negotiating terms with the federal government.
Answer: True

164.
Multiple Choice:
Which ferry service connects Vancouver Island with the BC mainland?
A. Trans-Canada Ferries
B. MarineLink
C. BC Ferries
D. Island Connect
Answer: C. BC Ferries

165.
True or False:
Vancouver is landlocked and does not have a port.
Answer: False
(Vancouver is home to Canada’s largest port.)

166.
Multiple Choice:
Which BC-based university is known for research and located in Burnaby?
A. University of Victoria
B. Capilano University
C. Thompson Rivers University
D. Simon Fraser University
Answer: D. Simon Fraser University

167.
True or False:
The Fraser Valley is primarily known for its mining industry.
Answer: False
(The Fraser Valley is known for agriculture, not mining.)

168.
Multiple Choice:
What major island lies off the southwest coast of British Columbia?
A. Cape Breton Island
B. Vancouver Island
C. Anticosti Island
D. Baffin Island
Answer: B. Vancouver Island

169.
True or False:
BC's coast experiences a Mediterranean climate year-round.
Answer: False
(BC's coast has a temperate rainforest climate.)

170.
Multiple Choice:
Which mountain range lies between the BC Interior and the Pacific Coast?
A. Laurentians
B. Rockies
C. Coast Mountains
D. Appalachian Mountains
Answer: C. Coast Mountains

171.
True or False:
Forestry and tourism are key contributors to BC’s economy.
Answer: True

172.
Multiple Choice:
What is the name of the provincial holiday unique to British Columbia?
A. Victoria Day
B. BC Day
C. Confederation Day
D. Heritage Day
Answer: B. BC Day

173.
True or False:
BC Day is celebrated on the second Monday of August.
Answer: False
(BC Day is celebrated on the first Monday of August.)

174.
Multiple Choice:
What does the provincial flag of British Columbia represent?
A. Equality of all people
B. Maritime heritage and British roots
C. Unity of Canada
D. Natural beauty only
Answer: B. Maritime heritage and British roots

175.
True or False:
The BC Parliament buildings are located in Prince George.
Answer: False
(They are located in Victoria.)

176.
Multiple Choice:
What is a key industry in Northern British Columbia?
A. Finance
B. Manufacturing
C. Mining and forestry
D. Film production
Answer: C. Mining and forestry

177.
True or False:
BC has no border with the United States.
Answer: False
(BC borders Washington, Idaho, and Alaska.)

178.
Multiple Choice:
Which mountain in BC is a popular ski destination and hosted Winter Olympics events?
A. Grouse Mountain
B. Cypress Mountain
C. Whistler Mountain
D. Revelstoke
Answer: C. Whistler Mountain

179.
True or False:
The Columbia River flows from British Columbia into the United States.
Answer: True

180.
Multiple Choice:
Which Indigenous peoples are among the largest in BC?
A. Cree
B. Inuit
C. Coast Salish
D. Mohawk
Answer: C. Coast Salish

181.
True or False:
The Haida are an Indigenous group primarily based in southern British Columbia.
Answer: False
(The Haida are based in the northern region, particularly Haida Gwaii.)

182.
Multiple Choice:
What natural disaster is British Columbia particularly vulnerable to due to its position on tectonic plates?
A. Tornadoes
B. Hurricanes
C. Earthquakes
D. Wildfires
Answer: C. Earthquakes

183.
True or False:
British Columbia is part of the Pacific Ring of Fire.
Answer: True

184.
Multiple Choice:
Which ethnic group represents one of the largest visible minority populations in BC?
A. Latin American
B. Chinese
C. Arab
D. Portuguese
Answer: B. Chinese

185.
True or False:
Agriculture is the largest economic sector in British Columbia.
Answer: False
(While important, BC's largest sectors include services, film, and natural resources.)

186.
Multiple Choice:
Which region of BC is famous for its vineyards and fruit orchards?
A. Northern Interior
B. Kootenays
C. Vancouver Island
D. Okanagan
Answer: D. Okanagan

187.
True or False:
BC has Canada's only desert-like climate region.
Answer: True
(The South Okanagan has a semi-arid desert climate.)

188.
Multiple Choice:
Which city is home to the largest port in Canada?
A. Victoria
B. Vancouver
C. Prince Rupert
D. Kelowna
Answer: B. Vancouver

189.
True or False:
BC has no representation in the federal Parliament.
Answer: False
(BC elects Members of Parliament like all provinces.)

190.
Multiple Choice:
What body of water separates Vancouver Island from the BC mainland?
A. Bay of Fundy
B. Strait of Georgia
C. Hudson Bay
D. Gulf of St. Lawrence
Answer: B. Strait of Georgia

191.
True or False:
BC’s Legislative Assembly has over 100 members.
Answer: False
(As of 2025, the Legislative Assembly has 87 members.)

192.
Multiple Choice:
What is the name of the bridge connecting North Vancouver to downtown Vancouver?
A. Confederation Bridge
B. Peace Bridge
C. Lions Gate Bridge
D. Centennial Bridge
Answer: C. Lions Gate Bridge

193.
True or False:
Tourism is a declining industry in BC.
Answer: False
(Tourism remains a strong and growing sector in BC.)

194.
Multiple Choice:
Which BC city is a key northern port that facilitates trade with Asia?
A. Cranbrook
B. Prince George
C. Prince Rupert
D. Kamloops
Answer: C. Prince Rupert

195.
True or False:
BC’s forests are only privately owned.
Answer: False
(Much of BC’s forest land is Crown land managed by the province.)

196.
Multiple Choice:
Which of the following is a UNESCO World Heritage Site in British Columbia?
A. Mount Revelstoke
B. Yoho National Park
C. Gwaii Haanas
D. Pacific Spirit Park
Answer: C. Gwaii Haanas

197.
True or False:
BC has fewer than 100 provincial parks.
Answer: False
(BC has over 600 provincial parks.)

198.
Multiple Choice:
Which is the northernmost major city in British Columbia?
A. Fort St. John
B. Terrace
C. Prince George
D. Dawson Creek
Answer: A. Fort St. John

199.
True or False:
The Fraser River empties into the Pacific Ocean near Victoria.
Answer: False
(It empties into the Strait of Georgia near Vancouver.)

200.
Multiple Choice:
Which British Columbia industry is most linked with renewable energy development?
A. Fishing
B. Hydroelectric power
C. Forestry
D. Tourism
Answer: B. Hydroelectric power


201.
True or False:
British Columbia has two official languages: English and French.
Answer: False
(English is the main language; French is official federally but not provincially.)

202.
Multiple Choice:
Which BC national park is known for its hot springs and mountainous terrain?
A. Glacier National Park
B. Yoho National Park
C. Kootenay National Park
D. Jasper National Park
Answer: C. Kootenay National Park

203.
True or False:
The Parliament Buildings of BC are located in Victoria.
Answer: True

204.
Multiple Choice:
What is one of the main Indigenous groups of British Columbia?
A. Cree
B. Mi'kmaq
C. Haida
D. Innu
Answer: C. Haida

205.
True or False:
The Legislative Assembly of BC meets in Vancouver.
Answer: False
(It meets in the capital, Victoria.)

206.
Multiple Choice:
Which mountain range runs along the eastern border of British Columbia?
A. Laurentians
B. Appalachians
C. Rocky Mountains
D. Coastal Range
Answer: C. Rocky Mountains

207.
True or False:
BC Day is a statutory holiday celebrated only in BC.
Answer: True
(BC Day is a provincial holiday celebrated on the first Monday in August.)

208.
Multiple Choice:
Which large island is located off the southwest coast of British Columbia?
A. Cape Breton Island
B. Vancouver Island
C. Baffin Island
D. Manitoulin Island
Answer: B. Vancouver Island

209.
True or False:
All BC residents must speak both English and French.
Answer: False
(English is the main language; bilingualism is not required.)

210.
Multiple Choice:
Which industry is most associated with BC’s Columbia River region?
A. Diamond mining
B. Hydroelectric power
C. Cattle farming
D. Aerospace
Answer: B. Hydroelectric power

211.
True or False:
The BC provincial flag includes elements of the Union Jack and a setting sun.
Answer: True

212.
Multiple Choice:
What is the approximate population of British Columbia as of 2025?
A. 2 million
B. 3.5 million
C. 5.5 million
D. 7.2 million
Answer: C. 5.5 million

213.
True or False:
The Lieutenant Governor of BC is elected by the public.
Answer: False
(The Lieutenant Governor is appointed by the Governor General.)

214.
Multiple Choice:
What is the term used for a Member of the Legislative Assembly in British Columbia?
A. MP
B. MLA
C. MPP
D. Senator
Answer: B. MLA

215.
True or False:
BC's economy is heavily dependent on fishing and mining only.
Answer: False
(BC’s economy is diverse, including tech, film, forestry, and tourism.)

216.
Multiple Choice:
Which cultural event in Vancouver celebrates Asian heritage?
A. Oktoberfest
B. LunarFest
C. Caribana
D. CelticFest
Answer: B. LunarFest

217.
True or False:
BC’s film industry is often referred to as 'Hollywood North'.
Answer: True

218.
Multiple Choice:
Which river is the longest entirely within British Columbia?
A. Columbia River
B. Skeena River
C. Peace River
D. Fraser River
Answer: D. Fraser River

219.
True or False:
The Pacific Ocean borders BC to the east.
Answer: False
(The Pacific Ocean borders BC to the west.)

220.
Multiple Choice:
Which BC municipality is known for its technology industry?
A. Burnaby
B. Kelowna
C. Surrey
D. Victoria
Answer: D. Victoria

221.
True or False:
Whistler, BC hosted the Summer Olympics in 2010.
Answer: False
(Whistler co-hosted the 2010 Winter Olympics.)

222.
Multiple Choice:
Which British Columbia city is nicknamed the 'Gateway to the North'?
A. Abbotsford
B. Prince George
C. Kamloops
D. Nanaimo
Answer: B. Prince George

223.
True or False:
All provincial laws in BC must be approved by the federal Senate.
Answer: False
(Provincial laws are passed by the BC Legislature, not the federal Senate.)

224.
Multiple Choice:
What geographic feature is the Gulf Islands region known for?
A. Desert landscapes
B. Dense forests
C. Rolling prairie
D. Coastal archipelagos
Answer: D. Coastal archipelagos

225.
True or False:
BC's education system is entirely managed by the federal government.
Answer: False
(Education is a provincial responsibility.)

226.
Multiple Choice:
Which BC valley is a major agricultural hub?
A. Fraser Valley
B. Bow Valley
C. Red River Valley
D. Ottawa Valley
Answer: A. Fraser Valley

227.
True or False:
BC’s Provincial Court handles minor traffic offenses only.
Answer: False
(It handles many areas including family, small claims, and criminal matters.)

228.
Multiple Choice:
Which popular ferry service connects Vancouver to Victoria?
A. Canadian Steamship Lines
B. WestJet Ferries
C. BC Ferries
D. North Shore Ferries
Answer: C. BC Ferries

229.
True or False:
The Coastal Mountains are part of the Canadian Shield.
Answer: False
(The Coastal Mountains are not part of the Canadian Shield.)

230.
Multiple Choice:
Who represents the King in British Columbia?
A. Premier
B. Lieutenant Governor
C. Speaker of the Assembly
D. Attorney General
Answer: B. Lieutenant Governor

231.
True or False:
British Columbia became a province in 1905.
Answer: False
(British Columbia joined Confederation in 1871.)

232.
Multiple Choice:
Which large BC lake is near the city of Kelowna?
A. Great Slave Lake
B. Okanagan Lake
C. Lake Louise
D. Kootenay Lake
Answer: B. Okanagan Lake

233.
True or False:
The City of Vancouver is the capital of BC.
Answer: False
(Victoria is the capital city of British Columbia.)

234.
Multiple Choice:
Which industry in BC benefits most from forest management policies?
A. Shipbuilding
B. Education
C. Forestry
D. Biotechnology
Answer: C. Forestry

235.
True or False:
BC is the only province on the Pacific Ocean.
Answer: True

236.
Multiple Choice:
Which BC location is considered a world-class ski destination?
A. Victoria
B. Whistler
C. Kelowna
D. Prince Rupert
Answer: B. Whistler

237.
True or False:
All BC residents are automatically eligible for federal government services.
Answer: True

238.
Multiple Choice:
Which of the following is a natural hazard in BC?
A. Tsunamis
B. Blizzards
C. Sandstorms
D. Droughts
Answer: A. Tsunamis

239.
True or False:
Logging in BC is no longer regulated.
Answer: False
(Forestry in BC is regulated to support sustainability.)

240.
Multiple Choice:
What is the main export from BC’s ports?
A. Crude oil
B. Lumber and forest products
C. Automobiles
D. Seafood
Answer: B. Lumber and forest products

241.
True or False:
The BC Legislature is unicameral.
Answer: True
(BC has a single legislative chamber.)

242.
Multiple Choice:
Which one is regarded as the BC’s provincial police service?
A. BC Provincial Police
B. RCMP
C. Vancouver Police
D. West Coast Patrol
Answer: B. RCMP

243.
True or False:
The RCMP provides policing services in many BC communities.
Answer: True

244.
Multiple Choice:
Which economic sector is most significant in BC's Lower Mainland?
A. Agriculture
B. Forestry
C. Technology and services
D. Oil and gas
Answer: C. Technology and services

245.
True or False:
Metro Vancouver is the smallest metropolitan region in Canada.
Answer: False
(Metro Vancouver is one of the largest urban regions in Canada.)

246.
Multiple Choice:
Which BC community is known for its vibrant Punjabi and South Asian population?
A. Kamloops
B. Surrey
C. Cranbrook
D. Fort St. John
Answer: B. Surrey

247.
True or False:
Surrey is one of the fastest growing cities in British Columbia.
Answer: True

248.
Multiple Choice:
What is a key reason why many immigrants settle in British Columbia?
A. Harsh climate
B. Low taxes
C. Diverse communities and economic opportunity
D. Minimal services
Answer: C. Diverse communities and economic opportunity

249.
True or False:
British Columbia has no immigration settlement services.
Answer: False
(BC provides a wide range of immigrant settlement services.)

250.
Multiple Choice:
Which British Columbia port is among the busiest in North America?
A. Port Hardy
B. Port Alberni
C. Port of Vancouver
D. Port Renfrew
Answer: C. Port of Vancouver

251.
True or False:
The Port of Vancouver supports global trade for BC and Canada.
Answer: True

252.
Multiple Choice:
Which university is located in Burnaby, BC?
A. University of Victoria
B. University of British Columbia
C. Thompson Rivers University
D. Simon Fraser University
Answer: D. Simon Fraser University

253.
True or False:
SFU is one of British Columbia’s major research universities.
Answer: True

254.
Multiple Choice:
What natural event poses a potential risk to southwestern BC?
A. Tornadoes
B. Volcanic eruptions
C. Earthquakes
D. Hurricanes
Answer: C. Earthquakes

255.
True or False:
British Columbia has earthquake preparedness programs.
Answer: True

256.
Multiple Choice:
What treaty process is ongoing in BC to resolve Indigenous land claims?
A. Meech Lake Accord
B. BC Treaty Process
C. Manitoba Act
D. Indian Act
Answer: B. BC Treaty Process

257.
True or False:
Many First Nations in BC are involved in self-government negotiations.
Answer: True

258.
Multiple Choice:
Which BC city hosted Expo 86?
A. Kelowna
B. Vancouver
C. Nanaimo
D. Victoria
Answer: B. Vancouver

259.
True or False:
Expo 86 showcased innovations and transportation technology.
Answer: True

260.
Multiple Choice:
Which BC city is home to the Pacific National Exhibition (PNE)?
A. Abbotsford
B. Kamloops
C. Vancouver
D. Vernon
Answer: C. Vancouver

261.
True or False:
The PNE is a major cultural and entertainment event in BC.
Answer: True

262.
Multiple Choice:
Which BC river is most known for salmon spawning?
A. Kootenay River
B. Columbia River
C. Fraser River
D. Skeena River
Answer: C. Fraser River

263.
True or False:
The Fraser River is vital to BC’s salmon ecosystem.
Answer: True

264.
Multiple Choice:
Which natural resource industry is strongest in Northern British Columbia?
A. Oil and gas
B. Software development
C. Finance
D. Aerospace
Answer: A. Oil and gas

265.
True or False:
Northern BC contributes to Canada’s energy production.
Answer: True

266.
Multiple Choice:
Which body of water lies between Vancouver Island and the mainland of BC?
A. Strait of Georgia
B. Hudson Bay
C. Lake Superior
D. Pacific Ocean
Answer: A. Strait of Georgia

267.
True or False:
The Strait of Georgia separates Vancouver Island from the mainland.
Answer: True

268.
Multiple Choice:
What is the name of the legislature in British Columbia?
A. Legislative Assembly of Canada
B. BC Legislative Assembly
C. Parliament of BC
D. Provincial Congress
Answer: B. BC Legislative Assembly

269.
True or False:
The BC Legislative Assembly is located in Victoria.
Answer: True

270.
Multiple Choice:
Which industry is dominant in the central interior region of British Columbia?
A. Forestry
B. Shipbuilding
C. Agriculture
D. Aerospace
Answer: A. Forestry

271.
True or False:
Forestry is a vital part of BC’s economy and exports.
Answer: True

272.
Multiple Choice:
Which famous ski resort is located north of Vancouver?
A. Cypress Mountain
B. Big White
C. Sun Peaks
D. Whistler Blackcomb
Answer: D. Whistler Blackcomb

273.
True or False:
Whistler co-hosted the 2010 Winter Olympics with Vancouver.
Answer: True

274.
Multiple Choice:
Which organization oversees provincial parks in British Columbia?
A. Parks Canada
B. BC Parks
C. Canada Parks Authority
D. Pacific Wilderness Board
Answer: B. BC Parks

275.
True or False:
BC has one of the largest provincial park systems in North America.
Answer: True

276.
Multiple Choice:
What does the Pacific Rim National Park Reserve protect?
A. Urban parks
B. Arctic wildlife
C. Coastal rainforests and marine ecosystems
D. Prairie lands
Answer: C. Coastal rainforests and marine ecosystems

277.
True or False:
Pacific Rim National Park Reserve is located on Vancouver Island.
Answer: True

278.
Multiple Choice:
What is a common renewable energy source used in BC?
A. Nuclear
B. Wind
C. Coal
D. Hydro power
Answer: D. Hydro power

279.
True or False:
BC produces most of its electricity from hydroelectric sources.
Answer: True

280.
Multiple Choice:
Which provincial ministry handles Indigenous relations in BC?
A. Ministry of Citizenship and Immigration
B. Ministry of Environment
C. Ministry of Indigenous Relations and Reconciliation
D. Ministry of Crown Affairs
Answer: C. Ministry of Indigenous Relations and Reconciliation

281.
True or False:
Reconciliation with Indigenous peoples is an ongoing priority in BC.
Answer: True

282.
Multiple Choice:
Which city is a major port and trade hub on Vancouver Island?
A. Victoria
B. Courtenay
C. Nanaimo
D. Duncan
Answer: C. Nanaimo

283.
True or False:
Nanaimo plays a key role in coastal BC’s economy.
Answer: True

284.
Multiple Choice:
Which region of BC is known for wine production?
A. Kootenay
B. Thompson
C. Okanagan Valley
D. Cariboo
Answer: C. Okanagan Valley

285.
True or False:
The Okanagan Valley is one of Canada’s leading wine regions.
Answer: True

286.
Multiple Choice:
What is the city of British Columbia?
A. Surrey
B. Victoria
C. Vancouver
D. Kelowna
Answer: B. Victoria

287.
True or False:
Victoria is located on Vancouver Island.
Answer: True

288.
Multiple Choice:
Which Indigenous group has historic roots in Haida Gwaii?
A. Cree
B. Innu
C. Haida
D. Dene
Answer: C. Haida

289.
True or False:
The Haida Nation has rich artistic and cultural traditions.
Answer: True

290.
Multiple Choice:
Which BC city is home to the University of British Columbia's main campus?
A. Surrey
B. Vancouver
C. Burnaby
D. Victoria
Answer: B. Vancouver

291.
True or False:
UBC's main campus is located in Vancouver.
Answer: True

292.
Multiple Choice:
Which area of BC is known for its heavy rainfall and temperate rainforest?
A. Okanagan
B. Coastal Mountains
C. Cariboo
D. Peace River
Answer: B. Coastal Mountains

293.
True or False:
The Coastal Mountains of BC are part of a temperate rainforest zone.
Answer: True

294.
Multiple Choice:
What is BC’s official motto?
A. From Sea to Sea
B. Splendor Without Diminishment
C. Strong and Free
D. Faith and Progress
Answer: B. Splendor Without Diminishment

295.
True or False:
'Splendor Without Diminishment' is the official motto of British Columbia.
Answer: True

296.
Multiple Choice:
What major ferry service connects Vancouver Island to the BC mainland?
A. Island Ferries
B. Pacific Ferry Line
C. BC Ferries
D. Coastal Express
Answer: C. BC Ferries

297.
True or False:
BC Ferries operates between Vancouver Island and the mainland.
Answer: True

298.
Multiple Choice:
Which city in BC is known for its multiculturalism and is one of Canada’s largest cities?
A. Kelowna
B. Vancouver
C. Kamloops
D. Prince George
Answer: B. Vancouver

299.
True or False:
Vancouver is one of Canada’s most diverse cities.
Answer: True

300.
Multiple Choice:
Which mountain range lies along the eastern border of British Columbia?
A. Appalachian Mountains
B. Rockies
C. Laurentians
D. Coastal Range
Answer: B. Rockies


301.
True or False:
The Rocky Mountains form the eastern border of BC.
Answer: True

302.
Multiple Choice:
Which BC town is famous for its hot springs and is located near the Rocky Mountains?
A. Smithers
B. Tofino
C. Harrison
D. Radium
Answer: D. Radium

303.
True or False:
Radium Hot Springs is located near the Rocky Mountains in BC.
Answer: True

304.
Multiple Choice:
Which river runs through most of southern British Columbia?
A. Yukon River
B. St. Lawrence River
C. Fraser River
D. Columbia River
Answer: C. Fraser River

305.
True or False:
The Fraser River is one of BC’s longest and most important rivers.
Answer: True

306.
Multiple Choice:
Which sport did British Columbia co-host in the 2010 Olympics?
A. Summer Olympics
B. Winter Olympics
C. Commonwealth Games
D. Pan-Am Games
Answer: B. Winter Olympics

307.
True or False:
The 2010 Winter Olympics were co-hosted by Vancouver and Whistler.
Answer: True

308.
Multiple Choice:
Which organization is responsible for public education in British Columbia?
A. BC School Authority
B. BC Ministry of Education and Child Care
C. BC Board of Learning
D. Provincial Education Council
Answer: B. BC Ministry of Education and Child Care

309.
True or False:
The BC Ministry of Education and Child Care oversees public schooling.
Answer: True

310.
Multiple Choice:
Which BC city is located at the confluence of the Thompson and Fraser Rivers?
A. Vernon
B. Abbotsford
C. Kamloops
D. Quesnel
Answer: C. Kamloops

311.
True or False:
Kamloops is located at the junction of the Thompson and Fraser Rivers.
Answer: True

312.
Multiple Choice:
Which region of BC is most associated with ranching and cattle farming?
A. Vancouver Island
B. Cariboo
C. Columbia Basin
D. North Coast
Answer: B. Cariboo

313.
True or False:
The Cariboo region has a long history of ranching and cattle farming.
Answer: True

314.
Multiple Choice:
Which treaty process involves Indigenous groups and the government in BC?
A. Confederation Agreement
B. BC Treaty Process
C. Peace of the Pacific
D. Constitution Accords
Answer: B. BC Treaty Process

315.
True or False:
The BC Treaty Process aims to reach agreements with Indigenous peoples.
Answer: True

316.
Multiple Choice:
What is an important industry in British Columbia?
A. Aerospace
B. Forestry
C. Automobiles
D. Textiles
Answer: B. Forestry

317.
True or False:
British Columbia is a landlocked province.
Answer: False
(BC is located on the Pacific coast, not landlocked.)

318.
True or False:
Stanley Park in Vancouver is larger than New York's Central Park.
Answer: True
(Stanley Park is about 405 hectares, larger than Central Park's 341 hectares.)

319.
Multiple Choice:
Which BC lake is one of the warmest in Canada and located in the Okanagan Valley?
A. Shuswap Lake
B. Osoyoos Lake
C. Harrison Lake
D. Kootenay Lake
Answer: B. Osoyoos Lake

320.
True or False:
The BC Lions are a professional ice hockey team.
Answer: False
(The BC Lions are a Canadian Football League team.)

321.
Multiple Choice:
Which BC island group includes Salt Spring, Galiano, and Mayne Islands?
A. Discovery Islands
B. Northern Archipelago
C. Gulf Islands
D. Southern Islets
Answer: C. Gulf Islands

322.
True or False:
Mount Robson is the highest peak in the Canadian Rockies.
Answer: True
(Mount Robson, in BC, rises 3,954 meters above sea level.)

323.
Multiple Choice:
Which BC city hosts the annual Celebration of Light fireworks competition?
A. Vancouver
B. Victoria
C. Kelowna
D. Nanaimo
Answer: A. Vancouver

324.
True or False:
The Royal BC Museum is located in Victoria.
Answer: True
(The museum showcases BC's human and natural history.)

325.
Multiple Choice:
Which BC river is famous for gold rush history in the 19th century?
A. Columbia River
B. Skeena River
C. Peace River
D. Fraser River
Answer: D. Fraser River

326.
True or False:
BC’s Pacific Rim National Park Reserve includes Long Beach.
Answer: True
(Long Beach is a popular surfing destination in Pacific Rim National Park Reserve.)

327.
Multiple Choice:
Which BC airport is the second busiest in the province after Vancouver International?
A. Kelowna International Airport
B. Prince George Airport
C. Victoria International Airport
D. Kamloops Airport
Answer: C. Victoria International Airport

328.
True or False:
The Totem Poles in Stanley Park are among the most visited attractions in BC.
Answer: True
(The collection represents Indigenous art and culture from BC's First Nations.)

329.
Multiple Choice:
Which BC town is known as the 'Surfing Capital of Canada'?
A. Ucluelet
B. Tofino
C. Prince Rupert
D. Kitimat
Answer: B. Tofino

330.
True or False:
BC has an official tartan pattern.
Answer: True
(The BC tartan was officially adopted in 1974.)

331.
Multiple Choice:
Which BC bay was the site of a historic naval base and is now a National Historic Site?
A. Esquimalt Harbour
B. Burrard Inlet
C. Howe Sound
D. Nootka Sound
Answer: A. Esquimalt Harbour

332.
True or False:
The Sea-to-Sky Highway runs from Vancouver to Whistler.
Answer: True
(Highway 99 is known as the Sea-to-Sky Highway for its scenic coastal route.)

333.
Multiple Choice:
Which BC waterfall is one of the highest in Canada at 481 meters?
A. Helmcken Falls
B. Brandywine Falls
C. Della Falls
D. Hunlen Falls
Answer: C. Della Falls

334.
True or False:
BC produces the majority of Canada’s blueberries.
Answer: True
(BC is the largest highbush blueberry growing region in Canada.)

335.
Multiple Choice:
Which BC town is famous for its historic gold mining Barkerville site?
A. Nelson
B. Quesnel
C. Fort St. James
D. Barkerville
Answer: D. Barkerville

336.
True or False:
Kootenay National Park is entirely located within British Columbia.
Answer: True
(It is one of seven national parks in BC.)

337.
Multiple Choice:
Which BC lake is known for its unique 'spotted' appearance caused by mineral deposits?
A. Harrison Lake
B. Spotted Lake
C. Okanagan Lake
D. Shuswap Lake
Answer: B. Spotted Lake

338.
True or False:
The Vancouver Canucks play in the National Hockey League (NHL).
Answer: True
(The Canucks are BC’s professional NHL hockey team, based in Vancouver.)

339.
Multiple Choice:
Which BC town is home to the historic Kettle Valley Steam Railway?
A. Penticton
B. Summerland
C. Merritt
D. Trail
Answer: B. Summerland

340.
True or False:
The Peace Arch stands on the border between BC and Washington State.
Answer: True
(The Peace Arch is an international monument symbolizing peace between Canada and the USA.)

341.
Multiple Choice:
Which BC mountain is in Yoho National Park and is famous for its Burgess Shale fossils?
A. Mount Robson
B. Mount Seymour
C. Mount Wapta
D. Mount Garibaldi
Answer: C. Mount Wapta

342.
True or False:
Granville Island in Vancouver is known for its public market and arts community.
Answer: True
(Granville Island is a cultural district with shops, theaters, and a famous public market.)

343.
Multiple Choice:
Which BC glacier-fed lake is known for its bright turquoise color?
A. Okanagan Lake
B. Garibaldi Lake
C. Harrison Lake
D. Atlin Lake
Answer: B. Garibaldi Lake

344.
True or False:
The town of Revelstoke is famous for its ski resort and mountain biking trails.
Answer: True
(Revelstoke Mountain Resort offers some of the longest vertical drops in North America.)

345.
Multiple Choice:
Which BC city is home to the oldest Chinatown in Canada?
A. Victoria
B. Vancouver
C. Nanaimo
D. Kamloops
Answer: A. Victoria

346.
True or False:
Barkerville Historic Town is a preserved gold rush town in BC’s Cariboo region.
Answer: True
(Barkerville is now a living history museum showcasing life in the 1860s.)

347.
Multiple Choice:
Which BC provincial park is home to Helmcken Falls?
A. Garibaldi Provincial Park
B. Mount Robson Provincial Park
C. Wells Gray Provincial Park
D. Yoho National Park
Answer: C. Wells Gray Provincial Park

348.
True or False:
The BC Parliament Buildings are lit up with thousands of lights at night.
Answer: True
(The lights on the Parliament Buildings in Victoria are a well-known attraction.)

349.
Multiple Choice:
Which BC community is nicknamed the “City of Totems”?
A. Smithers
B. Duncan
C. Terrace
D. Fort St. James
Answer: B. Duncan

350.
True or False:
Howe Sound is a fjord located northwest of Vancouver.
Answer: True
(Howe Sound is a network of fjords and islands connected to the Strait of Georgia.)

351.
Multiple Choice:
Which BC wildlife reserve is known for grizzly bear viewing in the Great Bear Rainforest?
A. Khutzeymateen Grizzly Bear Sanctuary
B. Tweedsmuir Park
C. Gwaii Haanas
D. Garibaldi Park
Answer: A. Khutzeymateen Grizzly Bear Sanctuary

352.
True or False:
The City of Nelson is known for its heritage buildings and arts scene.
Answer: True
(Nelson has over 350 preserved heritage buildings and a vibrant cultural community.)

353.
Multiple Choice:
Which BC island is accessible only by boat or floatplane and is known for its artist community?
A. Bowen Island
B. Mayne Island
C. Cortes Island
D. Savary Island
Answer: C. Cortes Island

354.
True or False:
The Pacific Great Eastern Railway was the original name of BC Rail.
Answer: True
(BC Rail was known as the Pacific Great Eastern Railway until 1972.)

355.
Multiple Choice:
Which BC ski resort is located on Mount Washington?
A. Big White
B. Mount Washington Alpine Resort
C. Sun Peaks
D. Red Mountain
Answer: B. Mount Washington Alpine Resort

356.
True or False:
The Fraser Canyon is a deep gorge carved by the Fraser River.
Answer: True
(The Fraser Canyon is known for its dramatic landscapes and Hell’s Gate rapids.)

357.
Multiple Choice:
Which BC city is famous for its murals festival held every summer?
A. Nelson
B. Prince George
C. Kelowna
D. Penticton
Answer: A. Nelson

358.
True or False:
Okanagan Lake is rumored to be home to a mythical creature called Ogopogo.
Answer: True
(The Ogopogo legend is a famous part of Okanagan Valley folklore.)

359.
Multiple Choice:
Which BC city is home to the University of Northern British Columbia?
A. Kamloops
B. Terrace
C. Prince George
D. Dawson Creek
Answer: C. Prince George

360.
True or False:
The Comox Valley on Vancouver Island is known for agriculture and seafood.
Answer: True
(The Comox Valley produces dairy, vegetables, and is famous for shellfish farming.)

361.
Multiple Choice:
Which BC bridge connects West Vancouver to Stanley Park?
A. Lions Gate Bridge
B. Burrard Bridge
C. Ironworkers Memorial Bridge
D. Cambie Bridge
Answer: A. Lions Gate Bridge

362.
True or False:
BC’s legislative building features a statue of Queen Victoria.
Answer: True
(The statue honors the monarch after whom the capital city is named.)

363.
Multiple Choice:
Which BC national park is known for the Burgess Shale fossil beds?
A. Kootenay National Park
B. Glacier National Park
C. Pacific Rim National Park Reserve
D. Yoho National Park
Answer: D. Yoho National Park

364.
True or False:
BC is Canada’s leading producer of farmed salmon.
Answer: True
(The province’s aquaculture industry is centered along the coast and on Vancouver Island.)

365.
Multiple Choice:
Which BC ferry route connects Horseshoe Bay to Nanaimo?
A. Swartz Bay route
B. Duke Point route
C. Departure Bay route
D. Tsawwassen route
Answer: C. Departure Bay route

366.
True or False:
Garibaldi Provincial Park is named after an Italian explorer.
Answer: True
(The park is named after Giuseppe Garibaldi, a 19th-century Italian general.)

367.
Multiple Choice:
Which BC city is nicknamed “The Tournament Capital of Canada” for its many sports events?
A. Kelowna
B. Kamloops
C. Abbotsford
D. Victoria
Answer: B. Kamloops

368.
True or False:
BC’s Inside Passage is a famous coastal shipping route.
Answer: True
(It runs between Vancouver Island and the mainland, sheltered from the Pacific.)

369.
Multiple Choice:
Which BC lighthouse is the oldest still in operation?
A. Pachena Point Lighthouse
B. Point Atkinson Lighthouse
C. Trial Island Lighthouse
D. Fisgard Lighthouse
Answer: D. Fisgard Lighthouse

370.
True or False:
The Capilano River feeds into Burrard Inlet.
Answer: True
(It flows from the North Shore Mountains into Burrard Inlet near Lions Gate Bridge.)

371.
Multiple Choice:
Which BC mountain is part of the Cascade Range?
A. Mount Garibaldi
B. Mount Robson
C. Mount Seymour
D. Black Tusk
Answer: A. Mount Garibaldi

372.
True or False:
The town of Hope is considered the gateway to the Fraser Canyon.
Answer: True
(Hope is the entry point to the scenic Fraser Canyon route northward.)

373.
Multiple Choice:
Which BC wine region is located near Penticton?
A. Cowichan Valley
B. Naramata Bench
C. Fraser Valley
D. Similkameen Valley
Answer: B. Naramata Bench

374.
True or False:
BC Hydro is the main supplier of electricity in British Columbia.
Answer: True
(BC Hydro provides most of the province’s power, primarily from hydroelectric plants.)

375.
Multiple Choice:
Which BC provincial park protects the highest waterfall in Canada?
A. Mount Robson Provincial Park
B. Wells Gray Provincial Park
C. Tweedsmuir Provincial Park
D. Strathcona Provincial Park
Answer: B. Wells Gray Provincial Park

376.
True or False:
The Gulf Islands are located between Vancouver Island and the BC mainland.
Answer: True
(This group of islands lies in the Strait of Georgia.)

377.
Multiple Choice:
Which BC city is known for its Penticton Peach Festival?
A. Penticton
B. Kelowna
C. Vernon
D. Summerland
Answer: A. Penticton

378.
True or False:
The Skeena River is known as the “River of Mists.”
Answer: True
(The Skeena River in northwestern BC gets this nickname from the frequent coastal fog and mist.)

379.
Multiple Choice:
Which BC ski resort is located in the Kootenay Rockies and is one of the oldest in North America?
A. Big White
B. Sun Peaks
C. Red Mountain Resort
D. Mount Washington
Answer: C. Red Mountain Resort

380.
True or False:
The Tsawwassen Ferry Terminal connects BC to the Southern Gulf Islands.
Answer: True
(It provides service to Swartz Bay, Duke Point, and the Southern Gulf Islands.)

381.
Multiple Choice:
Which BC city is home to the largest public outdoor swimming pool in Canada?
A. Victoria
B. Vancouver
C. Kelowna
D. Kamloops
Answer: B. Vancouver

382.
True or False:
Haida Gwaii is located closer to Alaska than to Vancouver.
Answer: True
(The islands are in BC’s northwest, near the Alaskan Panhandle.)

383.
Multiple Choice:
Which BC valley is famous for apple orchards and cider production?
A. Fraser Valley
B. Cowichan Valley
C. Naramata Bench
D. Similkameen Valley
Answer: D. Similkameen Valley

384.
True or False:
The Pacific Rim Highway connects Tofino and Ucluelet to the rest of Vancouver Island.
Answer: True
(Highway 4 is the only road link to Tofino and Ucluelet.)

385.
Multiple Choice:
Which BC provincial park contains the unique volcanic formation known as the Black Tusk?
A. Wells Gray Provincial Park
B. Tweedsmuir Provincial Park
C. Garibaldi Provincial Park
D. Strathcona Provincial Park
Answer: C. Garibaldi Provincial Park

386.
True or False:
The Fraser River is the longest river entirely within British Columbia.
Answer: True
(It flows over 1,300 km from the Rockies to the Strait of Georgia.)

387.
Multiple Choice:
Which BC city is known for its annual Dragon Boat Festival?
A. Victoria
B. Vancouver
C. Kelowna
D. Nanaimo
Answer: B. Vancouver

388.
True or False:
The town of Whistler was originally called Alta Lake.
Answer: True
(The name changed to Whistler in the 1960s, inspired by the whistling marmots in the area.)

389.
Multiple Choice:
Which BC island is famous for its sandstone caves and artist community?
A. Gabriola Island
B. Quadra Island
C. Hornby Island
D. Savary Island
Answer: A. Gabriola Island

390.
True or False:
The Cowichan Valley is known for producing award-winning wines.
Answer: True
(The valley’s climate supports vineyards and wineries recognized internationally.)

391.
Multiple Choice:
Which BC mountain is the highest on Vancouver Island?
A. Mount Arrowsmith
B. Mount Washington
C. Golden Hinde
D. Mount Cain
Answer: C. Golden Hinde

392.
True or False:
The Skeena River empties into the Pacific Ocean at Prince Rupert.
Answer: True
(It flows from the Interior through Terrace and into the ocean at Prince Rupert.)

393.
Multiple Choice:
Which BC provincial park is known for hot mineral springs and grizzly bears?
A. Wells Gray Provincial Park
B. Liard River Hot Springs Provincial Park
C. Garibaldi Provincial Park
D. Mount Robson Provincial Park
Answer: B. Liard River Hot Springs Provincial Park

394.
True or False:
BC is home to more than 40% of Canada’s glaciers.
Answer: True
(Many are located in the Coast and Columbia Mountains.)

395.
Multiple Choice:
Which BC port city is Canada’s gateway to the Pacific for container shipping?
A. Vancouver
B. Prince Rupert
C. Nanaimo
D. Kitimat
Answer: A. Vancouver

396.
True or False:
The city of Kelowna is located on the shores of Shuswap Lake.
Answer: False
(Kelowna is on Okanagan Lake; Shuswap Lake is further north near Salmon Arm.)

397.
Multiple Choice:
Which BC national park is located entirely on an island?
A. Pacific Rim National Park Reserve
B. Yoho National Park
C. Gulf Islands National Park Reserve
D. Kootenay National Park
Answer: C. Gulf Islands National Park Reserve

398.
True or False:
Horseshoe Bay is a major BC Ferries terminal.
Answer: True
(It connects to Nanaimo, the Sunshine Coast, and the Gulf Islands.)

399.
Multiple Choice:
Which BC city hosted the 1994 Commonwealth Games?
A. Kelowna
B. Kamloops
C. Prince George
D. Victoria
Answer: D. Victoria

400.
True or False:
The city of Trail is known for its smelting and metallurgical industry.
Answer: True
(Trail has one of the largest lead and zinc smelters in the world.)
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
            $totalQuestions = count($matches);
            $this->command->info("Regex matched {$totalQuestions} raw question blocks");
            $expected = range(1, 400); // or whatever total you expect
            $foundNumbers = [];
            foreach ($matches as $match) {
    // Extract question number
    $questionNumber = (int) $match[1];
    $foundNumbers[] = $questionNumber;

    $this->command->info("✅ Matched question #{$questionNumber}");
}$missing = array_diff($expected, $foundNumbers);
if (!empty($missing)) {
    $this->command->warn("⚠ Missing questions: " . implode(', ', $missing));
}
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for British Columbia.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for British Columbia.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $britishColumbia->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded British Columbia citizenship questions.");
    }
}
