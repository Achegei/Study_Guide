<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\CourseSection;

class AlbertaQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the 'Alberta' CourseSection. This is the parent category for these questions.
        $albertaSection = CourseSection::firstOrCreate(
            ['title' => 'Alberta'],
            ['type' => 'province', 'capital' => 'Edmonton', 'flag' => '/images/flags/alberta.png', 'description' => 'Questions specific to Alberta.', 'summary_audio_url' => '/audio/alberta_summary.mp3']
        );

        // The raw text containing all Alberta citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
What is the capital city of Alberta?
A. Calgary
B. Red Deer
C. Lethbridge
D. Edmonton
Answer: D. Edmonton

2.
True or False:
Calgary is the capital of Alberta.
Answer: False
(Edmonton is the capital of Alberta, not Calgary.)

3.
Multiple Choice:
Which city hosted the 1988 Winter Olympics?
A. Vancouver
B. Calgary
C. Banff
D. Edmonton
Answer: B. Calgary

4.
True or False:
Edmonton hosted the 1988 Winter Olympics.
Answer: False
(Calgary hosted the 1988 Winter Olympics.)

5.
Multiple Choice:
What is the largest national park in Alberta?
A. Jasper National Park
B. Elk Island National Park
C. Waterton Lakes National Park
D. Banff National Park
Answer: D. Banff National park
6.
True or False:
Banff National Park is located in Nova scotia
Answer: False

7.
Multiple Choice:
Which industry is a key driver of Alberta’s economy?
A. Fishing
B. Forestry
C. Oil and Gas
D. Tourism
Answer: C. Oil and Gas

8.
True or False:
Oil and gas are not significant to Alberta’s economy.
Answer: False
(Oil and gas are one of Alberta’s most important economic sectors.)

9.
Multiple Choice:
Which mountain range lies in Alberta’s western border?
A. Laurentians
B. Appalachians
C. Rocky Mountains
D. Shield Mountains
Answer: C. Rocky Mountains

10.
True or False:
The Appalachian Mountains run through Alberta.
Answer: False
(The Rocky Mountains run along Alberta’s western edge.)
11.
Multiple Choice:
Which Alberta city is home to the Calgary Stampede?
A. Edmonton
B. Red Deer
C. Calgary
D. Lethbridge
Answer: C. Calgary

12.
True or False:
The Calgary Stampede is held in Calgary
Answer: True

13.
Multiple Choice:
What is the legislative assembly of Alberta called?
A. Alberta Parliament
B. Alberta Congress
C. Legislative Assembly of Alberta
D. Provincial Senate
Answer: C. Legislative Assembly of Alberta

14.
True or False:
Alberta has no provincial legislature.
Answer: False
(Alberta’s legislature is called the Legislative Assembly of Alberta.)

15.
Multiple Choice:
Who represents the King in Alberta?
A. The Governor General
B. The Lieutenant Governor
C. The Premier
D. The Speaker
Answer: B. The Lieutenant Governor

16.
True or False:
The Lieutenant Governor represents the King in Alberta.
Answer: True

17.
Multiple Choice:
What is the provincial flower of Alberta?
A. White Trillium
B. Pacific Dogwood
C. Wild Rose
D. Blue Flag Iris
Answer: C. Wild Rose

18.
True or False:
Alberta’s official flower is the Wild Rose.
Answer: True

19.
Multiple Choice:
Alberta joined Confederation in which year?
A. 1867
B. 1896
C. 1901
D. 1905
Answer: D. 1905

20.
True or False:
Alberta became a province in 1867.
Answer: False
(Alberta joined Confederation in 1905.)
21.
Multiple Choice:
Which Alberta city is known for hosting the Calgary Stampede?
A. Edmonton
B. Calgary
C. Red Deer
D. Fort McMurray
Answer: B. Calgary

22.
True or False:
The Calgary Stampede is held in Edmonton.
Answer: False
(It is held in Calgary.)

23.
Multiple Choice:
Which natural landmark is a major tourist attraction in Alberta?
A. Cape Breton
B. Niagara Falls
C. Banff National Park
D. Mont-Tremblant
Answer: C. Banff National Park

24.
True or False:
Banff National Park is located in Alberta.
Answer: True

25.
Multiple Choice:
What is Alberta’s role in Canada’s energy sector?
A. Major oil and gas producer
B. Focuses only on solar power
C. Imports most of its energy
D. Relies on hydroelectricity only
Answer: A. Major oil and gas producer
26.
True or False:
Alberta produces most of Canada’s coal and uranium.
Answer: False
(It is best known for oil and gas, not uranium.)

27.
Multiple Choice:
What is Alberta’s provincial tree?
A. White Birch
B. Sugar Maple
C. Lodgepole Pine
D. Spruce
Answer: C. Lodgepole Pine

28.
True or False:
The Lodgepole Pine is Alberta’s official tree.
Answer: True

29.
Multiple Choice:
Which group signed Treaty 7 with the Crown in Alberta?
A. Blackfoot Confederacy and other Plains tribes
B. Haida and Inuit
C. Cree and Dene
D. Métis and Huron
Answer: A. Blackfoot Confederacy and other Plains tribes

30.
True or False:
Treaty 7 was signed in Alberta with Plains First Nations.
Answer: True
31.
Multiple Choice:
Which of the following best describes Alberta’s climate?
A. Coastal and humid
B. Dry and continental with cold winters and hot summers
C. Wet and tropical
D. Mild and rainy
Answer: B. Dry and continental with cold winters and hot summers

32.
True or False:
Alberta has a coastal oceanic climate.
Answer: False
(It has a dry continental climate.)

33.
Multiple Choice:
Which Alberta national park is a UNESCO World Heritage Site for its fossil beds?
A. Elk Island
B. Jasper
C. Dinosaur Provincial Park
D. Waterton
Answer: C. Dinosaur Provincial Park

34.
True or False:
Dinosaur Provincial Park is recognized by UNESCO.
Answer: True

35.
Multiple Choice:
Which Alberta city is often associated with the oil sands industry?
A. Lethbridge
B. Red Deer
C. Fort McMurray
D. Drumheller
Answer: C. Fort McMurray
36.
True or False:
Fort McMurray is known for dinosaur museums.
Answer: False
(It’s known for oil sands, not dinosaur fossils.)

37.
Multiple Choice:
Which of the following was a major factor in Alberta’s settlement by European immigrants?
A. Fishing rights
B. Free farmland through homesteading
C. Gold rush
D. Military service
Answer: B. Free farmland through homesteading

38.
True or False:
Homesteading contributed to Alberta’s early European settlement.
Answer: True

39.
Multiple Choice:
Which university is one of Canada’s top research institutions and located in Alberta?
A. UBC
B. McGill
C. University of Alberta
D. Ryerson
Answer: C. University of Alberta

40.
True or False:
The University of Alberta is based in Calgary.
Answer: False
(It is located in Edmonton.)
41.
Multiple Choice:
Which major river runs through both Calgary and southern Alberta?
A. Peace River
B. Athabasca River
C. Bow River
D. Red River
Answer: C. Bow River

42.
True or False:
The Bow River flows through Calgary.
Answer: True

43.
Multiple Choice:
Which of these industries is Alberta especially known for, besides energy?
A. Agriculture
B. Shipbuilding
C. Aerospace
D. Fashion
Answer: A. Agriculture

44.
True or False:
Alberta’s agriculture sector is very small.
Answer: False
(It is a major contributor to Alberta’s economy.)

45.
Multiple Choice:
What is the main legislative body in Alberta?
A. The Alberta Senate
B. Provincial Council
C. Legislative Assembly of Alberta
D. People’s Parliament
Answer: C. Legislative Assembly of Alberta

46.
True or False:
The Legislative Assembly of Alberta passes provincial laws.
Answer: True

47.
Multiple Choice:
Which of the following is NOT a city in Alberta?
A. Edmonton
B. Regina
C. Lethbridge
D. Medicine Hat
Answer: B. Regina

