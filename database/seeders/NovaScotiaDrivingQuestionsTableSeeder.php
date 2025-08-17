<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrivingQuestion; // Assuming your model is named 'Question'
use App\Models\DrivingSection; // Assuming your model for sections is 'CourseSection'
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NovaScotiaDrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find or create the 'Nunavut' CourseSection
        $novaScotia = DrivingSection::firstOrCreate(
            ['title' => 'Nova Scotia'],
            [
                'type' => 'province',
                'capital' => 'Halifax',
                'flag' => '/images/flags/nova-scotia.png',
                'description' => 'Nova Scotia Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_rules_road.mp3'
            ]
        );

        // 2. Clear existing Ontario questions to prevent duplicates on re-seed
        $novaScotia->questions()->delete();

        // 3. The raw text containing all 400 Ontario citizenship questions and answers
        $questionsText = <<<EOT
1.
 Multiple Choice
What is the minimum age to apply for a Class 7 learner’s licence in Nova Scotia?
A. 15
B. 16
C. 17
D. 18
Answer: B. 16



2. 
True or False
In Nova Scotia, a supervising driver must have at least 2 years of driving experience.
Answer: True



3.
 Multiple Choice
When stopping at a stop sign, you must:
A. Slow down and proceed if the road is clear
B. Stop completely before the stop line or crosswalk
C. Honk and drive through quickly
D. Only stop if another vehicle is approaching
Answer: B. Stop completely before the stop line or crosswalk



4.
 True or False
Learner drivers in Nova Scotia are permitted to drive alone on quiet rural roads.
Answer: False



5. 
Multiple Choice
The maximum speed limit in most urban areas in Nova Scotia is:
A. 40 km/h
B. 50 km/h
C. 60 km/h
D. 70 km/h
Answer: B. 50 km/h



6. 
True or False
Seat belts are only required when driving on highways.
Answer: False



7. 
Multiple Choice
When approaching a pedestrian crosswalk without signals, you must:
A. Slow down but proceed if no one is crossing
B. Stop only if a police officer is present
C. Yield to pedestrians
D. Honk to warn pedestrians to hurry
Answer: C. Yield to pedestrians



8. 
True or False
It is legal to park within 5 metres of a fire hydrant in Nova Scotia.
Answer: False



9. 
Multiple Choice
If your vehicle drifts off the road, you should:
A. Ease off the accelerator, steer back gently when safe
B. Steer sharply back onto the road
C. Brake hard and stop immediately
D. Accelerate back onto the pavement
Answer: A. Ease off the accelerator, steer back gently when safe



10.
 True or False
You may turn right on a red light in Nova Scotia unless a sign says otherwise.
Answer: True



11.
 Multiple Choice
When following another vehicle, you should keep at least:
A. 1 second gap
B. 2 seconds gap
C. 3 seconds gap
D. 4 seconds gap
Answer: C. 3 seconds gap



12.
 True or False
Bicycles have the same rights and responsibilities as other vehicles on the road.
Answer: True



13. 
Multiple Choice
If your vehicle starts to skid, you should:
A. Brake hard immediately
B. Steer gently in the direction you want to go
C. Accelerate to regain traction
D. Turn sharply in the opposite direction
Answer: B. Steer gently in the direction you want to go



14.
 True or False
Driving with one headlight out is legal if it is daytime.
Answer: False



15.
 Multiple Choice
When approaching a school bus with flashing red lights, you must:
A. Slow down but keep going
B. Stop at least 6 metres away
C. Pass quickly before children cross
D. Honk to warn children
Answer: B. Stop at least 6 metres away



16. 
True or False
Learner drivers may use handheld mobile phones if they are stopped at a light.
Answer: False



17. 
Multiple Choice
If an emergency vehicle is approaching with lights and sirens, you must:
A. Pull over to the right and stop
B. Speed up to clear the way
C. Continue driving at the same speed
D. Stop only if in the same lane
Answer: A. Pull over to the right and stop



18. 
True or False
It is illegal to pass another vehicle on a solid double line.
Answer: True



19.
 Multiple Choice
When approaching a yield sign, you must:
A. Slow down and give way to traffic if necessary
B. Stop every time
C. Accelerate to enter before other vehicles
D. Ignore if no traffic is visible
Answer: A. Slow down and give way to traffic if necessary



20. 
True or False
Using cruise control on icy roads is recommended for stability.
Answer: False



21. 
Multiple Choice
When parking downhill with a curb, turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. Any direction
Answer: A. Toward the curb



22.
 True or False
You may exceed the speed limit when overtaking on a two-lane road.
Answer: False



23. 
Multiple Choice
When entering a roundabout, you should:
A. Yield to vehicles already in the roundabout
B. Enter without slowing down
C. Stop completely before entering
D. Use your horn to signal entry
Answer: A. Yield to vehicles already in the roundabout



24.
 True or False
Drivers must dim high beams within 150 metres of oncoming vehicles.
Answer: True



25.
 Multiple Choice
When stopping behind another vehicle on a hill, you should:
A. Leave enough space to see the rear tires of the car in front
B. Stop as close as possible to prevent others from cutting in
C. Keep the parking brake off
D. Rely only on foot brakes
Answer: A. Leave enough space to see the rear tires of the car in front



26.
 True or False
It is legal to back up on a highway to reach a missed exit.
Answer: False



27. 
Multiple Choice
When passing a cyclist, allow at least:
A. 1 metre of space
B. 2 metres of space
C. 0.5 metre of space
D. Any distance as long as you slow down
Answer: B. 2 metres of space



28. 
True or False
Animals are more likely to cross roads at dawn and dusk.
Answer: True



29. 
Multiple Choice
If your vehicle hydroplanes, you should:
A. Ease off the accelerator and steer gently
B. Brake hard immediately
C. Steer sharply to regain control
D. Accelerate to maintain grip
Answer: A. Ease off the accelerator and steer gently



30. 
True or False
Parking on a sidewalk is permitted if it is for a short time.
Answer: False



31. 
Multiple Choice
When approaching a railway crossing with no gates, you must:
A. Slow down and look both ways
B. Stop only if a train is visible
C. Honk before crossing
D. Speed up to clear the tracks
Answer: A. Slow down and look both ways



32. 
True or False
It is legal to drive without insurance in Nova Scotia if your vehicle is rarely used.
Answer: False



33. 
Multiple Choice
When driving on a rural road with no streetlights at night, you should:
A. Use high beams when safe and dim for oncoming traffic
B. Keep low beams on at all times
C. Drive with parking lights only
D. Avoid using headlights to see wildlife better
Answer: A. Use high beams when safe and dim for oncoming traffic



34.
 True or False
Drivers must always carry their licence when operating a vehicle.
Answer: True



35.
 Multiple Choice
When parking uphill with a curb, turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. Any direction
Answer: A. Away from the curb



36. 
True or False
It is acceptable to coast downhill in neutral to save fuel.
Answer: False



37.
 Multiple Choice
When approaching a flashing amber light, you should:
A. Slow down and proceed with caution
B. Stop completely
C. Drive through at normal speed
D. Turn on hazard lights
Answer: A. Slow down and proceed with caution



38. 
True or False
Motorcycles require the same following distance as cars.
Answer: False



39.
 Multiple Choice
When stopped at a railway crossing, you must stay at least:
A. 2 metres from the nearest rail
B. 3 metres from the nearest rail
C. 5 metres from the nearest rail
D. 10 metres from the nearest rail
Answer: C. 5 metres from the nearest rail



40. 
True or False
You must yield to pedestrians even if they cross without using a crosswalk.
Answer: True



41. 
Multiple Choice
If you see an animal on the road, you should:
A. Slow down and prepare to stop
B. Swerve immediately into the other lane
C. Honk and accelerate
D. Ignore it if it is small
Answer: A. Slow down and prepare to stop



42.
 True or False
In Nova Scotia, winter tires are required by law from December to March.
Answer: False



43.
 Multiple Choice
When approaching a hillcrest on a narrow road, you should:
A. Stay in your lane and reduce speed
B. Drive in the middle for better visibility
C. Accelerate to maintain speed
D. Pass slower vehicles before the crest
Answer: A. Stay in your lane and reduce speed



44. 

True or False
Distracted driving can result in licence suspension.
Answer: True


45.
 Multiple Choice
If you must stop on the highway, you should:
A. Pull as far off the road as possible and turn on hazard lights
B. Stop in the lane with hazard lights on
C. Exit the vehicle immediately without checking traffic
D. Place warning triangles only if police are present
Answer: A. Pull as far off the road as possible and turn on hazard lights



46. 
True or False
You can be fined for unnecessarily honking your horn.
Answer: True



47. 
Multiple Choice
When approaching a narrow bridge, you should:
A. Yield to oncoming traffic if required
B. Speed up to cross first
C. Stop only if a stop sign is present
D. Use high beams to alert others
Answer: A. Yield to oncoming traffic if required



48. 
True or False
Hydroplaning can occur at speeds as low as 50 km/h on wet roads.
Answer: True



