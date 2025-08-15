<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\CourseSection;
use Illuminate\Support\Facades\Log;

class CanadaQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the course section for Canadian Citizenship with ID 1
            $canadaSection = CourseSection::firstOrCreate(
            ['title' => 'Canada'],
            [
                'type' => 'country',
                'capital' => 'Ottawa',
                'flag' => '/images/flags/canada.png', // Flag image URL for Canada
                'description' => 'Questions specific to Canada.',
                'summary_audio_url' => '/audio/canada_summary.mp3' // Audio URL for Canada
            ]
        );


        // Define the raw text containing the questions
        // This includes all questions from 1 to 400 that you provided.
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the significance of July 1st in Canada?
A. Thanksgiving Day
B. Remembrance Day
C. Canada Day
D. Constitution Day
Answer: C. Canada Day

2. 
True or False
Canada became a country on July 1, 1871.
Answer: False
(Canada became a country on July 1, 1867.)

3. 
Multiple Choice
What are the three parts of Parliament?
A. House of Commons, Senate, and Prime Minister
B. Queen, House of Commons, and Prime Minister
C. Sovereign-King, Senate, and House of Commons
D. Governor General, Senate, and Prime Minister
Answer: C. Sovereign-King, Senate, and House of Commons

4. 
True or False
The Governor General is elected by Canadian citizens.
Answer: False
(The Governor General is appointed by the King on the advice of the Prime Minister.)

5. 
Multiple Choice
What are the two official languages of Canada?
A. English and German
B. French and English
C. English and Spanish
D. French and Latin
Answer: B. French and English

6. 
True or False
French is only spoken in Quebec.
Answer: False
(French is spoken in various parts of Canada, including New Brunswick and Ontario.)

7. 
Multiple Choice
What do Canadians remember on Remembrance Day?
A. The end of slavery
B. The signing of the Charter of Rights and Freedoms
C. The birth of Canada
D. The sacrifices of veterans and fallen soldiers
Answer: D. The sacrifices of veterans and fallen soldiers

8.
True or False
Remembrance Day is celebrated on July 11.
Answer: False
(It is observed on November 11.)

9. 
Multiple Choice
Which animal is a symbol of Canada?
A. Moose
B. Caribou
C. Beaver
D. Loon
Answer: C. Beaver

10. 
True or False
The maple leaf is a national symbol of Canada.
Answer: True

11. 
Multiple Choice
What is the name of Canada’s national police force?
A. CSIS
B. Ontario Provincial Police
C. Royal Canadian Mounted Police
D. Canadian Forces Police
Answer: C. Royal Canadian Mounted Police

12. 
True or False
The RCMP only enforces laws in Quebec.
Answer: False
(RCMP serves across Canada, except in certain provinces with their own police services.)

13. 
Multiple Choice
Which province has the largest population in Canada?
A. Alberta
B. Ontario
C. British Columbia
D. Quebec
Answer: B. Ontario

14. 
True or False
Ontario’s capital city is Ottawa.
Answer: False
(Toronto is Ontario’s capital; Ottawa is the capital of Canada.)

15. 
Multiple Choice
What is the capital city of Canada?
A. Toronto
B. Vancouver
C. Ottawa
D. Montreal
Answer: C. Ottawa

16. 
True or False
Ottawa is located in Quebec.
Answer: False
(Ottawa is in Ontario.)

17. 
Multiple Choice
Who was Canada’s first Prime Minister?
A. Pierre Trudeau
B. Sir John A. Macdonald
C. Wilfrid Laurier
D. Lester B. Pearson
Answer: B. Sir John A. Macdonald

18. 
True or False
Canada’s first Prime Minister was elected in 1867.
Answer: True

19.
Multiple Choice
What is the Canadian Constitution?
A. A document written by the British
B. A set of laws that govern Canada
C. The national anthem
D. The criminal code
Answer: B. A set of laws that govern Canada

20. 
True or False
The Constitution includes the Canadian Charter of Rights and Freedoms.
Answer: True

21. 
Multiple Choice
Who is the current monarch of Canada (as of 2025)?
A. Queen Elizabeth II
B. King Charles III
C. King William V
D. King Edward VIII
Answer: B. King Charles III

22. 
True or False
Canada is a republic.
Answer: False
(Canada is a constitutional monarchy.)

23. 
Multiple Choice
What is the role of the Prime Minister of Canada?
A. To represent the Queen
B. To lead the House of Commons and the federal government
C. To appoint provincial premiers
D. To head the Supreme Court
Answer: B. To lead the House of Commons and the federal government

24. 
True or False
Health care is the responsibility of the federal government only.
Answer: False
(Health care is primarily a provincial responsibility.)

25. 
Multiple Choice
What are the three main types of government in Canada?
A. Constitutional, Dictatorship, Federal
B. Federal, Provincial/Territorial, Municipal
C. Local, National, International
D. Legislative, Executive, Judicial
Answer: B. Federal, Provincial/Territorial, Municipal

26. 
True or False
Municipal governments are responsible for foreign affairs.
Answer: False
(Foreign affairs are managed by the federal government.)

27. 
Multiple Choice
What is the Canadian Charter of Rights and Freedoms?
A. A federal holiday
B. A royal title
C. A document that protects Canadians’ rights
D. The immigration policy
Answer: C. A document that protects Canadians’ rights

28. 
True or False
Freedom of speech is guaranteed by the Charter.
Answer: True

29. 
Multiple Choice
What is Canada’s system of government?
A. Dictatorship
B. Absolute Monarchy
C. Parliamentary Democracy
D. Oligarchy
Answer: C. Parliamentary Democracy

30. 
True or False
Canada’s system of government includes both a monarch and an elected Parliament.
Answer: True

31. 
Multiple Choice
Who do Members of Parliament represent?
A. The Prime Minister
B. The whole country
C. Their constituents
D. The Senate
Answer: C. Their constituents

32. 
True or False
Members of Parliament are appointed by the King.
Answer: False
(They are elected by Canadian citizens.)

33. 
Multiple Choice
How often are federal elections held in Canada (maximum)?
A. Every 3 years
B. Every 5 years
C. Every 4 years
D. Every 2 years
Answer: C. Every 4 years

34. 
True or False
The Prime Minister is directly elected by the people.
Answer: False
(The Prime Minister is the leader of the political party that wins the most seats in the House of Commons.)

35. 
Multiple Choice
What does “responsible government” mean?
A. The Prime Minister is responsible for writing laws
B. The government must answer to the voters
C. The Senate is responsible for all taxes
D. Canada follows religious law
Answer: B. The government must answer to the voters

36. 
True or False
Responsible government means that elected officials must resign if they lose the confidence of the House.
Answer: True

37. 
Multiple Choice
Which political party currently governs Canada (as of 2025)?
A. Liberal Party
B. Conservative Party
C. Green Party
D. Bloc Québécois
Answer: A. Liberal Party (based on latest data as of 2025)

38. 
True or False
The Bloc Québécois is a national party with candidates in every province.
Answer: False
(The Bloc only runs candidates in Quebec.)

39. 
Multiple Choice
Who has the right to vote in federal elections in Canada?
A. Only Canadianborn citizens
B. Permanent residents
C. Citizens aged 18 or older
D. Refugees with status
Answer: C. Citizens aged 18 or older

40. 
True or False
Voting in Canada is mandatory.
Answer: False
(Voting is a right, not a legal obligation.)

41. 
Multiple Choice
What is the role of the Prime Minister?
A. Head of the Senate
B. Leader of the Official Opposition
C. Head of government
D. Chief Justice of Canada
Answer: C. Head of government

42. 
True or False
The Prime Minister also serves as the Governor General.
Answer: False

43. 
Multiple Choice
What is the role of the Governor General?
A. Represent the Queen in Canada
B. Head of a political party
C. Elect MPs
D. Manage taxes
Answer: A. Represent the Queen in Canada

