<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OntarioDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $ontario = DrivingSection::firstOrCreate(
            ['title' => 'Ontario'],
            [
                'type' => 'province',
                'capital' => 'Toronto',
                'flag' => '/images/flags/ontario.png',
                'description' => 'Questions specific to Ontario.',
                'summary_audio_url' => '/audio/summary_ontario.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $ontario->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1. 
Multiple Choice
What is the maximum speed limit on most city roads in Ontario unless otherwise posted?
A. 40 km/h
B. 50 km/h
C. 60 km/h
D. 70 km/h
Answer: B. 50 km/h



2. 
True or False
It is legal to use a handheld phone while driving in Ontario as long as you are stopped at a red light.
Answer: False
 (You must be parked and off the roadway to use a handheld device legally.)



3. 
Multiple Choice
When approaching a stopped school bus with its upper red lights flashing, you must:
A. Slow down and pass with caution
B. Stop at least 20 metres away
C. Stop at least 10 metres away
D. Honk to alert the driver
Answer: B. Stop at least 20 metres away



4. 
True or False
A solid yellow line on your side of the road means passing is allowed.
Answer: False
(A solid yellow line on your side means no passing.)



5.
 Multiple Choice
At a four-way stop, who should go first?
A. The largest vehicle
B. The vehicle that arrives first
C. The vehicle on the left
D. The fastest vehicle
Answer: B. The vehicle that arrives first



6.
 True or False
Drivers must always yield to pedestrians at marked crosswalks.
Answer: True



7. 
Multiple Choice
If your car starts to skid on a slippery road, you should:
A. Steer in the opposite direction of the skid
B. Brake hard immediately
C. Steer in the direction you want to go
D. Turn off the engine
Answer: C. Steer in the direction you want to go



8. 
True or False
It is safe to drive if your BAC (Blood Alcohol Concentration) is below 0.08.
Answer: False
 (Ontario has stricter limits for novice and young drivers—zero tolerance.)



9. 
Multiple Choice
When must you use your headlights?
A. Between sunset and sunrise
B. Whenever visibility is less than 150 metres
C. In heavy rain, fog, or snow
D. All of the above
Answer: D. All of the above



10.
 True or False
You can park within 3 metres of a fire hydrant as long as it is daytime.
Answer: False 
(You must not park within 3 metres of a fire hydrant at any time.)



11. 
Multiple Choice
When approaching a railway crossing with flashing red lights, you must:
A. Slow down and look both ways
B. Stop at least 5 metres from the track
C. Cross quickly before the train comes
D. Honk to warn others
Answer: B. Stop at least 5 metres from the track



12. 
True or False
You must always stop when a police officer signals you, even if you believe you have done nothing wrong.
Answer: True



13. 
Multiple Choice
What does a flashing green traffic light mean in Ontario?
A. You may turn left, right, or go straight without waiting
B. Pedestrian crossing ahead
C. Stop, then proceed when safe
D. School zone ahead
Answer: A. You may turn left, right, or go straight without waiting



14.
 True or False
If you are involved in a collision, you must exchange your insurance details with other parties involved.
Answer: True



15. 
Multiple Choice
If a vehicle is tailgating you, what is the best action to take?
A. Brake hard to warn them
B. Move into another lane if safe
C. Speed up to get away
D. Ignore them
Answer: B. Move into another lane if safe



16. 
True or False
When driving in fog, you should use your high-beam headlights.
Answer: False
 (Use low beams in fog to avoid glare.)



17. 
Multiple Choice
What is the minimum following distance recommended in ideal driving conditions?
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



18. 
True or False
You must yield to buses that are signaling to re-enter traffic from a bus bay in Ontario.
Answer: True



19. 
Multiple Choice
When parallel parking, you should be no more than how far from the curb?
A. 15 cm
B. 30 cm
C. 50 cm
D. 1 metre
Answer: B. 30 cm



20. 
True or False
It is legal to turn right on a red light in Ontario unless a sign says otherwise.
Answer: True



21. 
Multiple Choice
If you feel drowsy while driving, the best choice is to:
A. Pull over safely and rest
B. Open the windows and keep driving
C. Drink coffee and speed up
D. Turn up the music loudly
Answer: A. Pull over safely and rest



22. 
True or False
A driver’s licence is valid forever once issued.
Answer: False (It must be renewed regularly.)



23.
 Multiple Choice
What should you do if your brakes fail?
A. Shift to a lower gear and use the parking brake
B. Turn off the ignition immediately
C. Jump out of the vehicle
D. Honk continuously
Answer: A. Shift to a lower gear and use the parking brake



24. 
True or False
Passing another vehicle in a school zone is always legal.
Answer: False



25. 
Multiple Choice
At an uncontrolled intersection, who has the right of way?
A. The driver on the left
B. The driver on the right
C. The faster vehicle
D. The larger vehicle
Answer: B. The driver on the right



26. 
True or False
Cyclists have the same rights and responsibilities as drivers on the road.
Answer: True



27. 
Multiple Choice
What does a flashing amber traffic light mean?
A. Stop and wait for green
B. Proceed with caution
C. Speed up to clear the intersection
D. No entry
Answer: B. Proceed with caution



28. 
True or False
It is legal to leave your vehicle running while unattended.
Answer: False



29. 
Multiple Choice
When backing up, you should:
A. Rely only on mirrors
B. Look over your shoulder through the rear window
C. Keep both hands off the wheel
D. Rely only on your backup camera
Answer: B. Look over your shoulder through the rear window



30. 
True or False
If you miss your exit on a freeway, you should stop and reverse to get back to it.
Answer: False



31.
 Multiple Choice
If you approach an intersection and the traffic lights are out, you should:
A. Treat it as a four-way stop
B. Drive through carefully without stopping
C. Follow the car ahead closely
D. Turn around and find another route
Answer: A. Treat it as a four-way stop



32. 
True or False
Seat belts are only required for drivers, not passengers.
Answer: False



33.
 Multiple Choice
In heavy rain, hydroplaning can occur. To reduce the risk, you should:
A. Drive faster to get through water quickly
B. Slow down and avoid sudden movements
C. Turn off traction control
D. Pump the brakes continuously
Answer: B. Slow down and avoid sudden movements



34. 
True or False
You can legally park in front of a driveway if you will be away for less than 5 minutes.
Answer: False



35. 
Multiple Choice
When you hear a siren from an emergency vehicle, you must:
A. Speed up to get out of the way
B. Pull over to the right and stop
C. Continue driving but stay in your lane
D. Stop in the middle of the road
Answer: B. Pull over to the right and stop



36. 
True or False
A G1 driver must always have a fully licensed driver with at least 4 years of experience in the front passenger seat.
Answer: True



37. 
Multiple Choice
The legal Blood Alcohol Concentration (BAC) for fully licensed drivers in Ontario is:
A. 0.00
B. 0.03
C. 0.05
D. 0.08
Answer: D. 0.08



38. 
True or False
Drivers under the age of 22 must maintain a zero BAC at all times while driving.
Answer: True



39.
 Multiple Choice
If your vehicle begins to fishtail, the best action is to:
A. Brake hard
B. Steer gently in the direction you want to go
C. Accelerate quickly
D. Turn the wheel sharply in the opposite direction
Answer: B. Steer gently in the direction you want to go



40.
 True or False
Flashing blue lights are used by snow removal vehicles in Ontario.
Answer: True



41.
 Multiple Choice
When two vehicles reach an intersection at the same time from opposite directions, and one wants to turn left, who has the right of way?
A. The vehicle turning left
B. The vehicle going straight
C. The larger vehicle
D. The faster vehicle
Answer: B. The vehicle going straight



42. 
True or False
It is legal to drive with your parking lights on instead of headlights at night.
Answer: False



43. 
Multiple Choice
When approaching a roundabout, you must:
A. Yield to traffic already in the roundabout
B. Enter without slowing down
C. Stop before entering
D. Always take the first exit
Answer: A. Yield to traffic already in the roundabout



44. 
True or False
Motorcycles have the right to use a full lane.
Answer: True



45. 
Multiple Choice
If you are drowsy while driving, the best option is to:
A. Drink coffee and keep going
B. Open the window for fresh air
C. Pull over and rest
D. Turn up the radio
Answer: C. Pull over and rest



46. 
True or False
It is acceptable to stop in a live lane to drop off passengers if your hazard lights are on.
Answer: False



47.
 Multiple Choice
What is the correct hand signal for a right turn?
A. Left arm extended straight out
B. Left arm bent upward at the elbow
C. Left arm bent downward at the elbow
D. Right arm extended straight out
Answer: B. Left arm bent upward at the elbow



48. 
True or False
In Ontario, winter tires are mandatory for all drivers from December to March.
Answer: False
 (They are recommended but not mandatory.)



49.
 Multiple Choice
When driving at night and meeting an oncoming vehicle, you should:
A. Use high beams for better visibility
B. Look directly at the headlights
C. Dim your headlights and look to the right edge of the road
D. Close your eyes briefly to avoid glare
Answer: C. Dim your headlights and look to the right edge of the road



50. 
True or False
Horns should only be used to warn others of danger.
Answer: True



51.
 Multiple Choice
If another driver is merging onto the highway, you should:
A. Maintain your speed and force them to adjust
B. Move over if possible or adjust your speed to help them merge
C. Speed up to pass them
D. Honk to warn them
Answer: B. Move over if possible or adjust your speed to help them merge



52. 
True or False
It is legal to drive barefoot in Ontario.
Answer: True (But not recommended for safety.)



53.
 Multiple Choice
When driving behind a motorcycle, you should keep at least:
A. 1 second following distance
B. 2 seconds following distance
C. 3 seconds following distance
D. 4 seconds following distance
Answer: C. 3 seconds following distance



54. 
True or False
You must stop for pedestrians at both marked and unmarked crosswalks.
Answer: True



55. 
Multiple Choice
When exiting a freeway, you should:
A. Signal early and reduce speed in the deceleration lane
B. Slow down on the main lanes
C. Stop before exiting
D. Exit without signaling
Answer: A. Signal early and reduce speed in the deceleration lane



56. 
True or False
Driving too slowly can be dangerous and may result in a ticket.
Answer: True



57. 
Multiple Choice
When passing another vehicle, you must:
A. Return to your lane when you can see the vehicle’s headlights in your mirror
B. Cut in immediately after passing
C. Pass on the right only
D. Honk before passing
Answer: A. Return to your lane when you can see the vehicle’s headlights in your mirror



58. 
True or False
You can drive in the left lane on a multi-lane highway indefinitely, even if you’re not passing.
Answer: False



59.
 Multiple Choice
Before changing lanes, you should:
A. Check mirrors, signal, check blind spot, then change lanes
B. Signal and change lanes immediately
C. Rely only on mirrors
D. Slow down drastically
Answer: A. Check mirrors, signal, check blind spot, then change lanes



60. 
True or False
Flashing red traffic lights should be treated like a stop sign.
Answer: True



61.
 Multiple Choice
If your car begins to skid on ice, you should:
A. Brake hard
B. Steer gently in the direction you want to go
C. Accelerate to regain control
D. Turn sharply
Answer: B. Steer gently in the direction you want to go



62.
 True or False
In Ontario, studded tires are legal province-wide.
Answer: False (They are only permitted in Northern Ontario, with conditions.)



63. 
Multiple Choice
When you see an animal on the road, you should:
A. Swerve sharply to avoid it
B. Brake firmly and stay in your lane if possible
C. Honk and speed up
D. Ignore it
Answer: B. Brake firmly and stay in your lane if possible



64.
 True or False
A broken white line separates lanes of traffic moving in the same direction.
Answer: True



65. 
Multiple Choice
What does a flashing blue light on a vehicle indicate?
A. Snow removal vehicle
B. Police vehicle
C. Fire truck
D. Ambulance
Answer: A. Snow removal vehicle



66.
 True or False
If two vehicles arrive at an uncontrolled intersection at the same time, the driver on the left has the right of way.
Answer: False (Driver on the right goes first.)



67. 
Multiple Choice
If a vehicle is blocking your lane and there’s a solid yellow line on your side, you should:
A. Wait until the lane changes to broken before passing
B. Cross the line quickly if no one is coming
C. Honk until they move
D. Drive on the shoulder to pass
Answer: A. Wait until the lane changes to broken before passing


68. 
True or False
Drivers must yield to blind pedestrians with a white cane.
Answer: True



69. 
Multiple Choice
If you are in a roundabout and miss your exit, you should:
A. Stop and reverse
B. Go around again until you reach your exit
C. Turn around in the roundabout
D. Exit at the next one and make a U-turn
Answer: B. Go around again until you reach your exit



70. 
True or False
It is illegal to block an intersection, even during heavy traffic.
Answer: True



71.
 Multiple Choice
If you are pulled over and asked for your documents, you must provide:
A. Driver’s licence and vehicle registration
B. Driver’s licence, vehicle registration, and proof of insurance
C. Only your driver’s licence
D. Only proof of insurance
Answer: B. Driver’s licence, vehicle registration, and proof of insurance



72.
 True or False
When passing a cyclist, you must leave at least 1 metre of space.
Answer: True



73. 
Multiple Choice
If your accelerator sticks, you should:
A. Shift to neutral and apply brakes
B. Turn off the engine immediately while moving
C. Pull the parking brake sharply
D. Honk for help
Answer: A. Shift to neutral and apply brakes



74. 
True or False
Driving at night requires you to reduce your speed.
Answer: True



75. 
Multiple Choice
What does a solid white line between lanes mean?
A. Lane changing is discouraged but not prohibited
B. Passing is not allowed
C. Traffic is moving in opposite directions
D. Lane changing is allowed freely
Answer: A. Lane changing is discouraged but not prohibited



76.
 True or False
Reversing into an intersection is legal if you missed your turn.
Answer: False



77. 
Multiple Choice
When a traffic signal turns yellow, you should:
A. Stop if it is safe to do so
B. Speed up to beat the red light
C. Continue at the same speed
D. Honk to warn others
Answer: A. Stop if it is safe to do so



78.
 True or False
Children under 8 years old must be in a proper child car seat or booster seat.
Answer: True



79. 
Multiple Choice
If a pedestrian begins crossing after the “Don’t Walk” signal starts flashing, you should:
A. Continue driving if the light is green for you
B. Wait until they finish crossing
C. Honk to hurry them
D. Drive around them
Answer: B. Wait until they finish crossing



80.
 True or False
You must yield to transit buses signaling to leave a stop in Ontario.
Answer: True



81.
 Multiple Choice
When approaching a stopped streetcar with doors open, you must:
A. Pass with caution
B. Stop at least 2 metres behind the rear doors
C. Honk to warn passengers
D. Drive in the opposite lane
Answer: B. Stop at least 2 metres behind the rear doors



82. 
True or False
Pedestrians always have the right of way, even if crossing illegally.
Answer: False (You must avoid hitting them, but they don’t always have legal right of way.)



83.
 Multiple Choice
When driving in heavy snow, you should:
A. Use high beams for better visibility
B. Use low beams and drive slowly
C. Follow other vehicles closely
D. Turn off lights to save power
Answer: B. Use low beams and drive slowly



84. 
True or False
A flashing green light in Ontario means the same as in all provinces.
Answer: False (Ontario’s flashing green means advanced left turn.)



85. 
Multiple Choice
When stopped at a railway crossing with no gates or signals, you should:
A. Look both ways and proceed when safe
B. Drive quickly without stopping
C. Honk before crossing
D. Wait for another vehicle to go first
Answer: A. Look both ways and proceed when safe



86. 
True or False
In Ontario, wearing a seatbelt is optional for the front passenger.
Answer: False



87. 
Multiple Choice
If your headlights fail at night, you should:
A. Turn on hazard lights and pull off the road
B. Continue driving slowly
C. Use your phone flashlight to see
D. Honk continuously
Answer: A. Turn on hazard lights and pull off the road



88. 
True or False
On a two-lane road, passing is allowed when the line on your side is broken.
Answer: True



89. 
Multiple Choice
When merging onto a highway, who has the right of way?
A. The merging vehicle
B. The vehicles already on the highway
C. The faster vehicle
D. The larger vehicle
Answer: B. The vehicles already on the highway



90. 
True or False
You must signal at least 30 metres before turning in Ontario.
Answer: True



91. 
Multiple Choice
When approaching a pedestrian at an unmarked crosswalk, you should:
A. Stop and yield
B. Continue driving
C. Honk to warn them
D. Speed up to clear the crossing
Answer: A. Stop and yield



92. 
True or False
It is legal to use a radar detector in Ontario.
Answer: False



93. 
Multiple Choice
When driving in a construction zone, you must:
A. Follow posted speed limits even if workers are not present
B. Drive at normal highway speed
C. Ignore construction signs at night
D. Only slow down if workers are visible
Answer: A. Follow posted speed limits even if workers are not present



94. 
True or False
Drivers must carry proof of insurance in their vehicle at all times.
Answer: True



95.
 Multiple Choice
If your vehicle stalls on railway tracks, you should:
A. Try to restart the vehicle immediately
B. Exit the vehicle and move to a safe distance
C. Push the vehicle off the tracks
D. Stand in front to signal others
Answer: B. Exit the vehicle and move to a safe distance



96. 
True or False
When two vehicles arrive at a four-way stop at the same time, the driver on the right goes first.
Answer: True



97.
 Multiple Choice
In Ontario, you must dim your headlights when approaching another vehicle within:
A. 60 metres
B. 120 metres
C. 150 metres
D. 200 metres
Answer: C. 150 metres



98.
 True or False
Drivers must slow down and proceed with caution when passing a stopped emergency vehicle with flashing lights.
Answer: True



99. 
Multiple Choice
If your vehicle begins to overheat, you should:
A. Turn on the heater to draw heat from the engine
B. Turn off the engine immediately
C. Add cold water to the radiator right away
D. Drive faster to cool it down
Answer: A. Turn on the heater to draw heat from the engine



100. 
True or False
It is legal to park in a disabled parking space if you are only stopping briefly.
Answer: False



101. 
Multiple Choice
When approaching a pedestrian crossover, you must:
A. Slow down but do not stop
B. Stop only if pedestrians are on your side of the road
C. Stop and wait until all pedestrians have completely crossed
D. Honk to warn pedestrians
Answer: C. Stop and wait until all pedestrians have completely crossed



102.
 True or False
In Ontario, failing to stop at a pedestrian crossover can result in fines and demerit points.
Answer: True



103.
 Multiple Choice
If you see a vehicle stopped at a crosswalk, you should:
A. Pass it carefully
B. Stop and check for pedestrians
C. Honk and continue
D. Flash your lights to signal them to move
Answer: B. Stop and check for pedestrians



104. 
True or False
You are allowed to exceed the speed limit when overtaking another vehicle.
Answer: False



105. 
Multiple Choice
When driving at night, you must dim your high beams when following another vehicle within:
A. 30 metres
B. 60 metres
C. 120 metres
D. 150 metres
Answer: B. 60 metres



106. 
True or False
Bicycles are allowed to use turning lanes just like cars.
Answer: True



107.
 Multiple Choice
When entering a tunnel, you should:
A. Remove sunglasses and turn on headlights
B. Accelerate to maintain speed
C. Use high beams
D. Honk before entering
Answer: A. Remove sunglasses and turn on headlights



108. 
True or False
The driver is responsible for ensuring all passengers under 16 are wearing seatbelts.
Answer: True



109. 
Multiple Choice
If your vehicle starts to spin out of control, the first thing you should do is:
A. Slam on the brakes
B. Steer gently in the direction of the skid
C. Turn the wheel opposite the skid
D. Accelerate
Answer: B. Steer gently in the direction of the skid



110. 
True or False
You can make a U-turn anywhere as long as it is safe.
Answer: False (U-turns are prohibited in many areas.)



111. 
Multiple Choice
If you are being passed by another vehicle, you should:
A. Speed up to block them
B. Maintain your speed or slow slightly
C. Move to the left lane
D. Honk to warn them
Answer: B. Maintain your speed or slow slightly



112. 
True or False
Driving without valid insurance is a criminal offence in Ontario.
Answer: False (It’s a provincial offence, but with heavy penalties.)



113.
 Multiple Choice
The best way to handle a curve is to:
A. Brake in the middle of the curve
B. Accelerate into the curve
C. Slow down before entering the curve
D. Drive through at normal speed
Answer: C. Slow down before entering the curve



114.
 True or False
You can pass a stopped streetcar on the left if there is no other traffic.
Answer: False (You must stop until doors close and passengers are clear.)



115.
 Multiple Choice
When approaching an emergency vehicle with flashing lights from behind, you must:
A. Slow down and pass
B. Change lanes away if possible or slow down
C. Stop completely in your lane
D. Speed up to pass quickly
Answer: B. Change lanes away if possible or slow down



116. 
True or False
It is illegal to drive with only one working headlight at night.
Answer: True



117. 
Multiple Choice
If you experience brake fade on a long downhill, you should:
A. Shift to a lower gear to help slow the vehicle
B. Pump the brakes harder
C. Turn off the engine
D. Speed up to reach the bottom faster
Answer: A. Shift to a lower gear to help slow the vehicle



118.
 True or False
In Ontario, it is illegal to block a bike lane with your car.
Answer: True



119. 
Multiple Choice
When parking downhill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: A. Toward the curb



120.
 True or False
You can use your horn to express frustration with another driver.
Answer: False



121.
 Multiple Choice
What is the safest way to reverse your vehicle?
A. Use mirrors only
B. Turn your body and look through the rear window
C. Use your backup camera only
D. Reverse quickly to minimize time in reverse
Answer: B. Turn your body and look through the rear window



122.
 True or False
You must come to a complete stop at a stop sign, even if the intersection is clear.
Answer: True



123. 
Multiple Choice
When driving in a school zone, you must:
A. Follow the posted reduced speed limit during school hours
B. Ignore the signs if no children are present
C. Always drive at 50 km/h
D. Stop at all crosswalks
Answer: A. Follow the posted reduced speed limit during school hours



124. 
True or False
The left lane on a multi-lane road is primarily for passing.
Answer: True



125.
 Multiple Choice
When entering a freeway from a ramp, you should:
A. Stop at the end of the ramp
B. Merge at the speed of traffic
C. Enter slowly and speed up after merging
D. Signal only after merging
Answer: B. Merge at the speed of traffic



126. 
True or False
Drivers must always yield to funeral processions.
Answer: True



127. 
Multiple Choice
If your vehicle starts to oversteer in a turn, you should:
A. Steer gently in the direction of the skid
B. Brake hard
C. Accelerate sharply
D. Steer away from the skid
Answer: A. Steer gently in the direction of the skid



128. 
True or False
Backing out of a driveway requires you to yield to all approaching traffic and pedestrians.
Answer: True



129. 
Multiple Choice
If a traffic light turns yellow as you approach, you should:
A. Stop if safe to do so
B. Speed up to beat the red light
C. Maintain your speed
D. Honk to alert others
Answer: A. Stop if safe to do so



130.
 True or False
A G1 driver can drive alone during daylight hours.
Answer: False



131.
 Multiple Choice
When you see a “Merge” sign ahead, you should:
A. Stop before merging
B. Adjust your speed and position to merge smoothly
C. Speed up to pass traffic before merging
D. Honk to warn other drivers
Answer: B. Adjust your speed and position to merge smoothly



132. 
True or False
You can park on a bridge as long as traffic is light.
Answer: False



133. 
Multiple Choice
What should you do if your car gets stuck in snow?
A. Spin the tires quickly to get out
B. Use a rocking motion by shifting between forward and reverse
C. Leave the car running and wait for help
D. Push the gas pedal fully
Answer: B. Use a rocking motion by shifting between forward and reverse



134. 
True or False
The posted speed limit is the maximum safe speed in all conditions.
Answer: False (You must adjust speed for conditions.)



135. 
Multiple Choice
When approaching a stop sign with no stop line, you must:
A. Stop before the crosswalk
B. Stop in the middle of the intersection
C. Slow down but do not stop
D. Stop anywhere before the intersection
Answer: A. Stop before the crosswalk



136. 
True or False
All passengers in a vehicle must wear a seatbelt or use a proper restraint.
Answer: True



137. 
Multiple Choice
When driving through a flooded area, you should:
A. Drive quickly to avoid water
B. Test your brakes afterward to ensure they work
C. Drive through without slowing down
D. Stop and reverse out of the water
Answer: B. Test your brakes afterward to ensure they work



138.
 True or False
In Ontario, you must report any collision with damage over $2,000 to the police.
Answer: True



139. 
Multiple Choice
When following a large truck, you should:
A. Stay close so they can see you
B. Maintain a greater following distance than usual
C. Drive in their blind spot
D. Flash your headlights to alert them
Answer: B. Maintain a greater following distance than usual



140. 
True or False
Pedestrians have the right of way only at marked crosswalks.
Answer: False (Also at unmarked crosswalks and intersections.)



141. 
Multiple Choice
What is the maximum speed limit on most rural roads in Ontario unless posted otherwise?
A. 60 km/h
B. 70 km/h
C. 80 km/h
D. 90 km/h
Answer: C. 80 km/h



142. 
True or False
You can be fined for driving too slowly if you block traffic.
Answer: True



143.
 Multiple Choice
What should you do if you encounter an aggressive driver?
A. Respond aggressively
B. Ignore them and avoid eye contact
C. Brake suddenly
D. Block their lane
Answer: B. Ignore them and avoid eye contact



144. 
True or False
It is legal to park within 9 metres of an intersection.
Answer: False



145.
 Multiple Choice
If your vehicle’s tire blows out, you should:
A. Brake hard immediately
B. Grip the steering wheel firmly and steer straight
C. Turn sharply to the side of the road
D. Accelerate
Answer: B. Grip the steering wheel firmly and steer straight



146. 
True or False
You can cross a solid white line when changing lanes.
Answer: False (It’s discouraged and may be illegal in some areas.)



147. 
Multiple Choice
When approaching an intersection with a flashing red light, you should:
A. Slow down and proceed
B. Stop and proceed when safe
C. Continue without stopping if clear
D. Turn only right
Answer: B. Stop and proceed when safe



148. 
True or False
When parking uphill without a curb, you should turn your wheels toward the right.
Answer: True



149.
 Multiple Choice
When is it legal to pass on the right?
A. When the vehicle ahead is turning left and the road is wide enough
B. On any road at any time
C. On a two-lane highway with a solid yellow line
D. Never
Answer: A. When the vehicle ahead is turning left and the road is wide enough



150. 
True or False
It is illegal to leave your car idling unattended.
Answer: True



151. 
Multiple Choice
When following a fire truck responding to an emergency, you must stay back at least:
A. 30 metres
B. 60 metres
C. 100 metres
D. 150 metres
Answer: C. 100 metres



152. 
True or False
If your headlights are on high beam, you must dim them within 150 metres of oncoming traffic.
Answer: True



153.
 Multiple Choice
If you are caught driving without a valid driver’s licence, you may face:
A. A fine
B. Vehicle impoundment
C. Court charges
D. All of the above
Answer: D. All of the above



154. 
True or False
It is safe to drive with your cruise control on in heavy rain.
Answer: False



155. 
Multiple Choice
When approaching a cyclist from behind, you should:
A. Honk to warn them
B. Pass with at least 1 metre clearance
C. Pass as closely as possible
D. Follow closely until they move
Answer: B. Pass with at least 1 metre clearance



156. 
True or False
You can enter an intersection on a yellow light if it turns red while you are in it.
Answer: True



157.
 Multiple Choice
When approaching a yield sign, you should:
A. Slow down and yield to traffic
B. Stop regardless of traffic
C. Speed up to merge quickly
D. Honk before merging
Answer: A. Slow down and yield to traffic



158. 
True or False
You can park in front of a fire station driveway if you are 5 metres away.
Answer: False
 (You must be at least 15 metres away.)



159. 
Multiple Choice
When a vehicle ahead is signaling to turn left, you may:
A. Pass on the right if it’s safe and legal
B. Pass on the left only
C. Wait until it turns
D. Drive on the shoulder to pass
Answer: A. Pass on the right if it’s safe and legal



160. 
True or False
The hand signal for slowing down is the left arm bent downward at the elbow.
Answer: True



161.
 Multiple Choice
When parking uphill with a curb, your wheels should be turned:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: B. Away from the curb



162. 
True or False
Driving with headphones covering both ears is legal in Ontario.
Answer: False



163. 
Multiple Choice
What is the penalty for not stopping for a school bus with flashing red lights?
A. Fine and 2 demerit points
B. Fine and 6 demerit points
C. Fine only
D. Verbal warning
Answer: B. Fine and 6 demerit points



164.
 True or False
It’s acceptable to pass a snow plow on a two-lane road if it’s going slowly.
Answer: False



165.
 Multiple Choice
If an oncoming vehicle drifts into your lane, you should:
A. Honk and brake
B. Move to the right if safe
C. Be prepared to stop
D. All of the above
Answer: D. All of the above



166. 
True or False
On gravel roads, you should increase your following distance.
Answer: True



167. 
Multiple Choice
When your view is blocked at an intersection, you should:
A. Proceed slowly until you can see clearly
B. Speed up to clear the intersection
C. Honk before proceeding
D. Wait until another vehicle passes first
Answer: A. Proceed slowly until you can see clearly



168. 
True or False
You must signal when leaving a roundabout.
Answer: True


169. 
Multiple Choice
In Ontario, who is responsible if a passenger under 16 is not wearing a seatbelt?
A. The passenger
B. The driver
C. Both equally
D. No one
Answer: B. The driver



170.
True or False
You may park beside another parked vehicle on the roadway if space is limited.
Answer:False


171. 
Multiple Choice
If your brakes fail and you cannot stop, you should:
A. Use the parking brake and downshift
B. Jump out of the vehicle
C. Steer into oncoming traffic to stop
D. Honk and hope it stops
Answer: A. Use the parking brake and downshift



172.
 True or False
It is legal to leave your car doors unlocked when parked.
Answer: False



173. 
Multiple Choice
When driving in windy conditions, you should:
A. Hold the steering wheel firmly
B. Reduce speed
C. Be prepared for sudden gusts
D. All of the above
Answer: D. All of the above



174. 
True or False
If you miss an exit on the highway, you should reverse carefully to get back to it.
Answer: False



175. 
Multiple Choice
When should you check your blind spots?
A. Before changing lanes or merging
B. Before turning
C. Before pulling away from the curb
D. All of the above
Answer: D. All of the above



176.
 True or False
You may block a crosswalk while waiting at a red light.
Answer: False



177. 
Multiple Choice
When driving on a slippery road, you should:
A. Accelerate gently
B. Brake gently
C. Steer smoothly
D. All of the above
Answer: D. All of the above



178.
 True or False
Using high beams in fog improves visibility.
Answer: False



179. 
Multiple Choice
If you are stopped at a red light and an emergency vehicle approaches from behind, you should:
A. Remain stopped until the light changes
B. Move through the red light if safe to make way
C. Pull into the intersection and stop
D. Ignore it
Answer: B. Move through the red light if safe to make way



180. 
True or False
You must always carry your driver’s licence when driving.
Answer: True



181. 
Multiple Choice
When driving in rain, your stopping distance:
A. Increases
B. Decreases
C. Stays the same
D. Becomes unpredictable
Answer: A. Increases



182.
 True or False
It’s okay to follow closely behind emergency vehicles to get through traffic faster.
Answer: False



183.
 Multiple Choice
When is black ice most likely to form?
A. During sunny afternoons
B. Early morning or evening in cold weather
C. During heavy rain
D. On gravel roads
Answer: B. Early morning or evening in cold weather



184. 
True or False
You can park within 1 metre of a fire hydrant.
Answer: False (Minimum is 3 metres.)



185. 
Multiple Choice
The safest way to drive through a curve is to:
A. Brake while turning
B. Slow down before the curve and accelerate gently after
C. Maintain speed throughout
D. Swerve to adjust
Answer: B. Slow down before the curve and accelerate gently after



186. 
True or False
Flashing amber lights on a school bus mean it is preparing to stop.
Answer: True



187. 
Multiple Choice
If your windshield wipers fail during heavy rain, you should:
A. Pull over safely and stop
B. Continue driving slowly
C. Use your hazard lights and drive
D. Open the windows for visibility
Answer: A. Pull over safely and stop



188. 
True or False
You can be fined for having snow or ice on your roof that flies off and causes danger.
Answer: True



189.
 Multiple Choice
If a police officer directs you through a red light, you should:
A. Obey the traffic light
B. Follow the officer’s directions
C. Stop and wait
D. Signal for clarification
Answer: B. Follow the officer’s directions



190. 
True or False
You must always stop before turning right on a red light.
Answer: True



191. 
Multiple Choice
When driving in a lane marked with a diamond, it means:
A. High-occupancy vehicle lane
B. Bus-only lane
C. Bicycle lane
D. Passing lane
Answer: A. High-occupancy vehicle lane



192. 
True or False
You can stop on the shoulder of a highway for non-emergency reasons.
Answer: False



193.
 Multiple Choice
When approaching a construction zone, you must:
A. Obey all posted signs and flagpersons
B. Maintain normal speed if no workers are visible
C. Stop only if flagged down
D. Honk to alert workers
Answer: A. Obey all posted signs and flagpersons



194. 
True or False
A red X over a lane means the lane is closed.
Answer: True



195.
 Multiple Choice
When you see a “Slippery When Wet” sign, you should:
A. Speed up to clear the area
B. Slow down and avoid sudden turns or stops
C. Stop immediately
D. Turn on hazard lights
Answer: B. Slow down and avoid sudden turns or stops



196.
 True or False
It is legal to park in a bike lane if there is no sign prohibiting it.
Answer: False



197. 
Multiple Choice
When you hear a train whistle while approaching a crossing, you must:
A. Speed up to cross
B. Stop if safe to do so and wait
C. Ignore it if no train is visible
D. Honk to warn others
Answer: B. Stop if safe to do so and wait



198.
 True or False
In Ontario, snow tires are mandatory in the winter.
Answer: False



199. 
Multiple Choice
When approaching a hill where visibility is limited, you should:
A. Maintain normal speed
B. Keep to the right and reduce speed
C. Move to the centre of the road
D. Accelerate to clear the hill quickly
Answer: B. Keep to the right and reduce speed



200. 
True or False
Drivers must yield to transit buses signaling to leave a bus stop.
Answer: True



201.
 Multiple Choice
When approaching a flashing yellow pedestrian crossing light, you should:
A. Stop immediately
B. Slow down and yield to pedestrians
C. Drive through without slowing down
D. Honk to warn pedestrians
Answer: B. Slow down and yield to pedestrians



202. 
True or False
A driver can be fined for not clearing snow from their vehicle before driving.
Answer: True



203. 
Multiple Choice
What is the proper hand signal for a left turn?
A. Left arm extended straight out
B. Left arm bent upward at the elbow
C. Left arm bent downward at the elbow
D. Right arm extended straight out
Answer: A. Left arm extended straight out



204. 
True or False
If your vehicle breaks down on the highway, you should place warning flares or triangles well behind it.
Answer: True



205.
 Multiple Choice
When should you check your mirrors?
A. Before changing lanes
B. Before slowing down
C. Before stopping
D. All of the above
Answer: D. All of the above



206. 
True or False
Drivers can enter an intersection even if traffic ahead is stopped, as long as the light is green.
Answer: False



207. 
Multiple Choice
When driving down a steep hill, you should:
A. Coast in neutral to save fuel
B. Shift to a lower gear to maintain control
C. Use only your brakes
D. Turn off the engine
Answer: B. Shift to a lower gear to maintain control



208. 
True or False
Vehicles already in a roundabout have the right of way.
Answer: True



209.
 Multiple Choice
When approaching a flashing red light at a railway crossing, you must:
A. Stop and proceed only when the lights stop flashing
B. Drive through if no train is in sight
C. Slow down but don’t stop
D. Honk to alert others
Answer: A. Stop and proceed only when the lights stop flashing



210. 
True or False
You can turn left on a red light from a one-way street to another one-way street if no sign prohibits it.
Answer: True



211. 
Multiple Choice
If a traffic signal is not working, you should:
A. Treat the intersection as uncontrolled
B. Treat it as a four-way stop
C. Continue driving at normal speed
D. Honk to warn other drivers
Answer: B. Treat it as a four-way stop



212.
 True or False
Drivers must yield to public transit buses re-entering traffic from a bus bay.
Answer: True



213. 
Multiple Choice
What is the correct action when your vehicle begins to hydroplane?
A. Steer in the opposite direction of the skid
B. Ease off the accelerator and steer straight
C. Brake hard
D. Accelerate to regain control
Answer: B. Ease off the accelerator and steer straight



214.
 True or False
You may park within 1 metre of a fire hydrant.
Answer: False (Minimum is 3 metres.)



215. 
Multiple Choice
When approaching a school bus with its red lights flashing on a divided highway, you must:
A. Stop if you are behind the bus
B. Stop in both directions
C. Continue if you are on the opposite side of the median
D. Speed up to pass
Answer: A. Stop if you are behind the bus



216. 
True or False
Seat belts are not required for passengers in the back seat.
Answer: False



217.
 Multiple Choice
If you must drive in heavy fog, the safest action is to:
A. Use low beams and reduce speed
B. Use high beams for better visibility
C. Drive with hazard lights only
D. Speed up to clear the fog faster
Answer: A. Use low beams and reduce speed



218.
 True or False
It’s legal to drive with your high beams on within 150 metres of an oncoming vehicle.
Answer: False



219. 
Multiple Choice
When approaching an uncontrolled intersection, you must:
A. Yield to the vehicle on your right
B. Yield to the vehicle on your left
C. Stop regardless of traffic
D. Proceed without slowing down
Answer: A. Yield to the vehicle on your right



220. 
True or False
If a vehicle is stopped at a crosswalk, you may overtake it if no pedestrians are visible.
Answer: False



221. 
Multiple Choice
When driving at night, you should:
A. Look directly into oncoming headlights
B. Look slightly to the right edge of your lane
C. Use high beams at all times
D. Drive faster to get home quickly
Answer: B. Look slightly to the right edge of your lane



222. 
True or False
You can turn right on a red light in Ontario unless a sign prohibits it.
Answer: True



223. 
Multiple Choice
If your brakes fail, your first action should be to:
A. Pump the brake pedal
B. Accelerate
C. Turn off the engine
D. Honk continuously
Answer: A. Pump the brake pedal



224. 
True or False
It is safe to overtake on a hill with limited visibility.
Answer: False



225.
 Multiple Choice
When driving behind a motorcycle, you should keep a following distance of at least:
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



226. 
True or False
You must slow down when approaching a stopped emergency vehicle with flashing lights.
Answer: True



227. 
Multiple Choice
When passing a cyclist, you must leave at least:
A. 50 cm clearance
B. 1 metre clearance
C. 1.5 metres clearance
D. 2 metres clearance
Answer: B. 1 metre clearance



228. 
True or False
Reversing into a busy intersection is legal if traffic is clear.
Answer: False



229.
 Multiple Choice
When your view is obstructed at a railway crossing, you should stop no closer than:
A. 1 metre
B. 5 metres
C. 15 metres
D. 30 metres
Answer: C. 15 metres



230. 
True or False
A flashing amber light at an intersection means proceed with caution.
Answer: True



231. 
Multiple Choice
If your vehicle stalls in an intersection, you should:
A. Shift to neutral and restart when safe
B. Leave it and walk away
C. Push it without looking for traffic
D. Call for a tow immediately
Answer: A. Shift to neutral and restart when safe



232. 
True or False
You must always obey the instructions of a police officer over traffic signals.
Answer: True



233.
 Multiple Choice
When parking uphill without a curb, you should turn your wheels:
A. Toward the right
B. Toward the left
C. Straight ahead
D. It doesn’t matter
Answer: A. Toward the right



234. 
True or False
It is legal to stop in a live lane to let passengers out.
Answer: False



235. 
Multiple Choice
When approaching a red light with a green arrow, you may:
A. Turn in the direction of the arrow after yielding
B. Stop and wait for a full green light
C. Continue straight through
D. Make a U-turn
Answer: A. Turn in the direction of the arrow after yielding



236. 
True or False
All drivers must carry proof of insurance while driving.
Answer: True



237.
 Multiple Choice
When entering a freeway, you should:
A. Match the speed of traffic
B. Stop at the end of the ramp
C. Enter at a slower speed
D. Honk before merging
Answer: A. Match the speed of traffic



238.
 True or False
Bicyclists may ride in the centre of a lane when necessary for safety.
Answer: True



239. 
Multiple Choice
If your vehicle skids, you should:
A. Steer in the direction you want to go
B. Brake hard
C. Accelerate sharply
D. Turn sharply in the opposite direction
Answer: A. Steer in the direction you want to go



240. 
True or False
It is legal to park within 6 metres of an intersection.
Answer: False




241.
 Multiple Choice
When approaching a railway crossing without lights or gates, you should:
A. Slow down, look, and listen for trains before crossing
B. Drive through quickly
C. Honk and continue
D. Stop only if you see a train
Answer: A. Slow down, look, and listen for trains before crossing



242.
 True or False
It’s acceptable to stop in a bicycle lane to load or unload passengers.
Answer: False



243.
 Multiple Choice
When should you yield to a pedestrian?
A. At marked crosswalks
B. At unmarked crosswalks
C. When turning at an intersection
D. All of the above
Answer: D. All of the above



244.
 True or False
Drivers can be fined for splashing pedestrians with slush or water.
Answer: True



245.
 Multiple Choice
When your brakes fail, one of the first steps is to:
A. Shift to a lower gear
B. Turn off the engine immediately
C. Pump the brakes hard once
D. Accelerate to keep control
Answer: A. Shift to a lower gear



246.
 True or False
G1 drivers are allowed to drive on 400-series highways if accompanied by a licensed instructor.
Answer: True



247.
 Multiple Choice
When driving through a work zone, you should:
A. Follow posted speed limits and watch for workers
B. Drive at normal highway speeds
C. Pass other vehicles quickly
D. Ignore cones and barriers if no workers are present
Answer: A. Follow posted speed limits and watch for workers



248. 
True or False
It is legal to park in a crosswalk if no pedestrians are present.
Answer: False



249. 
Multiple Choice
When passing another vehicle at night, you should:
A. Switch to low beams before pulling in
B. Keep high beams on until you pass completely
C. Flash headlights while passing
D. Honk repeatedly
Answer: A. Switch to low beams before pulling in


250. 
True or False
When passing a horse-drawn vehicle, you should slow down and give it space.
Answer: True



251. 
Multiple Choice
If another driver is tailgating you, you should:
A. Brake hard to warn them
B. Move into another lane if safe
C. Speed up to get away
D. Ignore them completely
Answer: B. Move into another lane if safe



252.
 True or False
Cyclists are required to obey all traffic signs and signals.
Answer: True



253.
 Multiple Choice
When approaching a flashing green light in Ontario, you may:
A. Turn left, right, or go straight without waiting
B. Stop and wait for green
C. Turn left only
D. Drive straight only
Answer: A. Turn left, right, or go straight without waiting



254. 
True or False
You may pass a vehicle stopped at a crosswalk if there are no visible pedestrians.
Answer: False



255. 
Multiple Choice
What is the legal BAC for novice drivers in Ontario?
A. 0.00
B. 0.03
C. 0.05
D. 0.08
Answer: A. 0.00



256.
 True or False
You should check your blind spot before changing lanes.
Answer: True



257. 
Multiple Choice
When your tires lose contact with the road surface due to water, it’s called:
A. Skidding
B. Aquaplaning
C. Hydroplaning
D. Drifting
Answer: C. Hydroplaning



258.
 True or False
You can use the shoulder of the road to pass slower vehicles.
Answer: False



259. 
Multiple Choice
When driving behind a snow plow, you should:
A. Stay well back and be patient
B. Pass quickly on the right
C. Follow closely to stay in the cleared path
D. Honk to move them aside
Answer: A. Stay well back and be patient



260.
 True or False
In Ontario, you can make a right turn at a red light after stopping and yielding.
Answer: True



261. 
Multiple Choice
When approaching a hill crest with no visibility, you should:
A. Drive at normal speed
B. Stay to the right and reduce speed
C. Move to the left to pass
D. Accelerate quickly over the hill
Answer: B. Stay to the right and reduce speed



262. 
True or False
The driver of a vehicle is responsible for ensuring passengers under 16 wear seatbelts.
Answer: True



263. 
Multiple Choice
If your car starts to skid in a curve, you should:
A. Steer gently in the direction of the skid
B. Brake hard
C. Turn sharply opposite the skid
D. Accelerate
Answer: A. Steer gently in the direction of the skid



264.
 True or False
It’s legal to turn left from a one-way street onto another one-way street on a red light if no sign prohibits it.
Answer: True



265. 
Multiple Choice
When parking downhill with a curb, your wheels should be:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. It doesn’t matter
Answer: A. Toward the curb



266. 
True or False
It’s safe to drive the posted speed limit in all weather conditions.
Answer: False



267.
 Multiple Choice
What should you do if your vision is suddenly impaired by bright sunlight?
A. Close your eyes briefly
B. Use your sun visor and slow down
C. Speed up to clear the area quickly
D. Brake hard
Answer: B. Use your sun visor and slow down



268. 
True or False
Drivers must yield to blind pedestrians with a white cane or guide dog.
Answer: True



269.
 Multiple Choice
When approaching a vehicle stopped at a pedestrian crossover, you must:
A. Pass carefully
B. Stop and wait until pedestrians are clear
C. Honk to signal them to move
D. Drive around them on the shoulder
Answer: B. Stop and wait until pedestrians are clear



270. 
True or False
It’s legal to use a handheld GPS while driving.
Answer: False



271. 
Multiple Choice
When driving in fog, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Turn off headlights
D. Drive without lights for better vision
Answer: A. Use low-beam headlights



272.
 True or False
You must obey instructions from a crossing guard.
Answer: True



273.
 Multiple Choice
If a police officer signals you to pull over, you should:
A. Stop in the nearest safe location
B. Stop immediately in your lane
C. Speed up to find a better location
D. Ignore them if you’ve done nothing wrong
Answer: A. Stop in the nearest safe location



274. 
True or False
It’s legal to block a fire station driveway if it’s only for a few minutes.
Answer: False



275.
 Multiple Choice
When merging into traffic from a private driveway, you must:
A. Yield to all vehicles and pedestrians
B. Enter quickly without stopping
C. Honk before entering
D. Drive into the nearest lane regardless of traffic
Answer: A. Yield to all vehicles and pedestrians



276. 
True or False
You may stop on the highway shoulder for non-emergency reasons.
Answer: False



277. 
Multiple Choice
When approaching a railway crossing with no signals, you should:
A. Slow down, look both ways, and cross only when safe
B. Speed up to pass quickly
C. Honk before crossing
D. Stop only if another car stops
Answer: A. Slow down, look both ways, and cross only when safe



278.
 True or False
You must stop for a stopped school bus with flashing red lights in both directions on all roads except divided highways.
Answer: True



279. 
Multiple Choice
When following a vehicle at night, you should:
A. Use low-beam headlights
B. Use high-beam headlights
C. Turn off headlights
D. Flash headlights repeatedly
Answer: A. Use low-beam headlights



280.
 True or False
Drivers must yield to trains at railway crossings.
Answer: True



281.
 Multiple Choice
What should you do if your car starts to fishtail on ice?
A. Steer gently in the direction you want to go
B. Brake sharply
C. Accelerate
D. Turn the wheel opposite the skid
Answer: A. Steer gently in the direction you want to go



282. 
True or False
You may drive in the left lane of a multi-lane highway indefinitely even if not passing.
Answer: False



283. 
Multiple Choice
When approaching a flashing amber light, you should:
A. Stop before proceeding
B. Slow down and proceed with caution
C. Drive through at normal speed
D. Honk before entering
Answer: B. Slow down and proceed with caution



284. 
True or False
Cyclists must use hand signals when turning or stopping.
Answer: True



285. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights on a multi-lane road, you should:
A. Move over to another lane if possible
B. Maintain your speed
C. Pass quickly without moving lanes
D. Honk to alert them
Answer: A. Move over to another lane if possible



286. 
True or False
You must reduce speed in a school zone even during weekends.
Answer: False (Only during posted times.)



287.
 Multiple Choice
When turning left at an intersection, you must yield to:
A. Oncoming vehicles going straight
B. Pedestrians
C. Cyclists
D. All of the above
Answer: D. All of the above



288. 
True or False
Drivers must stop at railway crossings when red lights are flashing.
Answer: True



289.
 Multiple Choice
What is the minimum following distance in ideal conditions?
A. 1 second
B. 2 seconds
C. 3 seconds
D. 4 seconds
Answer: C. 3 seconds



290.
 True or False
It’s legal to exceed the speed limit when passing another vehicle.
Answer: False



291.
 Multiple Choice
When approaching a vehicle with hazard lights on, you should:
A. Slow down and be prepared to stop
B. Speed up to pass
C. Ignore and continue
D. Honk to warn
Answer: A. Slow down and be prepared to stop



292. 
True or False
Pedestrians always have the right of way at intersections.
Answer: True



293. 
Multiple Choice
When driving near a playground, you should:
A. Follow the posted speed limit
B. Be prepared for sudden stops
C. Watch for children
D. All of the above
Answer: D. All of the above



294. 
True or False
Drivers must carry their driver’s licence at all times when operating a vehicle.
Answer: True



295. 
Multiple Choice
If your engine stalls while driving, you should:
A. Shift to neutral and try restarting
B. Brake hard
C. Turn off ignition and coast
D. Exit the vehicle immediately
Answer: A. Shift to neutral and try restarting



296.
 True or False
G1 drivers may drive alone during daylight hours.
Answer: False



297. 
Multiple Choice
When approaching an intersection with no signs or signals, you should:
A. Yield to vehicles on the right
B. Yield to vehicles on the left
C. Stop regardless of traffic
D. Continue without slowing down
Answer: A. Yield to vehicles on the right



298. 
True or False
Drivers must use headlights from half an hour before sunset to half an hour after sunrise.
Answer: True



299. 
Multiple Choice
If a driver refuses to take a breath test, they may face:
A. Licence suspension
B. Fines
C. Jail time
D. All of the above
Answer: D. All of the above



300.
 True or False
It’s legal to leave your car unlocked while fueling if you’re nearby.
Answer: False



301.
 Multiple Choice
If you are approaching an intersection and the light turns yellow, the safest action is to:
A. Stop if you can do so safely
B. Accelerate quickly to beat the red
C. Slow down and wait for green
D. Turn into the nearest driveway
Answer: A. Stop if you can do so safely



302. 
True or False
A flashing red light at an intersection is treated the same as a stop sign.
Answer: True



303. 
Multiple Choice
When a school bus has its amber lights flashing, it means:
A. You may pass with caution
B. The bus is about to stop to pick up or drop off children
C. The bus is turning
D. The bus is reversing
Answer: B. The bus is about to stop to pick up or drop off children



304. 
True or False
You can enter a blocked intersection if your light is green as long as you move slowly.
Answer: False



305.
 Multiple Choice
If your car’s brakes feel soft while driving, you should:
A. Pump the brake pedal to restore pressure
B. Drive faster to clear traffic
C. Stop using the brakes
D. Turn off your engine
Answer: A. Pump the brake pedal to restore pressure



306.
 True or False
It’s legal to use a handheld phone at a red light if your vehicle is stopped.
Answer: False



307. 
Multiple Choice
When you see a yield sign, you should:
A. Slow down and be prepared to stop if needed
B. Stop every time before entering
C. Continue without checking
D. Accelerate to merge
Answer: A. Slow down and be prepared to stop if needed



308.
 True or False
In Ontario, you must signal at least 30 metres before making a turn.
Answer: True



309. 
Multiple Choice
If another vehicle is trying to merge into your lane, you should:
A. Maintain your speed and ignore them
B. Adjust your speed or change lanes to make room
C. Honk until they slow down
D. Race ahead to block them
Answer: B. Adjust your speed or change lanes to make room



310.
 True or False
Backing up is allowed on a highway if traffic is clear.
Answer: False



311. 
Multiple Choice
If you hear an emergency siren but can’t see the vehicle, you should:
A. Keep driving normally
B. Slow down, check mirrors, and be prepared to pull over
C. Stop immediately in your lane
D. Accelerate to get away from it
Answer: B. Slow down, check mirrors, and be prepared to pull over



312. 
True or False
G1 drivers must have zero alcohol in their system when driving.
Answer: True



313. 
Multiple Choice
If your steering wheel suddenly locks while driving, you should:
A. Pull over safely and stop
B. Force the wheel to turn
C. Accelerate to straighten it
D. Honk for assistance
Answer: A. Pull over safely and stop



314.
 True or False
You can park on the side of a freeway for a short phone call.
Answer: False



315.
 Multiple Choice
When driving on a wet road, stopping distance can:
A. Be reduced by half
B. Double or more
C. Stay the same as dry roads
D. Not be affected
Answer: B. Double or more



316. 
True or False
A green arrow traffic light allows you to turn in the arrow’s direction without yielding.
Answer: False (You must still yield to pedestrians and other vehicles in your path.)



317. 
Multiple Choice
If your car begins to overheat, one temporary action is to:
A. Turn on the heater to draw heat from the engine
B. Turn off the heater and AC
C. Drive faster to cool the engine
D. Add cold water immediately
Answer: A. Turn on the heater to draw heat from the engine



318. 
True or False
Flashing blue lights are used by police in Ontario.
Answer: False (They’re used by snow removal vehicles.)



319.
 Multiple Choice
When driving down a steep slope, you should:
A. Shift to a lower gear to maintain control
B. Coast in neutral to save fuel
C. Brake continuously
D. Turn off the engine
Answer: A. Shift to a lower gear to maintain control



320.
 True or False
It’s legal to pass on the right if the lane is wide enough and safe.
Answer: True



321. 
Multiple Choice
If a vehicle ahead signals to turn left, you may:
A. Pass on the right if there is space and it’s safe
B. Drive into oncoming traffic to pass
C. Stop and wait until they turn
D. Accelerate past on the left
Answer: A. Pass on the right if there is space and it’s safe



322. 
True or False
You may leave your parked vehicle unlocked if you are in a safe neighbourhood.
Answer: False



323. 
Multiple Choice
If your vision is blocked by a large vehicle ahead, you should:
A. Follow closely to see around it
B. Increase following distance for a better view
C. Move into oncoming traffic to check
D. Honk to make it move
Answer: B. Increase following distance for a better view



324.
 True or False
G1 drivers may drive without supervision on quiet country roads.
Answer: False



325.
 Multiple Choice
If you are approaching a stopped streetcar with doors open, you must:
A. Stop at least 2 metres behind the rear doors
B. Pass quickly before passengers cross
C. Honk to clear the way
D. Wait only for passengers on your side
Answer: A. Stop at least 2 metres behind the rear doors



326.
 True or False
Drivers must always carry proof of insurance while operating a vehicle.
Answer: True



327. 
Multiple Choice
If your tires lose traction on ice, you should:
A. Steer gently in the direction you want to go
B. Brake hard immediately
C. Accelerate sharply
D. Turn the wheel sharply in the opposite direction
Answer: A. Steer gently in the direction you want to go



328. 
True or False
In Ontario, the left lane on highways is intended mainly for passing.
Answer: True



329.
 Multiple Choice
When approaching a railway crossing with lowered gates, you should:
A. Stop and wait until the gates are fully raised
B. Drive around the gates
C. Cross if no train is in sight
D. Honk before proceeding
Answer: A. Stop and wait until the gates are fully raised



330. 
True or False
It’s safe to drive with a cracked windshield as long as you can see.
Answer: False



331. 
Multiple Choice
If your headlights fail while driving at night, you should:
A. Turn on hazard lights and pull over safely
B. Continue slowly without lights
C. Use your phone flashlight to see
D. Drive with high beams only
Answer: A. Turn on hazard lights and pull over safely



332. 
True or False
A G1 driver may drive between midnight and 5 a.m. if with a fully licensed driver.
Answer: True



333.
 Multiple Choice
If your steering feels loose, you should:
A. Slow down and get the vehicle checked immediately
B. Drive faster to maintain control
C. Ignore it until the next service
D. Turn the wheel sharply to test it
Answer: A. Slow down and get the vehicle checked immediately



334. 
True or False
You may use the shoulder of the road to pass if traffic is heavy.
Answer: False



335.
 Multiple Choice
When approaching a four-way stop at the same time as another driver to your right, you should:
A. Let them go first
B. Go first
C. Wave them to wait
D. Accelerate ahead of them
Answer: A. Let them go first



336.
 True or False
Driving without insurance can lead to vehicle impoundment in Ontario.
Answer: True



337. 
Multiple Choice
When your vehicle skids on water, you should:
A. Ease off the accelerator and steer straight
B. Brake sharply
C. Accelerate to regain grip
D. Steer in random directions
Answer: A. Ease off the accelerator and steer straight



338. 
True or False
If a collision involves only minor damage, you can leave the scene without exchanging information.
Answer: False



339. 
Multiple Choice
When entering a highway from an on-ramp, you should:
A. Match the speed of traffic and merge smoothly
B. Stop before merging
C. Merge at a very low speed
D. Honk before entering
Answer: A. Match the speed of traffic and merge smoothly



340. 
True or False
If a traffic light is out, you must treat the intersection as a four-way stop.
Answer: True



341. 
Multiple Choice
When driving in heavy rain, you should:
A. Use low-beam headlights and slow down
B. Use high-beam headlights
C. Drive faster to clear the area
D. Turn off your lights to reduce glare
Answer: A. Use low-beam headlights and slow down



342. 
True or False
A driver must stop before a crosswalk, even if no pedestrians are crossing, if directed by a police officer.
Answer: True



343. 
Multiple Choice
If you must stop on a rural road at night, you should:
A. Leave headlights on low beam and use hazard lights
B. Turn off all lights
C. Stand in the roadway to warn others
D. Stop without signaling
Answer: A. Leave headlights on low beam and use hazard lights



344.
 True or False
It’s acceptable to drive with a severely worn tire as long as it holds air.
Answer: False



345.
 Multiple Choice
When another driver is merging onto a highway, you should:
A. Adjust your speed or move over to let them in
B. Maintain speed and expect them to stop
C. Honk and stay in your lane
D. Speed up to pass them
Answer: A. Adjust your speed or move over to let them in



346.
 True or False
All drivers must yield to pedestrians at marked and unmarked crossings.
Answer: True



347. 
Multiple Choice
If your vehicle starts to skid in snow, the first thing you should do is:
A. Ease off the accelerator
B. Slam the brakes
C. Steer sharply in the opposite direction
D. Honk continuously
Answer: A. Ease off the accelerator



348. 
True or False
You may drive through a school zone at posted speed even during posted hours if no children are visible.
Answer: False



349.
 Multiple Choice
When parking on a hill with a curb and facing uphill, you should:
A. Turn your wheels away from the curb
B. Turn your wheels toward the curb
C. Keep wheels straight
D. It doesn’t matter
Answer: A. Turn your wheels away from the curb



350. 
True or False
The fine for not stopping for a school bus is the same for first and repeat offences.
Answer: False



351. 
Multiple Choice
If another driver is aggressively tailgating, you should:
A. Allow them to pass when safe
B. Speed up to get away
C. Brake suddenly to warn them
D. Yell at them through the window
Answer: A. Allow them to pass when safe



352. 
True or False
It’s safe to use cruise control on icy roads.
Answer: False



353. 
Multiple Choice
If you are approaching a railroad crossing with a stop sign, you must:
A. Stop, look both ways, and proceed when safe
B. Slow down and cross without stopping
C. Wait only if a train is visible
D. Honk to warn others
Answer: A. Stop, look both ways, and proceed when safe



354. 
True or False
Driving without functioning brake lights can lead to a ticket.
Answer: True



355.
 Multiple Choice
If your car begins to fishtail, you should:
A. Steer in the direction you want the front wheels to go
B. Steer in the opposite direction
C. Brake sharply
D. Speed up
Answer: A. Steer in the direction you want the front wheels to go



356. 
True or False
Vehicles already inside a traffic circle have the right of way.
Answer: True



357. 
Multiple Choice
When entering a freeway from an acceleration lane, you should:
A. Match the speed of traffic before merging
B. Stop at the end of the ramp
C. Merge at half the speed of traffic
D. Honk to signal entry
Answer: A. Match the speed of traffic before merging



358. 
True or False
Using a handheld device while driving is only illegal for G1 drivers.
Answer: False



359.
 Multiple Choice
If your windshield fogs up while driving, you should:
A. Turn on the defroster or air conditioner
B. Open the window and speed up
C. Wipe it with your hand while driving
D. Ignore it until it clears naturally
Answer: A. Turn on the defroster or air conditioner



360. 
True or False
The two-second rule is the minimum safe following distance in good conditions.
Answer: False (Three seconds is safer in Ontario.)



361.
 Multiple Choice
When passing another vehicle, you should return to your lane:
A. When you can see their headlights in your mirror
B. Immediately after overtaking
C. When they honk
D. Only after slowing down
Answer: A. When you can see their headlights in your mirror



362.
 True or False
Drivers must always stop at railway crossings if they see a “Stop” sign, even if no train is coming.
Answer: True



363. 
Multiple Choice
If your brakes fail, you should:
A. Shift to a lower gear and apply the parking brake gradually
B. Accelerate to regain control
C. Turn off your ignition at once
D. Steer into oncoming traffic to stop
Answer: A. Shift to a lower gear and apply the parking brake gradually



364. 
True or False
Cyclists must ride on the sidewalk unless there’s a bike lane.
Answer: False



365.
 Multiple Choice
When your vehicle starts hydroplaning, you should:
A. Ease off the accelerator and keep steering straight
B. Brake heavily
C. Turn sharply to the right
D. Increase speed to regain control
Answer: A. Ease off the accelerator and keep steering straight



366.
 True or False
A driver can be fined for throwing garbage out of a vehicle window.
Answer: True



367. 
Multiple Choice
When approaching a hill with no visibility ahead, you should:
A. Keep to the right and slow down
B. Drive in the middle of the road
C. Speed up to get over quickly
D. Sound the horn continuously
Answer: A. Keep to the right and slow down



368. 
True or False
Backing up across a crosswalk is allowed if no pedestrians are there.
Answer: False



369. 
Multiple Choice
When driving at night on a rural road, you should:
A. Use high beams when no other vehicles are near
B. Use only parking lights
C. Drive without lights for better visibility
D. Use hazard lights continuously
Answer: A. Use high beams when no other vehicles are near



370. 
True or False
In Ontario, studded tires are allowed in all regions year-round.
Answer: False



371. 
Multiple Choice
If your vehicle begins to slide on ice, your first action should be:
A. Take your foot off the accelerator
B. Slam on the brakes
C. Steer in the opposite direction
D. Honk loudly
Answer: A. Take your foot off the accelerator 



372.
 True or False
When turning left at an intersection, you must yield to oncoming traffic going straight.
Answer: True



373. 
Multiple Choice
If you approach a stopped emergency vehicle with flashing lights, you must:
A. Slow down and move over if possible
B. Maintain your speed
C. Pass closely
D. Honk to alert them
Answer: A. Slow down and move over if possible



374. 
True or False
The “Move Over” law applies only to police vehicles.
Answer: False



375.
 Multiple Choice
When merging from a ramp into highway traffic, you should:
A. Use your mirrors, signal, check blind spots, and match speed
B. Stop before merging
C. Merge at low speed
D. Honk to signal others
Answer: A. Use your mirrors, signal, check blind spots, and match speed



376. 
True or False
You may use a handheld GPS while driving if it’s for navigation.
Answer: False



377. 
Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Stop and yield
B. Pass quickly
C. Honk to alert them
D. Drive around slowly
Answer: A. Stop and yield



378.
 True or False
Pedestrians with guide dogs must be given the right of way.
Answer: True



379.
 Multiple Choice
If you see animals crossing the road, you should:
A. Slow down and be prepared to stop
B. Accelerate past them quickly
C. Honk to scare them
D. Drive through without slowing
Answer: A. Slow down and be prepared to stop



380. 
True or False
Driving too slowly on a highway can be as dangerous as speeding.
Answer: True



381.
 Multiple Choice
When changing lanes, you must:
A. Check mirrors, signal, check blind spot, then move
B. Move immediately after signaling
C. Change lanes without signaling if clear
D. Rely only on mirrors
Answer: A. Check mirrors, signal, check blind spot, then move



382. 
True or False
It’s legal to leave your vehicle unlocked if you’re only gone for a minute.
Answer: False



383.
 Multiple Choice
If your vehicle gets stuck on railway tracks and a train is coming, you should:
A. Leave the vehicle and move away at a 45-degree angle toward the train’s direction
B. Try to push the car off
C. Stay inside until the last second
D. Wave to alert the train driver only
Answer: A. Leave the vehicle and move away at a 45-degree angle toward the train’s direction



384.
 True or False
Cyclists have the same rights and duties as drivers in Ontario.
Answer: True



385. 
Multiple Choice
When turning right at a red light, you must:
A. Come to a complete stop and yield to others first
B. Slow down and turn if clear
C. Turn without stopping if no cars are coming
D. Ignore pedestrians if light is green for you
Answer: A. Come to a complete stop and yield to others first



386. 
True or False
Seat belts are optional for adults in the back seat.
Answer: False



387.
 Multiple Choice
When approaching a steep hill where you can’t see ahead, you should:
A. Stay to the right and reduce speed
B. Drive down the middle
C. Speed up to get over it quickly
D. Move to the left lane
Answer: A. Stay to the right and reduce speed



388.
 True or False
A driver can be fined for blocking an intersection.
Answer: True



389. 
Multiple Choice
If your engine stalls in traffic, you should:
A. Signal, steer to the side, and try restarting
B. Stay in your lane until help comes
C. Turn off ignition and block the lane
D. Exit the vehicle immediately
Answer: A. Signal, steer to the side, and try restarting



390. 
True or False
Motorcycles are allowed to use a full lane.
Answer: True



391.
 Multiple Choice
When following another car on a gravel road, you should:
A. Increase following distance to reduce dust and damage
B. Follow closely to avoid dust
C. Pass immediately
D. Flash lights to signal passing
Answer: A. Increase following distance to reduce dust and damage



392. 
True or False
You may park within 3 metres of a fire hydrant.
Answer: False



393. 
Multiple Choice
If your vehicle begins to oversteer in a turn, you should:
A. Steer gently toward where you want to go
B. Brake suddenly
C. Steer away from the skid
D. Accelerate sharply
Answer: A. Steer gently toward where you want to go



394. 
True or False
Drivers must stop at all red flashing railway signals.
Answer: True



395.
 Multiple Choice
When driving behind a bus in wet weather, you should:
A. Increase following distance to avoid spray
B. Follow closely to pass quickly
C. Move into the opposite lane
D. Honk to alert the driver
Answer: A. Increase following distance to avoid spray



396.
 True or False
You can exceed the speed limit when overtaking if safe.
Answer: False



397. 
Multiple Choice
When approaching a curve, you should:
A. Reduce speed before entering
B. Brake while in the curve
C. Accelerate hard into the turn
D. Stay in the middle of the road
Answer: A. Reduce speed before entering



398. 
True or False
You must yield to vehicles already in a roundabout.
Answer: True



399.
 Multiple Choice
If a tire blows out, your first reaction should be:
A. Hold the steering wheel firmly and steer straight
B. Brake hard immediately
C. Accelerate
D. Turn sharply to the side of the road
Answer: A. Hold the steering wheel firmly and steer straight



400.
 True or False
It’s legal to leave your vehicle running unattended if locked.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Ontario.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Ontario.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $ontario->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Ontario citizenship questions.");
    }
}