49. 
Multiple Choice
When passing another vehicle, you should return to your lane when:
A. You can see the entire front of the passed vehicle in your mirror
B. You are halfway past the other vehicle
C. You feel it is safe without checking mirrors
D. The other driver honks to signal you
Answer: A. You can see the entire front of the passed vehicle in your mirror



50.
 True or False
It is legal to drive barefoot in Nova Scotia.
Answer: True

51. 
Multiple Choice
When approaching a flashing red light at an intersection, you must:
A. Slow down and proceed
B. Stop completely and proceed when safe
C. Drive through if no one is coming
D. Honk and continue
Answer: B. Stop completely and proceed when safe



52.
 True or False
In Nova Scotia, the speed limit in school zones is always 30 km/h.
Answer: False



53. 
Multiple Choice
If your rear wheels skid, you should:
A. Steer in the opposite direction of the skid
B. Steer in the same direction as the skid
C. Brake hard immediately
D. Accelerate quickly
Answer: B. Steer in the same direction as the skid



54.
 True or False
Driving without valid insurance is a criminal offence in Nova Scotia.
Answer: False (It’s a serious traffic offence with heavy penalties, but not criminal.)



55.
 Multiple Choice
When driving through a flooded area, you should:
A. Drive slowly to avoid engine damage
B. Speed through to avoid stalling
C. Stop in the water to check depth
D. Reverse out quickly
Answer: A. Drive slowly to avoid engine damage



56.
 True or False
It is legal to pass a stopped school bus if its red lights are flashing but no children are visible.
Answer: False



57. 
Multiple Choice
When turning left at an intersection with no signals, you must:
A. Yield to oncoming traffic
B. Turn quickly before other vehicles approach
C. Stop in the intersection until it’s clear
D. Honk to signal your turn
Answer: A. Yield to oncoming traffic



58. 
True or False
If you are in a funeral procession, you must obey all normal traffic signals.
Answer: False (Processions may have special right-of-way under certain conditions.)



59.
 Multiple Choice
When parallel parking, your vehicle should be within:
A. 10 cm from the curb
B. 15 cm from the curb
C. 30 cm from the curb
D. 50 cm from the curb
Answer: C. 30 cm from the curb



60.
 True or False
Cyclists are not required to signal turns.
Answer: False



61.
 Multiple Choice
When driving downhill on a long slope, you should:
A. Shift to a lower gear
B. Keep the vehicle in neutral
C. Turn off the engine to save fuel
D. Use only the brakes
Answer: A. Shift to a lower gear



62. 
True or False
Vehicles already in a roundabout have the right-of-way over those entering.
Answer: True



63.
 Multiple Choice
When parking on a rural road without a curb, park:
A. On the right side facing oncoming traffic
B. On the right side facing the same direction as traffic
C. On either side of the road
D. In the middle of the road
Answer: B. On the right side facing the same direction as traffic



64. 
True or False
You must always stop at a railway crossing if you are carrying passengers.
Answer: False



65.
 Multiple Choice
In foggy conditions, you should:
A. Use low beam headlights
B. Use high beams for better visibility
C. Turn off headlights to reduce glare
D. Drive with hazard lights only
Answer: A. Use low beam headlights



66. 
True or False
It is legal to drive with headphones covering both ears.
Answer: False



67.
 Multiple Choice
When approaching a yield sign on a highway ramp, you must:
A. Speed up to merge before other vehicles
B. Slow down and merge only when safe
C. Stop and wait for all traffic to pass
D. Honk before merging
Answer: B. Slow down and merge only when safe



68. 
True or False
The “two-second rule” is used to determine a safe following distance.
Answer: True



69. 
Multiple Choice
When a tire blows out, your first action should be:
A. Steer firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply off the road
D. Shift to neutral
Answer: A. Steer firmly and slow down gradually



70. 
True or False
You may cross a solid yellow line to overtake a slow-moving bicycle if it’s safe.
Answer: True



71. 
Multiple Choice
When a traffic light turns yellow as you approach, you should:
A. Speed up to clear the intersection
B. Stop if it is safe to do so
C. Continue without slowing
D. Honk to warn other drivers
Answer: B. Stop if it is safe to do so



72. 
True or False
Pedestrians always have the right-of-way, even when crossing illegally.
Answer: False



73. 
Multiple Choice
When reversing, you should:
A. Look over your right shoulder and check mirrors
B. Only use your mirrors
C. Reverse quickly to reduce time in reverse
D. Ask passengers to guide you instead of looking
Answer: A. Look over your right shoulder and check mirrors



74.
 True or False
Motorcyclists may use the full lane just like a car.
Answer: True



75. 
Multiple Choice
In heavy rain, the risk of hydroplaning increases at speeds above:
A. 30 km/h
B. 50 km/h
C. 70 km/h
D. 90 km/h
Answer: B. 50 km/h



76.
 True or False
When passing another vehicle, you must return to your lane before coming within 30 metres of oncoming traffic.
Answer: True



77. 
Multiple Choice
When approaching a construction zone, you should:
A. Reduce speed and follow directions
B. Ignore flaggers if no workers are visible
C. Drive quickly to get through
D. Use high beams to warn workers
Answer: A. Reduce speed and follow directions



78. 
True or False
A flashing green light at an intersection means you may proceed and turn left when safe.
Answer: True



79. 
Multiple Choice
When driving through an uncontrolled intersection, you must:
A. Yield to vehicles on your right
B. Yield to vehicles on your left
C. Proceed without slowing
D. Stop only if a pedestrian is present
Answer: A. Yield to vehicles on your right



80.
 True or False
Emergency vehicles always have priority, even if they are not using sirens or lights.
Answer: False



81. 
Multiple Choice
When approaching a crosswalk where a pedestrian is waiting, you must:
A. Slow down and stop if necessary
B. Continue if the pedestrian has not stepped onto the road
C. Honk to let them know you are coming
D. Flash headlights to signal them to wait
Answer: A. Slow down and stop if necessary



82.
 True or False
It is illegal to follow a fire truck closer than 150 metres.
Answer: True



83. 
Multiple Choice
When driving in winter conditions, you should:
A. Accelerate and brake gently
B. Use cruise control for steady speed
C. Drive faster to prevent skidding
D. Keep windows slightly open for warmth
Answer: A. Accelerate and brake gently



84. 
True or False
A solid white line on the road means lane changes are discouraged but not illegal.
Answer: True



85.
 Multiple Choice
When entering a highway from a full stop, you should:
A. Accelerate quickly to match traffic speed
B. Merge slowly and expect traffic to adjust
C. Use hazard lights
D. Stop in the merging lane until safe
Answer: A. Accelerate quickly to match traffic speed



86. 
True or False
You must stop for a school bus only if you are travelling in the same direction.
Answer: False



87. 
Multiple Choice
When approaching an intersection with no signs or signals, you should:
A. Yield to vehicles already in the intersection
B. Speed up to enter first
C. Honk before entering
D. Stop completely every time
Answer: A. Yield to vehicles already in the intersection



88. 
True or False
In Nova Scotia, it is legal to park in front of a public driveway.
Answer: False



89. 
Multiple Choice
If blinded by oncoming headlights at night, you should:
A. Look slightly to the right edge of the road
B. Look directly at the lights
C. Close your eyes briefly
D. Speed up to pass quickly
Answer: A. Look slightly to the right edge of the road



90. 
True or False
A learner driver can drive on a 400-series highway in Nova Scotia.
Answer: True (If accompanied by a qualified supervising driver.)



91. 
Multiple Choice
When following a vehicle at night, you should:
A. Use low beam headlights
B. Use high beams to see better
C. Flash headlights often
D. Turn off headlights to reduce glare
Answer: A. Use low beam headlights



92. 
True or False
Driving too slowly can be dangerous if it disrupts traffic flow.
Answer: True



93. 
Multiple Choice
When approaching a hill where you cannot see oncoming traffic, you should:
A. Stay in your lane and reduce speed
B. Move to the middle for better view
C. Accelerate to pass quickly
D. Use high beams in daylight
Answer: A. Stay in your lane and reduce speed



94. 
True or False
You must always carry proof of insurance when driving.
Answer: True



95. 
Multiple Choice
When you see a “Yield to Buses” sign, you must:
A. Slow down and allow the bus to merge
B. Speed up to pass before the bus merges
C. Stop and wait until the bus is far ahead
D. Ignore if in a hurry
Answer: A. Slow down and allow the bus to merge



96. 
True or False
You must signal for at least 30 metres before turning.
Answer: True



97. 
Multiple Choice
When approaching a flashing pedestrian crossing light, you must:
A. Slow down and stop if necessary
B. Continue at the same speed
C. Honk to warn pedestrians
D. Pass only on the left side of the road
Answer: A. Slow down and stop if necessary



98.
 True or False
It is legal to leave your engine running while unattended in all areas.
Answer: False



99. 
Multiple Choice
If your car starts to overheat, you should:
A. Pull over safely and turn off the engine
B. Continue driving until you reach your destination
C. Open the radiator cap immediately
D. Accelerate to cool the engine
Answer: A. Pull over safely and turn off the engine