48.
True or False:
Regina is a city in Alberta.
Answer: False
(Regina is in Saskatchewan.)

49.
Multiple Choice:
Which national park in Alberta borders Montana, USA?
A. Jasper
B. Banff
C. Waterton Lakes National Park
D. Elk Island
Answer: C. Waterton Lakes National Park

50.
True or False:
Waterton Lakes National Park shares a border with the U.S.
Answer: True

51.
Multiple Choice:
What is Alberta’s official motto?
A. From Sea to Sea
B. Fortis et Liber (Strong and Free)
C. Glorious and Free
D. Loyal to the Crown
Answer: B. Fortis et Liber

52.
True or False:
Alberta’s motto is “Glorious and Free.”
Answer: False
(Alberta’s motto is “Fortis et Liber,” meaning “Strong and Free.”)

53.
Multiple Choice:
Which two major cities make up Alberta’s “Calgary–Edmonton Corridor”?
A. Calgary and Red Deer
B. Calgary and Edmonton
C. Edmonton and Lethbridge
D. Red Deer and Medicine Hat
Answer: B. Calgary and Edmonton

54.
True or False:
Lethbridge and Medicine Hat form the Calgary–Edmonton Corridor.
Answer: False
(The Calgary–Edmonton Corridor includes Calgary and Edmonton.)

55.
Multiple Choice:
What color is dominant in Alberta’s provincial flag?
A. Red
B. Blue
C. Blue and Gold
D. Green
Answer: C. Blue and Gold
56.
True or False:
Alberta’s provincial flag has a red background.
Answer: False
(Alberta’s flag has a blue background with the provincial shield in the center.)

57.
Multiple Choice:
Which of the following industries are prominent in Alberta?
A. Shipbuilding and Fishing
B. Energy, Agriculture, Forestry
C. Aerospace and IT
D. Gold and Diamond Mining
Answer: B. Energy, Agriculture, Forestry

58.
True or False:
Shipbuilding is a leading industry in Alberta.
Answer: False
(Alberta’s economy is based on energy, agriculture, and forestry, not shipbuilding.)

59.
Multiple Choice:
What major tourist attraction is located in Edmonton?
A. CN Tower
B. Calgary Zoo
C. West Edmonton Mall
D. Royal Ontario Museum
Answer: C. West Edmonton Mall

60.
True or False:
The West Edmonton Mall is located in Calgary.
Answer: False
(It is located in Edmonton.)

61.
Multiple Choice:
What geographical region covers most of southern Alberta?
A. Canadian Shield
B. Prairies
C. Coastal Plains
D. Grasslands
Answer: D. Grasslands

62.
True or False:
Alberta has extensive tropical rainforests.
Answer: False
(Alberta’s southern region is dominated by grasslands and prairies.)

63.
Multiple Choice:
Which group of Indigenous people is historically linked to Alberta?
A. Inuit
B. Mi’kmaq
C. Blackfoot Confederacy
D. Iroquois
Answer: C. Blackfoot Confederacy

64.
True or False:
The Inuit are the main Indigenous group in Alberta.
Answer: False
(The Inuit primarily reside in northern Canada. The Blackfoot Confederacy is native to Alberta.)

65.
Multiple Choice:
What is the role of the Premier of Alberta?
A. Ceremonial leader
B. Chief justice
C. Head of the provincial government
D. Mayor of Edmonton
Answer: C. Head of the provincial government

66.
True or False:
The Premier of Alberta is the federal leader of Canada.
Answer: False
(The Premier is the head of Alberta’s provincial government.)

67.
Multiple Choice:
Which of these is Alberta’s provincial animal emblem?
A. Moose
B. Great Horned Owl
C. Caribou
D. Prairie Dog
Answer: B. Great Horned Owl

68.
True or False:
Alberta’s official animal is the polar bear.
Answer: False
(The Great Horned Owl is Alberta’s provincial bird.)

69.
Multiple Choice:
What river flows through both Calgary and Edmonton?
A. Peace River
B. Bow River
C. North Saskatchewan River
D. Mackenzie River
Answer: C. North Saskatchewan River

70.
True or False:
The St. Lawrence River flows through Alberta.
Answer: False
(The North Saskatchewan River runs through Alberta, not the St. Lawrence.)

71.
Multiple Choice:
How many seats does Alberta have in the House of Commons (as of 2024)?
A. 10
B. 34
C. 25
D. 15
Answer: B. 34

72.
True or False:
Alberta has only 5 federal seats.
Answer: False
(Alberta has 34 seats in the federal House of Commons.)

73.
Multiple Choice:
Which First Nations treaty covers a large part of Alberta?
A. Treaty 9
B. Treaty 6
C. Treaty 4
D. Treaty 1
Answer: B. Treaty 6

74.
True or False:
Several treaties, including Treaty 6, cover Alberta
Answer: True

75.
Multiple Choice:
What are “the Badlands” in Alberta known for?
A. Agriculture
B. Forest fires
C. Ski resorts
D. Dinosaur fossils and hoodoos
Answer: D. Dinosaur fossils and hoodoos

76.
True or False:
The Badlands are known for coal mining.
Answer: False
(The Badlands are famous for dinosaur fossils and rock formations.)

77.
Multiple Choice:
What is Alberta’s role in Canada’s Confederation today?
A. It’s a newly formed territory
B. It’s not part of Confederation
C. It’s a key contributor to the national economy
D. It has limited economic value
Answer: C. It’s a key contributor to the national economy

78.
True or False:
Alberta plays a minor role in Canada’s economy.
Answer: False
(Alberta is a major contributor due to oil, gas, and agriculture.)

79.
Multiple Choice:
Which large annual event celebrates Alberta’s cowboy heritage?
A. Edmonton Expo
B. Calgary Stampede
C. Alberta Days
D. Prairie Heritage Festival
Answer: B. Calgary Stampede

80.
True or False:
The Calgary Stampede celebrates Alberta’s urban development.
Answer: False
(It celebrates Alberta’s cowboy and western heritage.)

81.
Multiple Choice:
Which of the following is a popular ski resort in Alberta?
A. Tremblant
B. Grouse Mountain
C. Lake Louise
D. Blue Mountain
Answer: C. Lake Louise

82.
True or False:
Lake Louise is a famous ski resort in Alberta.
Answer: True

83.
Multiple Choice:
Which city is known for the Royal Tyrrell Museum of Paleontology?
A. Edmonton
B. Calgary
C. Drumheller
D. Banff
Answer: C. Drumheller

84.
True or False:
The Royal Tyrrell Museum is in Edmonton.
Answer: False
(It is located in Drumheller, Alberta.)

85.
Multiple Choice:
Which Alberta city is located near the U.S. border?
A. Lethbridge
B. Red Deer
C. Calgary
D. Fort McMurray
Answer: A. Lethbridge

86.
True or False:
Fort McMurray is located near the U.S. border.
Answer: False
(Lethbridge is closer to the U.S. border than Fort McMurray.)

87.
Multiple Choice:
What is the highest court in Alberta?
A. Supreme Court of Canada
B. Alberta Court of Appeal
C. Provincial Court
D. Superior Court
Answer: B. Alberta Court of Appeal

88.
True or False:
The Supreme Court of Alberta is Canada’s highest court.
Answer: False
(The Supreme Court of Canada is the highest nationally. Alberta’s highest is the Alberta Court of Appeal.)

89.
Multiple Choice:
Which energy source is Alberta particularly known for?
A. Hydroelectric
B. Oil Sands
C. Wind Farms
D. Uranium
Answer: B. Oil Sands

90.
True or False:
Oil sands are a key resource in Alberta.
Answer: True

91.
Multiple Choice:
Who is eligible to vote in Alberta provincial elections?
A. Citizens aged 21 and up
B. Canadian residents
C. Canadian citizens aged 18+ and residents of Alberta
D. Permanent residents only
Answer: C. Canadian citizens aged 18+ and residents of Alberta

92.
True or False:
Only permanent residents can vote in Alberta.
Answer: False
(Only Canadian citizens who live in Alberta and are 18+ can vote.)