44. 
True or False
The Governor General opens Parliament and signs bills into law.
Answer: True

45. 
Multiple Choice
What is the highest court in Canada?
A. Federal Court
B. Court of Appeal
C. Supreme Court
D. Provincial Court
Answer: C. Supreme Court

46. 
True or False
The Supreme Court of Canada has 15 judges.
Answer: False
(It has 9 judges.)

47. 
Multiple Choice
What are the three branches of government in Canada?
A. Legislative, Executive, Judicial
B. Provincial, Federal, Municipal
C. Democratic, Republican, Monarchy
D. Elected, Appointed, Judicial
Answer: A. Legislative, Executive, Judicial

48. 
True or False
The Executive Branch includes the Prime Minister and Cabinet.
Answer: True

49. 
Multiple Choice
Who chooses the Cabinet Ministers?
A. Parliament
B. Governor General
C. The Senate
D. The Prime Minister
Answer: D. The Prime Minister

50. 
True or False
Cabinet Ministers are responsible for running government departments.
Answer: True

51. 
Multiple Choice
Which Canadian province is officially bilingual?
A. Ontario
B. Quebec
C. New Brunswick
D. Manitoba
Answer: C. New Brunswick

52. 
True or False
New Brunswick is the only province that is officially bilingual.
Answer: True

53. 
Multiple Choice
Who is the head of state in Canada?
A. Prime Minister
B. Speaker of the House
C. Governor General
D. King Charles III
Answer: D. King Charles III

54. 
True or False
The Prime Minister is Canada’s head of state.
Answer: False
(The head of state is the monarch, represented in Canada by the Governor General.)

55. 
Multiple Choice
What is the responsibility of the Speaker of the House of Commons?
A. Enforce the Charter
B. Manage the federal budget
C. Preside over House debates
D. Lead the Senate
Answer: C. Preside over House debates

56. 
True or False
The Speaker of the House is elected by all Canadians.
Answer: False
(The Speaker is elected by Members of Parliament.)

57. 
Multiple Choice
What is the name of Canada’s national anthem?
A. The Maple Leaf Forever
B. O Canada
C. God Save the Queen
D. Canada, My Canada
Answer: B. O Canada

58. 
True or False
“O Canada” became the national anthem in 1967.
Answer: False
(It officially became the national anthem in 1980.)

59. 
Multiple Choice
What does the term “multiculturalism” mean in Canada?
A. A single national culture
B. Cultural assimilation
C. Recognition and celebration of diverse cultures
D. Religious conformity
Answer: C. Recognition and celebration of diverse cultures

60. 
True or False
Multiculturalism is part of Canada’s national identity.
Answer: True

61. 
Multiple Choice
When did the Canadian Charter of Rights and Freedoms become law?
A. 1867
B. 1967
C. 1982
D. 1999
Answer: C. 1982

62. 
True or False
The Charter applies only to immigrants.
Answer: False
(It applies to everyone in Canada.)

63. 
Multiple Choice
What is the role of the Senate in Parliament?
A. Enforce laws
B. Introduce criminal law
C. Review and approve laws
D. Represent foreign governments
Answer: C. Review and approve laws

64. 
True or False
Senators are elected by the people.
Answer: False
(They are appointed by the Governor General on the advice of the Prime Minister.)

65. 
Multiple Choice
Which legal document recognizes the rights of Indigenous peoples in Canada?
A. Criminal Code
B. Bill of Exchange
C. Constitution Act, 1982
D. Immigration Act
Answer: C. Constitution Act, 1982

66. 
True or False
The rights of Indigenous peoples are protected in the Constitution.
Answer: True

67. 
Multiple Choice
What is a key principle of Canadian democracy?
A. Martial law
B. Rule of Law
C. Absolute monarchy
D. Oneparty rule
Answer: B. Rule of Law

68. 
True or False
In Canada, no one is above the law.
Answer: True

69. 
Multiple Choice
What do Canadians pledge allegiance to during the citizenship ceremony?
A. The Prime Minister
B. The Governor General
C. The King of Canada
D. The Charter
Answer: C. The King of Canada

70. 
True or False
New citizens must swear allegiance to Canada’s Prime Minister.
Answer: False
(They swear allegiance to the King of Canada.)

71. 
Multiple Choice
Which war was Canada involved in from 1914 to 1918?
A. Korean War
B. World War II
C. World War I
D. Boer War
Answer: C. World War I

72. 
True or False
Remembrance Day commemorates only World War I.
Answer: False
(It honours all who served in wars, including WWII and peacekeeping missions.)

73. 
Multiple Choice
What is Canada’s motto?
A. Unity and Strength
B. Freedom and Peace
C. From Sea to Sea
D. Liberty for All
Answer: C. From Sea to Sea

74. 
True or False
Canada’s motto reflects the vast geography of the country.
Answer: True

75. 
Multiple Choice
Which Canadian invented the telephone?
A. Alexander Graham Bell
B. John A. Macdonald
C. Frederick Banting
D. Terry Fox
Answer: A. Alexander Graham Bell

76. 
True or False
Alexander Graham Bell also invented the pacemaker.
Answer: False
(He invented the telephone.)

77. 
Multiple Choice
What is the highest honour a Canadian can receive?
A. Medal of Honour
B. Order of Canada
C. Peacekeeping Cross
D. Canadian Crown
Answer: B. Order of Canada

78. 
True or False
Only politicians can receive the Order of Canada.
Answer: False
(Any Canadian who has made a significant contribution can receive it.)

79. 
Multiple Choice
Which Canadian province was formerly called “Upper Canada”?
A. Ontario
B. Quebec
C. Manitoba
D. Nova Scotia
Answer: A. Ontario

80. 
True or False
“Lower Canada” is the old name for Alberta.
Answer: False
(Lower Canada referred to Quebec.)

81. 
Multiple Choice
What does it mean to be a responsible citizen in Canada?
A. Obeying the law and voting
B. Paying foreign tax
C. Following provincial leaders only
D. Owning land
Answer: A. Obeying the law and voting

82. 
True or False
Jury duty is a civic responsibility of Canadians.
Answer: True


83. 
Multiple Choice
Who can run for public office in Canada?
A. Any Canadian citizen age 16+
B. Only government workers
C. Only those born in Canada
D. Any Canadian citizen age 18+
Answer: D. Any Canadian citizen age 18+

84. 
True or False
Permanent residents can run for office.
Answer: False
(Only citizens can run for office.)

85. 
Multiple Choice
Which group of Canadians has the right to selfgovernment?
A. Acadians
B. Immigrants
C. Indigenous peoples
D. Business owners
Answer: C. Indigenous peoples

86. 
True or False
The federal government does not recognize Indigenous rights.
Answer: False
(Indigenous rights are protected in the Constitution.)

87. 
Multiple Choice
When was the Canadian flag officially adopted?
A. 1867
B. 1921
C. 1965
D. 1980
Answer: C. 1965

88. 
True or False
The maple leaf was used on Canada’s flag since Confederation.
Answer: False
(The maple leaf became the official flag symbol in 1965.)

89. 
Multiple Choice
What is the Canadian system of law based on?
A. Military law
B. English common law and French civil law
C. Religious law
D. Roman law
Answer: B. English common law and French civil law

90. 
True or False
Canada has one legal system across all provinces.
Answer: False
(Quebec uses a civil code for private matters; other provinces follow common law.)

91. 
Multiple Choice
Which of the following is NOT a responsibility of Canadian citizens?
A. Voting
B. Obeying the law
C. Serving in the military
D. Serving on a jury
Answer: C. Serving in the military

92. 
True or False
Military service is mandatory in Canada.
Answer: False
(Canada has a volunteer military.)

93. 
Multiple Choice
Who is the current Governor General of Canada? (As of 2025)
A. Julie Payette
B. Mary May Simon
C. Adrienne Clarkson
D. Michaëlle Jean
Answer: B. Mary May Simon

94. 
True or False
The Governor General represents the federal Cabinet.
Answer: False
(The Governor General represents the monarch.)

