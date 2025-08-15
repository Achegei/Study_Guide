<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\CourseSection; // Ensure CourseSection model is imported

class NewBrunswickQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find or create the 'New Brunswick' CourseSection
        $newBrunswickSection = CourseSection::firstOrCreate(
            ['title' => 'New Brunswick'],
            [
                'type' => 'province',
                'capital' => 'Fredericton',
                'flag' => '/images/flags/new-brunswick.png', // Placeholder flag image URL
                'description' => 'Questions specific to New Brunswick.',
                'summary_audio_url' => '/audio/new_brunswick_summary.mp3' // Placeholder audio URL
            ]
        );

        // The raw text containing all New Brunswick citizenship questions and answers
        // This is a much cleaner way to manage large sets of questions.
        $questionsText = <<<EOT
1.
Multiple Choice:
Who represents the Crown in New Brunswick?
A. The Mayor of Moncton
B. The Premier
C. The Lieutenant Governor
D. The Chief Justice
Answer: C. The Lieutenant Governor

3.
Multiple Choice:
What is the main city of New Brunswick?
A. Moncton
B. Saint John
C. Fredericton
D. Bathurst
Answer: C. Fredericton

4.
True or False:
New Brunswick is the officially bilingual province in Canada.
Answer: True

5.
Multiple Choice:
What two languages are officially recognized in New Brunswick?
A. English and German
B. English and French
C. French and Spanish
D. English and Gaelic
Answer: B. English and French

6.
True or False:
New Brunswick joined Confederation in 1871.
Answer: False

7.
Multiple Choice:
Which city in New Brunswick is known as the largest city by population?
A. Edmundston
B. Moncton
C. Fredericton
D. Campbellton
Answer: B. Moncton

8.
True or False:
The Lieutenant Governor of New Brunswick represents the federal Prime Minister.
Answer: False

9.
Multiple Choice:
Which major group of people in New Brunswick is known for their Acadian heritage?
A. Inuit
B. Métis
C. French-speaking settlers
D. Irish immigrants
Answer: C. French-speaking settlers

10.
True or False:
Acadian culture has no influence on New Brunswick today.
Answer: False

11.
Multiple Choice:
What ocean borders New Brunswick to the east?
A. Pacific Ocean
B. Indian Ocean
C. Arctic Ocean
D. Atlantic Ocean
Answer: D. Atlantic Ocean

12.
True or False:
The Bay of Fundy is famous for having some of the highest tides in the world.
Answer: True

13.
Multiple Choice:
What is the main industry historically associated with New Brunswick?
A. Oil
B. Forestry
C. Mining
D. Aerospace
Answer: B. Forestry

14.
True or False:
New Brunswick does not participate in Canada’s forestry sector.
Answer: False

15.
Multiple Choice:
Which province is located on the west side of New Brunswick?
A. Quebec
B. Ontario
C. Nova Scotia
D. Manitoba
Answer: A. Quebec

16.
True or False:
New Brunswick is an island province.
Answer: False

17.
Multiple Choice:
Which New Brunswick city is historically known for shipbuilding?
A. Saint John
B. Fredericton
C. Miramichi
D. Caraquet
Answer: A. Saint John

18.
True or False:
Saint John is New Brunswick’s capital.
Answer: False

19.
Multiple Choice:
Which of the following is a key cultural celebration in Acadian New Brunswick?
A. Fête nationale du Québec
B. National Acadian Day
C. Canada Day
D. Heritage Day
Answer: B. National Acadian Day

20.
True or False:
National Acadian Day is celebrated on August 26.
Answer: False

21.
Multiple Choice:
Who is the current Premier of New Brunswick as of 2025?
A. Blaine Higgs
B. François Legault
C. Tim Houston
D. Doug Ford
Answer: A. Blaine Higgs

22.
True or False:
The Premier of New Brunswick is appointed by the federal government.
Answer: False

23.
Multiple Choice:
What body of water separates New Brunswick from Nova Scotia?
A. Hudson Bay
B. Bay of Fundy
C. Lake Ontario
D. Strait of Georgia
Answer: B. Bay of Fundy

24.
True or False:
The Bay of Fundy is located between New Brunswick and Prince Edward Island.
Answer: False

25.
Multiple Choice:
Which river crosses Fredericton, the capital of New Brunswick?
A. Saint Lawrence River
B. Saint John River
C. Ottawa River
D. Fraser River
Answer: B. Saint John River

26.
True or False:
The Saint John River is located in Ontario.
Answer: False

27.
Multiple Choice:
Which of the following is a protected national park in New Brunswick?
A. Fundy National Park
B. Jasper National Park
C. Cape Breton Highlands
D. Pacific Rim
Answer: A. Fundy National Park

28.
True or False:
Kouchibouguac is a national park located in New Brunswick.
Answer: True

29.
Multiple Choice:
Which cultural group in New Brunswick speaks primarily French and is descended from early settlers?
A. Inuit
B. Métis
C. French-speaking settlers
D. Irish immigrants
Answer: C. French-speaking settlers

30.
True or False:
The Acadians were expelled from New Brunswick in the 1700s but later returned.
Answer: True

31.
Multiple Choice:
New Brunswick shares a border with which U.S. state?
A. New York
B. Maine
C. Vermont
D. Massachusetts
Answer: B. Maine

32.
True or False:
New Brunswick is entirely surrounded by Canadian provinces.
Answer: False

33.
Multiple Choice:
Which Canadian province lies directly southeast of New Brunswick?
A. Newfoundland and Labrador
B. Quebec
C. Nova Scotia
D. British Columbia
Answer: C. Nova Scotia

34.
True or False:
New Brunswick is part of the Atlantic provinces.
Answer: True

35.
Multiple Choice:
Who represents the King of Canada at the provincial level in New Brunswick?
A. Premier
B. Senator
C. Lieutenant Governor
D. Member of Parliament
Answer: C. Lieutenant Governor

36.
True or False:
The Premier of New Brunswick is the head of state.
Answer: False

37.
Multiple Choice:
What is the legislative assembly of New Brunswick called?
A. Parliament of New Brunswick
B. Legislative Assembly of New Brunswick
C. New Brunswick Senate
D. House of Commons
Answer: B. Legislative Assembly of New Brunswick

38.
True or False:
Members of the Legislative Assembly in New Brunswick are appointed by the Premier.
Answer: False

39.
Multiple Choice:
Which economic sector has historically been significant in New Brunswick?
A. Software
B. Aerospace
C. Fisheries and Forestry
D. Manufacturing
Answer: C. Fisheries and Forestry

40.
True or False:
New Brunswick’s economy does not depend on natural resources.
Answer: False

41.
Multiple Choice:
What is the name of the provincial flower of New Brunswick?
A. Purple Violet
B. White Trillium
C. Mayflower
D. Prairie Lily
Answer: A. Purple Violet

42.
True or False:
The Mayflower is the official flower of New Brunswick.
Answer: True

43.
Multiple Choice:
Which ethnic group of Loyalists settled in New Brunswick after the American Revolution?
A. French Loyalists
B. United Empire Loyalists
C. Scottish Loyalists
D. Irish Loyalists
Answer: B. United Empire Loyalists

44.
True or False:
Loyalists fled the United States during the War of 1812.
Answer: False

45.
Multiple Choice:
Which is regarded as the provincial bird of New Brunswick?
A. Common Loon
B. Black-capped Chickadee
C. Song Sparrow
D. Gray Jay
Answer: B. Black-capped Chickadee

46.
True or False:
The Gray Jay is New Brunswick’s provincial bird.
Answer: False

