<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewfoundlandandLabradorDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $newfoundlandAndLabrador = DrivingSection::firstOrCreate(
            ['title' => 'Newfoundland and Labrador'],
            [
                'type' => 'province',
                'capital' => 'St. John\'s',
                'flag' => '/images/flags/newfoundland-and-labrador.png',
                'description' => 'Newfoundland and Labrador Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_vehicle_control.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $newfoundlandAndLabrador->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the minimum age to apply for a Class 5 Level I learner’s licence in Newfoundland and Labrador?
A. 15
B. 16
C. 17
D. 18
Answer: B. 16



2. 
True or False
Learner drivers must be accompanied by a fully licensed driver with at least 4 years of driving experience.
Answer: True



3. 
Multiple Choice
When approaching a stop sign, you must:
A. Slow down and proceed if no vehicles are coming
B. Stop fully before the stop line or crosswalk
C. Honk and proceed quickly
D. Only stop if there are pedestrians
Answer: B. Stop fully before the stop line or crosswalk



4. 
True or False
It is legal to drive without insurance if the vehicle is registered in another province.
Answer: False



5. 
Multiple Choice
The maximum speed limit in most urban areas of Newfoundland and Labrador is:
A. 40 km/h
B. 50 km/h
C. 60 km/h
D. 70 km/h
Answer: B. 50 km/h



6. 
True or False
Learner drivers may use handheld electronic devices if stopped in traffic.
Answer: False



7.
 Multiple Choice
When approaching an uncontrolled intersection, you should:
A. Slow down and be ready to stop
B. Proceed without slowing
C. Honk before entering
D. Speed up to pass through quickly
Answer: A. Slow down and be ready to stop


8. 
True or False
It is legal to park on a crosswalk if you remain in the driver’s seat.
Answer: False



9. 
Multiple Choice
When merging onto a highway, you should:
A. Match your speed to the flow of traffic before merging
B. Enter at any speed and let traffic adjust
C. Stop at the end of the ramp
D. Honk before merging
Answer: A. Match your speed to the flow of traffic before merging



10. 
True or False
Learner drivers are allowed to drive between midnight and 5 a.m. without restrictions.
Answer: False



11. 
Multiple Choice
When approaching a pedestrian at a crosswalk without signals, you must:
A. Slow down and proceed if safe
B. Stop and allow the pedestrian to cross
C. Honk to alert the pedestrian
D. Pass without stopping if no one is in the crosswalk
Answer: B. Stop and allow the pedestrian to cross



12. 
True or False
It is legal to exceed the speed limit when passing another vehicle.
Answer: False



13. 
Multiple Choice
When parking downhill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Keep wheels straight
D. Leave the car in reverse
Answer: A. Turn wheels toward the curb



14. 
True or False
Learner drivers must always carry their licence when driving.
Answer: True



15.
 Multiple Choice
The main purpose of a yellow line in the centre of the road is to:
A. Mark the edge of the roadway
B. Separate lanes of traffic moving in opposite directions
C. Indicate a pedestrian crossing
D. Indicate a parking lane
Answer: B. Separate lanes of traffic moving in opposite directions



16. 
True or False
It is legal to back up on the highway to reach a missed exit.
Answer: False



17.
 Multiple Choice
If your brakes fail on a hill, you should:
A. Downshift and use the parking brake
B. Turn off the engine immediately
C. Accelerate to reach the bottom quickly
D. Honk continuously
Answer: A. Downshift and use the parking brake



18. 
True or False
Learner drivers can tow a trailer as long as it is under 500 kg.
Answer: False



19. 
Multiple Choice
A flashing red light at an intersection means:
A. Stop and proceed when safe
B. Slow down and proceed
C. Stop only if another vehicle is coming
D. Maintain speed through the intersection
Answer: A. Stop and proceed when safe



20. 
True or False
Seat belts are only required in the front seats.
Answer: False



21.
 Multiple Choice
When approaching a school bus with flashing red lights, you must:
A. Stop in both directions until the lights stop flashing
B. Pass slowly if no children are visible
C. Honk and proceed
D. Only stop if travelling in the same direction as the bus
Answer: A. Stop in both directions until the lights stop flashing



22. 
True or False
Learner drivers must have zero blood alcohol concentration while driving.
Answer: True



23. 
Multiple Choice
If your brakes fail, you should:
A. Pump the brake pedal and use the parking brake gradually
B. Turn off the engine immediately
C. Shift to a higher gear
D. Jump out of the vehicle
Answer: A. Pump the brake pedal and use the parking brake gradually



24. 
True or False
It is legal to block a driveway if you leave a note with your phone number.
Answer: False



25. 
Multiple Choice
When approaching a railway crossing without signals, you should:
A. Slow down, look both ways, and proceed if clear
B. Stop every time regardless of traffic
C. Speed up to cross quickly
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed if clear

26. 
True or False
It is legal to make a U-turn in a school zone when children are present.
Answer: False



27. 
Multiple Choice
When driving in heavy rain, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Drive without headlights
D. Flash headlights continuously
Answer: A. Use low-beam headlights



28. 
True or False
Learner drivers may drive without a supervising driver during daytime hours.
Answer: False



29. 
Multiple Choice
When following another vehicle, you should keep a minimum time gap of:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: B. 2 seconds



30. 
True or False
It is safe to drive while wearing headphones as long as you can hear some outside sounds.
Answer: False



31. 
Multiple Choice
When approaching an intersection with a yield sign, you must:
A. Slow down and give right-of-way if needed
B. Stop every time before entering
C. Drive through without slowing if clear
D. Honk before entering
Answer: A. Slow down and give right-of-way if needed



32. 
True or False
Learner drivers can use any lane on multi-lane highways.
Answer: False



33. 
Multiple Choice
When parking on a hill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge of the road
C. Keep wheels straight
D. Leave the car in neutral
Answer: A. Turn wheels toward the edge of the road



34.
 True or False
It is legal to enter an intersection when the light is yellow if you can stop safely.
Answer: False



35. 
Multiple Choice
When driving through a construction zone, you must:
A. Follow posted speed limits and watch for workers
B. Drive at normal speed
C. Ignore temporary signs
D. Honk to warn workers
Answer: A. Follow posted speed limits and watch for workers



36. 
True or False
Learner drivers may overtake other vehicles on curves if the road appears clear.
Answer: False



37. 
Multiple Choice
If your vehicle begins to hydroplane, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Steer sharply to regain control
D. Accelerate to clear the water
Answer: A. Ease off the accelerator and steer straight



38.
 True or False
It is legal to park within 5 metres of a crosswalk.
Answer: False



39.
 Multiple Choice
When approaching a green light, you should:
A. Continue if the intersection is clear
B. Slow down and stop
C. Honk to warn pedestrians
D. Stop before the crosswalk regardless of traffic
Answer: A. Continue if the intersection is clear



40. 
True or False
Learner drivers can supervise another learner if they are over 19 years old.
Answer: False



41. 
Multiple Choice
When turning left at an intersection, you should:
A. Yield to oncoming traffic and pedestrians
B. Turn without stopping if no one is crossing
C. Only yield to vehicles, not pedestrians
D. Always turn from the right lane
Answer: A. Yield to oncoming traffic and pedestrians



42. 
True or False
It is safe to leave your vehicle unlocked if you are only stepping away for a moment.
Answer: False



43. 
Multiple Choice
When backing out of a driveway, you should:
A. Check mirrors and blind spots before moving
B. Rely only on your rearview mirror
C. Back out quickly to avoid blocking traffic
D. Honk continuously
Answer: A. Check mirrors and blind spots before moving



44. 
True or False
Learner drivers may carry passengers only if everyone has a seat belt.
Answer: True



45.
 Multiple Choice
When driving near a cyclist, you should:
A. Leave at least 1 metre of space when passing
B. Pass closely to avoid crossing the centre line
C. Honk to warn them
D. Pass without signalling
Answer: A. Leave at least 1 metre of space when passing



46. 
True or False
It is legal to park on the shoulder of a busy highway for a phone call.
Answer: False



47. 
Multiple Choice
When approaching a curve, you should:
A. Slow down before entering the curve
B. Accelerate through the curve
C. Brake sharply in the curve
D. Honk before entering
Answer: A. Slow down before entering the curve



48. 
True or False
Learner drivers may use high beams at all times in rural areas.
Answer: False



49. 
Multiple Choice
When your vehicle is being passed, you should:
A. Stay in your lane and maintain speed
B. Speed up to stay ahead
C. Move to the left to block
D. Honk to warn the passing vehicle
Answer: A. Stay in your lane and maintain speed



50. 
True or False
It is legal to drive across a railway track when warning lights are flashing if no train is visible.
Answer: False



51.
 Multiple Choice
The main purpose of a white line separating traffic lanes is to:
A. Indicate lanes moving in opposite directions
B. Separate lanes moving in the same direction
C. Mark a no-passing zone
D. Indicate a pedestrian crossing
Answer: B. Separate lanes moving in the same direction



52. 
True or False
It is legal to turn right on a red light after coming to a complete stop, unless a sign prohibits it.
Answer: True



53. 
Multiple Choice
When a tire blows out while driving, you should:
A. Grip the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Steer sharply to the side of the road
D. Accelerate to keep control
Answer: A. Grip the steering wheel firmly and slow down gradually



54. 
True or False
Learner drivers can drive in the left lane of a multi-lane highway only when passing.
Answer: True



55. 
Multiple Choice
When approaching a four-way stop, the vehicle that should proceed first is:
A. The largest vehicle
B. The vehicle that arrives first
C. The vehicle to the left of you
D. The fastest vehicle
Answer: B. The vehicle that arrives first



56.
 True or False
It is legal to park on the wrong side of the street facing oncoming traffic.
Answer: False



57. 
Multiple Choice
When turning left at an intersection with no signals, you should:
A. Yield to oncoming traffic and pedestrians
B. Turn quickly before oncoming vehicles arrive
C. Assume other drivers will stop for you
D. Honk to claim right-of-way
Answer: A. Yield to oncoming traffic and pedestrians



58.
 True or False
Learner drivers may drive with passengers in the back of a pickup truck if the road is rural.
Answer: False



59.
 Multiple Choice
The main purpose of a flashing amber light is to:
A. Indicate you must stop completely
B. Warn to proceed with caution
C. Indicate a lane is closed
D. Signal a railway crossing
Answer: B. Warn to proceed with caution



60. 
True or False
Learner drivers can drive without supervision if it is an emergency.
Answer: False

61. 
Multiple Choice
When your brakes become wet, you can dry them by:
A. Driving slowly while applying light pressure to the brakes
B. Parking and waiting for them to dry naturally
C. Driving at high speed to create heat
D. Using only the parking brake
Answer: A. Driving slowly while applying light pressure to the brakes



62.
 True or False
Learner drivers must display an “L” sign on their vehicle at all times while driving.
Answer: True



63.
 Multiple Choice
When approaching a stopped vehicle on a narrow road, you should:
A. Slow down and pass with caution
B. Pass at normal speed
C. Honk before passing
D. Stop behind it until it moves
Answer: A. Slow down and pass with caution

64.
 True or False
It is legal to pass another vehicle on a hill if the road ahead is clear.
Answer: False



65.
 Multiple Choice
When you see a sign indicating a winding road ahead, you should:
A. Slow down and prepare for curves
B. Accelerate before the first curve
C. Drive straight through without adjusting
D. Brake sharply in each curve
Answer: A. Slow down and prepare for curves



66. 
True or False
Learner drivers may cross into oncoming lanes to overtake if there is a dashed yellow line.
Answer: True



67. 
Multiple Choice
If your vehicle starts to fishtail on ice, you should:
A. Steer gently in the direction of the skid
B. Brake hard
C. Turn sharply away from the skid
D. Accelerate to regain traction
Answer: A. Steer gently in the direction of the skid



68. 
True or False
It is legal to block an intersection if traffic ahead is stopped.
Answer: False



69. 
Multiple Choice
When driving near a school, you must:
A. Slow down to the posted school zone speed limit during posted hours
B. Maintain your usual speed
C. Honk to warn children
D. Pass other vehicles quickly
Answer: A. Slow down to the posted school zone speed limit during posted hours



70. 
True or False
Learner drivers can tow another vehicle if accompanied by a supervisor.
Answer: False



71. 
Multiple Choice
When approaching a crosswalk without traffic lights, you must:
A. Stop for pedestrians waiting to cross
B. Continue if no one is on the crosswalk yet
C. Honk to alert pedestrians
D. Only stop for children
Answer: A. Stop for pedestrians waiting to cross


72. 
True or False
It is legal to park in a bus stop zone as long as the bus is not present.
Answer: False



73. 
Multiple Choice
When approaching a railway crossing with gates down, you should:
A. Wait until the gates are fully raised before proceeding
B. Drive around the gates if no train is visible
C. Cross as soon as the train passes
D. Reverse to avoid waiting
Answer: A. Wait until the gates are fully raised before proceeding



74. 
True or False
Learner drivers may drive on 400-series highways without restrictions.
Answer: False



75. 
Multiple Choice
The correct hand signal for a left turn is:
A. Left arm straight out
B. Left arm bent upward
C. Left arm bent downward
D. Right arm straight out
Answer: A. Left arm straight out



76. 
True or False
It is legal to stop in a traffic lane to answer a phone call.
Answer: False

77. 
Multiple Choice
When approaching a yield sign and there is no traffic, you should:
A. Slow down and proceed if the way is clear
B. Stop every time before entering
C. Accelerate to merge quickly
D. Honk before entering
Answer: A. Slow down and proceed if the way is clear



78.
 True or False
Learner drivers must follow the posted speed limits even when overtaking.
Answer: True



79.
 Multiple Choice
When parking uphill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge of the road
C. Keep wheels straight
D. Leave the car in reverse gear
Answer: A. Turn wheels toward the edge of the road



80. 
True or False
It is legal to park in front of a fire station driveway if you stay inside your vehicle.
Answer: False



81. 
Multiple Choice
If your vehicle’s headlights fail at night, you should:
A. Turn on hazard lights and pull over safely
B. Continue driving with parking lights
C. Flash high beams repeatedly
D. Speed up to reach your destination faster
Answer: A. Turn on hazard lights and pull over safely



82. 
True or False
Learner drivers can carry more passengers than there are seat belts.
Answer: False



83. 
Multiple Choice
When your tires begin to hydroplane, you should:
A. Ease off the accelerator and steer straight
B. Brake hard to slow down
C. Turn sharply to regain control
D. Accelerate to force water away
Answer: A. Ease off the accelerator and steer straight



84. 
True or False
It is legal to leave your engine running while fueling your car.
Answer: False



85. 
Multiple Choice
When driving through fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Turn on hazard lights only
D. Drive without lights
Answer: A. Use low-beam headlights



86. 
True or False
Learner drivers may drive without a supervisor on private property.
Answer: True



87. 
Multiple Choice
When you see an emergency vehicle with lights flashing behind you, you must:
A. Pull over to the right and stop
B. Speed up to get out of the way
C. Stop in your lane
D. Continue driving until you find a parking lot
Answer: A. Pull over to the right and stop



88. 
True or False
It is legal to park in a crosswalk if no pedestrians are present.
Answer: False



89. 
Multiple Choice
When passing another vehicle at night, you should:
A. Switch to low beams until you are clear
B. Use high beams to improve vision
C. Flash headlights to signal
D. Drive without lights
Answer: A. Switch to low beams until you are clear



90. 
True or False
Learner drivers may change lanes without signalling if no other vehicles are nearby.
Answer: False



91. 
Multiple Choice
When driving in winter, you should:
A. Accelerate and brake gently to avoid skidding
B. Drive at normal speed
C. Brake sharply to test grip
D. Avoid using winter tires
Answer: A. Accelerate and brake gently to avoid skidding



92. 
True or False
It is legal to use a radar detector in all provinces and territories.
Answer: False

93.
 Multiple Choice
When parking uphill with a curb, you should:
A. Turn wheels away from the curb
B. Turn wheels toward the curb
C. Keep wheels straight
D. Leave the car in reverse gear
Answer: A. Turn wheels away from the curb



94. 
True or False
Learner drivers can supervise another learner if they have their licence for 2 years.
Answer: False



95.
 Multiple Choice
When a school patrol crossing guard signals you to stop, you must:
A. Stop and wait until they lower their sign
B. Slow down but continue
C. Stop only if children are present
D. Honk before proceeding
Answer: A. Stop and wait until they lower their sign



96.
 True or False
It is legal to drive with an open alcohol container in the vehicle.
Answer: False



97. 
Multiple Choice
When you see a no-passing zone sign, you should:
A. Stay in your lane and do not pass
B. Pass only motorcycles
C. Pass at a higher speed
D. Ignore the sign if road is clear
Answer: A. Stay in your lane and do not pass



98. 
True or False
Learner drivers may drive with only one functioning headlight at night.
Answer: False



99. 
Multiple Choice
When approaching a sharp curve, you should:
A. Slow down before entering
B. Accelerate through it
C. Brake sharply while turning
D. Keep your speed steady without adjusting
Answer: A. Slow down before entering



100.
 True or False
It is legal to block a pedestrian ramp while parked.
Answer: False

101. 
Multiple Choice
When parallel parking on the right side of the road, you should:
A. Park within 30 cm of the curb
B. Leave at least 1 metre from the curb
C. Angle the car toward traffic
D. Keep your wheels turned outward
Answer: A. Park within 30 cm of the curb



102.
 True or False
It is legal to drive through a red light if no other vehicles are around.
Answer: False



103.
 Multiple Choice
When approaching a pedestrian crosswalk without traffic lights, you should:
A. Stop and yield to pedestrians crossing
B. Continue if pedestrians are far away
C. Honk to warn pedestrians
D. Pass before pedestrians step on the road
Answer: A. Stop and yield to pedestrians crossing



104. 
True or False
Learner drivers can operate a vehicle at night without supervision.
Answer: False



105. 
Multiple Choice
When approaching a “merge” sign, you should:
A. Adjust your speed to merge smoothly with traffic
B. Stop before merging
C. Speed up aggressively
D. Honk before entering
Answer: A. Adjust your speed to merge smoothly with traffic


106.
 True or False
It is safe to rely only on mirrors when reversing.
Answer: False



107.
 Multiple Choice
When entering traffic from a driveway, you must:
A. Yield to all vehicles and pedestrians
B. Enter without stopping if clear
C. Signal only when pedestrians are present
D. Stop only if traffic is moving quickly
Answer: A. Yield to all vehicles and pedestrians



108. 
True or False
Learner drivers must always carry their permit while driving.
Answer: True



109. 
Multiple Choice
When you see a flashing red light at an intersection, it means:
A. Stop and proceed when safe, like a stop sign
B. Yield without stopping
C. Continue through without stopping
D. Stop only if another vehicle is present
Answer: A. Stop and proceed when safe, like a stop sign



110.
 True or False
It is legal to park in front of a private driveway if you are the owner.
Answer: True



111. 
Multiple Choice
The safest way to check your blind spots is to:
A. Quickly shoulder check before changing lanes
B. Rely solely on your mirrors
C. Look only through the rear window
D. Guess based on traffic sounds
Answer: A. Quickly shoulder check before changing lanes



112. 
True or False
Learner drivers can exceed the speed limit when passing another vehicle.
Answer: False



113.
 Multiple Choice
When approaching an emergency vehicle stopped with flashing lights, you should:
A. Slow down and move over if safe
B. Maintain your speed
C. Honk to alert them
D. Pass closely to save space
Answer: A. Slow down and move over if safe



114. 
True or False
It is legal to drive with the interior dome light on at night.
Answer: True



115. 
Multiple Choice
When two vehicles arrive at an uncontrolled intersection at the same time, the right-of-way goes to:
A. The vehicle on the right
B. The vehicle on the left
C. The larger vehicle
D. The faster vehicle
Answer: A. The vehicle on the right



116.
 True or False
Learner drivers are allowed to carry open alcohol containers if sealed by the driver.
Answer: False



117. 
Multiple Choice
When approaching a hillcrest, you should:
A. Stay in your lane and be ready for oncoming traffic
B. Move to the left lane for better visibility
C. Accelerate to pass quickly
D. Honk continuously until over the hill
Answer: A. Stay in your lane and be ready for oncoming traffic



118. 
True or False
It is legal to coast downhill in neutral gear.
Answer: False



119. 
Multiple Choice
When you see a yellow traffic light, you should:
A. Stop if you can do so safely
B. Speed up to beat the red light
C. Maintain speed without slowing
D. Honk to warn others
Answer: A. Stop if you can do so safely



120.
 True or False
Learner drivers can drive in heavy snow only during daytime hours.
Answer: False



121. 
Multiple Choice
If your car’s brakes fail, you should:
A. Pump the brake pedal and shift to a lower gear
B. Accelerate to maintain control
C. Turn off the engine immediately
D. Pull the parking brake sharply
Answer: A. Pump the brake pedal and shift to a lower gear



122. 
True or False
It is legal to park on a crosswalk if there is no sign prohibiting it.
Answer: False



123.
 Multiple Choice
When following an emergency vehicle, you must stay at least:
A. 150 metres behind
B. 100 metres behind
C. 75 metres behind
D. 50 metres behind
Answer: A. 150 metres behind



124.
 True or False
Learner drivers may use hands-free devices while driving.
Answer: True



125. 
Multiple Choice
When backing out of an angled parking spot, you should:
A. Check all directions and proceed slowly
B. Back out quickly to avoid blocking traffic
C. Rely only on your rearview mirror
D. Keep wheels turned toward the curb
Answer: A. Check all directions and proceed slowly



126. 
True or False
It is safe to overtake a snowplow operating at low speed.
Answer: False



127. 
Multiple Choice
When approaching a flashing yellow pedestrian crossing light, you should:
A. Slow down and be ready to stop
B. Maintain your speed
C. Honk to warn pedestrians
D. Stop only if someone is crossing
Answer: A. Slow down and be ready to stop



128. 
True or False
Learner drivers can drive in the passing lane without overtaking.
Answer: False



129. 
Multiple Choice
If your headlights fail at night, you should:
A. Pull over and use hazard lights
B. Drive using high beams only
C. Follow another vehicle closely for light
D. Use your phone flashlight
Answer: A. Pull over and use hazard lights



130.
 True or False
It is legal to reverse on a highway if you miss your exit.
Answer: False



131.
 Multiple Choice
When driving through a flooded section of road, you should:
A. Proceed slowly and test your brakes afterward
B. Drive fast to clear the water
C. Stop and wait until water recedes
D. Turn around immediately
Answer: A. Proceed slowly and test your brakes afterward



132. 
True or False
Learner drivers may carry pets on their lap while driving.
Answer: False



133. 
Multiple Choice
When you see a “Lane Ends” sign, you should:
A. Merge early and safely
B. Speed up to pass vehicles
C. Stop before merging
D. Honk to warn others
Answer: A. Merge early and safely



134.
 True or False
It is legal to leave your car running and unattended.
Answer: False



135. 
Multiple Choice
When approaching a sharp downhill curve, you should:
A. Slow down before the curve
B. Brake sharply in the curve
C. Accelerate through the curve
D. Coast in neutral
Answer: A. Slow down before the curve



136. 
True or False
Learner drivers may use high beams in fog for better visibility.
Answer: False



137.
 Multiple Choice
When a traffic signal is not working, you should:
A. Treat the intersection as a four-way stop
B. Proceed without stopping
C. Yield only to pedestrians
D. Honk before crossing
Answer: A. Treat the intersection as a four-way stop



138. 
True or False
It is legal to park in a loading zone if you are unloading groceries.
Answer: True



139. 
Multiple Choice
When entering a freeway, the best merging method is:
A. Accelerate to match the speed of traffic
B. Stop at the end of the ramp
C. Merge at a slower speed
D. Drive on the shoulder
Answer: A. Accelerate to match the speed of traffic



140.
 True or False
Learner drivers may drive without headlights at dusk if visibility is good.
Answer: False



141.
 Multiple Choice
When passing a farm vehicle, you should:
A. Pass with caution and leave plenty of space
B. Pass closely to save time
C. Honk to make them move over
D. Pass without signalling
Answer: A. Pass with caution and leave plenty of space



142.
 True or False
It is safe to overtake at an intersection if no traffic is present.
Answer: False



143. 
Multiple Choice
When your windshield is covered with frost, you should:
A. Clear it completely before driving
B. Clear only the driver’s side
C. Use windshield wipers only
D. Drive slowly until it melts
Answer: A. Clear it completely before driving



144. 
True or False
Learner drivers can supervise other drivers in private parking lots.
Answer: False



145. 
Multiple Choice
If your vehicle stalls on a railway crossing, you should:
A. Exit immediately and move away from the tracks
B. Stay inside and try restarting
C. Push the car off the tracks
D. Call for help before leaving
Answer: A. Exit immediately and move away from the tracks



146. 
True or False
It is legal to drive barefoot in Newfoundland and Labrador.
Answer: True



147. 
Multiple Choice
When driving in a tunnel, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Turn off headlights
D. Drive with hazard lights
Answer: A. Use low-beam headlights



148. 
True or False
Learner drivers may overtake on bridges if road markings allow it.
Answer: False



149. 
Multiple Choice
When following a vehicle at night, you should:
A. Use low beams to avoid blinding the driver
B. Use high beams for better vision
C. Flash lights to signal presence
D. Drive without lights
Answer: A. Use low beams to avoid blinding the driver



150. 
True or False
It is legal to stop in the middle of a crosswalk to drop off passengers.
Answer: False



151. 
Multiple Choice
When approaching a stopped school bus with flashing red lights, you must:
A. Stop regardless of direction of travel
B. Slow down and proceed with caution
C. Stop only if behind the bus
D. Pass quickly if no children are visible
Answer: A. Stop regardless of direction of travel



152. 
True or False
Learner drivers are permitted to drive on highways without supervision if traffic is light.
Answer: False



153. 
Multiple Choice
If your tire blows out while driving, you should:
A. Hold the steering wheel firmly and ease off the accelerator
B. Brake sharply to stop quickly
C. Turn immediately to the shoulder
D. Accelerate to keep control
Answer: A. Hold the steering wheel firmly and ease off the accelerator



154. 
True or False
It is safe to drive if your windshield wipers are not working in light rain.
Answer: False



155. 
Multiple Choice
When driving in fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Turn off headlights and use parking lights
D. Flash headlights repeatedly
Answer: A. Use low-beam headlights



156.
 True or False
Learner drivers may exceed the speed limit to keep up with traffic flow.
Answer: False



157. 
Multiple Choice
When approaching an intersection with no traffic signs, you should:
A. Yield to vehicles on your right
B. Yield to vehicles on your left
C. Proceed without slowing
D. Stop and let all vehicles go first
Answer: A. Yield to vehicles on your right



158. 
True or False
It is legal to park in front of a fire hydrant if you remain in the vehicle.
Answer: False



159. 
Multiple Choice
When driving in winter conditions, you should:
A. Accelerate and brake gently to maintain traction
B. Drive faster to avoid getting stuck
C. Use cruise control for consistent speed
D. Brake hard for better control
Answer: A. Accelerate and brake gently to maintain traction



160. 
True or False
Learner drivers can supervise another learner in a private driveway.
Answer: False



161. 
Multiple Choice
When a traffic officer gives directions that conflict with traffic signals, you must:
A. Follow the officer’s directions
B. Follow the traffic lights only
C. Stop until both are clear
D. Honk and wait for clarification
Answer: A. Follow the officer’s directions



162. 
True or False
It is safe to overtake on a hill if your vehicle is fast enough.
Answer: False



163.
 Multiple Choice
When entering a roundabout, you should:
A. Yield to traffic already in the roundabout
B. Enter without slowing
C. Signal only when leaving
D. Stop inside the roundabout to check for traffic
Answer: A. Yield to traffic already in the roundabout



164.
 True or False
Learner drivers are allowed to drive in bus lanes.
Answer: False



165. 
Multiple Choice
When driving at night, you should dim your high beams when:
A. Approaching another vehicle within 150 metres
B. Driving in urban areas only
C. Passing a streetlight
D. Entering a tunnel
Answer: A. Approaching another vehicle within 150 metres



166. 
True or False
It is legal to leave a child alone in a vehicle with the engine running.
Answer: False



167.
 Multiple Choice
If you are feeling drowsy while driving, you should:
A. Pull over to rest or change drivers
B. Turn up the radio and open windows
C. Drink coffee and keep going
D. Drive faster to reach your destination sooner
Answer: A. Pull over to rest or change drivers



168. 
True or False
Learner drivers may operate a vehicle with an expired inspection sticker.
Answer: False



169. 
Multiple Choice
When your brakes get wet, you can dry them by:
A. Driving slowly while lightly pressing the brake pedal
B. Stopping completely until they dry
C. Pumping them hard several times
D. Driving at high speed
Answer: A. Driving slowly while lightly pressing the brake pedal



170. 
True or False
It is safe to pass a snowplow if road markings allow it.
Answer: False



171. 
Multiple Choice
When you hear a siren from behind, you should:
A. Pull over to the right and stop
B. Speed up to get out of the way
C. Move left to block traffic
D. Continue at the same speed
Answer: A. Pull over to the right and stop



172. 
True or False
Learner drivers may drive in the left lane of a multi-lane highway at all times.
Answer:False

173. 
Multiple Choice
If your vehicle starts to fishtail, you should:
A. Steer gently in the direction you want to go
B. Brake hard to stop quickly
C. Turn sharply in the opposite direction
D. Accelerate out of the skid
Answer: A. Steer gently in the direction you want to go



174.
 True or False
It is legal to park in a bike lane if no cyclists are present.
Answer: False



175.
 Multiple Choice
When approaching a railway crossing without lights or gates, you should:
A. Slow down, look both ways, and proceed when safe
B. Drive through quickly
C. Stop only if you see a train
D. Honk and continue
Answer: A. Slow down, look both ways, and proceed when safe



176. 
True or False
Learner drivers may tow a trailer.
Answer: False



177. 
Multiple Choice
If you see an animal on the road, you should:
A. Slow down and be prepared to stop
B. Swerve sharply to avoid it
C. Accelerate to scare it off
D. Honk continuously
Answer: A. Slow down and be prepared to stop



178.
 True or False
It is legal to park in a handicapped space without a permit if you are staying inside the car.
Answer: False



179. 
Multiple Choice
When preparing to pass another vehicle, you should:
A. Check mirrors, blind spots, and signal
B. Speed without signalling
C. Pass without checking blind spots
D. Honk before passing
Answer: A. Check mirrors, blind spots, and signal



180. 
True or False
Learner drivers may drive during restricted hours without supervision.
Answer: False



181. 
Multiple Choice
When parking uphill with a curb, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Any direction
Answer: A. Away from the curb



182.
 True or False
It is legal to block a fire station driveway if you remain in the car.
Answer: False



183.
 Multiple Choice
If another driver is tailgating you, you should:
A. Move to another lane or slow down gradually
B. Brake suddenly to warn them
C. Speed up to create distance
D. Ignore them and maintain speed
Answer: A. Move to another lane or slow down gradually



184. 
True or False
Learner drivers can drive with more passengers than seatbelts available.
Answer: False



185. 
Multiple Choice
When driving on a wet road, you should:
A. Reduce speed to avoid hydroplaning
B. Maintain highway speed
C. Brake hard for better control
D. Drive in the middle of the road
Answer: A. Reduce speed to avoid hydroplaning



186. 
True or False
It is safe to leave children in a locked vehicle on a cool day.
Answer: False



187.
 Multiple Choice
When your vehicle starts to overheat, you should:
A. Pull over safely and turn off the engine
B. Continue driving until you reach your destination
C. Pour cold water on the radiator immediately
D. Turn on the heater to maximum without stopping
Answer: A. Pull over safely and turn off the engine



188. 
True or False
Learner drivers are required to display an “L” sign on the vehicle.
Answer: True



189.
 Multiple Choice
When approaching a railway crossing with no lights or gates, you should:
A. Slow down, look both ways, and cross when safe
B. Drive through quickly
C. Stop only if you hear a train
D. Honk before crossing
Answer: A. Slow down, look both ways, and cross when safe


190. 
True or False
It is legal to use a radar detector in Newfoundland and Labrador.
Answer: False



191. 
Multiple Choice
When parking downhill without a curb, turn your wheels:
A. Toward the edge of the road
B. Away from the edge of the road
C. Straight ahead
D. Any direction
Answer: A. Toward the edge of the road



192. 
True or False
Learner drivers may drive in other provinces with the same rules as in Newfoundland and Labrador.
Answer: True



193.
 Multiple Choice
When crossing a railway with multiple tracks, you should:
A. Ensure all tracks are clear before crossing
B. Cross as soon as the first track is clear
C. Stop on the first track to check
D. Drive across quickly without stopping
Answer: A. Ensure all tracks are clear before crossing



194.
 True or False
It is safe to rest your foot on the brake pedal while driving.
Answer: False



195.
 Multiple Choice
When approaching a stopped emergency vehicle on the highway, you should:
A. Slow down and move over if possible
B. Maintain your speed
C. Pass closely to save time
D. Honk to warn them
Answer: A. Slow down and move over if possible



196. 
True or False
Learner drivers may use the car horn unnecessarily to greet others.
Answer: False



197. 
Multiple Choice
If your vehicle begins to slide sideways, you should:
A. Steer in the direction you want to go
B. Brake sharply
C. Turn in the opposite direction
D. Accelerate quickly
Answer: A. Steer in the direction you want to go



198. 
True or False
It is legal to follow a fire truck within 50 metres.
Answer: False



199. 
Multiple Choice
When driving in a rural area at night, you should:
A. Watch for wildlife crossing the road
B. Use high beams in all situations
C. Drive at maximum speed
D. Honk at intersections
Answer: A. Watch for wildlife crossing the road



200. 
True or False
Learner drivers may carry passengers in the cargo area of a pickup truck.
Answer: False



201.
 Multiple Choice
When entering a highway from an on-ramp, you should:
A. Match the speed of traffic and merge when safe
B. Stop at the end of the ramp
C. Drive slowly until other cars move over
D. Honk before merging
Answer: A. Match the speed of traffic and merge when safe



202. 
True or False
Learner drivers can use handheld electronic devices while stopped at a red light.
Answer: False



203. 
Multiple Choice
When approaching a pedestrian crosswalk with flashing lights, you must:
A. Stop and allow pedestrians to cross
B. Continue if you see no one
C. Slow down only
D. Honk before crossing
Answer: A. Stop and allow pedestrians to cross



204. 
True or False
It is legal to park on a bridge if traffic is light.
Answer: False



205. 
Multiple Choice
When your vehicle is stuck in snow, you should:
A. Rock the vehicle gently back and forth
B. Accelerate hard to spin the tires
C. Wait for someone to push
D. Use high gear to move out
Answer: A. Rock the vehicle gently back and forth


206. 
True or False
Learner drivers may exceed the speed limit when passing another vehicle.
Answer: False



207. 
Multiple Choice
When driving through an uncontrolled intersection, you should:
A. Be prepared to stop and yield to vehicles on your right
B. Speed through quickly
C. Honk and proceed
D. Stop only if you see another car
Answer: A. Be prepared to stop and yield to vehicles on your right



208. 
True or False
It is safe to use cruise control in heavy rain.
Answer: False



209.
 Multiple Choice
When your brakes fail, you should:
A. Downshift to a lower gear and use the parking brake gradually
B. Drive faster to reach help
C. Turn off the ignition immediately
D. Pump the gas pedal
Answer: A. Downshift to a lower gear and use the parking brake gradually



210. 
True or False
Learner drivers may operate a vehicle after consuming any alcohol.
Answer: False



211. 
Multiple Choice
When approaching a curve on a wet road, you should:
A. Slow down before entering the curve
B. Accelerate into the curve
C. Brake sharply in the curve
D. Maintain speed without adjusting
Answer: A. Slow down before entering the curve



212. 
True or False
It is legal to drive with a cracked windshield as long as you can see.
Answer: False



213.
 Multiple Choice
If you are involved in a collision, you must:
A. Stop, provide information, and assist injured persons
B. Leave the scene if no one is hurt
C. Drive to the police station later
D. Exchange only phone numbers
Answer: A. Stop, provide information, and assist injured persons



214. 
True or False
Learner drivers can drive on any road without restrictions.
Answer: False



215. 
Multiple Choice
When overtaking a cyclist, you must:
A. Leave at least one metre of space
B. Pass as closely as possible
C. Honk loudly before passing
D. Pass without signalling
Answer: A. Leave at least one metre of space



216. 
True or False
It is safe to change lanes in an intersection if traffic is clear.
Answer: False



217.
 Multiple Choice
If your car stalls on railway tracks, you should:
A. Exit the vehicle and move to safety, then call for help
B. Stay inside and try to restart
C. Push the car off the tracks alone
D. Honk until someone helps
Answer: A. Exit the vehicle and move to safety, then call for help



218. 
True or False
Learner drivers must always have their permit with them when driving.
Answer: True



219.
 Multiple Choice
When driving in icy conditions, you should:
A. Accelerate and brake gently
B. Drive faster to avoid slipping
C. Use cruise control
D. Brake suddenly for better traction
Answer: A. Accelerate and brake gently



220.
 True or False
It is legal to double park if you are in the vehicle.
Answer: False



221. 
Multiple Choice
When following a motorcycle, you should:
A. Increase your following distance
B. Follow closely
C. Pass immediately
D. Honk before passing
Answer: A. Increase your following distance



222. 
True or False
Learner drivers can drive during nighttime without supervision if the roads are quiet.
Answer: False



223.
 Multiple Choice
When approaching a stop sign, you must stop:
A. Before the crosswalk or stop line
B. After entering the intersection
C. Only if other cars are present
D. Before the curb every time
Answer: A. Before the crosswalk or stop line



224. 
True or False
It is legal to park facing the wrong direction on a two-way street.
Answer: False



225.
 Multiple Choice
If another vehicle is merging onto the highway, you should:
A. Adjust your speed or change lanes to allow them in
B. Maintain speed and block them
C. Honk to warn them
D. Speed up to prevent merging
Answer: A. Adjust your speed or change lanes to allow them in



226.
 True or False
Learner drivers may drive unaccompanied on rural gravel roads.
Answer: False



227. 
Multiple Choice
When driving in a school zone, you must:
A. Obey the posted reduced speed limits
B. Maintain normal speed
C. Honk to warn children
D. Drive on the opposite side of the road
Answer: A. Obey the posted reduced speed limits



228.
 True or False
It is safe to leave your car unlocked when you are nearby.
Answer: False



229. 
Multiple Choice
When turning right at a red light, you must:
A. Come to a complete stop and yield to pedestrians and traffic
B. Turn without stopping if it’s clear
C. Only stop for other vehicles
D. Honk to warn pedestrians
Answer: A. Come to a complete stop and yield to pedestrians and traffic



230. 
True or False
Learner drivers are required to follow all posted speed limits.
Answer: True



231. 
Multiple Choice
When following a large truck, you should:
A. Stay far enough back to see its mirrors
B. Follow closely to reduce wind resistance
C. Pass without signalling
D. Drive directly beside it
Answer: A. Stay far enough back to see its mirrors



232. 
True or False
It is safe to drive with a loose load in your truck bed if travelling slowly.
Answer: False



233. 
Multiple Choice
If you see flashing amber lights ahead, you should:
A. Slow down and proceed with caution
B. Stop immediately
C. Speed up to clear the area quickly
D. Ignore them if no one is around
Answer: A. Slow down and proceed with caution



234. 
True or False
Learner drivers must not drive in high-speed passing lanes.
Answer: True



235. 
Multiple Choice
When making a left turn from a two-way street onto a one-way street, you should:
A. Turn into the left lane of the one-way street
B. Turn into any available lane
C. Turn into the right lane
D. Stop in the middle of the turn
Answer: A. Turn into the left lane of the one-way street



236.
 True or False
It is legal to block a crosswalk when stopping at an intersection.
Answer: False



237.
 Multiple Choice
When you are about to be passed, you should:
A. Maintain your speed and stay in your lane
B. Speed up
C. Move to the left to block
D. Honk at the passing driver
Answer: A. Maintain your speed and stay in your lane



238. 
True or False
Learner drivers can park in a loading zone for any amount of time.
Answer: False



239. 
Multiple Choice
When driving through a residential area, you should:
A. Watch for children and pets near the road
B. Drive faster to avoid noise complaints
C. Honk at every intersection
D. Avoid using your mirrors
Answer: A. Watch for children and pets near the road



240.
 True or False
It is legal to drive across a solid double line to pass another vehicle.
Answer: False



241. 
Multiple Choice
When your vision is temporarily impaired by oncoming headlights, you should:
A. Look to the right edge of the road until vision clears
B. Look directly into the lights
C. Close your eyes briefly
D. Speed up to get past the vehicle
Answer: A. Look to the right edge of the road until vision clears



242. 
True or False
Learner drivers may drive with only one functioning headlight.
Answer: False



243. 
Multiple Choice
When driving through standing water, you should:
A. Drive slowly and steadily
B. Speed through quickly
C. Brake hard in the water
D. Stop in the middle of the water
Answer: A. Drive slowly and steadily



244.
 True or False
It is safe to reverse without checking blind spots if you have a rearview camera.
Answer: False



245.
 Multiple Choice
When approaching a stopped vehicle on the side of the road, you should:
A. Slow down and change lanes if safe
B. Maintain speed
C. Honk as you pass
D. Drive as close as possible
Answer: A. Slow down and change lanes if safe



246.
 True or False
Learner drivers can supervise another learner if they have held a licence for at least six months.
Answer: False



247. 
Multiple Choice
If you miss your exit on the highway, you should:
A. Continue to the next exit
B. Reverse to the exit
C. Make a U-turn on the shoulder
D. Stop and wait for a break in traffic
Answer: A. Continue to the next exit



248.
 True or False
It is legal to coast downhill in neutral.
Answer: False



249.
 Multiple Choice
When stopping behind another vehicle on a hill, you should:
A. Leave extra space to prevent rolling back into you
B. Stop very close to avoid being cut off
C. Use your horn to warn them
D. Stay in neutral until they move
Answer: A. Leave extra space to prevent rolling back into you



250.
 True or False
Learner drivers may drive at any time without restrictions once they pass a vision test.
Answer: False

251. 
Multiple Choice
When approaching a railway crossing without gates, you must:
A. Slow down, look both ways, and proceed if clear
B. Drive through quickly without stopping
C. Stop only if you see a train
D. Honk before crossing
Answer: A. Slow down, look both ways, and proceed if clear



252. 
True or False
It is legal to park within 3 metres of a fire hydrant.
Answer: False



253. 
Multiple Choice
When your vehicle begins to skid, you should:
A. Steer in the direction you want the front of the car to go
B. Brake hard immediately
C. Turn the wheel opposite to the skid
D. Release the steering wheel
Answer: A. Steer in the direction you want the front of the car to go



254. 
True or False
Learner drivers can tow a trailer if supervised.
Answer: False



255. 
Multiple Choice
When passing another vehicle, you must:
A. Signal, check mirrors and blind spots, and return only when safe
B. Pass without signalling if traffic is light
C. Honk before overtaking
D. Cross a solid double line if needed
Answer: A. Signal, check mirrors and blind spots, and return only when safe



256. 
True or False
It is safe to keep your high beams on when approaching another vehicle.
Answer: False



257.
 Multiple Choice
When you see a “slippery when wet” sign, you should:
A. Reduce speed and avoid sudden movements
B. Maintain normal speed
C. Accelerate to avoid sliding
D. Brake sharply
Answer: A. Reduce speed and avoid sudden movements


258.
 True or False
Learner drivers can overtake on a solid yellow line if traffic is slow.
Answer: False



259. 
Multiple Choice
If an emergency vehicle is approaching with lights and siren, you must:
A. Pull over to the right and stop
B. Speed up to clear the way
C. Continue driving at the same speed
D. Stop in the middle of the lane
Answer: A. Pull over to the right and stop



260.
 True or False
It is legal to leave your car engine running while unattended.
Answer: False



261.
 Multiple Choice
When approaching a flashing red light, you must:
A. Stop completely, then proceed when safe
B. Slow down and continue without stopping
C. Treat it like a green light
D. Honk before entering
Answer: A. Stop completely, then proceed when safe



262. 
True or False
Learner drivers must display an “L” sign on the rear of the vehicle in Newfoundland and Labrador.
Answer: True



263. 
Multiple Choice
When parallel parking, you should:
A. Signal, check mirrors, and reverse slowly into the spot
B. Enter quickly to avoid blocking traffic
C. Park at an angle if easier
D. Skip signalling if the street is empty
Answer: A. Signal, check mirrors, and reverse slowly into the spot



264. 
True or False
It is safe to reverse without turning your head if you have mirrors.
Answer: False



265. 
Multiple Choice
When making a right turn, you should:
A. Signal well in advance and check for pedestrians
B. Turn sharply without signalling
C. Turn from the left lane if clear
D. Speed up to complete the turn quickly
Answer: A. Signal well in advance and check for pedestrians



266. 
True or False
Learner drivers can drive alone if they have passed a vision and written test.
Answer: False



267. 
Multiple Choice
When approaching a hillcrest where you cannot see ahead, you should:
A. Stay in your lane and reduce speed
B. Move into the opposite lane
C. Speed up to clear the hill quickly
D. Honk continuously
Answer: A. Stay in your lane and reduce speed



268. 
True or False
It is legal to stop in a crosswalk to let passengers out.
Answer: False



269.
 Multiple Choice
When approaching a red flashing light, you should:
A. Stop and proceed when safe
B. Slow down and proceed if clear
C. Treat it as a green light
D. Honk to warn others
Answer: A. Stop and proceed when safe


270. 
True or False
Learner drivers may operate a vehicle with expired licence plates.
Answer: False



271.
 Multiple Choice
If your vehicle’s right wheels go off the pavement, you should:
A. Ease off the accelerator and steer back gently
B. Steer sharply back onto the road
C. Brake hard immediately
D. Accelerate quickly
Answer: A. Ease off the accelerator and steer back gently



272.
 True or False
It is legal to drive with only one working brake light.
Answer: False



273.
 Multiple Choice
When passing through a work zone, you should:
A. Follow posted speed limits and watch for workers
B. Drive as fast as normal
C. Ignore temporary signs
D. Honk to warn workers
Answer: A. Follow posted speed limits and watch for workers



274. 
True or False
Learner drivers can drive without insurance if supervised.
Answer: False



275.
 Multiple Choice
When entering a multi-lane roundabout, you should:
A. Choose your lane before entering based on your exit
B. Change lanes inside the roundabout to get to your exit
C. Enter from any lane and exit wherever you wish
D. Stop in the roundabout to decide
Answer: A. Choose your lane before entering based on your exit


276. 
True or False
It is legal to park on the wrong side of the street facing traffic.
Answer: False



277. 
Multiple Choice
When stopping on an icy road, you should:
A. Brake gently and early
B. Brake sharply at the last moment
C. Accelerate into the stop
D. Use the parking brake only
Answer: A. Brake gently and early



278. 
True or False
Learner drivers can use the passing lane at all times.
Answer: False



279.
 Multiple Choice
When approaching an intersection without signs or signals, you should:
A. Yield to the vehicle on your right
B. Speed up to pass through
C. Honk to claim right of way
D. Stop every time
Answer: A. Yield to the vehicle on your right



280. 
True or False
It is safe to overtake near a pedestrian crossing.
Answer: False



281.
 Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral and apply brakes
B. Turn off the ignition immediately
C. Press the accelerator harder
D. Ignore it until it releases
Answer: A. Shift to neutral and apply brakes



282. 
True or False
Learner drivers can operate motorcycles with a Class 5 permit.
Answer: False



283. 
Multiple Choice
When backing into a parking space, you should:
A. Check all surroundings and move slowly
B. Reverse quickly to save time
C. Skip shoulder checks if mirrors are clear
D. Park at an angle if easier
Answer: A. Check all surroundings and move slowly



284. 
True or False
It is safe to leave your vehicle idling in a closed garage.
Answer: False



285. 
Multiple Choice
When driving at night in a rural area, you should:
A. Use high beams when no traffic is nearby
B. Use low beams at all times
C. Drive without headlights
D. Keep hazard lights on
Answer: A. Use high beams when no traffic is nearby



286. 
True or False
Learner drivers must obey all posted traffic control devices.
Answer: True



287. 
Multiple Choice
When being passed, you should:
A. Maintain speed and stay in your lane
B. Speed up
C. Move left to block the pass
D. Honk at the passing car
Answer: A. Maintain speed and stay in your lane



288. 
True or False
It is legal to park in a bicycle lane unless signs prohibit it.
Answer: False



289. 
Multiple Choice
If your tire blows out, you should:
A. Hold the steering wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply to the shoulder
D. Accelerate to maintain control
Answer: A. Hold the steering wheel firmly and slow down gradually



290. 
True or False
Learner drivers can drive at night without supervision.
Answer: False



291.
 Multiple Choice
When approaching an emergency scene, you should:
A. Slow down and change lanes if possible
B. Maintain speed
C. Honk to warn others
D. Stop completely
Answer: A. Slow down and change lanes if possible



292. 
True or False
It is safe to drive with snow covering your windshield as long as you can see partially.
Answer: False



293. 
Multiple Choice
When merging onto a multi-lane road, you should:
A. Signal, match traffic speed, and merge safely
B. Enter without signalling
C. Slow down before merging
D. Honk at oncoming traffic
Answer: A. Signal, match traffic speed, and merge safely



294. 
True or False
Learner drivers may park in spaces reserved for disabled drivers without a permit.
Answer: False



295.
 Multiple Choice
When driving down a steep hill, you should:
A. Shift to a lower gear and control speed
B. Coast in neutral
C. Brake continuously to maintain speed
D. Turn off the engine
Answer: A. Shift to a lower gear and control speed



296. 
True or False
It is safe to overtake another vehicle when approaching a curve.
Answer: False



297. 
Multiple Choice
When stopped at a red light and turning left onto a one-way street, you must:
A. Stop and yield to all traffic and pedestrians before turning
B. Turn without stopping
C. Only yield to vehicles
D. Ignore pedestrians if they are far away
Answer: A. Stop and yield to all traffic and pedestrians before turning



298. 
True or False
Learner drivers can carry as many passengers as there are seat belts.
Answer: True



299. 
Multiple Choice
When entering a highway from a service road, you should:
A. Signal, accelerate to match traffic, and merge safely
B. Enter slowly without signalling
C. Stop at the end of the service road
D. Honk before merging
Answer: A. Signal, accelerate to match traffic, and merge safely



300. 
True or False
It is legal to park within an intersection if only for a short time.
Answer: False

301.
 Multiple Choice
When approaching a pedestrian crosswalk without signals, you must:
A. Stop and yield to pedestrians
B. Slow down only if pedestrians are present
C. Continue without slowing if you have the right of way
D. Honk to warn pedestrians
Answer: A. Stop and yield to pedestrians



302. 
True or False
It is legal to park in front of a driveway as long as the owner gives permission.
Answer: False



303.
 Multiple Choice
When driving through a school zone, you must:
A. Follow the reduced speed limit during posted hours
B. Maintain normal speed
C. Honk when passing children
D. Stop every time children are present
Answer: A. Follow the reduced speed limit during posted hours



304.
 True or False
Learner drivers can supervise another learner if over 18 years old.
Answer: False



305.
 Multiple Choice
If a traffic light is out at an intersection, you should:
A. Treat it as a four-way stop
B. Continue without stopping
C. Honk and proceed
D. Yield only to larger vehicles
Answer: A. Treat it as a four-way stop



306. 
True or False
It is legal to overtake a vehicle stopped at a pedestrian crosswalk.
Answer: False



307. 
Multiple Choice
When exiting a highway, you should:
A. Signal early and reduce speed in the exit lane
B. Slow down before entering the exit lane
C. Exit without signalling if traffic is light
D. Cross multiple lanes at the last moment
Answer: A. Signal early and reduce speed in the exit lane



308. 
True or False
Learner drivers can use any vehicle regardless of its registration status.
Answer: False



309. 
Multiple Choice
If you encounter an aggressive driver, you should:
A. Stay calm and avoid eye contact
B. Respond with aggressive gestures
C. Speed up to get away quickly
D. Brake suddenly to warn them
Answer: A. Stay calm and avoid eye contact



310. 
True or False
It is legal to drive over the speed limit when overtaking.
Answer: False



311. 
Multiple Choice
What is the minimum age to apply for a Class 5 (Learner’s) licence in New foundland?
A. 15 years
B. 16 years
C. 17 years
D. 18 years
Answer: B. 16 years



312.
 True or False
Learner drivers can drive at any time of day without restrictions.
Answer: False



313. 
Multiple Choice
When approaching a railway crossing with flashing lights, you must:
A. Stop until the lights stop flashing and it’s safe to proceed
B. Slow down and proceed if no train is visible
C. Honk before crossing
D. Cross quickly to avoid delays
Answer: A. Stop until the lights stop flashing and it’s safe to proceed


314. 
True or False
It is safe to pass another vehicle within 30 metres of a railway crossing.
Answer: False



315. 
Multiple Choice
When driving behind a motorcycle, you should:
A. Allow extra following distance
B. Follow closely for better visibility
C. Pass as soon as possible
D. Drive beside them in the same lane
Answer: A. Allow extra following distance



316. 
True or False
Learner drivers may drive without supervision in rural areas.
Answer: False



317. 
Multiple Choice
When approaching a stop sign at a railway crossing, you should:
A. Stop completely, look both ways, and proceed when safe
B. Slow down and proceed if no train is visible
C. Honk before crossing
D. Drive through quickly to clear the tracks
Answer: A. Stop completely, look both ways, and proceed when safe



318.
 True or False
It is legal to stop on a bridge unless in an emergency.
Answer: False



319. 
Multiple Choice
When entering a tunnel, you should:
A. Turn on headlights and adjust speed
B. Speed up to clear the tunnel quickly
C. Drive without headlights
D. Use hazard lights
Answer: A. Turn on headlights and adjust speed



320. 
True or False
Learner drivers can carry passengers in the front seat only.
Answer: False



321. 
Multiple Choice
When parking on a hill with a curb facing downhill, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Keep wheels straight
D. Leave the car in neutral
Answer: A. Turn wheels toward the curb



322.
 True or False
It is legal to cross a solid double yellow line to pass another vehicle.
Answer: False



323. 
Multiple Choice
If your windshield wipers fail in heavy rain, you should:
A. Pull over safely until conditions improve
B. Continue driving slowly without wipers
C. Increase speed to see better
D. Rely only on side mirrors
Answer: A. Pull over safely until conditions improve



324.
 True or False
Learner drivers can drive any class of vehicle with supervision.
Answer: False



325.
 Multiple Choice
When driving near a school bus with red lights flashing, you must:
A. Stop until the lights stop flashing
B. Pass quickly
C. Honk to warn children
D. Drive on the shoulder to pass
Answer: A. Stop until the lights stop flashing



326. 
True or False
It is safe to use cruise control on icy roads.
Answer: False



327. 
Multiple Choice
When turning left at an intersection without signals, you should:
A. Yield to oncoming traffic and pedestrians
B. Turn quickly to avoid delays
C. Only yield to vehicles, not pedestrians
D. Enter the intersection without slowing
Answer: A. Yield to oncoming traffic and pedestrians



328. 
True or False
Learner drivers can drive unsupervised if they have completed six months with a permit.
Answer: False



329. 
Multiple Choice
When approaching an icy bridge, you should:
A. Slow down before reaching the bridge
B. Accelerate to avoid skidding
C. Brake sharply on the bridge
D. Drive in the centre
Answer: A. Slow down before reaching the bridge



330. 
True or False
It is legal to pass on the shoulder of a highway.
Answer: False



331. 
Multiple Choice
When an emergency vehicle is stopped on the roadside with flashing lights, you should:
A. Slow down and move to another lane if possible
B. Continue at the same speed
C. Honk to alert them
D. Stop completely every time
Answer: A. Slow down and move to another lane if possible



332. 
True or False
Learner drivers must carry their permit at all times when driving.
Answer: True



333. 
Multiple Choice
When driving on gravel, you should:
A. Reduce speed and increase following distance
B. Maintain highway speed
C. Brake sharply to avoid sliding
D. Use high beams during the day
Answer: A. Reduce speed and increase following distance



334. 
True or False
It is safe to pass another vehicle when approaching a hillcrest.
Answer: False



335. 
Multiple Choice
If your rear wheels skid, you should:
A. Steer in the same direction as the skid
B. Steer opposite to the skid
C. Brake hard
D. Accelerate out of the skid
Answer: A. Steer in the same direction as the skid



336.
 True or False
Learner drivers may drive a vehicle without seat belts if it is an older model.
Answer: False



337.
 Multiple Choice
When parking at night on a road without lights, you should:
A. Use parking lights or hazard lights
B. Turn off all lights
C. Park in the opposite direction of traffic
D. Leave headlights on high beam
Answer: A. Use parking lights or hazard lights



338.
 True or False
It is legal to stop in a traffic lane to pick up passengers.
Answer: False



339. 
Multiple Choice
When approaching a flashing amber light, you should:
A. Slow down and proceed with caution
B. Stop completely
C. Treat it as a green light
D. Speed up to clear the intersection
Answer: A. Slow down and proceed with caution



340. 
True or False
Learner drivers may park in a fire lane if they remain in the car.
Answer: False



341. 
Multiple Choice
If you see an animal on the road ahead, you should:
A. Slow down and be prepared to stop
B. Swerve sharply to avoid it
C. Speed up to pass before it moves
D. Honk continuously
Answer: A. Slow down and be prepared to stop



342.
 True or False
It is legal to park on a crosswalk if you’re only stopping briefly.
Answer: False



343. 
Multiple Choice
When driving near a cyclist, you should:
A. Leave at least 1 metre of space when passing
B. Pass closely to avoid crossing the centre line
C. Honk to warn them
D. Pass without signalling
Answer: A. Leave at least 1 metre of space when passing



344. 
True or False
Learner drivers can supervise other learners if they have a full licence.
Answer: False



345. 
Multiple Choice
When approaching a pedestrian crossing at night, you should:
A. Reduce speed and be ready to stop
B. Maintain speed if no one is visible
C. Honk to alert pedestrians
D. Flash high beams
Answer: A. Reduce speed and be ready to stop



346. 
True or False
It is safe to drive with frost on your windshield if you can see a little.
Answer: False



347. 
Multiple Choice
If your vehicle begins to skid while turning, you should:
A. Steer gently in the direction you want to go
B. Turn sharply against the skid
C. Brake hard to regain control
D. Accelerate quickly to straighten the vehicle
Answer: A. Steer gently in the direction you want to go

348. 
True or False
Learner drivers must obey the same traffic laws as fully licenced drivers.
Answer: True



349. 
Multiple Choice
When approaching an intersection with a stop sign, you must:
A. Stop completely and proceed when safe
B. Slow down and proceed if clear
C. Honk before proceeding
D. Stop only if traffic is approaching
Answer: A. Stop completely and proceed when safe



350. 
True or False
It is legal to drive with your parking lights on instead of headlights at night.
Answer: False



351.
 Multiple Choice
When driving in high winds, you should:
A. Keep a firm grip on the steering wheel
B. Speed up to avoid gusts
C. Drive in the middle of the road
D. Avoid using both hands on the wheel
Answer: A. Keep a firm grip on the steering wheel



352.
True or False
 Learner drivers can drive in reverse for long distances on public roads.
Answer: False


353.
 Multiple Choice
When your vehicle begins to skid on ice, you should:
A. Steer in the direction you want the front wheels to go
B. Brake hard immediately
C. Steer in the opposite direction of the skid
D. Accelerate quickly to regain traction
Answer: A. Steer in the direction you want the front wheels to go



354.
 True or False
Learner drivers may operate a vehicle while impaired if accompanied by a supervising driver.
Answer: False



355. 
Multiple Choice
When you see flashing amber lights on a school bus, you should:
A. Slow down and prepare to stop
B. Pass quickly before it stops
C. Ignore them if children aren’t visible
D. Honk to warn the driver
Answer: A. Slow down and prepare to stop



356. 
True or False
It is legal to block a driveway if you remain in your vehicle.
Answer: False


357.
 Multiple Choice
When crossing a narrow bridge, you should:
A. Yield to oncoming traffic if necessary
B. Speed up to get across first
C. Drive in the middle of the road
D. Honk to claim right-of-way
Answer: A. Yield to oncoming traffic if necessary



358. 
True or False
Learner drivers can use a mobile phone with hands-free mode while driving.
Answer: True



359. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you must:
A. Slow down and change lanes if possible
B. Maintain speed
C. Stop completely every time
D. Honk to alert them
Answer: A. Slow down and change lanes if possible



360. 
True or False
It is safe to cross a railway crossing immediately after a train passes without checking for another train.
Answer: False



361. 
Multiple Choice
When parking uphill with no curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge
C. Keep wheels straight
D. Leave the car in neutral
Answer: A. Turn wheels toward the edge of the road



362. 
True or False
Learner drivers can drive any distance as long as they are supervised.
Answer: True



363.
 Multiple Choice
When entering traffic from a side road, you should:
A. Yield to all vehicles on the main road
B. Enter quickly without stopping
C. Honk before merging
D. Only yield to larger vehicles
Answer: A. Yield to all vehicles on the main road



364. 
True or False
It is legal to stop in a bike lane to pick up passengers.
Answer: False



365.
 Multiple Choice
When your view is blocked at an intersection, you should:
A. Move forward slowly until you can see
B. Enter without slowing
C. Honk before entering
D. Speed through to avoid delays
Answer: A. Move forward slowly until you can see



366.
 True or False
It is legal to leave pets unattended in a vehicle during hot weather.
Answer: False


367. 
Multiple Choice
When approaching a stopped vehicle on the road, you should:
A. Slow down and pass with caution
B. Pass at normal speed
C. Honk before passing
D. Stop behind it until it moves
Answer: A. Slow down and pass with caution



368. 
True or False
It is legal to park in a disabled parking spot without a permit if staying briefly.
Answer: False



369.
 Multiple Choice
When approaching a blind curve, you should:
A. Slow down and keep to the right
B. Speed up to get through quickly
C. Drive in the centre of the road
D. Honk continuously
Answer: A. Slow down and keep to the right



370. 
True or False
Learner drivers must always drive with their headlights on, even in daylight.
Answer: False



371. 
Multiple Choice
When driving in heavy snow, you should:
A. Use low beams and drive at a safe speed
B. Use high beams for better visibility
C. Drive without lights if snow is bright
D. Accelerate to get through quickly
Answer: A. Use low beams and drive at a safe speed



372. 
True or False
It is legal to drive with an expired licence if you have a learner’s permit.
Answer: False



373. 
Multiple Choice
When turning right on a red light, you must:
A. Stop first and yield to traffic and pedestrians
B. Turn without stopping if clear
C. Honk before turning
D. Only yield to vehicles
Answer: A. Stop first and yield to traffic and pedestrians



374.
 True or False
Learner drivers can overtake other vehicles only on multi-lane roads.
Answer: False



375. 
Multiple Choice
When your view is blocked by a large vehicle ahead, you should:
A. Increase following distance
B. Follow closely to see ahead
C. Pass immediately
D. Drive in the opposite lane
Answer: A. Increase following distance



376. 
True or False
It is legal to park facing the opposite direction of traffic on a two-way street.
Answer: False



377.
 Multiple Choice
When driving on ice, you should:
A. Accelerate and brake gently
B. Brake sharply for better control
C. Use cruise control for steady speed
D. Steer quickly when turning
Answer: A. Accelerate and brake gently



378. 
True or False
Learner drivers must display an “L” or permit plate as required by the province.
Answer: True



379. 
Multiple Choice
When entering a highway from a ramp, you should:
A. Match the speed of highway traffic
B. Enter slowly and wait for gaps
C. Stop at the end of the ramp
D. Honk before merging
Answer: A. Match the speed of highway traffic



380. 
True or False
It is safe to coast downhill in neutral to save fuel.
Answer: False



381. 
Multiple Choice
When driving near parked cars, you should:
A. Watch for opening doors and pedestrians
B. Drive close to them to leave more room for oncoming traffic
C. Speed up to pass quickly
D. Honk to alert drivers inside
Answer: A. Watch for opening doors and pedestrians



382. 
True or False
Learner drivers can tow a trailer with supervision.
Answer: True



383.
 Multiple Choice
When approaching a flashing red light, you should:
A. Stop and proceed when safe
B. Slow down and proceed if clear
C. Treat it as a green light
D. Honk before passing
Answer: A. Stop and proceed when safe



384.
 True or False
It is legal to pass another vehicle in a no-passing zone if the road is clear.
Answer: False



385.
 Multiple Choice
When your vehicle begins to fishtail, you should:
A. Steer gently in the direction of the skid
B. Steer sharply in the opposite direction
C. Brake hard immediately
D. Accelerate quickly
Answer: A. Steer gently in the direction of the skid



386.
 True or False
Learner drivers may drive any vehicle class as long as they are supervised.
Answer: False



387.
 Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Stop and yield the right-of-way
B. Honk to warn them
C. Pass quickly
D. Ignore if they are on the sidewalk
Answer: A. Stop and yield the right-of-way



388. 
True or False
It is legal to drive with interior dome lights on at night.
Answer: True



389. 
Multiple Choice
When you hear a siren but cannot see the emergency vehicle, you should:
A. Slow down and prepare to yield
B. Continue as normal
C. Stop immediately
D. Speed up to get clear of the area
Answer: A. Slow down and prepare to yield



390. 
True or False
Learner drivers can drive without insurance coverage.
Answer: False



391.
 Multiple Choice
When approaching a yield sign, you should:
A. Slow down and give right-of-way if needed
B. Stop every time before entering
C. Proceed without slowing if clear
D. Honk to warn others
Answer: A. Slow down and give right-of-way if needed



392. 
True or False
It is legal to park within an intersection if traffic is light.
Answer: False



393. 
Multiple Choice
When passing another vehicle, you should:
A. Signal, check blind spots, and pass quickly but safely
B. Pass slowly to avoid startling them
C. Pass without signalling if the road is clear
D. Honk before overtaking
Answer: A. Signal, check blind spots, and pass quickly but safely



394.
 True or False
Learner drivers may drive on 400-series highways if accompanied by a supervising driver.
Answer: True



395. 
Multiple Choice
When approaching an intersection with an obstructed view, you should:
A. Move forward slowly until you can see clearly
B. Enter quickly without stopping
C. Honk before entering
D. Turn around and find another route
Answer: A. Move forward slowly until you can see clearly



396. 
True or False
It is safe to leave children unattended in a vehicle if the engine is off.
Answer: False



397. 
Multiple Choice
When entering a construction zone, you should:
A. Follow all posted signs and reduce speed
B. Maintain normal speed
C. Pass construction vehicles quickly
D. Honk to alert workers
Answer: A. Follow all posted signs and reduce speed



398. 
True or False
Learner drivers may drive at night without additional restrictions.
Answer: False



399.
 Multiple Choice
When backing up, you should:
A. Look over your shoulder and use mirrors
B. Rely only on mirrors
C. Back up quickly to clear the way
D. Use hazard lights at all times
Answer: A. Look over your shoulder and use mirrors



400.
 True or False
It is legal to park in a bus stop zone at night when buses are not running.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Newfoundland and Labrador");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Newfoundland and Labrador.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $newfoundlandAndLabrador->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Newfoundland and Labrador citizenship questions.");
    }
}


