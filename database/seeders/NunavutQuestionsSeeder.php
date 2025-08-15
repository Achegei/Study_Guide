<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question; // Assuming your model is named 'Question'
use App\Models\CourseSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NunavutQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $nunavutSection = CourseSection::firstOrCreate(
            ['title' => 'Nunavut'],
            [
                'type' => 'territory',
                'capital' => 'Iqaluit',
                'flag' => '/images/flags/nunavut.png',
                'description' => 'Questions specific to Nunavut, Canada.',
                'summary_audio_url' => '/audio/nunavut_summary.mp3'
            ]
        );

        // 2. Clear existing Nunavut questions to prevent duplicates on re-seed
        $nunavutSection->questions()->delete();

        // 3. The raw text containing all 400 Nunavut citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the capital city of Nunavut?
A. Iqaluit
B. Yellowknife
C. Whitehorse
D. Rankin Inlet
Answer: A. Iqaluit

2. 
True or False
Nunavut was established as a territory in 1999.
Answer: True


3. 
Multiple Choice
What is the primary language spoken by many Nunavut residents?
A. French
B. Inuktitut
C. Cree
D. Dene
Answer: B. Inuktitut

4. 
True or False
Nunavut was part of the Northwest Territories before becoming its own territory.
Answer: True

5. 
Multiple Choice
Who represents the King in Nunavut at the territorial level?
A. Premier
B. Commissioner
C. Speaker
D. Chief Justice
Answer: B. Commissioner

6. 
True or False
Nunavut is Canada’s most populous territory.
Answer: False
(It is the least populous.)

7. 
Multiple Choice
What type of government does Nunavut operate under?
A. Party-based legislature
B. Consensus government
C. Parliamentary democracy
D. Federal council
Answer: B. Consensus government

8. 
True or False
Nunavut has political parties represented in its legislature.
Answer: False
(It operates on consensus, not political parties.)

9. 
Multiple Choice
Which body of water borders Nunavut to the east?
A. Pacific Ocean
B. Hudson Bay
C. Atlantic Ocean
D. Great Bear Lake
Answer: B. Hudson Bay


10. 
True or False
Nunavut borders the United States.
Answer: False
(It borders Manitoba, Northwest Territories, and several bodies of water.)

11. 
Multiple Choice
What is the name of the legislative assembly of Nunavut?
A. House of Commons
B. Nunavut Assembly
C. Legislative Assembly of Nunavut
D. Territorial Senate
Answer: C. Legislative Assembly of Nunavut

12. 
True or False
Iqaluit is the largest city in Nunavut.
Answer: True

13. 
Multiple Choice
What traditional mode of transportation is associated with Inuit culture?
A. Canoes
B. Snowmobiles
C. Dog sleds (Qamutiik)
D. Skidoos
Answer: C. Dog sleds (Qamutiik)

14. 
True or False
Most of Nunavut’s communities are connected by road.
Answer: False
(They are accessible mostly by air.)

15. 
Multiple Choice
Which of the following is an Inuit cultural festival in Nunavut?
A. Toonik Tyme
B. Arctic Winter Games
C. Igloo Fest
D. Caribana
Answer: A. Toonik Tyme

16. 
True or False
Toonik Tyme celebrates Inuit traditions and survival skills.
Answer: True

17. 
Multiple Choice
Which natural resource is important to Nunavut’s economy?
A. Oil
B. Timber
C. Diamonds
D. Wheat
Answer: C. Diamonds

18. 
True or False
Nunavut has no natural resources.
Answer: False

19. 
Multiple Choice
How is the Premier of Nunavut chosen?
A. Direct election by voters
B. Appointed by the federal government
C. Chosen by MLAs in the Legislative Assembly
D. Rotated among communities
Answer: C. Chosen by MLAs in the Legislative Assembly

20. 
True or False
Nunavut’s Premier is elected through a general vote by residents.
Answer: False

21. 
Multiple Choice
Which traditional Inuit structure is used as a shelter in winter?
A. Wigwam
B. Longhouse
C. Igloo
D. Teepee
Answer: C. Igloo

22. 
True or False
Igloos are traditionally built using wooden logs.
Answer: False
(Igloos are built from blocks of snow.)

23. 
Multiple Choice
Which wildlife species is commonly found in Nunavut?
A. Bison
B. Polar Bear
C. Moose
D. Cougar
Answer: B. Polar Bear

24. 
True or False
Polar bears are found only in southern Nunavut.
Answer: False
(They inhabit coastal regions across northern Nunavut.)

25. 
Multiple Choice
Which of the following is a traditional Inuit language?
A. Ojibwe
B. Inuktitut
C. Dene
D. Cree
Answer: B. Inuktitut

26. 
True or False
Inuktitut uses its own writing system, syllabics.
Answer: True

27. 
Multiple Choice
Nunavut Day is celebrated on which date?
A. July 1
B. June 21
C. April 1
D. July 9
Answer: D. July 9

28. 
True or False
Nunavut Day marks the date Nunavut officially became a territory.
Answer: True
(July 9, 1993, marks the signing of the Nunavut Land Claims Agreement Act.)

29. 
Multiple Choice
Which agreement led to the creation of Nunavut?
A. Meech Lake Accord
B. Charlottetown Accord
C. Nunavut Land Claims Agreement
D. Treaty of Versailles
Answer: C. Nunavut Land Claims Agreement

30. 
True or False
The Nunavut Land Claims Agreement is Canada’s largest Indigenous land claim.
Answer: True

31. 
Multiple Choice
What is the approximate population of Nunavut (as of 2025)?
A. 40,000
B. 20,000
C. 5,000
D. 70,000
Answer: A. 40,000

32. 
True or False
The population of Nunavut is over 1 million people.
Answer: False

33. 
Multiple Choice
Who was Nunavut’s first Premier?
A. Joe Savikataaq
B. Paul Okalik
C. P.J. Akeeagok
D. Eva Aariak
Answer: B. Paul Okalik

34. 
True or False
Paul Okalik was selected by the people in a province-wide election.
Answer: False
(He was selected by MLAs through the consensus system.)

35. 
Multiple Choice
As of 2025, who is the current Premier of Nunavut?
A. Joe Savikataaq
B. P.J. Akeeagok
C. Eva Aariak
D. Doug Ford
Answer: B. P.J. Akeeagok

36. 
True or False
P.J. Akeeagok was elected through a political party system.
Answer: False
(Nunavut operates without political parties.)

37. 
Multiple Choice
Which federal electoral district represents Nunavut in the House of Commons?
A. Nunavik
B. Nunavut
C. North Arctic
D. Arctic Bay
Answer: B. Nunavut

38. 
True or False
Nunavut sends multiple MPs to the federal Parliament.
Answer: False
(Nunavut has one federal electoral district.)

39. 
Multiple Choice
Which important communication technology was pioneered in the North to connect isolated communities?
A. Satellite television
B. AM Radio
C. Digital radio networks
D. Telemedicine and satellite phone
Answer: D. Telemedicine and satellite phone

40. 
True or False
Most Nunavut communities have year-round road access to each other.
Answer: False
(Most are fly-in communities.)

41. 
Multiple Choice
What form of government does Nunavut use?
A. Parliamentary party-based democracy
B. Consensus government
C. Dictatorship
D. Presidential system
Answer: B. Consensus government

42. 
True or False
Nunavut’s government uses political parties in elections.
Answer: False
(Nunavut’s system is non-partisan; MLAs are elected independently.)

43. 
Multiple Choice
How many electoral districts are there in Nunavut (as of 2025)?
A. 14
B. 20
C. 25
D. 10
Answer: C. 25

44. 
True or False
Nunavut has fewer than 10 electoral districts.
Answer: False

45. 
Multiple Choice
What is the capital of Nunavut?
A. Rankin Inlet
B. Cambridge Bay
C. Arviat
D. Iqaluit
Answer: D. Iqaluit

46. 
True or False
Iqaluit is located on Baffin Island.
Answer: True

47. 
Multiple Choice
What is the name of the legislative building in Nunavut?
A. Nunavut Parliament
B. Iqaluit Civic Centre
C. Legislative Assembly of Nunavut
D. Nunavut Government Centre
Answer: C. Legislative Assembly of Nunavut

48. 
True or False
The Legislative Assembly meets in Cambridge Bay.
Answer: False
(It meets in Iqaluit.)