95. 
Multiple Choice
How many provinces and territories does Canada have?
A. 12
B. 13
C. 10
D. 14
Answer: B. 13
(10 provinces and 3 territories.)

96. 
True or False
Yukon is the newest Canadian province.
Answer: False
(Yukon is a territory, and Nunavut is the newest.)

97. 
Multiple Choice
Which province is the only officially bilingual province?
A. Ontario
B. New Brunswick
C. Quebec
D. Manitoba
Answer: B. New Brunswick

98. 
True or False
Quebec is officially bilingual at the federal level.
Answer: False
(Only New Brunswick is officially bilingual by its own provincial status.)

99. 
Multiple Choice
What is the significance of Confederation?
A. It ended British rule
B. It formed the United Nations
C. It created the country of Canada in 1867
D. It was the beginning of peacekeeping missions
Answer: C. It created the country of Canada in 1867

100. 
True or False
Confederation occurred in 1982.
Answer: False
(Confederation occurred on July 1, 1867.)

101. 
Multiple Choice
What are the responsibilities of Canadian citizenship?
A. Pay taxes and obey the law
B. Vote in elections and serve on a jury
C. Defend Canada if the need arises
D. All of the above
Answer: D. All of the above

102. 
True or False
Canada’s constitution is the highest law of the land.
Answer: True

103. 
Multiple Choice
What is one of the residency requirements for Canadian citizenship?
A. 730 days in Canada in the last 10 years
B. 1,460 days in Canada in the last 5 years
C. 1,095 days in Canada in the last 5 years
D. 365 days in Canada in the last 3 years
Answer: C. 1,095 days in the last 5 years


104.
True or False
The Canadian Charter of Rights and Freedoms is part of the Constitution.
Answer: True


105. 
Multiple Choice
Which level of government is responsible for education?
A. Federal
B. Provincial/Territorial
C. Municipal
D. International
Answer: B. Provincial/Territorial

106. 
True or False
The Prime Minister is the head of state in Canada.
Answer: False
(The head of state is the Monarch; the Prime Minister is the head of government.)

107. 
Multiple Choice
What is one example of a democratic right in Canada?
A. Free public transport
B. The right to a free house
C. The right to vote
D. Free healthcare
Answer: C. The right to vote

108. 
True or False
Remembrance Day is celebrated on November 11.
Answer: True

109. 
Multiple Choice
What does the term “Indigenous Peoples” in Canada refer to?
A. Recent immigrants
B. Only Métis
C. First Nations, Inuit, and Métis
D. Only Inuit
Answer: C. First Nations, Inuit, and Métis

110. 
True or False
Quebec is the only province where French is the sole official language.
Answer: True

111. 
Multiple Choice
Who can run for election in Canada?
A. Canadian citizens who are at least 18 years old
B. Only citizens over 35
C. Any permanent resident
D. Only Prime Minister’s nominees
Answer: A. Canadian citizens who are at least 18 years old

112. 
True or False
Only Canadian citizens can vote in federal elections.
Answer: True

113. 
Multiple Choice:
Which group of people helped build the Canadian Pacific Railway?
A. German settlers
B. Chinese labourers
C. Portuguese immigrants
D. French fur traders
Answer: B. Chinese labourers

114. 
True or False
“O Canada” was originally written in French.
Answer: True

115. 
Multiple Choice
What is the name of Canada’s police force that serves all provinces except Ontario and Quebec?
A. Canadian Police Corps
B. North Force
C. Royal Canadian Mounted Police (RCMP)
D. National Law Service
Answer: C. Royal Canadian Mounted Police (RCMP)


116. 
True or False
The RCMP enforces federal laws across Canada.
Answer: True

117. 
Multiple Choice
Who is responsible for choosing Senators in Canada?
A. The House of Commons
B. The Governor General
C. The Prime Minister
D. The Chief Justice
Answer: C. The Prime Minister


118. 
True or False
Senators are elected by citizens during federal elections.
Answer: False
(Senators are appointed.)

119. 
Multiple Choice
Which group of Indigenous peoples in Canada are known for living in the North?
A. Métis
B. Cree
C. Inuit
D. Mi’kmaq
Answer: C. Inuit

120. 
True or False
The Métis have both First Nations and European ancestry.
Answer: True

121. 
Multiple Choice
What is the name of Canada’s Governor General as of 2025?
A. Adrienne Clarkson
B. Michaëlle Jean
C. Mary Simon
D. Julie Payette
Answer: C. Mary Simon

122. 
True or False
Mary Simon is the first Indigenous person to serve as Governor General of Canada.
Answer: True

123. 
Multiple Choice
Who is considered the founder of modern Quebec?
A. John A. Macdonald
B. Jacques Cartier
C. Samuel de Champlain
D. Louis Riel
Answer: C. Samuel de Champlain


124. 
True or False
Samuel de Champlain established the first permanent European settlement in Newfoundland.
Answer: False
(He founded Quebec City.)

125. 
Multiple Choice
What is the role of the Cabinet in Canada?
A. To make judicial decisions
B. To enforce provincial laws
C. To propose and implement government policy
D. To crown the monarch
Answer: C. To propose and implement government policy


126. 
True or False
Cabinet Ministers are elected by citizens.
Answer: False
(They are appointed by the Prime Minister.)

127. 
Multiple Choice
What is the minimum voting age in Canada?
A. 16
B. 18
C. 21
D. 25
Answer: B. 18

128. 
True or False
Voting in Canada is a legal requirement for all citizens.
Answer: False
(It is a civic duty, not mandatory.)

129. 
Multiple Choice
What does the term “responsible government” mean?
A. The government makes all decisions in secret
B. The government must resign if it loses a vote in the legislature
C. The opposition party must govern responsibly
D. Only provincial governments make laws
Answer: B. The government must resign if it loses a vote in the legislature


130. 
True or False
“Responsible government” originated in Britain.
Answer: True

131. 
Multiple Choice
Which act granted Canada its independence from the United Kingdom in 1982?
A. The British North America Act
B. The Constitution Act
C. The Dominion Act
D. The Freedom Charter
Answer: B. The Constitution Act

132. 
True or False
The Constitution Act of 1982 included the Canadian Charter of Rights and Freedoms.
Answer: True

133. 
Multiple Choice
Which of the following is a right protected under the Charter of Rights and Freedoms?
A. The right to bear arms
B. The right to free health care
C. Freedom of religion
D. The right to drive
Answer: C. Freedom of religion


134. 
True or False
The Canadian Charter guarantees absolute freedom of speech with no limitations.
Answer: False
(Freedoms can be limited in certain circumstances, such as hate speech.)

135. 
Multiple Choice
How many Senators does Canada have?
A. 105
B. 250
C. 75
D. 50
Answer: A. 105

136. 
True or False
Senators are elected by the provinces.
Answer: False
(They are appointed by the Prime Minister.)

137. 
Multiple Choice
Which federal institution is responsible for interpreting laws in Canada?
A. The House of Commons
B. The Senate
C. The Supreme Court
D. The Prime Minister’s Office
Answer: C. The Supreme Court

138. 
True or False
The Supreme Court of Canada is the highest court in the country.
Answer: True

139. 
Multiple Choice
What is the purpose of the Canadian Constitution?
A. To regulate businesses
B. To set rules for the monarchy
C. To define how Canada is governed
D. To assign taxes
Answer: C. To define how Canada is governed


140. 
True or False
The Canadian Constitution includes provincial laws.
Answer: False
(The Constitution defines the division of powers, not provincial law.)

141. 
Multiple Choice
What is one key difference between federal and provincial governments in Canada?
A. Only federal government can collect taxes
B. Provincial governments handle immigration
C. Provinces manage health care and education
D. Federal government chooses mayors
Answer: C. Provinces manage health care and education

142. 
True or False
The provinces have the power to make their own laws.
Answer: True

