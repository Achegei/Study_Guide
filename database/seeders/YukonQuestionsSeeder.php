<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YukonQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $yukon = CourseSection::firstOrCreate(
            ['title' => 'Yukon'],
            [
                'type' => 'territory',
                'capital' => 'Whitehorse',
                'flag' => '/images/flags/yukon.png',
                'description' => 'Questions specific to Yukon.',
                'summary_audio_url' => '/audio/summary_yukon.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $yukon->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
What is the capital city of Yukon?
A. Dawson City
B. Watson Lake
C. Whitehorse
D. Haines Junction
Answer: C. Whitehorse

2.
True or False:
Yukon became a territory in 1898 as a result of the Klondike Gold Rush.
Answer: True

3.
Multiple Choice:
Which river runs through Whitehorse, Yukon?
A. Mackenzie River
B. Yukon River
C. Columbia River
D. Fraser River
Answer: B. Yukon River

4.
True or False:
The Yukon River originates in Alberta.
Answer: False
(The Yukon River originates in British Columbia.)

5.
Multiple Choice:
Which Indigenous Peoples have traditional territories in Yukon?
A. Mohawk and Mi’kmaq
B. Inuit and Innu
C. First Nations
D. Métis and Acadians
Answer: C. First Nations

6.
True or False:
There are no First Nations communities in Yukon.
Answer: False
(Yukon has many First Nations communities.)

7.
Multiple Choice:
What is a major historical event that contributed to Yukon’s development?
A. Canadian Pacific Railway construction
B. War of 1812
C. Klondike Gold Rush
D. Confederation debates
Answer: C. Klondike Gold Rush

8.
True or False:
The Klondike Gold Rush began in the early 1900s.
Answer: False
(The Klondike Gold Rush began in 1896.)

9.
Multiple Choice:
What is the name of the famous trail used during the Gold Rush?
A. Kicking Horse Pass
B. West Coast Trail
C. Chilkoot Trail
D. Banff Trail
Answer: C. Chilkoot Trail

10.
True or False:
Dawson City was once the capital of Yukon.
Answer: True

11.
Multiple Choice:
Which level of government handles territorial matters in Yukon?
A. Federal only
B. Territorial government
C. Provincial assembly
D. United Nations
Answer: B. Territorial government

12.
True or False:
Yukon has a Premier and its own legislative assembly.
Answer: True

13.
Multiple Choice:
As of 2025, who is the Premier of Yukon?
A. Sandy Silver
B. Ranj Pillai
C. Wab Kinew
D. Caroline Cochrane
Answer: B. Ranj Pillai

14.
True or False:
The Premier of Yukon is federally appointed.
Answer: False
(The Premier is the leader of the party that forms the government and is selected by elected members of the Legislative Assembly.)

15.
Multiple Choice:
How many electoral districts (ridings) are there in Yukon’s Legislative Assembly?
A. 10
B. 19
C. 25
D. 5
Answer: B. 19

16.
True or False:
Yukon sends more than one Member of Parliament (MP) to the federal government.
Answer: False
(Yukon sends one Member of Parliament to the House of Commons.)

17.
Multiple Choice:
What is the main industry in Yukon today?
A. Agriculture
B. Technology
C. Mining
D. Shipping
Answer: C. Mining

18.
True or False:
Tourism and mining are both important economic sectors in Yukon.
Answer: True

19.
Multiple Choice:
Which natural feature is located in Yukon?
A. Mount Logan
B. Mount Robson
C. Lake Louise
D. Gros Morne
Answer: A. Mount Logan

20.
True or False:
Mount Logan is the highest peak in Canada.
Answer: True

21.
Multiple Choice:
Which national park is located in Yukon?
A. Jasper National Park
B. Banff National Park
C. Kluane National Park and Reserve
D. Fundy National Park
Answer: C. Kluane National Park and Reserve

22.
True or False:
Kluane National Park is a UNESCO World Heritage Site.
Answer: True

23.
Multiple Choice:
What is the name of the Indigenous self-governing agreements in Yukon?
A. Peace and Order Accords
B. Umbrella Final Agreement
C. Charter of Freedoms
D. Federal Mandates
Answer: B. Umbrella Final Agreement

24.
True or False:
All Yukon First Nations have signed self-government agreements.
Answer: False
(Not all Yukon First Nations have signed self-government agreements.)

25.
Multiple Choice:
What is the name of Yukon’s current political party in power (2025)?
A. Yukon Party
B. Liberal Party
C. Green Party
D. NDP
Answer: B. Liberal Party

26.
True or False:
The Yukon Liberal Party currently forms a majority government.
Answer: False
(The Yukon Liberal Party forms a minority government.)

27.
Multiple Choice:
Who represents Yukon in the Canadian Senate?
A. The Lieutenant Governor
B. A territorial senator
C. The MP of Yukon
D. The Governor General
Answer: B. A territorial senator

28.
True or False:
Senators from territories are appointed by the Prime Minister.
Answer: True

29.
Multiple Choice:
Which of the following is a traditional cultural activity in Yukon?
A. Snow sculpting
B. Northern games
C. Step dancing
D. Surfing
Answer: B. Northern games

30.
True or False:
Dog sledding is a traditional and modern activity in Yukon.
Answer: True

31.
Multiple Choice:
Which language is most commonly spoken in Yukon?
A. French
B. Inuktitut
C. English
D. Gwich’in
Answer: C. English

32.
True or False:
Many Indigenous languages are spoken throughout Yukon.
Answer: True

33.
Multiple Choice:
Which major annual event is celebrated in Dawson City?
A. Stampede Week
B. Gold Rush Days
C. Discovery Days
D. Arctic Festival
Answer: C. Discovery Days

34.
True or False:
Discovery Days celebrates the anniversary of Yukon joining Confederation.
Answer: False
(Discovery Days celebrates the discovery of gold that sparked the Klondike Gold Rush.)

35.
Multiple Choice:
What type of government does Yukon have?
A. Federal
B. Territorial, similar to a province
C. Municipal only
D. Royal commission
Answer: B. Territorial, similar to a province

36.
True or False:
Yukon has no representation in federal politics.
Answer: False
(Yukon has one MP and one Senator in the federal government.)

37.
Multiple Choice:
Which natural phenomenon is frequently visible in Yukon’s night sky?
A. Earthquakes
B. Aurora Borealis (Northern Lights)
C. Hurricanes
D. Sandstorms
Answer: B. Aurora Borealis (Northern Lights)

38.
True or False:
Yukon is located above the Arctic Circle.
Answer: False
(Only a small part of northern Yukon is above the Arctic Circle.)

39.
Multiple Choice:
Which industry has grown in Yukon due to its environment and landscape?
A. Film production
B. Viticulture
C. Eco-tourism
D. Commercial fishing
Answer: C. Eco-tourism

40.
True or False:
Yukon is known for its warm winters.
Answer: False
(Yukon is known for its long, cold winters.)

41.
Multiple Choice:
What is the name of the main highway connecting Yukon to the rest of Canada?
A. Alaska Highway
B. Highway 401
C. Yellowhead Highway
D. Cabot Trail
Answer: A. Alaska Highway

42.
True or False:
The Alaska Highway was built during World War II.
Answer: True

43.
Multiple Choice:
Which town is known for its vibrant arts scene and cultural festivals?
A. Faro
B. Teslin
C. Dawson City
D. Mayo
Answer: C. Dawson City

44.
True or False:
Yukon does not have any arts councils or cultural organizations.
Answer: False
(Yukon has a vibrant arts scene and cultural organizations.)

45.
Multiple Choice:
Which First Nation is based in Whitehorse?
A. Vuntut Gwitchin
B. Kwanlin Dün First Nation
C. Tr’ondëk Hwëch’in
D. Champagne and Aishihik
Answer: B. Kwanlin Dün First Nation

46.
True or False:
Kwanlin Dün is one of the self-governing First Nations in Yukon.
Answer: True

47.
Multiple Choice:
Which territorial symbol represents Yukon’s wildlife?
A. Canada Goose
B. Dall Sheep
C. Grizzly Bear
D. Beaver
Answer: B. Dall Sheep

48.
True or False:
Yukon’s official flower is the Fireweed.
Answer: True

49.
Multiple Choice:
Which major Canadian holiday is also a statutory holiday in Yukon?
A. Civic Holiday
B. Canada Day
C. Nunavut Day
D. Alberta Family Day
Answer: B. Canada Day

50.
True or False:
Yukon Day is celebrated on July 1st.
Answer: False
(Yukon Day is a statutory holiday celebrated on the second Friday in August.)

51.
Multiple Choice:
What is the name of Yukon’s only incorporated city?
A. Watson Lake
B. Dawson City
C. Whitehorse
D. Faro
Answer: C. Whitehorse

52.
True or False:
Dawson City is the capital and only incorporated city in Yukon.
Answer: False
(Whitehorse is the capital and only incorporated city.)

53.
Multiple Choice:
Which federal electoral district includes all of Yukon?
A. Yukon Centre
B. Whitehorse–Klondike
C. Yukon
D. North Pacific
Answer: C. Yukon

54.
True or False:
Yukon has multiple federal electoral districts.
Answer: False
(The entire territory of Yukon is one federal electoral district.)

55.
Multiple Choice:
What does the term “territory” mean in the Canadian political system?
A. A sovereign region
B. An area under federal jurisdiction with limited autonomy
C. A province with full powers
D. A colony
Answer: B. An area under federal jurisdiction with limited autonomy

56.
True or False:
Yukon has the same constitutional status as the provinces.
Answer: False
(Yukon has a different constitutional status than the provinces, with powers devolved from the federal government.)

57.
Multiple Choice:
What agreement forms the foundation of Yukon’s First Nations land claims?
A. Northern Alliance Accord
B. Constitution Act
C. Umbrella Final Agreement
D. First Nations Charter
Answer: C. Umbrella Final Agreement

58.
True or False:
The Umbrella Final Agreement was signed in 1975.
Answer: False
(The Umbrella Final Agreement was signed in 1993.)

59.
Multiple Choice:
Which of the following is not a self-governing First Nation in Yukon?
A. Vuntut Gwitchin
B. Liard First Nation
C. Champagne and Aishihik
D. Carcross/Tagish First Nation
Answer: B. Liard First Nation

60.
True or False:
Self-governing First Nations in Yukon manage their own lands and programs.
Answer: True

61.
Multiple Choice:
Yukon’s government is most similar in structure to which of the following?
A. A municipality
B. A U.S. state
C. A Canadian province
D. A school board
Answer: C. A Canadian province

62.
True or False:
Yukon’s Legislative Assembly passes laws on education, health, and justice.
Answer: True

63.
Multiple Choice:
Which language group includes many of the Indigenous languages in Yukon?
A. Algonquian
B. Athabaskan
C. Salish
D. Inuit-Yupik
Answer: B. Athabaskan

64.
True or False:
Gwich’in is an Indigenous language spoken in Yukon.
Answer: True

65.
Multiple Choice:
Which annual event in Whitehorse includes dogsledding, snowshoeing, and storytelling?
A. Midnight Sun Festival
B. Sourdough Rendezvous
C. Gold Rush Reenactment
D. Northern Lights Fest
Answer: B. Sourdough Rendezvous

66.
True or False:
Sourdough Rendezvous celebrates Yukon’s connection to the sea.
Answer: False
(The Yukon Sourdough Rendezvous is a winter festival that celebrates the territory's history and northern culture.)

67.
Multiple Choice:
What natural resource is not a major economic driver in Yukon?
A. Gold
B. Zinc
C. Diamonds
D. Bananas
Answer: D. Bananas

68.
True or False:
Agriculture is a major export industry in Yukon.
Answer: False
(Agriculture is a small sector in Yukon, not a major export industry.)

69.
Multiple Choice:
What form of transportation is vital to connect Yukon with other parts of Canada?
A. Subway
B. Ferry
C. Highway and air travel
D. Monorail
Answer: C. Highway and air travel

70.
True or False:
Yukon is accessible only by air.
Answer: False
(Yukon is accessible by road and air.)

71.
Multiple Choice:
Which neighboring U.S. state borders Yukon?
A. Washington
B. Oregon
C. Alaska
D. Montana
Answer: C. Alaska

72.
True or False:
Yukon shares a border with both Alaska and British Columbia.
Answer: True

73.
Multiple Choice:
Which title refers to Yukon’s representative of the federal Crown?
A. Governor General
B. Commissioner
C. Premier
D. Speaker
Answer: B. Commissioner

74.
True or False:
The Commissioner of Yukon performs the same role as a Lieutenant Governor.
Answer: False
(The Commissioner of Yukon has a different role and authority than a provincial Lieutenant Governor.)

75.
Multiple Choice:
Which Canadian law guarantees the rights of citizens and permanent residents?
A. Magna Carta
B. Canadian Charter of Rights and Freedoms
C. Confederation Act
D. Bill of Obligations
Answer: B. Canadian Charter of Rights and Freedoms

76.
True or False:
All provinces and territories must follow the Charter of Rights and Freedoms.
Answer: True

77.
Multiple Choice:
How is Yukon’s legal system organized?
A. It has its own Supreme Court
B. It shares a court system with British Columbia
C. It follows Canada’s federal legal framework
D. It uses traditional courts only
Answer: C. It follows Canada’s federal legal framework

78.
True or False:
Yukon has its own Court of Appeal.
Answer: False
(Yukon's Court of Appeal is the Court of Appeal for British Columbia, which hears cases from Yukon.)

79.
Multiple Choice:
Which of the following animals is not commonly found in Yukon?
A. Moose
B. Polar bears
C. Caribou
D. Grizzly bears
Answer: B. Polar bears

80.
True or False:
Wildlife conservation is a major part of Yukon’s environmental policy.
Answer: True

81.
Multiple Choice:
What is the name of the Premier of Yukon as of 2025?
A. Ranj Pillai
B. Sandy Silver
C. Dennis Fentie
D. Caroline Cochrane
Answer: A. Ranj Pillai

82.
True or False:
Ranj Pillai is the leader of the Yukon Party.
Answer: False
(Ranj Pillai is the leader of the Yukon Liberal Party.)

83.
Multiple Choice:
Which political party currently holds the most seats in the Yukon Legislative Assembly (as of 2025)?
A. Yukon NDP
B. Yukon Green Party
C. Yukon Liberal Party
D. Yukon Party
Answer: C. Yukon Liberal Party

84.
True or False:
Yukon has a unicameral legislature.
Answer: True

85.
Multiple Choice:
What is the Yukon motto found on its coat of arms?
A. From Sea to Sea
B. The Land of the Midnight Sun
C. Into the Wild
D. None official
Answer: D. None official

86.
True or False:
The Yukon coat of arms features a Malamute dog.
Answer: True

87.
Multiple Choice:
Which river runs through Whitehorse, the capital of Yukon?
A. Mackenzie River
B. Yukon River
C. Liard River
D. Peace River
Answer: B. Yukon River

88.
True or False:
The Yukon River originates in British Columbia and flows to the Bering Sea.
Answer: True

89.
Multiple Choice:
Which famous Gold Rush began in Yukon in 1896?
A. Fraser Canyon Gold Rush
B. Cariboo Gold Rush
C. Klondike Gold Rush
D. Yukon Boom
Answer: C. Klondike Gold Rush

90.
True or False:
The Klondike Gold Rush led to rapid settlement and development in Yukon.
Answer: True

91.
Multiple Choice:
Which historic town was at the centre of the Klondike Gold Rush?
A. Faro
B. Watson Lake
C. Ross River
D. Dawson City
Answer: D. Dawson City

92.
True or False:
Dawson City served as the territorial capital before Whitehorse.
Answer: True

93.
Multiple Choice:
Which act formally created the Yukon Territory in 1898?
A. Yukon Incorporation Act
B. Dominion Lands Act
C. Yukon Act
D. Confederation Expansion Act
Answer: C. Yukon Act

94.
True or False:
The Yukon Act established a federally appointed Commissioner and Council.
Answer: True

95.
Multiple Choice:
Which group makes up a significant portion of Yukon’s Indigenous population?
A. Inuit
B. Haida
C. Tlingit
D. Algonquin
Answer: C. Tlingit

96.
True or False:
The Tlingit people live mainly in western Yukon.
Answer: True

97.
Multiple Choice:
What is the name of the UNESCO World Heritage Site in Kluane National Park?
A. Mount Logan
B. Nahanni Falls
C. Yukon Icefields
D. Tombstone Mountains
Answer: A. Mount Logan

98.
True or False:
Mount Logan is the tallest mountain in Canada.
Answer: True

99.
Multiple Choice:
Which of the following is a key theme in Yukon’s citizenship education?
A. British colonial law
B. Northern identity and reconciliation
C. International relations
D. Maritime navigation
Answer: B. Northern identity and reconciliation

100.
True or False:
Yukon plays a central role in Canada’s Pacific trade routes.
Answer: False
(Yukon is not centrally located on a Pacific trade route.)

101.
Multiple Choice:
Who represents the King in Yukon at the federal level?
A. Premier of Yukon
B. Commissioner of Yukon
C. Governor General of Canada
D. Speaker of the House
Answer: C. Governor General of Canada

102.
True or False:
The Governor General is appointed by the Prime Minister and represents the monarch in all provinces and territories.
Answer: True

103.
Multiple Choice:
Who represents the King in Yukon at the territorial level?
A. Premier
B. Mayor
C. Commissioner
D. MP
Answer: C. Commissioner

104.
True or False:
The Commissioner of Yukon is equivalent to a provincial Lieutenant Governor.
Answer: False
(The Commissioner's role is similar but not equivalent, as they are not a vice-regal position and represent federal interests.)

105.
Multiple Choice:
What is the role of the Commissioner of Yukon?
A. To lead political parties
B. To enact federal legislation
C. To represent federal interests and perform ceremonial duties
D. To act as chief justice
Answer: C. To represent federal interests and perform ceremonial duties

106.
True or False:
The Commissioner of Yukon is elected by popular vote.
Answer: False
(The Commissioner is appointed by the Governor in Council on the advice of the Prime Minister.)

107.
Multiple Choice:
How many Members of the Legislative Assembly (MLAs) serve in Yukon?
A. 10
B. 19
C. 25
D. 33
Answer: B. 19

108.
True or False:
Yukon has fewer MLAs than any province in Canada.
Answer: True

109.
Multiple Choice:
Which city serves as the capital of Yukon?
A. Dawson City
B. Haines Junction
C. Faro
D. Whitehorse
Answer: D. Whitehorse

110.
True or False:
Whitehorse is the largest city in Yukon.
Answer: True

111.
Multiple Choice:
Yukon is bordered by which U.S. state?
A. California
B. Alaska
C. Washington
D. Oregon
Answer: B. Alaska

112.
True or False:
Yukon shares a border with Alaska and British Columbia.
Answer: True

113.
Multiple Choice:
Which important trail connects Yukon to Alaska and played a role in the Klondike Gold Rush?
A. Pacific Trail
B. Alaska Highway
C. Chilkoot Trail
D. Northern Gateway Trail
Answer: C. Chilkoot Trail

114.
True or False:
The Chilkoot Trail was used by gold seekers traveling to Dawson City.
Answer: True

115.
Multiple Choice:
What is Yukon’s time zone?
A. Pacific Time
B. Eastern Time
C. Mountain Time
D. Central Time
Answer: A. Pacific Time

116.
True or False:
Yukon observes Mountain Standard Time year-round without daylight saving time.
Answer: False
(Yukon observes Pacific Standard Time year-round.)

117.
Multiple Choice:
Which natural feature makes Yukon known as “The Land of the Midnight Sun”?
A. Ice fields
B. Aurora Borealis
C. 24-hour summer daylight
D. Midnight oil drilling
Answer: C. 24-hour summer daylight

118.
True or False:
Yukon experiences 24 hours of darkness in December.
Answer: False
(Some areas of Yukon have very little daylight in December, but not 24 hours of darkness.)

119.
Multiple Choice:
Which wildlife species is commonly found in Yukon?
A. Giraffe
B. Polar Bear
C. Caribou
D. Moose
Answer: C. Caribou

120.
True or False:
Yukon has several protected caribou herds important to Indigenous communities.
Answer: True

121.
Multiple Choice:
Which Indigenous groups are historically associated with Yukon?
A. Inuit and Métis
B. Mi’kmaq and Mohawk
C. Tlingit and Gwich’in
D. Dene and Cree
Answer: C. Tlingit and Gwich’in

122.
True or False:
First Nations people make up about 25% of Yukon’s population.
Answer: True

123.
Multiple Choice:
Which agreement is significant in recognizing First Nations land claims in Yukon?
A. Meech Lake Accord
B. Umbrella Final Agreement
C. Charlottetown Accord
D. Nisga’a Treaty
Answer: B. Umbrella Final Agreement

124.
True or False:
The Umbrella Final Agreement forms the basis for modern treaties in Yukon.
Answer: True

125.
Multiple Choice:
How many self-governing First Nations are in Yukon as of 2025?
A. 3
B. 6
C. 11
D. 13
Answer: C. 11

126.
True or False:
Yukon has more self-governing First Nations than any other territory or province.
Answer: True

127.
Multiple Choice:
Which of the following is a Yukon First Nation community?
A. Iqaluit
B. Mayo
C. Nain
D. Waskaganish
Answer: B. Mayo

128.
True or False:
The First Nation of Na-Cho Nyäk Dun is based in Mayo, Yukon.
Answer: True

129.
Multiple Choice:
Which federal Member of Parliament (MP) represents Yukon in Ottawa?
A. There are none
B. One MP
C. Two MPs
D. Four MPs
Answer: B. One MP

130.
True or False:
Yukon sends two Senators to the Canadian Senate.
Answer: False
(Yukon sends one Senator to the Canadian Senate.)

131.
Multiple Choice:
What is the population of Yukon as of 2025?
A. About 20,000
B. About 45,000
C. About 80,000
D. Over 150,000
Answer: B. About 45,000

132.
True or False:
Yukon is the most populated territory in Canada.
Answer: True

133.
Multiple Choice:
Which language is most widely spoken in Yukon?
A. French
B. English
C. Gwich’in
D. Tlingit
Answer: B. English

134.
True or False:
Indigenous languages such as Gwich’in and Southern Tutchone are still spoken in Yukon.
Answer: True

135.
Multiple Choice:
Which historic event drew tens of thousands of people to Yukon in the late 1800s?
A. World War I
B. The Confederation
C. The Klondike Gold Rush
D. The Meech Lake Accord
Answer: C. The Klondike Gold Rush

136.
True or False:
Dawson City became one of the largest cities in Canada during the Gold Rush.
Answer: True

137.
Multiple Choice:
What year did Yukon become a separate territory from the Northwest Territories?
A. 1867
B. 1898
C. 1949
D. 1971
Answer: B. 1898

138.
True or False:
Yukon was the first Canadian territory to gain self-government.
Answer: False
(Yukon was the first territory to have a modern land claims agreement.)

139.
Multiple Choice:
Who is the current Premier of Yukon as of 2025?
A. Sandy Silver
B. Ranj Pillai
C. Wab Kinew
D. Dennis King
Answer: B. Ranj Pillai

140.
True or False:
Ranj Pillai leads the Yukon Liberal Party.
Answer: True

141.
Multiple Choice:
Which party currently forms the government in Yukon (2025)?
A. Yukon Party
B. New Democratic Party (NDP)
C. Liberal Party
D. Conservative Party
Answer: C. Liberal Party

142.
True or False:
The Yukon Legislative Assembly is located in Dawson City.
Answer: False
(The Yukon Legislative Assembly is located in Whitehorse.)

143.
Multiple Choice:
Which major road connects Yukon to the rest of Canada and Alaska?
A. Klondike Highway
B. Trans-Canada Highway
C. Mackenzie Highway
D. Northern Lights Route
Answer: A. Klondike Highway

144.
True or False:
The Alaska Highway begins in British Columbia and runs through Yukon.
Answer: True

145.
Multiple Choice:
Which tourist activity is Yukon well known for?
A. Surfing
B. Whale watching
C. Northern lights viewing
D. Grape wine tours
Answer: C. Northern lights viewing

146.
True or False:
The Aurora Borealis is best viewed in Yukon in the summer months.
Answer: False
(The Aurora Borealis is best viewed during the dark, clear winter nights.)

147.
Multiple Choice:
What is Yukon’s official territorial flower?
A. Lupin
B. Fireweed
C. Prairie Crocus
D. Trillium
Answer: B. Fireweed

148.
True or False:
Fireweed blooms after forest fires and symbolizes renewal in Yukon.
Answer: True

149.
Multiple Choice:
Which river runs through Whitehorse and played a central role in the Gold Rush?
A. Yukon River
B. Peace River
C. Stikine River
D. Red River
Answer: A. Yukon River

150.
True or False:
The Yukon River flows westward toward Alaska.
Answer: True

151.
Multiple Choice:
What is the name of the national park located in Yukon?
A. Banff National Park
B. Jasper National Park
C. Kluane National Park and Reserve
D. Nahanni National Park
Answer: C. Kluane National Park and Reserve

152.
True or False:
Kluane National Park is home to Canada’s highest peak.
Answer: True

153.
Multiple Choice:
What is the name of Canada’s highest mountain, located in Yukon?
A. Mount Logan
B. Mount Columbia
C. Mount Robson
D. Mount St. Elias
Answer: A. Mount Logan

154.
True or False:
Mount Logan is located within Kluane National Park.
Answer: True

155.
Multiple Choice:
What is the Yukon Quest?
A. A mining expedition
B. A cultural festival
C. A 1,000-mile dog sled race
D. A river canoe race
Answer: C. A 1,000-mile dog sled race

156.
True or False:
The Yukon Quest dog sled race is held between Whitehorse and Fairbanks, Alaska.
Answer: True

157.
Multiple Choice:
What is the main source of electricity in Yukon?
A. Nuclear
B. Wind
C. Hydroelectric
D. Coal
Answer: C. Hydroelectric

158.
True or False:
Yukon relies heavily on hydroelectric dams for power.
Answer: True

159.
Multiple Choice:
Which environmental feature is unique to Yukon’s north?
A. Prairie grasslands
B. Boreal forest
C. Arctic tundra
D. Rainforest
Answer: C. Arctic tundra

160.
True or False:
Yukon includes part of Canada’s boreal forest and tundra zones.
Answer: True

161.
Multiple Choice:
What industry has historically contributed to Yukon’s growth?
A. Steel production
B. Automotive manufacturing
C. Mining
D. Forestry
Answer: C. Mining

162.
True or False:
Gold, copper, and zinc are major mineral exports from Yukon.
Answer: True

163.
Multiple Choice:
What is Yukon’s postal abbreviation?
A. YN
B. YK
C. YU
D. YT
Answer: D. YT

164.
True or False:
The postal abbreviation for Yukon is YU.
Answer: False
(The correct postal abbreviation is YT.)

165.
Multiple Choice:
Which of the following is a major cultural celebration in Yukon?
A. Calgary Stampede
B. Festival du Voyageur
C. Yukon Sourdough Rendezvous
D. Winterlude
Answer: C. Yukon Sourdough Rendezvous

166.
True or False:
The Yukon Sourdough Rendezvous celebrates Gold Rush traditions and community spirit.
Answer: True

167. 
Multiple Choice:
Which resource-based sector remains vital to Yukon’s economy?
A. Agriculture
B. Technology
C. Mining
D. Fishing
Answer: C. Mining

168.
True or False:
Yukon’s economy is largely agricultural.
Answer: False
(Yukon's economy is primarily based on mining, tourism, and public services.)

169.
Multiple Choice:
Which cultural heritage site commemorates the Klondike Gold Rush?
A. Dawson City Historic Complex
B. Kluane Glacier Park
C. Yukon Mines National Park
D. Whitehorse Heritage Trail
Answer: A. Dawson City Historic Complex

170.
True or False:
Dawson City has preserved many buildings from the Gold Rush era.
Answer: True

171.
Multiple Choice:
What is the Yukon Legislative Assembly’s primary role?
A. Represent federal law
B. Approve laws and budgets in Yukon
C. Enforce territorial court orders
D. Represent Indigenous governments
Answer: B. Approve laws and budgets in Yukon

172.
True or False:
Yukon’s government structure is similar to that of a Canadian province.
Answer: True

173.
Multiple Choice:
What is the name of the governing body of an Indigenous First Nation in Yukon?
A. Territorial Assembly
B. Band Council
C. Senate
D. Tribal Union
Answer: B. Band Council

174.
True or False:
Many Yukon First Nations are self-governing and do not operate under the Indian Act.
Answer: True

175.
Multiple Choice:
Which animal is found on the Yukon Coat of Arms?
A. Moose
B. Wolf
C. Husky
D. Caribou
Answer: D. Caribou

176.
True or False:
The caribou represents Yukon’s natural environment.
Answer: True

177.
Multiple Choice:
Which federal body manages national parks like Kluane?
A. Parks Yukon
B. Department of Environment
C. Parks Canada
D. Tourism Canada
Answer: C. Parks Canada

178.
True or False:
Parks Canada oversees Kluane National Park and other heritage sites.
Answer: True

179.
Multiple Choice:
Who is responsible for administering federal elections in Yukon?
A. Yukon Elections
B. House of Commons
C. Elections Canada
D. Senate Office
Answer: C. Elections Canada

180.
True or False:
Elections Canada manages both federal and territorial elections.
Answer: False
(Elections Canada manages federal elections, while Elections Yukon manages territorial elections.)

181.
Multiple Choice:
Which transportation method is crucial in Yukon’s winter months?
A. Subways
B. Air travel
C. Cruise ships
D. Bullet trains
Answer: B. Air travel

182.
True or False:
Many remote Yukon communities depend on air access year-round.
Answer: True

183.
Multiple Choice:
Which natural light phenomenon is common in Yukon’s night sky?
A. Solar eclipse
B. Aurora Borealis
C. Moonbow
D. Comet flashes
Answer: B. Aurora Borealis

184.
True or False:
Aurora Borealis is caused by solar particles colliding with Earth’s magnetic field.
Answer: True

185.
Multiple Choice:
Which federal law protects Indigenous languages and culture?
A. Constitution Act
B. Multiculturalism Act
C. Indigenous Languages Act
D. Civil Rights Code
Answer: C. Indigenous Languages Act

186.
True or False:
Indigenous languages in Yukon are protected and promoted under federal law.
Answer: True

187.
Multiple Choice:
Which major mountain range runs through Yukon?
A. Appalachian
B. Rockies
C. Mackenzie
D. Saint Elias
Answer: D. Saint Elias

188.
True or False:
The Saint Elias Mountains are among the highest in Canada.
Answer: True

189.
Multiple Choice:
Which First Nation is based in Dawson City?
A. Champagne and Aishihik
B. Tr’ondëk Hwëch’in
C. Carcross/Tagish
D. Vuntut Gwitchin
Answer: B. Tr’ondëk Hwëch’in

190.
True or False:
The Tr’ondëk Hwëch’in First Nation played a major role in the Klondike Gold Rush.
Answer: True

191.
Multiple Choice:
Which official document outlines Canada’s founding principles?
A. British North America Act
B. Charter of Freedoms
C. Charter of Rights and Freedoms
D. Human Rights Agreement
Answer: C. Charter of Rights and Freedoms

192.
True or False:
The Charter protects freedom of expression, mobility, and equality rights.
Answer: True

193.
Multiple Choice:
Which right allows Yukoners to vote in federal elections?
A. Democratic right
B. Legal right
C. Mobility right
D. Cultural right
Answer: A. Democratic right

194.
True or False:
Only Canadian citizens can vote in federal elections.
Answer: True

195.
Multiple Choice:
What is the significance of Remembrance Day in Yukon and Canada?
A. Celebration of mining
B. Observance of the Klondike Gold Rush
C. Honoring war veterans
D. Celebration of First Nations
Answer: C. Honoring war veterans

196.
True or False:
Remembrance Day is celebrated on July 1st each year.
Answer: False
(Remembrance Day is celebrated on November 11th.)

197.
Multiple Choice:
Which government is responsible for immigration and citizenship?
A. Provincial
B. Territorial
C. Federal
D. Municipal
Answer: C. Federal

198.
True or False:
Citizenship in Canada can be passed on to children born abroad to Canadian parents.
Answer: True

199.
Multiple Choice:
Which act officially created the territory of Yukon?
A. Yukon Formation Act
B. Yukon Territory Act
C. Yukon Charter
D. Confederation Act
Answer: B. Yukon Territory Act

200.
True or False:
The Yukon Territory Act was passed in 1898 to formally create the territory.
Answer: True


201.
Multiple Choice:
Which Indigenous language is still actively spoken in the Vuntut Gwitchin First Nation?
A. Inuktitut
B. Tlingit
C. Gwich’in
D. Cree
Answer: C. Gwich’in

202.
True or False:
The Vuntut Gwitchin First Nation is located in northern Yukon near Old Crow.
Answer: True

203.
Multiple Choice:
Which major federal service is responsible for law enforcement in Yukon?
A. Canadian Armed Forces
B. RCMP (Royal Canadian Mounted Police)
C. Yukon Municipal Police
D. Parks Canada
Answer: B. RCMP (Royal Canadian Mounted Police)

204.
True or False:
Yukon maintains its own independent police force separate from the RCMP.
Answer: False
(The RCMP serves as Yukon's territorial police force.)

205.
Multiple Choice:
What type of land is most common in Yukon’s geography?
A. Tropical forest
B. Prairie grasslands
C. Mountains and tundra
D. Desert
Answer: C. Mountains and tundra

206.
True or False:
Most of Yukon’s land is flat and used for farming.
Answer: False
(Most of Yukon's land is mountainous and not suitable for widespread farming.)

207.
Multiple Choice:
What is a key reason for the preservation of Indigenous languages in Yukon?
A. National education reforms
B. Federal policing initiatives
C. Community-led cultural programs and schools
D. Immigration requirements
Answer: C. Community-led cultural programs and schools

208.
True or False:
Yukon schools provide no education in Indigenous languages.
Answer: False
(Yukon schools do offer education in some Indigenous languages.)

209.
Multiple Choice:
Which body manages local public education in Yukon?
A. Yukon Department of Health
B. Canadian Teachers Union
C. Yukon Department of Education
D. Whitehorse School Board
Answer: C. Yukon Department of Education

210.
True or False:
Yukon’s education system is governed by the territorial government.
Answer: True

211.
Multiple Choice:
Which winter sport is popular and historically important in Yukon?
A. Downhill skiing
B. Dog sledding
C. Speed skating
D. Snowboarding
Answer: B. Dog sledding

212.
True or False:
Dog sledding has both recreational and cultural significance in Yukon.
Answer: True

213.
Multiple Choice:
Which group of people were among the earliest European explorers in Yukon?
A. British fur traders
B. French missionaries
C. Russian settlers
D. American miners
Answer: A. British fur traders

214.
True or False:
French colonists established permanent settlements in Yukon.
Answer: False
(British fur traders and American miners were the primary early non-Indigenous settlers.)

215.
Multiple Choice:
What is the climate like in most of Yukon?
A. Humid and tropical
B. Hot and dry
C. Cold and dry with long winters
D. Rainy year-round
Answer: C. Cold and dry with long winters

216.
True or False:
Yukon has a tropical climate with warm winters.
Answer: False
(Yukon has a subarctic climate with cold winters.)

217.
Multiple Choice:
Which traditional activity supports Indigenous food systems in Yukon?
A. Farming
B. Commercial baking
C. Hunting and fishing
D. Importing frozen goods
Answer: C. Hunting and fishing

218.
True or False:
Subsistence hunting remains important to many Yukon Indigenous communities.
Answer: True

219.
Multiple Choice:
Which tourism attraction draws visitors to Yukon in winter?
A. Wildflower festivals
B. Northern lights viewing
C. River surfing
D. Tropical wildlife sanctuaries
Answer: B. Northern lights viewing

220.
True or False:
The best time to see the aurora borealis in Yukon is during long winter nights.
Answer: True

221.
Multiple Choice:
Which Yukon town is closest to the Arctic Circle?
A. Whitehorse
B. Mayo
C. Watson Lake
D. Old Crow
Answer: D. Old Crow

222.
True or False:
Old Crow is accessible year-round by road from Whitehorse.
Answer: False
(Old Crow is only accessible by air.)

223.
Multiple Choice:
Which historic gold mining trail is still visited today?
A. West Coast Trail
B. Chilkoot Trail
C. Fraser Canyon Trail
D. Cariboo Loop
Answer: B. Chilkoot Trail

224.
True or False:
The Chilkoot Trail now serves as a hiking and heritage route.
Answer: True

225.
Multiple Choice:
Which public holiday commemorates the discovery of gold in Yukon?
A. Canada Day
B. Discovery Day
C. Yukon Day
D. National Mining Day
Answer: B. Discovery Day

226.
True or False:
Discovery Day is celebrated in February.
Answer: False
(Discovery Day is celebrated in August.)

227.
Multiple Choice:
Which organization oversees parks and historic sites in Yukon?
A. Parks Yukon
B. Parks Canada
C. Yukon Forest Service
D. Federal Heritage Department
Answer: B. Parks Canada

228.
True or False:
Kluane National Park is managed by Parks Yukon.
Answer: False
(Kluane National Park is a national park managed by Parks Canada.)

229.
Multiple Choice:
What is the main form of government for Yukon communities like Old Crow?
A. Federal Commission
B. Municipal councils
C. Indigenous self-governments
D. Provincial appointees
Answer: C. Indigenous self-governments

230.
True or False:
Old Crow operates under the Indian Act with no self-government agreement.
Answer: False
(Old Crow is the home of the Vuntut Gwitchin First Nation, which has a self-government agreement.)

231.
Multiple Choice:
Which federal agency delivers citizenship ceremonies in Yukon?
A. Immigration, Refugees and Citizenship Canada (IRCC)
B. Canada Border Services Agency (CBSA)
C. Parks Canada
D. Global Affairs Canada
Answer: A. Immigration, Refugees and Citizenship Canada (IRCC)

232.
True or False:
Canadian citizenship ceremonies are conducted in both English and French.
Answer: True

233.
Multiple Choice:
What is a major environmental concern addressed by Yukon’s government?
A. Ocean pollution
B. Urban overpopulation
C. Climate change and melting permafrost
D. Industrial air pollution
Answer: C. Climate change and melting permafrost

234.
True or False:
Permafrost is permanently frozen ground found in parts of Yukon.
Answer: True

235.
Multiple Choice:
Which First Nation is associated with the Champagne and Aishihik region?
A. Vuntut Gwitchin
B. Tr’ondëk Hwëch’in
C. Kwanlin Dün
D. Champagne and Aishihik First Nations
Answer: D. Champagne and Aishihik First Nations

236.
True or False:
Champagne and Aishihik First Nations are not self-governing.
Answer: False
(The Champagne and Aishihik First Nations are a self-governing First Nation.)

237.
Multiple Choice:
Which of the following best describes Yukon’s economy?
A. Primarily fishing-based
B. Mixed economy with mining, tourism, and public service
C. Focused entirely on agriculture
D. Dependent on international trade zones
Answer: B. Mixed economy with mining, tourism, and public service

238.
True or False:
Tourism is a growing sector in Yukon’s economy.
Answer: True

239.
Multiple Choice:
What is the traditional form of governance among many Yukon First Nations?
A. City councils
B. Hereditary leadership and consensus
C. Military leadership
D. Corporate board structure
Answer: B. Hereditary leadership and consensus

240.
True or False:
Some First Nations in Yukon use elected band councils as their primary form of government.
Answer: True

241.
Multiple Choice:
What type of natural disaster can affect Yukon due to climate and geography?
A. Volcanic eruptions
B. Tsunamis
C. Forest fires and flooding
D. Tornadoes
Answer: C. Forest fires and flooding

242.
True or False:
Yukon has emergency plans to respond to wildfires.
Answer: True

243.
Multiple Choice:
Which community in Yukon is located near the confluence of the Yukon and Klondike Rivers?
A. Whitehorse
B. Watson Lake
C. Dawson City
D. Faro
Answer: C. Dawson City

244.
True or False:
Dawson City is located in southern Yukon.
Answer: False
(Dawson City is located in central Yukon.)

245.
Multiple Choice:
Which body is responsible for managing wildlife and protected species in Yukon?
A. Department of Fisheries and Oceans
B. Yukon Wildlife Federation
C. Yukon Department of Environment
D. Ministry of Forestry
Answer: C. Yukon Department of Environment

246.
True or False:
Yukon’s wildlife laws apply only to national parks.
Answer: False
(Yukon's wildlife laws apply throughout the territory.)

247.
Multiple Choice:
Which of the following is a major export product of Yukon?
A. Software
B. Manufactured goods
C. Minerals
D. Automobiles
Answer: C. Minerals

248.
True or False:
Yukon exports large quantities of grain and wheat.
Answer: False
(Agriculture is a minor industry, and Yukon does not export large quantities of grain.)

249.
Multiple Choice:
Which of the following is true about Yukon’s population density?
A. It is among the highest in Canada
B. It is concentrated in urban centres
C. It is low, with most residents spread over vast areas
D. It is increasing due to large-scale immigration
Answer: C. It is low, with most residents spread over vast areas

250.
True or False:
Whitehorse is home to over 80% of Yukon’s total population.
Answer: True

251.
Multiple Choice:
Which transportation route helped supply the Klondike Gold Rush?
A. Mackenzie Highway
B. Chilkoot Trail
C. Pacific Railway
D. Dempster Highway
Answer: B. Chilkoot Trail

252.
True or False:
The Dempster Highway connects Dawson City to the Arctic Ocean.
Answer: True

253.
Multiple Choice:
Which federal ministry manages Canadian citizenship applications?
A. Public Safety Canada
B. Immigration, Refugees and Citizenship Canada (IRCC)
C. Canada Revenue Agency
D. Global Affairs Canada
Answer: B. Immigration, Refugees and Citizenship Canada (IRCC)

254.
True or False:
IRCC is also responsible for issuing Canadian passports.
Answer: True

255.
Multiple Choice:
What makes Yukon’s legislature unique compared to provinces?
A. It has a Senate
B. It is appointed by the Governor General
C. It has fewer elected representatives
D. It is governed by Indigenous law only
Answer: C. It has fewer elected representatives

256.
True or False:
Yukon’s Legislative Assembly operates similarly to a provincial legislature.
Answer: True

257.
Multiple Choice:
Which wildlife species is featured on Yukon’s coat of arms?
A. Bear
B. Moose
C. Husky
D. Caribou
Answer: D. Caribou

258.
True or False:
The Yukon coat of arms includes a Malamute dog, symbolizing northern resilience.
Answer: True

259.
Multiple Choice:
Which of the following is a challenge facing Indigenous communities in Yukon?
A. High rainfall
B. Language loss
C. Over-tourism
D. Too much farmland
Answer: B. Language loss

260.
True or False:
Efforts are being made to revitalize Indigenous languages in Yukon.
Answer: True

261.
Multiple Choice:
Which Yukon city is the administrative and economic hub of the territory?
A. Dawson City
B. Watson Lake
C. Whitehorse
D. Faro
Answer: C. Whitehorse

262.
True or False:
Whitehorse has an international airport.
Answer: True

263.
Multiple Choice:
Which sector employs the largest number of Yukoners?
A. Manufacturing
B. Public service
C. Forestry
D. Private security
Answer: B. Public service

264.
True or False:
Government and public sector jobs make up a large part of Yukon’s workforce.
Answer: True

265.
Multiple Choice:
Which group played a major role in preserving Yukon’s history?
A. The French monarchy
B. Gold miners
C. Parks Canada
D. Canadian Mountaineering Club
Answer: C. Parks Canada

266.
True or False:
Parks Canada operates national parks and historic sites in Yukon.
Answer: True

267.
Multiple Choice:
Which of the following best describes Yukon’s legislative system?
A. Bicameral and federal
B. Unicameral and territorial
C. Unregulated and tribal
D. Royal-led and appointed
Answer: B. Unicameral and territorial

268.
True or False:
Yukon has only one legislative chamber: the Legislative Assembly.
Answer: True

269.
Multiple Choice:
Which document outlines the responsibilities of Canadian citizens?
A. Citizenship Guide
B. Charter of Rights and Freedoms
C. Criminal Code
D. National Duties Act
Answer: B. Charter of Rights and Freedoms

270.
True or False:
The Charter guarantees the right to vote and freedom of religion.
Answer: True

271. 
Multiple Choice:
Which service is funded jointly by Yukon and the federal government?
A. Immigration processing
B. Language interpretation
C. Healthcare
D. International trade
Answer: C. Healthcare

272.
True or False:
Yukon residents access healthcare through the Yukon Health Care Insurance Plan.
Answer: True

273.
Multiple Choice:
Which community is home to the First Nation of Na-Cho Nyäk Dun?
A. Mayo
B. Faro
C. Ross River
D. Old Crow
Answer: A. Mayo

274.
True or False:
The First Nation of Na-Cho Nyäk Dun is self-governing.
Answer: True

275.
Multiple Choice:
What form of local government exists in Whitehorse?
A. Band council
B. Territorial legislature
C. City council
D. Governor’s office
Answer: C. City council

276.
True or False:
Whitehorse elects a mayor and city councillors.
Answer: True

277.
Multiple Choice:
Which of the following is a First Nations right under self-government in Yukon?
A. Issuing Canadian passports
B. Managing health, education, and land
C. Overruling federal law
D. Appointing senators
Answer: B. Managing health, education, and land

278.
True or False:
Self-governing First Nations in Yukon manage their own education programs.
Answer: True

279.
Multiple Choice:
Which season in Yukon brings 20+ hours of daylight?
A. Autumn
B. Winter
C. Spring
D. Summer
Answer: D. Summer

280.
True or False:
Yukon has long daylight hours in summer and short daylight in winter.
Answer: True

281.
Multiple Choice:
Which natural event heavily influenced the geography and wildlife of Yukon?
A. Glacial activity
B. Earthquakes
C. Volcanic eruptions
D. Desert winds
Answer: A. Glacial activity

282.
True or False:
Many valleys and rivers in Yukon were formed by ancient glaciers.
Answer: True

283.
Multiple Choice:
Which type of election is held in Yukon to choose its Legislative Assembly?
A. Senate elections
B. Territorial general election
C. Municipal referendum
D. Federal by-election
Answer: B. Territorial general election

284.
True or False:
Only permanent residents can vote in Yukon’s territorial elections.
Answer: False
(Canadian citizens who are residents of Yukon can vote in territorial elections.)

285.
Multiple Choice:
Which economic activity is most closely linked to the history of Dawson City?
A. Logging
B. Gold mining
C. Fishing
D. Oil drilling
Answer: B. Gold mining

286.
True or False:
Dawson City is still a major gold producer in Canada.
Answer: False
(While gold mining still happens, Dawson City is no longer a major producer.)

287. 
Multiple Choice:
Which group provides healthcare services in remote First Nations communities?
A. Canadian Red Cross
B. Local band governments only
C. Territorial and federal health agencies
D. International health NGOs
Answer: C. Territorial and federal health agencies

288.
True or False:
Yukon communities like Old Crow have nursing stations for healthcare.
Answer: True

289.
Multiple Choice:
Which of the following best describes Yukon’s population growth?
A. Rapid industrial boom
B. Stable with slow increase
C. Declining rapidly
D. Increasing due to natural disasters
Answer: B. Stable with slow increase

290.
True or False:
Yukon’s population has remained almost unchanged since 1990.
Answer: False
(Yukon's population has slowly increased since 1990.)

291.
Multiple Choice:
Which type of vehicle is most reliable during Yukon’s harsh winters?
A. Motorcycles
B. Bicycles
C. 4x4 trucks
D. Sports cars
Answer: C. 4x4 trucks

292.
True or False:
Roads in Yukon are rarely affected by winter conditions.
Answer: False
(Roads can be heavily affected by snow and ice in winter.)

293.
Multiple Choice:
Which level of government is primarily responsible for natural resources in Yukon?
A. Municipal
B. Federal
C. Territorial
D. Indigenous
Answer: C. Territorial

294.
True or False:
Yukon controls most of its own natural resources through devolution agreements.
Answer: True

295.
Multiple Choice:
Which federal department supports First Nations governance in Yukon?
A. Public Works Canada
B. Canadian Heritage
C. Indigenous Services Canada
D. Citizenship and Immigration Canada
Answer: C. Indigenous Services Canada

296.
True or False:
First Nations in Yukon receive no federal support for governance or development.
Answer: False
(First Nations in Yukon receive federal support, though they manage many of their own affairs.)

297.
Multiple Choice:
Which national initiative supports Indigenous reconciliation in Yukon and Canada?
A. Truth and Reconciliation Commission (TRC)
B. Canadian Economic Action Plan
C. Free Trade Agreement
D. Northern Tourism Pact
Answer: A. Truth and Reconciliation Commission (TRC)

298.
True or False:
The Truth and Reconciliation Commission made no recommendations regarding education.
Answer: False
(The TRC made many recommendations on education.)

299.
Multiple Choice:
Which of the following best describes the Yukon flag?
A. Red with a maple leaf
B. Blue, white, and green vertical stripes with a coat of arms
C. Red and white horizontal bars
D. Yellow sun on a red background
Answer: B. Blue, white, and green vertical stripes with a coat of arms

300.
True or False:
Yukon’s flag includes a depiction of a Malamute dog and a cross.
Answer: True


301.
Multiple Choice:
Which government document guarantees equality under the law for all Canadians?
A. Multiculturalism Act
B. Charter of Rights and Freedoms
C. Criminal Code
D. Constitution Act of Yukon
Answer: B. Charter of Rights and Freedoms

302.
True or False:
The Canadian Charter protects the rights of citizens only, not permanent residents.
Answer: False
(The Charter protects the rights of citizens, permanent residents, and other individuals present in Canada.)

303.
Multiple Choice:
Which of the following best reflects Yukon’s approach to education?
A. Privately managed by outside contractors
B. Governed by local religious institutions
C. Public education managed by the territorial government
D. Centrally run by federal ministries only
Answer: C. Public education managed by the territorial government

304.
True or False:
Education in Yukon is free and publicly funded for residents.
Answer: True

305.
Multiple Choice:
Which group holds traditional knowledge of land use in Yukon?
A. Federal MPs
B. Local mayors
C. Indigenous Elders
D. Immigration officers
Answer: C. Indigenous Elders

306.
True or False:
Elders are not involved in decision-making within Indigenous communities.
Answer: False
(Elders often play a key role in advising on community decisions.)

307.
Multiple Choice:
What is the purpose of the Umbrella Final Agreement in Yukon?
A. Trade agreement with Alaska
B. Foundation for self-government and land claims
C. Agreement for energy sharing
D. Treaty for mining regulation
Answer: B. Foundation for self-government and land claims

308.
True or False:
The Umbrella Final Agreement applies only to Whitehorse.
Answer: False
(The Umbrella Final Agreement provides the framework for all Yukon First Nations land claims and self-government agreements.)

309.
Multiple Choice:
What is a Yukon trapline used for?
A. Logging timber
B. Mining exploration
C. Traditional harvesting of fur-bearing animals
D. Internet communication
Answer: C. Traditional harvesting of fur-bearing animals

310.
True or False:
Traplines are licensed and regulated in Yukon.
Answer: True

311.
Multiple Choice:
Which historic mode of transport was essential during the Gold Rush?
A. Seaplanes
B. Trains
C. Paddlewheel riverboats
D. Cable cars
Answer: C. Paddlewheel riverboats

312.
True or False:
Paddlewheel boats were used to transport gold from Yukon to Europe.
Answer: False
(Paddlewheel boats were used to transport people and goods along the Yukon River.)

313.
Multiple Choice:
Which of the following is a major energy source for Yukon homes?
A. Oil
B. Coal
C. Hydroelectric power
D. Natural gas from Alberta
Answer: C. Hydroelectric power

314.
True or False:
Yukon relies entirely on imported power from British Columbia.
Answer: False
(Yukon generates most of its own power from hydroelectric sources.)

315.
Multiple Choice:
Which term best describes Yukon’s status in Canada’s political system?
A. Province
B. Sovereign nation
C. Territory
D. Independent republic
Answer: C. Territory

316.
True or False:
Yukon has the same constitutional powers as a province.
Answer: False
(Yukon's powers are different from those of a province and are subject to federal authority.)

317.
Multiple Choice:
What is the role of the MLA (Member of the Legislative Assembly) in Yukon?
A. Represent local municipalities
B. Serve in the Senate
C. Represent Yukoners in the Legislative Assembly
D. Enforce RCMP law
Answer: C. Represent Yukoners in the Legislative Assembly

318.
True or False:
Each MLA in Yukon is elected by residents in their riding.
Answer: True

319.
Multiple Choice:
What was a major reason the Klondike Gold Rush ended?
A. Conflict with First Nations
B. Gold deposits ran out
C. Government closed the territory
D. Natural disasters
Answer: B. Gold deposits ran out

320.
True or False:
The Klondike Gold Rush only lasted a few months.
Answer: False
(The Gold Rush lasted several years.)

321.
Multiple Choice:
Which Yukon trail is known for being difficult and historic during the Gold Rush?
A. Dawson Pass
B. Telegraph Trail
C. Chilkoot Trail
D. Fraser Gap
Answer: C. Chilkoot Trail

322.
True or False:
Today, the Chilkoot Trail is a protected heritage hiking route.
Answer: True

323.
Multiple Choice:
Which event in Canadian history contributed to the creation of Yukon as a territory?
A. War of 1812
B. The Gold Rush
C. Confederation
D. World War I
Answer: B. The Gold Rush

324.
True or False:
Yukon was created in response to population growth from gold seekers.
Answer: True

325.
Multiple Choice:
Which Yukon Indigenous group has its traditional territory in the northernmost region?
A. Kwanlin Dün
B. Carcross/Tagish
C. Vuntut Gwitchin
D. Taku River Tlingit
Answer: C. Vuntut Gwitchin

326.
True or False:
The Vuntut Gwitchin First Nation is based in Old Crow.
Answer: True

327.
Multiple Choice:
Which of the following describes Yukon’s judicial system?
A. Religious-based
B. Traditional only
C. Part of the Canadian legal framework
D. Unique and not related to Canada
Answer: C. Part of the Canadian legal framework

328.
True or False:
Yukon has its own independent national court system.
Answer: False
(Yukon's court system is part of Canada's federal legal framework.)

329.
Multiple Choice:
Who appoints the Commissioner of Yukon?
A. Yukon voters
B. Premier
C. Prime Minister of Canada
D. The King
Answer: C. Prime Minister of Canada

330.
True or False:
The Commissioner of Yukon has the same constitutional role as a provincial Lieutenant Governor.
Answer: False
(The Commissioner's role is similar but not equivalent, as they are not a vice-regal position and represent federal interests.)

331.
Multiple Choice:
Which natural feature defines Yukon’s border with Alaska?
A. Pacific Ocean
B. Rocky Mountains
C. 141st meridian west longitude
D. Saint Elias River
Answer: C. 141st meridian west longitude

332.
True or False:
Yukon shares its eastern border with Alberta.
Answer: False
(Yukon's eastern border is with the Northwest Territories.)

333. 
Multiple Choice:
Which cultural activity involves storytelling, dancing, and drumming in Yukon First Nations communities?
A. Ceremonial baking
B. Potlatch
C. Rodeo
D. Highland games
Answer: B. Potlatch

334.
True or False:
Potlatches are an important way of passing down traditions and values.
Answer: True

335.
Multiple Choice:
What is Yukon’s approximate land area compared to other Canadian provinces or territories?
A. Smallest province
B. Largest land area in Canada
C. One of the smallest land areas
D. Large in size, low in population
Answer: D. Large in size, low in population

336.
True or False:
Yukon is the second-largest Canadian territory by land area.
Answer: True

337.
Multiple Choice:
Which climate feature makes Yukon unique among many regions in Canada?
A. Wet and coastal
B. Long daylight hours in summer
C. Heavy rainfall year-round
D. Monsoon season
Answer: B. Long daylight hours in summer

338.
True or False:
Yukon experiences polar nights during parts of the year.
Answer: False
(Yukon does not experience a true polar night.)

339.
Multiple Choice:
Which government agreement outlines the roles and powers transferred from federal to Yukon government?
A. Yukon Territory Act
B. Devolution Transfer Agreement
C. Umbrella Final Agreement
D. Confederation Pact
Answer: B. Devolution Transfer Agreement

340.
True or False:
The Devolution Transfer Agreement gave Yukon greater control over its natural resources.
Answer: True

341.
Multiple Choice:
Which museum in Whitehorse highlights the Gold Rush and Yukon’s heritage?
A. Yukon Archives
B. Dawson Historical Centre
C. MacBride Museum
D. Kluane Cultural Hall
Answer: C. MacBride Museum

342.
True or False:
The MacBride Museum is located in Dawson City.
Answer: False
(The MacBride Museum is located in Whitehorse.)

343.
Multiple Choice:
What is a key environmental initiative promoted in Yukon?
A. Urban irrigation
B. Renewable energy development
C. Coral reef protection
D. Marine oil transport
Answer: B. Renewable energy development

344.
True or False:
Yukon has invested in solar and wind energy projects.
Answer: True

345.
Multiple Choice:
What is the significance of the White Pass and Yukon Route?
A. Highway through British Columbia
B. Ancient foot trail
C. Historic railway from Skagway to Yukon
D. Gold processing facility
Answer: C. Historic railway from Skagway to Yukon

346.
True or False:
The White Pass and Yukon Route railway is still used for passenger tourism.
Answer: True

347.
Multiple Choice:
What is the name of the river that runs through Whitehorse?
A. Yukon River
B. Liard River
C. Stewart River
D. Klondike River
Answer: A. Yukon River

348.
True or False:
The Yukon River begins in Alaska and flows south into Canada.
Answer: False
(The Yukon River begins in British Columbia and flows north and west.)

349.
Multiple Choice:
Which of the following responsibilities belongs to Canadian citizens?
A. Voting in elections
B. Receiving healthcare
C. Entering into treaties
D. Granting refugee status
Answer: A. Voting in elections

350.
True or False:
Only Canadian citizens are allowed to vote in federal elections.
Answer: True

351.
Multiple Choice:
Which holiday celebrates Canada’s founding as a country?
A. Remembrance Day
B. Confederation Day
C. Canada Day
D. Dominion Day
Answer: C. Canada Day

352.
True or False:
Canada Day is celebrated on July 4th.
Answer: False
(Canada Day is celebrated on July 1st.)

353.
Multiple Choice:
Which term refers to a set of beliefs that Canada is strengthened by diversity?
A. Ethnic superiority
B. Cultural nationalism
C. Multiculturalism
D. Regionalism
Answer: C. Multiculturalism

354.
True or False:
Canada’s Multiculturalism Act promotes the cultural rights of all Canadians.
Answer: True

355.
Multiple Choice:
Which popular winter event is celebrated annually in Yukon?
A. Yukon River Splash
B. Frostbite Festival
C. Yukon Sourdough Rendezvous
D. Klondike Kite Festival
Answer: C. Yukon Sourdough Rendezvous

356.
True or False:
The Yukon Sourdough Rendezvous is held during the summer months.
Answer: False
(The Yukon Sourdough Rendezvous is held in late winter.)

357.
Multiple Choice:
Who leads the Government of Yukon?
A. The King
B. The Premier
C. The Commissioner
D. The Senate
Answer: B. The Premier

358.
True or False:
The Yukon Premier is elected directly by the public.
Answer: False
(The Premier is the leader of the political party that forms the government and is selected by the elected members of the Legislative Assembly.)

359.
Multiple Choice:
Which of the following is a natural park in Yukon known for its mountains and glaciers?
A. Jasper National Park
B. Kluane National Park and Reserve
C. Algonquin Park
D. Tuktut Nogait Park
Answer: B. Kluane National Park and Reserve

360.
True or False:
Mount Logan, Canada’s highest peak, is located in Yukon.
Answer: True

361.
Multiple Choice:
Which Indigenous group is closely tied to the Teslin region?
A. Kluane First Nation
B. Taku River Tlingit
C. Teslin Tlingit Council
D. Gwich’in
Answer: C. Teslin Tlingit Council

362.
True or False:
The Teslin Tlingit Council governs parts of southern Yukon.
Answer: True

363.
Multiple Choice:
Which of the following is NOT a right of Canadian citizenship?
A. The right to enter Canada at any time
B. The right to vote
C. The right to apply for a foreign passport
D. The right to run for political office
Answer: C. The right to apply for a foreign passport

364.
True or False:
Canadian citizens have the right to apply for a Canadian passport.
Answer: True

365.
Multiple Choice:
Who represents the federal government in Yukon?
A. Mayor
B. MLA
C. Commissioner
D. Member of Parliament (MP)
Answer: D. Member of Parliament (MP)

366.
True or False:
Yukon has multiple MPs in the House of Commons.
Answer: False
(Yukon has one MP in the House of Commons.)

367.
Multiple Choice:
How many self-governing First Nations are in Yukon?
A. 3
B. 7
C. 11
D. 14
Answer: C. 11

368.
True or False:
Most of Yukon’s First Nations have signed modern land claims agreements.
Answer: True

369.
Multiple Choice:
What makes Old Crow unique among Yukon communities?
A. It’s the coldest place in Canada
B. It is not accessible by road
C. It is Yukon’s capital
D. It has the largest mall
Answer: B. It is not accessible by road

370.
True or False:
Old Crow is connected to other towns in Yukon by train.
Answer: False
(Old Crow is not connected by road or rail.)

371.
Multiple Choice:
What is the term for laws passed by the Yukon Legislative Assembly?
A. Acts
B. Bylaws
C. Ordinances
D. Charters
Answer: A. Acts

372.
True or False:
Territorial laws in Yukon must align with federal laws.
Answer: True

373.
Multiple Choice:
Which document serves as Canada’s highest legal authority?
A. Supreme Court Act
B. Charter of Freedoms
C. Constitution of Canada
D. Civil Code
Answer: C. Constitution of Canada

374.
True or False:
The Constitution includes the Charter of Rights and Freedoms.
Answer: True

375.
Multiple Choice:
Which sector has the most influence on Yukon’s job market today?
A. Finance
B. Forestry
C. Mining and government services
D. Retail
Answer: C. Mining and government services

376.
True or False:
Yukon’s economy is primarily driven by technology start-ups.
Answer: False
(Yukon's economy is primarily driven by mining and public services.)

377.
Multiple Choice:
Which group oversees immigration and citizenship policies nationally?
A. House of Commons
B. Immigration, Refugees and Citizenship Canada (IRCC)
C. Privy Council
D. Senate
Answer: B. Immigration, Refugees and Citizenship Canada (IRCC)

378.
True or False:
Permanent residents can apply for citizenship after living in Canada for at least 3 of the last 5 years.
Answer: True

379.
Multiple Choice:
Which of the following is not required to apply for Canadian citizenship?
A. Knowledge of English or French
B. Clean criminal record
C. University degree
D. Physical presence in Canada
Answer: C. University degree

380.
True or False:
Citizenship applicants must pass a written test and an interview.
Answer: True

381.
Multiple Choice:
What is the main purpose of a citizenship ceremony?
A. Renew PR card
B. Travel outside Canada
C. Take the Oath of Citizenship
D. Apply for employment
Answer: C. Take the Oath of Citizenship

382.
True or False:
The citizenship oath must be taken in English and French.
Answer: False
(The oath must be taken in either English or French.)

383.
Multiple Choice:
Which leader signs the Canadian Citizenship Certificate?
A. The Prime Minister
B. The King
C. The Minister of Immigration
D. The Governor General
Answer: C. The Minister of Immigration

384.
True or False:
The citizenship certificate proves your right to vote.
Answer: True

385.
Multiple Choice:
Which Canadian law protects freedom of thought and religion?
A. Civil Liberties Act
B. Canadian Rights Law
C. Charter of Rights and Freedoms
D. Citizenship and Equality Act
Answer: C. Charter of Rights and Freedoms

386.
True or False:
Freedom of peaceful assembly is a guaranteed right in Canada.
Answer: True

387.
Multiple Choice:
How many provinces are in Canada?
A. 10
B. 12
C. 13
D. 15
Answer: A. 10

388.
True or False:
Yukon is one of the 10 provinces.
Answer: False
(Yukon is a territory.)

389.
Multiple Choice:
What is the total number of territories in Canada?
A. 2
B. 3
C. 4
D. 5
Answer: B. 3

390.
True or False:
The territories are governed identically to the provinces.
Answer: False
(Territories have fewer constitutional powers than provinces.)

391.
Multiple Choice:
What does the red maple leaf symbolize in Canada?
A. Religion
B. French heritage
C. Unity and peace
D. Wildlife conservation
Answer: C. Unity and peace

392.
True or False:
The maple leaf was adopted as Canada’s official symbol in 1965.
Answer: True

393.
Multiple Choice:
Which body ensures laws are applied equally in Canada?
A. Legislative Assembly
B. Canadian Police
C. Judiciary
D. Tax Authority
Answer: C. Judiciary

394.
True or False:
Canadian judges must belong to a political party.
Answer: False
(Judges must be independent and impartial.)

395.
Multiple Choice:
Which of the following is a federal responsibility?
A. Education
B. Health services
C. Citizenship and immigration
D. Road maintenance
Answer: C. Citizenship and immigration

396.
True or False:
Only provinces handle immigration.
Answer: False
(Immigration is a federal responsibility, though provinces and territories can have agreements with the federal government.)

397.
Multiple Choice:
What is the national police force that operates in Yukon?
A. OPP
B. RCMP
C. CSIS
D. YSP
Answer: B. RCMP

398.
True or False:
The RCMP serves as Yukon’s territorial police.
Answer: True

399.
Multiple Choice:
Which province is directly south of Yukon?
A. Manitoba
B. Alberta
C. British Columbia
D. Saskatchewan
Answer: C. British Columbia

400.
True or False:
Yukon borders both Alaska and British Columbia.
Answer: True
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Yukon.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Yukon.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $yukon->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Yukon citizenship questions.");
    }
}