49. 
Multiple Choice
Which Inuit land claims organization played a key role in the creation of Nunavut?
A. Métis Federation
B. Dene Nation
C. Nunavut Tunngavik Incorporated (NTI)
D. Assembly of First Nations
Answer: C. Nunavut Tunngavik Incorporated (NTI)

50. 
True or False
NTI represents the rights of Dene people in Nunavut.
Answer: False
(It represents Inuit beneficiaries.)

51. 
Multiple Choice
Which ocean borders Nunavut to the north?
A. Atlantic Ocean
B. Indian Ocean
C. Pacific Ocean
D. Arctic Ocean
Answer: D. Arctic Ocean

52. 
True or False
Nunavut has no coastline.
Answer: False

53. 
Multiple Choice
Which territory was Nunavut created from in 1999?
A. Yukon
B. British Columbia
C. Northwest Territories
D. Alberta
Answer: C. Northwest Territories

54. 
True or False
Nunavut became a province in 1999.
Answer: False
(It became a territory.)

55. 
Multiple Choice
What traditional tool do Inuit hunters use for transportation on snow?
A. Toboggan
B. Snowboard
C. Komatik
D. Ski
Answer: C. Komatik

56. 
True or False
A komatik is a type of snow knife.
Answer: False
(It is a sled.)

57. 
Multiple Choice
What traditional Inuit clothing item is made for warmth in Arctic conditions?
A. Sarong
B. Parka
C. Poncho
D. Cloak
Answer: B. Parka

58. 
True or False
Inuit parkas are made from lightweight plastic.
Answer: False
(They are traditionally made from animal skins.)

59. 
Multiple Choice
Which of the following is a traditional Inuit game?
A. Lacrosse
B. Knee jump
C. Curling
D. Polo
Answer: B. Knee jump

60. 
True or False
Inuit games help maintain physical and mental strength.
Answer: True

61. 
Multiple Choice
Which cultural celebration in Nunavut showcases Inuit traditions?
A. Arctic Winter Games
B. Calgary Stampede
C. Caribana
D. Canada Day Parade
Answer: A. Arctic Winter Games

62. 
True or False
The Arctic Winter Games include traditional Inuit sports.
Answer: True

63.
Multiple Choice
Which Canadian federal government department oversees Indigenous relations?
A. Canadian Heritage
B. Indigenous Services Canada
C. Department of Justice
D. Foreign Affairs
Answer: B. Indigenous Services Canada

64. 
True or False
Health care in Nunavut is delivered exclusively by provincial governments.
Answer: False
(It is delivered by territorial and federal agencies.)

65. 
Multiple Choice
Which mineral resource is mined in Nunavut?
A. Copper
B. Nickel
C. Gold
D. Sulphur
Answer: C. Gold

66. 
True or False
Nunavut has no known mineral deposits.
Answer: False

67. 
Multiple Choice
Which body governs Inuit language and culture in Nunavut?
A. Parks Canada
B. Inuit Tapiriit Kanatami
C. Inuit Heritage Trust
D. Assembly of First Nations
Answer: C. Inuit Heritage Trust

68. 
True or False
The Inuit Heritage Trust manages sacred and archaeological Inuit sites.
Answer: True

69. 
Multiple Choice
Which wildlife is important in traditional Inuit hunting?
A. Beaver
B. Caribou
C. Goose
D. Salmon
Answer: B. Caribou

70. 
True or False
Caribou migration patterns have no effect on Inuit communities.
Answer: False

71. 
Multiple Choice
Which of these is a Nunavut settlement?
A. Dawson
B. Yellowknife
C. Pond Inlet
D. Fort McMurray
Answer: C. Pond Inlet
72. 
True or False
Pond Inlet is located in Alberta.
Answer: False

73. 
Multiple Choice
What does “Nunavut” mean in Inuktitut?
A. Snowy land
B. Our land
C. Ice home
D. New world
Answer: B. Our land

74. 
True or False
Nunavut means “new territory.”
Answer: False

75. 
Multiple Choice
Which federal park is located in Nunavut?
A. Banff National Park
B. Quttinirpaaq National Park
C. Jasper National Park
D. Algonquin Park
Answer: B. Quttinirpaaq National Park

76. 
True or False
Quttinirpaaq National Park is the northernmost park in Canada.
Answer: True


77. 
Multiple Choice
What is the name of the Canadian Rangers’ primary role in Nunavut?
A. Air navigation
B. Local law enforcement
C. Arctic patrol and support
D. Road construction
Answer: C. Arctic patrol and support

78. 
True or False
Canadian Rangers provide medical care in Nunavut.
Answer: False
(They assist with patrol and safety in remote areas.)



79. 
Multiple Choice
Which public service delivers mail in Nunavut’s fly-in communities?
A. FedEx
B. Canada Post
C. Inuit Postal Services
D. Northern Delivery Corps
Answer: B. Canada Post

80. 
True or False
Mail delivery in Nunavut can be delayed due to weather conditions.
Answer: True





81. 
Multiple Choice
What language family does Inuktitut belong to?
A. Germanic
B. Romance
C. Eskimo-Aleut
D. Indo-European
Answer: C. Eskimo-Aleut

82. 
True or False
Inuktitut and Inuinnaqtun are both official languages of Nunavut.
Answer: True


83. 
Multiple Choice
Who is responsible for delivering healthcare in Nunavut?
A. Provincial health ministries
B. Federal and territorial governments
C. World Health Organization
D. Private companies
Answer: B. Federal and territorial governments

84. 
True or False
Nunavut has a fully autonomous healthcare system independent of Canada.
Answer: False



85. 
Multiple Choice
Which body provides legal aid and advocacy in Nunavut?
A. Nunavut Legal Aid
B. Canada Justice Network
C. Inuit Law Association
D. Nunavut Bar Council
Answer: A. Nunavut Legal Aid

86. 
True or False
Legal support is available to residents of Nunavut through public systems.
Answer: True



87. 
Multiple Choice
Which Nunavut town is located farthest north?
A. Arviat
B. Iqaluit
C. Resolute
D. Rankin Inlet
Answer: C. Resolute

88. 
True or False
Resolute is one of the northernmost communities in Canada.
Answer: True



89. 
Multiple Choice
Which sector provides the most employment in Nunavut?
A. Technology
B. Resource extraction
C. Public service
D. Tourism
Answer: C. Public service

90. 
True or False
Tourism is Nunavut’s primary source of employment.
Answer: False



91. 
Multiple Choice
What housing challenges do many Nunavut communities face?
A. Too many houses
B. Homelessness only in major cities
C. Overcrowding and shortage of housing
D. Rising luxury developments
Answer: C. Overcrowding and shortage of housing

92. 
True or False
Access to affordable housing is a challenge in many Nunavut communities.
Answer: True



93. 
Multiple Choice
Which Inuit value emphasizes community sharing and support?
A. Avatittinnik
B. Qanuqtuurniq
C. Piliriqatigiinniq
D. Uqausiq
Answer: C. Piliriqatigiinniq

94. 
True or False
Piliriqatigiinniq means working together for the common good.
Answer: True



95. 
Multiple Choice
What is the name of Nunavut’s publicly funded education body?
A. Inuit School District
B. Qikiqtani Education Council
C. Nunavut Department of Education
D. Arctic Learning Network
Answer: C. Nunavut Department of Education

96. 
True or False
Education in Nunavut includes Inuit Qaujimajatuqangit (traditional knowledge).
Answer: True



97. 
Multiple Choice
Which industry has seen growth in Nunavut in recent years?
A. Shipping
B. Gold and mineral mining
C. Aerospace
D. Agriculture
Answer: B. Gold and mineral mining

98. 
True or False
Agriculture is the dominant sector in Nunavut.
Answer: False



99. 
Multiple Choice
Which Inuit principle emphasizes resourcefulness and adaptability?
A. Aajiiqatigiinniq
B. Pijitsirniq
C. Qanuqtuurniq
D. Inuuqatigiitsiarniq
Answer: C. Qanuqtuurniq

100. 
True or False
Qanuqtuurniq is about respecting elders.
Answer: False
(It’s about innovation and problem-solving.)



101. 
Multiple Choice
Which major landform covers much of Nunavut’s geography?
A. Great Plains
B. Canadian Shield
C. Appalachian Mountains
D. Interior Plateau
Answer: B. Canadian Shield