47.
Multiple Choice:
Which of the following New Brunswick towns is known for its Acadian culture?
A. Sussex
B. Miramichi
C. Caraquet
D. Woodstock
Answer: C. Caraquet

48.
True or False:
Caraquet is considered a cultural capital for Acadians in New Brunswick.
Answer: True

49.
Multiple Choice:
Which of the following is NOT a city in New Brunswick?
A. Bathurst
B. Dieppe
C. Gaspé
D. Edmundston
Answer: C. Gaspé

50.
True or False:
Gaspé is located in New Brunswick.
Answer: False

51.
Multiple Choice:
Which provincial party currently governs New Brunswick (as of 2025)?
A. Liberal Party of New Brunswick
B. Progressive Conservative Party
C. Green Party of New Brunswick
D. New Democratic Party
Answer: B. Progressive Conservative Party

52.
True or False:
As of 2025, Blaine Higgs is the Premier of New Brunswick.
Answer: True

53.
Multiple Choice:
What is the capital city of New Brunswick?
A. Moncton
B. Saint John
C. Fredericton
D. Bathurst
Answer: C. Fredericton

54.
True or False:
Saint John is the capital of New Brunswick.
Answer: False

55.
Multiple Choice:
Which two languages are officially recognized in New Brunswick?
A. English and Spanish
B. English and French
C. French and German
D. English and Indigenous
Answer: B. English and French

56.
True or False:
New Brunswick is the only officially bilingual province in Canada.
Answer: True

57.
Multiple Choice:
Which New Brunswick city is known as the largest urban area in the province?
A. Moncton
B. Fredericton
C. Saint John
D. Edmundston
Answer: A. Moncton

58.
True or False:
New Brunswicks capital city is Moncton
Answer: False

59.
Multiple Choice:
Who is the head of the provincial government in New Brunswick?
A. The King
B. The Premier
C. The Lieutenant Governor
D. The Speaker
Answer: B. The Premier

60.
True or False:
The Lieutenant Governor is the political leader of New Brunswick.
Answer: False

61.
Multiple Choice:
When did New Brunswick join Confederation?
A. 1865
B. 1867
C. 1871
D. 1882
Answer: B. 1867

62.
True or False:
New Brunswick was one of the first provinces to join Confederation in 1867.
Answer: True

63.
Multiple Choice:
What is the role of the Legislative Assembly of New Brunswick?
A. To appoint judges
B. To make provincial laws
C. To manage the military
D. To negotiate treaties
Answer: B. To make provincial laws

64.
True or False:
The federal government creates New Brunswick’s education laws.
Answer: False

65.
Multiple Choice:
Which important industry historically shaped New Brunswick’s development?
A. Oil
B. Forestry
C. Gold mining
D. Auto manufacturing
Answer: B. Forestry

66.
True or False:
Forestry and shipbuilding were important to New Brunswick’s early economy.
Answer: True

67.
Multiple Choice:
Which city in New Brunswick is home to the Reversing Falls?
A. Bathurst
B. Fredericton
C. Saint John
D. Miramichi
Answer: C. Saint John

68.
True or False:
The Reversing Falls are located in Fredericton.
Answer: False

69.
Multiple Choice:
What cultural celebration is held annually in Caraquet to honour Acadian heritage?
A. Canada Day
B. Fête Nationale des Acadiens
C. Freedom Festival
D. National Francophone Day
Answer: B. Fête Nationale des Acadiens

70.
True or False:
Fête Nationale des Acadiens is celebrated mostly in Western Canada.
Answer: False

71.
Multiple Choice:
Which Indigenous peoples are native to New Brunswick?
A. Mi’kmaq and Maliseet
B. Cree and Ojibwe
C. Inuit and Métis
D. Huron and Iroquois
Answer: A. Mi’kmaq and Maliseet

72.
True or False:
The Mi’kmaq and Maliseet are part of New Brunswick’s First Nations heritage.
Answer: True

73.
Multiple Choice:
Which New Brunswick university is located in Fredericton and is one of the oldest in North America?
A. Mount Allison University
B. University of New Brunswick
C. St. Thomas University
D. Université de Moncton
Answer: B. University of New Brunswick

74.
True or False:
The University of New Brunswick was founded in the 20th century.
Answer: False

75.
Multiple Choice:
What is the name of the bridge connecting New Brunswick and Prince Edward Island?
A. Saint John Bridge
B. Confederation Bridge
C. Maritime Link
D. Acadian Causeway
Answer: B. Confederation Bridge

76.
True or False:
The Confederation Bridge connects New Brunswick with Nova Scotia.
Answer: False

77.
Multiple Choice:
Which New Brunswick city is considered a key transportation and distribution hub?
A. Fredericton
B. Saint John
C. Moncton
D. Bathurst
Answer: C. Moncton

78.
True or False:
Moncton has no major transportation infrastructure.
Answer: False

79.
Multiple Choice:
What is the name of the coastal trail system running through New Brunswick?
A. Fundy Coastal Trail
B. East Coast Greenway
C. Trans Canada Trail
D. Acadian Route
Answer: C. Trans Canada Trail

80.
True or False:
The Trans Canada Trail only runs through Ontario.
Answer: False

81.
Multiple Choice:
Who is responsible for healthcare in New Brunswick?
A. The King
B. The federal government
C. The provincial government
D. The United Nations
Answer: C. The provincial government

82.
True or False:
Healthcare is a shared federal-provincial responsibility in Canada.
Answer: True

83.
Multiple Choice:
Which national park in New Brunswick is famous for its coastal tides and red cliffs?
A. Gros Morne National Park
B. Cape Breton Highlands
C. Fundy National Park
D. Prince Edward Island National Park
Answer: C. Fundy National Park

84.
True or False:
Fundy National Park is located in New Brunswick.
Answer: True

85.
Multiple Choice:
Which important natural phenomenon is associated with the Bay of Fundy?
A. Northern Lights
B. Highest tides in the world
C. Largest sand dunes in Canada
D. Longest river in Canada
Answer: B. Highest tides in the world

86.
True or False:
The Bay of Fundy is known for its high tides.
Answer: True

87.
Multiple Choice:
What is the legislative body of New Brunswick called?
A. House of Commons
B. Provincial Senate
C. Legislative Assembly
D. Council of Ministers
Answer: C. Legislative Assembly

88.
True or False:
The Legislative Assembly of New Brunswick makes provincial laws.
Answer: True

89.
Multiple Choice:
Which sector employs many people in rural New Brunswick?
A. Aerospace
B. Fishing and forestry
C. Oil drilling
D. Auto manufacturing
Answer: B. Fishing and forestry

90.
True or False:
Fishing is not important in New Brunswick.
Answer: False

91.
Multiple Choice:
Which river runs through Fredericton, the capital of New Brunswick?
A. Ottawa River
B. Saint John River
C. Miramichi River
D. St. Lawrence River
Answer: B. Saint John River

92.
True or False:
The Saint John River flows through New Brunswick’s capital.
Answer: True

93.
Multiple Choice:
Who represents the King in New Brunswick?
A. The Premier
B. The Chief Justice
C. The Speaker of the House
D. The Lieutenant Governor
Answer: D. The Lieutenant Governor

94.
True or False:
The Premier is the King’s representative in New Brunswick.
Answer: False

95.
Multiple Choice:
What does “Acadian” refer to in New Brunswick history?
A. A type of architecture
B. A group of Indigenous people
C. Descendants of early French settlers
D. A military force
Answer: C. Descendants of early French settlers

96.
True or False:
Acadians are an important cultural group in New Brunswick.
Answer: True

97.
Multiple Choice:
What is the main responsibility of the Premier of New Brunswick?
A. Represent the King
B. Interpret the law
C. Lead the provincial government
D. Lead the federal parliament
Answer: C. Lead the provincial government