93.
Multiple Choice:
What is the population of Alberta as of 2024 (estimated)?
A. 2 million
B. Over 4.8 million
C. Under 1 million
D. 10 million
Answer: B. Over 4.8 million

94.
True or False:
Alberta has fewer than 1 million people.
Answer: False
(Alberta’s population is over 4 million as of 2024.)

95.
Multiple Choice:
What is Alberta’s largest university?
A. Mount Royal University
B. University of Calgary
C. University of Alberta
D. Athabasca University
Answer: C. University of Alberta

96.
True or False:
Athabasca University is Alberta’s largest campus.
Answer: False
(University of Alberta is the largest in the province.)

97.
Multiple Choice:
Which is a common provincial tax in Alberta?
A. PST
B. HST
C. No provincial sales tax
D. Luxury tax
Answer: C. No provincial sales tax

98.
True or False:
Alberta charges a 13% provincial sales tax.
Answer: False
(Alberta does not have a provincial sales tax.)

99.
Multiple Choice:
Which is Alberta’s largest employer category?
A. Government
B. Energy sector
C. Mining
D. Retail
Answer: B. Energy sector

100.
True or False:
The energy sector is the largest employer in Alberta.
Answer: True

101.
Multiple Choice:
Which major natural resource is mined in Fort McMurray, Alberta?
A. Gold
B. Natural gas
C. Oil sands
D. Diamonds
Answer: C. Oil sands

102.
True or False:
Alberta’s oil sands are located near Calgary.
Answer: False
(They are located near Fort McMurray in northeastern Alberta.)

103.
Multiple Choice:
What was Alberta’s population as of the 2021 census?
A. Around 1 million
B. Around 2.5 million
C. Around 3.8 million
D. Over 4 million
Answer: D. Over 4 million

104.
True or False:
Alberta’s population is less than 1 million.
Answer: False
(Alberta’s population is over 4 million as of 2021.)

105.
Multiple Choice:
Which region of Alberta is most known for agriculture?
A. Northern Alberta
B. Southern Alberta
C. Rocky Mountain region
D. Urban Alberta
Answer: B. Southern Alberta

106.
True or False:
Alberta is not an agricultural province.
Answer: False
(Alberta is a major agricultural hub, especially in its southern regions.)

107.
Multiple Choice:
Who is the ceremonial representative of the Crown in Alberta?
A. The Premier
B. The Prime Minister
C. The Lieutenant Governor
D. The Speaker
Answer: C. The Lieutenant Governor

108.
True or False:
The Premier of Alberta represents the King.
Answer: False
(The Lieutenant Governor represents the Crown in Alberta.)

109.
Multiple Choice:
What major museum is located in Drumheller, Alberta?
A. Glenbow Museum
B. Royal Tyrrell Museum
C. Canadian War Museum
D. Canadian Aviation Museum
Answer: B. Royal Tyrrell Museum

110.
True or False:
The Royal Tyrrell Museum showcases Alberta’s oil history.
Answer: False
(It focuses on paleontology and dinosaurs.)

111.
Multiple Choice:
Alberta has how many seats in the Canadian Senate?
A. 6
B. 12
C. 3
D. 10
Answer: A. 6

112.
True or False:
Alberta has 10 seats in the Canadian Senate.
Answer: False
(Alberta has 6 Senate seats.)

113.
Multiple Choice:
Which Alberta city is located near the Canadian Rockies and popular for tourism?
A. Banff
B. Red Deer
C. Lethbridge
D. Drumheller
Answer: A. Banff

114.
True or False:
Banff is located in Ontario.
Answer: False
(Banff is a mountain town in Alberta.)

115.
Multiple Choice:
Which of the following is a major university in Alberta?
A. York University
B. University of Calgary
C. McGill University
D. University of Victoria
Answer: B. University of Calgary

116.
True or False:
McGill University is located in Alberta.
Answer: False
(McGill is in Quebec; University of Calgary is in Alberta.)

117.
Multiple Choice:
What is the provincial bird of Alberta?
A. Snowy Owl
B. Peregrine Falcon
C. Great Horned Owl
D. Canada Goose
Answer: C. Great Horned Owl

118.
True or False:
The Snowy Owl is Alberta’s provincial bird.
Answer: False
(It is the Great Horned Owl.)

119.
Multiple Choice:
Which of the following is a cultural celebration that highlights Alberta’s western heritage?
A. Calgary Stampede
B. Canada Day
C. Victoria Day
D. Edmonton Summer Fest
Answer: A. Calgary Stampede

120.
True or False:
Canada Day is Alberta’s cowboy heritage festival.
Answer: False
(The Calgary Stampede is Alberta’s cowboy festival.)
121.
Multiple Choice:
What is Alberta’s provincial flower?
A. Wild Rose
B. Bluebell
C. Lily
D. Tulip
Answer: A. Wild Rose

122.
True or False:
The tulip is Alberta’s official flower.
Answer: False
(It is the Wild Rose.)

123.
Multiple Choice:
Which Alberta park is known for glaciers and icefields?
A. Elk Island
B. Wood Buffalo
C. Waterton Lakes
D. Jasper National Park
Answer: D. Jasper National Park

124.
True or False:
Jasper National Park is in southern Ontario.
Answer: False
(It is located in Alberta’s Rockies.)

125.
Multiple Choice:
What is Alberta’s role in Indigenous treaties?
A. Not part of treaty lands
B. Covers Treaty 6, 7, and 8 regions
C. Only part of Treaty 4
D. Treaty-free province
Answer: B. Covers Treaty 6, 7, and 8 regions

126.
True or False:
Alberta is not covered by any Indigenous treaties.
Answer: False
(Alberta is covered by Treaties 6, 7, and 8.)

127.
Multiple Choice:
What is the highest point in Alberta?
A. Mount Logan
B. Mount Alberta
C. Mount Columbia
D. Mount Rundle
Answer: C. Mount Columbia

128.
True or False:
Mount Logan is Alberta’s highest mountain.
Answer: False
(Mount Columbia is Alberta’s highest peak. Mount Logan is in Yukon.)

129.
Multiple Choice:
Which Alberta river is important for hydroelectricity and water supply?
A. Mackenzie River
B. Ottawa River
C. Bow River
D. Red River
Answer: C. Bow River

130.
True or False:
The Bow River flows through Alberta and supports the region’s water system.
Answer: True

131.
Multiple Choice:
Alberta is bordered by how many provinces and territories?
A. 1
B. 3
C. 4
D. 2
Answer: B. 3
(British Columbia, Saskatchewan, and the Northwest Territories)

132.
True or False:
Alberta borders the Atlantic Ocean.
Answer: False
(Alberta is landlocked and does not border any ocean.)

133.
Multiple Choice:
Which Alberta city is known for oil production and boomtown history?
A. Calgary
B. Red Deer
C. Fort McMurray
D. Cochrane
Answer: C. Fort McMurray
134.
True or False:
Fort McMurray is Alberta’s capital.
Answer: False
(Edmonton is the capital. Fort McMurray is known for oil sands.)
135.
Multiple Choice:
Which is the southernmost major city in Alberta?
A. Fort McMurray
B. Lethbridge
C. Red Deer
D. Jasper
Answer: B. Lethbridge
136.
True or False:
Lethbridge is in northern Alberta.
Answer: False
(Lethbridge is located in southern Alberta.)
137.
Multiple Choice:
Which Alberta national park shares a border with the U.S.?
A. Jasper
B. Banff
C. Waterton Lakes National Park
D. Elk Island
Answer: C. Waterton Lakes National Park
138.
True or False:
Banff National Park borders the United States.
Answer: False
(Waterton Lakes National Park borders the U.S., not Banff.)
139.
Multiple Choice:
Which region of Alberta is known for hoodoos and fossil beds?
A. Calgary Region
B. Edmonton Region
C. Drumheller Badlands
D. Fort McMurray Basin
Answer: C. Drumheller Badlands