102. 
True or False
Nunavut’s landscape includes tundra, mountains, and part of the Arctic Archipelago.
Answer: True



103. 
Multiple Choice
What are the primary modes of transportation in most Nunavut communities?
A. Subways and buses
B. Roads and taxis
C. Air travel and snowmobiles
D. Railways and ferries
Answer: C. Air travel and snowmobiles

104. 
True or False
Nunavut is fully connected to the rest of Canada by paved highways.
Answer: False



105. 
Multiple Choice
Which is the most important cultural festival celebrated in many Nunavut communities?
A. Canada Day
B. Toonik Tyme
C. Igloofest
D. Arctic Folk Festival
Answer: B. Toonik Tyme

106. 
True or False
Toonik Tyme celebrates spring with traditional Inuit games and activities.
Answer: True



107. 
Multiple Choice
What is a “qamutik”?
A. A traditional Inuit parka
B. An Inuit drum
C. A sled used for travel on snow and ice
D. A seal-hunting tool
Answer: C. A sled used for travel on snow and ice

108. 
True or False
A qamutik is still used today in parts of Nunavut.
Answer: True



109. 
Multiple Choice
What is a “kamotik” typically pulled by?
A. Bears
B. Horses
C. Snowmobiles or dog teams
D. Reindeer
Answer: C. Snowmobiles or dog teams

110. 
True or False
Kamutiks are used only in ceremonial contexts.
Answer: False



111. 
Multiple Choice
Which historical agreement led to the creation of Nunavut in 1999?
A. Treaty 1
B. Constitution Act
C. Nunavut Land Claims Agreement
D. Meech Lake Accord
Answer: C. Nunavut Land Claims Agreement

112. 
True or False
The Nunavut Land Claims Agreement was signed in 1993.
Answer: True



113. 
Multiple Choice
Which organization represents Inuit interests and negotiated the Nunavut Land Claims Agreement?
A. Métis Federation
B. Inuit Tapiriit Kanatami
C. Nunavut Trust
D. Qikiqtani Inuit Association
Answer: B. Inuit Tapiriit Kanatami

114. 
True or False
Inuit Tapiriit Kanatami is based only in Nunavut.
Answer: False
(It serves Inuit across Canada.)



115. 
Multiple Choice
What is a central value in Inuit parenting and childrearing traditions?
A. Strict discipline
B. Storytelling and quiet instruction
C. Group punishment
D. Solitary learning
Answer: B. Storytelling and quiet instruction

116. 
True or False
Inuit children traditionally learn by watching adults and through storytelling.
Answer: True



117. 
Multiple Choice
Which organization runs community radio and television in Nunavut?
A. CBC North
B. Inuit Broadcasting Corporation
C. Arctic Voice Network
D. Nunavut TV
Answer: B. Inuit Broadcasting Corporation

118. 
True or False
The Inuit Broadcasting Corporation creates programming in Inuktitut.
Answer: True



119. 
Multiple Choice
Which principle encourages making decisions through consensus in Inuit culture?
A. Pijitsirniq
B. Aajiiqatigiinniq
C. Tunnganarniq
D. Avatittinnik
Answer: B. Aajiiqatigiinniq

120. 
True or False
Aajiiqatigiinniq emphasizes collective decision-making and mutual respect.
Answer: True



121. 
Multiple Choice
What is the term for the concept of environmental stewardship in Inuit society?
A. Inuuqatigiitsiarniq
B. Avatittinnik Kamatsiarniq
C. Pilimmaksarniq
D. Qanuqtuurniq
Answer: B. Avatittinnik Kamatsiarniq

122. 
True or False
Avatittinnik Kamatsiarniq promotes caring for the land, animals, and environment.
Answer: True



123. 
Multiple Choice
Which of these statements reflects “Tunnganarniq” in Inuit culture?
A. Being resourceful
B. Showing hospitality and inclusiveness
C. Leading with authority
D. Punishing wrongdoing
Answer: B. Showing hospitality and inclusiveness

124. 
True or False
Tunnganarniq values building good relationships through respect.
Answer: True



125. 
Multiple Choice
What is “Pijitsirniq” in the Inuit worldview?
A. Desire for solitude
B. Sense of service to others
C. Physical strength
D. Spiritual purity
Answer: B. Sense of service to others

126. 
True or False
Pijitsirniq teaches that leadership is a form of service.
Answer: True



127. 
Multiple Choice
Which government department oversees economic development in Nunavut?
A. Department of Indigenous Services
B. Nunavut Economic Secretariat
C. Department of Economic Development and Transportation
D. Ministry of Trade and Labour
Answer: C. Department of Economic Development and Transportation

128. 
True or False
Economic growth in Nunavut depends partly on resource development and transportation links.
Answer: True



129. 
Multiple Choice
What is “Inuuqatigiitsiarniq”?
A. A form of legal appeal
B. Respecting others and caring for people
C. A territorial anthem
D. A trade agreement
Answer: B. Respecting others and caring for people

130. 
True or False
Inuuqatigiitsiarniq emphasizes living respectfully with others.
Answer: True



131. 
Multiple Choice
What does “Pilimmaksarniq” mean?
A. Technical skill
B. Learning through observation and practice
C. Maritime law
D. Economic power
Answer: B. Learning through observation and practice

132. 
True or False
Pilimmaksarniq is part of the traditional Inuit way of teaching.
Answer: True



133. 
Multiple Choice
Which mining resource is abundant in Nunavut?
A. Gold
B. Oil
C. Potash
D. Copper
Answer: A. Gold

134. 
True or False
Mining is one of the major industries in Nunavut.
Answer: True



135. 
Multiple Choice
Which Canadian act allowed for the creation of Nunavut as a separate territory?
A. Nunavut Land Claims Act
B. Nunavut Act (1993)
C. Indigenous Sovereignty Act
D. Territorial Reformation Act
Answer: B. Nunavut Act (1993)

136. 
True or False
The Nunavut Act was passed in 1993, paving the way for Nunavut’s creation.
Answer: True



137. 
Multiple Choice
What year was Nunavut officially established?
A. 1993
B. 1996
C. 1999
D. 2001
Answer: C. 1999

138. 
True or False
Nunavut was created in 1996.
Answer: False
(It was created in 1999.)



139. 
Multiple Choice
Which Canadian monarch was the head of state when Nunavut was created?
A. King Charles III
B. Queen Elizabeth II
C. King George VI
D. King Edward VIII
Answer: B. Queen Elizabeth II

140. 
True or False
Queen Elizabeth II was monarch during Nunavut’s creation in 1999.
Answer: True



141. 
Multiple Choice
What type of government system does Nunavut use that is different from most other jurisdictions in Canada?
A. Party-based legislature
B. Consensus government
C. Direct democracy
D. Appointed council
Answer: B. Consensus government

142. 
True or False
In Nunavut’s consensus government, MLAs do not belong to political parties.
Answer: True



143. 
Multiple Choice
Where is the Legislative Assembly of Nunavut located?
A. Iqaluit
B. Rankin Inlet
C. Cambridge Bay
D. Kugluktuk
Answer: A. Iqaluit

144. 
True or False
The capital city of Nunavut is Iqaluit.
Answer: True



145. 
Multiple Choice
Who serves as the ceremonial representative of the Crown in Nunavut?
A. Premier
B. Speaker of the House
C. Commissioner of Nunavut
D. Prime Minister
Answer: C. Commissioner of Nunavut

146. 
True or False
The Commissioner of Nunavut performs duties similar to a Lieutenant Governor.
Answer: True



147. 
Multiple Choice
As of 2025, who is the Premier of Nunavut?
A. Joe Savikataaq
B. Eva Aariak
C. P.J. Akeeagok
D. Paul Quassa
Answer: C. P.J. Akeeagok

148. 
True or False
P.J. Akeeagok became Premier of Nunavut in 2021.
Answer: True



149. 
Multiple Choice
Which Inuit organization manages lands and benefits from the Nunavut Land Claims Agreement?
A. Nunavut Tunngavik Inc.
B. Inuit Tapiriit Kanatami
C. Arctic Council
D. Kivalliq Inuit Association
Answer: A. Nunavut Tunngavik Inc.

