<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrinceEdwardsIslandDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $princeEdwardIsland = DrivingSection::firstOrCreate(
            ['title' => 'Prince Edwards Island'],
            [
                'type' => 'province',
                'capital' => 'Charlottetown',
                'flag' => '/images/flags/prince-edward-island.png',
                'description' => 'Prince Edwards Island Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_intersections.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $princeEdwardIsland->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the minimum age to apply for a Class 7 Instruction Permit in PEI?
A. 15
B. 16
C. 17
D. 18
Answer: B. 16



2. 
True or False
In PEI, a learner must always drive with a fully licensed driver seated beside them.
Answer: True



3.
 Multiple Choice
The maximum speed limit in school zones during school hours is:
A. 30 km/h
B. 40 km/h
C. 50 km/h
D. 60 km/h
Answer: A. 30 km/h



4. 
True or False
Seat belts are optional for drivers on rural roads in PEI.
Answer: False



5. 
Multiple Choice
When approaching a flashing red traffic light, you must:
A. Slow down and proceed if clear
B. Stop fully, then proceed when safe
C. Continue driving without stopping
D. Treat it as a green light
Answer: B. Stop fully, then proceed when safe



6.
 True or False
It is legal to overtake a school bus with flashing red lights if no children are visible.
Answer: False



7. 
Multiple Choice
If your brakes fail while driving, your first action should be to:
A. Steer into oncoming traffic
B. Pump the brake pedal
C. Turn off the engine immediately
D. Honk continuously
Answer: B. Pump the brake pedal



8. 
True or False
A learner driver in PEI may not drive between midnight and 5 a.m. without an exemption.
Answer: True



9. 
Multiple Choice
The main purpose of a shoulder check is to:
A. Signal your turn
B. Check blind spots for vehicles or cyclists
C. Adjust your mirrors
D. Reduce speed
Answer: B. Check blind spots for vehicles or cyclists



10.
 True or False
Cyclists are not required to obey stop signs in PEI.
Answer: False



11.
 Multiple Choice
When approaching a pedestrian crosswalk without traffic lights, you should:
A. Slow down but continue if no one is on the crosswalk
B. Stop if a pedestrian is waiting or crossing
C. Honk to warn pedestrians
D. Drive past quickly
Answer: B. Stop if a pedestrian is waiting or crossing



12. 
True or False
Learner drivers can use handheld phones if stopped at a red light.
Answer: False



13.
 Multiple Choice
The safest following distance under ideal conditions is:
A. One second
B. Two seconds
C. Three seconds
D. Four seconds
Answer: C. Three seconds



14.
 True or False
Drivers must yield to buses re-entering traffic from a bus stop in PEI.
Answer: True



15.
 Multiple Choice
When parallel parking, your wheels should be no more than:
A. 15 cm from the curb
B. 30 cm from the curb
C. 45 cm from the curb
D. 60 cm from the curb
Answer: B. 30 cm from the curb



16. 
True or False
You can park in front of a fire hydrant if your car is attended.
Answer: False



17. 
Multiple Choice
If your vehicle starts to skid, you should:
A. Steer in the opposite direction of the skid
B. Steer in the direction you want the front of the car to go
C. Brake hard immediately
D. Accelerate out of the skid
Answer: B. Steer in the direction you want the front of the car to go



18.
 True or False
It is legal to park within 5 metres of a crosswalk in PEI.
Answer: False



19. 
Multiple Choice
Before changing lanes, you should:
A. Signal, check mirrors, then shoulder check
B. Check mirrors, shoulder check, then signal
C. Signal only
D. Change lanes without signalling if clear
Answer: A. Signal, check mirrors, then shoulder check



20. 
True or False
Learner drivers in PEI can tow a trailer if supervised.
Answer: False



21. 
Multiple Choice
If you approach a railway crossing with no signals or gates, you should:
A. Slow down and proceed if safe
B. Stop completely, look both ways, then cross
C. Honk before crossing
D. Accelerate quickly
Answer: B. Stop completely, look both ways, then cross



22. 
True or False
You must dim high beams when following another vehicle within 60 metres.
Answer: True



23. 
Multiple Choice
When driving in fog, you should use:
A. High beam headlights
B. Low beam headlights
C. Parking lights only
D. No lights to avoid glare
Answer: B. Low beam headlights



24. 
True or False
Right turns on a red light are always allowed in PEI.
Answer: False



25. 
Multiple Choice
If a tire blows out while driving, you should:
A. Steer firmly and slow down gradually
B. Brake hard immediately
C. Accelerate to keep control
D. Turn sharply to the shoulder
Answer: A. Steer firmly and slow down gradually



26. 
True or False
It is mandatory to carry proof of insurance when driving in PEI.
Answer: True



27. 
Multiple Choice
The main purpose of a roundabout is to:
A. Slow traffic without stopping
B. Allow U-turns
C. Eliminate pedestrian crossings
D. Increase speed flow
Answer: A. Slow traffic without stopping



28. 
True or False
Passing another vehicle on a curve is allowed if the road is clear.
Answer: False



29.
 Multiple Choice
When approaching a green light that has been on for some time, you should:
A. Maintain speed without checking
B. Prepare to stop if it turns yellow
C. Accelerate quickly
D. Stop immediately
Answer: B. Prepare to stop if it turns yellow



30. 
True or False
It is legal to coast downhill in neutral in PEI.
Answer: False



31.
 Multiple Choice
When your car starts to overheat, you should:
A. Pull over safely and turn off the engine
B. Turn on the heater to draw heat from the engine
C. Check coolant level when safe
D. All of the above
Answer: D. All of the above



32.
 True or False
Learner drivers must have zero blood alcohol level when driving.
Answer: True



33. 
Multiple Choice
When parking on a hill facing uphill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Away from the curb



34. 
True or False
You must stop for pedestrians only at marked crosswalks.
Answer: False



35.
 Multiple Choice
The minimum following distance behind a motorcycle in ideal conditions should be:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



36. 
True or False
Drivers must slow down when passing emergency vehicles with flashing lights.
Answer: True



37. 
Multiple Choice
When approaching a stop sign, you should stop:
A. Before the stop line or crosswalk
B. After entering the intersection
C. Only if another car is coming
D. Just before the middle of the intersection
Answer: A. Before the stop line or crosswalk



38. 
True or False
A flashing yellow light means you must stop before proceeding.
Answer: False



39.
 Multiple Choice
When entering a highway, you should:
A. Match the speed of traffic and merge safely
B. Enter slowly and wait for traffic to slow down
C. Stop at the end of the ramp
D. Honk to alert other drivers
Answer: A. Match the speed of traffic and merge safely



40.
 True or False
Learner drivers can carry as many passengers as the vehicle is licensed for.
Answer: False



41. 
Multiple Choice
When driving near a cyclist, you must give at least:
A. 0.5 metre clearance
B. 1 metre clearance
C. 2 metres clearance
D. Any space available
Answer: B. 1 metre clearance



42. 
True or False
Vehicles in PEI must yield to funeral processions.
Answer: True



43.
 Multiple Choice
If traffic lights are out at an intersection, you should:
A. Treat it as a four-way stop
B. Continue without stopping
C. Honk and proceed
D. Follow the car ahead without checking
Answer: A. Treat it as a four-way stop



44. 
True or False
You must always signal before pulling over to the side of the road.
Answer: True



45.
 Multiple Choice
When approaching a hill with limited visibility, you should:
A. Slow down and keep to the right
B. Drive in the middle of the lane
C. Accelerate quickly
D. Use high beams regardless of traffic
Answer: A. Slow down and keep to the right



46. 
True or False
It is legal to park in a bus stop zone if no bus is present.
Answer: False



47. 
Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights and pull over safely
B. Continue driving using streetlights
C. Speed up to reach home quickly
D. Use high beams only
Answer: A. Turn on hazard lights and pull over safely



48.
 True or False
Drivers must always carry their driver’s licence while driving.
Answer: True



49.
 Multiple Choice
When following a large truck, you should:
A. Stay far enough back to see its mirrors
B. Follow closely to draft
C. Overtake immediately
D. Drive directly beside it
Answer: A. Stay far enough back to see its mirrors



50. 
True or False
It is safe to pass another vehicle in a no-passing zone if you are in a hurry.
Answer: False

51.
 Multiple Choice
When approaching a stopped school bus with flashing amber lights, you should:
A. Pass carefully before the red lights turn on
B. Prepare to stop, as red lights will follow
C. Honk to warn children
D. Continue driving at normal speed
Answer: B. Prepare to stop, as red lights will follow



52. 
True or False
Learner drivers may not supervise another learner driver.
Answer: True



53. 
Multiple Choice
When exiting a highway, you should:
A. Signal early and reduce speed in the exit lane
B. Slow down on the highway before moving over
C. Change lanes at the last second
D. Avoid signalling to keep traffic moving
Answer: A. Signal early and reduce speed in the exit lane



54. 
True or False
It is legal to park on a sidewalk if no pedestrians are present.
Answer: False



55.
 Multiple Choice
When two vehicles arrive at an uncontrolled intersection at the same time, who has the right of way?
A. The vehicle on the left
B. The vehicle on the right
C. The larger vehicle
D. The faster vehicle
Answer: B. The vehicle on the right



56. 
True or False
It is illegal to block an intersection even if the traffic light is green.
Answer: True



57. 
Multiple Choice
When driving at night, you should dim your high beams when you are within:
A. 30 metres of another vehicle
B. 60 metres of another vehicle
C. 120 metres of another vehicle
D. 150 metres of another vehicle
Answer: B. 60 metres of another vehicle



58. 
True or False
Learner drivers in PEI may drive alone to a driving test appointment.
Answer: False



59.
 Multiple Choice
If an emergency vehicle is stopped on the side of the road with flashing lights, you should:
A. Maintain speed but move slightly over
B. Slow down and move over if safe
C. Stop completely regardless of traffic
D. Continue without slowing
Answer: B. Slow down and move over if safe



60.
 True or False
You should always signal when leaving a roundabout.
Answer: True



61. 
Multiple Choice
The safest way to handle a tire blowout is to:
A. Brake hard and steer sharply
B. Ease off the accelerator and steer straight
C. Accelerate to maintain control
D. Turn quickly to the shoulder
Answer: B. Ease off the accelerator and steer straight



62. 
True or False
You can legally make a U-turn on a curve if no cars are visible.
Answer: False



63.
 Multiple Choice
When parking on a hill facing downhill with no curb, turn your wheels:
A. Toward the roadside edge
B. Away from the roadside edge
C. Straight ahead
D. It doesn’t matter
Answer: A. Toward the roadside edge



64. 
True or False
Cyclists are allowed to use the full lane if necessary for safety.
Answer: True



65. 
Multiple Choice
The main purpose of a hazard light is to:
A. Show you are driving slowly
B. Warn others your vehicle is stopped or in trouble
C. Signal a lane change
D. Indicate a turn
Answer: B. Warn others your vehicle is stopped or in trouble



66. 
True or False
In PEI, you may pass another vehicle within 30 metres of a pedestrian crossing.
Answer: False



67. 
Multiple Choice
At a four-way stop, if two vehicles arrive at the same time, you should:
A. Yield to the vehicle on your left
B. Yield to the vehicle on your right
C. Wave the other driver through
D. Go first if you are faster
Answer: B. Yield to the vehicle on your right



68.
 True or False
It is legal to drive without your driver’s licence on you if you can recall the number.
Answer: False



69. 
Multiple Choice
When parallel parking, you should:
A. Signal, position your car, and reverse slowly into the space
B. Drive in headfirst
C. Block traffic until space is clear
D. Skip signalling if traffic is light
Answer: A. Signal, position your car, and reverse slowly into the space



70. 
True or False
Learner drivers may carry passengers only if the supervising driver agrees.
Answer: True



71. 
Multiple Choice
When backing out of a parking spot, you should:
A. Look in mirrors only
B. Turn and look over your shoulder
C. Rely on backup camera alone
D. Honk before moving
Answer: B. Turn and look over your shoulder



72. 
True or False
Road signs in PEI may include symbols, words, or both.
Answer: True



73.
 Multiple Choice
If your car begins to skid on ice, you should:
A. Brake hard immediately
B. Steer gently in the direction you want to go
C. Accelerate quickly
D. Turn in the opposite direction of the skid
Answer: B. Steer gently in the direction you want to go



74. 
True or False
You may park closer than 3 metres to a fire hydrant if the hydrant is on private property.
Answer: False



75.
 Multiple Choice
When approaching a blind curve, you should:
A. Stay in the middle of the lane
B. Slow down and keep to the right
C. Accelerate through the curve
D. Honk continuously
Answer: B. Slow down and keep to the right



76. 
True or False
Flashing red lights at a railway crossing mean you must stop and wait until the lights stop.
Answer: True



77. 
Multiple Choice
When following a motorcycle, you should allow at least:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



78.
 True or False
Learner drivers must always display an “L” sign on their vehicle in PEI.
Answer: False



79. 
Multiple Choice
The safest way to approach an uncontrolled intersection is to:
A. Slow down and be ready to stop
B. Continue at normal speed
C. Honk to warn others
D. Stop regardless of traffic
Answer: A. Slow down and be ready to stop



80.
 True or False
It is legal to pass another vehicle on a bridge if no oncoming traffic is present.
Answer: False



81. 
Multiple Choice
When driving in rural areas at night, you should watch for:
A. Pedestrians only
B. Wildlife crossing the road
C. Bicycles without lights
D. Farm machinery
Answer: B. Wildlife crossing the road



82. 
True or False
If your vehicle is involved in a collision, you must exchange information with other drivers.
Answer: True



83. 
Multiple Choice
When changing lanes, you should:
A. Signal, check mirrors, and do a shoulder check
B. Change lanes first, then signal
C. Only use mirrors, not shoulder checks
D. Move quickly without signalling
Answer: A. Signal, check mirrors, and do a shoulder check



84.
 True or False
The posted speed limit is the maximum speed under ideal conditions.
Answer: True



85. 
Multiple Choice
When parking on a two-way street, you should:
A. Park facing the direction of traffic
B. Park in any direction
C. Park in the middle of the street
D. Park facing oncoming traffic
Answer: A. Park facing the direction of traffic



86.
 True or False
You may enter a roundabout without yielding if no cars are in your lane.
Answer: False



87. 
Multiple Choice
The safest way to reverse is to:
A. Rely only on mirrors
B. Look over your right shoulder and reverse slowly
C. Reverse quickly to clear space
D. Keep your head facing forward
Answer: B. Look over your right shoulder and reverse slowly



88. 
True or False
You should always check blind spots before changing lanes.
Answer: True



89. 
Multiple Choice
When approaching a yellow traffic light, you should:
A. Speed up to beat the red
B. Stop if safe to do so
C. Continue at the same speed
D. Honk to alert others
Answer: B. Stop if safe to do so



90. 
True or False
It is legal to park in front of a driveway if it belongs to a family member.
Answer: False



91. 
Multiple Choice
When entering a highway from an on-ramp, you should:
A. Accelerate to match traffic speed and merge smoothly
B. Enter slowly and expect traffic to yield
C. Stop at the end of the ramp
D. Signal after merging
Answer: A. Accelerate to match traffic speed and merge smoothly



92. 
True or False
Learner drivers can drive on PEI highways if accompanied by a licensed supervisor.
Answer: True



93. 
Multiple Choice
When stopping on a slippery road, you should:
A. Brake gently and early
B. Brake hard immediately
C. Pump the brakes rapidly on ABS-equipped cars
D. Use the parking brake
Answer: A. Brake gently and early



94.
 True or False
Seat belts are not required in vehicles manufactured before 1980.
Answer: False



95.
 Multiple Choice
If you miss your exit on a highway, you should:
A. Reverse to the exit
B. Continue to the next exit
C. Stop and turn around
D. Make a U-turn across the median
Answer: B. Continue to the next exit



96. 
True or False
It is legal to stop in a live lane of traffic to check directions.
Answer: False



97. 
Multiple Choice
When parking downhill with a curb, your front wheels should be turned:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: A. Toward the curb



98.
 True or False
Drivers must yield to pedestrians only at marked crosswalks.
Answer: False



99. 
Multiple Choice
The best way to stay alert on a long drive is to:
A. Drink coffee and keep going
B. Take regular breaks every 1–2 hours
C. Open the windows for fresh air
D. Turn up the radio volume
Answer: B. Take regular breaks every 1–2 hours



100. 
True or False
It is safe to rely solely on cruise control in rainy conditions.
Answer: False



101.
 Multiple Choice
When approaching a pedestrian crosswalk without signals, you should:
A. Slow down and stop if a pedestrian is waiting
B. Drive through if no one is crossing
C. Honk to warn pedestrians
D. Only stop if forced to
Answer: A. Slow down and stop if a pedestrian is waiting



102. 
True or False
Learner drivers are allowed to drive between midnight and 5 a.m. in PEI.
Answer: False



103. 
Multiple Choice
If your vehicle starts to hydroplane, you should:
A. Brake hard immediately
B. Ease off the accelerator and steer gently
C. Steer sharply to regain control
D. Accelerate to break through the water
Answer: B. Ease off the accelerator and steer gently



104.
 True or False
It is safe to pass another vehicle on a solid yellow line if they are going well below the speed limit.
Answer: False



105. 
Multiple Choice
When driving near children, you should:
A. Reduce speed and be ready to stop
B. Honk to warn them
C. Drive at normal speed
D. Focus on other traffic only
Answer: A. Reduce speed and be ready to stop



106.
 True or False
A supervising driver must be seated in the front passenger seat.
Answer: True



107.
 Multiple Choice
When entering a roundabout, you must yield to:
A. Traffic to your right
B. Traffic already in the roundabout
C. Traffic entering from the left
D. Only large vehicles
Answer: B. Traffic already in the roundabout



108. 
True or False
It is legal to overtake another vehicle within 30 metres of a railway crossing.
Answer: False



109.
 Multiple Choice
If an oncoming vehicle’s headlights are blinding you at night, you should:
A. Look toward the right edge of your lane
B. Close your eyes briefly
C. Flash your high beams back
D. Slow down and stop immediately
Answer: A. Look toward the right edge of your lane



110. 
True or False
A learner driver may transport as many passengers as there are seat belts.
Answer: True



111.
 Multiple Choice
When stopping for a school bus with red flashing lights, you must stop at least:
A. 3 metres away
B. 5 metres away
C. 6 metres away
D. 8 metres away
Answer: D. 8 metres away



112. 
True or False
You can park in a loading zone if you remain in the vehicle.
Answer: False



113.
 Multiple Choice
What is the main purpose of rumble strips on the road?
A. To mark pedestrian crossings
B. To alert drivers they are leaving the lane
C. To measure vehicle weight
D. To slow traffic in school zones
Answer: B. To alert drivers they are leaving the lane



114.
 True or False
It is legal to wear headphones while driving if you can still hear traffic sounds.
Answer: False



115.
 Multiple Choice
When your windshield wipers fail during heavy rain, you should:
A. Pull over to a safe location immediately
B. Continue driving slowly
C. Use your hazard lights and keep moving
D. Stick your head out the window
Answer: A. Pull over to a safe location immediately



116.
 True or False
A flashing yellow traffic light means you must stop completely before proceeding.
Answer: False



117.
 Multiple Choice
If your brakes fail while driving, you should first:
A. Shift to a lower gear and pump the brake pedal
B. Turn off the engine immediately
C. Use the parking brake only
D. Jump out of the vehicle
Answer: A. Shift to a lower gear and pump the brake pedal



118.
 True or False
Drivers must yield to buses re-entering traffic from a bus stop.
Answer: True



119.
 Multiple Choice
When merging onto a highway, you should:
A. Match your speed to the flow of traffic before entering
B. Enter at any speed and expect traffic to adjust
C. Stop at the end of the merge lane
D. Honk to force entry
Answer: A. Match your speed to the flow of traffic before entering



120. 
True or False
It is legal to park less than 3 metres from a crosswalk.
Answer: False



121.
 Multiple Choice
When driving in fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Drive without lights
D. Flash headlights continuously
Answer: A. Use low-beam headlights



122. 
True or False
A learner driver can operate a vehicle in another province if accompanied by a qualified supervisor.
Answer: True



123. 
Multiple Choice
If you see a pedestrian starting to cross at a green light, you should:
A. Continue if your lane is clear
B. Yield until they have finished crossing
C. Honk to make them hurry
D. Change lanes to pass them
Answer: B. Yield until they have finished crossing



124.
 True or False
It is legal to coast downhill in neutral to save fuel.
Answer: False



125.
 Multiple Choice
When driving in winter conditions, you should:
A. Use gentle acceleration and braking
B. Brake hard to maintain control
C. Accelerate quickly to avoid skidding
D. Use cruise control for smoothness
Answer: A. Use gentle acceleration and braking



126.
 True or False
The law requires you to keep proof of insurance in your vehicle at all times.
Answer: True



127.
 Multiple Choice
When another vehicle is passing you, you should:
A. Speed up to match their speed
B. Stay in your lane and maintain your speed
C. Move to the shoulder
D. Brake suddenly
Answer: B. Stay in your lane and maintain your speed



128. 
True or False
It is acceptable to pass a vehicle stopped at a crosswalk.
Answer: False



129.
 Multiple Choice
If you miss your turn at an intersection, you should:
A. Stop and back up
B. Make a U-turn immediately
C. Continue to the next safe location to turn
D. Signal and turn from your lane
Answer: C. Continue to the next safe location to turn



130. 
True or False
Using high beams in fog improves visibility.
Answer: False



131. 
Multiple Choice
When approaching a green light that has been green for a while, you should:
A. Maintain speed without caution
B. Prepare for it to change to yellow
C. Accelerate to beat the yellow
D. Stop immediately
Answer: B. Prepare for it to change to yellow



132. 
True or False
Learner drivers may not tow another vehicle.
Answer: True



133. 
Multiple Choice
When approaching an emergency scene on the road, you should:
A. Slow down and move over if safe
B. Maintain speed to keep traffic moving
C. Stop to watch
D. Honk to warn others
Answer: A. Slow down and move over if safe



134. 
True or False
It is legal to stop in a bike lane to pick up passengers.
Answer: False



135.
 Multiple Choice
When exiting a roundabout, you should:
A. Signal right before your exit
B. Exit without signalling
C. Stop in the roundabout before exiting
D. Signal left to leave
Answer: A. Signal right before your exit



136. 
True or False
Drivers should maintain a safe following distance even in slow traffic.
Answer: True



137. 
Multiple Choice
When you see a flashing green traffic light in PEI, it means:
A. The light is about to turn red
B. Pedestrians may be crossing
C. You have the right of way to turn left
D. The signal is faulty
Answer: C. You have the right of way to turn left



138.
 True or False
You may overtake another vehicle in a tunnel if the road is clear.
Answer: False



139.
 Multiple Choice
The purpose of a shoulder check is to:
A. Verify what is beside and slightly behind your vehicle
B. Check your mirrors again
C. Look for traffic far ahead
D. Maintain posture while driving
Answer: A. Verify what is beside and slightly behind your vehicle



140.
 True or False
Seat belts must be worn even in vehicles equipped with airbags.
Answer: True



141.
 Multiple Choice
When passing a cyclist, you should leave at least:
A. 0.5 metres of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space



142. 
True or False
You may cross a solid white line when changing lanes.
Answer: False



143. 
Multiple Choice
When entering a highway from a rest area, you should:
A. Match the speed of highway traffic before merging
B. Stop at the end of the ramp
C. Merge at a low speed and wait for others to adjust
D. Honk to warn traffic
Answer: A. Match the speed of highway traffic before merging



144. 
True or False
Learner drivers can drive on gravel roads without supervision.
Answer: False



145. 
Multiple Choice
When driving on a two-lane highway, you should pass:
A. Only when the road markings allow and it is safe
B. Whenever you feel confident
C. Without signalling
D. At intersections to save time
Answer: A. Only when the road markings allow and it is safe



146.
 True or False
Driving at night requires a longer following distance than in daylight.
Answer: True



147.
 Multiple Choice
When a traffic signal is not working, you should:
A. Treat the intersection as a four-way stop
B. Drive through without stopping
C. Yield only to larger vehicles
D. Follow the lane with most traffic
Answer: A. Treat the intersection as a four-way stop



148.
 True or False
Learner drivers may use a handheld phone in emergencies.
Answer: True



149. 
Multiple Choice
If you must drive through standing water, you should:
A. Drive quickly to avoid stalling
B. Go slowly and test brakes afterward
C. Stop and wait for water to recede
D. Change to a higher gear
Answer: B. Go slowly and test brakes afterward



150. 
True or False
It is safe to remove both hands from the steering wheel when adjusting the radio.
Answer: False



151.
 Multiple Choice
When driving in heavy rain, you should:
A. Use high beams for better visibility
B. Slow down and increase following distance
C. Drive faster to pass the storm
D. Ignore puddles and drive normally
Answer: B. Slow down and increase following distance



152. 
True or False
Learner drivers must always display an “L” sign on their vehicle.
Answer: True



153.
 Multiple Choice
When approaching an intersection with no signs or signals, you should:
A. Yield to the vehicle on your right
B. Yield to the vehicle on your left
C. Drive through without slowing
D. Stop only if someone honks
Answer: A. Yield to the vehicle on your right



154.
 True or False
It is legal to park on a sidewalk as long as you leave space for pedestrians.
Answer: False



155.
 Multiple Choice
When making a right turn from a two-way street, you should:
A. Turn from the left lane
B. Turn from the right lane into the right lane
C. Turn from the right lane into the left lane
D. Stop in the intersection before turning
Answer: B. Turn from the right lane into the right lane



156.
 True or False
Driving without insurance is a serious offence in PEI.
Answer: True



157. 
Multiple Choice
When approaching a flashing red light, you must:
A. Slow down and yield
B. Stop completely and proceed when safe
C. Drive through if no one is coming
D. Speed up to clear the intersection
Answer: B. Stop completely and proceed when safe



158. 
True or False
It is safe to use cruise control on icy roads.
Answer: False



159.
 Multiple Choice
The safest way to check for vehicles in your blind spot is to:
A. Use mirrors only
B. Perform a quick shoulder check
C. Turn your steering wheel slightly
D. Lean forward in your seat
Answer: B. Perform a quick shoulder check



160.
 True or False
Learner drivers may not transport any passengers.
Answer: False



161. 
Multiple Choice
When backing out of a driveway, you must:
A. Rely on mirrors only
B. Check around your vehicle and look over your shoulder
C. Back out quickly to avoid blocking traffic
D. Use only your rear-view camera
Answer: B. Check around your vehicle and look over your shoulder



162.
 True or False
It is legal to overtake a school bus with flashing amber lights.
Answer: True



163.
 Multiple Choice
If you hear a siren while driving, you must:
A. Continue driving normally
B. Pull over to the right and stop
C. Stop in your lane
D. Speed up to clear the road
Answer: B. Pull over to the right and stop



164. 
True or False
A learner driver can drive without a supervisor on rural roads.
Answer: False



165.
 Multiple Choice
What should you do if your vehicle starts to skid?
A. Steer in the opposite direction of the skid
B. Steer gently in the direction you want to go
C. Brake hard immediately
D. Accelerate to regain traction
Answer: B. Steer gently in the direction you want to go



166.
 True or False
It is legal to park in front of a fire hydrant if your vehicle is running.
Answer: False



167. 
Multiple Choice
When driving behind a motorcycle, you should:
A. Maintain the same following distance as a car
B. Increase your following distance
C. Drive closer so they can see you
D. Pass at every opportunity
Answer: B. Increase your following distance



168.
 True or False
You can be fined for not wearing a seat belt in PEI.
Answer: True



169.
 Multiple Choice
When parking uphill with a curb, you should:
A. Turn wheels away from the curb
B. Turn wheels toward the curb
C. Keep wheels straight
D. Leave the car in neutral
Answer: A. Turn wheels away from the curb



170.
 True or False
It is legal to park in a bus stop zone at night.
Answer: False



171. 
Multiple Choice
When driving in snow, you should:
A. Use gentle steering and acceleration
B. Brake sharply when needed
C. Accelerate quickly to avoid getting stuck
D. Use cruise control for smoothness
Answer: A. Use gentle steering and acceleration



172.
 True or False
Learner drivers must carry their licence at all times when driving.
Answer: True



173. 
Multiple Choice
If another driver is tailgating you, you should:
A. Brake hard to warn them
B. Speed up to get away
C. Slow down and let them pass when safe
D. Ignore them completely
Answer: C. Slow down and let them pass when safe



174.
 True or False
A flashing yellow light means you should stop before proceeding.
Answer: False



175. 
Multiple Choice
When approaching a crosswalk with pedestrians waiting, you must:
A. Stop and allow them to cross
B. Continue if you have a green light
C. Honk to alert them
D. Pass quickly before they step out
Answer: A. Stop and allow them to cross



176. 
True or False
It is safe to drive barefoot in PEI.
Answer: True



177.
 Multiple Choice
When changing lanes on a multi-lane road, you should:
A. Signal, check mirrors, and shoulder check
B. Signal only
C. Shoulder check only
D. Change lanes quickly without warning
Answer: A. Signal, check mirrors, and shoulder check



178. 
True or False
It is legal to block an intersection if you are turning left.
Answer: False



179. 
Multiple Choice
When you see an animal crossing sign, you should:
A. Speed up to clear the area
B. Slow down and watch both sides of the road
C. Honk continuously to scare animals away
D. Ignore unless you see an animal
Answer: B. Slow down and watch both sides of the road



180. 
True or False
Drivers must stop for pedestrians only at marked crosswalks.
Answer: False



181. 
Multiple Choice
When parking on a hill with a curb and facing downhill, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Toward the curb



182. 
True or False
You may park in front of a driveway if it’s your own.
Answer: False



183.
 Multiple Choice
When passing another vehicle, you must:
A. Return to your lane once you see both headlights in your mirror
B. Move back as soon as you pass their front bumper
C. Stay in the passing lane
D. Pass only on curves
Answer: A. Return to your lane once you see both headlights in your mirror



184. 
True or False
It is legal to drive with your parking lights on instead of headlights at night.
Answer: False



185. 
Multiple Choice
When entering a freeway, you should:
A. Stop at the end of the ramp
B. Match your speed to traffic and merge safely
C. Drive slowly until you find a gap
D. Merge without signalling
Answer: B. Match your speed to traffic and merge safely



186.
 True or False
Learner drivers may drive on a freeway in PEI if supervised.
Answer: True



187.
 Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral and brake gently
B. Turn off the ignition immediately
C. Pull the parking brake
D. Speed up to unstick it
Answer: A. Shift to neutral and brake gently



188. 
True or False
You must signal at least 30 metres before turning in PEI.
Answer: True



189. 
Multiple Choice
When approaching a hill where visibility is limited, you should:
A. Keep to your lane and reduce speed
B. Move to the centre of the road
C. Accelerate to clear the hill quickly
D. Use high beams
Answer: A. Keep to your lane and reduce speed



190.
 True or False
It is legal to double park if you stay in your vehicle.
Answer: False



191. 
Multiple Choice
When driving at night in rural areas, watch for:
A. Pedestrians only
B. Wildlife crossing the road
C. Large trucks
D. Cyclists without lights
Answer: B. Wildlife crossing the road



192.
 True or False
You may cross a railway track when red lights are flashing if no train is visible.
Answer: False



193.
 Multiple Choice
If your windshield wipers fail during heavy rain, you should:
A. Continue driving until you find shelter
B. Pull over safely and stop
C. Speed up to clear the rain
D. Use your defroster only
Answer: B. Pull over safely and stop



194. 
True or False
It is legal to drive with a cracked windshield if it does not block your view.
Answer: True



195. 
Multiple Choice
When approaching a construction zone, you should:
A. Ignore posted speed limits
B. Slow down and follow posted instructions
C. Drive in the lane with the least traffic
D. Honk to warn workers
Answer: B. Slow down and follow posted instructions



196.
 True or False
You may turn right on a red light after stopping, unless prohibited by a sign.
Answer: True



197. 
Multiple Choice
When your vehicle begins to fishtail, you should:
A. Brake hard immediately
B. Steer in the direction you want to go
C. Accelerate to correct it
D. Turn the wheel opposite to the skid
Answer: B. Steer in the direction you want to go



198.
 True or False
Learner drivers may not drive with any alcohol in their system.
Answer: True



199. 
Multiple Choice
When parking uphill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Away from the curb



200. 
True or False
You must always yield to vehicles already in an intersection.
Answer: True



201. 
Multiple Choice
When entering a roundabout, you must:
A. Enter without slowing down
B. Yield to traffic already in the roundabout
C. Stop before entering every time
D. Enter from the left lane only
Answer: B. Yield to traffic already in the roundabout



202. 
True or False
Learner drivers in PEI must always have a supervising driver in the front passenger seat.
Answer: True



203.
 Multiple Choice
When driving through fog, you should:
A. Use high beams for better vision
B. Use low beam headlights
C. Drive with hazard lights on continuously
D. Turn off your lights to reduce glare
Answer: B. Use low beam headlights



204.
 True or False
You can use a handheld GPS while driving if you hold it below the steering wheel.
Answer: False



205. 
Multiple Choice
When approaching a flashing yellow light, you should:
A. Slow down and proceed with caution
B. Stop completely before proceeding
C. Speed through to clear the intersection
D. Ignore it
Answer: A. Slow down and proceed with caution



206. 
True or False
It is legal to pass another vehicle in a school zone at the posted limit.
Answer: False



207. 
Multiple Choice
If your brakes fail, the first thing you should do is:
A. Pump the brake pedal
B. Turn off the ignition immediately
C. Shift to a higher gear
D. Jump out of the vehicle
Answer: A. Pump the brake pedal



208.
 True or False
It is legal to exceed the speed limit when overtaking a slow vehicle.
Answer: False



209.
 Multiple Choice
When driving past a cyclist, you must leave at least:
A. 0.5 metres of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space



210. 
True or False
Learner drivers can drive at any time of day in PEI.
Answer: True



211. 
Multiple Choice
When approaching a green light, you should:
A. Speed up to beat the yellow light
B. Proceed if the intersection is clear
C. Stop and wait for the next cycle
D. Change lanes before crossing
Answer: B. Proceed if the intersection is clear



212.
 True or False
It is legal to reverse on a highway if you miss an exit.
Answer: False



213.
 Multiple Choice
If your vehicle starts hydroplaning, you should:
A. Brake firmly
B. Ease off the accelerator and steer straight
C. Turn sharply to regain control
D. Speed up to regain traction
Answer: B. Ease off the accelerator and steer straight



214.
 True or False
Learner drivers may not drive with more than one non-family passenger under 21.
Answer: True



215.
 Multiple Choice
When making a left turn from a two-way street onto another two-way street, you should:
A. Turn from the right lane
B. Turn into the lane closest to the centre
C. Turn wide into the far lane
D. Stop in the intersection before turning
Answer: B. Turn into the lane closest to the centre



216.
 True or False
You can use your high beams within 60 metres of an oncoming vehicle.
Answer: False



217. 
Multiple Choice
What should you do if your headlights fail at night?
A. Continue driving slowly
B. Turn on hazard lights and pull over safely
C. Speed up to reach a lit area
D. Use your cellphone flashlight
Answer: B. Turn on hazard lights and pull over safely



218. 
True or False
It is legal to park in a crosswalk if no pedestrians are present.
Answer: False



219. 
Multiple Choice
When approaching a school bus with red lights flashing, you must:
A. Slow down and proceed with caution
B. Stop and remain stopped until lights stop flashing
C. Pass quickly if children are seated
D. Honk before passing
Answer: B. Stop and remain stopped until lights stop flashing



220. 
True or False
A learner licence is valid for 24 months in PEI.
Answer: True



221. 
Multiple Choice
When parking uphill without a curb, turn your wheels:
A. Toward the right shoulder
B. Toward the left
C. Straight ahead
D. Away from the shoulder
Answer: A. Toward the right shoulder



222. 
True or False
Learner drivers may not drive in the USA with a PEI permit.
Answer: True



223.
 Multiple Choice
If another driver flashes their headlights at you at night, it likely means:
A. They are greeting you
B. Your high beams are on
C. They want to race
D. You should pull over immediately
Answer: B. Your high beams are on



224.
 True or False
It is legal to drive with an interior light on at night.
Answer: True



225. 
Multiple Choice
When approaching a flashing amber light at an intersection, you should:
A. Stop completely
B. Slow down and proceed with caution
C. Speed through
D. Ignore it if no cars are present
Answer: B. Slow down and proceed with caution



226.
 True or False
A learner driver may tow a trailer in PEI.
Answer: False



227.
 Multiple Choice
When your car begins to skid on ice, you should:
A. Brake hard
B. Ease off the gas and steer gently in the desired direction
C. Turn sharply
D. Accelerate quickly
Answer: B. Ease off the gas and steer gently in the desired direction



228. 
True or False
It is illegal to cross a double solid yellow line except to turn left or enter a driveway.
Answer: True



229. 
Multiple Choice
When approaching a pedestrian with a white cane, you must:
A. Honk to alert them
B. Yield the right-of-way
C. Pass quickly before they cross
D. Ignore unless they step onto the road
Answer: B. Yield the right-of-way



230. 
True or False
Learner drivers are prohibited from driving between midnight and 5 a.m. without a supervisor.
Answer: True



231.
 Multiple Choice
When exiting a freeway, you should:
A. Signal and move to the exit lane early
B. Wait until the last second to signal
C. Stop on the freeway before the ramp
D. Change lanes quickly
Answer: A. Signal and move to the exit lane early



232. 
True or False
It is legal to park facing the wrong direction on a two-way street.
Answer: False



233. 
Multiple Choice
If your car drifts onto the shoulder, you should:
A. Steer sharply back onto the road
B. Ease off the accelerator and steer gently back
C. Brake hard
D. Accelerate to merge back
Answer: B. Ease off the accelerator and steer gently back



234. 
True or False
It is legal to use earphones in both ears while driving.
Answer: False



235. 
Multiple Choice
When a vehicle is stopped at a crosswalk, you must:
A. Overtake it carefully
B. Not pass until the crosswalk is clear
C. Honk to warn pedestrians
D. Drive in the opposite lane
Answer: B. Not pass until the crosswalk is clear



236.
 True or False
A learner driver may transport passengers over the posted capacity limit.
Answer: False



237. 
Multiple Choice
If your vehicle stalls on a railway crossing, you should:
A. Try to restart it immediately
B. Get everyone out and move away
C. Push it off quickly
D. Flag down a train
Answer: B. Get everyone out and move away



238. 
True or False
It is legal to use your hazard lights while driving in heavy rain.
Answer: True



239.
 Multiple Choice
When driving through a work zone at night, you should:
A. Follow posted signs and watch for workers
B. Ignore speed limits
C. Pass slowly without stopping
D. Use high beams only
Answer: A. Follow posted signs and watch for workers



240. 
True or False
Learner drivers must have zero blood alcohol concentration at all times.
Answer: True



241. 
Multiple Choice
When parking downhill without a curb, turn your wheels:
A. Toward the right shoulder
B. Toward the left
C. Straight ahead
D. Away from the shoulder
Answer: A. Toward the right shoulder



242. 
True or False
It is legal to coast downhill in neutral gear.
Answer: False



243. 
Multiple Choice
When you see flashing lights at a railway crossing, you must:
A. Slow down
B. Stop until lights stop flashing
C. Pass quickly before the train arrives
D. Honk to warn the train
Answer: B. Stop until lights stop flashing



244.
 True or False
Learner drivers may drive with animals unrestrained inside the car.
Answer: False



245.
 Multiple Choice
If your steering fails, you should:
A. Brake hard immediately
B. Grip the wheel firmly and ease off the accelerator
C. Turn sharply to regain control
D. Accelerate to straighten the car
Answer: B. Grip the wheel firmly and ease off the accelerator



246. 
True or False
You must dim your high beams within 150 metres of a vehicle ahead.
Answer: True



247.
 Multiple Choice
When driving in strong winds, you should:
A. Hold the steering wheel firmly
B. Drive close to large trucks for shelter
C. Brake suddenly if blown sideways
D. Use cruise control
Answer: A. Hold the steering wheel firmly



248. 
True or False
It is legal to park in a loading zone at any time.
Answer: False



249. 
Multiple Choice
When approaching a yield sign, you should:
A. Stop completely
B. Slow down and give way to traffic
C. Speed up if no one is near
D. Honk before entering
Answer: B. Slow down and give way to traffic



250. 
True or False
Learner drivers may drive only with a seat belt on.
Answer: True



251.
 Multiple Choice
When driving through heavy rain, you should:
A. Use cruise control
B. Slow down and keep a safe following distance
C. Drive at the speed limit regardless
D. Keep windows closed and wipers off
Answer: B. Slow down and keep a safe following distance



252.
 True or False
It is legal to block a private driveway as long as you remain in the vehicle.
Answer: False



253.
 Multiple Choice
What should you do if you are blinded by the headlights of an oncoming vehicle?
A. Look directly at the lights to adjust
B. Look to the right edge of your lane as a guide
C. Close your eyes briefly
D. Turn on high beams in response
Answer: B. Look to the right edge of your lane as a guide



254. 
True or False
Learner drivers may drive on 400-series highways in PEI.
Answer: False



255. 
Multiple Choice
When your turn signals fail, you should:
A. Avoid making turns
B. Use hand signals to indicate your intention
C. Stop driving immediately
D. Turn without warning
Answer: B. Use hand signals to indicate your intention



256. 
True or False
It is legal to drive with snow completely covering your windshield if your wipers are on.
Answer: False



257.
 Multiple Choice
When you see a flashing green light at an intersection in PEI, it means:
A. Pedestrians may cross
B. You may turn left when safe
C. All vehicles must stop
D. The light is malfunctioning
Answer: B. You may turn left when safe



258. 
True or False
Learner drivers are allowed to supervise other learners.
Answer: False



259. 
Multiple Choice
If your car starts to fishtail on a slippery road, you should:
A. Steer gently in the direction you want to go
B. Brake hard immediately
C. Turn the wheel sharply
D. Accelerate quickly
Answer: A. Steer gently in the direction you want to go



260.
 True or False
It is legal to park more than 30 cm away from the curb in PEI.
Answer: False



261. 
Multiple Choice
When approaching a fire truck with flashing lights, you must:
A. Maintain your speed
B. Pull to the right and stop
C. Continue driving if you are on the opposite side of the road
D. Speed up to get out of the way
Answer: B. Pull to the right and stop



262. 
True or False
Learner drivers can transport passengers without seat belts if the trip is short.
Answer: False



263. 
Multiple Choice
If you experience a tire blowout, you should:
A. Brake immediately
B. Grip the wheel firmly and slow down gradually
C. Turn sharply to the side of the road
D. Continue driving until the next gas station
Answer: B. Grip the wheel firmly and slow down gradually



264. 
True or False
It is legal to park in a bus stop zone as long as you are only there briefly.
Answer: False



265. 
Multiple Choice
When driving downhill, you should:
A. Shift to a lower gear to help control speed
B. Coast in neutral to save fuel
C. Keep pressing the brake pedal continuously
D. Use cruise control
Answer: A. Shift to a lower gear to help control speed



266. 
True or False
A learner licence can be suspended for violating speed limits.
Answer: True



267.
 Multiple Choice
When you see a pedestrian waiting at a marked crosswalk, you should:
A. Slow down but proceed if they haven’t stepped in
B. Stop and allow them to cross
C. Honk to signal them to wait
D. Drive through before they step in
Answer: B. Stop and allow them to cross



268.
 True or False
Learner drivers must have zero alcohol and drug presence while driving.
Answer: True



269.
 Multiple Choice
When approaching a yield sign at a roundabout, you must:
A. Stop every time before entering
B. Give way to vehicles already in the roundabout
C. Enter quickly to avoid blocking traffic
D. Accelerate to merge forcefully
Answer: B. Give way to vehicles already in the roundabout



270. 
True or False
It is legal to drive with your fog lights on in clear weather.
Answer: False



271.
 Multiple Choice
What is the safest action when being passed by another vehicle?
A. Maintain speed and position
B. Speed up to block them
C. Move closer to the centre line
D. Honk continuously
Answer: A. Maintain speed and position



272.
 True or False
You can stop in an intersection to drop off passengers.
Answer: False



273. 
Multiple Choice
When following another vehicle at night, you should:
A. Dim your headlights to low beam within 60 metres
B. Keep high beams on for better visibility
C. Flash lights to alert them
D. Turn off headlights to avoid glare
Answer: A. Dim your headlights to low beam within 60 metres


274. 
True or False
Learner drivers can operate a vehicle with a defective exhaust system.
Answer: False



275. 
Multiple Choice
If your brakes become wet, you can dry them by:
A. Parking in the sun
B. Driving slowly while lightly applying the brakes
C. Using the handbrake continuously
D. Speeding to create heat
Answer: B. Driving slowly while lightly applying the brakes



276. 
True or False
It is legal to exceed the speed limit when overtaking in a passing zone.
Answer: False



277. 
Multiple Choice
When your vehicle hydroplanes, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn sharply to regain control
D. Accelerate to clear the water
Answer: A. Ease off the accelerator and steer straight



278.
 True or False
A learner driver may drive alone on rural roads.
Answer: False



279. 
Multiple Choice
When driving on icy roads, you should:
A. Accelerate and brake gently
B. Brake sharply to prevent sliding
C. Drive at normal speeds
D. Use cruise control for stability
Answer: A. Accelerate and brake gently


280. 
True or False
You must signal when leaving a roundabout.
Answer: True



281.
 Multiple Choice
When approaching a pedestrian crossing in poor visibility, you should:
A. Slow down and be ready to stop
B. Maintain your normal speed
C. Honk as you approach
D. Use high beams to scare animals
Answer: A. Slow down and be ready to stop



282.
 True or False
Learner drivers may drive in bus-only lanes.
Answer: False



283.
 Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you must:
A. Move over to another lane if safe
B. Maintain speed and pass closely
C. Pass quickly to avoid blocking
D. Stop completely regardless of the situation
Answer: A. Move over to another lane if safe



284. 
True or False
It is legal to park within 3 metres of a fire hydrant in PEI.
Answer: False



285. 
Multiple Choice
When reversing, you should:
A. Look in your mirrors only
B. Turn your head and look through the rear window
C. Rely on backup cameras completely
D. Reverse quickly to finish sooner
Answer: B. Turn your head and look through the rear window



286. 
True or False
Learner drivers must display an “L” sign on the rear of the vehicle in PEI.
Answer: True



287.
 Multiple Choice
If you feel drowsy while driving, the best action is to:
A. Open the window and keep going
B. Pull over and rest
C. Drink coffee and continue
D. Turn up the radio
Answer: B. Pull over and rest



288. 
True or False
It is legal to use a handheld phone in hands-free mode while driving.
Answer: True



289.
 Multiple Choice
When approaching a railway crossing without gates, you should:
A. Slow down, look both ways, and proceed when safe
B. Stop only if you see a train
C. Drive through quickly
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed when safe



290. 
True or False
Learner drivers may drive at the posted limit in school zones when children are present.
Answer: False



291.
 Multiple Choice
When another driver is tailgating you, you should:
A. Brake hard to warn them
B. Increase your following distance from the vehicle ahead
C. Speed up to get away
D. Ignore them completely
Answer: B. Increase your following distance from the vehicle ahead



292. 
True or False
It is legal to leave your vehicle unattended with the engine running.
Answer: False



293.
 Multiple Choice
When approaching a cyclist from behind, you should:
A. Leave at least 1 metre of space when passing
B. Pass closely to avoid crossing the centre line
C. Honk loudly to warn them
D. Pass without signalling
Answer: A. Leave at least 1 metre of space when passing



294.
 True or False
Learner drivers may carry passengers over the vehicle’s legal capacity.
Answer: False



295. 
Multiple Choice
When following a motorcycle, you should:
A. Maintain the same distance as with other cars
B. Allow extra following distance
C. Follow closely for better visibility
D. Pass immediately
Answer: B. Allow extra following distance



296. 
True or False
It is legal to drive without headlights at night in a well-lit city area.
Answer: False



297.
 Multiple Choice
If your engine overheats, you should:
A. Keep driving until the next service station
B. Pull over and turn off the engine
C. Remove the radiator cap immediately
D. Increase speed to cool it
Answer: B. Pull over and turn off the engine



298.
 True or False
Learner drivers may operate a vehicle without valid insurance.
Answer: False



299.
 Multiple Choice
When approaching a flashing amber pedestrian crossing, you should:
A. Slow down and stop if necessary
B. Maintain your speed
C. Honk to warn pedestrians
D. Ignore if no one is crossing
Answer: A. Slow down and stop if necessary



300. 
True or False
Learner drivers must always carry their permit while driving.
Answer:True

301. 
Multiple Choice
When your visibility is reduced due to fog, you should:
A. Use high beam headlights
B. Use low beam headlights
C. Drive faster to get out of the fog quickly
D. Turn off all lights to avoid glare
Answer: B. Use low beam headlights



302. 
True or False
It is legal to park in a crosswalk if no pedestrians are around.
Answer: False



303.
 Multiple Choice
When approaching an uncontrolled intersection, you should:
A. Slow down and be prepared to stop
B. Drive through quickly
C. Honk as you enter
D. Assume you have the right-of-way
Answer: A. Slow down and be prepared to stop



304.
 True or False
Learner drivers can drive without a supervising driver if they feel confident.
Answer: False



305. 
Multiple Choice
What is the main cause of hydroplaning?
A. Driving too slowly on wet roads
B. Excessive speed on water-covered pavement
C. Low tire pressure
D. Cold weather
Answer: B. Excessive speed on water-covered pavement



306.
 True or False
In PEI, seat belts are required for all passengers.
Answer: True



307.
 Multiple Choice
When following a vehicle at night, you should:
A. Keep high beams on for better vision
B. Use low beams to avoid glare
C. Drive with parking lights only
D. Follow closely for better lighting
Answer: B. Use low beams to avoid glare



308. 
True or False
Learner drivers can drive on highways with speed limits over 80 km/h if supervised.
Answer: True



309. 
Multiple Choice
If your brakes fail, you should:
A. Pump the brake pedal
B. Shift to a lower gear
C. Use the parking brake gently
D. All of the above
Answer: D. All of the above



310.
 True or False
It is legal to reverse from a driveway into a busy street without looking.
Answer: False



311. 
Multiple Choice
When approaching a hill crest where visibility is limited, you should:
A. Maintain your current speed
B. Move to the left lane for better view
C. Reduce speed and keep right
D. Sound your horn continuously
Answer: C. Reduce speed and keep right



312. 
True or False
Learner drivers must follow posted speed limits even if traffic is moving faster.
Answer: True



313. 
Multiple Choice
When a school bus has flashing red lights, you must:
A. Stop regardless of the direction you are travelling
B. Pass quickly
C. Stop only if you are behind the bus
D. Slow down and proceed with caution
Answer: A. Stop regardless of the direction you are travelling



314.
 True or False
Learner drivers may tow a trailer.
Answer: False



315. 
Multiple Choice
When driving near cyclists, you should:
A. Give at least 1 metre of space when passing
B. Honk to alert them
C. Pass as close as possible to save space
D. Drive in their lane to guide them
Answer: A. Give at least 1 metre of space when passing



316. 
True or False
Learner drivers must obey all traffic control devices.
Answer: True



317.
 Multiple Choice
If your vehicle begins to skid, you should:
A. Steer in the direction of the skid
B. Steer in the opposite direction of the skid
C. Apply the brakes hard
D. Release the steering wheel
Answer: A. Steer in the direction of the skid



318. 
True or False
Learner drivers can drive in the left lane of a multi-lane highway unless passing.
Answer: False

319. 
Multiple Choice
When parking on a hill facing uphill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Leave wheels straight
D. Apply the handbrake only
Answer: B. Turn wheels away from the curb



320. 
True or False
Learner drivers can cross a solid double yellow line to pass another vehicle.
Answer: False



321. 
Multiple Choice
When driving in heavy traffic, you should:
A. Maintain a safe following distance
B. Constantly change lanes to get ahead
C. Ignore turn signals of others
D. Drive as close as possible to the car ahead
Answer: A. Maintain a safe following distance



322.
 True or False
It is legal to park in front of a fire station entrance.
Answer: False



323. 
Multiple Choice
When stopping behind another vehicle on a hill, you should:
A. Leave extra space in case it rolls back
B. Move very close to prevent other vehicles from cutting in
C. Keep your foot off the brake
D. Use your horn as a warning
Answer: A. Leave extra space in case it rolls back



324. 
True or False
Learner drivers can use high beams when approaching another vehicle.
Answer: False



325. 
Multiple Choice
If you are being overtaken on a two-lane road, you should:
A. Move to the right and maintain speed
B. Increase speed to block them
C. Drive in the middle of the lane
D. Honk to discourage passing
Answer: A. Move to the right and maintain speed



326. 
True or False
All vehicles must stop for pedestrians at marked crosswalks.
Answer: True



327. 
Multiple Choice
When parallel parking uphill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge
C. Leave wheels straight
D. Park at an angle
Answer: A. Turn wheels toward the edge of the road



328.
 True or False
Learner drivers must always yield to emergency vehicles with flashing lights.
Answer: True



329. 
Multiple Choice
When approaching a flashing amber light, you should:
A. Slow down and proceed with caution
B. Stop completely before moving
C. Ignore the light if traffic is light
D. Accelerate to clear the intersection quickly
Answer: A. Slow down and proceed with caution



330.
 True or False
It is legal to drive with only one working headlight at night.
Answer: False



331. 
Multiple Choice
When approaching a steep hill, you should:
A. Downshift before climbing
B. Accelerate heavily at the base
C. Use cruise control
D. Coast in neutral
Answer: A. Downshift before climbing



332. 
True or False
Learner drivers can carry any number of passengers if supervised.
Answer: False



333.
 Multiple Choice
When merging onto a highway from a ramp, you should:
A. Match the speed of traffic
B. Stop before merging
C. Enter at a low speed and wait for traffic to adjust
D. Honk before joining
Answer: A. Match the speed of traffic



334.
 True or False
Learner drivers must carry their permit at all times while driving.
Answer: True



335. 
Multiple Choice
When driving through a residential area, you should:
A. Watch for children and pets
B. Ignore parked vehicles
C. Maintain highway speeds
D. Honk frequently
Answer: A. Watch for children and pets



336.
 True or False
It is legal to block an intersection during heavy traffic.
Answer: False



337.
 Multiple Choice
If you are involved in a collision, you must:
A. Stop and exchange information
B. Leave immediately to avoid traffic delays
C. Only stop if there is visible damage
D. Move your car without checking for injuries
Answer: A. Stop and exchange information



338. 
True or False
Learner drivers may drive in the carpool lane without meeting passenger requirements.
Answer: False



339. 
Multiple Choice
When entering a curve, you should:
A. Slow down before entering
B. Speed up in the middle
C. Brake sharply inside the curve
D. Coast in neutral
Answer: A. Slow down before entering



340.
 True or False
It is legal to exceed the speed limit to pass another vehicle.
Answer: False



341. 
Multiple Choice
When your view is blocked at an intersection, you should:
A. Move forward slowly until you can see
B. Proceed without looking
C. Sound the horn and go
D. Wait until another driver waves you through
Answer: A. Move forward slowly until you can see



342. 
True or False
Learner drivers can use handheld devices while stopped in traffic.
Answer: False



343.
 Multiple Choice
When parking facing downhill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Leave wheels straight
D. Apply the parking brake only
Answer: A. Turn wheels toward the curb



344. 
True or False
It is legal to park in a bike lane unless a sign says otherwise.
Answer: False



345.
 Multiple Choice
When a traffic light turns yellow, you should:
A. Stop if safe to do so
B. Accelerate to clear the intersection
C. Ignore and continue
D. Honk and proceed
Answer: A. Stop if safe to do so



346.
 True or False
Learner drivers must not drive between midnight and 5 a.m. unless exempted.
Answer: True



347. 
Multiple Choice
If your vehicle stalls on railway tracks, you should:
A. Exit immediately and move to a safe location
B. Stay inside and call for help
C. Try to restart repeatedly
D. Push the car off the tracks alone
Answer: A. Exit immediately and move to a safe location



348. 
True or False
It is legal to pass another vehicle in a school zone during school hours.
Answer: False



349. 
Multiple Choice
When approaching a stop sign, you must:
A. Stop fully before the crosswalk or stop line
B. Slow down and proceed if clear
C. Honk before entering
D. Stop only if another vehicle is present
Answer: A. Stop fully before the crosswalk or stop line



350. 
True or False
Learner drivers must display their “L” sign at all times while driving.
Answer: True



351. 
Multiple Choice
When preparing to change lanes, you should:
A. Check mirrors and blind spots before signalling
B. Signal only after moving into the lane
C. Rely on other drivers to adjust for you
D. Turn suddenly without warning
Answer: A. Check mirrors and blind spots before signalling



352. 
True or False
It is legal to leave your engine running and unattended on a public road.
Answer: False



353. 
Multiple Choice
When driving at night in rural areas, you should:
A. Use high beams when there is no oncoming traffic
B. Use low beams at all times
C. Drive without lights to save battery
D. Flash lights continuously
Answer: A. Use high beams when there is no oncoming traffic



354. 
True or False
Learner drivers are allowed to drive with open alcohol containers in the car.
Answer: False



355. 
Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Slow down and be prepared to stop
B. Continue at normal speed
C. Honk to alert them
D. Drive close to guide them
Answer: A. Slow down and be prepared to stop



356. 
True or False
It is legal to block a crosswalk while waiting at a red light.
Answer: False



357. 
Multiple Choice
If you are being tailgated, you should:
A. Slow down gradually and allow the vehicle to pass
B. Brake suddenly to warn them
C. Speed up to increase distance
D. Ignore them and maintain speed
Answer: A. Slow down gradually and allow the vehicle to pass



358. 
True or False
Learner drivers can drive without insurance coverage.
Answer: False



359.
 Multiple Choice
When entering a roundabout, you should:
A. Yield to traffic already in the circle
B. Enter without stopping or yielding
C. Drive clockwise
D. Stop in the middle of the roundabout
Answer: A. Yield to traffic already in the circle



360.
 True or False
It is safe to wear headphones while driving as long as the music is low.
Answer: False



361. 
Multiple Choice
When passing a farm vehicle on a rural road, you should:
A. Pass only when safe and legal
B. Honk and pass immediately
C. Pass on curves for better speed
D. Drive close to pressure them to move
Answer: A. Pass only when safe and legal



362.
 True or False
Learner drivers can carry any number of passengers if all wear seat belts.
Answer: False



363.
 Multiple Choice
When approaching a flashing red light, you should:
A. Treat it like a stop sign
B. Slow down but do not stop
C. Drive through if traffic is light
D. Accelerate to clear it quickly
Answer: A. Treat it like a stop sign



364. 
True or False
It is legal to drive with interior dome lights on at night.
Answer: True



365. 
Multiple Choice
When you hear a siren from an emergency vehicle, you must:
A. Pull over to the right and stop
B. Continue driving at the same speed
C. Block their lane to give priority to others
D. Slow down but stay in your lane
Answer: A. Pull over to the right and stop



366. 
True or False
Learner drivers may drive in bus-only lanes during restricted hours.
Answer: False



367. 
Multiple Choice
When approaching a stopped school bus with amber flashing lights, you should:
A. Prepare to stop
B. Pass quickly before lights turn red
C. Ignore and continue
D. Sound your horn
Answer: A. Prepare to stop



368. 
True or False
It is legal to drive over the speed limit if keeping up with traffic.
Answer: False



369. 
Multiple Choice
When parking on a hill facing downhill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the road
C. Keep wheels straight
D. Leave transmission in neutral
Answer: A. Turn wheels toward the edge of the road



370. 
True or False
Learner drivers must display their permit on the windshield.
Answer: False



371. 
Multiple Choice
If a traffic light is not working, you should:
A. Treat the intersection as a four-way stop
B. Drive through without stopping
C. Wait for police to direct traffic
D. Honk before entering
Answer: A. Treat the intersection as a four-way stop



372.
 True or False
It is legal to park beside another parked vehicle (double parking).
Answer: False



373. 
Multiple Choice
When driving on gravel roads, you should:
A. Reduce speed to maintain control
B. Drive faster to avoid sliding
C. Stay in the centre at all times
D. Brake sharply when turning
Answer: A. Reduce speed to maintain control



374. 
True or False
Learner drivers must follow the same rules as fully licensed drivers.
Answer: True



375. 
Multiple Choice
When your brakes overheat, you should:
A. Pull over and allow them to cool
B. Keep driving at lower speed
C. Pump them repeatedly
D. Use the parking brake only
Answer: A. Pull over and allow them to cool



376.
 True or False
It is legal to block private driveways when parking.
Answer: False



377. 
Multiple Choice
When approaching a yield sign, you must:
A. Slow down and give way if necessary
B. Stop regardless of traffic
C. Accelerate to merge ahead of traffic
D. Ignore if the road is empty
Answer: A. Slow down and give way if necessary



378. 
True or False
Learner drivers can carry passengers under the influence of alcohol.
Answer: True



379. 
Multiple Choice
When making a left turn from a one-way street onto another one-way street, you should:
A. Turn into the left lane of the road you are entering
B. Turn into the right lane
C. Enter any lane you choose
D. Stop midway through the turn
Answer: A. Turn into the left lane of the road you are entering



380.
 True or False
It is legal to drive with a cracked windshield if it obstructs your vision.
Answer: False



381.
 Multiple Choice
When your vehicle begins to skid on ice, you should:
A. Steer gently in the direction you want to go
B. Steer against the skid
C. Brake hard immediately
D. Turn off the ignition
Answer: A. Steer gently in the direction you want to go



382.
 True or False
Learner drivers can ignore construction signs if traffic is light.
Answer: False



383. 
Multiple Choice
When driving through a work zone, you should:
A. Reduce speed and follow posted signs
B. Drive at normal speed if workers are not visible
C. Overtake vehicles whenever possible
D. Honk to alert workers
Answer: A. Reduce speed and follow posted signs



384.
 True or False
It is legal to pass on the shoulder of the road.
Answer: False



385.
 Multiple Choice
When backing out of a parking space, you should:
A. Check mirrors and look over your shoulder
B. Use only your mirrors
C. Reverse quickly without looking
D. Honk continuously
Answer: A. Check mirrors and look over your shoulder



386.
 True or False
Learner drivers may use GPS while driving if it is hands-free.
Answer: True



387. 
Multiple Choice
When approaching a railway crossing without signals, you should:
A. Slow down, look both ways, and proceed if clear
B. Drive through without slowing
C. Stop only if you see a train
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed if clear



388. 
True or False
It is legal to block a fire hydrant when parking if it is not in use.
Answer: False



389. 
Multiple Choice
When overtaking another vehicle, you should:
A. Signal, check blind spots, and pass quickly
B. Pass slowly to avoid startling the driver
C. Use the shoulder if needed
D. Pass without signalling
Answer: A. Signal, check blind spots, and pass quickly



390.
 True or False
Learner drivers must always drive with headlights on, day or night.
Answer: False



391.
 Multiple Choice
When your tire blows out, you should:
A. Hold the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply to stop
D. Accelerate to maintain control
Answer: A. Hold the steering wheel firmly and slow down gradually



392. 
True or False
It is legal to leave children unattended in a parked vehicle with the engine running.
Answer: False



393.
 Multiple Choice
When stopping at a railway crossing with gates down, you should:
A. Stop at least 5 metres away
B. Stop as close as possible
C. Cross immediately after the train passes without waiting for the gates
D. Ignore the gates if no train is visible
Answer: A. Stop at least 5 metres away



394. 
True or False
Learner drivers can exceed the speed limit to pass another vehicle.
Answer: False



395. 
Multiple Choice
When entering a school zone during school hours, you must:
A. Reduce speed to the posted limit
B. Drive at normal speed if children are not visible
C. Honk to warn children
D. Stop completely before entering
Answer: A. Reduce speed to the posted limit


396.
 True or False
It is legal to drive with your parking lights only at night.
Answer: False



397.
 Multiple Choice
When parking on a hill facing uphill without a curb, you should:
A. Turn wheels toward the road edge
B. Turn wheels away from the road edge
C. Keep wheels straight
D. Park in neutral gear
Answer: A. Turn wheels toward the road edge



398. 
True or False
Learner drivers can use high beams within 60 metres of another vehicle.
Answer: False



399. 
Multiple Choice
When approaching an intersection with a flashing green light, you should:
A. Proceed with caution
B. Stop completely
C. Slow down and yield
D. Wait for it to turn yellow
Answer: A. Proceed with caution



400. 
True or False
It is legal to park on a pedestrian crossing if no one is using it.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Prince Edwards Island ");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Prince Edwards Island .");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $princeEdwardIsland->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Prince Edwards Island citizenship questions.");
    }
}