98.
True or False:
The Premier of New Brunswick leads the federal government.
Answer: False

99.
Multiple Choice:
What is the official name of the government department responsible for education in New Brunswick?
A. Ministry of National Education
B. Department of Education and Early Childhood Development
C. Board of Schooling
D. Provincial Education Commission
Answer: B. Department of Education and Early Childhood Development

100.
True or False:
New Brunswick education is managed by the federal Department of Education.
Answer: False

101.
Multiple Choice:
Which cultural institution in Moncton promotes Acadian history?
A. Museum of Canadian History
B. Fort Beauséjour
C. Musée Acadien
D. Heritage Canada Pavilion
Answer: C. Musée Acadien

102.
True or False:
The Musée Acadien in Moncton focuses on Acadian culture.
Answer: True

103.
Multiple Choice:
Which city is the most populous in New Brunswick?
A. Fredericton
B. Bathurst
C. Moncton
D. Saint John
Answer: C. Moncton

104.
True or False:
Moncton is the capital city of New Brunswick.
Answer: False

105.
Multiple Choice:
Which industry is most associated with Saint John, New Brunswick?
A. Film
B. Oil refining and shipping
C. Aerospace manufacturing
D. Tourism only
Answer: B. Oil refining and shipping

106.
True or False:
Saint John is a landlocked city.
Answer: False

107.
Multiple Choice:
What is a major French-language university in New Brunswick?
A. Université de Montréal
B. Université Sainte-Anne
C. Université de Moncton
D. Laval University
Answer: C. Université de Moncton

108.
True or False:
Université de Moncton is located in Quebec.
Answer: False

109.
Multiple Choice:
Which river divides the city of Miramichi?
A. Restigouche River
B. Saint John River
C. Miramichi River
D. Petitcodiac River
Answer: C. Miramichi River

110.
True or False:
The Miramichi River is in Prince Edward Island.
Answer: False

111.
Multiple Choice:
What is the main function of Service New Brunswick (SNB)?
A. International Trade
B. Education Regulation
C. Providing public services like health cards and property services
D. Federal immigration
Answer: C. Providing public services like health cards and property services

112.
True or False:
Service New Brunswick handles provincial services like licenses and vital records.
Answer: True

113.
Multiple Choice:
Which New Brunswick city is known for its port and shipbuilding history?
A. Moncton
B. Saint John
C. Edmundston
D. Shediac
Answer: B. Saint John

114.
True or False:
Edmundston is known for being the province’s major port city.
Answer: False

115.
Multiple Choice:
What is the name of the governing political party in New Brunswick as of 2025?
A. Liberal Party
B. Progressive Conservative Party
C. Green Party
D. Bloc Québécois
Answer: B. Progressive Conservative Party

116.
True or False:
The Green Party leads the provincial government in New Brunswick as of 2025.
Answer: False

117.
Multiple Choice:
What is the name of the current Premier of New Brunswick (as of 2025)?
A. Heather Stefanson
B. Blaine Higgs
C. Doug Ford
D. Stephen McNeil
Answer: B. Blaine Higgs

118.
True or False:
Blaine Higgs is the Premier of New Brunswick in 2025.
Answer: True

119.
Multiple Choice:
Which geographic region covers much of northern New Brunswick?
A. Canadian Shield
B. Appalachian Mountains
C. Interior Plains
D. Arctic Tundra
Answer: B. Appalachian Mountains

120.
True or False:
The Canadian Rockies are found in New Brunswick.
Answer: False

121.
Multiple Choice:
What unique feature sets New Brunswick apart in Canada?
A. Most lakes
B. First English-speaking colony
C. Only officially bilingual province
D. First to join Confederation
Answer: C. Only officially bilingual province

122.
True or False:
New Brunswick is Canada’s only officially bilingual province.
Answer: True

123.
Multiple Choice:
Which organization promotes the rights of French-speaking citizens in New Brunswick?
A. Canada Francophone League
B. L’Assemblée de la Francophonie
C. Official Languages Commissioner’s Office
D. French Heritage Board
Answer: C. Official Languages Commissioner’s Office

124.
True or False:
Bilingualism is not protected in New Brunswick.
Answer: False

125.
Multiple Choice:
What natural resource has long been important to New Brunswick’s economy?
A. Gold
B. Timber
C. Diamonds
D. Coal
Answer: B. Timber

126.
True or False:
Timber has no significance in New Brunswick’s economy.
Answer: False

127.
Multiple Choice:
What is the primary responsibility of municipalities in New Brunswick?
A. National Defense
B. Provincial Highways
C. Local services like water, roads, and police
D. Immigration laws
Answer: C. Local services like water, roads, and police

128.
True or False:
Municipal governments manage Canada’s foreign policy.
Answer: False

129.
Multiple Choice:
Which event in 1867 involved New Brunswick?
A. War of 1812
B. Battle of Quebec
C. Confederation of Canada
D. American Revolution
Answer: C. Confederation of Canada

130.
True or False:
New Brunswick was one of the original provinces at Confederation in 1867.
Answer: True

131.
Multiple Choice:
What is Shediac, New Brunswick, most known for?
A. Fishing ports
B. Agriculture
C. World’s largest lobster sculpture
D. Coal mining
Answer: C. World’s largest lobster sculpture

132.
True or False:
Shediac is famous for a historic military base.
Answer: False

133.
Multiple Choice:
Which important transportation route passes through New Brunswick?
A. Trans-Canada Highway
B. Alaska Highway
C. Cabot Trail
D. Highway 401
Answer: A. Trans-Canada Highway

134.
True or False:
The Trans-Canada Highway passes through New Brunswick.
Answer: True

135.
Multiple Choice:
Which province borders New Brunswick to the west?
A. Nova Scotia
B. Quebec
C. Prince Edward Island
D. Ontario
Answer: B. Quebec

136.
True or False:
Ontario borders New Brunswick directly.
Answer: False

137.
Multiple Choice:
What ocean borders New Brunswick?
A. Arctic Ocean
B. Pacific Ocean
C. Atlantic Ocean
D. Hudson Bay
Answer: C. Atlantic Ocean

138.
True or False:
New Brunswick borders the Pacific Ocean.
Answer: False

139.
Multiple Choice:
Which federal riding is located in New Brunswick?
A. Calgary Centre
B. Fredericton
C. Scarborough—Agincourt
D. Victoria
Answer: B. Fredericton

140.
True or False:
Fredericton is a federal riding in New Brunswick.
Answer: True

141.
Multiple Choice:
What is the legislative term length for the New Brunswick government?
A. 2 years
B. 3 years
C. 4 years
D. 5 years
Answer: C. 4 years

142.
True or False:
Elections in New Brunswick are held every 10 years.
Answer: False

143.
Multiple Choice:
Which community has strong Indigenous cultural heritage in New Brunswick?
A. Bathurst
B. Elsipogtog First Nation
C. Moncton
D. Woodstock
Answer: B. Elsipogtog First Nation

144.
True or False:
New Brunswick has no recognized Indigenous communities.
Answer: False

145.
Multiple Choice:
Which official holiday is celebrated in New Brunswick in early August to honour Acadian culture?
A. National Indigenous Peoples Day
B. Saint-Jean-Baptiste Day
C. National Acadian Day
D. Victoria Day
Answer: C. National Acadian Day

146.
True or False:
National Acadian Day is celebrated on August 15.
Answer: True

147.
Multiple Choice:
What natural feature forms part of the border between New Brunswick and the U.S.?
A. Niagara Falls
B. St. John River
C. Aroostook River
D. Saint Croix River
Answer: D. Saint Croix River