100. 
True or False
Drivers must yield to public transit buses when they signal to re-enter traffic.
Answer: True

101.
 Multiple Choice
When approaching a railway crossing with no lights or gates, you should:
A. Slow down, look both ways, and proceed if clear
B. Stop only if a train is visible
C. Speed up to cross quickly
D. Honk and drive through
Answer: A. Slow down, look both ways, and proceed if clear



102.
 True or False
It is legal to drive with interior dome lights on at night.
Answer: True (Although it may reduce visibility, it is not illegal.)



103. 
Multiple Choice
When entering a highway from an acceleration lane, you must:
A. Match the speed of highway traffic
B. Stop before merging
C. Merge at a much slower speed
D. Wait for all traffic to pass before moving
Answer: A. Match the speed of highway traffic



104. 
True or False
Motorcycles have the same rights and responsibilities as other motor vehicles.
Answer: True



105. 
Multiple Choice
When driving on ice, you should:
A. Brake gently and steer smoothly
B. Brake hard to maintain control
C. Use high beams for better visibility
D. Accelerate quickly to avoid skidding
Answer: A. Brake gently and steer smoothly



106. 
True or False
You must reduce your speed in construction zones even if workers are not present.
Answer: True



107.
 Multiple Choice
When approaching a four-way stop, the vehicle that should proceed first is:
A. The one on the left
B. The first to stop
C. The largest vehicle
D. The fastest vehicle
Answer: B. The first to stop



108. 
True or False
It is illegal to use a hand-held phone while driving in Nova Scotia.
Answer: True



109. 
Multiple Choice
When a traffic signal is not working, you must:
A. Treat the intersection as a four-way stop
B. Drive through without stopping
C. Wait until someone waves you through
D. Use your horn to warn others
Answer: A. Treat the intersection as a four-way stop



110. 
True or False
Flashing yellow lights mean slow down and proceed with caution.
Answer: True



111. 
Multiple Choice
When passing a bicycle, you must leave at least:
A. 0.5 metre of space
B. 1 metre of space
C. 1.5 metres of space
D. 2 metres of space
Answer: C. 1.5 metres of space



112. 
True or False
Driving with bald tires is illegal in Nova Scotia.
Answer: True



113. 
Multiple Choice
If your brakes fail, the first thing you should try is:
A. Pumping the brake pedal
B. Turning off the ignition immediately
C. Accelerating to regain control
D. Pulling the parking brake abruptly
Answer: A. Pumping the brake pedal



114. 
True or False
At uncontrolled intersections, you must yield to vehicles already in the intersection.
Answer: True



115. 
Multiple Choice
When parking downhill with a curb, you should turn your wheels:
A. Toward the curb
B. Away from the curb
C. Straight ahead
D. In either direction
Answer: A. Toward the curb



116. 
True or False
The speed limit in a residential area is usually 50 km/h unless otherwise posted.
Answer: True



117. 
Multiple Choice
When approaching a stopped emergency vehicle with flashing lights, you must:
A. Slow down and move over if safe
B. Maintain speed but pass carefully
C. Stop completely in all cases
D. Use your horn to warn them
Answer: A. Slow down and move over if safe



118. 
True or False
It is legal to coast downhill in neutral gear.
Answer: False

119. 
Multiple Choice
The safest way to check for vehicles in your blind spot is to:
A. Turn your head and glance over your shoulder
B. Rely only on side mirrors
C. Honk before changing lanes
D. Use your rear-view mirror only
Answer: A. Turn your head and glance over your shoulder



120. 
True or False
Learner drivers must be accompanied by a supervising driver with at least 2 years’ experience.
Answer: True



121.
 Multiple Choice
When you see a flashing red light at a railway crossing, you must:
A. Stop and proceed only when lights stop flashing
B. Slow down and cross carefully
C. Drive through quickly
D. Stop only if a train is visible
Answer: A. Stop and proceed only when lights stop flashing



122.
 True or False
Seat belts are required for all passengers, regardless of seating position.
Answer: True



123. 
Multiple Choice
When merging into highway traffic, the most important action is to:
A. Signal early and adjust speed to traffic flow
B. Wait for a complete stop in traffic before merging
C. Drive faster than the flow to merge quickly
D. Honk to alert other drivers
Answer: A. Signal early and adjust speed to traffic flow



124. 
True or False
It is safe to drive with one headlight burned out as long as it’s daytime.
Answer: False



125.
 Multiple Choice
If your car begins to hydroplane, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn sharply to regain traction
D. Accelerate to push through the water
Answer: A. Ease off the accelerator and steer straight



126. 
True or False
Pedestrians must use crosswalks if available.
Answer: True



127. 
Multiple Choice
When parking uphill with a curb, you should turn your wheels:
A. Away from the curb
B. Toward the curb
C. Straight ahead
D. In either direction
Answer: A. Away from the curb



128.
 True or False
Motorists are required to yield to public transit buses re-entering traffic.
Answer: True



129. 
Multiple Choice
When following another vehicle in the rain, you should:
A. Increase your following distance
B. Reduce following distance for better visibility
C. Maintain the same distance as in dry weather
D. Use high beams to see better
Answer: A. Increase your following distance



130. 
True or False
Cyclists must ride as far to the right as practicable, except when turning left.
Answer: True



131.
 Multiple Choice
If your engine stalls while driving, you should:
A. Shift to neutral and try restarting
B. Brake hard immediately
C. Turn sharply to the side of the road
D. Use high beams to warn others
Answer: A. Shift to neutral and try restarting



132. 
True or False
Using cruise control on icy roads is safe if you keep a steady speed.
Answer: False



133. 
Multiple Choice
When two vehicles arrive at a stop sign at the same time, the right-of-way goes to:
A. The vehicle on the right
B. The vehicle on the left
C. The larger vehicle
D. The fastest vehicle
Answer: A. The vehicle on the right



134. 
True or False
It is legal to park in a fire lane if you remain in your vehicle.
Answer: False



135. 
Multiple Choice
If you miss your highway exit, you should:
A. Continue to the next exit
B. Reverse carefully on the shoulder
C. Make a U-turn immediately
D. Stop and check for traffic before backing up
Answer: A. Continue to the next exit



136. 
True or False
It is safe to follow closely behind large trucks to reduce wind resistance.
Answer: False



137. 
Multiple Choice
When passing another vehicle at night, you should:
A. Return to low beams once alongside
B. Keep high beams on for visibility
C. Flash your lights repeatedly
D. Turn headlights off briefly
Answer: A. Return to low beams once alongside



138. 
True or False
School zone speed limits apply only during school hours or when signs indicate.
Answer: True



139. 
Multiple Choice
When driving in heavy traffic, you should:
A. Leave extra space between your car and the one ahead
B. Stay as close as possible to avoid being cut off
C. Frequently change lanes to save time
D. Use high beams for better visibility
Answer: A. Leave extra space between your car and the one ahead



140. 
True or False
Driving with an open alcohol container in the car is illegal.
Answer: True



141. 
Multiple Choice
When your vehicle starts to skid, the first thing you should do is:
A. Ease off the accelerator
B. Brake hard immediately
C. Turn sharply in the opposite direction
D. Accelerate to regain control
Answer: A. Ease off the accelerator



142.
 True or False
All passengers must wear seat belts if available, regardless of age.
Answer: True



143. 
Multiple Choice
When approaching a pedestrian at a crosswalk, you must:
A. Stop and let them cross
B. Slow down but continue
C. Honk to warn them
D. Drive around them
Answer: A. Stop and let them cross



144. 
True or False
It is illegal to pass another vehicle on a bridge or in a tunnel.
Answer: True



145.
 Multiple Choice
If your headlights fail while driving at night, you should:
A. Turn on hazard lights and pull over
B. Speed up to reach a lighted area
C. Keep driving with parking lights
D. Use your high beams only
Answer: A. Turn on hazard lights and pull over



146. 
True or False
Backing up on a highway is illegal.
Answer: True



147. 
Multiple Choice
When driving in strong crosswinds, you should:
A. Reduce speed and keep a firm grip on the wheel
B. Accelerate to maintain control
C. Steer sharply against the wind
D. Use cruise control for stability
Answer: A. Reduce speed and keep a firm grip on the wheel



148. 
True or False
Learner drivers are prohibited from driving between midnight and 5 a.m. without a supervising driver.
Answer: True



149. 
Multiple Choice
When you see a sign warning of falling rocks, you should:
A. Slow down and be prepared to avoid debris
B. Drive faster to pass the area quickly
C. Stop and wait until rocks are cleared
D. Use your horn to warn others
Answer: A. Slow down and be prepared to avoid debris



150. 
True or False
It is legal to pass on the right if the vehicle ahead is turning left and there is room to do so safely.
Answer: True

151. 
Multiple Choice
When driving downhill, the best way to control your speed is to:
A. Shift to a lower gear
B. Use cruise control
C. Coast in neutral
D. Turn off the engine
Answer: A. Shift to a lower gear



152. 
True or False
You must yield to emergency vehicles using sirens or flashing lights, regardless of your direction of travel.
Answer: True