140.
True or False:
The Drumheller Badlands are in Saskatchewan.
Answer: False
(They are located in Alberta.)
141.
Multiple Choice:
Which Alberta region is heavily forested?
A. Southern plains
B. Northern Alberta
C. Central corridor
D. Drumheller
Answer: B. Northern Alberta

142.
True or False:
Alberta has no forested areas.
Answer: False
(Northern Alberta is home to dense forests.)

143.
Multiple Choice:
Which Alberta natural feature is formed by glacial activity?
A. Cypress Hills
B. Athabasca Glacier
C. Red Deer Canyon
D. Nose Hill
Answer: B. Athabasca Glacier

144.
True or False:
The Athabasca Glacier is part of Alberta’s mountain parks.
Answer: True

145.
Multiple Choice:
What was Alberta’s primary role in the settlement of Western Canada?
A. Fishing hub
B. Agricultural and ranching frontier
C. Naval base
D. Fur trading center
Answer: B. Agricultural and ranching frontier

146.
True or False:
Alberta developed as a fishing and shipbuilding region.
Answer: False
(Alberta developed as a farming and ranching region.)

147.
Multiple Choice:
Which sector employs many rural Albertans?
A. Aerospace
B. Agriculture
C. Education
D. Tourism
Answer: B. Agriculture

148.
True or False:
Tourism is the primary employer of rural Alberta.
Answer: False
(Agriculture is the primary employer in rural Alberta.)

149.
Multiple Choice:
Which of these cultural groups helped shape Alberta’s settlement history?
A. French Loyalists
B. Ukrainians, Germans, and British settlers
C. Acadians
D. Quebecois
Answer: B. Ukrainians, Germans, and British settlers

150.
True or False:
Ukrainians and Germans were part of Alberta’s early settlers.
Answer: True
151.
Multiple Choice:
Which Alberta town is known for its UNESCO heritage buffalo jump?
A. Canmore
B. Fort Macleod
C. Banff
D. Jasper
Answer: B. Fort Macleod

152.
True or False:
Fort Macleod is home to a UNESCO heritage buffalo jump.
Answer: True

153.
Multiple Choice:
What is the name of Alberta’s police force?
A. Alberta Provincial Police
B. Edmonton Police Service
C. Royal Canadian Mounted Police (RCMP)
D. Alberta Rangers
Answer: C. Royal Canadian Mounted Police (RCMP)

154.
True or False:
Alberta does not have the RCMP.
Answer: False
(The RCMP serves Alberta alongside local city police forces.)

155.
Multiple Choice:
Which Alberta city is nicknamed “Gateway to the North”?
A. Red Deer
B. Calgary
C. Edmonton
D. Fort Saskatchewan
Answer: C. Edmonton
156.
True or False:
Calgary is called the “Gateway to the North.”
Answer: False
(Edmonton holds that nickname.)

157.
Multiple Choice:
Which Alberta river flows from the Rockies toward Saskatchewan?
A. Ottawa River
B. Peace River
C. North Saskatchewan River
D. Mackenzie River
Answer: C. North Saskatchewan River

158.
True or False:
The Peace River starts in Alberta and flows into Saskatchewan.
Answer: False
(The North Saskatchewan River does that.)

159.
Multiple Choice:
Which Alberta city is known for the international airport code “YYC”?
A. Calgary
B. Edmonton
C. Lethbridge
D. Medicine Hat
Answer: A. Calgary

160.
True or False:
YYC is the airport code for Edmonton.
Answer: False
(YYC is for Calgary. Edmonton’s is YEG.)
161.
Multiple Choice:
What is the purpose of the Alberta Legislature Building in Edmonton?
A. Tourist museum
B. Court proceedings
C. Law-making and provincial governance
D. National defence
Answer: C. Law-making and provincial governance

162.
True or False:
The Alberta Legislature is where federal laws are made.
Answer: False
(It’s where provincial laws are made.)

163.
Multiple Choice:
Which Alberta town is a historic fur trading post?
A. Red Deer
B. Fort Edmonton
C. Banff
D. Canmore
Answer: B. Fort Edmonton

164.
True or False:
Fort Edmonton was a major fur trading post.
Answer: True

165.
Multiple Choice:
Which major pipeline project begins in Alberta?
A. Coastal GasLink
B. Trans Mountain Pipeline
C. Keystone XL
D. Mackenzie Pipeline
Answer: B. Trans Mountain Pipeline
166.
True or False:
The Trans Mountain Pipeline begins in Alberta.
Answer: True

167.
Multiple Choice:
What is a key reason Alberta’s economy is sometimes volatile?
A. Lack of workers
B. Harsh winters
C. Fluctuating oil prices
D. Overpopulation
Answer: C. Fluctuating oil prices

168.
True or False:
Alberta’s economy is stable because of gold mining.
Answer: False
(Oil price fluctuations impact Alberta’s economy.)

169.
Multiple Choice:
What is Alberta’s minimum voting age for provincial elections?
A. 21
B. 19
C. 16
D. 18
Answer: D. 18

170.
True or False:
You must be 21 to vote in Alberta.
Answer: False
(You must be 18 and a Canadian citizen.)
171.
Multiple Choice:
What is the largest Indigenous population in Alberta based on nation?
A. Mohawk
B. Inuit
C. Cree
D. Haida
Answer: C. Cree
172.
True or False:
The Cree are a major Indigenous group in Alberta.
Answer: True
173.
Multiple Choice:
What is a Métis settlement?
A. Federal prison
B. Farming co-op
C. Self-governed Indigenous community
D. Missionary outpost
Answer: C. Self-governed Indigenous community
174.
True or False:
Métis settlements exist in Alberta.
Answer: True
175.
Multiple Choice:
Which town is known for Head-Smashed-In Buffalo Jump?
A. Fort Macleod
B. Drumheller
C. Cochrane
D. Vegreville
Answer: A. Fort Macleod
176.
True or False:
Head-Smashed-In Buffalo Jump is a UNESCO heritage site.
Answer: True

177.
Multiple Choice:
Who provides policing services in rural Alberta?
A. Provincial Rangers
B. RCMP
C. Alberta Sherriff’s Patrol
D. Calgary Police
Answer: B. RCMP

178.
True or False:
The RCMP provides police services in rural Alberta.
Answer: True

179.
Multiple Choice:
Which area is known as “Big Sky Country” in Alberta?
A. Rocky Mountains
B. Southern Alberta
C. Northern Alberta
D. Edmonton Region
Answer: B. Southern Alberta

180.
True or False:
Southern Alberta is called “Big Sky Country.”
Answer: True
181.
Multiple Choice:
Which Alberta town features a giant roadside Easter egg?
A. Fort Macleod
B. Vegreville
C. Brooks
D. Pincher Creek
Answer: B. Vegreville

182.
True or False:
Vegreville is famous for its giant Ukrainian Easter egg.
Answer: True

183.
Multiple Choice:
Which region of Alberta is known for oil drilling?
A. Calgary
B. Fort McMurray and northern Alberta
C. Banff
D. Drumheller
Answer: B. Fort McMurray and northern Alberta

184.
True or False:
Oil drilling is common in Banff National Park.
Answer: False
(It is prohibited in national parks. Fort McMurray is a key drilling region.)

185.
Multiple Choice:
Alberta’s public healthcare is administered under what name?
A. Canadian Medical Board
B. Health Canada
C. Alberta Health Services (AHS)
D. Western Health Union
Answer: C. Alberta Health Services (AHS)
186.
True or False:
Alberta has its own public healthcare system called AHS.
Answer: True

187.
Multiple Choice:
Which major prairie river flows through Medicine Hat?
A. Red River
B. North Saskatchewan
C. South Saskatchewan River
D. Bow River
Answer: C. South Saskatchewan River

188.
True or False:
The South Saskatchewan River flows through Medicine Hat.
Answer: True

189.
Multiple Choice:
What is Alberta’s primary legislative document?
A. Canada’s Charter
B. Alberta Royal Law
C. The Alberta Act (1905)
D. Provincial Constitution
Answer: C. The Alberta Act (1905)