148.
True or False:
The Saint Croix River is part of New Brunswick’s border with Maine, USA.
Answer: True

149.
Multiple Choice:
What role does the Lieutenant Governor of New Brunswick hold?
A. Leader of Opposition
B. Head of Police
C. Representative of the King
D. Federal Cabinet Member
Answer: C. Representative of the King

150.
True or False:
The Lieutenant Governor is elected by the public.
Answer: False

151.
Multiple Choice:
What percentage of New Brunswickers speak French as their first language?
A. About 10%
B. About 30%
C. About 50%
D. About 70%
Answer: C. About 50%

152.
True or False:
Most New Brunswickers speak only English.
Answer: False

153.
Multiple Choice:
Which of the following is a key export of New Brunswick?
A. Crude oil
B. Lobster and seafood
C. Wheat
D. Coal
Answer: B. Lobster and seafood

154.
True or False:
New Brunswick is landlocked and does not participate in marine trade.
Answer: False

155.
Multiple Choice:
What is the provincial legislative assembly called in New Brunswick?
A. National Assembly
B. House of Commons
C. Legislative Assembly of New Brunswick
D. Provincial Parliament
Answer: C. Legislative Assembly of New Brunswick

156.
True or False:
New Brunswick has no provincial legislature.
Answer: False

157.
Multiple Choice:
Who represents the monarch in New Brunswick at the provincial level?
A. The Premier
B. The Lieutenant Governor
C. The Speaker of the House
D. The Federal Governor General
Answer: B. The Lieutenant Governor

158.
True or False:
The Premier of New Brunswick is the ceremonial head of state.
Answer: False

159.
Multiple Choice:
What is the name of New Brunswick’s provincial flower?
A. Purple violet
B. Prairie lily
C. Trillium
D. White rose
Answer: A. Purple violet

160.
True or False:
The official flower of New Brunswick is the maple leaf.
Answer: False

161.
Multiple Choice:
Which river flows through Fredericton, the capital of New Brunswick?
A. Miramichi River
B. Restigouche River
C. Saint John River
D. Ottawa River
Answer: C. Saint John River

162.
True or False:
The Saint John River flows through the capital of New Brunswick.
Answer: True

163.
Multiple Choice:
New Brunswick’s flag features which of the following symbols?
A. A canoe and maple leaf
B. A lion and a ship
C. A bison and mountains
D. A cross and a moose
Answer: B. A lion and a ship

164.
True or False:
The New Brunswick flag contains a lion and a sailing ship.
Answer: True

165.
Multiple Choice:
Which New Brunswick community is known for its role in early Acadian settlement?
A. Alma
B. Caraquet
C. Sussex
D. Woodstock
Answer: B. Caraquet

166.
True or False:
Caraquet is important in Acadian history.
Answer: True

167.
Multiple Choice:
Which level of government is responsible for healthcare services in New Brunswick?
A. Municipal
B. Provincial
C. Federal
D. International
Answer: B. Provincial

168.
True or False:
Healthcare in New Brunswick is managed by the provincial government.
Answer: True

169.
Multiple Choice:
Which natural phenomenon attracts visitors to the Bay of Fundy?
A. Earthquakes
B. Geysers
C. World’s highest tides
D. Meteor showers
Answer: C. World’s highest tides

170.
True or False:
The Bay of Fundy is famous for its extreme tides.
Answer: True

171.
Multiple Choice:
What is the name of the Indigenous group native to New Brunswick?
A. Mi’kmaq and Maliseet
B. Cree and Ojibwa
C. Inuit
D. Haida
Answer: A. Mi’kmaq and Maliseet

172.
True or False:
The Mi’kmaq are among the First Nations of New Brunswick.
Answer: True

173.
Multiple Choice:
Which act guarantees bilingualism in New Brunswick?
A. Official Languages Act of Canada
B. Constitution Act
C. New Brunswick Languages Act
D. Provincial Multilingual Charter
Answer: A. Official Languages Act of Canada

174.
True or False:
The Canadian Constitution guarantees New Brunswick’s bilingual status.
Answer: True

175.
Multiple Choice:
In which year did New Brunswick become officially bilingual?
A. 1867
B. 1969
C. 1982
D. 2000
Answer: B. 1969

176.
True or False:
New Brunswick was officially declared bilingual in 1969.
Answer: True

177.
Multiple Choice:
What is the purpose of NB Power?
A. Managing healthcare
B. Distributing electricity
C. Providing postal service
D. Collecting taxes
Answer: B. Distributing electricity

178.
True or False:
NB Power is a Crown corporation that provides electricity.
Answer: True

179.
Multiple Choice:
New Brunswick joined Confederation in which year?
A. 1841
B. 1867
C. 1871
D. 1885
Answer: B. 1867

180.
True or False:
New Brunswick was one of the first four provinces to join Confederation in 1867.
Answer: True

181.
Multiple Choice:
Which cultural event is widely celebrated in Acadian communities in New Brunswick?
A. Canada Day
B. Festival Acadien
C. Multicultural Day
D. Francophonie Week
Answer: B. Festival Acadien

182.
True or False:
The Festival Acadien celebrates Scottish culture in New Brunswick.
Answer: False

183.
Multiple Choice:
Which of the following best describes New Brunswick’s landscape?
A. Deserts and plains
B. Rolling hills, forests, and rivers
C. Arctic tundra
D. Mountains and glaciers
Answer: B. Rolling hills, forests, and rivers

184.
True or False:
New Brunswick’s landscape includes coastal areas and dense forests.
Answer: True

185.
Multiple Choice:
Which national park is located in New Brunswick?
A. Banff
B. Kouchibouguac
C. Jasper
D. Waterton
Answer: B. Kouchibouguac

186.
True or False:
Kouchibouguac National Park is in New Brunswick.
Answer: True

187.
Multiple Choice:
New Brunswick’s legislative system is:
A. Bicameral
B. Unicameral
C. Tri-cameral
D. None of the above
Answer: B. Unicameral

188.
True or False:
The New Brunswick legislature has two houses like Parliament.
Answer: False

189.
Multiple Choice:
Which historical treaty impacted Indigenous peoples in New Brunswick?
A. Treaty of Versailles
B. Treaty of Paris (1763)
C. Meech Lake Accord
D. Kyoto Protocol
Answer: B. Treaty of Paris (1763)

190.
True or False:
The Treaty of Paris (1763) ended French control in New Brunswick.
Answer: True

191.
Multiple Choice:
What type of provincial government does New Brunswick have?
A. Dictatorship
B. Monarchy
C. Constitutional monarchy with parliamentary democracy
D. Theocracy
Answer: C. Constitutional monarchy with parliamentary democracy

192.
True or False:
New Brunswick is governed by a theocratic council.
Answer: False

193.
Multiple Choice:
What does the term “Acadian” refer to?
A. An ethnic group with Irish heritage
B. Descendants of early French settlers
C. Scottish immigrants
D. Inuit people
Answer: B. Descendants of early French settlers

194.
True or False:
Acadians in New Brunswick are mostly of German descent.
Answer: False

195.
Multiple Choice:
What is the role of Elections New Brunswick?
A. Set federal law
B. Manage provincial elections and referenda
C. Collect taxes
D. Monitor international trade
Answer: B. Manage provincial elections and referenda

196.
True or False:
Elections New Brunswick is responsible for managing voting processes in the province.
Answer: True

197.
Multiple Choice:
Which body sets the school curriculum in New Brunswick?
A. Department of Finance
B. Department of Education and Early Childhood Development
C. Health Canada
D. Immigration Canada
Answer: B. Department of Education and Early Childhood Development

