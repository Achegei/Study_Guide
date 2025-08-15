<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuebecQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $quebec = CourseSection::firstOrCreate(
            ['title' => 'Quebec'],
            [
                'type' => 'province',
                'capital' => 'Quebec City',
                'flag' => '/images/flags/quebec.png',
                'description' => 'Questions specific to Quebec.',
                'summary_audio_url' => '/audio/summary_quebec.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $quebec->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1.  
Multiple Choice:
Which major industry is centered in Saguenay–Lac-Saint-Jean?
A. Textiles
B. Oil
C. Aluminum production
D. Coal
Answer: C. Aluminum production

2.  
True or False:
Quebec is the only province in Canada with French as its official language.
Answer: True

3.  
Multiple Choice:
Which river flows through Quebec and is vital for trade and transportation?
A. Fraser River
B. Mackenzie River
C. St. Lawrence River
D. Red River
Answer: C. St. Lawrence River

4.  
True or False:
Montreal is the most populated city in Quebec.
Answer: True

5.  
Multiple Choice:
Who was the founder of Quebec City in 1608?
A. John Cabot
B. Samuel de Champlain
C. Jacques Cartier
D. René Lévesque
Answer: B. Samuel de Champlain

6.  
True or False:
The Quebec Act of 1774 granted religious freedom to Protestants only.
Answer: False
(The Quebec Act granted religious freedom primarily to Catholics.)

7.  
Multiple Choice:
Which legal system is practiced in Quebec for civil matters?
A. Common Law
B. Canon Law
C. Civil Code
D. Statutory Law
Answer: C. Civil Code

8.  
True or False:
Quebec has never held a referendum on sovereignty.
Answer: False
(Quebec held referendums in 1980 and 1995.)

9.  
Multiple Choice:
Who is the current Premier of Quebec as of 2025?
A. Philippe Couillard
B. François Legault
C. Jean Charest
D. Pauline Marois
Answer: B. François Legault

10.  
True or False:
The fleur-de-lis is a symbol commonly associated with Quebec’s flag.
Answer: True

11.  
Multiple Choice:
Which important document recognizes Quebec as a distinct society in Canada?
A. British North America Act
B. Constitution Act, 1982
C. Meech Lake Accord
D. Manitoba Act
Answer: C. Meech Lake Accord

12.  
True or False:
The Quiet Revolution was a period of religious revival in Quebec during the 1960s.
Answer: False
(It was a period of secularization and modernization.)

13.  
Multiple Choice:
Which language must immigrants to Quebec typically learn to integrate into society?
A. English
B. French
C. Spanish
D. German
Answer: B. French

14.  
True or False:
The Ottawa River is an important natural border between Quebec and Ontario.
Answer: True

15.  
Multiple Choice:
Which famous Quebec festival celebrates winter with snow sculptures and parades?
A. Winterlude
B. Quebec Winter Carnival
C. Bonhomme Bash
D. IceFest
Answer: B. Quebec Winter Carnival

16.  
True or False:
Quebec is the largest province in Canada by land area.
Answer: True

17.  
Multiple Choice:
Which river separates Quebec and Ontario?
A. Fraser River
B. St. Lawrence River
C. Ottawa River
D. Red River
Answer: C. Ottawa River

18.  
True or False:
Quebec’s Charter of the French Language is also known as Bill 101.
Answer: True

19.  
Multiple Choice:
Which of the following is a major economic sector in Quebec?
A. Oil extraction
B. Forestry
C. Banana farming
D. Salt mining
Answer: B. Forestry

20.  
True or False:
Hydro-Québec is a major electricity provider in Quebec.
Answer: True

21.  
Multiple Choice:
Who is considered the “Father of New France”?
A. Jacques Cartier
B. René Lévesque
C. Jean Talon
D. Samuel de Champlain
Answer: D. Samuel de Champlain

22.  
True or False:
Quebec joined Confederation in 1873.
Answer: False
(Quebec was one of the original provinces to join Confederation in 1867.)

23.  
Multiple Choice:
Which island city in Quebec is known for its arts and culture scene?
A. Gatineau
B. Montreal
C. Sherbrooke
D. Saguenay
Answer: B. Montreal

24.  
True or False:
The Quebec flag is called the Fleurdelisé.
Answer: True

25.  
Multiple Choice:
What is the provincial motto of Quebec?
A. Gloriosus et Liber
B. Je me souviens
C. L’union fait la force
D. Dieu et mon droit
Answer: B. Je me souviens

26.  
True or False:
Quebec’s Saguenay region is one of Canada’s top aluminum producers.
Answer: True

27.  
Multiple Choice:
Which prominent Quebec leader founded the Parti Québécois?
A. Lucien Bouchard
B. Jean Chrétien
C. René Lévesque
D. Pierre Trudeau
Answer: C. René Lévesque

28.  
True or False:
French is one of the two official languages of Canada.
Answer: True

29.  
Multiple Choice:
In which year did Quebec nearly vote to separate from Canada, with a very close result?
A. 1967
B. 1980
C. 1995
D. 2005
Answer: C. 1995

30.  
True or False:
The majority of Quebec’s population lives in rural areas.
Answer: False
(The majority live in urban areas like Montreal and Quebec City.)

31.  
Multiple Choice:
Which of the following is Quebec’s official provincial bird?
A. Snowy Owl
B. Loon
C. Peregrine Falcon
D. Canada Goose
Answer: A. Snowy Owl

32.  
True or False:
Quebec shares a border with the United States.
Answer: True

33.  
Multiple Choice:
Which historic Quebec building is a popular tourist site and UNESCO World Heritage Site?
A. The Citadel
B. Château Frontenac
C. Mount Royal Cross
D. Place Ville Marie
Answer: B. Château Frontenac

34.  
True or False:
Quebec is the only province with a French-majority population.
Answer: True

35.  
Multiple Choice:
Which act preserved French civil law after British conquest?
A. Quebec Act (1774)
B. Constitution Act (1867)
C. Bill 101
D. British North America Act
Answer: A. Quebec Act (1774)

36.  
True or False:
Quebec produces the most maple syrup in Canada.
Answer: True

37.  
Multiple Choice:
Which of these is a major university in Quebec?
A. University of Alberta
B. Dalhousie University
C. McGill University
D. University of Toronto
Answer: C. McGill University

38.  
True or False:
The population of Quebec is under one million people.
Answer: False
(It is over 8 million.)

39.  
Multiple Choice:
Which province was home to the 1976 Summer Olympics?
A. British Columbia
B. Ontario
C. Quebec
D. Manitoba
Answer: C. Quebec (Montreal)

40.  
True or False:
The Saint Lawrence Seaway is important for Quebec’s access to Atlantic trade routes.
Answer: True

41.  
Multiple Choice:
What style of law does Quebec use for criminal cases?
A. Sharia Law
B. Canon Law
C. Common Law
D. Civil Code
Answer: C. Common Law
(Note: Quebec uses Civil Code for civil cases, but Common Law for criminal.)

42.  
True or False:
Quebec is a bilingual province, with both English and French as equal official languages.
Answer: False
(French is the only official language.)

43.  
Multiple Choice:
Which landmark legislation protects the French language in Quebec?
A. Bill 5
B. Bill 101
C. Bill C-16
D. Bill 150
Answer: B. Bill 101

44.  
Multiple Choice:
Which Indigenous nations reside within the province of Quebec?
A. Dene and Haida
B. Cree and Mohawk
C. Mi’kmaq and Maliseet
D. Blackfoot and Métis
Answer: B. Cree and Mohawk

45.  
Multiple Choice:
Which of these cultural dishes is associated with Quebec cuisine?
A. Butter Chicken
B. Sushi
C. Poutine
D. Shawarma
Answer: C. Poutine

46.  
True or False:
Quebec is one of the Prairie provinces.
Answer: False
(Quebec is a Central province.)

47.  
Multiple Choice:
What is the name of the Quebec national holiday celebrated on June 24?
A. Canada Day
B. Victoria Day
C. St. Patrick’s Day
D. Saint-Jean-Baptiste Day
Answer: D. Saint-Jean-Baptiste Day

48.  
True or False:
The term “Francophone” refers to someone who speaks French.
Answer: True

49.  
Multiple Choice:
Which of these cities is in Quebec?
A. Fredericton
B. Thunder Bay
C. Laval
D. St. John’s
Answer: C. Laval

50.  
True or False:
The Quiet Revolution reduced the role of the Catholic Church in Quebec’s society.
Answer: True

51.  
Multiple Choice:
Which Indigenous peoples lived in what is now Quebec before European settlers arrived?
A. Métis
B. Inuit
C. Mohawk and Algonquin
D. Cree and Sioux
Answer: C. Mohawk and Algonquin

52.  
True or False:
The Parti Québécois supports Quebec remaining a part of Canada.
Answer: False
(It has historically supported Quebec sovereignty.)

53.  
Multiple Choice:
What is the primary reason for the two referendums held in Quebec in 1980 and 1995?
A. Tax reform
B. Language rights
C. Sovereignty
D. Immigration
Answer: C. Sovereignty

54.  
True or False:
The Supreme Court of Canada ruled that Quebec could unilaterally secede from Canada.
Answer: False
(The court said a unilateral declaration is not legal under the Constitution.)

55.  
Multiple Choice:
Which body represents the executive branch in Quebec’s provincial government?
A. National Assembly
B. The Cabinet
C. The Senate
D. The House of Commons
Answer: B. The Cabinet

56.  
True or False:
The Lieutenant Governor of Quebec is appointed by the federal Prime Minister.
Answer: True

57.  
Multiple Choice:
Which of these industries is a major economic driver in Quebec?
A. Fishing
B. Auto manufacturing
C. Aerospace
D. Wheat farming
Answer: C. Aerospace

58.  
True or False:
French is declining as the primary language in Quebec.
Answer: False
(The government is actively promoting and protecting French.)

59.  
Multiple Choice:
What is the name of Quebec’s provincial police force?
A. Sûreté du Québec
B. Quebec Guard
C. Gendarmerie Québecoise
D. Provincial Peace Officers
Answer: A. Sûreté du Québec

60.  
True or False:
Quebec uses the same school curriculum as all other provinces.
Answer: False
(Quebec has its own education system.)

61.  
Multiple Choice:
What is the provincial flower of Quebec?
A. Trillium
B. Blue Flag Iris
C. Wild Rose
D. Prairie Crocus
Answer: B. Blue Flag Iris

62.  
True or False:
The motto “Je me souviens” appears on Quebec license plates.
Answer: True

63.  
Multiple Choice:
Which document officially made French the only official language of Quebec?
A. Constitution Act
B. Bill 22
C. Bill 101
D. Charter of Rights and Freedoms
Answer: C. Bill 101

64.  
True or False:
Most Quebecers are of British ancestry.
Answer: False
(Most are of French ancestry.)

65.  
Multiple Choice:
Which region of Quebec is known for ski resorts and outdoor sports?
A. Saguenay
B. Gaspésie
C. Eastern Townships
D. James Bay
Answer: C. Eastern Townships

66.  
True or False:
Quebec’s civil law system is based on the French Napoleonic Code.
Answer: True

67.  
Multiple Choice:
Which holiday is celebrated on June 24th in Quebec?
A. Canada Day
B. National Day (Fête nationale)
C. Heritage Day
D. Victoria Day
Answer: B. National Day (Fête nationale)

68.  
True or False:
The Quiet Revolution increased the Church’s influence over education.
Answer: False
(It reduced the Church’s influence.)

69.  
Multiple Choice:
Which natural resource is Quebec a leading producer of?
A. Copper
B. Diamonds
C. Hydro-electricity
D. Coal
Answer: C. Hydro-electricity

70.  
True or False:
Quebecers vote only in federal elections, not provincial ones.
Answer: False
(Quebecers vote in both.)

71.  
Multiple Choice:
Which cultural tradition is strongly associated with Quebec’s winter season?
A. Haggis ceremonies
B. Sugar shack visits
C. Powwows
D. Stampede riding
Answer: B. Sugar shack visits

72.  
True or False:
Quebec is officially recognized as a nation within Canada by the House of Commons.
Answer: True

73.  
Multiple Choice:
In Quebec, which party is currently in power as of 2025?
A. Liberal Party of Quebec
B. Coalition Avenir Québec
C. Parti Québécois
D. Québec Solidaire
Answer: B. Coalition Avenir Québec

74.  
True or False:
The flag of Quebec has a Union Jack in the corner.
Answer: False
(It has white fleurs-de-lis on a blue background.)

75.  
Multiple Choice:
Who was the first Premier of Quebec?
A. René Lévesque
B. Jean Lesage
C. Pierre Chauveau
D. Adélard Godbout
Answer: C. Pierre Chauveau

76.  
True or False:
Montreal is the oldest city in Canada.
Answer: False
(Quebec City is older, founded in 1608.)

77.  
Multiple Choice:
Which river divides Ontario and Quebec?
A. Red River
B. St. Lawrence River
C. Ottawa River
D. Fraser River
Answer: C. Ottawa River

78.  
True or False:
Quebec’s education system includes CEGEP before university.
Answer: True

79.  
Multiple Choice:
What does “CEGEP” stand for?
A. College of General and Professional Education
B. Council of Educators for Quebec
C. Centre for Government Policy
D. Commission on Early Growth and Education Programs
Answer: A. College of General and Professional Education

80.  
True or False:
Quebec is the only province that offers free public dental care.
Answer: False
(Quebec does not provide full public dental care.)

81.  
Multiple Choice:
Which city is Quebec’s second largest in population?
A. Laval
B. Gatineau
C. Montreal
D. Quebec City
Answer: D. Quebec City

82.  
True or False:
The majority of Quebec’s population is concentrated along the St. Lawrence River.
Answer: True

83.  
Multiple Choice:
Which document allows provinces to control education?
A. Charter of Rights
B. Constitution Act, 1867
C. Canada Act
D. Civil Code
Answer: B. Constitution Act, 1867

84.  
True or False:
In Quebec, English-language education is widely accessible to all newcomers.
Answer: False
(There are restrictions; French education is prioritized.)

85.  
Multiple Choice:
What is the largest island in Quebec?
A. Île Perrot
B. Île d’Orléans
C. Anticosti Island
D. Île Jésus
Answer: C. Anticosti Island

86.  
True or False:
The term “Francophone” refers to people who speak English.
Answer: False
(Francophones speak French.)

87.  
Multiple Choice:
Which of the following best describes Quebec’s government structure?
A. Federal Parliamentary Republic
B. Provincial Monarchy
C. Unicameral Parliamentary Democracy
D. Dual Chamber Assembly
Answer: C. Unicameral Parliamentary Democracy

88.  
True or False:
The term “Québécois” refers to someone from Ontario.
Answer: False
(It refers to someone from Quebec.)

89.  
Multiple Choice:
Which agreement aimed to bring Quebec into Canada’s constitutional fold in 1987 but failed?
A. Meech Lake Accord
B. Quebec Act
C. Charlottetown Accord
D. Manitoba Agreement
Answer: A. Meech Lake Accord

90.  
True or False:
Quebec has a Senate that passes provincial laws.
Answer: False
(Quebec has a unicameral legislature — only the National Assembly.)

91.  
Multiple Choice:
Which river system powers most of Quebec’s hydroelectricity?
A. Fraser River
B. Ottawa River
C. Churchill River
D. La Grande River
Answer: D. La Grande River

92.  
True or False:
The James Bay Project is a major hydroelectric development in Quebec.
Answer: True

93.  
Multiple Choice:
Which court is the highest in Quebec’s judicial system?
A. Provincial Court
B. Superior Court of Quebec
C. Quebec Court of Appeal
D. Federal Court
Answer: C. Quebec Court of Appeal

94.  
True or False:
The Lieutenant Governor of Quebec signs bills into law.
Answer: True

95.  
Multiple Choice:
Which cultural group makes up a significant population in Northern Quebec?
A. Punjabi
B. Inuit
C. Chinese
D. Acadian
Answer: B. Inuit

96.  
True or False:
Montreal was once Canada’s capital.
Answer: True
(Briefly, in the 1840s.)

97.  
Multiple Choice:
Which of these is a major media outlet based in Quebec?
A. Radio-Canada
B. BBC Quebec
C. CBC Maritimes
D. Global Montreal
Answer: A. Radio-Canada

98.  
True or False:
Quebec has its own citizenship.
Answer: False
(Quebecers are Canadian citizens.)

99.  
Multiple Choice:
Which of the following terms refers to Quebec’s French-speaking population?
A. Anglophones
B. Francophones
C. Allophones
D. Bilinguistes
Answer: B. Francophones

100.  
True or False:
Quebec is located west of Ontario.
Answer: False
(It is located east of Ontario.)

101.  
Multiple Choice:
What was the Quiet Revolution in Quebec?
A. A military uprising
B. A shift to industrialization
C. A period of rapid social and political change in the 1960s
D. A rebellion against British rule
Answer: C. A period of rapid social and political change in the 1960s

102.  
True or False:
The Quiet Revolution led to a rise in nationalism in Quebec.
Answer: True

103.  
Multiple Choice:
Who founded Quebec City in 1608?
A. Jacques Cartier
B. René Lévesque
C. Samuel de Champlain
D. Jean Talon
Answer: C. Samuel de Champlain

104.  
True or False:
The British defeated the French at the Battle of the Plains of Abraham.
Answer: True

105.  
Multiple Choice:
Which law created legal protection for the French language in Quebec?
A. Bill 8
B. Bill 101
C. Bill C-13
D. Charter Act
Answer: B. Bill 101

106.  
True or False:
The majority of people in Quebec are bilingual.
Answer: True

107.  
Multiple Choice:
What is the provincial bird of Quebec?
A. Common Loon
B. Snowy Owl
C. Blue Jay
D. Canada Goose
Answer: B. Snowy Owl

108.  
True or False:
Hydro-Québec is a private energy company.
Answer: False
(It is a public, government-owned utility.)

109.  
Multiple Choice:
What is the major religion historically practiced in Quebec?
A. Anglican
B. Catholicism
C. Islam
D. Judaism
Answer: B. Catholicism

110.  
True or False:
Quebec’s civil law applies only in federal courts.
Answer: False
(It applies in Quebec’s provincial courts.)

111.  
Multiple Choice:
What is the minimum voting age in Quebec?
A. 18
B. 19
C. 21
D. 25
Answer: A. 18

112.  
True or False:
Quebec’s economy includes strong sectors in aerospace and technology.
Answer: True

113.  
Multiple Choice:
Who was the Quebec Premier during the 1995 sovereignty referendum?
A. Jean Charest
B. Robert Bourassa
C. Lucien Bouchard
D. Jacques Parizeau
Answer: D. Jacques Parizeau

114.  
True or False:
Quebec’s National Assembly has 125 seats.
Answer: True

115.  
Multiple Choice:
Which body represents Quebec in international trade matters?
A. Parliament
B. National Assembly
C. Quebec Delegations Abroad
D. Federal Embassies
Answer: C. Quebec Delegations Abroad

116.  
True or False:
The James Bay Agreement was signed with Indigenous communities.
Answer: True

117.  
Multiple Choice:
In Quebec, what is the role of the “Director of Youth Protection”?
A. Oversees school attendance
B. Investigates family law
C. Ensures child safety and welfare
D. Manages school curriculum
Answer: C. Ensures child safety and welfare

118.  
True or False:
The Civil Code of Quebec governs marriage and property laws in the province.
Answer: True

119.  
Multiple Choice:
What is a CEGEP?
A. A medical school
B. A military academy
C. A pre-university and technical college
D. A religious school
Answer: C. A pre-university and technical college

120.  
True or False:
Quebec Day is celebrated on July 1st.
Answer: False
(It is June 24th.)

121.  
Multiple Choice:
Which act allowed the use of French civil law in Quebec?
A. Royal Proclamation of 1763
B. Constitution Act, 1867
C. Quebec Act of 1774
D. Civil Code Reform Act
Answer: C. Quebec Act of 1774

122.  
True or False:
The Quebec flag features four maple leaves.
Answer: False
(It features four white fleurs-de-lis.)

123.  
Multiple Choice:
Who elects the members of Quebec’s National Assembly?
A. The Prime Minister
B. The Premier
C. Quebec citizens
D. The Lieutenant Governor
Answer: C. Quebec citizens

124.  
True or False:
Quebec is Canada’s smallest province by area.
Answer: False
(It is the largest by area.)

125.  
Multiple Choice:
What type of government does Quebec have?
A. Bicameral legislature
B. Military dictatorship
C. Unicameral parliamentary democracy
D. Presidential democracy
Answer: C. Unicameral parliamentary democracy

126.  
True or False:
Quebec’s Premier is elected directly by the public.
Answer: False
(The public elects local representatives, and the Premier is the leader of the majority party.)

127.  
Multiple Choice:
Which Indigenous language is commonly spoken in Northern Quebec?
A. Cree
B. Mi’kmaq
C. Haida
D. Blackfoot
Answer: A. Cree

128.  
True or False:
Health care in Quebec is funded by private insurance.
Answer: False
(It is publicly funded.)

129.  
Multiple Choice:
What is one of Quebec’s major exports?
A. Oil
B. Automobiles
C. Aluminum
D. Cotton
Answer: C. Aluminum

130.  
True or False:
Quebec’s education is managed by the federal government.
Answer: False
(It is managed provincially.)

131.  
Multiple Choice:
Which national park is located in Quebec?
A. Banff
B. Forillon
C. Jasper
D. Yoho
Answer: B. Forillon

132.  
True or False:
Quebec City is located along the St. Lawrence River.
Answer: True

133.  
Multiple Choice:
Which of the following is a Quebec-founded company?
A. Canadian Tire
B. Bombardier
C. Loblaws
D. Shopify
Answer: B. Bombardier

134.  
True or False:
French and English have equal legal status in all parts of Quebec.
Answer: False
(French is the only official language provincially.)

135.  
Multiple Choice:
Which political movement was known for supporting Quebec independence?
A. NDP
B. Bloc Québécois
C. Green Party
D. Conservative Party
Answer: B. Bloc Québécois

136.  
True or False:
The Bloc Québécois runs candidates in all provinces.
Answer: False
(It only runs in Quebec.)

137.  
Multiple Choice:
Which Premier introduced free education reforms in the 1960s?
A. Maurice Duplessis
B. Jean Lesage
C. René Lévesque
D. Philippe Couillard
Answer: B. Jean Lesage

138.  
True or False:
Quebec collects its own income tax separately from the federal government.
Answer: True

139.  
Multiple Choice:
Which provincial program supports childcare in Quebec?
A. ChildStart
B. DayCareQC
C. Reduced Contribution Program
D. Quebec Youth Fund
Answer: C. Reduced Contribution Program

140.  
True or False:
Quebecers must pay directly for all health care services.
Answer: False
(Health care is publicly funded.)

141.  
Multiple Choice:
What body enforces the Charter of the French Language?
A. Office québécois de la langue française
B. Quebec Court of Appeal
C. Ministry of Education
D. Federal Department of Culture
Answer: A. Office québécois de la langue française

142.  
True or False:
The Charter of the French Language applies only in schools.
Answer: False
(It applies to government, business, signage, etc.)

143.  
Multiple Choice:
Which of the following is a traditional Quebec dish?
A. Bannock
B. Butter tarts
C. Poutine
D. Tourtière
Answer: C. Poutine (Note: D is also acceptable; Poutine is more famous.)

144.  
True or False:
Tourtière is a sweet dessert in Quebec.
Answer: False
(It’s a meat pie.)

145.  
Multiple Choice:
Which region of Quebec is known for fjords and whale watching?
A. Laurentians
B. Saguenay–Lac-Saint-Jean
C. Eastern Townships
D. Outaouais
Answer: B. Saguenay–Lac-Saint-Jean

146.  
True or False:
All immigrants to Quebec must speak French fluently before arriving.
Answer: False
(Language integration is part of post-arrival programs.)

147.  
Multiple Choice:
Which party formed Quebec’s government as of 2025?
A. Liberal Party
B. Québec Solidaire
C. Coalition Avenir Québec
D. Parti Québécois
Answer: C. Coalition Avenir Québec

148.  
True or False:
The Canadian Constitution recognizes Quebec as a distinct society.
Answer: True

149.  
Multiple Choice:
Who currently serves as Quebec’s Premier as of 2025?
A. Jean Charest
B. François Legault
C. Pauline Marois
D. Gabriel Nadeau-Dubois
Answer: B. François Legault

150.  
True or False:
Quebecers are exempt from national Canadian laws.
Answer: False

151.  
Multiple Choice:
What is the name of the French civil law code that governs private law in Quebec?
A. Civil Code of Ontario
B. Napoleonic Code
C. Code of Civil Procedure
D. Civil Code of Quebec
Answer: D. Civil Code of Quebec

152.  
True or False:
Quebec uses the same common law legal system as the rest of Canada.
Answer: False
(Quebec uses a civil law system for private matters, unlike other provinces which follow common law.)

153.  
Multiple Choice:
Which provincial act affirms French as the official language of Quebec?
A. Official Languages Act
B. Charter of Rights and Freedoms
C. Charter of the French Language (Bill 101)
D. Francophone Act
Answer: C. Charter of the French Language (Bill 101)

154.  
True or False:
Bill 101 requires that most children in Quebec attend English-language schools.
Answer: False
(Bill 101 requires most children to attend French-language schools.)

155.  
Multiple Choice:
What is the capital city of Quebec?
A. Montreal
B. Sherbrooke
C. Trois-Rivières
D. Quebec City
Answer: D. Quebec City

156.  
True or False:
The Ottawa River is an important natural border between Quebec and Ontario.
Answer: True

157.  
Multiple Choice:
Which historic battle led to British control over New France in 1759?
A. Battle of St. Eustache
B. Battle of Montmorency
C. Battle of the Plains of Abraham
D. Battle of the St. Lawrence
Answer: C. Battle of the Plains of Abraham

158.  
True or False:
The Battle of the Plains of Abraham was a decisive British victory in Quebec City.
Answer: True

159.  
Multiple Choice:
Which major river runs through both Quebec City and Montreal?
A. Fraser River
B. St. Lawrence River
C. Ottawa River
D. Saguenay River
Answer: B. St. Lawrence River

160.  
True or False:
The St. Lawrence River is important for Quebec’s trade and transportation.
Answer: True

161.  
Multiple Choice:
What is the legislative body of Quebec called?
A. Quebec Assembly
B. Provincial Parliament
C. National Assembly of Quebec
D. House of Representatives
Answer: C. National Assembly of Quebec

162.  
True or False:
Quebec has a Senate like the federal Parliament.
Answer: False
(Provinces do not have a Senate; Quebec has a unicameral legislature.)

163.  
Multiple Choice:
As of 2025, who is the Premier of Quebec?
A. François Legault
B. Dominique Anglade
C. Justin Trudeau
D. Pierre Poilievre
Answer: A. François Legault

164.  
True or False:
François Legault leads the Coalition Avenir Québec (CAQ).
Answer: True

165.  
Multiple Choice:
Which of the following cities is known as Quebec’s largest French-speaking metropolis?
A. Ottawa
B. Montreal
C. Vancouver
D. Halifax
Answer: B. Montreal

166.  
True or False:
Montreal is the second-largest French-speaking city in the world after Paris.
Answer: True

167.  
Multiple Choice:
Which architectural style is prominent in Old Quebec, a UNESCO World Heritage Site?
A. Victorian
B. Modernist
C. French colonial
D. Gothic Revival
Answer: C. French colonial

168.  
True or False:
Old Quebec is recognized for its historical European charm.
Answer: True

169.  
Multiple Choice:
Which winter event in Quebec City attracts thousands of tourists each year?
A. Ice Magic Festival
B. Winterlude
C. Polar Carnival
D. Carnaval de Québec (Quebec Winter Carnival)
Answer: D. Carnaval de Québec (Quebec Winter Carnival)

170.  
True or False:
Bonhomme is the mascot of the Quebec Winter Carnival.
Answer: True

171.  
Multiple Choice:
Which event shaped Quebec’s transition from a religious society to a secular one?
A. Quiet Revolution
B. October Crisis
C. Meech Lake Accord
D. Confederation
Answer: A. Quiet Revolution

172.  
True or False:
The Blue Flag Iris symbolizes Quebec’s natural beauty and heritage.
Answer: True

173.  
Multiple Choice:
Which major mountain range extends into southern Quebec?
A. Rocky Mountains
B. Coast Mountains
C. Appalachian Mountains
D. Laurentide Mountains
Answer: C. Appalachian Mountains

174.  
True or False:
The Appalachian Mountains run through southern Quebec and into the Gaspé Peninsula.
Answer: True

175.  
Multiple Choice:
Which European explorer is credited with founding Quebec City in 1608?
A. Jacques Cartier
B. Samuel de Champlain
C. Étienne Brûlé
D. Jean Talon
Answer: B. Samuel de Champlain

176.  
True or False:
Samuel de Champlain is often referred to as the “Father of New France.”
Answer: True

177.  
Multiple Choice:
Which of the following is Quebec’s official motto?
A. From Sea to Sea
B. True North Strong and Free
C. Je me souviens
D. L’union fait la force
Answer: C. Je me souviens

178.  
True or False:
“Je me souviens” translates to “I remember.”
Answer: True

179.  
Multiple Choice:
Which Indigenous groups traditionally inhabited Quebec before European contact?
A. Inuit and Métis
B. Cree and Ojibwa
C. Algonquin and Iroquois
D. Haida and Salish
Answer: C. Algonquin and Iroquois

180.  
True or False:
The Huron-Wendat people are an important First Nations group in Quebec.
Answer: True

181.  
Multiple Choice:
Which major economic sector is Quebec known for?
A. Shipbuilding
B. Aerospace and Hydro Power
C. Agriculture and Fishing
D. Tourism and Farming
Answer: B. Aerospace and Hydro Power

182.  
True or False:
Hydroelectricity is a key energy source in Quebec.
Answer: True

183.  
Multiple Choice:
Which hydroelectric complex is one of the largest in Quebec?
A. Niagara Power Plant
B. James Bay Project
C. Atlantic Hydro Dam
D. Columbia Basin Dam
Answer: B. James Bay Project

184.  
True or False:
The James Bay Project provides electricity to both Quebec and export markets.
Answer: True

185.  
Multiple Choice:
Which university in Montreal is known for English-language education?
A. Université Laval
B. Université de Montréal
C. Université du Québec
D. McGill University
Answer: D. McGill University

186.  
True or False:
McGill University is located in Quebec City.
Answer: False
(It is located in Montreal.)

187.  
Multiple Choice:
What percentage of Quebec’s population is Francophone (French-speaking)?
A. 35%
B. 50%
C. 60%
D. Over 75%
Answer: D. Over 75%

188.  
True or False:
French is the mother tongue of a majority of Quebec residents.
Answer: True

189.  
Multiple Choice:
Which of these is a traditional Quebec dish made with French fries, cheese curds, and gravy?
A. Tourtière
B. Maple Pie
C. Poutine
D. Bannock
Answer: C. Poutine

190.  
True or False:
Poutine originated in Quebec.
Answer: True

191.  
Multiple Choice:
Which of the following rivers serves as a border between Quebec and Ontario?
A. Fraser River
B. Ottawa River
C. Red River
D. St. John River
Answer: B. Ottawa River

192.  
True or False:
The Ottawa River helps define part of the border between Quebec and Ontario.
Answer: True

193.  
Multiple Choice:
Which body of water connects Quebec to the Atlantic Ocean?
A. Hudson Bay
B. Lake Erie
C. St. Lawrence River
D. Ottawa River
Answer: C. St. Lawrence River

194.  
True or False:
The St. Lawrence River is a key shipping route connecting the Great Lakes to the Atlantic Ocean.
Answer: True

195.  
Multiple Choice:
What is the large inland sea in northern Quebec?
A. Georgian Bay
B. Lake Ontario
C. Lake Saint-Jean
D. Hudson Bay
Answer: D. Hudson Bay

196.  
True or False:
Hudson Bay touches the northern coast of Quebec.
Answer: True

197.  
Multiple Choice:
What is the most populous city in Quebec?
A. Quebec City
B. Laval
C. Gatineau
D. Montreal
Answer: D. Montreal

198.  
True or False:
Quebec City is the largest city in Quebec.
Answer: False
(Montreal is the largest city; Quebec City is the capital.)

199.  
Multiple Choice:
Which of the following is a popular Quebec winter celebration?
A. Winterlude
B. Carnaval de Québec
C. Snow Days
D. Ice Fest
Answer: B. Carnaval de Québec

200.  
True or False:
The Carnaval de Québec includes activities like snow sculpture competitions and ice canoe races.
Answer: True

201.  
Multiple Choice:
Which river runs through Montreal?
A. St. Lawrence River
B. Red River
C. Fraser River
D. Peace River
Answer: A. St. Lawrence River

202.  
True or False:
Montreal is located at the junction of the Ottawa and St. Lawrence Rivers.
Answer: True

203.  
Multiple Choice:
Which of these was a major industry in the early economy of Quebec?
A. Gold Mining
B. Fur Trade
C. Steel Production
D. Agriculture
Answer: B. Fur Trade

204.  
True or False:
The fur trade played a central role in the colonization of New France.
Answer: True

205.  
Multiple Choice:
Which historic military battle was fought in Quebec City in 1759?
A. Battle of Fort Erie
B. Battle of the Plains of Abraham
C. Battle of Montreal
D. Battle of Champlain
Answer: B. Battle of the Plains of Abraham

206.  
True or False:
The Battle of the Plains of Abraham resulted in British control of Quebec.
Answer: True

207.  
Multiple Choice:
Who was the British General who led the conquest of Quebec in 1759?
A. Amherst
B. Brock
C. James Wolfe
D. Montcalm
Answer: C. James Wolfe

208.  
True or False:
General Wolfe was victorious at the Plains of Abraham but died in the battle.
Answer: True

209.  
Multiple Choice:
What is the oldest standing military building in Canada, located in Quebec City?
A. Halifax Citadel
B. Fort Garry
C. La Citadelle
D. Fort York
Answer: C. La Citadelle

210.  
True or False:
La Citadelle in Quebec City is still used as an active military installation.
Answer: True

211.  
Multiple Choice:
Which famous hotel in Quebec City is recognized as one of the most photographed in the world?
A. Hôtel Le Concorde
B. Château Frontenac
C. Fairmont Tremblant
D. The Ritz-Carlton
Answer: B. Château Frontenac

212.  
True or False:
Château Frontenac is a UNESCO World Heritage Site.
Answer: False
(The building is in a UNESCO site—the Historic District of Old Quebec—but not a UNESCO site by itself.)

213.  
Multiple Choice:
What is the name of the provincial police force of Quebec?
A. RCMP
B. Quebec Police Authority
C. Sûreté du Québec
D. Bureau de Montréal
Answer: C. Sûreté du Québec

214.  
True or False:
The RCMP is the primary provincial police force in Quebec.
Answer: False
(Sûreté du Québec handles provincial policing; RCMP deals with federal matters.)

215.  
Multiple Choice:
Which of the following is a national park located in Quebec?
A. Gros Morne National Park
B. La Mauricie National Park
C. Waterton Lakes National Park
D. Kluane National Park
Answer: B. La Mauricie National Park

216.  
True or False:
La Mauricie National Park is located between Montreal and Quebec City.
Answer: True

217.  
Multiple Choice:
Which institution ensures the promotion and preservation of French culture in Quebec?
A. Library and Archives Canada
B. Department of Heritage
C. Office québécois de la langue française (OQLF)
D. Francophone Council of Canada
Answer: C. Office québécois de la langue française (OQLF)

218.  
True or False:
The OQLF encourages the use of English in Quebec business signage.
Answer: False
(It enforces the predominance of French.)

219.  
Multiple Choice:
What is the primary religion of early French settlers in Quebec?
A. Anglicanism
B. Lutheranism
C. Islam
D. Roman Catholicism
Answer: D. Roman Catholicism

220.  
True or False:
Catholic churches and missions played a significant role in the early development of Quebec.
Answer: True

221.  
Multiple Choice:
What is the significance of the “Quiet Revolution” in Quebec history?
A. A period of civil war
B. A rise in French immigration
C. A rapid change in Quebec society in the 1960s
D. A political movement toward monarchy
Answer: C. A rapid change in Quebec society in the 1960s

222.  
True or False:
The Quiet Revolution in Quebec led to greater separation of church and state.
Answer: True

223.  
Multiple Choice:
What is the name of the Quebec separatist political party that was prominent in the 1980s and 1990s?
A. Coalition Avenir Québec (CAQ)
B. Liberal Party of Quebec
C. Parti Québécois
D. Quebec Sovereignty Party
Answer: C. Parti Québécois

224.  
True or False:
The Parti Québécois was responsible for holding two referendums on Quebec sovereignty.
Answer: True

225.  
Multiple Choice:
In what year did Quebec hold its second referendum on independence?
A. 1976
B. 1980
C. 1995
D. 2000
Answer: C. 1995

226.  
True or False:
The 1995 Quebec referendum resulted in a clear majority for independence.
Answer: False
(It was narrowly defeated with 50.6% voting No.)

227.  
Multiple Choice:
Which economic sector is Quebec particularly strong in?
A. Oil and gas
B. Agriculture
C. Hydroelectric power
D. Aerospace only
Answer: C. Hydroelectric power

228.  
True or False:
Quebec imports most of its electricity from the United States.
Answer: False
(Quebec is a major exporter of hydroelectricity.)

229.  
Multiple Choice:
Which major river runs through Quebec and supports trade and transport?
A. Yukon River
B. Columbia River
C. St. Lawrence River
D. Fraser River
Answer: C. St. Lawrence River

230.  
True or False:
The St. Lawrence River is only used for tourism and is not a shipping route.
Answer: False
(It is a key shipping and trade corridor.)

231.  
Multiple Choice:
Which major global city is located in Quebec?
A. Vancouver
B. Calgary
C. Montreal
D. Winnipeg
Answer: C. Montreal

232.  
True or False:
Montreal is the capital city of Quebec.
Answer: False
(Quebec City is the capital.)

233.  
Multiple Choice:
What is the name of the traditional Quebec winter festival?
A. Winterlude
B. Polar Fest
C. Carnaval de Québec
D. Festival of Lights
Answer: C. Carnaval de Québec

234.  
True or False:
Bonhomme is the iconic snowman mascot of the Carnaval de Québec.
Answer: True

235.  
Multiple Choice:
Which of the following is an official language in Quebec?
A. English only
B. French only
C. French and Inuktitut
D. English and Cree
Answer: B. French only

236.  
True or False:
French is the only official language of Quebec under provincial law.
Answer: True

237.  
Multiple Choice:
Which document protects French as the official language in Quebec?
A. The Canadian Constitution
B. The French Charter
C. Charter of the French Language (Bill 101)
D. Quebec Cultural Act
Answer: C. Charter of the French Language (Bill 101)

238.  
True or False:
Bill 101 requires most children in Quebec to attend French-language schools.
Answer: True

239.  
Multiple Choice:
Which industry is Quebec a world leader in?
A. Forestry
B. Mining
C. Aerospace
D. Shipping
Answer: C. Aerospace

240.  
True or False:
Quebec manufactures satellites, aircraft, and space-related technology.
Answer: True

241.  
Multiple Choice:
Which river flows through both Montreal and Quebec City?
A. Red River
B. St. Lawrence River
C. Ottawa River
D. Fraser River
Answer: B. St. Lawrence River

242.  
True or False:
The OQLF ensures public signage and services prioritize French in Quebec.
Answer: True

243.  
Multiple Choice:
Which Quebec city is known for being a UNESCO World Heritage Site?
A. Laval
B. Montreal
C. Old Quebec (Quebec City)
D. Trois-Rivières
Answer: C. Old Quebec (Quebec City)

244.  
True or False:
Quebec City is the oldest city in Canada.
Answer: True
(Founded in 1608 by Samuel de Champlain.)

245.  
Multiple Choice:
What is the name of the provincial police in Quebec?
A. RCMP
B. City Police Service
C. Ontario Provincial Police
D. Sûreté du Québec
Answer: D. Sûreté du Québec

246.  
True or False:
The Sûreté du Québec serves as Quebec’s provincial police force.
Answer: True

247.  
Multiple Choice:
What is the official motto of Quebec?
A. Unity in Diversity
B. Peace, Order and Good Government
C. Je me souviens
D. Forward Together
Answer: C. Je me souviens

248.  
True or False:
“Je me souviens” means “We remember” in English.
Answer: True

249.  
Multiple Choice:
Which holiday celebrates Quebec’s national identity on June 24?
A. Canada Day
B. Victoria Day
C. Labour Day
D. La Fête nationale du Québec (Saint-Jean-Baptiste Day)
Answer: D. La Fête nationale du Québec (Saint-Jean-Baptiste Day)

250.  
True or False:
Saint-Jean-Baptiste Day is celebrated across all Canadian provinces.
Answer: False
(It is specific to Quebec.)

251.  
Multiple Choice:
What is the name of Quebec’s provincial legislature?
A. House of Commons
B. Senate
C. National Assembly
D. Provincial Council
Answer: C. National Assembly

252.  
True or False:
The National Assembly of Quebec is located in Montreal.
Answer: False
(It is located in Quebec City, the provincial capital.)

253.  
Multiple Choice:
Which is NOT a region of Quebec?
A. Mauricie
B. Gaspésie
C. Laurentides
D. Yukon
Answer: D. Yukon

254.  
True or False:
François Legault is the leader of the Coalition Avenir Québec (CAQ).
Answer: True

255.  
Multiple Choice:
Which political party currently governs Quebec (as of 2025)?
A. Parti Québécois
B. Quebec Liberal Party
C. Coalition Avenir Québec (CAQ)
D. New Democratic Party
Answer: C. Coalition Avenir Québec (CAQ)

256.  
True or False:
The Quebec Liberal Party is currently the ruling party in the province.
Answer: False
(The Coalition Avenir Québec is the governing party as of 2025.)

257.  
Multiple Choice:
Which province in Canada is the only one with a predominantly French-speaking population?
A. Ontario
B. British Columbia
C. Quebec
D. Nova Scotia
Answer: C. Quebec

258.  
True or False:
More than 80% of Quebec’s population speaks French as their first language.
Answer: True

259.  
Multiple Choice:
Which Quebec city is known as the second-largest French-speaking city in the world (after Paris)?
A. Laval
B. Montreal
C. Quebec City
D. Sherbrooke
Answer: B. Montreal

260.  
True or False:
Ice canoe racing is still practiced during the Quebec Winter Carnival.
Answer: True

261.  
Multiple Choice:
Which is NOT a region of Quebec?
A. Mauricie
B. Gaspésie
C. Laurentides
D. Yukon
Answer: D. Yukon

262.  
True or False:
Montreal is the capital of Quebec.
Answer: False
(Quebec City is the provincial capital.)

263.  
Multiple Choice:
Which iconic building houses Quebec’s National Assembly?
A. Château Frontenac
B. Parliament Building (Hôtel du Parlement)
C. Olympic Stadium
D. Place Ville Marie
Answer: B. Parliament Building (Hôtel du Parlement)

264.  
True or False:
The Parliament Building of Quebec is located in Montreal.
Answer: False
(It is located in Quebec City.)

265.  
Multiple Choice:
Which river runs through both Montreal and Quebec City?
A. Red River
B. Mackenzie River
C. St. Lawrence River
D. Ottawa River
Answer: C. St. Lawrence River

266.  
True or False:
The St. Lawrence River flows through major cities in Quebec.
Answer: True

267.  
Multiple Choice:
Which holiday is specific to Quebec and celebrates its French-Canadian culture?
A. Canada Day
B. Thanksgiving
C. Saint-Jean-Baptiste Day
D. Remembrance Day
Answer: C. Saint-Jean-Baptiste Day

268.  
True or False:
Saint-Jean-Baptiste Day is celebrated throughout all of Canada.
Answer: False
(It is a holiday unique to Quebec.)

269.  
Multiple Choice:
Which Indigenous group is native to much of northern Quebec?
A. Métis
B. Mi’kmaq
C. Dene
D. Cree
Answer: D. Cree

270.  
True or False:
Cree, Inuit, and Innu communities are part of Quebec’s Indigenous population.
Answer: True

271.  
Multiple Choice:
Which landmark in Quebec City is a UNESCO World Heritage Site?
A. Old Port of Montreal
B. Old Quebec (Vieux-Québec)
C. Mount Royal Park
D. Notre-Dame Basilica
Answer: B. Old Quebec (Vieux-Québec)

272.  
True or False:
Old Quebec is one of the oldest and best-preserved colonial settlements in North America.
Answer: True

273.  
Multiple Choice:
Which treaty created the legal basis for Cree governance in northern Quebec?
A. Meech Lake Accord
B. Constitution Act
C. James Bay and Northern Quebec Agreement
D. Quebec Act
Answer: C. James Bay and Northern Quebec Agreement

274.  
True or False:
The Sûreté du Québec enforces federal laws across Canada.
Answer: False
(It enforces provincial laws within Quebec.)

275.  
Multiple Choice:
Which official languages are recognized in Quebec?
A. English only
B. French only
C. French and English (with French as the official provincial language)
D. Inuktitut and French
Answer: C. French and English (with French as the official provincial language)

276.  
True or False:
French is the only official language of the province of Quebec.
Answer: True

277.  
Multiple Choice:
What is the provincial motto of Quebec found on license plates?
A. Peace, Order and Good Government
B. True North Strong and Free
C. Je me souviens
D. Vive le Québec
Answer: C. Je me souviens

278.  
True or False:
“Je me souviens” means “We remember” in English.
Answer: True

279.  
Multiple Choice:
Which political leader is the current Premier of Quebec (as of 2025)?
A. François Legault
B. Justin Trudeau
C. Jean Charest
D. Dominique Anglade
Answer: A. François Legault

280.  
True or False:
François Legault is the leader of the Coalition Avenir Québec (CAQ) party.
Answer: True

281.  
Multiple Choice:
Which Quebec city is known as the largest French-speaking city in North America?
A. Quebec City
B. Montreal
C. Gatineau
D. Laval
Answer: B. Montreal

282.  
True or False:
Montreal is Canada’s capital city.
Answer: False
(Ottawa is the capital of Canada.)

283.  
Multiple Choice:
Which major river flows through the province of Quebec?
A. Fraser River
B. Mackenzie River
C. Red River
D. St. Lawrence River
Answer: D. St. Lawrence River

284.  
Multiple Choice:
Which treaty created the legal basis for Cree governance in northern Quebec?
A. Meech Lake Accord
B. Constitution Act
C. James Bay and Northern Quebec Agreement
D. Quebec Act
Answer: C. James Bay and Northern Quebec Agreement

285.  
Multiple Choice:
Which act recognized Quebec’s distinct society within Canada?
A. British North America Act
B. Meech Lake Accord
C. Constitution Act of 1982 (Charter preamble and debates)
D. Clarity Act
Answer: C. Constitution Act of 1982 (Charter preamble and debates)

286.  
True or False:
Quebec is the only province where English is the official language.
Answer: False
(French is the official language in Quebec.)

287.  
Multiple Choice:
Which holiday is celebrated annually on June 24 in Quebec?
A. Dominion Day
B. Thanksgiving
C. Saint-Jean-Baptiste Day
D. Victoria Day
Answer: C. Saint-Jean-Baptiste Day

288.  
True or False:
Saint-Jean-Baptiste Day is also known as Quebec’s National Holiday.
Answer: True

289.  
Multiple Choice:
Which province shares the longest border with Quebec?
A. Ontario
B. Newfoundland and Labrador
C. Ontario
D. New Brunswick
Answer: C. Ontario

290.  
True or False:
The James Bay Agreement of 1975 gave significant autonomy to the Cree Nation.
Answer: True

291.  
Multiple Choice:
What is the official language of the provincial government and courts in Quebec?
A. English
B. Spanish
C. Inuktitut
D. French
Answer: D. French

292.  
True or False:
Quebec is officially a bilingual province.
Answer: False
(French is the only official language in Quebec.)

293.  
Multiple Choice:
Which city is the capital of Quebec?
A. Montreal
B. Laval
C. Quebec City
D. Trois-Rivières
Answer: C. Quebec City

294.  
True or False:
The Quiet Revolution led to more control of education and health by the Catholic Church.
Answer: False
(It reduced the Church’s role and expanded government control.)

295.  
Multiple Choice:
Which traditional Quebec winter activity involves racing down icy tracks?
A. Ice fishing
B. Dog sledding
C. Cross-country skiing
D. Ice canoe racing
Answer: D. Ice canoe racing

296.  
True or False:
The Sûreté du Québec is responsible for provincial policing duties in Quebec.
Answer: True

297.  
Multiple Choice:
Which Indigenous nation is primarily located in northern Quebec?
A. Haida
B. Cree
C. Ojibwe
D. Mi’kmaq
Answer: B. Cree

298.  
True or False:
The James Bay Cree have signed agreements with the Quebec government regarding land and resource use.
Answer: True

299.  
Multiple Choice:
Which city in Quebec is a major hub for aerospace and technology?
A. Quebec City
B. Sherbrooke
C. Montreal
D. Saguenay
Answer: C. Montreal

300.  
True or False:
Montreal hosts Canada’s largest English-speaking population.
Answer: False
(Toronto has the largest English-speaking population; Montreal is the largest French-speaking city.)

301.  
Multiple Choice:
What is the name of the long-standing Quebec nationalist political party?
A. Liberal Party of Quebec
B. Parti Québécois
C. Bloc Québécois
D. Conservative Party of Quebec
Answer: B. Parti Québécois

302.  
True or False:
The Parti Québécois supports Quebec sovereignty.
Answer: True

303.  
Multiple Choice:
Which Quebec Premier held the 1995 referendum on sovereignty?
A. Jean Charest
B. Philippe Couillard
C. Jacques Parizeau
D. François Legault
Answer: C. Jacques Parizeau

304.  
True or False:
Quebec held only one referendum on independence.
Answer: False
(There were two referendums: one in 1980 and one in 1995.)

305.  
Multiple Choice:
What is the current governing party in Quebec as of 2025?
A. Liberal Party
B. Parti Québécois
C. Coalition Avenir Québec (CAQ)
D. New Democratic Party
Answer: C. Coalition Avenir Québec (CAQ)

306.  
True or False:
François Legault is the current Premier of Quebec (2025).
Answer: True

307.  
Multiple Choice:
Which treaty involved Quebec’s Cree and Inuit peoples and addressed land rights in northern Quebec?
A. Robinson Treaty
B. Peace of the Braves
C. James Bay and Northern Quebec Agreement
D. Royal Proclamation
Answer: C. James Bay and Northern Quebec Agreement

308.  
True or False:
The James Bay Agreement was signed in the 1990s.
Answer: False
(It was signed in 1975.)

309.  
Multiple Choice:
Which Quebec city is known for its historic walled old town, recognized by UNESCO?
A. Montreal
B. Trois-Rivières
C. Gatineau
D. Quebec City
Answer: D. Quebec City

310.  
True or False:
Quebec City is the only fortified city north of Mexico.
Answer: True

311.  
Multiple Choice:
Which global organization has recognized Quebec City as a World Heritage Site?
A. UNESCO
B. NATO
C. WHO
D. IMF
Answer: A. UNESCO

312.  
True or False:
Gaspésie is a coastal region located in eastern Quebec.
Answer: True

313.  
Multiple Choice:
What major river runs through Montreal and Quebec City?
A. Mackenzie River
B. Red River
C. Columbia River
D. St. Lawrence River
Answer: D. St. Lawrence River

314.  
True or False:
The Cree and Mohawk have long histories within present-day Quebec.
Answer: True

315.  
Multiple Choice:
Which major religious group historically influenced Quebec’s institutions?
A. Anglican Church
B. Orthodox Church
C. Protestant Church
D. Roman Catholic Church
Answer: D. Roman Catholic Church

316.  
True or False:
Religion no longer plays any role in Quebec society.
Answer: False
(While secularism has increased, historical influence remains visible.)

317.  
Multiple Choice:
What is the Quiet Revolution in Quebec history?
A. A war against Canada
B. A 19th-century rebellion
C. A period of rapid social and political change in the 1960s
D. A movement for independence
Answer: C. A period of rapid social and political change in the 1960s

318.  
True or False:
The Quiet Revolution promoted modernization and secularism in Quebec.
Answer: True

319.  
Multiple Choice:
Which act affirmed French and English as the official languages of Canada?
A. BNA Act
B. Quebec Act
C. Official Languages Act
D. Confederation Act
Answer: C. Official Languages Act

320.  
True or False:
The Official Languages Act ensures all federal services are available in French and English.
Answer: True

321.  
Multiple Choice:
Which international event did Montreal host in 1976?
A. FIFA World Cup
B. Summer Olympic Games
C. G7 Summit
D. Commonwealth Games
Answer: B. Summer Olympic Games

322.  
True or False:
Montreal hosted the Winter Olympics in 1976.
Answer: False
(Montreal hosted the Summer Olympics, not the Winter Olympics.)

323.  
Multiple Choice:
What is the name of the nationalist movement seeking Quebec’s independence from Canada?
A. Quiet Revolution
B. Sovereigntist Movement
C. Confederal Reform
D. Quebec Renaissance
Answer: B. Sovereigntist Movement

324.  
True or False:
Quebec held two referendums on sovereignty in 1980 and 1995.
Answer: True

325.  
Multiple Choice:
Which Prime Minister campaigned to keep Quebec within Canada during the 1995 referendum?
A. Brian Mulroney
B. Jean Chrétien
C. Stephen Harper
D. Pierre Trudeau
Answer: B. Jean Chrétien

326.  
True or False:
The 1995 Quebec referendum resulted in a majority vote for independence.
Answer: False
(The “No” side won by a narrow margin.)

327.  
Multiple Choice:
Which of the following is a well-known winter festival in Quebec City?
A. Festival of Lights
B. Carnaval de Québec
C. Winterlude
D. Fête des Neiges
Answer: B. Carnaval de Québec

328.  
True or False:
The Carnaval de Québec is one of the largest and oldest winter festivals in the world.
Answer: True

329.  
Multiple Choice:
Which legal document guarantees the rights and freedoms of Canadians, including those in Quebec?
A. Civil Code
B. BNA Act
C. Canadian Charter of Rights and Freedoms
D. Meech Lake Accord
Answer: C. Canadian Charter of Rights and Freedoms

330.  
True or False:
The Charter of Rights and Freedoms is part of Canada’s Constitution.
Answer: True

331.  
Multiple Choice:
Which is the second largest city in Quebec after Montreal?
A. Sherbrooke
B. Quebec City
C. Laval
D. Gatineau
Answer: B. Quebec City

332.  
True or False:
Quebec City is the oldest walled city in North America north of Mexico.
Answer: True

333.  
Multiple Choice:
Which World Heritage Site is located in Old Quebec?
A. Parliament Hill
B. Montmorency Falls
C. Historic District of Old Québec
D. Mount Royal Park
Answer: C. Historic District of Old Québec

334.  
True or False:
The Old Port of Montreal is a UNESCO World Heritage Site.
Answer: False
(Only the Historic District of Old Québec holds that designation.)

335.  
Multiple Choice:
Which is a traditional French Canadian meat pie often enjoyed during the holidays in Quebec?
A. Poutine
B. Creton
C. Tourtière
D. Bûche de Noël
Answer: C. Tourtière

336.  
True or False:
Tourtière is typically a vegetarian dish in Quebec culture.
Answer: False
(It is a meat pie, usually made with pork, beef, or game.)

337.  
Multiple Choice:
Which major river runs through Quebec and is a key waterway for commerce?
A. Ottawa River
B. Saguenay River
C. Hudson River
D. St. Lawrence River
Answer: D. St. Lawrence River

338.  
True or False:
The St. Lawrence River connects the Great Lakes to the Atlantic Ocean.
Answer: True

339.  
Multiple Choice:
What is the primary source of electricity in Quebec?
A. Coal
B. Hydropower
C. Natural Gas
D. Nuclear Energy
Answer: B. Hydropower

340.  
True or False:
Hydro-Québec is one of the largest electricity producers in North America.
Answer: True

341.  
Multiple Choice:
Which major mountain range runs through southeastern Quebec?
A. Rocky Mountains
B. Appalachian Mountains
C. Laurentian Mountains
D. Canadian Shield
Answer: B. Appalachian Mountains

342.  
True or False:
The Appalachian Mountains are located only in the United States.
Answer: False
(They extend into southeastern Quebec and the Maritimes.)

343.  
Multiple Choice:
Which region in Quebec is well known for its maple syrup production?
A. Côte-Nord
B. Abitibi-Témiscamingue
C. Estrie (Eastern Townships)
D. Outaouais
Answer: C. Estrie (Eastern Townships)

344.  
True or False:
Quebec produces over 70% of the world’s maple syrup supply.
Answer: True

345.  
Multiple Choice:
Which organization is responsible for protecting the French language in Quebec?
A. Canadian Heritage
B. Office québécois de la langue française (OQLF)
C. Royal Canadian Language Bureau
D. Quebec Language Council
Answer: B. Office québécois de la langue française (OQLF)

346.  
True or False:
All immigrants to Quebec must learn English as their first language.
Answer: False
(They are generally expected to integrate into a French-speaking society.)

347.  
Multiple Choice:
Which is the oldest university in Quebec?
A. Laval University
B. McGill University
C. Concordia University
D. Université de Montréal
Answer: A. Laval University

348.  
True or False:
Laval University is located in Quebec City.
Answer: True

349.  
Multiple Choice:
Which major event is held each winter in Quebec City and is one of the largest of its kind in the world?
A. Ice on Fire Festival
B. Montreal Snow Parade
C. Quebec Winter Carnival
D. Great North Celebration
Answer: C. Quebec Winter Carnival

350.  
True or False:
The Quebec Winter Carnival features activities such as snow sculptures and parades.
Answer: True

351.  
Multiple Choice:
Which popular music and performance group originated in Quebec?
A. The Guess Who
B. Rush
C. Barenaked Ladies
D. Cirque du Soleil
Answer: D. Cirque du Soleil

352.  
True or False:
Cirque du Soleil was founded in Toronto.
Answer: False
(It was founded in Baie-Saint-Paul, Quebec.)

353.  
Multiple Choice:
What is the major river flowing through Montreal and Quebec City?
A. Peace River
B. Mackenzie River
C. Fraser River
D. St. Lawrence River
Answer: D. St. Lawrence River

354.  
Multiple Choice:
Which organization regulates French language use in Quebec?
A. Ministry of Education
B. CBC/Radio-Canada
C. Office québécois de la langue française (OQLF)
D. Elections Quebec
Answer: C. Office québécois de la langue française (OQLF)

355.  
Multiple Choice:
Which Quebec town is known for its historic fortifications and is a UNESCO World Heritage Site?
A. Laval
B. Trois-Rivières
C. Saguenay
D. Old Quebec (Québec City)
Answer: D. Old Quebec (Québec City)

356.  
True or False:
Old Quebec is the only walled city north of Mexico.
Answer: True

357.  
Multiple Choice:
Which Quebec holiday celebrates French Canadian culture on June 24th?
A. Bastille Day
B. Canada Day
C. La Fête nationale (Saint-Jean-Baptiste Day)
D. Francophonie Day
Answer: C. La Fête nationale (Saint-Jean-Baptiste Day)

358.  
True or False:
Saint-Jean-Baptiste Day is recognized only in Montreal.
Answer: False
(It is celebrated across the entire province.)

359.  
Multiple Choice:
Which economic sector is a major part of Quebec’s economy?
A. Space technology
B. Hydroelectric power
C. Nuclear energy
D. Cotton farming
Answer: B. Hydroelectric power

360.  
True or False:
Quebec is the largest producer of hydroelectricity in Canada.
Answer: True

361.  
Multiple Choice:
Which city is home to the Quebec Winter Carnival, one of the largest winter festivals in the world?
A. Montreal
B. Sherbrooke
C. Laval
D. Quebec City
Answer: D. Quebec City

362.  
True or False:
The Quebec Winter Carnival includes events like ice sculpture contests and canoe races on snow.
Answer: True

363.  
Multiple Choice:
Which animal is featured on the provincial coat of arms of Quebec?
A. Moose
B. Bear
C. Lion
D. Beaver
Answer: C. Lion

364.  
True or False:
The lion on Quebec’s coat of arms symbolizes England’s historical influence.
Answer: True

365.  
Multiple Choice:
Which Quebec-based food is made of fries, gravy, and cheese curds?
A. Tourtière
B. Poutine
C. Ragoût de boulettes
D. Bannock
Answer: B. Poutine

366.  
True or False:
Poutine originated in Ontario.
Answer: False
(It was created in rural Quebec.)

367.  
Multiple Choice:
Which Canadian province has a civil law system based on the Napoleonic Code?
A. Alberta
B. British Columbia
C. Manitoba
D. Quebec
Answer: D. Quebec

368.  
True or False:
Quebec follows a civil law system, unlike the common law used in other provinces.
Answer: True

369.  
Multiple Choice:
What is the name of the Quebec nationalist movement that advocates for sovereignty?
A. Parti Vert
B. Parti Conservateur
C. Parti Québécois
D. Parti Populaire
Answer: C. Parti Québécois

370.  
True or False:
The Parti Québécois supports Quebec independence from Canada.
Answer: True

371.  
Multiple Choice:
Which 1995 event almost resulted in Quebec’s secession from Canada?
A. Meech Lake Accord
B. FLQ Crisis
C. Quebec Referendum
D. Quiet Revolution
Answer: C. Quebec Referendum

372.  
True or False:
The 1995 referendum passed with over 60% support.
Answer: False
(It was narrowly defeated, with 50.6% voting “No”.)

373.  
Multiple Choice:
What is the official residence of the Lieutenant Governor of Quebec?
A. Rideau Hall
B. Hôtel du Parlement
C. Château Frontenac
D. Résidence du Lieutenant-gouverneur
Answer: D. Résidence du Lieutenant-gouverneur

374.  
True or False:
The Lieutenant Governor of Quebec is elected by the people.
Answer: False
(They are appointed by the Governor General.)

375.  
Multiple Choice:
Which type of immigrant population is growing steadily in Quebec?
A. Italian
B. American
C. North African (Francophone)
D. German
Answer: C. North African (Francophone)

376.  
True or False:
Quebec attracts many French-speaking immigrants from Africa.
Answer: True

377.  
Multiple Choice:
Which popular festival in Montreal celebrates jazz music?
A. Osheaga
B. Montreal International Jazz Festival
C. Just For Laughs
D. Igloofest
Answer: B. Montreal International Jazz Festival

378.  
True or False:
The Montreal International Jazz Festival is the largest of its kind in the world.
Answer: True

379.  
Multiple Choice:
What is the name of Quebec’s law promoting French as the primary language?
A. Bill 100
B. Charter of Rights
C. Bill 101 (Charter of the French Language)
D. Act of Union
Answer: C. Bill 101 (Charter of the French Language)

380.  
True or False:
Bill 101 makes English the language of education and business in Quebec.
Answer: False
(It enforces French as the official language.)

381.  
Multiple Choice:
Which national holiday is also celebrated across Quebec with civic events?
A. Labour Day
B. Canada Day
C. Victoria Day
D. Remembrance Day
Answer: D. Remembrance Day

382.  
True or False:
Quebec observes Remembrance Day with ceremonies at local war memorials.
Answer: True

383.  
Multiple Choice:
What are the parliamentary seats of Quebec called?
A. Ridings
B. Comtés (in French)
C. Cantons
D. Boroughs
Answer: B. Comtés (in French)

384.  
True or False:
“Comté” is the French equivalent of an electoral riding in Quebec.
Answer: True

385.  
Multiple Choice:
What is the name of Quebec’s provincial parliament building?
A. National Centre
B. Quebec Legislature Hall
C. Hôtel du Parlement
D. Parliament Hill
Answer: C. Hôtel du Parlement

386.  
True or False:
Quebec is the only Canadian province with a unicameral legislature.
Answer: True
(The Senate was abolished in 1968.)

387.  
Multiple Choice:
Which Quebec-based company is a global leader in transportation manufacturing?
A. Shopify
B. Air Canada
C. Bombardier
D. CN Rail
Answer: C. Bombardier

388.  
True or False:
The Laurentians are a popular ski destination in Quebec.
Answer: True

389.  
Multiple Choice:
Which Quebec region borders Labrador and is rich in natural resources?
A. Abitibi
B. Côte-Nord
C. Estrie
D. Outaouais
Answer: B. Côte-Nord

390.  
True or False:
Quebec borders only one U.S. state.
Answer: False
(It borders several: Vermont, New York, New Hampshire, and Maine.)

391.  
Multiple Choice:
Which major export is Quebec known for besides hydroelectricity and aerospace?
A. Wine
B. Diamonds
C. Aluminum
D. Natural gas
Answer: C. Aluminum

392.  
True or False:
The Gaspé Peninsula is located in western Quebec.
Answer: False
(It’s in eastern Quebec.)

393.  
Multiple Choice:
Which term best describes the cultural identity movement in Quebec during the 20th century?
A. Anglo-Revivalism
B. Francophone Federalism
C. Quebec Nationalism
D. Confederation Reformation
Answer: C. Quebec Nationalism

394.  
True or False:
Most newcomers to Quebec are required to take French integration courses.
Answer: True

395.  
Multiple Choice:
Which economic region in Quebec is famous for forestry and paper production?
A. Outaouais
B. Laval
C. Montreal
D. Charlevoix
Answer: A. Outaouais

396.  
True or False:
Quebec has its own immigration ministry.
Answer: True

397.  
Multiple Choice:
What does “CAQ” stand for in Quebec politics?
A. Coalition Avenir Québec
B. Canadian Assembly of Quebec
C. Citizens Alliance of Quebec
D. Cultural Affairs Quebec
Answer: A. Coalition Avenir Québec

398.  
True or False:
Quebec’s education system includes religious instruction as a standard part of the curriculum.
Answer: False
(Quebec’s education is secular.)

399.  
Multiple Choice:
What is the purpose of Francisation courses in Quebec?
A. Teach English to French speakers
B. Teach French to newcomers
C. Teach Quebec history
D. Train civil servants
Answer: B. Teach French to newcomers

400.  
True or False:
All government services in Quebec must be available in English by law.
Answer: False
(French is the required language.)
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


        $this->command->info("Parsed " . count($questions) . " questions for Quebec.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $quebec->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Quebec citizenship questions.");
    }
}