150. 
True or False
Nunavut Tunngavik Inc. ensures that the promises of the Nunavut Land Claims Agreement are carried out.
Answer: True



151. 
Multiple Choice
What is the population size of Nunavut as of 2025 (approximate)?
A. 15,000
B. 25,000
C. 40,000
D. 80,000
Answer: C. 40,000

152. 
True or False
Nunavut is the most populous of the three territories.
Answer: False
(It is the least populous.)



153. 
Multiple Choice
What is the primary language spoken in Nunavut besides English?
A. French
B. Inuktitut
C. Cree
D. Denesuline
Answer: B. Inuktitut

154. 
True or False
Inuktitut is one of the official languages of Nunavut.
Answer: True



155. 
Multiple Choice
What type of traditional Inuit home is often associated with Nunavut’s history?
A. Teepee
B. Igloo
C. Longhouse
D. Sod house
Answer: B. Igloo

156. 
True or False
Igloos were traditionally used only during hunting trips in winter.
Answer: True



157. 
Multiple Choice
Which of the following is NOT a region of Nunavut?
A. Qikiqtaaluk
B. Kitikmeot
C. Kivalliq
D. Baffin Highlands
Answer: D. Baffin Highlands

158. 
True or False
Kivalliq, Kitikmeot, and Qikiqtaaluk are the three administrative regions of Nunavut.
Answer: True



159. 
Multiple Choice
Which major Canadian airline regularly serves communities in Nunavut?
A. WestJet
B. Porter
C. Calm Air
D. Lynx Air
Answer: C. Calm Air

160. 
True or False
Most Nunavut communities are connected by rail.
Answer: False
(Most rely on air travel.)



161. 
Multiple Choice
Which Canadian federal riding covers Nunavut?
A. Northern Lights
B. Arctic North
C. Nunavut
D. Eastern Shield
Answer: C. Nunavut

162. 
True or False
The entire territory of Nunavut is represented by one Member of Parliament.
Answer: True



163. 
Multiple Choice
What traditional activity is still important to the economy and culture of Nunavut?
A. Cattle ranching
B. Sport fishing
C. Hunting and trapping
D. Forestry
Answer: C. Hunting and trapping

164. 
True or False
Country food, such as seal, caribou, and fish, is still widely eaten in Nunavut.
Answer: True



165. 
Multiple Choice
Which of the following is NOT considered country food in Nunavut?
A. Arctic char
B. Seal
C. Caribou
D. Chicken
Answer: D. Chicken

166. 
True or False
Food security is a challenge in many northern communities.
Answer: True



167. 
Multiple Choice
What organization supports Inuit youth and leadership development in Nunavut?
A. Arctic Youth Alliance
B. Northern Lights Society
C. Qaujigiartiit Health Research Centre
D. Ilitaqsiniq (Nunavut Literacy Council)
Answer: D. Ilitaqsiniq (Nunavut Literacy Council)

168. 
True or False
Ilitaqsiniq supports Inuit-led literacy and education programs.
Answer: True



169. 
Multiple Choice
What is the name of the newspaper that serves Nunavut communities?
A. The Northern Post
B. Nunatsiaq News
C. Arctic Times
D. Tundra Today
Answer: B. Nunatsiaq News

170. 
True or False
Nunatsiaq News is published in both English and Inuktitut.
Answer: True



171. 
Multiple Choice
Which body governs justice and courts in Nunavut?
A. Supreme Court of Nunavut
B. Nunavut Justice Commission
C. Court of Inuit Justice
D. Nunavut Court of Justice
Answer: D. Nunavut Court of Justice

172. 
True or False
Nunavut has a unified court system called the Nunavut Court of Justice.
Answer: True



173. 
Multiple Choice
Which federal act governs the use of official languages in Nunavut?
A. Canadian Languages Act
B. Inuit Language Act
C. Nunavut Official Languages Act
D. French Services Act
Answer: C. Nunavut Official Languages Act

174. 
True or False
English, French, and Inuktitut are official languages in Nunavut.
Answer: True



175. 
Multiple Choice
What is the name of the public housing authority in Nunavut?
A. Northern Shelter Board
B. Nunavut Housing Corporation
C. Arctic Dwellings Inc.
D. Inuit Living Solutions
Answer: B. Nunavut Housing Corporation

176. 
True or False
Housing is a key issue in many communities in Nunavut.
Answer: True



177. 
Multiple Choice
What is the name of the territorial health authority in Nunavut?
A. Health Canada North
B. Nunavut Health Authority
C. Department of Health (Nunavut)
D. Arctic Health Services
Answer: C. Department of Health (Nunavut)

178. 
True or False
The Nunavut Department of Health provides medical services across the territory.
Answer: True



179.
Multiple Choice
What type of climate does Nunavut have?
A. Tropical
B. Arid
C. Subarctic and Arctic
D. Temperate
Answer: C. Subarctic and Arctic

180. 
True or False
Nunavut has warm winters and humid summers.
Answer: False
(Winters are long and cold.)



181. 
Multiple Choice
Which federal agency provides weather and environmental forecasts in Nunavut?
A. Environment Canada
B. Arctic Meteorology Council
C. Inuit Weather Authority
D. Northern Climate Centre
Answer: A. Environment Canada

182. 
True or False
Environment Canada provides weather services for Nunavut, including storm alerts.
Answer: True



183. 
Multiple Choice
Which Canadian military force plays a role in Arctic sovereignty, including Nunavut?
A. Royal Canadian Navy
B. Canadian Rangers
C. Canadian Air Force
D. Border Services Agency
Answer: B. Canadian Rangers

184. 
True or False
The Canadian Rangers are part-time reservists who help patrol remote areas of Nunavut.
Answer: True



185. 
Multiple Choice
Which important treaty established Nunavut as a distinct territory?
A. Meech Lake Accord
B. Nunavut Land Claims Agreement
C. Northern Rights Convention
D. Arctic Independence Pact
Answer: B. Nunavut Land Claims Agreement

186. 
True or False
The Nunavut Land Claims Agreement was the largest Indigenous land claim in Canadian history.
Answer: True



187. 
Multiple Choice
What form of traditional storytelling is practiced among Inuit communities in Nunavut?
A. Haiku poetry
B. Throat singing and legends
C. Celtic songs
D. Greek epics
Answer: B. Throat singing and legends

188. 
True or False
Throat singing is an Inuit cultural tradition passed down through generations.
Answer: True



189. 
Multiple Choice
Which government department manages Indigenous affairs and land agreements in Nunavut?
A. Department of Justice
B. Department of Crown-Indigenous Relations
C. Department of Northern Affairs
D. Ministry of Immigration
Answer: B. Department of Crown-Indigenous Relations

190. 
True or False
The Department of Crown-Indigenous Relations works on implementing land claim agreements in Nunavut.
Answer: True



191. 
Multiple Choice
What natural resource is rich in Nunavut and supports its economy?
A. Gold and minerals
B. Cotton
C. Wheat
D. Lumber
Answer: A. Gold and minerals

192. 
True or False
Nunavut is known for its oil production.
Answer: False
(Mining, not oil, is a major resource in Nunavut.)



193. 
Multiple Choice
What is the largest gold mine currently operating in Nunavut?
A. Nunavik Mine
B. Agnico Eagle’s Meliadine Mine
C. Northwest Dome Mine
D. Yellowknife Shaft
Answer: B. Agnico Eagle’s Meliadine Mine

194. 
True or False
The Meliadine mine contributes significantly to Nunavut’s GDP.
Answer: True



195. 
Multiple Choice
Which important transportation method connects Nunavut communities?
A. Highways
B. Marine shipping and air routes
C. Underground railways
D. Snow tunnels
Answer: B. Marine shipping and air routes

196. 
True or False
Nunavut’s geography makes year-round road connections between communities difficult.
Answer: True



197. 
Multiple Choice
What is the name of Nunavut’s official flag symbol representing the Inuit culture?
A. Snowflake
B. Inuksuk
C. Maple Leaf
D. Raven
Answer: B. Inuksuk

198. 
True or False
The Inuksuk is a traditional stone marker used by Inuit for navigation and spiritual purposes.
Answer: True



199. 
Multiple Choice
How many official languages are recognized in Nunavut?
A. One
B. Two
C. Three
D. Four
Answer: C. Three
(English, French, and Inuktut [including Inuinnaqtun and Inuktitut])