198.
True or False:
Federal officials manage the New Brunswick school curriculum.
Answer: False

199.
Multiple Choice:
Which natural resource is New Brunswick known for historically?
A. Bananas
B. Oil
C. Forestry and pulp & paper
D. Sugar cane
Answer: C. Forestry and pulp & paper

200.
True or False:
Forestry has been an important part of New Brunswick’s economy.
Answer: True

201.
Multiple Choice:
What is the primary focus of the provincial Department of Environment and Local Government?
A. National defense
B. Fisheries control
C. Environmental protection and municipal governance
D. Criminal prosecution
Answer: C. Environmental protection and municipal governance

202.
True or False:
The Department of Environment in New Brunswick is responsible for immigration enforcement.
Answer: False

203.
Multiple Choice:
Which major city in New Brunswick is located at the mouth of the Saint John River?
A. Fredericton
B. Moncton
C. Saint John
D. Bathurst
Answer: C. Saint John

204.
True or False:
Saint John is located at the mouth of the Saint John River.
Answer: True

205.
Multiple Choice:
Who is the current Premier of New Brunswick (as of 2025)?
A. Blaine Higgs
B. David Eby
C. François Legault
D. Tim Houston
Answer: A. Blaine Higgs

206.
True or False:
Blaine Higgs is the Premier of New Brunswick.
Answer: True

207.
Multiple Choice:
What is the name of the famous rock formations in the Bay of Fundy?
A. Flowerpot Rocks
B. Reversing Rapids
C. Hopewell Rocks
D. Magnetic Hills
Answer: C. Hopewell Rocks

208.
True or False:
The Hopewell Rocks are located in New Brunswick’s Bay of Fundy.
Answer: True

209.
Multiple Choice:
Which of the following is an official language in New Brunswick?
A. English only
B. French only
C. English and French
D. English and Mi’kmaq
Answer: C. English and French

210.
True or False:
New Brunswick is a unilingual province in Canada.
Answer: False

211.
Multiple Choice:
Which university is located in Fredericton, New Brunswick?
A. Université Laval
B. University of New Brunswick
C. Dalhousie University
D. Memorial University
Answer: B. University of New Brunswick

212.
True or False:
The University of New Brunswick is in Moncton.
Answer: False

213.
Multiple Choice:
What is the population trend in rural parts of New Brunswick?
A. Rapid growth
B. Steady increase
C. Decline
D. No change
Answer: C. Decline

214.
True or False:
Rural New Brunswick has experienced population decline in recent years.
Answer: True

215.
Multiple Choice:
The official residence of the Lieutenant Governor of New Brunswick is called:
A. Rideau Hall
B. Government House
C. Brunswick Manor
D. Legislative House
Answer: B. Government House

216.
True or False:
The Lieutenant Governor of New Brunswick resides at Government House.
Answer: True

217.
Multiple Choice:
Which industry historically contributed to New Brunswick’s economic development?
A. Gold mining
B. Timber and shipbuilding
C. Aerospace
D. Technology
Answer: B. Timber and shipbuilding

218.
True or False:
New Brunswick had a strong shipbuilding industry in the 19th century.
Answer: True

219.
Multiple Choice:
What symbol is on the New Brunswick coat of arms?
A. A moose
B. A ship
C. A bison
D. A mountain
Answer: B. A ship

220.
True or False:
A ship appears on New Brunswick’s coat of arms.
Answer: True

221.
Multiple Choice:
Which industry is a growing contributor to New Brunswick’s modern economy?
A. Coal mining
B. Forestry
C. Information technology
D. Diamond mining
Answer: C. Information technology

222.
True or False:
The IT sector is growing in New Brunswick.
Answer: True

223.
Multiple Choice:
Which federal riding is the capital city of New Brunswick part of?
A. Moncton-Riverview-Dieppe
B. Fredericton
C. Saint John-Rothesay
D. Madawaska-Restigouche
Answer: B. Fredericton

224.
True or False:
Fredericton is its own federal electoral district.
Answer: True

225.
Multiple Choice:
What is the approximate population of New Brunswick (2025)?
A. 300,000
B. 775,000
C. 2 million
D. 5 million
Answer: B. 775,000

226.
True or False:
New Brunswick’s population is under 1 million.
Answer: True

227.
Multiple Choice:
Which port city is known as Canada’s third-largest port by tonnage?
A. Vancouver
B. Halifax
C. Saint John
D. Charlottetown
Answer: C. Saint John

228.
True or False:
The Port of Saint John is among the largest in Canada.
Answer: True

229.
Multiple Choice:
The Legislative Assembly of New Brunswick consists of how many Members (MLAs)?
A. 33
B. 49
C. 87
D. 108
Answer: B. 49

230.
True or False:
There are 49 MLAs in New Brunswick.
Answer: True

231.
Multiple Choice:
The head of the provincial government in New Brunswick is:
A. The Lieutenant Governor
B. The Premier
C. The Speaker
D. The Attorney General
Answer: B. The Premier

232.
True or False:
The Premier leads the provincial government in New Brunswick.
Answer: True

233.
Multiple Choice:
What is the capital of New Brunswick?
A. Moncton
B. Saint John
C. Fredericton
D. Bathurst
Answer: C. Fredericton

234.
True or False:
Moncton is the capital of New Brunswick.
Answer: False

235.
Multiple Choice:
What is the responsibility of the Lieutenant Governor?
A. Head of the federal court
B. Representative of the King in the province
C. Mayor of the capital city
D. Speaker of the House
Answer: B. Representative of the King in the province

236.
True or False:
The Lieutenant Governor represents the monarch in New Brunswick.
Answer: True

237.
Multiple Choice:
Which community in New Brunswick is known for French-speaking heritage and Acadian roots?
A. Woodstock
B. Caraquet
C. Sussex
D. Miramichi
Answer: B. Caraquet

238.
True or False:
Caraquet is a center of Acadian culture in New Brunswick.
Answer: True

239.
Multiple Choice:
New Brunswick shares a land border with which U.S. state?
A. Maine
B. Vermont
C. New York
D. Michigan
Answer: A. Maine

240.
True or False:
New Brunswick borders the U.S. state of Maine.
Answer: True

241.
Multiple Choice:
The “Magnetic Hill” attraction is located in which city?
A. Saint John
B. Fredericton
C. Moncton
D. Bathurst
Answer: C. Moncton

242.
True or False:
Moncton is home to the Magnetic Hill optical illusion.
Answer: True

243.
Multiple Choice:
What is the main legislative body of New Brunswick called?
A. Provincial Parliament
B. Legislative Assembly
C. House of Commons
D. General Council
Answer: B. Legislative Assembly

244.
True or False:
The Legislative Assembly of New Brunswick is the province’s main lawmaking body.
Answer: True

245.
Multiple Choice:
Which New Brunswick city is a major center for francophone culture and festivals?
A. Fredericton
B. Edmundston
C. Caraquet
D. Sackville
Answer: C. Caraquet

246.
True or False:
Caraquet is a major center of francophone and Acadian culture in New Brunswick.
Answer: True

247.
Multiple Choice:
Which of these natural phenomena is New Brunswick’s Bay of Fundy famous for?
A. Tallest mountains in Canada
B. Fastest winds
C. Highest tides in the world
D. Largest desert in North America
Answer: C. Highest tides in the world

248.
True or False:
The Bay of Fundy is known for having the highest tides in the world.
Answer: True

249.
Multiple Choice:
What is the role of the Premier of New Brunswick?
A. Appoint the federal judges
B. Represent the monarchy
C. Head of the provincial government
D. Mayor of the capital city
Answer: C. Head of the provincial government