153.
 Multiple Choice
When approaching a flashing amber light at an intersection, you should:
A. Slow down and proceed with caution
B. Stop completely
C. Accelerate quickly
D. Honk to alert other drivers
Answer: A. Slow down and proceed with caution



154.
 True or False
It is legal to park in front of a fire hydrant if no sign is posted.
Answer: False



155. 
Multiple Choice
If your vehicle begins to skid, you should:
A. Steer gently in the direction you want to go
B. Turn sharply in the opposite direction
C. Brake hard immediately
D. Accelerate to straighten the car
Answer: A. Steer gently in the direction you want to go



156. 
True or False
When merging onto a highway, you must signal for at least 30 metres before entering.
Answer: True



157. 
Multiple Choice
When driving in fog, you should use:
A. Low-beam headlights
B. High-beam headlights
C. Parking lights only
D. Hazard lights only
Answer: A. Low-beam headlights



158. 
True or False
Cyclists are allowed to use the full lane if needed for safety.
Answer: True



159. 
Multiple Choice
When approaching a stopped school bus with flashing red lights, you must:
A. Stop in both directions until lights stop flashing
B. Slow down and pass cautiously
C. Stop only if children are visible
D. Honk to alert the driver
Answer: A. Stop in both directions until lights stop flashing



160. 
True or False
You can turn right on a red light in Nova Scotia after a full stop, unless prohibited by a sign.
Answer: True



161. 
Multiple Choice
If your brakes become wet, you can dry them by:
A. Driving slowly while lightly pressing the brake pedal
B. Accelerating quickly
C. Driving in a higher gear
D. Turning off the engine
Answer: A. Driving slowly while lightly pressing the brake pedal



162. 
True or False
It is illegal to follow an emergency vehicle closer than 150 metres.
Answer: True



163. 
Multiple Choice
When you see a “slippery when wet” sign, you should:
A. Reduce speed and avoid sudden movements
B. Maintain your normal speed
C. Brake sharply to test traction
D. Use high beams for visibility
Answer: A. Reduce speed and avoid sudden movements



164. 
True or False
You must yield to pedestrians even when the traffic light is green if they are already crossing.
Answer: True



165. 
Multiple Choice
When driving at night on a dimly lit road, you should:
A. Use high beams when no oncoming traffic is present
B. Keep low beams on at all times
C. Drive with parking lights only
D. Flash your lights continuously
Answer: A. Use high beams when no oncoming traffic is present



166. 
True or False
It is legal to block an intersection if your light is green but traffic is stopped ahead.
Answer: False



167. 
Multiple Choice
When parallel parking, you should position your vehicle about:
A. 50 cm from the curb
B. 1 metre from the curb
C. 2 metres from the curb
D. 10 cm from the curb
Answer: A. 50 cm from the curb



168. 
True or False
All passengers under 16 must wear a seat belt or be in a proper child restraint.
Answer: True



169.
 Multiple Choice
The best way to handle a blowout at high speed is to:
A. Hold the wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn sharply to the shoulder
D. Accelerate to regain control
Answer: A. Hold the wheel firmly and slow down gradually



170. 
True or False
When entering a roundabout, you must yield to traffic already inside.
Answer: True



171. 
Multiple Choice
When parking uphill without a curb, you should turn your wheels:
A. Toward the edge of the road
B. Away from the edge of the road
C. Straight ahead
D. In any position
Answer: A. Toward the edge of the road



172. 
True or False
If your vehicle starts to hydroplane, you should ease off the gas and steer straight.
Answer: True



173. 
Multiple Choice
When approaching a pedestrian with a white cane, you should:
A. Stop and allow them to cross
B. Slow down and wave them across
C. Honk to alert them
D. Pass quickly before they enter the crosswalk
Answer: A. Stop and allow them to cross



174. 
True or False
Reversing into traffic from a driveway without checking is unsafe and illegal.
Answer: True



175.
 Multiple Choice
If a tire blows out while driving, you should:
A. Hold the wheel firmly and slow down gradually
B. Brake hard immediately
C. Turn quickly to the shoulder
D. Accelerate to keep control
Answer: A. Hold the wheel firmly and slow down gradually



176.
 True or False
It is legal to leave a child unattended in a running vehicle.
Answer: False



177.
 Multiple Choice
When approaching an intersection where the stop sign is obscured, you should:
A. Stop as you would at a normal stop sign
B. Continue without stopping
C. Honk to warn others
D. Slow down but do not stop
Answer: A. Stop as you would at a normal stop sign



178. 
True or False
Using a GPS while driving is legal if it is hands-free and does not distract you.
Answer: True



179. 
Multiple Choice
When driving through an area with high pedestrian activity, you should:
A. Reduce speed and be prepared to stop
B. Maintain speed for smooth traffic flow
C. Honk regularly to alert people
D. Drive in the centre of the road
Answer: A. Reduce speed and be prepared to stop



180. 
True or False
It is safe to drive with your high beams on when following another vehicle closely.
Answer: False



181. 
Multiple Choice
If another driver is tailgating you, the best action is to:
A. Slow down and let them pass when safe
B. Brake sharply to warn them
C. Speed up to create distance
D. Weave between lanes
Answer: A. Slow down and let them pass when safe



182. 
True or False
Motorcycles are harder to see and require extra caution when changing lanes.
Answer: True



183. 
Multiple Choice
When driving in heavy rain, you should:
A. Increase following distance and reduce speed
B. Maintain speed to avoid water buildup
C. Use high beams for better vision
D. Drive on the shoulder
Answer: A. Increase following distance and reduce speed



184.
 True or False
Cyclists must obey the same traffic signs and signals as motorists.
Answer: True



185.
 Multiple Choice
If your view is blocked by a large vehicle at an intersection, you should:
A. Move forward slowly until you can see clearly
B. Speed through quickly
C. Rely on traffic sounds only
D. Wait until someone waves you through
Answer: A. Move forward slowly until you can see clearly



186.
 True or False
Pedestrians have the right-of-way at marked crosswalks only.
Answer: False



187. 
Multiple Choice
When a traffic light is green but a police officer signals you to stop, you should:
A. Stop as directed by the officer
B. Continue because the light is green
C. Slow down but not stop
D. Ignore the officer
Answer: A. Stop as directed by the officer



188.
 True or False
It is safe to brake suddenly in icy conditions if you have ABS.
Answer: False



189. 
Multiple Choice
When driving on gravel, you should:
A. Reduce speed and increase following distance
B. Speed up to avoid dust
C. Drive in the middle of the road
D. Use high beams for visibility
Answer: A. Reduce speed and increase following distance



190.
 True or False
It is legal to drive with only daytime running lights at night.
Answer: False



191.
 Multiple Choice
When another vehicle is merging onto the highway, you should:
A. Adjust speed or change lanes to let them in
B. Maintain your speed no matter what
C. Honk to warn them
D. Race to pass them
Answer: A. Adjust speed or change lanes to let them in



192. 
True or False
School buses in Nova Scotia have flashing amber lights to warn they are preparing to stop.
Answer: True



193. 
Multiple Choice
When making a left turn at an intersection, you must:
A. Yield to oncoming traffic and pedestrians
B. Turn before oncoming traffic reaches you
C. Rely on the green light without checking
D. Signal only after starting the turn
Answer: A. Yield to oncoming traffic and pedestrians



194. 
True or False
A learner’s licence is valid for 24 months in Nova Scotia.
Answer: True



195. 
Multiple Choice
When following a motorcycle, you should:
A. Allow more space than you would for a car
B. Follow closely to improve visibility
C. Pass quickly without signalling
D. Drive directly beside them
Answer: A. Allow more space than you would for a car



196. 
True or False
You should use your hazard lights if your vehicle is disabled on the road.
Answer: True



197.
 Multiple Choice
When approaching an uncontrolled intersection, you should:
A. Slow down and be prepared to stop
B. Continue at normal speed
C. Honk to alert others
D. Stop only if another car is visible
Answer: A. Slow down and be prepared to stop



198.
 True or False
All vehicles must stop at railway crossings, even if no train is visible.
Answer: False



199.
 Multiple Choice
If you are driving through a work zone and no workers are present, you should:
A. Obey the posted work zone speed limit
B. Drive at normal speed
C. Ignore work zone signs
D. Stop and wait for a flagger
Answer: A. Obey the posted work zone speed limit



200. 
True or False
Backing out of a driveway without checking for pedestrians is illegal.
Answer: True

201.
 Multiple Choice
When driving in heavy snow, you should:
A. Use low-beam headlights and drive at a reduced speed
B. Use high beams for better visibility
C. Maintain the speed limit to avoid delays
D. Brake sharply to prevent sliding
Answer: A. Use low-beam headlights and drive at a reduced speed



202.
 True or False
At a four-way stop, the first vehicle to arrive has the right-of-way.
Answer: True



203. 
Multiple Choice
When you see a “no passing zone” sign, you should:
A. Pass only if no vehicles are coming
B. Avoid passing under any circumstances
C. Pass quickly to clear the area
D. Honk before passing
Answer: B. Avoid passing under any circumstances