200. 
True or False
French is not an official language in Nunavut.
Answer: False
(French is one of the three official languages.)



201. 
Multiple Choice
Which Inuit-owned corporation manages development projects and business ventures in Nunavut?
A. Arctic Capital Corporation
B. Qikiqtaaluk Corporation
C. Nunavut Development Company
D. Baffin Holdings
Answer: B. Qikiqtaaluk Corporation

202. 
True or False
Qikiqtaaluk Corporation is fully owned by the Government of Nunavut.
Answer: False
(It is Inuit-owned, not government-owned.)


203. 
Multiple Choice
Which historical event led to the negotiation of the Nunavut Land Claims Agreement?
A. World War II
B. The Quiet Revolution
C. Canadian Charter of Rights and Freedoms
D. Pressure from Inuit leaders in the 1970s and 1980s
Answer: D. Pressure from Inuit leaders in the 1970s and 1980s

204. 
True or False
The Nunavut Land Claims Agreement was signed in 1989.
Answer: False
(It was signed in 1993.)


205. 
Multiple Choice
Which government entity is responsible for wildlife management in Nunavut under the land claims agreement?
A. Nunavut Wildlife Council
B. Parks Canada
C. Fisheries and Oceans Canada
D. Environment Nunavut
Answer: A. Nunavut Wildlife Council

206. 
True or False
Wildlife management in Nunavut is shared between Inuit organizations and government.
Answer: True



207. 
Multiple Choice
Which major event was hosted by Nunavut in 2002 to celebrate its culture?
A. Arctic Games
B. Toonik Tyme
C. Nunavut Cultural Expo
D. Inuit Heritage Festival
Answer: A. Arctic Games

208. 
True or False
The Arctic Games include traditional Inuit sports and modern competitions.
Answer: True



209. 
Multiple Choice
Which federal riding represents Nunavut in the House of Commons?
A. Arctic Bay
B. Nunavut
C. Baffin
D. Northern Territories
Answer: B. Nunavut

210. 
True or False
Nunavut is divided into multiple federal ridings.
Answer: False
(Nunavut has one federal riding.)



211. 
Multiple Choice
Which Indigenous language spoken in Nunavut includes dialects such as Inuktitut and Inuinnaqtun?
A. Ojibwe
B. Cree
C. Inuktut
D. Dene
Answer: C. Inuktut

212. 
True or False
Inuktut is taught in some Nunavut schools.
Answer: True



213. 
Multiple Choice
Which Canadian territory has the youngest population on average?
A. Yukon
B. Nunavut
C. Northwest Territories
D. Manitoba
Answer: B. Nunavut

214. 
True or False
Nunavut has one of the highest birth rates in Canada.
Answer: True



215. 
Multiple Choice
Which issue is a major public health concern in some Nunavut communities?
A. Malaria
B. Tuberculosis
C. Polio
D. Influenza
Answer: B. Tuberculosis

216. 
True or False
Tuberculosis has been completely eradicated in Nunavut.
Answer: False
(It remains a challenge in some areas.)



217. 
Multiple Choice
What is the primary energy source used in Nunavut communities?
A. Hydroelectricity
B. Solar power
C. Diesel fuel
D. Wind power
Answer: C. Diesel fuel

218. 
True or False
Diesel is used for electricity generation in many remote parts of Nunavut.
Answer: True



219. 
Multiple Choice
Which major Inuit organization negotiates Inuit rights and land agreements in Nunavut?
A. Northern Rights Forum
B. Inuit Tapiriit Kanatami
C. Nunavut Tunngavik Incorporated
D. Inuit Heritage Society
Answer: C. Nunavut Tunngavik Incorporated

220. 
True or False
Nunavut Tunngavik Incorporated ensures the land claims agreement is implemented.
Answer: True



221. 
Multiple Choice
What is the traditional winter dwelling used by Inuit people?
A. Hogan
B. Teepee
C. Igloo
D. Longhouse
Answer: C. Igloo

222. 
True or False
Igloos are still commonly used as permanent housing in Nunavut.
Answer: False
(They are now mostly symbolic or temporary structures.)



223. 
Multiple Choice
Which month is Nunavut Day celebrated?
A. April
B. July
C. October
D. December
Answer: B. July
(July 9, marking the date the Nunavut Act was passed.)

224. 
True or False
Nunavut Day marks the founding of Nunavut in 1867.
Answer: False
(It commemorates the 1993 passage of the Nunavut Act.)



225. 
Multiple Choice
What is a common traditional food in Nunavut?
A. Bison stew
B. Bannock
C. Caribou and seal
D. Poutine
Answer: C. Caribou and seal

226. 
True or False
Traditional Inuit foods are referred to as “country food.”
Answer: True



227. 
Multiple Choice
What is the largest community and capital of Nunavut?
A. Rankin Inlet
B. Cambridge Bay
C. Pond Inlet
D. Iqaluit
Answer: D. Iqaluit

228. 
True or False
Iqaluit was formerly called Frobisher Bay.
Answer: True



229. 
Multiple Choice
Which service is lacking in some remote communities in Nunavut?
A. Postal delivery
B. Cell phone coverage
C. Banking services
D. All of the above
Answer: D. All of the above

230. 
True or False
Many small Nunavut communities are fly-in only.
Answer: True



231. 
Multiple Choice
Which federal department handles Indigenous services in Nunavut?
A. Justice Canada
B. Health Canada
C. Indigenous Services Canada
D. Crown Corporations Office
Answer: C. Indigenous Services Canada

232. 
True or False
Health Canada is the main department responsible for education in Nunavut.
Answer: False
(Education is managed locally by the Government of Nunavut.)



233. 
Multiple Choice
What is the traditional tool used for cutting in Inuit culture?
A. Ulu
B. Saw
C. Pickaxe
D. Shovel
Answer: A. Ulu

234. 
True or False
An Ulu is used for hunting large marine animals.
Answer: False
(It is mainly used for skinning and food preparation.)



235. 
Multiple Choice
Which wildlife species is commonly associated with Nunavut?
A. Grizzly Bear
B. Caribou
C. Bison
D. Cougar
Answer: B. Caribou

236. 
True or False
Polar bears are also native to Nunavut.
Answer: True



237. 
Multiple Choice
Which explorer is known for Arctic voyages and lending his name to a bay in Nunavut?
A. Jacques Cartier
B. John Franklin
C. Henry Hudson
D. Samuel de Champlain
Answer: C. Henry Hudson

238. 
True or False
Hudson Bay touches the western border of Nunavut.
Answer: True



239. 
Multiple Choice
Which type of Inuit art is internationally recognized?
A. Woodcarving
B. Ice sculpture
C. Soapstone carving
D. Paper collage
Answer: C. Soapstone carving

240. 
True or False
Inuit art is featured on Canadian stamps and coins.
Answer: True
(Based on Discover Canada, 2025–2027 edition — No duplicates, alternating MCQ and True/False)


241. 
Multiple Choice
Which of the following is NOT a territory of Canada?
A. Yukon
B. Nunavut
C. Alberta
D. Northwest Territories
Answer: C. Alberta

242. 
True or False
Nunavut was carved out of the Northwest Territories in 1999.
Answer: True



243. 
Multiple Choice
Which island territory does Nunavut include in part?
A. Prince Edward Island
B. Baffin Island
C. Vancouver Island
D. Cape Breton Island
Answer: B. Baffin Island

244. 
True or False
Nunavut includes most of the Canadian Arctic Archipelago.
Answer: True



245. 
Multiple Choice
What is the most commonly spoken language in Nunavut after English?
A. French
B. Ojibwe
C. Inuktitut
D. Cree
Answer: C. Inuktitut

246. 
True or False
Inuktitut is one of Nunavut’s official languages.
Answer: True



247. 
Multiple Choice
Which government manages territorial parks in Nunavut?
A. Parks Canada
B. Government of Nunavut
C. Environment Canada
D. Arctic Council
Answer: B. Government of Nunavut

248. 
True or False
Parks Canada operates all protected areas in Nunavut.
Answer: False
(Territorial parks are managed by the Government of Nunavut.)



249. 
Multiple Choice
Which marine species is important to Inuit hunting culture?
A. Seal
B. Tuna
C. Lobster
D. Squid
Answer: A. Seal

