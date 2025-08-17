<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaskatchewanDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $saskatchewan = DrivingSection::firstOrCreate(
            ['title' => 'Saskatchewan'],
            [
                'type' => 'province',
                'capital' => 'Regina',
                'flag' => '/images/flags/saskatchewan.png',
                'description' => 'Saskatchewan Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_adverse_conditions.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $saskatchewan->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
In Saskatchewan, what is the minimum age to apply for a Class 7 learner’s licence?
A. 15
B. 16
C. 17
D. 18
Answer: B. 16

2. 
True or False
A supervising driver for a learner must have at least 1 year of driving experience.
Answer: True

3.
 Multiple Choice
When approaching a stop sign, you must:
A. Slow down and proceed if clear
B. Stop fully before the crosswalk or stop line
C. Honk and move through quickly
D. Only stop if another vehicle is coming
Answer: B. Stop fully before the crosswalk or stop line

4. 
True or False
It’s legal for a learner to drive alone on quiet rural roads.
Answer: False

5. 
Multiple Choice
The maximum speed limit on most urban streets in Saskatchewan is:
A. 40 km/h
B. 50 km/h
C. 60 km/h
D. 70 km/h
Answer: B. 50 km/h

6. 
True or False
You must yield to pedestrians in both marked and unmarked crosswalks.
Answer: True

7. 
Multiple Choice
When driving through a school zone during posted hours, you should:
A. Drive at the posted reduced speed limit
B. Maintain regular city speed
C. Honk to warn children
D. Stop at every intersection
Answer: A. Drive at the posted reduced speed limit

8.
True or False
Learners may use handheld phones while driving if it’s for navigation.
Answer: False

9. 
Multiple Choice
When two vehicles arrive at an uncontrolled intersection at the same time, who goes first?
A. The vehicle on the left
B. The larger vehicle
C. The faster vehicle
D. The vehicle on the right
Answer: D. The vehicle on the right

10. 
True or False
A learner can drive at night if accompanied by a supervising driver.
Answer: True
(Saskatchewan Class 7 Learner's Licence  Road Rules Q11-Q110)

11. 
Multiple Choice
If your vehicle begins to skid, the first thing you should do is:
A. Slam the brakes
B. Steer in the direction you want to go
C. Turn the wheel sharply in the opposite direction
D. Accelerate quickly
Answer: B. Steer in the direction you want to go

12. 
True or False
Learners must have zero blood alcohol content while driving.
Answer: True

13.
 Multiple Choice
When parking uphill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Away from the curb

14.
 True or False
Headlights must be on from sunset to sunrise or when visibility is poor.
Answer: True

15. 
Multiple Choice
The safest following distance under ideal conditions is:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds

16. 
True or False
It’s legal to pass another vehicle in a school zone at the posted reduced speed.
Answer: False

17. 
Multiple Choice
What should you do if you see an animal on the road ahead?
A. Swerve sharply to avoid it
B. Brake firmly and steer straight
C. Accelerate to pass quickly
D. Honk repeatedly and keep going
Answer: B. Brake firmly and steer straight

18.
 True or False
Seat belts are optional for rear passengers in Saskatchewan.
Answer: False

19.
 Multiple Choice
When approaching a flashing yellow light, you should:
A. Stop completely
B. Slow down and proceed with caution
C. Speed up before it turns red
D. Ignore it if the road looks clear
Answer: B. Slow down and proceed with caution

20.
 True or False
Learners may carry more passengers than there are seat belts if supervised.
Answer: False

21. 
Multiple Choice
When making a right turn at a red light (where allowed), you must:
A. Stop fully and yield to pedestrians and traffic
B. Slow down and turn without stopping
C. Honk and proceed quickly
D. Turn only if there’s no oncoming traffic
Answer: A. Stop fully and yield to pedestrians and traffic

22. 
True or False
Learners can drive on gravel and rural roads.
Answer: True

23. 
Multiple Choice
When driving through fog, use:
A. High beams
B. Low beams
C. Parking lights only
D. Hazard lights continuously
Answer: B. Low beams

24. 
True or False
It is safe to overtake on a curve if you can see far enough ahead.
Answer: False

25. 
Multiple Choice
The main reason for adjusting your seat and mirrors before driving is:
A. Comfort
B. Safety and visibility
C. Style
D. To test the controls
Answer: B. Safety and visibility

26. 
True or False
It’s legal to block an intersection if traffic is stopped ahead.
Answer: False

27. 
Multiple Choice
What is the main cause of hydroplaning?
A. Worn tires and excessive speed on wet roads
B. Driving too slowly in rain
C. Low tire pressure only
D. Overuse of brakes
Answer: A. Worn tires and excessive speed on wet roads

28. 
True or False
In Saskatchewan, drivers must stop for a school bus only if approaching from behind.
Answer: False 
(You must stop from both directions unless on a divided highway.)

29. 
Multiple Choice
When your vehicle starts to fishtail on ice, you should:
A. Brake hard immediately
B. Ease off the accelerator and steer gently in the direction of the skid
C. Turn sharply the opposite way
D. Accelerate to straighten out
Answer: B. Ease off the accelerator and steer gently in the direction of the skid

30. 
True or False
Flashing blue lights are used by snow removal equipment in Saskatchewan.
Answer: True



31. 
Multiple Choice
If you approach an intersection with a malfunctioning traffic light, treat it as:
A. A yield sign
B. A four-way stop
C. A green light
D. A pedestrian crossing
Answer: B. A four-way stop

32. 
True or False
Learners can drive on highways without a supervising driver if traffic is light.
Answer: False

33.
 Multiple Choice
When passing a cyclist, you should give at least:
A. 0.5 metres
B. 1 metre
C. 1.5 metres
D. 2 metres
Answer: B. 1 metre – Minimum safe passing distance.

34.
 True or False
Driving with cruise control on icy roads is safe.
Answer: False

35.
 Multiple Choice
What is the correct hand signal for a left turn?
A. Left arm extended straight out
B. Left arm bent upward
C. Left arm bent downward
D. Right arm extended out
Answer: A. Left arm extended straight out

36.
True or False
You can use the left lane on a multi-lane highway for passing only.
Answer: True

37. 
Multiple Choice
If a vehicle is tailgating you, you should:
A. Speed up to get away
B. Tap your brakes
C. Move to another lane or slow down to let them pass
D. Stop suddenly
Answer: C. Move to another lane or slow down to let them pass

38. 
True or False
Learners are allowed to tow trailers.
Answer: False

39.
 Multiple Choice
When approaching a railway crossing with no warning signals, you should:
A. Slow down, look both ways, and proceed if clear
B. Drive through without slowing
C. Stop only if a train is visible
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed if clear

40.
 True or False
Learners must always drive in the right-hand lane on multi-lane roads unless passing.
Answer: True



41. 
Multiple Choice
When entering a roundabout, you must:
A. Yield to traffic already in the circle
B. Enter immediately if your lane is clear
C. Honk to signal entry
D. Stop before entering every time
Answer: A. Yield to traffic already in the circle

42.
 True or False
Flashing red lights at a railway crossing mean you must stop and wait until lights stop flashing.
Answer: True

43.
 Multiple Choice
In Saskatchewan, when must headlights be dimmed for oncoming traffic?
A. 60 metres away
B. 150 metres away
C. 300 metres away
D. Only at night
Answer: B. 150 metres away

44.
 True or False
It’s acceptable to leave a child unattended in a parked vehicle for a few minutes.
Answer: False

45. 
Multiple Choice
The safest way to check blind spots is:
A. Rely on mirrors only
B. Quick shoulder check before changing lanes
C. Look out the rear window
D. Listen for nearby vehicles
Answer: B. Quick shoulder check before changing lanes

46.
 True or False
Road conditions can vary greatly in rural Saskatchewan during winter.
Answer: True

47.
 Multiple Choice
When stopped behind a school bus with red lights flashing, you must:
A. Stop at least 5 metres away
B. Stop at least 15 metres away
C. Stop at least 20 metres away
D. Pass with caution
Answer: B. Stop at least 5 metres away – SGI standard.

48. 
True or False
It is illegal to park within 10 metres of a crosswalk.
Answer: True

49.
 Multiple Choice
When merging onto a highway, you should:
A. Match your speed to traffic and merge smoothly
B. Stop at the end of the ramp
C. Merge at a slow speed
D. Enter without signalling
Answer: A. Match your speed to traffic and merge smoothly

50.
 True or False
Learners can drive on freeways with a supervising driver.
Answer: True



51.
 Multiple Choice
When approaching a railway crossing with stop signs and no gates, you must:
A. Slow down and proceed if no train is visible
B. Stop completely, look both ways, and proceed when safe
C. Honk before crossing
D. Drive through quickly to clear the tracks
Answer: B. Stop completely, look both ways, and proceed when safe

52. 
True or False
It is legal to park facing the opposite direction of traffic on a two-way street in Saskatchewan.
Answer: False

53. 
Multiple Choice
When driving on a gravel road, you should:
A. Drive faster to avoid dust
B. Maintain a safe speed and increase following distance
C. Use high beams during the day
D. Drive in the centre of the road
Answer: B. Maintain a safe speed and increase following distance

54.
 True or False
You must yield to pedestrians at marked and unmarked crosswalks.
Answer: True

55. 
Multiple Choice
When approaching an intersection with a yield sign, you must:
A. Stop every time before proceeding
B. Slow down and give the right-of-way if needed
C. Speed up to merge into traffic
D. Honk to alert other drivers
Answer: B. Slow down and give the right-of-way if needed

56. 
True or False
It’s legal to use handheld devices while stopped at a railway crossing.
Answer: False

57. 
Multiple Choice
If your car begins to skid in rain, you should:
A. Brake hard immediately
B. Ease off the gas and steer in the direction you want to go
C. Shift into park
D. Accelerate to regain control
Answer: B. Ease off the gas and steer in the direction you want to go

58.
 True or False
When reversing, you should always check behind by looking over your shoulder.
Answer: True

59. 
Multiple Choice
What is the safest way to handle an approaching emergency vehicle with lights and siren?
A. Pull over to the right and stop
B. Continue driving at normal speed
C. Stop in the middle of the road
D. Turn into the nearest driveway
Answer: A. Pull over to the right and stop

60. 
True or False
Learners must always carry their licence while driving.
Answer: True



61.
 Multiple Choice
When approaching a flashing red traffic light, you must:
A. Treat it as a yield sign
B. Treat it as a stop sign
C. Proceed without stopping if no one is coming
D. Accelerate through quickly
Answer: B. Treat it as a stop sign

62. 
True or False
Parking is allowed on a sidewalk if no pedestrians are present.
Answer: False

63. 
Multiple Choice
If a vehicle behind you is attempting to pass, you should:
A. Maintain or slightly reduce your speed
B. Increase your speed to stay ahead
C. Move into the oncoming lane
D. Honk at the passing vehicle
Answer: A. Maintain or slightly reduce your speed

64.
 True or False
You must obey instructions from traffic control persons in construction zones.
Answer: True

65.
 Multiple Choice
What does a red circle with a slash over a black “P” mean?
A. Pay for parking
B. No parking allowed
C. Park parallel
D. Parking permitted at certain hours
Answer: B. No parking allowed

66. 
True or False
You must always signal when leaving a roundabout.
Answer: True

67. 
Multiple Choice
On icy roads, you should:
A. Drive at posted speed limits
B. Accelerate gently and brake slowly
C. Use cruise control for steady speed
D. Turn sharply to avoid hazards
Answer: B. Accelerate gently and brake slowly

68. 
True or False
You can use hazard lights while driving in heavy rain to warn others.
Answer: True

69. 
Multiple Choice
If another driver is driving aggressively, you should:
A. Challenge them
B. Avoid eye contact and give them space
C. Block their lane
D. Brake hard in front of them
Answer: B. Avoid eye contact and give them space

70. 
True or False
In Saskatchewan, winter tires are required by law for all vehicles.
Answer: False



71.
 Multiple Choice
What’s the correct action if your vehicle’s brakes fail?
A. Shift to a lower gear and use the parking brake gradually
B. Turn off the ignition while driving
C. Accelerate to a safe zone
D. Continue driving to a repair shop
Answer: A. Shift to a lower gear and use the parking brake gradually

72.
 True or False
It’s safe to pass a snowplow if the road ahead looks clear.
Answer: False

73. 
Multiple Choice
When parking uphill without a curb, turn your wheels:
A. Toward the road
B. Toward the shoulder
C. Straight ahead
D. Away from the road shoulder
Answer: B. Toward the shoulder

74. 
True or False
Seatbelt use is optional for passengers in the back seat if they are over 18.
Answer: False

75. 
Multiple Choice
When driving at night, you should:
A. Look directly at oncoming headlights
B. Glance to the right edge of the road to reduce glare
C. Keep high beams on for all traffic
D. Focus only on the road ahead
Answer: B. Glance to the right edge of the road to reduce glare

76. 
True or False
It’s legal to park in a bike lane if no cyclists are present.
Answer: False

77. 
Multiple Choice
If your vehicle stalls in an intersection, you should:
A. Push it out of traffic if safe
B. Stay inside and wait for help
C. Turn on hazard lights and exit quickly
D. Abandon it immediately
Answer: A. Push it out of traffic if safe

78.
 True or False
Drivers must stop for school buses only when approaching from behind.
Answer: False

79. 
Multiple Choice
What’s the purpose of a centre left-turn lane?
A. Passing slower vehicles
B. Parking temporarily
C. Waiting to turn left from either direction
D. High-speed passing lane
Answer: C. Waiting to turn left from either direction

80.
 True or False
Learners can drive in another province without restrictions.
Answer: False 
(Must follow that province’s rules.)



81. 
Multiple Choice
When must you yield to a pedestrian with a guide dog?
A. Only at marked crosswalks
B. At all times
C. Only when they are on your side of the road
D. Only in urban areas
Answer: B. At all times

82. 
True or False
It’s safe to drive in fog with parking lights only.
Answer: False

83.
 Multiple Choice
If your car begins to hydroplane, you should:
A. Brake sharply
B. Ease off the accelerator and steer straight
C. Accelerate to maintain control
D. Steer opposite the skid
Answer: B. Ease off the accelerator and steer straight

84.
 True or False
Drivers must reduce speed in playground zones during posted hours.
Answer: True

85. 
Multiple Choice
When following a motorcycle, you should keep at least:
A. 1 second behind
B. 2 seconds behind
C. 3–4 seconds behind
D. 5 seconds behind
Answer: C. 3–4 seconds behind

86. 
True or False
Learners may use handheld phones for GPS navigation while driving.
Answer: False

87. 
Multiple Choice
The best way to avoid a rear-end collision is to:
A. Maintain a safe following distance
B. Brake suddenly to test drivers behind you
C. Stay in the left lane
D. Drive faster than surrounding traffic
Answer: A. Maintain a safe following distance

88. 
True or False
Drivers must yield to buses pulling away from a stop in urban areas.
Answer: True

89. 
Multiple Choice
When parking downhill with a curb, turn wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. In either direction
Answer: A. Toward the curb

90.
 True or False
Cyclists can ride in the centre of a traffic lane if needed for safety.
Answer: True



91. 
Multiple Choice
What does a flashing pedestrian signal mean?
A. Pedestrians may start crossing
B. Pedestrians should not start crossing, but those in the crosswalk may finish
C. Drivers must stop immediately
D. Drivers can ignore it
Answer: B. Pedestrians should not start crossing, but those in the crosswalk may finish

92.
 True or False
It is legal to leave your car idling unattended.
Answer: False

93. 
Multiple Choice
When merging onto a freeway, the correct speed is:
A. Well below the speed of traffic
B. Matching the speed of traffic
C. Slightly faster than traffic
D. Any comfortable speed
Answer: B. Matching the speed of traffic

94. 
True or False
Oncoming traffic has the right-of-way when you are turning left.
Answer: True

95. 
Multiple Choice
What’s the purpose of a no-stopping zone?
A. You may park but not unload
B. You may stop briefly to pick up passengers
C. You may not stop your vehicle for any reason except emergencies
D. You may stop only at night
Answer: C. You may not stop your vehicle for any reason except emergencies

96.
 True or False
Using high beams in fog improves visibility.
Answer: False

97.
 Multiple Choice
If your view is blocked by a large vehicle at an intersection, you should:
A. Move forward slowly until you can see
B. Honk until they move
C. Change lanes quickly
D. Pass them immediately
Answer: A. Move forward slowly until you can see

98. 
True or False
Learners are allowed to carry more passengers than there are seatbelts.
Answer: False

99.
 Multiple Choice
When driving through water on the road, you should:
A. Drive quickly to avoid getting stuck
B. Test your brakes afterward to ensure they work
C. Stop in the water to check depth
D. Avoid using brakes after passing
Answer: B. Test your brakes afterward to ensure they work

100. 
True or False
In Saskatchewan, you must carry proof of insurance while driving.
Answer: True

101.
 Multiple Choice
What’s the safest way to share the road with large trucks?
A. Stay out of their blind spots
B. Follow closely to save fuel
C. Pass quickly and cut in
D. Drive beside them
Answer: A. Stay out of their blind spots

102. 
True or False
Learners may drive on highways if accompanied by a qualified supervisor.
Answer: True

103.
 Multiple Choice
When driving in strong winds, you should:
A. Steer firmly and be ready for gusts
B. Speed up
C. Turn sharply into the wind
D. Ignore it
Answer: A. Steer firmly and be ready for gusts

104.
True or False
Wearing sunglasses can reduce glare when driving.
Answer: True

105. 
Multiple Choice
What should you do if your vehicle stalls on railway tracks?
A. Push the car off
B. Leave the car and call for help immediately
C. Try to restart until the train arrives
D. Stand on the tracks to warn the train
Answer: B. Leave the car and call for help immediately

106.
 True or False
If your brakes get wet, you can dry them by driving slowly and applying light pressure.
Answer: True

107. 
Multiple Choice
When should you turn on your headlights?
A. Only at night
B. 30 minutes before sunset until 30 minutes after sunrise, and when visibility is poor
C. Only in the city
D. Only in winter
Answer: B. 30 minutes before sunset until 30 minutes after sunrise, and when visibility is poor

108.
 True or False
A learner’s licence can be suspended for traffic violations.
Answer: True

109.
 Multiple Choice
What’s the main purpose of defensive driving?
A. To avoid traffic tickets
B. To anticipate and avoid hazards
C. To drive faster than others
D. To compete with other drivers
Answer: B. To anticipate and avoid hazards

110.
 True or False
You must always follow the posted speed limit, even in hazardous conditions.
Answer: False
(Drive slower if conditions are unsafe.)

111. 
Multiple Choice
What is the penalty for not wearing a seatbelt in Saskatchewan?
A. Warning only
B. Fine and demerit points
C. Vehicle impoundment
D. Licence suspension
Answer: B. Fine and demerit points

112. 
True or False
Cyclists are required to follow the same traffic rules as drivers.
Answer: True

113. 
Multiple Choice
If your car stalls on railway tracks and a train is approaching, you should:
A. Try to restart your car
B. Exit the vehicle and move away from the tracks at a 45° angle toward the train’s direction
C. Stay inside the vehicle with hazard lights on
D. Push the vehicle off the tracks
Answer: B. Exit the vehicle and move away from the tracks at a 45° angle toward the train’s direction

114. 
True or False
You must yield to transit buses signalling to re-enter traffic in Saskatchewan.
Answer: True

115. 
Multiple Choice
When is it legal to make a U-turn in Saskatchewan?
A. Anywhere unless a sign prohibits it
B. Only at traffic lights
C. On curves and near hills
D. In school zones
Answer: A. Anywhere unless a sign prohibits it

116. 
True or False
Flashing green traffic lights mean the same as solid green in Saskatchewan.
Answer: False 
(Flashing green means pedestrian-controlled light, proceed with caution.)

117. 
Multiple Choice
On icy roads, stopping distance can increase by:
A. 2 times
B. 4 times
C. 10 times
D. 20 times
Answer: B. 4 times

118. 
True or False
Backing up is prohibited on expressways and high-speed roads.
Answer: True

119.
 Multiple Choice
When driving in heavy rain, the risk of hydroplaning increases with:
A. Low tire pressure
B. Worn tire tread
C. High speed
D. All of the above
Answer: D. All of the above

120. 
True or False
Learners must always display an “L” sign on the rear of the vehicle in Saskatchewan.
Answer: True



121.
 Multiple Choice
Which lane should you use on a highway when driving at the speed limit and not passing?
A. Left lane
B. Centre lane
C. Right lane
D. Any lane
Answer: C. Right lane

122.
 True or False
Vehicles must stop for emergency vehicles only if they are travelling in the same direction.
Answer: False 
(You must stop in both directions unless on a divided highway.)

123. 
Multiple Choice
The “two-second rule” is used to measure:
A. Braking distance
B. Following distance
C. Acceleration speed
D. Reaction time
Answer: B. Following distance

124.
 True or False
Learners can drive without insurance if supervised by a licensed driver.
Answer: False

125. 
Multiple Choice
In Saskatchewan, using a handheld phone while driving can result in:
A. A fine only
B. A fine and licence suspension
C. Vehicle seizure
D. Warning only
Answer: B. A fine and licence suspension

126. 
True or False
Roads in Saskatchewan can be especially slippery at intersections in winter due to packed snow.
Answer: True

127. 
Multiple Choice
What does a yellow diamond-shaped sign generally indicate?
A. Regulatory instruction
B. Road hazard or warning ahead
C. Information about services
D. Parking rules
Answer: B. Road hazard or warning ahead

128. 
True or False
White lines separate traffic moving in opposite directions.
Answer: False 
(Yellow lines separate opposite directions; white lines separate same direction.)

129.
 Multiple Choice
What does a solid yellow line beside a broken yellow line mean?
A. Passing is allowed from both directions
B. Passing is allowed only from the side with the broken line
C. Passing is never allowed
D. Passing is allowed from the solid line side
Answer: B. Passing is allowed only from the side with the broken line

130. 
True or False
You can park within 3 metres of a fire hydrant in Saskatchewan.
Answer: False


131.
 Multiple Choice
What is the main purpose of rumble strips on the road?
A. To slow traffic in residential areas
B. To warn drivers of hazards or changes ahead
C. To improve road grip in winter
D. To reduce noise pollution
Answer: B. To warn drivers of hazards or changes ahead

132.
 True or False
Flashing amber lights on a vehicle usually indicate a slow-moving or maintenance vehicle.
Answer: True

133. 
Multiple Choice
At uncontrolled pedestrian crossings, you must:
A. Slow down and continue if no one is on the crosswalk
B. Stop if pedestrians are waiting to cross
C. Honk to warn pedestrians
D. Proceed if the road ahead is clear
Answer: B. Stop if pedestrians are waiting to cross

134. 
True or False
Motorcycles are allowed to share a lane with cars.
Answer: False
(Motorcycles need a full lane.)

135.
 Multiple Choice
When driving in strong crosswinds, it is safest to:
A. Grip the steering wheel firmly and reduce speed
B. Increase your speed to pass the windy area quickly
C. Drive in the centre of the road
D. Steer sharply into the wind
Answer: A. Grip the steering wheel firmly and reduce speed

136. 
True or False
The left lane on a multi-lane road is intended mainly for passing.
Answer: True

137.
 Multiple Choice
What does a triangular orange sign on the back of a vehicle mean?
A. Oversized load
B. Slow-moving vehicle
C. Dangerous goods
D. Vehicle under repair
Answer: B. Slow-moving vehicle

138. 
True or False
It is acceptable to reverse into an intersection if you miss your turn.
Answer: False

139. 
Multiple Choice
When parallel parking, you should be no more than:
A. 20 cm from the curb
B. 30 cm from the curb
C. 45 cm from the curb
D. 1 metre from the curb
Answer: B. 30 cm from the curb

140.
 True or False
Learner drivers can carry any number of passengers if seatbelts are available.
Answer: True


141.
 Multiple Choice
What should you do if your headlights fail at night?
A. Stop immediately in the lane
B. Turn on hazard lights, reduce speed, and pull off the road
C. Flash your high beams repeatedly
D. Continue driving using streetlights for guidance
Answer: B. Turn on hazard lights, reduce speed, and pull off the road

142.
 True or False
When backing out of a driveway, you must yield to pedestrians and other traffic.
Answer: True

143.
 Multiple Choice
If another driver is tailgating you, you should:
A. Speed up to create more space
B. Move to the right lane or slow gradually to let them pass
C. Brake sharply to warn them
D. Ignore them
Answer: B. Move to the right lane or slow gradually to let them pass

144. 
True or False
Using cruise control on wet roads is not recommended.
Answer: True

145. 
Multiple Choice
A red circle with a diagonal line through a black arrow means:
A. One-way street
B. No entry for vehicles
C. Turn in the direction shown is prohibited
D. Detour ahead
Answer: C. Turn in the direction shown is prohibited

146.
 True or False
Snowplows often travel below the speed limit and may create snow clouds that reduce visibility.
Answer: True

147.
 Multiple Choice
When approaching a fire truck stopped at an emergency scene, you must:
A. Stop completely until signalled to proceed
B. Slow down, proceed with caution, and follow any posted instructions
C. Maintain your speed to avoid blocking other vehicles
D. Change lanes only if traffic allows
Answer: B. Slow down, proceed with caution, and follow any posted instructions

148.
 True or False
Yellow lines on the road always separate lanes of traffic moving in the same direction.
Answer: False

149.
 Multiple Choice
What is the first thing you should do if your vehicle starts to overheat?
A. Turn on the air conditioning
B. Pull over safely and turn off the engine
C. Increase your speed to cool the engine
D. Pour cold water directly on the engine
Answer: B. Pull over safely and turn off the engine

150. 
True or False
In Saskatchewan, studded tires are permitted during winter months.
Answer: True

151. 
Multiple Choice
What does a solid white line between lanes mean?
A. Lane change allowed anytime
B. Lane change discouraged unless necessary
C. Passing allowed in both directions
D. Hazard ahead
Answer: B. Lane change discouraged unless necessary

152.
 True or False
You can park in front of a driveway as long as the vehicle owner agrees.
Answer: False

153. 
Multiple Choice
When must you use headlights in Saskatchewan?
A. Between dusk and dawn, or when visibility is poor
B. Only in rural areas
C. Only at night
D. Only when raining
Answer: A. Between dusk and dawn, or when visibility is poor

154.
 True or False
Learners can drive on gravel roads if supervised by a fully licensed driver.
Answer: True

155. 
Multiple Choice
What is the legal blood alcohol concentration (BAC) limit for drivers under 21 in Saskatchewan?
A. 0.08%
B. 0.05%
C. 0.00%
D. 0.02%
Answer: C. 0.00%

156. 
True or False
Flashing green traffic lights mean you must yield to pedestrians before proceeding.
Answer: True

157.
 Multiple Choice
How should you park on a hill facing uphill without a curb?
A. Turn wheels toward the curb
B. Turn wheels toward the road shoulder
C. Leave wheels straight
D. Apply the handbrake only
Answer: B. Turn wheels toward the road shoulder

158. 
True or False
In Saskatchewan, seatbelt use is mandatory for both front and rear passengers.
Answer: True

159.
 Multiple Choice
What should you do if your brakes fail while driving?
A. Pump the brakes and shift to a lower gear
B. Turn off the engine immediately
C. Increase speed to find a safe spot
D. Use only the handbrake
Answer: A. Pump the brakes and shift to a lower gear

160.
 True or False
Cyclists are allowed to use the full lane if needed for safety.
Answer: True



161. 
Multiple Choice
What does a flashing yellow traffic light mean?
A. Stop completely
B. Proceed with caution
C. Stop and yield to all traffic
D. Pedestrian crossing ahead
Answer: B. Proceed with caution

162. 
True or False
You can overtake in a school zone if you are under the posted speed limit.
Answer: False

163. 
Multiple Choice
What is the maximum speed limit in most Saskatchewan urban areas unless posted otherwise?
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h

164. 
True or False
Learners may drive on highways only with a supervising driver.
Answer: True

165. 
Multiple Choice
Which light should be used in heavy snow?
A. High beam
B. Low beam
C. Hazard lights only
D. Parking lights only
Answer: B. Low beam

166.
 True or False
It’s safe to coast downhill in neutral to save fuel.
Answer: False

167.
 Multiple Choice
What does a red octagon-shaped sign mean?
A. Yield
B. Stop
C. No entry
D. Caution
Answer: B. Stop

168.
 True or False
You must yield to buses re-entering traffic from a bus stop.
Answer: True

169.
 Multiple Choice
How far ahead should you look when driving in the city?
A. 6–8 seconds
B. 12–15 seconds
C. 20–25 seconds
D. 2–3 seconds
Answer: B. 12–15 seconds

170. 
True or False
Vehicles must yield to pedestrians at unmarked crosswalks.
Answer: True



171. 
Multiple Choice
When is it legal to pass another vehicle on the right?
A. When the other vehicle is turning left
B. On any multi-lane road
C. On the shoulder anytime
D. In school zones
Answer: A. When the other vehicle is turning left

172. 
True or False
Emergency vehicles with flashing lights always have the right of way.
Answer: True

173. 
Multiple Choice
If your vehicle begins to skid, you should:
A. Steer in the opposite direction of the skid
B. Steer gently in the direction you want to go
C. Brake hard immediately
D. Accelerate
Answer: B. Steer gently in the direction you want to go

174. 
True or False
Motorists must stop for a stopped school bus with flashing red lights in all situations.
Answer: False 
(Exception: divided highways in the opposite direction.)

175. 
Multiple Choice
What is the main purpose of the handbrake (parking brake)?
A. To help stop quickly in emergencies
B. To keep the vehicle stationary when parked
C. To help accelerate
D. To improve steering control
Answer: B. To keep the vehicle stationary when parked

176.
 True or False
You must use your turn signals even in parking lots.
Answer: True

177.
 Multiple Choice
When approaching a flashing red light, you must:
A. Proceed without stopping
B. Treat it like a stop sign
C. Slow down only
D. Accelerate through
Answer: B. Treat it like a stop sign

178. 
True or False
It’s legal to block a fire station driveway if your vehicle is attended.
Answer: False

179.
 Multiple Choice
What should you do when entering a highway from an acceleration lane?
A. Stop and wait for a large gap
B. Match speed with highway traffic
C. Merge at a much lower speed
D. Use hazard lights to warn others
Answer: B. Match speed with highway traffic

180. 
True or False
Headlights must be on when wipers are in use due to poor weather.
Answer: True



181. 
Multiple Choice
What is the safest action when you encounter black ice?
A. Brake hard to stop quickly
B. Ease off the accelerator and steer gently
C. Increase speed to get past it
D. Shift into neutral and coast
Answer: B. Ease off the accelerator and steer gently

182. 
True or False
When following a motorcycle, you should maintain at least a 2-second following distance.
Answer: False
(Use at least 3–4 seconds for extra safety.)

183. 
Multiple Choice
What should you do if a tire blows out while driving?
A. Brake immediately
B. Grip the steering wheel firmly, ease off the accelerator, and steer to a stop
C. Swerve off the road quickly
D. Accelerate to maintain control
Answer: B. Grip the steering wheel firmly, ease off the accelerator, and steer to a stop

184.
 True or False
Flashing red lights at a railway crossing mean you must stop and wait until the lights stop.
Answer: True

185. 
Multiple Choice
What is the main risk of driving too close to the vehicle ahead?
A. Better fuel efficiency
B. Reduced reaction time in emergencies
C. Less wind resistance
D. Better view of the road
Answer: B. Reduced reaction time in emergencies

186. 
True or False
Learners are allowed to tow a trailer if supervised.
Answer: False

187. 
Multiple Choice
What does a yellow pedestrian sign with two people walking mean?
A. School zone ahead
B. Crosswalk ahead
C. Pedestrian overpass
D. Rest area ahead
Answer: A. School zone ahead

188.
 True or False
You must yield to vehicles already in a roundabout before entering.
Answer: True

189. 
Multiple Choice
When parking downhill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. In either direction
Answer: A. Toward the curb

190. 
True or False
Driving with interior dome lights on at night is illegal in Saskatchewan.
Answer: False
(Not illegal, but it can reduce visibility.)



191. 
Multiple Choice
When driving in fog, you should use:
A. High beam headlights
B. Low beam headlights
C. Hazard lights only
D. Parking lights
Answer: B. Low beam headlights

192. 
True or False
Drivers must always stop when a police officer signals, even if they are off duty.
Answer: True

193. 
Multiple Choice
The stopping distance at 50 km/h is roughly:
A. 15 metres
B. 25 metres
C. 35 metres
D. 45 metres
Answer: B. 25 metres

194.
 True or False
It is legal to block an intersection if traffic is stopped.
Answer: False

195.
 Multiple Choice
What is the purpose of a “no standing” sign?
A. No parking at any time
B. You may stop only to load or unload passengers
C. No idling engines allowed
D. No stopping for any reason
Answer: B. You may stop only to load or unload passengers

196.
 True or False
Four-way stop intersections are controlled by traffic lights.
Answer: False

197. 
Multiple Choice
When approaching an uncontrolled rural intersection, you should:
A. Slow down and be prepared to stop
B. Maintain your speed
C. Honk to warn others
D. Accelerate through quickly
Answer: A. Slow down and be prepared to stop

198.
 True or False
Reversing on a highway is permitted if your vehicle breaks down.
Answer: False

199.
 Multiple Choice
What does a solid double yellow line mean?
A. Passing is allowed from both sides
B. Passing is not allowed from either side
C. Passing is allowed only from the right lane
D. Passing allowed only in daylight
Answer: B. Passing is not allowed from either side

200. 
True or False
When merging, you must adjust your speed to match the traffic flow.
Answer: True



201.
 Multiple Choice
What should you do when your vehicle starts to hydroplane?
A. Steer sharply to regain control
B. Ease off the accelerator and steer straight
C. Brake firmly
D. Accelerate to push through the water
Answer: B. Ease off the accelerator and steer straight

202. 
True or False
In Saskatchewan, you can use a handheld phone while driving if you are stopped at a red light.
Answer: False

203.
 Multiple Choice
What does a flashing green traffic light mean in some areas?
A. Proceed with caution
B. Pedestrian-controlled light — you may go unless pedestrians activate the signal
C. Turn only
D. Stop and wait for the light to change
Answer: B. Pedestrian-controlled light — you may go unless pedestrians activate the signal

204.
 True or False
It is legal to drive with only daytime running lights at night.
Answer: False

205.
 Multiple Choice
When approaching a construction zone, you must:
A. Maintain your normal speed
B. Follow posted reduced speed limits and obey flag persons
C. Pass workers cautiously without slowing
D. Honk to alert workers
Answer: B. Follow posted reduced speed limits and obey flag persons

206.
 True or False
It is safer to reverse into a parking space than to back out into traffic.
Answer: True

207. 
Multiple Choice
What is the minimum following distance in good weather conditions?
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: B. 2 seconds

208. 
True or False
All school buses in Saskatchewan are required to be yellow.
Answer: True

209. 
Multiple Choice
If you see an animal on the road ahead, you should:
A. Swerve sharply to avoid it
B. Slow down, be prepared to stop, and avoid sudden swerves
C. Accelerate to pass it quickly
D. Honk continuously
Answer: B. Slow down, be prepared to stop, and avoid sudden swerves

210.
 True or False
It is acceptable to block a crosswalk if traffic is heavy.
Answer: False



211. 
Multiple Choice
What is the purpose of ABS brakes?
A. Reduce stopping distance on all surfaces
B. Prevent wheels from locking up during hard braking
C. Increase brake pressure
D. Allow faster acceleration
Answer: B. Prevent wheels from locking up during hard braking

212. 
True or False
ABS brakes work best when you pump the brake pedal.
Answer: False

213.
 Multiple Choice
What does a diamond-shaped road sign generally indicate?
A. Speed limit change
B. Hazard or warning
C. Service area ahead
D. Passing zone
Answer: B. Hazard or warning

214. 
True or False
Pedestrians have the right of way at all intersections, marked or unmarked.
Answer: True

215. 
Multiple Choice
When is it legal to turn right on a red light?
A. After stopping completely and ensuring it’s safe
B. Anytime without stopping
C. Only during daylight
D. Only when a police officer directs
Answer: A. After stopping completely and ensuring it’s safe

216. 
True or False
When parallel parking, you should signal before stopping beside the parked vehicle.
Answer: True

217. 
Multiple Choice
What does a “no passing” zone sign mean?
A. Passing allowed with caution
B. Passing is prohibited in that area
C. You must pull over
D. You must stop immediately
Answer: B. Passing is prohibited in that area

218. 
True or False
Learners are allowed to drive alone after 9:00 p.m.
Answer: False

219.
 Multiple Choice
If your accelerator sticks, you should:
A. Pump the brake and shift to neutral
B. Turn off the ignition immediately
C. Swerve into the shoulder
D. Increase speed
Answer: A. Pump the brake and shift to neutral

220. 
True or False
You can be fined for driving too slowly if you block traffic.
Answer: True



221.
 Multiple Choice
When meeting an oncoming vehicle at night, you should:
A. Look directly into their headlights
B. Glance to the right edge of the road to avoid glare
C. Close your eyes briefly
D. Turn on your high beams
Answer: B. Glance to the right edge of the road to avoid glare

222. 
True or False
When driving in Saskatchewan, radar detectors are legal.
Answer: True

223.
 Multiple Choice
What does a solid white stop line at an intersection mean?
A. You may stop anywhere past it
B. Stop before the line when required
C. Stop only if there is a red light
D. No stopping allowed
Answer: B. Stop before the line when required

224.
 True or False
If an intersection is blocked, you may enter if the light is green.
Answer: False

225.
 Multiple Choice
When parking on a hill facing downhill with a curb, wheels should be turned:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Any direction
Answer: A. Toward the curb

226. 
True or False
Horns should only be used to warn others of danger.
Answer: True

227. 
Multiple Choice
When must you yield to emergency vehicles?
A. Only if they are behind you
B. Whenever they are approaching with lights and siren
C. Only if they are in your lane
D. Only at intersections
Answer: B. Whenever they are approaching with lights and siren

228. 
True or False
It is legal to use the shoulder to pass another vehicle.
Answer: False

229.
 Multiple Choice
What is the main reason to check your blind spots?
A. To see vehicles directly behind you
B. To see vehicles beside you that mirrors don’t show
C. To check road signs
D. To check your speed
Answer: B. To see vehicles beside you that mirrors don’t show

230. 
True or False
Backing into an intersection is prohibited.
Answer: True



231. 
Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Honk to warn them
B. Stop and yield the right of way
C. Pass quickly before they cross
D. Wave to signal them to wait
Answer: B. Stop and yield the right of way

232. 
True or False
Learners can drive on divided highways with a supervising driver.
Answer: True

233.
 Multiple Choice
What should you do if your headlights suddenly fail at night?
A. Turn on hazard lights and pull over
B. Keep driving with parking lights
C. Flash high beams rapidly
D. Speed up to reach a service station
Answer: A. Turn on hazard lights and pull over

234. 
True or False
It is legal to leave your car idling unattended in Saskatchewan.
Answer: False

235. 
Multiple Choice
When is it safe to return to your lane after passing?
A. When you see the passed vehicle in your rear-view mirror
B. Immediately after overtaking
C. When you hear the passed driver honk
D. After three seconds of being ahead
Answer: A. When you see the passed vehicle in your rear-view mirror

236. 
True or False
Shoulder-checking is only needed before lane changes.
Answer: False

237. 
Multiple Choice
If you’re being passed, you should:
A. Speed up to prevent passing
B. Maintain speed or slow slightly
C. Move to the left lane
D. Honk at the passing driver
Answer: B. Maintain speed or slow slightly

238. 
True or False
A round yellow sign with a black “X” warns of a railway crossing.
Answer: True

239.
 Multiple Choice
When is it legal to drive over a fire hose?
A. Any time if no fire is visible
B. Only when directed by an emergency official
C. During light rain
D. Never
Answer: B. Only when directed by an emergency official

240. 
True or False
Driving in bare feet is illegal in Saskatchewan.
Answer: False 
(It’s legal but not recommended.)



241. 
Multiple Choice
What is the minimum age to obtain a Class 7 learner’s licence in Saskatchewan?
A. 14
B. 15
C. 16
D. 17
Answer: B. 15

242. 
True or False
A supervising driver must have at least two years of driving experience.
Answer: True

243.
 Multiple Choice
What does a red “X” above a lane mean?
A. Lane is open
B. Lane is closed to traffic in your direction
C. You must slow down
D. No parking in the lane
Answer: B. Lane is closed to traffic in your direction

244.
 True or False
Learners may drive between midnight and 5 a.m. without restrictions.
Answer: False

245.
 Multiple Choice
If you are caught driving without insurance, you may face:
A. Only a warning
B. A fine and vehicle impoundment
C. Free towing service
D. License upgrade
Answer: B. A fine and vehicle impoundment

246. 
True or False
Vehicles must stop for pedestrians even if they are crossing against the light.
Answer: True 
(Safety first.)

247. 
Multiple Choice
What should you do if your brakes get wet after driving through water?
A. Drive at high speed to dry them
B. Pump the brakes gently to restore function
C. Stop for one hour before driving again
D. Apply parking brake only
Answer: B. Pump the brakes gently to restore function

248.
 True or False
Wearing a seatbelt is optional for passengers over 18.
Answer: False

249.
 Multiple Choice
If you see a flashing blue light on a snowplow, you should:
A. Pass quickly
B. Slow down and keep a safe distance
C. Honk to alert the driver
D. Stop immediately
Answer: B. Slow down and keep a safe distance

250. 
True or False
It’s safe to use cruise control on icy roads.
Answer: False



251. 
Multiple Choice
At uncontrolled intersections, who must yield?
A. The vehicle on the left
B. The vehicle on the right
C. The faster vehicle
D. Larger vehicles
Answer: A. The vehicle on the left must yield to the right

252. 
True or False
Using fog lights in clear weather is illegal.
Answer: True

253.
 Multiple Choice
What is the legal limit for tinted front windows in Saskatchewan?
A. No tint allowed
B. 30%
C. 50%
D. Fully tinted allowed
Answer: A. No tint allowed

254.
 True or False
Motorcyclists must follow the same traffic laws as other drivers.
Answer: True

255.
 Multiple Choice
If you feel drowsy while driving, you should:
A. Open a window
B. Turn up the radio
C. Pull over and rest
D. Eat candy
Answer: C. Pull over and rest

256. 
True or False
In Saskatchewan, seatbelt fines apply to both the driver and passengers.
Answer: True

257. 
Multiple Choice
What is the main purpose of a “slow-moving vehicle” sign?
A. Indicates vehicles traveling 40 km/h or less
B. Indicates learner drivers
C. Warns of upcoming stops
D. Marks a farm vehicle only
Answer: A. Indicates vehicles traveling 40 km/h or less

258.
 True or False
You can park 3 metres from a fire hydrant.
Answer: False 
(Minimum is 5 metres.)

259.
 Multiple Choice
When should you check tire pressure?
A. After driving for 10 km
B. When tires are cold
C. During hot weather only
D. Only before long trips
Answer: B. When tires are cold

260. 
True or False
Hydroplaning risk increases at speeds over 60 km/h.
Answer: True



261.
 Multiple Choice
What is the safest way to enter a freeway?
A. Stop at the ramp and wait for a gap
B. Accelerate in the merging lane to match traffic speed
C. Drive slowly until someone lets you in
D. Signal after you merge
Answer: B. Accelerate in the merging lane to match traffic speed

262. 
True or False
Learners can drive on rural gravel roads.
Answer: True

263.
 Multiple Choice
When driving downhill, you should:
A. Shift to a lower gear to control speed
B. Coast in neutral to save fuel
C. Brake continuously
D. Accelerate to reduce travel time
Answer: A. Shift to a lower gear to control speed

264.
 True or False
You may park on a bridge if there is no sign prohibiting it.
Answer: False

265. 
Multiple Choice
When a traffic signal is not working, you should:
A. Proceed as if it’s a green light
B. Treat it as a four-way stop
C. Wait until police arrive
D. Ignore and keep moving
Answer: B. Treat it as a four-way stop

266.
 True or False
It is safe to cross train tracks immediately after a train passes.
Answer: False 
(Another train may be approaching.)

267.
 Multiple Choice
What should you do when an emergency vehicle approaches from behind?
A. Slow down but stay in your lane
B. Pull over to the right and stop
C. Speed up to get out of the way
D. Continue normally if in a different lane
Answer: B. Pull over to the right and stop

268. 
True or False
Double parking is legal if you stay in the vehicle.
Answer: False

269.
 Multiple Choice
When passing a cyclist, you must leave at least:
A. 0.5 metres
B. 1 metre
C. 1.5 metres
D. 2 metres
Answer: C. 1.5 metres

270.
 True or False
Headlights must be used from 30 minutes after sunset until 30 minutes before sunrise.
Answer: True



271. 
Multiple Choice
What should you do if you skid on ice?
A. Brake hard
B. Steer in the direction you want the front of the car to go
C. Steer opposite to the skid
D. Shift into park
Answer: B. Steer in the direction you want the front of the car to go

272.
 True or False
A flashing amber light means stop completely.
Answer: False 
(It means proceed with caution.)

273. 
Multiple Choice
What is the safest following distance behind large trucks?
A. Close enough to see their mirrors
B. Far enough to see the road ahead of them
C. Within 1 car length
D. At least 10 metres
Answer: B. Far enough to see the road ahead of them

274. 
True or False
Learners may carry any number of passengers if seatbelts are available.
Answer: True

275. 
Multiple Choice
When entering a roundabout, you should:
A. Yield to vehicles already inside
B. Enter quickly without stopping
C. Always stop before entering
D. Honk before merging
Answer: A. Yield to vehicles already inside

276.
 True or False
School zones apply only on school days.
Answer: True
(Unless signs indicate otherwise.)

277. 
Multiple Choice
When must you dim high beams?
A. Within 200 metres of an oncoming vehicle
B. Within 60 metres of following another vehicle
C. In fog or heavy rain
D. All of the above
Answer: D. All of the above

278. 
True or False
You may overtake in a no-passing zone if the road ahead is clear.
Answer: False

279. 
Multiple Choice
What does a yield sign mean?
A. Stop completely before proceeding
B. Slow down and give the right of way
C. Merge without slowing
D. Turn only
Answer: B. Slow down and give the right of way

280. 
True or False
Crossing a solid white line between lanes is always illegal.
Answer: False 
(It’s discouraged but not always illegal.)


281. 
Multiple Choice
What should you do when driving in heavy rain?
A. Use high beams
B. Slow down and increase following distance
C. Drive at the posted limit
D. Use cruise control
Answer: B. Slow down and increase following distance

282.
 True or False
Backing out of a driveway requires you to yield to pedestrians and traffic.
Answer: True

283. 
Multiple Choice
When is passing on the right allowed?
A. On a one-way street with two or more lanes
B. On highways with multiple lanes in each direction
C. When the vehicle ahead is turning left
D. All of the above
Answer: D. All of the above

284. 
True or False
Motorcycles can share a lane with another vehicle.
Answer: False

285.
 Multiple Choice
What should you do if your car starts to overheat?
A. Turn on the heater
B. Turn off the air conditioning
C. Pull over safely and check coolant levels
D. All of the above
Answer: D. All of the above

286. 
True or False
Reversing into a main road from a side street is permitted if no traffic is coming.
Answer:False

287.
 Multiple Choice
Which vehicles must stop at railway crossings, even if no train is coming?
A. Buses
B. Vehicles carrying hazardous goods
C. School buses
D. All of the above
Answer: D. All of the above

288. 
True or False
Cyclists must follow the same road rules as vehicles.
Answer: True

289. 
Multiple Choice
What is the minimum following distance on icy roads?
A. 2 seconds
B. 4 seconds
C. 6 seconds
D. 8 seconds
Answer: C. 6 seconds

290. 
True or False
All intersections have stop signs.
Answer: False


291.
 Multiple Choice
If your vehicle begins to fishtail, you should:
A. Brake sharply
B. Steer gently in the same direction as the skid
C. Turn opposite the skid
D. Accelerate
Answer: B. Steer gently in the same direction as the skid

292. 
True or False
Flashing red lights at an intersection mean treat it as a stop sign.
Answer: True

293.
 Multiple Choice
When must headlights be dimmed in urban areas?
A. Always
B. When within 200 metres of another vehicle
C. When there’s street lighting
D. Never
Answer: B. When within 200 metres of another vehicle

294.
 True or False
Learners must always display an “L” sign when driving.
Answer: True

295.
 Multiple Choice
What does a yellow traffic light mean?
A. Stop if safe to do so
B. Speed up to clear the intersection
C. Proceed without slowing
D. Stop only if turning
Answer: A. Stop if safe to do so

296.
 True or False
A U-turn is legal anywhere if no traffic is coming.
Answer: False

297.
 Multiple Choice
What does a flashing green arrow mean?
A. You may turn in the arrow’s direction
B. Stop before turning
C. Yield before turning
D. No turns allowed
Answer: A. You may turn in the arrow’s direction

298. 
True or False
You must stop at all yield signs.
Answer: False

299. 
Multiple Choice
When driving in winter, what is most important?
A. Keeping your gas tank at least half full
B. Using cruise control on icy roads
C. Accelerating quickly to avoid getting stuck
D. Driving with interior heat on high
Answer: A. Keeping your gas tank atleast half full

300. 
True or False
It’s illegal to overtake a snowplow in Saskatchewan.
Answer: False 
(Not illegal, but unsafe if visibility is poor.)

301.
 Multiple Choice
When exiting a freeway, you should:
A. Signal and move into the exit lane early
B. Slow down on the main lanes before exiting
C. Stop completely at the ramp
D. Change lanes suddenly at the exit
Answer: A. Signal and move into the exit lane early

302.
 True or False
It is legal to text at a red light.
Answer: False

303. 
Multiple Choice
When parallel parking, the gap between your car and the curb should be:
A. 15 cm or less
B. 30 cm
C. 50 cm
D. Any distance is fine
Answer: A. 15 cm or less

304.
 True or False
A solid yellow line means no passing in either direction.
Answer: True

305.
 Multiple Choice
When must you dim high beams for oncoming vehicles?
A. 50 metres away
B. 150 metres away
C. 300 metres away
D. 500 metres away
Answer: B. 150 metres away

306. 
True or False
Learners must carry their licence at all times while driving.
Answer: True

307.
 Multiple Choice
What should you do if you see a “lane ends” sign ahead?
A. Accelerate to pass all cars
B. Merge safely into the open lane
C. Drive in the shoulder lane
D. Stop until traffic clears
Answer: B. Merge safely into the open lane

308. 
True or False
Cyclists can ride side-by-side on all roads.
Answer: False

309.
 Multiple Choice
What’s the safest action when your vehicle hydroplanes?
A. Steer gently and ease off the gas
B. Brake firmly
C. Turn sharply to regain grip
D. Shift into low gear immediately
Answer: A. Steer gently and ease off the gas

310.
 True or False
It’s legal to park in front of a private driveway if no one complains.
Answer: False



311. 
Multiple Choice
The main purpose of ABS brakes is:
A. To shorten stopping distance on ice
B. To prevent wheels from locking during braking
C. To stop automatically at red lights
D. To improve fuel economy
Answer: B. To prevent wheels from locking during braking

312. 
True or False
Learners may tow a trailer if supervised.
Answer: True

313. 
Multiple Choice
If your vehicle starts to spin, you should:
A. Hit the brakes hard
B. Look and steer where you want to go
C. Accelerate
D. Turn opposite the spin immediately
Answer: B. Look and steer where you want to go

314.
 True or False
White painted curbs indicate no parking zones.
Answer: False
(They usually indicate passenger loading.)

315.
 Multiple Choice
When approaching a school bus with flashing red lights, you must:
A. Slow but keep moving
B. Stop at least 5 metres away
C. Honk to alert the driver
D. Pass quickly on the left
Answer: B. Stop at least 5 metres away

316. 
True or False
High-beam headlights should not be used in fog.
Answer: True

317. 
Multiple Choice
A driver at an uncontrolled intersection must yield to:
A. Vehicles on the left
B. Vehicles on the right
C. Faster vehicles
D. Larger vehicles
Answer: B. Vehicles on the right

318. 
True or False
Reversing is not allowed on a controlled-access highway.
Answer: True

319.
 Multiple Choice
When must you use turn signals?
A. Only in heavy traffic
B. For all turns and lane changes
C. Only when other drivers are nearby
D. Only at night
Answer: B. For all turns and lane changes

320.
 True or False
All railway crossings have gates.
Answer: False



321.
 Multiple Choice
The best way to avoid fatigue is to:
A. Drink coffee constantly
B. Take regular breaks every two hours
C. Keep windows open
D. Play loud music
Answer: B. Take regular breaks every two hours

322. 
True or False
You can be fined for not clearing snow off your vehicle before driving.
Answer: True

323.
 Multiple Choice
When following a fire truck in an emergency, you must keep back at least:
A. 10 metres
B. 30 metres
C. 60 metres
D. 100 metres
Answer: C. 60 metres

324. 
True or False
U-turns are allowed at intersections with green lights unless prohibited by signs.
Answer: True

325.
 Multiple Choice
When your car begins to slide sideways, you should:
A. Brake sharply
B. Ease off the accelerator and steer gently into the slide
C. Shift into park
D. Turn opposite the slide immediately
Answer: B. Ease off the accelerator and steer gently into the slide

326. 
True or False
In Saskatchewan, studded tires can be used all year.
Answer: False

327. 
Multiple Choice
The hand signal for slowing down is:
A. Left arm straight out
B. Left arm bent upward
C. Left arm bent downward
D. Right arm out
Answer: C. Left arm bent downward

328. 
True or False
It’s okay to remove your seatbelt when driving at low speeds in a parking lot.
Answer: False

329.
 Multiple Choice
When driving at night in rural areas, watch out for:
A. Wildlife crossing
B. Pedestrians
C. Unlit farm equipment
D. All of the above
Answer: D. All of the above

330. 
True or False
You must turn on headlights during heavy rain.
Answer: True


331. 
Multiple Choice
When must you stop for a pedestrian at a crosswalk?
A. Only when traffic lights are green
B. Whenever they are in the crosswalk
C. Only if they wave
D. If they are in the opposite lane
Answer: B. Whenever they are in the crosswalk

332.
 True or False
Brake lights must be red.
Answer: True

333.
 Multiple Choice
What’s the safest way to handle a tire blowout?
A. Brake immediately
B. Hold the steering wheel firmly, ease off the gas, and steer to a safe spot
C. Accelerate
D. Turn sharply
Answer: B. Hold the steering wheel firmly, ease off the gas, and steer to a safe spot

334. 
True or False
Backing into traffic lanes is always prohibited.
Answer: True

335.
 Multiple Choice
When driving in fog, you should:
A. Use high beams
B. Use low beams
C. Use hazard lights only
D. Drive with parking lights
Answer: B. Use low beams

336. 
True or False
All intersections in Saskatchewan have traffic signals.
Answer: False

337.
 Multiple Choice
If your view is blocked at an intersection, you should:
A. Proceed slowly until you can see
B. Honk and move forward
C. Flash high beams
D. Stop in the middle of the intersection
Answer: A. Proceed slowly until you can see

338.
 True or False
Learners can drive in another province with their Saskatchewan permit.
Answer: True
(But must follow local laws.)

339. 
Multiple Choice
Before making a lane change, you should:
A. Signal, mirror check, and shoulder check
B. Signal only
C. Honk and move
D. Look forward only
Answer: A. Signal, mirror check, and shoulder check

340.
 True or False
Drivers must yield to buses leaving a stop in urban areas.
Answer: True



341.
 Multiple Choice
What is the penalty for failing to stop for a school bus with flashing lights?
A. Warning only
B. Large fine and demerit points
C. One-day licence suspension
D. Community service
Answer: B. Large fine and demerit points

342.
 True or False
Snow chains can be used in Saskatchewan in winter.
Answer: True

343.
 Multiple Choice
When merging from an on-ramp, you should:
A. Stop at the end of the ramp
B. Match your speed to traffic and merge smoothly
C. Merge at any speed
D. Use high beams to get noticed
Answer: B. Match your speed to traffic and merge smoothly

344.
 True or False
It’s safe to drive with one headlight out.
Answer: False

345. 
Multiple Choice
When passing another vehicle, you must return to your lane:
A. Immediately after passing
B. When you can see the vehicle’s headlights in your rear-view mirror
C. After counting to three
D. Only after the driver signals you back
Answer: B. When you can see the vehicle’s headlights in your rear-view mirror

346. 
True or False
It is legal to drive without shoes in Saskatchewan.
Answer: True

347. 
Multiple Choice
The best way to prevent skids on icy roads is to:
A. Brake hard
B. Drive at a steady speed and avoid sudden movements
C. Use cruise control
D. Pump the accelerator
Answer: B. Drive at a steady speed and avoid sudden movements

348.
 True or False
Driving with headphones covering both ears is illegal.
Answer: True

349.
 Multiple Choice
What does a flashing red light mean?
A. Slow down and proceed
B. Stop, then proceed when safe
C. Yield
D. Go if no one is coming
Answer: B. Stop, then proceed when safe

350.
 True or False
A learner’s licence is valid for five years in Saskatchewan.
Answer: True



351.
 Multiple Choice
Which mirror has the widest view?
A. Rear-view mirror
B. Side mirrors
C. Convex mirrors
D. Blind-spot mirrors
Answer: C. Convex mirrors

352. 
True or False
Animals are more active near roads at dawn and dusk.
Answer: True

353.
 Multiple Choice
What should you do if your brakes fail?
A. Downshift and use the parking brake gradually
B. Pump the brakes quickly
C. Swerve to stop
D. Turn off ignition immediately
Answer: A. Downshift and use the parking brake gradually

354. 
True or False
On gravel roads, stopping distances are longer than on pavement.
Answer: True

355. 
Multiple Choice
What’s the first thing you should do before starting your vehicle?
A. Turn on lights
B. Check mirrors and seat position
C. Release the parking brake
D. Sound the horn
Answer: B. Check mirrors and seat position

356. 
True or False
Motorcycles can stop faster than most cars.
Answer: True

357.
 Multiple Choice
In Saskatchewan, the default speed limit in urban areas is:
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h

358. 
True or False
Children under 40 lb must be in a forward-facing car seat.
Answer: False 
(They must be rear-facing until they meet weight/height requirements.)

359.
 Multiple Choice
If a tire blows out, avoid:
A. Steering firmly
B. Easing off the accelerator
C. Slamming on the brakes
D. Letting the vehicle slow gradually
Answer: C. Slamming on the brakes

360.
 True or False
School buses in Saskatchewan are yellow for visibility.
Answer: True



361. 
Multiple Choice
When parking downhill without a curb, turn wheels:
A. Toward the road
B. Toward the shoulder
C. Straight ahead
D. It doesn’t matter
Answer: B. Toward the shoulder

362.
 True or False
Learners can drive at night if supervised.
Answer: True

363. 
Multiple Choice
What should you do when approaching a green light that has been green for a while?
A. Speed up to beat the red
B. Prepare to stop if it changes
C. Maintain speed without caution
D. Slow to 10 km/h
Answer: B. Prepare to stop if it changes

364.
 True or False
Bicycles are allowed on sidewalks in Saskatchewan.
Answer: False
(Except where permitted by signs.)

365. 
Multiple Choice
What’s the safest way to handle a curve?
A. Brake in the middle of the curve
B. Slow before entering and accelerate gently out
C. Accelerate into the curve
D. Coast through without touching the wheel
Answer: B. Slow before entering and accelerate gently out

366. 
True or False
You must stop for a stopped bus with flashing red lights even on the opposite side of a divided highway.
Answer: False

367. 
Multiple Choice
How should you cross railway tracks in winter?
A. Quickly and at an angle
B. Slowly and straight on
C. Stop on the tracks before proceeding
D. Accelerate hard over the rails
Answer: B. Slowly and straight on

368.
 True or False
The driver is responsible for ensuring all passengers wear seat belts.
Answer: True

369. 
Multiple Choice
When must you turn on hazard lights?
A. When parked illegally
B. When your vehicle is disabled or warning other drivers
C. Only at night
D. Only in snowstorms
Answer: B. When your vehicle is disabled or warning other drivers

370. 
True or False
Idling for more than three minutes is discouraged for environmental reasons.
Answer: True



371. 
Multiple Choice
When approaching an emergency scene, you must:
A. Slow down, move over if safe, and follow instructions
B. Stop immediately
C. Pass quickly
D. Ignore unless blocked
Answer: A. Slow down, move over if safe, and follow instructions

372.
 True or False
You may drive barefoot in Saskatchewan.
Answer: True

373.
 Multiple Choice
What’s the purpose of rumble strips?
A. Increase speed
B. Alert drivers through vibration and noise
C. Reduce fuel use
D. Smooth the road surface
Answer: B. Alert drivers through vibration and noise

374. 
True or False
Vehicles must yield to pedestrians in unmarked crosswalks.
Answer: True

375. 
Multiple Choice
What’s the minimum age to supervise a learner driver?
A. 18
B. 19
C. 21
D. 25
Answer: C. 21

376.
 True or False
Passing a vehicle stopped for pedestrians is illegal.
Answer: True

377.
 Multiple Choice
When stopping on a highway shoulder, you should:
A. Park as far to the right as possible
B. Leave your vehicle partly in the lane
C. Keep your hazard lights off
D. Stop in the middle of the road
Answer: A. Park as far to the right as possible

378. 
True or False
Learners can use hands-free devices while driving.
Answer: False

379. 
Multiple Choice
When approaching a blind curve, you should:
A. Honk
B. Reduce speed and stay right
C. Move into the centre
D. Accelerate quickly
Answer: B. Reduce speed and stay right

380.
 True or False
Parking within 3 metres of a crosswalk is prohibited.
Answer: True



381. 
Multiple Choice
What is black ice?
A. Oil on the road
B. Thin ice that’s hard to see
C. Ice covered in dirt
D. A term for frozen tar
Answer: B. Thin ice that’s hard to see

382. 
True or False
Flashing amber lights on a school bus mean prepare to stop.
Answer: True

383.
 Multiple Choice
What’s the safest way to avoid wildlife collisions?
A. Drive at night without headlights
B. Scan roadsides and reduce speed in marked zones
C. Honk constantly
D. Drive in the centre lane
Answer: B. Scan roadsides and reduce speed in marked zones

384.
 True or False
When merging, you must yield to traffic already on the highway.
Answer: True

385.
 Multiple Choice
When is it safe to pass near a railway crossing?
A. Within 10 metres
B. Within 30 metres
C. More than 30 metres away
D. Anytime
Answer: C. More than 30 metres away

386. 
True or False
Drivers must carry proof of insurance.
Answer: True

387.
 Multiple Choice
What should you do in a construction zone?
A. Maintain the posted speed limit or less
B. Ignore workers’ signals
C. Drive through quickly
D. Overtake other vehicles
Answer: A. Maintain the posted speed limit or less

388. 
True or False
Learners can drive on ice-covered lakes if supervised.
Answer: True



389. 
Multiple Choice
When your headlights fail at night, you should:
A. Turn on hazard lights and pull over safely
B. Keep driving slowly
C. Use high beams only
D. Accelerate to reach a brighter area
Answer: A. Turn on hazard lights and pull over safely

390. 
True or False
You should avoid using cruise control on wet or icy roads.
Answer: True

391.
 Multiple Choice
When approaching an intersection with no signs or signals, you must yield to:
A. The vehicle on your left
B. The vehicle on your right
C. The larger vehicle
D. The faster vehicle
Answer: B. The vehicle on your right

392. 
True or False
Driving too slowly can be as dangerous as speeding.
Answer: True

393.
 Multiple Choice
When entering a highway from a gravel road, you should:
A. Accelerate hard without checking traffic
B. Stop, check for traffic, and enter when safe
C. Roll through without stopping
D. Honk before entering
Answer: B. Stop, check for traffic, and enter when safe

394. 
True or False
You must always stop before entering a road from a driveway.
Answer: True

395. 
Multiple Choice
When driving through a residential area, you should:
A. Expect children and pets to appear suddenly
B. Ignore parked cars
C. Speed up to pass bicycles
D. Drive with high beams on
Answer: A. Expect children and pets to appear suddenly

396.
 True or False
It’s illegal to cross a solid white line between lanes.
Answer: False
(Though it is discouraged unless necessary.)

397. 
Multiple Choice
When driving down a steep hill, you should:
A. Coast in neutral
B. Use a lower gear to control speed
C. Brake continuously
D. Turn off the engine
Answer: B. Use a lower gear to control speed

398. 
True or False
Motorcycles are harder to see in traffic than cars.
Answer: True

399. 
Multiple Choice
The best way to deal with aggressive drivers is to:
A. Challenge them
B. Avoid eye contact and give them space
C. Brake suddenly in front of them
D. Block their lane
Answer: B. Avoid eye contact and give them space

400.
 True or False
You must stop for pedestrians only at marked crosswalks.
Answer: False
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Saskatchewan ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Saskatchewan .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $saskatchewan->id,
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



