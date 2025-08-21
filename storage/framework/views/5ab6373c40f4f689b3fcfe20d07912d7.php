<?php $__env->startSection('content'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styles for the reading material content */
        .prose h2 {
            font-size: 2.25rem; /* text-4xl */
            font-weight: 700;   /* font-bold */
            margin-top: 2rem;
            margin-bottom: 1rem;
            text-align: center; /* Center main section titles */
            grid-column: 1 / -1; /* Make main titles span both columns */
        }
        .prose h3 {
            font-size: 1.5rem; /* text-2xl */
            font-weight: 600;   /* font-semibold */
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            text-align: center; /* Center sub-titles */
        }
        .prose ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            list-style-position: outside;
            margin-bottom: 1rem;
        }
        .prose li {
            margin-bottom: 0.5rem;
        }
        .prose img {
            max-width: 120px; /* Slightly smaller for two columns */
            height: auto;
            display: block;
            margin: 0.5rem auto; /* Center the image */
            border-radius: 0.5rem; /* Slightly rounded corners for images */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* Flexbox for side-by-side image and text within each sign block */
        .sign-item {
            display: flex;
            flex-direction: column; /* Default to column for small screens */
            align-items: center;
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem;
            border: 1px solid #e5e7eb; /* Light border for each item */
            border-radius: 0.75rem; /* More rounded corners */
            background-color: #f9fafb; /* Light background for items */
        }

        @media (min-width: 768px) { /* Medium screens and up */
            .prose-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr); /* Two columns */
                gap: 2.5rem; /* Gap between columns */
            }
            .sign-item {
                flex-direction: row; /* Side-by-side for larger screens */
                text-align: left;
                align-items: flex-start; /* Align text to top */
            }
            .sign-item img {
                margin: 0 1.5rem 0 0; /* Margin right for image in row layout */
                flex-shrink: 0; /* Prevent image from shrinking */
            }
            .sign-item div {
                flex-grow: 1; /* Allow text content to take remaining space */
            }
        }
    </style>

    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-10 border border-gray-200">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
                    Comprehensive Driving Guide: Newfoundland and Labrador
                </h1>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    <p class="mb-6 text-center">Understanding road signs is crucial for safe driving in Newfoundland and Labrador. These signs provide vital information about regulations, warnings, and guidance. Here's a look at some key road signs you'll encounter and their meanings.</p>

                    <h2>Road Signs</h2>
                    <div class="prose-grid"> 

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/1.jpeg')); ?>" alt="Two Way Traffic Sign">
                            <div>
                                <h3>Two Way Traffic</h3>
                                <p>This sign indicates that the road ahead is a two-way street, where traffic travels in opposite directions on the same roadway. Exercise caution for oncoming vehicles.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/2.jpeg')); ?>" alt="Driver Ahead, Keep Right Sign">
                            <div>
                                <h3>Driver Ahead, Keep Right</h3>
                                <p>This sign instructs drivers to keep to the right side of the road, especially when encountering oncoming traffic or when multiple lanes are available, to facilitate smooth traffic flow.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/3.jpeg')); ?>" alt="Road Narrows on Both Sides Sign">
                            <div>
                                <h3>Road Narrows on Both Sides</h3>
                                <p>This sign warns that the width of the road ahead will decrease from both the left and right sides. Be prepared to merge or adjust your position, and be aware of potential bottlenecks.</p>
                            </div>
                        </div>
                        
                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/4.jpeg')); ?>" alt="Do Not Enter Sign">
                            <div>
                                <h3>Do Not Enter</h3>
                                <p>A regulatory sign indicating that vehicles are prohibited from entering a particular roadway, ramp, or area. This is typically used to prevent wrong-way driving on one-way streets or exit ramps.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/5.jpeg')); ?>" alt="No Left Turn Sign">
                            <div>
                                <h3>No Left Turn Sign</h3>
                                <p>This sign prohibits drivers from making a left turn at the intersection or location where the sign is posted. Look for alternative routes to reach your desired direction.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/6.jpeg')); ?>" alt="No Stopping in Indicated Area Sign">
                            <div>
                                <h3>No Stopping in Indicated Area</h3>
                                <p>This sign means you are not allowed to stop your vehicle in the designated area for any reason, even briefly to pick up or drop off passengers. This typically applies to zones needing constant traffic flow.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/7.jpeg')); ?>" alt="School Bus Stop Ahead Sign">
                            <div>
                                <h3>School Bus Stop Ahead</h3>
                                <p>This sign warns drivers that there is a designated school bus stop ahead. Be prepared to slow down and stop if the school bus activates its flashing red lights to pick up or drop off children.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/8.jpeg')); ?>" alt="Uneven Pavement Sign">
                            <div>
                                <h3>Uneven Pavement</h3>
                                <p>This sign warns drivers of a section of road with uneven or rough pavement. Reduce your speed and maintain a firm grip on the steering wheel to safely navigate the surface.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/9.jpeg')); ?>" alt="Dead End Sign">
                            <div>
                                <h3>Dead End</h3>
                                <p>This sign indicates that the road ahead has no outlet or through access, meaning it terminates in a cul-de-sac or a blocked passage. You will need to turn around.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/10.jpeg')); ?>" alt="Bump or Uneven Pavement Sign">
                            <div>
                                <h3>Bump or Uneven Pavement on the Road Ahead</h3>
                                <p>This sign warns of a raised area or an uneven surface on the road, such as a speed bump or severe irregularities. Slow down to avoid damage to your vehicle or loss of control.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/11.jpeg')); ?>" alt="Playground Zone Sign">
                            <div>
                                <h3>Playground Zone</h3>
                                <p>This sign indicates a playground zone, where children may be playing nearby. Speed limits are typically reduced (e.g., to 30 km/h) during specific hours, and extra caution is required.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/12.jpeg')); ?>" alt="Winding Road Ahead Sign">
                            <div>
                                <h3>Winding Road Ahead</h3>
                                <p>This sign warns drivers of a series of curves or turns ahead. Reduce your speed and be prepared to steer through the turns to maintain control of your vehicle.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/13.jpeg')); ?>" alt="Yield the Right of Way Sign">
                            <div>
                                <h3>Yield the Right of Way</h3>
                                <p>This regulatory sign requires you to slow down and, if necessary, stop to give the right-of-way to vehicles and pedestrians already in the intersection or on the roadway you are entering.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/14.jpeg')); ?>" alt="Roundabout Sign">
                            <div>
                                <h3>Roundabout</h3>
                                <p>This sign indicates a circular intersection (roundabout) ahead. You must yield to traffic already in the roundabout and enter when there is a safe gap.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/15.jpeg')); ?>" alt="Share the Road Sign">
                            <div>
                                <h3>Share the Road</h3>
                                <p>This sign reminds drivers and cyclists that they must share the road safely. It often indicates areas where cyclists are common, encouraging drivers to be mindful of bicycles.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/16.jpeg')); ?>" alt="School Crosswalk Sign">
                            <div>
                                <h3>School Crosswalk: Watch for Pedestrians</h3>
                                <p>This sign marks a school crosswalk, alerting drivers to watch for students crossing the road. Be prepared to stop and yield to pedestrians in the crosswalk.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/17.jpeg')); ?>" alt="Dangerous Goods Sign">
                            <div>
                                <h3>Dangerous Goods</h3>
                                <p>This sign indicates that vehicles carrying dangerous goods must take specific routes or adhere to certain regulations. It's often accompanied by symbols denoting the type of hazardous material.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/18.jpeg')); ?>" alt="Right Lane Ends Sign">
                            <div>
                                <h3>Right Lane Ends</h3>
                                <p>This sign warns that the right lane ahead will terminate or merge into the adjacent lane. Drivers in the ending lane must safely merge left, yielding to traffic in the through lane.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/19.jpeg')); ?>" alt="Slow Moving Vehicle Sign">
                            <div>
                                <h3>Slow Moving Vehicle</h3>
                                <p>A reflective orange triangle with a red border is mounted on the rear of vehicles that typically travel at speeds of 40 km/h or less. It warns other drivers to slow down.</p>
                            </div>
                        </div>

                        
                        <div class="sign-item">
                            <img src="<?php echo e(asset('images/driving-signs/alberta/20.jpeg')); ?>" alt="Turn Right Only Sign">
                            <div>
                                <h3>Turn Right Only</h3>
                                <p>This sign indicates that traffic in the lane or at the intersection can only make a right turn. Straight-through or left turns are not permitted.</p>
                            </div>
                        </div>

                    </div> 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/driving-resources/newfoundland-and-labrador.blade.php ENDPATH**/ ?>