143. 
Multiple Choice
Which group of Canadians has the right to claim Aboriginal rights and land claims?
A. French Canadians
B. British settlers
C. Indigenous peoples
D. Recent immigrants
Answer: C. Indigenous peoples


144. 
True or False
Aboriginal rights are protected in the Canadian Constitution.
Answer: True


145. 
Multiple Choice
What does the red maple leaf on the Canadian flag symbolize?
A. Agriculture
B. Canadian forests
C. Canada and its people
D. The British Empire
Answer: C. Canada and its people

146. 
True or False
The red and white colors of the flag are Canada’s national colours.
Answer: True

147. 
Multiple Choice
Which day is recognized as Canada’s birthday?
A. July 4
B. July 1
C. June 30
D. September 1
Answer: B. July 1

148. 
True or False
Canada Day celebrates Confederation in 1867.
Answer: True

149. 
Multiple Choice
How many provinces and territories are there in Canada?
A. 10 provinces, 3 territories
B. 12 provinces, 2 territories
C. 9 provinces, 4 territories
D. 13 provinces, 0 territories
Answer: A. 10 provinces, 3 territories


150. 
True or False
Yukon is a Canadian province.
Answer: False
(It is a territory.)

151. 
Multiple Choice
Who was the first Prime Minister of Canada?
A. Lester B. Pearson
B. Pierre Trudeau
C. John A. Macdonald
D. Wilfrid Laurier
Answer: C. John A. Macdonald


152. 
True or False
John A. Macdonald was from British Columbia.
Answer: False
(He was from Ontario and represented Kingston.)

153. 
Multiple Choice
Which document established the Dominion of Canada in 1867?
A. Constitution Act
B. Charter of Rights
C. British North America Act
D. Canadian Declaration of Independence
Answer: C. British North America Act

154. 
True or False
The British North America Act was passed by Canada’s Parliament.
Answer: False
(It was passed by the British Parliament.)

155. 
Multiple Choice
Which of the following provinces joined Canada in 1870?
A. Alberta
B. Manitoba
C. British Columbia
D. Nova Scotia
Answer: B. Manitoba

156. 
True or False
British Columbia was the last province to join Confederation.
Answer: False
(Newfoundland and Labrador joined last, in 1949.)

157. 
Multiple Choice
What is the main role of the Prime Minister of Canada?
A. Head of the judiciary
B. Head of state
C. Head of government
D. Head of the military
Answer: C. Head of government

158. 
True or False
The Governor General appoints the Prime Minister directly after every election.
Answer: False
(The Governor General appoints the leader of the party with the most seats in the House.)

159. 
Multiple Choice
Which of the following Canadian cities is home to the headquarters of the federal government?
A. Toronto
B. Montreal
C. Ottawa
D. Vancouver
Answer: C. Ottawa

160. 
True or False
Ottawa is the capital of Quebec.
Answer: False
(Ottawa is the capital of Canada, not Quebec.)

161. 
Multiple Choice
Who has the power to dissolve Parliament in Canada?
A. The Senate
B. The Prime Minister
C. The Chief Justice
D. The Governor General
Answer: D. The Governor General

162. 
True or False
Only the Prime Minister can call an election in Canada.
Answer: False
(The Governor General calls an election on the advice of the Prime Minister.)

163. 
Multiple Choice
Which of these is a fundamental responsibility of Canadian citizens?
A. Owning property
B. Serving in the Senate
C. Obeying the law
D. Attending town hall meetings
Answer: C. Obeying the law

164. 
True or False
It is optional for Canadian citizens to obey the law.
Answer: False
(It is a legal obligation.)

165. 
Multiple Choice
What does multiculturalism in Canada promote?
A. A single national identity
B. Unity through diversity
C. Only English and French cultures
D. Restrictions on immigration
Answer: B. Unity through diversity

166. 
True or False
Multiculturalism was officially adopted in Canada in 1971.
Answer: True

167. 
Multiple Choice
Which province is known for having a large Francophone population?
A. Alberta
B. Ontario
C. Quebec
D. Newfoundland
Answer: C. Quebec

168. 
True or False
French and English are Canada’s two official languages.
Answer: True


169. 
Multiple Choice
What is one way Canadians can actively participate in their democracy?
A. Avoid taxes
B. Vote in elections
C. Travel internationally
D. Only speak English
Answer: B. Vote in elections

170. 
True or False
Voting in a Canadian election is optional but strongly encouraged.
Answer: True

171. 
Multiple Choice
How is the Prime Minister selected?
A. Appointed by the Senate
B. Elected by the people directly
C. Appointed by the King
D. Leader of the party with the most elected MPs
Answer: D. Leader of the party with the most elected MPs

172. 
True or False
Canada has a twoparty political system.
Answer: False
(Canada has multiple political parties.)

173. 
Multiple Choice
Which of the following is a federal political party in Canada?
A. Bloc Québécois
B. Yukon Liberal Party
C. Alberta Alliance
D. Saskatoon United Party
Answer: A. Bloc Québécois

174. 
True or False
The Bloc Québécois is active in all provinces of Canada.
Answer: False
(It mainly runs candidates in Quebec.)

175. 
Multiple Choice
Which province joined Canada in 1871?
A. Prince Edward Island
B. British Columbia
C. Saskatchewan
D. Manitoba
Answer: B. British Columbia

176. 
True or False
British Columbia joined Confederation before Manitoba.
Answer: False
(Manitoba joined in 1870; BC in 1871.)

177. 
Multiple Choice
Who is responsible for upholding Indigenous treaties in Canada?
A. Provincial governments
B. The Senate
C. The federal government
D. The Canadian public
Answer: C. The federal government

178. 
True or False
Treaties are legally binding agreements between Indigenous peoples and the Crown.
Answer: True

179. 
Multiple Choice
Which province was created from the Northwest Territories in 1905?
A. Yukon
B. Alberta
C. Newfoundland
D. Nunavut
Answer: B. Alberta

180. 
True or False
Nunavut was created before Alberta.
Answer: False
(Nunavut was created in 1999.)

181. 
Multiple Choice
Who administers the Canadian citizenship test and ceremonies?
A. Canada Revenue Agency
B. Immigration, Refugees and Citizenship Canada (IRCC)
C. Public Safety Canada
D. Canada Border Services Agency
Answer: B. Immigration, Refugees and Citizenship Canada (IRCC)

182. 
True or False
The RCMP only operates within the province of Ontario.
Answer: False
(The RCMP operates in all provinces and territories except Ontario and Quebec, which have their own provincial police.)

183. 
Multiple Choice
What is the main reason people choose to become Canadian citizens?
A. Free travel to the U.S.
B. To get married
C. To have the right to vote and participate in Canadian society
D. To pay less taxes
Answer: C. To have the right to vote and participate in Canadian society

184. 
True or False
Canadian citizens are required to vote in every election by law.
Answer: False
(Voting is a right and civic duty but not legally required.)

185. 
Multiple Choice
Which Canadian province is the only officially bilingual province?
A. Ontario
B. Manitoba
C. Quebec
D. New Brunswick
Answer: D. New Brunswick

186. 
True or False
All provinces in Canada are officially bilingual.
Answer: False
(Only New Brunswick is officially bilingual.)

187. 
Multiple Choice
What is the name of Canada’s head of state?
A. Prime Minister
B. Chief Justice
C. King of Canada
D. Speaker of the House
Answer: C. King of Canada


188. 
True or False
The King of Canada is the ceremonial head of state and does not govern.
Answer: True

189. 
Multiple Choice
What are two official symbols of Canada?
A. Moose and Mount Everest
B. Beaver and maple leaf
C. Salmon and wheat
D. Igloo and polar bear
Answer: B. Beaver and maple leaf

190. 
True or False
The Charter of Rights and Freedoms is part of Canada’s Constitution.
Answer: True

191. 
Multiple Choice
What is one right guaranteed to all Canadian citizens under the Charter?
A. Free cable television
B. Free groceries
C. Freedom of expression
D. Automatic employment
Answer: C. Freedom of expression