204.
 True or False
It is legal to park within 5 metres of a fire hydrant.
Answer: False



205. 
Multiple Choice
If your vehicle’s accelerator gets stuck, you should:
A. Shift to neutral and apply brakes
B. Turn off the ignition immediately
C. Increase speed to free it
D. Pull the accelerator with your foot while driving
Answer: A. Shift to neutral and apply brakes



206.
 True or False
When turning left onto a one-way street, you may enter any lane if safe.
Answer: True



207. 
Multiple Choice
When passing a cyclist, you must leave at least:
A. 1 metre of space
B. 2 metres of space
C. Half a metre of space
D. As much space as possible without crossing the centre line
Answer: A. 1 metre of space



208. 
True or False
On wet roads, your stopping distance can be twice as long as on dry roads.
Answer: True



209. 
Multiple Choice
When approaching a flashing red light, you must:
A. Stop fully and proceed when safe
B. Slow down and continue
C. Treat it like a yield sign
D. Ignore it if the road is empty
Answer: A. Stop fully and proceed when safe



210. 
True or False
You may pass another vehicle in a school zone if you are below the speed limit.
Answer: False


211. 
Multiple Choice
When exiting a parking space on a busy street, you should:
A. Signal and check mirrors and blind spots
B. Rely on other drivers to let you out
C. Reverse quickly to avoid waiting
D. Use your horn to warn pedestrians
Answer: A. Signal and check mirrors and blind spots


212. 
True or False
Using handheld electronic devices while driving is illegal in Nova Scotia.
Answer: True



213. 
Multiple Choice
When you see a yield sign, you must:
A. Slow down and give the right-of-way if needed
B. Stop every time before proceeding
C. Accelerate to merge quickly
D. Continue without checking
Answer: A. Slow down and give the right-of-way if needed



214. 
True or False
When parked on a hill, you should always set your parking brake.
Answer: True



215. 
Multiple Choice
If your vehicle begins to skid on ice, you should:
A. Ease off the accelerator and steer in the desired direction
B. Brake hard immediately
C. Accelerate to regain traction
D. Turn sharply away from the skid
Answer: A. Ease off the accelerator and steer in the desired direction



216.
 True or False
You must dim high beams when within 150 metres of oncoming traffic.
Answer: True



217. 
Multiple Choice
When driving near large trucks, you should:
A. Avoid lingering in their blind spots
B. Pass quickly without signalling
C. Drive directly beside them for visibility
D. Follow closely to reduce wind resistance
Answer: A. Avoid lingering in their blind spots



218. 
True or False
It is legal to reverse on a highway if you miss your exit.
Answer: False



219. 
Multiple Choice
If you approach an intersection with no signs or signals, you should:
A. Yield to vehicles on your right
B. Always go first
C. Stop and wait for someone to wave you through
D. Proceed without slowing down
Answer: A. Yield to vehicles on your right



220. 
True or False
You can be fined for driving too slowly if you block traffic flow.
Answer:True

221. 
Multiple Choice
When stopping on a slippery surface, you should:
A. Apply brakes gently to avoid locking wheels
B. Brake sharply for better grip
C. Coast without braking
D. Pump brakes rapidly regardless of ABS
Answer: A. Apply brakes gently to avoid locking wheels



222. 
True or False
It is safe to pass a vehicle on a curve if you cannot see far ahead.
Answer: False



223.
 Multiple Choice
When approaching a pedestrian crossing in bad weather, you should:
A. Reduce speed and be ready to stop
B. Maintain speed for smooth flow
C. Honk to alert pedestrians
D. Drive in the middle of the road
Answer: A. Reduce speed and be ready to stop



224.
 True or False
Motorcycles require the same lane space as cars.
Answer: True



225. 
Multiple Choice
When parking downhill with a curb, you should:
A. Turn wheels toward the curb
B. Turn wheels away from the curb
C. Keep wheels straight
D. Use no parking brake
Answer: A. Turn wheels toward the curb



226.
 True or False
You must stop for a school bus with flashing red lights only if children are visible.
Answer: False



227. 
Multiple Choice
When passing another vehicle, you must return to your lane:
A. Once you can see the vehicle’s headlights in your mirror
B. As soon as you are halfway past
C. Immediately after passing
D. Without signalling
Answer: A. Once you can see the vehicle’s headlights in your mirror



228. 
True or False
It is safer to drive with two hands on the wheel at all times.
Answer: True



229. 
Multiple Choice
When your view is blocked at a railway crossing, you should:
A. Stop and move forward slowly until you can see
B. Cross quickly without stopping
C. Rely on hearing for train detection
D. Wait until another vehicle moves first
Answer: A. Stop and move forward slowly until you can see



230. 
True or False
Driving without insurance can result in fines and vehicle impoundment.
Answer: True



231.
 Multiple Choice
When driving through a tunnel, you should:
A. Turn on headlights for visibility
B. Use hazard lights only
C. Speed up to exit quickly
D. Coast in neutral
Answer: A. Turn on headlights for visibility



232.
 True or False
Using cruise control on icy roads is recommended.
Answer: False



233. 
Multiple Choice
When turning left at an intersection without signals, you must:
A. Yield to oncoming traffic and pedestrians
B. Turn quickly before other vehicles
C. Enter without looking if clear from one side
D. Rely on other drivers to slow down
Answer: A. Yield to oncoming traffic and pedestrians



234. 
True or False
You should avoid driving through deep water as it can damage your vehicle.
Answer: True



235. 
Multiple Choice
When driving in a residential area, you should:
A. Watch for children and pets near the road
B. Speed up to clear the area quickly
C. Use high beams for visibility
D. Drive in the middle of the road
Answer: A. Watch for children and pets near the road



236.
 True or False
Seat belts are required for all passengers in the vehicle.
Answer: True



237. 
Multiple Choice
When another driver is aggressive, you should:
A. Avoid eye contact and give them space
B. Confront them to assert yourself
C. Brake check them to warn them
D. Follow them closely
Answer: A. Avoid eye contact and give them space



238.
 True or False
You must stop at all stop signs, even in empty parking lots.
Answer: True



239. 
Multiple Choice
When driving through a school zone, you should:
A. Follow the posted reduced speed limits during school hours
B. Maintain normal speed if no children are visible
C. Honk to alert children
D. Pass other cars quickly
Answer: A. Follow the posted reduced speed limits during school hours



240. 
True or False
Using high beams in fog improves visibility.
Answer: False



241. 
Multiple Choice
When approaching a stop sign at a railway crossing, you should:
A. Stop, look, and proceed when safe
B. Slow down and continue
C. Honk before crossing
D. Wait for another car to cross first
Answer: A. Stop, look, and proceed when safe



242. 
True or False
Drivers must yield to buses re-entering traffic from a bus stop.
Answer: True



243. 
Multiple Choice
When merging onto a highway, you should:
A. Match the speed of traffic and merge smoothly
B. Enter at a slow speed and accelerate on the highway
C. Stop at the end of the ramp
D. Merge without signalling
Answer: A. Match the speed of traffic and merge smoothly



244. 
True or False
You can park in a bus stop zone if no buses are present.
Answer: False


245. 
Multiple Choice
When stopping behind another vehicle, you should leave enough space to:
A. See the rear tires touching the pavement
B. Touch bumpers
C. Exit without reversing
D. Allow two car lengths
Answer: A. See the rear tires touching the pavement



246. 
True or False
Bicycles are allowed to ride two abreast on most roads unless prohibited.
Answer: True



247. 
Multiple Choice
When approaching a hill, you should:
A. Reduce speed and keep to the right in case of oncoming traffic
B. Accelerate to climb quickly
C. Drive in the middle of the road
D. Use high beams regardless of oncoming traffic
Answer: A. Reduce speed and keep to the right in case of oncoming traffic



248. 
True or False
Flashing amber lights at an intersection mean proceed with caution.
Answer: True



249. 
Multiple Choice
When driving at night in urban areas, you should:
A. Use low-beam headlights
B. Use high beams at all times
C. Drive with parking lights only
D. Turn off headlights if streetlights are bright
Answer: A. Use low-beam headlights



250. 
True or False
When overtaking another vehicle, it is safe to return to your lane once you can see their headlights in your mirror.
Answer: True

251.
 Multiple Choice
If your brakes fail while driving, you should:
A. Pump the brake pedal and use the parking brake
B. Shift to a higher gear
C. Turn off the ignition immediately
D. Increase speed to find a safe place
Answer: A. Pump the brake pedal and use the parking brake



252. 
True or False
When driving near emergency scenes, you should slow down and proceed with caution.
Answer: True



253. 
Multiple Choice
The safest way to handle a skid on wet pavement is to:
A. Ease off the accelerator and steer in the direction of the skid
B. Brake hard to stop the vehicle
C. Turn away from the skid
D. Accelerate quickly to regain control
Answer: A. Ease off the accelerator and steer in the direction of the skid



254.
 True or False
You must stop for a stopped school bus with flashing red lights in both directions unless on a divided highway.
Answer: True