250.
True or False:
The Premier of New Brunswick leads the provincial government.
Answer: True

251.
Multiple Choice:
What is a major agricultural product in New Brunswick?
A. Rice
B. Bananas
C. Potatoes
D. Corn
Answer: C. Potatoes

252.
True or False:
Potatoes are a major crop grown in New Brunswick.
Answer: True

253.
Multiple Choice:
Which community in New Brunswick is recognized for its strong Irish heritage?
A. Bathurst
B. Miramichi
C. Sussex
D. Campbellton
Answer: B. Miramichi

254.
True or False:
The Miramichi region has a rich Irish cultural heritage.
Answer: True

255.
Multiple Choice:
What is the name of the Lieutenant Governor’s official residence in New Brunswick?
A. Province House
B. Government House
C. Legislative Hall
D. Confederation House
Answer: B. Government House

256.
True or False:
The Lieutenant Governor of New Brunswick resides in Government House.
Answer: True

257.
Multiple Choice:
What is the responsibility of New Brunswick’s Lieutenant Governor?
A. Leader of the opposition
B. Representative of the King
C. Mayor of Fredericton
D. Provincial auditor
Answer: B. Representative of the King

258.
True or False:
The Lieutenant Governor is the federal representative in the province.
Answer: False

259.
Multiple Choice:
Which natural resource has been historically important in New Brunswick’s economy?
A. Gold
B. Petroleum
C. Timber (Forestry)
D. Uranium
Answer: C. Timber (Forestry)

260.
True or False:
New Brunswick’s economy has historically relied on forestry.
Answer: True

261.
Multiple Choice:
Which New Brunswick city is known for the Reversing Falls phenomenon?
A. Fredericton
B. Moncton
C. Saint John
D. Bathurst
Answer: C. Saint John

262.
True or False:
The Reversing Falls occur in Saint John, New Brunswick.
Answer: True

263.
Multiple Choice:
Who is responsible for municipal services like water and local roads in New Brunswick cities?
A. Provincial Premier
B. Federal Minister
C. Mayor and City Council
D. Member of Parliament
Answer: C. Mayor and City Council

264.
True or False:
In New Brunswick, the Mayor and Council handle municipal services.
Answer: True

265.
Multiple Choice:
Which of the following is a key tourism attraction in Hopewell Cape, New Brunswick?
A. Northern Lights
B. Thermal Springs
C. Hopewell Rocks
D. Ice Hotels
Answer: C. Hopewell Rocks

266.
True or False:
Hopewell Rocks is a famous tourist destination in New Brunswick.
Answer: True

267.
Multiple Choice:
Which term best describes New Brunswick’s language policy?
A. French-only
B. English-only
C. Bilingual
D. Trilingual
Answer: C. Bilingual

268.
True or False:
New Brunswick is a bilingual province in Canada.
Answer: True

269.
Multiple Choice:
What does bilingualism mean in New Brunswick’s provincial services?
A. Only signs are in two languages
B. Only schools are bilingual
C. Citizens can access government services in both English and French
D. Everyone must speak both languages
Answer: C. Citizens can access government services in both English and French

270.
True or False:
Everyone in New Brunswick is required to speak both English and French.
Answer: False

271.
Multiple Choice:
When did New Brunswick officially join Confederation?
A. 1865
B. 1866
C. 1867
D. 1873
Answer: C. 1867

272.
True or False:
New Brunswick became a province of Canada in 1867.
Answer: True

273.
Multiple Choice:
‘’Acadian” refer to what in New Brunswick?
A. German immigrants
B. Loyalist settlers
C. French-speaking descendants of early colonists
D. Indigenous communities
Answer: C. French-speaking descendants of early colonists

274.
True or False:
Acadians are an Indigenous group in New Brunswick.
Answer: False

275.
Multiple Choice:
Which act guarantees New Brunswick’s bilingual status?
A. Official Languages Act of Canada
B. New Brunswick Charter
C. Canadian Charter of Rights and Freedoms
D. Federal Bilingualism Act
Answer: C. Canadian Charter of Rights and Freedoms

276.
True or False:
The Canadian Charter of Rights and Freedoms supports New Brunswick’s bilingualism.
Answer: True

277.
Multiple Choice:
What is the largest river in New Brunswick?
A. Saint John River
B. Restigouche River
C. Miramichi River
D. Kennebecasis River
Answer: A. Saint John River

278.
True or False:
The Saint John River is the longest river in New Brunswick.
Answer: True

279.
Multiple Choice:
Which of the following industries remains important to New Brunswick’s economy today?
A. Space engineering
B. Forestry and paper production
C. Auto manufacturing
D. Oil refining
Answer: B. Forestry and paper production

280.
True or False:
Forestry is still important in New Brunswick’s economy.
Answer: True

281.
Multiple Choice:
Who is the head of state in New Brunswick?
A. The Premier
B. The Prime Minister
C. The King of Canada
D. The Lieutenant Governor
Answer: C. The King of Canada

282.
True or False:
The King of Canada is also New Brunswick’s head of state.
Answer: True

283.
Multiple Choice:
What natural feature causes the phenomenon of the Reversing Falls in Saint John?
A. Wind currents
B. Solar tides
C. Bay of Fundy tides
D. River floods
Answer: C. Bay of Fundy tides

284.
True or False:
The Reversing Falls are caused by underground volcanic pressure.
Answer: False

285.
Multiple Choice:
Which federal riding is located in the capital city of New Brunswick?
A. Fredericton
B. Moncton—Riverview—Dieppe
C. Saint John—Rothesay
D. Madawaska—Restigouche
Answer: A. Fredericton

286.
True or False:
Fredericton is represented in the federal Parliament by the riding of Moncton.
Answer: False

287.
Multiple Choice:
Which of these is a public university located in Fredericton, New Brunswick?
A. University of Ottawa
B. University of Moncton
C. University of New Brunswick
D. McGill University
Answer: C. University of New Brunswick

288.
True or False:
The University of New Brunswick has campuses in multiple cities.
Answer: True

289.
Multiple Choice:
Which year did the Official Languages Act declare New Brunswick as officially bilingual?
A. 1867
B. 1969
C. 1982
D. 1971
Answer: B. 1969

290.
True or False:
New Brunswick was declared officially bilingual in 1969.
Answer: True

291.
Multiple Choice:
Who was a famous New Brunswick-born Father of Confederation?
A. George-Étienne Cartier
B. Sir John A. Macdonald
C. Sir Samuel Leonard Tilley
D. Charles Tupper
Answer: C. Sir Samuel Leonard Tilley

292.
True or False:
Sir Samuel Leonard Tilley came from Nova Scotia.
Answer: False

293.
Multiple Choice:
New Brunswick shares its southern border with which U.S. state?
A. Maine
B. Vermont
C. New York
D. New Hampshire
Answer: A. Maine

294.
True or False:
New Brunswick shares a border with the U.S. state of Maine.
Answer: True

295.
Multiple Choice:
What is the governing system in New Brunswick?
A. Republican
B. Constitutional Monarchy
C. Dictatorship
D. Military rule
Answer: B. Constitutional Monarchy

296.
True or False:
New Brunswick is governed under a monarchy without any elected representatives.
Answer: False

297.
Multiple Choice:
What is the significance of the year 1867 for New Brunswick?
A. End of French rule
B. First provincial election
C. Confederation with Canada
D. Charter of Rights established
Answer: C. Confederation with Canada

298.
True or False:
New Brunswick joined Confederation in 1873.
Answer: False

299.
Multiple Choice:
Which  of these Indigenous groups is native to the New Brunswick region?
A. Haida
B. Mi’kmaq
C. Inuit
D. Cree
Answer: B. Mi’kmaq

