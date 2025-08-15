<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NovaScotiaQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $novaScotia = CourseSection::firstOrCreate(
            ['title' => 'Nova Scotia'],
            [
                'type' => 'province',
                'capital' => 'Halifax',
                'flag' => '/images/flags/nova-scotia.png',
                'description' => 'Questions specific to Nova Scotia.',
                'summary_audio_url' => '/audio/summary_nova_scotia.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $novaScotia->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
What is the name of Nova Scotia’s legislative building?
A. Province House
B. Government Hall
C. Assembly Centre
D. Halifax House
Answer: A. Province House

2.
True or False:
Nova Scotia is one of the original four provinces that formed Confederation in 1867.
Answer: True

3.
Multiple Choice:
Which ocean borders Nova Scotia?
A. Arctic Ocean
B. Pacific Ocean
C. Atlantic Ocean
D. Indian Ocean
Answer: C. Atlantic Ocean

4.
True or False:
Nova Scotia is located in Western Canada.
Answer: False
(Nova Scotia is in Eastern Canada, part of the Maritime region.)

5.
Multiple Choice:
Which industry has traditionally played a major role in Nova Scotia’s economy?
A. Aerospace
B. Forestry
C. Fishing
D. Mining
Answer: C. Fishing

6.
True or False:
The Skyline Trail is located in the Annapolis Valley.
Answer: False
(It is located in Cape Breton Highlands National Park.)

7.
Multiple Choice:
Which French settlers were expelled from Nova Scotia in the 1700s?
A. Métis
B. Acadians
C. Loyalists
D. Inuit
Answer: B. Acadians

8.
True or False:
Nova Scotia does not have a provincial legislature.
Answer: False
(Nova Scotia has its own provincial legislature, called the House of Assembly.)

9.
Multiple Choice:
What is the name of Nova Scotia’s provincial legislature?
A. Nova Scotia Parliament
B. House of Commons
C. Nova Scotia Assembly
D. House of Assembly
Answer: D. House of Assembly

10.
True or False:
The Mi’kmaq are the Indigenous people of Nova Scotia.
Answer: True

11.
Multiple Choice:
Which port in Nova Scotia is one of the largest natural harbours in the world?
A. Sydney
B. Yarmouth
C. Halifax
D. Bridgewater
Answer: C. Halifax

12.
True or False:
Nova Scotia’s government is a constitutional monarchy like the rest of Canada.
Answer: True

13.
Multiple Choice:
What is the main language spoken in Nova Scotia?
A. French
B. German
C. English
D. Gaelic
Answer: C. English

14.
True or False:
Nova Scotia is landlocked.
Answer: False
(Nova Scotia is surrounded by the Atlantic Ocean on most sides.)

15.
Multiple Choice:
Which group is known for its Scottish cultural heritage in Nova Scotia?
A. Inuit
B. Loyalists
C. Gaelic-speaking Highlanders
D. Doukhobors
Answer: C. Gaelic-speaking Highlanders

16.
True or False:
Halifax is the largest city in the Maritimes.
Answer: True

17.
Multiple Choice:
Who is the head of the provincial government in Nova Scotia?
A. Premier
B. Governor
C. Mayor
D. Senator
Answer: A. Premier

18.
True or False:
The Lieutenant Governor of Nova Scotia is appointed by the federal Prime Minister.
Answer: True

19.
Multiple Choice:
What is Nova Scotia’s official flower?
A. Purple Violet
B. Mayflower
C. Wild Rose
D. Blue Flag
Answer: B. Mayflower

20.
True or False:
Nova Scotia is Canada’s most populous province.
Answer: False
(Ontario is the most populous. Nova Scotia has a much smaller population.)

21.
Multiple Choice:
Which Nova Scotia town is famous for its shipbuilding history and the Bluenose schooner?
A. Lunenburg
B. Antigonish
C. Amherst
D. Truro
Answer: A. Lunenburg

22.
True or False:
Nova Scotia has no access to tidal power.
Answer: False
(Nova Scotia uses tidal power, especially in the Bay of Fundy, known for having the world’s highest tides.)

23.
Multiple Choice:
Which body of water separates Nova Scotia from New Brunswick?
A. Bay of Fundy
B. Strait of Georgia
C. Gulf of St. Lawrence
D. Lake Ontario
Answer: A. Bay of Fundy

24.
True or False:
The capital of Nova Scotia is Charlottetown.
Answer: False
(The capital of Nova Scotia is Halifax; Charlottetown is the capital of Prince Edward Island.)

25.
Multiple Choice:
What major university is located in Halifax?
A. McGill University
B. Dalhousie University
C. University of Ottawa
D. University of Alberta
Answer: B. Dalhousie University

26.
True or False:
Nova Scotia was the first province in Canada to grant women the right to vote.
Answer: False
(Manitoba was the first province in 1916.)

27.
Multiple Choice:
Nova Scotia’s provincial flag features what symbol?
A. A red maple leaf
B. A blue cross and a royal lion
C. A lighthouse
D. A Bluenose schooner
Answer: B. A blue cross and a royal lion

28.
True or False:
Nova Scotia borders Quebec.
Answer: False
(Nova Scotia borders New Brunswick, not Quebec.)

29.
Multiple Choice:
Which famous military fort is located in Halifax?
A. Fort Louisbourg
B. Fort Henry
C. Citadel Hill
D. Fort Edmonton
Answer: C. Citadel Hill

30.
True or False:
The Mi’kmaq people are part of the Algonquian language family.
Answer: True

31.
Multiple Choice:
What is the approximate population of Nova Scotia (as of 2025 estimates)?
A. 1 million
B. 3 million
C. 6 million
D. 10 million
Answer: A. 1 million

32.
True or False:
Nova Scotia’s official motto is “One for All, All for One.”
Answer: False
(The official motto is “Munit haec et altera vincit” – “One defends and the other conquers.”)

33.
Multiple Choice:
Which of these is a key cultural celebration in Nova Scotia?
A. Klondike Days
B. Highland Games
C. Calgary Stampede
D. Caribana
Answer: B. Highland Games

34.
True or False:
Nova Scotia Day is celebrated nationally in Canada.
Answer: False
(Nova Scotia Day is not a national holiday; it is specific to the province.)

35.
Multiple Choice:
Which port in Nova Scotia was a key immigration gateway during the 20th century?
A. Lunenburg
B. Halifax (Pier 21)
C. Sydney
D. Digby
Answer: B. Halifax (Pier 21)

36.
True or False:
Nova Scotia has a dry desert climate.
Answer: False
(Nova Scotia has a humid continental climate with four seasons.)

37.
Multiple Choice:
Who represents the King in Nova Scotia at the provincial level?
A. Premier
B. Prime Minister
C. Lieutenant Governor
D. Mayor
Answer: C. Lieutenant Governor

38.
True or False:
Nova Scotia is known for having the world’s highest tides.
Answer: True

39.
Multiple Choice:
Which major island is part of Nova Scotia?
A. Prince Edward Island
B. Cape Breton Island
C. Vancouver Island
D. Baffin Island
Answer: B. Cape Breton Island

40.
True or False:
Nova Scotia was part of New France until the British took control in the 18th century.
Answer: True

41.
Multiple Choice:
Which Nova Scotia town is famous for its apple industry?
A. Amherst
B. Kentville
C. Shelburne
D. New Glasgow
Answer: B. Kentville

42.
True or False:
Nova Scotia does not have any ferry services to other provinces.
Answer: False
(There are ferry services to New Brunswick, Prince Edward Island, and Newfoundland.)

43.
Multiple Choice:
What is the name of Nova Scotia’s current (2025) Premier?
A. Blaine Higgs
B. Tim Houston
C. François Legault
D. Doug Ford
Answer: B. Tim Houston

44.
True or False:
Halifax served as a major naval base during both World Wars.
Answer: True

45.
Multiple Choice:
What is the legislative branch of the Nova Scotia government called?
A. Legislative Council
B. House of Commons
C. House of Assembly
D. Senate
Answer: C. House of Assembly

46.
True or False:
Nova Scotia was one of the last provinces to join Confederation.
Answer: False
(Nova Scotia was one of the first four provinces to join Confederation in 1867.)

47.
Multiple Choice:
Which ethnic group has had a historic presence in Preston, Nova Scotia?
A. Ukrainian
B. Acadian
C. African Nova Scotians
D. Mennonites
Answer: C. African Nova Scotians

48.
True or False:
Nova Scotia is a bilingual province like New Brunswick.
Answer: False
(New Brunswick is officially bilingual; Nova Scotia is officially English with French services in some areas.)

49.
Multiple Choice:
Which festival celebrates Acadian culture in Nova Scotia?
A. Festival Acadien
B. Highland Festival
C. Évangéline Days
D. Acadian World Congress
Answer: D. Acadian World Congress

50.
True or False:
Nova Scotia has a unicameral legislative system.
Answer: True
(It has a single legislative chamber: the House of Assembly.)

51.
Multiple Choice:
Which of the following is Nova Scotia’s oldest university, founded in 1789?
A. Acadia University
B. Mount Saint Vincent University
C. University of King’s College
D. Saint Mary’s University
Answer: C. University of King’s College

52.
True or False:
Nova Scotia’s name is derived from Latin, meaning “New France.”
Answer: False
(Nova Scotia is Latin for “New Scotland.”)

53.
Multiple Choice:
What is the largest urban area in Nova Scotia?
A. Sydney
B. Dartmouth
C. Truro
D. Halifax
Answer: D. Halifax

54.
True or False:
The Nova Scotia tartan was the first provincial tartan in Canada.
Answer: True

55.
Multiple Choice:
Which Nova Scotia community is a UNESCO World Heritage Site?
A. Lunenburg
B. Antigonish
C. Wolfville
D. Bridgewater
Answer: A. Lunenburg

56.
True or False:
Nova Scotia has only one official language: French.
Answer: False
(Nova Scotia’s official language is English.)

57.
Multiple Choice:
Who is responsible for electing Members of the Legislative Assembly (MLAs) in Nova Scotia?
A. The Premier
B. The federal government
C. The Lieutenant Governor
D. The citizens of Nova Scotia
Answer: D. The citizens of Nova Scotia

58.
True or False:
Cape Breton Island is connected to the mainland by a causeway.
Answer: True

59.
Multiple Choice:
Which Nova Scotia region is well known for its Gaelic heritage?
A. South Shore
B. Annapolis Valley
C. Cape Breton
D. Northumberland Shore
Answer: C. Cape Breton

60.
True or False:
Nova Scotia’s official bird is the loon.
Answer: False
(Nova Scotia’s official bird is the osprey.)

61.
Multiple Choice:
Which event in 1917 devastated the city of Halifax?
A. The Halifax Fire
B. The Halifax Explosion
C. The Halifax Hurricane
D. The Battle of Halifax
Answer: B. The Halifax Explosion

62.
True or False:
Nova Scotia is the most populous province in Canada.
Answer: False
(Ontario is the most populous. Nova Scotia ranks much lower.)

63.
Multiple Choice:
What is the current (2025) political party in power in Nova Scotia?
A. Nova Scotia Liberal Party
B. Nova Scotia New Democratic Party (NDP)
C. Progressive Conservative Party
D. Green Party
Answer: C. Progressive Conservative Party

64.
True or False:
Nova Scotia’s Legislative Assembly meets in Sydney.
Answer: False
(It meets in Halifax.)

65.
Multiple Choice:
Which bay in Nova Scotia is famous for having the highest tides in the world?
A. Mahone Bay
B. Bedford Basin
C. Bay of Fundy
D. St. Margarets Bay
Answer: C. Bay of Fundy

66.
True or False:
Mi’kmaq is one of the Indigenous groups in Nova Scotia.
Answer: True

67.
Multiple Choice:
Which island province is located east of Nova Scotia?
A. Newfoundland
B. Prince Edward Island
C. Cape Breton
D. Vancouver Island
Answer: B. Prince Edward Island

68.
True or False:
Nova Scotia celebrates Emancipation Day on August 1st.
Answer: True

69.
Multiple Choice:
What major Nova Scotia town was historically a stronghold of Acadian culture?
A. Digby
B. Yarmouth
C. Grand-Pré
D. Kentville
Answer: C. Grand-Pré

70.
True or False:
Halifax Harbour is a freshwater lake.
Answer: False
(Halifax Harbour is a saltwater port.)

71.
Multiple Choice:
What major employer is associated with Nova Scotia’s defence and shipbuilding sector?
A. Irving Shipbuilding
B. Lockheed Martin
C. Canadian Tire
D. Bombardier
Answer: A. Irving Shipbuilding

72.
True or False:
Nova Scotia is larger in land area than Alberta.
Answer: False
(Alberta is much larger in land area.)

73.
Multiple Choice:
Which sector contributes significantly to Nova Scotia’s economy?
A. Mining
B. Fishing and seafood
C. Automotive manufacturing
D. Agriculture only
Answer: B. Fishing and seafood

74.
True or False:
The Premier of Nova Scotia is appointed by the King.
Answer: False
(The Premier is the leader of the party with the most seats in the provincial legislature.)

75.
Multiple Choice:
Which historic Nova Scotia event led to mass deportation of Acadians?
A. Treaty of Paris
B. Halifax Explosion
C. Great Deportation (Le Grand Dérangement)
D. Confederation
Answer: C. Great Deportation (Le Grand Dérangement)

76.
True or False:
Nova Scotia has its own provincial police force.
Answer: False
(The Royal Canadian Mounted Police (RCMP) provides provincial policing services.)

77.
Multiple Choice:
What is the primary function of the Lieutenant Governor of Nova Scotia?
A. Pass municipal by-laws
B. Represent the federal government
C. Represent the King in the province
D. Oversee local taxation
Answer: C. Represent the King in the province

78.
True or False:
Nova Scotia was once called Acadia.
Answer: True

79.
Multiple Choice:
Which major bridge connects Halifax to Dartmouth?
A. Macdonald Bridge
B. Golden Gate Bridge
C. Victoria Bridge
D. Confederation Bridge
Answer: A. Macdonald Bridge

80.
True or False:
Saint Mary’s University is located in Truro, Nova Scotia.
Answer: False
(Saint Mary’s University is located in Halifax.)

81.
Multiple Choice:
What natural disaster occurred in Halifax in 2003 causing widespread damage?
A. Earthquake
B. Hurricane Juan
C. Tsunami
D. Tornado
Answer: B. Hurricane Juan

82.
True or False:
The Mi’kmaq Grand Council is a key Indigenous governance body in Nova Scotia.
Answer: True

83.
Multiple Choice:
Which Nova Scotia festival celebrates Acadian culture annually?
A. Celtic Colours
B. Festival Acadien de Clare
C. Halifax Pop Explosion
D. Stan Rogers Folk Festival
Answer: B. Festival Acadien de Clare

84.
True or False:
The Annapolis Valley is known primarily for oil drilling.
Answer: False
(It is known for agriculture and apple farming.)

85.
Multiple Choice:
Which Nova Scotian was the first Black woman elected to a legislature in Canada?
A. Viola Desmond
B. Daurene Lewis
C. Portia White
D. Mayann Francis
Answer: B. Daurene Lewis

86.
True or False:
Portia White was a famous opera singer from Nova Scotia.
Answer: True

87.
Multiple Choice:
What year did Nova Scotia become one of the original provinces in Canadian Confederation?
A. 1865
B. 1867
C. 1871
D. 1905
Answer: B. 1867

88.
True or False:
Halifax is located on Cape Breton Island.
Answer: False
(Halifax is on the mainland of Nova Scotia.)

89.
Multiple Choice:
Which Nova Scotia national park is known for its dramatic highlands and coastal cliffs?
A. Kejimkujik National Park
B. Fundy National Park
C. Cape Breton Highlands National Park
D. Gros Morne National Park
Answer: C. Cape Breton Highlands National Park

90.
True or False:
The Legislative Assembly of Nova Scotia is located in Sydney.
Answer: False
(It is located in Halifax.)

91.
Multiple Choice:
Which Nova Scotia community was a haven for Black Loyalists in the 1700s?
A. Lunenburg
B. Preston
C. Baddeck
D. Amherst
Answer: B. Preston

92.
True or False:
The Nova Scotia House of Assembly is the oldest legislature in Canada.
Answer: True

93.
Multiple Choice:
What is the provincial flower of Nova Scotia?
A. Purple violet
B. Wild rose
C. Mayflower
D. Trillium
Answer: C. Mayflower

94.
True or False:
Nova Scotia has two official time zones.
Answer: False
(Nova Scotia observes Atlantic Standard Time.)

95.
Multiple Choice:
Which Nova Scotia landmark honors those who died in the Titanic disaster?
A. Fairview Lawn Cemetery
B. Halifax Citadel
C. Pier 21
D. Grand-Pré National Historic Site
Answer: A. Fairview Lawn Cemetery

96.
True or False:
Nova Scotia shares a border with Quebec.
Answer: False
(It shares a land border only with New Brunswick.)

97.
Multiple Choice:
Which body of water borders Nova Scotia to the east?
A. Lake Ontario
B. Pacific Ocean
C. Atlantic Ocean
D. Hudson Bay
Answer: C. Atlantic Ocean

98.
True or False:
The Nova Scotia legislature is bicameral.
Answer: False
(It is unicameral — it has only one legislative chamber.)

99.
Multiple Choice:
Who is the ceremonial representative of the King in Nova Scotia?
A. Premier
B. Speaker of the House
C. Lieutenant Governor
D. Mayor of Halifax
Answer: C. Lieutenant Governor

100.
True or False:
Nova Scotia has more inland freshwater lakes than British Columbia.
Answer: False
(British Columbia has significantly more lakes due to its vast size and terrain.)

101.
Multiple Choice:
Which federal riding includes much of urban Halifax?
A. Cape Breton—Canso
B. Halifax
C. Kings—Hants
D. Central Nova
Answer: B. Halifax

102.
True or False:
Nova Scotia’s provincial legislature meets in Province House.
Answer: True

103.
Multiple Choice:
Which Nova Scotia port was a major transatlantic immigration entry point?
A. Yarmouth
B. Lunenburg
C. Halifax
D. Digby
Answer: C. Halifax

104.
True or False:
Kejimkujik National Park is known for Indigenous petroglyphs.
Answer: True

105.
Multiple Choice:
Which annual event celebrates Celtic music and culture in Nova Scotia?
A. Jazz Festival
B. Celtic Colours International Festival
C. Acadian Days
D. Bluegrass Festival
Answer: B. Celtic Colours International Festival

106.
True or False:
Cape Breton Island is part of Nova Scotia.
Answer: True

107.
Multiple Choice:
What Nova Scotia town is known for shipbuilding and the Bluenose schooner?
A. Truro
B. Lunenburg
C. Bridgewater
D. Amherst
Answer: B. Lunenburg

108.
True or False:
The Bluenose appears on Canada’s 10-dollar bill.
Answer: False
(The Bluenose appears on the Canadian dime.)

109.
Multiple Choice:
Which community is home to the Alexander Graham Bell National Historic Site?
A. Truro
B. Lunenburg
C. Baddeck
D. Yarmouth
Answer: C. Baddeck

110.
True or False:
Nova Scotia is the only Canadian province without a coastline.
Answer: False
(It has the longest coastline of any province relative to its size.)

111.
Multiple Choice:
Which group were early European settlers in Nova Scotia alongside the French?
A. Vikings
B. Basques
C. Scots
D. Dutch
Answer: C. Scots

112.
True or False:
Nova Scotia has a larger land area than Alberta.
Answer: False
(Alberta is much larger in land area than Nova Scotia.)

113.
Multiple Choice:
Which Nova Scotia city is home to the province’s largest university?
A. Sydney
B. Halifax
C. Truro
D. Kentville
Answer: B. Halifax

114.
True or False:
Acadians were the original British settlers of Nova Scotia.
Answer: False
(Acadians were French settlers, not British.)

115.
Multiple Choice:
What Nova Scotia body of water experiences the world’s highest tides?
A. Atlantic Ocean
B. Bras d’Or Lake
C. Bay of Fundy
D. Northumberland Strait
Answer: C. Bay of Fundy

116.
True or False:
Viola Desmond is known for fighting for French language rights in Nova Scotia.
Answer: False
(She fought racial segregation in the 1940s.)

117.
Multiple Choice:
Who currently serves as Premier of Nova Scotia?
A. Tim Houston
B. Stephen McNeil
C. Darrell Dexter
D. Iain Rankin
Answer: A. Tim Houston

118.
True or False:
Nova Scotia’s Lieutenant Governor is elected by popular vote.
Answer: False
(The Lieutenant Governor is appointed by the Governor General on the advice of the Prime Minister.)

119.
Multiple Choice:
Which Nova Scotia site is a UNESCO World Heritage Site?
A. Cape Breton Highlands
B. Halifax Waterfront
C. Grand-Pré National Historic Site
D. Annapolis Royal
Answer: C. Grand-Pré National Historic Site

120.
True or False:
The Grand-Pré site commemorates Acadian deportation.
Answer: True

121.
Multiple Choice:
Which industry has historically been central to Nova Scotia’s economy?
A. Oil and gas
B. Aerospace
C. Fishing
D. Mining
Answer: C. Fishing

122.
True or False:
The Halifax Explosion occurred during World War I.
Answer: True

123.
Multiple Choice:
What is the name of the Indigenous peoples native to Nova Scotia?
A. Mohawk
B. Inuit
C. Mi’kmaq
D. Cree
Answer: C. Mi’kmaq

124.
True or False:
The Mi’kmaq are one of the First Nations in Nova Scotia.
Answer: True

125.
Multiple Choice:
Which Nova Scotia region is famous for its wine production?
A. Cape Breton
B. South Shore
C. Annapolis Valley
D. Eastern Shore
Answer: C. Annapolis Valley

126.
True or False:
Nova Scotia has only one official language.
Answer: False
(While English is dominant, the province also supports French minority rights.)

127.
Multiple Choice:
What is the capital of Nova Scotia?
A. Sydney
B. Truro
C. Halifax
D. Dartmouth
Answer: C. Halifax

128.
True or False:
Halifax was once known as Fort Edward.
Answer: False
(It was formerly known as Chebucto.)

129.
Multiple Choice:
Which important Canadian legal figure was born in Nova Scotia?
A. John Diefenbaker
B. Donald Marshall Jr.
C. Pierre Trudeau
D. Jean Chrétien
Answer: B. Donald Marshall Jr.

130.
True or False:
Donald Marshall Jr.’s case helped change Canada’s justice system.
Answer: True

131.
Multiple Choice:
What Nova Scotian island is linked to folklore about being settled by Norse explorers?
A. Oak Island
B. Sable Island
C. Georges Island
D. Brier Island
Answer: A. Oak Island

132.
True or False:
Sable Island is famous for wild horses.
Answer: True

133.
Multiple Choice:
Which federal riding covers Cape Breton Island?
A. Halifax
B. Sydney—Victoria
C. Cumberland—Colchester
D. South Shore—St. Margaret’s
Answer: B. Sydney—Victoria

134.
True or False:
Cape Breton is a separate province from Nova Scotia.
Answer: False
(It is part of Nova Scotia.)

135.
Multiple Choice:
What Nova Scotian innovation contributed to naval warfare in WWII?
A. Radar
B. Convoy system
C. Codebreaking
D. Naval sonar
Answer: B. Convoy system

136.
True or False:
Nova Scotia has hosted G7 international summits.
Answer: True

137.
Multiple Choice:
Who is responsible for appointing senators from Nova Scotia?
A. Premier
B. Lieutenant Governor
C. Prime Minister
D. Chief Justice
Answer: C. Prime Minister

138.
True or False:
Senators are elected directly by Nova Scotians.
Answer: False
(Senators are appointed by the Prime Minister.)

139.
Multiple Choice:
Which of these is a provincial park in Nova Scotia?
A. Algonquin Park
B. Blomidon Provincial Park
C. Banff National Park
D. La Mauricie Park
Answer: B. Blomidon Provincial Park

140.
True or False:
Nova Scotia borders the United States.
Answer: False
(Nova Scotia does not share a land border with the U.S.)

141.
Multiple Choice:
Which Nova Scotia location is known for deposits of fossilized trees and is a UNESCO World Heritage Site?
A. Lunenburg
B. Cape Breton Highlands
C. Joggins Fossil Cliffs
D. Sable Island
Answer: C. Joggins Fossil Cliffs

142.
True or False:
The Joggins Fossil Cliffs date back to the Jurassic period.
Answer: False
(They date to the Carboniferous period.)

143.
Multiple Choice:
Which famous schooner was built in Lunenburg, Nova Scotia?
A. HMS Victory
B. The Mayflower
C. Bluenose
D. HMCS Sackville
Answer: C. Bluenose

144.
True or False:
The Bluenose appears on Canada’s 50-dollar bill.
Answer: False
(It appears on the Canadian dime.)

145.
Multiple Choice:
Which industry played a major role in Nova Scotia’s historical economy?
A. Cotton manufacturing
B. Gold mining
C. Shipbuilding
D. Aerospace
Answer: C. Shipbuilding

146.
True or False:
Nova Scotia was one of the four original provinces to join Confederation in 1867.
Answer: True

147.
Multiple Choice:
What is the name of the ferry service connecting Nova Scotia and Newfoundland?
A. Coastal Express
B. Marine Atlantic
C. Atlantic Connector
D. Mariner Ferry
Answer: B. Marine Atlantic

148.
True or False:
Kejimkujik National Park is known for its Mi’kmaq petroglyphs and canoe routes.
Answer: True

149.
Multiple Choice:
Which event caused major damage to Halifax in 1917?
A. The Halifax Explosion
B. The Titanic sinking
C. Hurricane Juan
D. Acadian Deportation
Answer: A. The Halifax Explosion

150.
True or False:
The Halifax Explosion was caused by a collision between two passenger ferries.
Answer: False
(It was caused by a collision between two ships—one carrying explosives.)

151.
Multiple Choice:
Which city in Nova Scotia has a long history as a center for coal mining?
A. Lunenburg
B. Yarmouth
C. Sydney
D. Truro
Answer: C. Sydney

152.
True or False:
The coal mining industry in Sydney contributed to the growth of the steel industry.
Answer: True

153.
Multiple Choice:
Who is responsible for appointing the Lieutenant Governor of Nova Scotia?
A. The Premier
B. The House of Assembly
C. The Prime Minister of Canada
D. The King directly
Answer: C. The Prime Minister of Canada

154.
True or False:
The Lieutenant Governor is elected by Nova Scotians.
Answer: False
(They are appointed by the federal government.)

155.
Multiple Choice:
What is the name of the French-speaking people who first settled in Nova Scotia in the 1600s?
A. Huguenots
B. Acadians
C. Métis
D. Loyalists
Answer: B. Acadians

156.
True or False:
The Acadian Expulsion was also known as Le Grand Dérangement.
Answer: True

157.
Multiple Choice:
Which Nova Scotia museum highlights immigration to Canada, especially through Halifax?
A. Nova Scotia Museum of Natural History
B. Pier 21
C. Maritime Museum of the Atlantic
D. Acadian Heritage Centre
Answer: B. Pier 21

158.
True or False:
Pier 21 is often compared to Ellis Island in the United States.
Answer: True

159.
Multiple Choice:
What does the name “Nova Scotia” translate to in English?
A. New Scotland
B. New Foundland
C. New Star
D. New Sea
Answer: A. New Scotland

160.
True or False:
The Nova Scotia flag features a red cross on a white background with a blue lion in the center.
Answer: False
(It features a blue saltire (diagonal cross) with a gold shield and red lion.)

161.
Multiple Choice:
What is the capital city of Nova Scotia?
A. Charlottetown
B. Fredericton
C. Halifax
D. Sydney
Answer: C. Halifax

162.
True or False:
Halifax is the largest city in Atlantic Canada.
Answer: True

163.
Multiple Choice:
Which Nova Scotian bay is famous for having the highest tides in the world?
A. Bay of Islands
B. Bay of Fundy
C. Mahone Bay
D. Peggy’s Cove Bay
Answer: B. Bay of Fundy

164.
True or False:
The Bay of Fundy is known for low tidal changes.
Answer: False
(It has the highest tidal range in the world.)

165.
Multiple Choice:
Which group of settlers established Black communities in Nova Scotia after the American Revolutionary War?
A. Acadians
B. United Empire Loyalists
C. Irish Catholics
D. Métis
Answer: B. United Empire Loyalists

166.
True or False:
Nova Scotia has no significant Black Canadian history.
Answer: False
(Nova Scotia has a rich Black Canadian heritage dating back to the 1700s.)

167.
Multiple Choice:
Which traditional Nova Scotian musical style has roots in Scottish and Irish culture?
A. Reggae
B. Celtic
C. Jazz
D. Opera
Answer: B. Celtic

168.
True or False:
Celtic music and Highland dancing are still part of Nova Scotia’s culture today.
Answer: True

169.
True or False:
Sable Island has no permanent human population.
Answer: True

170.
True or False:
Cape Breton Island is located in Ontario.
Answer: False

171.
Multiple Choice:
What is the name of the historic fortress located in Cape Breton?
A. Fort Anne
B. Fort York
C. Fortress of Louisbourg
D. Citadel Hill
Answer: C. Fortress of Louisbourg

172.
True or False:
The Fortress of Louisbourg is a fully reconstructed 18th-century French fortress.
Answer: True

173.
Multiple Choice:
Who represents the monarch in Nova Scotia?
A. The Prime Minister
B. The Lieutenant Governor
C. The Premier
D. The Speaker of the House
Answer: B. The Lieutenant Governor

174.
True or False:
The Premier of Nova Scotia is the same as the federal Prime Minister.
Answer: False
(They are different positions. The Premier leads the province; the Prime Minister leads the country.)

175.
Multiple Choice:
Which Nova Scotian politician served as the first Black member of the provincial legislature?
A. Mayann Francis
B. William Hall
C. Donald Oliver
D. Wayne Adams
Answer: D. Wayne Adams

176.
True or False:
Nova Scotia has never had a Black Lieutenant Governor.
Answer: False
(Mayann Francis served as the first Black Lieutenant Governor of Nova Scotia.)

177.
Multiple Choice:
Which historic tragedy struck Halifax in 1917, causing massive destruction and loss of life?
A. Hurricane Dorian
B. Halifax Explosion
C. Acadian Expulsion
D. Great Fire of Halifax
Answer: B. Halifax Explosion

178.
True or False:
The Halifax Explosion was the largest human-made explosion before the atomic bomb.
Answer: True

179.
Multiple Choice:
Which Nova Scotia lighthouse is one of the most photographed in Canada?
A. Sambro Lighthouse
B. Louisbourg Lighthouse
C. Peggy’s Cove Lighthouse
D. Cape Sable Lighthouse
Answer: C. Peggy’s Cove Lighthouse

180.
True or False:
Peggy’s Cove is located inland.
Answer: False
(It is a coastal village known for its scenic shoreline.)

181.
Multiple Choice:
What is the name of the provincial legislative body in Nova Scotia?
A. House of Commons
B. House of Assembly
C. Legislative Council
D. Senate
Answer: B. House of Assembly

182.
True or False:
Members of the Nova Scotia House of Assembly are called Senators.
Answer: False
(They are called Members of the Legislative Assembly – MLAs.)

183.
Multiple Choice:
Which natural disaster impacted Nova Scotia in 2022 causing widespread flooding and damage?
A. Earthquake
B. Hurricane Fiona
C. Tornado
D. Ice Storm
Answer: B. Hurricane Fiona

184.
True or False:
Hurricane Fiona hit Nova Scotia in 2022.
Answer: True

185.
Multiple Choice:
What is the name of Nova Scotia’s official provincial flower?
A. Wild Rose
B. Purple Violet
C. Mayflower
D. Trillium
Answer: C. Mayflower

186.
True or False:
The Mayflower blooms in late autumn.
Answer: False
(It typically blooms in early spring.)

187.
Multiple Choice:
What is Nova Scotia’s official motto in Latin?
A. “Parva sub ingenti”
B. “Munit haec et altera vincit”
C. “Ad mare usque ad mare”
D. “Splendor sine occasu”
Answer: B. “Munit haec et altera vincit”
(Translation: “One defends and the other conquers.”)

188.
True or False:
Nova Scotia’s motto means “Strong and free.”
Answer: False
(That is Canada’s national motto.)

189.
Multiple Choice:
Which Nova Scotian town is known for its UNESCO World Heritage status and shipbuilding history?
A. Sydney
B. Lunenburg
C. Digby
D. Windsor
Answer: B. Lunenburg

190.
True or False:
Lunenburg is recognized for its modern architecture.
Answer: False
(It is recognized for its preserved colonial architecture.)

191.
Multiple Choice:
What major bridge connects downtown Halifax with Dartmouth?
A. Confederation Bridge
B. Macdonald Bridge
C. Tancook Bridge
D. Grand Narrows Bridge
Answer: B. Macdonald Bridge

192.
True or False:
Halifax’s port is ice-free year-round.
Answer: True

193.
Multiple Choice:
Which famous Nova Scotian poet wrote about the sea and coastal life?
A. Leonard Cohen
B. Alistair MacLeod
C. Elizabeth Bishop
D. Charles G.D. Roberts
Answer: B. Alistair MacLeod

194.
True or False:
The Nova Scotia government is responsible for both energy policy and natural resources.
Answer: True

195.
Multiple Choice:
Which Nova Scotia body of water provides habitat for migratory birds and is protected?
A. Grand Lake
B. Shubenacadie River
C. Minas Basin
D. Chocolate Lake
Answer: C. Minas Basin

196.
True or False:
Membertou First Nation is internationally recognized for its governance model.
Answer: True

197.
Multiple Choice:
Which trail in Cape Breton offers scenic coastal views and is popular among tourists?
A. Trans-Canada Trail
B. Skyline Trail
C. Annapolis Heritage Trail
D. Bluenose Path
Answer: B. Skyline Trail

198.
True or False:
Alistair MacLeod was born in Ontario.
Answer: False
(He was born in Saskatchewan but lived and worked in Nova Scotia.)

199.
Multiple Choice:
Which Nova Scotia port is closest to international waters and used for ocean freight?
A. Sydney
B. Yarmouth
C. Halifax
D. Digby
Answer: C. Halifax

200.
True or False:
Chéticamp is located in Cape Breton Island.
Answer: True

201.
Multiple Choice:
Which Nova Scotia university is the oldest English-language university in Canada?
A. Cape Breton University
B. Mount Saint Vincent University
C. Dalhousie University
D. University of King’s College
Answer: D. University of King’s College

202.
True or False:
Dalhousie University was founded before the University of King’s College.
Answer: False
(University of King’s College was founded in 1789, Dalhousie in 1818.)

203.
Multiple Choice:
Which sector is a major contributor to Nova Scotia’s economy?
A. Oil drilling
B. Forestry
C. Aerospace
D. Commercial fishing
Answer: D. Commercial fishing

204.
True or False:
Nova Scotia is landlocked and has no coastal industries.
Answer: False
(It is a maritime province with a strong fishing and shipping industry.)

205.
Multiple Choice:
Which Nova Scotia community is known for its Mi’kmaq heritage and culture?
A. Amherst
B. Truro
C. Eskasoni
D. Yarmouth
Answer: C. Eskasoni

206.
True or False:
Eskasoni is a historic Acadian settlement.
Answer: False
(Eskasoni is a Mi’kmaq community.)

207.
Multiple Choice:
What is the name of the Nova Scotia ferry that connects to Newfoundland?
A. Confederation Ferry
B. Marine Atlantic
C. Atlantic Spirit
D. Bluewater Ferry
Answer: B. Marine Atlantic

208.
True or False:
Marine Atlantic connects Nova Scotia with Newfoundland and Labrador.
Answer: True

209.
Multiple Choice:
Which Nova Scotia town is home to the Apple Blossom Festival?
A. Kentville
B. Antigonish
C. New Glasgow
D. Dartmouth
Answer: A. Kentville

210.
True or False:
The Apple Blossom Festival celebrates Nova Scotia’s maple syrup production.
Answer: False
(It celebrates the province’s apple-growing industry.)

211.
Multiple Choice:
What body of water borders Nova Scotia to the south?
A. Lake Ontario
B. Gulf of St. Lawrence
C. Bay of Fundy
D. Atlantic Ocean
Answer: D. Atlantic Ocean

212.
True or False:
Nova Scotia is bordered by the Pacific Ocean.
Answer: False
(It is bordered by the Atlantic Ocean.)

213.
Multiple Choice:
Which Nova Scotian is a famous singer-songwriter with international acclaim?
A. Bryan Adams
B. Sarah McLachlan
C. Anne Murray
D. Justin Bieber
Answer: C. Anne Murray

214.
True or False:
Anne Murray was born in Sydney, Nova Scotia.
Answer: False
(She was born in Springhill, Nova Scotia.)

215.
Multiple Choice:
Which Nova Scotia island is home to wild horses and is protected as a national park reserve?
A. Brier Island
B. Sable Island
C. Georges Island
D. Big Tancook Island
Answer: B. Sable Island

216.
True or False:
Sable Island is known for its desert climate.
Answer: False
(It is known for its fog, shipwrecks, and wild horses.)

217.
Multiple Choice:
Who is the current Premier of Nova Scotia? (as of 2025)
A. Tim Houston
B. Stephen McNeil
C. Darrell Dexter
D. Iain Rankin
Answer: A. Tim Houston

218.
True or False:
The Premier of Nova Scotia in 2025 is Tim Houston.
Answer: True

219.
Multiple Choice:
Which political party currently governs Nova Scotia? (as of 2025)
A. Nova Scotia Liberal Party
B. Nova Scotia New Democratic Party (NDP)
C. Progressive Conservative Party of Nova Scotia
D. Green Party of Nova Scotia
Answer: C. Progressive Conservative Party of Nova Scotia

220.
True or False:
The Green Party currently holds the majority in Nova Scotia.
Answer: False
(The Progressive Conservatives hold the majority as of 2025.)

221.
Multiple Choice:
Which Nova Scotian town was known as the “Birthplace of Hockey”?
A. Lunenburg
B. Amherst
C. Windsor
D. Truro
Answer: C. Windsor

222.
True or False:
Windsor, Nova Scotia, is recognized as the birthplace of hockey.
Answer: True

223.
Multiple Choice:
What is Nova Scotia’s provincial tree?
A. White Pine
B. Sugar Maple
C. Red Oak
D. Red Spruce
Answer: D. Red Spruce

224.
True or False:
Nova Scotia’s provincial tree is the Sugar Maple.
Answer: False
(It is the Red Spruce.)

225.
Multiple Choice:
Which island in Nova Scotia is home to a UNESCO Biosphere Reserve and famous hiking trails?
A. Georges Island
B. Cape Sable Island
C. Cape Breton Island
D. Long Island
Answer: C. Cape Breton Island

226.
True or False:
Cape Breton Island is in British Columbia.
Answer: False
(It is located in Nova Scotia.)

227.
Multiple Choice:
Which Nova Scotia town is famous for its tidal bore phenomenon?
A. Pictou
B. Wolfville
C. Truro
D. New Glasgow
Answer: C. Truro

228.
True or False:
A tidal bore occurs when the tide flows backward up a river.
Answer: True

229.
Multiple Choice:
What was the historical name of Halifax before the British renamed it?
A. Port Royal
B. Bedford
C. Chebucto
D. Cornwallis
Answer: C. Chebucto

230.
True or False:
Halifax was originally called Chebucto by the Mi’kmaq people.
Answer: True

231.
Multiple Choice:
Which Nova Scotia museum showcases the province’s maritime history?
A. Museum of Natural History
B. Maritime Museum of the Atlantic
C. Pier 21
D. Halifax History Centre
Answer: B. Maritime Museum of the Atlantic

232.
True or False:
Pier 21 is a military base in Nova Scotia.
Answer: False
(It is a national historic site and immigration museum.)

233.
Multiple Choice:
Which Nova Scotia community is known for its Acadian heritage and Grand-Pré National Historic Site?
A. Annapolis Royal
B. Clare
C. Grand-Pré
D. Yarmouth
Answer: C. Grand-Pré

234.
True or False:
Grand-Pré is a UNESCO World Heritage Site.
Answer: True

235.
Multiple Choice:
Which Nova Scotia town is known as the “Scallop Capital of the World”?
A. Shelburne
B. Digby
C. Lunenburg
D. Truro
Answer: B. Digby

236.
True or False:
Digby is located on Cape Breton Island.
Answer: False
(It is on the mainland side of Nova Scotia.)

237.
Multiple Choice:
Which language is commonly spoken in Acadian communities of Nova Scotia?
A. German
B. Gaelic
C. French
D. Portuguese
Answer: C. French

238.
True or False:
Acadian communities in Nova Scotia speak mostly Italian.
Answer: False
(They primarily speak French.)

239.
Multiple Choice:
What annual event brings international attention to Nova Scotia’s Celtic culture?
A. Halifax Jazz Festival
B. Celtic Colours International Festival
C. Annapolis Valley Balloon Fiesta
D. Lunenburg Folk Harbour Festival
Answer: B. Celtic Colours International Festival

240.
True or False:
The Celtic Colours Festival takes place in Halifax every winter.
Answer: False
(It takes place in Cape Breton in the fall.)

241.
Multiple Choice:
Which Nova Scotian city was once known as “New Scotland”?
A. Halifax
B. Sydney
C. Pictou
D. None — the whole province is “New Scotland”
Answer: D. None — the whole province is “New Scotland”
(Nova Scotia means “New Scotland” in Latin.)

242.
True or False:
Nova Scotia means “New France” in Latin.
Answer: False
(It means “New Scotland.”)

243.
Multiple Choice:
Which is the highest court in Nova Scotia?
A. Nova Scotia Court of Appeal
B. Supreme Court of Canada
C. House of Assembly
D. Family Court
Answer: A. Nova Scotia Court of Appeal

244.
True or False:
The House of Assembly is the highest court in Nova Scotia.
Answer: False
(The House of Assembly is the legislative body, not a court.)

245.
Multiple Choice:
What Nova Scotian town is home to the Fortress of Louisbourg?
A. Sydney
B. Louisbourg
C. Amherst
D. Lunenburg
Answer: B. Louisbourg

246.
True or False:
The Fortress of Louisbourg is a modern prison.
Answer: False
(It is a restored 18th-century French fortress.)

247.
Multiple Choice:
Which Nova Scotia community is known for its German heritage and boat-building tradition?
A. Antigonish
B. Pictou
C. Lunenburg
D. Kentville
Answer: C. Lunenburg

248.
True or False:
Lunenburg was settled mainly by Scottish immigrants.
Answer: False
(It was settled by German and Swiss Protestants.)

249.
Multiple Choice:
What is Nova Scotia’s official tartan used to represent the province?
A. The Maple Leaf Tartan
B. The Nova Scotia Tartan
C. The Highland Green Tartan
D. The Atlantic Blue Tartan
Answer: B. The Nova Scotia Tartan

250.
True or False:
Nova Scotia has no official provincial tartan.
Answer: False
(It does — the Nova Scotia Tartan is official.)

251.
Multiple Choice:
Which industry historically played a central role in shaping Nova Scotia’s economy and culture?
A. Oil refining
B. Shipbuilding
C. Car manufacturing
D. Aerospace
Answer: B. Shipbuilding

252.
True or False:
Nova Scotia’s economy was largely built on shipbuilding and fishing.
Answer: True

253.
Multiple Choice:
Which federal electoral district includes downtown Halifax?
A. Halifax West
B. Sackville—Preston—Chezzetcook
C. Halifax
D. Dartmouth—Cole Harbour
Answer: C. Halifax

254.
True or False:
Dartmouth—Cole Harbour is the only electoral district in Halifax.
Answer: False
(Halifax is one of several federal electoral districts in the HRM.)

255.
Multiple Choice:
Which university in Nova Scotia is known for its Gaelic studies and location in Cape Breton?
A. Saint Mary’s University
B. Acadia University
C. Cape Breton University
D. Dalhousie University
Answer: C. Cape Breton University

256.
True or False:
Cape Breton University is located in Sydney, Nova Scotia.
Answer: True

257.
Multiple Choice:
The Nova Scotia House of Assembly is located in which city?
A. Truro
B. Dartmouth
C. Sydney
D. Halifax
Answer: D. Halifax

258.
True or False:
The Hector ship brought the first German settlers to Nova Scotia.
Answer: False
(It brought Scottish settlers.)

259.
Multiple Choice:
What iconic Nova Scotia lighthouse is a popular tourist attraction?
A. Sambro Island Lighthouse
B. Cape Forchu Lighthouse
C. Peggy’s Cove Lighthouse
D. Brier Island Lighthouse
Answer: C. Peggy’s Cove Lighthouse

260.
True or False:
Peggy’s Cove Lighthouse is located on Cape Breton Island.
Answer: False
(It is located on the mainland, southwest of Halifax.)

261.
Multiple Choice:
Which Nova Scotian region is famous for apple orchards and agricultural richness?
A. Cape Breton
B. South Shore
C. Annapolis Valley
D. Eastern Shore
Answer: C. Annapolis Valley

262.
True or False:
The Annapolis Valley is known primarily for mining.
Answer: False
(It is known for agriculture, especially apple farming.)

263.
Multiple Choice:
Which town in Nova Scotia is nicknamed “The Birthplace of New Scotland”?
A. Truro
B. Pictou
C. Kentville
D. Amherst
Answer: B. Pictou

264.
True or False:
Pictou is where the first French settlers arrived in Nova Scotia.
Answer: False
(It’s known for Scottish immigration, particularly the ship Hector in 1773.)

265.
Multiple Choice:
Which province borders Nova Scotia by land?
A. Newfoundland and Labrador
B. Quebec
C. Prince Edward Island
D. New Brunswick
Answer: D. New Brunswick

266.
True or False:
Nova Scotia shares a land border with Prince Edward Island.
Answer: False
(PEI is connected to the mainland by the Confederation Bridge but does not share a land border.)

267.
Multiple Choice:
What is the approximate population of Nova Scotia (as of 2024 estimates)?
A. 500,000
B. 1 million
C. 2.5 million
D. 4 million
Answer: B. 1 million

268.
Multiple Choice:
Which university in Nova Scotia offers a Bachelor of Education in French Immersion?
A. Saint Mary’s University
B. Université Sainte-Anne
C. Dalhousie University
D. Acadia University
Answer: B. Université Sainte-Anne

269.
Multiple Choice:
Which Nova Scotia national park is known for backcountry camping and Mi’kmaq heritage?
A. Blomidon Provincial Park
B. Kejimkujik National Park
C. Cape Breton Highlands National Park
D. Fundy National Park
Answer: B. Kejimkujik National Park

270.
True or False:
Cape Breton Island is a separate province from Nova Scotia.
Answer: False
(It is a region within Nova Scotia.)

271.
Multiple Choice:
What annual event in Nova Scotia celebrates Celtic music and culture?
A. Halifax Highland Games
B. Cape Breton Celtic Colours Festival
C. Lunenburg Folk Festival
D. Nova Scotia Gaelic Day
Answer: B. Cape Breton Celtic Colours Festival

272.
True or False:
The Celtic Colours Festival is held in Halifax.
Answer: False
(It is held throughout Cape Breton Island.)

273.
Multiple Choice:
Which historic Nova Scotia town is a UNESCO World Heritage Site?
A. Truro
B. Lunenburg
C. Wolfville
D. Yarmouth
Answer: B. Lunenburg

274.
True or False:
Lunenburg is recognized by UNESCO for its well-preserved wooden architecture.
Answer: True

275.
Multiple Choice:
Who is the Lieutenant Governor of Nova Scotia as of 2025?
A. Arthur J. LeBlanc
B. Iain Rankin
C. Barbara Adams
D. Michelle Thompson
Answer: A. Arthur J. LeBlanc

276.
True or False:
The Lieutenant Governor of Nova Scotia is elected by popular vote.
Answer: False
(The Lieutenant Governor is appointed by the Governor General on the Prime Minister’s advice.)

277.
Multiple Choice:
Which Nova Scotian port is known for its strategic importance during both World Wars?
A. Sydney
B. Liverpool
C. Digby
D. Halifax
Answer: D. Halifax

278.
True or False:
Halifax was not involved in any military conflicts.
Answer: False
(Halifax was a major naval base during both World Wars.)

279.
Multiple Choice:
What is the term for the elected legislative body of Nova Scotia?
A. The Senate
B. The Assembly of Nova Scotia
C. The House of Assembly
D. The Legislative Council
Answer: C. The House of Assembly

280.
True or False:
The Nova Scotia House of Assembly is the oldest elected legislature in Canada.
Answer: True

281.
Multiple Choice:
What Nova Scotia-based naval base is one of the largest in Canada?
A. CFB Greenwood
B. CFB Shilo
C. CFB Esquimalt
D. CFB Halifax
Answer: D. CFB Halifax

282.
True or False:
CFB Halifax is a Canadian Army base.
Answer: False
(It is a Royal Canadian Navy base.)

283.
Multiple Choice:
Which Nova Scotian town is famous for the “Digby Scallop Days” festival?
A. Antigonish
B. Bridgewater
C. Digby
D. Truro
Answer: C. Digby

284.
True or False:
The town of Digby is located in Cape Breton.
Answer: False
(It is on the western shore of mainland Nova Scotia.)

285.
Multiple Choice:
Which Nova Scotian community is known for its Mi’kmaq heritage and culture?
A. Mahone Bay
B. Membertou
C. Canning
D. Kentville
Answer: B. Membertou

286.
True or False:
The Mi’kmaq people are one of the Indigenous groups in Nova Scotia.
Answer: True

287.
Multiple Choice:
Which bridge connects Halifax and Dartmouth?
A. Confederation Bridge
B. Angus L. Macdonald Bridge
C. Peace Bridge
D. Ambassador Bridge
Answer: B. Angus L. Macdonald Bridge

288.
True or False:
The Angus L. Macdonald Bridge crosses the Saint John River.
Answer: False
(It crosses Halifax Harbour.)

289.
Multiple Choice:
What is the name of the highest court in Nova Scotia?
A. Supreme Court of Nova Scotia
B. Nova Scotia Provincial Court
C. Court of Queen’s Bench
D. Nova Scotia Small Claims Court
Answer: A. Supreme Court of Nova Scotia

290.
True or False:
The Supreme Court of Nova Scotia hears both civil and criminal cases.
Answer: True

291.
Multiple Choice:
Which Nova Scotia region is known for vineyards and wineries?
A. Eastern Shore
B. Cape Breton
C. Annapolis Valley
D. South Shore
Answer: C. Annapolis Valley

292.
True or False:
The Annapolis Valley produces wine and fruit, especially apples.
Answer: True

293.
Multiple Choice:
Who represents Nova Scotia in the federal Parliament?
A. Senators only
B. Provincial MLAs
C. Members of Parliament (MPs)
D. Mayors
Answer: C. Members of Parliament (MPs)

294.
True or False:
Senators are elected to represent Nova Scotia in Ottawa.
Answer: False
(Senators are appointed, not elected.)

295.
Multiple Choice:
Which Nova Scotia island is home to a protected wild horse population?
A. Brier Island
B. Cape Sable Island
C. Oak Island
D. Sable Island
Answer: D. Sable Island

296.
True or False:
Sable Island is home to a herd of wild horses and is a national park.
Answer: True

297.
Multiple Choice:
What is the name of the elected provincial representative in Nova Scotia’s legislature?
A. Member of Federal Parliament
B. Member of the Legislative Assembly (MLA)
C. Senator
D. Provincial Commissioner
Answer: B. Member of the Legislative Assembly (MLA)

298.
True or False:
Members of the Legislative Assembly (MLAs) are appointed by the Premier.
Answer: False
(They are elected by the public in their constituencies.)

299.
Multiple Choice:
What was the original name given to Nova Scotia by the French?
A. Acadia
B. New France
C. New Scotland
D. New Acadia
Answer: A. Acadia

300.
True or False:
The French settlers in Nova Scotia were known as the Acadians.
Answer: True

301.
Multiple Choice:
Which Nova Scotia event commemorates the explosion that devastated Halifax in 1917?
A. Remembrance Day
B. Halifax Heritage Festival
C. Halifax Explosion Memorial Day
D. National Safety Week
Answer: C. Halifax Explosion Memorial Day

302.
True or False:
The Royal Canadian Navy operates from Halifax.
Answer: True

303.
Multiple Choice:
Which port city in Nova Scotia played a key role in immigration at Pier 21?
A. Sydney
B. Yarmouth
C. Halifax
D. Truro
Answer: C. Halifax

304.
True or False:
Pier 21 in Halifax was once Canada’s busiest immigration port.
Answer: True

305.
Multiple Choice:
What is the name of the Nova Scotia flag’s cross?
A. St. George’s Cross
B. St. Andrew’s Cross
C. St. Patrick’s Cross
D. Cross of Confederation
Answer: B. St. Andrew’s Cross

306.
True or False:
The Nova Scotia flag features a blue saltire on a white background.
Answer: True

307.
Multiple Choice:
Which Nova Scotia university is located in Antigonish?
A. Mount Saint Vincent University
B. Dalhousie University
C. St. Francis Xavier University
D. University of King’s College
Answer: C. St. Francis Xavier University

308.
True or False:
St. Francis Xavier University is in Halifax.
Answer: False
(It is located in Antigonish.)

309.
Multiple Choice:
What Nova Scotia area is known for tides that rise as high as 16 metres?
A. Cape Breton
B. Annapolis Valley
C. Bay of Fundy
D. Eastern Shore
Answer: C. Bay of Fundy

310.
True or False:
The Bay of Fundy is famous for having the world’s highest tides.
Answer: True

311.
Multiple Choice:
Who is the current Premier of Nova Scotia as of 2025?
A. Tim Houston
B. Stephen McNeil
C. Darrell Dexter
D. Iain Rankin
Answer: A. Tim Houston

312.
True or False:
Tim Houston is the leader of the Nova Scotia Liberal Party.
Answer: False
(He is the leader of the Progressive Conservative Party.)

313.
Multiple Choice:
Which Nova Scotia town is home to the Fisheries Museum of the Atlantic?
A. Lunenburg
B. Bridgewater
C. Digby
D. Shelburne
Answer: A. Lunenburg

314.
True or False:
Lunenburg is a UNESCO World Heritage Site.
Answer: True

315.
Multiple Choice:
What is Nova Scotia’s provincial flower?
A. Violet
B. Pitcher Plant
C. Mayflower
D. Lady’s Slipper
Answer: C. Mayflower

316.
True or False:
Nova Scotia’s floral emblem is the trillium.
Answer: False
(The trillium is Ontario’s emblem. Nova Scotia’s is the Mayflower.)

317.
Multiple Choice:
In what year did Nova Scotia join Canadian Confederation?
A. 1865
B. 1867
C. 1871
D. 1873
Answer: B. 1867

318.
True or False:
Nova Scotia was one of the original four provinces to join Confederation.
Answer: True

319.
Multiple Choice:
Which Nova Scotia town is historically linked to Black Loyalist settlement?
A. Amherst
B. Shelburne
C. Wolfville
D. Canso
Answer: B. Shelburne

320.
True or False:
The Black Loyalists were formerly enslaved African Americans who were promised freedom for supporting the British.
Answer: True

321.
Multiple Choice:
Which Nova Scotia island is connected to the mainland by the Canso Causeway?
A. Oak Island
B. Cape Sable Island
C. Cape Breton Island
D. Brier Island
Answer: C. Cape Breton Island

322.
True or False:
Cape Breton Island is an independent province.
Answer: False
(It is part of Nova Scotia.)

323.
Multiple Choice:
What is the highest court in Nova Scotia?
A. Provincial Court
B. Supreme Court of Nova Scotia
C. Court of Appeal
D. Federal Court
Answer: C. Court of Appeal

324.
True or False:
The Supreme Court of Nova Scotia is the same as the Supreme Court of Canada.
Answer: False

325.
Multiple Choice:
What body represents the Indigenous Mi’kmaq people in Nova Scotia?
A. Mi’kmaq Assembly of Nova Scotia
B. Confederacy of Mainland Mi’kmaq
C. Union of Nova Scotia Indians
D. Both B and C
Answer: D. Both B and C

326.
True or False:
The Mi’kmaq people are the original inhabitants of Nova Scotia.
Answer: True

327.
Multiple Choice:
Which ferry connects Nova Scotia to Newfoundland and Labrador?
A. Wood Islands Ferry
B. Northumberland Ferry
C. Digby–Saint John Ferry
D. North Sydney–Port aux Basques Ferry
Answer: D. North Sydney–Port aux Basques Ferry

328.
True or False:
There is no ferry between Nova Scotia and Newfoundland.
Answer: False

329.
Multiple Choice:
Which Nova Scotia artist became internationally known for folk paintings in the 20th century?
A. Alex Colville
B. Emily Carr
C. Maud Lewis
D. Mary Pratt
Answer: C. Maud Lewis

330.
True or False:
Maud Lewis is celebrated for her detailed wildlife sculptures.
Answer: False
(She was known for her folk paintings.)

331.
Multiple Choice:
What is the title of the representative of the King in Nova Scotia?
A. Premier
B. Lieutenant Governor
C. Speaker of the House
D. Attorney General
Answer: B. Lieutenant Governor

332.
True or False:
The Lieutenant Governor signs provincial laws into effect.
Answer: True

333.
Multiple Choice:
Which group of people settled in Grand-Pré and were later deported by the British in 1755?
A. Scots
B. English
C. Acadians
D. Irish
Answer: C. Acadians

334.
True or False:
The Acadian Expulsion happened in the 1900s.
Answer: False
(It occurred in 1755.)

335.
Multiple Choice:
Nova Scotia has how many seats in the House of Commons (as of 2025)?
A. 8
B. 10
C. 11
D. 12
Answer: C. 11

336.
True or False:
Nova Scotia sends senators to the Canadian Senate.
Answer: True

337.
Multiple Choice:
Which Nova Scotia premier introduced universal health care coverage in the province?
A. John Savage
B. Gerald Regan
C. Robert Stanfield
D. Angus L. Macdonald
Answer: C. Robert Stanfield

338.
True or False:
Universal health care was first introduced in Nova Scotia.
Answer: False
(It was first introduced in Saskatchewan.)

339.
Multiple Choice:
What are Nova Scotia’s official languages?
A. English and Mi’kmaq
B. English only
C. English and French
D. French only
Answer: C. English and French

340.
True or False:
French is not used officially in any part of Nova Scotia.
Answer: False
(There are significant Acadian communities where French is widely used.)

341.
Multiple Choice:
Which Nova Scotian military base is home to the Royal Canadian Navy’s Atlantic fleet?
A. CFB Greenwood
B. CFB Halifax
C. CFB Gagetown
D. CFB Truro
Answer: B. CFB Halifax

342.
True or False:
CFB Halifax is the largest Canadian Forces Base on the East Coast.
Answer: True

343.
Multiple Choice:
What is the main economic activity in Yarmouth, Nova Scotia?
A. Mining
B. Technology
C. Fishing and marine industries
D. Oil and gas
Answer: C. Fishing and marine industries

344.
True or False:
Yarmouth is known primarily for gold mining.
Answer: False
(It’s known for its fishing and shipping industry.)

345.
Multiple Choice:
Which Nova Scotia museum preserves the legacy of Black Loyalists?
A. Maritime Museum of the Atlantic
B. Museum of Natural History
C. Black Loyalist Heritage Centre
D. Nova Scotia Archives
Answer: C. Black Loyalist Heritage Centre

346.
True or False:
Black Loyalists were enslaved people who were brought to Nova Scotia by American Loyalists.
Answer: False
(They were formerly enslaved people who fought for the British and were granted freedom and land in Nova Scotia.)

347.
Multiple Choice:
What Nova Scotia region is known for wine production?
A. Cape Breton
B. Annapolis Valley
C. Pictou County
D. Cumberland County
Answer: B. Annapolis Valley

348.
True or False:
Nova Scotia has no wine industry.
Answer: False
(The Annapolis Valley is a growing wine region.)

349.
Multiple Choice:
The Acadian flag used in Nova Scotia includes which of the following?
A. A green shamrock
B. A red maple leaf
C. A yellow star
D. A black cross
Answer: C. A yellow star

350.
True or False:
The Acadian flag has no connection to French heritage.
Answer: False
(It is based on the French tricolour and includes a star symbolizing Mary, patron saint of the Acadians.)

351.
Multiple Choice:
Which Nova Scotian lake supplies drinking water to much of Halifax?
A. Lake Ainslie
B. Chocolate Lake
C. Pockwock Lake
D. Grand Lake
Answer: C. Pockwock Lake

352.
True or False:
Pockwock Lake is used solely for fishing.
Answer: False
(It is a major source of drinking water for Halifax.)

353.
Multiple Choice:
What university in Nova Scotia is Canada’s oldest English-speaking university?
A. Cape Breton University
B. Dalhousie University
C. Acadia University
D. University of King’s College
Answer: D. University of King’s College

354.
True or False:
Dalhousie University is the oldest university in Canada.
Answer: False
(It’s one of the oldest, but University of King’s College holds that title in Nova Scotia.)

355.
Multiple Choice:
Which Nova Scotia site was designated as a UNESCO Biosphere Reserve?
A. Cape Breton Highlands
B. Southwest Nova
C. Annapolis Royal
D. Bay of Fundy
Answer: B. Southwest Nova

356.
True or False:
The entire province of Nova Scotia is a biosphere reserve.
Answer: False
(Only the Southwest Nova region is designated as such.)

357.
Multiple Choice:
Which Nova Scotian community is famous for its brightly painted historic homes and shipbuilding legacy?
A. Dartmouth
B. Amherst
C. Lunenburg
D. Windsor
Answer: C. Lunenburg

358.
True or False:
Lunenburg was never involved in shipbuilding.
Answer: False
(It was one of Canada’s most important shipbuilding towns.)

359.
Multiple Choice:
The “Blue Nose” schooner is associated with which Nova Scotia town?
A. Lunenburg
B. Sydney
C. Yarmouth
D. Kentville
Answer: A. Lunenburg

360.
True or False:
The Bluenose schooner appears on the Canadian quarter.
Answer: True

361.
Multiple Choice:
Which ferry connects Nova Scotia to Prince Edward Island?
A. Bay Ferry
B. Northumberland Ferry
C. Digby Ferry
D. Confederation Bridge
Answer: B. Northumberland Ferry

362.
True or False:
Nova Scotia is not connected to any other province by ferry.
Answer: False
(Ferries connect Nova Scotia to PEI and Newfoundland.)

363.
Multiple Choice:
Which Nova Scotia island is known for its Mi’kmaq heritage and natural beauty?
A. Cape Breton Island
B. McNabs Island
C. Georges Island
D. Sable Island
Answer: A. Cape Breton Island

364.
True or False:
Cape Breton Island is part of Newfoundland.
Answer: False
(It is part of Nova Scotia.)

365.
Multiple Choice:
Which famous Nova Scotian wrote the anthem “Farewell to Nova Scotia”?
A. Stan Rogers
B. Rita MacNeil
C. Anne Murray
D. The author is unknown
Answer: D. The author is unknown

366.
True or False:
“Farewell to Nova Scotia” is recognized as an unofficial anthem of the province.
Answer: True

367.
Multiple Choice:
What does the Latin motto on Nova Scotia’s coat of arms mean?
A. Land of the Blue Sea
B. One people, one nation
C. From the Sea, Wealth
D. Loyalty to the Crown
Answer: C. From the Sea, Wealth

368.
True or False:
Nova Scotia’s motto is in French.
Answer: False
(It’s in Latin.)

369.
Multiple Choice:
What is the name of Nova Scotia’s provincial electoral districts?
A. Counties
B. Provinces
C. Ridings
D. Wards
Answer: C. Ridings

370.
True or False:
Each riding in Nova Scotia elects a Member of the Legislative Assembly.
Answer: True

371.
Multiple Choice:
What historic fortress is located near Sydney, Nova Scotia?
A. Fortress of Halifax
B. Citadel of Nova Scotia
C. Fortress of Louisbourg
D. Annapolis Royal Fort
Answer: C. Fortress of Louisbourg

372.
True or False:
The Fortress of Louisbourg is a reconstruction of an 18th-century French fort.
Answer: True

373.
Multiple Choice:
Which sport has a strong cultural tradition in Nova Scotia’s Scottish communities?
A. Baseball
B. Highland Games
C. Lacrosse
D. Curling
Answer: B. Highland Games

374.
True or False:
The Highland Games are unique to Nova Scotia.
Answer: False
(They are held in various provinces but have strong roots in Nova Scotia.)

375.
Multiple Choice:
Which Nova Scotian town is known as the “Birthplace of Hockey”?
A. Sydney
B. Lunenburg
C. Windsor
D. Antigonish
Answer: C. Windsor

376.
True or False:
Hockey originated in Windsor, Nova Scotia.
Answer: True

377.
Multiple Choice:
Which provincial park in Nova Scotia is famous for its tides and fossils?
A. Cape Split Provincial Park
B. Kejimkujik National Park
C. Joggins Fossil Cliffs
D. Blomidon Provincial Park
Answer: C. Joggins Fossil Cliffs

378.
True or False:
Joggins Fossil Cliffs is a UNESCO World Heritage Site.
Answer: True

379.
Multiple Choice:
What is the largest ethnic group of Nova Scotia’s population?
A. Mi’kmaq
B. Scottish
C. Acadian
D. Irish
Answer: B. Scottish

380.
True or False:
Nova Scotia was named for its French heritage.
Answer: False
(Nova Scotia means “New Scotland” in Latin.)

381.
Multiple Choice:
What is the highest elected political office in Nova Scotia?
A. Premier
B. Lieutenant Governor
C. Mayor
D. Speaker of the House
Answer: A. Premier

382.
True or False:
The Premier is appointed by the Lieutenant Governor.
Answer: True
(Formally appointed after winning the confidence of the legislative assembly.)

383.
Multiple Choice:
What Nova Scotia town was once the capital of Acadia?
A. Halifax
B. Yarmouth
C. Annapolis Royal
D. Lunenburg
Answer: C. Annapolis Royal

384.
True or False:
Annapolis Royal was the original French settlement in Canada.
Answer: True

385.
Multiple Choice:
Nova Scotia’s first official language is:
A. Mi’kmaq
B. French
C. English
D. Gaelic
Answer: C. English

386.
True or False:
Nova Scotia has two official languages.
Answer: False
(English is the only official language, though French and Mi’kmaq are widely spoken in some communities.)

387.
Multiple Choice:
Which Nova Scotian community is a center of Acadian culture and history?
A. Chéticamp
B. Antigonish
C. Amherst
D. Shelburne
Answer: A. Chéticamp

388.
True or False:
Acadians in Nova Scotia were deported during the Great Expulsion (Le Grand Dérangement).
Answer: True

389.
Multiple Choice:
What natural disaster occurred in Halifax in 1917?
A. Earthquake
B. The Halifax Explosion
C. Hurricane Fiona
D. Major Flood
Answer: B. The Halifax Explosion

390.
True or False:
The Halifax Explosion was caused by a fire in the port.
Answer: False
(It was caused by the collision of two ships, one carrying explosives.)

391.
Multiple Choice:
What region of Nova Scotia is famous for shipbuilding and fisheries?
A. Annapolis Valley
B. Eastern Shore
C. South Shore
D. Cumberland Plateau
Answer: C. South Shore

392.
True or False:
The South Shore of Nova Scotia is inland and has no access to the ocean.
Answer: False
(It’s a coastal region central to the fishing industry.)

393.
Multiple Choice:
What does “Mi’kma’ki” refer to?
A. A city in Nova Scotia
B. A provincial law
C. The traditional territory of the Mi’kmaq people
D. An Acadian dish
Answer: C. The traditional territory of the Mi’kmaq people

394.
True or False:
Mi’kma’ki only refers to Cape Breton Island.
Answer: False
(It refers to a large territory including most of Atlantic Canada.)

395.
Multiple Choice:
What Nova Scotia lake is one of the province’s largest freshwater lakes?
A. Lake Ainslie
B. Pockwock Lake
C. Bras d’Or Lake
D. Grand Lake
Answer: C. Bras d’Or Lake

396.
True or False:
Bras d’Or Lake is actually a saltwater lake.
Answer: True

397.
Multiple Choice:
Which famous Canadian Prime Minister was born in Nova Scotia?
A. John A. Macdonald
B. Robert Borden
C. William Lyon Mackenzie King
D. Lester B. Pearson
Answer: B. Robert Borden

398.
True or False:
Robert Borden served as Prime Minister during World War I.
Answer: True

399.
Multiple Choice:
What does the name “Nova Scotia” mean?
A. Land of Plenty
B. New Land
C. New Scotland
D. Eastern Seaboard
Answer: C. New Scotland

400.
True or False:
Nova Scotia’s heritage is primarily rooted in Spanish traditions.
Answer: False
(Nova Scotia’s heritage is primarily Scottish, Acadian, and Mi’kmaq.)
 
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


        $this->command->info("Parsed " . count($questions) . " questions for Nova Scotia.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $novaScotia->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Nova Scotia citizenship questions.");
    }
}

