<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuebecDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $quebec = DrivingSection::firstOrCreate(
            ['title' => 'Quebec'],
            [
                'type' => 'province',
                'capital' => 'Quebec City',
                'flag' => '/images/flags/quebec.png',
                'description' => 'Quebec Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_highway_driving.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $quebec->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
In Quebec, the maximum speed limit in most urban areas is:
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h



2. 
True or False
It is legal to cross a solid double yellow line when overtaking another vehicle.
Answer: False



3. 
Multiple Choice
When approaching a school bus with flashing red lights, you must:
A. Slow down and pass carefully
B. Stop at least 5 metres away and wait until lights stop flashing
C. Honk to alert the driver
D. Only stop if children are crossing
Answer: B. Stop at least 5 metres away and wait until lights stop flashing



4.
 True or False
Cyclists in Quebec must follow the same traffic signals and signs as motor vehicles.
Answer: True



5. 
Multiple Choice
A flashing green light at an intersection in Quebec means:
A. Stop before proceeding
B. You may turn left, right, or go straight if safe
C. Only buses may go
D. Pedestrians have the right-of-way
Answer: B. You may turn left, right, or go straight if safe



6. 
True or False
In winter, using studded tires is allowed in Quebec between December 1 and March 15.
Answer: True



7. 
Multiple Choice
When you see a pedestrian at a marked crosswalk, you must:
A. Slow down but continue if no contact is made
B. Stop and yield the right-of-way
C. Honk to warn them
D. Drive around them
Answer: B. Stop and yield the right-of-way



8. 
True or False
It is acceptable to use a handheld phone while driving if you are at a red light.
Answer: False



9.
 Multiple Choice
When driving on a highway in Quebec, you should use the left lane for:
A. Passing other vehicles only
B. Driving slower to save fuel
C. Emergency stops
D. Parking in emergencies
Answer: A. Passing other vehicles only



10.
 True or False
Quebec law requires all passengers, regardless of age, to wear seatbelts.
Answer: True



11. 
Multiple Choice
A yellow diamond-shaped sign with a black deer symbol warns of:
A. Hunting area
B. Animal crossing
C. Farm nearby
D. Wildlife protection zone
Answer: B. Animal crossing



12. 
True or False
You can park within 3 metres of a fire hydrant in Quebec.
Answer: False



13.
 Multiple Choice
If your vehicle starts to skid on ice, the correct response is to:
A. Brake hard immediately
B. Steer gently in the direction you want to go
C. Turn the wheel sharply in the opposite direction
D. Accelerate to regain control
Answer: B. Steer gently in the direction you want to go



14. 
True or False
Motorcycles in Quebec are not required to have daytime running lights.
Answer: False



15.
 Multiple Choice
When approaching a railway crossing without barriers, you should:
A. Slow down, look both ways, and proceed if safe
B. Speed up to cross quickly
C. Stop only if you hear a train horn
D. Follow the vehicle in front without checking
Answer: A. Slow down, look both ways, and proceed if safe



16. 
True or False
Driving without valid insurance in Quebec can result in licence suspension.
Answer: True



17. 
Multiple Choice
What does a flashing red traffic light mean in Quebec?
A. Proceed without stopping
B. Stop, then proceed when safe
C. Stop and wait for green
D. Yield without stopping
Answer: B. Stop, then proceed when safe



18.
 True or False
Pedestrians always have the right-of-way at unmarked intersections in Quebec.
Answer: True



19.
 Multiple Choice
The legal blood alcohol concentration (BAC) limit for most drivers in Quebec is:
A. 0.05%
B. 0.08%
C. 0.10%
D. Zero tolerance for all drivers
Answer: B. 0.08%



20. 
True or False
Learner drivers in Quebec must always be accompanied by a licensed driver with at least two years of experience.
Answer: True



21.
 Multiple Choice
If an emergency vehicle approaches with lights and sirens, you must:
A. Continue driving at the same speed
B. Pull over to the right and stop
C. Speed up to avoid blocking them
D. Only move if they honk
Answer: B. Pull over to the right and stop



22.
 True or False
In Quebec, you may turn right on a red light in all municipalities.
Answer: False



23. 
Multiple Choice
When parallel parking downhill, you should turn your front wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Doesn’t matter
Answer: B. Toward the curb



24. 
True or False
Driving too slowly in the left lane can result in a fine in Quebec.
Answer: True



25. 
Multiple Choice
What does a solid yellow line next to your lane mean?
A. Passing is allowed at all times
B. Passing is prohibited
C. Passing is allowed only at night
D. Passing is allowed in winter
Answer: B. Passing is prohibited



26.
 True or False
Bicycles are considered vehicles under Quebec traffic laws.
Answer: True



27. 
Multiple Choice
If your car breaks down on the highway, you should:
A. Stop in the left lane
B. Pull over to the right shoulder and turn on hazard lights
C. Exit your vehicle immediately and walk on the roadway
D. Continue driving slowly with hazards on
Answer: B. Pull over to the right shoulder and turn on hazard lights



28. 
True or False
In Quebec, learner drivers must have zero alcohol in their system while driving.
Answer: True

29.
 Multiple Choice
When following another vehicle in winter, you should:
A. Keep the same following distance as in summer
B. Double or triple your following distance
C. Drive very close to prevent snow spray
D. Rely on ABS to stop faster
Answer: B. Double or triple your following distance



30.
 True or False
It is legal to use earphones in both ears while driving in Quebec.
Answer: False



31.
 Multiple Choice
A white rectangular sign with a black arrow pointing left means:
A. No left turn
B. Left turn only
C. Detour left
D. One-way street to the left
Answer: B. Left turn only



32. 
True or False
At uncontrolled intersections, the vehicle on the left has the right-of-way.
Answer: False



33. 
Multiple Choice
When driving through fog, you should:
A. Use high-beam headlights
B. Use low-beam headlights
C. Use hazard lights only
D. Drive with parking lights
Answer: B. Use low-beam headlights



34. 
True or False
You can be fined for not clearing snow from your vehicle before driving in Quebec.
Answer: True



35.
 Multiple Choice
When approaching a green light that has been on for a while, you should:
A. Prepare to stop in case it turns yellow
B. Accelerate to cross quickly
C. Maintain speed without checking
D. Honk to warn other drivers
Answer: A. Prepare to stop in case it turns yellow



36. 
True or False
On icy roads, braking distances can be up to ten times longer than on dry pavement.
Answer: True



37. 
Multiple Choice
If a traffic light turns yellow while you are approaching, you should:
A. Speed up to beat the red
B. Stop if safe to do so
C. Ignore it and proceed
D. Honk to warn others
Answer: B. Stop if safe to do so



38. 
True or False
In Quebec, winter tires are mandatory from December 1 to March 15.
Answer: True



39.
 Multiple Choice
When approaching a construction zone, you should:
A. Maintain your normal speed
B. Follow posted reduced speed limits and watch for workers
C. Honk to warn workers
D. Change lanes quickly
Answer: B. Follow posted reduced speed limits and watch for workers



40. 
True or False
You may park in a space reserved for disabled persons if you are in a hurry and the spot is empty.
Answer: False



41.
 Multiple Choice
What does a red and white triangular sign mean?
A. Stop
B. Yield the right-of-way
C. No entry
D. School zone
Answer: B. Yield the right-of-way



42. 
True or False
Learner drivers in Quebec may drive alone after 6 months.
Answer: False



43.
 Multiple Choice
If your brakes fail while driving, you should:
A. Pump the brake pedal and downshift to lower gear
B. Turn off the engine immediately
C. Speed up to find a safe place
D. Jump out of the vehicle
Answer: A. Pump the brake pedal and downshift to lower gear



44. 
True or False
A solid white line between lanes means lane changes are discouraged.
Answer: True



45. 
Multiple Choice
When entering a highway, you should:
A. Merge at the same speed as traffic
B. Stop at the end of the ramp
C. Drive slowly until someone lets you in
D. Signal only after merging
Answer: A. Merge at the same speed as traffic



46. 
True or False
You must always stop when turning right at a red light, even if there are no pedestrians.
Answer: True



47. 
Multiple Choice
What should you do when your vehicle hydroplanes?
A. Brake hard immediately
B. Ease off the accelerator and steer straight
C. Turn sharply to regain traction
D. Accelerate quickly
Answer: B. Ease off the accelerator and steer straight



48.
 True or False
Driving with a cracked windshield is always legal in Quebec.
Answer: False



49. 
Multiple Choice
In Quebec, the minimum age to obtain a learner’s licence is:
A. 15
B. 16
C. 17
D. 18
Answer: B. 16



50.
 True or False
Vehicles must yield to buses that are signaling to leave a bus stop in Quebec.
Answer: True


51.
 Multiple Choice
When approaching a roundabout in Quebec, you must:
A. Enter quickly to avoid slowing down
B. Yield to traffic already in the roundabout
C. Stop completely before entering
D. Honk before entering
Answer: B. Yield to traffic already in the roundabout



52. 
True or False
It is mandatory to signal before leaving a roundabout.
Answer: True



53. 
Multiple Choice
If you see a flashing pedestrian crossing light ahead, you should:
A. Continue at the same speed
B. Slow down and be ready to stop
C. Stop immediately regardless of traffic
D. Change lanes quickly
Answer: B. Slow down and be ready to stop



54. 
True or False
All children under 145 cm in height must use an appropriate child restraint system.
Answer: True



55. 
Multiple Choice
What does a white rectangular sign with a black arrow pointing straight mean?
A. One-way ahead
B. Straight ahead only
C. Pedestrian crossing ahead
D. No left or right turn allowed
Answer: B. Straight ahead only



56. 
True or False
In Quebec, you must turn on headlights half an hour after sunset and keep them on until half an hour before sunrise.
Answer: True



57. 
Multiple Choice
When driving behind a motorcycle, you should:
A. Maintain a larger following distance than with a car
B. Follow closely for protection from wind
C. Pass immediately
D. Use your high beams to be visible
Answer: A. Maintain a larger following distance than with a car



58.
 True or False
You are allowed to block an intersection if traffic is stopped ahead.
Answer: False



59.
 Multiple Choice
If a tire blows out while driving, you should:
A. Steer firmly and slow down gradually
B. Brake hard immediately
C. Accelerate to regain control
D. Turn sharply to the shoulder
Answer: A. Steer firmly and slow down gradually



60. 
True or False
Quebec law requires drivers to remove snow and ice from their vehicles before driving.
Answer: True



61. 
Multiple Choice
When merging onto a highway from an acceleration lane, you must:
A. Match the speed of highway traffic before merging
B. Stop before entering
C. Drive slowly until someone lets you in
D. Use hazard lights while merging
Answer: A. Match the speed of highway traffic before merging



62.
 True or False
It is legal to park in front of a private driveway as long as you leave space for a bicycle.
Answer: False



63. 
Multiple Choice
What is the penalty for refusing a roadside breath test in Quebec?
A. No penalty if you haven’t been drinking
B. Same penalty as driving over the legal BAC
C. A verbal warning only
D. Vehicle impoundment only
Answer: B. Same penalty as driving over the legal BAC



64.
 True or False
A driver may turn left across a solid double line to enter a private driveway.
Answer: True



65.
 Multiple Choice
When driving near a large truck, you should avoid:
A. Driving in its blind spots
B. Leaving space when passing
C. Signaling before changing lanes
D. Using your horn if needed
Answer: A. Driving in its blind spots



66.
 True or False
The maximum speed limit on rural highways in Quebec is typically 100 km/h.
Answer: True



67. 
Multiple Choice
If you miss your highway exit, you should:
A. Reverse carefully to the exit
B. Continue to the next exit
C. Stop on the shoulder and back up
D. Make a U-turn on the highway
Answer: B. Continue to the next exit


68. 
True or False
You must yield to pedestrians even if they are crossing illegally.
Answer: True



69. 
Multiple Choice
When approaching a stop sign with no stop line or crosswalk, you should stop:
A. At the edge of the intersection
B. Anywhere before the sign
C. Exactly beside the sign
D. A full car length before the intersection
Answer: A. At the edge of the intersection



70.
 True or False
Using a GPS screen is allowed while driving, as long as it is mounted and does not obstruct your view.
Answer: True



71.
 Multiple Choice
On a multi-lane road, a solid white line between lanes means:
A. Lane changes are discouraged
B. Lane changes are prohibited
C. Lane changes are mandatory
D. Passing is allowed freely
Answer: A. Lane changes are discouraged



72. 
True or False
In Quebec, a supervising driver for a learner must be seated in the back seat.
Answer: False



73.
 Multiple Choice
If your vehicle begins to fishtail on a slippery road, you should:
A. Steer gently in the direction of the skid
B. Turn sharply in the opposite direction
C. Brake hard immediately
D. Accelerate to straighten out
Answer: A. Steer gently in the direction of the skid



74.
 True or False
You can be fined for driving without a valid licence in Quebec.
Answer: True



75.
 Multiple Choice
When you see an orange sign with a worker symbol, you should:
A. Continue at the same speed
B. Slow down and watch for workers and equipment
C. Drive in the left lane only
D. Honk to warn workers
Answer: B. Slow down and watch for workers and equipment



76. 
True or False
It is legal to pass a stopped school bus with flashing red lights if you are on the opposite side of a divided highway.
Answer: True



77.
 Multiple Choice
When parallel parking uphill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Away from the curb



78.
 True or False
Drivers must dim their high beams when following another vehicle within 150 metres.
Answer: True



79.
 Multiple Choice
A yellow road sign with a curved arrow indicates:
A. Dead end ahead
B. Sharp curve ahead
C. No passing zone
D. Road narrows ahead
Answer: B. Sharp curve ahead



80. 
True or False
In Quebec, all new drivers must complete a mandatory driving course before obtaining a full licence.
Answer: True



81. 
Multiple Choice
A sign with two arrows pointing in opposite directions means:
A. Two-way traffic ahead
B. Passing allowed in both directions
C. Lanes merging
D. Road narrows
Answer: A. Two-way traffic ahead



82.
 True or False
Motorcycles may use the same lanes as cars and are entitled to a full lane.
Answer: True


83.
 Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral and brake gently
B. Turn off the ignition immediately while driving
C. Pull the accelerator up with your foot while accelerating
D. Continue until it unsticks on its own
Answer: A. Shift to neutral and brake gently



84.
 True or False
In Quebec, it is mandatory to carry proof of insurance while driving.
Answer: True



85. 
Multiple Choice
A red circle with a diagonal slash over a black arrow means:
A. No entry
B. No turn in the direction of the arrow
C. Proceed with caution
D. No stopping
Answer: B. No turn in the direction of the arrow



86. 
True or False
Driving with only one functioning headlight is legal if you avoid highways.
Answer: False



87.
 Multiple Choice
When two vehicles arrive at an uncontrolled intersection at the same time, the right-of-way goes to:
A. The larger vehicle
B. The vehicle on the right
C. The vehicle on the left
D. The faster vehicle
Answer: B. The vehicle on the right



88.
 True or False
Road rage incidents can lead to criminal charges in Quebec.
Answer: True



89. 
Multiple Choice
If your vehicle stalls on railway tracks and a train is approaching, you should:
A. Stay inside and call for help
B. Push the car off the tracks
C. Exit immediately and move away from the tracks
D. Stand beside the car to warn the train
Answer: C. Exit immediately and move away from the tracks



90. 
True or False
It is legal to park on a sidewalk if no pedestrians are present.
Answer: False



91. 
Multiple Choice
When driving through a tunnel, you should:
A. Turn on your hazard lights
B. Use low-beam headlights
C. Use high-beam headlights
D. Drive with parking lights only
Answer: B. Use low-beam headlights



92. 
True or False
You must yield to buses leaving a bus stop in Quebec when in a 50 km/h zone or lower.
Answer: True



93. 
Multiple Choice
If your windshield wipers fail during heavy rain, you should:
A. Continue at normal speed
B. Pull over safely and stop until it is safe to continue
C. Stick your head out the window to see
D. Follow the vehicle in front closely
Answer: B. Pull over safely and stop until it is safe to continue



94. 
True or False
Learner drivers may not tow a trailer in Quebec.
Answer: True



95.
 Multiple Choice
What does a pentagon-shaped yellow sign with two people walking indicate?
A. Playground zone
B. School zone or crossing
C. Pedestrian-only street
D. Hiking trail ahead
Answer: B. School zone or crossing



96.
 True or False
It is legal to drive barefoot in Quebec.
Answer: True



97. 
Multiple Choice
When approaching an intersection with a green arrow and a red light, you may:
A. Proceed only in the direction of the arrow
B. Stop completely regardless of the arrow
C. Proceed straight only
D. Make any turn
Answer: A. Proceed only in the direction of the arrow



98. 
True or False
Animals on rural roads should always be expected, especially at dawn and dusk.
Answer: True



99.
 Multiple Choice
The safest way to check your blind spot before changing lanes is to:
A. Use only your mirrors
B. Quickly glance over your shoulder
C. Listen for approaching vehicles
D. Signal and change lanes immediately
Answer: B. Quickly glance over your shoulder



100. 
True or False
In Quebec, failing to stop for a school bus with flashing red lights can result in demerit points and a fine.
Answer: True

101.
 Multiple Choice
When entering a street from a driveway, you must:
A. Yield to all vehicles and pedestrians
B. Enter quickly to join the traffic flow
C. Honk before entering
D. Only yield to vehicles, not pedestrians
Answer: A. Yield to all vehicles and pedestrians



102. 
True or False
In Quebec, you must slow down and move over when approaching a stationary emergency vehicle with flashing lights.
Answer: True



103. 
Multiple Choice
If traffic lights are not working at an intersection, you should:
A. Proceed as if it’s a four-way stop
B. Proceed without stopping
C. Yield only to vehicles on your right
D. Use your horn to signal
Answer: A. Proceed as if it’s a four-way stop



104.
 True or False
It is legal to overtake another vehicle on a curve if you can see clearly ahead.
Answer: False



105.
 Multiple Choice
When driving through an area with “Maximum 30 km/h” signs in a school zone, you must:
A. Obey the limit only during school hours
B. Obey the posted limit whenever it is indicated
C. Drive at 30 km/h only if children are present
D. Ignore if the road is empty
Answer: B. Obey the posted limit whenever it is indicated



106. 
True or False
A learner’s licence in Quebec is valid for 18 months.
Answer: True



107. 
Multiple Choice
When driving on a gravel road, you should:
A. Increase following distance and reduce speed
B. Drive faster to avoid dust
C. Drive in the middle of the road
D. Use high beams during the day
Answer: A. Increase following distance and reduce speed



108. 
True or False
In Quebec, winter tires must have a minimum tread depth of 1.6 mm.
Answer: False (Minimum is 3.5 mm)



109.
 Multiple Choice
What does a solid white stop line at an intersection indicate?
A. Optional stop
B. Where you must stop before proceeding
C. Pedestrian crossing
D. Parking zone
Answer: B. Where you must stop before proceeding



110. 
True or False
Driving at night without headlights is legal if streetlights are bright enough.
Answer: False



111. 
Multiple Choice
The correct procedure for making a left turn at an intersection is to:
A. Keep wheels turned left while waiting
B. Keep wheels straight until turning
C. Turn before entering the intersection
D. Use hazard lights while turning
Answer: B. Keep wheels straight until turning



112.
 True or False
In Quebec, the maximum speed in an alley is typically 20 km/h.
Answer: True



113.
 Multiple Choice
If you see a road sign with an airplane symbol, it means:
A. Airport nearby
B. Air ambulance station
C. Aerial surveillance zone
D. No flying drones allowed
Answer: A. Airport nearby



114. 
True or False
You must always use your turn signal before entering or leaving a parking space.
Answer: True



115. 
Multiple Choice
When two vehicles face each other and both want to turn left, they should:
A. Turn in front of each other
B. Turn behind each other
C. One should wait until the other finishes
D. Make U-turns instead
Answer: B. Turn behind each other



116.
 True or False
Motorists must yield to public transit buses leaving a stop in a 70 km/h zone.
Answer: False



117.
 Multiple Choice
What is the safest way to brake on a slippery road with ABS?
A. Pump the brakes
B. Apply firm, steady pressure on the brake pedal
C. Brake very lightly
D. Avoid braking entirely
Answer: B. Apply firm, steady pressure on the brake pedal



118. 
True or False
You may use your hazard lights while driving in heavy snow to increase visibility.
Answer: True



119. 
Multiple Choice
When approaching a railway crossing with lowered gates, you should:
A. Drive around the gates if no train is visible
B. Stop and wait until the gates are fully raised
C. Honk and proceed slowly
D. Reverse and find another route
Answer: B. Stop and wait until the gates are fully raised



120.
 True or False
You can park in a fire lane if you are sitting inside the vehicle.
Answer: False



121.
 Multiple Choice
What does a flashing green arrow mean at a traffic light?
A. You must stop before turning
B. You may turn in the arrow’s direction
C. You can turn in any direction
D. Proceed straight only
Answer: B. You may turn in the arrow’s direction



122.
 True or False
You must check your blind spot every time before changing lanes.
Answer: True



123.
 Multiple Choice
If you’re being followed too closely, you should:
A. Brake suddenly to warn the driver
B. Increase your following distance from the vehicle ahead
C. Speed up to get away
D. Ignore the tailgater
Answer: B. Increase your following distance from the vehicle ahead



124. 
True or False
It is legal to drive with your interior dome light on at night in Quebec.
Answer: True



125. 
Multiple Choice
The correct way to position your hands on the steering wheel is:
A. 9 and 3 o’clock positions
B. 10 and 2 o’clock positions
C. 8 and 4 o’clock positions
D. Any comfortable position
Answer: A. 9 and 3 o’clock positions



126. 
True or False
Using cruise control on icy roads is recommended for stability.
Answer: False



127. 
Multiple Choice
When approaching a yield sign, you must:
A. Slow down and give way if necessary
B. Stop every time before proceeding
C. Speed up to merge
D. Ignore if no traffic is visible
Answer: A. Slow down and give way if necessary



128. 
True or False
Motorists are required to give at least one metre of space when passing cyclists in a 50 km/h zone.
Answer: True



129. 
Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights and pull over
B. Speed up to reach a service station quickly
C. Use high beams from another car
D. Continue using only parking lights
Answer: A. Turn on hazard lights and pull over



130. 
True or False
You may drive in a reserved bus lane if you are making a turn at the next intersection.
Answer: True



131. 
Multiple Choice
What does a yellow diamond sign with merging arrows mean?
A. One-way street ahead
B. Lanes merging ahead
C. Divided highway ends
D. Road narrows
Answer: B. Lanes merging ahead



132.
 True or False
Learner drivers in Quebec are prohibited from driving between midnight and 5 a.m.
Answer: False



133. 
Multiple Choice
When a traffic light turns from red to green, you should:
A. Accelerate immediately
B. Check that the intersection is clear before moving
C. Honk to alert other drivers
D. Move without checking
Answer: B. Check that the intersection is clear before moving



134. 
True or False
In Quebec, it is illegal to coast downhill with your vehicle in neutral.
Answer: True



135.
 Multiple Choice
If you are feeling drowsy while driving, the best action is to:
A. Turn up the radio
B. Open a window
C. Pull over in a safe place and rest
D. Drink coffee while driving
Answer: C. Pull over in a safe place and rest



136.
 True or False
Pedestrians have priority over vehicles when crossing at a green light in their favour.
Answer: True



137.
 Multiple Choice
What is the maximum BAC for novice drivers in Quebec?
A. 0.05%
B. 0.08%
C. Zero tolerance
D. 0.02%
Answer: C. Zero tolerance



138. 
True or False
When entering a tunnel, it is mandatory to turn on your headlights.
Answer: True



139. 
Multiple Choice
If an approaching vehicle is using high beams at night, you should:
A. Look directly into their lights
B. Look toward the right side of your lane
C. Flash your own high beams continuously
D. Close your eyes briefly
Answer: B. Look toward the right side of your lane



140. 
True or False
It is acceptable to share one lane side-by-side with a motorcycle.
Answer: False



141. 
Multiple Choice
A red light with a green arrow means:
A. Stop and then turn in the arrow’s direction
B. Turn in the arrow’s direction without stopping
C. Wait for the light to turn green
D. Proceed straight only
Answer: A. Stop and then turn in the arrow’s direction



142. 
True or False
In Quebec, turning left on a red light from a one-way street onto another one-way street is permitted unless prohibited by a sign.
Answer: True



143. 
Multiple Choice
What should you do when approaching an intersection with a flashing yellow light?
A. Stop completely
B. Slow down and proceed with caution
C. Speed up to clear the intersection quickly
D. Yield to traffic from the left only
Answer: B. Slow down and proceed with caution



144. 
True or False
It is illegal to drive a vehicle without a functioning speedometer.
Answer: True



145.
 Multiple Choice
When driving at night on an unlit road, you should:
A. Use high beams when safe and dim them for oncoming vehicles
B. Use low beams only
C. Keep high beams on at all times
D. Use parking lights only
Answer: A. Use high beams when safe and dim them for oncoming vehicles



146. 
True or False
You must yield to vehicles already in a traffic circle before entering.
Answer: True



147. 
Multiple Choice
A broken yellow line on your side of the road means:
A. You may pass if the way is clear
B. Passing is prohibited
C. Passing is allowed only at night
D. Passing is allowed in school zones
Answer: A. You may pass if the way is clear



148.
 True or False
Drivers must yield to pedestrians at both marked and unmarked crosswalks.
Answer: True



149.
 Multiple Choice
What should you do if your brakes fail while going downhill?
A. Shift to a lower gear and use the parking brake gently
B. Turn off the ignition immediately
C. Speed up to reach a flat road
D. Jump out of the vehicle
Answer: A. Shift to a lower gear and use the parking brake gently



150. 
True or False
Drivers must slow down when passing stationary snow removal equipment.
Answer: True




151.
 Multiple Choice
When parking on a hill without a curb, you should turn your wheels:
A. Toward the edge of the road
B. Away from the edge of the road
C. Straight ahead
D. It does not matter
Answer: A. Toward the edge of the road



152. 
True or False
It is legal to leave your engine running while refuelling.
Answer: False



153. 
Multiple Choice
What is the safest action when being overtaken by another vehicle?
A. Maintain your speed and lane position
B. Speed up to prevent passing
C. Move to the left lane immediately
D. Honk to warn the driver
Answer: A. Maintain your speed and lane position



154.
 True or False
In Quebec, all registered vehicles must have daytime running lights.
Answer: True



155.
 Multiple Choice
When approaching a school zone with a crossing guard holding a stop sign, you must:
A. Stop only if children are present
B. Stop and remain stopped until sign is lowered
C. Slow down and proceed cautiously
D. Ignore if the road is empty
Answer: B. Stop and remain stopped until sign is lowered



156.
 True or False
It is mandatory to carry proof of insurance in your vehicle at all times.
Answer: True



157. 
Multiple Choice
On a two-lane highway, the left lane is primarily used for:
A. Passing slower vehicles
B. Parking during emergencies
C. Driving at a slower speed
D. Loading passengers
Answer: A. Passing slower vehicles



158.
 True or False
When driving in snow, using gentle acceleration helps prevent wheel spin.
Answer: True



159.
 Multiple Choice
When making a right turn, you should position your vehicle:
A. Close to the right-hand curb or edge of the road
B. In the middle of the lane
C. Close to the left edge
D. Anywhere in the lane
Answer: A. Close to the right-hand curb or edge of the road



160. 
True or False
A “no stopping” sign means you may load or unload passengers briefly.
Answer: False



161.
 Multiple Choice
What does a yellow sign with two arrows pointing in opposite directions mean?
A. Two-way traffic ahead
B. Divided highway begins
C. Passing allowed in both directions
D. Lanes merging
Answer: A. Two-way traffic ahead



162. 
True or False
You must dim your high beams within 300 metres of an oncoming vehicle.
Answer: True



163.
 Multiple Choice
If you are involved in a collision, you must:
A. Stop and exchange information with others involved
B. Leave immediately if your car is drivable
C. Only stop if there is visible damage
D. Wait until police arrive before moving your car
Answer: A. Stop and exchange information with others involved



164. 
True or False
Using a radar detector is legal in Quebec.
Answer: False



165. 
Multiple Choice
What is the first thing you should do if your vehicle catches fire?
A. Drive to a garage
B. Stop safely and get everyone out
C. Open the hood to see the fire
D. Throw water on the engine immediately
Answer: B. Stop safely and get everyone out



166.
 True or False
When reversing, you must yield to pedestrians and other vehicles.
Answer: True



167.
 Multiple Choice
When passing a cyclist in a zone over 50 km/h, you must leave at least:
A. 1 metre
B. 1.5 metres
C. 2 metres
D. No minimum distance required
Answer: B. 1.5 metres



168. 
True or False
Horns should only be used to avoid collisions, not to express frustration.
Answer: True



169. 
Multiple Choice
When entering a highway from an on-ramp, you should:
A. Accelerate to match the speed of traffic
B. Stop at the end of the ramp
C. Enter slowly to be cautious
D. Use hazard lights to signal entry
Answer: A. Accelerate to match the speed of traffic



170. 
True or False
It is illegal to drive with a cracked rear-view mirror in Quebec.
Answer: True



171. 
Multiple Choice
What does a blue sign with a white “P” symbol mean?
A. Parking allowed
B. Police checkpoint ahead
C. Permit required for parking
D. Passenger loading only
Answer: A. Parking allowed



172. 
True or False
You must come to a complete stop at a flashing red light.
Answer: True



173. 
Multiple Choice
If your vehicle begins to skid, you should:
A. Steer in the direction you want to go
B. Turn in the opposite direction
C. Brake hard immediately
D. Shift to neutral and release the steering
Answer: A. Steer in the direction you want to go



174. 
True or False
You can be fined for blocking a crosswalk, even if the light is green.
Answer: True



175. 
Multiple Choice
What should you do if you see a pedestrian about to cross at an unmarked intersection?
A. Continue driving
B. Slow down and yield the right-of-way
C. Honk to alert them
D. Drive around them
Answer: B. Slow down and yield the right-of-way



176.
 True or False
When parking on a hill, always engage the parking brake.
Answer: True



177. 
Multiple Choice
When a traffic light is red but a police officer signals you to go, you should:
A. Wait for the light to turn green
B. Follow the officer’s instructions
C. Ignore both and wait
D. Proceed slowly without looking
Answer: B. Follow the officer’s instructions



178.
 True or False
Learner drivers may drive on highways in Quebec if accompanied by a qualified driver.
Answer: True



179. 
Multiple Choice
What does a white diamond symbol painted on the road mean?
A. Reserved lane
B. School zone
C. Dangerous goods route
D. Bicycle path ahead
Answer: A. Reserved lane



180.
 True or False
It is legal to use your horn in a hospital zone at night.
Answer: False



181.
 Multiple Choice
When approaching an intersection with a stop sign, you must:
A. Stop fully before the crosswalk or stop line
B. Slow down and proceed if clear
C. Stop only if vehicles are coming
D. Honk before crossing
Answer: A. Stop fully before the crosswalk or stop line



182. 
True or False
Driving with your windows covered in frost is illegal in Quebec.
Answer: True



183.
 Multiple Choice
If your car starts to overheat, you should:
A. Turn off the engine and let it cool
B. Continue driving to the nearest garage without stopping
C. Remove the radiator cap immediately
D. Increase speed to cool the engine
Answer: A. Turn off the engine and let it cool



184. 
True or False
It is mandatory to yield to emergency vehicles even if they are traveling in the opposite direction.
Answer: True



185.
 Multiple Choice
When driving in rain and your vehicle begins to hydroplane, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn sharply
D. Accelerate to maintain control
Answer: A. Ease off the accelerator and steer straight



186. 
True or False
A flashing yellow arrow at an intersection means you may turn with caution.
Answer: True



187. 
Multiple Choice
When approaching a hill where visibility is limited, you should:
A. Stay in your lane and slow down
B. Pass quickly before the hill
C. Drive in the center of the road
D. Accelerate to maintain speed
Answer: A. Stay in your lane and slow down



188.
 True or False
Bicycles are not allowed to ride two abreast on Quebec roads.
Answer: False



189.
 Multiple Choice
If a pedestrian starts crossing at a flashing “don’t walk” signal, you should:
A. Stop and allow them to finish crossing
B. Drive around them quickly
C. Honk to warn them to hurry
D. Continue without slowing down
Answer: A. Stop and allow them to finish crossing



190. 
True or False
In Quebec, it is illegal to leave a child under 7 alone in a vehicle without supervision.
Answer: True



191. 
Multiple Choice
When driving on a wet road, hydroplaning is more likely if:
A. Tires are worn out
B. You drive at high speed
C. There is standing water
D. All of the above
Answer: D. All of the above



192. 
True or False
Learner drivers may carry any number of passengers if the supervising driver agrees.
Answer: True



193. 
Multiple Choice
When approaching an intersection with a green light but traffic is backed up ahead, you should:
A. Enter and stop in the intersection
B. Wait until there is enough space to clear it
C. Honk to make traffic move
D. Speed up to enter
Answer: B. Wait until there is enough space to clear it



194. 
True or False
Drivers must give way to pedestrians even outside designated crossings if they are already on the road.
Answer: True


195. 
Multiple Choice
If you see a road sign with a snowflake symbol, it warns of:
A. Ski area ahead
B. Slippery conditions due to ice or snow
C. Winter parking restrictions
D. Snow removal in progress
Answer: B. Slippery conditions due to ice or snow



196. 
True or False
You may park in front of a fire hydrant if you stay inside the vehicle.
Answer: False



197.
 Multiple Choice
What does a sign showing a truck going downhill indicate?
A. Steep descent ahead
B. Truck parking ahead
C. Truck inspection station ahead
D. Slow-moving vehicles ahead
Answer: A. Steep descent ahead



198. 
True or False
In Quebec, you may cross a solid yellow line to overtake a bicycle if safe.
Answer: True



199. 
Multiple Choice
If you see flashing amber lights on a school bus, it means:
A. Bus is stopping soon, slow down and prepare to stop
B. You may pass quickly before it stops
C. Stop immediately
D. Only stop if children are visible
Answer: A. Bus is stopping soon, slow down and prepare to stop



200.
 True or False
Quebec law requires you to keep your headlights on when windshield wipers are in use.
Answer: True




201. 
Multiple Choice
When turning left from a two-way street onto a one-way street, you should:
A. Turn into the right lane of the one-way street
B. Turn into any available lane
C. Turn into the left lane of the one-way street
D. Make a wide turn into the middle
Answer: C. Turn into the left lane of the one-way street



202. 
True or False
In Quebec, it is illegal to use a handheld electronic device while stopped at a red light.
Answer: True



203.
 Multiple Choice
What is the safest following distance under normal driving conditions?
A. One second
B. Two seconds
C. Three seconds
D. Four seconds
Answer: B. Two seconds



204. 
True or False
You must yield to a pedestrian who is using a white cane.
Answer: True



205. 
Multiple Choice
A yellow sign with a truck tipping over warns of:
A. Slippery bridge ahead
B. Dangerous curve for trucks
C. Overloaded truck inspection station
D. Steep incline
Answer: B. Dangerous curve for trucks


206. 
True or False
The left lane on a multi-lane highway is for faster-moving traffic and passing only.
Answer: True



207. 
Multiple Choice
If you are on a narrow road and a large vehicle is coming toward you, you should:
A. Keep your speed and lane position
B. Slow down and move to the right as far as safe
C. Move to the left to give them space
D. Stop in the middle of the road
Answer: B. Slow down and move to the right as far as safe



208. 
True or False
Learner drivers can drive without supervision in rural areas during daylight.
Answer: False



209.
 Multiple Choice
When parking parallel to a curb, the distance between your wheels and the curb should be:
A. Within 15 cm
B. Within 30 cm
C. Within 50 cm
D. Any distance is fine
Answer: B. Within 30 cm



210.
 True or False
Motorists must yield to public transit buses leaving a stop in zones with a limit of 50 km/h or less.
Answer: True



211.
 Multiple Choice
If your vehicle begins to skid while braking, you should:
A. Release the brakes and steer in the desired direction
B. Brake harder to regain traction
C. Accelerate to correct the skid
D. Turn the steering wheel sharply
Answer: A. Release the brakes and steer in the desired direction



212. 
True or False
A steady yellow traffic light warns that the signal is about to turn red.
Answer: True



213. 
Multiple Choice
A white rectangular sign with a black bicycle symbol means:
A. Bicycle crossing ahead
B. Bicycle lane only
C. Bicycles prohibited
D. Bicycle parking
Answer: B. Bicycle lane only



214.
 True or False
Drivers must turn on headlights when visibility is less than 150 metres.
Answer: True



215.
 Multiple Choice
When approaching a stop sign at a railway crossing, you must:
A. Stop, look both ways, and proceed when safe
B. Slow down but proceed if no train is visible
C. Stop only if lights are flashing
D. Wait until another vehicle crosses first
Answer: A. Stop, look both ways, and proceed when safe



216. 
True or False
The driver is responsible for ensuring all passengers under 16 wear seatbelts.
Answer: True



217. 
Multiple Choice
When making a U-turn, you must:
A. Ensure it is permitted by signage and safe to do so
B. Perform it anywhere as long as traffic is light
C. Use your hazard lights during the turn
D. Signal only after starting the turn
Answer: A. Ensure it is permitted by signage and safe to do so



218.
 True or False
A pedestrian has the right-of-way in a parking lot crosswalk.
Answer: True



219. 
Multiple Choice
If your brakes fail, the first step is to:
A. Pump the brake pedal
B. Turn off the ignition
C. Shift to neutral
D. Honk continuously
Answer: A. Pump the brake pedal



220. 
True or False
You must yield to vehicles already inside a rotary or traffic circle.
Answer: True



221.
 Multiple Choice
What is the purpose of rumble strips on a road?
A. To mark pedestrian crossings
B. To warn drivers through vibration and noise
C. To slow traffic in school zones
D. To prevent hydroplaning
Answer: B. To warn drivers through vibration and noise



222.
 True or False
Flashing amber lights at an intersection mean proceed with caution.
Answer: True



223. 
Multiple Choice
When driving in fog, you should:
A. Use high beams
B. Use low beams
C. Use hazard lights only
D. Drive without lights to reduce glare
Answer: B. Use low beams



224.
 True or False
You may cross a solid white line to avoid an obstruction if safe.
Answer: True



225. 
Multiple Choice
When approaching a yield sign, you should:
A. Slow down and prepare to stop if needed
B. Stop every time before proceeding
C. Speed up to merge quickly
D. Ignore if no vehicles are visible
Answer: A. Slow down and prepare to stop if needed



226. 
True or False
It is legal to exceed the speed limit when overtaking another vehicle.
Answer: False



227. 
Multiple Choice
What should you do if an oncoming driver fails to dim their high beams?
A. Flash your high beams briefly
B. Look directly at their lights
C. Sound your horn repeatedly
D. Slow down and stop immediately
Answer: A. Flash your high beams briefly



228. 
True or False
A broken white line between lanes means lane changes are permitted.
Answer: True



229.
 Multiple Choice
When should you use your vehicle’s horn?
A. Only to avoid collisions
B. To express frustration
C. To greet another driver
D. At every intersection
Answer: A. Only to avoid collisions



230. 
True or False
In Quebec, children under 12 are safest when seated in the back seat.
Answer: True



231.
 Multiple Choice
When exiting a highway, you should:
A. Signal and reduce speed in the deceleration lane
B. Brake hard in the travel lane
C. Exit without signaling
D. Stop before exiting
Answer: A. Signal and reduce speed in the deceleration lane



232.
 True or False
Pedestrians are not allowed to begin crossing when the “Don’t Walk” symbol is flashing.
Answer: True



233.
 Multiple Choice
When parking uphill with a curb, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Any direction
Answer: A. Away from the curb



234.
 True or False
A green arrow with a red light allows you to turn in the direction of the arrow after stopping.
Answer: True



235. 
Multiple Choice
What does a white rectangular sign with a black arrow and a red slash mean?
A. Turn allowed
B. Turn prohibited
C. Yield to oncoming traffic
D. One-way street
Answer: B. Turn prohibited



236. 
True or False
In Quebec, all motor vehicles must be registered to be driven on public roads.
Answer: True



237. 
Multiple Choice
If you are blinded by oncoming headlights, you should:
A. Look toward the right edge of the road
B. Look directly into the lights
C. Close your eyes briefly
D. Honk at the driver
Answer: A. Look toward the right edge of the road



238.
 True or False
You can pass a vehicle stopped at a crosswalk if no pedestrians are visible.
Answer: False



239.
 Multiple Choice
When approaching a construction flagger, you must:
A. Follow the flagger’s signals at all times
B. Ignore signals if the road is clear
C. Honk and continue
D. Speed up to pass quickly
Answer: A. Follow the flagger’s signals at all times



240. 
True or False
A lane with a solid diamond marking is reserved for certain vehicles during posted hours.
Answer: True



241. 
Multiple Choice
What should you do if you miss your highway exit?
A. Continue to the next exit
B. Reverse to the exit
C. Stop on the shoulder and back up
D. Make a U-turn on the highway
Answer: A. Continue to the next exit



242. 
True or False
You must always signal before leaving a roundabout.
Answer: True



243.
 Multiple Choice
What does a solid double yellow line mean?
A. Passing prohibited in both directions
B. Passing allowed in both directions
C. Passing allowed only at night
D. Passing allowed for heavy vehicles only
Answer: A. Passing prohibited in both directions



244. 
True or False
It is mandatory to wear a seatbelt at all times while driving in Quebec.
Answer:True

245.
 Multiple Choice
When stopping behind a school bus with flashing red lights, you must stop at least:
A. 2 metres away
B. 5 metres away
C. 10 metres away
D. 15 metres away
Answer: B. 5 metres away



246. 
True or False
Driving too slowly in the left lane can result in a fine.
Answer: True



247.
 Multiple Choice
What does a flashing pedestrian crossing light indicate?
A. Be prepared to stop for pedestrians
B. Proceed without slowing
C. Crosswalk closed ahead
D. Police checkpoint ahead
Answer: A. Be prepared to stop for pedestrians



248. 
True or False
You must remove all snow from your roof before driving.
Answer: True



249. 
Multiple Choice
If your vehicle hydroplanes, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn sharply to regain traction
D. Accelerate to dry the tires
Answer: A. Ease off the accelerator and steer straight



250.
 True or False
In Quebec, emergency vehicles always have the right-of-way when using lights and sirens.
Answer: True

251.
 Multiple Choice
When entering a highway from an acceleration lane, you should:
A. Stop before merging
B. Match the speed of highway traffic before merging
C. Merge at a much slower speed
D. Use hazard lights while merging
Answer: B. Match the speed of highway traffic before merging



252. 
True or False
In Quebec, you can be fined for idling your vehicle unnecessarily.
Answer: True



253. 
Multiple Choice
If you see a sign showing a moose, it means:
A. Wildlife crossing area
B. Hunting area ahead
C. Forest preserve ahead
D. No entry for animals
Answer: A. Wildlife crossing area



254. 
True or False
Motorcyclists must wear an approved helmet while riding in Quebec.
Answer: True



255. 
Multiple Choice
When driving in heavy rain, you should:
A. Use high beams
B. Use low beams and reduce speed
C. Drive without lights
D. Increase your speed to pass quickly
Answer: B. Use low beams and reduce speed



256. 
True or False
A flashing green light at an intersection means you may go in any direction if safe.
Answer: True



257. 
Multiple Choice
When approaching a hill with limited visibility, you should:
A. Stay to the right side of your lane
B. Drive in the middle of the road
C. Speed up to maintain momentum
D. Pass slower vehicles
Answer: A. Stay to the right side of your lane



258. 
True or False
It is legal to exceed the speed limit when overtaking a slow vehicle on a rural road.
Answer: False



259.
 Multiple Choice
What is the primary purpose of a vehicle’s head restraint?
A. To improve comfort on long drives
B. To prevent whiplash in a collision
C. To help with rear visibility
D. To store safety equipment
Answer: B. To prevent whiplash in a collision



260.
 True or False
In Quebec, winter tires are mandatory for all passenger vehicles from December 1 to March 15.
Answer: True



261.
 Multiple Choice
If your vehicle starts to skid on ice, the best action is to:
A. Steer in the direction you want to go and avoid braking hard
B. Turn sharply in the opposite direction
C. Accelerate quickly to regain traction
D. Pump the brakes rapidly
Answer: A. Steer in the direction you want to go and avoid braking hard



262. 
True or False
It is legal to park within 5 metres of a pedestrian crosswalk.
Answer: False



263. 
Multiple Choice
When driving through a construction zone, you should:
A. Follow posted speed limits even if workers are absent
B. Drive at your normal speed if no workers are visible
C. Overtake slow vehicles aggressively
D. Honk to alert workers
Answer: A. Follow posted speed limits even if workers are absent



264. 
True or False
The maximum speed in an alley in Quebec is usually 20 km/h.
Answer: True



265.
 Multiple Choice
What should you do when merging into traffic from a side street?
A. Yield to all oncoming vehicles
B. Enter quickly without stopping
C. Expect other drivers to slow for you
D. Signal only after merging
Answer: A. Yield to all oncoming vehicles



266.
 True or False
It is legal to leave a pet unattended in a vehicle during hot weather.
Answer: False



267.
 Multiple Choice
A sign with a curved arrow and a speed limit below it means:
A. Advisory speed for the curve ahead
B. Minimum speed allowed in the curve
C. Speed limit for straight sections only
D. Mandatory speed for all roads
Answer: A. Advisory speed for the curve ahead



268.
 True or False
Drivers must always yield to pedestrians in school zones, even outside crossing hours.
Answer: True



269. 
Multiple Choice
What should you do if your view is blocked at an intersection?
A. Move forward slowly until you can see clearly
B. Proceed without stopping
C. Rely only on mirrors
D. Honk before moving forward
Answer: A. Move forward slowly until you can see clearly



270. 
True or False
You may pass another vehicle on the right if they are turning left and there is enough space.
Answer: True



271. 
Multiple Choice
If your car battery dies, you can start the engine using:
A. A jump-start from another vehicle
B. The air conditioning system
C. The emergency brake
D. The headlights
Answer: A. A jump-start from another vehicle


272.
 True or False
In Quebec, cyclists must ride in the same direction as traffic.
Answer: True



273.
 Multiple Choice
When approaching a flashing yellow pedestrian light, you must:
A. Slow down and be ready to stop
B. Drive at normal speed
C. Stop only if pedestrians are visible
D. Ignore the light
Answer: A. Slow down and be ready to stop



274.
 True or False
The use of snow chains is permitted in Quebec under certain conditions.
Answer: True



275. 
Multiple Choice
What should you do when your vehicle begins to hydroplane?
A. Ease off the accelerator and steer straight
B. Brake hard to slow down
C. Turn the wheel quickly
D. Accelerate to push through
Answer: A. Ease off the accelerator and steer straight



276. 
True or False
A solid white line on the right edge of the roadway indicates the edge of the traffic lane.
Answer: True



277. 
Multiple Choice
When driving behind a large truck, you should:
A. Stay far enough back to see its mirrors
B. Follow closely to reduce wind resistance
C. Stay directly behind the truck at all times
D. Pass without signaling
Answer: A. Stay far enough back to see its mirrors



278. 
True or False
You can be fined for splashing pedestrians when driving through puddles.
Answer: True



279. 
Multiple Choice
What does a red octagon-shaped sign mean?
A. Stop
B. Yield
C. Do not enter
D. No stopping
Answer: A. Stop



280. 
True or False
When parallel parking, you must signal before stopping to park.
Answer: True



281. 
Multiple Choice
If you hear a siren but cannot see the emergency vehicle, you should:
A. Slow down, check mirrors, and prepare to yield
B. Continue at your current speed
C. Stop immediately
D. Turn on hazard lights and continue
Answer: A. Slow down, check mirrors, and prepare to yield



282.
 True or False
You must stop for a pedestrian using a guide dog.
Answer: True



283. 
Multiple Choice
When driving in a residential area, you should:
A. Watch for children and obey posted speed limits
B. Use high beams to improve visibility
C. Drive faster if the road is empty
D. Avoid using turn signals
Answer: A. Watch for children and obey posted speed limits



284. 
True or False
The driver is responsible for ensuring cargo is secured before driving.
Answer: True



285.
 Multiple Choice
A broken yellow line between lanes means:
A. Passing allowed if safe
B. Passing prohibited
C. Passing allowed only at night
D. Passing allowed for trucks only
Answer: A. Passing allowed if safe



286. 
True or False
When parking uphill without a curb, turn your wheels toward the edge of the road.
Answer: True



287. 
Multiple Choice
What should you do before entering a tunnel?
A. Turn on low-beam headlights
B. Turn on high beams
C. Turn off all lights
D. Slow down to 10 km/h
Answer: A. Turn on low-beam headlights



288.
 True or False
It is legal to pass another vehicle in a school zone if under the speed limit.
Answer: False



289. 
Multiple Choice
When driving near a cyclist, you must leave at least:
A. 1 metre in zones of 50 km/h or less
B. 2 metres in all zones
C. 50 cm at all times
D. 3 metres only in rural areas
Answer: A. 1 metre in zones of 50 km/h or less

290. 
True or False
Cyclists must signal turns and stops using hand signals.
Answer: True



291.
 Multiple Choice
What should you do if a tire blows out while driving?
A. Steer firmly, ease off the accelerator, and slow gradually
B. Brake hard immediately
C. Accelerate to regain control
D. Turn sharply to the shoulder
Answer: A. Steer firmly, ease off the accelerator, and slow gradually



292.
 True or False
Drivers must always yield to buses re-entering traffic in a 50 km/h zone or less.
Answer: True



293. 
Multiple Choice
A sign with a bicycle and pedestrian symbol means:
A. Shared path for cyclists and pedestrians
B. No cycling allowed
C. Pedestrian crossing only
D. Bike path only
Answer: A. Shared path for cyclists and pedestrians



294. 
True or False
It is legal to park in a bike lane if it’s after business hours.
Answer: False



295. 
Multiple Choice
When driving on icy roads, stopping distances can be up to:
A. 2 times longer than normal
B. 5 times longer than normal
C. 10 times longer than normal
D. 20 times longer than normal
Answer: C. 10 times longer than normal



296.
 True or False
Learner drivers must always have their learner’s licence with them while driving.
Answer: True



297. 
Multiple Choice
When approaching an uncontrolled intersection, you must:
A. Yield to vehicles on your right
B. Proceed without slowing
C. Yield to vehicles on your left
D. Stop only if other cars are present
Answer: A. Yield to vehicles on your right



298. 
True or False
It is safe to rest your foot on the brake pedal while driving to be ready for sudden stops.
Answer: False



299. 
Multiple Choice
What does a sign showing a car and wavy lines mean?
A. Slippery road ahead
B. Road under repair
C. Curvy road ahead
D. Water on the road
Answer: A. Slippery road ahead



300. 
True or False
In Quebec, seatbelt use is required for all passengers, regardless of age.
Answer: True

301. 
Multiple Choice
When approaching a pedestrian at an unmarked crosswalk, you must:
A. Slow down but continue
B. Stop and yield the right-of-way
C. Honk to warn them
D. Drive around them
Answer: B. Stop and yield the right-of-way



302. 
True or False
In Quebec, you must always obey traffic signs even if a police officer gives different instructions.
Answer: False



303. 
Multiple Choice
What is the best way to reduce glare from the sun while driving?
A. Wear sunglasses and use the sun visor
B. Close your eyes briefly
C. Look down at the dashboard
D. Drive with headlights on high beam
Answer: A. Wear sunglasses and use the sun visor



304. 
True or False
You can be fined for not clearing snow from your vehicle’s roof.
Answer: True



305. 
Multiple Choice
When turning right at an intersection, you must:
A. Yield to pedestrians and cyclists crossing
B. Turn without slowing down
C. Honk to warn others
D. Ignore pedestrians unless in a crosswalk
Answer: A. Yield to pedestrians and cyclists crossing



306.
 True or False
It is legal to park in front of a fire hydrant if your car is running.
Answer: False



307. 
Multiple Choice
What should you do if you miss your turn while driving?
A.Continue to the next safe location to turn around
B. Reverse to the missed turn
C. Make a sudden U-turn in traffic
D. Stop abruptly
Answer: A. Continue to the next safe location to turn around



308. 
True or False
Motorcycles are allowed to share lanes side-by-side with cars in Quebec.
Answer: False



309.
 Multiple Choice
When driving at night, you should:
A. Reduce your speed to match visibility
B. Drive at the posted speed limit regardless of visibility
C. Use high beams in all situations
D. Focus only on the centre of the road
Answer: A. Reduce your speed to match visibility



310.
 True or False
A steady green light means you may proceed if the intersection is clear.
Answer: True



311. 
Multiple Choice
What does a yellow sign with a pedestrian figure mean?
A. School zone
B. Pedestrian crossing ahead
C. Playground zone
D. Hiking trail
Answer: B. Pedestrian crossing ahead



312.
True or False
In Quebec, learner drivers must be accompanied by a fully licensed driver with at least two years’ experience.
Answer: True



313.
 Multiple Choice
When a school bus is stopped with flashing red lights, you must stop:
A. Only if children are visible
B. Regardless of whether children are present
C. Only if you are traveling in the same direction
D. Only in residential areas
Answer: B. Regardless of whether children are present



314.
 True or False
It is legal to pass another vehicle in a no-passing zone if no one is coming.
Answer: False



315.
 Multiple Choice
If you see a sign with a truck on a steep hill, it means:
A. Steep descent ahead
B. Truck inspection station ahead
C. Slow-moving trucks
D. Dangerous curve ahead
Answer: A. Steep descent ahead



316. 
True or False
A solid white line means lane changes are discouraged but not illegal.
Answer: True



317. 
Multiple Choice
When approaching a flashing red light at an intersection, you should:
A. Treat it like a stop sign
B. Drive through without stopping
C. Yield but do not stop
D. Honk and proceed
Answer: A. Treat it like a stop sign




318. 
True or False
Seatbelt use is mandatory for all passengers in a moving vehicle.
Answer: True



319.
 Multiple Choice
What should you do if your vehicle begins to skid?
A. Steer in the direction you want to go
B. Turn in the opposite direction
C. Brake hard immediately
D. Accelerate to regain control
Answer: A. Steer in the direction you want to go



320. 
True or False
Drivers may not wear headphones in both ears while operating a motor vehicle.
Answer: True



321. 
Multiple Choice
When driving through a playground zone, you must:
A. Slow down to the posted speed limit
B. Maintain highway speed
C. Stop completely
D. Honk to alert children
Answer: A. Slow down to the posted speed limit



322.
 True or False
It is allowed to use your high beams in foggy conditions for better visibility.
Answer: False



323.
 Multiple Choice
If an animal runs into the road, you should:
A. Brake firmly and steer to avoid if safe
B. Swerve sharply regardless of surroundings
C. Accelerate to pass quickly
D. Honk continuously
Answer: A. Brake firmly and steer to avoid if safe



324. 
True or False
In Quebec, road rage incidents can lead to criminal charges.
Answer: True



325.
 Multiple Choice
A sign with two arrows curving around a traffic island means:
A. Pass on either side
B. Pass on the right only
C. Pass on the left only
D. Do not pass
Answer: A. Pass on either side



326. 
True or False
You may stop in a bus stop zone to pick up a friend if no buses are present.
Answer: False



327. 
Multiple Choice
What should you do if your brakes fail?
A. Pump the brake pedal and downshift
B. Turn off the ignition
C. Pull the parking brake fully
D. Continue driving until you find a mechanic
Answer: A. Pump the brake pedal and downshift



328.
 True or False
You must stop before turning right on red, even if no pedestrians are crossing.
Answer: True


329.
 Multiple Choice
When merging onto a highway, you should:
A. Match the speed of traffic before merging
B. Enter at a slow speed
C. Stop before the merge lane ends
D. Use hazard lights
Answer: A. Match the speed of traffic before merging



330. 
True or False
Cyclists are permitted to ride side-by-side on Quebec roads unless prohibited by signage.
Answer: True



331. 
Multiple Choice
A red circle with a diagonal slash over a left-turn arrow means:
A. No left turn
B. Left turn only
C. U-turn permitted
D. Stop before turning left
Answer: A. No left turn



332.
 True or False
When approaching a railway crossing with flashing lights, you must always stop.
Answer: True



333. 
Multiple Choice
When driving behind a snowplow, you should:
A. Keep a safe following distance and be patient
B. Pass immediately
C. Drive close to stay in cleared tracks
D. Honk to alert the driver
Answer: A. Keep a safe following distance and be patient



334. 
True or False
You may park in a reserved disabled parking space if you display a valid permit.
Answer: True



335.
 Multiple Choice
What should you do if your headlights fail at night?
A. Turn on hazard lights and pull over
B. Continue driving slowly
C. Use high beams from another car
D. Flash your brake lights
Answer: A. Turn on hazard lights and pull over



336. 
True or False
Pedestrians have priority over vehicles when crossing with a green light.
Answer: True



337. 
Multiple Choice
When entering a roundabout, you must:
A. Yield to traffic already inside
B. Enter without slowing down
C. Stop before entering every time
D. Drive clockwise
Answer: A. Yield to traffic already inside



338. 
True or False
In Quebec, you may turn right on a red light unless prohibited by a sign, except on the Island of Montreal.
Answer: True



339.
 Multiple Choice
If you see a sign with a bicycle and the word “EXCEPT” under a no-entry sign, it means:
A. Only bicycles may enter
B. Bicycles are prohibited
C. Bicycles are allowed despite the restriction for other vehicles
D. Cyclists must yield
Answer: C. Bicycles are allowed despite the restriction for other vehicles



340. 
True or False
You must dim your high beams within 150 metres when following another vehicle.
Answer: True

341. 
Multiple Choice
When parking downhill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Any position is fine
Answer: A. Toward the curb



342.
 True or False
You must signal at least 30 metres before turning in urban areas.
Answer: True



343.
 Multiple Choice
What does a yellow diamond sign with a traffic light symbol mean?
A. Traffic signals ahead
B. Traffic signals removed
C. Pedestrian light ahead
D. Police checkpoint
Answer: A. Traffic signals ahead



344. 
True or False
It is legal to park on a bridge if traffic is light.
Answer: False



345. 
Multiple Choice
If your vehicle is stuck in snow, you should:
A. Gently rock the vehicle back and forth to free it
B. Accelerate hard to break free
C. Honk until help arrives
D. Leave the vehicle running unattended
Answer: A. Gently rock the vehicle back and forth to free it



346. 
True or False
Drivers must slow down when passing stationary emergency vehicles with flashing lights.
Answer: True



347. 
Multiple Choice
When a road is marked with both a solid and a broken yellow line, you may pass only if:
A. The broken line is on your side
B. The solid line is on your side
C. You are in a hurry
D. No one is watching
Answer: A. The broken line is on your side



348. 
True or False
It is mandatory to carry your driver’s licence while operating a motor vehicle in Quebec.
Answer: True



349. 
Multiple Choice
What does a sign with a truck and the number “30 km/h” mean?
A. Maximum speed for trucks
B. Minimum speed for trucks
C. Truck route begins
D. Steep hill ahead
Answer: A. Maximum speed for trucks



350.
 True or False
You must yield to buses merging into traffic from a designated stop in certain speed zones.
Answer: True


351.
 Multiple Choice
When approaching a flashing yellow traffic light, you must:
A. Slow down and proceed with caution
B. Stop completely
C. Speed up to clear the intersection
D. Honk before proceeding
Answer: A. Slow down and proceed with caution



352. 
True or False
Learner drivers in Quebec must always display an “L” sign on the back of their vehicle.
Answer: False



353.
 Multiple Choice
When driving at night, how far ahead should your low beams illuminate the road?
A. About 30 metres
B. About 45 metres
C. About 60 metres
D. About 90 metres
Answer: B. About 45 metres



354. 

True or False
It is legal to drive through a red light if no police are around.
Answer: False


355.
Multiple Choice
What should you do when another driver is tailgating you?
A. Increase your following distance from the vehicle ahead
B. Brake sharply to warn them
C. Accelerate to get away
D. Change lanes without signaling
Answer: A. Increase your following distance from the vehicle ahead



356. 
True or False
In Quebec, the minimum age for a learner’s licence is 16.
Answer: True



357. 
Multiple Choice
When turning left from a one-way street onto another one-way street, you should:
A. Turn into the left lane of the new street
B. Turn into the right lane of the new street
C. Make a wide turn into any lane
D. Stop in the middle before turning
Answer: A. Turn into the left lane of the new street



358. 
True or False
You can park within 3 metres of a fire hydrant.
Answer: False



359.
 Multiple Choice
What does a rectangular white sign with a black arrow pointing right mean?
A. Right turn only
B. No right turn
C. One-way street to the right
D. Sharp curve ahead
Answer: A. Right turn only



360. 
True or False
Cyclists must obey the same traffic signals and rules as drivers.
Answer: True



361. 
Multiple Choice
When following a vehicle at night, you must dim your high beams within:
A. 60 metres
B. 100 metres
C. 150 metres
D. 200 metres
Answer: C. 150 metres



362. 
True or False
It is legal to use a handheld GPS while driving as long as you glance briefly.
Answer: False



363. 
Multiple Choice
What should you do if you encounter a flooded road?
A. Avoid crossing and find another route
B. Drive through slowly
C. Accelerate quickly
D. Follow the car ahead closely
Answer: A. Avoid crossing and find another route



364. 
True or False
A steady red arrow means you must stop and wait for a green arrow before proceeding in that direction.
Answer: True



365. 
Multiple Choice
When a vehicle ahead is stopped at a crosswalk, you should:
A. Stop as well and check for pedestrians
B. Overtake the vehicle
C. Honk to warn pedestrians
D. Pass quickly to save time
Answer: A. Stop as well and check for pedestrians



366. 
True or False
It is legal to pass a snowplow in operation if the road is clear.
Answer: False



367.
 Multiple Choice
If your car stalls on railway tracks, you should:
A. Exit immediately and move away from the tracks
B. Stay in the car and call for help
C. Push the car off the tracks alone
D. Wait for the train to pass
Answer: A. Exit immediately and move away from the tracks



368. 
True or False
You may turn right on a red light anywhere in Quebec unless prohibited by a sign, except on the Island of Montreal.
Answer: True



369.
 Multiple Choice
When approaching a vehicle with hazard lights on, you should:
A. Slow down and be prepared to stop
B. Overtake without slowing
C. Honk to warn them
D. Follow closely to pass quickly
Answer: A. Slow down and be prepared to stop



370. 
True or False
Pedestrians have priority over vehicles in parking lot crosswalks.
Answer: True



371. 
Multiple Choice
What does a yellow sign with a bicycle symbol indicate?
A. Bicycle crossing or lane ahead
B. No bicycles allowed
C. Bicycle parking
D. Cyclists must dismount
Answer: A. Bicycle crossing or lane ahead



372. 
True or False
It is illegal to coast downhill in neutral in Quebec.
Answer: True



373.
 Multiple Choice
When approaching an uncontrolled T-intersection, the vehicle on the terminating road must:
A. Yield to traffic on the through road
B. Proceed first
C. Honk before entering
D. Turn only right
Answer: A. Yield to traffic on the through road



374. 
True or False
If you feel drowsy while driving, the safest choice is to pull over and rest.
Answer: True



375.
 Multiple Choice
What should you do if your vehicle starts hydroplaning?
A. Ease off the accelerator and steer straight
B. Brake hard
C. Turn sharply
D. Accelerate
Answer: A. Ease off the accelerator and steer straight



376. 
True or False
A flashing green arrow allows you to turn in the arrow’s direction without stopping.
Answer: True



377. 
Multiple Choice
When entering a tunnel, you must:
A. Turn on low-beam headlights
B. Use high beams
C. Turn off all lights
D. Slow to 10 km/h
Answer: A. Turn on low-beam headlights



378.
 True or False
It is legal to block an intersection if traffic is stopped ahead.
Answer: False



379. 
Multiple Choice
If your view is blocked at an intersection, you should:
A. Move forward slowly until you can see
B. Proceed without checking
C. Honk before moving
D. Reverse and find another route
Answer: A. Move forward slowly until you can see



380.
 True or False
All new drivers in Quebec must complete a mandatory driving course before obtaining a full licence.
Answer: True



381.
 Multiple Choice
When driving in heavy snow, you should:
A. Use low beams and drive slowly
B. Use high beams
C. Increase your speed to pass other vehicles
D. Follow the taillights ahead closely
Answer: A. Use low beams and drive slowly



382.
 True or False
In Quebec, it is illegal to leave your engine idling for more than 3 minutes in some municipalities.
Answer: True



383. 
Multiple Choice
A sign with a red circle and a number inside indicates:
A. Maximum speed limit
B. Minimum speed limit
C. Recommended speed
D. Number of lanes
Answer: A. Maximum speed limit



384. 
True or False
You must stop for a pedestrian who is already crossing when you turn.
Answer: True



385.
 Multiple Choice
When a school bus is stopped on a divided highway with flashing red lights, you must:
A. Stop only if you are on the same side as the bus
B. Stop on both sides of the highway
C. Slow but continue
D. Honk before passing
Answer: A. Stop only if you are on the same side as the bus



386. 
True or False
You can pass in a no-passing zone if you are overtaking a bicycle and it is safe.
Answer: True



387. 
Multiple Choice
If your car begins to fishtail, you should:
A. Steer gently in the direction of the skid
B. Turn sharply in the opposite direction
C. Brake hard
D. Accelerate
Answer: A. Steer gently in the direction of the skid



388. 
True or False
It is legal to use your hazard lights while driving in heavy rain to increase visibility.
Answer: True



389. 
Multiple Choice
When parallel parking, the ideal distance from the vehicle in front before backing in is:
A. About one metre
B. About three metres
C. About five metres
D. Any distance
Answer: B. About three metres



390. 
True or False
Pedestrians must use crosswalks if available.
Answer: True



391.
 Multiple Choice
What should you do before changing lanes?
A. Signal, check mirrors, and shoulder check
B. Signal only
C. Shoulder check only
D. Change lanes without signaling
Answer: A. Signal, check mirrors, and shoulder check



392.
 True or False
In Quebec, driving without valid insurance can result in licence suspension.
Answer: True



393. 
Multiple Choice
When approaching a curve, you should:
A. Slow down before entering the curve
B. Accelerate into the curve
C. Brake in the middle of the curve
D. Maintain the same speed regardless of road conditions
Answer: A. Slow down before entering the curve



394. 
True or False
Flashing amber lights at a pedestrian crossing mean proceed with caution and yield if necessary.
Answer: True



395.
 Multiple Choice
If a traffic light is out at an intersection, you should:
A. Treat it as a four-way stop
B. Drive through without stopping
C. Yield only to vehicles on your right
D. Honk and proceed
Answer: A. Treat it as a four-way stop



396. 
True or False
Cyclists may use the full lane if it is too narrow for a car and a bicycle to travel side-by-side safely.
Answer: True



397. 
Multiple Choice
What does a white rectangular sign with a black arrow and the word “ONLY” mean?
A. Turn in the arrow’s direction only
B. Optional turn
C. No turns allowed
D. Road closed ahead
Answer: A. Turn in the arrow’s direction only



398. 
True or False
You must stop at a railway crossing if warning lights are flashing, even if no train is visible.
Answer: True



399. 
Multiple Choice
When approaching a pedestrian in a wheelchair at a crosswalk, you should:
A. Stop and allow them to cross safely
B. Honk to hurry them along
C. Drive around them slowly
D. Wave them across without stopping
Answer: A. Stop and allow them to cross safely



400. 
True or False
It is illegal to leave a vehicle unlocked while unattended in Quebec.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Quebec ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Quebec .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $quebec->id,
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



