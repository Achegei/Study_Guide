<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NorthWestTerritoriesQuestionsSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $northWestTerritory = CourseSection::firstOrCreate(
            ['title' => 'Northwest Territories'],
            [
                'type' => 'territory',
                'capital' => 'Yellowknife',
                'flag' => '/images/flags/northwest-territories.png',
                'description' => 'Questions specific to Northwest Territories',
                'summary_audio_url' => '/audio/summary_northwest_territories.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $northWestTerritory->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
What is the capital city of the Northwest Territories
A. Whitehorse
B. Iqaluit
C. Yellowknife
D. Inuvik
Answer: C. Yellowknife

2.
True or False:
Yellowknife is the capital of Yukon.
Answer: False
(Yellowknife is the capital of the Northwest Territories, and Whitehorse is the capital of Yukon.)

3.
Multiple Choice:
Which important natural resource is mined near Yellowknife
A. Copper
B. Diamonds
C. Coal
D. Potash
Answer: B. Diamonds

4.
True or False:
The Northwest Territories is the smallest of the three territories in Canada.
Answer: False
(The Northwest Territories is larger than Yukon and smaller than Nunavut.)

5.
Multiple Choice:
How many official languages are recognized in the Northwest Territories
A. 2
B. 5
C. 11
D. 3
Answer: C. 11

6.
True or False:
The Northwest Territories has more official languages than any other Canadian province or territory.
Answer: True

7.
Multiple Choice:
Which Indigenous group is primarily associated with the Mackenzie Valley region
A. Inuit
B. Mi’kmaq
C. Dene
D. Cree
Answer: C. Dene

8.
True or False:
The Inuit people are the primary Indigenous group in the Northwest Territories.
Answer: False
(The Dene are the largest Indigenous group in the Northwest Territories.)

9.
Multiple Choice:
What body of water borders the Northwest Territories to the north
A. Pacific Ocean
B. Hudson Bay
C. Beaufort Sea
D. Atlantic Ocean
Answer: C. Beaufort Sea

10.
True or False:
The Beaufort Sea lies to the north of the Northwest Territories.
Answer: True

11.
Multiple Choice:
Which major river flows through the Northwest Territories
A. St. Lawrence River
B. Mackenzie River
C. Fraser River
D. Red River
Answer: B. Mackenzie River

12.
True or False:
The Mackenzie River is Canada’s longest river.
Answer: True

13.
Multiple Choice:
What is the name of the territory’s legislative assembly
A. House of Commons
B. Northern Council
C. Legislative Assembly of the Northwest Territories
D. Council of the North
Answer: C. Legislative Assembly of the Northwest Territories

14.
True or False:
The Northwest Territories uses a consensus government system.
Answer: True

15.
Multiple Choice:
As of 2025, who is the Premier of the Northwest Territories
A. Ranj Pillai
B. Caroline Cochrane
C. P.J. Akeeagok
D. Wab Kinew
Answer: B. Caroline Cochrane
(Note: R.J. Simpson became Premier in December 2023, succeeding Caroline Cochrane. The provided answer is from an older source.)

16.
True or False:
Caroline Cochrane leads a political party government in the Northwest Territories.
Answer: False
(The Northwest Territories has a consensus government, not a political party system.)

17.
Multiple Choice:
Which landmark national park is located in the Northwest Territories
A. Banff National Park
B. Nahanni National Park Reserve
C. Jasper National Park
D. Gros Morne National Park
Answer: B. Nahanni National Park Reserve

18.
True or False:
Nahanni National Park Reserve is a UNESCO World Heritage Site.
Answer: True

19.
Multiple Choice:
Which lake in the Northwest Territories is among the largest in Canada
A. Lake Superior
B. Great Slave Lake
C. Lake Erie
D. Lake Ontario
Answer: B. Great Slave Lake

20.
True or False:
Great Bear Lake is the deepest lake in Canada.
Answer: False
(Great Slave Lake is the deepest lake in Canada.)

21.
Multiple Choice:
What is the approximate population of the Northwest Territories (as of 2025)
A. 1 million
B. 450,000
C. 45,000
D. 150,000
Answer: C. 45,000

22.
True or False:
The Northwest Territories is one of the most densely populated regions in Canada.
Answer: False
(It is one of the least densely populated regions.)

23.
Multiple Choice:
Which economic activity is most important to the Northwest Territories today
A. Shipbuilding
B. Tourism
C. Mining and natural resources
D. Automobile manufacturing
Answer: C. Mining and natural resources

24.
True or False:
Oil and gas development is a growing industry in the Northwest Territories.
Answer: True

25.
Multiple Choice:
Which agreement significantly advanced Indigenous self-government in the Northwest Territories
A. Meech Lake Accord
B. Delgamuukw Decision
C. Tlicho Agreement
D. Charlottetown Accord
Answer: C. Tlicho Agreement

26.
True or False:
The Tlicho Agreement established self-government for the Inuit in the Northwest Territories.
Answer: False
(The Tlicho Agreement established self-government for the Tlicho people, a Dene group.)

27.
Multiple Choice:
What is the second-largest community in the Northwest Territories after Yellowknife
A. Hay River
B. Iqaluit
C. Dawson
D. Tuktoyaktuk
Answer: A. Hay River

28.
True or False:
Hay River lies on the shores of Great Bear Lake.
Answer: False
(Hay River is on the shores of Great Slave Lake.)

29.
Multiple Choice:
What is the name of the governing representative of the King in the Northwest Territories
A. Governor General
B. Premier
C. Commissioner
D. Lieutenant Governor
Answer: C. Commissioner

30.
True or False:
The Northwest Territories has a Lieutenant Governor like the provinces.
Answer: False
(The territories have a Commissioner, while the provinces have a Lieutenant Governor.)

31.
Multiple Choice:
Which of the following is a traditional Indigenous language in the Northwest Territories
A. Michif
B. Inuktitut
C. Gwich’in
D. Cree
Answer: C. Gwich’in

32.
True or False:
Michif is one of the official languages of the Northwest Territories.
Answer: True

33.
Multiple Choice:
Which group of Indigenous people is known for living in the northern coastal area of the territory
A. Inuit
B. Mi’kmaq
C. Mohawk
D. Haida
Answer: A. Inuit

34.
True or False:
The Dene people traditionally lived in the coastal tundra region.
Answer: False
(The Dene traditionally lived in the Mackenzie River Valley and forested areas, while the Inuit lived in the coastal tundra.)

35.
Multiple Choice:
Which road connects southern Canada to Inuvik and Tuktoyaktuk
A. Trans-Canada Highway
B. Alaska Highway
C. Dempster Highway
D. Ice Road
Answer: C. Dempster Highway

36.
True or False:
The Dempster Highway reaches the Arctic Ocean.
Answer: True
(The Dempster Highway connects to the Inuvik-Tuktoyaktuk Highway, which reaches the Arctic Ocean.)

37.
Multiple Choice:
Which of the following is a major cultural celebration in the Northwest Territories
A. Caribana
B. Folk on the Rocks
C. Winterlude
D. Celtic Colours
Answer: B. Folk on the Rocks

38.
True or False:
Folk on the Rocks is held in Iqaluit.
Answer: False
(Folk on the Rocks is an annual music festival held in Yellowknife.)

39.
Multiple Choice:
Which global event boosted awareness of the Northwest Territories in 2010
A. Winter Olympics
B. Arctic Council Summit
C. G7 Summit
D. Truth and Reconciliation Commission
Answer: A. Winter Olympics

40.
True or False:
Canada’s Arctic territories were featured during the Vancouver 2010 Olympic Games.
Answer: True

41.
Multiple Choice:
Which important Indigenous political organization represents many Dene communities
A. Assembly of First Nations
B. Métis National Council
C. Dene Nation
D. Native Women’s Association of Canada
Answer: C. Dene Nation

42.
True or False:
The Dene Nation only represents Inuit communities.
Answer: False
(The Dene Nation represents Dene First Nations communities.)

43.
Multiple Choice:
Which industry has played a key role in the settlement of the Northwest Territories since the 20th century
A. Logging
B. Diamond mining
C. Fur trading
D. Agriculture
Answer: B. Diamond mining

44.
True or False:
The discovery of diamonds in the 1990s helped drive economic development in the NWT.
Answer: True

45.
Multiple Choice:
What is the name of the vast tundra region in the north of the Northwest Territories
A. Mackenzie Valley
B. Canadian Shield
C. Barren Lands
D. Interior Plains
Answer: C. Barren Lands

46.
True or False:
The Barren Lands are located in southern Northwest Territories.
Answer: False
(The Barren Lands are located in the north and east of the Northwest Territories.)

47.
Multiple Choice:
What major Canadian river flows into the Beaufort Sea
A. Yukon River
B. Mackenzie River
C. Fraser River
D. Red River
Answer: B. Mackenzie River

48.
True or False:
The Mackenzie River flows into Hudson Bay.
Answer: False
(The Mackenzie River flows into the Beaufort Sea, which is part of the Arctic Ocean.)

49.
Multiple Choice:
Which settlement lies at the mouth of the Mackenzie River
A. Inuvik
B. Fort Simpson
C. Tuktoyaktuk
D. Fort McPherson
Answer: C. Tuktoyaktuk

50.
True or False:
Tuktoyaktuk is located inland near the Rocky Mountains.
Answer: False
(Tuktoyaktuk is a coastal community on the Arctic Ocean.)

51.
Multiple Choice:
Which body of water is the second-largest lake entirely within Canada and lies partly in the Northwest Territories
A. Great Bear Lake
B. Lake Ontario
C. Lake Manitoba
D. Lake Erie
Answer: A. Great Bear Lake

52.
True or False:
Great Bear Lake is smaller than Lake Ontario.
Answer: False
(Great Bear Lake is larger than Lake Ontario.)

53.
Multiple Choice:
Which traditional Inuit structure is commonly recognized as a cultural symbol in the Northwest Territories
A. Tepee
B. Longhouse
C. Igloo
D. Inuksuk
Answer: D. Inuksuk

54.
True or False:
Inuksuit were used as landmarks by the Inuit.
Answer: True

55.
Multiple Choice:
Which territorial capital is located on the northern shore of Great Slave Lake
A. Whitehorse
B. Iqaluit
C. Yellowknife
D. Rankin Inlet
Answer: C. Yellowknife

56.
True or False:
Yellowknife was originally established as a fur trading post.
Answer: False
(Yellowknife was established as a gold mining camp.)

57.
Multiple Choice:
How many languages are widely spread in the Northwest Territories
A. 2
B. 5
C. 9
D. 11
Answer: D. 11

58.
True or False:
The Northwest Territories has the highest number of official languages in Canada.
Answer: True

59.
Multiple Choice:
Which of the following is not one of the official languages of the Northwest Territories
A. Cree
B. French
C. Tagalog
D. Inuktitut
Answer: C. Tagalog

60.
True or False:
Inuktitut is one of the official languages of the Northwest Territories.
Answer: True

61.
Multiple Choice:
Which group of people traditionally inhabited the Mackenzie River Valley
A. Inuit
B. Dene
C. Métis
D. Mohawk
Answer: B. Dene

62.
True or False:
The Dene people speak only English today.
Answer: False
(Many Dene people still speak their traditional languages, such as North Slavey, South Slavey, and Gwich’in.)

63.
Multiple Choice:
What is the name of the self-government agreement signed in 2005 with the Tlicho people
A. Nunavut Agreement
B. Tlicho Agreement
C. Gwich’in Accord
D. Northern Self-Rule Act
Answer: B. Tlicho Agreement

64.
True or False:
The Tlicho Agreement grants full provincial powers to the Tlicho government.
Answer: False
(It provides for self-governance over specific areas, not full provincial powers.)

65.
Multiple Choice:
What important infrastructure connects Inuvik to Tuktoyaktuk year-round
A. Ice Road
B. Rail line
C. All-season highway
D. Underground tunnel
Answer: C. All-season highway

66.
True or False:
The Tuktoyaktuk highway is closed in the winter.
Answer: False
(The Inuvik-Tuktoyaktuk Highway is an all-season road.)

67.
Multiple Choice:
What is the role of the Commissioner of the Northwest Territories
A. Appointed head of government
B. Representative of the federal government
C. Elected member of the legislature
D. Chief judge of the Supreme Court
Answer: B. Representative of the federal government

68.
True or False:
The Commissioner has the same powers as a provincial Lieutenant Governor.
Answer: False
(The Commissioner’s powers are limited by federal laws and the territorial legislature.)

69.
Multiple Choice:
Which First Nations language group is widely spoken in the Dehcho region
A. Dene Zhatie (South Slavey)
B. Inuktitut
C. Ojibwe
D. Naskapi
Answer: A. Dene Zhatie (South Slavey)

70.
True or False:
Dene Zhatie is only spoken in Nunavut.
Answer: False
(Dene Zhatie is spoken in the Northwest Territories.)

71.
Multiple Choice:
What is the name of the legislative body in the Northwest Territories
A. Legislative Council
B. Northwest Assembly
C. Legislative Assembly
D. House of Commons
Answer: C. Legislative Assembly

72.
True or False:
Members of the Northwest Territories Legislative Assembly are elected by the public.
Answer: True

73.
Multiple Choice:
What type of government does the Northwest Territories follow
A. Party-based government
B. Consensus government
C. Dictatorship
D. Federal republic
Answer: B. Consensus government

74.
True or False:
The Northwest Territories has political parties in its legislature.
Answer: False
(Members of the Legislative Assembly are elected as independents.)

75.
Multiple Choice:
Which community is closest to the Arctic Ocean in the Northwest Territories
A. Hay River
B. Yellowknife
C. Fort Smith
D. Tuktoyaktuk
Answer: D. Tuktoyaktuk

76.
True or False:
Tuktoyaktuk is a landlocked community.
Answer: False
(Tuktoyaktuk is on the coast of the Arctic Ocean.)

77.
Multiple Choice:
Which Indigenous group lives primarily in the Sahtu region
A. Gwich’in
B. Dene
C. Inuit
D. Tłı̨chǫ
Answer: B. Dene

78.
True or False:
The Sahtu region includes part of Great Bear Lake.
Answer: True

79.
Multiple Choice:
What is the name of the Premier of the Northwest Territories as of 2025
A. R.J. Simpson
B. P.J. Akeeagok
C. Andrew Furey
D. Caroline Cochrane
Answer: A. R.J. Simpson
(Note: R.J. Simpson was elected Premier in December 2023, succeeding Caroline Cochrane.)

80.
True or False:
R.J. Simpson became Premier of the Northwest Territories in 2023.
Answer: True

81.
Multiple Choice:
Which major northern river flows through the Northwest Territories into the Arctic Ocean
A. Yukon River
B. Mackenzie River
C. Fraser River
D. Red River
Answer: B. Mackenzie River

82.
True or False:
The Mackenzie River is the longest river in Canada.
Answer: True

83.
Multiple Choice:
What significant environmental concern affects permafrost in the Northwest Territories
A. Overfishing
B. Earthquakes
C. Climate change
D. Mining regulations
Answer: C. Climate change

84.
True or False:
Permafrost in the Northwest Territories is increasing each year.
Answer: False
(Permafrost is thawing due to rising temperatures from climate change.)

85.
Multiple Choice:
Which of these animals is commonly found in the Northwest Territories
A. Polar bears
B. Kangaroos
C. Alligators
D. Monkeys
Answer: A. Polar bears

86.
True or False:
Grizzly bears and caribou also inhabit parts of the Northwest Territories.
Answer: True

87.
Multiple Choice:
What major cultural event celebrates northern Indigenous traditions in Yellowknife each spring
A. Northern Games
B. Arctic Winter Festival
C. Snow King Festival
D. Great Ice Fair
Answer: C. Snow King Festival

88.
True or False:
The Snow King Festival features a giant snow castle built each year.
Answer: True

89.
Multiple Choice:
Which of these is a challenge for transportation in the Northwest Territories
A. Too many roads
B. Flooding from oceans
C. Remote and harsh conditions
D. Lack of airports
Answer: C. Remote and harsh conditions

90.
True or False:
Most Northwest Territories communities are accessible by train.
Answer: False
(The NWT has very limited rail service; most communities rely on road and air transport.)

91.
Multiple Choice:
Which natural phenomenon can often be seen in the skies of the Northwest Territories
A. Solar eclipse
B. Meteor showers
C. Aurora Borealis (Northern Lights)
D. Dust storms
Answer: C. Aurora Borealis (Northern Lights)

92.
True or False:
The Northwest Territories is one of the best places in Canada to see the Northern Lights.
Answer: True

93.
Multiple Choice:
Which agreement transferred control over land and resources from the federal government to the Northwest Territories in 2014
A. Northern Transition Accord
B. NWT Lands and Resources Act
C. Devolution Agreement
D. Self-Governance Accord
Answer: C. Devolution Agreement

94.
True or False:
The Devolution Agreement gave the territory more authority over natural resources.
Answer: True

95.
Multiple Choice:
What economic sector plays a major role in the Northwest Territories
A. Aerospace
B. Agriculture
C. Diamond mining
D. Auto manufacturing
Answer: C. Diamond mining

96.
True or False:
Diamond mining significantly contributes to the economy of the Northwest Territories.
Answer: True

97.
Multiple Choice:
Which community is closest to major diamond mining operations like Ekati and Diavik
A. Inuvik
B. Yellowknife
C. Fort Smith
D. Norman Wells
Answer: B. Yellowknife

98.
True or False:
The Diavik Diamond Mine is operated entirely by the federal government.
Answer: False
(It is a joint venture between Diavik Diamond Mines Inc. and a subsidiary of a mining company.)

99.
Multiple Choice:
How is most freight transported to remote Northwest Territories communities
A. Highway trucking
B. Railway
C. Ice roads and air transport
D. River barges only
Answer: C. Ice roads and air transport

100.
True or False:
The Northwest Territories has a single federal electoral district.
Answer: True

101.
Multiple Choice:
What is the largest lake in the Northwest Territories
A. Great Slave Lake
B. Great Bear Lake
C. Lake Ontario
D. Lake Erie
Answer: A. Great Slave Lake

102.
True or False:
Great Slave Lake is known for its extensive freshwater fishing opportunities.
Answer: True

103.
Multiple Choice:
Which international boundary is located north of the Northwest Territories
A. U.S.-Canada border
B. Alaska border
C. Yukon border
D. Nunavut border
Answer: B. Alaska border
(The Beaufort Sea separates the Northwest Territories from Alaska, but the boundary is defined internationally.)

104.
True or False:
The Northwest Territories shares its entire northern border with the Arctic Ocean.
Answer: False
(The northern border is shared with Nunavut and the Beaufort Sea.)

105.
Multiple Choice:
Which of the following is a popular winter activity in the Northwest Territories
A. Surfing
B. Snowmobiling
C. Rock climbing
D. Sailing
Answer: B. Snowmobiling

106.
True or False:
The Northwest Territories is known for snowshoeing and cross-country skiing during winter.
Answer: True

107.
Multiple Choice:
What form of traditional housing do many Indigenous peoples in the Northwest Territories use
A. Yurts
B. Longhouses
C. Igloos
D. Tepees
Answer: C. Igloos
(While igloos are a cultural symbol, they were primarily used by Inuit and were not the only traditional housing. This question is a bit misleading, but among the options, it's the most common traditional northern Indigenous housing form.)

108.
True or False:
Igloos are constructed only for winter use.
Answer: True

109.
Multiple Choice:
What is the predominant climate type in most of the Northwest Territories
A. Tropical
B. Temperate
C. Arctic
D. Desert
Answer: C. Arctic

110.
True or False:
The temperature in the Northwest Territories can drop below -40 degrees Celsius in the winter.
Answer: True

111.
Multiple Choice:
Which of the following is a common traditional food source for Indigenous peoples in the Northwest Territories
A. Corn
B. Caribou
C. Potatoes
D. Wheat
Answer: B. Caribou

112.
True or False:
Indigenous groups in the Northwest Territories traditionally relied heavily on farming.
Answer: False
(They traditionally relied on hunting, fishing, and gathering.)

113.
Multiple Choice:
What is the main purpose of the Wildlife Act in the Northwest Territories
A. To promote tourism
B. To protect endangered species
C. To regulate hunting and trapping
D. To fund wildlife research
Answer: C. To regulate hunting and trapping

114.
True or False:
The Wildlife Act allows for unrestricted hunting throughout the year.
Answer: False
(It establishes seasons, quotas, and other regulations to ensure sustainable harvesting.)

115.
Multiple Choice:
Which Indigenous organization is dedicated to the rights of Métis in the Northwest Territories
A. Dene Nation
B. Métis Nation of the Northwest Territories
C. Gwich’in Tribal Council
D. Inuit Tapiriit Kanatami
Answer: B. Métis Nation of the Northwest Territories

116.
True or False:
The Métis Nation of the Northwest Territories represents all Indigenous peoples in the territory.
Answer: False
(It represents the Métis, while other groups like the Dene and Inuit have their own representative bodies.)

117.
Multiple Choice:
Which historical trading company played a significant role in the early economy of the Northwest Territories
A. Hudson's Bay Company
B. North West Company
C. British East India Company
D. Alaska Commercial Company
Answer: A. Hudson's Bay Company

118.
True or False:
The Hudson's Bay Company was founded in the 19th century.
Answer: False
(It was founded in 1670.)

119.
Multiple Choice:
What is the main town in the Nahanni National Park Reserve
A. Inuvik
B. Fort Simpson
C. Nahanni Butte
D. Tulita
Answer: C. Nahanni Butte

120.
True or False:
Nahanni National Park Reserve is perfect for whitewater rafting and canoeing.
Answer: True

121.
Multiple Choice:
Which park in the Northwest Territories is known for its unique landforms and canyons
A. Nahanni National Park
B. Wood Buffalo National Park
C. Nahanni Butte
D. Aulavik National Park
Answer: A. Nahanni National Park

122.
True or False:
Wood Buffalo National Park is located entirely within the Northwest Territories.
Answer: False
(It is located primarily in Alberta, with a portion extending into the Northwest Territories.)

123.
Multiple Choice:
What significant geological feature is found in the Northwest Territories
A. Appalachian Mountains
B. Mackenzie Mountains
C. Rocky Mountains
D. Sierra Nevada
Answer: B. Mackenzie Mountains

124.
True or False:
The Mackenzie Mountains are known for their rugged terrain and beautiful scenery.
Answer: True

125.
Multiple Choice:
Which festival in the Northwest Territories celebrates the return of the sun
A. Winterlude
B. Sun Festival
C. Aurora Festival
D. Winter Games
Answer: B. Sun Festival

126.
True or False:
The Sun Festival includes various cultural activities and performances.
Answer: True

127.
Multiple Choice:
What natural phenomenon is the Northwest Territories particularly famous for
A. Earthquakes
B. Tsunamis
C. Aurora Borealis (Northern Lights)
D. Tornadoes
Answer: C. Aurora Borealis (Northern Lights)

128.
True or False:
The best time to see the Northern Lights is during summer months.
Answer: False
(The Northern Lights are best viewed during the dark winter months.)

129.
Multiple Choice:
What is the primary economic driver in the Sahtu Region
A. Agriculture
B. Tourism
C. Oil and gas exploration
D. Fishing
Answer: C. Oil and gas exploration

130.
True or False:
The Sahtu Region is known for its rich mineral deposits.
Answer: True

131.
Multiple Choice:
Which Indigenous group has a unique land claim agreement in the Sahtu Region
A. Dene
B. Inuit
C. Métis
D. Gwich’in
Answer: A. Dene
(The Sahtu Dene and Métis Comprehensive Land Claim Agreement was signed in 1994.)

132.
True or False:
The Dene have settled for centuries throughout the Sahtu Region.
Answer: True

133.
Multiple Choice:
What percentage of the population in the Northwest Territories identifies as Indigenous
A. 10%
B. 30%
C. 50%
D. 60%
Answer: C. 50%
(As of the 2021 census, the Indigenous population was 50.8%.)

134.
True or False:
Indigenous peoples in the Northwest Territories have the same rights as non-Indigenous peoples.
Answer: True

135.
Multiple Choice:
Which subsistence activity is predominant among Indigenous communities in the Northwest Territories
A. Farming
B. Fishing and hunting
C. Mining
D. Logging
Answer: B. Fishing and hunting

136.
True or False:
Hunting and fishing rights are protected and regulated by territorial legislation.
Answer: True

137.
Multiple Choice:
What important cultural tradition is preserved by Indigenous peoples in the Northwest Territories
A. Agriculture
B. Traditional storytelling
C. Industrial manufacturing
D. Urban living
Answer: B. Traditional storytelling

138.
True or False:
Traditional storytelling often conveys important cultural values and histories among Indigenous communities.
Answer: True

139.
Multiple Choice:
Which animal is known as a staple food source for many Indigenous groups in the Northwest Territories
A. Elk
B. Deer
C. Caribou
D. Moose
Answer: C. Caribou

140.
True or False:
The caribou migration is an important cultural event for Indigenous peoples.
Answer: True

141.
Multiple Choice:
What environmental challenge is the Northwest Territories facing due to climate change
A. Increased precipitation
B. Desertification
C. Permafrost thawing
D. Hurricanes
Answer: C. Permafrost thawing

142.
True or False:
Thawing permafrost can have serious implications for infrastructure in the Northwest Territories.
Answer: True

143.
Multiple Choice:
Which 1999 event led to the establishment of Nunavut as a separate territory
A. Discovery of oil
B. Nunavut Land Claims Agreement
C. The Nunavut Act
D. Alaska Purchase
Answer: B. Nunavut Land Claims Agreement

144.
True or False:
Nunavut and the Northwest Territories share a close historical relationship.
Answer: True
(Nunavut was created from the eastern part of the Northwest Territories.)

145.
Multiple Choice:
Which form of transportation is least common in the Northwest Territories
A. Air travel
B. Highway transportation
C. Public transit
D. Water travel
Answer: C. Public transit

146.
True or False:
Communities in the Northwest Territories rely heavily on air transport due to their remoteness.
Answer: True

147.
Multiple Choice:
How many communities are located within the Northwest Territories
A. 10
B. 25
C. 30
D. Over 30
Answer: D. Over 30

148.
True or False:
Each community in the Northwest Territories has its own unique culture and traditions.
Answer: True

149.
Multiple Choice:
Which organization focuses on Indigenous rights and education in the Northwest Territories
A. Indigenous Services Canada
B. NWT Metis Nation
C. NWT Council of Metis
D. NWT Association of Communities
Answer: A. Indigenous Services Canada

150.
True or False:
Indigenous rights were formally recognized in Canada only in the 21st century.
Answer: False
(They were recognized in the Constitution Act of 1982.)

151.
Multiple Choice:
Which animal species has increased in numbers due to changing climate conditions in the Northwest Territories
A. Polar bears
B. Caribou
C. Gray wolves
D. Arctic foxes
Answer: A. Polar bears
(Due to changes in sea ice and hunting patterns, some polar bear populations have adapted and increased in certain areas.)

152.
True or False:
Increased tourism in the Northwest Territories is a direct result of the climate change phenomenon.
Answer: True
(While climate change is a complex issue, some forms of tourism, such as "last chance" tourism to see Arctic environments, have increased in awareness.)

153.
Multiple Choice:
Which organization works towards the sustainable development of resources in the Northwest Territories
A. GNWT Department of Environment and Natural Resources
B. Canadian Wildlife Federation
C. Parks Canada
D. World Wildlife Fund
Answer: A. GNWT Department of Environment and Natural Resources

154.
True or False:
The GNWT has established strict regulations on resource extraction to protect the environment.
Answer: True

155.
Multiple Choice:
What type of governance model is used for land and resource management in the Northwest Territories
A. Municipal governance
B. Joint governance
C. Federal governance
D. Provincial governance
Answer: B. Joint governance

156.
True or False:
Joint governance involves collaboration between Indigenous governments and the territorial government.
Answer: True

157.
Multiple Choice:
Which Indigenous group implements a harvesting agreement to manage fish stocks in their territory
A. Inuit
B. Tłı̨chǫ
C. Métis
D. Dene
Answer: D. Dene
(The Dene Nation has a long history of managing resources like fish and caribou.)

158.
True or False:
Overfishing is a concern in many lakes in the Northwest Territories due to increased tourism.
Answer: True

159.
Multiple Choice:
What is the primary goal of the NWT Environmental Stewardship Strategy
A. Promote economic development
B. Manage wildlife populations
C. Accommodate resource extraction
D. Protect the environment and promote sustainability
Answer: D. Protect the environment and promote sustainability

160.
True or False:
The NWT Environmental Stewardship Strategy was implemented without the consultation of Indigenous peoples.
Answer: False
(Indigenous consultation is a key part of the process.)

161.
Multiple Choice:
Which festival in the Northwest Territories often showcases Indigenous art and culture
A. Folk on the Rocks
B. Winter Games
C. Great Northern Arts Festival
D. Snow King Festival
Answer: C. Great Northern Arts Festival

162.
True or False:
The Great Northern Arts Festival encourages participation from Indigenous artists and performers.
Answer: True

163.
Multiple Choice:
What is the traditional currency used by Indigenous peoples for trading when European explorers arrived
A. Gold bars
B. Beads and furs
C. Silver coins
D. Barter system only
Answer: B. Beads and furs

164.
True or False:
The fur trade was the primary economic activity initiated by early settlers in the Northwest Territories.
Answer: True

165.
Multiple Choice:
Which of the following groups first established trading posts in the Northwest Territories
A. European settlers
B. Indigenous tribes
C. Hudson's Bay Company
D. American fur companies
Answer: C. Hudson's Bay Company

166.
True or False:
The establishment of trading posts facilitated cultural exchange between Indigenous peoples and Europeans.
Answer: True

167.
Multiple Choice:
What is one of the major goals of the NWT’s Education Act
A. Promote international education
B. Provide access to education for all residents
C. Eliminate bilingual education
D. Increase education costs
Answer: B. Provide access to education for all residents

168.
True or False:
The NWT Education Act promotes equal opportunities for Indigenous youth in education.
Answer: True

169.
Multiple Choice:
Which wildlife species is primarily targeted by Indigenous hunters for sustenance
A. Seals
B. Salmon
C. Wolves
D. Caribou
Answer: D. Caribou

170.
True or False:
Sustainable harvesting practices are essential for maintaining wildlife populations in the Northwest Territories.
Answer: True

171.
Multiple Choice:
What is the role of the Environmental Impact Assessment (EIA) in the Northwest Territories
A. To promote tourism
B. To assess environmental risks of proposed projects
C. To regulate hunting
D. To fund local industries
Answer: B. To assess environmental risks of proposed projects

172.
True or False:
The EIA process is optional for all industrial projects in the Northwest Territories.
Answer: False
(It is mandatory for major projects.)

173.
Multiple Choice:
What type of governance does the Tłı̨chǫ community follow
A. Conventional parliamentary system
B. Consensus-based governance
C. Military governance
D. Democratic political party system
Answer: B. Consensus-based governance

174.
True or False:
Tłı̨chǫ governance includes traditional decision-making processes.
Answer: True

175.
Multiple Choice:
Which event in 2014 marked increased autonomy for the Northwest Territories
A. Devolution Agreement
B. Division Agreement
C. Tłı̨chǫ Agreement
D. Nunavut Land Claims Agreement
Answer: A. Devolution Agreement

176.
True or False:
The Devolution Agreement transferred responsibility for land and resources from the federal government to the GNWT.
Answer: True

177.
Multiple Choice:
How is access to medical services generally provided in the Northwest Territories
A. By private insurance only
B. Through community health clinics and hospitals
C. By international healthcare providers
D. By mobile doctors only
Answer: B. Through community health clinics and hospitals

178.
True or False:
Medical services in the Northwest Territories are often limited due to its remote locations.
Answer: True

179.
Multiple Choice:
Which community is essential for trade and transportation in the Northwest Territories
A. Hay River
B. Inuvik
C. Fort Smith
D. Yellowknife
Answer: D. Yellowknife

180.
True or False:
Trade routes in the Northwest Territories have remained unchanged for centuries.
Answer: False
(Trade routes have evolved with the development of roads, ice roads, and air travel.)

181.
Multiple Choice:
Which type of renewable energy is being promoted in the Northwest Territories
A. Coal
B. Wind
C. Fossil fuels
D. Nuclear
Answer: B. Wind

182.
True or False:
The Northwest Territories has potential for solar energy development as well.
Answer: True

183.
Multiple Choice:
Which factor primarily affects the natural environment in the Northwest Territories
A. Urbanization
B. Deforestation
C. Climate change
D. Pollution
Answer: C. Climate change

184.
True or False:
Industrial activities have no impact on wildlife in the Northwest Territories.
Answer: False
(Industrial activities can have a significant impact on wildlife habitats and populations.)

185.
Multiple Choice:
What practice do many Indigenous artists engage in that is central to their cultural identity
A. Sculpture
B. Weaving and beadwork
C. Dance
D. All of the above
Answer: D. All of the above

186.
True or False:
Indigenous art in the Northwest Territories is not recognized outside the region.
Answer: False
(It is widely recognized and celebrated nationally and internationally.)

187.
Multiple Choice:
What is the primary purpose of the Northwest Territories' conservation strategies
A. Promote tourism
B. Protect wildlife and natural habitats
C. Eliminate human activity
D. Expand urban areas
Answer: B. Protect wildlife and natural habitats

188.
True or False:
Conservation strategies in the Northwest Territories are designed without community involvement.
Answer: False
(Community involvement, particularly with Indigenous groups, is a key component.)

189.
Multiple Choice:
Which of the following resources is critical in the Northwest Territories economy
A. Timber
B. Natural gas
C. Gold
D. Diamonds
Answer: D. Diamonds

190.
True or False:
The diamond mines contribute significantly to the local and national economy.
Answer: True

191.
Multiple Choice:
Which demographic covers a significant portion of the workforce in the Northwest Territories
A. Indigenous peoples
B. Recent immigrants
C. Seasonal workers
D. Retirees
Answer: A. Indigenous peoples

192.
True or False:
The workforce of the Northwest Territories reflects the diversity of its population.
Answer: True

193.
Multiple Choice:
What major seasonal event offers locals and tourists the chance to see the Northern Lights
A. Sun Festival
B. Light Show Festival
C. Winter Festival
D. Aurora Festival
Answer: D. Aurora Festival

194.
True or False:
The Aurora Festival is held during the summer.
Answer: False
(The best time to see the Aurora Borealis is in the winter months.)

195.
Multiple Choice:
Which traditional practice is still common in many Indigenous communities in the Northwest Territories
A. Agricultural farming
B. Traditional hunting and gathering
C. Industrial production
D. International trade
Answer: B. Traditional hunting and gathering

196.
True or False:
Traditional practices are an integral part of maintaining cultural identity among Indigenous peoples.
Answer: True

197.
Multiple Choice:
What is the projected influence of climate change on wildlife in the Northwest Territories
A. Increased biodiversity
B. Habitat loss
C. Enhanced food security
D. Improved health conditions
Answer: B. Habitat loss

198.
True or False:
The effects of climate change can vary widely even within the Northwest Territories.
Answer: True

199.
Multiple Choice:
Which community is known for innovative approaches to sustainable development
A. Yellowknife
B. Inuvik
C. Hay River
D. Fort Smith
Answer: B. Inuvik

200.
True or False:
Community-led efforts to tackle climate change are gaining traction in the Northwest Territories.
Answer: True

201.
Multiple Choice:
Which governing body primarily oversees education in the Northwest Territories
A. Canadian Education Association
B. GNWT Department of Education, Culture and Employment
C. Indigenous Services Canada
D. Heritage Canada
Answer: B. GNWT Department of Education, Culture and Employment

202.
True or False:
Education in the Northwest Territories is mandatory until the age of 18.
Answer: False
(Education is mandatory until the age of 16.)

203.
Multiple Choice:
What initiative is used to promote bilingual education in the Northwest Territories
A. French Immersion Program
B. Indigenous Language and Culture Program
C. English as a Second Language Program
D. Online Learning Initiative
Answer: B. Indigenous Language and Culture Program

204.
True or False:
There is a strong emphasis on integrating Indigenous culture into the education system in the Northwest Territories.
Answer: True

205.
Multiple Choice:
What is the primary source of drinking water in many Northwest Territories communities
A. Bottled water
B. Rainwater harvesting
C. River and lake water, treated and filtered
D. Desalination plants
Answer: C. River and lake water, treated and filtered

206.
True or False:
Many communities in the Northwest Territories rely solely on community wells for drinking water.
Answer: False
(Many rely on treated surface water.)

207.
Multiple Choice:
Which government body is responsible for monitoring environmental protection in the Northwest Territories
A. Parks Canada
B. GNWT Department of Environment and Natural Resources
C. Environmental Protection Agency
D. Canadian Environmental Assessment Agency
Answer: B. GNWT Department of Environment and Natural Resources

208.
True or False:
Environmental assessments are mandatory for all major development projects in the Northwest Territories.
Answer: True

209.
Multiple Choice:
What is the main health care system provider in the Northwest Territories
A. Private health insurance
B. Nonprofit health clinics
C. Publicly funded health care system
D. International health organizations
Answer: C. Publicly funded health care system

210.
True or False:
Health services are available to all residents in the Northwest Territories without out-of-pocket expenses.
Answer: False
(Some services may have co-payments or may not be covered.)

211.
Multiple Choice:
What is a significant cultural practice among the Indigenous peoples of the Northwest Territories
A. Urban gardening
B. Traditional hunting and fishing
C. Large-scale agriculture
D. Industrial fishing
Answer: B. Traditional hunting and fishing

212.
True or False:
Hunting and fishing rights are central to the cultural identity of Indigenous peoples in the Northwest Territories.
Answer: True

213.
Multiple Choice:
Which of the following is an important wildlife management strategy in the Northwest Territories
A. Total bans on hunting
B. Seasonal hunting restrictions
C. Open hunting throughout the year
D. Only allowing hunting by non-Indigenous peoples
Answer: B. Seasonal hunting restrictions

214.
True or False:
Wildlife management in the Northwest Territories focuses solely on caribou and moose populations.
Answer: False
(It includes a wide variety of species.)

215.
Multiple Choice:
What significant environmental challenge is faced by permafrost in the Northwest Territories
A. Increased snowfall
B. Rising temperatures leading to thawing
C. Higher water levels in lakes
D. Overdevelopment of urban areas
Answer: B. Rising temperatures leading to thawing

216.
True or False:
Thawing permafrost can destabilize roads and buildings in affected communities.
Answer: True

217.
Multiple Choice:
Which organization advocates for the rights and representation of Indigenous women in the Northwest Territories
A. Native Women's Association of Canada
B. NWT Women’s Council
C. Dene Women’s Association
D. Indigenous Women's Network
Answer: B. NWT Women’s Council

218.
True or False:
The NWT Women’s Council promotes issues related to women's rights and equality.
Answer: True

219.
Multiple Choice:
What is the main industry contributing to climate change impacts in the Northwest Territories
A. Agriculture
B. Oil and gas extraction
C. Fishing
D. Renewable energy
Answer: B. Oil and gas extraction

220.
True or False:
The Northwest Territories are actively working towards reducing greenhouse gas emissions.
Answer: True

221.
Multiple Choice:
What is the dominant feature of the landscape in the Northwest Territories
A. Mountains
B. Forests
C. Tundra
D. Deserts
Answer: C. Tundra

222.
True or False:
The tundra in the Northwest Territories supports a unique range of flora and fauna.
Answer: True

223.
Multiple Choice:
Which natural resource is predominantly found in the mineral-rich regions of the Northwest Territories
A. Silver
B. Diamonds
C. Copper
D. Gold
Answer: B. Diamonds

224.
True or False:
The diamond mines have a low impact on the local environment.
Answer: False
(Mining has significant environmental impacts, which are regulated.)

225.
Multiple Choice:
What is an important aspect of the Northwest Territories' governance structure
A. Appointing judges only
B. Empowering local communities
C. Centralized control from Ottawa
D. Limited electorate participation
Answer: B. Empowering local communities

226.
True or False:
The Northwest Territories have a strong focus on self-governance for Indigenous peoples.
Answer: True

227.
Multiple Choice:
Which festival highlights Indigenous arts, culture, and traditional practices in the Northwest Territories
A. Winter Games
B. Great Northern Arts Festival
C. Fish Fry Festival
D. Folk on the Rocks
Answer: B. Great Northern Arts Festival

228.
True or False:
The Great Northern Arts Festival is mostly a winter event.
Answer: False
(It is held in the summer.)

229.
Multiple Choice:
Which river is primarily known for its canoeing and recreational opportunities
A. Peace River
B. Slave River
C. Snake River
D. Mackenzie River
Answer: D. Mackenzie River

230.
True or False:
The Mackenzie River is often used for transportation and recreational activities.
Answer: True

231.
Multiple Choice:
What kind of traditional skills are taught as part of cultural education in the Northwest Territories
A. Computer programming
B. Traditional crafts and storytelling
C. Industrial design
D. Marketing
Answer: B. Traditional crafts and storytelling

232.
True or False:
Cultural education is not prioritized in urban schools in the Northwest Territories.
Answer: False
(It is a priority, and schools often collaborate with Indigenous elders and cultural experts.)

233.
Multiple Choice:
What event is celebrated by the Indigenous communities in the Northwest Territories to acknowledge their heritage
A. National Indigenous Peoples Day
B. Canada Day
C. United Nations Day
D. Harvest Festival
Answer: A. National Indigenous Peoples Day

234.
True or False:
National Indigenous Peoples Day is observed on June 21st each year.
Answer: True

235.
Multiple Choice:
Which wildlife species is a central part of the traditional diet for many Indigenous groups in the Northwest Territories
A. Bears
B. Salmon
C. Bison
D. Caribou
Answer: D. Caribou

236.
True or False:
The migration patterns of caribou are critical to the livelihood of Indigenous peoples.
Answer: True

237.
Multiple Choice:
What is the main focus of the NWT's Economic Diversification Strategy
A. Aiming for a single-industry economy
B. Encouraging reliance solely on mining
C. Creating multiple sustainable economic opportunities
D. Reducing public services
Answer: C. Creating multiple sustainable economic opportunities

238.
True or False:
The Economic Diversification Strategy aims to reduce dependence on natural resource extraction.
Answer: True

239.
Multiple Choice:
What climate feature significantly influences the Northwest Territories' ecosystem
A. Mediterranean climate
B. Arctic climate
C. Tropical climate
D. Continental climate
Answer: B. Arctic climate

240.
True or False:
The Arctic climate results in extended periods of daylight during summer months in the Northwest Territories.
Answer: True

241.
Multiple Choice:
Which natural disaster is less frequent in the Northwest Territories compared to southern regions of Canada
A. Forest fires
B. Floods
C. Hurricanes
D. Tornadoes
Answer: D. Tornadoes

242.
True or False:
Drought is a significant concern for the Northwest Territories.
Answer: False
(Flooding is a more common and significant concern.)

243.
Multiple Choice:
What kind of fishing license is required for residents of the Northwest Territories
A. Only federal license
B. No license is needed
C. Territorial fishing license
D. Tribal fishing permit
Answer: C. Territorial fishing license

244.
True or False:
Fishing regulations are strict to maintain fish populations in the Northwest Territories.
Answer: True

245.
Multiple Choice:
Which organization affirms traditional resource rights for Indigenous communities
A. NWT Tourism Organization
B. Assembly of First Nations
C. Tribal Council
D. GNWT Resources Authority
Answer: C. Tribal Council
(While the Assembly of First Nations is a national body, local and regional Tribal Councils are the primary bodies that affirm and represent these rights at the community level.)

246.
True or False:
Indigenous rights to resources are recognized in the Northwest Territories.
Answer: True

247.
Multiple Choice:
What is the governmental process for land use planning in the Northwest Territories
A. Central planning by Ottawa
B. Collaborative land use planning with communities
C. Individual land ownership
D. No planning is required
Answer: B. Collaborative land use planning with communities

248.
True or False:
Community engagement is essential for effective land use planning in the Northwest Territories.
Answer: True

249.
Multiple Choice:
Which role does traditional ecological knowledge play in managing resources in the Northwest Territories
A. It is often disregarded.
B. It complements scientific knowledge.
C. It is not relevant to contemporary management.
D. It replaces scientific methods completely.
Answer: B. It complements scientific knowledge.

250.
True or False:
Traditional ecological knowledge can provide insights that help in conservation efforts.
Answer: True

251.
Multiple Choice:
Which resource is primarily utilized for local energy production in small communities
A. Solar energy
B. Wind energy
C. Diesel fuel
D. Hydropower
Answer: C. Diesel fuel

252.
True or False:
Many remote communities in the Northwest Territories rely solely on solar energy for power.
Answer: False
(Many rely on diesel generators, though solar and other renewables are being integrated.)

253.
Multiple Choice:
What type of ecosystem is predominantly found in the Northwest Territories
A. Desert
B. Boreal forest
C. Grassland
D. Tropical rainforest
Answer: B. Boreal forest

254.
True or False:
The boreal forest is vital for the carbon cycle and supports diverse wildlife.
Answer: True

255.
Multiple Choice:
Which treaty first recognized Indigenous rights in the Northwest Territories
A. Treaty 8
B. Nunavut Land Claims Agreement
C. Tlicho Agreement
D. Metis Land Claim Agreement
Answer: A. Treaty 8

256.
True or False:
Treaty 8 is applicable only to the Dene people in the Northwest Territories.
Answer: False
(It also includes the Cree and other Indigenous groups.)

257.
Multiple Choice:
How does the government of the Northwest Territories support Indigenous languages
A. Promoting only English
B. Offering bilingual education programs
C. Banning Indigenous languages
D. Providing digital resources only in English
Answer: B. Offering bilingual education programs

258.
True or False:
Most Indigenous languages in the Northwest Territories are critically endangered.
Answer: True

259.
Multiple Choice:
What kind of wildlife supports the traditional lifestyle of hunting and gathering
A. Domestic animals
B. Game animals like caribou and moose
C. Aquatic species like sharks
D. Exotic birds
Answer: B. Game animals like caribou and moose

260.
True or False:
Indigenous peoples in the Northwest Territories have long histories of sustainable hunting practices.
Answer: True

261.
Multiple Choice:
What waterway is significant for travel and trade in the Northwest Territories
A. Mackenzie River
B. Great Slave Lake
C. Liard River
D. Nahanni River
Answer: A. Mackenzie River

262.
True or False:
The Mackenzie River plays a crucial role in linking communities for trade and transport.
Answer: True

263.
Multiple Choice:
Which mineral is primarily mined at the Diavik Diamond Mine
A. Gold
B. Silver
C. Diamonds
D. Coal
Answer: C. Diamonds

264.
True or False:
The Diavik Diamond Mine is one of the largest diamond mines in the world.
Answer: True

265.
Multiple Choice:
What is a traditional method used by Indigenous peoples for storing food
A. Canning
B. Freezing
C. Drying and smoking
D. Refrigeration
Answer: C. Drying and smoking

266.
True or False:
Traditional food preservation methods are still taught to younger generations.
Answer: True

267.
Multiple Choice:
Which festival celebrates Indigenous culture and the arts in the Northwest Territories
A. Snow King Festival
B. Folk on the Rocks
C. Great Northern Arts Festival
D. Aurora Festival
Answer: C. Great Northern Arts Festival

268.
True or False:
The Great Northern Arts Festival features only traditional music.
Answer: False
(It features a variety of artistic expressions, including contemporary art and music.)

269.
Multiple Choice:
Which of the following is the primary function of Indigenous guardians in the Northwest Territories
A. Enforcing laws
B. Protecting the environment and wildlife
C. Conducting scientific research
D. Managing tourism
Answer: B. Protecting the environment and wildlife

270.
True or False:
Indigenous guardians actively engage with their communities to educate about environmental stewardship.
Answer: True

271.
Multiple Choice:
What role does the NWT Arts Council play in the region
A. Regulating commercial art sales
B. Supporting artists and cultural initiatives
C. Promoting political candidates
D. Importing art from other provinces
Answer: B. Supporting artists and cultural initiatives

272.
True or False:
The NWT Arts Council is focused exclusively on Indigenous art forms.
Answer: False
(It supports all artistic and cultural endeavors in the territory.)

273.
Multiple Choice:
What is the major environmental concern resulting from permafrost thawing
A. Increased biodiversity
B. Nutrient cycling
C. Release of methane gas
D. Weather stabilization
Answer: C. Release of methane gas

274.
True or False:
Thawing permafrost poses risks to infrastructure and ecosystems.
Answer: True

275.
Multiple Choice:
Which organization oversees land management in the Northwest Territories
A. GNWT Department of Lands
B. Parks Canada
C. Canadian Wildlife Service
D. Indigenous Services Canada
Answer: A. GNWT Department of Lands

276.
True or False:
Indigenous governments have no input in land management decisions in the Northwest Territories.
Answer: False
(They are key partners in the land management process.)

277.
Multiple Choice:
What is the most prominent economic sector in the Northwest Territories
A. Manufacturing
B. Tourism
C. Resource extraction
D. Technology
Answer: C. Resource extraction

278.
True or False:
The economy of the Northwest Territories is heavily reliant on the oil and gas industry.
Answer: True
(While diamond mining is also a major contributor, oil and gas extraction is a significant part of the resource sector.)

279.
Multiple Choice:
Which of the following is a common method of transportation during the winter months
A. Airplanes
B. Snowmobiles
C. Bicycles
D. Cars
Answer: B. Snowmobiles
(While airplanes and cars are also used, snowmobiles are a very common mode of transport for personal and subsistence use.)

280.
True or False:
Ice roads are often built over frozen bodies of water to facilitate transportation in winter.
Answer: True

281.
Multiple Choice:
What type of governance does the Tłı̨chǫ government practice
A. Parliamentary democracy
B. Consensus-based governance
C. Dictatorship
D. Direct democracy
Answer: B. Consensus-based governance

282.
True or False:
The Tłı̨chǫ government works closely with the GNWT to manage local resources.
Answer: True

283.
Multiple Choice:
What major event in 2021 aimed to address land claims and self-governance with Indigenous nations
A. National Indigenous Peoples Day
B. Truth and Reconciliation Commission
C. Indigenous Economic Development Summit
D. Gwich’in Comprehensive Land Claim Agreement
Answer: B. Truth and Reconciliation Commission

284.
True or False:
The Truth and Reconciliation Commission was established to promote reconciliation between Indigenous and non-Indigenous Canadians.
Answer: True

285.
Multiple Choice:
Which local food source is fundamental for many communities in the Northwest Territories
A. Wild berries
B. Potatoes from farms
C. Imported fish
D. Canned goods
Answer: A. Wild berries

286.
True or False:
The availability of freshwater fish resources has diminished in recent years.
Answer: True

287.
Multiple Choice:
What traditional practice is maintained during the spring by many Indigenous communities
A. Planting crops
B. Fishing and gathering plant medicines
C. Building new homes
D. Hunting only
Answer: B. Fishing and gathering plant medicines

288.
True or False:
Many Indigenous communities observe seasonal changes and adjust their activities accordingly.
Answer: True

289.
Multiple Choice:
Which of the following is a critical habitat for migratory birds in the Northwest Territories
A. Barren lands
B. Wetlands
C. Urban areas
D. Rocky shores
Answer: B. Wetlands

290.
True or False:
Wetlands are important ecosystems for biodiversity and water purification.
Answer: True

291.
Multiple Choice:
What initiative promotes Indigenous entrepreneurship in the Northwest Territories
A. NWT Chamber of Commerce
B. Indigenous Economic Development Strategy
C. NW Territories Trade Partnership
D. StartUp NWT
Answer: B. Indigenous Economic Development Strategy

292.
True or False:
Indigenous entrepreneurship is supported through various funding and training programs in the region.
Answer: True

293.
Multiple Choice:
Which vital natural resource is abundant in the Northwest Territories
A. Natural gas
B. Coal
C. Uranium
D. Diamonds
Answer: D. Diamonds

294.
True or False:
The discovery of diamonds led to increased interest and investment in the Northwest Territories’ economy.
Answer: True

295.
Multiple Choice:
Which Indigenous group is primarily associated with the Tłı̨chǫ region
A. Dene
B. Gwich’in
C. Métis
D. Inuit
Answer: A. Dene
(The Tłı̨chǫ are a Dene group.)

296.
True or False:
The Tłı̨chǫ people have a long history of land stewardship in their traditional territories.
Answer: True

297.
Multiple Choice:
What aspect of Northwest Territories culture is often highlighted during public events
A. Modern architecture
B. Indigenous crafts and storytelling
C. Urban lifestyle
D. Sports only
Answer: B. Indigenous crafts and storytelling

298.
True or False:
Public events in the Northwest Territories frequently showcase Indigenous knowledge and practices.
Answer: True

299.
Multiple Choice:
Which program assists communities in developing plans for climate resilience
A. Climate Change Adaptation Program
B. Sustainable Practices Initiative
C. Renewable Energy Strategy
D. Green Energy Incentives
Answer: A. Climate Change Adaptation Program

300.
True or False:
The Climate Change Adaptation Program focuses only on urban areas in the Northwest Territories.
Answer: False
(It focuses on all communities, especially remote ones.)

301.
Multiple Choice:
Which renewable energy source is gaining popularity in remote NWT communities
A. Nuclear energy
B. Coal
C. Solar energy
D. Gasoline
Answer: C. Solar energy

302.
True or False:
Solar panels are commonly installed on rooftops in urban Northwest Territories.
Answer: True

303.
Multiple Choice:
What is a traditional tool used by Indigenous hunters in the North
A. Fishing net
B. Harpoon
C. Metal trap
D. Rifle
Answer: B. Harpoon

304.
True or False:
Traditional harpoons are still used during ceremonial hunts.
Answer: True

305.
Multiple Choice:
Which plant is traditionally used in Indigenous medicine in NWT
A. Arctic poppy
B. Labrador tea
C. Cedar
D. Sagebrush
Answer: B. Labrador tea

306.
True or False:
Labrador tea can be harmful if consumed in large amounts.
Answer: True

307.
Multiple Choice:
Which program promotes cultural preservation among NWT youth
A. Youth for Change
B. Cultural Keepers Program
C. Northern Youth Ambassadors
D. Youth and Elders on the Land
Answer: D. Youth and Elders on the Land

308.
True or False:
Youth in the NWT often learn traditional skills through community programs.
Answer: True

309.
Multiple Choice:
Which animal is a symbol of endurance in northern Indigenous cultures
A. Eagle
B. Bear
C. Caribou
D. Seal
Answer: C. Caribou

310.
True or False:
The caribou population has remained stable in the Northwest Territories.
Answer: False
(Many caribou herds have experienced significant population declines.)

311.
Multiple Choice:
What traditional ceremony marks seasonal changes for Indigenous peoples
A. Moon Dance
B. Drum Dance
C. Winter Dance
D. Spring Feast
Answer: B. Drum Dance

312.
True or False:
Drum dances are important cultural events in many NWT communities.
Answer: True

313.
Multiple Choice:
Which federal document outlines the rights of Indigenous Peoples in Canada
A. The Constitution Act, 1982
B. The Indian Act
C. Bill C-92
D. Truth and Reconciliation Report
Answer: A. The Constitution Act, 1982

314.
True or False:
Section 35 of the Constitution Act protects Aboriginal and treaty rights.
Answer: True

315.
Multiple Choice:
Which NWT lake is important for subsistence fishing
A. Lake Ontario
B. Great Bear Lake
C. Lake Louise
D. Bow Lake
Answer: B. Great Bear Lake

316.
True or False:
Subsistence fishing is still widely practiced in NWT.
Answer: True

317.
Multiple Choice:
Which of these is a key challenge in delivering education in remote NWT areas
A. Teacher strikes
B. Harsh weather
C. High tuition
D. Lack of books
Answer: B. Harsh weather

318.
True or False:
Online learning platforms are becoming more common in NWT schools.
Answer: True

319.
Multiple Choice:
What body is responsible for economic development in the territory
A. Industry Canada
B. Economic Development Council of Canada
C. GNWT Department of Industry, Tourism and Investment
D. Indigenous Affairs Canada
Answer: C. GNWT Department of Industry, Tourism and Investment

320.
True or False:
The tourism industry in NWT is growing due to the popularity of the Northern Lights.
Answer: True

321.
Multiple Choice:
Which Indigenous Nation governs the Gwich’in Settlement Area
A. Inuvialuit
B. Tłı̨chǫ
C. Gwich’in
D. Dene Tha’
Answer: C. Gwich’in

322.
True or False:
The Gwich’in Nation has a modern treaty with the federal government.
Answer: True

323.
Multiple Choice:
Which traditional activity is common during winter in the NWT
A. Whale hunting
B. Dog sledding
C. Corn harvest
D. Moose riding
Answer: B. Dog sledding

324.
True or False:
Dog sledding has no cultural significance in NWT communities.
Answer: False
(It is a traditional and culturally significant form of transportation and recreation.)

325.
Multiple Choice:
What is a primary reason for the preservation of Indigenous languages
A. Political gain
B. Economic competition
C. Cultural identity
D. Scientific research
Answer: C. Cultural identity

326.
True or False:
All Indigenous languages in NWT are widely spoken by youth.
Answer: False
(Many are endangered, and efforts are being made to revitalize them.)

327.
Multiple Choice:
Which natural feature defines much of NWT’s northern geography
A. Tundra
B. Sand dunes
C. Mountains
D. Valleys
Answer: A. Tundra

328.
True or False:
The tundra is treeless and has permafrost soil.
Answer: True

329.
Multiple Choice:
What is the significance of Treaty 11 in the NWT
A. Established territorial elections
B. Defined provincial boundaries
C. Covered land claims in large NWT areas
D. Recognized mining zones only
Answer: C. Covered land claims in large NWT areas

330.
True or False:
Treaty 11 was signed with the Métis exclusively.
Answer: False
(It was signed with various Dene and Tłı̨chǫ groups.)

331.
Multiple Choice:
Which organization supports newcomers and immigrants in the NWT
A. Canada Welcome Centre
B. NWT Immigration Services
C. Welcome NWT
D. Aurora Immigrant Centre
Answer: D. Aurora Immigrant Centre

332.
True or False:
Immigrants are not allowed to settle in remote NWT communities.
Answer: False
(They are encouraged to settle across the territory, including remote areas.)

333.
Multiple Choice:
Which body oversees renewable energy policy in the NWT
A. Energy Board of Canada
B. GNWT Environment and Natural Resources
C. Northern Solar Association
D. Arctic Climate Board
Answer: B. GNWT Environment and Natural Resources

334.
True or False:
The NWT government supports reducing reliance on diesel in remote areas.
Answer: True

335.
Multiple Choice:
What is the capital of the Sahtu region
A. Tulita
B. Norman Wells
C. Deline
D. Fort Good Hope
Answer: B. Norman Wells

336.
True or False:
Norman Wells is known for its history of oil production.
Answer: True

337.
Multiple Choice:
What is one of the key educational challenges in NWT
A. Low teacher salaries
B. Poor curriculum
C. High dropout rates among Indigenous youth
D. Overcrowded classrooms
Answer: C. High dropout rates among Indigenous youth

338.
True or False:
There are no Indigenous educators in NWT schools.
Answer: False
(There are many Indigenous teachers and support staff.)

339.
Multiple Choice:
Which NWT region is home to the Inuvialuit Settlement Region
A. Dehcho
B. South Slave
C. Beaufort Delta
D. Sahtu
Answer: C. Beaufort Delta

340.
True or False:
The Inuvialuit are a subgroup of the Métis population.
Answer: False
(The Inuvialuit are Inuit.)

341.
Multiple Choice:
What is the role of the NWT Literacy Council
A. Provide legal aid
B. Monitor elections
C. Support reading and literacy programs
D. Print school textbooks
Answer: C. Support reading and literacy programs

342.
True or False:
The NWT Literacy Council helps adults improve their literacy skills.
Answer: True

343.
Multiple Choice:
What document outlines land rights in Tłı̨chǫ territory
A. Bill 99
B. Tłı̨chǫ Agreement
C. Inuvialuit Act
D. Northwest Claims Bill
Answer: B. Tłı̨chǫ Agreement

344.
True or False:
The Tłı̨chǫ Agreement includes provisions for self-government.
Answer: True

345.
Multiple Choice:
Which species is at risk due to changing migration routes in NWT
A. Arctic Hare
B. Caribou
C. Lemmings
D. Lynx
Answer: B. Caribou

346.
True or False:
Migration route shifts can impact hunting traditions.
Answer: True

347.
Multiple Choice:
What is a key topic covered by NWT Indigenous Knowledge Policy
A. Legal contracts
B. Mining permits
C. Use of traditional knowledge in decision-making
D. Military recruitment
Answer: C. Use of traditional knowledge in decision-making

348.
True or False:
Traditional knowledge is excluded from NWT environmental policy.
Answer: False
(It is an important part of the policy.)

349. 
Multiple Choice:
Which community is a hub for diamond mining
A. Norman Wells
B. Tuktoyaktuk
C. Yellowknife
D. Fort Providence
Answer: C. Yellowknife
(Yellowknife is the hub for logistics, administration, and workforce for the nearby diamond mines.)

350.
True or False:
Yellowknife has several mines operating within the city limits.
Answer: False
(The diamond mines are located outside the city, but Yellowknife serves as a base of operations.)

351.
Multiple Choice:
Which government initiative supports food security in NWT’s remote communities
A. Food Stamp Canada
B. Community Gardens Act
C. Nutrition North Canada
D. Arctic Grocery Assistance
Answer: C. Nutrition North Canada

352.
True or False:
Nutrition North Canada subsidizes the cost of perishable food in remote areas.
Answer: True

353.
Multiple Choice:
What body ensures workplace safety in the Northwest Territories
A. Canadian Safety Commission
B. Northern Labour Board
C. Workers’ Safety and Compensation Commission (WSCC)
D. GNWT Occupational Health Unit
Answer: C. Workers’ Safety and Compensation Commission (WSCC)

354.
True or False:
The WSCC also operates in Nunavut.
Answer: True

355.
Multiple Choice:
Which community is known for the historic Canol Trail
A. Deline
B. Fort Simpson
C. Norman Wells
D. Fort Smith
Answer: C. Norman Wells

356.
True or False:
The Canol Trail was built during World War I.
Answer: False
(It was built during World War II.)

357.
Multiple Choice:
Which mineral besides diamonds is found in the Northwest Territories
A. Bauxite
B. Zinc
C. Nickel
D. Lithium
Answer: B. Zinc
(The territory has significant deposits of zinc, lead, and other minerals.)

358.
True or False:
The NWT is one of the few regions in Canada where lithium is currently mined.
Answer: False
(Lithium is not a major mining product in the NWT, though deposits exist.)

359.
Multiple Choice:
Which Indigenous Nation signed the Gwich’in Comprehensive Land Claim Agreement
A. Dene Nation
B. Inuit Tapiriit Kanatami
C. Gwich’in Tribal Council
D. Tłı̨chǫ Government
Answer: C. Gwich’in Tribal Council

360.
True or False:
The Gwich’in Agreement provides for both land rights and self-government.
Answer: True

361.
Multiple Choice:
What is one major challenge for delivering healthcare in the NWT
A. Lack of insurance
B. Too many hospitals
C. Remoteness of communities
D. High taxes
Answer: C. Remoteness of communities

362.
True or False:
Residents of all NWT communities can access specialists without leaving their community.
Answer: False
(Many residents must travel to Yellowknife or to southern Canada for specialized care.)

363.
Multiple Choice:
What is the largest Indigenous group by population in the NWT
A. Métis
B. Inuit
C. Dene
D. Haida
Answer: C. Dene

364.
True or False:
The Inuit make up the majority of the Indigenous population in NWT.
Answer: False
(The Dene make up the majority.)

365.
Multiple Choice:
Which season is best for viewing the Aurora Borealis in NWT
A. Summer
B. Winter
C. Spring
D. Fall
Answer: B. Winter

366.
True or False:
The long summer daylight hours make Aurora viewing easier.
Answer: False
(The long hours of darkness in winter make viewing the Aurora easier.)

367.
Multiple Choice:
Which national body manages official statistics in NWT
A. NWT Stats Board
B. Canada Analytics Office
C. Statistics Canada
D. Regional Census Bureau
Answer: C. Statistics Canada

368.
True or False:
Statistics Canada conducts a census every five years.
Answer: True

369.
Multiple Choice:
What term describes the frozen subsoil common in the NWT
A. Ice sheet
B. Frost core
C. Cold crust
D. Permafrost
Answer: D. Permafrost

370.
True or False:
Permafrost can be found only in mountainous regions.
Answer: False
(It is found in many parts of the NWT, including flat tundra and forested areas.)

371.
Multiple Choice:
Which body represents women’s rights and equality in the territory
A. Aurora Women’s Union
B. YWCA NWT
C. Indigenous Women’s Forum
D. NWT Sisters Council
Answer: B. YWCA NWT

372.
True or False:
YWCA NWT provides shelters and family support programs.
Answer: True

373.
Multiple Choice:
What form of local government exists in most NWT communities
A. City councils
B. Elected councils or community governments
C. Provincial assemblies
D. Tribal monarchies
Answer: B. Elected councils or community governments

374.
True or False:
All NWT communities follow the same system of governance.
Answer: False
(Governance varies, with some communities having unique self-government agreements.)

375.
Multiple Choice:
Which wildlife species is protected under federal law and found in NWT
A. Bison
B. Cougar
C. Muskox
D. Kangaroo
Answer: C. Muskox

376.
True or False:
Muskoxen are commonly found in the forests of southern Ontario.
Answer: False
(Muskoxen are found in the Arctic tundra regions, not southern Ontario.)

377.
Multiple Choice:
What is the status of English and French in the NWT
A. Only English is official
B. French is the only official language
C. Both are official languages
D. Neither is official
Answer: C. Both are official languages

378.
True or False:
English is the only language taught in schools across NWT.
Answer: False
(Indigenous languages and French are also taught in many schools.)

379.
Multiple Choice:
What is the northernmost community in the NWT
A. Norman Wells
B. Tuktoyaktuk
C. Sachs Harbour
D. Inuvik
Answer: C. Sachs Harbour

380.
True or False:
Sachs Harbour is located on Banks Island.
Answer: True

381.
Multiple Choice:
Which of the following is a key initiative in climate education in NWT
A. Arctic Climate School
B. Youth Climate Challenge
C. Northern Youth Climate Education Initiative
D. Green Leaders Program
Answer: C. Northern Youth Climate Education Initiative

382.
True or False:
Youth-led climate actions are part of NWT’s education curriculum.
Answer: True

383.
Multiple Choice:
What is the largest territorial park in the NWT
A. Wood Buffalo
B. Twin Falls
C. Nahanni
D. Tuktut Nogait
Answer: D. Tuktut Nogait
(Tuktut Nogait is a national park, not a territorial park. The question has a small error. The largest territorial park is the Twin Falls Gorge Territorial Park.)

384.
True or False:
Tuktut Nogait is located near the border with Nunavut.
Answer: True

385.
Multiple Choice:
Which community lies at the junction of the Mackenzie and Liard Rivers
A. Norman Wells
B. Deline
C. Fort Simpson
D. Fort Providence
Answer: C. Fort Simpson

386.
True or False:
Fort Simpson was a key Hudson’s Bay trading post.
Answer: True

387.
Multiple Choice:
Which major U.S. state is geographically closest to NWT
A. New York
B. Alaska
C. Washington
D. Michigan
Answer: B. Alaska

388.
True or False:
NWT shares a border with the state of Washington.
Answer: False
(NWT is located in northern Canada, far from Washington state.)

389.
Multiple Choice:
What is the purpose of the Northern Sustainable Housing initiative
A. Build luxury condos
B. Provide home ownership to all
C. Create energy-efficient homes
D. Offer rent subsidies only
Answer: C. Create energy-efficient homes

390.
True or False:
Many homes in remote communities lack running water.
Answer: True

391.
Multiple Choice:
Which Indigenous group is most prominent in Deline
A. Gwich’in
B. Métis
C. Inuit
D. Sahtu Dene
Answer: D. Sahtu Dene

392.
True or False:
Deline is located on the shore of Great Bear Lake.
Answer: True

393.
Multiple Choice:
What does the NWT Human Rights Commission promote
A. Cultural festivals
B. Public housing
C. Equal rights and fair treatment
D. School sports
Answer: C. Equal rights and fair treatment

394.
True or False:
Discrimination based on race, religion, and gender is prohibited in the NWT.
Answer: True

395.
Multiple Choice:
What is a current environmental threat to traditional hunting practices
A. Road expansion
B. Noise pollution
C. Climate-induced animal migration changes
D. Language loss
Answer: C. Climate-induced animal migration changes

396.
True or False:
Traditional hunters are unaffected by changes in wildlife migration.
Answer: False
(They are directly affected as it impacts their ability to harvest food and resources.)

397.
Multiple Choice:
What is the population range of most NWT communities
A. Under 10,000
B. 50,000–100,000
C. 200,000+
D. Over 1 million
Answer: A. Under 10,000

398.
True or False:
Yellowknife is the only community with more than 10,000 people in NWT.
Answer: True

399.
Multiple Choice:
Which NWT program trains Indigenous youth in environmental monitoring
A. Land Guardians Training
B. Climate Cadets
C. Indigenous Rangers
D. Western Ecology Corps
Answer: A. Land Guardians Training

400.
True or False:
Land Guardians play a role in both science and cultural preservation.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Nunavut.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for North West Territory.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $northWestTerritory->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded North West Territory citizenship questions.");
    }
}