192. 
True or False
Only men have the right to freedom of religion in Canada.
Answer: False
(Rights apply equally to all people.)

193. 
Multiple Choice
What branch of government is responsible for making laws in Canada?
A. Judicial
B. Legislative
C. Executive
D. Municipal
Answer: B. Legislative

194. 
True or False
The Executive branch of government is made up of judges.
Answer: False
(The Executive includes the Prime Minister and Cabinet, not judges.)

195. 
Multiple Choice
What level of government is responsible for education in Canada?
A. Federal
B. Municipal
C. Provincial and Territorial
D. Senate
Answer: C. Provincial and Territorial

196. 
True or False
The federal government controls local school boards.
Answer: False
(Provinces and territories handle education.)

197. 
Multiple Choice
Which Canadian law protects the environment?
A. Environmental Protection Act
B. Canadian Clean Air Act
C. Fisheries Act
D. All of the above
Answer: D. All of the above

198. 
True or False
Canada does not have laws to protect its natural environment.
Answer: False

199. 
Multiple Choice
What is the national sport of Canada?
A. Hockey
B. Lacrosse
C. Curling
D. Soccer
Answer: A. Hockey (Ice hockey is the official winter sport, lacrosse is the official summer sport, but hockey is widely considered the national sport)

200. 
True or False
Lacrosse is Canada’s official winter sport.
Answer: False
(Lacrosse is the official summer sport.)

201. 
Multiple Choice
What year was the Canadian flag adopted?
A. 1867
B. 1921
C. 1965
D. 1982
Answer: C. 1965

202. 
True or False
The Canadian flag has a blue maple leaf in the center.
Answer: False
(It has a red maple leaf.)

203. 
Multiple Choice
Which level of government is responsible for garbage collection and local policing?
A. Federal
B. Provincial
C. Municipal
D. Territorial
Answer: C. Municipal

204. 
True or False
Provincial governments manage immigration in Canada.
Answer: False
(Immigration is a shared responsibility between federal and provincial governments.)

205. 
Multiple Choice
Which Canadian Prime Minister introduced the Official Languages Act in 1969?
A. Pierre Trudeau
B. Brian Mulroney
C. Lester B. Pearson
D. John Diefenbaker
Answer: A. Pierre Trudeau

206. 
True or False
The Official Languages Act makes both English and French the official languages of Canada.
Answer: True

207. 
Multiple Choice
What is a responsibility of the federal government?
A. Education
B. Garbage collection
C. Defense and national security
D. Libraries
Answer: C. Defense and national security

208. 
True or False
Municipal governments manage the armed forces.
Answer: False
(The federal government is responsible for the military.)

209. 
Multiple Choice
What is the highest military honour awarded in Canada?
A. Star of Courage
B. Order of Canada
C. Victoria Cross
D. Commander’s Medal
Answer: C. Victoria Cross

210. 
True or False
The Victoria Cross can only be awarded to civilians.
Answer: False
(It is awarded for military bravery.)

211. 
Multiple Choice
What is the term for Canada’s system of government?
A. Republic
B. Absolute Monarchy
C. Constitutional Monarchy
D. Direct Democracy
Answer: C. Constitutional Monarchy

212. 
True or False
Canada is a republic with an elected king.
Answer: False


213. 
Multiple Choice
Which of the following is a right of Canadian citizenship?
A. Free property
B. Protection under the law
C. Free airline tickets
D. Access to private education
Answer: B. Protection under the law

214. 
True or False
Only Canadianborn individuals have rights under the Charter.
Answer: False
(All people in Canada have rights under the Charter.)

215.
Multiple Choice
Which ocean borders Canada on the west?
A. Atlantic Ocean
B. Pacific Ocean
C. Arctic Ocean
D. Indian Ocean
Answer: B. Pacific Ocean

216. 
True or False
The Arctic Ocean borders Canada to the north.
Answer: True

217. 
Multiple Choice
Which explorer is known for founding Quebec in 1608?
A. Jacques Cartier
B. Samuel de Champlain
C. John Cabot
D. Pierre Radisson
Answer: B. Samuel de Champlain

218. 
True or False
Samuel de Champlain was a British explorer.
Answer: False
(He was a French explorer.)

219. 
Multiple Choice
What event is commemorated on Remembrance Day?
A. Canadian independence
B. Confederation
C. Sacrifices of veterans and military personnel
D. The signing of the Charter
Answer: C. Sacrifices of veterans and military personnel

220. 
True or False
Remembrance Day is held on July 1st.
Answer: False
(It is held on November 11th.)

221. 
Multiple Choice
Which famous Canadian invention changed global communication?
A. Telegraph
B. Telephone
C. Internet
D. Steam engine
Answer: B. Telephone

222. 
True or False
Alexander Graham Bell invented the telephone in Canada.
Answer: True

223. 
Multiple Choice
Who is responsible for collecting taxes at the federal level?
A. Department of National Defence
B. Canada Revenue Agency
C. Statistics Canada
D. Governor General’s Office
Answer: B. Canada Revenue Agency

224. 
True or False
Provinces can also collect taxes for health and education services.
Answer: True

225. 
Multiple Choice
What does multiculturalism mean in Canada?
A. Having one dominant culture
B. Rejection of immigrant traditions
C. Celebration of diverse cultures
D. Only English and French culture are valued
Answer: C. Celebration of diverse cultures

226. 
True or False
Canada encourages immigrants to abandon their cultures.
Answer: False

227. 
Multiple Choice
Which holiday is celebrated on July 1st?
A. Labour Day
B. Canada Day
C. Thanksgiving
D. Victoria Day
Answer: B. Canada Day

228. 
True or False
Canada Day celebrates the birth of Canada as a nation.
Answer: True

229. 
Multiple Choice
Which Canadian province has the largest population?
A. British Columbia
B. Alberta
C. Ontario
D. Quebec
Answer: C. Ontario


230. 
True or False
British Columbia is the most populous province in Canada.
Answer: False
(Ontario has the largest population.)

231. 
Multiple Choice
Which part of the Canadian Parliament is not elected?
A. House of Commons
B. Senate
C. Municipal Council
D. Cabinet Ministers
Answer: B. Senate

232. 
True or False
Senators in Canada are appointed.
Answer: True

233. 
Multiple Choice
Which Canadian province is the only one to have a majority of Frenchspeaking residents?
A. New Brunswick
B. Quebec
C. Manitoba
D. Prince Edward Island
Answer: B. Quebec


234. 
True or False
French is the only official language in Quebec.
Answer: True

235. 
Multiple Choice
What is the purpose of a referendum?
A. Elect judges
B. Vote on laws directly by the people
C. Choose party leaders
D. Confirm sports team names
Answer: B. Vote on laws directly by the people

236. 
True or False
Referendums are part of Canada’s democratic process.
Answer: True

237. 
Multiple Choice
What is the name of the annual holiday in September recognizing workers?
A. Labour Day
B. Thanksgiving
C. Canada Day
D. Civic Holiday
Answer: A. Labour Day

238. 
True or False
Labour Day celebrates veterans and the military.
Answer: False
(Remembrance Day does.)

239. 
Multiple Choice
What does the term “riding” refer to in Canadian politics?
A. A horse competition
B. A government program
C. An electoral district
D. A police unit
Answer: C. An electoral district

240. 
True or False
An electoral district is sometimes called a riding.
Answer: True

241. 
Multiple Choice
Which Canadian Prime Minister was awarded the Nobel Peace Prize?
A. John Diefenbaker
B. William Lyon Mackenzie King
C. Lester B. Pearson
D. Stephen Harper
Answer: C. Lester B. Pearson

242. 
True or False
Lester B. Pearson helped establish the United Nations peacekeeping forces.
Answer: True

243. 
Multiple Choice
What do we call the document that outlines the rules for Canada’s system of government?
A. The Charter
B. The Constitution
C. The Proclamation
D. The Bill of Rights
Answer: B. The Constitution

