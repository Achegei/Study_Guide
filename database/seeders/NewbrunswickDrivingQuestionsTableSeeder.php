<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewbrunswickDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $newBrunswick = DrivingSection::firstOrCreate(
            ['title' => 'New brunswick'],
            [
                'type' => 'province',
                'capital' => 'Fredericton',
                'flag' => '/images/flags/new-brunswick.png',
                'description' => 'New brunswick Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_parking.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $newBrunswick->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
In most urban areas of New Brunswick, the maximum speed limit is:
A. 40 km/h
B. 50 km/h
C. 60 km/h
D. 70 km/h
Answer: B. 50 km/h



2.
 True or False
In New Brunswick, you may legally turn right on a red light unless a sign prohibits it.
Answer: True



3. 
Multiple Choice
When approaching an intersection with a yield sign, you must:
A. Slow down and give the right-of-way if needed
B. Stop no matter what
C. Accelerate to enter first
D. Ignore if the road looks clear
Answer: A. Slow down and give the right-of-way if needed



4. 
True or False
Cyclists must follow the same traffic laws as motor vehicles in New Brunswick.
Answer: True



5. 
Multiple Choice
When driving on gravel roads, you should:
A. Reduce speed and keep extra following distance
B. Drive faster to prevent dust build-up
C. Use high beams during the day
D. Stay in the centre of the road
Answer: A. Reduce speed and keep extra following distance


6. 
True or False
It is legal to pass on the right when the vehicle ahead is making a left turn, if safe to do so.
Answer: True



7. 
Multiple Choice
When approaching a pedestrian at a marked crosswalk, you must:
A. Slow down but continue if clear
B. Stop and yield the right-of-way
C. Honk to warn them
D. Drive around them
Answer: B. Stop and yield the right-of-way



8.
 True or False
It is legal to use a handheld phone while stopped at a red light in New Brunswick.
Answer: False



9. 
Multiple Choice
When driving on a highway in New Brunswick, you should use the left lane for:
A. Passing other vehicles only
B. Driving slower to save fuel
C. Parking in emergencies
D. Overtaking and long-term travel
Answer: A. Passing other vehicles only



10. 
True or False
Seatbelt use is mandatory for all passengers in New Brunswick.
Answer: True



11. 
Multiple Choice
A yellow diamond sign with a deer symbol warns of:
A. Hunting zone
B. Wildlife crossing area
C. Farm ahead
D. Animal refuge
Answer: B. Wildlife crossing area



12.
 True or False
You can park within 3 metres of a fire hydrant in New Brunswick.
Answer: False



13. 
Multiple Choice
If your vehicle begins to skid, the best response is to:
A. Brake hard immediately
B. Steer gently in the direction you want to go
C. Turn the wheel sharply in the opposite direction
D. Accelerate to regain control
Answer: B. Steer gently in the direction you want to go



14. 
True or False
Motorcycles in New Brunswick must have daytime running lights.
Answer: True



15. 
Multiple Choice
At a railway crossing without gates, you should:
A. Slow down and pass if no train is seen
B. Stop, look both ways, and proceed when safe
C. Drive across quickly to avoid delay
D. Follow the vehicle in front without stopping
Answer: B. Stop, look both ways, and proceed when safe



16. 
True or False
Driving without valid insurance in New Brunswick can result in licence suspension.
Answer: True



17.
 Multiple Choice
A flashing red light at an intersection means:
A. Proceed without stopping
B. Stop, then proceed when safe
C. Stop and wait for green
D. Yield without stopping
Answer: B. Stop, then proceed when safe



18. 
True or False
Pedestrians always have the right-of-way at unmarked intersections in New Brunswick.
Answer: True



19.
 Multiple Choice
The legal blood alcohol concentration (BAC) limit for most fully licensed drivers in New Brunswick is:
A. 0.05%
B. 0.08%
C. 0.10%
D. Zero tolerance for all drivers
Answer: B. 0.08%



20.
 True or False
Learner drivers must be accompanied by a licensed driver with at least three years of experience.
Answer: True



21. 
Multiple Choice
If an emergency vehicle approaches with lights and sirens, you must:
A. Maintain speed and direction
B. Pull over to the right and stop
C. Accelerate to avoid blocking them
D. Only move if they honk
Answer: B. Pull over to the right and stop



22.
 True or False
You can turn right on a red light anywhere in New Brunswick unless prohibited by a sign.
Answer: True



23. 
Multiple Choice
When parallel parking downhill with a curb, turn your front wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Doesn’t matter
Answer: A. Toward the curb



24.
 True or False
Driving too slowly in the left lane can result in a fine in New Brunswick.
Answer: True



25. 
Multiple Choice
A solid yellow line next to your lane means:
A. Passing prohibited
B. Passing allowed at all times
C. Passing allowed at night only
D. Passing allowed in rural zones
Answer: A. Passing prohibited



26. 
True or False
In New Brunswick, driving without a valid licence can result in fines and possible vehicle impoundment.
Answer:True

27. 
Multiple Choice
If your vehicle breaks down on the highway, you should:
A. Stop in the left lane
B. Pull over to the right shoulder and turn on hazard lights
C. Continue driving slowly with hazards on
D. Exit your vehicle and walk on the road
Answer: B. Pull over to the right shoulder and turn on hazard lights



28. 
True or False
Flashing amber lights at an intersection mean proceed with caution.
Answer: True



29. 
Multiple Choice
When following another vehicle in winter, you should:
A. Keep the same distance as in summer
B. Increase following distance
C. Drive very close to avoid snow spray
D. Rely on ABS for quick stops
Answer: B. Increase following distance



30. 
True or False
It is legal to drive with earphones in both ears in New Brunswick.
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
At uncontrolled intersections, the vehicle on the right has the right-of-way.
Answer: True



33. 
Multiple Choice
When driving through fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Use hazard lights only
D. Drive with parking lights
Answer: A. Use low-beam headlights



34. 
True or False
Drivers can be fined for not clearing snow from their vehicles before driving.
Answer: True



35.
 Multiple Choice
If you experience a tire blowout at high speed, you should:
A. Hold the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply onto the shoulder
D. Accelerate to maintain control
Answer: A. Hold the steering wheel firmly and slow down gradually




36. 
True or False
On icy roads, stopping distances can be much longer than on dry pavement.
Answer: True



37. 
Multiple Choice
If a traffic light turns yellow while approaching, you should:
A. Stop if safe to do so
B. Accelerate to beat the red
C. Ignore it
D. Honk to warn others
Answer: A. Stop if safe to do so



38. 
True or False
Winter tires are highly recommended in New Brunswick during winter months.
Answer: True



39. 
Multiple Choice
When entering a construction zone, you should:
A. Follow posted reduced speed limits
B. Maintain your normal speed
C. Honk to warn workers
D. Change lanes quickly
Answer: A. Follow posted reduced speed limits



40. 
True or False
You may park in a space reserved for disabled persons only with a valid permit.
Answer: True



41.
 Multiple Choice
A red and white triangular sign means:
A. Stop
B. Yield
C. No entry
D. School zone
Answer: B. Yield



42. 
True or False
Learner drivers may drive alone after 6 months.
Answer: False



43.
 Multiple Choice
If your view is blocked at an intersection, you should:
A. Move forward slowly until you can see clearly
B. Accelerate quickly across the intersection
C. Rely on the sound of traffic
D. Wait until someone waves you through
Answer: A. Move forward slowly until you can see clearly



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
You must stop before turning right at a red light, even if no pedestrians are present.
Answer: True



47. 
Multiple Choice
If your vehicle hydroplanes, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn sharply to regain traction
D. Accelerate to dry the tires
Answer: A. Ease off the accelerator and steer straight



48. 
True or False
Driving with a cracked windshield is always legal in New Brunswick.
Answer: False



49.
 Multiple Choice
The minimum age to obtain a learner’s licence in New Brunswick is:
A. 15
B. 16
C. 17
D. 18
Answer: B. 16



50. 
True or False
Vehicles must yield to buses signaling to leave a bus stop in New Brunswick.
Answer: True


51. 
Multiple Choice
When approaching a roundabout in New Brunswick, you must:
A. Enter quickly without slowing
B. Yield to traffic already inside the roundabout
C. Stop completely before entering
D. Honk before entering
Answer: B. Yield to traffic already inside the roundabout



52.
 True or False
It is mandatory to signal before exiting a roundabout.
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
All children under 145 cm in height must be secured in an appropriate child restraint system.
Answer: True



55. 
Multiple Choice
A white rectangular sign with a black arrow pointing straight means:
A. One-way ahead
B. Straight ahead only
C. Pedestrian crossing ahead
D. No turns allowed
Answer: B. Straight ahead only



56.
 True or False
Headlights must be turned on from half an hour after sunset to half an hour before sunrise.
Answer: True



57. 
Multiple Choice
When driving behind a motorcycle, you should:
A. Maintain a larger following distance than with cars
B. Follow closely for wind protection
C. Pass immediately
D. Use high beams to be visible
Answer: A. Maintain a larger following distance than with cars



58. 
True or False
It is legal to block an intersection if traffic is stopped ahead.
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
Drivers are required to remove snow and ice from their vehicle before driving.
Answer: True



61. 
Multiple Choice
When merging onto a highway, you must:
A. Match the speed of highway traffic before merging
B. Stop before entering
C. Drive slowly until someone lets you in
D. Use hazard lights while merging
Answer: A. Match the speed of highway traffic before merging



62. 
True or False
It is legal to park in front of a private driveway if the space is unused.
Answer: False



63.
 Multiple Choice
Refusing a roadside breath test in New Brunswick results in:
A. No penalty if you haven’t been drinking
B. Same penalty as driving over the legal BAC
C. A verbal warning only
D. Vehicle impoundment only
Answer: B. Same penalty as driving over the legal BAC



64.
 True or False
You may cross a solid double yellow line to enter a private driveway.
Answer: True



65. 
Multiple Choice
When driving near a large truck, avoid:
A. Staying in its blind spots
B. Leaving space when passing
C. Signaling before lane changes
D. Driving in the right lane
Answer: A. Staying in its blind spots



66. 
True or False
The maximum speed limit on most rural highways in New Brunswick is 100 km/h.
Answer: True



67. 
Multiple Choice
If you miss your highway exit, you should:
A. Reverse to the exit
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
When approaching a stop sign without a stop line or crosswalk, stop:
A. At the edge of the intersection
B. Anywhere before the sign
C. Beside the sign
D. A full car length before
Answer: A. At the edge of the intersection



70.
 True or False
A GPS screen is allowed while driving if it is securely mounted and doesn’t block your view.
Answer: True



71.
 Multiple Choice
A solid white line between lanes means:
A. Lane changes are discouraged
B. Lane changes are prohibited
C. Lane changes are mandatory
D. Passing is encouraged
Answer: A. Lane changes are discouraged



72. 
True or False
A supervising driver for a learner must sit in the front passenger seat.
Answer: True



73. 
Multiple Choice
If your vehicle fishtails on a slippery road, you should:
A. Steer in the direction of the skid
B. Turn opposite to the skid
C. Brake hard immediately
D. Accelerate quickly
Answer: A. Steer in the direction of the skid



74. 
True or False
Driving without a valid licence can result in a fine in New Brunswick.
Answer: True



75. 
Multiple Choice
An orange sign with a worker symbol means:
A. School zone ahead
B. Construction or road work ahead
C. Playground area
D. Parking lot entrance
Answer: B. Construction or road work ahead



76. 
True or False
You may pass a stopped school bus with flashing red lights if on the opposite side of a divided highway.
Answer: True



77.
 Multiple Choice
When parallel parking uphill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Any position
Answer: B. Away from the curb



78. 
True or False
You must dim high beams when following another vehicle within 150 metres.
Answer: True



79.
 Multiple Choice
A yellow curved arrow sign indicates:
A. Dead end
B. Sharp curve ahead
C. Narrow bridge ahead
D. Winding road begins
Answer: B. Sharp curve ahead



80. 
True or False
All new drivers must complete a mandatory course before a full licence.
Answer: True



81. 
Multiple Choice
When driving in heavy rain, use:
A. Low-beam headlights
B. High-beam headlights
C. Parking lights only
D. No lights
Answer: A. Low-beam headlights



82. 
True or False
Motorcycles are entitled to a full lane.
Answer: True



83. 
Multiple Choice
If you’re feeling stressed while driving, you should:
A. Pull over in a safe place and relax
B. Continue driving until you calm down
C. Speed up to get home sooner
D. Play loud music to distract yourself
Answer: A. Pull over in a safe place and relax



84. 
True or False
You must carry proof of insurance while driving.
Answer: True



85.
 Multiple Choice
A red circle with a slash over a black arrow means:
A. No turn in that direction
B. Turn only in that direction
C. No stopping ahead
D. Proceed with caution
Answer: A. No turn in that direction



86. 
True or False
Driving with one headlight is legal if the other works.
Answer: False



87. 
Multiple Choice
At an uncontrolled intersection, the right-of-way goes to:
A. The vehicle on the right
B. The vehicle on the left
C. The faster vehicle
D. The larger vehicle
Answer: A. The vehicle on the right



88.
 True or False
Road rage incidents can lead to criminal charges.
Answer: True



89. 
Multiple Choice
If your vehicle stalls on railway tracks with a train approaching, you should:
A. Exit immediately and move away from the tracks
B. Stay inside and call for help
C. Push the car off the tracks
D. Stand beside the car to warn the train
Answer: A. Exit immediately and move away from the tracks



90. 
True or False
It is legal to park on a sidewalk if no pedestrians are around.
Answer: False



91. 
Multiple Choice
When driving through a tunnel, use:
A. Low-beam headlights
B. High-beam headlights
C. Parking lights only
D. No lights
Answer: A. Low-beam headlights



92. 
True or False
Drivers must yield to buses leaving a stop in 50 km/h zones or lower.
Answer: True



93.
 Multiple Choice
If your windshield wipers fail in heavy rain, you should:
A. Pull over safely until repairs are made
B. Continue slowly
C. Stick your head out the window
D. Follow closely behind another vehicle
Answer: A. Pull over safely until repairs are made



94. 
True or False
Learner drivers may not tow trailers.
Answer: True



95. 
Multiple Choice
A pentagon-shaped yellow sign with two people walking means:
A. Playground zone
B. School zone or crossing
C. Pedestrian-only street
D. Hiking trail
Answer: B. School zone or crossing



96.
 True or False
Driving barefoot is legal in New Brunswick.
Answer: True



97. 
Multiple Choice
A green arrow with a red light means:
A. Proceed only in the arrow’s direction
B. Stop completely regardless of the arrow
C. Proceed straight only
D. Turn any direction
Answer: A. Proceed only in the arrow’s direction



98. 
True or False
Wildlife is most active on rural roads at dawn and dusk.
Answer: True



99. 
Multiple Choice
The best way to check your blind spot before changing lanes is:
A. Quickly glance over your shoulder
B. Use mirrors only
C. Listen for vehicles
D. Signal and change lanes immediately
Answer: A. Quickly glance over your shoulder



100. 
True or False
Failing to stop for a school bus with flashing red lights can result in demerit points and a fine.
Answer: True


101.
 Multiple Choice
When approaching a railway crossing with flashing red lights, you must:
A. Slow down and proceed with caution
B. Stop completely and wait until lights stop flashing
C. Honk and drive through
D. Drive faster to cross before the train
Answer: B. Stop completely and wait until lights stop flashing



102. 
True or False
It is legal to drive with a cracked windshield if it does not obstruct your view.
Answer: True



103. 
Multiple Choice
The best way to avoid hydroplaning is to:
A. Maintain high speeds in wet weather
B. Reduce speed and ensure proper tire tread
C. Brake hard on wet roads
D. Use cruise control in rain
Answer: B. Reduce speed and ensure proper tire tread



104.
 True or False
On a two-lane road, passing is not allowed when your lane has a solid yellow line.
Answer: True



105.
 Multiple Choice
When an emergency vehicle is stopped with flashing lights on a two-lane road, you must:
A. Slow down and move over if possible
B. Stop immediately in your lane
C. Pass quickly to clear the area
D. Turn around and take another route
Answer: A. Slow down and move over if possible



106.
 True or False
In New Brunswick, the minimum legal drinking age is 19.
Answer: True



107. 
Multiple Choice
When driving in fog, the best lights to use are:
A. Low-beam headlights
B. High-beam headlights
C. Hazard lights only
D. No lights
Answer: A. Low-beam headlights



108.
 True or False
Learner drivers are prohibited from using any handheld devices while driving.
Answer: True



109. 
Multiple Choice
When parking downhill without a curb, turn your wheels:
A. Toward the right shoulder
B. Toward the left shoulder
C. Straight ahead
D. Any direction
Answer: A. Toward the right shoulder



110. 
True or False
All occupants must wear a seatbelt or be in an appropriate child restraint.
Answer: True



111.
 Multiple Choice
If your brakes fail, you should:
A. Pump the brake pedal, downshift, and use the parking brake
B. Turn off the engine immediately
C. Accelerate to maintain control
D. Continue until they work again
Answer: A. Pump the brake pedal, downshift, and use the parking brake



112. 
True or False
Driving at night requires greater following distance than in the daytime.
Answer: True



113.
 Multiple Choice
A flashing yellow traffic light means:
A. Stop completely
B. Proceed with caution
C. Speed up to clear the intersection
D. No entry allowed
Answer: B. Proceed with caution



114.
 True or False
Children under a certain height or weight must be in an approved child safety seat.
Answer: True



115. 
Multiple Choice
When passing another vehicle, you must return to your lane:
A. When you can see the vehicle’s headlights in your mirror
B. As soon as you pass the front bumper
C. When the other driver honks
D. After signaling for 10 seconds
Answer: A. When you can see the vehicle’s headlights in your mirror



116. 
True or False
The left lane on a multi-lane highway is generally for passing slower vehicles.
Answer: True



117.
 Multiple Choice
If your car starts to skid, avoid:
A. Braking hard
B. Steering gently into the skid
C. Easing off the accelerator
D. Keeping calm and steady
Answer: A. Braking hard



118.
 True or False
Turning right on a red light is allowed in New Brunswick unless posted otherwise.
Answer: True



119.
 Multiple Choice
When approaching a pedestrian in a crosswalk, you should:
A. Stop and let them cross completely
B. Slow down but keep moving
C. Honk to alert them
D. Pass behind them
Answer: A. Stop and let them cross completely



120.
 True or False
It is legal to drive with interior lights on at night.
Answer: True



121. 
Multiple Choice
The main cause of rear-end collisions is:
A. Tailgating
B. Poor road design
C. Driving too slowly
D. Using low beams
Answer: A. Tailgating



122. 
True or False
You should check your mirrors every 5–8 seconds while driving.
Answer: True



123. 
Multiple Choice
When approaching an uncontrolled rural intersection, you must:
A. Slow down and be prepared to stop
B. Speed up to cross quickly
C. Honk to alert others
D. Assume other drivers will yield
Answer: A. Slow down and be prepared to stop



124. 
True or False
A red X above your lane means the lane is closed to traffic.
Answer: True



125. 
Multiple Choice
The safest following distance in good weather is:
A. Two seconds behind the vehicle ahead
B. One second behind
C. Four seconds behind
D. Half a second behind
Answer: A. Two seconds behind the vehicle ahead



126. 
True or False
Snow tires are recommended in New Brunswick during winter months.
Answer: True



127. 
Multiple Choice
When entering a freeway, you should:
A. Accelerate in the merging lane to match traffic speed
B. Stop at the end of the ramp
C. Drive slowly and wait for a gap
D. Turn on hazard lights while merging
Answer: A. Accelerate in the merging lane to match traffic speed



128. 
True or False
You must yield to transit buses leaving a bus stop in areas with a speed limit under 60 km/h.
Answer: True



129.
 Multiple Choice
If your vehicle begins to hydroplane, you should:
A. Ease off the accelerator and steer gently
B. Brake hard
C. Accelerate to regain control
D. Turn sharply away from the skid
Answer: A. Ease off the accelerator and steer gently



130. 
True or False
It is illegal to use a radar detector in New Brunswick.
Answer: True



131.
 Multiple Choice
When a funeral procession is passing, other drivers should:
A. Yield and not cut through the procession
B. Merge into the procession
C. Overtake the procession
D. Honk as a sign of respect
Answer: A. Yield and not cut through the procession



132. 
True or False
Learner drivers can drive at any time of the day if accompanied by a qualified supervisor.
Answer: True



133. 
Multiple Choice
When reversing, the correct method is to:
A. Look over your shoulder through the rear window
B. Only use your mirrors
C. Keep your eyes on the dashboard
D. Signal continuously
Answer: A. Look over your shoulder through the rear window



134. 
True or False
Backing into an intersection is illegal.
Answer: True



135. 
Multiple Choice
When approaching a yield sign, you must:
A. Give right-of-way to traffic and pedestrians
B. Stop no matter what
C. Merge without checking
D. Accelerate to join traffic
Answer: A. Give right-of-way to traffic and pedestrians



136. 
True or False
Braking distance increases on wet or icy roads.
Answer: True



137. 
Multiple Choice
A school bus with flashing amber lights means:
A. The bus is preparing to stop
B. The bus is moving away from a stop
C. You may pass with caution
D. The bus is out of service
Answer: A. The bus is preparing to stop



138. 
True or False
Seatbelts can reduce the risk of serious injury in a crash by more than 50%.
Answer: True



139.
 Multiple Choice
If your vision is blurred by oncoming headlights, you should:
A. Look toward the right edge of your lane
B. Stare directly at the headlights
C. Close your eyes briefly
D. Flash your high beams
Answer: A. Look toward the right edge of your lane



140.
 True or False
Vehicles must stop at all railway crossings with posted stop signs.
Answer: True



141.
 Multiple Choice
When parking uphill with no curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge
C. Leave wheels straight ahead
D. Use no parking brake
Answer: A. Turn wheels toward the edge of the road



142. 
True or False
Drivers should check blind spots even when using mirrors correctly.
Answer: True



143.
 Multiple Choice
In heavy traffic, you should:
A. Maintain a safe following distance and avoid aggressive lane changes
B. Change lanes frequently to move faster
C. Tailgate to prevent cars from cutting in
D. Drive on the shoulder to bypass congestion
Answer: A. Maintain a safe following distance and avoid aggressive lane changes



144. 
True or False
Animals may be more active on rural roads during spring and fall.
Answer: True



145.
 Multiple Choice
The safest way to handle a skid on ice is to:
A. Steer gently in the direction you want to go
B. Brake hard
C. Accelerate quickly
D. Turn the wheel sharply
Answer: A. Steer gently in the direction you want to go



146.
 True or False
White painted curbs may indicate a loading zone in some areas.
Answer: True



147. 
Multiple Choice
If your car’s headlights fail at night, you should:
A. Turn on hazard lights and pull off the road
B. Keep driving slowly without lights
C. Use your phone’s flashlight
D. Follow another vehicle closely
Answer: A. Turn on hazard lights and pull off the road



148. 
True or False
Road construction zones often have reduced speed limits.
Answer: True



149.
 Multiple Choice
The legal blood alcohol concentration (BAC) limit for fully licensed drivers in New Brunswick is:
A. 0.08%
B. 0.05%
C. Zero
D. 0.10%
Answer: A. 0.08%



150. 
True or False
New drivers under the Graduated Licence Program may have a lower BAC limit than full licence holders.
Answer: True


151. 
Multiple Choice
When entering a roundabout, you must:
A. Yield to traffic already inside the roundabout
B. Enter without slowing down
C. Honk to alert drivers
D. Stop in the roundabout before proceeding
Answer: A. Yield to traffic already inside the roundabout



152. 
True or False
Flashing red traffic lights are treated the same as stop signs.
Answer: True



153. 
Multiple Choice
The correct hand signal for a right turn is:
A. Left arm bent upward
B. Left arm straight out
C. Left arm bent downward
D. Right arm out the window
Answer: A. Left arm bent upward



154.
 True or False
Driving in flip-flops can reduce your control over pedals.
Answer: True



155. 
Multiple Choice
When approaching a hill with limited visibility, you should:
A. Stay to the right and reduce speed
B. Drive in the center of the road
C. Increase speed to pass quickly
D. Sound your horn continuously
Answer: A. Stay to the right and reduce speed



156. 
True or False
Motorcycles have the same right-of-way rules as cars.
Answer: True



157.
Multiple Choice
When parallel parking, you should be within:
A. 15 cm from the curb
B. 30 cm from the curb
C. 50 cm from the curb
D. 1 m from the curb
Answer: B. 30 cm from the curb



158.
 True or False
At night, high beams should be dimmed within 150 metres of oncoming traffic.
Answer: True



159. 
Multiple Choice
If your car stalls on railway tracks, you should:
A. Exit immediately and move away from the tracks
B. Try restarting the engine while staying inside
C. Push the car off the tracks alone
D. Wait for another driver to help
Answer: A. Exit immediately and move away from the tracks



160.
 True or False
You must signal before exiting a roundabout.
Answer: True



161. 
Multiple Choice
A flashing green light at an intersection in New Brunswick means:
A. You may turn left or right, or go straight if clear
B. Stop before proceeding
C. Pedestrian crossing ahead
D. School zone
Answer: A. You may turn left or right, or go straight if clear



162.
 True or False
Distracted driving can result in fines and demerit points.
Answer: True



163.
 Multiple Choice
The safest way to handle a tire blowout is to:
A. Hold the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Accelerate to maintain control
D. Turn sharply toward the shoulder
Answer: A. Hold the steering wheel firmly and slow down gradually



164. 
True or False
When parked uphill with a curb, you should turn your wheels away from the curb.
Answer: True



165.
 Multiple Choice
When merging onto a highway, you should:
A. Match the speed of traffic in the right lane
B. Stop at the end of the merge lane
C. Merge at a much slower speed
D. Use your horn before merging
Answer: A. Match the speed of traffic in the right lane



166. 
True or False
Fog can make objects appear farther away than they really are.
Answer: False
(Fog makes objects appear closer.)



167. 
Multiple Choice
When following a large truck, you should:
A. Stay far enough back to see the truck’s mirrors
B. Drive close to its rear bumper
C. Pass on the right immediately
D. Flash headlights to signal passing
Answer: A. Stay far enough back to see the truck’s mirrors



168. 
True or False
It is illegal to pass another vehicle in a school zone during school hours.
Answer: True



169. 
Multiple Choice
If a vehicle approaches you head-on in your lane, you should:
A. Honk, steer right, and brake
B. Flash your lights and maintain speed
C. Steer left into the oncoming lane
D. Stop in the center of the road
Answer: A. Honk, steer right, and brake



170.
 True or False
A solid white line on the road means lane changes are discouraged but not illegal.
Answer: True



171.
 Multiple Choice
On icy roads, the best way to stop is:
A. Apply brakes gently and early
B. Brake hard at the last moment
C. Shift to neutral and coast
D. Turn the steering wheel quickly
Answer: A. Apply brakes gently and early



172. 
True or False
Pedestrians have the right-of-way at all marked crosswalks.
Answer: True



173.
 Multiple Choice
The minimum following distance behind a school bus is:
A. 5 metres
B. 10 metres
C. 20 metres
D. 30 metres
Answer: C. 20 metres



174. 
True or False
Learner drivers must display an “L” sign on their vehicle in New Brunswick.
Answer: False



175.
 Multiple Choice
When backing into a driveway from a busy road, you should:
A. Yield to all traffic and pedestrians
B. Back quickly to avoid blocking traffic
C. Use only mirrors for guidance
D. Honk continuously
Answer: A. Yield to all traffic and pedestrians



176. 
True or False
Slower-moving vehicles should travel in the right lane on multi-lane roads.
Answer: True



177. 
Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral, apply brakes, and move off the road
B. Turn off the ignition immediately while driving
C. Press the accelerator harder
D. Honk for assistance
Answer: A. Shift to neutral, apply brakes, and move off the road



178.
 True or False
Passing is prohibited within 30 metres of a crosswalk.
Answer: True



179.
 Multiple Choice
When approaching a flashing amber arrow, you must:
A. Yield to oncoming traffic and pedestrians before turning
B. Turn without stopping
C. Stop and wait for green
D. Proceed without caution
Answer: A. Yield to oncoming traffic and pedestrians before turning



180.
 True or False
In New Brunswick, winter tires are mandatory by law.
Answer: False



181.
 Multiple Choice
You are required to dim high beams when following another vehicle within:
A. 60 metres
B. 100 metres
C. 150 metres
D. 200 metres
Answer: C. 150 metres



182. 
True or False
Reversing into a street from a private driveway is allowed if done safely.
Answer: True



183. 
Multiple Choice
When you see a vehicle stopped at a pedestrian crosswalk, you should:
A. Pass carefully without stopping
B. Stop as another pedestrian may be crossing
C. Honk to alert them to move
D. Speed up to clear the area
Answer: B. Stop as another pedestrian may be crossing


184.
 True or False
Motorists must stop for school buses in both directions when lights are flashing.
Answer: True



185.
 Multiple Choice
The most slippery time on a wet road is:
A. Just after it begins to rain
B. After an hour of steady rain
C. On sunny days
D. Only during heavy downpours
Answer: A. Just after it begins to rain



186.
 True or False
Using cruise control on icy roads is recommended.
Answer: False



187.
 Multiple Choice
When approaching a construction zone, you should:
A. Slow down and follow posted instructions
B. Speed up to pass quickly
C. Ignore workers’ signals
D. Stop and wait for the road to reopen
Answer: A. Slow down and follow posted instructions



188. 
True or False
It is illegal to park within 5 metres of a fire hydrant.
Answer: True



189. 
Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Stop and give them full right-of-way
B. Honk to guide them
C. Drive slowly past them
D. Wave them across
Answer: A. Stop and give them full right-of-way



190. 
True or False
You may cross a solid yellow line to pass a cyclist if it is safe.
Answer: True



191. 
Multiple Choice
If you are being tailgated, you should:
A. Increase following distance ahead and avoid sudden braking
B. Brake hard to warn the driver
C. Speed up to escape
D. Drive on the shoulder
Answer: A. Increase following distance ahead and avoid sudden braking



192. 
True or False
Braking distances double when your speed doubles.
Answer: False
(They increase by about four times.)



193.
 Multiple Choice
When driving through a curve, you should:
A. Slow down before entering, then accelerate gently
B. Brake while in the middle of the curve
C. Maintain high speed for stability
D. Coast through without control
Answer: A. Slow down before entering, then accelerate gently



194. 
True or False
Learner drivers in New Brunswick must be supervised at all times when driving.
Answer: True



195.
 Multiple Choice
When passing a cyclist, allow at least:
A. 0.5 metre of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space



196.
 True or False
You must use headlights from half an hour before sunset to half an hour after sunrise.
Answer: True



197. 
Multiple Choice
When your tires lose contact with the road due to water, this is called:
A. Hydroplaning
B. Skidding
C. Aquapumping
D. Oversteering
Answer: A. Hydroplaning



198. 
True or False
It is illegal to drive without valid insurance in New Brunswick.
Answer: True



199.
 Multiple Choice
When parking uphill without a curb, you should turn your wheels:
A. Toward the right shoulder
B. Toward the left shoulder
C. Straight ahead
D. Any direction
Answer: A. Toward the right shoulder



200. 
True or False
All traffic fines are doubled in construction zones when workers are present.
Answer: True



201. 
Multiple Choice
When approaching a school bus with flashing red lights, you must:
A. Slow down and proceed with caution
B. Stop regardless of direction until lights stop flashing
C. Pass quickly before children cross
D. Honk to warn the driver
Answer: B. Stop regardless of direction until lights stop flashing



202.
 True or False
Driving without a seatbelt is legal if you are travelling under 30 km/h.
Answer: False



203. 
Multiple Choice
If two vehicles arrive at a four-way stop at the same time, who goes first?
A. The vehicle on the left
B. The vehicle on the right
C. The larger vehicle
D. The fastest vehicle
Answer: B. The vehicle on the right



204. 
True or False
Using handheld electronic devices while driving is prohibited in New Brunswick.
Answer: True



205.
 Multiple Choice
When driving downhill, you should:
A. Use a lower gear to help control speed
B. Shift to neutral
C. Brake constantly without releasing
D. Accelerate slightly for stability
Answer: A. Use a lower gear to help control speed



206. 
True or False
You can pass another vehicle on a bridge if the lane is clear.
Answer: False



207. 
Multiple Choice
When a traffic light changes from green to yellow, you should:
A. Speed up to get through before red
B. Stop if it is safe to do so
C. Stop only if there are pedestrians
D. Ignore the yellow and continue
Answer: B. Stop if it is safe to do so



208.
 True or False
Cyclists must obey the same traffic signals as drivers.
Answer: True



209. 
Multiple Choice
In heavy fog, you should use:
A. High beams
B. Low beams
C. Hazard lights only
D. No lights at all
Answer: B. Low beams



210.
 True or False
It is legal to park in front of a fire station entrance if you remain in the vehicle.
Answer: False



211.
 Multiple Choice
If your vehicle begins to skid, you should:
A. Steer in the direction you want the front of the vehicle to go
B. Brake hard immediately
C. Steer in the opposite direction
D. Accelerate to regain control
Answer: A. Steer in the direction you want the front of the vehicle to go



212. 
True or False
Learner drivers in New Brunswick are allowed to tow trailers.
Answer: False



213. 
Multiple Choice
When a police officer signals you to pull over, you should:
A. Continue driving until you reach your destination
B. Pull over safely to the right as soon as possible
C. Stop immediately in your lane
D. Speed up to avoid blocking traffic
Answer: B. Pull over safely to the right as soon as possible



214.
 True or False
It is illegal to leave a child under 12 in a parked car without supervision.
Answer: True



215. 
Multiple Choice
When making a left turn from a two-way street onto another two-way street, you should:
A. Turn into the left lane of the road you are entering
B. Turn into the right lane of the road you are entering
C. Turn into any lane available
D. Stop in the middle of the intersection before deciding
Answer: A. Turn into the left lane of the road you are entering



216. 
True or False
Seatbelts are required for all passengers in the vehicle.
Answer: True



217.
 Multiple Choice
On an icy road, the best following distance is:
A. 2 seconds
B. 3 seconds
C. 6 seconds or more
D. Same as on dry roads
Answer: C. 6 seconds or more



218.
 True or False
You may use your horn to warn other drivers of danger.
Answer: True



219.
 Multiple Choice
If you see an emergency vehicle with flashing lights approaching from behind, you must:
A. Maintain your speed
B. Pull to the right and stop
C. Drive faster to avoid blocking it
D. Move to the left lane
Answer: B. Pull to the right and stop



220.
 True or False
You can park on a crosswalk if it is for less than one minute.
Answer: False



221. 
Multiple Choice
When driving through an area with children playing, you should:
A. Slow down and be prepared to stop
B. Maintain normal speed
C. Honk continuously to warn them
D. Drive in the center of the road
Answer: A. Slow down and be prepared to stop



222. 
True or False
The maximum speed limit in school zones is always 30 km/h in New Brunswick.
Answer: False



223. 
Multiple Choice
Before making a lane change, you should:
A. Check mirrors, blind spots, and signal
B. Rely only on your mirrors
C. Change lanes quickly without signalling
D. Slow down abruptly
Answer: A. Check mirrors, blind spots, and signal

224.
 True or False
Backing up on a highway is legal if no traffic is present.
Answer: False


225. 
Multiple Choice
When a traffic light is not working, you should:
A. Treat it as a four-way stop
B. Drive through without stopping
C. Yield only to large vehicles
D. Stop only if other traffic is visible
Answer: A. Treat it as a four-way stop


226. 
True or False
Texting while stopped at a red light is legal in New Brunswick.
Answer: False



227.
 Multiple Choice
If another driver is trying to pass you, you should:
A. Maintain or slightly reduce speed
B. Speed up to block them
C. Move into the oncoming lane
D. Sound your horn
Answer: A. Maintain or slightly reduce speed



228. 
True or False
Pedestrians at unmarked intersections have the right-of-way.
Answer: True



229.
 Multiple Choice
When exiting a highway, you should:
A. Signal early and reduce speed in the exit lane
B. Slow down before entering the exit lane
C. Stop before the exit ramp
D. Exit without signalling
Answer: A. Signal early and reduce speed in the exit lane



230. 
True or False
It is illegal to pass a vehicle in a tunnel.
Answer: True



231. 
Multiple Choice
When driving through standing water, you should:
A. Drive slowly to avoid splashing pedestrians
B. Speed through to avoid stalling
C. Stop in the water to test brakes
D. Use high beams for visibility
Answer: A. Drive slowly to avoid splashing pedestrians


232.
 True or False
Learner drivers are not allowed to drive between midnight and 5 a.m.
Answer: True



233.
 Multiple Choice
On a multi-lane highway, the left lane is generally used for:
A. Passing
B. Slow traffic
C. Parking
D. Emergency stopping
Answer: A. Passing



234. 
True or False
Cyclists can ride two abreast (side-by-side) if it is safe.
Answer: True



235. 
Multiple Choice
When your brakes overheat on a steep hill, you should:
A. Shift to a lower gear to slow the vehicle
B. Keep braking hard
C. Turn off the engine
D. Pump the brakes quickly
Answer: A. Shift to a lower gear to slow the vehicle

236. 
True or False
You may cross a railway crossing without stopping if no signals are active and tracks are clear.
Answer: True

237.
 Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights and pull off the road
B. Speed up to reach a service station
C. Keep driving using streetlights only
D. Use high beams from another car
Answer: A. Turn on hazard lights and pull off the road



238. 
True or False
Driving without valid registration is legal if your insurance is active.
Answer: False



239. 
Multiple Choice
The best way to recover from hydroplaning is to:
A. Ease off the accelerator and steer straight
B. Brake hard
C. Turn sharply toward the shoulder
D. Shift into neutral immediately
Answer: A. Ease off the accelerator and steer straight



240. 
True or False
It is safe to remove your seatbelt while driving if you are reversing.
Answer: False



241. 
Multiple Choice
In a residential area, the speed limit is usually:
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: C. 50 km/h



242.
 True or False
Animals crossing signs indicate you should slow down and watch both sides of the road.
Answer: True



243. 
Multiple Choice
When following an emergency vehicle, you must stay at least:
A. 150 metres behind
B. 50 metres behind
C. 10 metres behind
D. 500 metres behind
Answer: A. 150 metres behind



244. 
True or False
It is legal to park in a bike lane if there are no cyclists present.
Answer: False



245.
 Multiple Choice
If your rear wheels skid, you should:
A. Steer in the same direction as the skid
B. Steer in the opposite direction
C. Brake hard
D. Accelerate quickly
Answer: A. Steer in the same direction as the skid



246.
 True or False
Driving too slowly can be as dangerous as speeding.
Answer: True



247.
 Multiple Choice
When driving in heavy rain, you should:
A. Increase following distance and use low beams
B. Use high beams for better visibility
C. Drive faster to reduce time in the rain
D. Follow closely behind large vehicles
Answer: A. Increase following distance and use low beams



248.
 True or False
You must yield to buses leaving a bus stop in New Brunswick.
Answer: True



249. 
Multiple Choice
When approaching a flashing red light, you must:
A. Stop and proceed when safe
B. Proceed without stopping
C. Yield only if traffic is present
D. Slow down but continue
Answer: A. Stop and proceed when safe



250.
 True or False
It is illegal to leave your engine running unattended.
Answer: True


251.
 Multiple Choice
When passing a cyclist, you should leave at least:
A. 0.5 metre of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space



252.
 True or False
Driving with a broken brake light is allowed if you use hand signals.
Answer: False



253.
 Multiple Choice
Before changing lanes, you should:
A. Check mirrors and blind spots, signal, then change lanes
B. Signal and move immediately
C. Honk and change lanes quickly
D. Slow down and change lanes without signalling
Answer: A. Check mirrors and blind spots, signal, then change lanes



254. 
True or False
The posted speed limit is the maximum safe speed in all conditions.
Answer: False



255. 
Multiple Choice
When parking uphill without a curb, turn your wheels:
A. Toward the road
B. Toward the side of the road
C. Straight ahead
D. Any direction
Answer: B. Toward the side of the road



256. 
True or False
Drivers must stop for pedestrians only at marked crosswalks.
Answer: False



257. 
Multiple Choice
If your vehicle starts to fishtail on ice, you should:
A. Steer in the direction you want to go
B. Steer in the opposite direction
C. Brake hard
D. Accelerate to straighten out
Answer: A. Steer in the direction you want to go



258. 
True or False
Learner drivers must be accompanied by a licensed driver at all times.
Answer: True



259.
 Multiple Choice
When approaching a pedestrian at an unmarked crossing, you should:
A. Slow down and be prepared to stop
B. Continue at the same speed
C. Honk to warn them
D. Change lanes to avoid them
Answer: A. Slow down and be prepared to stop



260.
 True or False
You can legally drive barefoot in New Brunswick.
Answer: True



261.
 Multiple Choice
In heavy snow, which lights should you use?
A. High beams
B. Low beams
C. No lights
D. Hazard lights only
Answer: B. Low beams



262.
 True or False
It is legal to park within 3 metres of a fire hydrant.
Answer: False



263. 
Multiple Choice
When entering a freeway, the acceleration lane is used to:
A. Match the speed of traffic before merging
B. Stop and wait for a gap
C. Test your brakes
D. Pass other vehicles
Answer: A. Match the speed of traffic before merging
Answer: A. Adjust speed to match highway traffic



264. 
True or False
Learner drivers are allowed to use hands-free devices.
Answer: False



265. 
Multiple Choice
If another driver flashes their headlights at you, it often means:
A. Slow down or there may be danger ahead
B. Your high beams are off
C. They want to race
D. Your car looks nice
Answer: A. Slow down or there may be danger ahead



266.
 True or False
When two vehicles arrive at a T-intersection, the vehicle on the through road has the right-of-way.
Answer: True



267. 
Multiple Choice
When driving through a residential area at night, you should:
A. Watch for pedestrians and animals
B. Speed up to clear the area quickly
C. Use high beams
D. Honk at each intersection
Answer: A. Watch for pedestrians and animals



268.
 True or False
It is safe to coast downhill in neutral.
Answer: False



269.
 Multiple Choice
If another driver is aggressive toward you, you should:
A. Stay calm and avoid eye contact
B. Respond with hand gestures
C. Speed up to get away
D. Block them from passing
Answer: A. Stay calm and avoid eye contact



270. 
True or False
Cyclists can use the full lane if it is too narrow for a vehicle to pass safely.
Answer: True



271.
 Multiple Choice
If your vehicle begins to fishtail on a slippery road, you should:
A. Steer gently in the direction you want to go
B. Turn sharply in the opposite direction
C. Brake hard immediately
D. Accelerate to regain control
Answer: A. Steer gently in the direction you want to go




272.
 True or False
A flashing yellow light means proceed with caution.
Answer: True



273.
 Multiple Choice
When driving behind a large truck, you should:
A. Stay far enough back to see the truck’s mirrors
B. Follow closely to save fuel
C. Drive in the truck’s blind spot
D. Use high beams to be seen
Answer: A. Stay far enough back to see the truck’s mirrors



274.
 True or False
In New Brunswick, all vehicles must have daytime running lights.
Answer: True



275. 
Multiple Choice
When turning right at a red light, you must:
A. Stop completely and yield to pedestrians and traffic
B. Slow down and turn without stopping
C. Honk before turning
D. Turn quickly to avoid waiting
Answer: A. Stop completely and yield to pedestrians and traffic




276. 
Multiple Choice
When following a motorcycle, you should:
A. Maintain the same distance as with cars
B. Allow extra following distance
C. Follow closely so others don’t cut in
D. Overtake quickly
Answer: B. Allow extra following distance



277. 
True or False
Using cruise control on icy roads is safe if you reduce speed.
Answer: False



278. 
Multiple Choice
When approaching a railway crossing with no lights or gates, you must:
A. Slow down, look both ways, and proceed if clear
B. Stop every time regardless of visibility
C. Speed up to cross quickly
D. Honk your horn to warn trains
Answer: A. Slow down, look both ways, and proceed if clear



279. 
True or False
You should always check your blind spots before changing lanes.
Answer: True



280.
 Multiple Choice
If your vehicle starts to fishtail on a slippery road, you should:
A. Brake firmly
B. Steer gently in the direction you want to go
C. Accelerate to straighten out
D. Turn sharply in the opposite direction
Answer: B. Steer gently in the direction you want to go



281.
 True or False
It is legal to drive without a windshield if you wear safety glasses.
Answer: False



282.
 Multiple Choice
When approaching a pedestrian with a white cane, you must:
A. Slow down and prepare to stop
B. Honk to warn them
C. Continue driving as usual
D. Only stop if they are on your side of the road
Answer: A. Slow down and prepare to stop



283. 
True or False
Bicycles are considered vehicles under New Brunswick traffic laws.
Answer: True



284.
 Multiple Choice
When driving at night, you should dim your high beams when approaching:
A. Only cars from the opposite direction
B. Any vehicle within 150 metres
C. Only when instructed by police
D. Never, to maintain visibility
Answer: B. Any vehicle within 150 metres



285.
 True or False
It’s okay to rest your foot on the brake pedal while driving to prepare for sudden stops.
Answer: False



286.
 Multiple Choice
When merging onto a freeway, you should:
A. Match your speed to traffic and merge safely
B. Stop at the end of the ramp until clear
C. Enter slowly and force traffic to yield
D. Use hazard lights while merging
Answer: A. Match your speed to traffic and merge safely



287.
 True or False
Road surfaces are most slippery just after rain begins.
Answer: True



288. 
Multiple Choice
If another driver is tailgating you, you should:
A. Speed up to create space
B. Brake hard to warn them
C. Move to another lane or let them pass
D. Ignore them
Answer: C. Move to another lane or let them pass



289.
 True or False
Driving with worn tires can increase stopping distance.
Answer: True



290.
 Multiple Choice
When turning right on a red light, you must:
A. Stop fully and yield to pedestrians and traffic
B. Slow down and turn if clear
C. Honk before turning
D. Turn only if no police are nearby
Answer: A. Stop fully and yield to pedestrians and traffic



291.
 True or False
Learner drivers in New Brunswick can drive without a supervising driver during daylight hours.
Answer: False



292.
 Multiple Choice
When driving in strong winds, you should:
A. Grip the steering wheel firmly
B. Increase speed to get through quickly
C. Drive in the center of the road
D. Use high beams
Answer: A. Grip the steering wheel firmly



293. 
True or False
You must use your turn signal for at least 30 metres before turning.
Answer: True



294.
 Multiple Choice
When stopping behind another vehicle on an uphill slope, you should:
A. Leave extra space to prevent rolling back
B. Stop very close to avoid others cutting in
C. Keep your foot on the accelerator
D. Turn your wheels sharply
Answer: A. Leave extra space to prevent rolling back



295. 
True or False
All passengers in the back seat must wear seatbelts.
Answer: True



296. 
Multiple Choice
If you see an animal crossing sign, you should:
A. Reduce speed and scan the road and ditches
B. Honk repeatedly
C. Ignore unless animals are visible
D. Accelerate to pass the area quickly
Answer: A. Reduce speed and scan the road and ditches



297. 
True or False
It is illegal to block an intersection, even during heavy traffic.
Answer: True



298. 
Multiple Choice
If your vision is blocked by a large vehicle, you should:
A. Increase following distance
B. Drive closer for better view
C. Overtake immediately
D. Flash your lights
Answer: A. Increase following distance


299. 
True or False
You can overtake a vehicle stopped at a pedestrian crossing if no pedestrians are visible.
Answer: False



300. 
Multiple Choice
When reversing, you should:
A. Check behind you by turning your head, not just mirrors
B. Use mirrors only
C. Reverse quickly to finish sooner
D. Keep both hands on the wheel and look forward
Answer: A. Check behind you by turning your head, not just mirrors



301.
 Multiple Choice
When approaching a curve on a rural road, you should:
A. Slow down before entering the curve
B. Brake sharply in the middle of the curve
C. Accelerate through the curve
D. Keep your speed the same as on straight roads
Answer: A. Slow down before entering the curve



302.
 True or False
Using your hazard lights while driving in heavy rain is recommended.
Answer: False



303.
 Multiple Choice
If you miss your exit on a highway, you should:
A. Continue to the next exit
B. Reverse carefully to the exit
C. Stop and wait for traffic to clear
D. Make a U-turn on the highway
Answer: A. Continue to the next exit

304. 
True or False
You may turn left on a red light from a one-way street to another one-way street, if safe.
Answer: True



305. 
Multiple Choice
When approaching an uncontrolled intersection, you should:
A. Slow down and be prepared to yield
B. Proceed without slowing if no vehicles are visible
C. Honk to warn other drivers
D. Stop only if another driver signals you
Answer: A. Slow down and be prepared to yield



306.
 True or False
It is legal to use headphones covering both ears while driving.
Answer: False



307. 
Multiple Choice
The main purpose of road markings with a solid and a broken line is to:
A. Indicate passing is allowed only on one side
B. Indicate both sides can pass freely
C. Mark lanes for slow-moving traffic
D. Direct cyclists only
Answer: A. Indicate passing is allowed only on one side



308. 
True or False
Children under a certain height must use an approved child safety seat.
Answer: True



309. 
Multiple Choice
When approaching a stop sign with no stop line, you must stop:
A. Before entering the crosswalk
B. Halfway into the intersection
C. Only if other traffic is approaching
D. Past the crosswalk
Answer: A. Before entering the crosswalk



310. 
True or False
A flashing amber light means proceed with caution.
Answer: True



311.
 Multiple Choice
When driving in snow, you should:
A. Accelerate slowly and brake gently
B. Drive faster to avoid getting stuck
C. Use cruise control for steady speed
D. Make sudden steering movements for better grip
Answer: A. Accelerate slowly and brake gently



312. 
True or False
You may park in front of a driveway if you are inside the vehicle.
Answer: False



313. 
Multiple Choice
When preparing to turn right at a red light, you must:
A. Stop and yield to pedestrians and traffic
B. Slow down and turn without stopping
C. Honk to warn others
D. Turn only if no police are around
Answer: A. Stop and yield to pedestrians and traffic



314.
 True or False
You can make a U-turn anywhere as long as no traffic is present.
Answer: False



315.
 Multiple Choice
When passing a cyclist, you should allow at least:
A. 1 metre of space
B. 2 metres of space
C. Half a metre of space
D. As much space as possible, even if crossing the centre line
Answer: B. 2 metres of space



316. 
True or False
Braking distances are longer on gravel roads than on paved roads.
Answer: True



317.
 Multiple Choice
When your vehicle’s wheels leave the pavement, you should:
A. Ease off the accelerator and steer back gently
B. Turn sharply to re-enter
C. Brake hard immediately
D. Accelerate to climb back up
Answer: A. Ease off the accelerator and steer back gently



318.
 True or False
Learner drivers may drive on highways in New Brunswick if accompanied by a qualified supervisor.
Answer: True



319. 
Multiple Choice
When approaching a construction zone, you must:
A. Slow down and follow posted signs
B. Drive through at normal speed
C. Honk to warn workers
D. Change lanes only if instructed by a flag person
Answer: A. Slow down and follow posted signs



320.
 True or False
Reversing into a main road from a driveway is always prohibited.
Answer: False



321. 
Multiple Choice
When overtaking a vehicle at night, you should:
A. Use your high beams until you pass
B. Dim headlights before drawing level
C. Pass without signalling
D. Drive very close before overtaking
Answer: B. Dim headlights before drawing level



322.
 True or False
It is safe to use high beams in foggy conditions for better visibility.
Answer: False



323.
 Multiple Choice
When stopping for a school bus with flashing amber lights, you should:
A. Slow down and prepare to stop
B. Pass quickly before lights turn red
C. Ignore if in the opposite lane
D. Honk to alert children
Answer: A. Slow down and prepare to stop



324.
 True or False
Motorcycles can stop more quickly than most cars.
Answer: True



325. 
Multiple Choice
When parking on a hill facing uphill with a curb, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Any direction
Answer: A. Away from the curb



326. 
True or False
Crossing a solid double line is allowed if no traffic is coming.
Answer: False



327.
 Multiple Choice
When driving behind a snowplow, you should:
A. Keep a safe distance and be patient
B. Overtake immediately
C. Drive close to benefit from cleared tracks
D. Use high beams to be seen
Answer: A. Keep a safe distance and be patient



328.
 True or False
It’s safer to reverse into a parking space than to drive forward into it.
Answer: True



329. 
Multiple Choice
If you approach an intersection and the traffic lights are out, you should:
A. Treat it as a four-way stop
B. Proceed as if it’s green
C. Drive through without stopping
D. Yield only to pedestrians
Answer: A. Treat it as a four-way stop



330. 
True or False
Using your horn unnecessarily can be considered an offence.
Answer: True



331. 
Multiple Choice
When driving through deep water, you should:
A. Drive slowly and steadily
B. Accelerate quickly to avoid stalling
C. Stop in the middle to check depth
D. Reverse out immediately
Answer: A. Drive slowly and steadily



332.
 True or False
Seatbelts can cause more harm than good in minor collisions.
Answer: False



333. 
Multiple Choice
When exiting a driveway onto a sidewalk, you must:
A. Yield to pedestrians
B. Stop only if a cyclist is approaching
C. Proceed without stopping
D. Honk before entering
Answer: A. Yield to pedestrians



334.
 True or False
Overdriving your headlights means driving so fast that you can’t stop within the distance you can see.
Answer: True



335. 
Multiple Choice
When approaching a flashing pedestrian crossing light, you should:
A. Slow down and prepare to stop
B. Continue if no pedestrians are visible
C. Honk to warn pedestrians
D. Accelerate to clear the crossing
Answer: A. Slow down and prepare to stop



336.
 True or False
New Brunswick requires daytime running lights on all vehicles.
Answer: True



337.
 Multiple Choice
When driving on a wet road, your stopping distance can be:
A. Twice as long as on dry pavement
B. The same as on dry pavement
C. Shorter than on dry pavement
D. Negligible if you have ABS
Answer: A. Twice as long as on dry pavement



338. 
True or False
If a police officer directs you to ignore a traffic sign, you must follow the officer’s instructions.
Answer: True


339. 
Multiple Choice
If your vehicle’s ABS warning light stays on, you should:
A. Have the system checked as soon as possible
B. Ignore it if brakes seem fine
C. Disconnect the battery to reset it
D. Pump the brakes continuously
Answer: A. Have the system checked as soon as possible



340.
 True or False
Alcohol affects judgment before it affects coordination.
Answer: True



341. 
Multiple Choice
When approaching a hillcrest on a two-lane road, you should:
A. Stay in your lane and reduce speed
B. Pass slower vehicles before the crest
C. Drive in the centre for better visibility
D. Accelerate to maintain momentum
Answer: A. Stay in your lane and reduce speed



342.
 True or False
It is safer to reverse out of a driveway than to back into it.
Answer: False


343.
 Multiple Choice
When entering a tunnel, you should:
A. Turn on headlights and remove sunglasses
B. Speed up to match tunnel traffic
C. Sound horn to alert others
D. Drive with hazard lights
Answer: A. Turn on headlights and remove sunglasses



344. 
True or False
It’s acceptable to leave your vehicle running unattended in cold weather to warm it up.
Answer: False



345. 
Multiple Choice
When using a roundabout with multiple lanes, you should:
A. Choose your lane before entering
B. Change lanes inside the roundabout if needed
C. Drive only in the outer lane
D. Enter from any lane without checking
Answer: A. Choose your lane before entering



346.
 True or False
Wet leaves on the road can be as slippery as ice.
Answer: True



347. 
Multiple Choice
If your windshield wipers fail during rain, you should:
A. Pull over safely until conditions improve
B. Keep driving using side windows for guidance
C. Speed up to keep rain off
D. Open your windows for better visibility
Answer: A. Pull over safely until conditions improve



348. 
True or False
Distracted driving can result in licence suspension in New Brunswick.
Answer: True



349.
 Multiple Choice
When approaching a parked emergency vehicle with flashing lights, you must:
A. Move over and slow down
B. Pass quickly without slowing
C. Stay in your lane and maintain speed
D. Stop completely before passing
Answer: A. Move over and slow down



350. 
True or False
Reckless driving can lead to both fines and jail time.
Answer: True


351.
 Multiple Choice
When entering a highway from an on-ramp, you should:
A. Accelerate to match the speed of traffic
B. Stop at the end of the ramp before merging
C. Merge slowly to avoid accidents
D. Use hazard lights while merging
Answer: A. Accelerate to match the speed of traffic



352.
 True or False
It’s illegal to text while stopped at a red light.
Answer: True



353. 
Multiple Choice
When approaching a flashing red traffic light, you must:
A. Slow down and proceed if clear
B. Stop completely, then go when safe
C. Continue without stopping
D. Yield only to large vehicles
Answer: B. Stop completely, then go when safe



354. 
True or False
Cyclists must obey the same traffic laws as drivers.
Answer: True



355.
 Multiple Choice
If your brakes fail while driving, you should:
A. Downshift to a lower gear and use the parking brake
B. Turn off the ignition immediately
C. Pump the accelerator to slow down
D. Steer into traffic to stop
Answer: A. Downshift to a lower gear and use the parking brake



356.
 True or False
Driving under the influence of drugs carries the same penalties as alcohol.
Answer: True



357.
 Multiple Choice
When approaching a crosswalk with a pedestrian waiting, you should:
A. Stop and let the pedestrian cross
B. Slow down but keep moving
C. Honk to warn them
D. Only stop if the pedestrian steps onto the road
Answer: A. Stop and let the pedestrian cross



358.
 True or False
ABS allows you to steer while braking hard.
Answer: True



359. 
Multiple Choice
When driving through a school zone, you must:
A. Obey the posted reduced speed limit during school hours
B. Drive at normal speed unless children are visible
C. Honk to alert students
D. Overtake slow vehicles
Answer: A. Obey the posted reduced speed limit during school hours



360. 
True or False
It is legal to drive with only one functioning headlight.
Answer: False



361.
 Multiple Choice
If a vehicle is hydroplaning, you should:
A. Ease off the accelerator and steer gently
B. Brake hard immediately
C. Turn the wheel sharply
D. Accelerate to regain traction
Answer: A. Ease off the accelerator and steer gently



362.
 True or False
You must signal even when turning into your own driveway.
Answer: True



363.
 Multiple Choice
When following a vehicle at night, you should:
A. Dim your headlights to avoid glare
B. Keep high beams on for better vision
C. Follow closely to use their lights
D. Flash your lights if they’re too slow
Answer: A. Dim your headlights to avoid glare



364.
 True or False
Passing is prohibited on hills where you can’t see ahead.
Answer: True



365. 
Multiple Choice
When you see a “slippery road” warning sign, you should:
A. Slow down and avoid sudden movements
B. Speed up to get past the hazard
C. Brake hard immediately
D. Drive in the middle of the road
Answer: A. Slow down and avoid sudden movements



366. 
True or False
You must always yield to buses re-entering traffic from a stop.
Answer: True



367.
 Multiple Choice
When driving near a large truck on a windy day, you should:
A. Be prepared for sudden wind gusts affecting your control
B. Drive in the truck’s blind spots
C. Pass closely to avoid drift
D. Match speed exactly to the truck
Answer: A. Be prepared for sudden wind gusts affecting your control



368.
 True or False
Flashing blue lights are used by snow removal vehicles in New Brunswick.
Answer: True



369. 
Multiple Choice
When your visibility is reduced due to fog, you should:
A. Use low beam headlights
B. Use high beam headlights
C. Drive with parking lights only
D. Turn off all lights to avoid glare
Answer: A. Use low beam headlights



370.
 True or False
A learner driver can drive alone if they are over 18.
Answer: False



371.
 Multiple Choice
If your vehicle skids while braking, you should:
A. Release the brake and steer in the desired direction
B. Keep braking harder
C. Turn the wheel sharply opposite the skid
D. Accelerate to straighten
Answer: A. Release the brake and steer in the desired direction



372.
 True or False
You must stop for a school bus even if it is on the opposite side of a divided highway.
Answer: False



373. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you should:
A. Move over and slow down
B. Pass at normal speed
C. Honk as a warning
D. Stop completely
Answer: A. Move over and slow down



374. 
True or False
Driving too slowly can be dangerous in certain situations.
Answer: True



375. 
Multiple Choice
When backing out of a parking space, you should:
A. Check mirrors and look over your shoulder
B. Reverse quickly to avoid blocking others
C. Rely only on your rear-view camera
D. Honk before reversing
Answer: A. Check mirrors and look over your shoulder



376. 
True or False
Wearing a seatbelt is optional for short trips under 1 km.
Answer: False


377.
 Multiple Choice
If your vehicle catches fire, you should:
A. Stop, turn off the engine, and move away safely
B. Drive to the nearest mechanic
C. Open the hood immediately
D. Throw water on the engine
Answer: A. Stop, turn off the engine, and move away safely



378. 
True or False
Passing another vehicle is prohibited in intersections.
Answer: True


379. 
Multiple Choice
When crossing a bridge in winter, you should:
A. Drive slowly as bridges freeze first
B. Speed up to avoid sliding
C. Drive in the centre of the bridge
D. Avoid braking
Answer: A. Drive slowly as bridges freeze first



380. 
True or False
It’s safe to drive in flip-flops as long as you are comfortable.
Answer: False



381. 
Multiple Choice
When a vehicle approaches you at night with high beams on, you should:
A. Look to the right edge of your lane
B. Stare directly at the lights
C. Flash your own high beams
D. Close your eyes briefly
Answer: A. Look to the right edge of your lane



382. 
True or False
ABS works best when you apply steady pressure to the brake pedal.
Answer: True



383.
 Multiple Choice
When driving in a residential area, you should:
A. Be ready for children or pets to run into the street
B. Drive faster to avoid being rear-ended
C. Honk to alert residents
D. Ignore speed limits if no one is outside
Answer: A. Be ready for children or pets to run into the street



384. 
True or False
A solid yellow line means passing is allowed if safe.
Answer: False



385. 
Multiple Choice
If you see a yield sign, you must:
A. Slow down and give the right-of-way to traffic
B. Stop no matter what
C. Speed up to merge
D. Ignore if traffic is light
Answer: A. Slow down and give the right-of-way to traffic



386.
 True or False
You can make a U-turn at any intersection unless a sign prohibits it.
Answer: False



387. 
Multiple Choice
When parking downhill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Any direction
Answer: A. Toward the curb



388. 
True or False
Excessive speed is a factor in many fatal collisions.
Answer: True



389. 
Multiple Choice
If you feel drowsy while driving, you should:
A. Pull over and rest
B. Open the window and keep driving
C. Drink coffee and continue
D. Speed up to finish sooner
Answer: A. Pull over and rest



390. 
True or False
Hydroplaning happens when your tires lose contact with the road due to water.
Answer: True



391. 
Multiple Choice
When overtaking another vehicle, you must:
A. Ensure you can see the road ahead clearly
B. Pass even if there’s oncoming traffic
C. Sound your horn and pass quickly
D. Drive in the other lane for as long as needed
Answer: A. Ensure you can see the road ahead clearly



392.
 True or False
Motorcyclists should ride side by side in the same lane.
Answer: False



393. 
Multiple Choice
When your tires blow out, you should:
A. Hold the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply off the road
D. Speed up to regain control
Answer: A. Hold the steering wheel firmly and slow down gradually



394. 
True or False
Vehicles must stop at railway crossings if a train is approaching.
Answer: True



395. 
Multiple Choice
If you must drive in heavy snow, you should:
A. Use low beam headlights and drive slowly
B. Use high beams for maximum visibility
C. Follow other vehicles closely
D. Avoid using winter tires
Answer: A. Use low beam headlights and drive slowly



396. 
True or False
In New Brunswick, drivers must carry proof of insurance.
Answer: True



397.
 Multiple Choice
If an oncoming vehicle is drifting into your lane, you should:
A. Sound the horn and steer right
B. Brake hard and stay in the centre
C. Speed up to pass before impact
D. Turn left into their lane
Answer: A. Sound the horn and steer right



398.
 True or False
Emergency vehicles with flashing lights have the right-of-way.
Answer: True



399. 
Multiple Choice
When parking without a curb on a hill, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the road
C. Leave wheels straight
D. Use no parking brake
Answer: A. Turn wheels toward the edge of the road



400.
 True or False
Seatbelt laws apply to all occupants of a vehicle.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for New Brunswick ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for New Brunswick .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $newBrunswick->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded New Brunswick citizenship questions.");
    }
}


