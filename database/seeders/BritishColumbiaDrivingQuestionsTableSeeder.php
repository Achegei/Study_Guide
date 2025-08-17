<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class BritishColumbiaDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $britishColumbia = DrivingSection::firstOrCreate(
            ['title' => 'British Columbia'],
            [
                'type' => 'province',
                'capital' => 'Victoria',
                'flag' => '/images/flags/british-columbia.png',
                'description' => 'British Columbia Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_safe_driving.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $britishColumbia->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1.
 Multiple Choice
What is the minimum age to apply for a Class 7L (Learner’s) licence in BC?
A. 15 years
B. 16 years
C. 17 years
D. 18 years
Answer: B. 16 years



2. 
True or False
In BC, an L Stage driver must always be accompanied by a qualified supervisor who is at least 25 years old and holds a valid driver’s licence.
Answer: True



3.
 Multiple Choice
During the L Stage, what is the maximum speed limit you can drive, even if the posted limit is higher?
A. 50 km/h
B. 70 km/h
C. 80 km/h
D. The posted speed limit
Answer: C. 80 km/h



4. 
True or False
Learner drivers in BC are allowed to use hands-free devices while driving.
Answer: False 
(All electronic device use is prohibited for L Stage drivers.)



5.
 Multiple Choice
What is the minimum supervisor experience required to accompany an L Stage driver?
A. 1 year of driving experience
B. 2 years of driving experience
C. 4 years of driving experience
D. 5 years of driving experience
Answer: D. 5 years of driving experience



6. 
True or False
An L Stage driver in BC may carry as many passengers as there are seatbelts available in the vehicle.
Answer: False 
(Only the supervisor and one additional passenger are allowed.)



7. 
Multiple Choice
What does the red “L” decal on the back of a vehicle indicate in BC?
A. The driver is new to the province
B. The driver has a Learner’s Licence
C. The vehicle is for driving school use only
D. The driver is a tourist
Answer: B. The driver has a Learner’s Licence



8.
 True or False
An L Stage driver is allowed to drive alone if they feel confident enough.
Answer: False 
(A qualified supervisor must always be present.)



9. 
Multiple Choice
When driving with an L Licence in BC, when are you prohibited from driving?
A. Between 12 a.m. and 5 a.m.
B. Between 10 p.m. and 6 a.m.
C. Between midnight and 6 a.m.
D. No time restrictions apply
Answer: A. Between 12 a.m. and 5 a.m.



10. 
True or False
The L Stage in BC lasts for a minimum of 9 months before you can take the next road test.
Answer: True



11.
 Multiple Choice
What is the blood alcohol concentration (BAC) limit for L Stage drivers in BC?
A. 0.00%
B. 0.02%
C. 0.05%
D. 0.08%
Answer: A. 0.00%



12.
 True or False
L Stage drivers in BC must always display the red “L” sign on the rear of the vehicle when driving.
Answer: True



13. 
Multiple Choice
If a learner driver is caught speeding, what could happen?
A. Only a fine is issued
B. Possible driving prohibition and restarting the L Stage
C. Warning only
D. Immediate licence upgrade
Answer: B. Possible driving prohibition and restarting the L Stage



14. 
True or False
L Stage drivers can tow trailers if accompanied by a qualified supervisor.
Answer: False 
(Learners are not permitted to tow trailers.)



15. 
Multiple Choice
What is the passenger limit for an L Stage driver in BC?
A. 1 passenger in total (excluding supervisor)
B. 2 passengers plus supervisor
C. 4 passengers plus supervisor
D. No passenger limit if seatbelts are available
Answer: A. 1 passenger in total (excluding supervisor)



16. 
True or False
Seatbelts are optional for passengers when riding with a learner driver.
Answer: False
(Seatbelts are mandatory for everyone.)



17.
 Multiple Choice
What is the minimum score needed to pass the ICBC knowledge test for a learner’s licence?
A. 70%
B. 75%
C. 80%
D. 85%
Answer: C. 80%



18.
 True or False
Learner drivers can practise driving on highways in BC if supervised.
Answer: True



19. 
Multiple Choice
If a learner driver is caught driving without the “L” sign, what is the penalty?
A. Verbal warning
B. Fine and possible restart of the L Stage
C. Licence suspension only
D. No penalty
Answer: B. Fine and possible restart of the L Stage



20. 
True or False
The supervisor for an L Stage driver must sit in the front passenger seat.
Answer: True



21. 
Multiple Choice
What should a learner do if an emergency vehicle approaches from behind with flashing lights and sirens?
A. Stop immediately where they are
B. Pull over to the right and stop
C. Speed up to get out of the way
D. Ignore if they’re not in the same lane
Answer: B. Pull over to the right and stop



22. 
True or False
It’s legal for L Stage drivers to practise driving on private property without a supervisor.
Answer: True 
(if it’s not a public road.)



23. 
Multiple Choice
How long is the L Stage valid before you must renew?
A. 1 year
B. 2 years
C. 3 years
D. 5 years
Answer: C. 3 years



24. 
True or False
L Stage drivers must carry their driver’s licence every time they drive.
Answer: True



25. 
Multiple Choice
If your L Stage licence is suspended, how long might you have to wait before reapplying?
A. 1 month
B. 3 months
C. 6 months
D. 1 year
Answer: C. 6 months



26.
 True or False
An L Stage driver may practise driving with more than one supervisor in the vehicle.
Answer: True
( as long as they meet requirements.)



27.
 Multiple Choice
What is the penalty for using a phone while driving as an L Stage driver?
A. Fine and 4 penalty points
B. Verbal warning
C. Licence upgrade denied for 1 month
D. $50 fine only
Answer: A. Fine and 4 penalty points



28.
 True or False
It is recommended that learner drivers maintain a minimum of 2 seconds following distance behind the vehicle in front.
Answer: False 
(In BC, at least 3 seconds is recommended.)



29.
 Multiple Choice
Which of these actions could cause an immediate road test failure?
A. Driving at the speed limit
B. Failing to yield to a pedestrian
C. Using turn signals
D. Checking mirrors
Answer: B. Failing to yield to a pedestrian



30.
 True or False
During the L Stage, practice in different weather and road conditions is encouraged.
Answer: True



31. 
Multiple Choice
At an uncontrolled intersection, who must you yield to?
A. The larger vehicle
B. The vehicle on your right
C. The vehicle on your left
D. The fastest vehicle
Answer: B. The vehicle on your right



32.
 True or False
Learner drivers can practise parallel parking as part of their training.
Answer: True



33. 
Multiple Choice
If your vehicle begins to skid, you should:
A. Steer gently in the direction you want to go
B. Steer sharply opposite to the skid
C. Brake hard immediately
D. Accelerate quickly
Answer: A. Steer gently in the direction you want to go



34. 
True or False
An L Stage driver may legally park in a disabled parking spot if only stopping briefly.
Answer: False 
(Only vehicles with a valid permit may use these spaces.)



35. 
Multiple Choice
When approaching a pedestrian at a marked crosswalk, what must you do?
A. Slow down but continue
B. Stop and yield until they fully cross
C. Honk to warn them
D. Only stop if they are halfway across
Answer: B. Stop and yield until they fully cross



36.
 True or False
It’s acceptable to coast downhill in neutral to save fuel.
Answer: False 
(This is unsafe and reduces control.)



37. 
Multiple Choice
When turning left at an intersection, who do you yield to?
A. Vehicles going straight
B. Vehicles turning right
C. Pedestrians crossing
D. All of the above
Answer: D. All of the above



38. 
True or False
Flashing green lights in BC indicate a pedestrian-controlled light.
Answer: True



39. 
Multiple Choice
How should you position your hands on the steering wheel?
A. 10 and 2 o’clock position
B. 8 and 4 o’clock position
C. 9 and 3 o’clock position
D. Any comfortable position
Answer: C. 9 and 3 o’clock position



40. 
True or False
It is legal to exceed the speed limit when passing another vehicle.
Answer: False



41.
 Multiple Choice
When driving in fog, you should:
A. Use high beams
B. Use low beams
C. Use hazard lights only
D. Drive without lights
Answer: B. Use low beams



42. 
True or False
BC law requires you to slow down and move over for stopped emergency vehicles with flashing lights.
Answer: True



43. 
Multiple Choice
When approaching a roundabout, you should:
A. Yield to traffic already in the roundabout
B. Enter without slowing down
C. Always stop before entering
D. Signal only after exiting
Answer: A. Yield to traffic already in the roundabout



44. 
True or False
You must stop for a school bus when its red lights are flashing, even if you are on the opposite side of the road without a median.
Answer: True



45. 
Multiple Choice
When driving downhill, what gear should you use to help control speed?
A. High gear
B. Neutral
C. Low gear
D. Reverse
Answer: C. Low gear



46. 
True or False
On icy roads, you should brake hard to prevent skidding.
Answer: False 
(Brake gently to maintain control.)



47. 
Multiple Choice
What should you do before reversing your vehicle?
A. Check mirrors only
B. Look over both shoulders
C. Honk to warn others
D. Only check the rear-view mirror
Answer: B. Look over both shoulders



48. 
True or False
In BC, it is illegal to stop in an intersection unless you are waiting to turn.
Answer: True



49.
 Multiple Choice
When merging onto a highway, you should:
A. Stop at the end of the ramp
B. Match your speed to traffic
C. Enter at any speed
D. Honk before merging
Answer: B. Match your speed to traffic



50.
 True or False
Shoulder checking is required even when you have mirrors properly adjusted.
Answer: True

51. 
Multiple Choice
When approaching a railway crossing with flashing red lights, you must:
A. Slow down and proceed if clear
B. Stop at least 5 metres from the track
C. Honk and drive through quickly
D. Stop only if a train is visible
Answer: B. Stop at least 5 metres from the track



52. 
True or False
In BC, cyclists have the same rights and responsibilities as drivers on the road.
Answer: True



53. 
Multiple Choice
When should you use your hazard lights?
A. While parking legally
B. To warn other drivers of a hazard or breakdown
C. During normal traffic
D. When turning left
Answer: B. To warn other drivers of a hazard or breakdown



54. 
True or False
A flashing yellow traffic light means you must come to a complete stop.
Answer: False 
(It means proceed with caution.)



55. 
Multiple Choice
When parallel parking on a two-way street, your right wheels must be within:
A. 15 cm from the curb
B. 30 cm from the curb
C. 50 cm from the curb
D. 1 metre from the curb
Answer: B. 30 cm from the curb



56.
 True or False
It is legal to block an intersection if the light is green when you enter.
Answer: False 
(You must ensure the exit is clear before entering.)



57. 
Multiple Choice
When making a right turn at a red light, you must:
A. Stop completely and yield to traffic and pedestrians
B. Slow down only
C. Turn without stopping if clear
D. Honk before turning
Answer: A. Stop completely and yield to traffic and pedestrians



58. 
True or False
If another driver is tailgating you, you should slow down quickly to discourage them.
Answer: False
(Maintain speed or change lanes when safe.)



59. 
Multiple Choice
Which lane should slower traffic keep to on a multi-lane highway?
A. Left lane
B. Right lane
C. Centre lane
D. Any lane
Answer: B. Right lane



60. 
True or False
Your vehicle’s headlights must be on between sunset and sunrise, and in poor visibility conditions.
Answer: True



61. 
Multiple Choice
When exiting a highway, you should:
A. Slow down before entering the exit lane
B. Maintain highway speed until in the exit lane
C. Stop on the highway shoulder before exiting
D. Signal after you start turning
Answer: B. Maintain highway speed until in the exit lane



62. 
True or False
The “Move Over” law in BC requires you to slow down and change lanes when approaching official vehicles with flashing lights.
Answer: True



63. 
Multiple Choice
If your brakes fail while driving, you should:
A. Pump the brakes and downshift to a lower gear
B. Turn off the engine immediately
C. Speed up to reach a safe area
D. Jump out of the vehicle
Answer: A. Pump the brakes and downshift to a lower gear



64. 
True or False
On a hill, when parking facing downhill, your wheels should be turned toward the curb.
Answer: True



65. 
Multiple Choice
If a traffic signal is not working at an intersection, you should:
A. Treat it as a four-way stop
B. Drive through quickly
C. Yield only to larger vehicles
D. Ignore other vehicles
Answer: A. Treat it as a four-way stop



66. 
True or False
It is legal to drive in the HOV lane at any time if traffic is heavy.
Answer: False 
(Only permitted vehicles may use HOV lanes.)



67. 
Multiple Choice
Before making a lane change, you should:
A. Signal, check mirrors, and shoulder check
B. Signal only
C. Honk and move over
D. Slow down sharply
Answer: A. Signal, check mirrors, and shoulder check



68.
 True or False
When driving in rain, using cruise control is recommended to avoid fatigue.
Answer: False 
(Avoid cruise control on slippery roads.)



69. 
Multiple Choice
What must you do at a flashing red light?
A. Slow down and proceed
B. Stop and proceed when safe
C. Ignore it if traffic is clear
D. Yield only to pedestrians
Answer: B. Stop and proceed when safe



70. 
True or False
A white diamond painted on the road means the lane is reserved for specific vehicles.
Answer: True



71. 
Multiple Choice
What is the minimum following distance in ideal conditions?
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



72. 
True or False
It’s acceptable to cross a solid double yellow line to pass another vehicle.
Answer: False 
(This is prohibited.)



73. 
Multiple Choice
If your vehicle starts to skid, you should:
A. Steer in the opposite direction of the skid
B. Steer in the direction you want the vehicle to go
C. Brake hard immediately
D. Shift into neutral
Answer: B. Steer in the direction you want the vehicle to go



74. 
True or False
When driving at night, you should dim your high beams within 150 metres of oncoming traffic.
Answer: True



75. 
Multiple Choice
When is it legal to pass a stopped school bus with flashing red lights?
A. When the lights turn off
B. When there is no median and you are on the opposite side
C. When you are in a hurry
D. Never
Answer: A. When the lights turn off



76.
 True or False
Backing out of a driveway without looking is legal if the road is clear.
Answer: False 
(You must check for pedestrians and traffic.)



77.
 Multiple Choice
What should you do before entering a curve?
A. Brake in the middle of the curve
B. Accelerate into the curve
C. Slow down before entering
D. Honk to warn other drivers
Answer: C. Slow down before entering



78. 
True or False
In BC, it is legal to park within 5 metres of a fire hydrant.
Answer: False 
(You must keep at least 5 metres away.)



79. 
Multiple Choice
If your vehicle hydroplanes, you should:
A. Brake hard
B. Ease off the accelerator and steer straight
C. Turn sharply to the right
D. Accelerate to regain control
Answer: B. Ease off the accelerator and steer straight



80. 
True or False
Yellow lines separate traffic moving in the same direction.
Answer: False 
(They separate opposite directions of traffic.)



81. 
Multiple Choice
When should you use your parking lights?
A. When parked and visibility is low
B. While driving at night
C. As a substitute for headlights
D. Never
Answer: A. When parked and visibility is low



82. 
True or False
It is illegal to block a crosswalk with your vehicle.
Answer: True



83.
 Multiple Choice
When driving in heavy traffic, you should:
A. Follow closely to save space
B. Leave extra space between you and the vehicle ahead
C. Change lanes often to move faster
D. Use your horn frequently
Answer: B. Leave extra space between you and the vehicle ahead



84. 
True or False
You should avoid using high beams in foggy conditions.
Answer: True



85.
 Multiple Choice
What does a flashing green traffic light mean in BC?
A. Pedestrian-controlled light – proceed with caution
B. Prepare to stop
C. Speed up
D. Stop and wait for green
Answer: A. Pedestrian-controlled light – proceed with caution



86.
 True or False
If two vehicles arrive at an uncontrolled intersection at the same time, the vehicle on the left goes first.
Answer: False 
(The vehicle on the right goes first.)



87. 
Multiple Choice
What should you do if your accelerator sticks?
A. Turn off the engine immediately
B. Shift to neutral and brake gradually
C. Accelerate harder to release it
D. Use the handbrake only
Answer: B. Shift to neutral and brake gradually



88. 
True or False
Road rage incidents can be avoided by giving other drivers space and staying calm.
Answer: True



89. 
Multiple Choice
When entering a freeway, you should:
A. Enter at a much slower speed than traffic
B. Match your speed to traffic and merge safely
C. Stop at the end of the ramp
D. Merge without signalling
Answer: B. Match your speed to traffic and merge safely



90. 
True or False
It is illegal to leave a child under 12 unattended in a vehicle in BC.
Answer: True



91. 
Multiple Choice
What is the first thing you should do in a collision?
A. Exchange information only
B. Check for injuries and call emergency services if needed
C. Move your vehicle immediately
D. Argue with the other driver
Answer: B. Check for injuries and call emergency services if needed



92.
 True or False
Blind spots are completely eliminated if you adjust your mirrors correctly.
Answer: False 
(Shoulder checks are still necessary.)



93. 
Multiple Choice
When is it legal to turn left on a red light in BC?
A. From a two-way street onto a one-way street
B. From a one-way street onto a two-way street
C. From any street if clear
D. Never
Answer: A. From a two-way street onto a one-way street



94.
 True or False
When stopping behind another vehicle, you should leave enough space to see their rear tires touching the pavement.
Answer: True



95. 
Multiple Choice
If your vehicle starts to skid on ice, you should:
A. Steer in the direction of the skid
B. Brake hard immediately
C. Accelerate to regain control
D. Steer in the opposite direction of the skid
Answer: A. Steer in the direction of the skid



96.
 True or False
You may pass a vehicle in a school zone if you are under the speed limit.
Answer: False
(Passing is unsafe in school zones.)



97.
 Multiple Choice
When approaching a pedestrian at an unmarked crosswalk, you should:
A. Slow down but continue
B. Stop and yield
C. Honk and proceed
D. Only stop if they are halfway across
Answer: B. Stop and yield



98. 
True or False
It is legal to drive barefoot in BC.
Answer: True 
(but not recommended for safety.)



99. 
Multiple Choice
What does a solid white line on the road mean?
A. Lane changes are discouraged
B. Passing is allowed
C. Traffic moves in opposite directions
D. Stop line only
Answer: A. Lane changes are discouraged



100. 
True or False
Learner drivers must renew their “L” sign if it becomes faded or damaged.
Answer: True



101.
 Multiple Choice
When parking on a hill facing uphill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Leave wheels straight
D. Use no parking brake
Answer: B. Turn wheels away from the curb



102. 
True or False
It is legal to cross a solid white line to leave a HOV lane at any time.
Answer: False 
(Only where signs or broken lines permit.)



103. 
Multiple Choice
If your view is blocked at a stop sign, you should:
A. Stop, then move forward slowly until you can see
B. Proceed without stopping if no one is visible
C. Honk and drive through
D. Stop far before the sign
Answer: A. Stop, then move forward slowly until you can see



104. 
True or False
When reversing, you should rely only on your mirrors.
Answer: False 
(Always look over your shoulder as well.)



105.
 Multiple Choice
When approaching an intersection with no signs or lights, who goes first?
A. Vehicle on the right
B. Vehicle on the left
C. Larger vehicle
D. Faster vehicle
Answer: A. Vehicle on the right



106.
 True or False
You should use your horn to warn cyclists before passing them closely.
Answer: True 
(Use a light tap to alert, not to startle.)



107.
 Multiple Choice
How far before turning should you signal in urban areas?
A. 15 metres
B. 30 metres
C. 50 metres
D. 100 metres
Answer: B. 30 metres



108. 
True or False
You may park in front of a driveway if you are only staying for a minute.
Answer: False
(Driveways must always remain clear.)



109. 
Multiple Choice
When is it safest to check your mirrors?
A. Every 5–8 seconds
B. Only at intersections
C. Only before lane changes
D. Only on highways
Answer: A. Every 5–8 seconds



110. 
True or False
If your vehicle breaks down on a highway, you should stay inside with seatbelt fastened until help arrives.
Answer: True 
(Unless it is unsafe to remain inside.)



111.
 Multiple Choice
When driving on gravel roads, you should:
A. Drive at the posted limit regardless of conditions
B. Reduce speed and increase following distance
C. Use high beams at all times
D. Avoid braking
Answer: B. Reduce speed and increase following distance



112. 
True or False
It is safe to overtake on a curve if no vehicle is visible ahead.
Answer: False 
(Curves can hide oncoming traffic.)



113. 
Multiple Choice
What is the penalty for failing to yield to a pedestrian?
A. Verbal warning
B. Fine and penalty points
C. No penalty
D. Written reminder only
Answer: B. Fine and penalty points



114. 
True or False
At night, you should dim your high beams when following another vehicle within 60 metres.
Answer: True



115. 
Multiple Choice
What does a steady yellow traffic light mean?
A. Stop if safe to do so
B. Speed up to clear the intersection
C. Slow down and proceed
D. Stop only for pedestrians
Answer: A. Stop if safe to do so



116. 
True or False
Motorcycles require the same full lane space as cars.
Answer: True



117. 
Multiple Choice
If your car begins to fishtail, you should:
A. Steer into the skid direction
B. Brake hard immediately
C. Steer away from the skid
D. Shift into reverse
Answer: A. Steer into the skid direction



118.
 True or False
Pedestrians have the right of way at marked crosswalks only.
Answer: False 
(They also have right of way at unmarked crosswalks.)



119.
 Multiple Choice
When merging onto a freeway, you should:
A. Stop before entering
B. Match your speed to the traffic and merge safely
C. Drive at a much slower speed than traffic
D. Signal only after merging
Answer: B. Match your speed to the traffic and merge safely



120. 
True or False
If you miss your freeway exit, you should back up on the shoulder to reach it.
Answer: False 
(Continue to the next exit safely.)



121. 
Multiple Choice
What is the legal speed limit in a school zone in BC unless otherwise posted?
A. 20 km/h
B. 30 km/h
C. 40 km/h
D. 50 km/h
Answer: B. 30 km/h



122. 
True or False
The default speed limit in urban areas is 50 km/h unless otherwise posted.
Answer: True



123.
 Multiple Choice
If two vehicles stop at a four-way stop at the same time, who goes first?
A. Vehicle on the right
B. Vehicle on the left
C. Larger vehicle
D. Vehicle turning left
Answer: A. Vehicle on the right



124.
 True or False
Driving with a cracked windshield is legal if it doesn’t block your view.
Answer: True 
(but it’s unsafe and can lead to a ticket if impairing vision.)



125. 
Multiple Choice
When should you use your high-beam headlights?
A. On unlit roads with no oncoming traffic
B. In city traffic
C. In fog
D. During heavy rain
Answer: A. On unlit roads with no oncoming traffic

126.
 True or False
In BC, a learner driver may drive on any road as long as supervised.
Answer: True



127. 
Multiple Choice
What should you do if your tires blow out while driving?
A. Brake hard immediately
B. Hold the steering wheel firmly and ease off the gas
C. Turn sharply to the side
D. Speed up to maintain control
Answer: B. Hold the steering wheel firmly and ease off the gas



128.
 True or False
When reversing, you must always yield to pedestrians and traffic.
Answer: True



129.
 Multiple Choice
What is the penalty for failing to stop for a school bus with flashing red lights?
A. Fine only
B. Fine and penalty points
C. Warning only
D. No penalty if in a hurry
Answer: B. Fine and penalty points



130.
 True or False
Bicycles are allowed to ride two abreast on most BC roads.
Answer: True 
(Unless signs prohibit.)



131. 
Multiple Choice
When should you shoulder check?
A. Before every lane change or turn
B. Only when merging
C. Only when reversing
D. Only at high speed
Answer: A. Before every lane change or turn



132. 
True or False
A round green light means you may go if the intersection is clear.
Answer: True



133. 
Multiple Choice
If your brakes get wet, you should:
A. Pump them gently while driving slowly
B. Brake hard until they dry
C. Stop completely until dry
D. Drive without braking
Answer: A. Pump them gently while driving slowly



134. 
True or False
If you see an animal on the road, brake firmly and swerve sharply.
Answer: False 
(Brake firmly but avoid unsafe swerving.)



135. 
Multiple Choice
Which headlights should you use in heavy rain?
A. High beams
B. Low beams
C. No lights
D. Parking lights
Answer: B. Low beams



136. 
True or False
On a two-lane highway, you may pass on the right if the vehicle ahead is turning left.
Answer: True 
(if safe and the lane is clear.)



137.
 Multiple Choice
When following a large truck, you should:
A. Stay close to reduce wind drag
B. Leave extra space for visibility and stopping distance
C. Pass immediately
D. Drive in its blind spots
Answer: B. Leave extra space for visibility and stopping distance



138.
 True or False
Distracted driving includes adjusting the radio while driving.
Answer: True



139. 
Multiple Choice
When approaching a hill with limited visibility, you should:
A. Stay in your lane and reduce speed
B. Overtake quickly
C. Use high beams always
D. Honk continuously
Answer: A. Stay in your lane and reduce speed



140. 
True or False
You can park anywhere in a construction zone if no workers are present.
Answer: False



141. 
Multiple Choice
When your vehicle starts to skid in wet conditions, the first thing you should do is:
A. Accelerate
B. Ease off the accelerator
C. Brake hard
D. Turn sharply
Answer: B. Ease off the accelerator



142. 
True or False
It is legal to use a handheld phone at a red light in BC.
Answer: False 
(The ban applies whenever you are in control of the vehicle.)



143.
 Multiple Choice
At what BAC is a fully licensed BC driver considered impaired?
A. 0.02%
B. 0.05%
C. 0.08%
D. 0.10%
Answer: C. 0.08%



144. 
True or False
Learner drivers must have a supervisor who is at least 25 years old.
Answer: True 
(and must hold a valid licence.)



145. 
Multiple Choice
If you must stop on a highway, you should:
A. Stop in the lane
B. Pull completely off the roadway
C. Stop on a curve
D. Stop on a bridge
Answer: B. Pull completely off the roadway



146. 
True or False
Vehicles exiting driveways must yield to pedestrians on sidewalks.
Answer: True



147. 
Multiple Choice
When driving through an intersection, you should:
A. Look only straight ahead
B. Scan left, centre, and right
C. Accelerate to clear quickly
D. Honk to alert others
Answer: B. Scan left, centre, and right



148. 
True or False
The safe stopping distance increases on wet or icy roads.
Answer: True



149. 
Multiple Choice
If you are drowsy while driving, you should:
A. Open a window and keep driving
B. Pull over and rest
C. Drink coffee and continue
D. Speed up to finish the trip faster
Answer: B. Pull over and rest



150. 
True or False
It’s legal to exceed the speed limit when overtaking another vehicle in BC.
Answer: False



151. 
Multiple Choice
When parallel parking downhill with a curb, you should:
A. Turn wheels away from the curb
B. Turn wheels toward the curb
C. Leave wheels straight
D. Ignore wheel position
Answer: B. Turn wheels toward the curb



152. 
True or False
BC law requires headlights to be on from half an hour after sunset to half an hour before sunrise.
Answer: True



153.
 Multiple Choice
If two vehicles meet on a steep, narrow road, which one has the right of way?
A. The one going uphill
B. The one going downhill
C. The smaller vehicle
D. The faster vehicle
Answer: A. The one going uphill



154.
 True or False
Flashing red lights at a railway crossing mean you must stop and wait until the lights stop flashing.
Answer: True



155. 
Multiple Choice
When should you turn on your headlights during the day?
A. Only in heavy rain or fog
B. Only at night
C. Whenever visibility is reduced
D. Never during the day
Answer: C. Whenever visibility is reduced



156. 
True or False
If your vehicle starts to hydroplane, you should steer gently and ease off the accelerator.
Answer: True



157.
 Multiple Choice
When entering a tunnel, you should:
A. Remove sunglasses, turn on headlights
B. Increase speed
C. Honk to warn others
D. Turn off headlights
Answer: A. Remove sunglasses, turn on headlights



158. 
True or False
It is illegal to make a U-turn where signs prohibit it.
Answer: True



159.
 Multiple Choice
How far must you park from a fire hydrant in BC?
A. 1 metre
B. 3 metres
C. 5 metres
D. 10 metres
Answer: B. 3 metres



160. 
True or False
You may overtake a school bus with flashing amber lights.
Answer: True 
(but be prepared to stop as they may turn red.)



161. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you must:
A. Slow down and move over if safe
B. Stop immediately in your lane
C. Ignore if it’s on the opposite side
D. Speed up to pass quickly
Answer: A. Slow down and move over if safe



162.
 True or False
Blind spots exist even with properly adjusted mirrors.
Answer: True



163. 
Multiple Choice
What is the safest way to approach a green light that has been green for a while?
A. Maintain speed without caution
B. Be prepared for it to turn yellow
C. Speed up to avoid yellow
D. Stop immediately
Answer: B. Be prepared for it to turn yellow



164. 
True or False
BC law requires children under 12 to ride in the back seat whenever possible.
Answer: True



165.
 Multiple Choice
If your vehicle stalls on railway tracks, you should:
A. Try to restart while staying inside
B. Exit immediately and move away from the tracks at an angle
C. Stay inside and call for help
D. Push the vehicle yourself
Answer: B. Exit immediately and move away from the tracks at an angle



166.
 True or False
Backing out of a driveway into traffic requires you to yield to all road users.
Answer: True



167. 
Multiple Choice
When following a motorcycle, you should allow at least:
A. 1 second gap
B. 2 seconds gap
C. 3 seconds gap
D. 4 seconds gap
Answer: C. 3 seconds gap



168. 
True or False
Texting while stopped at a red light is legal for fully licensed drivers.
Answer: False



169.
 Multiple Choice
If you are being tailgated, you should:
A. Brake hard to warn them
B. Move to the right lane or pull over safely
C. Speed up
D. Ignore them completely
Answer: B. Move to the right lane or pull over safely



170.
 True or False
When entering a freeway, you must yield to vehicles already on it.
Answer: True



171.
 Multiple Choice
How should you handle a four-way stop if you arrive at the same time as another vehicle across from you?
A. Go together
B. Whoever is turning yields to the one going straight
C. Both turn left
D. Whoever honks first goes
Answer: B. Whoever is turning yields to the one going straight



172.
 True or False
It is legal to drive with your parking lights on instead of headlights at night.
Answer: False



173.
 Multiple Choice
In BC, what should you do when approaching a flashing yellow traffic light?
A. Stop completely
B. Slow down and proceed with caution
C. Speed up to clear
D. Ignore the signal
Answer: B. Slow down and proceed with caution



174. 
True or False
Crossing a double solid yellow line to make a left turn into a driveway is allowed.
Answer: True



175. 
Multiple Choice
If another driver is tailgating you, you should:
A. Maintain a steady speed or change lanes safely
B. Brake hard to scare them
C. Speed up
D. Ignore and continue
Answer: A. Maintain a steady speed or change lanes safely



176. 
True or False
Bicycles are considered vehicles under BC traffic laws.
Answer: True



177. 
Multiple Choice
If you see a “lane ends” sign, you should:
A. Speed up to merge ahead of others
B. Signal and merge early and safely
C. Stop until a gap appears
D. Honk to warn others
Answer: B. Signal and merge early and safely



178. 
True or False
In BC, studded winter tires are legal during certain months.
Answer: True



179.
 Multiple Choice
When approaching an intersection with flashing red lights, you should:
A. Slow down but continue
B. Treat it like a stop sign
C. Speed up to clear quickly
D. Ignore if no one is visible
Answer: B. Treat it like a stop sign



180. 
True or False
You must dim your high beams for oncoming traffic within 150 metres.
Answer: True



181. 
Multiple Choice
If your engine catches fire, you should:
A. Drive to the nearest repair shop
B. Stop, turn off engine, exit vehicle, and call for help
C. Open the hood immediately
D. Use water to put it out
Answer: B. Stop, turn off engine, exit vehicle, and call for help



182.
 True or False
It is safer to brake while cornering sharply.
Answer: False 
(Brake before the turn.)



183. 
Multiple Choice
What is the default rural speed limit in BC unless otherwise posted?
A. 50 km/h
B. 60 km/h
C. 70 km/h
D. 80 km/h
Answer: D. 80 km/h



184. 
True or False
At a T-intersection, the vehicle on the terminating road must yield.
Answer: True



185.
 Multiple Choice
When you see a yield sign, you should:
A. Slow down and give way to traffic on the main road
B. Stop every time
C. Speed up if no one is visible
D. Ignore if you have priority
Answer: A. Slow down and give way to traffic on the main road



186. 
True or False
Shoulder checking is not required when exiting a roundabout.
Answer: False



187. 
Multiple Choice
If a vehicle is stopped at a crosswalk, you should:
A. Pass it carefully
B. Stop and check for pedestrians
C. Honk to warn pedestrians
D. Continue if in a hurry
Answer: B. Stop and check for pedestrians



188. 
True or False
Hydroplaning risk increases with higher speeds and worn tires.
Answer: True



189. 
Multiple Choice
When is it safe to pass on a two-lane road?
A. When the centre line is broken and the lane is clear
B. On curves
C. At intersections
D. Near railway crossings
Answer: A. When the centre line is broken and the lane is clear



190. 
True or False
If traffic lights are out, treat the intersection like a four-way stop.
Answer: True



191. 
Multiple Choice
When backing out of a driveway, you should:
A. Yield to pedestrians and traffic on the road
B. Reverse quickly to avoid blocking
C. Use only mirrors
D. Sound horn continuously
Answer: A. Yield to pedestrians and traffic on the road



192. 
True or False
It’s okay to block an intersection if you are waiting to turn left.
Answer: False 
(Only enter when you can clear it fully.)



193. 
Multiple Choice
If you have a tire blowout, you should avoid:
A. Sudden braking
B. Holding the wheel firmly
C. Easing off the gas
D. Steering straight
Answer: A. Sudden braking



194.
 True or False
In BC, it’s legal to coast downhill in neutral gear.
Answer: False



195. 
Multiple Choice
When approaching a stopped transit bus with flashing lights, you should:
A. Pass without slowing
B. Stop if lights are flashing
C. Speed past quickly
D. Ignore unless it’s a school bus
Answer: B. Stop if lights are flashing



196. 
True or False
A flashing green light at an intersection means the signal is pedestrian-controlled.
Answer: True



197. 
Multiple Choice
When should you check tire pressure?
A. Only before long trips
B. Monthly or before long trips
C. Only in summer
D. Never if tires look fine
Answer: B. Monthly or before long trips



198.
 True or False
You can park within 5 metres of a stop sign if it’s outside rush hour.
Answer: False 
(BC requires a 6-metre clearance.)



199. 
Multiple Choice
If your car begins to skid on ice, you should:
A. Brake hard
B. Steer gently in the direction you want to go
C. Accelerate
D. Turn sharply opposite to skid
Answer: B. Steer gently in the direction you want to go



200. 
True or False
When waiting to turn left, keep your wheels straight until you start turning.
Answer: True



201. 
Multiple Choice
If you’re stopped behind a school bus with red lights flashing, you must:
A. Wait until the lights stop flashing
B. Pass slowly
C. Honk to signal the driver
D. Only stop if children are visible
Answer: A. Wait until the lights stop flashing



202.
 True or False
You can legally drive through a yellow light if it’s safe to do so.
Answer: True



203. 
Multiple Choice
When approaching a construction zone with reduced speed limits, you should:
A. Follow posted limits at all times
B. Ignore if no workers are present
C. Speed up to clear quickly
D. Maintain normal speed unless stopped
Answer: A. Follow posted limits at all times



204. 
True or False
BC requires that headlights be used whenever windshield wipers are on.
Answer: True



205. 
Multiple Choice
What is the main reason for keeping both hands on the wheel?
A. Comfort
B. Better control in emergencies
C. Looks professional
D. To avoid ticket
Answer: B. Better control in emergencies



206. 
True or False
When reversing, you should depend only on your mirrors.
Answer: False 
(Always look over your shoulder.)



207. 
Multiple Choice
At an uncontrolled intersection, you should:
A. Proceed without slowing
B. Yield to traffic on your right
C. Always stop completely
D. Yield to the faster vehicle
Answer: B. Yield to traffic on your right



208.
 True or False
It’s okay to enter an intersection even if traffic is backed up on the other side.
Answer: False



209. 
Multiple Choice
If your brakes fail, what should you do first?
A. Pump the brakes
B. Turn off engine immediately
C. Accelerate to get control
D. Shift into high gear
Answer: A. Pump the brakes



210. 
True or False
When parking uphill without a curb, turn wheels toward the road.
Answer: False
(Turn wheels toward the edge of the road.)



211. 
Multiple Choice
How far should you stop from a railway crossing with flashing lights?
A. 1 metre
B. 5 metres
C. 15 metres
D. 25 metres
Answer: C. 15 metres



212. 
True or False
You should always signal when pulling out of a parking space.
Answer: True



213. 
Multiple Choice
What’s the safest way to merge into traffic?
A. Match the speed of traffic and signal early
B. Stop at the end of the merge lane
C. Enter at any speed
D. Weave between cars quickly
Answer: A. Match the speed of traffic and signal early



214. 
True or False
A steady green arrow means you can proceed in the direction of the arrow without yielding.
Answer: False 
(You must still yield to pedestrians.)



215.
 Multiple Choice
When should you use your horn?
A. To greet friends
B. To warn others of danger
C. In frustration
D. At night only
Answer: B. To warn others of danger



216. 
True or False
It’s okay to drive in the HOV lane if you are alone but in a hurry.
Answer: False



217. 
Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights, pull over
B. Speed up to reach your destination quickly
C. Keep driving using streetlights
D. Use high beams only
Answer: A. Turn on hazard lights, pull over



218. 
True or False
At night, you should dim your high beams when approaching another vehicle from behind.
Answer: True



219. 
Multiple Choice
How far ahead should you scan the road while driving in the city?
A. 5 seconds ahead
B. 10–15 seconds ahead
C. 20 seconds ahead
D. Only the vehicle in front
Answer: B. 10–15 seconds ahead



220. 
True or False
Hydroplaning can occur at speeds as low as 50 km/h if water is deep enough.
Answer: True



221.
 Multiple Choice
When passing a cyclist, you should allow at least:
A. 0.5 metres
B. 1 metre
C. 1.5 metres
D. 2 metres
Answer: C. 1.5 metres



222.
 True or False
Learners in BC may practise driving at night.
Answer: True 
(with a qualified supervisor.)



223.
 Multiple Choice
What should you do if your car skids while braking?
A. Release brake and steer in the direction you want to go
B. Brake harder
C. Accelerate
D. Steer in the opposite direction
Answer: A. Release brake and steer in the direction you want to go



224. 
True or False
Flashing amber lights on a vehicle mean it’s moving slower than traffic.
Answer: False 
(They usually indicate caution or turning.)



225. 
Multiple Choice
When driving in snow, which gear helps maintain control?
A. High gear
B. Neutral
C. Low gear
D. Reverse
Answer: C. Low gear



226.
 True or False
You must stop at all red lights, even if turning right, unless signs permit otherwise.
Answer: False
(You may turn right after stopping if not prohibited.)



227. 
Multiple Choice
If your rear wheels skid, what’s the first thing to do?
A. Brake hard
B. Steer into the skid
C. Accelerate
D. Steer opposite the skid
Answer: B. Steer into the skid



228.
 True or False
When parking uphill with a curb, turn wheels away from the curb.
Answer: True



229.
 Multiple Choice
A flashing green light at an intersection means:
A. Pedestrian-controlled light
B. Emergency vehicle ahead
C. Proceed with caution without stopping
D. Lane change required
Answer: A. Pedestrian-controlled light



230.
 True or False
At a stop sign, you must stop fully before the stop line or crosswalk.
Answer: True



231. 
Multiple Choice
When driving through a roundabout, you should:
A. Keep to the right of the central island
B. Keep to the left of the central island
C. Drive over the central island if clear
D. Stop in the roundabout if unsure
Answer: A. Keep to the right of the central island



232. 
True or False
You should accelerate while entering a curve to maintain speed.
Answer: False 
(Slow down before the curve.)



233.
 Multiple Choice
Which lane should you use for passing on a multi-lane road?
A. Right lane
B. Left lane
C. Any lane
D. Shoulder
Answer: B. Left lane



234.
 True or False
BC requires drivers to carry proof of insurance when operating a vehicle.
Answer: True



235.
 Multiple Choice
If an oncoming vehicle drifts into your lane, you should:
A. Honk, brake, and steer right
B. Speed up and pass
C. Steer left
D. Close your eyes and hope for the best
Answer: A. Honk, brake, and steer right



236. 
True or False
It’s legal to drive with your hazard lights on in heavy rain.
Answer: True 
(if you are warning other drivers.)



237. 
Multiple Choice
What is the main cause of skidding?
A. Sudden changes in speed or direction
B. Proper braking
C. Using winter tires
D. Driving slowly
Answer: A. Sudden changes in speed or direction



238. 
True or False
Animals crossing signs mean you should slow down and be ready to stop.
Answer: True



239. 
Multiple Choice
In heavy fog, you should:
A. Use low beam headlights
B. Use high beams
C. Use hazard lights only
D. Turn off lights
Answer: A. Use low beam headlights



240. 
True or False
When entering a highway from a ramp, it’s best to match the speed of traffic.
Answer: True



241. 
Multiple Choice
If a police officer signals you to pull over, you must:
A. Ignore if you think you did nothing wrong
B. Pull over safely to the right
C. Speed up to avoid blocking traffic
D. Stop in the middle of the lane
Answer: B. Pull over safely to the right



242. 
True or False
It’s illegal to park in front of a private driveway.
Answer: True



243.
 Multiple Choice
When should you use high beams?
A. In fog
B. On unlit rural roads without oncoming traffic
C. In the city
D. When following another car closely
Answer: B. On unlit rural roads without oncoming traffic



244.
 True or False
If you see a yield sign, you must always stop.
Answer: False 
(Only stop if necessary.)



245. 
Multiple Choice
When driving downhill in hot weather, you should:
A. Ride brakes continuously
B. Use lower gear to avoid overheating brakes
C. Coast in neutral
D. Turn off engine
Answer: B. Use lower gear to avoid overheating brakes



246.
 True or False
L Stage drivers must be accompanied by a supervisor aged 25 or older.
Answer: True



247.
 Multiple Choice
If your vehicle has ABS brakes, you should:
A. Pump the brake pedal
B. Apply firm, steady pressure
C. Avoid braking
D. Brake only after steering
Answer: B. Apply firm, steady pressure



248. 
True or False
The right lane is usually for slower-moving traffic.
Answer: True



249. 
Multiple Choice
When passing a large truck, you should:
A. Pass quickly and safely without lingering in blind spots
B. Pass slowly to be cautious
C. Honk continuously
D. Drive close to the truck
Answer: A. Pass quickly and safely without lingering in blind spots



250. 
True or False
Motorcycles can stop faster than most cars, so give extra space when following.
Answer: True



251. 
Multiple Choice
When should you check your tire pressure?
A. Only before a long trip
B. Once a month and before long trips
C. Only when tires look low
D. Only in winter
Answer: B. Once a month and before long trips



252. 
True or False
Driving at night requires slower speeds due to reduced visibility.
Answer: True



253.
 Multiple Choice
If your accelerator sticks, you should:
A. Turn off the ignition immediately
B. Shift to neutral and brake gently
C. Pump the gas pedal hard
D. Pull up the parking brake
Answer: B. Shift to neutral and brake gently



254. 
True or False
A flashing red traffic light means the same as a stop sign.
Answer: True



255. 
Multiple Choice
Which of these is NOT a safe driving habit?
A. Scanning ahead
B. Keeping a safe following distance
C. Driving with one hand on the wheel at all times
D. Checking mirrors regularly
Answer: C. Driving with one hand on the wheel at all times



256. 
True or False
Road rage incidents can lead to licence suspension.
Answer: True



257.
 Multiple Choice
If you are tired while driving, the safest choice is to:
A. Drink coffee and keep driving
B. Open windows for fresh air
C. Pull over in a safe place and rest
D. Increase your speed to finish sooner
Answer: C. Pull over in a safe place and rest



258.
 True or False
It is safe to drive with cruise control on wet or icy roads.
Answer: False



259. 
Multiple Choice
When approaching an intersection with blocked visibility, you should:
A. Proceed slowly, stopping if needed
B. Speed up to clear quickly
C. Honk before entering
D. Rely on mirrors only
Answer: A. Proceed slowly, stopping if needed



260. 
True or False
It’s legal to pass another vehicle within a school zone if under the speed limit.
Answer: False



261. 
Multiple Choice
If you hear a siren but cannot see the emergency vehicle, you should:
A. Pull over safely and wait until you know it’s clear
B. Continue driving normally
C. Stop immediately where you are
D. Turn left to avoid
Answer: A. Pull over safely and wait until you know it’s clear



262. 
True or False
Motorcyclists are entitled to a full lane of traffic space.
Answer: True



263. 
Multiple Choice
Which is the best way to handle a tailgater?
A. Brake suddenly to warn them
B. Maintain speed or change lanes safely
C. Accelerate away quickly
D. Ignore them
Answer: B. Maintain speed or change lanes safely



264.
 True or False
All intersections have painted crosswalk lines.
Answer: False



265. 
Multiple Choice
If your vehicle starts hydroplaning, you should:
A. Steer in the opposite direction
B. Ease off the accelerator and steer gently
C. Brake hard
D. Accelerate to regain control
Answer: B. Ease off the accelerator and steer gently



266.
 True or False
BC law requires daytime running lights on all vehicles.
Answer: True



267.
 Multiple Choice
If you miss your highway exit, you should:
A. Reverse carefully to the exit
B. Take the next exit
C. Make a U-turn immediately
D. Stop and wait for a gap
Answer: B. Take the next exit



268.
 True or False
A solid yellow line on your side of the road means passing is allowed.
Answer: False



269. 
Multiple Choice
When entering a curve, the safest method is to:
A. Brake in the curve
B. Slow down before entering
C. Accelerate into the curve
D. Maintain the same speed
Answer: B. Slow down before entering



270.
 True or False
You must stop for a pedestrian waiting at a marked crosswalk.
Answer: True



271. 
Multiple Choice
What should you do if your vehicle starts to skid on ice?
A. Steer into the skid and avoid braking hard
B. Brake hard and steer opposite
C. Accelerate out of the skid
D. Turn off the engine
Answer: A. Steer into the skid and avoid braking hard



272.
 True or False
Emergency vehicles always have the right of way.
Answer: True



273.
 Multiple Choice
When driving through a tunnel, you should:
A. Turn on low-beam headlights
B. Use high beams
C. Turn off headlights
D. Drive with hazard lights
Answer: A. Turn on low-beam headlights



274.
 True or False
In BC, winter tires are required on certain highways from October 1 to April 30.
Answer: True



275. 
Multiple Choice
When approaching a railway crossing without gates or lights, you should:
A. Slow down, look, and listen
B. Speed through
C. Stop only if you hear a train
D. Drive in the centre of the road
Answer: A. Slow down, look, and listen



276. 
True or False
Drivers must obey school crossing guards at all times.
Answer: True



277. 
Multiple Choice
What’s the safest following distance in ideal conditions?
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



278. 
True or False
Drivers can be fined for not clearing snow off their vehicle before driving.
Answer: True



279.
 Multiple Choice
If another driver is aggressive, you should:
A. Respond with gestures
B. Avoid eye contact and give space
C. Brake suddenly
D. Race away
Answer: B. Avoid eye contact and give space



280. 
True or False
It’s legal to park on a bridge if there’s room.
Answer: False



281. 
Multiple Choice
When changing lanes, you should:
A. Signal, check mirrors, shoulder check, then change lanes
B. Signal only if traffic is near
C. Move quickly without checking
D. Honk before moving
Answer: A. Signal, check mirrors, shoulder check, then change lanes



282. 
True or False
You must yield to pedestrians even if they are crossing against the light.
Answer: True
(if it prevents a collision.)



283.
 Multiple Choice
If another driver is tailgating you, you should:
A. Maintain a steady speed or change lanes safely
B. Brake hard to scare them
C. Speed up
D. Ignore and continue
Answer: A. Maintain a steady speed or change lanes safely

284. 
True or False
The speed limit in a lane marked with a diamond symbol is always 50 km/h.
Answer: False
(It depends on the posted limit.)



285. 
Multiple Choice
When backing out of a driveway into traffic, you must:
A. Yield to all approaching vehicles and pedestrians
B. Move quickly to avoid blocking
C. Honk and back up without stopping
D. Expect traffic to stop for you
Answer: A. Yield to all approaching vehicles and pedestrians



286. 
True or False
BC law requires you to stop at an amber light if safe to do so.
Answer: True



287.
 Multiple Choice
If you see flashing amber lights at a crosswalk, you should:
A. Slow down and be ready to stop for pedestrians
B. Maintain speed unless people are already crossing
C. Stop only if the light turns red
D. Honk to warn pedestrians
Answer: A. Slow down and be ready to stop for pedestrians



288.
 True or False
When parallel parking, you should be within 30 cm of the curb.
Answer: True



289. 
Multiple Choice
What’s the safest way to handle black ice?
A. Steer gently and avoid sudden braking
B. Accelerate to clear quickly
C. Brake sharply
D. Turn sharply
Answer: A. Steer gently and avoid sudden braking



290.
 True or False
It’s okay to leave children alone in a parked vehicle for a few minutes.
Answer: False



291.
 Multiple Choice
Which of these is a sign of aggressive driving?
A. Tailgating
B. Sudden lane changes
C. Excessive speeding
D. All of the above
Answer: D. All of the above



292. 
True or False
Your horn should be used mainly to alert others to danger.
Answer: True



293. 
Multiple Choice
When stopping behind a vehicle on a hill, you should:
A. Leave extra space in case the vehicle rolls back
B. Stop very close to prevent roll back
C. Apply the parking brake only
D. Shift into neutral
Answer: A. Leave extra space in case the vehicle rolls back



294. 
True or False
You can make a U-turn anywhere in BC as long as it’s safe.
Answer: False 
(U-turns are restricted in many locations.)



295. 
Multiple Choice
If your vehicle begins to fishtail, the correct response is to:
A. Steer gently in the same direction as the skid
B. Steer opposite the skid
C. Brake firmly
D. Shift into a higher gear
Answer: A. Steer gently in the same direction as the skid



296.
 True or False
When in doubt at an uncontrolled intersection, you should yield.
Answer: True



297. 
Multiple Choice
How often should you check your rear-view mirror?
A. Every 5–8 seconds
B. Once every minute
C. Only when changing lanes
D. Only in heavy traffic
Answer: A. Every 5–8 seconds



298. 
True or False
All passengers in a vehicle must wear a seatbelt or use a proper child restraint.
Answer: True



299. 
Multiple Choice
The main purpose of a shoulder check is to:
A. Check your blind spots
B. Adjust seating
C. Relax your neck muscles
D. Look for police
Answer: A. Check your blind spots



300. 
True or False
You may exceed the posted speed limit when overtaking another vehicle.
Answer: False



301. 
Multiple Choice
If you see a pedestrian with a white cane, you should:
A. Stop and give them the right of way
B. Honk to guide them
C. Pass carefully without stopping
D. Wave them across
Answer: A. Stop and give them the right of way



302. 
True or False
Texting while stopped at a red light is legal in BC.
Answer: False



303. 
Multiple Choice
When stopping on a wet road, you should:
A. Brake earlier and more gently
B. Brake as you would on a dry road
C. Pump brakes rapidly
D. Use only the parking brake
Answer: A. Brake earlier and more gently



304. 
True or False
The right of way is something you can take, not give.
Answer: False 
(It’s given to avoid collisions.)



305. 
Multiple Choice
If you’re being passed, you should:
A. Maintain speed or slow slightly
B. Speed up
C. Move into the passing lane
D. Honk
Answer: A. Maintain speed or slow slightly



306.
 True or False
In BC, you must stop for a school bus even if you are on the opposite side of an undivided road.
Answer: True



307.
 Multiple Choice
The safest way to handle glare from oncoming headlights is to:
A. Look slightly to the right edge of your lane
B. Stare at the lights
C. Close your eyes briefly
D. Use high beams
Answer: A. Look slightly to the right edge of your lane



308. 
True or False
A flashing green light in BC often means a pedestrian-controlled crossing.
Answer: True



309. 
Multiple Choice
When should you check your blind spots?
A. Before changing lanes or merging
B. Before turning
C. Before pulling out from a curb
D. All of the above
Answer: D. All of the above



310.
 True or False
Road shoulders are safe places to pass other vehicles.
Answer: False



311. 
Multiple Choice
The stopping distance on ice is approximately:
A. Twice the normal distance
B. Three times the normal distance
C. Four to ten times the normal distance
D. The same as dry roads
Answer: C. Four to ten times the normal distance



312. 
True or False
In BC, you can be fined for not yielding to a transit bus that signals to re-enter traffic.
Answer: True



313.
 Multiple Choice
When approaching a yield sign, you must:
A. Slow down and give way to traffic and pedestrians
B. Stop every time
C. Accelerate to merge quickly
D. Ignore it if the road looks clear
Answer: A. Slow down and give way to traffic and pedestrians



314. 
True or False
Your following distance should be increased in poor weather.
Answer: True



315.
 Multiple Choice
If you’re caught in a skid, what should you avoid?
A. Braking hard
B. Steering smoothly
C. Easing off the gas
D. Looking in the direction you want to go
Answer: A. Braking hard



316. 
True or False
You may park closer than 5 metres from a fire hydrant if it’s not marked.
Answer: False



317. 
Multiple Choice
If you must drive through deep water, you should:
A. Go slowly to avoid engine damage
B. Accelerate to get through quickly
C. Shift into high gear
D. Stop in the middle to check depth
Answer: A. Go slowly to avoid engine damage



318. 
True or False
Slower vehicles must use the right lane unless passing.
Answer: True



319.
 Multiple Choice
The most important factor in avoiding collisions is:
A. Driver awareness
B. Vehicle size
C. Road type
D. Car colour
Answer: A. Driver awareness



320. 
True or False
A pedestrian in a marked crosswalk always has the right of way.
Answer: True

321. 
Multiple Choice
If you are feeling angry or upset while driving, you should:
A. Pull over and calm down before continuing
B. Drive faster to get home
C. Honk more often
D. Overtake slower drivers aggressively
Answer: A. Pull over and calm down before continuing



322. 
True or False
It is safe to coast downhill in neutral to save fuel.
Answer: False 
(You lose control and braking power.)



323.
 Multiple Choice
Which of these is a common cause of rear-end collisions?
A. Following too closely
B. Driving too far apart
C. Using turn signals
D. Checking mirrors
Answer: A. Following too closely



324.
 True or False
When approaching a roundabout, you must yield to traffic already inside it.
Answer: True



325.
 Multiple Choice
If your horn fails, you should:
A. Use hand signals and lights to communicate
B. Drive without warning others
C. Avoid signaling intentions
D. Flash high beams constantly
Answer: A. Use hand signals and lights to communicate



326. 
True or False
The minimum safe following distance for motorcycles in good conditions is 2 seconds.
Answer: True



327. 
Multiple Choice
If you see a yellow flashing traffic light, you should:
A. Slow down and proceed with caution
B. Stop completely
C. Speed through quickly
D. Ignore it if no police are nearby
Answer: A. Slow down and proceed with caution



328. 
True or False
It’s acceptable to drive with your hazard lights on in heavy rain.
Answer: False 
(Only use them when stopped or moving very slowly in a hazard.)



329. 
Multiple Choice
When making a left turn from a one-way street onto another one-way street, you should:
A. Turn from the left curb lane to the left curb lane
B. Turn from any lane to any lane
C. Use the centre lane
D. Make the turn from the right lane
Answer: A. Turn from the left curb lane to the left curb lane



330. 
True or False
You must stop at all railway crossings in BC.
Answer: False 
(Only if warning devices are active or a train is approaching.)



331.
 Multiple Choice
If your engine overheats, you should:
A. Pull over, turn off the engine, and allow it to cool
B. Keep driving to reach your destination
C. Remove the radiator cap immediately
D. Pour cold water directly into the engine
Answer: A. Pull over, turn off the engine, and allow it to cool



332. 
True or False
Wet brakes may not work as well after driving through deep water.
Answer: True



333. 
Multiple Choice
The safest way to merge onto a freeway is to:
A. Match your speed to traffic in the lane you’re entering
B. Enter slowly and speed up once in
C. Stop at the end of the ramp
D. Use your horn to signal entry
Answer: A. Match your speed to traffic in the lane you’re entering



334.
 True or False
Pedestrians using crosswalks with flashing lights always have the right of way.
Answer: True



335. 
Multiple Choice
If a vehicle is in your blind spot, you should:
A. Wait until the spot is clear before changing lanes
B. Honk and move over
C. Speed up and force space
D. Slow abruptly
Answer: A. Wait until the spot is clear before changing lanes



336.
 True or False
When driving through a school zone, you must slow to 30 km/h during posted times.
Answer: True



337. 
Multiple Choice
If your vehicle starts to stall while crossing railway tracks, you should:
A. Exit the vehicle and move away from the tracks
B. Push the vehicle clear
C. Signal other drivers
D. Wait for a tow
Answer: A. Exit the vehicle and move away from the tracks



338. 
True or False
The left lane on multi-lane roads is generally for faster-moving traffic and passing.
Answer: True



339. 
Multiple Choice
To reduce glare from the sun, you can:
A. Use sunglasses and the sun visor
B. Drive with high beams on
C. Look directly at the sun briefly
D. Use hazard lights
Answer: A. Use sunglasses and the sun visor



340.
 True or False
It is illegal to block an intersection in BC.
Answer: True



341. 
Multiple Choice
If you need to brake in an emergency with ABS brakes, you should:
A. Press firmly on the brake pedal and hold
B. Pump the brakes repeatedly
C. Steer without braking
D. Use the parking brake only
Answer: A. Press firmly on the brake pedal and hold



342. 
True or False
Backing up is prohibited on freeways in BC.
Answer: True



343. 
Multiple Choice
Which lane should you use when passing on a multi-lane highway?
A. Left lane
B. Right lane
C. Any lane
D. Centre lane
Answer: A. Left lane



344. 
True or False
In BC, cyclists have the same rights and responsibilities as drivers.
Answer: True



345.
 Multiple Choice
The correct way to stop in icy conditions is to:
A. Brake gently and early
B. Brake hard and late
C. Accelerate to avoid skidding
D. Use only the parking brake
Answer: A. Brake gently and early



346. 
True or False
A driver must yield to a bus that has signaled to leave a bus stop in BC.
Answer: True



347.
 Multiple Choice
If you are involved in a collision, you must:
A. Stop, exchange information, and help anyone injured
B. Leave if damage is minor
C. Call police only if the vehicle is not drivable
D. Wait in your vehicle until help arrives without checking others
Answer: A. Stop, exchange information, and help anyone injured



348. 
True or False
In BC, all children under 9 years of age must be in an appropriate car seat or booster.
Answer: True



349. 
Multiple Choice
If you see an animal on the road, the safest action is to:
A. Slow down and be prepared to stop
B. Swerve sharply around it
C. Accelerate past it quickly
D. Honk continuously
Answer: A. Slow down and be prepared to stop



350.
 True or False
You should always maintain at least a one-car-length gap for every 20 km/h of speed.
Answer: True



351.
 Multiple Choice
When approaching a stop sign, you must stop:
A. Before the stop line or crosswalk
B. Directly in the intersection
C. Only if other vehicles are present
D. At least 5 metres back
Answer: A. Before the stop line or crosswalk



352. 
True or False
Flashing blue lights on a vehicle usually indicate a snow removal vehicle in BC.
Answer: True



353.
 Multiple Choice
If your vehicle begins to spin out of control, you should:
A. Steer where you want the front wheels to go
B. Steer opposite to the spin
C. Brake as hard as possible
D. Close your eyes and hold the wheel
Answer: A. Steer where you want the front wheels to go



354. 
True or False
You may legally cross a solid double yellow line to turn into a driveway.
Answer: True



355. 
Multiple Choice
When driving downhill, you should:
A. Use a lower gear to control speed
B. Coast in neutral
C. Use only the parking brake
D. Accelerate to maintain momentum
Answer: A. Use a lower gear to control speed



356. 
True or False
The “Move Over” law in BC requires drivers to slow down and change lanes when passing emergency vehicles stopped with lights flashing.
Answer: True



357.
 Multiple Choice
If your steering fails, you should:
A. Ease off the gas and brake gently
B. Accelerate to keep moving
C. Honk until others clear the road
D. Turn the wheel rapidly to test it
Answer: A. Ease off the gas and brake gently



358. 
True or False
In BC, you must carry your driver’s licence at all times while driving.
Answer: True



359. 
Multiple Choice
When merging, the vehicle already in the lane has the:
A. Right of way
B. Obligation to slow down
C. Obligation to move over
D. No priority over merging vehicles
Answer: A. Right of way



360.
 True or False
BC law requires drivers to slow down when passing a stopped school bus with flashing lights.
Answer: False 
(You must stop, not just slow down.)



361.
 Multiple Choice
If traffic lights are out at an intersection, you should:
A. Treat it as a four-way stop
B. Drive through without stopping
C. Follow the vehicle ahead
D. Wave others on first
Answer: A. Treat it as a four-way stop



362.
 True or False
In heavy traffic, it’s acceptable to block a crosswalk temporarily.
Answer: False



363. 
Multiple Choice
When towing a trailer, you should:
A. Allow more space for stopping and turning
B. Maintain the same following distance
C. Drive faster to reduce sway
D. Avoid using mirrors
Answer: A. Allow more space for stopping and turning



364. 
True or False
A green arrow traffic signal means you may turn in the direction of the arrow after yielding to pedestrians and vehicles.
Answer: True



365. 
Multiple Choice
If you see flashing lights at a railway crossing but no train, you should:
A. Stop and wait until the lights stop
B. Drive through quickly
C. Ignore if no horn is heard
D. Proceed cautiously
Answer: A. Stop and wait until the lights stop



366. 
True or False
Driving too slowly can be dangerous if it disrupts traffic flow.
Answer: True



367. 
Multiple Choice
When is it legal to use a high-occupancy vehicle (HOV) lane in BC?
A. When you meet the posted occupancy requirement
B. Anytime traffic is light
C. Only during rush hour
D. Only when driving alone
Answer: A. When you meet the posted occupancy requirement



368. 
True or False
Your stopping distance is the sum of your perception distance, reaction distance, and braking distance.
Answer: True



369. 
Multiple Choice
Which is the safest way to deal with icy bridges?
A. Slow down before crossing
B. Maintain high speed
C. Brake suddenly while on it
D. Accelerate to avoid slipping
Answer: A. Slow down before crossing



370. 
True or False
It’s okay to drive barefoot in BC.
Answer: True 
(but not recommended for safety.)



371. 
Multiple Choice
If your vehicle starts to fishtail, you should:
A. Steer gently in the direction you want to go
B. Steer opposite to the skid
C. Brake hard immediately
D. Accelerate quickly
Answer: A. Steer gently in the direction you want to go



372. 
True or False
It is legal to block a fire hydrant as long as someone remains in the vehicle.
Answer: False



373. 
Multiple Choice
The safest way to avoid fatigue is to:
A. Rest before driving and take breaks every 2 hours
B. Drink coffee only
C. Drive faster to finish sooner
D. Keep windows open
Answer: A. Rest before driving and take breaks every 2 hours

374. 
True or False
You may enter an intersection on a yellow light if you cannot stop safely.
Answer: True



375.
 Multiple Choice
When driving in heavy rain, hydroplaning can be reduced by:
A. Slowing down and avoiding sudden moves
B. Using cruise control
C. Driving in the outside lanes
D. Pumping the accelerator
Answer: A. Slowing down and avoiding sudden moves



376. 
True or False
You must always yield to pedestrians in unmarked crosswalks in BC.
Answer: True



377. 
Multiple Choice
If a driver behind you flashes their headlights, it usually means:
A. They want you to speed up
B. They want to pass
C. Your lights are off
D. Any of the above
Answer: D. Any of the above



378. 
True or False
When reversing, you must check mirrors but do not need to shoulder check.
Answer: False



379.
 Multiple Choice
Which of the following is NOT a defensive driving habit?
A. Anticipating hazards
B. Staying focused
C. Driving aggressively to deter others
D. Maintaining space around your vehicle
Answer: C. Driving aggressively to deter others



380. 
True or False
It is legal to use a handheld phone at red lights in BC.
Answer: False



381. 
Multiple Choice
When approaching a steep hill, large trucks may:
A. Travel slower than other vehicles
B. Accelerate faster
C. Stop unexpectedly
D. Use the centre of the road
Answer: A. Travel slower than other vehicles



382. 
True or False
School buses in BC may flash amber lights before stopping to load or unload children.
Answer: True



383. 
Multiple Choice
When is it safe to pass another vehicle on the right?
A. When the vehicle ahead is turning left and it is safe
B. In any situation
C. On a curve
D. In a no-passing zone
Answer: A. When the vehicle ahead is turning left and it is safe



384. 
True or False
A broken white line separates traffic moving in opposite directions.
Answer: False
(It separates traffic moving in the same direction.)



385. 
Multiple Choice
If your headlights suddenly dim while driving at night, you should:
A. Turn off other electrical devices
B. Pull over safely
C. Reduce speed
D. All of the above
Answer: D. All of the above



386. 
True or False
You should always adjust your mirrors after starting to drive.
Answer: False 
(Adjust before starting.)



387. 
Multiple Choice
What is the safest way to enter traffic from a driveway?
A. Stop and check in all directions before proceeding
B. Rely on mirrors only
C. Accelerate quickly without stopping
D. Use your horn before entering
Answer: A. Stop and check in all directions before proceeding



388. 
True or False
On wet roads, stopping distances can be doubled compared to dry roads.
Answer: True



389. 
Multiple Choice
When parallel parking, you should be within how many centimetres of the curb?
A. 15 cm
B. 30 cm
C. 45 cm
D. 60 cm
Answer: B. 30 cm



390.
 True or False
If a police officer directs you to go through a red light, you must obey.
Answer: True



391.
 Multiple Choice
If your turn signals fail, you should:
A. Use hand signals to indicate turns
B. Not turn until fixed
C. Drive without signaling
D. Flash headlights to turn
Answer: A. Use hand signals to indicate turns



392. 
True or False
The speed limit in an alley is generally 20 km/h in BC unless posted otherwise.
Answer: True



393.
 Multiple Choice
When stopping on an uphill slope, you should:
A. Turn wheels away from the curb if facing uphill with a curb
B. Turn wheels toward the curb if no curb
C. Use the parking brake
D. All of the above
Answer: D. All of the above



394. 
True or False
You can be fined for driving too slowly and obstructing traffic in BC.
Answer: True



395.
 Multiple Choice
If another driver does not dim high beams, you should:
A. Look toward the right edge of the road to avoid glare
B. Flash your high beams repeatedly
C. Close your eyes briefly
D. Honk at them
Answer: A. Look toward the right edge of the road to avoid glare



396. 
True or False
You must always signal at least 30 metres before turning in BC.
Answer: False 
(It’s at least 30 metres in cities, 100 metres on highways.)



397.
 Multiple Choice
The best way to reduce injury in a collision is to:
A. Wear your seatbelt
B. Hold the steering wheel loosely
C. Brace against the dashboard
D. Duck your head
Answer: A. Wear your seatbelt



398. 
True or False
In BC, studded tires are allowed during winter months.
Answer: True



399. 
Multiple Choice
If you stall in the middle of a busy intersection, you should:
A. Turn on hazard lights and try to restart quickly
B. Push the vehicle immediately
C. Exit the vehicle
D. Call a tow before moving
Answer: A. Turn on hazard lights and try to restart quickly


400. 
True or False
Blind spots can be eliminated entirely with correct mirror adjustment.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for British Columbia");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for British Columbia.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $britishColumbia->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded British Columbia citizenship questions.");
    }
}