244. 
True or False
The Canadian Constitution was repatriated in 1982.
Answer: True

245. 
Multiple Choice
What is the minimum voting age in Canadian federal elections?
A. 16
B. 18
C. 21
D. 25
Answer: B. 18

246. 
True or False
Permanent residents can vote in Canadian federal elections.
Answer: False
(Only Canadian citizens can vote.)

247. 
Multiple Choice
Which of the following best describes Canadian identity?
A. One official culture
B. Diversity, respect, and shared values
C. Englishonly heritage
D. Total assimilation
Answer: B. Diversity, respect, and shared values

248. 
True or False
Respect for pluralism is a key part of Canadian society.
Answer: True


249. 
Multiple Choice
 Which of the following is considered a Canadian responsibility?
A. Receiving government aid
B. Owning land
C. Obeying the law
D. Getting free education
Answer: C. Obeying the law

250. 
True or False
All Canadian citizens must serve in the military.
Answer: False


251. 
Multiple Choice
Which act established English and French as official languages in Canada?
A. Charter of Rights
B. Official Languages Act
C. Constitution Act
D. Multiculturalism Act
Answer: B. Official Languages Act


252. 
True or False
All federal services in Canada are available in English and French.
Answer: True

253. 
Multiple Choice
Who are the Métis people?
A. First Nations from British Columbia
B. Inuit from the North
C. People of mixed Indigenous and European ancestry
D. Recent immigrants
Answer: C. People of mixed Indigenous and European ancestry

254. 
True or False
The Métis have a distinct culture, language, and history.
Answer: True

255. 
Multiple Choice
Who has the right to a fair trial in Canada?
A. Only Canadian citizens
B. All people in Canada
C. Only permanent residents
D. Only people over 18
Answer: B. All people in Canada


256. 
True or False
New Brunswick recognizes both English and French as official languages.
Answer: True

257. 
Multiple Choice
What is the name of the Indigenous language spoken by many Inuit?
A. Cree
B. Inuktitut
C. Dene
D. Ojibwe
Answer: B. Inuktitut

258. 
True or False
Inuktitut is still spoken by Inuit communities across Canada.
Answer: True

259. 
Multiple Choice
What does the Crown symbolize in Canada?
A. Canadian culture
B. The French monarchy
C. The sovereignty of the people and the rule of law
D. The Prime Minister’s office
Answer: C. The sovereignty of the people and the rule of law

260. 
True or False
The Crown plays a ceremonial role in Canada.
Answer: True


261. 
Multiple Choice
What is the main reason immigrants come to Canada?
A. Free travel
B. Opportunity, safety, and freedom
C. Free houses
D. Military training
Answer: B. Opportunity, safety, and freedom

262. 
True or False
Canada welcomes immigrants from around the world.
Answer: True

263. 
Multiple Choice
Which legal system is unique to the province of Quebec?
A. Islamic law
B. Civil law based on the French Code
C. American common law
D. Military law
Answer: B. Civil law based on the French Code

264. 
True or False
The Conservative and Liberal parties are two of the main federal political parties.
Answer: True

265.
Multiple Choice
Which branch of government is responsible for making laws?
A. Executive
B. Judicial
C. Legislative
D. Monarchy
Answer: C. Legislative

266. 
True or False
The judicial branch is responsible for interpreting laws.
Answer: True

267. 
Multiple Choice
Which Canadian province was the last to join Confederation?
A. Prince Edward Island
B. Alberta
C. Newfoundland and Labrador
D. British Columbia
Answer: C. Newfoundland and Labrador

268. 
True or False
Newfoundland and Labrador joined Canada in 1949.
Answer: True

269. 
Multiple Choice
What is the term for a change to the Constitution?
A. Revision
B. Amendment
C. Addition
D. Legislation
Answer: B. Amendment

270. 
True or False
The Constitution can never be changed.
Answer: False

271. 
Multiple Choice
Which of the following industries is Canada a world leader in?
A. Textiles
B. Forestry
C. Banana farming
D. Silk weaving
Answer: B. Forestry

272. 
True or False
Canada has the thirdlargest reserves of oil in the world.
Answer: True

273. 
Multiple Choice
Which Canadian sport is played with a puck on ice?
A. Soccer
B. Curling
B. Hockey
D. Lacrosse
Answer: C. Hockey

274. 
True or False
Ice hockey is considered Canada’s national winter sport.
Answer: True

275. 
Multiple Choice
What is the term for the national police service of Canada?
A. CSIS
B. RCMP
C. RCIP
D. OPP
Answer: B. RCMP

276. 
True or False
The Royal Canadian Mounted Police serves only in British Columbia.
Answer: False
(The RCMP serves across most provinces and territories.)

277. 
Multiple Choice
Which of these is a Canadian symbol of sovereignty and justice?
A. Parliament Hill
B. Maple syrup
C. Crown
D. Snow
Answer: C. Crown

278. 
True or False
Symbols like the Crown represent Canada’s system of constitutional monarchy.
Answer: True

279. 
Multiple Choice
What does the red maple leaf on Canada’s flag symbolize?
A. Industry
B. Nature and unity
C. Religion
D. English heritage
Answer: B. Nature and unity

280. 
True or False
The maple leaf became a national symbol in the 1800s.
Answer: True

281. 
Multiple Choice
What do Canadian citizenship applicants have to demonstrate during the citizenship test?
A. Their family tree
B. Fluency in Latin
C. Knowledge of Canada and basic language skills
D. Physical strength
Answer: C. Knowledge of Canada and basic language skills


282. 
True or False
All Canadian citizens must take the citizenship oath in French.
Answer: False
(The oath can be taken in English or French.)

283. 
Multiple Choice
Which province is the only one that is officially bilingual?
A. Quebec
B. Ontario
C. Manitoba
D. New Brunswick
Answer: D. New Brunswick

284. 
True or False
Quebec is the only province with French as the sole official language.
Answer: True

285. 
Multiple Choice
What is the role of the opposition parties in Parliament?
A. To assist the Prime Minister
B. To propose constitutional amendments
C. To oppose and hold the government accountable
D. To select Senators
Answer: C. To oppose and hold the government accountable

286. 
True or False
Opposition parties are not allowed to criticize government policies.
Answer: False
(Holding the government accountable is part of their role.)

287. 
Multiple Choice
Which Canadian city hosted the 2010 Winter Olympics?
A. Calgary
B. Ottawa
C. Vancouver
D. Montreal
Answer: C. Vancouver

288. 
True or False
The 2010 Winter Olympics were held in Vancouver and Whistler, British Columbia.
Answer: True

289. 
Multiple Choice
Which of the following is a responsibility of Canadian citizenship?
A. Voting only during provincial elections
B. Obeying only provincial laws
C. Serving on a jury when asked
D. Paying taxes only in cash
Answer: C. Serving on a jury when asked

290. 
True or False
Canadian citizens may be called to serve on a jury.
Answer: True


291. 
Multiple Choice
Which Canadian province is the largest in area?
A. Ontario
B. Alberta
C. Quebec
D. British Columbia
Answer: C. Quebec


292. 
True or False
Ontario is the largest Canadian province by land area.
Answer: False
(Quebec is the largest.)

293. 
Multiple Choice
Which of the following best describes Canada’s political system?
A. Absolute monarchy
B. Military dictatorship
C. Constitutional monarchy and parliamentary democracy
D. Oneparty state
Answer: C. Constitutional monarchy and parliamentary democracy


294. 
True or False
Canada has a constitutional monarchy, with the King as Head of State.
Answer: True


295. 
Multiple Choice
Who is considered the “Father of Confederation”?
A. John A. Macdonald
B. Pierre Trudeau
C. Wilfrid Laurier
D. Thomas D’Arcy McGee
Answer: A. John A. Macdonald

296. 
True or False
John A. Macdonald was Canada’s first Prime Minister.
Answer: True