255. 
Multiple Choice
When approaching a railway crossing without signals, you should:
A. Slow down, look, and listen before crossing
B. Speed through to avoid trains
C. Honk to alert other drivers
D. Rely on vehicles ahead for safety
Answer: A. Slow down, look, and listen before crossing



256. 
True or False
It is safer to keep both hands on the wheel at the 9 and 3 o’clock positions.
Answer: True



257. 
Multiple Choice
If your vehicle’s headlights fail at night, you should:
A. Turn on hazard lights and pull off the road
B. Continue driving slowly without lights
C. Use high beams only
D. Rely on streetlights for visibility
Answer: A. Turn on hazard lights and pull off the road



258.
 True or False
Driving too slowly can be as dangerous as speeding.
Answer: True



259. 
Multiple Choice
When parking uphill with a curb, you should:
A. Turn wheels away from the curb
B. Turn wheels toward the curb
C. Keep wheels straight
D. Leave the parking brake off
Answer: A. Turn wheels away from the curb



260. 
True or False
Seat belts can prevent you from being thrown from the vehicle in a collision.
Answer: True



261.
 Multiple Choice
When merging into traffic from a side road, you should:
A. Yield to all traffic on the main road
B. Merge without stopping
C. Speed up to force entry
D. Honk before merging
Answer: A. Yield to all traffic on the main road



262. 
True or False
It is legal to overtake a vehicle on the right if it is turning left and there is enough space.
Answer: True



263. 
Multiple Choice
If your vehicle begins to overheat, you should:
A. Pull over and let the engine cool before checking coolant
B. Continue driving until you reach your destination
C. Remove the radiator cap immediately
D. Increase speed for more airflow
Answer: A. Pull over and let the engine cool before checking coolant



264. 
True or False
You must use turn signals whenever you change lanes.
Answer: True



265.
 Multiple Choice
When approaching an intersection with a flashing amber light, you should:
A. Slow down and proceed with caution
B. Stop completely before moving
C. Ignore and continue
D. Accelerate to clear the intersection
Answer: A. Slow down and proceed with caution



266. 
True or False
It is legal to follow an emergency vehicle closely if traffic is moving fast.
Answer: False



267. 
Multiple Choice
When driving through fog, you should:
A. Use low-beam headlights and reduce speed
B. Use high beams for better vision
C. Turn off headlights to avoid glare
D. Drive faster to exit fog quickly
Answer: A. Use low-beam headlights and reduce speed



268. 
True or False
You must yield to pedestrians at both marked and unmarked crosswalks.
Answer: True



269. 
Multiple Choice
When stopping on a two-way road, you should park:
A. On the right side of the road facing traffic flow
B. On the left side facing traffic flow
C. In the middle of the lane
D. Without signalling
Answer: A. On the right side of the road facing traffic flow



270. 
True or False
ABS brakes allow you to steer while braking hard.
Answer: True



271. 
Multiple Choice
If your tires lose traction in heavy rain, you should:
A. Ease off the accelerator and steer straight
B. Brake hard immediately
C. Turn quickly to one side
D. Accelerate to push through
Answer: A. Ease off the accelerator and steer straight



272. 
True or False
Reversing into a parking space can be safer than reversing out of it.
Answer: True



273. 
Multiple Choice
When entering a roundabout, you must:
A. Yield to traffic already in the circle
B. Enter without slowing down
C. Stop every time
D. Drive straight through without turning
Answer: A. Yield to traffic already in the circle



274. 
True or False
In Nova Scotia, failing to yield to pedestrians at a crosswalk can result in fines and demerit points.
Answer:True



275. 
Multiple Choice
When approaching a hill where visibility is limited, you should:
A. Stay to the right and reduce speed
B. Drive in the middle of the road
C. Use high beams regardless of traffic
D. Accelerate to pass quickly
Answer: A. Stay to the right and reduce speed



276. 
True or False
Driving at night requires extra caution because of reduced visibility.
Answer: True



277. 
Multiple Choice
If another vehicle is tailgating you, you should:
A. Maintain a steady speed and allow them to pass
B. Brake suddenly to warn them
C. Speed up to create distance
D. Move into their lane
Answer: A. Maintain a steady speed and allow them to pass



278. 
True or False
It is illegal to park on a sidewalk.
Answer: True



279. 
Multiple Choice
When following a large truck, you should:
A. Leave extra space for visibility and stopping distance
B. Follow closely to save fuel
C. Drive beside the truck
D. Pass without signalling
Answer: A. Leave extra space for visibility and stopping distance



280. 
True or False
Motorcycles accelerate and stop faster than most cars.
Answer: True



281. 
Multiple Choice
If your vehicle starts to slide sideways, you should:
A. Steer gently in the direction you want to go
B. Steer in the opposite direction
C. Brake hard
D. Accelerate to regain control
Answer: A. Steer gently in the direction you want to go



282. 
True or False
You can turn right on a red light after a full stop unless prohibited by a sign.
Answer: True



283. 
Multiple Choice
When approaching a school bus with flashing amber lights, you should:
A. Prepare to stop as the red lights will soon activate
B. Speed past before the red lights start
C. Ignore if no children are visible
D. Honk to alert the driver
Answer: A. Prepare to stop as the red lights will soon activate



284. 
True or False
You should never park on a bridge or in a tunnel.
Answer: True



285. 
Multiple Choice
When passing a horse and rider on the road, you should:
A. Slow down and pass with extra space
B. Honk to warn them
C. Speed past to reduce time near the animal
D. Pass closely for visibility
Answer: A. Slow down and pass with extra space



286.
 True or False
It is legal to block an intersection if traffic ahead prevents you from clearing it.
Answer: False



287. 
Multiple Choice
If a traffic light is out of service, you should:
A. Treat it as a four-way stop
B. Drive through without stopping
C. Yield only to the right
D. Follow the largest vehicle through
Answer: A. Treat it as a four-way stop



288. 
True or False
Using headlights during daylight hours can make you more visible to other drivers.
Answer: True



289. 
Multiple Choice
When making a left turn at an intersection, you should:
A. Yield to oncoming traffic and pedestrians
B. Turn before the light changes
C. Swing wide into the opposite lane
D. Ignore pedestrians if the light is green
Answer: A. Yield to oncoming traffic and pedestrians



290.
 True or False
Children under a certain height must use an approved booster seat.
Answer: True



291. 
Multiple Choice
When driving at night, you should:
A. Look slightly to the right of oncoming headlights to avoid glare
B. Stare directly into oncoming lights
C. Turn off headlights to avoid glare
D. Use high beams constantly
Answer: A. Look slightly to the right of oncoming headlights to avoid glare



292.
 True or False
It is recommended to check your tire pressure monthly.
Answer: True



293. 
Multiple Choice
If you approach a stopped emergency vehicle with flashing lights, you must:
A. Slow down and move over if safe
B. Maintain your speed
C. Honk to warn them
D. Stop completely regardless of lane
Answer: A. Slow down and move over if safe



294.
 True or False
Drinking coffee can make you sober enough to drive after heavy drinking.
Answer: False



295. 
Multiple Choice
When driving in rain, your stopping distance can:
A. Double compared to dry roads
B. Remain the same
C. Be shorter
D. Be unpredictable but usually less
Answer: A. Double compared to dry roads



296. 
True or False
In Nova Scotia, it is illegal to drive without insurance.
Answer: True



297.
 Multiple Choice
When approaching a crosswalk with a pedestrian waiting, you should:
A. Stop and allow them to cross
B. Slow down and wave them across
C. Drive through before they step in
D. Honk to alert them
Answer: A. Stop and allow them to cross



298. 
True or False
It is safer to drive with both hands on the wheel when reversing.
Answer: False



299.
 Multiple Choice
When your vehicle begins to fishtail, you should:
A. Steer gently in the direction of the skid
B. Steer in the opposite direction
C. Brake sharply
D. Accelerate quickly
Answer: A. Steer gently in the direction of the skid



300. 
True or False
A flashing green light in Nova Scotia may indicate a pedestrian-controlled crossing.
Answer: True

301. 
Multiple Choice
When approaching a steep hill, you should:
A. Stay in your lane and be prepared for slow-moving vehicles
B. Drive in the middle to avoid hazards
C. Accelerate heavily to climb
D. Overtake without checking
Answer: A. Stay in your lane and be prepared for slow-moving vehicles



302.
 True or False
In Nova Scotia, you must yield to a transit bus signalling to re-enter traffic from a stop.
Answer: True



303. 
Multiple Choice
When passing a cyclist, you must:
A. Leave at least 1 metre of space
B. Pass as close as possible
C. Honk to warn them
D. Follow closely until they move aside
Answer: A. Leave at least 1 metre of space



304. 
True or False
You may park within 3 metres of a fire hydrant as long as your wheels are turned away.
Answer: False



305. 
Multiple Choice
If you see an animal crossing the road, you should:
A. Slow down and be prepared to stop
B. Honk loudly to scare it away
C. Speed past before it reaches the road
D. Swerve suddenly
Answer: A. Slow down and be prepared to stop