190.
True or False:
The Alberta Act created Alberta as a province in 1905.
Answer: True
191.
Multiple Choice:
Which Alberta city is home to the annual “K-Days” festival?
A. Calgary
B. Red Deer
C. Edmonton
D. Medicine Hat
Answer: C. Edmonton

192.
True or False:
K-Days is an annual event in Edmonton.
Answer: True

193.
Multiple Choice:
What is Alberta’s time zone?
A. Atlantic
B. Pacific
C. Mountain Time
D. Central
Answer: C. Mountain Time

194.
True or False:
Alberta follows Mountain Standard Time.
Answer: True

195.
Multiple Choice:
Which Alberta industry contributes most to export revenue?
A. Agriculture
B. Forestry
C. Oil and Gas
D. Tourism
Answer: C. Oil and Gas
196.
True or False:
Tourism is Alberta’s largest export sector.
Answer: False
(Oil and gas are Alberta’s top exports.)

197.
Multiple Choice:
Which Alberta event showcases Ukrainian culture?
A. Prairie Folk Fest
B. Vegreville Ukrainian Pysanka Festival
C. Mountain Days
D. Alberta Multicultural Week
Answer: B. Vegreville Ukrainian Pysanka Festival

198.
True or False:
The Vegreville festival celebrates Ukrainian heritage.
Answer: True

199.
Multiple Choice:
Which Alberta town celebrates cowboy culture outside Calgary?
A. High River
B. Jasper
C. Banff
D. Leduc
Answer: A. High River

200.
True or False:
High River is part of Alberta’s cowboy heritage.
Answer: True
201.
Multiple Choice:
Which Alberta town hosts the Big Valley Jamboree, a major country music festival?
A. Edmonton
B. Camrose
C. Fort McMurray
D. Lethbridge
Answer: B. Camrose

202.
True or False:
The Big Valley Jamboree is held in Camrose, Alberta.
Answer: True

203.
Multiple Choice:
What is the name of Alberta’s system of self-governed Métis communities?
A. Indigenous Authority Zones
B. Métis Regions
C. Métis Settlements
D. First Nations Councils
Answer: C. Métis Settlements

204.
True or False:
Alberta is the only province with legislated Métis Settlements.
Answer: True

205.
Multiple Choice:
Which Alberta city lies halfway between Calgary and Edmonton?
A. Brooks
B. Red Deer
C. Medicine Hat
D. Wetaskiwin
Answer: B. Red Deer
206.
True or False:
Red Deer is located between Calgary and Edmonton.
Answer: True

207.
Multiple Choice:
Which highway connects Alberta’s two largest cities?
A. Highway 9
B. Highway 11
C. Highway 2 (Queen Elizabeth II Highway)
D. Highway 16
Answer: C. Highway 2 (QEII)

208.
True or False:
Highway 2 connects Calgary and Edmonton.
Answer: True

209.
Multiple Choice:
What is Alberta’s largest natural lake?
A. Sylvan Lake
B. Lesser Slave Lake
C. Lake Athabasca
D. Cold Lake
Answer: C. Lake Athabasca

210.
True or False:
Lake Athabasca is Alberta’s largest natural lake.
Answer: True
211.
Multiple Choice:
Which community in Alberta is known for coal mining history?
A. Cochrane
B. Banff
C. Drumheller
D. Blairmore (Crowsnest Pass)
Answer: D. Blairmore (Crowsnest Pass)

212.
True or False:
Crowsnest Pass has a coal mining history.
Answer: True

213.
Multiple Choice:
What is the government-funded health insurance system in Alberta called?
A. Canada HealthCare
B. AlbertaMed
C. Alberta Health Care Insurance Plan (AHCIP)
D. HealthLine Alberta
Answer: C. Alberta Health Care Insurance Plan (AHCIP)

214.
True or False:
AHCIP is Alberta’s provincial health insurance program.
Answer: True

215.
Multiple Choice:
Which Alberta town is known for dinosaur fossil discoveries?
A. High River
B. Drumheller
C. Cochrane
D. Okotoks
Answer: B. Drumheller

216.True or False:
Drumheller is famous for its dinosaur fossil sites.
Answer: True



217.
Multiple Choice:
Which province borders Alberta to the east?
A. British Columbia
B. Manitoba
C. Saskatchewan
D. Ontario
Answer: C. Saskatchewan

218.
True or False:
Manitoba borders Alberta.
Answer: False
(Saskatchewan borders Alberta to the east.)



219.
Multiple Choice:
What is the highest level of education Alberta’s provincial government funds directly?
A. Secondary school
B. Vocational programs
C. Post-secondary education (colleges and universities)
D. Adult literacy only
Answer: C. Post-secondary education

220.
True or False:
Alberta does not fund any post-secondary education.
Answer: False
(The province funds universities and colleges.)
221.
Multiple Choice:
Which Alberta national park is a UNESCO World Heritage Site shared with Montana, USA?
A. Jasper
B. Waterton Lakes National Park
C. Banff
D. Elk Island
Answer: B. Waterton Lakes National Park

222.
True or False:
Waterton Lakes National Park is a shared UNESCO site.
Answer: True



223.
Multiple Choice:
Which ethnic group has a significant historical presence in Alberta’s farming communities?
A. Portuguese
B. Ukrainians
C. Vietnamese
D. Chinese
Answer: B. Ukrainians

224.
True or False:
Ukrainians helped build Alberta’s agricultural roots.
Answer: True



225.
Multiple Choice:
Which Alberta city hosts Canada’s largest Ukrainian Cultural Heritage Village?
A. Calgary
B. Lethbridge
C. Edmonton area
D. Red Deer
Answer: C. Edmonton area
226.
True or False:
The Ukrainian Cultural Village is in northern Quebec.
Answer: False
(It is located near Edmonton.)



227.
Multiple Choice:
Which symbol appears in the center of Alberta’s provincial flag?
A. A maple leaf
B. Crown
C. Alberta coat of arms
D. Provincial shield
Answer: D. Provincial shield

228.
True or False:
The Alberta flag features the provincial shield.
Answer: True



229.
Multiple Choice:
Which Alberta city is home to Nose Hill Park, one of the largest urban parks in Canada?
A. Calgary
B. Edmonton
C. Red Deer
D. Grande Prairie
Answer: A. Calgary

230.
True or False:
Nose Hill Park is in Calgary.
Answer: True
231.
Multiple Choice:
What treaty was signed in 1877 covering southern Alberta?
A. Treaty 4
B. Treaty 7
C. Treaty 6
D. Treaty 8
Answer: B. Treaty 7

232.
True or False:
Treaty 7 covers parts of southern Alberta.
Answer: True



233.
Multiple Choice:
What is the Alberta Foundation for the Arts known for?
A. Scientific research
B. Promoting Alberta’s visual, performing, and literary arts
C. Funding school lunches
D. Funding sports teams
Answer: B. Promoting Alberta’s visual, performing, and literary arts

234.
True or False:
The Alberta Foundation for the Arts supports cultural activities.
Answer: True



235.
Multiple Choice:
What does the Alberta flag’s background color represent?
A. The ocean
B. Royal heritage
C. The blue sky
D. Federal unity
Answer: C. The blue sky
236.
True or False:
The blue in Alberta’s flag represents the sky.
Answer: True



237.
Multiple Choice:
Which mountain pass connects Alberta with British Columbia?
A. Saddle Pass
B. Coquihalla Pass
C. Kicking Horse Pass
D. Labrador Pass
Answer: C. Kicking Horse Pass

232.
True or False:
Kicking Horse Pass links Alberta and B.C.
Answer: True



239.
Multiple Choice:
Which Alberta town is closest to the U.S. border?
A. High River
B. Cardston
C. Red Deer
D. Okotoks
Answer: B. Cardston

240.
True or False:
Cardston is near the Alberta–U.S. border.
Answer: True
241.
Multiple Choice:
What does the wheat in Alberta’s coat of arms symbolize?
A. Wealth
B. Immigration
B. Agriculture
D. Western expansion
Answer: C. Agriculture

