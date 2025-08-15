<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManitobaQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $manitoba = CourseSection::firstOrCreate(
            ['title' => 'Manitoba'],
            [
                'type' => 'province',
                'capital' => 'Winnipeg',
                'flag' => '/images/flags/manitoba.png',
                'description' => 'Questions specific to Manitoba.',
                'summary_audio_url' => '/audio/summary_manitoba.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $manitoba->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
        I will reformat the 400 Manitoba Citizenship Test questions into the specific format you have requested. Each question will be numbered on its own line, followed by the question type, the question itself, and the answer, including any explanations.

***

1.
True or False:
Manitoba is one of the Atlantic provinces.
Answer: False
(Explanation: Manitoba is a Prairie province located in central Canada.)

2.
Multiple Choice:
What is the main city of Manitoba?
A. Brandon
B. Winnipeg
C. Churchill
D. Thompson
Answer: B. Winnipeg

3.
True or False:
Manitoba was the first province to join Confederation in 1867.
Answer: False
(Explanation: Manitoba joined Confederation in 1870, not 1867.)

4.
Multiple Choice:
Which major lake is located in Manitoba?
A. Lake Superior
B. Lake Winnipeg
C. Lake Ontario
D. Lake Huron
Answer: B. Lake Winnipeg

5.
True or False:
Manitoba is located on the Pacific Coast.
Answer: False
(Explanation: Manitoba is a central, landlocked province.)

6.
Multiple Choice:
What is the name of Manitoba’s provincial legislature?
A. Legislative Assembly of Manitoba
B. Manitoba House
C. Prairie Parliament
D. Manitoba Senate
Answer: A. Legislative Assembly of Manitoba

7.
True or False:
The Legislative Assembly of Manitoba is located in Brandon.
Answer: False
(Explanation: It is located in Winnipeg, the provincial capital.)

8.
Multiple Choice:
Which industry has historically been important to Manitoba’s economy?
A. Forestry
B. Oil and Gas
C. Agriculture
D. Fishing
Answer: C. Agriculture

9.
True or False:
Manitoba’s economy relies mainly on shipbuilding.
Answer: False
(Explanation: Agriculture and manufacturing are key sectors, not shipbuilding.)

10.
Multiple Choice:
Which Indigenous nation has deep roots in Manitoba?
A. Inuit
B. Mi’kmaq
C. Métis
D. Haida
Answer: C. Métis

11.
True or False:
The Red River Settlement played a major role in Métis history.
Answer: True

12.
Multiple Choice:
Who is the current Premier of Manitoba as of 2025?
A. Wab Kinew
B. Heather Stefanson
C. Brian Pallister
D. Gary Doer
Answer: A. Wab Kinew

13.
True or False:
Manitoba has a unicameral legislature.
Answer: True
(Explanation: Like other provinces, Manitoba has one legislative chamber.)

14.
Multiple Choice:
Which city is the largest in Manitoba?
A. Brandon
B. Churchill
C. Winnipeg
D. Dauphin
Answer: C. Winnipeg

15.
True or False:
Churchill, Manitoba is known for polar bears.
Answer: True

16.
Multiple Choice:
Which river flows through Winnipeg?
A. Fraser River
B. Saint Lawrence River
C. Red River
D. Ottawa River
Answer: C. Red River

17.
True or False:
Winnipeg is located on the Atlantic Coast.
Answer: False
(Explanation: Winnipeg is inland and part of central Canada.)

18.
Multiple Choice:
Which important treaty area includes much of Manitoba?
A. Treaty 1
B. Treaty 7
C. Treaty 8
D. Treaty 10
Answer: A. Treaty 1

19.
True or False:
Treaty 1 was signed in British Columbia.
Answer: False
(Explanation: Treaty 1 was signed in southern Manitoba.)

20.
Multiple Choice:
Which cultural event is celebrated annually in Manitoba?
A. Calgary Stampede
B. Folklorama
C. Caribana
D. Winterlude
Answer: B. Folklorama

21.
True or False:
Folklorama celebrates only French Canadian culture.
Answer: False
(Explanation: Folklorama celebrates many global cultures.)

22.
Multiple Choice:
What nickname is sometimes used for Manitoba?
A. Canada’s Ocean Gateway
B. The Wild Rose Province
C. The Keystone Province
D. The Maple Province
Answer: C. The Keystone Province

23.
True or False:
The term “Keystone Province” refers to Manitoba’s central location in Canada.
Answer: True

24.
Multiple Choice:
Which Manitoba city is known for its proximity to polar bear habitats?
A. Brandon
B. Dauphin
C. Winnipeg
D. Churchill
Answer: D. Churchill

25.
True or False:
Churchill, Manitoba, is a popular destination for whale watching and northern lights.
Answer: True

26.
Multiple Choice:
Which large festival in Manitoba celebrates multiculturalism?
A. Canada Day Parade
B. Folklorama
C. Winnipeg Fringe Festival
D. Nuit Blanche
Answer: B. Folklorama

27.
True or False:
Folklorama is hosted in the fall every two years.
Answer: False
(Explanation: Folklorama is held annually during the summer.)

28.
Multiple Choice:
What body of water lies north of Manitoba?
A. Lake Ontario
B. Hudson Bay
C. Bay of Fundy
D. Lake Erie
Answer: B. Hudson Bay

29.
True or False:
Manitoba is a coastal province.
Answer: False
(Explanation: Although it borders Hudson Bay, Manitoba is not typically considered a coastal province.)

30.
Multiple Choice:
Which ethnic community has a significant population in Manitoba?
A. Punjabi
B. Icelandic
C. Greek
D. Portuguese
Answer: B. Icelandic

31.
True or False:
The town of Gimli, Manitoba, has strong Icelandic roots.
Answer: True

32.
Multiple Choice:
Who represents the King in Manitoba?
A. The Prime Minister
B. The Mayor of Winnipeg
C. The Lieutenant Governor
D. The Premier
Answer: C. The Lieutenant Governor

33.
True or False:
The Premier of Manitoba is appointed by the King.
Answer: False
(Explanation: The Premier is the leader of the political party that wins the most seats in the provincial election.)

34.
Multiple Choice:
What is the name of Manitoba’s current Lieutenant Governor as of 2025?
A. Anita Neville
B. Janice Filmon
C. Adrienne Clarkson
D. Brenda Murphy
Answer: A. Anita Neville

35.
True or False:
Anita Neville is the first female Lieutenant Governor of Manitoba.
Answer: False
(Explanation: She is the first Jewish Lieutenant Governor but not the first female.)

36.
Multiple Choice:
What is a key export from Manitoba’s agricultural sector?
A. Grapes
B. Wheat
C. Bananas
D. Cotton
Answer: B. Wheat

37.
True or False:
Manitoba has a tropical climate ideal for citrus farming.
Answer: False
(Explanation: Manitoba has a continental climate with cold winters, not suitable for citrus farming.)

38.
Multiple Choice:
Which of the following is a historic event associated with Manitoba?
A. The War of 1812
B. The Red River Rebellion
C. The Quebec Referendum
D. The Komagata Maru Incident
Answer: B. The Red River Rebellion

39.
True or False:
Louis Riel was a key leader in the Red River Rebellion.
Answer: True

40.
Multiple Choice:
Which religion was commonly practiced by early settlers in Manitoba?
A. Hinduism
B. Islam
C. Christianity
D. Buddhism
Answer: C. Christianity

41.
True or False:
Manitoba has no Indigenous population today.
Answer: False
(Explanation: Manitoba has a large and vibrant Indigenous population.)

42.
Multiple Choice:
What year did Manitoba join Confederation?
A. 1867
B. 1870
C. 1871
D. 1880
Answer: B. 1870

43.
True or False:
Manitoba was the fifth province to join Canada.
Answer: True

44.
Multiple Choice:
What natural disaster severely affected Winnipeg in 1950?
A. Earthquake
B. Wildfire
C. Tornado
D. Flood
Answer: D. Flood

45.
True or False:
The 1950 Winnipeg flood led to the creation of the Red River Floodway.
Answer: True

46.
Multiple Choice:
What is the official flower of manitoba
A. Prairie Lily
B. Crocus
C. Wild Rose
D. Blue Flag
Answer: B. Crocus

47.
True or False:
The Prairie Lily is Manitoba’s official flower.
Answer: False
(Explanation: Saskatchewan’s flower is the Prairie Lily; Manitoba’s is the Crocus.)

48.
Multiple Choice:
What is the primary language spoken in Manitoba?
A. French
B. English
C. Cree
D. Spanish
Answer: B. English

49.
True or False:
Manitoba is officially unilingual.
Answer: False
(Explanation: Manitoba is officially bilingual: English and French.)

50.
Multiple Choice:
What is the population range of Manitoba (approx.) in 2025?
A. 1.4 million
B. 3 million
C. 500,000
D. 4.5 million
Answer: A. 1.4 million

51.
True or False:
Manitoba has one of the largest populations in Canada.
Answer: False
(Explanation: Manitoba has a moderate population, smaller than Ontario, Quebec, or BC.)

52.
Multiple Choice:
Which major river runs through Winnipeg?
A. Fraser River
B. Mackenzie River
C. Red River
D. Ottawa River
Answer: C. Red River

53.
True or False:
The Red River flows north into Hudson Bay.
Answer: True

54.
Multiple Choice:
Who is considered the founder of Manitoba?
A. Sir John A. Macdonald
B. Lord Selkirk
C. Louis Riel
D. Wilfrid Laurier
Answer: C. Louis Riel

55.
True or False:
Louis Riel led a rebellion to oppose the British monarchy.
Answer: False
(Explanation: Louis Riel fought to defend Métis rights and was not against the monarchy directly.)

56.
Multiple Choice:
Which Manitoba university was founded in 1877?
A. Brandon University
B. University of Winnipeg
C. University of Manitoba
D. Red River College
Answer: C. University of Manitoba

57.
True or False:
The University of Manitoba is the oldest university in Western Canada.
Answer: True

58.
Multiple Choice:
Which animal is featured on Manitoba’s coat of arms?
A. Moose
B. Wolf
C. Bison
D. Bear
Answer: C. Bison

59.
True or False:
The bear is Manitoba’s provincial animal.
Answer: False
(Explanation: The bison is Manitoba’s provincial animal.)

60.
Multiple Choice:
What significant role did the Red River Settlement play?
A. Military training base
B. Early Canadian broadcasting
C. Métis homeland and farming community
D. Arctic exploration
Answer: C. Métis homeland and farming community

61.
True or False:
The Red River Settlement was established in the 20th century.
Answer: False
(Explanation: It was established in the early 19th century.)

62.
Multiple Choice:
Which Manitoba city is a major railway and transport hub?
A. The Pas
B. Brandon
C. Churchill
D. Winnipeg
Answer: D. Winnipeg

63.
True or False:
Winnipeg is sometimes referred to as the “Chicago of the North.”
Answer: True

64.
Multiple Choice:
What does the Manitoba flag feature in the top left corner?
A. Fleur-de-lis
B. Union Jack
C. Maple Leaf
D. A polar bear
Answer: B. Union Jack

65.
True or False:
Manitoba’s flag has a red background and the Union Jack.
Answer: True

66.
Multiple Choice:
Which geographic feature is Manitoba known for?
A. Rainforests
B. Sand dunes
C. Flat prairies and lakes
D. Volcanoes
Answer: C. Flat prairies and lakes

67.
True or False:
Manitoba is a mountainous province.
Answer: False
(Explanation: Manitoba is mostly flat with large areas of lakes and forests.)

68.
Multiple Choice:
What is the second-largest city in Manitoba?
A. Brandon
B. Steinbach
C. Thompson
D. Winkler
Answer: A. Brandon

69.
True or False:
Thompson is the capital of Manitoba.
Answer: False
(Explanation: Winnipeg is the capital.)

70.
Multiple Choice:
Which public event in Manitoba celebrates winter?
A. Winterlude
B. Festival du Voyageur
C. Ice Magic
D. Polar Fest
Answer: B. Festival du Voyageur

71.
True or False:
Festival du Voyageur is held in the summer.
Answer: False
(Explanation: It is held in February to celebrate winter and Francophone culture.)

72.
Multiple Choice:
Which industry is a key part of Manitoba’s economy?
A. Diamond mining
B. Software development
C. Agriculture
D. Oil refining
Answer: C. Agriculture

73.
True or False:
Manitoba is the top producer of seafood in Canada.
Answer: False
(Explanation: Manitoba is landlocked; it is known for grains, livestock, and dairy.)

74.
Multiple Choice:
Who leads the Manitoba government?
A. Mayor
B. Lieutenant Governor
C. Premier
D. Senator
Answer: C. Premier

75.
True or False:
The Premier is elected through a province-wide vote.
Answer: False
(Explanation: Voters elect Members of the Legislative Assembly (MLAs), and the leader of the majority party becomes Premier.)

76.
Multiple Choice:
What is the legislative body of Manitoba called?
A. House of Commons
B. National Assembly
C. Manitoba Legislature
D. Senate of Manitoba
Answer: C. Manitoba Legislature

77.
True or False:
Manitoba’s Legislature is in Brandon.
Answer: False
(Explanation: It is located in Winnipeg.)

78.
Multiple Choice:
What is the main Indigenous language spoken in Manitoba?
A. Dene
B. Mi’kmaq
C. Cree
D. Inuktitut
Answer: C. Cree

79.
True or False:
French is the only Indigenous language spoken in Manitoba.
Answer: False
(Explanation: Several Indigenous languages are spoken, including Cree, Ojibwe, and Dakota.)

80.
Multiple Choice:
What was Louis Riel’s vision for Manitoba?
A. A monarchy ruled by Indigenous leaders
B. A Métis-led republic
C. A united country under the U.S.
D. A mining colony
Answer: B. A Métis-led republic

81.
True or False:
Louis Riel opposed the Métis and supported colonialism.
Answer: False
(Explanation: Riel supported Métis rights and cultural preservation.)

82.
Multiple Choice:
Which community in Manitoba is famous for its polar bears?
A. Brandon
B. Churchill
C. The Pas
D. Dauphin
Answer: B. Churchill

83.
True or False:
Churchill is located on the shores of Lake Manitoba.
Answer: False
(Explanation: Churchill is on the shores of Hudson Bay.)

84.
Multiple Choice:
What is the name of Manitoba’s official flower?
A. Prairie Crocus
B. Wild Rose
C. White Trillium
D. Blue Flag
Answer: A. Prairie Crocus

85.
True or False:
The prairie crocus blooms during winter.
Answer: False
(Explanation: It is one of the first flowers to bloom in spring.)

86.
Multiple Choice:
What major lake is located entirely within Manitoba?
A. Lake Erie
B. Lake Superior
C. Lake Manitoba
D. Great Slave Lake
Answer: C. Lake Manitoba

87.
True or False:
Lake Manitoba is connected to Lake Winnipegosis.
Answer: True

88.
Multiple Choice:
Which Manitoba city is known as the “Hub of the North”?
A. Churchill
B. Thompson
C. Dauphin
D. Flin Flon
Answer: B. Thompson

89.
True or False:
Thompson is in the southernmost part of Manitoba.
Answer: False
(Explanation: Thompson is located in northern Manitoba.)

90.
Multiple Choice:
Which ethnic group played a key role in Manitoba’s history and culture?
A. Japanese
B. Métis
C. German
D. Russian
Answer: B. Métis

91.
True or False:
The Métis people have no recognized status in Canada.
Answer: False
(Explanation: The Métis are one of Canada’s three recognized Indigenous peoples.)

92.
Multiple Choice:
What is the population range of Manitoba (as of 2025 estimates)?
A. 1–1.5 million
B. 500,000–750,000
C. 2–3 million
D. Under 500,000
Answer: A. 1–1.5 million

93.
True or False:
Manitoba’s population is mostly concentrated in Winnipeg.
Answer: True

94.
Multiple Choice:
What is the role of the Lieutenant Governor in Manitoba?
A. Leads city councils
B. Represents the Prime Minister
C. Represents the King
D. Manages provincial parks
Answer: C. Represents the King

95.
True or False:
The Lieutenant Governor is appointed by the Premier.
Answer: False
(Explanation: The Lieutenant Governor is appointed by the Governor General on the advice of the Prime Minister.)

96.
Multiple Choice:
Which Manitoba festival celebrates multiculturalism?
A. Festival du Voyageur
B. Winterlude
C. Folklorama
D. Caribana
Answer: C. Folklorama

97.
True or False:
Folklorama is a celebration of only Francophone culture.
Answer: False
(Explanation: It celebrates many cultures from around the world.)

98.
Multiple Choice:
Which political party is currently leading Manitoba (2025)?
A. Liberal Party
B. Progressive Conservative Party
C. Manitoba NDP
D. Green Party
Answer: C. Manitoba NDP

99.
True or False:
The Premier of Manitoba in 2025 is Wab Kinew.
Answer: True
(Explanation: Wab Kinew leads the Manitoba NDP government as of 2025.)

100.
Multiple Choice:
Which organization governs health services in Manitoba?
A. Health Canada
B. Red River Health
C. Manitoba Health
D. Prairie Wellness Board
Answer: C. Manitoba Health

101.
True or False:
Health care in Manitoba is free for all residents.
Answer: True
(Explanation: Basic health care services are publicly funded in Manitoba.)

102.
Multiple Choice:
Which historic fort is located near the Red and Assiniboine Rivers?
A. Fort Henry
B. Fort Garry
C. Fort George
D. Fort Nelson
Answer: B. Fort Garry

103.
True or False:
Fort Garry was built after World War I.
Answer: False
(Explanation: Fort Garry was established in the early 1800s.)

104.
Multiple Choice:
What is the Manitoba Legislative Building topped with?
A. A maple leaf
B. A lion statue
C. The Golden Boy statue
D. A torch
Answer: C. The Golden Boy statue

105.
True or False:
The Golden Boy faces west.
Answer: False
(Explanation: The Golden Boy faces north.)

106.
Multiple Choice:
Which city hosts the Royal Manitoba Winter Fair?
A. Winnipeg
B. Brandon
C. Portage la Prairie
D. Thompson
Answer: B. Brandon

107.
True or False:
The Royal Manitoba Winter Fair is held in the summer.
Answer: False
(Explanation: It is held in late March.)

108.
Multiple Choice:
Which Manitoba body is responsible for education?
A. Department of Social Services
B. Manitoba Education
C. Canada Learning Council
D. Western Curriculum Alliance
Answer: B. Manitoba Education

109.
True or False:
Education in Manitoba is only available in English.
Answer: False
(Explanation: Education is offered in both English and French.)

110.
Multiple Choice:
Which group traditionally hunted bison in Manitoba?
A. Inuit
B. Métis
C. Vikings
D. French settlers
Answer: B. Métis

111.
True or False:
Bison were central to the Métis economy and culture.
Answer: True

112. 
Multiple Choice:
Which lake is one of the largest in Manitoba?
A. Lake Ontario
B. Lake Manitoba
C. Great Bear Lake
D. Lake Erie
Answer: B. Lake Manitoba

113.
True or False:
Lake Manitoba is saltwater.
Answer: False
(Explanation: It is a freshwater lake.)

114.
Multiple Choice:
What is Manitoba’s provincial bird?
A. Robin
B. Great Grey Owl
C. Snowy Owl
D. Blue Jay
Answer: B. Great Grey Owl

115.
True or False:
The loon is Manitoba’s official bird.
Answer: False
(Explanation: The Great Grey Owl is the official bird.)

116.
Multiple Choice:
Which Manitoba city is near the Saskatchewan border?
A. Churchill
B. Brandon
C. Steinbach
D. Thompson
Answer: B. Brandon

117.
True or False:
Steinbach is west of Winnipeg.
Answer: False
(Explanation: Steinbach is southeast of Winnipeg.)

118.
Multiple Choice:
Which organization manages the environment in Manitoba?
A. Parks Canada
B. Environment Manitoba
C. Manitoba Conservation
D. Eco Watch Manitoba
Answer: C. Manitoba Conservation

119.
True or False:
Manitoba Conservation is a federal agency.
Answer: False
(Explanation: It is a provincial agency.)

120.
Multiple Choice:
What is a common crop grown in Manitoba?
A. Bananas
B. Wheat
C. Grapes
D. Rice
Answer: B. Wheat

121.
True or False:
Manitoba has a strong fishing industry.
Answer: True

122.
Multiple Choice:
Which Manitoba river is a major tributary of the Red River?
A. Saskatchewan River
B. Churchill River
C. Assiniboine River
D. Peace River
Answer: C. Assiniboine River

123.
True or False:
The Assiniboine River joins the Red River in Brandon.
Answer: False
(Explanation: The rivers meet at The Forks in Winnipeg.)

124.
Multiple Choice:
What is the Manitoba Museum best known for?
A. Underwater exhibits
B. Planetarium and prairie history
C. Live polar bear viewing
D. Fossils from British Columbia
Answer: B. Planetarium and prairie history

125.
True or False:
The Manitoba Museum is located in Brandon.
Answer: False
(Explanation: It is located in Winnipeg.)

126.
Multiple Choice:
Which group of people traditionally lived in northern Manitoba?
A. Cree
B. Mohawk
C. Huron
D. Inuit
Answer: A. Cree

127.
True or False:
Cree communities still live in parts of Manitoba today.
Answer: True

128.
Multiple Choice:
What is a major industry in northern Manitoba?
A. Wine production
B. Forestry and mining
C. Surf tourism
D. Aerospace
Answer: B. Forestry and mining

129.
True or False:
Manitoba has no natural resource industries.
Answer: False
(Explanation: Manitoba has significant resource industries like mining and forestry.)

130.
Multiple Choice:
What is the name of the historic trading post that became Winnipeg?
A. Fort York
B. Fort Churchill
C. Fort Garry
D. Fort Louisbourg
Answer: C. Fort Garry

131.
True or False:
Fort Garry was founded by the French.
Answer: False
(Explanation: Fort Garry was established by the Hudson’s Bay Company.)

132.
Multiple Choice:
Which First Nations treaty territory includes southern Manitoba?
A. Treaty 1
B. Treaty 4
C. Treaty 7
D. Treaty 11
Answer: A. Treaty 1

133.
True or False:
Treaty 1 was signed in 1990.
Answer: False
(Explanation: Treaty 1 was signed in 1871.)

134.
Multiple Choice:
What type of climate does Manitoba mostly have?
A. Tropical
B. Desert
C. Continental
D. Arctic
Answer: C. Continental

135.
True or False:
Manitoba’s winters are typically mild.
Answer: False
(Explanation: Manitoba has very cold winters.)

136.
Multiple Choice:
Who is the monarch represented in Manitoba’s government?
A. King George VI
B. Queen Elizabeth II
C. King Charles III
D. Queen Victoria
Answer: C. King Charles III

137.
True or False:
The King plays an active political role in Manitoba.
Answer: False
(Explanation: The King is a ceremonial figure represented by the Lieutenant Governor.)

138.
Multiple Choice:
Which Manitoba city is known for its Icelandic heritage?
A. Selkirk
B. Gimli
C. Brandon
D. Morden
Answer: B. Gimli

139.
True or False:
Gimli hosts an annual Icelandic festival.
Answer: True

140.
Multiple Choice:
Which event was crucial in the creation of Manitoba in 1870?
A. Battle of Vimy Ridge
B. Red River Resistance
C. Charlottetown Conference
D. Confederation of 1867
Answer: B. Red River Resistance

141.
True or False:
The Red River Resistance was led by Louis Riel.
Answer: True

142.
Multiple Choice:
What is Manitoba’s official tree?
A. Oak
B. Spruce
C. White Cedar
D. White Elm
Answer: D. White Elm

143.
True or False:
The White Elm is Manitoba’s official flower.
Answer: False
(Explanation: It is the official tree, not flower.)

144.
Multiple Choice:
Which province borders Manitoba to the east?
A. Alberta
B. British Columbia
C. Ontario
D. Quebec
Answer: C. Ontario

145.
True or False:
Manitoba borders the Atlantic Ocean.
Answer: False
(Explanation: Manitoba is landlocked.)

146.
Multiple Choice:
Who was Louis Riel?
A. Manitoba’s first Premier
B. A Métis leader
C. Founder of the RCMP
D. Explorer of the North
Answer: B. A Métis leader

147.
True or False:
Louis Riel is considered a Father of Confederation.
Answer: False
(Explanation: While he was a founding figure of Manitoba, he was not officially a Father of Confederation.)

148.
Multiple Choice:
What is The Forks in Winnipeg?
A. Government building
B. Shopping mall
C. Historic site where rivers meet
D. Railway station
Answer: C. Historic site where rivers meet

149.
True or False:
The Forks is where the Assiniboine and Red Rivers meet.
Answer: True

150.
Multiple Choice:
Which Manitoba city is a center for agricultural research?
A. Brandon
B. The Pas
C. Portage la Prairie
D. Steinbach
Answer: A. Brandon

151.
True or False:
Brandon is home to an important agricultural fair.
Answer: True

152.
Multiple Choice:
Who is the current Premier of Manitoba (as of 2025)?
A. Heather Stefanson
B. Brian Pallister
C. Wab Kinew
D. Greg Selinger
Answer: C. Wab Kinew

153.
True or False:
Wab Kinew leads the Manitoba Liberal Party.
Answer: False
(Explanation: He is the leader of the Manitoba NDP.)

154.
Multiple Choice:
What is the name of Manitoba’s main daily newspaper?
A. The Globe and Mail
B. Winnipeg Tribune
C. Winnipeg Free Press
D. Manitoba Herald
Answer: C. Winnipeg Free Press

155.
True or False:
The Winnipeg Free Press is a national newspaper.
Answer: False
(Explanation: It is a provincial newspaper based in Manitoba.)

156.
Multiple Choice:
Which Manitoba city is known for French-Canadian culture?
A. Steinbach
B. St. Boniface
C. Churchill
D. Winkler
Answer: B. St. Boniface

157.
True or False:
St. Boniface is part of Winnipeg.
Answer: True

158.
Multiple Choice:
What important document made Manitoba a province?
A. Manitoba Confederation Charter
B. British North America Act
C. Manitoba Act
D. Canadian Union Treaty
Answer: C. Manitoba Act

159.
True or False:
The Manitoba Act was signed in 1867.
Answer: False
(Explanation: It was passed in 1870.)

160.
Multiple Choice:
Which of the following is NOT in Manitoba?
A. Red River
B. Lake Manitoba
C. Hudson Bay
D. Fraser River
Answer: D. Fraser River

161.
True or False:
Hudson Bay touches Manitoba’s coastline.
Answer: True

162.
Multiple Choice:
What is Manitoba’s provincial motto?
A. Strong and Free
B. Glorious and Free
C. Gloriosus et Liber
D. Unity in Diversity
Answer: C. Gloriosus et Liber

163.
True or False:
“Gloriosus et Liber” means “Glorious and Free.”
Answer: True

164.
Multiple Choice:
What is the Manitoba Legislative Assembly?
A. Federal government office
B. Provincial court
C. Manitoba’s provincial parliament
D. City council
Answer: C. Manitoba’s provincial parliament

165.
True or False:
Members of the Legislative Assembly are appointed.
Answer: False
(Explanation: MLAs are elected by Manitoba citizens.)

166.
Multiple Choice:
Which historic group settled in Manitoba in the late 1800s?
A. Acadians
B. Mennonites
C. Vikings
D. Doukhobors
Answer: B. Mennonites

167.
True or False:
Mennonites mainly settled in Winnipeg.
Answer: False
(Explanation: Many settled in rural southeastern Manitoba.)

168.
Multiple Choice:
What is one of the economic drivers of Manitoba?
A. Oil exports
B. Tourism and agriculture
C. Shipbuilding
D. Logging
Answer: B. Tourism and agriculture

169.
True or False:
Tourism in Manitoba is focused on beach resorts.
Answer: False
(Explanation: Tourism includes polar bears, culture, and nature, not beach resorts.)

170.
Multiple Choice:
What type of government does Manitoba have?
A. Federal dictatorship
B. Unicameral parliamentary democracy
C. Monarchy-led council
D. Bicameral legislature
Answer: B. Unicameral parliamentary democracy

171.
True or False:
The Manitoba government is divided into two houses.
Answer: False
(Explanation: It has a single-house legislature – unicameral.)

172.
Multiple Choice:
Which major Manitoba airport serves as an international hub?
A. Brandon Municipal Airport
B. Thompson Regional Airport
C. Winnipeg James Armstrong Richardson International Airport
D. Portage la Prairie Airfield
Answer: C. Winnipeg James Armstrong Richardson International Airport

173.
True or False:
Manitoba’s main airport is named after a famous Canadian pilot.
Answer: True
(Explanation: James A. Richardson was a pioneer in Canadian aviation.)

174.
Multiple Choice:
What is Manitoba’s official flower?
A. Wild Rose
B. Prairie Crocus
C. Trillium
D. Blue Flag Iris
Answer: B. Prairie Crocus

175.
True or False:
The Prairie Crocus blooms in summer.
Answer: False
(Explanation: It blooms in early spring.)

176.
Multiple Choice:
Which city in Manitoba is famous for being a railway hub?
A. Brandon
B. Winnipeg
C. Thompson
D. Morden
Answer: B. Winnipeg

177.
True or False:
Winnipeg is located near the Rocky Mountains.
Answer: False
(Explanation: Winnipeg is in the flat central prairies, far from the Rockies.)

178.
Multiple Choice:
What major national route runs through Manitoba?
A. Highway 1 (Trans-Canada Highway)
B. Pacific Coastal Highway
C. Highway 401
D. Queen Elizabeth Way
Answer: A. Highway 1 (Trans-Canada Highway)

179.
True or False:
The Trans-Canada Highway ends in Manitoba.
Answer: False
(Explanation: It passes through Manitoba but stretches across Canada.)

180.
Multiple Choice:
Which Manitoba city is a center for Northern services and Indigenous communities?
A. Churchill
B. The Pas
C. Dauphin
D. Selkirk
Answer: B. The Pas

181.
True or False:
The Pas is located in southern Manitoba.
Answer: False
(Explanation: It is located in the north-central part of the province.)

182.
Multiple Choice:
Which is the longest-serving Premier in Manitoba history?
A. Gary Filmon
B. Howard Pawley
C. John Bracken
D. Edward Schreyer
Answer: C. John Bracken

183.
True or False:
John Bracken served as Premier for over 20 years.
Answer: False
(Explanation: He served for 17 years, from 1922 to 1943.)

184.
Multiple Choice:
Which public body oversees healthcare in Manitoba?
A. Manitoba Health Authority
B. Manitoba Health, Seniors and Active Living
C. Prairie Health Organization
D. Health Canada – Prairie Division
Answer: B. Manitoba Health, Seniors and Active Living

185.
True or False:
Health care in Manitoba is fully privatized.
Answer: False
(Explanation: Manitoba has a public healthcare system.)

186.
Multiple Choice:
Which Manitoba event is the largest winter festival in Western Canada?
A. Ice Magic Festival
B. Festival du Voyageur
C. Snow Days Winnipeg
D. Frost & Fire Celebration
Answer: B. Festival du Voyageur

187.
True or False:
Festival du Voyageur celebrates only British traditions.
Answer: False
(Explanation: It celebrates French-Canadian and Métis heritage.)

188.
Multiple Choice:
What percentage of Manitoba’s population lives in Winnipeg (as of 2025 estimates)?
A. 20%
B. 35%
C. 55%
D. Over 70%
Answer: D. Over 70%

189.
True or False:
Most Manitobans live in small towns.
Answer: False
(Explanation: The majority live in the Winnipeg metropolitan area.)

190.
Multiple Choice:
Which province is directly west of Manitoba?
A. British Columbia
B. Saskatchewan
C. Ontario
D. Alberta
Answer: B. Saskatchewan

191.
True or False:
Saskatchewan and Manitoba share a border.
Answer: True

192.
Multiple Choice:
Which is Manitoba’s second-largest city by population?
A. Brandon
B. Steinbach
C. Dauphin
D. Portage la Prairie
Answer: A. Brandon

193.
True or False:
Brandon is located in eastern Manitoba.
Answer: False
(Explanation: It is located in southwestern Manitoba.)

194.
Multiple Choice:
What is the legislative title of elected officials in Manitoba?
A. Members of Parliament (MPs)
B. Senators
C. Members of the Legislative Assembly (MLAs)
D. Councilors
Answer: C. Members of the Legislative Assembly (MLAs)

195.
True or False:
MLAs represent districts called ridings.
Answer: True

196.
Multiple Choice:
Which cultural group has strong roots in southern Manitoba?
A. Ukrainians
B. Acadians
C. Chinese
D. Scots
Answer: A. Ukrainians

197.
True or False:
Ukrainian culture has no influence in Manitoba.
Answer: False
(Explanation: Ukrainian settlers played a large role in Manitoba’s development.)

198.
Multiple Choice:
Which of the following animals is associated with Manitoba’s north?
A. Black bear
B. Polar bear
C. Moose
D. Cougar
Answer: B. Polar bear

199.
True or False:
Churchill is known as the “Polar Bear Capital of the World.”
Answer: True

200.
Multiple Choice:
Which Manitoba university is known for French-language education?
A. University of Manitoba
B. Brandon University
C. Université de Saint-Boniface
D. Manitoba College
Answer: C. Université de Saint-Boniface

201.
True or False:
Université de Saint-Boniface is affiliated with the University of Manitoba.
Answer: True

202.
Multiple Choice:
Which government official is appointed to represent the King in Manitoba?
A. Premier
B. Speaker of the House
C. Lieutenant Governor
D. Chief Justice
Answer: C. Lieutenant Governor

203.
True or False:
The Lieutenant Governor is elected every four years.
Answer: False
(Explanation: The Lieutenant Governor is appointed by the Governor General.)

204.
Multiple Choice:
Which is Manitoba’s provincial bird?
A. Snowy Owl
B. Great Gray Owl
C. Blue Jay
D. Chickadee
Answer: B. Great Gray Owl

205.
True or False:
The Bald Eagle is Manitoba’s official bird.
Answer: False
(Explanation: The Great Gray Owl is Manitoba’s bird emblem.)

206.
Multiple Choice:
What is the name of Manitoba’s official coat of arms animal?
A. Elk
B. Lion
C. Bison
D. Bear
Answer: C. Bison

207.
True or False:
The bison is a national symbol of Canada.
Answer: True
(Explanation: The bison symbolizes both Manitoba and Canada.)

208.
Multiple Choice:
Which Manitoba-based company is known globally for aerospace manufacturing?
A. WestJet
B. Boeing Canada Winnipeg
C. Bombardier
D. Air Canada
Answer: B. Boeing Canada Winnipeg

209.
True or False:
Manitoba’s aerospace industry is located mostly in Churchill.
Answer: False
(Explanation: Winnipeg is the main aerospace hub.)

210.
Multiple Choice:
Which provincial political party is currently in power in Manitoba (as of 2025)?
A. Progressive Conservative Party
B. Manitoba Liberal Party
C. New Democratic Party (NDP)
D. Green Party of Manitoba
Answer: C. New Democratic Party (NDP)

211.
True or False:
The Premier of Manitoba is the leader of the NDP.
Answer: True
(Explanation: Wab Kinew is the Premier and NDP leader.)

212.
Multiple Choice:
What is the name of Manitoba’s official provincial tree?
A. Jack Pine
B. White Spruce
C. Red Maple
D. Tamarack
Answer: B. White Spruce

213.
True or False:
Manitoba’s provincial tree is the Douglas Fir.
Answer: False
(Explanation: The White Spruce is the official tree, not Douglas Fir.)

214.
Multiple Choice:
Which Manitoba city is a gateway to northern mining operations?
A. Brandon
B. Flin Flon
C. Portage la Prairie
D. Selkirk
Answer: B. Flin Flon

215.
True or False:
Flin Flon lies in southern Manitoba.
Answer: False
(Explanation: Flin Flon is located in northern Manitoba.)

216.
Multiple Choice:
What is the highest court in Manitoba?
A. Court of Appeal
B. Provincial Court
C. Queen’s Bench
D. Federal Court
Answer: A. Court of Appeal

217.
True or False:
The Federal Court is Manitoba’s highest legal authority.
Answer: False
(Explanation: Manitoba’s highest court is the Manitoba Court of Appeal.)

218.
Multiple Choice:
Which Manitoba city was known for its fur trade in the 1800s?
A. Selkirk
B. Brandon
C. Fort Garry
D. Dauphin
Answer: C. Fort Garry

219.
True or False:
The Hudson’s Bay Company had trading posts in Manitoba.
Answer: True

220.
Multiple Choice:
What Indigenous group is one of the most populous in Manitoba?
A. Haida
B. Mi’kmaq
C. Anishinaabe
D. Cree
Answer: D. Cree

221.
True or False:
The Métis Nation originated in Manitoba.
Answer: True
(Explanation: Manitoba is recognized as the birthplace of the Métis Nation.)

222.
Multiple Choice:
What is the Manitoba Act of 1870 known for?
A. Creating the RCMP
B. Joining Manitoba to the U.S.
C. Bringing Manitoba into Confederation
D. Banning French in schools
Answer: C. Bringing Manitoba into Confederation

223.
True or False:
The Manitoba Act excluded Indigenous land rights.
Answer: False
(Explanation: It included provisions for Métis land rights.)

224.
Multiple Choice:
What famous Canadian human rights advocate came from Manitoba?
A. Tommy Douglas
B. Terry Fox
C. Nellie McClung
D. Pierre Trudeau
Answer: C. Nellie McClung

225.
True or False:
Nellie McClung fought for women’s voting rights.
Answer: True

226.
Multiple Choice:
What is the legislative building in Manitoba called?
A. Government Hall
B. Manitoba Legislative Building
C. Winnipeg Parliament
D. Prairie Government House
Answer: B. Manitoba Legislative Building

227.
True or False:
The Manitoba Legislative Building has a golden bison on top.
Answer: False
(Explanation: It has a golden statue called the “Golden Boy.”)

228.
Multiple Choice:
When did Manitoba grant women the right to vote provincially?
A. 1900
B. 1916
C. 1929
D. 1945
Answer: B. 1916

229.
True or False:
Manitoba was the first Canadian province to allow women to vote.
Answer: True

230.
Multiple Choice:
What museum in Winnipeg focuses on human rights?
A. Manitoba Museum
B. Canadian Museum of History
C. Royal Ontario Museum
D. Canadian Museum for Human Rights
Answer: D. Canadian Museum for Human Rights

231.
True or False:
The Canadian Museum for Human Rights is in Vancouver.
Answer: False
(Explanation: It is located in Winnipeg.)

232.
Multiple Choice:
Which river joins with the Red River in Winnipeg?
A. Saskatchewan River
B. Nelson River
C. Assiniboine River
D. Peace River
Answer: C. Assiniboine River

233.
True or False:
The Assiniboine and Red Rivers converge in Brandon.
Answer: False
(Explanation: They converge in Winnipeg.)

234.
Multiple Choice:
Who is the Premier of Manitoba as of 2025?
A. Heather Stefanson
B. Wab Kinew
C. Brian Pallister
D. Greg Selinger
Answer: B. Wab Kinew

235.
True or False:
Wab Kinew is the first Indigenous Premier of Manitoba.
Answer: True

236.
Multiple Choice:
What is the primary economic sector in rural Manitoba?
A. Mining
B. Fishing
C. Agriculture
D. Forestry
Answer: C. Agriculture

237.
True or False:
Canola and wheat are major crops in Manitoba.
Answer: True

238.
Multiple Choice:
Which event caused massive flooding in Manitoba in 1997?
A. The Prairie Storm
B. The Great Manitoba Flood
C. Red River Flood
D. Ice Jam Disaster
Answer: C. Red River Flood

239.
True or False:
The 1997 flood led to major infrastructure changes.
Answer: True

240.
Multiple Choice:
Which industry supports northern Manitoba’s economy?
A. Oil
B. Fishing
C. Mining
D. Farming
Answer: C. Mining

241.
True or False:
Northern Manitoba has extensive farmland.
Answer: False
(Explanation: It is more focused on resource industries like mining.)

242.
Multiple Choice:
What annual multicultural celebration occurs in Winnipeg?
A. Culture Days
B. Folklorama
C. Global Fest
D. Harmony Festival
Answer: B. Folklorama

243.
True or False:
Folklorama celebrates only French culture.
Answer: False
(Explanation: Folklorama celebrates diverse world cultures.)

244.
Multiple Choice:
Which lake is the largest entirely within Manitoba?
A. Lake Winnipegosis
B. Lake Manitoba
C. Lake Winnipeg
D. Cedar Lake
Answer: C. Lake Winnipeg

245.
True or False:
Lake Winnipeg is among the world’s largest freshwater lakes.
Answer: True

246.
Multiple Choice:
What region is known for its Mennonite heritage?
A. Interlake
B. Thompson
C. Steinbach
D. Churchill
Answer: C. Steinbach

247.
True or False:
The Mennonite community in Steinbach speaks only German.
Answer: False
(Explanation: Many speak English and Low German (Plautdietsch).)

248.
Multiple Choice:
Which Manitoba holiday celebrates French-Canadian heritage?
A. Louis Riel Day
B. Canada Day
C. Thanksgiving
D. Discovery Day
Answer: A. Louis Riel Day

249.
True or False:
Louis Riel Day is observed across all provinces.
Answer: False
(Explanation: It is a statutory holiday in Manitoba.)

250.
Multiple Choice:
Which Manitoba region is famous for viewing the Northern Lights?
A. Winnipeg
B. The Pas
C. Churchill
D. Brandon
Answer: C. Churchill

251.
True or False:
The Northern Lights are rarely seen in northern Manitoba.
Answer: False
(Explanation: Churchill is a popular viewing area for auroras.)

252.
Multiple Choice:
What water borders Manitoba to the northeast?
A. Hudson Bay
B. Lake Superior
C. Arctic Ocean
D. Pacific Ocean
Answer: A. Hudson Bay

253.
True or False:
Manitoba is landlocked with no coastline.
Answer: False
(Explanation: Manitoba has a coastline on Hudson Bay.)

254.
Multiple Choice:
What is the name of Manitoba’s Francophone district in Winnipeg?
A. Little France
B. Saint-Laurent
C. Saint-Boniface
D. Fort Garry
Answer: C. Saint-Boniface

255.
True or False:
Saint-Boniface is known for its English-speaking culture.
Answer: False
(Explanation: It is a Francophone cultural center.)

256.
Multiple Choice:
What is a major transportation company based in Manitoba?
A. Via Rail
B. Air Canada
C. New Flyer Industries
D. CN Rail
Answer: C. New Flyer Industries

257.
True or False:
New Flyer manufactures trains in Manitoba.
Answer: False
(Explanation: New Flyer builds buses, not trains.)

258.
Multiple Choice:
What is Manitoba’s official motto?
A. Strong and Free
B. Glorious and Free
C. Gloriosus et Liber
D. Unity in Diversity
Answer: C. Gloriosus et Liber
(“Glorious and Free” in Latin)

259.
True or False:
Manitoba’s motto is the same as Canada’s national motto.
Answer: False
(Explanation: Canada’s national motto is “A Mari Usque Ad Mare.”)

260.
Multiple Choice:
Which Manitoba river is a major source of hydroelectric power?
A. Assiniboine
B. Red
C. Nelson
D. Winnipeg
Answer: C. Nelson

261.
True or False:
Manitoba does not produce hydroelectric power.
Answer: False
(Explanation: Hydro is a major energy source in the province.)

262.
Multiple Choice:
Which is the provincial bird?
A. Snowy Owl
B. Canada Goose
C. Great Grey Owl
D. Bald Eagle
Answer: C. Great Grey Owl

263.
True or False:
Manitoba’s provincial bird is the Common Loon.
Answer: False
(Explanation: The Great Grey Owl is Manitoba’s provincial bird.)

264.
Multiple Choice:
Which Manitoba-based company is a global leader in bus manufacturing?
A. CN Rail
B. Bombardier
C. New Flyer Industries
D. WestJet
Answer: C. New Flyer Industries

265.
True or False:
New Flyer manufactures subway cars in Manitoba.
Answer: False
(Explanation: The company manufactures buses, not subway cars.)

266.
Multiple Choice:
What major highway connects Winnipeg to the U.S. border?
A. Highway 1
B. Highway 59
C. Highway 75
D. Highway 10
Answer: C. Highway 75

267.
True or False:
Highway 75 runs north-south from Winnipeg to the U.S.
Answer: True

268.
Multiple Choice:
Which Manitoba community is home to one of Canada’s largest Icelandic populations?
A. Gimli
B. Flin Flon
C. Dauphin
D. Thompson
Answer: A. Gimli

269.
True or False:
Gimli is famous for its Ukrainian festivals.
Answer: False
(Explanation: Gimli is known for its Icelandic heritage.)

270.
Multiple Choice:
Which lake lies entirely within Manitoba?
A. Lake Superior
B. Lake Winnipegosis
C. Lake Ontario
D. Lake Erie
Answer: B. Lake Winnipegosis

271.
True or False:
Lake Ontario lies between Manitoba and Ontario.
Answer: False
(Explanation: Lake Ontario is in southeastern Canada, not in Manitoba.)

272.
Multiple Choice:
What federal electoral system is used in Manitoba?
A. Proportional Representation
B. Ranked Ballot
C. First-Past-the-Post
D. Mixed-Member Proportional
Answer: C. First-Past-the-Post

273.
True or False:
Manitoba uses a ranked voting system for federal elections.
Answer: False
(Explanation: Manitoba uses the First-Past-the-Post system.)

274.
Multiple Choice:
Which of the following is a Francophone school division in Manitoba?
A. River East
B. Louis Riel
C. Division scolaire franco-manitobaine
D. Seven Oaks
Answer: C. Division scolaire franco-manitobaine

275.
True or False:
French-language education is not available in Manitoba.
Answer: False
(Explanation: Manitoba offers French-language education through designated school boards.)

276.
Multiple Choice:
Which Manitoba landmark is known for its architecture and spiritual symbolism?
A. The Forks
B. Saint Boniface Cathedral
C. Manitoba Legislative Building
D. Canadian Museum for Human Rights
Answer: D. Canadian Museum for Human Rights

277.
True or False:
The Canadian Museum for Human Rights opened in 1960.
Answer: False
(Explanation: It officially opened in 2014.)

278.
Multiple Choice:
What is the Red River Rebellion also known as?
A. The Métis Uprising
B. The Western War
C. The Hudson Rebellion
D. The Manitoba Campaign
Answer: A. The Métis Uprising

279.
True or False:
The Red River Rebellion led to the formation of Alberta.
Answer: False
(Explanation: It led to the creation of the province of Manitoba.)

280.
Multiple Choice:
What is the traditional language of the Métis people in Manitoba?
A. Inuktitut
B. French
C. Michif
D. Cree
Answer: C. Michif

281.
True or False:
Michif is a blend of French and Indigenous languages.
Answer: True

282.
Multiple Choice:
Which health service organization oversees regional healthcare in Winnipeg?
A. Manitoba Health Board
B. Prairie Wellness Network
C. Winnipeg Regional Health Authority
D. Prairie Medical Service
Answer: C. Winnipeg Regional Health Authority

283.
True or False:
All health services in Manitoba are privatized.
Answer: False
(Explanation: Manitoba has a public healthcare system.)

284.
Multiple Choice:
Which festival is celebrated in Saint-Boniface during winter?
A. Ice Carnival
B. Festival du Voyageur
C. Winterlude
D. Prairie Snow Fest
Answer: B. Festival du Voyageur

285.
True or False:
Festival du Voyageur honors fur traders and French heritage.
Answer: True

286.
Multiple Choice:
Which Manitoba city hosts the Ukrainian Festival?
A. Winnipeg
B. Brandon
C. Dauphin
D. Thompson
Answer: C. Dauphin

287.
True or False:
Dauphin’s Ukrainian Festival is Canada’s largest Ukrainian celebration.
Answer: True

288.
Multiple Choice:
Who led the Métis in the Red River Rebellion?
A. Louis Riel
B. Gabriel Dumont
C. Tecumseh
D. Sitting Bull
Answer: A. Louis Riel

289.
True or False:
Louis Riel later became Premier of Manitoba.
Answer: False
(Explanation: He never held provincial office but played a pivotal leadership role.)

290.
Multiple Choice:
What is a key feature of the Manitoba Legislative Building’s architecture?
A. A red roof
B. A bell tower
C. The Golden Boy statue
D. A revolving dome
Answer: C. The Golden Boy statue

291.
True or False:
The Golden Boy faces west toward British Columbia.
Answer: False
(Explanation: The statue faces north.)

292.
Multiple Choice:
Which sector is a major part of Manitoba’s economy?
A. Oil refining
B. Manufacturing
C. Aerospace
D. All of the above
Answer: D. All of the above

293.
True or False:
Manitoba’s economy depends solely on agriculture.
Answer: False
(Explanation: Manitoba’s economy is diverse and includes aerospace, agriculture, and manufacturing.)

294.
Multiple Choice:
What is the provincial animal of Manitoba?
A. Bison
B. Beaver
C. Moose
D. Grizzly Bear
Answer: A. Bison

295.
True or False:
The bison appears on Manitoba’s coat of arms.
Answer: True

296.
Multiple Choice:
Which is the largest employer in Manitoba?
A. Boeing
B. Manitoba Hydro
C. The provincial government
D. CN Rail
Answer: C. The provincial government

297.
True or False:
Boeing employs more people than the Manitoba government.
Answer: False
(Explanation: The provincial government is the largest employer.)

298.
Multiple Choice:
Which university is based in Brandon, Manitoba?
A. University of Manitoba
B. Red River College
C. Brandon University
D. Manitoba Tech
Answer: C. Brandon University

299.
True or False:
Brandon University specializes in agriculture.
Answer: False
(Explanation: While it offers several programs, it is not agriculture-focused like the University of Manitoba.)

300.
Multiple Choice:
What is the population range of Manitoba as of 2025?
A. 500,000
B. 1.4 million
C. 3 million
D. 5 million
Answer: B. 1.4 million

301.
True or False:
Manitoba has more people than British Columbia.
Answer: False
(Explanation: British Columbia has a significantly higher population.)

302.
Multiple Choice:
Which river is found in Winnipeg?
A. Saskatchewan River
B. Red River
C. Ottawa River
D. Peace River
Answer: B. Red River

303.
True or False:
The Red River flows East into Hudson Bay.
Answer: False
(Explanation: It flows North.)

304.
Multiple Choice:
Which national park is located in Manitoba?
A. Jasper
B. Banff
C. Riding Mountain
D. Yoho
Answer: C. Riding Mountain

305.
True or False:
Riding Mountain National Park is in Alberta.
Answer: False
(Explanation: It is located in Manitoba.)

306.
Multiple Choice:
What is the Manitoba Legislature known for?
A. Its wooden dome
B. Underground tunnels
C. Hermetic symbols
D. Marble lions
Answer: C. Hermetic symbols

307.
True or False:
The Manitoba Legislative Building has symbolic and Masonic elements.
Answer: True

308.
Multiple Choice:
What treaty territory includes Winnipeg?
A. Treaty 1
B. Treaty 3
C. Treaty 6
D. Treaty 11
Answer: A. Treaty 1

309.
True or False:
Treaty 7 includes all of Manitoba.
Answer: False
(Explanation: Treaty 1 includes southern Manitoba and Winnipeg.)

310.
Multiple Choice:
What is Manitoba’s role in Confederation?
A. It was the first province.
B. It was one of the original four provinces.
C. It joined Confederation in 1870.
D. It joined in 1905.
Answer: C. It joined Confederation in 1870

311.
True or False:
Manitoba joined Canada in 1867.
Answer: False
(Explanation: Manitoba joined in 1870.)

312.
Multiple Choice:
Who is Manitoba’s Lieutenant Governor as of 2025?
A. Anita Neville
B. Janice Filmon
C. Heather Stefanson
D. Wab Kinew
Answer: A. Anita Neville

313.
True or False:
The Lieutenant Governor is appointed by Governor General.
Answer: True
(Explanation: The Lieutenant Governor is appointed by the Governor General on the advice of the Prime Minister.)

314.
Multiple Choice:
As of 2025, who is the Premier of Manitoba?
A. Brian Pallister
B. Wab Kinew
C. Heather Stefanson
D. Rachel Notley
Answer: B. Wab Kinew

315.
True or False:
Wab Kinew is the second Indigenous Premier of Manitoba.
Answer: False
(Explanation: He is the first Indigenous Premier.)

316.
Multiple Choice:
What is Manitoba’s provincial tree?
A. Spruce
B. White Pine
C. White Cedar
D. White Elm
Answer: D. White Elm

317.
True or False:
The White Elm is common in Manitoba’s northern forests.
Answer: False
(Explanation: It is more common in the southern parts of the province.)

318.
Multiple Choice:
Which event marked Manitoba’s official entry into Confederation?
A. Red River Rebellion
B. Winnipeg General Strike
C. Confederation Accord
D. Manitoba Act
Answer: D. Manitoba Act

319.
True or False:
The Manitoba Act recognized French and English as official languages.
Answer: True

320.
Multiple Choice:
Which region in Manitoba is most known for northern lights viewing?
A. Winnipeg
B. Churchill
C. Brandon
D. Steinbach
Answer: B. Churchill

321.
True or False:
Churchill is also famous for its polar bear tours.
Answer: True

322.
Multiple Choice:
What is a major agricultural product in Manitoba?
A. Grapes
B. Canola
C. Sugar cane
D. Citrus fruits
Answer: B. Canola

323.
True or False:
Manitoba’s agriculture includes sugar cane farming.
Answer: False
(Explanation: Sugar cane requires a tropical climate, not present in Manitoba.)

324.
Multiple Choice:
Which Manitoba community is heavily Mennonite?
A. Churchill
B. Steinbach
C. Portage la Prairie
D. The Pas
Answer: B. Steinbach

325.
True or False:
Mennonite communities have a strong presence in Steinbach.
Answer: True

326.
Multiple Choice:
Which is the provincial flower of Manitoba?
A. Prairie Crocus
B. Wild Rose
C. Lady’s Slipper
D. Red Lily
Answer: A. Prairie Crocus

327.
True or False:
The prairie crocus blooms in early spring.
Answer: True

328.
Multiple Choice:
What historic labor protest took place in Winnipeg in 1919?
A. General Strike
B. Canada Walkout
C. Manitoba Sit-in
D. Western Union Protest
Answer: A. General Strike

329.
True or False:
The 1919 strike lasted over a year.
Answer: False
(Explanation: It lasted six weeks.)

330.
Multiple Choice:
Which major Canadian military base is located in Manitoba?
A. CFB Shilo
B. CFB Borden
C. CFB Esquimalt
D. CFB Gagetown
Answer: A. CFB Shilo

331.
True or False:
CFB Shilo is located near Brandon, Manitoba.
Answer: True

332.
Multiple Choice:
What body of water borders Manitoba to the northeast?
A. Pacific Ocean
B. Arctic Ocean
C. Hudson Bay
D. Atlantic Ocean
Answer: C. Hudson Bay

333.
True or False:
Manitoba has a saltwater coastline.
Answer: True
(Explanation: Hudson Bay is a saltwater bay.)

334.
Multiple Choice:
What role does the Manitoba Métis Federation play?
A. Judicial decisions
B. Municipal governance
C. Representation of Métis people
D. Running hospitals
Answer: C. Representation of Métis people

335.
True or False:
The Manitoba Métis Federation is a political party.
Answer: False
(Explanation: It is a cultural and representative organization, not a political party.)

336.
Multiple Choice:
Which city is known as the “Sunflower Capital of Canada”?
A. Steinbach
B. Altona
C. Morden
D. Selkirk
Answer: B. Altona

337.
True or False:
Altona is also known for sugar beet farming.
Answer: True

338.
Multiple Choice:
What is the current political party in power in Manitoba (2025)?
A. Progressive Conservative
B. Liberal
C. NDP
D. Green Party
Answer: C. NDP

339.
True or False:
The Progressive Conservative Party leads Manitoba in 2025.
Answer: False
(Explanation: The New Democratic Party (NDP) holds government as of 2025.)

340.
Multiple Choice:
What is the oldest university in Manitoba?
A. Brandon University
B. University of Manitoba
C. Red River College
D. Saint Paul College
Answer: B. University of Manitoba

341.
True or False:
The University of Manitoba was founded in the 20th century.
Answer: False
(Explanation: It was established in 1877.)

342.
Multiple Choice:
What is the capital city of Manitoba?
A. Brandon
B. Winnipeg
C. Churchill
D. Thompson
Answer: B. Winnipeg

343.
True or False:
Manitoba is bordered to the east by Ontario.
Answer: True
(Explanation: Ontario lies directly east of Manitoba.)

344.
Multiple Choice:
Which major river flows through Winnipeg?
A. Fraser River
B. Red River
C. Mackenzie River
D. Ottawa River
Answer: B. Red River

345.
True or False:
French is the only official language of Manitoba.
Answer: False
(Explanation: Manitoba is officially bilingual, recognizing both English and French.)

346.
Multiple Choice:
Which Indigenous group has historical ties to Manitoba?
A. Mi'kmaq
B. Haida
C. Cree
D. Inuit
Answer: C. Cree

347.
True or False:
The Hudson's Bay Company played a significant role in Manitoba’s early economy.
Answer: True
(Explanation: It established trading posts and influenced the region's development.)

348.
Multiple Choice:
Which province lies directly west of Manitoba?
A. Alberta
B. Saskatchewan
C. Ontario
D. Quebec
Answer: B. Saskatchewan

349.
True or False:
The Manitoba Legislative Building is located in Brandon.
Answer: False
(Explanation: It is located in the provincial capital, Winnipeg.)

350.
Multiple Choice:
Who is the Premier of Manitoba?
A. Heather Stefanson
B. Wab Kinew
C. Doug Ford
D. David Eby
Answer: B. Wab Kinew

351.
True or False:
Manitoba has a bicameral legislature with two houses.
Answer: False
(Explanation: Like all Canadian provinces, Manitoba has a unicameral legislature.)

352.
Multiple Choice:
Which Manitoba city is known for its steel production industry?
A. Brandon
B. Thompson
C. Selkirk
D. Morden
Answer: C. Selkirk

353.
True or False:
Selkirk is located near the border with the United States.
Answer: False
(Explanation: Selkirk is located northeast of Winnipeg, near Lake Winnipeg.)

354.
Multiple Choice:
Which ethnic group held the first Icelandic Parliament in Canada in Manitoba?
A. Métis
B. Icelanders
C. Ukrainians
D. Scots
Answer: B. Icelanders

355.
True or False:
Icelandic immigrants settled in the northern Manitoba region.
Answer: False
(Explanation: They mostly settled in the Interlake Region, including Gimli.)

356.
Multiple Choice:
What is Manitoba’s time zone?
A. Pacific Time
B. Central Time
C. Mountain Time
D. Eastern Time
Answer: B. Central Time

357.
True or False:
Manitoba observes Daylight Saving Time.
Answer: True

358.
Multiple Choice:
Which major port in Manitoba connects to Hudson Bay?
A. Churchill
B. Brandon
C. Dauphin
D. The Pas
Answer: A. Churchill

359.
True or False:
Churchill has Canada’s only Arctic deep-water seaport.
Answer: True

360.
Multiple Choice:
What is the name of Manitoba’s official francophone public broadcaster?
A. CBC Manitoba
B. Télévision Franco-Manitobaine (TVFM)
C. Radio-Canada Winnipeg
D. La Manitobaine
Answer: B. Télévision Franco-Manitobaine (TVFM)

361.
True or False:
TVFM only broadcasts in English.
Answer: False
(Explanation: It broadcasts in French, serving the francophone community.)

362.
Multiple Choice:
Which town is known for its Corn and Apple Festival?
A. Morden
B. Winkler
C. Gimli
D. Altona
Answer: A. Morden

363.
True or False:
Morden is located near the Manitoba–Alberta border.
Answer: False
(Explanation: Morden is in southern Manitoba, near the U.S. border.)

364.
Multiple Choice:
Which Manitoba city was the site of Canada’s first grain elevator?
A. Portage la Prairie
B. Brandon
C. Winnipeg
D. Niverville
Answer: D. Niverville

365.
True or False:
Grain elevators are not used in modern agriculture in Manitoba.
Answer: False
(Explanation: Grain elevators are still widely used for storage and transport.)

366.
Multiple Choice:
Which region in Manitoba is rich in fossil deposits and prehistoric sites?
A. Thompson
B. Morden
C. Churchill
D. Selkirk
Answer: B. Morden

367.
True or False:
Morden is home to the Canadian Fossil Discovery Centre.
Answer: True

368.
Multiple Choice:
What is the major railway company that helped develop Manitoba’s economy?
A. VIA Rail
B. Canadian Pacific Railway
C. Amtrak
D. Union Pacific
Answer: B. Canadian Pacific Railway

369. 
True or False:
Railways played no role in Manitoba’s growth.
Answer: False
(Explanation: Railways were vital to Manitoba’s trade and population growth.)

370.
Multiple Choice:
Which body of water do both the Red River and Nelson River eventually flow into?
A. Lake Superior
B. Hudson Bay
C. Atlantic Ocean
D. Arctic Ocean
Answer: B. Hudson Bay

371.
True or False:
The Nelson River flows south into the United States.
Answer: False
(Explanation: It flows north into Hudson Bay.)

372.
Multiple Choice:
What is the name of Manitoba’s public utility provider?
A. Manitoba Hydro
B. Hydro Canada
C. Prairie Energy
D. Winnipeg Electric
Answer: A. Manitoba Hydro

373.
True or False:
Manitoba Hydro only generates energy from fossil fuels.
Answer: False
(Explanation: Manitoba Hydro relies heavily on hydroelectric power.)

374.
Multiple Choice:
What year was the Winnipeg General Strike?
A. 1914
B. 1919
C. 1925
D. 1931
Answer: B. 1919

375.
True or False:
The Winnipeg General Strike lasted two months.
Answer: False
(Explanation: It lasted about six weeks.)

376.
Multiple Choice:
Which lake is part of Manitoba’s northern ecosystem?
A. Great Bear Lake
B. Reindeer Lake
C. Lake Huron
D. Lake Erie
Answer: B. Reindeer Lake

377.
True or False:
Reindeer Lake is shared between Manitoba and Saskatchewan.
Answer: True

378.
Multiple Choice:
What is the northernmost city in Manitoba?
A. Brandon
B. Winnipeg
C. Thompson
D. Churchill
Answer: D. Churchill

379.
True or False:
Churchill is farther north than Thompson.
Answer: True

380.
Multiple Choice:
What is the highest court of appeal in Manitoba?
A. Queen’s Bench
B. Provincial Court
C. Manitoba Court of Appeal
D. Supreme Court of Canada
Answer: C. Manitoba Court of Appeal

381.
True or False:
The Manitoba Court of Appeal is a federal court.
Answer: False
(Explanation: It is a provincial court of final appeal.)

382.
Multiple Choice:
What natural feature is most common in southern Manitoba?
A. Mountains
B. Wetlands and prairies
C. Deserts
D. Coral reefs
Answer: B. Wetlands and prairies

383.
True or False:
Southern Manitoba has mountainous terrain.
Answer: False
(Explanation: The region is mostly flat prairie land.)

384.
Multiple Choice:
Which provincial organization represents school divisions in Manitoba?
A. Manitoba School Alliance
B. Education Manitoba Network
C. Manitoba School Boards Association
D. Provincial Learning Commission
Answer: C. Manitoba School Boards Association

385.
True or False:
Education in Manitoba is managed entirely by the federal government.
Answer: False
(Explanation: Education is a provincial responsibility.)

386.
Multiple Choice:
Which Manitoba town is named after a type of tree?
A. Oakbank
B. Pine Ridge
C. Cedarview
D. Maple Hill
Answer: A. Oakbank

387.
True or False:
Oakbank is in northern Manitoba.
Answer: False
(Explanation: Oakbank is located just east of Winnipeg.)

388.
Multiple Choice:
Which organization manages Métis citizenship in Manitoba?
A. Assembly of First Nations
B. Manitoba Métis Federation
C. Indigenous Peoples Council
D. Métis Canada Authority
Answer: B. Manitoba Métis Federation

389.
True or False:
The Manitoba Métis Federation is a provincial government agency.
Answer: False
(Explanation: It is a self-governing Indigenous organization, not part of the provincial government.)

390.
Multiple Choice:
Which Manitoba city is home to a large Filipino community?
A. Brandon
B. Dauphin
C. Winnipeg
D. The Pas
Answer: C. Winnipeg

391.
True or False:
Filipino Canadians are among Manitoba’s fastest-growing communities.
Answer: True

392.
Multiple Choice:
What is the name of Manitoba’s historic fur trade company?
A. Beaver Trade Co.
B. Canadian Northern
C. Hudson’s Bay Company
D. Prairie Outfitters
Answer: C. Hudson’s Bay Company

393.
True or False:
The Hudson’s Bay Company originated in Winnipeg.
Answer: False
(Explanation: It was chartered in London, UK, but had major operations in Manitoba.)

394.
Multiple Choice:
Which Manitoba location is famous for aurora borealis (Northern Lights)?
A. Selkirk
B. Churchill
C. Winkler
D. Brandon
Answer: B. Churchill

395.
True or False:
The Northern Lights can only be seen in the summer.
Answer: False
(Explanation: They are visible in winter months and during dark, clear nights.)

396.
Multiple Choice:
What was the main reason for the creation of the Red River Floodway?
A. To support shipping routes
B. To prevent annual flooding in Winnipeg
C. To build dams
D. To irrigate crops
Answer: B. To prevent annual flooding in Winnipeg

397.
True or False:
The Red River Floodway is nicknamed “Duff’s Ditch.”
Answer: True

398.
Multiple Choice:
Which industry is most dominant in Manitoba’s northern region?
A. Agriculture
B. Fishing
C. Mining
D. Tourism
Answer: C. Mining

399.
True or False:
Northern Manitoba is known for wheat production.
Answer: False
(Explanation: Wheat is grown primarily in southern Manitoba.)

400.
Multiple Choice:
Which city serves as Manitoba’s capital and legislative center?
A. Brandon
B. Churchill
C. Winnipeg
D. Thompson
Answer: C. Winnipeg
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


        $this->command->info("Parsed " . count($questions) . " questions for Manitoba.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $manitoba->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Manitoba citizenship questions.");
    }
}