300.
True or False:
The Inuit are Indigenous to New Brunswick.
Answer: False

301.
Multiple Choice:
What is the provincial flower of New Brunswick?
A. Trillium
B. Purple Violet
C. Wild Rose
D. Fireweed
Answer: B. Purple Violet

302.
True or False:
The Purple Violet is the official flower of New Brunswick.
Answer: True

303.
Multiple Choice:
What is the provincial bird of New Brunswick?
A. Loon
B. Blue Jay
C. Black-capped Chickadee
D. Song Sparrow
Answer: C. Black-capped Chickadee

304.
True or False:
The official bird of New Brunswick is the loon.
Answer: False

305.
Multiple Choice:
Which industry is historically significant in New Brunswick’s economy?
A. Gold mining
B. Forestry
C. Oil drilling
D. Aerospace manufacturing
Answer: B. Forestry

306.
True or False:
Forestry has been a major part of New Brunswick’s economy.
Answer: True

307.
Multiple Choice:
New Brunswick is known for being the only officially bilingual province. What does this mean?
A. Only French is spoken
B. Only English is spoken
C. Both English and French are official languages
D. All Indigenous languages are official
Answer: C. Both English and French are official languages

308.
True or False:
Only French is recognized officially in New Brunswick.
Answer: False

309.
Multiple Choice:
Which coastal feature is associated with the highest tides in the world and affects New Brunswick’s coast?
A. Hudson Bay
B. Bay of Fundy
C. Atlantic Shelf
D. Northumberland Strait
Answer: B. Bay of Fundy

310.
True or False:
The Bay of Fundy is known for the highest tides in the world.
Answer: True

311.
Multiple Choice:
Which major city in New Brunswick is known for its Acadian culture?
A. Edmundston
B. Moncton
C. Campbellton
D. Bathurst
Answer: B. Moncton

312.
True or False:
Moncton is a key city representing Acadian culture in New Brunswick.
Answer: True

313.
Multiple Choice:
What does the term “Acadian” refer to in New Brunswick?
A. Scottish settlers
B. French-speaking descendants of early colonists
C. Indigenous leaders
D. Loyalist refugees
Answer: B. French-speaking descendants of early colonists

314.
True or False:
Acadians are originally from British heritage.
Answer: False

315.
Multiple Choice:
Which level of government is responsible for issuing driver’s licences in New Brunswick?
A. Federal government
B. Municipal government
C. Provincial government
D. Private sector
Answer: C. Provincial government

316.
True or False:
The federal government issues driver’s licences in New Brunswick.
Answer: False

317.
Multiple Choice:
Which popular sport is deeply rooted in New Brunswick’s culture and community activities?
A. Lacrosse
B. Curling
C. Baseball
D. Golf
Answer: B. Curling

318.
True or False:
Curling is a commonly played sport in New Brunswick.
Answer: True

319.
Multiple Choice:
The Confederation Bridge connects Prince Edward Island to which New Brunswick city area?
A. Campbellton
B. Moncton
C. Cape Tormentine
D. Fredericton
Answer: C. Cape Tormentine

320.
True or False:
The Confederation Bridge connects to New Brunswick at Cape Tormentine.
Answer: True

321.
Multiple Choice:
Which annual cultural event is celebrated by Acadians in New Brunswick on August 15th?
A. Saint-Jean-Baptiste Day
B. Acadian Day
C. Le Carnaval de l’Acadie
D. Founders’ Festival
Answer: B. Acadian Day

322.
True or False:
Acadian Day is celebrated on August 15th in New Brunswick.
Answer: True

323.
Multiple Choice:
Which river flows through the capital city of Fredericton?
A. Saint John River
B. Miramichi River
C. Restigouche River
D. Nashwaak River
Answer: A. Saint John River

324.
True or False:
The Saint John River runs through Moncton.
Answer: False

325.
Multiple Choice:
Which New Brunswick city is a major port on the Bay of Fundy?
A. Bathurst
B. Saint John
C. Woodstock
D. Edmundston
Answer: B. Saint John

326.
True or False:
Saint John is a key port city in New Brunswick.
Answer: True

327.
Multiple Choice:
Which early settlers founded many of the French-speaking communities in New Brunswick?
A. United Empire Loyalists
B. Acadians
C. Scottish Highlanders
D. Huguenots
Answer: B. Acadians

328.
True or False:
The Acadians were English-speaking Loyalists.
Answer: False

329.
Multiple Choice:
What does New Brunswick’s coat of arms prominently feature?
A. A ship
B. A polar bear
C. A red maple leaf
D. A lighthouse
Answer: A. A ship

330.
True or False:
New Brunswick’s coat of arms includes a sailing ship.
Answer: True

331.
Multiple Choice:
Which province shares its entire western border with New Brunswick?
A. Quebec
B. Nova Scotia
C. Ontario
D. None
Answer: A. Quebec

332.
True or False:
New Brunswick shares a border with Quebec.
Answer: True

333.
Multiple Choice:
Which is one of the oldest cities in New Brunswick, founded by Loyalists in the 18th century?
A. Fredericton
B. Saint John
C. Moncton
D. Caraquet
Answer: B. Saint John

334.
True or False:
Saint John was founded by Loyalists in the 1700s.
Answer: True

335.
Multiple Choice:
Which New Brunswick town is well known for its French-speaking Acadian population?
A. Tracadie
B. Hartland
C. Woodstock
D. St. Stephen
Answer: A. Tracadie

336.
True or False:
Tracadie is an Acadian town in New Brunswick.
Answer: True

337.
Multiple Choice:
Which body of water borders New Brunswick to the east?
A. Gulf of St. Lawrence
B. Lake Ontario
C. Pacific Ocean
D. Lake Superior
Answer: A. Gulf of St. Lawrence

338.
True or False:
New Brunswick borders the Gulf of St. Lawrence.
Answer: True

339.
Multiple Choice:
Which major event forced the expulsion of many Acadians from New Brunswick in the 18th century?
A. The War of 1812
B. The Great Expulsion
C. Confederation
D. The Quiet Revolution
Answer: B. The Great Expulsion

340.
True or False:
The Great Expulsion forced many Acadians to leave New Brunswick in the 1700s.
Answer: True

341.
True or False:
The Premier of New Brunswick represents the Crown.
Answer: False

342.
True or False:
New Brunswick joined Canada in 1869.
Answer: False

343.
True or False:
New Brunswick joined Canada in 1867.
Answer: True

344.
Multiple Choice:
Which ocean affects New Brunswick’s climate and tides?
A. Arctic Ocean
B. Pacific Ocean
C. Atlantic Ocean
D. Indian Ocean
Answer: C. Atlantic Ocean

345.
True or False:
The Pacific Ocean influences New Brunswick’s tides.
Answer: False

346.
Multiple Choice:
Which natural feature in New Brunswick is known for the highest tides in the world?
A. Reversing Falls
B. Bay of Fundy
C. Hopewell Rocks
D. St. John River
Answer: B. Bay of Fundy

347.
True or False:
The Bay of Fundy is famous for having the world’s highest tides.
Answer: True

348.
Multiple Choice:
Which historical figure is recognized for defending Acadian rights in New Brunswick?
A. Joseph Howe
B. Louis Robichaud
C. George-Étienne Cartier
D. Samuel de Champlain
Answer: B. Louis Robichaud

349.
True or False:
Louis Robichaud helped improve Acadian rights in New Brunswick.
Answer: True

350.
Multiple Choice:
New Brunswick’s legislature is located in which city?
A. Saint John
B. Moncton
C. Fredericton
D. Edmundston
Answer: C. Fredericton