250. 
True or False
Seal hunting is illegal in Nunavut.
Answer: False
(It is legal and culturally important under regulated practices.)




251. 
Multiple Choice
Which natural event affects the availability of sunlight in Nunavut?
A. Solar eclipses
B. Midnight sun and polar night
C. Tornado seasons
D. Monsoons
Answer: B. Midnight sun and polar night

252. 
True or False
In parts of Nunavut, the sun does not rise for several weeks in winter.
Answer: True



253. 
Multiple Choice
Which key agreement led to the creation of Nunavut?
A. Meech Lake Accord
B. Charlottetown Accord
C. Nunavut Land Claims Agreement
D. James Bay Agreement
Answer: C. Nunavut Land Claims Agreement

254. 
True or False
The Nunavut Land Claims Agreement was signed in 1995.
Answer: False



255. 
Multiple Choice
What is the title of the elected leader of Nunavut’s government?
A. Prime Minister
B. President
C. Premier
D. Commissioner
Answer: C. Premier

256. 
True or False
The Premier of Nunavut is appointed by the federal government.
Answer: False
(The Premier is chosen by the elected MLAs.)



257. 
Multiple Choice
Who represents the federal government in Nunavut?
A. Mayor of Iqaluit
B. Member of Parliament
C. Commissioner
D. Governor General
Answer: C. Commissioner

258. 
True or False
The Commissioner of Nunavut performs similar duties as a provincial Lieutenant Governor.
Answer: True



259. 
Multiple Choice
Which sea lies to the east of Baffin Island?
A. Beaufort Sea
B. Labrador Sea
C. Hudson Bay
D. Baffin Bay
Answer: D. Baffin Bay

260. 
True or False
Baffin Bay separates Baffin Island from Greenland.
Answer: True




261. 
Multiple Choice
What form of transportation is essential for many remote communities in Nunavut?
A. High-speed rail
B. Ice roads and air travel
C. Subway systems
D. Highway buses
Answer: B. Ice roads and air travel

262. 
True or False
Nunavut is connected to southern Canada by an extensive road network.
Answer: False
(Nunavut has no permanent road link to the rest of Canada.)



263. 
Multiple Choice
Which cultural tradition is significant in Inuit communities?
A. French opera
B. Throat singing
C. Pow wow dancing
D. Highland games
Answer: B. Throat singing

264. 
True or False
Throat singing is a traditional Inuit art form often performed by women.
Answer: True



265. 
Multiple Choice
Which of the following is a province of Canada?
A. Nunavut
B. Northwest Territories
C. Yukon
D. Newfoundland and Labrador
Answer: D. Newfoundland and Labrador

266. 
True or False
Nunavut is the smallest of Canada’s three territories by land area.
Answer: False
(Nunavut is the largest.)



267. 
Multiple Choice
What traditional Inuit structure is made from snow blocks?
A. Wigwam
B. Tipi
C. Igloo
D. Longhouse
Answer: C. Igloo

268. 
True or False
Igloos are still used today as permanent homes in Nunavut.
Answer: False
(They are used for cultural and survival purposes, not as permanent homes.)



269. 
Multiple Choice
What is the term used for a gathering of Inuit artists, performers, and leaders?
A. Round Dance
B. Arctic Circle Forum
C. Inuit Qaujimajatuqangit
D. Northern Lights Festival
Answer: C. Inuit Qaujimajatuqangit

270. 
True or False
“Inuit Qaujimajatuqangit” refers to traditional Inuit knowledge and values.
Answer: True



271. 
Multiple Choice
What is the name of the Inuit land claims agreement that created Nunavut?
A. Nunavut Accord
B. Inuit Heritage Act
C. Nunavut Land Claims Agreement
D. Arctic Self-Government Act
Answer: C. Nunavut Land Claims Agreement

272. 
True or False
The Nunavut Land Claims Agreement was signed in 1987.
Answer: False


273. 
Multiple Choice
Which body governs education and language rights in Nunavut?
A. Nunavut School Board
B. Canadian Department of Education
C. Inuit Uqausinnginnik Taiguusiliuqtiit
D. Northwest Arctic Board
Answer: C. Inuit Uqausinnginnik Taiguusiliuqtiit

274. 
True or False
Inuktitut and Inuinnaqtun are recognized official languages in Nunavut.
Answer: True



275. 
Multiple Choice
What is a major concern for Nunavut due to climate change?
A. Deforestation
B. Melting permafrost and sea ice
C. Tsunamis
D. Flooding from major rivers
Answer: B. Melting permafrost and sea ice

276. 
True or False
Permafrost thawing can damage infrastructure in Nunavut.
Answer: True



277. 
Multiple Choice
Which religious denomination has a strong historical presence in Nunavut?
A. Buddhist
B. Anglican
C. Muslim
D. Sikh
Answer: B. Anglican

278. 
True or False
Christianity has played a role in Nunavut since early contact with European missionaries.
Answer: True



279. 
Multiple Choice
Which Canadian Crown corporation helps deliver supplies to Nunavut?
A. Canada Post
B. Arctic Gateway
C. Nunavut Logistics
D. Northern Store Services
Answer: D. Northern Store Services

280. 
True or False
Nunavut relies heavily on seasonal air and sea deliveries for supplies.
Answer: True



281. 
Multiple Choice
What type of housing is common in many Nunavut communities?
A. Stone homes
B. High-rise apartments
C. Modular prefabricated homes
D. Brick bungalows
Answer: C. Modular prefabricated homes

282. 
True or False
Housing shortages are a major issue in Nunavut.
Answer: True



283.
Multiple Choice
Who funds the majority of public services in Nunavut?
A. Municipalities
B. The Government of Nunavut
C. The private sector
D. The Federal Government of Canada
Answer: D. The Federal Government of Canada

284. 
True or False
Nunavut collects all its own revenue independently from the rest of Canada.
Answer: False
(Most revenue comes from federal transfers.)



285. 
Multiple Choice
Which industry has significant potential for growth in Nunavut?
A. Oil refining
B. Mining
C. Technology manufacturing
D. Aerospace
Answer: B. Mining

286. 
True or False
Gold, iron, and diamonds are all mined in Nunavut.
Answer: True



287.
Multiple Choice
Which sport is popular among youth in Nunavut?
A. Cricket
B. Ice hockey
C. Rugby
D. Baseball
Answer: B. Ice hockey

288. 
True or False
Youth programs and sports help support mental health in Nunavut communities.
Answer: True



289. 
Multiple Choice
What is one traditional Inuit method of transportation across ice?
A. Jet ski
B. All-terrain vehicle
C. Dog sled (qamutik)
D. Helicopter
Answer: C. Dog sled (qamutik)

290. 
True or False
Snowmobiles have fully replaced dog sleds in all communities.
Answer: False
(Both are still used in some regions.)



291. 
Multiple Choice
What is a key role of elders in Inuit communities?
A. Legal enforcement
B. Health administration
C. Teaching traditional knowledge
D. Leading church services
Answer: C. Teaching traditional knowledge

292. 
True or False
Elders are respected teachers and advisors in Nunavut.
Answer: True



293. 
Multiple Choice
Which term describes the concept of sharing and helping in Inuit culture?
A. Sedna
B. Qaggiq
C. Piliriqatigiinniq
D. Uvattini
Answer: C. Piliriqatigiinniq

294. 
True or False
Piliriqatigiinniq means competition and separation.
Answer: False
(It means working together for a common good.)



295. 
Multiple Choice
What is the Government of Nunavut’s strategy for incorporating Inuit culture into policy called?
A. Inuit Strategy Act
B. Inuit Qaujimajatuqangit IQ Framework
C. Arctic Cultural Reform
D. Northern Inuit Blueprint
Answer: B. Inuit Qaujimajatuqangit IQ Framework

296. 
True or False
IQ principles guide governance, education, and planning in Nunavut.
Answer: True



297. 
Multiple Choice
Which seasonal event affects life in Nunavut the most?
A. Rainy season
B. Summer hurricanes
C. Midnight sun and polar night
D. Cherry blossom season
Answer: C. Midnight sun and polar night

298. 
True or False
In some parts of Nunavut, the sun doesn’t rise at all for weeks during winter.
Answer: True



299. 
Multiple Choice
What federal electoral district includes all of Nunavut?
A. Nunavut
B. Arctic-North
C. Iqaluit-Labrador
D. Northern Islands
Answer: A. Nunavut

