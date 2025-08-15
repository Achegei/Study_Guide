<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OntarioQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $ontario = CourseSection::firstOrCreate(
            ['title' => 'Ontario'],
            [
                'type' => 'province',
                'capital' => 'Toronto',
                'flag' => '/images/flags/ontario.png',
                'description' => 'Questions specific to Ontario.',
                'summary_audio_url' => '/audio/summary_ontario.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $ontario->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.
Multiple Choice:
What is the capital city of Ontario?
A. Ottawa
B. Hamilton
C. Toronto
D. Mississauga
Answer: C. Toronto

2.
True or False:
Ontario is the largest province in Canada by land area.
Answer: False
(Quebec is the largest province by land area, not Ontario.)

3.
Multiple Choice:
Which lake borders southern Ontario?
A. Lake Winnipeg
B. Lake Ontario
C. Great Bear Lake
D. Lake Michigan
Answer: B. Lake Ontario

4.
True or False:
Toronto is the city in Canada with most population.
Answer: True

5.
Multiple Choice:
What is the name of the provincial legislature in Ontario?
A. Legislative Assembly of Canada
B. Ontario Assembly
C. Legislative Assembly of Ontario
D. House of Commons
Answer: C. Legislative Assembly of Ontario

6.
True or False:
The Ontario Legislative Assembly is located in Ottawa.
Answer: False
(It is located at Queen’s Park in Toronto, not Ottawa.)

7.
Multiple Choice:
Which flower is the official floral emblem of Ontario?
A. Rose
B. Trillium
C. Tulip
D. Daisy
Answer: B. Trillium

8.
True or False:
Ontario is part of Atlantic Canada.
Answer: False
(Ontario is in Central Canada, not Atlantic Canada.)

9.
Multiple Choice:
Which major waterfall is located on the border of Ontario and the United States?
A. Victoria Falls
B. Angel Falls
C. Niagara Falls
D. Iguazu Falls
Answer: C. Niagara Falls

10.
True or False:
Niagara Falls is located entirely in Quebec.
Answer: False
(Niagara Falls straddles the border between Ontario and New York, USA.)

11.
Multiple Choice:
Which political party is currently in power in Ontario (as of 2025)?
A. Liberal Party
B. Progressive Conservative Party
C. New Democratic Party
D. Green Party
Answer: B. Progressive Conservative Party

12.
True or False:
Doug Ford is the Premier of Ontario.
Answer: True

13.
Multiple Choice:
Which body of water does not border Ontario?
A. Lake Erie
B. Hudson Bay
C. Lake Superior
D. Pacific Ocean
Answer: D. Pacific Ocean

14.
True or False:
Ontario shares a border with Manitoba.
Answer: True

15.
Multiple Choice:
What is a major industry in Northern Ontario?
A. Fishing
B. Forestry
C. Shipbuilding
D. Aerospace
Answer: B. Forestry

16.
True or False:
Forestry is one of the major industries in Southern Ontario.
Answer: False
(Southern Ontario is more known for manufacturing and technology industries.)

17.
Multiple Choice:
What is the largest university in Ontario by student population?
A. Queen’s University
B. University of Guelph
C. University of Toronto
D. Western University
Answer: C. University of Toronto

18.
True or False:
The University of Toronto is located in Ottawa.
Answer: False
(The University of Toronto is located in Toronto, not Ottawa.)

19.
Multiple Choice:
Which city is known as the national capital of Canada and is located in Ontario?
A. Toronto
B. Mississauga
C. Ottawa
D. Brampton
Answer: C. Ottawa

20.
True or False:
Ottawa is located in the province of Ontario.
Answer: True

21.
Multiple Choice:
Which city is home to the Ontario Science Centre?
A. Ottawa
B. Toronto
C. Kingston
D. Windsor
Answer: B. Toronto

22.
True or False:
Ontario was one of the four original provinces in Confederation.
Answer: True

23.
Multiple Choice:
What is the official sport of Ontario?
A. Baseball
B. Hockey
C. Basketball
D. Ontario does not have an official sport
Answer: D. Ontario does not have an official sport

24.
True or False:
Toronto is the capital of Canada.
Answer: False
(Ottawa is the capital of Canada, not Toronto.)

25.
Multiple Choice:
What is the name of the provincial police in Ontario?
A. Royal Canadian Mounted Police
B. Ontario Safety Patrol
C. Ontario Provincial Police
D. Toronto Metropolitan Police
Answer: C. Ontario Provincial Police

26.
True or False:
The Ontario Provincial Police is responsible for law enforcement across the entire country.
Answer: False
(The Ontario Provincial Police (OPP) serve only within the province of Ontario.)

27.
Multiple Choice:
Which major economic sector is associated with Southern Ontario?
A. Oil production
B. Mining
C. Manufacturing
D. Fishing
Answer: C. Manufacturing

28.
True or False:
Ontario has the highest population of any Canadian province.
Answer: True

29.
Multiple Choice:
Which major national park is located in Ontario?
A. Jasper National Park
B. Banff National Park
C. Bruce Peninsula National Park
D. Yoho National Park
Answer: C. Bruce Peninsula National Park

30.
True or False:
Banff National Park is located in Ontario.
Answer: False
(Banff National Park is located in Alberta, not Ontario.)

31.
Multiple Choice:
Which river forms part of Ontario's border with the United States?
A. Red River
B. St. Lawrence River
C. Ottawa River
D. Fraser River
Answer: B. St. Lawrence River

32.
True or False:
The Ottawa River separates Ontario and Manitoba.
Answer: False
(The Ottawa River separates Ontario and Quebec.)

33. 
Multiple Choice:
Which Ontario city is known for its steel industry?
A. London
B. Hamilton
C. Kingston
D. Barrie
Answer: B. Hamilton

34.
True or False:
Hamilton is known as the automotive capital of Ontario.
Answer: False
(Windsor is known as the automotive capital of Ontario, not Hamilton.)

35.
Multiple Choice:
What is the main responsibility of Members of Provincial Parliament (MPPs) in Ontario?
A. Enforce laws
B. Interpret laws
C. Make laws for Ontario
D. Collect taxes
Answer: C. Make laws for Ontario

36.
True or False:
Ontario's Premier is the head of the federal government.
Answer: False
(The Premier is the head of the provincial government, not the federal government.)

37.
Multiple Choice:
Which international border crossing is located in Ontario?
A. Blue Water Bridge
B. Peace Arch
C. Ambassador Bridge
D. Both A and C
Answer: D. Both A and C

38.
True or False:
The Ambassador Bridge connects Ontario to New York.
Answer: False
(The Ambassador Bridge connects Windsor, Ontario to Detroit, Michigan.)

39.
Multiple Choice:
What is Ontario's provincial motto?
A. From Sea to Sea
B. Loyal She Began, Loyal She Remains
C. Splendour Without Diminishment
D. Ut Incepit Fidelis Sic Permanet
Answer: D. Ut Incepit Fidelis Sic Permanet

40.
True or False:
Ontario's motto is in French.
Answer: False
(Ontario's motto is in Latin: 'Ut Incepit Fidelis Sic Permanet' (Loyal she began, loyal she remains).)

41.
Multiple Choice:
Which of the following is a major agricultural region in Ontario?
A. Northern Shield
B. Niagara Peninsula
C. Georgian Bay
D. Hudson Plains
Answer: B. Niagara Peninsula

42.
True or False:
The Niagara Peninsula is known for its wine production.
Answer: True

43.
Multiple Choice:
What is the name of Ontario's Lieutenant Governor (as of 2025)?
A. Elizabeth Dowdeswell
B. Edith Dumont
C. Mary Simon
D. Janice Filmon
Answer: B. Edith Dumont

44.
True or False:
The Lieutenant Governor of Ontario represents the federal Prime Minister.
Answer: False
(The Lieutenant Governor represents the King of Canada, not the federal Prime Minister.)

45.
Multiple Choice:
Which level of government is responsible for education in Ontario?
A. Federal
B. Provincial
C. Municipal
D. International
Answer: B. Provincial

46.
True or False:
The federal government manages elementary schools in Ontario.
Answer: False
(Education is a provincial responsibility.)

47.
Multiple Choice:
What is a key responsibility of municipal governments in Ontario?
A. Military defense
B. Healthcare
C. Waste collection
D. Immigration enforcement
Answer: C. Waste collection

48.
True or False:
Municipal governments in Ontario are led by premiers.
Answer: False
(Municipal governments are typically led by mayors or council chairs, not premiers.)

49. 
Multiple Choice:
Which of these cities is located in Eastern Ontario?
A. Thunder Bay
B. London
C. Kingston
D. Sault Ste. Marie
Answer: C. Kingston

50. 
True or False:
Kingston is located in Western Ontario.
Answer: False
(Kingston is located in Eastern Ontario.)

51.
Multiple Choice:
Which Ontario city is known for being a technology?
A. Waterloo
B. Sudbury
C. North Bay
D. Brockville
Answer: A. Waterloo

52.
True or False:
Waterloo is part of the 'Technology Triangle' in Ontario.
Answer: True

53.
Multiple Choice:
What is the name of Ontario's public health insurance plan?
A. OHIP
B. Medica
C. Ontario Health
D. HealthNet
Answer: A. OHIP

54.
True or False:
OHIP provides public health coverage in Ontario.
Answer: True

55.
Multiple Choice:
Which province borders Manitoba to the East?
A. Quebec
B. Ontario
C. Alberta
D. Saskatchewan
Answer: B. Ontario

56.
True or False:
Ontario borders Alberta to the west.
Answer: False
(Manitoba borders Ontario to the west, not Alberta.)

57. 
Multiple Choice:
Which Ontario city is home to Canada's Wonderland?
A. Brampton
B. Mississauga
C. Vaughan
D. Barrie
Answer: C. Vaughan

58.
True or False:
Canada's Wonderland is located in Vaughan, Ontario.
Answer: True

59.
Multiple Choice:
Which of the following is a provincial park in Ontario?
A. Algonquin Provincial Park
B. Jasper National Park
C. Gros Morne
D. Fundy National Park
Answer: A. Algonquin Provincial Park

60.
True or False:
Algonquin Park is one of the oldest provincial parks in Canada.
Answer: True

61.
Multiple Choice:
Which university is located in Kingston?
A. University of Ottawa
B. Queen’s University
C. University of Toronto
D. Western University
Answer: B. Queen’s University

62.
True or False:
Queen’s University is located in Kingston, manitoba
Answer: False

63.
Multiple Choice:
Which Great Lake is entirely within the United States?
A. Lake Ontario
B. Lake Michigan
C. Lake Erie
D. Lake Huron
Answer: B. Lake Michigan

64.
True or False:
Lake Ontario is entirely within the United States.
Answer: False
(Lake Ontario borders both Canada and the United States.)

65.
Multiple Choice:
Which political party is currently leading the Ontario provincial government? (As of 2025)
A. Ontario Liberal Party
B. Green Party
C. Progressive Conservative Party
D. Ontario New Democratic Party
Answer: C. Progressive Conservative Party

66.
True or False:
The Green Party is the ruling provincial party in Ontario.
Answer: False
(The Progressive Conservative Party is currently leading Ontario (as of 2025).)

67.
Multiple Choice:
Who is the current Premier of Ontario? (2025)
A. Doug Ford
B. Justin Trudeau
C. Bonnie Crombie
D. Andrea Horwath
Answer: A. Doug Ford

68.
True or False:
Justin Trudeau is the Premier of Ontario as of 2025.
Answer: False

69.
Multiple Choice:
Which large northern Ontario city is known for mining and natural resources?
A. Brampton
B. Sudbury
C. Guelph
D. Mississauga
Answer: B. Sudbury

70.
True or False:
Sudbury is located in southern Ontario.
Answer: False
(Sudbury is in Northern Ontario and is known for its mining industry.)

71.
Multiple Choice:
Which Ontario border city is across the river from Detroit, Michigan?
A. Hamilton
B. London
C. Windsor
D. Barrie
Answer: C. Windsor

72.
True or False:
Windsor is Ontario’s border city across from Buffalo, New York.
Answer: False
(Windsor borders Detroit, not Buffalo. Buffalo is near Niagara Falls.)

73.
Multiple Choice:
What is the legislative body of Ontario called?
A. Parliament Hill
B. House of Commons
C. Queen’s Park
D. The Ontario Assembly
Answer: C. Queen’s Park

74.
True or False:
Queen’s Park is the name of Ontario’s legislature.
Answer: True

75.
Multiple Choice:
What is Ontario’s provincial flower?
A. Maple Leaf
B. White Trillium
C. Lilac
D. Rose
Answer: B. White Trillium

76.
True or False:
Ontario’s official flower is the White Trillium.
Answer: True

77.
Multiple Choice:
Which festival is held annually in Stratford, Ontario?
A. Jazz Festival
B. Tulip Festival
C. Folk Festival
D. Stratford Shakespeare Festival
Answer: D. Stratford Shakespeare Festival

78.
True or False:
The Stratford Shakespeare Festival celebrates classical and modern theatre.
Answer: True

79.
Multiple Choice:
What is Ontario’s motto?
A. Glorious and Free
B. Loyal She Began, Loyal She Remains
C. Splendour Without Diminishment
D. Ut Incepit Fidelis Sic Permanet
Answer: D. Ut Incepit Fidelis Sic Permanet

80.
True or False:
Ontario’s motto is 'Loyal She Began, Loyal She Remains.'
Answer: False
(The correct motto is 'Ut Incepit Fidelis Sic Permanet' (Loyal she began, loyal she remains).)

81.
Multiple Choice:
Which Ontario city is famous for the Rideau Canal?
A. Ottawa
B. Kingston
C. Windsor
D. Guelph
Answer: A. Ottawa

82.
True or False:
The Rideau Canal is a UNESCO World Heritage Site.
Answer: True

83.
Multiple Choice:
Ontario is home to which of the following Indigenous groups?
A. Inuit
B. Métis
C. Tlingit
D. Inuvialuit
Answer: B. Métis

84.
True or False:
The Métis are one of the recognized Indigenous groups in Ontario.
Answer: True

85.
Multiple Choice:
Which Ontario city is home to McMaster University?
A. Hamilton
B. Ottawa
C. Thunder Bay
D. Toronto
Answer: A. Hamilton

86.
True or False:
McMaster University is located in Toronto.
Answer: False
(McMaster University is located in Hamilton, Ontario.)

87.
Multiple Choice:
Which Ontario town is known as the gateway to Algonquin Park?
A. Pembroke
B. Huntsville
C. Barrie
D. North Bay
Answer: B. Huntsville

88.
True or False:
Huntsville is known for its access to Algonquin Park.
Answer: True

89.
Multiple Choice:
Which famous waterfall is located in Ontario?
A. Takakkaw Falls
B. Helmcken Falls
C. Niagara Falls
D. Alexandra Falls
Answer: C. Niagara Falls

90.
True or False:
Niagara Falls is shared between Ontario and New York State.
Answer: True

91.
Multiple Choice:
What is the most populous city in Ontario?
A. Ottawa
B. Toronto
C. Mississauga
D. Hamilton
Answer: B. Toronto

92.
True or False:
Ottawa is the most populous city in Ontario.
Answer: False
(Toronto is the most populous city in Ontario.)

93.
Multiple Choice:
Which Ontario lake is known for its 'thousand islands'?
A. Lake Simcoe
B. Lake Erie
C. Lake Ontario
D. St. Lawrence River
Answer: D. St. Lawrence River

94.
True or False:
The Thousand Islands are located in the St. Lawrence River.
Answer: True

95.
Multiple Choice:
Which city is the capital of Ontario?
A. Ottawa
B. Mississauga
C. Toronto
D. Kingston
Answer: C. Toronto

96.
True or False:
Toronto is the capital city of Ontario.
Answer: True

97.
Multiple Choice:
Which transportation system connects Toronto to Montreal and Ottawa?
A. SkyTrain
B. VIA Rail
C. LRT
D. TTC
Answer: B. VIA Rail

98.
True or False:
VIA Rail operates only within Toronto.
Answer: False
(VIA Rail connects major cities across Canada, including Toronto, Montreal, and Ottawa.)

99.
Multiple Choice:
Which lake borders Toronto to the south?
A. Lake Erie
B. Lake Superior
C. Lake Ontario
D. Lake Huron
Answer: C. Lake Ontario

100.
True or False:
Toronto is located along Lake Ontario.
Answer: True

101.
Multiple Choice:
Which Ontario city is known for being a technology hub?
A. Thunder Bay
B. Waterloo
C. Sudbury
D. Cornwall
Answer: B. Waterloo

102.
True or False:
Waterloo is recognized as a leading tech hub in Ontario.
Answer: True

103.
Multiple Choice:
Which Ontario region is known for wine production?
A. Muskoka
B. Niagara Peninsula
C. Algonquin
D. Timmins
Answer: B. Niagara Peninsula

104.
True or False:
Niagara Peninsula is famous for its maple syrup production.
Answer: False
(Niagara Peninsula is known for wine production, not maple syrup.)

105.
Multiple Choice:
What is the name of the police force that operates in Ontario?
A. RCMP
B. Ontario Provincial Police
C. Ontario Civil Service
D. Canadian Security Agency
Answer: B. Ontario Provincial Police

106.
True or False:
The Ontario Provincial Police is responsible for policing the whole country.
Answer: False
(The OPP operates in Ontario. The RCMP operates across Canada.)

107.
Multiple Choice:
Which event is held annually in Toronto and celebrates Caribbean culture?
A. Winterlude
B. Caribana
C. Summerfest
D. Folk Fest
Answer: B. Caribana

108.
True or False:
Caribana is a Caribbean cultural festival held in Toronto.
Answer: True

109.
Multiple Choice:
What is the name of Ontario’s provincial parliament building?
A. The Hill
B. Ontario House
C. Queen’s Park
D. The Castle
Answer: C. Queen’s Park

110.
True or False:
Ontario House is the name of Ontario’s legislature.
Answer: False

111.
Multiple Choice:
Which Ontario city hosts the Canadian National Exhibition (CNE)?
A. Toronto
B. Ottawa
C. Kingston
D. Kitchener
Answer: A. Toronto

112.
True or False:
The Canadian National Exhibition (CNE) is held in Ottawa.
Answer: False
(The CNE is held annually in Toronto, not Ottawa.)

113.
Multiple Choice:
Which Ontario city is known for hosting Oktoberfest, the largest outside of Germany?
A. Toronto
B. Hamilton
C. Kitchener
D. Barrie
Answer: C. Kitchener

114.
True or False:
Kitchener, Ontario, hosts a major Oktoberfest celebration.
Answer: True

115.
Multiple Choice:
Which city is known as Ontario’s science and innovation centre?
A. Ottawa
B. Toronto
C. Guelph
D. Sudbury
Answer: B. Toronto

116.
True or False:
Toronto is a national centre for science and innovation in Ontario.
Answer: True

117.
Multiple Choice:
Where in Ontario is the Bruce Peninsula located?
A. North of Toronto
B. Between Lake Huron and Georgian Bay
C. Near the US border
D. Beside Lake Erie
Answer: B. Between Lake Huron and Georgian Bay

118.
True or False:
The Bruce Peninsula lies between Lake Huron and Georgian Bay.
Answer: True

119.
Multiple Choice:
Which body of water separates Ontario from Michigan?
A. Lake Simcoe
B. St. Lawrence River
C. Detroit River
D. Fraser River
Answer: C. Detroit River

120.
True or False:
The Detroit River separates Ontario from the state of Michigan.
Answer: True

121.
Multiple Choice:
Which Ontario city is home to the world’s longest skating rink in winter?
A. Kingston
B. Ottawa
C. Mississauga
D. Thunder Bay
Answer: B. Ottawa

122.
True or False:
Ottawa’s Rideau Canal becomes the world’s longest skating rink in winter.
Answer: True

123.
Multiple Choice:
Which major Ontario museum features Canadian history and artifacts?
A. Art Gallery of Ontario
B. Ontario Science Centre
C. Canadian Museum of History
D. Royal Ontario Museum
Answer: D. Royal Ontario Museum

124.
True or False:
The Royal Ontario Museum is one of the largest museums in North America.
Answer: True

125.
Multiple Choice:
Which city in Ontario is famous for its international film festival?
A. Ottawa
B. Toronto
C. London
D. Barrie
Answer: B. Toronto

126.
True or False:
The Toronto International Film Festival (TIFF) is a globally recognized event.
Answer: True

127.
Multiple Choice:
Which Ontario town is recognized for its Shakespearean theatre festival?
A. Stratford
B. Owen Sound
C. Guelph
D. Kingston
Answer: A. Stratford

128.
True or False:
Stratford is famous for hosting Canada’s largest Shakespearean theatre festival.
Answer: True

129.
Multiple Choice:
Which Ontario university specializes in agriculture and veterinary sciences?
A. University of Toronto
B. York University
C. University of Guelph
D. Carleton University
Answer: C. University of Guelph

130.
True or False:
The University of Guelph is known for its agriculture and veterinary programs.
Answer: True

131.
Multiple Choice:
Which Ontario town is located on the northern shore of Lake Superior?
A. North Bay
B. Windsor
C. Thunder Bay
D. Sarnia
Answer: C. Thunder Bay

132.
True or False:
Thunder Bay is located on the southern shore of Lake Ontario.
Answer: False
(Thunder Bay is located on the northern shore of Lake Superior, not Lake Ontario.)

133.
Multiple Choice:
Which of these is a major Ontario river that flows into Lake Erie?
A. Red River
B. Grand River
C. Fraser River
D. Peace River
Answer: B. Grand River

134.
True or False:
The Grand River flows into Lake Erie.
Answer: True

135.
Multiple Choice:
Which Ontario city is known for being a hub of manufacturing and auto production?
A. Waterloo
B. Windsor
C. Kingston
D. Brockville
Answer: B. Windsor

136.
True or False:
Windsor is one of Ontario’s leading centres of auto manufacturing.
Answer: True

137.
Multiple Choice:
Which Ontario airport is the busiest in Canada?
A. Ottawa International
B. Hamilton Airport
C. Pearson International
D. Billy Bishop Toronto City Airport
Answer: C. Pearson International

138.
True or False:
Pearson International Airport is the busiest airport in Canada.
Answer: True

139.
Multiple Choice:
Which major railway system helped connect Ontario with Western Canada?
A. GO Transit
B. CN Rail
C. Ontario Northland
D. VIA Rail
Answer: B. CN Rail

140.
True or False:
The Canadian National Railway played a key role in Canada’s expansion westward.
Answer: True

141.
Multiple Choice:
Which Ontario lake is part of the Great Lakes and borders Toronto?
A. Lake Superior
B. Lake Huron
C. Lake Ontario
D. Lake Erie
Answer: C. Lake Ontario

142.
True or False:
Lake Ontario borders the city of Toronto.
Answer: True

143.
Multiple Choice:
What is the name of Ontario’s Lieutenant Governor as of 2025?
A. Elizabeth Dowdeswell
B. Edith Dumont
C. Brenda Lucki
D. Bonnie Crombie
Answer: B. Edith Dumont

144.
True or False:
Edith Dumont serves as the Lieutenant Governor of Ontario in 2025.
Answer: True

145.
Multiple Choice:
Which city is the capital of Canada and located in Ontario?
A. Toronto
B. Ottawa
C. London
D. Kingston
Answer: B. Ottawa

146.
True or False:
Ottawa is the capital city of Canada and is located in Ontario.
Answer: True

147.
Multiple Choice:
What is Ontario’s official provincial flower?
A. Rose
B. White Trillium
C. Daffodil
D. Maple Leaf
Answer: B. White Trillium

148.
True or False:
The White Trillium is the official flower of Ontario.
Answer: True

149.
Multiple Choice:
Which Ontario Premier was elected in the 2022 provincial election?
A. Doug Ford
B. Kathleen Wynne
C. Bonnie Crombie
D. Andrea Horwath
Answer: A. Doug Ford

150.
True or False:
Doug Ford was re-elected as Premier of Ontario in 2022.
Answer: True

151.
Multiple Choice:
Which Ontario industry is a major contributor to Canada’s automotive production?
A. Mining
B. Farming
C. Manufacturing
D. Tourism
Answer: C. Manufacturing

152.
True or False:
Ontario is Canada’s leading province for car manufacturing.
Answer: True

153.
Multiple Choice:
Which Ontario region is famous for the Thousand Islands?
A. Lake Simcoe
B. Muskoka
C. St. Lawrence River
D. Georgian Bay
Answer: C. St. Lawrence River

154.
True or False:
The Thousand Islands are located along the St. Lawrence River in Ontario.
Answer: True

155.
Multiple Choice:
Which Ontario leader represents the provincial government as of 2025?
A. Doug Ford
B. Justin Trudeau
C. Jagmeet Singh
D. Marc Miller
Answer: A. Doug Ford

156.
True or False:
Doug Ford is the Premier of Ontario as of 2025.
Answer: True

157.
Multiple Choice:
Which natural wonder lies between Ontario and New York State?
A. The Rockies
B. Niagara Falls
C. Banff
D. Whistler
Answer: B. Niagara Falls

158.
True or False:
Niagara Falls is shared between Ontario and the U.S. state of New York.
Answer: True

159.
Multiple Choice:
What is the largest city in Ontario by population?
A. Mississauga
B. Ottawa
C. Toronto
D. Brampton
Answer: C. Toronto

160.
True or False:
Toronto is the most populous city in Ontario.
Answer: True

161.
Multiple Choice:
Which Ontario highway is considered one of the busiest in North America?
A. Highway 7
B. Highway 401
C. Queen Elizabeth Way
D. Don Valley Parkway
Answer: B. Highway 401

162.
True or False:
Highway 401 is among the busiest highways in North America.
Answer: True

163.
Multiple Choice:
Which Ontario city is known for its steel production industry?
A. Windsor
B. Hamilton
C. Sudbury
D. Barrie
Answer: B. Hamilton

164.
True or False:
Hamilton is often referred to as the 'Steel City' due to its steel industry.
Answer: True

165.
Multiple Choice:
Which province borders Ontario to the west?
A. Quebec
B. Alberta
C. Manitoba
D. British Columbia
Answer: C. Manitoba

166.
True or False:
Manitoba lies directly west of Ontario.
Answer: True

167.
Multiple Choice:
Which of the following cities is part of Ontario’s Golden Horseshoe?
A. Kingston
B. Thunder Bay
C. Mississauga
D. North Bay
Answer: C. Mississauga

168.
True or False:
Mississauga is located within Ontario’s Golden Horseshoe region.
Answer: True

169.
Multiple Choice:
What is the name of the large provincial park in northeastern Ontario?
A. Banff National Park
B. Algonquin Provincial Park
C. Jasper Park
D. Elk Island Park
Answer: B. Algonquin Provincial Park

170.
True or False:
Algonquin Provincial Park is located in northeastern Ontario.
Answer: True

171.
Multiple Choice:
Which Ontario city is a major center for the Canadian mining industry?
A. Toronto
B. Guelph
C. Sudbury
D. Windsor
Answer: C. Sudbury

172.
True or False:
Sudbury is a hub for the mining industry in Ontario.
Answer: True

173.
Multiple Choice:
Which Ontario city has a historic canal used for shipping and recreation?
A. Barrie
B. Sault Ste. Marie
C. Timmins
D. Kitchener
Answer: B. Sault Ste. Marie

174.
True or False:
The Sault Ste. Marie Canal is historically significant and used for shipping.
Answer: True

175.
Multiple Choice:
Which natural disaster occasionally affects Ontario’s forested areas?
A. Hurricanes
B. Earthquakes
C. Wildfires
D. Tsunamis
Answer: C. Wildfires

176.
True or False:
Wildfires can affect Ontario’s forest regions, especially during dry seasons.
Answer: True

177.
Multiple Choice:
What is the name of the major water body that connects Ontario to the Atlantic Ocean?
A. Lake Ontario
B. St. Lawrence River
C. Lake Erie
D. Red River
Answer: B. St. Lawrence River

178.
True or False:
The St. Lawrence River provides Ontario access to the Atlantic Ocean.
Answer: True

179.
Multiple Choice:
Which Ontario lake is the largest by surface area within the province?
A. Lake Erie
B. Lake Ontario
C. Lake Huron
D. Lake Simcoe
Answer: C. Lake Huron

180.
True or False:
Lake Huron is the largest lake by surface area in Ontario.
Answer: True

181.
Multiple Choice:
Which city is home to Canada's largest university by enrollment?
A. Waterloo
B. Kingston
C. Toronto
D. Guelph
Answer: C. Toronto

182.
True or False:
The University of Toronto is the largest in Canada by enrollment.
Answer: True

183.
Multiple Choice:
Which Ontario city is a key border crossing to the United States?
A. Thunder Bay
B. Kingston
C. Windsor
D. Ottawa
Answer: C. Windsor

184.
True or False:
Windsor is located across the border from Detroit, USA.
Answer: True

185.
Multiple Choice:
Which Ontario political party is currently in government (as of 2025)?
A. Ontario Liberal Party
B. Ontario NDP
C. Progressive Conservative Party of Ontario
D. Green Party of Ontario
Answer: C. Progressive Conservative Party of Ontario

186.
True or False:
As of 2025, the Progressive Conservative Party of Ontario forms the provincial government.
Answer: True

187.
Multiple Choice:
Who leads the Ontario Liberal Party as of 2025?
A. Steven Del Duca
B. Andrea Horwath
C. Bonnie Crombie
D. Mike Schreiner
Answer: C. Bonnie Crombie

188.
True or False:
Bonnie Crombie is the leader of the Ontario Liberal Party in 2025.
Answer: True

189.
Multiple Choice:
Which Ontario city is known for its international film festival?
A. Hamilton
B. Ottawa
C. Toronto
D. Mississauga
Answer: C. Toronto

190.
True or False:
Toronto hosts a major international film festival every year.
Answer: True

191.
Multiple Choice:
Which region is known for wine production?
A. Niagara Region
B. Sudbury
C. Timmins
D. Sault Ste. Marie
Answer: A. Niagara Region

192.
True or False:
The Niagara Region is famous for its vineyards and wine production.
Answer: True

193.
Multiple Choice:
What is the name of the Ontario legislative assembly building?
A. Queen’s Palace
B. Queen’s Park
C. Ontario House
D. Toronto Assembly
Answer: B. Queen’s Park

194.
True or False:
Ontario’s provincial legislature is located at Queen’s Park.
Answer: True

195.
Multiple Choice:
Which sector plays a major role in Ontario’s economy?
A. Agriculture
B. Fishing
C. Manufacturing
D. Oil
Answer: C. Manufacturing

196.
True or False:
Manufacturing is a leading contributor to Ontario’s economy.
Answer: True

197.
Multiple Choice:
Which Ontario attraction is a UNESCO World Heritage Site?
A. Niagara Falls
B. CN Tower
C. Rideau Canal
D. Parliament Hill
Answer: C. Rideau Canal

198.
True or False:
The Rideau Canal is a UNESCO World Heritage Site located partly in Ontario.
Answer: True

199.
Multiple Choice:
Which Ontario leader is responsible for ceremonial duties as of 2025?
A. Premier
B. Speaker of the Assembly
C. Lieutenant Governor
D. Finance Minister
Answer: C. Lieutenant Governor

200.
True or False:
The Lieutenant Governor of Ontario handles ceremonial roles in the province.
Answer: True

201.
Multiple Choice:
Which Ontario provincial park is famous for Indigenous pictographs on cliff walls?
A. Quetico Provincial Park
B. Killarney Provincial Park
C. Bon Echo Provincial Park
D. Algonquin Provincial Park
Answer: C. Bon Echo Provincial Park

202.
True or False:
Bon Echo Provincial Park is known for ancient Indigenous pictographs on Mazinaw Rock.
Answer: True

203.
Multiple Choice:
Which Ontario region has the highest population density?
A. Northern Ontario
B. Eastern Ontario
C. Golden Horseshoe
D. Muskoka Region
Answer: C. Golden Horseshoe

204.
True or False:
The Golden Horseshoe region in Ontario has the highest population density in the province.
Answer: True

205.
Multiple Choice:
Which Ontario leader serves as the head of the provincial government?
A. Lieutenant Governor
B. Speaker of the House
C. Premier
D. Chief Justice
Answer: C. Premier

206.
True or False:
The Premier is the head of the Ontario provincial government.
Answer: True

207.
Multiple Choice:
Which major Canadian industry has its headquarters predominantly in Ontario?
A. Oil and gas
B. Fishing
C. Banking and finance
D. Forestry
Answer: C. Banking and finance

208.
True or False:
Ontario is Canada’s financial hub, with most major banks headquartered there.
Answer: True

209.
Multiple Choice:
Which Ontario Premier led the province through the COVID-19 pandemic (2020–2022)?
A. Dalton McGuinty
B. Doug Ford
C. Kathleen Wynne
D. Mike Harris
Answer: B. Doug Ford

210.
True or False:
Doug Ford was Premier of Ontario during the COVID-19 pandemic.
Answer: True

211.
Multiple Choice:
Which Ontario body is responsible for creating provincial laws?
A. The Senate
B. Parliament Hill
C. Legislative Assembly of Ontario
D. House of Commons
Answer: C. Legislative Assembly of Ontario

212.
True or False:
The Legislative Assembly of Ontario passes provincial laws.
Answer: True

213.
Multiple Choice:
In which Ontario city is the Legislative Assembly located?
A. Ottawa
B. Toronto
C. Kingston
D. London
Answer: B. Toronto

214.
True or False:
Ontario’s Legislative Assembly is located in Toronto.
Answer: True

215.
Multiple Choice:
Which major Ontario city is known for hosting the world’s largest one-day agricultural fair?
A. Guelph
B. Ottawa
C. London
D. Toronto
Answer: C. London

216.
True or False:
London, Ontario, hosts the Western Fair, one of Canada's biggest agricultural events.
Answer: True

217.
Multiple Choice:
Which Ontario city was Canada’s first capital?
A. Niagara-on-the-Lake
B. Ottawa
C. Toronto
D. Kingston
Answer: D. Kingston

218.
True or False:
Kingston was Canada’s first capital before Ottawa.
Answer: True

219.
Multiple Choice:
What is the name of Ontario’s upper legislative chamber?
A. Senate
B. House of Lords
C. Ontario Council
D. Ontario does not have one
Answer: D. Ontario does not have one

220.
True or False:
Ontario has no upper house; it only has a single Legislative Assembly.
Answer: True

221.
True or False:
The Ottawa River forms part of the boundary between Ontario and Quebec.
Answer: True
(Explanation: The Ottawa River is a historic trade route and natural border between Ontario and Quebec.)

222.
Multiple Choice:
Which Ontario region is home to Canada’s National Capital?
A. Greater Toronto Area
B. Niagara Region
C. Ottawa Region
D. Muskoka
Answer: C. Ottawa Region

223.
True or False:
Ottawa is located on the border of Ontario and Quebec.
Answer: True
(Explanation: Ottawa sits on the Ontario side of the Ottawa River, directly across from Gatineau, Quebec.)

224.
Multiple Choice:
What is the Ontario provincial bird?
A. Loon
B. Blue Jay
C. Common Raven
D. Snowy Owl
Answer: B. Blue Jay

225.
True or False:
The Blue Jay is a migratory bird found only in northern Ontario.
Answer: False
(Explanation: The Blue Jay is widely found across Ontario and is not exclusive to the north.)

226.
Multiple Choice:
Which Ontario region is famous for its vineyards and wine production?
A. Thunder Bay
B. Niagara Peninsula
C. Sudbury
D. Barrie
Answer: B. Niagara Peninsula

227.
True or False:
The Niagara Peninsula has a climate suitable for growing grapes.
Answer: True
(Explanation: Ontario’s wine region benefits from the moderating effects of the Great Lakes.)

228.
Multiple Choice:
Which Ontario town is known as the gateway to cottage country?
A. Gravenhurst
B. Brampton
C. Sarnia
D. Timmins
Answer: A. Gravenhurst

229.
True or False:
Gravenhurst is a key tourism destination in the Muskoka region.
Answer: True
(Explanation: The town is located in the Muskoka region, popular for lakeside cottages and tourism.)

230.
Multiple Choice:
Which major economic sector is dominant in Southern Ontario?
A. Fishing
B. Aerospace
C. Manufacturing
D. Oil and Gas
Answer: C. Manufacturing

231.
True or False:
Southern Ontario has the highest concentration of industrial manufacturing in Canada.
Answer: True
(Explanation: It includes cities like Toronto, Hamilton, and Windsor, known for automotive and industrial sectors.)

232.
Multiple Choice:
Which Ontario river flows through Toronto?
A. Fraser River
B. Don River
C. Rideau River
D. St. John River
Answer: B. Don River

233.
True or False:
The Don River flows into Lake Erie.
Answer: False
(Explanation: The Don River flows into Lake Ontario in Toronto, not Lake Erie.)

234.
Multiple Choice:
Who is the Lieutenant Governor of Ontario as of 2025?
A. Elizabeth Dowdeswell
B. Edith Dumont
C. Bonnie Crombie
D. Doug Ford
Answer: B. Edith Dumont

235.
True or False:
Edith Dumont is Ontario’s first Francophone Lieutenant Governor.
Answer: True
(Explanation: She was appointed in 2023 and is the first Franco-Ontarian in the role.)

236.
Multiple Choice:
Which industry is Ontario’s largest employer?
A. Manufacturing
B. Public Service
C. Agriculture
D. Tourism
Answer: B. Public Service

237.
True or False:
More Ontarians work in government and service roles than in manufacturing.
Answer: True
(Explanation: Health, education, and government are top employment sectors.)

238.
Multiple Choice:
What is the major international airport in Ontario?
A. Ottawa International
B. Pearson International
C. Hamilton Airport
D. Billy Bishop Airport
Answer: B. Pearson International

239.
True or False:
Pearson International Airport is located in downtown Toronto.
Answer: False
(Explanation: Pearson is located in Mississauga, not downtown Toronto.)

240.
Multiple Choice:
Which Great Lake is fully located in the United States?
A. Lake Ontario
B. Lake Erie
C. Lake Michigan
D. Lake Huron
Answer: C. Lake Michigan

241.
Multiple Choice:
Which Ontario town is known as the 'Electric City' due to its early use of electric streetlights?
A. Peterborough
B. London
C. Barrie
D. Thunder Bay
Answer: A. Peterborough

242.
True or False:
Peterborough was one of the first places in North America to have electric streetlights.
Answer: True
(Explanation: Peterborough earned the nickname 'Electric City' for its early adoption of hydroelectric power.)

243.
Multiple Choice:
Which Ontario university is located in Kingston?
A. Queen's University
B. University of Ottawa
C. McMaster University
D. Wilfrid Laurier University
Answer: A. Queen's University

244.
True or False:
Queen's University is one of Canada's oldest universities.
Answer: True
(Explanation: Founded in 1841, Queen’s is among the oldest and most prestigious universities in Canada.)

245.
Multiple Choice:
Which of the following cities is located in Northern Ontario?
A. Mississauga
B. Sault Ste. Marie
C. Guelph
D. Burlington
Answer: B. Sault Ste. Marie

246.
True or False:
Sault Ste. Marie lies on the border with the United States.
Answer: True
(Explanation: It borders Michigan, USA, connected by the International Bridge.)

247.
Multiple Choice:
Which Ontario city is home to Canada’s largest university by enrollment?
A. Ottawa
B. Hamilton
C. Toronto
D. Kingston
Answer: C. Toronto

248.
True or False:
The University of Toronto is the largest university in Canada by number of students.
Answer: True
(Explanation: It consistently ranks as one of the top universities in the world and the largest by enrollment in Canada.)

249.
Multiple Choice:
What is Ontario's primary electricity generation source?
A. Wind
B. Nuclear
C. Coal
D. Natural Gas
Answer: B. Nuclear

250.
True or False:
Nuclear power accounts for the majority of Ontario’s electricity generation.
Answer: True
(Explanation: Ontario relies heavily on nuclear energy for its power supply, particularly from plants like Bruce and Pickering.)

251.
Multiple Choice:
Which Ontario city is known for its large underground nickel mine tours?
A. Timmins
B. North Bay
C. Kenora
D. Sudbury
Answer: D. Sudbury

252.
True or False:
Ontario has more than one time zone.
Answer: True
(Most of Ontario is in Eastern Time, but the far west observes Central Time.)

253.
Multiple Choice:
Which Ontario river connects Lake Ontario to the Atlantic Ocean?
A. Ottawa River
B. St. Lawrence River
C. Niagara River
D. Detroit River
Answer: B. St. Lawrence River

254.
True or False:
The Parliament of Canada meets in Toronto.
Answer: False
(It meets in Ottawa, the nation’s capital.)


255.
Multiple Choice:
Which Ontario city is home to the Royal Ontario Museum?
A. Toronto
B. Ottawa
C. Sudbury
D. Kitchener
Answer: A. Toronto

256.
True or False:
Ontario shares a land border with Manitoba.
Answer: True
(The western border of Ontario meets Manitoba.)

257.
Multiple Choice:
Which Ontario city is known as “The Limestone City” because of its historic buildings?
A. Cornwall
B. Kingston
C. Guelph
D. Thunder Bay
Answer: B. Kingston


258.
True or False:
Lake Ontario is the smallest of the Great Lakes.
Answer: True
(It is the smallest by surface area, but not by volume.)

259.
Multiple Choice:
Which Ontario park is the largest provincial park in the province?
A. Killarney Provincial Park
B. Rondeau Provincial Park
C. Algonquin Provincial Park
D. Awenda Provincial Park
Answer: C. Algonquin Provincial Park

260.
True or False:
Ontario’s flag includes the Union Jack.
Answer: True
(The flag features the Union Jack and the Ontario shield of arms.)

261.
Multiple Choice:
Which one is known for its steel industry?
A. London
B. Hamilton
C. Guelph
D. Brampton
Answer: B. Hamilton

262.
True or False:
Hamilton is nicknamed 'Steeltown' due to its significant steel production.
Answer: True
(Explanation: Hamilton has been a major center of steel production in Canada for over a century.)

263.
Multiple Choice:
Which Ontario region is known for its extensive farming and agriculture?
A. Algonquin
B. Durham
C. Essex County
D. Muskoka
Answer: C. Essex County

264.
True or False:
Essex County lies in northern Ontario.
Answer: False
(Explanation: Essex County is in southwestern Ontario and is a rich agricultural zone.)

265.
Multiple Choice:
Which Ontario city is home to Canada's Wonderland amusement park?
A. Vaughan
B. Mississauga
C. Toronto
D. Oakville
Answer: A. Vaughan

266.
True or False:
Canada's Wonderland is located in downtown Toronto.
Answer: False
(Explanation: It is located in Vaughan, just north of Toronto.)

267.
Multiple Choice:
Which Ontario city is home to the provincial legislature?
A. Ottawa
B. Toronto
C. Kingston
D. Kitchener
Answer: B. Toronto

268.
True or False:
Ontario’s provincial government meets at Queen’s Park in Toronto.
Answer: True
(Explanation: Queen’s Park is the seat of the Legislative Assembly of Ontario.)

269.
Multiple Choice:
Which major Ontario festival celebrates Caribbean culture every summer?
A. Winterlude
B. Stratford Festival
C. Caribana
D. Bluesfest
Answer: C. Caribana

270.
True or False:
Caribana is a winter cultural festival held in Ottawa.
Answer: False
(Explanation: Caribana is held in Toronto during the summer and celebrates Caribbean culture.)

271.
Multiple Choice:
Which Ontario community is known for its Mennonite heritage and horse-drawn buggies?
A. Niagara-on-the-Lake
B. St. Catharines
C. Elora
D. St. Jacobs
Answer: D. St. Jacobs

272.
True or False:
St. Jacobs is a popular destination for learning about Mennonite culture in Ontario.
Answer: True
(Explanation: The village offers markets, historical displays, and visible Mennonite communities.)

273.
Multiple Choice:
What is Ontario’s official flower?
A. Maple Leaf
B. Prairie Lily
C. White Trillium
D. Wild Rose
Answer: C. White Trillium

274.
True or False:
The White Trillium is a protected symbol of Ontario.
Answer: True
(Explanation: It is the official flower and widely recognized across Ontario.)

275.
Multiple Choice:
Which Ontario lake is the deepest of the Great Lakes?
A. Lake Ontario
B. Lake Superior
C. Lake Erie
D. Lake Huron
Answer: B. Lake Superior

276.
True or False:
Lake Erie is the deepest Great Lake.
Answer: False
(Explanation: Lake Superior is the deepest and largest Great Lake by surface area.)

277.
Multiple Choice:
Which Ontario community is famous for the Stratford Festival?
A. Stratford
B. Oakville
C. Windsor
D. London
Answer: A. Stratford

278.
True or False:
Stratford Festival celebrates classical and contemporary theatre.
Answer: True
(Explanation: The festival is known for Shakespearean performances and Canadian plays.)

279.
Multiple Choice:
Which Ontario city is located at the western end of Lake Ontario?
A. Kingston
B. Barrie
C. Hamilton
D. North Bay
Answer: C. Hamilton

280.
True or False:
Hamilton lies on the western shore of Lake Ontario.
Answer: True
(Explanation: Hamilton sits at the western end of Lake Ontario and is a key industrial hub.)

281.
Multiple Choice:
Which Ontario city is home to the Rideau Canal’s starting point?
A. Ottawa
B. Kingston
C. Brockville
D. Cornwall
Answer: A. Ottawa

282.
True or False:
The Rideau Canal begins in Kingston and ends in Ottawa.
Answer: False
(Explanation: The Rideau Canal starts in Ottawa and stretches to Kingston.)

283.
Multiple Choice:
Which Ontario city is home to the Thunder Bay port, a key shipping hub?
A. Thunder Bay
B. Sudbury
C. Timmins
D. North Bay
Answer: A. Thunder Bay

284.
True or False:
Thunder Bay is one of the busiest ports on the Great Lakes.
Answer: True
(Explanation: Thunder Bay is a vital shipping point for Canadian grain and goods.)

285.
Multiple Choice:
Which Ontario city is known for its rich mining history?
A. Kitchener
B. Sudbury
C. Windsor
D. Brampton
Answer: B. Sudbury

286.
True or False:
Sudbury is famous for its manufacturing industry.
Answer: False
(Explanation: Sudbury is better known for its nickel and mining heritage.)

287.
Multiple Choice:
Which city in Ontario has a large francophone population and cultural presence?
A. Cornwall
B. Timmins
C. Ottawa
D. Chatham
Answer: C. Ottawa

288.
True or False:
Ottawa is a bilingual city with both English and French widely spoken.
Answer: True
(Explanation: Ottawa, as the national capital, officially supports both French and English.)

289.
Multiple Choice:
What is the name of the legislative building of Ontario?
A. Parliament Hill
B. Ontario Assembly Hall
C. Queen's Park
D. Provincial Chambers
Answer: C. Queen's Park

290.
True or False:
The Ontario Legislative Assembly meets at Queen’s Park.
Answer: True
(Explanation: Queen's Park in Toronto houses the Ontario Legislature.)

291.
Multiple Choice:
Which Ontario lake is shared with the United States?
A. Lake Simcoe
B. Lake Huron
C. Lake Nipigon
D. Lake Muskoka
Answer: B. Lake Huron

292.
True or False:
Lake Huron is located entirely within Canada.
Answer: False
(Explanation: Lake Huron borders both Canada and the United States.)

293.
Multiple Choice:
Which Ontario city is home to the Ontario Science Centre?
A. Toronto
B. London
C. Mississauga
D. Brampton
Answer: A. Toronto

294.
True or False:
The Ontario Science Centre is located in downtown Ottawa.
Answer: False
(Explanation: The Ontario Science Centre is located in Toronto, not Ottawa.)

295.
Multiple Choice:
Which Ontario city borders Detroit, Michigan?
A. Hamilton
B. Windsor
C. Sarnia
D. London
Answer: B. Windsor

296.
True or False:
Windsor connects to the United States via the Ambassador Bridge.
Answer: True
(Explanation: The Ambassador Bridge links Windsor with Detroit, Michigan.)

297. 
Multiple Choice:
Which region of Ontario is home to the Muskoka Lakes, known for tourism and cottages?
A. Northern Ontario
B. Eastern Ontario
C. Central Ontario
D. Southwestern Ontario
Answer: C. Central Ontario

298.
True or False:
The Muskoka region is popular for winter skiing.
Answer: False
(Explanation: Muskoka is best known for its summer tourism, lakes, and cottages.)

299.
Multiple Choice:
Which Ontario town hosts a major annual Shakespeare festival?
A. Stratford
B. Niagara-on-the-Lake
C. Owen Sound
D. Cobourg
Answer: A. Stratford

300.
True or False:
Stratford Festival focuses only on Shakespearean plays.
Answer: False
(Explanation: The Stratford Festival performs a mix of Shakespearean, classic, and contemporary works.)

301.
Multiple Choice:
Which Ontario city is home to the University of Guelph?
A. Guelph
B. Kitchener
C. Kingston
D. Waterloo
Answer: A. Guelph

302.
True or False:
The University of Guelph is located in Waterloo.
Answer: False
(Explanation: The University of Guelph is located in the city of Guelph, not Waterloo.)

303.
Multiple Choice:
Which body of water borders Ontario to the south?
A. Hudson Bay
B. Arctic Ocean
C. Great Lakes
D. Pacific Ocean
Answer: C. Great Lakes

304.
True or False:
The Pacific Ocean borders southern Ontario.
Answer: False
(Explanation: Southern Ontario borders the Great Lakes, not the Pacific Ocean.)

305.
Multiple Choice:
Which Ontario city is known for its innovation and high-tech sector?
A. Barrie
B. Kitchener-Waterloo
C. Windsor
D. North Bay
Answer: B. Kitchener-Waterloo

306.
True or False:
Kitchener-Waterloo is often referred to as Canada’s Silicon Valley.
Answer: True
(Explanation: Kitchener-Waterloo is a major tech and innovation hub in Ontario.)

307.
Multiple Choice:
Which major highway connects Windsor to Quebec through southern Ontario?
A. Highway 400
B. Highway 11
C. Highway 401
D. Highway 7
Answer: C. Highway 401

308.
True or False:
Highway 401 is the busiest and longest highway in Ontario.
Answer: True
(Explanation: It connects Windsor to the Quebec border and is heavily used.)

309.
Multiple Choice:
Which Ontario city is home to the Royal Military College of Canada?
A. Toronto
B. Kingston
C. Ottawa
D. London
Answer: B. Kingston

310.
True or False:
The Royal Military College is located in Kingston.
Answer: True
(Explanation: The RMC is Canada’s military university located in Kingston, Ontario.)

311.
Multiple Choice:
What natural wonder is located at the Ontario-U.S. border near Niagara Falls?
A. Thousand Islands
B. Horseshoe Falls
C. Algonquin Park
D. Bay of Fundy
Answer: B. Horseshoe Falls

312.
True or False:
Horseshoe Falls is part of Niagara Falls.
Answer: True
(Explanation: It is the largest of the three waterfalls that make up Niagara Falls.)

313.
Multiple Choice:
Which Ontario city is home to the Parliament of Canada?
A. Toronto
B. Ottawa
C. Kingston
D. Mississauga
Answer: B. Ottawa

314.
True or False:
Canada’s Parliament is located in Ottawa, Ontario.
Answer: True
(Explanation: Ottawa is the capital of Canada and home to the Parliament buildings.)

315.
Multiple Choice:
Which Ontario city has a major international airport named Pearson?
A. Ottawa
B. Toronto
C. Hamilton
D. Windsor
Answer: B. Toronto

316.
True or False:
Toronto Pearson International Airport is Canada’s busiest airport.
Answer: True
(Explanation: It handles the most passenger traffic of any airport in Canada.)

317. 
Multiple Choice:
Which Ontario region is known for producing maple syrup?
A. Niagara
B. Haliburton Highlands
C. Windsor-Essex
D. Sudbury Basin
Answer: B. Haliburton Highlands

318.
True or False:
Maple syrup is traditionally harvested in the fall in Ontario.
Answer: False


319.
Multiple Choice:
Which Ontario city is nicknamed the Forest City?
A. Sudbury
B. London
C. Windsor
D. Ottawa
Answer: B. London

320.
True or False:
London is called the Forest City due to its abundance of trees and green spaces.
Answer: True
(Explanation: The nickname comes from the city’s tree-lined streets and surrounding woodlands.)

321.
Multiple Choice:
Which Ontario city is known as the Automotive Capital of Canada?
A. London
B. Windsor
C. Oshawa
D. Sarnia
Answer: B. Windsor

322.
True or False:
Windsor has long been a center of automobile manufacturing in Canada.
Answer: True
(Explanation: Windsor is home to major automotive plants and is a key player in the Canadian auto industry.)

323.
Multiple Choice:
What is Ontario’s official tree?
A. Sugar Maple
B. White Pine
C. Red Oak
D. Black Spruce
Answer: A. Sugar Maple

324.
True or False:
The Sugar Maple is both the provincial tree of Ontario and the national tree of Canada.
Answer: False
(Explanation: The Sugar Maple is Ontario's provincial tree, but Canada does not have an official national tree.)

325.
Multiple Choice:
What is the name of Ontario’s provincial police service?
A. Toronto Police
B. Royal Canadian Mounted Police
C. Ontario Provincial Police
D. Peel Regional Police
Answer: C. Ontario Provincial Police

326.
True or False:
The Ontario Provincial Police enforce laws throughout all provinces in Canada.
Answer: False
(Explanation: The OPP serves only in Ontario; other provinces have their own police or use the RCMP.)

327.
Multiple Choice:
Which city in Ontario is closest to the CN Tower?
A. Mississauga
B. Ottawa
C. Toronto
D. Hamilton
Answer: C. Toronto

328.
True or False:
The CN Tower is one of Canada’s most recognized landmarks.
Answer: True
(Explanation: Located in Toronto, the CN Tower is one of the tallest freestanding structures in the world.)

329.
Multiple Choice:
Which Ontario region is famous for its vineyards and wineries?
A. Ottawa Valley
B. Niagara Region
C. Muskoka
D. Thunder Bay
Answer: B. Niagara Region

330.
True or False:
The Niagara Region produces much of Ontario’s wine, including ice wine.
Answer: True
(Explanation: Ontario’s Niagara region is well-known for wine production, especially ice wine.)

331.
Multiple Choice:
Which Ontario university is found in Kingston?
A. University of Ottawa
B. Queen’s University
C. University of Toronto
D. Laurentian University
Answer: B. Queen’s University

332.
True or False:
Queen’s University is one of the oldest degree-granting institutions in Canada.
Answer: True
(Explanation: Founded in 1841, Queen’s is one of Canada’s most historic universities.)

333.
Multiple Choice:
Which Ontario city is home to the Ontario legislature?
A. Ottawa
B. Mississauga
C. Toronto
D. Kingston
Answer: C. Toronto

334.
True or False:
Ontario’s legislature is located at Queen’s Park in Toronto.
Answer: True
(Explanation: Queen’s Park in Toronto is home to the Legislative Assembly of Ontario.)

335.
Multiple Choice:
Which Ontario city is known for the Blue Mountain ski resort?
A. Thunder Bay
B. Barrie
C. Collingwood
D. Sudbury
Answer: C. Collingwood

336.
True or False:
Blue Mountain is a popular winter destination in Northern Ontario.
Answer: False
(Explanation: Blue Mountain is in Southern Ontario, near Collingwood.)

337.
Multiple Choice:
Which Ontario town is historically associated with the Underground Railroad?
A. Brampton
B. Chatham-Kent
C. Pickering
D. Timmins
Answer: B. Chatham-Kent

338.
True or False:
Chatham-Kent played a significant role in the history of Black settlements in Canada.
Answer: True
(Explanation: It was a key destination for Black freedom-seekers during the Underground Railroad period.)

339.
Multiple Choice:
Which lake borders Toronto?
A. Lake Erie
B. Lake Huron
C. Lake Ontario
D. Lake Simcoe
Answer: C. Lake Ontario

340.
True or False:
Toronto is located on the shore of Lake Ontario.
Answer: True
(Explanation: Toronto lies along the northwestern shore of Lake Ontario.)

341.
Multiple Choice:
Which Ontario museum is Canada’s largest museum of natural history and world cultures?
A. Canadian Museum of History
B. Ontario Science Centre
C. Royal Ontario Museum (ROM)
D. Art Gallery of Ontario
Answer: C. Royal Ontario Museum (ROM)

342.
True or False:
The Royal Ontario Museum is located in Ottawa.
Answer: False
(Explanation: The Royal Ontario Museum is located in Toronto, not Ottawa.)

343.
Multiple Choice:
Which Ontario city is home to the Stratford Festival, a famous theatre festival?
A. Toronto
B. Stratford
C. Kingston
D. Guelph
Answer: B. Stratford

344.
True or False:
The Stratford Festival features Shakespearean plays and attracts global audiences.
Answer: True
(Explanation: Stratford is renowned for its Shakespeare-focused performances.)

345.
Multiple Choice:
Which Ontario city is the most populous?
A. Mississauga
B. Toronto
C. Hamilton
D. Ottawa
Answer: B. Toronto

346.
True or False:
Toronto is the most populous city in Canada.
Answer: True
(Explanation: Toronto is Canada’s largest city by population.)

347.
Multiple Choice:
What is the name of Ontario's legislative building?
A. Queen's Castle
B. Ontario House
C. Queen’s Park
D. Government Hall
Answer: C. Queen’s Park

348.
True or False:
Queen’s Park is the name of Ontario's provincial government building in Toronto.
Answer: True
(Explanation: Queen’s Park is where Ontario’s Legislative Assembly sits.)

349.
Multiple Choice:
Which Ontario lake is the largest by surface area?
A. Lake Ontario
B. Lake Erie
C. Lake Huron
D. Lake Simcoe
Answer: C. Lake Huron

350.
True or False:
Lake Huron is the largest Great Lake that borders Ontario.
Answer: True
(Explanation: Lake Huron has the largest surface area of the Great Lakes touching Ontario.)

351.
Multiple Choice:
What is the main language spoken in Ontario?
A. French
B. German
C. Mandarin
D. English
Answer: D. English

352.
True or False:
English is the primary language of most Ontarians.
Answer: True
(Explanation: English is the official and most commonly spoken language in Ontario.)

353.
Multiple Choice:
Which one is regarded as home to McMaster University?
A. London
B. Hamilton
C. Kingston
D. Oshawa
Answer: B. Hamilton

354.
True or False:
McMaster University is located in Hamilton.
Answer: True
(Explanation: It’s one of Canada’s top universities and is located in Hamilton, Ontario.)

355.
Multiple Choice:
What is the name of the provincial holiday celebrated in Ontario in August?
A. Canada Day
B. Labour Day
C. Civic Holiday
D. Heritage Day
Answer: C. Civic Holiday

356.
True or False:
Civic Holiday in Ontario is a statutory holiday across the entire province.
Answer: False
(Explanation: Civic Holiday is not a statutory holiday in all parts of Ontario; its observance varies.)

357.
Multiple Choice:
Which city is known as Canada’s high-tech capital and home to many startups?
A. Windsor
B. Ottawa
C. Sarnia
D. Barrie
Answer: B. Ottawa

358.
True or False:
Ottawa is known for its strong tech sector alongside being Canada’s capital.
Answer: True
(Explanation: Ottawa is a leading center for technology and government operations.)

359.
Multiple Choice:
Which Ontario city is known for its vibrant multicultural neighborhoods such as Kensington Market and Chinatown?
A. Mississauga
B. Toronto
C. Kingston
D. Thunder Bay
Answer: B. Toronto

360.
True or False:
Toronto is one of the most multicultural cities in the world.
Answer: True
(Explanation: Toronto’s diversity is reflected in its neighborhoods, languages, and cultures.)

361.
Multiple Choice:
Which Ontario city is known as the Steel Capital of Canada?
A. Sault Ste. Marie
B. Hamilton
C. Sudbury
D. North Bay
Answer: B. Hamilton

362.
True or False:
Hamilton is nicknamed the Steel Capital because of its large steel industry.
Answer: True
(Explanation: Hamilton is home to several major steel manufacturing plants.)

363.
Multiple Choice:
Which major Ontario city lies at the confluence of the Rideau, Ottawa, and Gatineau rivers?
A. Toronto
B. Ottawa
C. Kingston
D. Niagara Falls
Answer: B. Ottawa

364.
True or False:
Ottawa is situated at the meeting point of three rivers.
Answer: True
(Explanation: The Ottawa, Rideau, and Gatineau rivers meet near downtown Ottawa.)

365.
Multiple Choice:
What is the name of the famous waterfall located between Ontario and New York State?
A. Bridal Veil Falls
B. Horseshoe Falls
C. Kakabeka Falls
D. Niagara Falls
Answer: D. Niagara Falls

366.
True or False:
Niagara Falls is entirely within the United States.
Answer: False
(Explanation: Niagara Falls straddles the Canada–U.S. border, with part of it in Ontario.)

367.
Multiple Choice:
Which northern Ontario city is a major center for mining and natural resources?
A. Guelph
B. Sudbury
C. Windsor
D. Barrie
Answer: B. Sudbury

368.
True or False:
Sudbury has a long history of mining, especially nickel.
Answer: True
(Explanation: Sudbury is one of the world's major producers of nickel and other minerals.)

369.
Multiple Choice:
What is the name of Ontario’s provincial bird?
A. Common Loon
B. Snowy Owl
C. Eastern Bluebird
D. Gray Jay
Answer: A. Common Loon

370.
True or False:
The Common Loon appears on Canada’s $1 coin.
Answer: True
(Explanation: The Common Loon is featured on the $1 coin, commonly called a ‘loonie’.)

371.
Multiple Choice:
Which Ontario town played a vital role in the War of 1812?
A. Niagara-on-the-Lake
B. Pickering
C. Orangeville
D. Markham
Answer: A. Niagara-on-the-Lake

372.
True or False:
Niagara-on-the-Lake was a key battleground during the War of 1812.
Answer: True
(Explanation: Its location made it strategic in battles between the British and Americans.)

373.
Multiple Choice:
Which major university is based in London, Ontario?
A. Queen’s University
B. Western University
C. Trent University
D. Brock University
Answer: B. Western University

374.
True or False:
Western University is located in London, Ontario.
Answer: True
(Explanation: Western is one of Canada’s leading universities and based in London.)

375.
Multiple Choice:
What is the primary role of the Lieutenant Governor of Ontario?
A. Lead the legislature
B. Represent the King in Ontario
C. Head the judiciary
D. Oversee federal elections
Answer: B. Represent the King in Ontario

376.
True or False:
The Lieutenant Governor represents the Prime Minister in Ontario.
Answer: False
(Explanation: The Lieutenant Governor represents the monarch, not the Prime Minister.)

377.
Multiple Choice:
Which Ontario First Nation is known for its powwow celebrations and culture?
A. Six Nations
B. Inuit
C. Cree
D. Métis
Answer: A. Six Nations

378.
True or False:
Six Nations is the largest First Nations reserve in Canada.
Answer: True
(Explanation: Located in southern Ontario, Six Nations is Canada’s largest reserve by population.)

379.
Multiple Choice:
Which Ontario city is known for hosting the Canadian National Exhibition (CNE)?
A. Hamilton
B. Toronto
C. Kingston
D. London
Answer: B. Toronto

380.
True or False:
The CNE is Canada’s largest annual fair, held in Toronto.
Answer: True
(Explanation: The Canadian National Exhibition takes place each summer in Toronto.)

381.
Multiple Choice:
Which major river runs through Ottawa, the capital of Canada?
A. St. Lawrence River
B. Red River
C. Ottawa River
D. Grand River
Answer: C. Ottawa River

382.
True or False:
The Ottawa River forms part of the border between Ontario and Quebec.
Answer: True
(Explanation: The Ottawa River runs between the two provinces and flows through the capital city.)

383.
Multiple Choice:
Which Ontario city is home to the Thunder Bay International Airport?
A. Sudbury
B. North Bay
C. Thunder Bay
D. Sault Ste. Marie
Answer: C. Thunder Bay

384.
True or False:
Thunder Bay is located in Southern Ontario.
Answer: False
(Explanation: Thunder Bay is located in Northwestern Ontario.)

385.
Multiple Choice:
Which Ontario highway connects Windsor to the Quebec border?
A. Highway 17
B. Highway 401
C. Highway 11
D. Highway 7
Answer: B. Highway 401

386.
True or False:
Highway 401 is one of the busiest highways in North America.
Answer: True
(Explanation: It spans Southern Ontario and is one of the continent’s most heavily traveled highways.)

387.
Multiple Choice:
Which Ontario city is home to the University of Waterloo?
A. Waterloo
B. London
C. Mississauga
D. Oshawa
Answer: A. Waterloo

388.
True or False:
The University of Waterloo is located in the city of Waterloo, Ontario.
Answer: True
(Explanation: It’s one of Canada’s top institutions for innovation and technology.)

389.
Multiple Choice:
Which Ontario is regarded as automotive capital of Canada?
A. Toronto
B. Ottawa
C. Windsor
D. Brampton
Answer: C. Windsor

390.
True or False:
Windsor is famous for its automotive industry and proximity to Detroit.
Answer: True
(Explanation: Windsor has deep ties with the auto industry and lies just across from Detroit, USA.)

391.
Multiple Choice:
Which Ontario lake is entirely located within the province?
A. Lake Superior
B. Lake Ontario
C. Lake Simcoe
D. Lake Erie
Answer: C. Lake Simcoe

392.
True or False:
Lake Simcoe is shared between Ontario and Quebec.
Answer: False
(Explanation: Lake Simcoe is entirely within the boundaries of Ontario.)

393.
Multiple Choice:
Which Ontario landmark was originally called SkyDome?
A. Scotiabank Arena
B. Rogers Centre
C. CN Tower
D. Ontario Place
Answer: B. Rogers Centre

394.
True or False:
The CN Tower was formerly known as SkyDome.
Answer: False
(Explanation: SkyDome is now Rogers Centre; CN Tower is a different structure.)

395.
Multiple Choice:
Which Ontario island is known for its summer tourism and ferry access from Tobermory?
A. Wolfe Island
B. Manitoulin Island
C. Pelee Island
D. Baffin Island
Answer: B. Manitoulin Island

396.
True or False:
Manitoulin Island is the world’s largest freshwater island.
Answer: True
(Explanation: It is the largest island in a freshwater lake globally.)

397.
Multiple Choice:
Who is Ontario’s Premier as of 2025?
A. Justin Trudeau
B. Doug Ford
C. François Legault
D. Andrea Horwath
Answer: B. Doug Ford

398.
True or False:
Doug Ford leads the Ontario Liberal Party.
Answer: False
(Explanation: Doug Ford is the leader of the Progressive Conservative Party of Ontario.)

399.
Multiple Choice:
Who is Ontario’s Lieutenant Governor in 2025?
A. Elizabeth Dowdeswell
B. Edith Dumont
C. Mary Simon
D. Bonnie Crombie
Answer: B. Edith Dumont

400.
True or False:
Edith Dumont is the first Franco-Ontarian to serve as Lieutenant Governor of Ontario.
Answer: True
(Explanation: She was appointed in 2023 and made history with her appointment.)
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Ontario.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Ontario.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $ontario->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Ontario citizenship questions.");
    }
}

