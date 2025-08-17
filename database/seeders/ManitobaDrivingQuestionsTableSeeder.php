<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManitobaDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $manitoba = DrivingSection::firstOrCreate(
            ['title' => 'Manitoba'],
            [
                'type' => 'province',
                'capital' => 'Winnipeg',
                'flag' => '/images/flags/manitoba.png',
                'description' => 'Manitoba Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_sharing_road.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $manitoba->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1.
 Multiple Choice
When approaching a 4-way stop in Manitoba, you should:
A. Proceed without stopping if no cars are visible
B. Stop and yield to the first vehicle that arrived
C. Stop only if traffic is present
D. Accelerate to avoid blocking others
Answer: B. Stop and yield to the first vehicle that arrived



2. 
True or False
In Manitoba, a driver in the learner stage must always have a supervising driver beside them.
Answer: True



3. 
Multiple Choice
The maximum blood alcohol concentration allowed for learner drivers in Manitoba is:
A. 0.05%
B. 0.02%
C. 0.00%
D. 0.08%
Answer: C. 0.00%



4. 
True or False
You may use a mobile phone in hands-free mode while driving as a learner in Manitoba.
Answer: False 
( No phone use at all is permitted for learners.)



5. 
Multiple Choice
When merging onto a highway, you should:
A. Match the speed of traffic and merge safely
B. Stop at the end of the ramp
C. Merge at a slow speed
D. Use hazard lights to warn other drivers
Answer: A. Match the speed of traffic and merge safely



6.
 True or False
Learner drivers in Manitoba can drive alone during daylight hours.
Answer: False



7. 
Multiple Choice
When a school bus has red lights flashing, you must:
A. Pass carefully if no children are visible
B. Stop at least 5 metres away and wait until the lights stop
C. Honk to warn children
D. Slow down and proceed
Answer: B. Stop at least 5 metres away and wait until the lights stop



8. 
True or False
The speed limit in school zones is always 30 km/h unless otherwise posted.
Answer: True



9.
 Multiple Choice
If you encounter an aggressive driver, you should:
A. Avoid eye contact and give them space
B. Confront them to defend yourself
C. Brake suddenly
D. Speed up to escape
Answer: A. Avoid eye contact and give them space



10. 
True or False
In Manitoba, seat belts are only required on highways.
Answer: False
(Seat belts are required at all times.)



11.
 Multiple Choice
The legal minimum following distance under ideal conditions is:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: B. 2 seconds



12. 
True or False
Learners can drive on gravel roads in Manitoba.
Answer: True 
(if supervised.)

13. 
Multiple Choice
Before changing lanes, you must:
A. Signal, check mirrors, and check your blind spot
B. Signal only if other cars are near
C. Change lanes first, then signal
D. Speed up to merge quickly without signaling
Answer: A. Signal, check mirrors, and check your blind spot



14.
 True or False
Flashing green traffic lights in Manitoba mean pedestrians may cross at will.
Answer: False
(A flashing green means you have the right of way to turn left when safe.)



15. 
Multiple Choice
If your brakes fail while driving, you should:
A. Pump the brake pedal and use the parking brake gradually
B. Turn off the ignition immediately
C. Honk continuously
D. Shift into neutral and wait to stop
Answer: A. Pump the brake pedal and use the parking brake gradually



16. 
True or False
The supervising driver for a learner must hold a full Class 5 licence for at least 3 years.
Answer: True



17. 
Multiple Choice
If your vehicle is stuck in snow, you should:
A. Rock the vehicle gently forward and backward to gain traction
B. Accelerate hard to break free
C. Spin wheels continuously
D. Wait for a tow without trying
Answer: A. Rock the vehicle gently forward and backward to gain traction



18.
 True or False
In Manitoba, you must signal for at least 30 metres before turning in urban areas.
Answer: True



19.
 Multiple Choice
If you see an emergency vehicle with lights flashing, you must:
A. Stop immediately in your lane
B. Pull over to the nearest curb and stop
C. Speed up to clear the way faster
D. Ignore if it’s in the opposite lane
Answer: B. Pull over to the nearest curb and stop



20. 
True or False
Learner drivers are prohibited from towing trailers.
Answer: True



21. 
Multiple Choice
When parallel parking, you should:
A. Park within 30 cm of the curb
B. Leave 1 metre from the curb
C. Park with wheels turned sharply into the curb
D. Park at an angle to the curb
Answer: A. Park within 30 cm of the curb

22.
 True or False
When reversing, you must look over your shoulder and use mirrors.
Answer: True

23.
 Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Honk and pass
B. Stop and yield the right of way
C. Pass slowly without stopping
D. Drive normally if they’re not on the road
Answer: B. Stop and yield the right of way

24. 
True or False
Bicycles are considered vehicles under Manitoba law.
Answer: True

25. 
Multiple Choice
In a construction zone, you must:
A. Slow to the posted limit, even if workers aren’t present
B. Maintain your usual speed if the road is clear
C. Honk to warn workers
D. Pass other vehicles to clear the area quickly
Answer: A. Slow to the posted limit, even if workers aren’t present

26. 
True or False
A flashing red light means the same as a stop sign.
Answer: True

27.
 Multiple Choice
If your car hydroplanes, you should:
A. Ease off the gas and steer straight
B. Brake hard immediately
C. Steer sharply left or right
D. Accelerate to regain control
Answer: A. Ease off the gas and steer straight

28. 
True or False
Learners may not drive between midnight and 5 a.m. without an exempted reason.
Answer: True

29.
 Multiple Choice
When crossing a narrow bridge, you should:
A. Yield to oncoming vehicles if there’s not enough space
B. Speed through before others arrive
C. Drive in the middle regardless of traffic
D. Honk until across
Answer: A. Yield to oncoming vehicles if there’s not enough space

30.
 True or False
All passengers in a vehicle must wear seat belts where provided.
Answer: True

31.
 Multiple Choice
If your car starts to skid, you should:
A. Steer in the direction you want to go
B. Steer against the skid
C. Brake heavily
D. Put the car in neutral immediately
Answer: A. Steer in the direction you want to go

32. 
True or False
Learners are allowed to cross international borders while driving.
Answer: False

33. 
Multiple Choice
When entering a roundabout, you must:
A. Yield to traffic already in the circle
B. Enter without slowing down
C. Stop at all times before entering
D. Drive in the opposite direction if faster
Answer: A. Yield to traffic already in the circle

34.
 True or False
Cyclists may ride two abreast unless prohibited by signage.
Answer: True

35. 
Multiple Choice
If your tire blows out, you should:
A. Hold the steering wheel firmly and slow gradually
B. Brake hard immediately
C. Turn quickly to the side of the road
D. Accelerate to stabilize the vehicle
Answer: A. Hold the steering wheel firmly and slow gradually

36.
 True or False
A yellow diamond-shaped sign warns of hazards ahead.
Answer: True

37. 
Multiple Choice
You must dim your high beams when approaching another vehicle within:
A. 150 metres
B. 250 metres
C. 120 metres
D. 300 metres
Answer: A. 150 metres

38.
 True or False
You can use your horn to express frustration at another driver.
Answer: False 
(Horn use is for safety warnings only.)

39.
 Multiple Choice
When parking uphill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the road
C. Leave wheels straight
D. Point wheels downhill
Answer: A. Turn wheels toward the edge of the road

40. 
True or False
Learners can carry as many passengers as there are seat belts.
Answer: True

41.
 Multiple Choice
If an animal runs in front of your vehicle, you should:
A. Brake firmly and steer to avoid only if safe
B. Swerve sharply regardless of traffic
C. Accelerate to avoid collision
D. Close your eyes and hope for the best
Answer: A. Brake firmly and steer to avoid only if safe

42.
 True or False
Learners may drive on the highway without supervision if they are confident.
Answer: False

43.
 Multiple Choice
Before entering an intersection on a green light, you should:
A. Check left, right, and ahead for hazards
B. Proceed immediately
C. Honk before entering
D. Only check ahead
Answer: A. Check left, right, and ahead for hazards

44. 
True or False
It is legal to exceed the speed limit when overtaking another vehicle.
Answer: False

45.
 Multiple Choice
When approaching a stopped emergency vehicle with lights flashing, you must:
A. Slow down and move over to another lane if safe
B. Stop in your lane
C. Honk and pass
D. Ignore it if you’re in the opposite lane
Answer: A. Slow down and move over to another lane if safe

46. 
True or False
Drivers must yield to buses merging from a bus bay when signals are on.
Answer: True

47. 
Multiple Choice
If your brakes fail, you should:
A. Pump the brake pedal and use the parking brake gradually
B. Turn off the ignition
C. Accelerate
D. Honk and hope other drivers move
Answer: A. Pump the brake pedal and use the parking brake gradually

48. 
True or False
Learners may tow a trailer if accompanied by a supervising driver.
Answer: False

49. 
Multiple Choice
If another driver is tailgating you, you should:
A. Increase your following distance from the vehicle ahead
B. Brake suddenly
C. Speed up
D. Drive erratically to warn them
Answer: A. Increase your following distance from the vehicle ahead

50. 
True or False
Backing up on a freeway is legal if you miss your exit.
Answer: False
(Road Rules Q51 to Q120)

51. 
Multiple Choice
When approaching a railway crossing with flashing red lights, you must:
A. Stop at least 5 metres from the tracks
B. Slow and proceed with caution
C. Cross quickly before the train arrives
D. Stop only if the gates are down
Answer: A. Stop at least 5 metres from the tracks

52. 
True or False
Learner drivers must always have a supervising driver in the front passenger seat.
Answer: True

53. 
Multiple Choice
The “two-second rule” is used to:
A. Judge safe following distance in good conditions
B. Time traffic lights
C. Measure stopping distance in snow
D. Determine reaction time
Answer: A. Judge safe following distance in good conditions

54. 
True or False
On icy roads, you should brake firmly to stop quickly.
Answer: False 
(Brake gently to avoid skidding.)

55. 
Multiple Choice
If you are involved in a collision, you must:
A. Stop, exchange information, and assist injured persons
B. Leave immediately if no one is injured
C. Move your vehicle without checking safety
D. Call police only if damage is over $10,000
Answer: A. Stop, exchange information, and assist injured persons

56. 
True or False
Turning right on a red light is allowed everywhere in Manitoba.
Answer: False 
(Prohibited where posted.)

57. 
Multiple Choice
When parking downhill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight
D. Downhill, away from the curb
Answer: A. Toward the curb

58.
 True or False
You must yield to pedestrians at both marked and unmarked crosswalks.
Answer: True

59.
 Multiple Choice
What is the legal blood alcohol concentration (BAC) limit for learner drivers?
A. 0.08%
B. 0.05%
C. Zero tolerance
D. 0.02%
Answer: C. Zero tolerance

60. 
True or False
It is safe to drive with one hand while adjusting the radio.
Answer: False

61.
 Multiple Choice
If you’re tired while driving, you should:
A. Pull over safely and rest
B. Drink coffee while driving
C. Open windows and continue
D. Increase music volume
Answer: A. Pull over safely and rest

62. 
True or False
School buses in Manitoba have flashing red lights and a stop arm when loading/unloading.
Answer: True

63. 
Multiple Choice
If traffic lights are out, treat the intersection as:
A. A four-way stop
B. A yield
C. A green light
D. A pedestrian crossing only
Answer: A. A four-way stop

64. 
True or False
Headlights must be on from half an hour after sunset to half an hour before sunrise.
Answer: True

65. 
Multiple Choice
When merging onto a freeway, you should:
A. Match the speed of traffic in the right lane
B. Stop at the end of the ramp
C. Merge at any speed
D. Signal only after merging
Answer: A. Match the speed of traffic in the right lane

66.
 True or False
U-turns are allowed anywhere if traffic is clear.
Answer: False
(They are prohibited in many locations.)

67.
 Multiple Choice
When driving in heavy fog, you should:
A. Use low beam headlights
B. Use high beam headlights
C. Drive at the speed limit
D. Rely on your hazard lights only
Answer: A. Use low beam headlights

68.
 True or False
Passing is allowed over a solid yellow line if safe.
Answer: False

69. 
Multiple Choice
If your vehicle starts to skid on ice, you should:
A. Steer gently in the direction you want to go
B. Brake hard immediately
C. Accelerate to straighten out
D. Steer sharply opposite the skid
Answer: A. Steer gently in the direction you want to go

70. 
True or False
In Manitoba, you must carry your driver’s licence at all times while driving.
Answer: True

71. 
Multiple Choice
When stopped at a railway crossing with gates down, you must remain stopped until:
A. The gates are fully raised and lights stop flashing
B. The train passes
C. The crossing is clear of vehicles
D. A flag person waves you through
Answer: A. The gates are fully raised and lights stop flashing

72. 
True or False
You can exceed the speed limit when passing a cyclist.
Answer: False

73.
 Multiple Choice
Hydroplaning is more likely to occur:
A. At high speeds on wet roads
B. On dry gravel roads
C. During snowfall
D. On warm sunny days
Answer: A. At high speeds on wet roads

74.
 True or False
Manitoba law requires you to slow down in school zones during posted hours.
Answer: True

75. 
Multiple Choice
When approaching an intersection with a yield sign, you must:
A. Slow and be ready to stop for traffic
B. Stop regardless of traffic
C. Accelerate to merge
D. Signal and proceed without looking
Answer: A. Slow and be ready to stop for traffic

76.
 True or False
Flashing green lights mean proceed with caution.
Answer: False 
(In Manitoba, they mean pedestrian-controlled intersection.)

77.
 Multiple Choice
If you miss your freeway exit, you should:
A. Continue to the next exit
B. Back up carefully
C. Stop on the shoulder and reverse
D. Turn across the median
Answer: A. Continue to the next exit

78. 
True or False
It is legal to drive barefoot in Manitoba.
Answer: True
(But not recommended for safety.)

79.
 Multiple Choice
Before driving after a snowstorm, you must:
A. Clear all snow and ice from windows, mirrors, and lights
B. Clear only the windshield
C. Drive slowly without clearing
D. Use wipers to remove snow while driving
Answer: A. Clear all snow and ice from windows, mirrors, and lights

80. 
True or False
Learners can drive with passengers in the back of a pickup truck if seated securely.
Answer: False


81. 
Multiple Choice
If your vehicle begins to skid on ice, you should:
A. Steer gently in the direction you want the front wheels to go
B. Brake hard to stop immediately
C. Turn sharply against the skid
D. Accelerate to regain traction
Answer: A. Steer gently in the direction you want the front wheels to go

82.
 True or False
You must stop for a school bus only when you are behind it.
Answer: False
(You must stop in both directions unless on a divided highway.)

83. 
Multiple Choice
When driving downhill, you can reduce strain on brakes by:
A. Shifting to a lower gear
B. Applying brakes constantly
C. Turning the ignition off
D. Coasting in neutral
Answer: A. Shifting to a lower gear

84. 
True or False
If two vehicles arrive at a stop sign at the same time, the one on the left goes first.
Answer: False
(The vehicle on the right goes first.)

85. 
Multiple Choice
At night, glare from oncoming headlights can be reduced by:
A. Looking slightly to the right edge of the road
B. Closing one eye
C. Looking directly at the lights
D. Using high beams in return
Answer: A. Looking slightly to the right edge of the road

86.
 True or False
Learner drivers can use a mobile phone if it’s hands-free.
Answer: False 
(No electronic device use for learners.)

87.
 Multiple Choice
When parking uphill with a curb, you should:
A. Turn wheels away from the curb
B. Turn wheels toward the curb
C. Leave wheels straight
D. Turn wheels downhill
Answer: A. Turn wheels away from the curb

88. 
True or False
Pedestrians always have the right of way over vehicles.
Answer: False
(Only at crosswalks and intersections.)

89. 
Multiple Choice
Before backing out of a driveway, you should:
A. Check behind and both sides
B. Rely only on mirrors
C. Honk before moving
D. Reverse quickly to minimize time on road
Answer: A. Check behind and both sides

90. 

True or False
Learners can supervise another learner if they have a full licence.
Answer: False

91.
 Multiple Choice
The safest following distance in good weather is:
A. At least two seconds behind the vehicle in front
B. One second
C. Three car lengths
D. Close enough to draft
Answer: A. At least two seconds behind the vehicle in front

92. 
True or False
Vehicles already in a roundabout must yield to incoming vehicles.
Answer: False

93. 
Multiple Choice
When driving in heavy rain, hydroplaning can be reduced by:
A. Slowing down and using proper tire pressure
B. Speeding up to clear water
C. Using cruise control
D. Driving in the middle of your lane without adjustment
Answer: A. Slowing down and using proper tire pressure

94. 
True or False
Cyclists must obey the same traffic laws as motor vehicles.
Answer: True

95.
 Multiple Choice
When approaching a flashing yellow light, you should:
A. Slow and proceed with caution
B. Stop completely
C. Maintain normal speed
D. Honk before entering
Answer: A. Slow and proceed with caution

96.
 True or False
You can park in front of a fire hydrant if you stay in your vehicle.
Answer: False

97.
 Multiple Choice
If a traffic officer directs you to do something illegal under normal rules, you should:
A. Follow the officer’s instructions
B. Ignore the officer
C. Only obey if you agree
D. Continue following normal traffic laws
Answer: A. Follow the officer’s instructions

98.
 True or False
Seat belts are only required for front seat occupants.
Answer: False

99. 
Multiple Choice
To avoid fatigue on long trips, you should:
A. Take regular breaks every two hours
B. Keep windows closed
C. Drive at maximum speed
D. Avoid drinking water
Answer: A. Take regular breaks every two hours

100. 
True or False
In Manitoba, headlights must be on when visibility is reduced to less than 60 metres.
Answer: True

101.
 Multiple Choice
If another driver refuses to dim their high beams, you should:
A. Look toward the right edge of your lane
B. Flash your lights repeatedly
C. Close your eyes briefly
D. Speed past them
Answer: A. Look toward the right edge of your lane

102. 
True or False
You must signal only when other drivers are nearby.
Answer: False 
(Always signal before turning or changing lanes.)

103.
 Multiple Choice
At an uncontrolled intersection, you must:
A. Yield to the vehicle on your right
B. Yield to the vehicle on your left
C. Go first if you are faster
D. Honk before entering
Answer: A. Yield to the vehicle on your right

104. 
True or False
Reversing into an intersection is legal if no traffic is present.
Answer: False

105. 
Multiple Choice
When exiting a freeway, you should:
A. Signal early and move into the exit lane well before the ramp
B. Wait until the last moment to exit
C. Stop before the exit lane
D. Accelerate to exit faster
Answer: A. Signal early and move into the exit lane well before the ramp

106. 
True or False
Motorcycles are harder to see than cars and require extra caution from drivers.
Answer: True

107. 
Multiple Choice
When turning right on a red light, you must:
A. Stop completely and yield to pedestrians and traffic
B. Turn without stopping if clear
C. Only stop if pedestrians are crossing
D. Honk before turning
Answer: A. Stop completely and yield to pedestrians and traffic

108.
 True or False
Learners may drive alone if it is an emergency.
Answer: False

109. 
Multiple Choice
When following a large truck, you should:
A. Stay far enough back to see the truck’s mirrors
B. Follow closely for better drafting
C. Drive directly beside it
D. Use high beams for better visibility
Answer: A. Stay far enough back to see the truck’s mirrors

110. 
True or False
It’s safe to pass a vehicle on a curve if you can see part of the road ahead.
Answer: False

111. 
Multiple Choice
If your car begins to fishtail, you should:
A. Steer gently in the direction of the skid
B. Steer against the skid
C. Brake heavily
D. Accelerate hard
Answer: A. Steer gently in the direction of the skid

112. 
True or False
Learners must carry their licence when driving.
Answer: True

113. 
Multiple Choice
When driving at night on an unlit road, you should:
A. Use high beams unless approaching another vehicle
B. Use low beams at all times
C. Keep hazard lights on
D. Drive with interior lights on
Answer: A. Use high beams unless approaching another vehicle

114. 
True or False
You can pass a stopped school bus if no children are visible.
Answer: False

115. 
Multiple Choice
If two vehicles meet on a steep narrow road, the vehicle going uphill should:
A. Have the right of way
B. Yield to the downhill vehicle
C. Reverse to allow passage
D. Stop until the other passes
Answer: A. Have the right of way

116. 
True or False
Drivers must yield to pedestrians at mid-block crosswalks.
Answer: True

117. 
Multiple Choice
To avoid collisions at intersections, you should:
A. Reduce speed and scan for hazards
B. Increase speed to clear quickly
C. Ignore side traffic if you have green
D. Rely solely on other drivers’ signals
Answer: A. Reduce speed and scan for hazards

118. 
True or False
It is legal to park in a bicycle lane at any time.
Answer: False

119. 
Multiple Choice
When being passed, you should:
A. Keep a steady speed and position
B. Speed up to block the pass
C. Move into the left lane
D. Brake hard
Answer: A. Keep a steady speed and position

120. 
True or False
You must always stop at railway crossings with no gates or lights.
Answer: False
(Stop only if a train is approaching.)

121. 
Multiple Choice
When driving in strong crosswinds, you should:
A. Keep a firm grip on the steering wheel and reduce speed
B. Increase speed to stabilise the vehicle
C. Drive with one hand to adjust easily
D. Turn into the wind sharply
Answer: A. Keep a firm grip on the steering wheel and reduce speed

122. 
True or False
Learners must follow all posted speed limits, even if traffic is faster.
Answer: True

123. 
Multiple Choice
If your brakes fail, your first action should be:
A. Pump the brake pedal rapidly
B. Turn off the engine
C. Shift into a higher gear
D. Pull the parking brake immediately
Answer: A. Pump the brake pedal rapidly

124. 
True or False
It is legal to drive with your parking lights alone at night.
Answer: False

125. 
Multiple Choice
When towing a trailer, you must:
A. Allow greater following distance
B. Drive faster to reduce sway
C. Avoid using mirrors
D. Overtake on hills
Answer: A. Allow greater following distance

126. 
True or False
Driving with under-inflated tires improves fuel efficiency.
Answer: False

127.
 Multiple Choice
If your vehicle starts to overheat, you should:
A. Pull over safely and turn off the engine
B. Continue driving to your destination
C. Open the radiator cap immediately
D. Increase speed to cool the engine
Answer: A. Pull over safely and turn off the engine

128.
 True or False
Motorcycles are entitled to the full use of a lane.
Answer: True

129. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you must:
A. Slow down and move over to the next lane if safe
B. Maintain your speed
C. Stop completely
D. Honk to alert them
Answer: A. Slow down and move over to the next lane if safe

130. 
True or False
It is safe to coast downhill in neutral.
Answer: False

131. 
Multiple Choice
If you are feeling drowsy while driving, you should:
A. Pull over and rest
B. Open the window and keep going
C. Drink coffee and speed up
D. Turn up the radio
Answer: A. Pull over and rest

132. 
True or False
Learner drivers may drive on gravel roads.
Answer: True

133.
 Multiple Choice
A flashing red light at an intersection means:
A. Stop and proceed when safe
B. Slow down only
C. Treat it as a green light
D. Yield without stopping
Answer: A. Stop and proceed when safe

134.
 True or False
Blind spots are eliminated by adjusting mirrors correctly.
Answer: False

135.
 Multiple Choice
When a tire blows out, you should:
A. Hold the wheel firmly, slow down gradually, and pull over
B. Brake hard immediately
C. Accelerate to stabilise the vehicle
D. Turn sharply off the road
Answer: A. Hold the wheel firmly, slow down gradually, and pull over

136. 
True or False
Learners may drive during nighttime hours.
Answer: True 
(But must follow supervision rules.)

137. 
Multiple Choice
Before entering a highway from a ramp, you must:
A. Check mirrors, blind spots, signal, and merge smoothly
B. Stop at the end of the ramp
C. Merge without signalling
D. Drive on the shoulder until traffic clears
Answer: A. Check mirrors, blind spots, signal, and merge smoothly

138.
 True or False
Horns should be used to express frustration at other drivers.
Answer: False

139. 
Multiple Choice
When driving in winter conditions, the best way to stop is:
A. Brake gently and early
B. Slam the brakes
C. Shift to park immediately
D. Pump the brakes quickly
Answer: A. Brake gently and early

140. 
True or False
Vehicles must stop at all railway crossings regardless of conditions.
Answer: False

141.
 Multiple Choice
If you approach a pedestrian with a white cane, you must:
A. Stop and yield the right of way
B. Slow but continue
C. Honk as a warning
D. Wave them across only if safe
Answer: A. Stop and yield the right of way

142. 
True or False
Learners are prohibited from driving on freeways.
Answer: False
(They may drive with supervision.)

143. 
Multiple Choice
When passing another vehicle, you should:
A. Return to your lane only when you can see the vehicle in your mirror
B. Cut in as soon as you are ahead
C. Honk continuously while passing
D. Pass without signalling
Answer: A. Return to your lane only when you can see the vehicle in your mirror

144. 
True or False
You can legally park facing oncoming traffic.
Answer: False

145.
 Multiple Choice
If your vehicle starts to hydroplane, you should:
A. Ease off the accelerator and steer straight
B. Brake firmly
C. Turn sharply to one side
D. Accelerate to regain traction
Answer: A. Ease off the accelerator and steer straight

146.
 True or False
Emergency vehicles must follow all traffic rules without exception.
Answer: False

147. 
Multiple Choice
When another driver is tailgating you, you should:
A. Slow down gradually and let them pass
B. Brake suddenly to warn them
C. Accelerate away quickly
D. Ignore them completely
Answer: A. Slow down gradually and let them pass

148.
 True or False
Learners can carry as many passengers as the vehicle seats allow.
Answer: True
(Provided the supervising driver is in the front seat.)

149.
 Multiple Choice
The most common cause of rear-end collisions is:
A. Following too closely
B. Driving too slowly
C. Failing to signal
D. Speeding in the left lane
Answer: A. Following too closely

150.
 True or False
Motorists must stop for school patrol crossing guards.
Answer: True

151. 
Multiple Choice
When approaching a railway crossing without signals, you should:
A. Slow down, look both ways, and be ready to stop
B. Drive through quickly to avoid a train
C. Honk continuously until you cross
D. Stop only if you see a train approaching
Answer: A. Slow down, look both ways, and be ready to stop

152. 
True or False
Learner drivers can drive without a supervising driver if it’s daylight.
Answer: False

153.
 Multiple Choice
If you must stop on the highway because of an emergency, you should:
A. Pull over fully, turn on hazard lights, and stay in your vehicle if safe
B. Stop in your lane and wait for help
C. Stand in front of your vehicle to warn others
D. Leave your vehicle in gear with the door open
Answer: A. Pull over fully, turn on hazard lights, and stay in your vehicle if safe

154. 
True or False
Road rage incidents can be avoided by not engaging with aggressive drivers.
Answer: True

155. 
Multiple Choice
When entering a curve, you should:
A. Slow down before the curve and accelerate gently through it
B. Accelerate into the curve
C. Brake hard in the middle of the curve
D. Keep the same high speed
Answer: A. Slow down before the curve and accelerate gently through it

156. 
True or False
You can leave children unattended in a parked vehicle if the windows are open.
Answer: False

157.
 Multiple Choice
A flashing green light at an intersection means:
A. You may proceed and turn left or right with caution
B. Stop before proceeding
C. Only pedestrians may cross
D. The light is out of order
Answer: A. You may proceed and turn left or right with caution

158. 
True or False
If your vehicle starts to skid, you should brake hard immediately.
Answer: False
(Ease off the accelerator and steer in the skid’s direction.)

159. 
Multiple Choice
To avoid splashing pedestrians when driving through puddles, you should:
A. Slow down and steer away from them
B. Drive at normal speed
C. Honk to warn them
D. Stop completely until they pass
Answer: A. Slow down and steer away from them

160.
 True or False
Learners can operate any vehicle class.
Answer: False 
(Only the class they are learning for.)

161. 
Multiple Choice
If your vision is blocked at an intersection, you should:
A. Move forward slowly until you can see
B. Proceed quickly to clear
C. Honk before entering
D. Assume it’s clear and go
Answer: A. Move forward slowly until you can see

162.
 True or False
Vehicles must stop at all pedestrian crosswalks without exception.
Answer: False 
(Only when pedestrians are present or approaching.)

163. 
Multiple Choice
The safest way to reverse is to:
A. Check mirrors, look over your shoulder, and reverse slowly
B. Use mirrors only
C. Keep windows closed
D. Reverse quickly to minimise time in traffic
Answer: A. Check mirrors, look over your shoulder, and reverse slowly

164. 
True or False
It’s legal to exceed the speed limit when overtaking another vehicle.
Answer: False

165.
 Multiple Choice
When parking downhill without a curb, turn your wheels:
A. Toward the edge of the road
B. Away from the edge
C. Straight ahead
D. Any direction
Answer: A. Toward the edge of the road

166. 
True or False
Cyclists are allowed to ride two abreast (side-by-side) on the road.
Answer: True 
(If it’s safe and does not impede traffic.)

167. 
Multiple Choice
If you experience a tire blowout, avoid:
A. Braking suddenly
B. Holding the steering wheel firmly
C. Slowing gradually
D. Pulling over safely
Answer: A. Braking suddenly

168. 
True or False
Learners can drive without headlights during heavy rain.
Answer: False

169. 
Multiple Choice
When approaching an intersection with no stop sign or signal, you must:
A. Yield to the vehicle on your right
B. Yield to the vehicle on your left
C. Proceed first if you’re larger
D. Drive through quickly
Answer: A. Yield to the vehicle on your right

170.
 True or False
If you have a green light, you never need to yield to pedestrians.
Answer: False

171. 
Multiple Choice
When driving through construction zones, you must:
A. Follow posted reduced speed limits and be prepared to stop
B. Ignore workers’ signals if lights are green
C. Use high beams at all times
D. Pass other vehicles to clear quickly
Answer: A. Follow posted reduced speed limits and be prepared to stop

172.
 True or False
The right lane is usually for faster traffic.
Answer: False 
(Left lane is for passing.)

173. 
Multiple Choice
When merging onto a freeway, match your speed to:
A. The flow of freeway traffic
B. The slowest vehicle on the ramp
C. Half the speed limit
D. Your comfort level only
Answer: A. The flow of freeway traffic

174.
 True or False
All passengers under 18 must wear seat belts or be in proper restraints.
Answer: True

175. 
Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights, pull over, and stop safely
B. Continue driving slowly without lights
C. Flash high beams repeatedly
D. Speed up to reach a lighted area
Answer: A. Turn on hazard lights, pull over, and stop safely

176. 
True or False
Learners may use handheld GPS devices while driving.
Answer: False

177.
 Multiple Choice
When driving in fog, use:
A. Low-beam headlights
B. High-beam headlights
C. Hazard lights only
D. Parking lights only
Answer: A. Low-beam headlights

178. 
True or False
It’s safe to turn the steering wheel while your vehicle is stationary.
Answer: False
(It can damage the steering system.)

179. 
Multiple Choice
If a tire drops off the pavement onto the shoulder, you should:
A. Slow down gradually before returning to the road
B. Steer sharply back onto the pavement
C. Brake hard immediately
D. Accelerate quickly to rejoin
Answer: A. Slow down gradually before returning to the road

180.
 True or False
Learners can carry passengers in the back of a pickup truck.
Answer: False

181. 
Multiple Choice
When approaching a stop sign, you must stop:
A. Before the stop line, crosswalk, or intersection
B. Only if other cars are present
C. Anywhere before the intersection
D. After entering the intersection
Answer: A. Before the stop line, crosswalk, or intersection

182. 
True or False
Headrests should be adjusted to the top of your head.
Answer: True

183.
 Multiple Choice
In winter, bridges and overpasses tend to:
A. Freeze before other road surfaces
B. Stay warmer than the road
C. Have better traction
D. Never accumulate ice
Answer: A. Freeze before other road surfaces

184. 
True or False
You can drive with an open container of alcohol as long as you don’t drink it.
Answer: False

185. 
Multiple Choice
When driving near a cyclist, you must give at least:
A. One metre of space when passing
B. 30 centimetres of space
C. Two car widths of space
D. No minimum space is required
Answer: A. One metre of space when passing

186.
 True or False
Drivers must yield to buses signalling to re-enter traffic in built-up areas.
Answer: True

187. 
Multiple Choice
Before turning right at a red light, you must:
A. Come to a complete stop and ensure it’s safe
B. Proceed without stopping if clear
C. Signal and turn immediately
D. Honk before turning
Answer: A. Come to a complete stop and ensure it’s safe

188.
 True or False
A learner’s licence is valid for five years.
Answer: False
(Usually valid for a shorter period.)

189. 
Multiple Choice
When driving past parked cars, watch for:
A. Opening doors or pedestrians stepping out
B. Clear road edges only
C. Debris in the gutter
D. Vehicle colour changes
Answer: A. Opening doors or pedestrians stepping out

190. 
True or False
Backing up is not allowed on a highway except in an emergency.
Answer: True

191.
 Multiple Choice
When stopping on a hill, keep your foot on the brake until:
A. You’re ready to move forward
B. The vehicle behind stops
C. You shift into park
D. You release the parking brake
Answer: A. You’re ready to move forward

192. 
True or False
Learners can supervise other learners if they’re over 21.
Answer: False

193. 
Multiple Choice
A solid white line means:
A. Lane changes are discouraged
B. Lane changes are prohibited at all times
C. Passing is allowed freely
D. You must stop before crossing
Answer: A. Lane changes are discouraged

194.
 True or False
You can park on a bridge if traffic is light.
Answer: False

195.
 Multiple Choice
If another driver flashes their headlights at you at night, it may mean:
A. Your high beams are on
B. They want to race
C. They’re signalling you to speed up
D. They’re warning of a police check ahead
Answer: A. Your high beams are on

196.
 True or False
Road shoulders can be used as travel lanes in heavy traffic.
Answer: False

197. 
Multiple Choice
When driving near children playing, you should:
A. Slow down and be ready to stop
B. Maintain normal speed
C. Honk to warn them
D. Drive in the opposite lane
Answer: A. Slow down and be ready to stop

198. 
True or False
Drivers must yield to trains at all times.
Answer: True

199. 
Multiple Choice
If you’re involved in a collision, you must:
A. Stop, exchange details, and assist if needed
B. Leave immediately if no damage is visible
C. Call police only if damage is severe
D. Move on to avoid blocking traffic
Answer: A. Stop, exchange details, and assist if needed

200.
 True or False
Seat belts are optional for short trips in town.
Answer: False

201. 
Multiple Choice
When approaching a green light that has been green for a long time, you should:
A. Be prepared for it to turn yellow
B. Speed through before it changes
C. Slow down and stop immediately
D. Ignore the light
Answer: A. Be prepared for it to turn yellow

202.
 True or False
You may use high beams in fog for better visibility.
Answer: False

203.
 Multiple Choice
When driving in rural areas at night, watch for:
A. Animals crossing the road
B. More street lighting
C. Heavy pedestrian traffic
D. Extra traffic signals
Answer: A. Animals crossing the road

204. 
True or False
It is illegal to block an intersection, even in heavy traffic.
Answer: True

205.
 Multiple Choice
If you miss your highway exit, you should:
A. Continue to the next exit
B. Reverse on the highway shoulder
C. Make a U-turn immediately
D. Stop and wait for a gap in traffic
Answer: A. Continue to the next exit

206. 
True or False
Learners may drive alone on private property.
Answer: True 
(With owner’s permission.)

207. 
Multiple Choice
When approaching a narrow bridge, you should:
A. Slow down and yield to oncoming traffic if necessary
B. Speed up to cross quickly
C. Stop only if a vehicle is visible
D. Sound your horn continuously
Answer: A. Slow down and yield to oncoming traffic if necessary

208. 
True or False
Driving with both hands on the wheel is recommended for maximum control.
Answer: True


209. 
Multiple Choice
If your vehicle starts to slide on a wet road, you should:
A. Ease off the accelerator and steer in the skid’s direction
B. Brake heavily
C. Steer against the skid
D. Accelerate to correct
Answer: A. Ease off the accelerator and steer in the skid’s direction

210. 
True or False
School zones always have a maximum speed limit of 50 km/h.
Answer: False
(Often lower during school hours.)

211.
 Multiple Choice
When two vehicles arrive at an intersection at the same time, the right-of-way goes to:
A. The vehicle on the right
B. The larger vehicle
C. The faster vehicle
D. The vehicle on the left
Answer: A. The vehicle on the right

212. 
True or False
Drivers can wear headphones covering both ears.
Answer: False

213.
 Multiple Choice
If your engine stalls while driving, you should:
A. Shift to neutral, steer to safety, and restart if possible
B. Stop in the lane immediately
C. Turn off hazard lights
D. Coast until it restarts
Answer: A. Shift to neutral, steer to safety, and restart if possible

214. 
True or False
Using cruise control in icy conditions is safe.
Answer: False

215. 
Multiple Choice
When an emergency vehicle approaches from behind with sirens, you must:
A. Pull over to the right and stop
B. Continue driving at the limit
C. Move left
D. Slow but keep going
Answer: A. Pull over to the right and stop

216. 
True or False
Drivers must stop for all public transit buses when they load passengers.
Answer: False

217.
 Multiple Choice
If you’re blinded by oncoming headlights, you should:
A. Look toward the right edge of the road
B. Stare directly at the lights
C. Close your eyes briefly
D. Speed up to get past them
Answer: A. Look toward the right edge of the road

218. 
True or False
It is safe to drive with snow on your roof.
Answer: False
(Snow can fall and block your view or hit others.)

219.
 Multiple Choice
When approaching a four-way stop, the first vehicle to stop:
A. Has the right of way
B. Must wait for larger vehicles
C. Goes last
D. Yields to the left
Answer: A. Has the right of way

220.
 True or False
Motorcyclists are less affected by road debris than cars.
Answer: False

221. 
Multiple Choice
When driving through a roundabout, you must:
A. Yield to traffic already in the circle
B. Enter without slowing down
C. Stop before entering
D. Honk before proceeding
Answer: A. Yield to traffic already in the circle

222. 
True or False
You can change lanes in the middle of an intersection if necessary.
Answer: False

223. 
Multiple Choice
If you have a tire blowout, you should:
A. Hold the steering wheel firmly and let the car slow down naturally
B. Brake hard immediately
C. Steer sharply to the shoulder
D. Accelerate to regain control
Answer: A. Hold the steering wheel firmly and let the car slow down naturally


224. 
True or False
You should use your horn only to avoid a collision.
Answer: True

225. 
Multiple Choice
When driving uphill, you should:
A. Maintain a steady speed and avoid sudden braking
B. Accelerate hard
C. Coast in neutral
D. Drive in the opposite lane
Answer: A. Maintain a steady speed and avoid sudden braking

226. 
True or False
Passing on the right is always illegal.
Answer: False 
(Allowed in certain conditions.)

227. 
Multiple Choice
At night, when following another vehicle, use:
A. Low-beam headlights
B. High-beam headlights
C. Hazard lights
D. No lights
Answer: A. Low-beam headlights

228. 
True or False
Learners must carry their licence at all times while driving.
Answer: True

229. 
Multiple Choice
When parking uphill with a curb, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Any direction
Answer: A. Away from the curb

230. 
True or False
You can legally drive without insurance in rural areas.
Answer:False

231. 
Multiple Choice
When backing into a parking space, you should:
A. Signal, check mirrors, and look over your shoulder
B. Reverse quickly to finish faster
C. Ignore pedestrians
D. Use only your rearview mirror
Answer: A. Signal, check mirrors, and look over your shoulder

232. 
True or False
Learners can tow trailers if supervised.
Answer: True

233. 
Multiple Choice
If a traffic signal is not working, you should:
A. Treat the intersection as a four-way stop
B. Proceed as if you have a green light
C. Ignore pedestrians
D. Wait until the lights return
Answer: A. Treat the intersection as a four-way stop

234. 
True or False
When approaching a stopped school bus with flashing red lights, you must stop in both directions.
Answer: True

235.
 Multiple Choice
Before changing lanes, you should:
A. Signal, check mirrors, and shoulder check
B. Move quickly without signalling
C. Signal only after starting the lane change
D. Slow down and stop
Answer: A. Signal, check mirrors, and shoulder check

236.
 True or False
Driving too slowly can be dangerous.
Answer: True

237.
 Multiple Choice
When your brakes fail, you should:
A. Pump the brake pedal, downshift, and use the parking brake
B. Continue driving until you reach a mechanic
C. Turn off the engine immediately
D. Increase speed to avoid traffic
Answer: A. Pump the brake pedal, downshift, and use the parking brake

238.
 True or False
Learners can carry as many passengers as there are seat belts.
Answer: True

239. 
Multiple Choice
When hydroplaning, you should:
A. Ease off the accelerator and steer straight
B. Brake hard
C. Turn sharply
D. Accelerate
Answer: A. Ease off the accelerator and steer straight

240. 
True or False
You should check your blind spots only when changing lanes.
Answer: False

241. 
Multiple Choice
When entering a freeway from a ramp, use:
A. The acceleration lane to match traffic speed
B. The brake to slow to a stop
C. Hazard lights to warn others
D. The shoulder to merge
Answer: A. The acceleration lane to match traffic speed

242.
 True or False
It’s safe to drive with worn-out tires if the weather is dry.
Answer: False

243. 
Multiple Choice
When driving past a horse-drawn vehicle, you should:
A. Slow down and pass cautiously
B. Honk loudly
C. Pass at full speed
D. Stop completely until it’s gone
Answer: A. Slow down and pass cautiously

244. 
True or False
Learners must obey all traffic laws, even if following a supervising driver’s instructions.
Answer: True

245.
 Multiple Choice
When parking uphill without a curb, turn your wheels:
A. Toward the edge of the road
B. Away from the edge
C. Straight ahead
D. Any position
Answer: A. Toward the edge of the road

246. 
True or False
A flashing yellow light means stop.
Answer: False 
(It means proceed with caution.)

247.
 Multiple Choice
When crossing railway tracks, you should:
A. Cross at a right angle and avoid stopping on them
B. Stop directly on the tracks if traffic is clear
C. Drive along the tracks
D. Change lanes while crossing
Answer: A. Cross at a right angle and avoid stopping on them

248.
 True or False
When merging, you must yield to traffic already on the road.
Answer: True

249. 
Multiple Choice
When following a motorcycle, you should:
A. Leave more following distance than for a car
B. Follow closely to protect them from other vehicles
C. Honk if they’re too slow
D. Pass immediately
Answer: A. Leave more following distance than for a car

250.
 True or False
Seat belts are only needed for the driver.
Answer: False

251. 
Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral, brake gently, and pull over
B. Turn off the engine while in motion
C. Keep driving until it releases
D. Pump the gas pedal rapidly
Answer: A. Shift to neutral, brake gently, and pull over

252. 
True or False
It’s safe to use cruise control in heavy traffic.
Answer: False

253. 
Multiple Choice
When a funeral procession is in progress, you should:
A. Yield and do not cut through it
B. Honk to pass
C. Speed up to overtake
D. Drive between the vehicles
Answer: A. Yield and do not cut through it

254. 
True or False
You can cross a solid yellow line to pass if it’s safe.
Answer: False

255.
 Multiple Choice
When approaching a yield sign, you must:
A. Slow down and give way to traffic on the main road
B. Stop regardless of traffic
C. Accelerate to merge quickly
D. Ignore if the road looks clear
Answer: A. Slow down and give way to traffic on the main road

256. 
True or False
Learners may use a cell phone if it’s hands-free.
Answer: True 
(But must avoid distractions.)

257.
 Multiple Choice
Before entering a highway, you must:
A. Check mirrors, signal, and accelerate in the merge lane
B. Enter slowly without signalling
C. Stop at the end of the ramp
D. Honk before merging
Answer: A. Check mirrors, signal, and accelerate in the merge lane

258.
 True or False
Using your brakes excessively on long downhill slopes can cause brake failure.
Answer: True

259.
 Multiple Choice
When passing another vehicle, you must:
A. Return to your lane only when you can see the vehicle in your mirror
B. Cut in as soon as you pass
C. Stay in the other lane until forced to return
D. Signal after moving back
Answer: A. Return to your lane only when you can see the vehicle in your mirror

260.
 True or False
Driving without headlights at night is a minor traffic offence.
Answer: False

261.
 Multiple Choice
If your vehicle begins to fishtail, you should:
A. Steer gently in the direction of the skid
B. Steer opposite to the skid
C. Brake firmly
D. Accelerate
Answer: A. Steer gently in the direction of the skid

262. 
True or False
Learners may drive on any public road in Manitoba if supervised.
Answer: True

263. 
Multiple Choice
When crossing paths with a pedestrian carrying a white cane, you must:
A. Stop and allow them to cross
B. Honk to warn them
C. Speed past quickly
D. Drive around them closely
Answer: A. Stop and allow them to cross

264.
 True or False
Drivers can ignore private road signs.
Answer: False

265.
 Multiple Choice
When stopping in snow, you should:
A. Brake gently to avoid skidding
B. Brake hard immediately
C. Use high beams
D. Keep speed constant
Answer: A. Brake gently to avoid skidding

266. 
True or False
Learners can drive without a seat belt if the trip is short.
Answer: False

267. 
Multiple Choice
When approaching a hill crest, you should:
A. Slow down and stay in your lane
B. Accelerate to pass
C. Drive in the opposite lane for a better view
D. Stop completely
Answer: A. Slow down and stay in your lane

268. 
True or False
Drivers must stop for police or emergency vehicles only at night.
Answer: False

269. 
Multiple Choice
In icy conditions, increase your following distance to:
A. At least 6 seconds
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: A. At least 6 seconds

270. 
True or False
Learners may supervise another driver if they have a full licence for a different class.
Answer: False

271. 
Multiple Choice
When reversing from a driveway, you should:
A. Stop before the sidewalk and check for pedestrians
B. Reverse quickly to avoid traffic
C. Rely on your mirrors only
D. Honk continuously
Answer: A. Stop before the sidewalk and check for pedestrians

272. 
True or False
Drivers must carry proof of insurance when driving.
Answer: True

273.
 Multiple Choice
If you see an animal on the road, you should:
A. Slow down and be prepared to stop
B. Swerve sharply
C. Speed past before it crosses
D. Honk and continue
Answer: A. Slow down and be prepared to stop

274. 
True or False
Driving through a red light is acceptable if no one is around.
Answer: False

275. 
Multiple Choice
When parking near a fire hydrant, you must be at least:
A. 3 metres away
B. 1 metre away
C. 5 metres away
D. 10 metres away
Answer: A. 3 metres away

276.
 True or False
Learners must always display an “L” sign on their vehicle.
Answer: True

277. 
Multiple Choice
When approaching an intersection with a flashing yellow light, you should:
A. Slow down and proceed with caution
B. Stop completely
C. Accelerate through
D. Turn immediately
Answer: A. Slow down and proceed with caution

278.
 True or False
A cracked windshield must be repaired before driving.
Answer: True

279. 
Multiple Choice
When passing a large truck, you should:
A. Pass quickly and don’t linger in blind spots
B. Drive alongside for safety
C. Honk to alert the driver
D. Pass on the right only
Answer: A. Pass quickly and don’t linger in blind spots

280. 
True or False
Learners can drive in bus-only lanes during rush hour.
Answer: False

281.
 Multiple Choice
When turning left, you must yield to:
A. Oncoming traffic and pedestrians
B. Vehicles behind you only
C. Only oncoming trucks
D. Bicycles only
Answer: A. Oncoming traffic and pedestrians

282. 
True or False
Seat belts are required for all passengers over 16 only.
Answer: False

283. 
Multiple Choice
When stopping behind a school bus, remain at least:
A. 5 metres back
B. 1 metre back
C. 10 metres back
D. 15 metres back
Answer: A. 5 metres back

284.
 True or False
Drivers can exceed the speed limit when overtaking in rural areas.
Answer: False

285.
 Multiple Choice
If you approach a crosswalk and a pedestrian is waiting, you should:
A. Stop and let them cross
B. Proceed quickly
C. Honk to signal them to wait
D. Ignore them if you have a green light
Answer: A. Stop and let them cross

286.
 True or False
Learners can drive without supervision during emergencies.
Answer: False

287. 
Multiple Choice
If your vehicle is equipped with ABS brakes, apply:
A. Firm, continuous pressure in an emergency stop
B. Pumping pressure
C. Light tapping pressure
D. No brake pressure
Answer: A. Firm, continuous pressure in an emergency stop

288. 
True or False
It’s legal to park in front of a private driveway.
Answer: False

289. 
Multiple Choice
If your vehicle begins to skid on gravel, you should:
A. Steer in the skid’s direction and slow down gradually
B. Brake hard
C. Turn against the skid
D. Accelerate to regain control
Answer: A. Steer in the skid’s direction and slow down gradually

290. 
True or False
Learners must always have zero blood alcohol concentration.
Answer: True

291.
 Multiple Choice
Before opening your door into traffic, you should:
A. Check mirrors and over your shoulder
B. Open quickly without checking
C. Use only your rearview mirror
D. Signal
Answer: A. Check mirrors and over your shoulder

292. 
True or False
You can use your hazard lights while moving in heavy rain.
Answer: False 
(They are for stopped vehicles.)

293. 
Multiple Choice
If you see flashing lights at a railway crossing, you must:
A. Stop until they stop flashing and the gates rise
B. Slow down only
C. Proceed if no train is visible
D. Honk and go through
Answer: A. Stop until they stop flashing and the gates rise

294. 
True or False
When reversing, you should steer in the opposite direction you want the back to go.
Answer: False

295.
 Multiple Choice
When parallel parking, you should be within:
A. 30 cm of the curb
B. 50 cm of the curb
C. 1 metre of the curb
D. 10 cm of the curb
Answer: A. 30 cm of the curb

296.
 True or False
Learners can drive without lights at night if the street is lit.
Answer: False

297. 
Multiple Choice
When overtaking another vehicle, you must not:
A. Exceed the speed limit
B. Signal before passing
C. Return to your lane safely
D. Check your blind spot
Answer: A. Exceed the speed limit

298. 
True or False
It’s legal to park in a disabled parking space without a permit if it’s just for a minute.
Answer: False

299.
 Multiple Choice
When approaching a T-intersection, you must:
A. Yield to traffic on the through road
B. Drive through quickly
C. Honk before entering
D. Stop only if a stop sign is present
Answer: A. Yield to traffic on the through road

300.
 True or False
Learners can drive in high-occupancy vehicle HOV lanes if they meet passenger requirements.
Answer: True


301. 
Multiple Choice
When driving in fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Drive with hazard lights on continuously
D. Turn off all lights
Answer: A. Use low-beam headlights

302.
 True or False
It’s safe to coast downhill in neutral to save fuel.
Answer: False

303.
 Multiple Choice
The safest way to handle a blowout is to:
A. Grip the wheel firmly and steer straight while slowing down
B. Brake hard immediately
C. Turn sharply off the road
D. Accelerate to regain control
Answer: A. Grip the wheel firmly and steer straight while slowing down

304.
 True or False
Learners can drive in another province without restrictions.
Answer: False

305. 
Multiple Choice
If your vehicle stalls on railway tracks and a train is approaching, you should:
A. Leave the vehicle and move away at a right angle to the tracks
B. Stay inside and call for help
C. Push the vehicle off the tracks
D. Stand in front to signal the train
Answer: A. Leave the vehicle and move away at a right angle to the tracks

306.
 True or False
You can use the left lane of a multi-lane road for passing or turning left.
Answer: True

307. 
Multiple Choice
When driving near a cyclist, you should:
A. Leave at least one metre of space when passing
B. Pass as close as possible
C. Honk to make them move over
D. Drive directly behind them until they turn
Answer: A. Leave at least one metre of space when passing

308.
 True or False
Learners can exceed the posted speed limit when passing.
Answer: False

309.
 Multiple Choice
If you are blinded by oncoming headlights, you should:
A. Look to the right edge of the road until your vision clears
B. Stare directly at the lights
C. Close your eyes briefly
D. Flash your high beams in response
Answer: A. Look to the right edge of the road until your vision clears

310.
 True or False
It’s acceptable to drive with an obstructed windshield if you can still see a little.
Answer: False

311.
 Multiple Choice
When driving through an uncontrolled intersection, you should:
A. Slow down and yield to any traffic in the intersection
B. Accelerate through quickly
C. Stop completely every time
D. Honk before entering
Answer: A. Slow down and yield to any traffic in the intersection

312.
 True or False
Learners can park in a loading zone if the vehicle is not left unattended.
Answer: False

313. 
Multiple Choice
If a pedestrian begins crossing against a traffic signal, you should:
A. Slow down and let them cross safely
B. Continue driving since they are in the wrong
C. Honk to make them hurry
D. Drive around them closely
Answer: A. Slow down and let them cross safely

314.
 True or False
Learners can drive with pets on their lap if they are restrained.
Answer: False

315. 
Multiple Choice
When approaching a construction zone, you must:
A. Slow down and follow posted signs
B. Maintain your speed unless workers are visible
C. Change lanes without signalling
D. Honk to alert workers
Answer: A. Slow down and follow posted signs

316.
 True or False
Learners can drive over the speed limit if following emergency vehicles.
Answer: False

317. 
Multiple Choice
When approaching an emergency scene, you must:
A. Slow down and move over if possible
B. Speed past to avoid blocking traffic
C. Stop completely on the road
D. Use high beams
Answer: A. Slow down and move over if possible

318.
 True or False
Drivers must carry their licence at all times while operating a vehicle.
Answer: True

319.
 Multiple Choice
A solid white line between lanes means:
A. Lane changes are discouraged
B. Lane changes are prohibited in all cases
C. Passing is allowed freely
D. It’s a pedestrian lane
Answer: A. Lane changes are discouraged

320.
 True or False
Learners must have a supervising driver seated beside them at all times.
Answer: True

321.
 Multiple Choice
If your vehicle is being overtaken, you must:
A. Maintain speed or slow down slightly to let them pass
B. Speed up to prevent passing
C. Move into the other lane quickly
D. Honk to warn them
Answer: A. Maintain speed or slow down slightly to let them pass

322. 
True or False
Learners may drive in the far-left lane of a highway unless signs prohibit it.
Answer: True

323. 
Multiple Choice
When stopping for a stop sign, you must:
A. Stop before the stop line, crosswalk, or intersection
B. Stop only if there is traffic
C. Slow down instead of stopping fully
D. Stop after entering the intersection
Answer: A. Stop before the stop line, crosswalk, or intersection

324. 
True or False
It’s safe to leave a child unattended in a vehicle for a few minutes.
Answer: False

325. 
Multiple Choice
When you see a “Road Closed” sign, you must:
A. Not proceed beyond the sign
B. Drive carefully past
C. Ignore it if no workers are visible
D. Use the shoulder to go around it
Answer: A. Not proceed beyond the sign

326.
 True or False
Learners can make a U-turn at any intersection without restrictions.
Answer: False

327. 
Multiple Choice
When driving through a school zone, you must:
A. Reduce speed to the posted limit during school hours
B. Drive at the normal limit unless children are present
C. Stop at all school crossings
D. Honk to warn students
Answer: A. Reduce speed to the posted limit during school hours

328. 
True or False
It’s legal to follow closely behind an emergency vehicle.
Answer: False

329. 
Multiple Choice
If you encounter a large puddle, you should:
A. Slow down to prevent hydroplaning
B. Drive through quickly to clear it
C. Steer sharply to avoid it
D. Stop completely before entering
Answer: A. Slow down to prevent hydroplaning

330. 
True or False
Learners can drive in any weather conditions as long as they feel confident.
Answer: False

331. 
Multiple Choice
When parallel parking, signal:
A. Before pulling alongside the vehicle in front of the space
B. After reversing into the space
C. Only if there’s traffic behind you
D. After you are parked
Answer: A. Before pulling alongside the vehicle in front of the space

332.
 True or False
Drivers must yield to buses leaving a bus stop in urban areas.
Answer: True

333.
 Multiple Choice
A broken yellow line beside your lane means:
A. You may pass when safe
B. Passing is prohibited
C. Traffic flows in one direction
D. Lane is reserved for buses
Answer: A. You may pass when safe

334.
 True or False
Learners can use earphones connected to a phone while driving.
Answer: False

335.
 Multiple Choice
When approaching a hill, you should:
A. Stay in your lane and avoid passing
B. Accelerate to pass before the top
C. Drive on the shoulder for more space
D. Sound your horn at the top
Answer: A. Stay in your lane and avoid passing

336. 
True or False
Learners must obey all road signs, even temporary ones.
Answer: True

337.
 Multiple Choice
The safest following distance in good conditions is:
A. At least 3 seconds
B. 1 second
C. 5 seconds
D. Half a car length
Answer: A. At least 3 seconds

338.
 True or False
It’s legal to overtake a vehicle in a no-passing zone if they are turning left.
Answer: True

339.
 Multiple Choice
When entering a tunnel, you should:
A. Turn on headlights and avoid lane changes
B. Speed up to pass vehicles
C. Use high beams
D. Stop inside if unsure
Answer: A. Turn on headlights and avoid lane changes

340.
 True or False
Learners can stop anywhere on the highway shoulder for a phone call.
Answer: False

341. 
Multiple Choice
When exiting a highway, signal:
A. Well before reaching the exit ramp
B. Only after you enter the ramp
C. When slowing down
D. Only if there is traffic behind
Answer: A. Well before reaching the exit ramp

342. 
True or False
It’s acceptable to reverse on a highway shoulder.
Answer: False

343. 
Multiple Choice
In heavy rain, you should:
A. Reduce speed and increase following distance
B. Maintain normal speed
C. Use cruise control
D. Drive in the middle of the road
Answer: A. Reduce speed and increase following distance

344. 
True or False
Learners may drive without lights at dawn.
Answer: False

345. 
Multiple Choice
If traffic lights are green but an intersection is blocked, you should:
A. Wait until there is space to proceed
B. Enter and stop in the middle
C. Drive onto the sidewalk to pass
D. Force your way through
Answer: A. Wait until there is space to proceed

346.
 True or False
Learners can change lanes in the middle of a crosswalk.
Answer: False

347.
 Multiple Choice
When driving in strong winds, you should:
A. Keep a firm grip on the wheel and be ready for gusts
B. Speed up to get through quickly
C. Steer loosely
D. Drive only with one hand
Answer: A. Keep a firm grip on the wheel and be ready for gusts

348. 
True or False
You can park within an intersection if space is available.
Answer: False

349. 
Multiple Choice
If your car catches fire, you should:
A. Pull over, turn off the engine, and move away
B. Keep driving to find help
C. Open the hood immediately
D. Pour water on the engine while inside
Answer: A. Pull over, turn off the engine, and move away

350. 
True or False
Learners must wear corrective lenses if required on their licence.
Answer: True

351.
 Multiple Choice
When following a vehicle at night, you should:
A. Keep your headlights on low beam
B. Use high beams
C. Flash lights to signal presence
D. Turn off lights to avoid glare
Answer: A. Keep your headlights on low beam

352.
 True or False
Learners can ignore stop signs on private property.
Answer: False

353.
 Multiple Choice
Before crossing multiple lanes, you should:
A. Change one lane at a time
B. Cross all lanes quickly
C. Use hazard lights
D. Avoid signalling
Answer: A. Change one lane at a time

354.
 True or False
You may park in a fire lane if only for a short time.
Answer: False

355.
 Multiple Choice
When driving behind a snowplow, you should:
A. Keep a safe distance and do not pass unless necessary
B. Follow closely for better visibility
C. Pass quickly on the right
D. Flash headlights to move them aside
Answer: A. Keep a safe distance and do not pass unless necessary

356.
 True or False
Learners must signal at least 30 metres before turning.
Answer: True

357. 
Multiple Choice
When approaching a pedestrian at night, you should:
A. Use low-beam headlights
B. Use high beams to see better
C. Honk to warn them
D. Drive without lights to avoid glare
Answer: A. Use low-beam headlights

358. 
True or False
It’s legal to reverse into an intersection.
Answer: False

359. 
Multiple Choice
If you experience brake fade, you should:
A. Downshift and apply brakes gently
B. Apply more pressure immediately
C. Pull the parking brake sharply
D. Turn off the engine
Answer: A. Downshift and apply brakes gently

360. 
True or False
Learners can leave the scene of a collision if no one is hurt.
Answer: False

361.
 Multiple Choice
When driving on gravel roads, you should:
A. Reduce speed to maintain control
B. Maintain highway speed
C. Brake hard to prevent sliding
D. Use cruise control
Answer: A. Reduce speed to maintain control

362. 
True or False
Learners can drive through flooded areas if they proceed slowly.
Answer: False

363.
 Multiple Choice
If you miss your exit on a highway, you should:
A. Continue to the next exit
B. Reverse to the missed exit
C. Stop and back up
D. Make a U-turn
Answer: A. Continue to the next exit

364. 
True or False
It’s acceptable to transport passengers in a pickup truck bed if seated.
Answer: False

365. 
Multiple Choice
When parking downhill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Leave wheels straight
D. Any position is fine
Answer: A. Turn wheels toward the curb

366.
 True or False
Learners must yield to pedestrians even if crossing illegally.
Answer: True

367. 
Multiple Choice
If you see a slow-moving vehicle sign, you should:
A. Reduce speed and pass with caution
B. Speed past immediately
C. Ignore it
D. Follow closely
Answer: A. Reduce speed and pass with caution

368. 
True or False
Drivers can overtake near a railway crossing if no train is coming.
Answer: False

369.
 Multiple Choice
When an oncoming vehicle has high beams on, you should:
A. Look to the right edge of the road
B. Flash your lights repeatedly
C. Close your eyes briefly
D. Speed up to pass
Answer: A. Look to the right edge of the road

370.
 True or False
Learners can drive without displaying L plates in Manitoba.
Answer: False

371.
 Multiple Choice
When joining traffic from a parked position, you should:
A. Signal, check mirrors, and shoulder check
B. Move without signalling
C. Honk and move
D. Drive backward into traffic
Answer: A. Signal, check mirrors, and shoulder check

372.
 True or False
It’s legal to leave a vehicle running unattended.
Answer: False

373.
 Multiple Choice
When passing a bicyclist, you should:
A. Leave extra space in windy conditions
B. Pass as close as possible
C. Honk loudly to warn them
D. Drive alongside until safe
Answer: A. Leave extra space in windy conditions

374.
 True or False
Learners must maintain zero alcohol and drug levels when driving.
Answer: True

375.
 Multiple Choice
When approaching a four-way stop, you should:
A. Yield to the first vehicle to stop
B. Always go first
C. Yield only to the right
D. Wait until waved through
Answer: A. Yield to the first vehicle to stop

376. 
True or False
It’s safe to drive with loose objects in the car.
Answer: False

377. 
Multiple Choice
In icy weather, you should:
A. Accelerate gently and avoid sudden braking
B. Brake hard to maintain control
C. Use cruise control
D. Drive fast to shorten exposure
Answer: A. Accelerate gently and avoid sudden braking

378.
 True or False
Drivers may use a cell phone when stopped at a red light.
Answer: False

379. 
Multiple Choice
If a police officer signals you to stop, you must:
A. Pull over safely and wait for instructions
B. Continue until reaching your destination
C. Stop only if you committed an offence
D. Ignore if traffic is heavy
Answer: A. Pull over safely and wait for instructions

380. 
True or False
Learners can drive in the middle of two lanes for safety.
Answer: False

381.
 Multiple Choice
When approaching a pedestrian with a guide dog, you must:
A. Stop and allow them to cross
B. Honk to warn them
C. Drive past slowly without stopping
D. Wave to them to hurry
Answer: A. Stop and allow them to cross

382.
 True or False
It’s legal to drive with expired licence plates.
Answer: False

383.
 Multiple Choice
If you see “merge” signs, you should:
A. Prepare to allow traffic to join your lane
B. Speed up to block merging vehicles
C. Honk and maintain speed
D. Change lanes without signalling
Answer: A. Prepare to allow traffic to join your lane

384. 
True or False
Learners can stop on a bridge to take photos.
Answer: False

385. 
Multiple Choice
When driving downhill, you should:
A. Use a lower gear to control speed
B. Coast in neutral
C. Accelerate to avoid traffic
D. Turn off the engine
Answer: A. Use a lower gear to control speed




386. 
True or False
You should always check your mirrors before braking.
Answer: True

387. 
Multiple Choice
If your brakes fail, the first thing you should try is:
A. Pumping the brake pedal
B. Accelerating to reduce load
C. Turning off the ignition immediately
D. Shifting into neutral
Answer: A. Pumping the brake pedal

388. 
True or False
Drivers should avoid sudden lane changes in wet conditions.
Answer: True

389.
 Multiple Choice
If your car begins to skid, you should:
A. Steer in the direction you want to go
B. Brake hard immediately
C. Turn the wheel sharply in the opposite direction
D. Accelerate quickly to regain control
Answer: A. Steer in the direction you want to go

390.
 True or False
Learners may drive alone if they have driven for six months without incidents.
Answer: False

391. 
Multiple Choice
When driving through a residential area, you should:
A. Watch for children and reduce your speed
B. Keep the same speed as on the main road
C. Honk frequently to warn pedestrians
D. Drive in the middle of the street
Answer: A. Watch for children and reduce your speed

392.
 True or False
Learners are allowed to drive without insurance if accompanied by a licensed driver.
Answer: False

393. 
Multiple Choice
If you approach a flashing amber light at an intersection, you should:
A. Slow down and proceed with caution
B. Stop completely and wait for green
C. Accelerate through quickly
D. Turn without signalling
Answer: A. Slow down and proceed with caution

394. 
True or False
Vehicles exiting a driveway must yield to pedestrians on the sidewalk.
Answer: True

395. 
Multiple Choice
When a lane ends ahead, you should:
A. Signal early and merge smoothly
B. Speed up to beat other vehicles
C. Stop and wait for a gap
D. Drive on the shoulder until you pass
Answer: A. Signal early and merge smoothly

396.
 True or False
It is acceptable to block a crosswalk while waiting at a red light.
Answer: False

397. 
Multiple Choice
When you see a pedestrian at a marked crosswalk, you must:
A. Stop and let them cross completely
B. Slow down but continue
C. Honk to alert them
D. Pass behind them
Answer: A. Stop and let them cross completely

398.
 True or False
You must yield to buses leaving a bus bay in urban areas.
Answer: True

399.
 Multiple Choice
When driving near a playground, you should:
A. Be prepared to stop suddenly
B. Maintain highway speed
C. Honk to clear the area
D. Drive only in the middle of the road
Answer: A. Be prepared to stop suddenly

400. 
True or False
Learners can carry more passengers than there are seatbelts.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Manitoba ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Manitoba .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $manitoba->id,
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