300. 
True or False
Nunavut has multiple MPs in the federal parliament.
Answer: False
(Nunavut has one MP.)



301.
 Multiple Choice
What is the Inuit name for the capital city of Nunavut?
A. Kuujjuaq
B. Nunavik
C. Iqaluit
D. Kangiqsualujjuaq
Answer: C. Iqaluit

302. 
True or False
Iqaluit was formerly known as Frobisher Bay.
Answer: True



303. 
Multiple Choice
What Canadian law recognizes Inuit rights and land ownership?
A. Canadian Rights Act
B. Nunavut Heritage Act
C. Nunavut Land Claims Agreement Act
D. Arctic Sovereignty Act
Answer: C. Nunavut Land Claims Agreement Act

304. 
True or False
The Land Claims Agreement created the territory of Nunavut.
Answer: True



305. 
Multiple Choice
Which traditional Inuit skill involves building snow shelters?
A. Bark canoe construction
B. Igloo making
C. Ice carving
D. Whale oil production
Answer: B. Igloo making

306. 
True or False
Igloo-making is now only taught in museums.
Answer: False
(It is still taught in communities.)



307. 
Multiple Choice
What is a pressing healthcare concern in Nunavut?
A. Malaria
B. Diabetes
C. Tuberculosis (TB)
D. Influenza
Answer: C. Tuberculosis (TB)

308. 
True or False
TB rates in Nunavut are higher than the national average.
Answer: True



309. 
Multiple Choice
Which wildlife is most commonly seen around the coasts of Nunavut?
A. Grizzly bears
B. Polar bears
C. Moose
D. Caribou
Answer: B. Polar bears

310. 
True or False
Polar bears are protected under conservation efforts in Nunavut.
Answer: True



311. 
Multiple Choice
What program trains Inuit youth in trades and skills?
A. Northern Stars
B. Skills Canada Nunavut
C. Arctic Youth Network
D. Build the North
Answer: B. Skills Canada Nunavut

312. 
True or False
Skills Canada Nunavut promotes trades, technology, and apprenticeships.
Answer: True



313. 
Multiple Choice
What is the main legislative body of Nunavut called?
A. House of Commons
B. Nunavut Assembly
C. Legislative Assembly of Nunavut
D. Arctic Parliament
Answer: C. Legislative Assembly of Nunavut

314. 
True or False
Nunavut’s legislature operates under a consensus government.
Answer: True



315. 
Multiple Choice
What is the name of the land feature where many ancient fossils have been found in Nunavut?
A. Arctic Plateau
B. Baffin Valley
C. Arctic Cordillera
D. Eureka Sound
Answer: D. Eureka Sound

316. 
True or False
Nunavut has contributed to significant paleontological discoveries.
Answer: True



317. 
Multiple Choice
What northern animal is often hunted traditionally in Nunavut?
A. Antelope
B. Seal
C. Emu
D. Kangaroo
Answer: B. Seal

318. 
True or False
Seal hunting remains part of Inuit tradition and subsistence.
Answer: True



319. 
Multiple Choice
Which cultural event highlights arts and performance in Nunavut?
A. Nunavut Gala
B. Arctic Inspiration Prize
C. Alianait Arts Festival
D. Snow and Ice Ball
Answer: C. Alianait Arts Festival

320. 
True or False
The Alianait Festival features both Inuit and international artists.
Answer: True




321. 
Multiple Choice
What is the most commonly spoken language at home in Nunavut?
A. English
B. French
C. Inuktitut
D. Inuinnaqtun
Answer: C. Inuktitut

322. 
True or False
Inuktitut is only used in schools but not spoken at home.
Answer: False
(It is widely spoken in homes and communities.)



323. 
Multiple Choice
Which historical explorer mapped much of the eastern Arctic?
A. Jacques Cartier
B. Henry Hudson
C. Robert Bylot
D. Martin Frobisher
Answer: D. Martin Frobisher

324. 
True or False
Martin Frobisher made contact with the Inuit during his Arctic voyages.
Answer: True



325. 
Multiple Choice
What is the name of the sea located between Nunavut and Greenland?
A. Labrador Sea
B. Beaufort Sea
C. Baffin Bay
D. Hudson Strait
Answer: C. Baffin Bay

326. 
True or False
Baffin Bay is part of the Arctic Ocean.
Answer: True



327. 
Multiple Choice
Which type of traditional clothing is made from animal skin and worn in cold Arctic climates?
A. Parka
B. Balaclava
C. Cloak
D. Sarong
Answer: A. Parka

328. 
True or False
Traditional Inuit parkas were waterproof and insulated using seal or caribou skin.
Answer: True



329. 
Multiple Choice
What is the main purpose of Nunavut Arctic College?
A. Provide driver’s licenses
B. Deliver trades and academic education
C. Train military personnel
D. Publish government documents
Answer: B. Deliver trades and academic education

330. 
True or False
Nunavut Arctic College serves both Inuit and non-Inuit students.
Answer: True



331. 
Multiple Choice
What major environmental issue threatens Arctic wildlife in Nunavut?
A. Deforestation
B. Soil erosion
C. Climate change
D. Drought
Answer: C. Climate change

332. 
True or False
Climate change is causing sea ice to form later and melt earlier in Nunavut.
Answer: True



333. 
Multiple Choice
What is the primary source of electricity in many Nunavut communities?
A. Solar panels
B. Wind farms
C. Diesel generators
D. Hydropower
Answer: C. Diesel generators

334. 
True or False
Diesel power is used in Nunavut due to the remoteness and lack of hydro infrastructure.
Answer: True



335. 
Multiple Choice
Which of these is a traditional Inuit tool used for hunting?
A. Harpoon
B. Spear gun
C. Rifle
D. Axe
Answer: A. Harpoon

336. 
True or False
Harpoons are no longer taught or used in any Inuit communities.
Answer: False
(They are still used in some traditional hunting.)



337. 
Multiple Choice
What is a “qamutiik”?
A. A type of Inuit musical instrument
B. A snow house
C. A traditional sled pulled by dogs or snowmobiles
D. A ceremonial mask
Answer: C. A traditional sled pulled by dogs or snowmobiles

338. 
True or False
Qamutiik is used for transportation during winter in Nunavut.
Answer: True



339. 
Multiple Choice
What is the traditional role of Inuit hunters?
A. Building homes
B. Entertainment
C. Providing food and materials for their community
D. Teaching in schools
Answer: C. Providing food and materials for their community

340. 
True or False
Inuit hunting practices are guided by respect for nature and conservation.
Answer: True



341. 
Multiple Choice
Which major Canadian holiday celebrates the founding of Nunavut?
A. Nunavut Day
B. Canada Day
C. Arctic Unity Day
D. Indigenous Peoples’ Day
Answer: A. Nunavut Day

342. 
True or False
Nunavut Day is celebrated on July 9th.
Answer: True



343. 
Multiple Choice
What symbol is found on the flag of Nunavut?
A. A maple leaf
B. A polar bear
C. An inuksuk and a star
D. A snowflake
Answer: C. An inuksuk and a star

344. 
True or False
The inuksuk on Nunavut’s flag represents guidance and community.
Answer: True



345. 
Multiple Choice
Which key feature distinguishes Nunavut’s political system?
A. Fixed-party system
B. Consensus government
C. Independent monarchy
D. Military rule
Answer: B. Consensus government

346. 
True or False
In Nunavut, candidates do not run under political party banners.
Answer: True



347. 
Multiple Choice
What does the word “Nunavut” mean in Inuktitut?
A. The far north
B. The land we share
C. Our land
D. The cold place
Answer: C. Our land

348. 
True or False
“Nunavut” reflects Inuit ownership and cultural identity.
Answer: True



349. 
Multiple Choice
What important function does the Inuit Tapiriit Kanatami serve?
A. Inuit national advocacy and rights organization
B. Provincial health regulator
C. Federal security agency
D. Mining association
Answer: A. Inuit national advocacy and rights organization

350. 
True or False
The Inuit Tapiriit Kanatami represents Inuit across Canada, including Nunavut.
Answer: True



351. 
Multiple Choice
Which of the following best describes Inuit art?
A. Only abstract paintings
B. Primarily woodwork
C. Soapstone carvings, prints, and textiles
D. Gothic architecture
Answer: C. Soapstone carvings, prints, and textiles