297. 
Multiple Choice
What is Canada’s system of law based on?
A. Roman law
B. American law
C. British common law and French civil law
D. Indigenous tradition only
Answer: C. British common law and French civil law

298. 
True or False
Canada’s legal system is based only on British law.
Answer: False
(It includes both British common law and French civil law.)

299. 
Multiple Choice
How often are federal elections held in Canada (unless called earlier)?
A. Every 10 years
B. Every 2 years
C. Every 4 years
D. Every 6 years
Answer: C. Every 4 years

300. 
True or False
Federal elections in Canada must be held exactly every 5 years.
Answer: False
(They are held every 4 years, unless a vote of no confidence triggers an earlier election.)

301. 
Multiple Choice
What is the purpose of jury duty in Canada?
A. To help write laws
B. To protect the Prime Minister
C. To ensure fair trials
D. To volunteer in the community
Answer: C. To ensure fair trials

302. 
True or False
The Order of Canada is awarded for bravery in combat.
Answer: False
(It recognizes outstanding achievement and service to the country.)

303. 
Multiple Choice
What is the national winter sport of Canada?
A. Lacrosse
B. Curling
C. Ice hockey
D. Skiing
Answer: C. Ice hockey

304. 
True or False
Lacrosse is Canada’s official summer sport.
Answer: True


305. 
Multiple Choice
Who is Canada’s current Head of State?
A. The Prime Minister
B. The Governor General
C. The King
D. The Chief Justice
Answer: C. The King
(As of 2025, King Charles III)

306. 
True or False
The Governor General represents the King in Canada.
Answer: True

307. 
Multiple Choice
Which province was the last to join Canada?
A. Newfoundland and Labrador
B. Alberta
C. British Columbia
D. Saskatchewan
Answer: A. Newfoundland and Labrador

308. 
True or False
Newfoundland and Labrador joined Confederation in 1949.
Answer: True

309. 
Multiple Choice
Which is Canada’s oldest national park?
A. Banff National Park
B. Jasper National Park
C. Yoho National Park
D. Prince Albert National Park
Answer: A. Banff National Park

310. 
True or False
Banff National Park is located in Alberta.
Answer: True


311. 
Multiple Choice
How is the Canadian Prime Minister selected?
A. Elected directly by citizens
B. Appointed by the King
C. Chosen by the Senate
D. Leader of the party with the most seats in the House of Commons
Answer: D. Leader of the party with the most seats in the House of Commons

312. 
True or False
Canadian citizens vote directly for the Prime Minister.
Answer: False

313. 
Multiple Choice
What does the term “responsible government” mean in Canada?
A. Citizens must always vote
B. Government must respect religion
C. Government must resign if it loses the confidence of Parliament
D. Leaders are responsible for military decisions
Answer: C. Government must resign if it loses the confidence of Parliament

314. 
True or False
Responsible government means only the King can dissolve Parliament.
Answer: False

315. 
Multiple Choice
Which group of people were enslaved in Canada until the early 1800s?
A. British settlers
B. French nobility
C. Indigenous peoples and African Canadians
D. Irish immigrants
Answer: C. Indigenous peoples and African Canadians


316. 
True or False
Slavery existed in parts of early Canada.
Answer: True

317. 
Multiple Choice
What does the term “rule of law” mean?
A. Only police must obey the law
B. Everyone must follow the law, including leaders
C. Laws are optional
D. Judges create laws
Answer: B. Everyone must follow the law, including leaders

318. 
True or False
The Prime Minister is not subject to Canadian laws.
Answer: False

319. 
Multiple Choice
Which religion do most Canadians identify with?
A. Islam
B. Christianity
C. Hinduism
D. Buddhism
Answer: B. Christianity

320. 
True or False
Canada has no official religion.
Answer: True
(Canada is a secular state with freedom of religion.)

321. 
Multiple Choice
What is the term for laws passed by provincial or territorial governments?
A. Royal statutes
B. Bills
C. Acts
D. Provincial legislation
Answer: D. Provincial legislation

322.
True or False
Each province can create its own laws on matters like education and health.
Answer: True

323. 
Multiple Choice
What is the main document that outlines Canada’s system of government?
A. The Parliament Act
B. The Bill of Rights
C. The Canadian Constitution
D. The Charter of Nations
Answer: C. The Canadian Constitution

324. 
True or False
Canada’s Constitution includes the Charter of Rights and Freedoms.
Answer: True

325. 
Multiple Choice
Which is NOT a right guaranteed by the Charter of Rights and Freedoms?
A. Freedom of expression
B. The right to vote
C. Freedom from paying taxes
D. Freedom of religion
Answer: C. Freedom from paying taxes

326. 
True or False
The Canadian Human Rights Act only protects citizens.
Answer: False
(Explanation: It protects all people in Canada.)

327. 
Multiple Choice
What is the meaning of “multiculturalism”?
A. A single official culture
B. The dominance of European traditions
C. Celebration and inclusion of diverse cultures
D. All citizens must speak only English
Answer: C. Celebration and inclusion of diverse cultures

328. 
True or False
Multiculturalism is a core Canadian value.
Answer: True

329. 
Multiple Choice
Which province has the highest population in Canada?
A. British Columbia
B. Quebec
C. Alberta
D. Ontario
Answer: D. Ontario

330. 
True or False
Ontario has the largest population of any province.
Answer: True


331. 
Multiple Choice
What is the name of Canada’s central banking institution?
A. Canadian Revenue Agency
B. Royal Bank of Canada
C. Bank of Canada
D. Finance Ministry
Answer: C. Bank of Canada

332. 
True or False
The Bank of Canada is responsible for printing currency and setting interest rates.
Answer: True

333. 
Multiple Choice
When is Canada Day celebrated?
A. May 24
B. June 30
C. July 1
D. November 11
Answer: C. July 1

334. 
True or False
Canada Day marks the founding of the country in 1867.
Answer: True

335. 
Multiple Choice
What is one of the main reasons immigrants choose to come to Canada?
A. Cold weather
B. Free travel
C. Freedom, equality, and opportunity
D. Free luxury homes
Answer: C. Freedom, equality, and opportunity


336. 
True or False
Canada is widely recognized for welcoming immigrants.
Answer: True

337. 
Multiple Choice
What is the purpose of the Canadian Human Rights Act?
A. To promote French culture only
B. To define Parliament’s power
C. To protect individuals from discrimination
D. To establish trade agreements
Answer: C. To protect individuals from discrimination

338. 
True or False
New Brunswick is the only officially bilingual province in Canada.
Answer: True

339. 
Multiple Choice
What is the role of the Canadian military?
A. To control government
B. To serve only abroad
C. To defend Canada and assist in peacekeeping
D. To enforce political agendas
Answer: C. To defend Canada and assist in peacekeeping

340. 
True or False
Canada has contributed to international peacekeeping missions.
Answer: True

341. 
Multiple Choice
Which Canadian province borders only one other province?
A. Alberta
B. British Columbia
C. Quebec
D. Prince Edward Island
Answer: B. British Columbia

342. 
True or False
Prince Edward Island is the only province with no land borders.
Answer: True

343. 
Multiple Choice
What is Canada’s national motto?
A. United We Stand
B. Freedom Forever
C. From Sea to Sea
D. A Strong and Free North
Answer: C. From Sea to Sea
(Latin: A Mari Usque ad Mare)

344. 
True or False
Canada’s national motto reflects the vastness of its geography.
Answer: True

345. 
Multiple Choice
Which of the following best describes the meaning of “freedom of religion”?
A. Citizens must attend a church
B. Religion is banned
C. People may practice any religion or none at all
D. Only Christianity is legal
Answer: C. People may practice any religion or none at all

346. 
True or False
The federal government shares powers with provinces and territories.
Answer: True

347. 
Multiple Choice
What is the federal government’s role in education?
A. Controls all curriculum
B. None  education is a provincial responsibility
C. Licenses teachers
D. Runs public schools
Answer: B. None  education is a provincial responsibility