351.
True or False:
New Brunswick’s legislature is located in Saint John.
Answer: False

352.
Multiple Choice:
Which of the following is one of New Brunswick’s official languages?
A. German
B. Russian
C. English
D. Cree
Answer: C. English

353.
True or False:
Only French is an official language in New Brunswick.
Answer: False

354.
Multiple Choice:
Which event increased British settlement in New Brunswick after 1783?
A. The War of 1812
B. The Loyalist migration
C. The Klondike Gold Rush
D. Confederation
Answer: B. The Loyalist migration

355.
True or False:
Many Loyalists settled in New Brunswick after the American Revolution.
Answer: True

356.
Multiple Choice:
Which industry is traditionally important in northern New Brunswick?
A. Fishing
B. Technology
C. Oil refining
D. Diamond mining
Answer: A. Fishing

357.
True or False:
Fishing is a traditional industry in northern New Brunswick.
Answer: True

358.
Multiple Choice:
Which tree species is a major part of New Brunswick’s forestry industry?
A. Maple
B. Cedar
C. Spruce
D. Baobab
Answer: C. Spruce

359.
True or False:
The baobab tree is common in New Brunswick’s forests.
Answer: False

360.
Multiple Choice:
What is the minimum voting age in New Brunswick?
A. 21
B. 18
C. 19
D. 16
Answer: B. 18

361.
True or False:
Canadians can vote in federal elections at age 19.
Answer: False

362.
Multiple Choice:
Which population group is growing in New Brunswick through immigration?
A. Martians
B. Newcomers from Asia and Africa
C. Roman Empire citizens
D. Australian settlers
Answer: B. Newcomers from Asia and Africa

363.
True or False:
New Brunswick has seen increased immigration from Asia and Africa.
Answer: True

364.
Multiple Choice:
What is the Reversing Falls in Saint John known for?
A. Mountains made of ice
B. Waterfall that changes direction with the tides
C. Underwater caves
D. Freshwater springs
Answer: B. Waterfall that changes direction with the tides

365.
True or False:
The Reversing Falls in Saint John flow in one direction only.
Answer: False

366.
Multiple Choice:
Which act officially made both English and French the official languages of New Brunswick?
A. The Charter of Rights and Freedoms
B. The Official Languages Act (1969)
C. The British North America Act
D. The Multiculturalism Act
Answer: B. The Official Languages Act (1969)

367.
True or False:
New Brunswick is the only officially unilingual province in Canada.
Answer: False

368.
Multiple Choice:
Which sector is a growing contributor to New Brunswick’s economy?
A. Aerospace
B. Information technology
C. Nuclear power
D. Diamond mining
Answer: B. Information technology

369.
True or False:
New Brunswick is experiencing growth in its information technology sector.
Answer: True

370.
Multiple Choice:
New Brunswick joined Canadian Confederation in what year?
A. 1840
B. 1867
C. 1873
D. 1905
Answer: B. 1867

371.
True or False:
New Brunswick was one of the original four provinces in Confederation.
Answer: True

372.
Multiple Choice:
Who is the current Premier of New Brunswick
A. Tim Houston
B. Blaine Higgs
C. Doug Ford
D. Dominic LeBlanc
Answer: B. Blaine Higgs

373.
True or False:
Doug Ford is the Premier of New Brunswick.
Answer: False

374.
Multiple Choice:
What party does Premier Blaine Higgs belong to (2025)?
A. Liberal Party
B. Green Party
C. Progressive Conservative Party
D. New Democratic Party
Answer: C. Progressive Conservative Party

375.
True or False:
The Green Party is currently leading New Brunswick’s government.
Answer: False

376.
Multiple Choice:
What is the name of the current Lieutenant Governor of New Brunswick (2025)?
A. Brenda Murphy
B. Margaret Thom
C. Edith Dumont
D. Mary Simon
Answer: A. Brenda Murphy

377.
True or False:
Brenda Murphy is New Brunswick’s Lieutenant Governor in 2025.
Answer: True

378.
Multiple Choice:
Which of the following communities has a large Acadian population?
A. Bathurst
B. Winnipeg
C. Kelowna
D. Thunder Bay
Answer: A. Bathurst

379.
True or False:
Bathurst is a center of Acadian culture in New Brunswick.
Answer: True

380.
Multiple Choice:
What annual cultural celebration in New Brunswick promotes Acadian culture?
A. Fête nationale
B. Festival acadien
C. Winterlude
D. Canada Rocks
Answer: B. Festival acadien

381.
True or False:
Festival acadien is held to celebrate Acadian culture.
Answer: True

382.
Multiple Choice:
Which major river runs through Fredericton?
A. Ottawa River
B. Fraser River
C. Saint John River
D. Mackenzie River
Answer: C. Saint John River

383.
True or False:
The Mackenzie River flows through Fredericton.
Answer: False

384.
Multiple Choice:
What industry is associated with Sussex, New Brunswick?
A. Potash mining
B. Aerospace
C. Shipbuilding
D. Car manufacturing
Answer: A. Potash mining

385.
True or False:
Sussex is known for its potash industry.
Answer: True

386.
Multiple Choice:
What is New Brunswick’s most populous city?
A. Bathurst
B. Fredericton
C. Saint John
D. Moncton
Answer: D. Moncton

387.
True or False:
Fredericton is the most populous city in New Brunswick.
Answer: False

388.
Multiple Choice:
Which bridge connects New Brunswick to Prince Edward Island?
A. Lions Gate Bridge
B. Macdonald-Cartier Bridge
C. Confederation Bridge
D. Peace Bridge
Answer: C. Confederation Bridge

389.
True or False:
The Confederation Bridge links New Brunswick to Nova Scotia.
Answer: False

390.
Multiple Choice:
Which of the following is a national park located in New Brunswick?
A. Jasper
B. Fundy
C. Banff
D. La Mauricie
Answer: B. Fundy

391.
True or False:
Fundy National Park is located in Quebec.
Answer: False

392.
Multiple Choice:
What is the official residence of New Brunswick’s Lieutenant Governor?
A. Rideau Hall
B. Government House
C. Château Frontenac
D. Beaubears Island House
Answer: B. Government House

393.
True or False:
Rideau Hall is the official residence of New Brunswick’s Lieutenant Governor.
Answer: False

394.
Multiple Choice:
Which ethnic group established the first European settlement in New Brunswick?
A. British
B. Germans
C. French
D. Italians
Answer: C. French

395.
True or False:
The British were the first Europeans to settle in New Brunswick.
Answer: False

396.
Multiple Choice:
Which New Brunswick city was historically a shipbuilding center?
A. Fredericton
B. Moncton
C. Saint John
D. Edmundston
Answer: C. Saint John

397.
True or False:
Saint John was known for its shipbuilding industry.
Answer: True

398.
Multiple Choice:
Which is the New Brunswicks provincial flower?
A. Violet
B. Purple Saxifrage
C. Mayflower
D. Mountain Avens
Answer: A. Violet

399.
True or False:
New Brunswick’s provincial flower is the Violet.
Answer: True

400.
Multiple Choice:
In which year was the Official Languages Act first passed in New Brunswick?
A. 1945
B. 1969
C. 1982
D. 1995
Answer: B. 1969

401.
True or False:
New Brunswick’s bilingual status was declared in 1969.
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
                    'question_number' => $questionNumber, // Keep this for internal parsing logic, but it's not a DB column
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

        $this->command->info("Parsed " . count($questions) . " questions for New Brunswick.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $newBrunswickSection->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'],
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => $qData['audio_url'],
            ]);
        }

        $this->command->info("Successfully seeded New Brunswick citizenship questions.");
    }
}