352. 
True or False
Inuit art is recognized globally and preserved in major galleries.
Answer: True



353. 
Multiple Choice
Which northern mammal is a key species in Inuit hunting?
A. Cougar
B. Narwhal
C. Muskox
D. Lynx
Answer: C. Muskox

354. 
True or False
Muskoxen provide meat and wool-like fur known as qiviut.
Answer: True



355. 
Multiple Choice
Which Nunavut community is a hub for Inuit artists and carvings?
A. Rankin Inlet
B. Yellowknife
C. Inuvik
D. Whitehorse
Answer: A. Rankin Inlet

356. 
True or False
Rankin Inlet is known for traditional crafts and modern Inuit art.
Answer: True



357. 
Multiple Choice
How does the GN (Government of Nunavut) communicate with its citizens in multiple languages?
A. English only
B. Multilingual broadcasts and translations
C. Through interpreters only
D. Sign language videos
Answer: B. Multilingual broadcasts and translations

358. 
True or False
The Government of Nunavut produces official information in Inuktitut.
Answer: True



359. 
Multiple Choice
Which waterway allows shipping access to some Nunavut communities in summer?
A. Northwest Passage
B. St. Lawrence Seaway
C. Red River
D. Lake Superior
Answer: A. Northwest Passage

360. 
True or False
The Northwest Passage is increasingly used due to Arctic ice melting.
Answer: True



361. 
Multiple Choice
What form of art is used by Inuit to tell stories without writing?
A. Film
B. Dance
C. Carvings and prints
D. Graffiti
Answer: C. Carvings and prints

362. 
True or False
Inuit carvings often depict animals, spirits, and daily life.
Answer: True



363. 
Multiple Choice
Which one mainly Emphasizes consensus and consultation
A. Qanuqtuurniq
B. Aajiiqatigiinniq
C. Uqausiq
D. Katimavik
Answer: B. Aajiiqatigiinniq

364. 
True or False
Aajiiqatigiinniq emphasizes consensus and consultation.
Answer: True



365. 
Multiple Choice
What is the largest island entirely within Canada, part of Nunavut?
A. Vancouver Island
B. Baffin Island
C. Ellesmere Island
D. Victoria Island
Answer: B. Baffin Island

366. 
True or False
Baffin Island is Canada’s largest island.
Answer: True



367. 
Multiple Choice
Nunavut Day celebrated in which month?
A. January
B. March
C. July
D. October
Answer: C. July

368. 
True or False
Nunavut Day marks the enactment of the Nunavut Act.
Answer: True



369. 
Multiple Choice
What does “Qaujimajatuqangit” mean?
A. Freedom
B. Knowledge passed down
C. Cold season
D. Arctic sunrise
Answer: B. Knowledge passed down

370. 
True or False
Qaujimajatuqangit supports policy-making and community planning.
Answer: True



371. 
Multiple Choice
Which international organization recognizes Inuit rights globally?
A. United Nations Inuit Council
B. Arctic Peace Union
C. Inuit Circumpolar Council
D. North Polar Congress
Answer: C. Inuit Circumpolar Council

372. 
True or False
The Inuit Circumpolar Council represents Inuit from Canada, Alaska, Greenland, and Russia.
Answer: True



373. 
Multiple Choice
Which organization manages land and resources on Inuit-owned lands in Nunavut?
A. Inuit Heritage Council
B. Nunavut Tunngavik Incorporated
C. Parks Canada
D. Crown Indigenous Relations
Answer: B. Nunavut Tunngavik Incorporated

374. 
True or False
Nunavut Tunngavik Incorporated ensures Inuit rights under the land claims agreement.
Answer: True



375. 
Multiple Choice
What is a key economic sector for Nunavut’s future growth?
A. Banking
B. Fisheries
C. Mining and resource development
D. Software
Answer: C. Mining and resource development

376. 
True or False
Nunavut contains valuable resources such as gold, iron, and base metals.
Answer: True



377. 
Multiple Choice
Which agency supports Inuit language promotion in Nunavut?
A. Canadian Inuit Trust
B. Inuit Uqausinginnik Taiguusiliuqtiit
C. Language Commission of Canada
D. Arctic Literacy Bureau
Answer: C. Inuit Uqausinginnik Taiguusiliuqtiit

378. 
True or False
This agency helps standardize Inuit language use in public service.
Answer: True



379. 
Multiple Choice
How do most Nunavummiut travel between communities?
A. Highways
B. Snowmobiles, planes, and boats
C. Subways
D. Trains
Answer: B. Snowmobiles, planes, and boats

380. 
True or False
There are no inter-community roads connecting most Nunavut towns.
Answer: True



381. 
Multiple Choice
Who governs Nunavut under the consensus model?
A. Elected MLAs and appointed ministers
B. Federal governor
C. Elected party leaders
D. Tribal councils
Answer: A. Elected MLAs and appointed ministers

382. 
True or False
There is no opposition party in the Nunavut Legislative Assembly.
Answer: True



383. 
Multiple Choice
What initiative supports Inuit women’s leadership and economic participation?
A. Nunavut Women’s Union
B. Pauktuutit Inuit Women of Canada
C. Arctic Female Network
D. Qulliit Council
Answer: B. Pauktuutit Inuit Women of Canada

384. 
True or False
Pauktuutit addresses health, justice, and culture for Inuit women.
Answer: True



385. 
Multiple Choice
Which wildlife is vital to Inuit culture and diet?
A. Cougar
B. Polar Bear
C. Walrus
D. Deer
Answer: C. Walrus

386. 
True or False
Walrus tusks are used for tools and carvings.
Answer: True



387. 
Multiple Choice
Which event commemorates Nunavut’s cultural and historical heritage?
A. Arctic Day
B. Northern Festival
C. Toonik Tyme
D. Inuit World Games
Answer: C. Toonik Tyme

388. 
True or False
Toonik Tyme includes traditional games, music, and food.
Answer: True



389. 
Multiple Choice
What body of water borders Nunavut to the west?
A. Hudson Bay
B. Pacific Ocean
C. James Bay
D. Labrador Sea
Answer: A. Hudson Bay

390. 
True or False
Hudson Bay is connected to Nunavut’s western coastline.
Answer: True



391. 
Multiple Choice
What document guaranteed Inuit rights in Nunavut?
A. Nunavut Bill of Rights
B. Canadian Constitution
C. Nunavut Land Claims Agreement
D. Federal Indigenous Charter
Answer: C. Nunavut Land Claims Agreement

392. 
True or False
The Nunavut Land Claims Agreement is the largest in Canadian history.
Answer: True



393. 
Multiple Choice
What does the inuksuk symbolize in Inuit culture?
A. Danger ahead
B. Direction, community, and survival
C. Nightfall
D. Food storage
Answer: B. Direction, community, and survival

394. 
True or False
Inuksuit (plural) are still used today to guide travelers.
Answer: True



395. 
Multiple Choice
Which region of Nunavut is Iqaluit located in?
A. Kivalliq
B. Kitikmeot
C. Qikiqtaaluk
D. Nunavik
Answer: C. Qikiqtaaluk

396. 
True or False
Qikiqtaaluk is also known as the Baffin Region.
Answer: True



397. 
Multiple Choice
Which organization oversees language promotion in Nunavut?
A. Canadian Heritage
B. Inuit Uqausinginnik Taiguusiliuqtiit
C. Language Commission of Canada
D. Arctic Literacy Bureau
Answer: B. Inuit Uqausinginnik Taiguusiliuqtiit

398. 
True or False
This organization helps standardize Inuit language use in public service.
Answer: True



399. 
Multiple Choice
Who is eligible to vote in Nunavut’s territorial elections?
A. Canadian citizens aged 16+
B. Inuit only
C. All permanent residents
D. Canadian citizens aged 18+ who reside in Nunavut
Answer: D. Canadian citizens aged 18+ who reside in Nunavut

400. 
True or False
Only Inuit can run for office in the Nunavut Legislative Assembly.
Answer: False
(Any eligible citizen residing in Nunavut can run for office.)
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


        $this->command->info("Parsed " . count($questions) . " questions for Nunavut.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            Question::create([
                'course_section_id' => $nunavutSection->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Nunavut citizenship questions.");
    }
}