242.
True or False:
The wheat in Alberta’s coat of arms represents mining.
Answer: False
(It symbolizes Alberta’s agricultural strength.)



243.
Multiple Choice:
Which Alberta city is home to the Telus Spark Science Centre?
A. Red Deer
B. Calgary
C. Edmonton
D. Brooks
Answer: B. Calgary

244.
True or False:
Telus Spark is a science center located in Calgary.
Answer: True



245.
Multiple Choice:
Which Alberta park protects native prairie grasslands?
A. Banff
B. Jasper
C. Elk Island
D. Dinosaur Provincial Park
Answer: D. Dinosaur Provincial Park
246.
True or False:
Dinosaur Provincial Park preserves Alberta’s natural grasslands.
Answer: True



247.
Multiple Choice:
Which Alberta town has a large Hutterite community presence?
A. Jasper
B. Vulcan
C. Red Deer
D. Lloydminster
Answer: B. Vulcan

248.
True or False:
Vulcan has a known Hutterite population.
Answer: True



249.
Multiple Choice:
What does the red cross in Alberta’s shield represent?
A. The monarchy
B. St. George’s Cross – English heritage
C. Christianity
D. Military service
Answer: B. St. George’s Cross – English heritage

250.
True or False:
Alberta’s shield includes a red cross symbolizing English heritage.
Answer: True
251.
Multiple Choice:
What is Alberta’s provincial stone?
A. Diamond
B. Petrified wood
C. Amethyst
D. Quartz
Answer: B. Petrified wood

252.
True or False:
Petrified wood is Alberta’s provincial stone.
Answer: True



253.
Multiple Choice:
Which Alberta town is known for its Star Trek-themed attractions?
A. Edmonton
B. Vulcan
C. Lethbridge
D. High Level
Answer: B. Vulcan

254.
True or False:
The town of Vulcan is themed after Star Trek.
Answer: True



255.
Multiple Choice:
Which Alberta festival showcases folk music each summer?
A. Calgary Expo
B. Banff Summer Music
C. Edmonton Folk Music Festival
D. Fort Macleod Fest
Answer: C. Edmonton Folk Music Festival
256.
True or False:
Edmonton hosts an annual folk music festival.
Answer: True



257.
Multiple Choice:
Which major highway runs through Banff National Park?
A. Highway 7
B. Trans-Canada Highway (Highway 1)
C. Highway 4
D. Highway 21
Answer: B. Trans-Canada Highway (Highway 1)

258.
True or False:
The Trans-Canada Highway runs through Banff.
Answer: True



259.
Multiple Choice:
Which Alberta city is home to West Edmonton Mall?
A. Calgary
B. Red Deer
C. Edmonton
D. Medicine Hat
Answer: C. Edmonton

260.
True or False:
The West Edmonton Mall is in Calgary.
Answer: False
(It is in Edmonton.)
261.
Multiple Choice:
Which body of water lies on Alberta’s northern boundary?
A. Hudson Bay
B. Lake Athabasca
C. Great Slave Lake
D. Lake Ontario
Answer: B. Lake Athabasca

262.
True or False:
Lake Athabasca is on Alberta’s northern edge.
Answer: True



263.
Multiple Choice:
Which town in Alberta is known for its giant dinosaur statue?
A. Drumheller
B. Cochrane
C. St. Paul
D. Peace River
Answer: A. Drumheller

264.
True or False:
Drumheller has a famous giant dinosaur statue.
Answer: True



265.
Multiple Choice:
Which Indigenous language is widely spoken in Alberta?
A. Mohawk
B. Cree
C. Ojibwe
D. Inuktitut
Answer: B. Cree
266.
True or False:
Cree is commonly spoken among Alberta’s Indigenous communities.
Answer: True



267.
Multiple Choice:
Which region in Alberta is important for cattle ranching?
A. Edmonton area
B. Wood Buffalo
C. Foothills near Calgary
D. Peace Country
Answer: C. Foothills near Calgary

268.
True or False:
Southern Alberta’s foothills support cattle ranching.
Answer: True



269.
Multiple Choice:
What major Alberta facility extracts and processes oil sands?
A. Calgary Refinery
B. Fort Saskatchewan Plant
C. Syncrude Canada Plant
D. Cold Lake Terminal
Answer: C. Syncrude Canada Plant

270.
True or False:
Syncrude is an oil sands facility in Alberta.
Answer: True
271.
Multiple Choice:
Which Alberta region borders the Northwest Territories?
A. Southern Alberta
B. Calgary Region
C. Peace River Area
D. Northern Alberta
Answer: D. Northern Alberta

272.
True or False:
Northern Alberta borders the Northwest Territories.
Answer: True



273.
Multiple Choice:
What event does Heritage Day in Alberta celebrate?
A. Treaty signing
B. Agriculture
C. Cultural diversity and traditions
D. Canada’s independence
Answer: C. Cultural diversity and traditions

274.
True or False:
Heritage Day in Alberta honors multiculturalism.
Answer: True



275.
Multiple Choice:
Which Alberta region is known as the Peace Country?
A. Foothills
B. Northwestern Alberta
C. Eastern plains
D. Cypress Hills
Answer: B. Northwestern Alberta

276.
True or False:
The Peace Country is located in Alberta’s northwest.
Answer: True
277.
Multiple Choice:
What is Alberta’s provincial museum called?
A. Alberta Historical Centre
B. Royal Alberta Museum
C. Calgary Provincial Museum
D. Confederation Hall
Answer: B. Royal Alberta Museum

278.
True or False:
The Royal Alberta Museum is a major provincial institution.
Answer: True



279.
Multiple Choice:
What is a common symbol of Alberta’s early prairie life?
A. Grain elevators
B. High-rise apartments
C. Water towers
D. Silos
Answer: A. Grain elevators

280.
True or False:
Grain elevators are symbols of Alberta’s prairie heritage.
Answer: True

281.
Multiple Choice:
What is the Alberta Rural Development Network (ARDN)?
A. Police agency
B. Oil exploration firm
C. Organization supporting rural communities and development
D. Mining company
Answer: C. Organization supporting rural communities and development

282.
True or False:
The ARDN supports urban housing projects in Toronto.
Answer: False
(ARDN supports rural communities in Alberta.)



283.
Multiple Choice:
Which Alberta festival is held in Lethbridge to celebrate Japanese culture?
A. Southern Bloom
B. Lethbridge Cherry Days
C. Nikka Yuko Japanese Festival
D. Asian Summer Fest
Answer: C. Nikka Yuko Japanese Festival

284.
True or False:
Lethbridge hosts a Japanese cultural festival.
Answer: True



285.
Multiple Choice:
Which Alberta town is the site of the famous 1903 Frank Slide?
A. Okotoks
B. Canmore
C. Frank (Crowsnest Pass)
D. High Level
Answer: C. Frank (Crowsnest Pass)

286.
True or False:
The Frank Slide was a major landslide in Alberta history.
Answer: True
287.
Multiple Choice:
Which Alberta institution offers distance learning and online education?
A. University of Lethbridge
B. Athabasca University
C. SAIT
D. Olds College
Answer: B. Athabasca University

288.
True or False:
Athabasca University specializes in online education.
Answer: True



289.
Multiple Choice:
Which animal is featured in Alberta’s provincial bird emblem?
A. Bald Eagle
B. Snowy Owl
C. Great Horned Owl
D. Prairie Falcon
Answer: C. Great Horned Owl

290.
True or False:
The Great Horned Owl is Alberta’s provincial bird.
Answer: True



291.
Multiple Choice:
Which Alberta town has a UFO landing pad as a tourist attraction?
A. Vulcan
B. Peace River
C. Cold Lake
D. St. Paul
Answer: D. St. Paul

292.
True or False:
St. Paul, Alberta has a UFO landing pad.
Answer: True
293.
Multiple Choice:
Which Alberta city is known for Glenbow Museum and the Calgary Tower?
A. Red Deer
B. Medicine Hat
C. Calgary
D. Leduc
Answer: C. Calgary

