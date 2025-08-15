<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewfoundlandandLabradorQuestionsSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $newfoundlandAndLabrador = CourseSection::firstOrCreate(
            ['title' => 'Newfoundland and Labrador'],
            [
                'type' => 'province',
                'capital' => 'St. John\'s',
                'flag' => '/images/flags/newfoundland-and-labrador.png',
                'description' => 'Questions specific to Newfoundland and Labrador.',
                'summary_audio_url' => '/audio/summary_newfoundland_labrador.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $newfoundlandAndLabrador->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
Which natural resource is important to Newfoundland and Labrador’s economy?
A. Cotton
B. Natural gas
C. Diamonds
D. Oil
Answer: D. Oil

2.
Multiple Choice:
What is the capital city of Newfoundland and Labrador?
A. Corner Brook
B. Gander
C. St. John’s
D. Labrador City
Answer: C. St. John’s

3.
True or False:
Newfoundland and Labrador was one of the four original provinces that formed Confederation in 1867.
Answer: False
(Newfoundland and Labrador joined Canada in 1949.)

4.
Multiple Choice:
Which industry historically played the biggest role in Newfoundland and Labrador’s economy?
A. Gold mining
B. Oil production
C. Fishing
D. Logging
Answer: C. Fishing

5.
True or False:
The cod fishery collapse in the early 1990s had little impact on Newfoundland and Labrador.
Answer: False
(The cod fishery collapse caused a major economic crisis in the province.)

6.
Multiple Choice:
Which ocean surrounds Newfoundland and Labrador?
A. Pacific Ocean
B. Indian Ocean
C. Atlantic Ocean
D. Arctic Ocean
Answer: C. Atlantic Ocean

7.
True or False:
Labrador is located on the island of Newfoundland.
Answer: False
(Labrador is the mainland portion of the province.)

8.
Multiple Choice:
Which people were the original inhabitants of Newfoundland and Labrador?
A. Inuit and Beothuk
B. Cree and Mohawk
C. Métis and Innu
D. Mi’kmaq and Haida
Answer: A. Inuit and Beothuk

9.
True or False:
The Beothuk people are now extinct.
Answer: True
(The last known Beothuk person, Shanawdithit, died in 1829.)

10.
Multiple Choice:
Who was the famous Norse explorer who likely landed in Newfoundland around the year 1000 AD?
A. Jacques Cartier
B. John Cabot
C. Leif Erikson
D. Samuel de Champlain
Answer: C. Leif Erikson

11.
True or False:
The Norse settlement of L’Anse aux Meadows is a UNESCO World Heritage Site.
Answer: True
(The archaeological site is a designated UNESCO World Heritage Site.)

12.
Multiple Choice:
When did Newfoundland and Labrador officially join Canada?
A. 1867
B. 1905
C. 1949
D. 1982
Answer: C. 1949

13.
True or False:
Newfoundland and Labrador was the last province to join Confederation.
Answer: True
(The province was the last of the ten provinces to join Canada.)

14.
Multiple Choice:
Which natural resource is a key part of Newfoundland and Labrador’s offshore economy today?
A. Coal
B. Oil and gas
C. Diamonds
D. Potash
Answer: B. Oil and gas

15.
True or False:
Hydroelectricity is an important energy source in Newfoundland and Labrador.
Answer: True
(Hydroelectric projects like Churchill Falls are major sources of power.)

16.
Multiple Choice:
Which island is part of Newfoundland and Labrador?
A. Baffin Island
B. Prince Edward Island
C. Vancouver Island
D. Fogo Island
Answer: D. Fogo Island

17.
True or False:
Fogo Island is known for its modern architectural and tourism development.
Answer: True
(Fogo Island is internationally known for its unique modern architecture and art scene.)

18.
Multiple Choice:
What is the name of the indigenous people primarily living in northern Labrador?
A. Mohawk
B. Inuit
C. Cree
D. Dene
Answer: B. Inuit

19.
True or False:
The Innu and Inuit are both recognized Indigenous groups in Labrador.
Answer: True
(Both the Innu and Inuit are distinct Indigenous peoples with communities in Labrador.)

20.
Multiple Choice:
Which of the following is a provincial symbol of Newfoundland and Labrador?
A. Blue Jay
B. Pitcher Plant
C. Trillium
D. Maple Leaf
Answer: B. Pitcher Plant

21.
True or False:
The official provincial bird is the Atlantic Puffin.
Answer: True
(The Atlantic Puffin is a popular symbol and the provincial bird.)

22.
Multiple Choice:
What is the provincial legislature of Newfoundland and Labrador called?
A. House of Assembly
B. Legislative Council
C. Provincial Parliament
D. General Assembly
Answer: A. House of Assembly

23.
True or False:
The House of Assembly in Newfoundland and Labrador is located in Corner Brook.
Answer: False
(The House of Assembly is located in St. John's, the provincial capital.)

24.
Multiple Choice:
Who represents the King in Newfoundland and Labrador at the provincial level?
A. The Premier
B. The Chief Justice
C. The Lieutenant Governor
D. The Speaker of the House
Answer: C. The Lieutenant Governor

25.
True or False:
The Lieutenant Governor of Newfoundland and Labrador is appointed by the provincial Premier.
Answer: False
(The Lieutenant Governor is appointed by the Governor General of Canada on the advice of the Prime Minister.)

26.
Multiple Choice:
As of 2025, who is the Premier of Newfoundland and Labrador?
A. Blaine Higgs
B. Andrew Furey
C. Tim Houston
D. Wab Kinew
Answer: B. Andrew Furey

27.
True or False:
Andrew Furey leads the Progressive Conservative Party of Newfoundland and Labrador.
Answer: False
(He is the leader of the Liberal Party.)

28.
Multiple Choice:
Which political party is currently in power in Newfoundland and Labrador (as of 2025)?
A. Liberal Party
B. New Democratic Party
C. Green Party
D. Conservative Party
Answer: A. Liberal Party

29.
True or False:
St. John’s is Canada’s oldest city.
Answer: True
(St. John's is considered the oldest English-founded city in North America.)

30.
Multiple Choice:
Which province shares a land border with Labrador?
A. New Brunswick
B. Quebec
C. Nova Scotia
D. Ontario
Answer: B. Quebec

31.
True or False:
Labrador shares a border with Nova Scotia.
Answer: False
(Labrador shares a border with Quebec, not Nova Scotia.)

32.
Multiple Choice:
What is the official language of Newfoundland and Labrador?
A. English
B. French
C. Inuktitut
D. Both English and French
Answer: A. English

33.
True or False:
Inuit and Innu languages are still spoken in parts of Labrador.
Answer: True
(These Indigenous languages are still an important part of the culture in Labrador.)

34.
Multiple Choice:
Which traditional musical instrument is commonly associated with Newfoundland culture?
A. Banjo
B. Accordion
C. Violin
D. Trumpet
Answer: B. Accordion

35.
True or False:
Kitchen parties and traditional music are an important part of Newfoundland’s cultural heritage.
Answer: True
(These gatherings are a popular and long-standing tradition.)

36.
Multiple Choice:
What is the name of the official flower of Newfoundland and Labrador?
A. Prairie Crocus
B. Lady’s Slipper
C. Pitcher Plant
D. Mountain Laurel
Answer: C. Pitcher Plant

37.
True or False:
The provincial flower of Newfoundland and Labrador is the Maple Leaf.
Answer: False
(The Maple Leaf is Canada's national symbol.)

38.
Multiple Choice:
What is the name of the provincial ferry service that connects Newfoundland and Labrador to the rest of Canada?
A. Atlantic Ferries
B. NorthLink
C. Marine Atlantic
D. Coastal Transport
Answer: C. Marine Atlantic

39.
True or False:
You can drive directly from Ontario to the island of Newfoundland.
Answer: False
(You must take a ferry to get to the island.)

40.
Multiple Choice:
Which national park is located in Newfoundland and recognized as a UNESCO World Heritage Site?
A. Gros Morne National Park
B. Banff National Park
C. Terra Nova National Park
D. Cape Breton Highlands
Answer: A. Gros Morne National Park

41.
True or False:
Gros Morne National Park is known for its ancient fjords and unique geology.
Answer: True
(The park is famous for its dramatic fjords and the Tablelands, where the Earth's mantle is exposed.)

42.
Multiple Choice:
Which cultural group greatly influenced the dialects spoken in rural Newfoundland?
A. Dutch settlers
B. Irish and West Country English settlers
C. German immigrants
D. Métis traders
Answer: B. Irish and West Country English settlers

43.
True or False:
Newfoundland English includes many phrases and accents of Irish origin.
Answer: True
(The dialect has strong influences from Irish and English settlers.)

44.
Multiple Choice:
Which of the following industries is NOT a major contributor to Newfoundland and Labrador’s economy?
A. Tourism
B. Aerospace
C. Oil and gas
D. Fisheries
Answer: B. Aerospace

45.
True or False:
Tourism is growing in Newfoundland and Labrador, especially due to natural beauty and history.
Answer: True
(Gros Morne National Park and St. John's are popular tourist destinations.)

46.
Multiple Choice:
What was the name of the referendum through which Newfoundland decided to join Canada?
A. Atlantic Union Referendum
B. Dominion Referendum
C. Newfoundland Confederation Referendum
D. Labrador Alliance Vote
Answer: C. Newfoundland Confederation Referendum

47.
True or False:
Newfoundland joined Canada without any public vote.
Answer: False
(The decision was made after a public referendum in 1948.)

48.
Multiple Choice:
Which famous Newfoundland ship is commemorated in song and history?
A. HMS Victory
B. SS Atlantic
C. SS Caribou
D. RMS Titanic
Answer: C. SS Caribou

49.
True or False:
The SS Caribou was sunk during World War II by a German U-boat.
Answer: True
(The ferry was a victim of a German U-boat attack in 1942.)

50.
Multiple Choice:
Which town is known as the easternmost point in North America?
A. Gander
B. Bonavista
C. Cape Spear
D. L’Anse-au-Loup
Answer: C. Cape Spear

51.
True or False:
Cape Spear is the westernmost tip of Newfoundland.
Answer: False
(It is the easternmost point in North America.)

52.
Multiple Choice:
Which explorer is credited with being the first European to land in Newfoundland around 1000 AD?
A. Christopher Columbus
B. Jacques Cartier
C. John Cabot
D. Leif Erikson
Answer: D. Leif Erikson

53.
True or False:
Leif Erikson, a Norse explorer, landed in what is now Newfoundland around the year 1000.
Answer: True
(The Viking settlement at L'Anse aux Meadows confirms this.)

54.
Multiple Choice:
Which site in Newfoundland is a UNESCO World Heritage Site linked to Viking exploration?
A. Cape St. Mary’s
B. L’Anse aux Meadows
C. Signal Hill
D. Red Bay
Answer: B. L’Anse aux Meadows

55.
True or False:
L’Anse aux Meadows proves the French were the first to explore Newfoundland.
Answer: False
(It provides evidence of the Norse (Vikings) arriving centuries before the French.)

56.
Multiple Choice:
When did Newfoundland join Canada as a province?
A. 1867
B. 1880
C. 1905
D. 1949
Answer: D. 1949

57.
True or False:
Newfoundland and Labrador became the 10th province of Canada in 1949.
Answer: True
(It was the final province to join Confederation.)

58.
Multiple Choice:
What is the term for traditional Newfoundland storytelling and folk singing?
A. Chanting
B. Recitations
C. Madrigals
D. Hymnals
Answer: B. Recitations

59.
True or False:
“Recitations” in Newfoundland are performed as part of cultural celebrations and often humorous.
Answer: True
(This form of spoken-word poetry is a popular part of the province's culture.)

60.
Multiple Choice:
Which Canadian airport played a major role during 9/11 when flights were diverted?
A. Halifax Stanfield
B. Deer Lake
C. Gander International Airport
D. Goose Bay Airport
Answer: C. Gander International Airport

61.
True or False:
Gander hosted thousands of stranded passengers on 9/11 and is known for its hospitality.
Answer: True
(The town's kindness is the subject of the famous musical *Come From Away*.)

62.
Multiple Choice:
Which group forms part of the Indigenous population in Labrador?
A. Mi’kmaq
B. Métis
C. Cree
D. Innu
Answer: D. Innu

63.
True or False:
The Innu and Inuit communities primarily live in urban areas of St. John’s.
Answer: False
(They primarily live in communities in the Labrador region.)

64.
Multiple Choice:
Which traditional fishery has long been the backbone of Newfoundland’s economy?
A. Lobster
B. Cod
C. Halibut
D. Mackerel
Answer: B. Cod

65.
True or False:
The cod fishery was once so abundant it shaped Newfoundland’s entire economy.
Answer: True
(The cod fishery was the primary economic activity for centuries.)

66.
Multiple Choice:
Why was a moratorium placed on cod fishing in the 1990s?
A. Trade agreements
B. Overfishing and stock collapse
C. Pollution
D. Union strikes
Answer: B. Overfishing and stock collapse

67.
True or False:
The cod fishing ban helped the population recover within two years.
Answer: False
(The cod stock has been slow to recover since the 1992 moratorium.)

68.
Multiple Choice:
Which of the following is a common traditional Newfoundland food?
A. Tourtière
B. Pea soup
C. Jigg’s dinner
D. Bannock
Answer: C. Jigg’s dinner

69.
True or False:
Jigg’s dinner includes salted beef and vegetables boiled together.
Answer: True
(This is a classic traditional meal in Newfoundland.)

70.
Multiple Choice:
Which Canadian region is known for unique sayings like “stay where you’re to ‘til I comes where you’re at”?
A. Quebec
B. Alberta
C. Newfoundland and Labrador
D. Prince Edward Island
Answer: C. Newfoundland and Labrador

71.
True or False:
Newfoundland English includes expressions and idioms that are unique in Canada.
Answer: True
(The province's unique dialect is a result of its history of isolation.)

72.
Multiple Choice:
The capital city, St. John’s, overlooks which body of water?
A. Hudson Bay
B. Bay of Fundy
C. Atlantic Ocean
D. Labrador Sea
Answer: C. Atlantic Ocean

73.
True or False:
St. John’s is located on the Pacific coast of Canada.
Answer: False
(It is located on the Atlantic coast of Canada.)

74.
Multiple Choice:
Which historic site in St. John’s commemorates the defense of the harbor?
A. Cape Spear
B. Signal Hill
C. Battle Harbour
D. Cabot Tower
Answer: B. Signal Hill

75.
True or False:
Signal Hill is where Marconi received the first transatlantic wireless signal.
Answer: True
(Guglielmo Marconi received the first transatlantic wireless signal there in 1901.)

76.
Multiple Choice:
Which ethnic groups significantly influenced Newfoundland culture?
A. German and Dutch
B. Irish and English
C. Scottish and Ukrainian
D. Acadian and Inuit
Answer: B. Irish and English

77.
True or False:
The Irish influence can be heard in Newfoundland music, dance, and accents.
Answer: True
(The culture has strong ties to the Irish and English immigrants who settled there.)

78.
Multiple Choice:
What natural resource is vital to Newfoundland’s offshore economy today?
A. Timber
B. Wheat
C. Oil
D. Coal
Answer: C. Oil

79.
True or False:
Offshore oil rigs are a major employer in Newfoundland and Labrador.
Answer: True
(The offshore oil industry is a significant source of employment and revenue.)

80.
Multiple Choice:
What is a “Come From Away” in Newfoundland slang?
A. A tourist or outsider
B. A politician
C. A returning local
D. A sea captain
Answer: A. A tourist or outsider

81.
True or False:
Newfoundlanders use the term “Come From Away” for anyone not born there.
Answer: True
(It is a common colloquial term for people who are not from the province.)

82.
Multiple Choice:
What is the name of the Indigenous people who live in coastal communities across northern Labrador?
A. Innu
B. Inuit
C. Cree
D. Dene
Answer: B. Inuit

83.
True or False:
The Inuit in Labrador are represented by the Nunatsiavut Government.
Answer: True
(The Nunatsiavut Government is a self-governing body for the Labrador Inuit.)

84.
Multiple Choice:
Which area in Newfoundland is known for icebergs and whale watching?
A. Bonavista
B. Gros Morne
C. Twillingate
D. Happy Valley
Answer: C. Twillingate

85.
True or False:
Twillingate is often referred to as the “Iceberg Capital of the World.”
Answer: True
(The town is a popular destination for viewing icebergs.)

86.
Multiple Choice:
Which of the following is the oldest city in North America?
A. New York
B. Boston
C. St. John’s
D. Montreal
Answer: C. St. John’s

87.
True or False:
St. John’s, Newfoundland, is one of the oldest European settlements in North America.
Answer: True
(It is considered the oldest English-founded city in North America.)

88.
Multiple Choice:
Which island off Newfoundland is famous for its French-speaking residents and proximity to France?
A. Fogo Island
B. Bell Island
C. Saint-Pierre and Miquelon
D. Change Islands
Answer: C. Saint-Pierre and Miquelon

89.
True or False:
Saint-Pierre and Miquelon is a French overseas territory near Newfoundland.
Answer: True
(The islands remain a part of France.)

90.
Multiple Choice:
What is the governing political party in Newfoundland and Labrador as of 2025?
A. Progressive Conservative Party
B. Liberal Party
C. New Democratic Party
D. Green Party
Answer: B. Liberal Party

91.
True or False:
As of 2025, the Premier of Newfoundland and Labrador is from the Liberal Party.
Answer: True
(Andrew Furey is the leader of the Liberal Party.)

92.
Multiple Choice:
Which bay is a major feature along the west coast of Newfoundland?
A. Conception Bay
B. Bonavista Bay
C. Placentia Bay
D. Bay of Islands
Answer: D. Bay of Islands

93.
True or False:
Bay of Islands is located on Newfoundland’s east coast.
Answer: False
(It is a large fjord system on the western coast of the island.)

94.
Multiple Choice:
Which historical conflict involved the British and French over Newfoundland?
A. Seven Years’ War
B. Boer War
C. American Revolution
D. Napoleonic Wars
Answer: A. Seven Years’ War

95.
True or False:
The Seven Years’ War influenced control over Newfoundland between Britain and France.
Answer: True
(The British victory in the war cemented their control over the island.)

96.
Multiple Choice:
What is the name of Newfoundland’s large national park and UNESCO site?
A. Terra Nova National Park
B. Bay du Nord
C. Torngat Mountains National Park
D. Gros Morne National Park
Answer: D. Gros Morne National Park

97.
True or False:
Gros Morne National Park is located on the Avalon Peninsula.
Answer: False
(It is located on the west coast of Newfoundland.)

98.
Multiple Choice:
Which of the following is a nickname often used to refer to people from Newfoundland?
A. Highlanders
B. Mainlanders
C. Newfies
D. Bluenosers
Answer: C. Newfies

99.
True or False:
Hurricane is a major disaster which struck Newfoundland in 1929?
Answer: False
(A major tsunami, caused by an earthquake, struck in 1929.)

100.
Multiple Choice:
Which major natural disaster struck Newfoundland in 1929?
A. Earthquake
B. Tsunami
C. Hurricane
D. Blizzard
Answer: B. Tsunami

101.
True or False:
A tsunami caused by an underwater earthquake struck Newfoundland’s Burin Peninsula in 1929.
Answer: True
(The event caused significant damage and loss of life.)

102.
Multiple Choice:
Which one is regarded as the provincial flower of Newfoundland and Labrador?
A. Wild Rose
B. Purple Violet
C. Pitcher Plant
D. Trillium
Answer: C. Pitcher Plant

103.
True or False:
The Trillium is the provincial flower of Newfoundland and Labrador.
Answer: False
(The Trillium is the floral emblem of Ontario and Quebec.)

104.
Multiple Choice:
Which town is known for its connection to the 1919 transatlantic flight by Alcock and Brown?
A. Gander
B. St. Anthony
C. Stephenville
D. St. John’s
Answer: D. St. John’s

105.
True or False:
Gander, Newfoundland, played a major role in early transatlantic aviation.
Answer: True
(Gander was a crucial refueling stop for transatlantic flights during the early and mid-20th century.)

106.
Multiple Choice:
Which industry historically dominated Newfoundland and Labrador’s economy?
A. Oil and Gas
B. Tourism
C. Fishing
D. Mining
Answer: C. Fishing

107.
True or False:
Newfoundland’s economy has never been dependent on fishing.
Answer: False
(The economy was heavily dependent on the cod fishery for centuries.)

108.
Multiple Choice:
What year did Newfoundland join Canada as a province?
A. 1867
B. 1873
C. 1905
D. 1949
Answer: D. 1949

109.
True or False:
Newfoundland joined Canada in 1949, becoming the tenth province.
Answer: True
(It was the last of the ten provinces to join Confederation.)

110.
Multiple Choice:
Which ethnic group has a significant presence in Labrador?
A. Métis
B. Cree
C. Mohawk
D. Mi’kmaq
Answer: A. Métis

111.
True or False:
The Métis people in Labrador are recognized for their unique culture.
Answer: True
(The Labrador Métis have a distinct culture and are represented by the NunatuKavut Community Council.)

112.
Multiple Choice:
Which weather phenomenon is common in Newfoundland’s maritime climate?
A. Dust storms
B. Tornadoes
C. Heavy fog
D. Drought
Answer: C. Heavy fog

113.
True or False:
Newfoundland experiences hot, dry summers with little fog.
Answer: False
(The province often experiences cool, humid summers with frequent fog along the coast.)

114.
Multiple Choice:
Which festival in Newfoundland celebrates traditional music and culture?
A. Winterlude
B. George Street Festival
C. Caribana
D. Stampede Days
Answer: B. George Street Festival

115.
True or False:
George Street Festival is held in Halifax.
Answer: False
(It is a major music festival held in St. John's.)

116.
Multiple Choice:
Which geographic feature separates Newfoundland from Labrador?
A. Hudson Bay
B. Cabot Strait
C. Strait of Belle Isle
D. Gulf of St. Lawrence
Answer: C. Strait of Belle Isle

117.
True or False:
The Strait of Belle Isle lies between Newfoundland and Prince Edward Island.
Answer: False
(The Strait of Belle Isle separates the island of Newfoundland from the mainland of Labrador.)

118.
Multiple Choice:
Which major Canadian airline originated from Gander’s role in aviation history?
A. Porter Airlines
B. WestJet
C. Air Canada
D. Trans-Canada Air Lines
Answer: C. Air Canada

119.
True or False:
Gander’s importance declined after the jet age began.
Answer: True
(With the introduction of long-range jets, planes no longer needed to refuel in Gander.)

120.
True or False:
Strait of Belle Isle separates Newfoundland from Labrador?
Answer: True
(The strait is the channel of water between the island and the mainland.)

121.
True or False:
Andrew Furey leads the Progressive Conservative Party.
Answer: False
(He is the leader of the Liberal Party.)

122.
Multiple Choice:
What is the name of the national park located on the west coast of Newfoundland?
A. Terra Nova National Park
B. Cape Breton Highlands
C. Gros Morne National Park
D. Fundy National Park
Answer: C. Gros Morne National Park

123.
True or False:
Gros Morne National Park is a UNESCO World Heritage Site.
Answer: True
(It was designated a UNESCO site for its unique geology and natural features.)

124.
Multiple Choice:
Which European explorer landed on Newfoundland’s coast around 1000 AD?
A. Jacques Cartier
B. Leif Erikson
C. Christopher Columbus
D. Samuel de Champlain
Answer: B. Leif Erikson

125.
True or False:
Leif Erikson established a Norse settlement at L’Anse aux Meadows.
Answer: True
(Archaeological findings confirm the presence of a Norse settlement at the site.)

126.
Multiple Choice:
Which historic event involved the crash landing of the Hindenburg over Newfoundland?
A. 1930
B. 1941
C. None – it never landed in Newfoundland
D. 1926
Answer: C. None – it never landed in Newfoundland

127.
True or False:
The Hindenburg airship made regular stops in Gander.
Answer: False
(The Hindenburg disaster happened in New Jersey, and Gander was not a major hub for airships.)

128.
Multiple Choice:
What resource is increasingly important to Newfoundland and Labrador’s economy?
A. Cotton
B. Natural gas
C. Diamonds
D. Oil
Answer: D. Oil

129.
True or False:
The Hibernia Oil Field is located off Newfoundland’s coast.
Answer: True
(It is one of the largest offshore oil fields in North America.)

130.
Multiple Choice:
What is the House of Assembly in Newfoundland and Labrador?
A. The provincial courthouse
B. The official residence of the Premier
C. The provincial legislature
D. The federal Parliament
Answer: C. The provincial legislature

131.
True or False:
Newfoundland’s House of Assembly is in Halifax.
Answer: False
(It is located in St. John's, the provincial capital.)

132.
Multiple Choice:
What animal is prominently featured in Newfoundland’s natural environment?
A. Elk
B. Caribou
C. Moose
D. Buffalo
Answer: C. Moose

133.
True or False:
Moose are native to Newfoundland.
Answer: False
(Moose were introduced to the island in the early 20th century.)

134.
Multiple Choice:
Which Indigenous group is primarily found in Labrador?
A. Haida
B. Inuit
C. Cree
D. Anishinaabe
Answer: B. Inuit

135.
True or False:
Inuit communities live in the Torngat Mountains region.
Answer: True
(The Torngat Mountains National Park is in the traditional territory of the Inuit.)

136.
Multiple Choice:
What is the capital of Newfoundland and Labrador?
A. Gander
B. Happy Valley-Goose Bay
C. Corner Brook
D. St. John’s
Answer: D. St. John’s

137.
True or False:
Corner Brook is the capital of Newfoundland and Labrador.
Answer: False
(St. John's is the capital.)

138.
Multiple Choice:
What is Signal Hill in St. John’s known for?
A. Whale watching
B. Radio transmission history
C. Viking remains
D. Mining heritage
Answer: B. Radio transmission history

139.
True or False:
The first transatlantic wireless signal was received at Signal Hill.
Answer: True
(Guglielmo Marconi received the signal in 1901.)

140.
Multiple Choice:
Which Canadian province has the most easterly point in North America?
A. Nova Scotia
B. Newfoundland and Labrador
C. Quebec
D. Prince Edward Island
Answer: B. Newfoundland and Labrador

141.
True or False:
Nunatsiavut Agreement is the name of the Indigenous land claim settlement in Labrador?
Answer: True
(The agreement established a self-governing Inuit region in northern Labrador.)

142.
Multiple Choice:
Which major conflict involved Newfoundland as a separate Dominion before joining Canada?
A. Second Boer War
B. Korean War
C. Second World War
D. Vietnam War
Answer: C. Second World War

143.
True or False:
Newfoundland was part of Canada during World War I.
Answer: False
(Newfoundland was a separate Dominion during both World Wars.)

144.
Multiple Choice:
What is the name of the Indigenous land claim settlement in Labrador?
A. Nunavut Agreement
B. Innu Nation Treaty
C. Nunatsiavut Agreement
D. Cree-Naskapi Act
Answer: C. Nunatsiavut Agreement

145.
True or False:
Nunatsiavut is a self-governing region in Labrador.
Answer: True
(It is the self-governing region of the Labrador Inuit.)

146.
Multiple Choice:
Which large island off the northeast coast is part of Newfoundland and Labrador?
A. Baffin Island
B. Fogo Island
C. Anticosti Island
D. Manitoulin Island
Answer: B. Fogo Island

147.
True or False:
Fogo Island is located in Nova Scotia.
Answer: False
(Fogo Island is located off the coast of Newfoundland.)

148.
Multiple Choice:
What major natural event severely impacted Newfoundland in 1929?
A. Earthquake
B. Landslide
C. Tsunami
D. Blizzard
Answer: C. Tsunami

149.
True or False:
The 1929 tsunami was triggered by an undersea earthquake near the Grand Banks.
Answer: True
(The earthquake caused a massive tsunami that devastated the Burin Peninsula.)

150.
Multiple Choice:
What term describes traditional Newfoundland music and storytelling?
A. Ballads
B. Sea shanties
C. Oral traditions
D. All of the above
Answer: D. All of the above

151.
True or False:
Newfoundland has a rich tradition of Irish and Scottish-influenced music.
Answer: True
(The traditional music often features instruments like the accordion and fiddle.)

152.
Multiple Choice:
What is the most common heritage of Newfoundland’s early European settlers?
A. German
B. Dutch
C. Irish and English
D. Spanish
Answer: C. Irish and English

153.
True or False:
Most early settlers in Newfoundland spoke French.
Answer: False
(The majority of settlers were of English and Irish descent.)

154.
Multiple Choice:
What body of water surrounds most of Newfoundland and Labrador?
A. Hudson Bay
B. Atlantic Ocean
C. Pacific Ocean
D. Gulf of Mexico
Answer: B. Atlantic Ocean

155.
True or False:
The Atlantic Ocean plays a major role in the province’s economy and culture.
Answer: True
(The ocean is central to the province's history, economy, and way of life.)

156.
Multiple Choice:
Which term best describes Newfoundland and Labrador’s role in the fishing industry?
A. Minor exporter
B. Inland supplier
C. Historic and modern seafood hub
D. Exclusive importer
Answer: C. Historic and modern seafood hub

157.
True or False:
Cod fishing is no longer practiced at all in Newfoundland.
Answer: False
(A small, regulated cod fishery still operates.)

158.
Multiple Choice:
Which historic transatlantic flight that landed in Newfoundland in 1919?
A. Spirit of St. Louis
B. Amelia Earhart’s solo flight
C. Alcock and Brown flight
D. Apollo 11
Answer: C. Alcock and Brown flight

159.
True or False:
Alcock and Brown landed their aircraft in St. John’s.
Answer: False
(They took off from St. John's and landed in Ireland.)

160.
Multiple Choice:
Which area in Newfoundland is famous for iceberg viewing?
A. Bay of Fundy
B. Bonavista Bay
C. Iceberg Alley
D. Saint Lawrence River
Answer: C. Iceberg Alley

161.
True or False:
Icebergs are rarely seen near Newfoundland.
Answer: False
(The coast is a world-renowned destination for viewing icebergs in the spring and early summer.)

162.
Multiple Choice:
Which Canadian province was the last to join Confederation in 1949?
A. Prince Edward Island
B. Newfoundland and Labrador
C. Alberta
D. Saskatchewan
Answer: B. Newfoundland and Labrador

163.
True or False:
Newfoundland joined Canada before Alberta.
Answer: False
(Alberta and Saskatchewan joined in 1905, while Newfoundland joined in 1949.)

164.
Multiple Choice:
Which natural feature is associated with the Tablelands in Gros Morne National Park?
A. Glaciers
B. Limestone caves
C. Exposed Earth’s mantle
D. Volcanic lava tubes
Answer: C. Exposed Earth’s mantle

165.
True or False:
The Tablelands are part of the Appalachian Mountains.
Answer: True
(The Long Range Mountains, which include the Tablelands, are the northernmost part of the Appalachian chain.)

166.
Multiple Choice:
Which town is a key hub for offshore oil operations in Newfoundland?
A. St. Anthony
B. Clarenville
C. Marystown
D. St. John’s
Answer: D. St. John’s

167.
True or False:
Marystown is home to major offshore oil platforms.
Answer: False
(Marystown has shipbuilding facilities, but the platforms are located offshore.)

168.
Multiple Choice:
Who represents the Crown in Newfoundland and Labrador at the provincial level?
A. The Prime Minister
B. The Premier
C. The Lieutenant Governor
D. The Speaker
Answer: C. The Lieutenant Governor

169.
True or False:
The Lieutenant Governor is elected by citizens.
Answer: False
(The Lieutenant Governor is appointed, not elected.)

170.
Multiple Choice:
Which term describes the people native to Labrador with Inuit ancestry?
A. Métis
B. Cree
C. Innu
D. Nunatsiavut Inuit
Answer: D. Nunatsiavut Inuit

171.
True or False:
The Innu and Inuit are the same group.
Answer: False
(They are two distinct Indigenous peoples with different languages and cultures.)

172.
Multiple Choice:
Which economic activity is most historically associated with Newfoundland?
A. Wheat farming
B. Shipbuilding
C. Fishing
D. Logging
Answer: C. Fishing

173.
True or False:
Newfoundland’s early economy was based on gold mining.
Answer: False
(It was based on the cod fishery.)

174.
Multiple Choice:
Which important transatlantic facility is located in Gander, Newfoundland?
A. Space Center
B. Submarine Port
C. International Airport
D. Oil Refinery
Answer: C. International Airport

175.
True or False:
Gander International Airport was once a major refueling stop for international flights.
Answer: True
(Its location made it a crucial hub for transatlantic air travel before the jet age.)

176.
Multiple Choice:
Which island is the main landmass of the province?
A. Cape Breton
B. Newfoundland
C. Baffin Island
D. Vancouver Island
Answer: B. Newfoundland

177.
True or False:
The capital city of Newfoundland and Labrador is on the island portion.
Answer: True
(St. John's is located on the island of Newfoundland.)

178.
Multiple Choice:
Which ocean current affects the climate of Newfoundland and Labrador?
A. Gulf Stream
B. Labrador Current
C. Pacific Drift
D. Alaska Current
Answer: B. Labrador Current

179.
True or False:
The Labrador Current brings cold water to the coast of Newfoundland.
Answer: True
(This cold current is responsible for the icebergs and heavy fog.)

180.
Multiple Choice:
Which Newfoundland-born singer-songwriter gained international fame?
A. Celine Dion
B. Alan Doyle
C. Shania Twain
D. Bryan Adams
Answer: B. Alan Doyle

181.
True or False:
Alan Doyle is a member of the band Great Big Sea.
Answer: True
(He is the lead singer of the popular Newfoundland folk-rock band.)

182.
Multiple Choice:
Which treaty confirmed British control of Newfoundland in 1713?
A. Treaty of Tordesillas
B. Treaty of Paris
C. Treaty of Utrecht
D. Treaty of Ghent
Answer: C. Treaty of Utrecht

183.
True or False:
The Treaty of Versailles gave control of Newfoundland to France.
Answer: False
(The Treaty of Utrecht gave control to Britain.)

184.
Multiple Choice:
Which geographic feature separates Labrador from Quebec?
A. Churchill River
B. Atlantic Ocean
C. Strait of Belle Isle
D. Saint Lawrence River
Answer: C. Strait of Belle Isle

185.
True or False:
Labrador is located west of Quebec.
Answer: False
(Labrador is located to the east of Quebec.)

186.
Multiple Choice:
Which Labrador town is known for its mining industry?
A. Nain
B. Goose Bay
C. Labrador City
D. Cartwright
Answer: C. Labrador City

187.
True or False:
Goose Bay is a major hub for mining operations in Labrador.
Answer: False
(Goose Bay is known for its military base, CFB Goose Bay.)

188.
Multiple Choice:
Which bay is known for its large tides and borders part of Labrador?
A. Bay of Fundy
B. Ungava Bay
C. Hudson Bay
D. Notre Dame Bay
Answer: B. Ungava Bay

189.
True or False:
Ungava Bay lies to the north of Labrador.
Answer: True
(It is located at the northern tip of Quebec, bordering Labrador.)

190.
Multiple Choice:
In what year did Newfoundland become a self-governing Dominion?
A. 1867
B. 1907
C. 1919
D. 1949
Answer: B. 1907

191.
True or False:
Newfoundland was self-governing before joining Canada.
Answer: True
(It was a Dominion within the British Empire from 1907 to 1934, and again from 1949.)

192.
Multiple Choice:
What is the term for the act of joining Newfoundland to Canada?
A. Unification
B. Confederation
C. Merger
D. Amalgamation
Answer: B. Confederation

193.
True or False:
Labrador voted against joining Canada in 1949.
Answer: False
(Labrador voted overwhelmingly in favour of joining Canada.)

194.
Multiple Choice:
Which key hydroelectric project is located in Labrador?
A. James Bay Project
B. Churchill Falls Project
C. Muskrat Falls Project
D. Nelson River Project
Answer: B. Churchill Falls Project

195.
True or False:
Churchill Falls generates electricity shared with Quebec.
Answer: True
(A large portion of the power generated is sold to Quebec under a long-term contract.)

196.
Multiple Choice:
Which festival celebrates Newfoundland’s musical heritage?
A. Iceberg Festival
B. George Street Festival
C. Celtic Colours
D. Folk on the Rock
Answer: B. George Street Festival

197.
True or False:
The George Street Festival is held in Gander.
Answer: False
(It is held in St. John's.)

198.
Multiple Choice:
Which Newfoundland location is known for ancient fossil beds?
A. Red Bay
B. Signal Hill
C. Mistaken Point
D. Gros Morne
Answer: C. Mistaken Point

199.
True or False:
Mistaken Point is a UNESCO World Heritage Site.
Answer: True
(It was designated for its collection of Ediacaran fossils.)

200.
Multiple Choice:
Which group primarily inhabits Nunatsiavut?
A. Métis
B. Inuit
C. Innu
D. Mi’kmaq
Answer: B. Inuit

201.
True or False:
Nunatsiavut gained self-government in 2005.
Answer: True
(The land claims agreement came into effect in 2005.)

202.
Multiple Choice:
Which prominent explorer is believed to have landed in Newfoundland around the year 1000?
A. Jacques Cartier
B. Samuel de Champlain
C. Leif Erikson
D. John Cabot
Answer: C. Leif Erikson

203.
True or False:
Leif Erikson was an English explorer.
Answer: False
(He was a Norse explorer.)

204.
Multiple Choice:
Which group first established settlements in Newfoundland around 5000 years ago?
A. Vikings
B. Beothuk
C. Inuit
D. Dorset
Answer: D. Dorset

205.
True or False:
The Beothuk were the earliest known inhabitants of Newfoundland.
Answer: False
(The Dorset people and other cultures lived on the island long before the Beothuk.)

206.
Multiple Choice:
The Confederation Building in St. John’s serves what purpose?
A. University campus
B. Parliament of Canada
C. Provincial government headquarters
D. Supreme Court of Canada
Answer: C. Provincial government headquarters

207.
True or False:
The Confederation Building is located in Corner Brook.
Answer: False
(It is located in St. John's.)

208.
Multiple Choice:
Which is a traditional Newfoundland musical instrument?
A. Banjo
B. Accordion
C. Violin
D. Drums
Answer: B. Accordion

209.
True or False:
The fiddle is also common in traditional Newfoundland music.
Answer: True
(Both the accordion and fiddle are popular in Newfoundland folk music.)

210.
Multiple Choice:
What is the name of Newfoundland’s own time zone?
A. Atlantic Standard Time
B. Labrador Time
C. Newfoundland Standard Time
D. Maritime Time
Answer: C. Newfoundland Standard Time

211.
True or False:
Newfoundland is 30 minutes ahead of Atlantic Standard Time.
Answer: True
(The province has its own unique time zone.)

212.
Multiple Choice:
Which international event brought attention to Gander in 2001?
A. World Expo
B. 9/11 emergency landings
C. FIFA World Cup
D. NATO Summit
Answer: B. 9/11 emergency landings

213.
True or False:
Over 30 planes were diverted to Gander on 9/11.
Answer: True
(This event is the basis for the musical *Come From Away*.)

214.
True or False:
St. John’s has representation in the House of Commons.
Answer: True
(The city is part of federal electoral districts that elect Members of Parliament.)

215.
Multiple Choice:
What is the provincial flower of Newfoundland and Labrador?
A. Pitcher Plant
B. Iris
C. Lady’s Slipper
D. Lupin
Answer: A. Pitcher Plant

216.
True or False:
The Pitcher Plant is native to wetlands in Newfoundland.
Answer: True
(It is a carnivorous plant found in the province's bogs and fens.)

217.
Multiple Choice:
Which Newfoundland city is home to Memorial University?
A. Gander
B. Corner Brook
C. Mount Pearl
D. St. John’s
Answer: D. St. John’s

218.
True or False:
Memorial University is the only university in the province.
Answer: True
(It is the sole university in Newfoundland and Labrador.)

219.
Multiple Choice:
Which type of boat is a cultural icon of Newfoundland’s fishing heritage?
A. Ferry
B. Longboat
C. Dory
D. Schooner
Answer: C. Dory

220.
True or False:
Dories were commonly used by offshore trawlers.
Answer: True
(They were used by fishermen from a larger boat to fish in smaller areas.)

221.
Multiple Choice:
What is the name of the Indigenous territory that gained autonomy in 2005?
A. Nunavut
B. Innu Nation
C. Nunavik
D. Nunatsiavut
Answer: D. Nunatsiavut

222.
True or False:
Nunatsiavut is governed by the Canadian federal government only.
Answer: False
(It is a self-governing region for the Labrador Inuit.)

223.
Multiple Choice:
Which resource has historically driven Newfoundland’s economy?
A. Gold
B. Lumber
C. Fishing
D. Diamonds
Answer: C. Fishing

224.
True or False:
Fishing was the only major economic activity in Newfoundland’s early history.
Answer: False
(Other industries, like mining and forestry, also contributed to the economy.)

225.
Multiple Choice:
Who was the first Premier of Newfoundland and Labrador after it joined Canada in 1949?
A. Brian Tobin
B. Danny Williams
C. Joseph Smallwood
D. Clyde Wells
Answer: C. Joseph Smallwood

226.
True or False:
Joseph Smallwood is known as the “Father of Confederation” for Newfoundland.
Answer: True
(He was a key figure in the campaign to join Canada.)

227.
Multiple Choice:
What is the name of the island located off the southern coast of Newfoundland that remains part of France?
A. Sable Island
B. Saint-Pierre and Miquelon
C. Anticosti Island
D. Baffin Island
Answer: B. Saint-Pierre and Miquelon

228.
True or False:
Saint-Pierre and Miquelon are part of the Canadian province of Newfoundland and Labrador.
Answer: False
(They are a French overseas territory.)

229.
Multiple Choice:
The Labrador region borders which province?
A. Nova Scotia
B. Prince Edward Island
C. Quebec
D. Ontario
Answer: C. Quebec

230.
True or False:
Labrador is a separate province from Newfoundland.
Answer: False
(They form a single province, Newfoundland and Labrador.)

231.
Multiple Choice:
Which industry has seen growth in Labrador in recent decades?
A. Oil refining
B. Agriculture
C. Diamond cutting
D. Mining and hydroelectric power
Answer: D. Mining and hydroelectric power

232.
True or False:
Labrador is known for its large urban cities.
Answer: False
(Labrador is sparsely populated, with a few small to medium-sized communities.)

233.
Multiple Choice:
Which indigenous group is primarily living in Labrador?
A. Mi’kmaq
B. Cree
C. Inuit
D. Mohawk
Answer: C. Inuit

234.
True or False:
The Innu are another Indigenous group in Labrador.
Answer: True
(The Innu Nation has communities in central and northern Labrador.)

235.
Multiple Choice:
Which type of government does Newfoundland and Labrador have?
A. Republic
B. Unicameral Parliamentary Democracy
C. Military Junta
D. Direct Democracy
Answer: B. Unicameral Parliamentary Democracy

236.
True or False:
The provincial legislature has two chambers.
Answer: False
(The House of Assembly is a single-chamber, or unicameral, legislature.)

237.
Multiple Choice:
The current Lieutenant Governor of Newfoundland and Labrador represents whom?
A. The Premier
B. The Prime Minister
C. The Monarch of Canada
D. The Supreme Court
Answer: C. The Monarch of Canada

238.
True or False:
The Lieutenant Governor is elected by citizens.
Answer: False
(The Lieutenant Governor is appointed.)

239.
Multiple Choice:
Which of the following is a well-known hiking destination in Newfoundland?
A. Bruce Trail
B. Signal Hill
C. Skyline Trail
D. East Coast Trail
Answer: D. East Coast Trail

240.
True or False:
Signal Hill overlooks the city of Corner Brook.
Answer: False
(Signal Hill overlooks St. John's.)

241.
Multiple Choice:
Which Newfoundland tradition involves dressing in disguise during the holidays?
A. Mummering
B. Wassailing
C. Screech-In
D. Fiddling
Answer: A. Mummering

242.
True or False:
Mummering is illegal in Newfoundland.
Answer: False
(It is a celebrated cultural tradition.)

243.
Multiple Choice:
Which body of water lies to the east of Newfoundland?
A. Pacific Ocean
B. Hudson Bay
C. Gulf of St. Lawrence
D. Atlantic Ocean
Answer: D. Atlantic Ocean

244.
True or False:
Newfoundland is located on the Pacific coast of Canada.
Answer: False
(It is located on the Atlantic coast.)

245.
Multiple Choice:
Which ferry service connects Newfoundland to mainland Canada?
A. BC Ferries
B. Marine Atlantic
C. Atlantic Ferries
D. Labrador Transit
Answer: B. Marine Atlantic

246.
True or False:
There is a bridge connecting Newfoundland to the mainland.
Answer: False
(There is no bridge; travel is by ferry or air.)

247.
Multiple Choice:
Which of these languages has a historical presence in Newfoundland and Labrador?
A. French
B. Irish Gaelic
C. English
D. All of the above
Answer: D. All of the above

248.
True or False:
Only English is spoken in Newfoundland’s history.
Answer: False
(French and Irish Gaelic were also spoken by early settlers.)

249.
Multiple Choice:
Which famous wireless signal was received at Signal Hill in 1901?
A. SOS
B. Radio Canada broadcast
C. The first transatlantic wireless signal
D. Morse code test signal
Answer: C. The first transatlantic wireless signal

250.
True or False:
The first transatlantic telephone call was received in Newfoundland.
Answer: False
(It was the first wireless telegraphic signal, not a telephone call.)

251.
Multiple Choice:
Which protected national historic site in Newfoundland marks early Viking exploration?
A. Fort Anne
B. Fortress Louisbourg
C. L’Anse aux Meadows
D. Port Royal
Answer: C. L’Anse aux Meadows

252.
True or False:
L’Anse aux Meadows provides evidence of Norse settlement in North America.
Answer: True
(It is the only confirmed Viking settlement site in North America.)

253.
Multiple Choice:
Which festival celebrates music and culture in St. John’s each summer?
A. Regatta Festival
B. Folk Festival
C. Harbourfront Celebration
D. Maritime Days
Answer: B. Folk Festival

254.
True or False:
The Regatta Festival in St. John’s is primarily a winter event.
Answer: False
(It is a rowing regatta held in the summer.)

255.
Multiple Choice:
Newfoundland and Labrador joined Canada in which year?
A. 1867
B. 1873
C. 1949
D. 1982
Answer: C. 1949

256.
True or False:
Newfoundland was one of the original four provinces of Canada.
Answer: False
(The original four provinces were Ontario, Quebec, New Brunswick, and Nova Scotia.)

257.
Multiple Choice:
The nickname for people born in Newfoundland and Labrador is:
A. Canucks
B. Maritimers
C. Newfies
D. Islanders
Answer: C. Newfies

258.
True or False:
The term “Newfie” is always considered respectful.
Answer: False
(While often used affectionately by locals, it can be considered offensive by some.)

259.
Multiple Choice:
Which province is located closest to Newfoundland and Labrador?
A. Nova Scotia
B. Quebec
C. Prince Edward Island
D. Manitoba
Answer: B. Quebec

260.
True or False:
Prince Edward Island shares a land border with Labrador.
Answer: False
(Labrador shares a land border with Quebec.)

261.
Multiple Choice:
Which natural phenomenon is commonly seen in Labrador?
A. Tornadoes
B. Northern Lights (Aurora Borealis)
C. Hurricanes
D. Earthquakes
Answer: B. Northern Lights (Aurora Borealis)

262.
True or False:
Northern Lights are only visible from the western provinces.
Answer: False
(They are visible in northern regions across Canada, including Labrador.)

263.
Multiple Choice:
What is the major airport serving St. John’s, Newfoundland?
A. St. John Airport
B. Gander International Airport
C. St. John’s International Airport
D. Avalon Regional Airport
Answer: C. St. John’s International Airport

264.
True or False:
St. John’s International Airport is located in Labrador.
Answer: False
(It is located on the island of Newfoundland.)

265.
Multiple Choice:
Which of the following best describes the climate of Labrador?
A. Tropical
B. Desert
C. Arctic and subarctic
D. Mediterranean
Answer: C. Arctic and subarctic

266.
True or False:
Labrador has a tropical rainforest climate.
Answer: False
(Labrador has a subarctic and arctic climate.)

267.
Multiple Choice:
Who was the Prime Minister of Canada when Newfoundland joined Confederation in 1949?
A. John A. Macdonald
B. Louis St. Laurent
C. William Lyon Mackenzie King
D. Lester B. Pearson
Answer: B. Louis St. Laurent

268.
True or False:
William Lyon Mackenzie King was the Prime Minister when Newfoundland joined Canada.
Answer: False
(Louis St. Laurent was the Prime Minister at the time.)

269.
Multiple Choice:
Which popular Newfoundland musical has been featured on Broadway?
A. Rock of the Rock
B. Come From Away
C. The East Coast Chronicles
D. St. John’s Tales
Answer: B. Come From Away

270.
True or False:
Come From Away is a story about the events after September 11, 2001, in Gander, Newfoundland.
Answer: True
(The musical is about the stranded airline passengers who were welcomed into the town.)

271.
Multiple Choice:
The provincial bird of Newfoundland and Labrador is the:
A. Puffin
B. Loon
C. Eagle
D. Seagull
Answer: A. Puffin

272.
True or False:
The loon is the official bird of Newfoundland and Labrador.
Answer: False
(The Atlantic Puffin is the official provincial bird.)

273.
Multiple Choice:
Which of the following resources has historically driven Newfoundland’s economy?
A. Coal mining
B. Forestry
C. Fishing
D. Diamond mining
Answer: C. Fishing

274.
True or False:
Newfoundland’s economy was primarily built on gold mining.
Answer: False
(The economy was historically based on fishing.)

275.
Multiple Choice:
Which Canadian forces base is located in Goose Bay, Labrador?
A. CFB Halifax
B. CFB Gander
C. CFB Goose Bay
D. CFB St. John’s
Answer: C. CFB Goose Bay

276.
True or False:
CFB Goose Bay is a Canadian military base located in Labrador.
Answer: True
(It is a major air force base in the region.)

277.
Multiple Choice:
Which indigenous group is primarily associated with central Labrador?
A. Métis
B. Innu Nation
C. Haida
D. Cree
Answer: B. Innu Nation

278.
True or False:
The Innu people are native to central Labrador.
Answer: True
(The Innu Nation has communities in central Labrador, such as Sheshatshiu.)

279.
Multiple Choice:
Which province has the shortest ferry connection to Newfoundland?
A. Nova Scotia
B. New Brunswick
C. Quebec
D. Prince Edward Island
Answer: A. Nova Scotia

280.
True or False:
Nova Scotia is connected to Newfoundland by road.
Answer: False
(The connection is made by ferry.)

281.
Multiple Choice:
The Newfoundland and Labrador House of Assembly is located in:
A. Corner Brook
B. Gander
C. St. John’s
D. Happy Valley-Goose Bay
Answer: C. St. John’s

282.
True or False:
Labrador City is home to the Newfoundland legislature.
Answer: False
(The legislature is in St. John's.)

283.
Multiple Choice:
Which of the following describes the House of Assembly of Newfoundland and Labrador?
A. Bicameral legislature
B. Unicameral legislature
C. Senate-led body
D. Crown Council
Answer: B. Unicameral legislature

284.
True or False:
Newfoundland and Labrador has a bicameral legislature.
Answer: False
(It is a single-chamber, or unicameral, legislature.)

285.
Multiple Choice:
Which of the following natural disasters has significantly impacted Newfoundland’s history?
A. Earthquakes
B. Tsunamis
C. Hurricanes
D. Snowstorms and shipwrecks
Answer: D. Snowstorms and shipwrecks

286.
True or False:
Newfoundland is frequently impacted by tropical cyclones.
Answer: False
(While it can be affected by the remnants of hurricanes, it is not a frequent occurrence.)

287.
Multiple Choice:
Which Newfoundland and Labrador town is known for being the easternmost point in North America?
A. Bonavista
B. Gander
C. St. John’s
D. Cape Spear
Answer: D. Cape Spear

288.
True or False:
Cape Spear is the westernmost point in Canada.
Answer: False
(It is the easternmost point in North America.)

289.
Multiple Choice:
Who is the Lieutenant Governor of Newfoundland and Labrador as of 2025?
A. Judy Foote
B. Mary Simon
C. Frank Fagan
D. Joan Marie Aylward
Answer: D. Joan Marie Aylward

290.
True or False:
Joan Marie Aylward is the current Lieutenant Governor of Newfoundland and Labrador.
Answer: True
(She was appointed in 2024.)

291.
Multiple Choice:
Which of the following is a major export from Newfoundland and Labrador?
A. Bananas
B. Seafood
C. Timber
D. Electronics
Answer: B. Seafood

292.
True or False:
Newfoundland and Labrador exports large quantities of tropical fruit.
Answer: False
(The climate is not suitable for growing tropical fruit.)

293.
Multiple Choice:
Which organization represents Innu communities in Labrador?
A. Nunatsiavut Government
B. Innu Nation
C. Labrador Assembly
D. Inuit Council
Answer: B. Innu Nation

294.
True or False:
The Innu Nation represents Métis communities in Labrador.
Answer: False
(The NunatuKavut Community Council represents the Labrador Métis.)

295.
Multiple Choice:
Which former Premier of Newfoundland and Labrador also served as a federal cabinet minister?
A. Danny Williams
B. Clyde Wells
C. Brian Tobin
D. Joey Smallwood
Answer: C. Brian Tobin

296.
True or False:
Brian Tobin served both as Premier and as a federal cabinet minister.
Answer: True
(He was a prominent figure in both provincial and federal politics.)

297.
Multiple Choice:
What is the term used to describe someone from Newfoundland?
A. Newfoundler
B. Newfie (colloquial)
C. Newfoundlandian
D. Atlantican
Answer: B. Newfie (colloquial)

298.
True or False:
“Newfie” is the official term for someone from Newfoundland.
Answer: False
(It is an informal, colloquial term.)

299.
Multiple Choice:
The discovery of oil fields off the coast of Newfoundland greatly impacted which area?
A. Bay of Fundy
B. Hibernia
C. Fogo Island
D. Strait of Belle Isle
Answer: B. Hibernia

300.
True or False:
The Hibernia oil field is located in Alberta.
Answer: False
(It is located offshore of Newfoundland.)

301.
Multiple Choice:
Which area in Newfoundland is a UNESCO World Heritage Site due to Viking settlement remains?
A. Signal Hill
B. Gander
C. L’Anse aux Meadows
D. Bonavista
Answer: C. L’Anse aux Meadows

302.
True or False:
L’Anse aux Meadows is a Viking settlement site recognized by UNESCO.
Answer: True
(It is the only confirmed Viking settlement site in North America.)

303.
Multiple Choice:
Which Newfoundland town played a key role during the transatlantic aviation era?
A. Clarenville
B. Gander
C. Placentia
D. Stephenville
Answer: B. Gander

304.
True or False:
Gander was once one of the busiest airports in the world during the early days of transatlantic flights.
Answer: True
(It was a crucial refueling stop during and after World War II.)

305.
Multiple Choice:
Which bay in Newfoundland and Labrador is known for iceberg viewing?
A. Hudson Bay
B. Trinity Bay
C. Iceberg Alley (off the coast)
D. Bay of Fundy
Answer: C. Iceberg Alley (off the coast)

306.
True or False:
Iceberg Alley refers to a shipping route in British Columbia.
Answer: False
(It is the coastline of Newfoundland and Labrador where icebergs are commonly seen.)

307.
Multiple Choice:
Which indigenous group in Labrador is represented by the Nunatsiavut Government?
A. Cree
B. Innu
C. Inuit
D. Mi’kmaq
Answer: C. Inuit

308.
True or False:
The Nunatsiavut Government represents the Inuit of northern Labrador.
Answer: True
(It is a self-governing body for the Labrador Inuit.)

309.
Multiple Choice:
Which large island is part of Newfoundland and Labrador?
A. Baffin Island
B. Vancouver Island
C. Newfoundland Island
D. Ellesmere Island
Answer: C. Newfoundland Island

310.
True or False:
Newfoundland and Labrador includes one island and one mainland region.
Answer: True
(The province consists of the island of Newfoundland and the mainland of Labrador.)

311.
Multiple Choice:
Which community in Newfoundland and Labrador was famously resettled during government relocation programs?
A. Gaultois
B. St. Anthony
C. Grand Bruit
D. Channel-Port aux Basques
Answer: C. Grand Bruit

312.
True or False:
Grand Bruit is one of the communities resettled by the provincial government.
Answer: True
(The community was resettled in 2010.)

313.
Multiple Choice:
Which federal electoral district includes St. John’s?
A. Avalon
B. Labrador
C. St. John’s East or St. John’s South–Mount Pearl
D. Signal Hill
Answer: C. St. John’s East or St. John’s South–Mount Pearl

314.
True or False:
St. John’s has no representation in the House of Commons.
Answer: False
(The city is represented by two Members of Parliament.)

315.
Multiple Choice:
What does the term “outport” mean in Newfoundland?
A. Inland settlement
B. Urban area
C. Rural coastal community
D. Fishing port in British Columbia
Answer: C. Rural coastal community

316.
True or False:
An outport refers to a major city in Newfoundland.
Answer: False
(Outports are small, often isolated coastal villages.)

317.
Multiple Choice:
Which Newfoundland artist is internationally recognized for her folk music?
A. Celine Dion
B. Shania Twain
C. Amelia Curran
D. Anne Murray
Answer: C. Amelia Curran

318.
True or False:
Amelia Curran is a Canadian singer-songwriter from Newfoundland and Labrador.
Answer: True
(She is a Juno Award-winning artist from St. John's.)

319.
Multiple Choice:
What is the minimum age to vote in a Newfoundland and Labrador provincial election?
A. 16
B. 17
C. 18
D. 21
Answer: C. 18

320.
True or False:
You can vote at age 16 in a provincial election in Newfoundland and Labrador.
Answer: False
(The voting age is 18.)

321.
Multiple Choice:
Which year did Newfoundland and Labrador adopt its current name officially?
A. 1949
B. 1982
C. 2001
D. 2015
Answer: C. 2001

322.
True or False:
The province’s name was officially changed to “Newfoundland and Labrador” in 2001.
Answer: True
(The name was changed to recognize the equal status of both regions.)

323.
Multiple Choice:
Which major historical event brought a large American military presence to Newfoundland?
A. The Gulf War
B. World War I
C. World War II
D. The Korean War
Answer: C. World War II

324.
True or False:
The United States built military bases in Newfoundland during World War II.
Answer: True
(American bases were established in Argentia, St. John's, and Gander.)

325.
Multiple Choice:
What is the significance of Joey Smallwood in Newfoundland history?
A. First Premier of Newfoundland and Labrador
B. Founder of Labrador City
C. The first federal MP from Newfoundland
D. Creator of the Confederation Bridge
Answer: A. First Premier of Newfoundland and Labrador

326.
True or False:
Joey Smallwood played a major role in Newfoundland joining Confederation.
Answer: True
(He was a strong advocate for the province joining Canada.)

327.
Multiple Choice:
Which of the following natural resources is NOT major in Newfoundland and Labrador?
A. Fish
B. Oil
C. Wheat
D. Minerals
Answer: C. Wheat

328.
True or False:
Wheat is a primary crop grown in Newfoundland and Labrador.
Answer: False
(The climate and soil are not suitable for large-scale wheat farming.)

329.
Multiple Choice:
What is the term used for the unique time zone in Newfoundland?
A. Atlantic Time
B. Labrador Standard Time
C. Newfoundland Standard Time
D. Maritime Time
Answer: C. Newfoundland Standard Time

330.
True or False:
Newfoundland is in the same time zone as Toronto.
Answer: False
(Newfoundland is in its own time zone, 30 minutes ahead of Atlantic Time.)

331.
Multiple Choice:
Which one is among the longest river in Newfoundland and Labrador?
A. Exploits River
B. Churchill River
C. Humber River
D. Gander River
Answer: B. Churchill River

332.
True or False:
Andrew Furey is the Premier of Newfoundland and Labrador in 2025.
Answer: True
(He has been Premier since 2020.)

333.
Multiple Choice:
Which political party is currently governing Newfoundland and Labrador?
A. Progressive Conservative
B. Liberal Party
C. New Democratic Party
D. Green Party
Answer: B. Liberal Party

334.
True or False:
The NDP is currently in power in Newfoundland and Labrador.
Answer: False
(The Liberal Party is in power.)

335.
Multiple Choice:
Which town is home to the College of the North Atlantic’s main campus?
A. St. John’s
B. Corner Brook
C. Gander
D. Stephenville
Answer: D. Stephenville

336.
True or False:
Stephenville is home to the largest university in Newfoundland.
Answer: False
(The main campus of Memorial University is in St. John's.)

337.
Multiple Choice:
What is the longest river in Newfoundland and Labrador?
A. Exploits River
B. Churchill River
C. Humber River
D. Gander River
Answer: B. Churchill River

338.
True or False:
The Churchill River is located in Newfoundland.
Answer: False
(The Churchill River is in Labrador.)

339.
Multiple Choice:
What is the purpose of the Muskrat Falls project in Labrador?
A. Oil refining
B. Gold mining
C. Hydro power generation
D. Tourism development
Answer: C. Hydro power generation

340.
True or False:
The Muskrat Falls project generates hydroelectric power in Labrador.
Answer: True
(It is a major hydroelectric project on the Churchill River.)

341.
Multiple Choice:
Which island in Newfoundland is known for its artistic community and striking landscapes?
A. Fogo Island
B. Random Island
C. Bell Island
D. Glover Island
Answer: A. Fogo Island

342.
True or False:
Fogo Island is known for oil production.
Answer: False
(Fogo Island is known for its art scene, tourism, and traditional outport life.)

343.
Multiple Choice:
Which organization provides ferry services to remote Newfoundland and Labrador communities?
A. Via Rail Canada
B. Newfoundland Coastal Services
C. Marine Atlantic
D. Labrador Transport Company
Answer: C. Marine Atlantic

344.
True or False:
Marine Atlantic connects Newfoundland to Nova Scotia by ferry.
Answer: True
(This is the main ferry service for travel between the province and mainland Canada.)

345.
Multiple Choice:
Which island lies off the east coast of Newfoundland and is known for its French heritage?
A. Saint-Pierre and Miquelon
B. Bell Island
C. Change Islands
D. Twillingate
Answer: A. Saint-Pierre and Miquelon

346.
True or False:
Saint-Pierre and Miquelon is a French overseas territory.
Answer: True
(These islands are a part of France, not Canada.)

347.
Multiple Choice:
What is the name of Newfoundland and Labrador’s legislative assembly?
A. House of Commons
B. Newfoundland Assembly
C. House of Assembly
D. Provincial Senate
Answer: C. House of Assembly

348.
True or False:
The House of Assembly is the provincial legislature of Newfoundland and Labrador.
Answer: True
(It is the seat of the provincial government.)

349.
Multiple Choice:
Who is the current Lieutenant Governor of Newfoundland and Labrador as of 2025?
A. Judy Foote
B. Mary Simon
C. Andrew Furey
D. Frank Fagan
Answer: D. Frank Fagan

350.
True or False:
Judy Foote serves as the federal Governor General of Canada.
Answer: False
(The Governor General is Mary Simon. Judy Foote was a former Lieutenant Governor.)

351.
Multiple Choice:
Which Newfoundland town is famous for its iceberg viewing?
A. Gander
B. Bonavista
C. Twillingate
D. Stephenville
Answer: C. Twillingate

352.
True or False:
Twillingate is known for whale watching and icebergs.
Answer: True
(The town is a popular destination for both of these activities.)

353.
Multiple Choice:
What role does Signal Hill in St. John’s play in history?
A. Site of Confederation talks
B. Location of first transatlantic wireless signal
C. Capital of Newfoundland
D. Home of a federal prison
Answer: B. Location of first transatlantic wireless signal

354.
True or False:
Signal Hill is a national historic site.
Answer: True
(It is a historic landmark with military and communications significance.)

355.
Multiple Choice:
Which indigenous group primarily inhabits Labrador?
A. Haida
B. Inuit
C. Cree
D. Dene
Answer: B. Inuit

356.
True or False:
The Inuit have traditionally lived in Labrador.
Answer: True
(The Inuit have a long history of living in the coastal regions of Labrador.)

357.
Multiple Choice:
What is the province’s economic development agency?
A. Newfoundland Enterprise Fund
B. NL Innovation Hub
C. Invest Newfoundland and Labrador
D. Department of Industry, Energy and Technology
Answer: D. Department of Industry, Energy and Technology

358.
True or False:
Newfoundland and Labrador’s economy is primarily agricultural.
Answer: False
(The economy is primarily based on natural resources like oil, mining, and fishing.)

359.
Multiple Choice:
Which seasonal job is a tradition in Newfoundland and Labrador?
A. Cherry picking
B. Lobster trapping
C. Cod fishing
D. Tree farming
Answer: C. Cod fishing

360.
True or False:
The cod fishery was closed in 1992 due to overfishing.
Answer: True
(A moratorium was placed on the cod fishery to allow stocks to recover.)

361.
Multiple Choice:
Which famous explorer visited Newfoundland around the year 1000 AD?
A. Marco Polo
B. Christopher Columbus
C. Leif Erikson
D. John Cabot
Answer: C. Leif Erikson

362.
True or False:
Leif Erikson was a Norse explorer who landed in Newfoundland.
Answer: True
(He is believed to have explored the area known as Vinland.)

363.
Multiple Choice:
What is the largest island off Newfoundland’s northeast coast?
A. Fogo Island
B. Bell Island
C. Change Islands
D. Random Island
Answer: A. Fogo Island

364.
True or False:
Fogo Island is known for its modern art residency program and traditional outport life.
Answer: True
(The Fogo Island Inn is a famous example of this blend of art and culture.)

365.
Multiple Choice:
Which term describes small fishing settlements in Newfoundland and Labrador?
A. Hamlets
B. Reserves
C. Outports
D. Colonies
Answer: C. Outports

366.
True or False:
“Outports” refer to inland forest settlements.
Answer: False
(They are small, isolated coastal fishing communities.)

367.
Multiple Choice:
What is the name of Newfoundland and Labrador’s provincial flower?
A. Purple Violet
B. Pitcher Plant
C. Fireweed
D. White Rose
Answer: B. Pitcher Plant

368.
True or False:
The pitcher plant is a carnivorous plant found in bogs.
Answer: True
(It is a unique plant that thrives in the boggy landscape.)

369.
Multiple Choice:
Which mountain range is found in western Newfoundland?
A. Rockies
B. Laurentians
C. Torngats
D. Long Range Mountains
Answer: D. Long Range Mountains

370.
True or False:
The Long Range Mountains are part of the Appalachian range.
Answer: True
(They are the northernmost extension of the Appalachian Mountains.)

371.
Multiple Choice:
What is Newfoundland and Labrador’s provincial bird?
A. Common Loon
B. Puffin
C. Blue Jay
D. Canada Goose
Answer: B. Puffin

372.
True or False:
The puffin is often seen nesting along Newfoundland’s coastlines.
Answer: True
(Puffin colonies are a common sight on the offshore islands.)

373.
Multiple Choice:
What year did Newfoundland officially become a province of Canada?
A. 1867
B. 1905
C. 1949
D. 1967
Answer: C. 1949

374.
True or False:
Newfoundland was the last province to join Canada.
Answer: True
(It was the tenth and final province to join Confederation.)

375.
Multiple Choice:
What is a “screech-in” ceremony in Newfoundland culture?
A. A voting ritual
B. A traditional funeral
C. A comical welcome for newcomers
D. A type of fishing license
Answer: C. A comical welcome for newcomers

376.
True or False:
The “screech-in” involves kissing a codfish.
Answer: True
(Kissing a codfish is a key part of the ceremony for newcomers.)

377.
Multiple Choice:
Which Labrador town is a hub for iron ore mining?
A. Goose Bay
B. Labrador City
C. Nain
D. Wabush
Answer: B. Labrador City

378.
True or False:
Labrador City is located on Newfoundland Island.
Answer: False
(It is located in the mainland portion of the province, Labrador.)

379.
Multiple Choice:
Who is the federal Member of Parliament for St. John’s East as of 2025?
A. Joanne Thompson
B. Seamus O’Regan
C. Jack Harris
D. Ken McDonald
Answer: A. Joanne Thompson

380.
True or False:
St. John’s East is a federal electoral district.
Answer: True
(It is one of two federal ridings that include the city of St. John's.)

381.
Multiple Choice:
Which body governs local laws in a city like St. John’s?
A. Provincial Cabinet
B. City Council
C. House of Commons
D. Senate
Answer: B. City Council

382.
True or False:
City councils are elected during municipal elections.
Answer: True
(Municipal elections are held to choose the members of the city council.)

383.
Multiple Choice:
Which town is considered the “Root Cellar Capital of the World”?
A. Corner Brook
B. Gander
C. Elliston
D. Harbour Grace
Answer: C. Elliston

384.
True or False:
Root cellars were used to preserve vegetables underground.
Answer: True
(They provide natural cold storage for produce.)

385.
Multiple Choice:
What iconic natural structure is located in Gros Morne National Park?
A. The Rockies
B. Tablelands
C. Niagara Falls
D. Blue Mountains
Answer: B. Tablelands

386.
True or False:
The Tablelands are part of a UNESCO World Heritage Site.
Answer: True
(The Tablelands are a major feature of Gros Morne National Park, a UNESCO site.)

387.
Multiple Choice:
Which important agreement affects Indigenous self-government in Labrador?
A. Meech Lake Accord
B. Nunatsiavut Agreement
C. Peace of the Land Treaty
D. Oka Accord
Answer: B. Nunatsiavut Agreement

388.
True or False:
The Nunatsiavut Government represents Inuit in northern Labrador.
Answer: True
(The agreement established a self-governing region for the Labrador Inuit.)

389.
Multiple Choice:
Which federal riding includes Labrador’s Indigenous communities?
A. Avalon
B. Bonavista–Burin–Trinity
C. Labrador
D. St. John’s South
Answer: C. Labrador

390.
True or False:
Labrador is both a region and a federal riding.
Answer: True
(The entire mainland portion of the province is a single federal electoral district.)

391.
Multiple Choice:
Which town is home to the Canadian Forces Base in Labrador?
A. Labrador City
B. Goose Bay
C. Cartwright
D. Nain
Answer: B. Goose Bay

392.
True or False:
Goose Bay hosts military training exercises and foreign aircraft.
Answer: True
(CFB Goose Bay is used by Canadian and NATO forces for training.)

393.
Multiple Choice:
What is the official motto of Newfoundland and Labrador?
A. “Strong and Free”
B. “Seek ye first the kingdom of God”
C. “From Sea to Sea”
D. “Prosperity and Peace”
Answer: B. “Seek ye first the kingdom of God”

394.
True or False:
The provincial motto is derived from the Bible.
Answer: True
(The motto is a Latin phrase from the Bible: *Quaerite primum regnum Dei*.)

395.
Multiple Choice:
Which iconic Newfoundland food is made from salted cod and potatoes?
A. Fish and Brewis
B. Lobster Thermidor
C. Cod au Gratin
D. Pea Soup
Answer: A. Fish and Brewis

396.
True or False:
Fish and Brewis is a traditional Newfoundland meal.
Answer: True
(It is a historic dish made from salted cod and hardtack.)

397.
Multiple Choice:
Which month is typically known for iceberg viewing in Newfoundland?
A. December
B. July
C. April
D. October
Answer: C. April

398.
True or False:
Icebergs drift down from Greenland and pass by Newfoundland in spring.
Answer: True
(The icebergs travel south along the Labrador Current.)

399.
Multiple Choice:
Who is the current Premier of Newfoundland and Labrador as of 2025?
A. Andrew Furey
B. Dwight Ball
C. Danny Williams
D. Ches Crosbie
Answer: A. Andrew Furey

400.
True or False:
Andrew Furey leads the Liberal Party of Newfoundland and Labrador.
Answer: True
(He is the current leader of the governing Liberal Party.)
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


        $this->command->info("Parsed " . count($questions) . " questions for Newfoundland and Labrador.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $newfoundlandAndLabrador->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Newfoundland and Labrador citizenship questions.");
    }
}