348. 
True or False
Each province and territory is responsible for its own education system.
Answer: True

349. 
Multiple Choice
What is the primary function of the Canadian Forces?
A. Run elections
B. Collect taxes
C. Defend Canada and its interests
D. Enforce municipal by-laws
Answer: C. Defend Canada and its interests

350. 
True or False
The Métis have a unique culture, language, and heritage.
Answer: True

351. 
Multiple Choice
What are the two major mountain ranges in Canada?
A. Laurentians and Alps
B. Rockies and Appalachians
C. Andes and Alps
D. Sierra and Cascades
Answer: B. Rockies and Appalachians

352. 
True or False
The RCMP enforces federal laws across all provinces and territories.
Answer: True

353. 
Multiple Choice
What is the longest river in Canada?
A. St. Lawrence River
B. Fraser River
C. Yukon River
D. Mackenzie River
Answer: D. Mackenzie River

354. 
True or False
The Mackenzie River is located in the Northwest Territories.
Answer: True

355. 
Multiple Choice
What is the role of a citizenship judge?
A. Enforce immigration laws
B. Conduct police background checks
C. Make decisions on citizenship applications and preside over ceremonies
D. Represent applicants in court
Answer: C. Make decisions on citizenship applications and preside over ceremonies


356. 
True or False
Quebec is the largest Canadian province by land area.
Answer: True

357. 
Multiple Choice
Which part of Canada is known for the Rocky Mountains?
A. Ontario
B. Alberta and British Columbia
C. Manitoba and Saskatchewan
D. Nova Scotia
Answer: B. Alberta and British Columbia

358. 
True or False
The Rocky Mountains run through eastern Canada.
Answer: False
(They are located in western Canada.)

359. 
Multiple Choice
What is the purpose of Canadian passports?
A. To prove employment
B. To access government healthcare
C. To travel internationally as a Canadian citizen
D. To register to vote
Answer: C. To travel internationally as a Canadian citizen

360. 
True or False
“O Canada” was adopted as the national anthem in 1980.
Answer: True

361. 
Multiple Choice
How many stripes are on the Canadian flag?
A. 3
B. 5
C. 13
D. 2
Answer: A. 3
(Two red vertical stripes and one white stripe with a red maple leaf.)

362. 
True or False
The Canadian flag has a red maple leaf with 11 points.
Answer: True

363. 
Multiple Choice
Which Canadian invention changed how people watch hockey games?
A. The puck
B. Instant replay
C. Goalie mask
D. Zamboni
Answer: B. Instant replay

364. 
True or False
The goalie mask was invented in Canada.
Answer: True

365. 
Multiple Choice
Which Canadian port city is one of the busiest in North America?
A. Halifax
B. Victoria
C. Vancouver
D. St. John’s
Answer: C. Vancouver

366. 
True or False
Vancouver is a major gateway for trade with Asia.
Answer: True

367. 
True or False 
Permanent residents are eligible for Canadian passports.
Answer: False
(Explanation: Only Canadian citizens are eligible.)


368. 
True or False 
The Canadian government has apologized for residential schools.
Answer: True

369. 
Multiple Choice
Which two provinces are officially bilingual at the federal level?
A. Quebec and Ontario
B. New Brunswick and Quebec
C. Nova Scotia and Quebec
D. Ontario and Manitoba
Answer: B. New Brunswick and Quebec

370. 
True or False
All federal government services must be offered in both English and French.
Answer: True

371. 
Multiple Choice
What does “freedom of conscience” mean under the Charter?
A. You must follow national religion
B. You can practice or not practice religion
C. Only major religions are protected
D. You must attend religious classes
Answer: B. You can practice or not practice religion

372. 
True or False
Freedom of conscience means you can choose not to follow any religion.
Answer: True

373.
Multiple Choice
What is the role of the Lieutenant Governor in each province?
A. Head of the provincial police
B. Premier’s deputy
C. The Queen’s representative in the province
D. Head of municipal governments
Answer: C. The Queen’s representative in the province

374. 
True or False
Sir John A. Macdonald helped build the Canadian Pacific Railway.
Answer: True

375. 
Multiple Choice
When was the Canadian Charter of Rights and Freedoms signed into law?
A. 1867
B. 1931
C. 1982
D. 1999
Answer: C. 1982


376. 
True or False
The Charter was introduced by Prime Minister Pierre Trudeau.
Answer: True

377. 
Multiple Choice
What is the population of Canada as of the 2021 Census?
A. About 25 million
B. About 38 million
C. About 50 million
D. About 30 million
Answer: B. About 38 million

378. 
True or False
Canada’s population is evenly distributed across all provinces.
Answer: False
(Population is concentrated in southern Ontario and Quebec.)

379. 
Multiple Choice
What is Canada’s national animal?
A. Moose
B. Polar bear
C. Beaver
D. Caribou
Answer: C. Beaver

380. 
True or False
The beaver symbolizes Canada’s industrious spirit.
Answer: True


381. 
Multiple Choice
Which Canadian prime minister is known for introducing multiculturalism?
A. Jean Chrétien
B. Stephen Harper
C. Pierre Trudeau
D. Justin Trudeau
Answer: C. Pierre Trudeau

382. 
True or False
Multiculturalism became official policy in Canada in 1971.
Answer: True


383. 
Multiple Choice
What is the name of Canada’s intelligence agency?
A. CIA
B. RCMP
C. CSIS
D. Canadian Secret Bureau
Answer: C. CSIS
(Canadian Security Intelligence Service)

384. 
True or False
CSIS handles Canada’s national security and intelligence matters.
Answer: True


385. 
Multiple Choice
What is Canada’s currency?
A. Canadian Pound
B. Canadian Dollar
C. Canadian Euro
D. North American Peso
Answer: B. Canadian Dollar

386. 
True or False
Canada’s currency is regulated by the Bank of Canada.
Answer: True

387. 
Multiple Choice
What is one responsibility of citizenship in Canada?
A. To own property
B. To pay taxes
C. To speak only English
D. To join the military
Answer: B. To pay taxes

388. 
True or False
Paying taxes is a legal obligation of all citizens and residents.
Answer: True

389. 
Multiple Choice
Which of the following is NOT a right protected under the Charter?
A. Legal rights
B. Mobility rights
C. Property rights
D. Democratic rights
Answer: C. Property rights

390. 
True or False
The Charter does not specifically protect property rights.
Answer: True

391.
Multiple Choice
What is a common reason for a citizenship application to be delayed or refused?
A. Owning property
B. Speaking multiple languages
C. Criminal history or missing documents
D. Having a fulltime job
Answer: C. Criminal history or missing documents

392. 
True or False
Parliament includes the House of Commons and the Senate.
Answer: True

393. 
Multiple Choice
What is a byelection?
A. An election held every five years
B. An election held when a seat becomes vacant
C. A vote in the Senate
D. An election called by provinces
Answer: B. An election held when a seat becomes vacant

394. 
True or False
Byelections only occur during general elections.
Answer: False

395. 
Multiple Choice
What is a riding?
A. A horse trail
B. A political region or district
C. A government department
D. A military unit
Answer: B. A political region or district

396. 
True or False
Each riding elects one member to the House of Commons.
Answer: True

397. 
Multiple Choice
How many judges serve on the Supreme Court of Canada?
A. 5
B. 7
C. 9
D. 12
Answer: C. 9

398. 
True or False
The Supreme Court is the highest court in Canada.
Answer: True

399. 
Multiple Choice
What is the significance of Remembrance Day?
A. It marks Canada’s independence
B. It celebrates Confederation
C. It honours soldiers who served Canada
D. It commemorates the signing of the Constitution
Answer: C. It honours soldiers who served Canada

400. 
True or False
Remembrance Day is observed on November 11.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Canada.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Canada.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $canadaSection->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Canada citizenship questions.");
    }
}