306.
 True or False
When turning left from a two-way street onto a one-way street, you may enter any lane.
Answer: True



307. 
Multiple Choice
When driving down a steep hill, you should:
A. Shift to a lower gear to help control speed
B. Coast in neutral to save fuel
C. Brake continuously
D. Accelerate to maintain momentum
Answer: A. Shift to a lower gear to help control speed



308. 
True or False
Using high beams in heavy fog improves visibility.
Answer: False



309. 
Multiple Choice
Before changing lanes, you must:
A. Signal, check mirrors, and check blind spots
B. Signal only if traffic is heavy
C. Check mirrors but not blind spots
D. Change lanes quickly without signalling
Answer: A. Signal, check mirrors, and check blind spots



310. 
True or False
It is legal to drive with a broken brake light if you have functioning headlights.
Answer: False



311. 
Multiple Choice
If you feel drowsy while driving, the safest option is to:
A. Pull over and rest
B. Drink coffee and keep driving
C. Open the window for fresh air
D. Turn on loud music
Answer: A. Pull over and rest



312.
 True or False
When stopped at a railway crossing, you must remain at least 5 metres from the nearest rail.
Answer: True



313.
 Multiple Choice
If another driver is entering your lane from a side road, you should:
A. Adjust speed or change lanes to avoid a collision
B. Maintain speed and expect them to stop
C. Honk continuously
D. Block their entry by speeding up
Answer: A. Adjust speed or change lanes to avoid a collision



314. 
True or False
When reversing, you should check behind by looking over your shoulder, not just mirrors.
Answer: True



315. 
Multiple Choice
When driving on icy roads, the best approach is to:
A. Drive slowly and avoid sudden movements
B. Brake hard for better control
C. Accelerate quickly to avoid slipping
D. Use high beams at all times
Answer: A. Drive slowly and avoid sudden movements



316. 
True or False
The speed limit in school zones is always 50 km/h in Nova Scotia.
Answer: False



317. 
Multiple Choice
When approaching a pedestrian with a white cane, you must:
A. Stop and yield the right-of-way
B. Drive past slowly without stopping
C. Honk to alert them
D. Wait only if they step into the road
Answer: A. Stop and yield the right-of-way



318. 
True or False
Cyclists are required to follow the same traffic rules as motor vehicles.
Answer: True



319. 
Multiple Choice
When crossing a railway track in a manual car, you should:
A. Cross in a low gear without stopping on the tracks
B. Shift gears while on the tracks
C. Stop on the tracks to check for trains
D. Accelerate sharply to cross
Answer: A. Cross in a low gear without stopping on the tracks



320. 
True or False
It is safer to drive in another vehicle’s tire tracks during heavy rain.
Answer: True



321.
 Multiple Choice
The safest way to exit a freeway is to:
A. Signal and move into the exit lane early
B. Brake suddenly at the exit ramp
C. Cross multiple lanes at the last minute
D. Slow down before signalling
Answer: A. Signal and move into the exit lane early



322. 
True or False
A driver must stop for a pedestrian at a crosswalk, even if the pedestrian is on the opposite side.
Answer: True



323. 
Multiple Choice
When driving through a residential area, you should:
A. Reduce speed and watch for children and pets
B. Maintain maximum speed
C. Honk frequently
D. Drive in the middle of the road
Answer: A. Reduce speed and watch for children and pets



324. 
True or False
In Nova Scotia, seat belts must be worn by all passengers unless exempted.
Answer: True



325. 
Multiple Choice
If your vehicle’s accelerator sticks, you should:
A. Shift to neutral and brake smoothly
B. Turn off the ignition immediately while driving
C. Pull on the gas pedal with your foot
D. Continue driving until it frees itself
Answer: A. Shift to neutral and brake smoothly



326.
 True or False
Road surfaces can be extra slippery just after it starts to rain.
Answer: True



327.
 Multiple Choice
When approaching a stop sign, you must:
A. Stop completely before the line or crosswalk
B. Slow down only if traffic is present
C. Honk before proceeding
D. Stop only if another vehicle is ahead
Answer: A. Stop completely before the line or crosswalk



328. 
True or False
It is legal to park facing the opposite direction of traffic on a two-way street.
Answer: False



329. 
Multiple Choice
When driving downhill, you should:
A. Shift to a lower gear to help control speed
B. Coast in neutral
C. Brake continuously
D. Accelerate to reach the bottom faster
Answer: A. Shift to a lower gear to help control speed



330. 
True or False
At night, it is recommended to increase following distance compared to daytime driving.
Answer: True



331.
 Multiple Choice
When approaching a pedestrian-controlled light that is flashing yellow, you should:
A. Slow down and proceed with caution
B. Stop immediately
C. Ignore and continue at normal speed
D. Accelerate to pass before it changes
Answer: A. Slow down and proceed with caution



332. 
True or False
You may overtake a vehicle in a no-passing zone if there are no other cars in sight.
Answer: False



333. 
Multiple Choice
The best way to avoid glare from oncoming headlights is to:
A. Look toward the right side of the road
B. Close your eyes briefly
C. Look directly at the lights
D. Use high beams in response
Answer: A. Look toward the right side of the road



334. 
True or False
Driving while extremely tired can be as dangerous as driving under the influence.
Answer: True



335. 
Multiple Choice
When you see a yield sign, you should:
A. Slow down and give the right-of-way if necessary
B. Stop regardless of traffic
C. Accelerate to enter traffic quickly
D. Ignore if no cars are visible
Answer: A. Slow down and give the right-of-way if necessary



336. 
True or False
Backing into a busy road without checking is legal if you move quickly.
Answer: False



337. 
Multiple Choice
When approaching a curve, you should:
A. Slow down before entering the curve
B. Speed up to maintain momentum
C. Brake sharply in the middle of the curve
D. Drive in the opposite lane for better turning
Answer: A. Slow down before entering the curve



338. 
True or False
It is illegal to text while driving in Nova Scotia.
Answer: True



339. 
Multiple Choice
If you are involved in a collision, you must:
A. Stop immediately and exchange information
B. Leave the scene if damage is minor
C. Move your vehicle without assessing damage
D. Wait for police without checking anyone’s condition
Answer: A. Stop immediately and exchange information



340. 
True or False
Bicycles are allowed to use the full lane if necessary for safety.
Answer: True



341.
 Multiple Choice
When parking on a hill without a curb, you should:
A. Turn wheels toward the edge of the road
B. Turn wheels away from the edge
C. Keep wheels straight
D. Use no parking brake
Answer: A. Turn wheels toward the edge of the road



342. 
True or False
Animals are more likely to be on the road during dawn and dusk.
Answer: True



343.
 Multiple Choice
If you see a pedestrian about to step into the road from between parked cars, you should:
A. Slow down and be ready to stop
B. Honk to warn them but keep speed
C. Swerve sharply
D. Maintain your speed
Answer: A. Slow down and be ready to stop



344. 
True or False
It is legal to pass a school bus with flashing red lights if you are on the opposite side of a divided highway.
Answer: True



345. 
Multiple Choice
When driving on a wet road, you can reduce the risk of hydroplaning by:
A. Reducing speed and avoiding sudden steering
B. Driving faster to keep momentum
C. Turning sharply to clear water
D. Using cruise control
Answer: A. Reducing speed and avoiding sudden steering



346. 
True or False
The right lane on a multi-lane road is generally for slower traffic.
Answer: True



347. 
Multiple Choice
If you are blinded by oncoming headlights, you should:
A. Look toward the right edge of the road
B. Close your eyes briefly
C. Turn on high beams to counter glare
D. Speed up to get past quickly
Answer: A. Look toward the right edge of the road



348. 
True or False
You may exceed the speed limit when overtaking if it’s safe.
Answer: False



349. 
Multiple Choice
When a vehicle ahead signals a left turn, you should:
A. Slow down and prepare to stop if necessary
B. Overtake on the left
C. Drive closely behind them
D. Honk until they move
Answer: A. Slow down and prepare to stop if necessary



350. 
True or False
Bridges can freeze before the rest of the roadway in winter.
Answer: True


351.
 Multiple Choice
When entering traffic from a driveway, you should:
A. Yield to all traffic and pedestrians before proceeding
B. Accelerate quickly to join traffic
C. Enter without signalling
D. Reverse into the lane to save time
Answer: A. Yield to all traffic and pedestrians before proceeding



352. 
True or False
In Nova Scotia, it is legal to use a handheld phone while stopped at a red light.
Answer: False



353.
 Multiple Choice
When driving near a large truck, you should:
A. Avoid lingering in their blind spots
B. Drive close to reduce wind turbulence
C. Overtake without signalling
D. Stay directly beside them
Answer: A. Avoid lingering in their blind spots



354.
 True or False
When parking uphill with a curb, you should turn the wheels away from the curb.
Answer: True



355. 
Multiple Choice
If another driver acts aggressively toward you, you should:
A. Avoid eye contact and do not engage
B. Challenge them with gestures
C. Block them from passing
D. Speed up to get away
Answer: A. Avoid eye contact and do not engage



