<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlbertaDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $alberta = DrivingSection::firstOrCreate(
            ['title' => 'Alberta'],
            [
                'type' => 'province',
                'capital' => 'Edmonton',
                'flag' => '/images/flags/alberta.png',
                'description' => 'Alberta Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_distracted_driving.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $alberta->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the minimum age to apply for an Alberta Class 7 learner’s licence?
A. 14 years
B. 15 years
C. 16 years
D. 17 years
Answer: A. 14 years

2. 
True or False 
A Class 7 learner can drive alone as long as it is daytime.
Answer: False 
(A supervising driver with a full licence must be seated beside them at all times)

3. 
Multiple Choice
What is the maximum blood alcohol concentration (BAC) allowed for a Class 7 driver?
A. 0.00%
B. 0.05%
C. 0.08%
D. 0.02%
Answer: A. 0.00%

4.
True or False 
A learner driver in Alberta must hold their licence for at least 2 years before they can take the road test for a Class 5 GDL.
Answer: False
(The minimum holding period is 1 year)

5.
Multiple Choice
What is the minimum passing score on the Class 7 knowledge test in Alberta?
A. 75%
B. 80%
C. 85%
D. 90%
Answer: B. 80%


6. 
Multiple Choice
What is the minimum age of the supervising driver for a learner?
A. 16 years
B. 18 years
C. 21 years
D. 25 years
Answer: C. 21 years

7. 
True or False:
 A learner may not drive between midnight and 5 a.m
Answer: True 

8.
Multiple Choice
If you see a red X above your lane, it means
A. Lane is closed
B. Proceed with caution
C. Bus lane ahead
D. Merge left only
Answer: A. Lane is closed

9. 
True or False 
A flashing red traffic light means the same as a stop sign.
Answer: True

10. 
Multiple Choice
When must headlights be turned on?
A. Only at night
B. Between sunset and sunrise or when visibility is poor
C. Only in winter
D. Only in rural areas
Answer: B. Between sunset and sunrise or when visibility is poor



11. 
True or False:
 Using high beams in fog improves visibility.
Answer: False 
(Low beams should be used in fog.)

12.
Multiple Choice
The legal speed limit in school zones (unless otherwise posted) during school hours is:
A. 20 km/h
B. 30 km/h
C. 40 km/h
D. 50 km/h
Answer: B. 30 km/h

13. 
True or False:
Drivers must stop for a school bus with flashing red lights in both directions unless separated by a median.
Answer: True

14.
Multiple Choice
What should you do if your vehicle begins to skid?
A. Steer in the opposite direction of the skid
B. Brake hard immediately
C. Steer gently in the same direction as the skid
D. Accelerate to regain control
Answer: C. Steer gently in the same direction as the skid

15. 
True or False
Hydroplaning happens when tires ride on a thin layer of water and lose contact with the road.
Answer: True


16.
Multiple Choice
On a highway outside an urban area, if no speed limit is posted, the maximum is:
A. 80 km/h
B. 90 km/h
C. 100 km/h
D. 110 km/h
Answer: C. 100 km/h

17. 
True or False
A yellow line separates traffic moving in the same direction.
Answer: False
(Yellow lines separate traffic moving in opposite directions)

18. 
Multiple Choice
At an uncontrolled intersection, you should:
A. Proceed without slowing
B. Yield to vehicles on your right
C. Yield to vehicles on your left
D. Stop regardless of traffic
Answer: B. Yield to vehicles on your right

19. 
True or False
In Alberta, seatbelts are mandatory for the driver and all passengers.
Answer: True

20. 
Multiple Choice
When parking uphill with a curb, you should turn your wheels
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. In any direction
Answer: B. Away from the curb

21.
True or False 
You must signal at least 30 metres before turning in urban areas.
Answer: False
(You must signal at least 30 metres in residential areas and 100 metres on highways)

22. 
Multiple Choice
The proper hand position on the steering wheel is
A. 10 and 2 oclock
B. 9 and 3 oclock
C. 8 and 4 oclock
D. Either B or C
Answer: D. Either B or C

23. 
True or False
A learner can tow a trailer as long as the supervising driver agrees.
Answer: False 
(Class 7 drivers are not permitted to tow trailers.)

24. 
Multiple Choice
When approaching a railway crossing with flashing lights, you must:
A. Slow down and proceed if no train is seen
B. Stop at least 5 metres from the tracks
C. Cross quickly to avoid delays
D. Honk to warn the train
Answer: B. Stop at least 5 metres from the tracks

25. 
True or False
 You must yield to pedestrians only at marked crosswalks.
Answer: False 
(Yield to pedestrians at all crosswalks, marked or unmarked)

26.
Multiple Choice
If you miss your exit on a highway, you should:
A. Reverse carefully to reach it
B. Make a U-turn immediately
C. Proceed to the next exit
D. Pull over and stop in the lane
Answer: C. Proceed to the next exit

27. 
True or False
It is illegal to use a handheld phone while driving in Alberta.
Answer: True

28. 
Multiple Choice
When parallel parking on a hill facing downhill, turn your wheels
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Toward the road edge
Answer: A. Toward the curb

29. 
True or False
White lines on the road indicate traffic moving in the same direction
Answer: True

30. 
Multiple Choice
In a roundabout, you should:
A. Enter without slowing down
B. Yield to traffic already in the roundabout
C. Stop before entering every time
D. Drive clockwise
Answer: B. Yield to traffic already in the roundabout



31. 
True or False
You may park within 5 metres of a fire hydrant.
Answer: False 
(You must not park within 5 metres of a fire hydrant.)

32.
Multiple Choice
When a traffic light turns yellow, you should:
A. Speed up to get through the intersection
B. Stop if it is safe to do so
C. Always stop regardless of distance
D. Ignore and keep going
Answer: B. Stop if it is safe to do so

33. 
True or False
Emergency vehicles with flashing lights have the right of way over all traffic.
Answer: True

34. 
Multiple Choice
The minimum following distance on dry roads is
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds

35. 
True or False 
If two vehicles stop at a four-way stop at the same time, the vehicle on the left goes first.
Answer: False 
(The vehicle on the right goes first)


36.  
Multiple Choice
When a traffic light turns yellow, you must
A. Speed up to get through
B. Stop if it is safe to do so
C. Always stop
D. Slow down but proceed
Answer: B. Stop if it is safe to do so

37. 
True or False
You can cross a solid double yellow line to pass another vehicle.
Answer: False 
(Passing on a double solid yellow line is prohibited)

38. 
Multiple Choice
When parallel parking, your wheels should be within:
A. 15 cm of the curb
B. 30 cm of the curb
C. 45 cm of the curb
D. 60 cm of the curb
Answer: B. 30 cm of the curb

39.
 True or False: 
Speed limits are always safe to drive regardless of conditions.
Answer: False 
(You must adjust speed for conditions.)

40.
Multiple Choice
On a highway, the left lane is generally used for:
A. Parking
B. Slow-moving vehicles
C. Passing
D. Emergency stops
Answer: C. Passing



41. 
True or False:
It is legal to park in a bus stop zone as long as you remain in the vehicle.
Answer: False 
(Parking in a bus stop zone is prohibited)

42. 
Multiple Choice
When backing out of a driveway, you must:
A. Honk and back quickly
B. Yield to pedestrians and traffic on the road
C. Assume others will stop for you
D. Back without stopping
Answer: B. Yield to pedestrians and traffic on the road

43. 
True or False:
A broken white line means you can change lanes if it is safe.
Answer: True

44. 
Multiple Choice
When approaching an emergency vehicle stopped on the road with flashing lights, you must:
A. Slow down to the posted limit
B. Move over to another lane if possible
C. Stop immediately
D. Honk to warn them
Answer: B. Move over to another lane if possible

45.
True or False:
A slow-moving vehicle sign is a red triangle with a yellow border.
Answer: True

46. 
Multiple Choice
In Alberta, you must turn on headlights when visibility is less than
A. 50 metres
B. 100 metres
C. 150 metres
D. 200 metres
Answer: B. 100 metres

47. 
True or False:
You should always use your horn to greet friends on the road.
Answer: False 

48. 
Multiple Choice
When two vehicles meet on a steep hill where one must yield, the vehicle that must give way is
A. The vehicle going uphill
B. The vehicle going downhill
C. The larger vehicle
D. The smaller vehicle
Answer: B. The vehicle going downhill

49.
True or False 
At uncontrolled intersections, pedestrians have the right of way over vehicles.
Answer: True

50.
Multiple Choice
When two vehicles meet on a steep hill where neither can pass, the vehicle that must yield is
A. The one going uphill
B. The one going downhill
C. The smaller vehicle
D. The slower vehicle
Answer: B. The one going downhill



51. 
True or False: 
It is legal to drive without insurance if the vehicle belongs to a friend.
Answer: False
(All vehicles must have valid insurance.)

52. 
Multiple Choice
What you should do when vehicle start to hydroplane?
A. Steer straight and ease off the accelerator
B. Brake hard
C. Turn sharply
D. Accelerate to regain control
Answer: A. Steer straight and ease off the accelerator

53. 
True or False:
You can make a right turn on a red light in Alberta unless prohibited by a sign.
Answer: True

54. 
Multiple Choice
When approaching a school bus with flashing amber lights, you must:
A. Slow down and prepare to stop
B. Pass quickly before the red lights turn on
C. Stop immediately
D. Ignore if no children are seen
Answer: A. Slow down and prepare to stop

55.
True or False: 
Parking on a sidewalk is allowed if you are unloading.
Answer: False 
(Parking on a sidewalk is not permitted)



56.
Multiple Choice
In fog, you should
A. Use high beams
B. Use low beams
C. Use hazard lights only
D. Drive at the posted limit
Answer: B. Use low beams

57.
True or False:
A solid white line at an intersection means you must stop before the line.
Answer: True

58.
Multiple Choice
When a police officer signals you to pull over, you should:
A. Stop immediately in your lane
B. Pull over safely to the right side of the road
C. Speed up to find a better place to stop
D. Ignore if you think you did nothing wrong
Answer: B. Pull over safely to the right side of the road

59. 
True or False:
In Alberta, a child under 6 years old must be in a proper child safety seat.
Answer: True

60. 
Multiple Choice
What does a flashing yellow traffic light mean?
A. Stop immediately
B. Proceed with caution
C. Speed up
D. Ignore it
Answer: B. Proceed with caution



61.
True or False: 
You can pass a vehicle in a school zone during school hours.
Answer: False 
(Passing is prohibited in school zones during posted times)

62.
Multiple Choice
On a multi-lane road, the right lane is generally used for:
A. Passing
B. Faster traffic
C. Slower traffic
D. Parking
Answer: C. Slower traffic

63.
True or False:
A driver must stop at all railway crossings regardless of signals.
Answer: False 
(You must stop only when signals indicate a train is approaching or other warning signs apply)

64. 
Multiple Choice
If your vehicle starts to skid on ice, you should
A. Brake hard
B. Steer gently in the direction of the skid
C. Steer in the opposite direction
D. Accelerate
Answer: B. Steer gently in the direction of the skid

65. 
True or False: 
You should never use cruise control on slippery roads.
Answer: True


66.
Multiple Choice
When on a parallel parking, you should be within how many centimetres of the curb?
A. 20 cm
B. 30 cm
C. 40 cm
D. 50 cm
Answer: B. 30 cm

67. 
True or False:
When merging onto a highway, you must match the speed of traffic.
Answer: True

68.
Multiple Choice
A green traffic light in Alberta means:
A. Proceed with caution
B. You may go and have the right of way to turn left
C. Pedestrians may cross
D. Stop before proceeding
Answer: B. You may go and have the right of way to turn left

69.
True or False: 
In a two-lane highway, it is legal to exceed the speed limit when passing.
Answer: False 
(Speed limits apply at all times.)

70.
Multiple Choice
The hand signal for a right turn is:
A. Left arm straight out
B. Left arm bent upward at the elbow
C. Left arm bent downward
D. Right arm out the window
Answer: B. Left arm bent upward at the elbow



71. 
True or False: 
Cyclists have the same rights and responsibilities as drivers on the road.
Answer: True

72. 
Multiple Choice
If you approach an intersection and the traffic lights are not working, you should
A. Treat it as a four-way stop
B. Drive through carefully without stopping
C. Wait until the lights are fixed
D. Honk before proceeding
Answer: A. Treat it as a four-way stop

73. 
True or False: 
You can turn left from a one-way street onto another one-way street during a red light after stopping.
Answer: True 
(unless prohibited by a sign)

74. 
Multiple Choice
The main cause of skids is
A. Poor road conditions
B. Driver error
C. Low tire pressure
D. Heavy vehicles
Answer: B. Driver error

75.
True or False 
You must dim your high beams within 150 metres of oncoming traffic.
Answer: True


76. 
Multiple Choice
When parking on a hill without a curb, you should turn your wheels
A. Toward the shoulder
B. Away from the shoulder
C. Straight ahead
D. Any direction
Answer: A. Toward the shoulder

77. 
True or False: 
Children under 12 should ride in the back seat whenever possible.
Answer: True

78. 
Multiple Choice
The maximum speed limit in urban areas unless otherwise posted is
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h

79. 
True or False:
It is legal to cross a solid white line when changing lanes if safe.
Answer: False 
(Solid white lines discourage or prohibit lane changes.)

80.
Multiple Choice
If your tire blows out while driving, you should
A. Brake hard immediately
B. Hold the steering wheel firmly and slow down gradually
C. Turn sharply to the shoulder
D. Accelerate to maintain control
Answer: B. Hold the steering wheel firmly and slow down gradually



81. 
True or False: 
A green arrow traffic signal means you may turn in that direction without yielding.
Answer: False 
(You must still yield to pedestrians)

82.
Multiple Choice
When approaching a pedestrian with a white cane, you must
A. Stop and give the right of way
B. Honk to warn them
C. Pass closely
D. Drive around quickly
Answer: A. Stop and give the right of way

83. 
True or False:
Passing is allowed on a hill if you can see at least 150 metres ahead.
Answer: True

84.
Multiple Choice
A red X above your lane on a highway means
A. The lane is closing ahead
B. The lane is open
C. Stop immediately
D. The lane is not in use – do not drive in it
Answer: D. The lane is not in use – do not drive in it

85. 
True or False: 
You must stop for a school patrol crossing guard.
Answer: True



86.
Multiple Choice
The safe following distance in ideal conditions is at least
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds

87. 
True or False:
It is safe to remove your seatbelt when driving slowly in a parking lot.
Answer: False
(Seatbelts must be worn at all times.)

88. 
Multiple Choice
A diamond-shaped road sign usually indicates
A. Regulatory instruction
B. Warning of hazards
C. Road closure
D. Direction to services
Answer: B. Warning of hazards

89. 
True or False: 
You may park in front of a private driveway if it’s your own.
Answer: True 
(but not if it blocks access to the street.)

90.
Multiple Choice
What does a red reflective triangle on the road indicate?
A. Pedestrian crossing ahead
B. A slow-moving vehicle or hazard ahead
C. A no-passing zone
D. Road work ahead
Answer: B. A slow-moving vehicle or hazard ahead



91.
True or False:
The maximum speed in a construction zone is always 50 km/h.
Answer: False 
(It is as posted and may be lower.)

92. 
Multiple Choice
Before turning right on a red light, you must:
A. Slow down and proceed
B. Stop completely and check for traffic and pedestrians
C. Accelerate if safe
D. Ignore if road is clear
Answer: B. Stop completely and check for traffic and pedestrians

93.
True or False:
When driving at night, you should look directly into oncoming headlights to avoid glare.
Answer: False 
(Look slightly to the right edge of your lane)

94. 
Multiple Choice
The main purpose of ABS (Anti-lock Braking System) is to
A. Stop the vehicle faster
B. Prevent wheels from locking during braking
C. Reduce brake wear
D. Improve fuel efficiency
Answer: B. Prevent wheels from locking during braking

95. 
True or False: 
When passing a cyclist, you must leave at least 1 metre of space.
Answer: True

96.
Multiple Choice
If you are drowsy while driving, the best action is to
A. Open a window
B. Drink coffee
C. Stop and rest
D. Turn on the radio
Answer: C. Stop and rest

97.
True or False:
If your vehicle starts to skid, braking harder will help regain control.
Answer: False 
(Ease off the brakes and steer into the skid.)

98. 
Multiple Choice
What does a solid red light mean?
A. Stop and wait until green
B. Proceed with caution
C. Stop, then proceed if safe
D. Yield to traffic
Answer: A. Stop and wait until green

99. 
True or False:
Headrests are only for comfort and have no safety purpose.
Answer: False 
(They help prevent whiplash in collisions)

100. 
Multiple Choice
If an emergency vehicle is stopped on the roadside with flashing lights, you must
A. Maintain speed
B. Slow down and move over if possible
C. Stop completely
D. Honk before passing
Answer: B. Slow down and move over if possible



101. 
True or False: 
It is illegal to block an intersection even if the light is green.
Answer: True

102. 
Multiple Choice
A flashing amber light on a vehicle means
A. The vehicle is braking
B. The vehicle is turning or warning
C. The vehicle is reversing
D. Hazard ahead
Answer: B. The vehicle is turning or warning

103.
True or False: 
You should always pass another vehicle on the left.
Answer: True 
(except when the vehicle ahead is turning left)

104.
Multiple Choice
If your car starts to overheat, you should:
A. Continue driving to your destination
B. Pull over, turn off the engine, and allow it to cool
C. Remove the radiator cap immediately
D. Accelerate to improve airflow
Answer: B. Pull over, turn off the engine, and allow it to cool

105. 
True or False: 
The stopping distance on ice can be up to 10 times greater than on dry pavement.
Answer: True


106.
Multiple Choice
The safest way to handle a sharp curve is to:
A. Brake while turning
B. Slow down before entering the curve
C. Accelerate through the curve
D. Stay in the middle of the road
Answer: B. Slow down before entering the curve

107. 
True or False:
When merging onto a highway, you must yield to vehicles already on the highway.
Answer: True

108.
Multiple Choice
What does a pentagon-shaped sign indicate?
A. School zone or school crossing
B. Railway crossing
C. No passing zone
D. Yield ahead
Answer: A. School zone or school crossing

109. 
True or False: 
You can turn left across a solid yellow line into a driveway if it is safe.
Answer:True

110.
Multiple Choice
If your vehicle gets stuck in snow, you should
A. Spin the tires
B. Rock the vehicle gently forward and backward
C. Leave it running in gear
D. Call for help immediately without trying
Answer: B. Rock the vehicle gently forward and backward



111. 
True or False: 
You should check your mirrors every 5-8 seconds while driving.
Answer: True

112. 
Multiple Choice
When driving through an intersection with no signs or lights, you must
A. Yield to the vehicle on your left
B. Yield to the vehicle on your right
C. Proceed without slowing
D. Stop completely
Answer: B. Yield to the vehicle on your right

113. 
True or False: 
The left lane on a multi-lane road is for faster traffic and passing.
Answer: True

114.
Multiple Choice
If your car begins to fishtail, you should
A. Steer gently in the direction of the skid
B. Brake hard
C. Steer opposite the skid
D. Accelerate quickly
Answer: A. Steer gently in the direction of the skid

115. 
True or False: 
Wearing flip-flops while driving is illegal in Alberta.
Answer: False 



116.
Multiple Choice
The main purpose of the shoulder check is to
A. Check behind you
B. See in blind spots
C. Look at traffic ahead
D. Signal your intention
Answer: B. See in blind spots

117. 
True or False:
School zone speed limits apply only when children are present.
Answer: False 

118. 
Multiple Choice
The proper following distance on dry roads is
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: B. 2 seconds

119. 
True or False: 
A learner driver must always have their licence with them when driving.
Answer: True

120. 
Multiple Choice
What does a “no standing” sign mean?
A. No stopping for any reason
B. You may stop only to load or unload passengers
C. You may park briefly
D. You may stop to rest
Answer: B. You may stop only to load or unload passengers



121.
True or False:
Driving too slowly can be as dangerous as driving too fast.
Answer: True

122.
Multiple Choice
When approaching a hillcrest, you should
A. Stay to the right of your lane
B. Drive in the middle of the road
C. Speed up
D. Pass slower vehicles
Answer: A. Stay to the right of your lane

123.
True or False: 
You can park within 3 metres of a stop sign.
Answer: False 
(You must be at least 5 metres away)

124. 
Multiple Choice
What does a “no passing” sign look like?
A. A white rectangle with black lettering
B. A yellow pennant shape pointing right
C. A red circle with a line through it
D. A diamond shape with arrows
Answer: B. A yellow pennant shape pointing right

125.
True or False:
The posted speed limit is the maximum safe speed under ideal conditions.
Answer: True

126.
Multiple Choice
On icy roads, you should:
A. Brake sharply
B. Drive at a steady, reduced speed
C. Use cruise control
D. Change lanes quickly
Answer: B. Drive at a steady, reduced speed

127. 
True or False: 
Headlights must be used from one hour before sunset until one hour after sunrise.
Answer: False 
(They must be used from sunset to sunrise and when visibility is poor)

128. 
Multiple Choice
The purpose of a median is to
A. Provide space for pedestrians
B. Separate lanes of traffic moving in opposite directions
C. Allow for parking
D. Mark a bike lane
Answer: B. Separate lanes of traffic moving in opposite directions

129. 
True or False:
The GDL program allows a learner to have up to 8 demerit points before suspension.
Answer: True

130.
Multiple Choice
What should you do if your vehicle starts to skid sideways?
A. Steer into the skid and avoid braking
B. Steer opposite the skid
C. Brake hard
D. Accelerate
Answer: A. Steer into the skid and avoid braking



131. 
True or False:
In Alberta, you must stop for a pedestrian at a crosswalk even if there is no traffic light.
Answer: True

132. 
Multiple Choice
A solid white stop line at an intersection means
A. Stop your vehicle before the line
B. Stop after the line
C. Slow down only
D. Ignore if safe
Answer: A. Stop your vehicle before the line

133. 
True or False: 
When reversing, you should check all mirrors and look over your shoulder.
Answer: True

134.
Multiple Choice
If your vehicle is being passed, you should
A. Maintain your speed or slow slightly
B. Speed up to prevent being passed
C. Move to the left lane
D. Honk at the other driver
Answer: A. Maintain your speed or slow slightly

135. 
True or False: 
Hazard lights should be used while driving in heavy traffic.
Answer: False 
(They are for stopped or slow-moving vehicles in hazardous conditions)



136.
Multiple Choice
When approaching an intersection and the light turns yellow, you should
A. Stop if it is safe
B. Speed up to cross quickly
C. Honk and proceed
D. Stop regardless of your distance
Answer: A. Stop if it is safe

137.
True or False:
In Alberta, it is legal to make a U-turn anywhere as long as it is safe.
Answer: False 
(U-turns are prohibited in certain areas)

138. 
Multiple Choice
What should you do before driving in winter conditions?
A. Warm the engine
B. Clear snow and ice from all windows, mirrors, and lights
C. Check tire pressure
D. All of the above
Answer: D. All of the above

139.
True or False: 
The centre lane of a three-lane road is used for passing only.
Answer: False 
(It may also be used for through traffic)

140. 
Multiple Choice
What is the best way to stop quickly on ice if your vehicle has ABS?
A. Pump the brakes
B. Apply firm, steady pressure on the brake pedal
C. Slam the brakes and steer
D. Use the parking brake
Answer: B. Apply firm, steady pressure on the brake pedal



141. 
True or False: 
Parking lights can be used instead of headlights at night.
Answer: False 
(They are not a substitute for headlights)

142.
Multiple Choice
At night, if an oncoming vehicle fails to dim its high beams, you should
A. Flash your high beams briefly
B. Stare at the lights
C. Honk continuously
D. Slow to a stop
Answer: A. Flash your high beams briefly

143.
True or False:
It is safe to drive barefoot.
Answer: False 
(It reduces control over pedals)

144. 
Multiple Choice
What does a solid white line on the right edge of the road mean?
A. Marks the edge of the roadway
B. Indicates a passing lane
C. Warning of hazards ahead
D. Marks a pedestrian crossing
Answer: A. Marks the edge of the roadway

145.
True or False:
In Alberta, cyclists must obey the same traffic signs as vehicles.
Answer: True



146. 
Multiple Choice
If your rear wheels lock during braking, you should
A. Release the brake slightly
B. Brake harder
C. Turn sharply
D. Accelerate
Answer: A. Release the brake slightly

147. 
True or False: 
In heavy traffic, you should block intersections to prevent others from entering.
Answer: False 
(Never block intersections)

148. 
Multiple Choice
When driving downhill, you should:
A. Shift to a lower gear to control speed
B. Coast in neutral
C. Accelerate to maintain control
D. Use the parking brake
Answer: A. Shift to a lower gear to control speed

149. 
True or False: 
It is illegal to drive with interior dome lights on at night.
Answer: False 
(It is legal but may reduce visibility.)

150.
Multiple Choice
When stopping behind another vehicle, you should:
A. Leave enough space to see its rear tires touching the road
B. Stop as close as possible
C. Keep one metre distance only
D. Turn slightly to the left
Answer: A. Leave enough space to see its rear tires touching the road


151. 
True or False: 
You must always signal when leaving a roundabout.
Answer: True

152. 
Multiple Choice
If your headlights fail at night, you should
A. Keep driving until you reach a lit area
B. Turn on hazard lights and pull over safely
C. Use your high beams
D. Turn on your wipers
Answer: B. Turn on hazard lights and pull over safely

153. 
True or False: 
The shoulder of the road is a safe place to pass slower traffic.
Answer: False

154.
Multiple Choice
What is the main purpose of rumble strips on the highway?
A. Mark lane boundaries
B. Alert drivers when they are drifting off the road
C. Reduce speed before intersections
D. Indicate road construction ahead
Answer: B. Alert drivers when they are drifting off the road

155. 
True or False: 
You must turn on headlights when visibility is less than 150 metres.
Answer: True


156. 
Multiple Choice
A flashing green traffic light in Alberta means
A. Pedestrian-controlled light - you have the right of way
B. Turn left only
C. Yield to all traffic
D. Prepare to stop
Answer: A. Pedestrian-controlled light - you have the right of way

157. 
True or False
It is safer to reverse quickly to reduce time spent in reverse.
Answer: False

158.
Multiple Choice
When approaching a stopped school bus with flashing red lights, you must
A. Slow down and pass carefully
B. Stop regardless of your direction of travel
C. Honk before passing
D. Continue if children are not visible
Answer: B. Stop regardless of your direction of travel

159. 
True or False:
You may drive in a bike lane to pass another vehicle.
Answer: False

160. 
Multiple Choice
The main cause of rear-end collisions is
A. Poor road design
B. Following too closely
C. Bad weather
D. Mechanical failure
Answer: B. Following too closely


161. 
True or False: 
When parking uphill with a curb, turn your wheels away from the curb.
Answer: True

162. 
Multiple Choice
What does a flashing yellow light mean?
A. Stop completely
B. Proceed with caution
C. Speed up to clear the intersection
D. Yield to all traffic
Answer: B. Proceed with caution

163. 
True or False: 
You must always yield to buses leaving a bus stop in urban areas.
Answer: True

164.
Multiple Choice
What is the correct hand signal for a left turn?
A. Left arm straight out
B. Left arm bent upward
C. Left arm bent downward
D. Left arm waving
Answer: A. Left arm straight out

165.
True or False: 
Bridges can freeze before the rest of the road in cold weather.
Answer: True



166.
Multiple Choice
When parallel parking, you should be within how many centimetres of the curb?
A. 10 cm
B. 20 cm
C. 30 cm
D. 50 cm
Answer: B. 20 cm

167. 
True or False:
It is legal to park in a fire lane if you stay inside your vehicle.
Answer: False

168.
Multiple Choice
What should you do if another driver tailgates you?
A. Brake hard to warn them
B. Move to the right lane and let them pass
C. Speed up to create distance
D. Ignore them
Answer: B. Move to the right lane and let them pass

169. 
True or False: 
A red light camera only activates if you run the light without stopping.
Answer: True

170. 
Multiple Choice
When approaching a railway crossing without lights or gates, you should
A. Stop, look, and listen before crossing
B. Drive through quickly
C. Honk and cross without stopping
D. Wait for a flag person
Answer: A. Stop, look, and listen before crossing



171.
True or False: 
You can use your phone while stopped at a red light in Alberta.
Answer: False 
(distracted driving laws still apply.)

172.
Multiple Choice
In foggy conditions, you should use
A. High-beam headlights
B. Low-beam headlights
C. Hazard lights only
D. Parking lights only
Answer: B. Low-beam headlights

173.
True or False: 
The safest position for your hands on the steering wheel is at 10 and 2 o’clock.
Answer: False 
(It is now recommended at 9 and 3 o’clock)

174. 
Multiple Choice
The main purpose of the two-second rule is to
A. Measure braking distance
B. Keep a safe following distance
C. Calculate reaction time
D. Check tire grip
Answer: B. Keep a safe following distance

175. 
True or False:
Passing on a solid yellow line is always illegal.
Answer: True 
(except when turning into a driveway)



176.
Multiple Choice
The first step when entering a freeway is to
A. Accelerate to match traffic speed
B. Signal and merge quickly
C. Check mirrors and blind spots
D. Stop before merging
Answer: C. Check mirrors and blind spots

177. 
True or False: 
Wet roads can double your stopping distance.
Answer: True

178. 
Multiple Choice
If your vehicle begins to hydroplane, you should
A. Brake hard immediately
B. Ease off the accelerator and steer straight
C. Turn sharply
D. Accelerate to maintain control
Answer: B. Ease off the accelerator and steer straight

179. 
True or False: 
Learner drivers can tow a trailer in Alberta.
Answer: False

180. 
Multiple Choice
The best way to handle a vehicle approaching you with high beams is to
A. Look to the right edge of your lane
B. Flash your lights continuously
C. Close your eyes briefly
D. Drive faster to pass them
Answer: A. Look to the right edge of your lane

181. 
True or False: 
You must stop for a pedestrian who is waiting to cross at an unmarked crosswalk.
Answer: True

182.
Multiple Choice
When approaching a flashing red light, you must
A. Slow down and proceed with caution
B. Stop completely and proceed when safe
C. Treat it as a green light
D. Speed up to clear the intersection
Answer: B. Stop completely and proceed when safe

183. 
True or False:
The maximum speed limit in a school zone during school hours is 40 km/h in Alberta.
Answer: True

184. 
Multiple Choice
If your vehicle starts to skid, you should
A. Brake hard immediately
B. Steer gently in the direction you want to go
C. Steer in the opposite direction of the skid
D. Accelerate quickly
Answer: B. Steer gently in the direction you want to go

185. 
True or False: 
When parking uphill without a curb, you should turn your wheels toward the road.
Answer: False 
(Turn wheels toward the edge of the road)



186.
Multiple Choice
The correct response to an emergency vehicle with flashing lights is to
A. Speed up to clear the way
B. Pull to the right and stop
C. Stop immediately in your lane
D. Continue if you think they are not after you
Answer: B. Pull to the right and stop

187. 
True or False: 
A solid white line between lanes means lane changes are discouraged.
Answer: True

188. 
Multiple Choice
The two-second rule is used to
A. Measure braking distance
B. Determine safe following distance
C. Time traffic lights
D. Measure stopping distance on ice
Answer: B. Determine safe following distance

189.
True or False:
You may turn left from a one-way street onto another one-way street at a red light after stopping.
Answer: True

190. 
Multiple Choice
When approaching an intersection with no signs or signals, you must
A. Yield to vehicles on your right
B. Proceed without stopping
C. Stop and let all vehicles go
D. Yield to vehicles on your left
Answer: A. Yield to vehicles on your right



191. 
True or False:
Learner drivers in Alberta may drive between midnight and 5 a.m
Answer: False

192. 
Multiple Choice
What is the legal blood alcohol concentration (BAC) limit for a learner driver?
A. 0.05%
B. 0.08%
C. 0.02%
D. 0.00%
Answer: D. 0.00%

193. 
True or False:
You must always shoulder check before changing lanes.
Answer: True

194. 
Multiple Choice
When your view is blocked at an intersection, you should
A. Move forward slowly until you can see
B. Proceed quickly
C. Honk to alert others
D. Stop and wait for traffic to clear completely
Answer: A. Move forward slowly until you can see

195. 
True or False:
You can pass another vehicle in a playground zone when it is active.
Answer: False



196. 
Multiple Choice
When approaching a stop sign, you must stop
A. Before the crosswalk or stop line
B. After the crosswalk
C. Anywhere in the intersection
D. Only if traffic is coming
Answer: A. Before the crosswalk or stop line

197. 
True or False: 
Using a seatbelt is optional for backseat passengers over 18 in Alberta.
Answer: False 
(Seatbelts are mandatory for all passengers)

198.
Multiple Choice
When making a lane change on a highway, you should:
A. Signal, check mirrors, and shoulder check
B. Speed up without signalling
C. Rely only on your mirrors
D. Honk before moving
Answer: A. Signal, check mirrors, and shoulder check

199. 
True or False:
A steady green arrow means you may turn in that direction without yielding.
Answer: False 
(You must still yield to pedestrians and other traffic)

200. 
Multiple Choice
The safest way to enter an expressway is to
A. Merge at a slower speed
B. Accelerate to match the speed of traffic
C. Stop before merging
D. Use hazard lights while merging
Answer: B. Accelerate to match the speed of traffic



201. 
True or False: 
You may park facing oncoming traffic if the road is wide enough.
Answer: False

202. 
Multiple Choice
What does a diamond-shaped traffic sign indicate?
A. Regulatory instructions
B. Warning of hazards or special conditions ahead
C. Direction to a location
D. Stop requirement
Answer: B. Warning of hazards or special conditions ahead

203. 
True or False:
When driving on gravel, your stopping distance increases.
Answer: True

204.
Multiple Choice
The correct way to handle a tire blowout is to
A. Brake hard immediately
B. Grip the wheel firmly and ease off the accelerator
C. Turn sharply to the side of the blowout
D. Accelerate to maintain control
Answer: B. Grip the wheel firmly and ease off the accelerator

205. 
True or False: 
On a two-way road, you can pass another vehicle on the right shoulder.
Answer: False



206. 
Multiple Choice
When approaching a pedestrian crossing with flashing lights, you must
A. Slow down and yield to pedestrians
B. Stop only if pedestrians are on your side
C. Stop only if signalled
D. Proceed without stopping
Answer: A. Slow down and yield to pedestrians

207. 
True or False:
You can drive in the left lane of a multi-lane road at all times.
Answer: False 
(The left lane is for passing or faster-moving traffic.)

208. 
Multiple Choice
At night, you should dim your headlights when approaching another vehicle within
A. 100 metres
B. 150 metres
C. 200 metres
D. 300 metres
Answer: B. 150 metres

209. 
True or False: 
Bicycles are considered vehicles under Alberta traffic laws.
Answer: True

210. 
Multiple Choice
The first action when entering a skid is to:
A. Brake firmly
B. Take your foot off the accelerator
C. Steer away from the skid
D. Honk the horn
Answer: B. Take your foot off the accelerator



211.
True or False: 
The “two-second rule” should be doubled in bad weather.
Answer: True

212. 
Multiple Choice
What is the main purpose of an acceleration lane?
A. To slow down
B. To stop before merging
C. To match the speed of traffic before entering
D. To change lanes before an exit
Answer: C. To match the speed of traffic before entering

213. 
True or False: 
You must stop at a yield sign if traffic is approaching.
Answer: True

214. 
Multiple Choice
When you see a pedestrian with a white cane, you must
A. Proceed carefully
B. Stop and yield the right of way
C. Honk to warn them
D. Pass quickly
Answer: B. Stop and yield the right of way

215. 
True or False: 
Driving with high beams in fog improves visibility.
Answer: False 
(use low beams in fog)


216. 
Multiple Choice
The correct hand signal for slowing down or stopping is
A. Left arm straight out
B. Left arm bent upward
C. Left arm bent downward
D. Left arm waving
Answer: C. Left arm bent downward

217.
True or False:
It is legal to exceed the speed limit when passing another vehicle.
Answer: False

218.
Multiple Choice
If you miss your exit on a freeway, you should:
A. Stop and reverse carefully
B. Continue to the next exit
C. Make a U-turn immediately
D. Pull over and turn around
Answer: B. Continue to the next exit

219. 
True or False: 
Children under 40 pounds must be in a forward-facing car seat.
Answer: False 
(They must be in a rear-facing or appropriate child seat based on age and weight)

220. 
Multiple Choice
When approaching a stop sign, you must:
A. Slow down and proceed if no one is coming
B. Stop completely before the stop line or crosswalk
C. Honk before proceeding
D. Stop only if traffic is present
Answer: B. Stop completely before the stop line or crosswalk



221.
True or False: 
A “no standing” sign means you may stop only to pick up or drop off passengers.
Answer: True

222. 
Multiple Choice
When following a motorcycle, you should:
A. Maintain a two-second following distance
B. Maintain a four-second following distance
C. Follow closely for better visibility
D. Stay in their blind spot
Answer: B. Maintain a four-second following distance

223. 
True or False: 
The safest way to back out of a driveway is to do so quickly.
Answer: False 
(move slowly while checking surroundings)

224. 
Multiple Choice
The correct action when approaching a yield sign is to:
A. Stop regardless of traffic
B. Slow down and be prepared to stop if necessary
C. Speed up to merge
D. Honk and continue
Answer: B. Slow down and be prepared to stop if necessary

225. 
True or False: 
You must signal at least 30 metres before turning.
Answer: False 
(In Alberta, signal at least 30 metres in cities and 150 metres on highways)



226. 
Multiple Choice
When parking downhill with a curb, you should turn your wheels
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Toward the road
Answer: B. Toward the curb

227. 
True or False:
It is illegal to drive with only one functioning headlight at night.
Answer: True

228. 
Multiple Choice
The primary purpose of a traffic circle is to:
A. Reduce traffic speed
B. Allow faster lane changes
C. Eliminate the need for traffic lights
D. Replace pedestrian crosswalks
Answer: A. Reduce traffic speed

229. 
True or False: 
You must always yield to vehicles already in a traffic circle.
Answer: True

230. 
Multiple Choice
If two vehicles arrive at a four-way stop at the same time, the driver who:
A. Is on the left goes first
B. Is on the right goes first
C. Has the larger vehicle goes first
D. Flashes their lights goes first
Answer: B. Is on the right goes first



231.
True or False:
Using cruise control in heavy rain is recommended.
Answer: False

232. 
Multiple Choice
A flashing pedestrian signal means:
A. Pedestrians may start crossing
B. Pedestrians should not start crossing, but may finish if already started
C. Vehicles must stop immediately
D. Proceed without caution
Answer: B. Pedestrians should not start crossing, but may finish if already started

233. 
True or False:
You may overtake a vehicle in a construction zone if workers are not present.
Answer: False

234. 
Multiple Choice
When parallel parking, the ideal distance from the vehicle ahead before reversing is:
A. 0.5 metres
B. 1 metre
C. 2 metres
D. 3 metres
Answer: B. 1 metre

235. 
True or False: 
You must dim your headlights when following another vehicle within 150 metres.
Answer: True



236.
Multiple Choice
If you are feeling fatigued while driving, you should
A. Drink coffee and continue
B. Open the window for fresh air
C. Pull over and rest
D. Increase the radio volume
Answer: C. Pull over and rest

237. 
True or False: 
It is legal to drive without shoes in Alberta.
Answer: True 
(but it is not recommended for safety)

238. 
Multiple Choice
What is the main reason for adjusting your headrest properly?
A. Comfort
B. Style
C. Reduce risk of whiplash
D. Better view of the road
Answer: C. Reduce risk of whiplash

239. 
True or False:
Your stopping distance is made up of perception distance, reaction distance, and braking distance.
Answer: True

240. 
Multiple Choice
When entering a highway from a ramp, you should
A. Stop and wait for a large gap
B. Match the speed of traffic before merging
C. Drive slowly until you find a space
D. Merge without signalling
Answer: B. Match the speed of traffic before merging



241.
True or False:
You can be fined for splashing pedestrians with water from the road.
Answer: True

242. 
Multiple Choice
The main reason for keeping both hands on the wheel is to
A. Reduce fatigue
B. Have better control of the vehicle
C. Improve posture
D. Steer more quickly
Answer: B. Have better control of the vehicle

243. 
True or False:
The centre lane on a three-lane highway is only for passing.
Answer: False 
(it is for through traffic)

244. 
Multiple Choice
If you are blinded by oncoming headlights, you should
A. Look directly at the lights
B. Close your eyes briefly
C. Look toward the right edge of your lane
D. Use high beams
Answer: C. Look toward the right edge of your lane

245. 
True or False:
All passengers must wear seatbelts if the vehicle is equipped with them.
Answer: True



246. 
Multiple Choice
What should you do if your gas pedal sticks?
A. Pull it up with your foot while in motion
B. Shift to neutral and brake
C. Turn off the ignition immediately
D. Accelerate hard to release it
Answer: B. Shift to neutral and brake

247. 
True or False: 
It is illegal to block an intersection when traffic is backed up.
Answer: True

248. 
Multiple Choice
The main purpose of a “merge” sign is to
A. Warn that lanes are ending
B. Allow lane changes anywhere
C. Indicate parking areas ahead
D. Show detour routes
Answer: A. Warn that lanes are ending

249. 
True or False: 
You should check your mirrors every 5 to 8 seconds while driving.
Answer: True

250. 
Multiple Choice
The safest way to brake on ice is to:
A. Pump the brakes gently if you don’t have ABS
B. Slam the brakes hard
C. Apply full brakes quickly
D. Coast without braking
Answer: A. Pump the brakes gently if you don’t have ABS



251. 
True or False: 
Driving too slowly can be as dangerous as speeding.
Answer: True

252. 
Multiple Choice
The minimum following distance in ideal conditions is
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: B. 2 seconds

253. 
True or False: 
You may enter an intersection on a yellow light if you cannot stop safely.
Answer: True

254. 
Multiple Choice
When approaching a railway crossing without gates or lights, you should
A. Slow down, look both ways, and proceed when safe
B. Stop every time
C. Speed up to cross quickly
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed when safe

255. 
True or False:
A learner’s licence is valid for five years in Alberta.
Answer: True



256. 
Multiple Choice
When reversing, you should:
A. Use only your mirrors
B. Look over your shoulder and check surroundings
C. Depend on backup cameras alone
D. Rely on a passenger to guide you
Answer: B. Look over your shoulder and check surroundings

257. 
True or False: 
The posted speed limit is the maximum for ideal conditions.
Answer: True

258.
Multiple Choice
If a school bus has flashing red lights, you must:
A. Slow down and pass carefully
B. Stop regardless of your direction of travel
C. Continue if children are not visible
D. Honk before passing
Answer: B. Stop regardless of your direction of travel

259. 
True or False:
It is safe to drive with one hand on the wheel at all times.
Answer: False

260. 
Multiple Choice
Hydroplaning occurs when:
A. Brakes fail in heavy rain
B. Tires lose contact with the road due to water
C. Engine stalls while driving in water
D. Steering becomes stiff
Answer: B. Tires lose contact with the road due to water



261. 
True or False:
You must obey police directions even if they contradict traffic signs.
Answer: True

262. 
Multiple Choice
The safest way to change lanes is to:
A. Signal, check mirrors, shoulder check, then move
B. Move quickly without signalling
C. Honk and merge
D. Use only mirrors to check
Answer: A. Signal, check mirrors, shoulder check, then move

263.
True or False: 
You can park within 1.5 metres of a fire hydrant.
Answer: False 
(keep at least 5 metres away)

264. 
Multiple Choice
When driving in fog, you should:
A. Use high beams
B. Use low beams and reduce speed
C. Drive at the speed limit
D. Use hazard lights continuously
Answer: B. Use low beams and reduce speed

265. 
True or False: 
Right turns on a red light are always allowed in Alberta.
Answer: False 
(not where signs prohibit it)


266. 
Multiple Choice
The main purpose of road markings is to
A. Make roads look neat
B. Guide and regulate traffic
C. Show road ownership
D. Indicate speed limits
Answer: B. Guide and regulate traffic

267. 
True or False: 
You must stop at all railway crossings, even if no train is coming.
Answer: False 
(only if required by signs or signals)

268. 
Multiple Choice
What should you do if another driver is tailgating you?
A. Brake hard
B. Change lanes or slow gradually to let them pass
C. Speed up
D. Ignore them completely
Answer: B. Change lanes or slow gradually to let them pass

269. 
True or False:
A flashing green light means you may proceed but must yield to pedestrians.
Answer: True

270.
Multiple Choice
When approaching a hill where visibility is limited, you should
A. Stay close to the centre line
B. Stay to the right and reduce speed
C. Accelerate to clear the hill quickly
D. Sound your horn continuously
Answer: B. Stay to the right and reduce speed



271. 
True or False: 
You must yield to buses re-entering traffic from a bus stop.
Answer: True

272. 
Multiple Choice
If your brakes fail, you should:
A. Pump the brakes, downshift, and use the parking brake
B. Turn off the engine immediately
C. Accelerate to maintain control
D. Jump out of the vehicle
Answer: A. Pump the brakes, downshift, and use the parking brake

273. 
True or False: 
You may pass another vehicle in a school zone if the speed limit is not active.
Answer: True 
(but only when safe)

274. 
Multiple Choice
When parking on a hill facing uphill with a curb, turn your wheels
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Toward the road
Answer: B. Away from the curb

275.
True or False: 
Flashing red lights at a railway crossing mean proceed with caution.
Answer: False 
(they mean stop)



276.
Multiple Choice
The maximum speed limit in rural areas of Alberta is usually
A. 50 km/h
B. 80 km/h
C. 90 km/h
D. 100 km/h
Answer: D. 100 km/h

277. 
True or False:
It is safer to drive faster than the flow of traffic.
Answer: False

278. 
Multiple Choice
If your windshield wipers fail during heavy rain, you should:
A. Continue driving slowly
B. Pull over safely and stop until conditions improve
C. Open the windows for better visibility
D. Use hazard lights and keep going
Answer: B. Pull over safely and stop until conditions improve

279.
True or False: 
When entering a curve, slow down before you start turning.
Answer: True

280. 
Multiple Choice
A solid yellow line on your side of the road means
A. Passing is not allowed
B. Passing is allowed
C. Road is under construction
D. Reduce speed
Answer: A. Passing is not allowed



281. 
True or False: 
You must stop at a flashing yellow light.
Answer: False 
(slow down and proceed with caution.)

282. 
Multiple Choice
When driving at night, your low beams allow you to see about
A. 30 metres ahead
B. 45 metres ahead
C. 60 metres ahead
D. 75 metres ahead
Answer: C. 60 metres ahead

283. 
True or False: 
You can be fined for littering from your vehicle.
Answer: True

284. 
Multiple Choice
The safest way to handle black ice is to
A. Brake hard
B. Ease off the accelerator and steer gently
C. Accelerate to keep control
D. Turn sharply
Answer: B. Ease off the accelerator and steer gently

285. 
True or False: 
You should always signal when exiting a roundabout.
Answer: True



286.
Multiple Choice
If an oncoming vehicle crosses into your lane, you should
A. Brake hard, honk, and steer to the right
B. Maintain your lane
C. Accelerate to avoid collision
D. Move left into their lane
Answer: A. Brake hard, honk, and steer to the right

287.
True or False:
It is illegal to wear headphones while driving in Alberta.
Answer: False 
(but it is unsafe as it reduces awareness)

288. 
Multiple Choice
The main function of ABS brakes is to
A. Reduce stopping distance in all conditions
B. Prevent wheel lock-up during hard braking
C. Increase braking force
D. Stop the car automatically
Answer: B. Prevent wheel lock-up during hard braking

289. 
True or False: 
Shoulder checking is only needed when changing lanes.
Answer: False 
(also when merging or leaving a curb)

290. 
Multiple Choice
When driving in heavy rain, you should
A. Use cruise control
B. Drive at a reduced speed and increase following distance
C. Keep close to vehicles ahead
D. Use high beams
Answer: B. Drive at a reduced speed and increase following distance



291.
True or False: 
It is legal to turn left from a one-way street onto a two-way street on a red light.
Answer: False 
(only onto another one-way street.)

292.
Multiple Choice
What is the maximum speed limit in a residential area unless otherwise posted?
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h

293. 
True or False:
You should check blind spots when leaving a parking space.
Answer: True

294. 
Multiple Choice
The main purpose of a shoulder check is to
A. Look at traffic lights
B. See areas mirrors cannot cover
C. Check your speed
D. Avoid looking at mirrors
Answer: B. See areas mirrors cannot cover

295.
True or False: 
All intersections have crosswalks, whether marked or unmarked.
Answer: True



296.
Multiple Choice
When approaching an emergency scene, you must
A. Slow down and move over if possible
B. Stop completely
C. Continue at normal speed
D. Honk before passing
Answer: A. Slow down and move over if possible

297. 
True or False:
It is illegal to exceed the speed limit when overtaking another vehicle.
Answer: True

298. 
Multiple Choice
If a traffic signal is not working, you should
A. Proceed without stopping
B. Treat the intersection as a four-way stop
C. Yield only to larger vehicles
D. Drive through quickly
Answer: B. Treat the intersection as a four-way stop

299.
True or False:
The purpose of rumble strips is to warn drivers they are leaving their lane.
Answer: True

300. 
Multiple Choice
The safest way to recover from driving off the pavement edge is to
A. Steer sharply back onto the road
B. Slow down and gently steer back onto the pavement
C. Accelerate back onto the road
D. Brake hard and turn immediately
Answer: B. Slow down and gently steer back onto the pavement



301. 
True or False: 
The safest way to make a right turn is to stay close to the curb before turning.
Answer: True

302. 
Multiple Choice
When approaching a crosswalk with pedestrians waiting, you must
A. Slow down but continue if safe
B. Stop and allow them to cross
C. Honk to warn them
D. Flash headlights to signal them
Answer: B. Stop and allow them to cross

303.
True or False: 
You should use cruise control on icy roads.
Answer: False

304. 
Multiple Choice
If you are in a skid, you should
A. Steer in the direction you want the vehicle to go
B. Brake hard immediately
C. Turn sharply in the opposite direction
D. Accelerate to straighten out
Answer: A. Steer in the direction you want the vehicle to go

305. 
True or False:
You can legally park within 3 metres of a fire hydrant in Alberta.
Answer: False 
(must be at least 5 metres away.)



306. 
Multiple Choice
At night, you should dim your high beams when following another vehicle within
A. 30 metres
B. 60 metres
C. 120 metres
D. 150 metres
Answer: C. 120 metres

307.
True or False:
A broken white line separates traffic moving in the same direction.
Answer: True

308. 
Multiple Choice
When a tire blows out, you should
A. Brake hard
B. Hold the steering wheel firmly and slow down gradually
C. Accelerate to maintain control
D. Turn sharply to the side of the road
Answer: B. Hold the steering wheel firmly and slow down gradually

309.
True or False: 
You must always carry your learner’s licence when driving.
Answer: True

310. 
Multiple Choice
The maximum blood alcohol concentration for a GDL driver is
A. 0.08%
B. 0.05%
C. 0.00%
D. 0.02%
Answer: C. 0.00%



311. 
True or False: 
You may enter a controlled intersection on a stale green light without caution.
Answer: False

312. 
Multiple Choice
When driving in urban areas, you should scan ahead at least
A. Half a block
B. One block
C. Two blocks
D. Three blocks
Answer: B. One block

313. 
True or False:
You must signal for at least 3 seconds before turning or changing lanes.
Answer: True

314.
Multiple Choice
When merging onto a freeway, the correct action is to
A. Match the speed of traffic and merge safely
B. Stop at the end of the acceleration lane
C. Enter at any speed and adjust later
D. Honk before merging
Answer: A. Match the speed of traffic and merge safely

315. 
True or False:
You can make a U-turn in a school zone at any time.
Answer: False



316. 
Multiple Choice
The main purpose of a head restraint is to
A. Support the head while driving
B. Reduce the risk of neck injury in a collision
C. Help with posture
D. Act as a headrest
Answer: B. Reduce the risk of neck injury in a collision

317. 
True or False:
You must yield to vehicles already in a roundabout.
Answer: True

318. 
Multiple Choice
If you are being passed on the highway, you should
A. Increase speed
B. Maintain speed or slow slightly
C. Move into the passing lane
D. Honk to warn them
Answer: B. Maintain speed or slow slightly

319. 
True or False: 
The law requires you to use daytime running lights in Alberta.
Answer: True

320. 
Multiple Choice
What is the penalty for refusing a breath test?
A. Fine only
B. Same as driving over the legal limit
C. Warning
D. Licence downgrade
Answer: B. Same as driving over the legal limit



321.
True or False:
A solid white line means lane changing is discouraged but not prohibited.
Answer: True

322.
Multiple Choice
At uncontrolled intersections, you should
A. Yield to the vehicle on your right
B. Yield to the vehicle on your left
C. Always stop
D. Proceed without slowing
Answer: A. Yield to the vehicle on your right

323. 
True or False: 
It is safe to brake while in a curve if you are going too fast.
Answer: False 
(slow before entering the curve)

324.
Multiple Choice
When parking downhill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Toward the road
Answer: A. Toward the curb

325. 
True or False: 
GDL drivers may not have more passengers than seat belts.
Answer: True



326.
Multiple Choice
The two-second rule is used to determine
A. Safe stopping distance
B. Following distance
C. Reaction time
D. Maximum speed
Answer: B. Following distance

327. 
True or False: 
Using studded tires is illegal in Alberta.
Answer: False 
(they are allowed in winter)

328.
Multiple Choice
In icy conditions, your stopping distance can be:
A. Twice as long
B. Three times as long
C. Five to ten times as long
D. The same as dry pavement
Answer: C. Five to ten times as long

329. 
True or False: 
Learner drivers can drive alone if they have permission from a parent.
Answer: False

330. 
Multiple Choice
When turning left from a two-way street onto a one-way street, you should
A. Turn into the left lane of the one-way street
B. Turn into any lane
C. Turn into the right lane
D. Turn into the centre lane only
Answer: A. Turn into the left lane of the one-way street



331.
True or False: 
In Alberta, cyclists have the same rights and responsibilities as drivers.
Answer: True

332. 
Multiple Choice
When your vehicle starts to skid on ice, you should
A. Steer in the direction of the skid
B. Brake hard
C. Steer in the opposite direction
D. Accelerate
Answer: A. Steer in the direction of the skid

333. 
True or False:
You should use high beams in heavy fog.
Answer: False

334.
Multiple Choice
Before changing lanes, you should:
A. Signal, check mirrors, shoulder check, then change
B. Signal only
C. Change quickly without signalling
D. Check mirrors only
Answer: A. Signal, check mirrors, shoulder check, then change

335.
True or False: 
The fine for not wearing a seat belt applies to both the driver and passengers.
Answer: True



336. 
Multiple Choice
When approaching a yield sign, you should
A. Slow down and be prepared to stop if necessary
B. Stop every time
C. Proceed without slowing
D. Honk and enter
Answer: A. Slow down and be prepared to stop if necessary

337. 
True or False: 
You can pass another vehicle on a solid yellow line if it is safe.
Answer: False 
(not unless turning into a driveway.)

338. 
Multiple Choice
If your car begins to skid, you should first
A. Brake hard
B. Take your foot off the accelerator
C. Turn the wheel sharply
D. Accelerate
Answer: B. Take your foot off the accelerator

339. 
True or False: 
Learner drivers cannot drive between midnight and 5 a.m
Answer: True

340.
Multiple Choice
The safest way to back out of a driveway is to
A. Back quickly
B. Check mirrors only
C. Look over both shoulders and proceed slowly
D. Honk continuously
Answer: C. Look over both shoulders and proceed slowly



341. 
True or False:
You must reduce speed when passing parked emergency vehicles with flashing lights.
Answer: True

342. 
Multiple Choice
What is the correct response to a flashing red traffic light?
A. Proceed without stopping
B. Treat it like a stop sign
C. Yield only
D. Slow down and continue
Answer: B. Treat it like a stop sign

343. 
True or False: 
ABS brakes allow you to steer while braking hard.
Answer: True

344. 
Multiple Choice
When you see a pedestrian at an unmarked crosswalk, you must
A. Yield the right of way
B. Honk to alert them
C. Continue driving
D. Speed up to pass
Answer: A. Yield the right of way

345. 
True or False:
It is legal to pass a school bus with flashing amber lights.
Answer: True 
(but proceed with caution)



346.
Multiple Choice
The best way to avoid fatigue while driving is to
A. Drink coffee only
B. Take regular breaks
C. Play loud music
D. Open the windows
Answer: B. Take regular breaks

347. 
True or False: 
All passengers must wear seat belts, even in the back seat.
Answer: True

348. 
Multiple Choice
If you approach an intersection and the traffic lights are dark, you should
A. Treat it as a four-way stop
B. Proceed without stopping
C. Yield only
D. Speed through
Answer: A. Treat it as a four-way stop

349. 
True or False: 
When exiting a freeway, you should signal and move into the deceleration lane well in advance.
Answer: True

350. 
Multiple Choice
The safest way to handle glare from oncoming headlights is to
A. Look to the right edge of the road
B. Close your eyes briefly
C. Stare directly at the lights
D. Flash your high beams
Answer: A. Look to the right edge of the road



351.
True or False:
Using a handheld phone while driving is illegal for all drivers in Alberta.
Answer: True

352. 
Multiple Choice
When two vehicles arrive at a four-way stop at the same time, the right of way goes to
A. The vehicle on the left
B. The vehicle on the right
C. The faster vehicle
D. The larger vehicle
Answer: B. The vehicle on the right

353.
True or False: 
GDL drivers are suspended for 8 demerit points instead of 15.
Answer: True

354. 
Multiple Choice
When passing a cyclist, you must leave at least
A. 0.5 metres of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space

355. 
True or False: 
You may drive in a bus lane if there are no buses present.
Answer: False



356. 
Multiple Choice
The colour of a warning sign is usually
A. Red
B. Blue
C. Yellow
D. Green
Answer: C. Yellow

357. 
True or False: 
You must slow to 30 km/h in a playground zone during the posted times.
Answer: True

358. 
Multiple Choice
If your vehicle starts to overheat, you should:
A. Stop and let the engine cool
B. Keep driving to your destination
C. Open the radiator cap immediately
D. Turn on the heater
Answer: A. Stop and let the engine cool

359.
True or False:
You may cross a railway crossing when lights are flashing if the gate is up.
Answer: False

360. 
Multiple Choice
The best way to improve fuel efficiency is to
A. Accelerate quickly
B. Maintain a steady speed
C. Drive at maximum speed limit
D. Overinflate tires
Answer: B. Maintain a steady speed



361.
True or False:
A roundabout is designed to keep traffic moving smoothly.
Answer: True

362. 
Multiple Choice
When approaching a yield sign, you must
A. Stop every time
B. Slow down and yield to traffic
C. Speed up to merge
D. Ignore if no cars are nearby
Answer: B. Slow down and yield to traffic

363. 
True or False: 
Children under 40 pounds must be in a child safety seat.
Answer: True

364. 
Multiple Choice
If you are turning left and an oncoming vehicle is going straight, you should
A. Turn first
B. Wait until it passes
C. Honk to signal your turn
D. Move slowly into the intersection
Answer: B. Wait until it passes

365. 
True or False: 
Alberta’s GDL program requires at least 12 months in the learner stage.
Answer: True



366. 
Multiple Choice
The safest following distance in bad weather is
A. 2 seconds
B. 4 seconds or more
C. 1 second
D. 3 seconds
Answer: B. 4 seconds or more

367.
True or False:
You should shift to neutral when going downhill.
Answer: False

368. 
Multiple Choice
If your accelerator sticks, you should
A. Shift to neutral and brake gently
B. Turn off the engine immediately
C. Pull the accelerator pedal up with your foot
D. All of the above
Answer: D. All of the above

369.
True or False: 
All vehicles must have a working horn.
Answer: True

370. 
Multiple Choice
When parallel parking, the ideal distance from the car in front before reversing is
A. Half a car length
B. One car length
C. Two car lengths
D. One metre
Answer: B. One car length



371.
True or False:
You can drive without headlights during daylight hours.
Answer: True

372. 
Multiple Choice
When driving in heavy snow, you should
A. Use high beams
B. Use low beams
C. Drive at the speed limit
D. Use hazard lights only
Answer: B. Use low beams

373.
True or False: 
It is illegal to drive with an obstructed windshield.
Answer: True

374. 
Multiple Choice
If you experience brake fade going downhill, you should
A. Shift to a lower gear
B. Pump the brakes
C. Use engine braking
D. All of the above
Answer: D. All of the above

375. 
True or False: 
In Alberta, radar detectors are illegal.
Answer: False 
(they are legal)

376. 
Multiple Choice
The safest way to drive through a curve is to
A. Slow down before the curve and accelerate through it
B. Brake during the curve
C. Accelerate before entering
D. Maintain high speed
Answer: A. Slow down before the curve and accelerate through it

377. 
True or False: 
Signal lights should be used when entering and leaving a roundabout.
Answer: True

378.
Multiple Choice
If your car gets stuck in snow, you should
A. Rock the car gently back and forth
B. Spin the tires
C. Call for a tow immediately
D. Accelerate hard
Answer: A. Rock the car gently back and forth

379.
True or False: 
Pedestrians have the right of way at unmarked intersections.
Answer: True

380. 
Multiple Choice
The main cause of skidding is
A. Driving too fast for conditions
B. Tire wear
C. Brake failure
D. Steering problems
Answer: A. Driving too fast for conditions



381.
True or False: 
Learner drivers may drive on highways.
Answer: True 
(if accompanied by a fully licensed driver)

382. 
Multiple Choice
When stopping on a slippery surface, you should
A. Pump the brakes
B. Use steady pressure with ABS brakes
C. Brake hard without ABS
D. Accelerate slightly
Answer: B. Use steady pressure with ABS brakes

383. 
True or False:
School zones have lower speed limits only during posted hours.
Answer: True

384. 
Multiple Choice
If you approach a yield sign and traffic is clear, you should
A. Proceed without stopping
B. Stop every time
C. Accelerate quickly
D. Honk to signal your approach
Answer: A. Proceed without stopping

385. 
True or False: 
It is legal to turn right on a red light after stopping unless prohibited.
Answer: True



386.
Multiple Choice
You should avoid driving in another driver’s blind spot because
A. It is illegal
B. The driver may not see you
C. It uses more fuel
D. It reduces your speed
Answer: B. The driver may not see you

387. 
True or False: 
You must stop when a police officer signals you, even if you have committed no offence.
Answer: True

388. 
Multiple Choice
If you approach a railway crossing without gates or lights, you should
A. Slow down, look, and listen before crossing
B. Proceed at the speed limit
C. Honk before crossing
D. Stop every time
Answer: A. Slow down, look, and listen before crossing

389. 
True or False:
It is legal to park on the sidewalk if unloading goods.
Answer: False

390. 
Multiple Choice
When approaching a controlled intersection, you should
A. Reduce speed and be prepared to stop
B. Maintain full speed
C. Honk to alert others
D. Stop regardless of the light colour
Answer: A. Reduce speed and be prepared to stop



391.
True or False:
GDL drivers cannot supervise other learner drivers.
Answer: True

392. 
Multiple Choice
When driving downhill, the best way to control your speed is to
A. Coast in neutral
B. Use a lower gear
C. Use the parking brake
D. Turn off the engine
Answer: B. Use a lower gear

393. 
True or False:
You may use your phone’s GPS while driving if it is mounted.
Answer: True

394. 
Multiple Choice
The main purpose of the hazard lights is to
A. Indicate you are in distress or stopped
B. Signal a left turn
C. Indicate braking
D. Warn of speed traps
Answer: A. Indicate you are in distress or stopped



395. 
True or False: 
You should shoulder check before opening your door to exit a vehicle.
Answer: True

396.
Multiple Choice
When approaching a railway crossing with the lights flashing, you must
A. Stop at least 5 metres from the nearest rail
B. Proceed with caution
C. Slow down and look both ways
D. Stop only if you see a train
Answer: A. Stop at least 5 metres from the nearest rail

397. 
True or False:
GDL drivers must have zero blood alcohol at all times.
Answer: True

398. 
Multiple Choice
If your brakes fail while driving, you should
A. Pump the brake pedal
B. Use the parking brake gradually
C. Shift to a lower gear
D. All of the above
Answer: D. All of the above

399. 
True or False: 
When a school bus is stopped with red lights flashing, you must stop from both directions unless on a divided highway.
Answer: True

400.
Multiple Choice
The correct procedure for a right turn is to
A. Signal, check mirrors, shoulder check, move to the right lane, and turn into the right lane
B. Slow down and turn without signalling
C. Turn from any lane into any lane
D. Accelerate through the turn
Answer: A. Signal, check mirrors, shoulder check, move to the right lane, and turn into the right lane
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Alberta ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Alberta .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $alberta->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Alberta citizenship questions.");
    }
}



