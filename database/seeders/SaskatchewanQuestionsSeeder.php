<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SaskatchewanQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $saskatchewan = CourseSection::firstOrCreate(
            ['title' => 'Saskatchewan'],
            [
                'type' => 'province',
                'capital' => 'Regina',
                'flag' => '/images/flags/saskatchewan.png',
                'description' => 'Questions specific to Saskatchewan.',
                'summary_audio_url' => '/audio/summary_saskatchewan.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $saskatchewan->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
True or False:
Highway one is also known as the Trans-Canada Highway.
Answer: True


2.
Multiple Choice:
What is the capital city of Saskatchewan?
A. Saskatoon
B. Regina
C. Prince Albert
D. Moose Jaw
Answer: B. Regina

3.
True or False:
Saskatchewan is the smallest province in Canada.
Answer: False
(Prince Edward Island is the smallest; Saskatchewan is larger in area and population.)



4.
Multiple Choice:
Which major agricultural crop is Saskatchewan especially known for?
A. Coffee
B. Wheat
C. Rice
D. Cotton
Answer: B. Wheat



5.
True or False:
The Saskatchewan Legislative Building is located in Regina.
Answer: True
(The Legislative Building is in Regina, the provincial capital.)



6.
Multiple Choice:
Which Indigenous group is historically associated with Saskatchewan?
A. Inuit
B. Métis
C. Acadians
D. Huron-Wendat
Answer: B. Métis


7.
True or False:
Saskatchewan is a maritime province.
Answer: False
(Saskatchewan is landlocked and located in the Prairies, not near the ocean.)



8.
Multiple Choice:
What natural resource is Saskatchewan known for exporting?
A. Timber
B. Oil
C. Potash
D. Gold
Answer: C. Potash



9.
True or False:
Saskatchewan has no provincial parks.
Answer: False
(Saskatchewan has many provincial parks, including Cypress Hills Interprovincial Park.)



10.
Multiple Choice:
Who is the latest Premier of Saskatchewan?
A. Scott Moe
B. Doug Ford
C. Heather Stefanson
D. David Eby
Answer: A. Scott Moe


11.
True or False:
Saskatchewan joined Confederation in 1905.
Answer: True
(Saskatchewan joined Confederation in 1905.)



12.
Multiple Choice:
Which two provinces border Saskatchewan?
A. Alberta and British Columbia
B. Manitoba and Alberta
C. Ontario and Quebec
D. Manitoba and Nova Scotia
Answer: B. Manitoba and Alberta



13.
True or False:
Saskatchewan has only one official language: French.
Answer: False
(Saskatchewan’s official language is English; French is not official provincially.)



14.
Multiple Choice:
Which town in Saskatchewan is home to the University of Saskatchewan?
A. Regina
B. Moose Jaw
C. Saskatoon
D. Yorkton
Answer: C. Saskatoon



15.
True or False:
The RCMP Training Academy is located in Saskatoon, Saskatchewan.
Answer: False
(Regina is home to the RCMP’s national training facility.)


16.
Multiple Choice:
In which year did Saskatchewan join Confederation?
A. 1867
B. 1873
C. 1905
D. 1949
Answer: C. 1905



17.
True or False:
Saskatchewan is part of the Atlantic region of Canada.
Answer: False
(Saskatchewan is in the Prairie region.)



18.
Multiple Choice:
What is a major river that runs through Saskatchewan?
A. Fraser River
B. Yukon River
C. South Saskatchewan River
D. Ottawa River
Answer: C. South Saskatchewan River



19.
True or False:
The flag of Saskatchewan features a bison and a maple leaf.
Answer: False
(It features a western red lily and the provincial coat of arms.)



20.
Multiple Choice:
Which flower is the official floral emblem of Saskatchewan?
A. Prairie Crocus
B. Western Red Lily
C. Wild Rose
D. Blue Flag Iris
Answer: B. Western Red Lily



21.
True or False:
The economy of Saskatchewan is based only on farming.
Answer: False
(Saskatchewan’s economy includes agriculture, mining, oil, and natural gas.)



22.
Multiple Choice:
Which region is Saskatchewan a part of?
A. The Atlantic
B. The West Coast
C. The Prairies
D. Northern Canada
Answer: C. The Prairies



23.
True or False:
Saskatchewan has a provincial senate.
Answer: False
(Provinces in Canada do not have senates; only the federal government does.)



24.
Multiple Choice:
Which political party is currently governing Saskatchewan? (As of 2025)
A. Saskatchewan NDP
B. Saskatchewan Liberal Party
C. Saskatchewan Party
D. Green Party
Answer: C. Saskatchewan Party



25.
True or False:
The population of Saskatchewan is over 20 million people.
Answer: False
(Saskatchewan’s population is just over 1 million, not 20 million.)



26.
Multiple Choice:
What is the primary industry in Saskatchewan’s north?
A. Agriculture
B. Mining and forestry
C. Fishing
D. Technology
Answer: B. Mining and forestry



27.
True or False:
The Lieutenant Governor of Saskatchewan is elected by the Governor General
Answer: True
(The Lieutenant Governor is appointed by the Governor General on the advice of the Prime Minister.)



28.
Multiple Choice:
Which Indigenous language is commonly spoken in northern Saskatchewan?
A. Inuktitut
B. Mohawk
C. Dene
D. Gaelic
Answer: C. Dene



29.
True or False:
Regina is the capital city of Saskatchewan.
Answer: True
(Regina is the capital; Saskatoon is the largest city.)



30.
Multiple Choice:
What is the name of the provincial legislature of Saskatchewan?
A. Saskatchewan Assembly
B. Saskatchewan House of Commons
C. Legislative Assembly of Saskatchewan
D. Provincial Parliament of Saskatchewan
Answer: C. Legislative Assembly of Saskatchewan


31.
True or False:
Saskatchewan borders the United States.
Answer: True
(It shares a border with the U.S. states of Montana and North Dakota.)



32.
Multiple Choice:
Which symbol appears on the provincial flag of Saskatchewan?
A. Moose
B. Western Red Lily
C. Polar Bear
D. Canoe
Answer: B. Western Red Lily



33.
True or False:
Saskatchewan’s government operates under a constitutional monarchy.
Answer: True
(Like all Canadian provinces, Saskatchewan is under a constitutional monarchy.)



34.
Multiple Choice:
Which of the following is a major annual event in Saskatchewan?
A. Calgary Stampede
B. Regina Folk Festival
C. Canadian National Exhibition
D. Quebec Winter Carnival
Answer: B. Regina Folk Festival


35.
True or False:
The Premier of Saskatchewan represents the federal government.
Answer: False
(The Premier leads the provincial government.)


36.
Multiple Choice:
What is Saskatchewan’s provincial motto?
A. “Land of Living Skies”
B. “Strong and Free”
C. “Glorious and Free”
D. “True North”
Answer: A. “Land of Living Skies”


37.
True or False:
Saskatchewan became a province after Alberta.
Answer: False
(Both Alberta and Saskatchewan became provinces in 1905.)



38.
Multiple Choice:
Which city is home to the RCMP Heritage Centre?
A. Regina
B. Saskatoon
C. Moose Jaw
D. North Battleford
Answer: A. Regina


39.
True or False:
Saskatchewan has no oil or gas resources.
Answer: False
(The province has significant oil and gas production.)



40.
Multiple Choice:
What is one of the largest lakes in Saskatchewan?
A. Lake Winnipeg
B. Great Bear Lake
C. Reindeer Lake
D. Okanagan Lake
Answer: C. Reindeer Lake


41.
True or False:
Regina is located in northern Saskatchewan.
Answer: False
(Regina is located in southern Saskatchewan.)


42.
Multiple Choice:
What is the time zone in Saskatchewan?
A. Eastern Time
B. Central Time
C. Pacific Time
D. Atlantic Time
Answer: B. Central Time

43.
True or False:
Saskatchewan observe Daylight Saving Time.
Answer: False
(Saskatchewan typically remains on Central Standard Time year-round.)



44.
Multiple Choice:
What was Saskatchewan originally part of before becoming a province?
A. British Columbia
B. Rupert’s Land and the North-West Territories
C. New France
D. Upper Canada
Answer: B. Ruperts Land and the North-West Territories


45.
True or False:
The Legislative Assembly in Saskatchewan is unicameral.
Answer: True


46.
Multiple Choice:
Which Saskatchewan-born politician served as Canada’s Governor General?
A. Michaëlle Jean
B. Adrienne Clarkson
C. Ray Hnatyshyn
D. Roland Michener
Answer: C. Ray Hnatyshyn


47.
True or False:
Most of Saskatchewan’s land is covered by forest.
Answer: False
(Southern Saskatchewan is mainly prairie; forests are more prevalent in the north.)


48.
Multiple Choice:
Who is the ceremonial representative of the King in Saskatchewan?
A. Premier
B. Speaker
C. Lieutenant Governor
D. Chief Justice
Answer: C. Lieutenant Governor


49.
True or False:
All Canadian provinces have equal representation in the Senate.
Answer: False
(Senate representation varies by region.)



50.
Multiple Choice:
Which of the following describes Saskatchewan’s coat of arms?
A. A blue flag with gold stars
B. A green shield with a lion and wheat sheaves
C. A polar bear and igloo
D. A moose and spruce tree
Answer: B. A green shield with a lion and wheat sheaves


51.
True or False:
The majority of Saskatchewan’s lives in rural areas.
Answer: False
(Most of the population lives in urban centres like Regina and Saskatoon.)



52.
Multiple Choice:
Which Saskatchewan museum showcases Indigenous and settler history?
A. Canadian Museum for Human Rights
B. Royal Saskatchewan Museum
C. Manitoba Museum
D. Ontario Science Centre
Answer: B. Royal Saskatchewan Museum



53.
True or False:
Saskatchewan is the only province without natural lakes.
Answer: False
(Saskatchewan has over 100,000 lakes, including Lake Athabasca and Reindeer Lake.)



54.
Multiple Choice:
What is the largest ethnic group in Saskatchewan after Indigenous peoples?
A. French
B. Ukrainian
C. Chinese
D. Scottish
Answer: B. Ukrainian



55.
True or False:
The Saskatchewan flag features a polar bear.
Answer: False
(It features a western red lily and the provincial coat of arms.)



56.
Multiple Choice:
Which Prime Minister of Canada was born in Saskatchewan?
A. Stephen Harper
B. Justin Trudeau
C. John Diefenbaker
D. Brian Mulroney
Answer: C. John Diefenbaker


57.
True or False:
All Indigenous people in Saskatchewan are First Nations.
Answer: False
(Indigenous people in Saskatchewan include First Nations, Métis, and Inuit.)



58.
Multiple Choice:
What is one of Saskatchewan’s most important exports?
A. Diamonds
B. Bananas
C. Potash
D. Coffee
Answer: C. Potash


59.
True or False:
The South Saskatchewan River flows into the Atlantic Ocean.
Answer: False
(It flows into the Saskatchewan River system and eventually into Hudson Bay.)


60.
Multiple Choice:
Which animal is featured on Saskatchewan’s provincial coat of arms?
A. Moose
B. Lion
C. Bear
D. Beaver
Answer: B. Lion



61.
True or False:
The Premier of Saskatchewan is appointed by the King.
Answer: False
(The Premier is the leader of the party with the most seats in the Legislative Assembly.)



62.
Multiple Choice:
Which Canadian Crown Corporation started in Saskatchewan?
A. Canada Post
B. SaskTel
C. CBC
D. VIA Rail
Answer: B. SaskTel


63.
True or False:
SaskTel is a private U.S. company operating in Saskatchewan.
Answer: False
(SaskTel is a provincial Crown corporation.)



64.
Multiple Choice:
Who delivers the Speech from the Throne in Saskatchewan?
A. Premier
B. Lieutenant Governor
C. Speaker
D. Prime Minister
Answer: B. Lieutenant Governor


65.
True or False:
The Saskatchewan Roughriders are a professional baseball team.
Answer: False
(They are a professional Canadian football team.)


66.
Multiple Choice:
Which treaty area includes most of southern Saskatchewan?
A. Treaty 1
B. Treaty 4
C. Treaty 6
D. Treaty 10
Answer: B. Treaty 4


67.
True or False:
Saskatchewan has an official tartan.
Answer: True
(It was adopted in 1961.)

68.
Multiple Choice:
Which of the following is a responsibility of Saskatchewan’s provincial government?
A. Immigration policy
B. National defence
C. Education
D. International trade
Answer: C. Education


69.
True or False:
Saskatchewan’s legislature is located in Saskatoon.
Answer: False
(It is located in Regina.)



70.
Multiple Choice:
What is Saskatchewan’s largest city by population?
A. Moose Jaw
B. Regina
C. Saskatoon
D. Swift Current
Answer: C. Saskatoon



71.
True or False:
Saskatchewan is Canada’s easternmost province.
Answer: False
(Saskatchewan is in western Canada.)



72.
Multiple Choice:
Which of these industries contributes significantly to Saskatchewan’s economy?
A. Film and TV
B. Aerospace
C. Agriculture
D. Automobile manufacturing
Answer: C. Agriculture



73.
True or False:
Saskatchewan is part of the Canadian Shield.
Answer: True
(Northern Saskatchewan includes part of the Canadian Shield.)


74.
Multiple Choice:
Which Saskatchewan city is famous for murals and tunnels related to Al Capone?
A. Regina
B. Yorkton
C. Moose Jaw
D. Estevan
Answer: C. Moose Jaw


75.
True or False:
Only Canadian citizens may vote in provincial elections in Saskatchewan.
Answer: True
(Voting in all elections is reserved for Canadian citizens.)


76.
Multiple Choice:
Which mineral-rich area in northern Saskatchewan is known for uranium production?
A. Cypress Hills
B. Athabasca Basin
C. Qu’Appelle Valley
D. Hudson Plains
Answer: B. Athabasca Basin


77.
True or False:
The Qu’Appelle Valley was formed by glaciers.
Answer: True
(It is a glacially-carved valley.)


78.
Multiple Choice:
What is the main governing document for Saskatchewan’s provincial government?
A. Saskatchewan Charter
B. Canadian Constitution
C. Regina Act
D. Prairie Agreement
Answer: B. Canadian Constitution


79.
True or False:
The Canadian Charter of Rights and Freedoms applies in Saskatchewan.
Answer: True
(It applies across all provinces and territories.)



80.
Multiple Choice:
Which public health authority operates in Saskatchewan?
A. Health Canada
B. Saskatchewan Health Authority
C. Western Prairie Medical Board
D. Prairie Health Network
Answer: B. Saskatchewan Health Authority


81.
True or False:
You must be born in Saskatchewan to vote in provincial elections.
Answer: False
(You must be a Canadian citizen and meet residency requirements.)


82.
Multiple Choice:
Which Saskatchewan lake is among Canada’s largest?
A. Great Bear Lake
B. Lake Winnipeg
C. Reindeer Lake
D. Lake Superior
Answer: C. Reindeer Lake


83.
True or False:
Saskatchewan Day is celebrated on the first Monday in August.
Answer: True



84.
Multiple Choice:
Which important Indigenous gathering place is found in Saskatchewan?
A. Manitoulin Island
B. Batoche
C. Jasper
D. L’Anse aux Meadows
Answer: B. Batoche


85.
True or False:
The Saskatchewan Archives are located only in Saskatoon.
Answer: False
(They have offices in both Regina and Saskatoon.)



86.
Multiple Choice:
Who represents the King in Saskatchewan?
A. Premier
B. Lieutenant Governor
C. Prime Minister
D. Chief Justice
Answer: B. Lieutenant Governor


87.
True or False:
Saskatchewan is a bilingual province.
Answer: False
(English is the primary official language provincially.)



88.
Multiple Choice:
Which national park is partially located in Saskatchewan?
A. Banff
B. Jasper
C. Grasslands
D. Prince Albert
Answer: D. Prince Albert


89.
True or False:
Prince Albert National Park lies entirely in Alberta.
Answer: False
(It is in Saskatchewan.)


90.
Multiple Choice:
Which political party currently leads the Saskatchewan government? (as of 2025)
A. New Democratic Party
B. Saskatchewan Party
C. Liberal Party
D. Conservative Party
Answer: B. Saskatchewan Party


91.
True or False:
All of Saskatchewan follows Pacific Time.
Answer: False
(Saskatchewan follows Central Standard Time year-round.)



92.
Multiple Choice:
Which historical event is commemorated at Batoche?
A. War of 1812
B. Red River Rebellion
C. North-West Rebellion
D. Confederation
Answer: C. North-West Rebellion


93.
True or False:
Saskatchewan is divided into counties.
Answer: False
(It is divided into rural municipalities and urban municipalities.)



94.
Multiple Choice:
Which major energy source is produced in southeast Saskatchewan?
A. Hydroelectric
B. Oil
C. Wind
D. Solar
Answer: B. Oil


95.
True or False:
Regina was once known as “Pile of Bones.”
Answer: True



96.
Multiple Choice:
Who was Louis Riel?
A. Explorer of the Arctic
B. Leader of the Métis in Saskatchewan
C. Governor General of Canada
D. First Mayor of Saskatoon
Answer: B. Leader of the Métis in Saskatchewan


97.
True or False:
The Saskatchewan Legislature is unicameral (single house).
Answer: True



98.
Multiple Choice:
What does the western red lily on the provincial flag represent?
A. Wealth
B. Peace
C. Nature and pride
D. Military strength
Answer: C. Nature and pride


99.
True or False:
Saskatchewan has a provincial police force.
Answer: False
(The RCMP provides policing services.)


100.
Multiple Choice:
Which highway is known as the Trans-Canada Highway in Saskatchewan?
A. Highway 1
B. Highway 11
C. Highway 16
D. Highway 39
Answer: A. Highway 1


101.
True or False:
The Métis have no presence in modern Saskatchewan.
Answer: False
(The Métis have a vibrant, recognized community in Saskatchewan.)



102.
Multiple Choice:
What natural resource is Saskatchewan a world leader in producing?
A. Iron
B. Uranium
C. Coal
D. Copper
Answer: B. Uranium


103.
True or False:
Saskatchewan has two official capitals.
Answer: False
(Regina is the sole capital.)



104.
Multiple Choice:
Who is the Premier of Saskatchewan? (As of 2025)
A. Scott Moe
B. Wab Kinew
C. Danielle Smith
D. Doug Ford
Answer: A. Scott Moe


105.
True or False:
Saskatchewan was one of the original four provinces in Confederation.
Answer: False
(It joined Confederation in 1905.)


106.
Multiple Choice:
Which major river flows through Saskatoon?
A. Red River
B. North Saskatchewan River
C. South Saskatchewan River
D. Churchill River
Answer: C. South Saskatchewan River


107.
True or False:
Saskatchewan has more lakes than Manitoba.
Answer: False
(Manitoba has more lakes.)


108.
Multiple Choice:
What was Saskatchewan’s population in the 2021 census?
A. 600,000
B. 1.2 million
C. 1.8 million
D. 2.5 million
Answer: B. 1.2 million


109.
True or False:
Saskatchewan’s provincial flower is the Western Red Lily.
Answer: True



110.
Multiple Choice:
Which of these is a major economic sector in Saskatchewan?
A. Software
B. Aerospace
C. Agriculture
D. Shipbuilding
Answer: C. Agriculture



111.
True or False:
The University of Saskatchewan is not located in Regina.
Answer: True
(It is located in Saskatoon.)


112.
Multiple Choice:
Which important Canadian Crown corporation was founded in Saskatchewan?
A. Air Canada
B. CN Rail
C. SaskTel
D. CBC
Answer: C. SaskTel


113.
True or False:
The RCMP Training Academy is not located in Saskatoon.
Answer: True
(It is located in Regina.)


114.
Multiple Choice:
Which language is widely spoken in Saskatchewan?
A. Mohawk
B. Inuktitut
C. Cree
D. Haida
Answer: C. Cree


115.
True or False:
Saskatchewan’s motto is “From Many Peoples, Strength.”
Answer: True


116.
Multiple Choice:
Which natural feature is found in Cypress Hills, Saskatchewan?
A. Sand dunes
B. Boreal forest
C. Grasslands plateau
D. Tundra
Answer: C. Grasslands plateau


117.
True or False:
Saskatchewan has several Indigenous reserves.
Answer: True


118.
Multiple Choice:
Which city is known as the “City of Bridges”?
A. Regina
B. Moose Jaw
C. Saskatoon
D. Yorkton
Answer: C. Saskatoon


119.
True or False:
The Legislative Assembly of Saskatchewan has 84 seats.
Answer: False
(It has 61 seats.)

120.
Multiple Choice:
What is the term for Saskatchewan’s provincial legislature members?
A. MPs
B. MLAs
C. MPPs
D. Senators
Answer: B. MLAs


121.
True or False:
The Regina Symphony Orchestra is the oldest continuously performing orchestra in Canada.
Answer: False
(This is a claim sometimes made, but it is not definitively true in official sources; however, based on the question, the answer given is false, as other orchestras have similar claims. The user's provided answer is likely a simplified "False" for the test.)


122.
Multiple Choice:
Which group played a major role in building Saskatchewan’s railways and infrastructure?
A. French-Canadians
B. Ukrainian immigrants
C. American loyalists
D. British soldiers
Answer: B. Ukrainian immigrants


123.
True or False:
Saskatchewan has a multicameral legislature, meaning it has only more than one legislative chamber.
Answer: False
(It is a unicameral legislature, meaning it has one legislative chamber.)


124.
Multiple Choice:
Which city in Saskatchewan is known for its bridges and river valley?
A. Regina
B. Swift Current
C. Saskatoon
D. Estevan
Answer: C. Saskatoon



125.
True or False:
Saskatchewan was originally part of the Northwest Territories.
Answer: True


126.
Multiple Choice:
What mineral is Saskatchewan a world leader in producing?
A. Coal
B. Gold
C. Potash
D. Nickel
Answer: C. Potash


127.
True or False:
The majority of Saskatchewan’s population lives in rural areas.
Answer: False
(The majority lives in urban centres like Regina and Saskatoon.)


128.
Multiple Choice:
Saskatchewan was established as a province in what year?
A. 1867
B. 1871
C. 1905
D. 1949
Answer: C. 1905


129.
True or False:
French is the only official language in Saskatchewan.
Answer: False
(English is the primary language; French has minority language status.)


130.
Multiple Choice:
Who is often referred to as the “Father of Medicare” in Canada and served as Premier of Saskatchewan?
A. Jean Chrétien
B. Tommy Douglas
C. Lester B. Pearson
D. Wilfrid Laurier
Answer: B. Tommy Douglas


131.
True or False:
Saskatchewan’s economy is based mainly on forestry.
Answer: False
(It is primarily based on agriculture and resource extraction like potash and oil.)


132.
Multiple Choice:
What is the Saskatchewan Legislative Assembly’s minimum age for voting?
A. 16
B. 17
C. 18
D. 21
Answer: C. 18


133.
True or False:
Saskatchewan was one of the original provinces at Confederation.
Answer: False
(Saskatchewan became a province in 1905.)

134.
Multiple Choice:
The first female Premier of Saskatchewan was:
A. Lynda Haverstock
B. Sandra Schmirler
C. Sylvia Fedoruk
D. None – the province has not had one yet
Answer: D. None – the province has not had one yet


135.
True or False:
The Saskatchewan flag includes a bison.
Answer: False
(It features a lion and a Western Red Lily.)


136.
Multiple Choice:
Which river flows through Saskatoon?
A. Mackenzie River
B. Bow River
C. South Saskatchewan River
D. Red River
Answer: C. South Saskatchewan River


137.
True or False:
Regina is the largest city in Saskatchewan by population.
Answer: False
(Saskatoon is the largest.)

138.

Multiple Choice:
Who is the head of the provincial government in Saskatchewan?
A. Premier
B. Lieutenant Governor
C. Mayor
D. MP
Answer: A. Premier

139.
True or False:
The Premier is appointed by the Prime Minister of Canada.
Answer: False
(The Premier is the leader of the political party that wins the most seats in the provincial legislature.)



140.
Multiple Choice:
Which Saskatchewan town is known for its murals and arts festival?
A. Moose Jaw
B. Kindersley
C. Yorkton
D. Weyburn
Answer: A. Moose Jaw



141.
True or False:
The Royal Canadian Mounted Police (RCMP) have their national training academy in Saskatchewan.
Answer: True
(Depot Division is located in Regina.)



142.
Multiple Choice:
What flower is featured on the Saskatchewan provincial flag?
A. Prairie Crocus
B. Western Red Lily
C. Daffodil
D. Arctic Poppy
Answer: B. Western Red Lily

143.
True or False:
Saskatchewan is part of the Prairie Provinces.
Answer: True


144.
Multiple Choice:
Which Premier introduced public healthcare in Saskatchewan?
A. Roy Romanow
B. Brad Wall
C. Tommy Douglas
D. Allan Blakeney
Answer: C. Tommy Douglas



145.
True or False:
Saskatchewan is the least populous province in Canada.
Answer: False
(Prince Edward Island is the least populous.)



146.
Multiple Choice:
What is the name of Saskatchewan’s provincial flower?
A. Prairie Lily
B. Sunflower
C. Blue Violet
D. Goldenrod
Answer: A. Prairie Lily (Western Red Lily)



147.
True or False:
Manitoba has more lakes than Saskatchewan
Answer: True



148.
Multiple Choice:
Which sector employs the most people in Saskatchewan?
A. Fishing
B. Agriculture
C. Forestry
D. Aerospace
Answer: B. Agriculture


149.
True or False:
The main legislative building in Saskatchewan is called Parliament Hill.
Answer: False
(It is called the Saskatchewan Legislative Building.)


150.
Multiple Choice:
What is Saskatchewan’s motto in Latin?
A. Multis E Gentibus Vires
B. Ad Mari Usque Ad Mare
C. Gloriam Reginae
D. Vires in Numeris
Answer: A. Multis E Gentibus Vires
(“From many peoples, strength.”)



151.
True or False:
The Legislative Assembly of Saskatchewan has more than 100 seats.
Answer: False
(As of 2025, it has fewer than 70 seats.)


152.
Multiple Choice:
Which Treaty primarily covers southern Saskatchewan?
A. Treaty 5
B. Treaty 6
C. Treaty 4
D. Treaty 9
Answer: C. Treaty 4


153.
True or False:
The Saskatchewan Roughriders play in the Canadian Football League (CFL).
Answer: True



154.
Multiple Choice:
Which city in Saskatchewan is home to the Western Development Museum?
A. Regina
B. Prince Albert
C. Saskatoon
D. Swift Current
Answer: C. Saskatoon


155.
True or False:
The Lieutenant Governor of Saskatchewan is elected by the people.
Answer: False
(The Lieutenant Governor is appointed by the Governor General on the advice of the Prime Minister.)


156.
Multiple Choice:
Which crop is Saskatchewan a major global exporter of?
A. Sugarcane
B. Coffee
C. Lentils
D. Bananas
Answer: C. Lentils


157.
True or False:
The Saskatchewan Legislative Building is located in Saskatoon.
Answer: False
(It is located in Regina.)


158.
Multiple Choice:
Who is the current Lieutenant Governor of Saskatchewan? (As of 2025)
A. Russ Mirasty
B. Salma Lakhani
C. Edith Dumont
D. Mary Simon
Answer: A. Russ Mirasty


159.
True or False:
Saskatchewan is bordered by British Columbia to the west.
Answer: False
(Saskatchewan is bordered by Alberta to the west.)


160.
Multiple Choice:
Saskatchewan shares its southern border with which U.S. states?
A. Montana and North Dakota
B. Minnesota and Wyoming
C. Washington and Oregon
D. Idaho and Nebraska
Answer: A. Montana and North Dakota



161.
True or False:
The Saskatchewan flag features a lion and a Western Red Lily.
Answer: True



162.
Multiple Choice:
What is Saskatchewan’s time zone?
A. Eastern
B. Atlantic
C. Mountain (without daylight savings)
D. Pacific
Answer: C. Mountain (without daylight savings)



163.
True or False:
Saskatchewan observes Daylight Saving Time.
Answer: False
(Saskatchewan does not observe Daylight Saving Time.)



164.
Multiple Choice:
Which major Canadian highway runs through Saskatchewan?
A. Highway 5
B. Highway 16
C. Highway 401
D. Highway 1 (Trans-Canada Highway)
Answer: D. Highway 1 (Trans-Canada Highway)


165.
True or False:
The Trans-Canada Highway is the longest national highway in the world.
Answer: True


166.
Multiple Choice:
What is Wanuskewin Heritage Park known for?
A. Oil production
B. Mining
C. Indigenous culture and archeology
D. Tourism for skiing
Answer: C. Indigenous culture and archeology


167.
True or False:
Saskatchewan is the flattest province in Canada.
Answer: False
(While much of the land is flat, Manitoba is also known for extensive flat prairie.)



168.
Multiple Choice:
Which university is located in Regina?
A. University of Manitoba
B. University of Alberta
C. University of Regina
D. Simon Fraser University
Answer: C. University of Regina


169.
True or False:
The Saskatchewan Arts Board was the first of its kind in Canada.
Answer: True



170.
Multiple Choice:
Who was the first premier of Saskatchewan?
A. Walter Scott
B. Tommy Douglas
C. James Gardiner
D. Allan Blakeney
Answer: A. Walter Scott



171.
True or False:
The Legislative Assembly of Saskatchewan meets in Saskatoon.
Answer: False
(It meets in Regina.)



172.
Multiple Choice:
Who is the ceremonial representative of the Saskatchewan?
A. Premier
B. Member of Parliament
C. Lieutenant Governor
D. Speaker of the Assembly
Answer: C. Lieutenant Governor



173.
True or False:
The role of Lieutenant Governor in Saskatchewan is to manage the economy.
Answer: False
(The Lieutenant Governor performs ceremonial and constitutional duties, not economic management.)



174.
Multiple Choice:
Saskatchewan’s main legislative body is called:
A. House of Commons
B. Saskatchewan Senate
C. Legislative Assembly of Saskatchewan
D. House of the Federation
Answer: C. Legislative Assembly of Saskatchewan



175.
True or False:
Only Canadian-born citizens can vote in Saskatchewan elections.
Answer: False
(All Canadian citizens aged 18 and over, regardless of birthplace, can vote.)


176.
Multiple Choice:
Which Saskatchewan park is home to large sand dunes and rare species?
A. Prince Albert National Park
B. Great Sand Hills
C. Elk Island National Park
D. Wascana Park
Answer: B. Great Sand Hills

177.
True or False:
Wascana Park in Regina is one of North America’s largest urban parks.
Answer: True



178.
Multiple Choice:
Saskatchewan’s natural resources include all the following EXCEPT:
A. Potash
B. Uranium
C. Oil
D. Diamonds
Answer: D. Diamonds


179.
True or False:
The Saskatchewan Legislative Assembly follows a bicameral system.
Answer: False
(It is unicameral — one chamber.)



180.
Multiple Choice:
Which city is located in central Saskatchewan and known for its vibrant Indigenous culture?
A. North Battleford
B. Regina
C. La Ronge
D. Saskatoon
Answer: C. La Ronge


181.
True or False:
The Saskatchewan flag was adopted in 1990.
Answer: False
(It was adopted in 1969.)


182.
Multiple Choice:
Which Premier of Saskatchewan served the longest in the 20th century?
A. Tommy Douglas
B. Lorne Calvert
C. Roy Romanow
D. Allan Blakeney
Answer: A. Tommy Douglas


183.
True or False:
Saskatchewan is Canada’s largest province by land area.
Answer: False
(Quebec is the largest province by land area.)



184.
Multiple Choice:
Which Saskatchewan river is part of the Churchill River System?
A. North Saskatchewan River
B. Reindeer River
C. Fraser River
D. Ottawa River
Answer: B. Reindeer River


185.
True or False:
In Saskatchewan, healthcare is fully paid for out-of-pocket.
Answer: False
(Healthcare is publicly funded.)



186.
Multiple Choice:
Which famous mounted police force has its training academy in Regina?
A. Ontario Provincial Police
B. Canadian Security Intelligence Service
C. Royal Canadian Mounted Police
D. Vancouver Police Service
Answer: C. Royal Canadian Mounted Police



187.
True or False:
RCMP recruits receive their training in Ottawa.
Answer: False
(They are trained at Depot Division in Regina.)


188.
Multiple Choice:
Saskatchewan’s provincial court system handles:
A. Federal income tax
B. Divorce and child custody
C. Provincial offenses and criminal trials
D. Senate appointments
Answer: C. Provincial offenses and criminal trials



189.
True or False:
The Saskatchewan economy is solely based on tourism.
Answer: False
(It is based on agriculture, mining, oil, and more.)


190.
Multiple Choice:
Who was the first woman appointed Lieutenant Governor of Saskatchewan?
A. Sylvia Fedoruk
B. Adrienne Clarkson
C. Kim Campbell
D. Lynda Haverstock
Answer: A. Sylvia Fedoruk



191.
True or False:
Sylvia Fedoruk was also a physicist and former Chancellor of the University of Saskatchewan.
Answer: True



192.
Multiple Choice:
Saskatchewan celebrates which day in honour of Indigenous Peoples?
A. Louis Riel Day
B. Canada Day
C. National Indigenous Peoples Day
D. Prairie Day
Answer: C. National Indigenous Peoples Day


193.
True or False:
Saskatchewan has a coastline along Hudson Bay.
Answer: False
(Saskatchewan is landlocked.)


194.
Multiple Choice:
Which of the following is a traditional Indigenous language spoken in Saskatchewan?
A. Mohawk
B. Mi’kmaq
C. Cree
D. Inuktitut
Answer: C. Cree



195.
True or False:
Public schooling in Saskatchewan is administered at the national level.
Answer: False
(Schooling is a provincial responsibility.)



196.
Multiple Choice:
Which Saskatchewan city is home to the Remai Modern art gallery?
A. Regina
B. Moose Jaw
C. Saskatoon
D. Prince Albert
Answer: C. Saskatoon


197.
True or False:
Regina was once called “Pile of Bones.”
Answer: True


198.
Multiple Choice:
What is the official symbol of Saskatchewan’s natural heritage?
A. Western Red Lily
B. Prairie Crocus
C. Beaver
D. Maple Leaf
Answer: A. Western Red Lily


199.
True or False:
Saskatchewan was hit hard by the Great Depression in the 1930s.
Answer: True



200.
Multiple Choice:
The Saskatchewan Human Rights Commission is responsible for:
A. Arresting criminals
B. Promoting cultural festivals
C. Enforcing equality and non-discrimination
D. Funding political campaigns
Answer: C. Enforcing equality and non-discrimination

201.
True or False:
Every resident of Saskatchewan must join a political party.
Answer: False


202.
Multiple Choice:
Which Saskatchewan political leader introduced Medicare?
A. John Diefenbaker
B. Tommy Douglas
C. Roy Romanow
D. Brad Wall
Answer: B. Tommy Douglas


203.
True or False:
Saskatchewan’s provincial legislature has two houses.
Answer: False
(It is unicameral – only one legislative chamber.)


204.
Multiple Choice:
Which body enforces human rights legislation in Saskatchewan?
A. RCMP
B. Provincial Ombudsman
C. Saskatchewan Human Rights Commission
D. Federal Parliament
Answer: C. Saskatchewan Human Rights Commission


205.
True or False:
Moose Jaw is known for its underground tunnels and heritage tours.
Answer: True


206.
Multiple Choice:
Which large northern lake is located in Saskatchewan?
A. Lake Winnipeg
B. Reindeer Lake
C. Lake Ontario
D. Lake Simcoe
Answer: B. Reindeer Lake


207.
True or False:
Saskatchewan’s main exports are software and electronics.
Answer: False
(Its main exports include potash, wheat, oil, and uranium.)


208.
Multiple Choice:
Who appoints the Lieutenant Governor of Saskatchewan?
A. The Premier
B. The House of Commons
C. The Governor General
D. The Prime Minister
Answer: C. The Governor General (on the advice of the Prime Minister)


209.
True or False:
The Saskatchewan Legislative Assembly meets in Saskatoon.
Answer: False
(It meets in Regina.)


210.
Multiple Choice:
Which Saskatchewan-born Canadian became Prime Minister?
A. Justin Trudeau
B. Joe Clark
C. Stephen Harper
D. John Diefenbaker
Answer: D. John Diefenbaker



211.
True or False:
John Diefenbaker was the first Prime Minister of Canada born in Western Canada.
Answer: True


212.
Multiple Choice:
Saskatchewan was created from which territory in 1905?
A. Ontario
B. Rupert’s Land
C. North-West Territories
D. British Columbia
Answer: C. North-West Territories


213.
True or False:
The Premier of Saskatchewan is elected directly by the people.
Answer: False
(The Premier is the leader of the party with the most seats in the legislature.)


214.
Multiple Choice:
Saskatchewan’s economy is best described as:
A. Industrial and fishing
B. Resource-based and agricultural
C. Financial and shipping
D. Automotive manufacturing
Answer: B. Resource-based and agricultural



215.
True or False:
French and Cree are official languages of Saskatchewan.
Answer: False
(The official language is English, although Cree and French are spoken.)



216.
Multiple Choice:
What is the highest court in Saskatchewan?
A. Saskatchewan Provincial Court
B. Saskatchewan Court of Justice
C. Saskatchewan Court of Appeal
D. Supreme Court of Saskatchewan
Answer: C. Saskatchewan Court of Appeal



217.
True or False:
The Saskatchewan Court of Appeal is the final court for criminal cases in Canada.
Answer: False
(The Supreme Court of Canada is the highest court.)


218.
Multiple Choice:
What electoral system is used in Saskatchewan provincial elections?
A. Proportional representation
B. Ranked ballot
C. First-past-the-post
D. Run-off voting
Answer: C. First-past-the-post


219.
True or False:
In Saskatchewan, municipal governments are responsible for national immigration.
Answer: False
(Immigration is a federal and provincial responsibility.)


220.
Multiple Choice:
Which Saskatchewan region has boreal forests and lakes?
A. Southern prairies
B. Northern Saskatchewan
C. Western border
D. Regina plain
Answer: B. Northern Saskatchewan


221.
True or False:
The North Saskatchewan and South Saskatchewan Rivers merge to form the Saskatchewan River.
Answer: True


222.
Multiple Choice:
Which major crop is NOT typically grown in Saskatchewan?
A. Wheat
B. Barley
C. Coffee
D. Canola
Answer: C. Coffee

223.
True or False:
The Saskatchewan flag has a bison in its center.
Answer: False
(It features a red lily and the provincial coat of arms.)

224.
Multiple Choice:
Which two colors dominate the Saskatchewan provincial flag?
A. Red and white
B. Blue and yellow
C. Green and gold
D. Orange and green
Answer: C. Green and gold


225.
True or False:
The RCMP training academy is located in Regina, Saskatchewan.
Answer: True


226.
Multiple Choice:
which province is located on west side of Saskatchewan?
A. Manitoba
B. British Columbia
C. Alberta
D. Ontario
Answer: C. Alberta


227.
True or False:
The Saskatchewan Roughriders are a professional hockey team.
Answer: False
(They are a Canadian football team in the CFL.)

228.
Multiple Choice:
Which flower is Saskatchewan’s official floral emblem?
A. Prairie Crocus
B. Western Red Lily
C. Trillium
D. Daffodil
Answer: B. Western Red Lily


229.
True or False:
Saskatchewan became a province in 1871.
Answer: False
(It became a province in 1905.)


230.
Multiple Choice:
Which of the following natural resources is NOT found in Saskatchewan?
A. Uranium
B. Potash
C. Oil
D. Gold (in large amounts)
Answer: D. Gold (in large amounts)


231.
True or False:
The Saskatchewan River flows into the Hudson Bay.
Answer: True


232.
Multiple Choice:
Which city in Saskatchewan is nicknamed “The City of Bridges”?
A. Prince Albert
B. Saskatoon
C. Regina
D. Moose Jaw
Answer: B. Saskatoon


233.
True or False:
Most of Saskatchewan’s land is forested.
Answer: False
(Most is prairie and farmland; forests dominate the north.)


234.
Multiple Choice:
What is a Métis settlement historically associated with Saskatchewan?
A. Batoche
B. Louisbourg
C. Fort York
D. Charlottetown
Answer: A. Batoche


235.
True or False:
The Battle of Batoche was part of the 1885 Northwest Resistance.
Answer: True


236.
Multiple Choice:
What is the famous bird of Saskatchewan?
A. Loon
B. Great Horned Owl
C. Sharp-tailed Grouse
D. Snowy Owl
Answer: C. Sharp-tailed Grouse


237.
True or False:
The legislative building in Regina is open to public tours.
Answer: True

238.
Multiple Choice:
Which university is based in Saskatoon?
A. University of Manitoba
B. University of Regina
C. University of Alberta
D. University of Saskatchewan
Answer: D. University of Saskatchewan


239.
True or False:
Saskatchewan has direct access to the ocean.
Answer: False
(It is landlocked.)


240.
Multiple Choice:
Which group of people primarily built the Canadian Pacific Railway in the Prairies?
A. Irish settlers
B. Chinese labourers
C. Métis
D. Ukrainian farmers
Answer: B. Chinese labourers


241.
True or False:
The Regina Riot of 1935 was related to the Great Depression and unemployed workers.
Answer: True


242.
Multiple Choice:
Who was the founder of the Co-operative Commonwealth Federation (CCF) and Saskatchewan’s first socialist Premier?
A. John Diefenbaker
B. Tommy Douglas
C. Wilfrid Laurier
D. Pierre Trudeau
Answer: B. Tommy Douglas


243.
True or False:
Tommy Douglas is often called the father of Canada’s public healthcare system.
Answer: True


244.
Multiple Choice:
In which year did Saskatchewan implement the first publicly funded healthcare plan in North America?
A. 1935
B. 1947
C. 1959
D. 1965
Answer: B. 1947


245.
True or False:
Saskatchewan has a unicameral legislature, meaning it has only one legislative chamber.
Answer: True


246.
Multiple Choice:
What is Saskatchewan’s main economic sector?
A. Technology
B. Manufacturing
C. Agriculture and natural resources
D. Tourism
Answer: C. Agriculture and natural resources


247.
True or False:
Saskatchewan’s Premier is elected directly by the public in a province-wide vote.
Answer: False
(Premiers are chosen as leaders of the political party that wins the most seats in the legislature.)


248.
Multiple Choice:
What is the largest lake located entirely within Saskatchewan?
A. Lake Athabasca
B. Reindeer Lake
C. Lac La Ronge
D. Last Mountain Lake
Answer: C. Lac La Ronge


249.
True or False:
Reindeer Lake is partially located in both Saskatchewan and Manitoba.
Answer: True


250.
Multiple Choice:
What is a common nickname for the residents of Saskatchewan?
A. Prairie Dwellers
B. Saskatchewanians
C. Flatlanders
D. Saskies
Answer: D. Saskies


251.
True or False:
The province of Saskatchewan was part of Confederation in 1867.
Answer: False
(Saskatchewan became a province in 1905.)


252.
Multiple Choice:
Which of the following is a popular summer event in Saskatchewan?
A. Calgary Stampede
B. Saskatoon Jazz Festival
C. Winterlude
D. Just for Laughs
Answer: B. Saskatoon Jazz Festival

253.
True or False:
Saskatchewan’s economy relies significantly on potash mining.
Answer: True


254.
Multiple Choice:
What is the role of the Lieutenant Governor in Saskatchewan?
A. Leader of the opposition
B. Provincial budget officer
C. The Queen’s representative
D. Speaker of the House
Answer: C. The Queen’s representative


255.
True or False:
The Lieutenant Governor of Saskatchewan is elected by citizens.
Answer: False
(The position is appointed by the Governor General on the advice of the Prime Minister.)


256.
Multiple Choice:
Which major religion has historically had a strong presence in Saskatchewan’s early settlement?
A. Buddhism
B. Islam
C. Christianity
D. Judaism
Answer: C. Christianity


257.
True or False:
The Doukhobors were a religious group that settled in Saskatchewan from Russia.
Answer: True



258.
Multiple Choice:
Which museum in Regina features exhibits on natural history and Indigenous cultures?
A. Glenbow Museum
B. Royal Saskatchewan Museum
C. Canadian Museum of History
D. MacKenzie Art Gallery
Answer: B. Royal Saskatchewan Museum


259.
True or False:
The MacKenzie Art Gallery is located in Saskatoon.
Answer: False
(It is located in Regina.)


260.
Multiple Choice:
Which treaty covers much of southern Saskatchewan?
A. Treaty 3
B. Treaty 4
C. Treaty 6
D. Treaty 7
Answer: B. Treaty 4


261.
True or False:
Saskatchewan’s education system is completely under federal government control.
Answer: False
(Education is a provincial responsibility.)


262.
Multiple Choice:
Which famous Prime Minister was born in Prince Albert, Saskatchewan?
A. Stephen Harper
B. Justin Trudeau
C. John Diefenbaker
D. Brian Mulroney
Answer: C. John Diefenbaker


263.
True or False:
John Diefenbaker was Canada’s first Francophone Prime Minister.
Answer: False
(He was the first Prime Minister from Saskatchewan, not a Francophone.)


264.
Multiple Choice:
What is the provincial motto of Saskatchewan?
A. Strong and Free
B. From Many Peoples Strength
C. The Land of Living Skies
D. Peace, Order, and Good Government
Answer: B. From Many Peoples Strength


265.
True or False:
“The Land of Living Skies” is Saskatchewan’s official motto.
Answer: False
(It is a tourism slogan, not the official motto.)


266.
Multiple Choice:
Which Country share a borders with Saskatchewan
A. U.S.A
B. Alberta
C. Manitoba
D. British Columbia
Answer: A. U.S.A


267.
True or False:
Saskatchewan shares a border with the U.S. state of North Dakota.
Answer: True


268.
Multiple Choice:
What is a Métis sash traditionally used for?
A. Farming
B. Ceremonial purposes and practical tool
C. Military uniform
D. School identification
Answer: B. Ceremonial purposes and practical tool


269.
True or False:
The Métis sash has no symbolic meaning.
Answer: False
(It has cultural and practical significance.)


270.
Multiple Choice:
Which of the following is an official symbol of Saskatchewan?
A. Prairie lily
B. Maple leaf
C. Beaver
D. Blue jay
Answer: A. Prairie lily


271.
True or False:
The official flower of Saskatchewan is the tulip.
Answer: False
(It is the western red lily or prairie lily.)


272.
Multiple Choice:
Which of the following sectors employs the most people in Saskatchewan?
A. Mining
B. Healthcare and social assistance
C. Tourism
D. Military
Answer: B. Healthcare and social assistance


273.
True or False:
The Canadian Forces Base Moose Jaw is known for training the Snowbirds.
Answer: True


274.
Multiple Choice:
Which city in Saskatchewan is home to the University of Saskatchewan?
A. Moose Jaw
B. Prince Albert
C. Saskatoon
D. Regina
Answer: C. Saskatoon


275.
True or False:
Regina is home to the University of Regina.
Answer: True


276.
Multiple Choice:
Which of the following is an annual multicultural festival in Saskatchewan?
A. Folk Fest
B. Winter Carnival
C. Canada Rocks
D. Prairie Parade
Answer: A. Folk Fest


277.
True or False:
Folk Fest is held only in Regina.
Answer: False
(It occurs in multiple cities, including Saskatoon.)


278.
Multiple Choice:
Saskatchewan’s northern half is primarily covered by:
A. Desert
B. Forest and lakes
C. Farmland
D. Tundra
Answer: B. Forest and lakes


279.
True or False:
Most of Saskatchewan’s population lives in the northern part of the province.
Answer: False
(Most people live in the southern half.)


280.
Multiple Choice:
Which Saskatchewan river flows into Hudson Bay?
A. North Saskatchewan River
B. South Saskatchewan River
C. Churchill River
D. Qu’Appelle River
Answer: C. Churchill River


281.
True or False:
The South Saskatchewan River is the primary water source for Saskatoon.
Answer: True


282.
Multiple Choice:
Which Saskatchewan-born athlete is a four-time Olympic gold medalist in hockey?
A. Hayley Wickenheiser
B. Christine Sinclair
C. Clara Hughes
D. Catriona Le May Doan
Answer: A. Hayley Wickenheiser


283.
True or False:
Hayley Wickenheiser played for the Saskatchewan Roughriders.
Answer: False
(She is a hockey player, not a football player.)


284.
Multiple Choice:
Which legislative building is the seat of Saskatchewan’s provincial government?
A. Confederation Building
B. Alberta Legislature
C. Saskatchewan Legislative Building
D. The Plains Building
Answer: C. Saskatchewan Legislative Building


285.
True or False:
Saskatchewan’s Legislative Assembly is located in Saskatoon.
Answer: False
(It is located in Regina.)


286.
Multiple Choice:
Which Indigenous group traditionally hunted bison in Saskatchewan?
A. Inuit
B. Métis
C. Plains Cree
D. Haida
Answer: C. Plains Cree


287.
True or False:
The Inuit are the dominant Indigenous group in Saskatchewan.
Answer: False
(They are primarily located in Canada’s North.)


288.
Multiple Choice:
Who is the current Premier of Saskatchewan? (As of 2025)
A. Scott Moe
B. Brad Wall
C. Rachel Notley
D. Wab Kinew
Answer: A. Scott Moe


289.
True or False:
Scott Moe is the federal Minister of Health.
Answer: False
(He is the Premier of Saskatchewan.)


290.
Multiple Choice:
Which Canadian province has no natural borders such as mountains or oceans?
A. British Columbia
B. Quebec
C. Saskatchewan
D. Newfoundland and Labrador
Answer: C. Saskatchewan


291.
True or False:
Saskatchewan is the only province with man-made borders.
Answer: False
(Manitoba also has straight, surveyed borders.)


292.
Multiple Choice:
What type of government in Saskatchewan
A. Dictatorship
B. Constitutional monarchy with parliamentary democracy
C. Republic
D. Monarchy without Parliament
Answer: B. Constitutional monarchy with parliamentary democracy


293.
True or False:
Saskatchewan’s Lieutenant Governor is elected by the people.
Answer: False
(The Lieutenant Governor is appointed by the Governor General.)


294. 
Multiple Choice:
Who represents the British monarch in Saskatchewan?
A. The Prime Minister
B. The Speaker of the House
C. The Lieutenant Governor
D. The Chief Justice
Answer: C. The Lieutenant Governor


295.
True or False:
The Lieutenant Governor of Saskatchewan is the ceremonial head of the province.
Answer: True


296.
Multiple Choice:
Which two official languages are spoken across Canada, including in Saskatchewan?
A. English and Cree
B. English and French
C. English and Spanish
D. French and German
Answer: B. English and French


297.
True or False:
Only English is officially recognized in Saskatchewan.
Answer: False
(Both English and French are official languages of Canada.)


298.
Multiple Choice:
Which political party is currently in power in Saskatchewan? (As of 2025)
A. Liberal Party
B. New Democratic Party (NDP)
C. Saskatchewan Party
D. Green Party
Answer: C. Saskatchewan Party


299.
True or False:
The Saskatchewan Party is a federal political party.
Answer: False
(It is a provincial party.)


300.
Multiple Choice:
What is the largest lake entirely within Saskatchewan?
A. Lake Athabasca
B. Lake Superior
C. Reindeer Lake
D. Wollaston Lake
Answer: D. Wollaston Lake


301.
True or False:
Lake Superior is located entirely in Saskatchewan.
Answer: False
(It is shared by Ontario and the United States.)


302.
Multiple Choice:
What is the primary responsibility of the Members of the Legislative Assembly (MLAs) in Saskatchewan?
A. Deliver the federal budget
B. Represent Saskatchewan in the Senate
C. Make provincial laws and policies
D. Appoint the Governor General
Answer: C. Make provincial laws and policies


303.
True or False:
MLAs in Saskatchewan are appointed by the Prime Minister.
Answer: False
(MLAs are elected by the people of their constituencies.)


304.
Multiple Choice:
Which two major cities are located in Saskatchewan?
A. Edmonton and Calgary
B. Saskatoon and Regina
C. Winnipeg and Churchill
D. Vancouver and Victoria
Answer: B. Saskatoon and Regina


305.
True or False:
Saskatoon is the capital city of Saskatchewan.
Answer: False
(Regina is the capital city.)


306.
Multiple Choice:
What is a significant crop grown in Saskatchewan?
A. Rice
B. Coffee
C. Wheat
D. Pineapples
Answer: C. Wheat


307.
True or False:
Saskatchewan is a leading exporter of wheat.
Answer: True


308.
Multiple Choice:
What mineral is Saskatchewan the world’s largest exporter of?
A. Gold
B. Potash
C. Silver
D. Nickel
Answer: B. Potash


309.
True or False:
Potash is used in fertilizer production.
Answer: True


310.
Multiple Choice:
Which Saskatchewan university is known for its medical research and agriculture programs?
A. University of Toronto
B. McGill University
C. University of Saskatchewan
D. University of Alberta
Answer: C. University of Saskatchewan


311.
True or False:
The University of Saskatchewan is located in Regina.
Answer: False
(It is located in Saskatoon.)


312.
Multiple Choice:
What is the responsibility of the Premier of Saskatchewan?
A. Appoint the Senate
B. Head the federal opposition
C. Lead the provincial government
D. Serve as monarch’s representative
Answer: C. Lead the provincial government


313.
True or False:
The Premier is appointed by the Lieutenant Governor with no elections.
Answer: False
(The Premier is usually the leader of the party that wins the most seats in the provincial election.)


314.
Multiple Choice:
Which body of water forms part of Saskatchewan’s northern border?
A. Arctic Ocean
B. Hudson Bay
C. Great Bear Lake
D. Lake Ontario
Answer: B. Hudson Bay


315.
True or False:
Saskatchewan borders the Pacific Ocean.
Answer: False
(Saskatchewan is landlocked.)


316.
Multiple Choice:
Which Indigenous language is widely spoken in Saskatchewan?
A. Inuktitut
B. Cree
C. Mohawk
D. Tlingit
Answer: B. Cree


317.
True or False:
Cree is one of the Indigenous languages recognized in Saskatchewan.
Answer: True


318.
Multiple Choice:
Which Saskatchewan event celebrates rodeo and cowboy culture?
A. Calgary Stampede
B. Regina Folk Festival
C. Frontier Days in Swift Current
D. Winterlude
Answer: C. Frontier Days in Swift Current


319.
True or False:
Winterlude is hosted annually in Saskatchewan.
Answer: False
(Winterlude is held in Ottawa.)


320.
Multiple Choice:
Which province lies directly west of Saskatchewan?
A. Ontario
B. British Columbia
C. Alberta
D. Manitoba
Answer: C. Alberta


321.
True or False:
Saskatchewan shares a border with British Columbia.
Answer: False
(Alberta lies between Saskatchewan and British Columbia.)


322.
Multiple Choice:
Which political party is currently in power in Saskatchewan (as of 2025)?
A. New Democratic Party (NDP)
B. Saskatchewan Party
C. Liberal Party
D. Conservative Party of Canada
Answer: B. Saskatchewan Party


323.
True or False:
The Saskatchewan Party is a provincial political party.
Answer: True

324.
Multiple Choice:
Who is the current Premier of Saskatchewan (2025)?
A. Wab Kinew
B. Danielle Smith
C. Scott Moe
D. Justin Trudeau
Answer: C. Scott Moe


325.
True or False:
Scott Moe is the federal Minister of Agriculture.
Answer: False
(He is the Premier of Saskatchewan.)


326.
Multiple Choice:
What year did Saskatchewan join Confederation?
A. 1871
B. 1905
C. 1949
D. 1867
Answer: B. 1905


327.
True or False:
Saskatchewan joined Canada in 1905.
Answer: True


328.
Multiple Choice:
What are the main industries in Saskatchewan?
A. Oil, forestry, seafood
B. Mining, agriculture, oil and gas
C. Shipbuilding, banking, education
D. Tourism, steel, software
Answer: B. Mining, agriculture, oil and gas


329.
True or False:
Saskatchewan’s economy is mainly based on fishing.
Answer: False
(It’s based on mining, oil, and agriculture.)


330.
Multiple Choice:
What type of government does Saskatchewan have?
A. Federal monarchy
B. Dictatorship
C. Provincial parliamentary democracy
D. Senate republic
Answer: C. Provincial parliamentary democracy


331.
True or False:
The Premier of Saskatchewan is elected by popular vote.
Answer: False
(The Premier is usually the leader of the political party that wins the most seats in the legislature.)


332.
Multiple Choice:
What is the provincial flower of Saskatchewan?
A. Wild Rose
B. Prairie Lily
C. Trillium
D. Violet
Answer: B. Prairie Lily


333.
True or False:
The Prairie Lily is a national symbol of Canada.
Answer: False
(It is a provincial symbol of Saskatchewan.)


334.
Multiple Choice:
What is the primary function of the Legislative Assembly of Saskatchewan?
A. Enforce the law
B. Create federal immigration rules
C. Pass provincial laws
D. Provide police services
Answer: C. Pass provincial laws


335.
True or False:
The Legislative Assembly of Saskatchewan is located in Saskatoon.
Answer: False
(It is located in Regina.)


336.
Multiple Choice:
Who represents the Crown in Saskatchewan?
A. Premier
B. Lieutenant Governor
C. Chief Justice
D. Senator
Answer: B. Lieutenant Governor


337.
True or False:
The Lieutenant Governor of Saskatchewan is appointed by the Prime Minister of Canada.
Answer: True


338.
Multiple Choice:
Which historic agreement is associated with Indigenous people in Saskatchewan?
A. Confederation Act
B. Treaty 4
C. Balfour Declaration
D. NAFTA
Answer: B. Treaty 4


339.
True or False:
Treaty 4 covers parts of Saskatchewan.
Answer: True

340.
Multiple Choice:
Which of the following is a major environmental region in Saskatchewan?
A. Boreal forest
B. Rocky Mountains
C. Canadian Shield
D. Gulf Islands
Answer: A. Boreal forest


341.
True or False:
The Gulf Islands are located in Saskatchewan.
Answer: False
(They are in British Columbia.)

342.
Multiple Choice:
Which city is the largest in Saskatchewan by population?
A. Regina
B. Prince Albert
C. Moose Jaw
D. Saskatoon
Answer: D. Saskatoon

343.
True or False:
Regina is the largest city in Saskatchewan.
Answer: False
(Saskatoon is the largest; Regina is the capital.)


344.
Multiple Choice:
Which important Canadian institution is located in Regina?
A. Supreme Court
B. Royal Canadian Mounted Police RCMP Training Depot
C. Parliament Hill
D. Bank of Canada
Answer: B. Royal Canadian Mounted Police RCMP Training Depot


345.
True or False:
The RCMP Training Academy is located in Saskatoon.
Answer: False
(It is located in Regina.)

346.
Multiple Choice:
What is the role of a Member of the Legislative Assembly (MLA) in Saskatchewan?
A. Represent the province in the Senate
B. Represent constituents and pass provincial laws
C. Serve on the Supreme Court
D. Appoint federal cabinet members
Answer: B. Represent constituents and pass provincial laws


347.
True or False:
MLAs are appointed by the federal government.
Answer: False
(They are elected by provincial voters.)


348.
Multiple Choice:
Which province borders Saskatchewan to the west?
A. Manitoba
B. British Columbia
C. Alberta
D. Ontario
Answer: C. Alberta


349.
True or False:
Manitoba is west of Saskatchewan.
Answer: False
(Manitoba is east of Saskatchewan.)

350.
Multiple Choice:
Which province borders Saskatchewan to the east?
A. Alberta
B. British Columbia
C. Manitoba
D. Quebec
Answer: C. Manitoba


351.
True or False:
Saskatchewan is located in Atlantic Canada.
Answer: False
(It is in Western Canada.)

352.
Multiple Choice:
What is the provincial bird of Saskatchewan?
A. Great Horned Owl
B. Snowy Owl
C. Sharp-tailed Grouse
D. Canada Goose
Answer: C. Sharp-tailed Grouse


353.
True or False:
The Sharp-tailed Grouse is native to Saskatchewan.
Answer: True



354.
Multiple Choice:
What is the Saskatchewan provincial motto?
A. Glorious and Free
B. Multis e gentibus vires
C. Strong and Free
D. From Many Peoples Strength
Answer: D. From Many Peoples Strength


355.
True or False:
Saskatchewan’s motto is “From Many Peoples Strength.”
Answer: True


356.
Multiple Choice:
Who is eligible to vote in Saskatchewan’s provincial elections?
A. Any Canadian citizen living in Canada
B. Permanent residents
C. Canadian citizens 18+ who live in Saskatchewan
D. Visitors with valid visas
Answer: C. Canadian citizens 18+ who live in Saskatchewan


357.
True or False:
Only citizens aged 21 and older can vote in Saskatchewan.
Answer: False
(The minimum voting age is 18.)


358.
Multiple Choice:
Which is a major crop grown in Saskatchewan?
A. Sugarcane
B. Rice
C. Wheat
D. Pineapple
Answer: C. Wheat


359.
True or False:
Saskatchewan is known as one of Canada’s leading wheat producers.
Answer: True


360.
Multiple Choice:
Which river flows through both Saskatoon and Prince Albert?
A. Fraser River
B. St. Lawrence River
C. Saskatchewan River
D. South Saskatchewan River
Answer: D. South Saskatchewan River

361.
True or False:
The Fraser River flows through Saskatoon.
Answer: False
(It flows in British Columbia.)


362.
Multiple Choice:
Which natural region covers most of northern Saskatchewan?
A. Prairie Grasslands
B. Boreal Forest
C. Arctic Tundra
D. Rocky Mountains
Answer: B. Boreal Forest


363.
True or False:
Southern Saskatchewan is mainly covered by forests.
Answer: False
(Southern Saskatchewan is primarily prairie and farmland.)


364.
Multiple Choice:
Which major uranium mining area is found in northern Saskatchewan?
A. Estevan Basin
B. Athabasca Basin
C. Cypress Hills
D. Hudson Bay Lowlands
Answer: B. Athabasca Basin


365.
True or False:
Saskatchewan is a world leader in uranium production.
Answer: True


366.
Multiple Choice:
What is the name of Saskatchewan’s official opposition party as of 2025?
A. Saskatchewan Party
B. Liberal Party
C. New Democratic Party (NDP)
D. Conservative Party
Answer: C. New Democratic Party (NDP)


367.
True or False:
The official opposition in Saskatchewan in 2025 is the Conservative Party.
Answer: False
(It is the NDP.)


368.
Multiple Choice:
Which of these is a responsibility of the provincial government in Saskatchewan?
A. National defense
B. Citizenship
C. Health care delivery
D. Currency printing
Answer: C. Health care delivery


369.
True or False:
The provincial government handles immigration directly.
Answer: False
(Immigration is primarily a federal responsibility.)


370.
Multiple Choice:
What is the northernmost large town in Saskatchewan?
A. Prince Albert
B. La Ronge
C. North Battleford
D. Yorkton
Answer: B. La Ronge


371.
True or False:
La Ronge is located in southern Saskatchewan.
Answer: False
(It is in the north.)


372.
Multiple Choice:
Which Indigenous group has a strong presence in Saskatchewan?
A. Inuit
B. Métis
C. Acadians
D. Haida
Answer: B. Métis



373.
True or False:
The Inuit population is the largest Indigenous group in Saskatchewan.
Answer: False
(The Métis and First Nations have a larger presence.)


374.
Multiple Choice:
What event recognizes and celebrates Indigenous cultures in Saskatchewan?
A. Canada Day
B. National Indigenous Peoples Day
C. Labour Day
D. Thanksgiving
Answer: B. National Indigenous Peoples Day


375.
True or False:
National Indigenous Peoples Day is held in September.
Answer: False
(It is celebrated on June 21.)


376.
Multiple Choice:
Which Saskatchewan city is known for the Wanuskewin Heritage Park?
A. Regina
B. Saskatoon
C. Estevan
D. Moose Jaw
Answer: B. Saskatoon


377.
True or False:
Wanuskewin Heritage Park is a UNESCO World Heritage Site.
Answer: False
(It has been proposed but is not yet a UNESCO World Heritage Site.)


378.
Multiple Choice:
Which Saskatchewan festival celebrates Ukrainian heritage?
A. Folkfest
B. Mosaic
C. Veselka
D. Winterlude
Answer: C. Veselka


379.
True or False:
Veselka is a music festival in British Columbia.
Answer: False
(Veselka is held in Saskatchewan to celebrate Ukrainian culture.)


380.
Multiple Choice:
What is the role of the Premier of Saskatchewan?
A. Represent Canada abroad
B. Head the federal cabinet
C. Head the provincial government
D. Judge provincial courts
Answer: C. Head the provincial government


381.
True or False:
The Premier of Saskatchewan is elected by the public.
Answer: False
(The Premier is the leader of the party with the most seats in the legislature.)


382.
Multiple Choice:
Which Saskatchewan city is home to the Western Development Museum?
A. Yorkton
B. Estevan
C. Moose Jaw
D. Saskatoon
Answer: D. Saskatoon

383.
True or False:
The Western Development Museum focuses only on military history.
Answer: False
(It focuses on transportation, agriculture, and pioneer history.)

384.
Multiple Choice:
What was the population of Saskatchewan in the 2021 census?
A. 500,000
B. 1 million
C. 1.2 million
D. 2 million
Answer: C. 1.2 million


385.
True or False:
Saskatchewan is the most populated province in Canada.
Answer: False
(Ontario holds that distinction.)


386.
Multiple Choice:
What year did Saskatchewan become a province of Canada?
A. 1867
B. 1870
C. 1905
D. 1912
Answer: C. 1905


387.
True or False:
Saskatchewan became a province the same year as Alberta.
Answer: True

388.
Multiple Choice:
Who was Saskatchewan’s first Premier?
A. Tommy Douglas
B. James Gardiner
C. Walter Scott
D. Roy Romanow
Answer: C. Walter Scott


389.
True or False:
Tommy Douglas was the first Premier of Saskatchewan.
Answer: False
(He was Premier later and known for introducing Medicare.)


390.
Multiple Choice:
Which Saskatchewan political figure is known as the “Father of Medicare”?
A. John Diefenbaker
B. Roy Romanow
C. Tommy Douglas
D. Brad Wall
Answer: C. Tommy Douglas


391.
True or False:
Tommy Douglas introduced universal health care in Saskatchewan.
Answer: True


392.
Multiple Choice:
Which famous Canadian Prime Minister was born in Saskatchewan?
A. Justin Trudeau
B. John A. Macdonald
C. Stephen Harper
D. John Diefenbaker
Answer: D. John Diefenbaker


393.
True or False:
John Diefenbaker was Canada’s first French Canadian Prime Minister.
Answer: False
(That was Wilfrid Laurier; Diefenbaker was from Saskatchewan.)

394.
Multiple Choice:
What was a major political achievement of John Diefenbaker?
A. Constitution Act
B. Bilingualism Policy
C. Bill of Rights
D. Meech Lake Accord
Answer: C. Bill of Rights


395.
True or False:
The Canadian Bill of Rights came after the Charter of Rights and Freedoms.
Answer: False
(The Bill of Rights came first, in 1960.)


396.
Multiple Choice:
What is the primary natural resource exported from Saskatchewan?
A. Diamonds
B. Oil
C. Potash
D. Coal
Answer: C. Potash


397.
True or False:
Saskatchewan is the world’s leading producer of potash.
Answer: True


398.
Multiple Choice:
Which of the following is a Crown corporation in Saskatchewan?
A. SaskPower
B. Bell Canada
C. Canadian Tire
D. CN Rail
Answer: A. SaskPower

399.
True or False:
SaskTel is a Crown corporation owned by the federal government.
Answer: False
(SaskTel is owned by the province of Saskatchewan.)

400.
Multiple Choice:
Which major Saskatchewan highway runs east to west across the province?
A. Highway 16 (Yellowhead)
B. Highway 1
C. Highway 11
D. Highway 7
Answer: B. Highway 1 (Trans-Canada)
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Saskatchewan.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Saskatchewan.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $saskatchewan->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Saskatchewan citizenship questions.");
    }
}