356. 
True or False
You must stop for a school bus with flashing red lights, even on the opposite side of an undivided road.
Answer: True



357. 
Multiple Choice
When driving in heavy fog, the best lights to use are:
A. Low-beam headlights
B. High-beam headlights
C. Hazard lights only
D. Parking lights only
Answer: A. Low-beam headlights



358.
 True or False
In Nova Scotia, a new driver must display a “N” sign for the first year after getting their full licence.
Answer: False



359. 
Multiple Choice
When skidding on ice, the correct response is to:
A. Steer gently in the direction you want to go
B. Brake hard immediately
C. Accelerate to regain control
D. Turn in the opposite direction
Answer: A. Steer gently in the direction you want to go



360. 
True or False
A flashing yellow light means slow down and proceed with caution.
Answer: True



361. 
Multiple Choice
When approaching an intersection and the traffic light changes from green to yellow, you should:
A. Stop if safe to do so
B. Accelerate to beat the red light
C. Maintain your speed
D. Reverse to avoid entering
Answer: A. Stop if safe to do so



362.
 True or False
You must yield to emergency vehicles even if you are in an intersection.
Answer: True



363.
 Multiple Choice
When following another vehicle at night, you should:
A. Dim your headlights to low beam
B. Keep high beams on for better vision
C. Use hazard lights
D. Follow closely for better illumination
Answer: A. Dim your headlights to low beam



364. 
True or False
It is illegal to drive without insurance in Nova Scotia.
Answer: True



365. 
Multiple Choice
If you are entering a roundabout, you must:
A. Yield to traffic already inside
B. Enter without slowing down
C. Stop and wait for a full rotation
D. Signal only when entering
Answer: A. Yield to traffic already inside



366.
 True or False
You can park in front of a fire hydrant if you are inside the vehicle.
Answer: False



367. 
Multiple Choice
When exiting a highway, you should:
A. Signal early and reduce speed in the exit lane
B. Slow down on the main lanes before moving over
C. Cross multiple lanes suddenly
D. Exit without signalling
Answer: A. Signal early and reduce speed in the exit lane



368.
 True or False
Children under a certain height or weight must use an approved child safety seat.
Answer: True



369. 
Multiple Choice
If your brakes fail, you should:
A. Downshift and use the parking brake gradually
B. Turn off the engine immediately
C. Accelerate to maintain control
D. Jump out of the vehicle
Answer: A. Downshift and use the parking brake gradually



370. 
True or False
You may exceed the posted speed limit when passing another vehicle.
Answer: False



371. 
Multiple Choice
When approaching a crosswalk without signals, you must:
A. Yield to pedestrians
B. Proceed if they are far away
C. Honk to warn them
D. Drive through at normal speed
Answer: A. Yield to pedestrians



372. 
True or False
In Nova Scotia, headlights must be used from half an hour before sunset until half an hour after sunrise.
Answer: True



373. 
Multiple Choice
If your windshield wipers fail in heavy rain, you should:
A. Pull over safely as soon as possible
B. Continue driving with hazard lights
C. Drive slowly with your head out the window
D. Speed up to avoid getting wet
Answer: A. Pull over safely as soon as possible



374.
 True or False
The left lane on a multi-lane road is generally for passing or faster-moving traffic.
Answer: True



375.
 Multiple Choice
When driving near children playing, you should:
A. Reduce speed and be ready to stop
B. Honk to make them move
C. Maintain speed unless they enter the road
D. Drive on the opposite side of the street
Answer: A. Reduce speed and be ready to stop



376. 
True or False
It is illegal to block an intersection, even during heavy traffic.
Answer: True



377.
 Multiple Choice
When parking uphill without a curb, you should:
A. Turn wheels toward the side of the road
B. Turn wheels away from the side of the road
C. Keep wheels straight
D. Leave the parking brake off
Answer: A. Turn wheels toward the side of the road



378. 
True or False
Cyclists are required to use hand signals when turning.
Answer: True



379.
 Multiple Choice
If you see a “Road Closed” sign, you should:
A. Obey the sign and find an alternate route
B. Continue if no workers are visible
C. Drive around barriers carefully
D. Stop and wait for it to reopen
Answer: A. Obey the sign and find an alternate route



380. 
True or False
You should always check blind spots before changing lanes, even if you have blind-spot monitoring.
Answer: True



381. 
Multiple Choice
When approaching a flashing green light at an intersection, you may:
A. Turn left or proceed straight if safe
B. Stop and wait for a regular green light
C. Continue straight only
D. Use it as a pedestrian crossing
Answer: A. Turn left or proceed straight if safe



382. 
True or False
Seat belts are not required in vehicles manufactured before 1971.
Answer: True



383. 
Multiple Choice
When overtaking another vehicle at night, you should:
A. Switch to low beams once you are alongside
B. Keep high beams on until fully past
C. Overtake without signalling
D. Follow closely before passing
Answer: A. Switch to low beams once you are alongside



384. 
True or False
In Nova Scotia, the blood alcohol limit for fully licensed drivers is 0.08%.
Answer: True



385.
 Multiple Choice
If your car’s engine catches fire, you should:
A. Pull over, turn off the ignition, and move away from the vehicle
B. Open the hood to check the fire
C. Continue driving to a fire station
D. Throw water on it immediately
Answer: A. Pull over, turn off the ignition, and move away from the vehicle



386. 
True or False
At uncontrolled intersections, the vehicle on the left must yield to the vehicle on the right.
Answer: True



387.
 Multiple Choice
When parallel parking, you should:
A. Park within 30 cm of the curb
B. Leave at least 1 metre from the curb
C. Angle the car toward the curb
D. Keep wheels turned away from the curb
Answer: A. Park within 30 cm of the curb



388.
 True or False
Animals can cause serious collisions if not avoided carefully.
Answer: True



389. 
Multiple Choice
When driving in winter, you should:
A. Keep your gas tank at least half full
B. Drive with cruise control on
C. Use summer tires for better grip
D. Brake sharply to prevent skids
Answer: A. Keep your gas tank at least half full



390. 
True or False
It is illegal to exceed the posted speed limit while overtaking.
Answer: True



391.
 Multiple Choice
If you are being overtaken, you should:
A. Maintain speed or slow slightly to let the vehicle pass
B. Speed up to block the pass
C. Move to the centre of the road
D. Stop suddenly
Answer: A. Maintain speed or slow slightly to let the vehicle pass



392.
 True or False
Emergency vehicles with flashing blue lights must be given the right-of-way.
Answer: True



393. 
Multiple Choice
When parking on a street at night, you should:
A. Leave parking lights on if required
B. Keep headlights on high beam
C. Turn off all lights for safety
D. Park facing traffic
Answer: A. Leave parking lights on if required



394. 
True or False
Braking distances increase on wet roads.
Answer: True



395. 
Multiple Choice
If your vehicle starts to overheat, you should:
A. Pull over and let the engine cool
B. Drive faster to cool the engine
C. Open the radiator cap immediately
D. Continue driving to your destination
Answer: A. Pull over and let the engine cool



396. 
True or False
Motorcyclists are allowed to ride two abreast in the same lane.
Answer: True



397. 
Multiple Choice
When entering a tunnel, you should:
A. Turn on headlights and maintain a steady speed
B. Accelerate to get through quickly
C. Use high beams for better vision
D. Drive with windows open
Answer: A. Turn on headlights and maintain a steady speed


398. 
True or False
Driving without a valid licence can lead to fines and possible impoundment.
Answer: True

399. 
Multiple Choice
When approaching an intersection with a yield sign, you must:
A. Slow down and give the right-of-way if needed
B. Stop no matter what
C. Accelerate to enter first
D. Ignore it if the road is clear
Answer: A. Slow down and give the right-of-way if needed

400. 
True or False
It is legal to drive without working windshield wipers if there is no rain.
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

            $this->command->error("No questions found or initial parsing failed with the regex pattern for Nova Scotia.");
            $this->command->error("Regex pattern used: " . $pattern);
            $this->command->error("preg_last_error: " . $lastError . " (" . $errorMessage . ")");
            $this->command->error("Text start for debugging (first 500 chars): " . substr($questionsText, 0, 500));
            $this->command->error("Text start in hex (first 50 chars): " . bin2hex(substr($questionsText, 0, 50)));

            if ($lastError == PREG_BAD_UTF8_ERROR) {
                $this->command->error("Possible UTF-8 encoding issue. Ensure your file is saved as UTF-8 without BOM.");
            }
        }


        $this->command->info("Parsed " . count($questions) . " questions for Nova Scotia.");

        // Loop through the parsed questions and create them in the database
        foreach ($questions as $qData) {
            DrivingQuestion::create([
                'driving_section_id' => $novaScotia->id,
                'question' => $qData['question'],
                'type' => $qData['type'],
                'choices' => $qData['choices'], // Choices are now a PHP array
                'correct_answer' => $qData['correct_answer'],
                'audio_url' => null, // Keeping this null as individual question audio is not needed
            ]);
        }

        $this->command->info("Successfully seeded Nova Scotia citizenship questions.");
    }
}