294.
True or False:
The Glenbow Museum is located in Calgary.
Answer: True



295.
Multiple Choice:
Which Alberta national park is home to bison and located near Edmonton?
A. Banff
B. Jasper
C. Elk Island National Park
D. Waterton
Answer: C. Elk Island National Park

296.
True or False:
Elk Island National Park is known for its bison conservation.
Answer: True



297.
Multiple Choice:
What is a key industry in Alberta’s “Industrial Heartland”?
A. Forestry
B. Petrochemicals and refining
C. Tourism
D. Textiles
Answer: B. Petrochemicals and refining

298.
True or False:
Alberta’s Industrial Heartland specializes in refining and petrochemicals.
Answer: True
299.
Multiple Choice:
What is the name of Alberta’s first university?
A. University of Calgary
B. Athabasca University
C. University of Alberta
D. SAIT
Answer: C. University of Alberta

300.
True or False:
The University of Alberta was the province’s first university.
Answer: True

301.
Multiple Choice:
Which Alberta city is home to Fort Edmonton Park, a living history museum?
A. Red Deer
B. Edmonton
C. Fort Saskatchewan
D. Calgary
Answer: B. Edmonton

302.
True or False:
Fort Edmonton Park is a historical park in Edmonton.
Answer: True



303.
Multiple Choice:
What does the name “Alberta” originally honor?
A. A mountain range
B. A British colony
C. Princess Louise Caroline Alberta
D. A river
Answer: C. Princess Louise Caroline Alberta

304.
True or False:
Alberta was named after a British princess.
Answer: True



305.
Multiple Choice:
Which Alberta city has the nickname “Gateway to the Rockies”?
A. Edmonton
B. Lethbridge
C. Calgary
D. Drumheller
Answer: C. Calgary

306.
True or False:
Calgary is called the “Gateway to the Rockies.”
Answer: True
307.
Multiple Choice:
Which Alberta region is ideal for wind energy?
A. Northern forests
B. Southern Alberta
C. Peace River area
D. Foothills
Answer: B. Southern Alberta

308.
True or False:
Southern Alberta is known for wind farms.
Answer: True



309.
Multiple Choice:
Which Alberta city has the nickname “City of Champions”?
A. Calgary
B. Red Deer
C. Edmonton
D. Grande Prairie
Answer: C. Edmonton

310.
True or False:
Edmonton is also called the “City of Champions.”
Answer: True



311.
Multiple Choice:
What is the Alberta Legislature Building made from?
A. Granite
B. Brick
C. Sandstone
D. Limestone
Answer: C. Sandstone

312.True or False:
The Alberta Legislature Building is made of sandstone.
Answer: True



313.
Multiple Choice:
Which Alberta town has strong Scandinavian roots?
A. Cochrane
B. Okotoks
C. Dickson
D. Whitecourt
Answer: C. Dickson

314.
True or False:
Dickson is known for its Danish heritage.
Answer: True



315.
Multiple Choice:
Which region of Alberta is known for its rich fossil beds?
A. Cypress Hills
B. Badlands (Drumheller)
C. Peace Country
D. Slave Lake
Answer: B. Badlands (Drumheller)

316.
True or False:
Alberta’s Badlands are famous for dinosaur fossils.
Answer: True
317.
Multiple Choice:
Which Indigenous signatory nations were part of Treaty 8?
A. Cree, Dene, Beaver
B. Haida and Inuit
C. Mohawk and Algonquin
D. Nuu-chah-nulth
Answer: A. Cree, Dene, Beaver

318.
True or False:
Treaty 8 covers northern Alberta and includes Dene nations.
Answer: True



319.
Multiple Choice:
What is Alberta’s official website for government services?
A. alberta.ca
B. www.alberta.ca
C. albertacanada.org
D. goab.ca
Answer: B. www.alberta.ca

320.
True or False:
Alberta’s official government website is www.alberta.ca.
Answer: True



321.
Multiple Choice:
Which Alberta city has the nickname “Gas City”?
A. Lethbridge
B. Medicine Hat
C. St. Albert
D. Brooks
Answer: B. Medicine Hat
322.
True or False:
Medicine Hat is known as the “Gas City.”
Answer: True



323.
Multiple Choice:
Which Alberta national park preserves aspen parkland ecosystems?
A. Waterton
B. Elk Island
C. Jasper
D. Cypress Hills
Answer: B. Elk Island

324.
True or False:
Elk Island protects Alberta’s aspen parkland.
Answer: True



325.
Multiple Choice:
Which Alberta community has strong Francophone roots?
A. Red Deer
B. St. Paul
C. Leduc
D. Cochrane
Answer: B. St. Paul

326.
True or False:
St. Paul has a significant Francophone population.
Answer: True

327.
Multiple Choice:
Which sport is highly popular and widely played in Alberta winters?
A. Baseball
B. Soccer
C. Hockey
D. Cricket
Answer: C. Hockey

328.
True or False:
Hockey is a major sport in Alberta.
Answer: True



329.
Multiple Choice:
What color dominates the Alberta provincial flag?
A. Green
B. White
C. Red
D. Blue
Answer: D. Blue

330.
True or False:
Alberta’s flag has a blue background.
Answer: True
331.
Multiple Choice:
Which Alberta city is the administrative center of the Regional Municipality of Wood Buffalo?
A. Cold Lake
B. Fort Chipewyan
C. Fort McMurray
D. Slave Lake
Answer: C. Fort McMurray

332.
True or False:
Fort McMurray is part of the Regional Municipality of Wood Buffalo.
Answer: True



333.
Multiple Choice:
Which Alberta town is named after a large glacial erratic (boulder)?
A. Drumheller
B. Okotoks
C. Brooks
D. Peace River
Answer: B. Okotoks

334.
True or False:
Okotoks is named after a giant glacial rock.
Answer: True



335.
Multiple Choice:
Which Indigenous ceremony is often practiced in Alberta’s First Nations communities?
A. Diwali
B. Passover
C. Powwow
D. Eid
Answer: C. Powwow

336.
True or False:
Powwows are traditional Indigenous gatherings held in Alberta.
Answer: True
337.
Multiple Choice:
What historic trail passed through Alberta during the fur trade?
A. Oregon Trail
B. Hudson’s Bay Company Trail
C. Gold Rush Trail
D. Cariboo Trail
Answer: B. Hudson’s Bay Company Trail

338.
True or False:
The Hudson’s Bay Company Trail was important in Alberta’s early trade routes.
Answer: True



339.
Multiple Choice:
Which Alberta town hosts the Canadian Finals Rodeo?



A. Banff
B. Red Deer
C. Lethbridge
D. High River
Answer: B. Red Deer

340.
True or False:
The Canadian Finals Rodeo is held in Red Deer.
Answer: True



341.
Multiple Choice:
Which Alberta national park is dedicated to the conservation of wood bison?
A. Jasper
B. Waterton
C. Banff
D. Elk Island
Answer: D. Elk Island

342.
True or False:
Wood bison are protected in Elk Island National Park.
Answer: True
343.
Multiple Choice:
Which Alberta border is shared with the United States?
A. Northern
B. Eastern
C. Western
D. Southern
Answer: D. Southern

344.
True or False:
Alberta shares its southern border with the United States.
Answer: True



345.
Multiple Choice:
Which type of natural disaster occurred in Fort McMurray in 2016?
A. Earthquake
B. Flood
B. Wildfire
D. Tornado
Answer: C. Wildfire

346.
True or False:
A major wildfire hit Fort McMurray in 2016.
Answer: True



347.
Multiple Choice:
Which university is located in Lethbridge, Alberta?
A. University of Alberta
B. University of Lethbridge
C. SAIT
D. NorQuest College
Answer: B. University of Lethbridge

348.True or False:
The University of Lethbridge is a major Alberta university.
Answer: True



349.
Multiple Choice:
Which Alberta airport is identified by the code YEG?
A. Calgary International Airport
B. Edmonton International Airport
C. Red Deer Regional Airport
D. Lethbridge Airport
Answer: B. Edmonton International Airport

350.
True or False:
YEG is the code for Edmonton’s airport.
Answer: True
351.
Multiple Choice:
Which Alberta lake is shared with Saskatchewan?
A. Lesser Slave Lake
B. Cold Lake
C. Lake Athabasca
D. Gull Lake
Answer: C. Lake Athabasca

352.
True or False:
Lake Athabasca lies in both Alberta and Saskatchewan.
Answer: True



353.
Multiple Choice:
Which Indigenous language besides Cree is spoken in northern Alberta?
A. Mohawk
B. Ojibwe
C. Dene
D. Inuktitut
Answer: C. Dene

354.
True or False:
Dene is spoken in northern Alberta.
Answer: True



355.
Multiple Choice:
What was the major source of settlement in Alberta in the early 1900s?
A. Oil discovery
B. Homesteading and farming
C. Fishing industry
D. Forestry
Answer: B. Homesteading and farming
356.
True or False:
Alberta was settled mainly through homesteading in the early 1900s.
Answer: True



357.
Multiple Choice:
Which Alberta city is the largest by land area?
A. Red Deer
B. Calgary
C. Lethbridge
D. Edmonton
Answer: B. Calgary

358.
True or False:
Calgary is the largest Alberta city by land area.
Answer: True



359.
Multiple Choice:
Which Alberta city’s CFL team is called the Elks?
A. Red Deer
B. Lethbridge
C. Edmonton
D. Medicine Hat
Answer: C. Edmonton

360.
True or False:
Edmonton’s football team is called the Elks.
Answer: True
361.
Multiple Choice:
Which Alberta region is rich in natural gas?
A. Banff
B. Southern plains
C. Peace River region
D. Calgary basin
Answer: C. Peace River region

362.
True or False:
Peace River region is known for natural gas production.
Answer: True



363.
Multiple Choice:
Which Alberta town is named after a famous mountie outpost?
A. Cold Lake
B. Fort Macleod
C. Athabasca
D. Fort Chipewyan
Answer: B. Fort Macleod

364.
True or False:
Fort Macleod was a historic NWMP (Mountie) post.
Answer: True



365.
Multiple Choice:
Which Alberta city hosts the International Street Performers Festival?
A. Red Deer
B. Edmonton
C. Calgary
D. Lethbridge
Answer: B. Edmonton
366.
True or False:
Edmonton holds an international street performers festival annually.
Answer: True



367.
Multiple Choice:
What is the name of Calgary’s public transit system?
A. MetroRail
B. CTrain
C. CityBus
D. LRT AB
Answer: B. CTrain

368.
True or False:
CTrain is Calgary’s light rail transit system.
Answer: True



369.
Multiple Choice:
Which body of water feeds Alberta’s irrigation in the south?
A. Hudson Bay
B. Slave Lake
C. Bow River
D. Lake Louise
Answer: C. Bow River

370.
True or False:
The Bow River helps irrigate southern Alberta’s farmland.
Answer: True
371.
Multiple Choice:
Which Alberta town lies in both Alberta and Saskatchewan?
A. Lloyd Lake
B. Medicine Hat
C. Lloydminster
D. Cold Lake
Answer: C. Lloydminster
372.True or False:
Lloydminster is shared by Alberta and Saskatchewan.
Answer: True
373.Multiple Choice:
Which Alberta lake is known for bird watching and biodiversity?
A. Sylvan Lake
B. Beaverhill Lake
C. Gull Lake
D. Lake Minnewanka
Answer: B. Beaverhill Lake
374.True or False:
Beaverhill Lake is a bird habitat in Alberta.
Answer: True



375.
Multiple Choice:
Which Alberta university specializes in trades and technical education?
A. University of Lethbridge
B. Northern Alberta Institute of Technology (NAIT)
C. Mount Royal University
D. Athabasca University
Answer: B. Northern Alberta Institute of Technology (NAIT)
376.True or False:
NAIT focuses on trades and applied sciences.
Answer: True
377.Multiple Choice:
Which Alberta national park borders British Columbia and features glaciers?
A. Elk Island
B. Jasper
C. Wood Buffalo
D. Dinosaur Provincial Park
Answer: B. Jasper
378.True or False:
Jasper National Park is in the Canadian Rockies.
Answer: True
379.Multiple Choice:
Which city has Alberta’s largest zoo?
A. Edmonton
B. Red Deer
C. Calgary
D. Medicine Hat
Answer: C. Calgary
380.True or False:
Calgary Zoo is Alberta’s largest zoo.
Answer: True
381.Multiple Choice:
Which of these is a Métis cultural center in Alberta?
A. Heritage House
B. St. Paul Church
C. Métis Crossing
D. Prairie Lodge
Answer: C. Métis Crossing
382.True or False:
Métis Crossing is Alberta’s main Métis cultural site.
Answer: True
383.Multiple Choice:
Which industry employs most Albertans in rural areas?
A. Tourism
B. Agriculture
C. Finance
D. Technology
Answer: B. Agriculture
384.True or False:
Most rural Albertans work in agriculture.
Answer: True
385.Multiple Choice:
Which Alberta city is known for tech innovation and oil headquarters?
A. Lethbridge
B. Calgary
C. Brooks
D. St. Albert
Answer: B. Calgary
386.True or False:
Calgary is a major hub for tech and oil companies.
Answer: True
387.Multiple Choice:
Which Alberta town is home to the Alberta Prairie Railway Excursions?
A. Red Deer
B. Drumheller
C. Stettler
D. Okotoks
Answer: C. Stettler
388.True or False:
Stettler offers tourist train rides on historic railways.
Answer: True
389.Multiple Choice:
Which Alberta town was Alberta’s first capital?
A. Calgary
B. Fort Macleod
C. Edmonton
D. Banff
Answer: C. Edmonto
390.True or False:
Edmonton has always been Alberta’s capital.
Answer: True
391.Multiple Choice:
Which Alberta town is known for its medicine wheel site?
A. Cardston
B. Majorville
C. Grande Cache
D. Canmore
Answer: B. Majorville
392.True or False:
The Majorville Medicine Wheel is a sacred Indigenous site in Alberta.
Answer: True
393.Multiple Choice:
What is Alberta’s official sport animal symbol?
A. Caribou
B. Bison
C. Big Horn Sheep
D. Elk
Answer: C. Big Horn Sheep
394.True or False:
The Big Horn Sheep is an official Alberta symbol.
Answer: True
395.Multiple Choice:
Which Alberta agency supports immigration and newcomer services?
A. Federal Aid Program
B. Immigration and Settlement Alberta (ISA)
C. Alberta Tax Board
D. Alberta Travel Bureau
Answer: B. Immigration and Settlement Alberta (ISA)
396.True or False:
Alberta supports immigrants through ISA.
Answer: True
397.Multiple Choice:
What is Alberta’s average provincial tax rate (PST)?
A. 5%
B. 13%
C. 8%
D. 0% (no PST)
Answer: D. 0% (no PST)
398.True or False:
Alberta has no provincial sales tax.
Answer: True
399.Multiple Choice:
What major Alberta trail links mountain towns and cities?
A. Trans-Canada Trail (The Great Trail)
B. Wood Buffalo Path
B. Alberta Rockies Line
C. Western Plains Route
Answer: A. Trans-Canada Trail (The Great Trail)
400.True or False:
The Trans-Canada Trail passes through Alberta.
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
        $pattern = '/^(\d+)\.\s*(Multiple Choice:|True or False:)\s*([\s\S]*?)\s*Answer:\s*(.+?)(?:\s*\([\s\S]*?\))?(?=\s*\d+\.|\Z)/sim';

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
            $this->command->error("No questions found or initial parsing failed with the regex pattern.");
            // Log the beginning of the text to help diagnose if the whole block is malformed
            $this->command->error("Text start: " . substr($questionsText, 0, 500) . "...");
        }


        $this->command->info("Parsed " . count($questions) . " questions for Alberta.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $albertaSection->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Alberta citizenship questions.");
    }
}
